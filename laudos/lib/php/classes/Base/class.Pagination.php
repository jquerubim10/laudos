<?php
/**
 * @package Base
 *
 * calcula e exibe paginação de consultas no banco de dados
 */
class Pagination {
    
	/**
     * url para a primeira página
     *
     * @var string
     */
    var $first;
	
	/**
     * url para a última página
     *
     * @var string
     */
    var $last;
    
	/**
     * url para a próxima página
     *
     * @var string
     */
    var $next;
    
	/**
     * url para a página anterior
     *
     * @var string
     */
    var $prev;
    
	/**
     * string contendo a url base do arquivo atual
     *
     * @var string
     */
    var $url_base;
    
	/**
     * tamanho de página
     *
     * @var int
     */
    var $ps;
    
	/**
     * página atual
     *
     * @var int
     */
    var $cp;
    
	/**
     * número de páginas
     *
     * @var int
     */
    var $np;
    
	/**
     * flag que indica se está ou não na primeira página
     *
     * @var bool
     */
    var $fpg;
    
	/**
     * flag que indica se está ou não na última página
     *
     * @var bool
     */
    var $lpg;
    
   
	/**
     * total de registros
     *
     * @var int
     */
    var $total;
    
	/**
     * registro inicial
     *
     * @var int
     */
    var $start;
    
	/**
     * flag que indica se não existem registros
     *
     * @var bool
     */
    var $empty;
    
	/**
     * registro final
     *
     * @var int
     */
    var $end;
    
	/**
     * recordset contendo os registros da página atual.
     *
     * @var array
     */
    var $records;
    
	/**
     * numeros das páginas que seráo exibidas na barra de navegação, com seus respectivos links
     *
     * @var array
     */
    var $nums;
    
	/**
     * Construtor da classe
     *
     * @param string $url_base - {@link $url_base}
     * @param string $sql - consulta sql sem o limit
     * @param int [$ps] - {@link $ps}
     * @param int [$cp] - {@link $cp}
     */
    function Pagination ($url_base, $sql, $ps, $cp) {
    	# inicialização das variáveis
        # mp = maxPages
        # cp = currentPage
        # ps = pageSize
		$mp 					= 10;
        $rs_total				= Db::sql($sql);
        $total      			= mysql_num_rows($rs_total);
		$cp						= ($cp > $total ? $total : $cp);
        $np         			= ceil($total / $ps);    # number of pages
        $sidx       			= $cp * $ps;
        $this->url_base 		= $url_base;
        $this->total 			= $total;
        $this->empty 			= ($this->total == 0) ? 1 : 0;
        $this->lpg  			= (($np-1) == $cp) ? 1 : 0;
        $this->fpg  			= ($cp == 0)   ? 1 : 0;
        $this->ps   			= $ps;
        $this->cp   			= $cp;
        $this->np   			= $np;
        $this->nums    			= array();
        $eidx 					= $sidx + $ps;
        $this->start 			= $sidx + 1;
		$this->end				= ($this->lpg ? $this->total : $sidx + $ps);
		$limit 					= " limit ".strval($this->start-1).", ".$this->ps;
		//Util::prt("", $sql.$limit);
		$rs 					= Db::sql($sql.$limit, "Pagination");
		$this->records			= array();
		while($r = mysql_fetch_assoc($rs)){
			$this->records[]	= $r;
		}
        if ($np <= $mp) {
            $s = 0;
            $e = $np;
        } else if (($cp + $mp) <= $np) {
            $s = $cp;
            $e = $s + $mp;
        } else {
            $s = $cp - (($cp + $mp) - $np);
            $e = $s + $mp;
        }
        while ($s < $e) {
            $this->nums[$s+1] = $this->url_base . '&pagina='.$s.'&tamanho_pagina='.$this->ps;
            $s++;
        }
    	$this->first = $this->url_base . "&pagina=0&tamanho_pagina=".$this->ps;
    	$this->last  = $this->url_base . "&pagina="  . ($np - 1)."&tamanho_pagina=".$this->ps;
    	$this->next  = $this->url_base . "&pagina="  . ($cp + 1)."&tamanho_pagina=".$this->ps;
    	$this->prev  = $this->url_base . "&pagina="  . ($cp - 1)."&tamanho_pagina=".$this->ps;
    }
	
	/**
     * monta uma string com conteudo html da barra de navegação entre as paginas
     *
	 * @param string [$tipo] tipo de html que será exibido
     * @return string
     */
	function getHtml($tipo="padrao"){
		$htmls = array();
		if (sizeof($this->nums) > 1){
			////////////// HTML PADRÃO ////////////////////
			$html = '
				<table border="0" cellspacing="0" cellpadding="0" width="540">
				<tr><td>
				<table border="0" cellspacing="0" cellpadding="0" align="center">';
			$html.= '<tr>';		
			if ($this->fpg) { // se estiver na primeira página
				$html .= '<td><b>&laquo;</b> anterior&nbsp;</td>';
			} else {
				$html .= '<td><b>&laquo;</b> <a href="' . $this->prev . '">anterior</a>&nbsp;</td>';
			}		
			foreach ($this->nums as $k => $v) {
				if ($k == $this->cp+1){
					$html .= "<td>|&nbsp;&nbsp;<b> $k </b>&nbsp;&nbsp;</td>";
				} else {
					$html .= "<td>|&nbsp;&nbsp;<a href=\"$v\"> $k </a>&nbsp;&nbsp;</td>";
				}
			}
			if ($this->lpg) { // se estiver na ultima pagina
				$html .= '<td>|&nbsp;próxima <b>&raquo;</b>&nbsp;</td>';
			} else {
				$html .= '<td>|&nbsp;<a href="' . $this->next . '">próxima</a> <b>&raquo;</b>&nbsp;</td>';
			}
			$html .= '</tr>';
			$html .= '</table></td></tr></table>';
			$htmls["padrao"] = $html;
		}
		return $htmls[$tipo];
	}
	
	/**
     * retorna o numero total de registros da consulta, independente da divisão de páginas
     *
     * @return int
     */
	function getTotalRegistros(){
		return $this->total;
	}
	
	/**
     * retorna as informações dos registros da pagina atual
     *
     * @return array
     */
	function getRegistrosPagina(){
		return $this->records;
	}
}
?>