<?
/**
 * @package Base
 *
 * classe que realiza operações epecícficas nos registros da tabela relacionamento
 */
class TextoPadrao extends Base{
    /**
     * Construtor da classe
     *
     * @param string $id id do registro a ser acessado
     */
	function TextoPadrao($id=''){
		//inicializa a classe mãe - obrigatório
		parent::Base($id, "texto_padrao", "txp_id");
		//seta as configurações - não é obrigatório, caso seja uma classe com muitas peculiaridades
		parent::propertiesSetConfig(
			array(
				"med_id"	=> array(
					"titulo"		=> "Médico",
					"requerido"		=> "1",
					"validacao"		=> "Int",
				),
				"txp_codigo"	=> array(
					"titulo"		=> "Código",
					"requerido"		=> "1",
					"validacao"		=> "Text",
				),
				"txp_texto"	=> array(
					"titulo"		=> "Texto",
					"requerido"		=> "1",
					"validacao"		=> "Text",
				),

			)
		);
	}
	
    /**
     * monta uma string que contém a consulta sql que será executada na busca
	 *
	 * no final chama o método {@link setLinksBusca()} para setar as propriedades de links do objeto, que viabilizarão o funcionamento correto dos links daa paginação
     *
     * @param array $filtros nomes e valores dos campos q devem ser levados em conta na consulta
	 * @param array $ordenacao nome do campo e tipo de ordenacao
	 * @param mixed $tamanho_pagina tamanho maximo de registros por página
     * @return string
     */
	function setSqlBusca($filtros=array(), $ordenacao=array(), $tamanho_pagina = 20){
		$sql = "select * from texto_padrao where med_id = ".$_SESSION[med_id]." ";

		if ($filtros["txp_codigo"]){
			$sql .= " and txp_codigo = '".addslashes($filtros["txp_codigo"])."' ";
		}
		if ($filtros["txp_texto"]){
			$sql .= " and txp_texto like '%".addslashes($filtros["txp_texto"])."%' ";
		}

		if ($ordenacao["campo_ordenacao"]){
			$sql .= " order by ".addslashes($ordenacao["campo_ordenacao"])." ";
		} else {
			$sql .= " order by txp_codigo ";
		}
		if ($ordenacao["tipo_ordenacao"]){
			$sql .= " ".addslashes($ordenacao["tipo_ordenacao"])." ";
		} else {
			$sql .= " asc ";
		}
		$this->setLinksBusca($filtros, $ordenacao, $tamanho_pagina);
//		Util::prt("", $sql);
//		Js::alert($sql);
		$this->sql_busca = $sql;
	}
	
    /**
     * monta um array de objetos, contendo todos os registros da base de dados
	 *
     * @return array
     */
	function getAll(){
        $sql 	= "select * from texto_padrao where med_id = ".$_SESSION[med_id]." order by txp_codigo ";
		$rs		= Db::sql($sql, "TextoPadrao::getAll()");
        $out 	= array();
        while ($r = mysql_fetch_assoc($rs)) {
            $out[] = new TextoPadrao($r["txp_id"]);
        }
        return $out;
	}
	
    /**
     * monta um array com os dados que deverão ser exibidos em options de select
	 *
     * @return array
     */
	function getOptions(){
		$objs	= TextoPadrao::getAll();
        $out 	= array();
        foreach($objs as $o) {
            $out[$o->get("txp_id")] = $o->get("txp_codigo");
        }
        return $out;
	}
	
    /**
     * monta um array com os dados que deverão ser exibidos em um array javascript
	 *
     * @return array
     */
	function getToJs(){
		$objs	= TextoPadrao::getAll();
        $out 	= array();
        foreach($objs as $o) {
            $out[$o->get("txp_codigo")] = TextoPadrao::formatToJs($o->get("txp_texto"));
        }
        return $out;
	}
	
    /**
     * seta as seguintes propriedades do objeto:
	 * 
	 * {@link Base::link_base_paginacao}, {@link Base::setas_ordenacao}, {@link Base::links_ordenacao}
	 * 
	 * serve para viabilizar o funcinamento correto dos links da paginação e ordenação
	 *
	 * é chamado pelo método {@link setSqlBusca()}.
     *
     * @param array $filtros nomes e valores dos campos q devem ser levados em conta na consulta
	 * @param array $ordenacao nome do campo e tipo de ordenacao
	 * @param mixed $tamanho_pagina tamanho maximo de registros por página
     */
	function setLinksBusca($filtros=array(), $ordenacao=array(), $tamanho_pagina = 20){
		$ordenacao["campo_ordenacao"] 		= ($ordenacao["campo_ordenacao"] ? $ordenacao["campo_ordenacao"] : "txp_codigo");
		$ordenacao["tipo_ordenacao"] 		= ($ordenacao["tipo_ordenacao"] ? $ordenacao["tipo_ordenacao"] : "asc");	
		$tipo_ordenacao_inverso				= ($ordenacao["tipo_ordenacao"] == "asc" ? "desc" : "asc");
		
		$vars_get_filtros					= Util::mount_get_vars($filtros);
		$vars_get_ordenacao					= Util::mount_get_vars($ordenacao);
		$this->link_base_paginacao			= LINK_BASE_ATUAL.$vars_get_filtros.$vars_get_ordenacao;
		
		/*foreach($this->propertiesGetConfig() as $campo => $config){
			if ($campo == $ordenacao["campo_ordenacao"]){
				$this->setas_ordenacao[$campo] 	= "<img src='images\seta_".$ordenacao["tipo_ordenacao"].".gif'>";
				$this->links_ordenacao[$campo]	= VARS_SECAO.$vars_get_filtros."&campo_ordenacao=$campo&tipo_ordenacao=".$tipo_ordenacao_inverso."&tamanho_pagina=".$tamanho_pagina;
			} else {
				$this->links_ordenacao[$campo] 	= VARS_SECAO.$vars_get_filtros."&campo_ordenacao=$campo&tipo_ordenacao=asc&tamanho_pagina=".$tamanho_pagina;
			}
		}*/
		
		$campo = "txp_codigo";
		if ($campo == $ordenacao["campo_ordenacao"]){
			$this->setas_ordenacao[$campo] 	= "<img src='images\seta_".$ordenacao["tipo_ordenacao"].".gif'>";
			$this->links_ordenacao[$campo]	= VARS_SECAO.$vars_get_filtros."&campo_ordenacao=$campo&tipo_ordenacao=".$tipo_ordenacao_inverso."&tamanho_pagina=".$tamanho_pagina;
		} else {
			$this->links_ordenacao[$campo] 	= VARS_SECAO.$vars_get_filtros."&campo_ordenacao=$campo&tipo_ordenacao=asc&tamanho_pagina=".$tamanho_pagina;
		}
		
		$campo = "txp_texto";
		if ($campo == $ordenacao["campo_ordenacao"]){
			$this->setas_ordenacao[$campo] 	= "<img src='images\seta_".$ordenacao["tipo_ordenacao"].".gif'>";
			$this->links_ordenacao[$campo]	= VARS_SECAO.$vars_get_filtros."&campo_ordenacao=$campo&tipo_ordenacao=".$tipo_ordenacao_inverso."&tamanho_pagina=".$tamanho_pagina;
		} else {
			$this->links_ordenacao[$campo] 	= VARS_SECAO.$vars_get_filtros."&campo_ordenacao=$campo&tipo_ordenacao=asc&tamanho_pagina=".$tamanho_pagina;
		}

	}
	
    /**
     * verifica se ja existe um registro cadastrado com os mesmos dados
     *
     */
	function exists() {
		$sql_inicio 	= " select * from ".$this->table." where ";
		$sql_fim 		= " ".($this->get($this->pk) ? " and ".$this->pk." <> ".$this->get($this->pk) : "")." limit 1 ";
		
		$sql 	= "txp_codigo = ".$this->get("txp_codigo");
		if (mysql_num_rows(Db::sql($sql_inicio.$sql.$sql_fim))){
			$this->propertySetError ("txp_codigo", "Já existe no banco de dados.");
		}
	}
	
    /**
     * formata um texto padrão para que possa ser inserido em um codigo javascript
     *
	 * @param string $t
	 * @return string
     */
	function formatToJs($t){
		$t = str_replace("\"","\\\"",$t);
		$t = str_replace(array("\r\n", "\r", "\n"), '\\n', $t);
		return $t;
	}

}
?>