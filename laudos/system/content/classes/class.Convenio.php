<?
/**
 * @package Base
 *
 * classe que realiza operações epecícficas nos registros da tabela cliente
 */
class Convenio extends Base{
    /**
     * Construtor da classe
     *
     * @param string $id id do registro a ser acessado
     */
	function Convenio($id=''){
		//inicializa a classe mãe - obrigatório
		parent::Base($id, "convenio", "con_id");
		//seta as configurações - não é obrigatório, caso seja uma classe com muitas peculiaridades
		parent::propertiesSetConfig(
			array(
				"con_nome"	=> array(
					"titulo"		=> "Nome",
					"requerido"		=> "1",
					"validacao"		=> "Text",
				),
				"hos_id"	=> array(
					"titulo"		=> "Hospital",
					"requerido"		=> "1",
					"validacao"		=> "Int",
				),
				"con_valor_ch"	=> array(
					"titulo"		=> "Valor do CH",
					"requerido"		=> "0",
					"validacao"		=> "Float",
				),
				"con_valor_filme"	=> array(
					"titulo"		=> "Valor do Filme",
					"requerido"		=> "0",
					"validacao"		=> "Float",
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
		$sql = "SELECT * FROM convenio c, hospital h WHERE h.med_id = ".$_SESSION[med_id]." and h.hos_id = c.hos_id ";
		if ($filtros["con_nome"]){
			$sql .= " and con_nome like '%".addslashes($filtros["con_nome"])."%' ";
		}
		if ($filtros["hos_id"]){
			$sql .= " and h.hos_id = ".addslashes($filtros["hos_id"])." ";
		}

		if ($ordenacao["campo_ordenacao"]){
			$sql .= " order by ".addslashes($ordenacao["campo_ordenacao"])." ";
		} else {
			$sql .= " order by hos_nome";
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
     * monta um array de objetos cliente, contendo todos os clientes da base de dados
	 *
     * @return array
     */
	function getAll(){
		if ($_SESSION[medico] == "1"){
	        $sql = "SELECT * FROM convenio c, hospital h where h.hos_id = c.hos_id and h.med_id = ".$_SESSION[med_id]." order by hos_nome, con_nome";
		} else {
			$sql = "SELECT * FROM convenio c, hospital h where c.hos_id = ".$_SESSION[hos_id]." and c.hos_id = h.hos_id order by con_nome";
		}
		//util::prt("", $sql);
		$rs		= Db::sql($sql, "Convenio::getAll()");
        $out 	= array();
        while ($r = mysql_fetch_assoc($rs)) {
            $out[] = new Convenio($r["con_id"]);
        }
        return $out;
	}
	
    /**
     * monta um array com os dados de clientes que deverão ser exibidos em options de select
	 *
     * @return array
     */
	function getOptions(){
		$objs	= Convenio::getAll();
        $out 	= array();
        foreach($objs as $o) {
			$h = new Hospital($o->get("hos_id"));
            $out[$o->get("con_id")] = $h->get("hos_nome")." &nbsp;&nbsp; | &nbsp;&nbsp; ".$o->get("con_nome");
        }
        return $out;
	}
	
	
    /**
     * verifica se ja existe um registro cadastrado com os mesmos dados
     *
     */
	function exists() {
		$sql_inicio 	= " select * from ".$this->table." where ";
		$sql_fim 		= " ".($this->get($this->pk) ? " and ".$this->pk." <> ".$this->get($this->pk) : "")." limit 1 ";
		
		$sql 	= "con_nome = ".$this->get("con_nome")." and "." hos_id = ".$this->get("hos_id");
		if (mysql_num_rows(Db::sql($sql_inicio.$sql.$sql_fim))){
			$this->propertySetError ("con_nome", "Já existe no banco de dados.");
		}
	}
	
    /**
     * pega informacoes sobre todos os registros de outras tabelas que está relacionados com o registro atual
	 * 
	 * suas informações serão usadas no método {@link Base::deleteDependences()} e na montagem da interface que apontará quais registros estão vinculados ao registro atual, na hora da exclusão.
	 * este método é normalmente chamado em {@link Base::delete()}
     *
	 * @return array
     */
     function setdependences() {
		$dep 	= array();

		$sql 	= "select * from interpretacao where ".$this->pk." = ".$this->get($this->pk);
		$rs 	= Db::sql($sql);
		while ($r = mysql_fetch_assoc($rs)){
			$dep[]	= array(
				"sql_del"	=> "delete from interpretacao where con_id = ".$r["con_id"],
				"label"		=> "Interpretação - ".$r["int_paciente_nome"],
				"url"		=> "",
			);
		}
		$sql 	= "select * from exame e, valor_exame v where e.exa_id = v.exa_id and e.med_id = ".$_SESSION["med_id"]." and ".$this->pk." = ".$this->get($this->pk);
		$rs 	= Db::sql($sql);
		while ($r = mysql_fetch_assoc($rs)){
			$dep[]	= array(
				"sql_del"	=> "delete from valor_exame where vex_id = ".$r["vex_id"],
				"label"		=> "Valor de Exame - ".$r["exa_nome"],
				"url"		=> "",
			);
		}
		
		$this->dependences = $dep;
    }
	
    /**
     * seta as seguintes propriedades do objeto:
	 * 
	 * {@link Base::link_base_pagnacao}, {@link Base::setas_ordenacao}, {@link Base::links_ordenacao}
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
		$ordenacao["campo_ordenacao"] 		= ($ordenacao["campo_ordenacao"] ? $ordenacao["campo_ordenacao"] : "hos_nome");
		$ordenacao["tipo_ordenacao"] 		= ($ordenacao["tipo_ordenacao"] ? $ordenacao["tipo_ordenacao"] : "asc");	
		$tipo_ordenacao_inverso				= ($ordenacao["tipo_ordenacao"] == "asc" ? "desc" : "asc");
		
		$vars_get_filtros					= Util::mount_get_vars($filtros);
		$vars_get_ordenacao					= Util::mount_get_vars($ordenacao);
		$this->link_base_paginacao			= LINK_BASE_ATUAL.$vars_get_filtros.$vars_get_ordenacao;
		
		foreach($this->propertiesGetConfig() as $campo => $config){
			if ($campo == $ordenacao["campo_ordenacao"]){
				$this->setas_ordenacao[$campo] 	= "<img src='images\seta_".$ordenacao["tipo_ordenacao"].".gif'>";
				$this->links_ordenacao[$campo]	= VARS_SECAO.$vars_get_filtros."&campo_ordenacao=$campo&tipo_ordenacao=".$tipo_ordenacao_inverso."&tamanho_pagina=".$tamanho_pagina;
			} else {
				$this->links_ordenacao[$campo] 	= VARS_SECAO.$vars_get_filtros."&campo_ordenacao=$campo&tipo_ordenacao=asc&tamanho_pagina=".$tamanho_pagina;
			}
		}
		
		$campo = "hos_nome";
		if ($campo == $ordenacao["campo_ordenacao"]){
			$this->setas_ordenacao[$campo] 	= "<img src='images\seta_".$ordenacao["tipo_ordenacao"].".gif'>";
			$this->links_ordenacao[$campo]	= VARS_SECAO.$vars_get_filtros."&campo_ordenacao=$campo&tipo_ordenacao=".$tipo_ordenacao_inverso."&tamanho_pagina=".$tamanho_pagina;
		} else {
			$this->links_ordenacao[$campo] 	= VARS_SECAO.$vars_get_filtros."&campo_ordenacao=$campo&tipo_ordenacao=asc&tamanho_pagina=".$tamanho_pagina;
		}
	}
	
    /**
     * realiza descontos nos valoes dos exames deste convenio de acordo com outro convênio
	 * 
     * @param string $desconto
	 * @param string $convenio_origem
     */
	function descontaValores($desconto, $convenio_origem){
		if (($convenio_origem != $this->get("con_id")) && ($convenio_origem != "") && (floatval(Formatacao::formatFloat($desconto)) > 0)){
			$desconto = Formatacao::formatFloat($desconto);
			$sql = "select * from valor_exame where con_id = ".$this->get("con_id");
			$rs	 = Db::sql($sql, "convenio::descontaValores() - busca todos os valores do convenio que sofrerá o desconto.");
			if (mysql_num_rows($rs)){
				$exames_convenio_origem_equivalentes = "0";
				//para cada valor existente, ele buscará o valor do mesmo exame no convenio de origem para aplicar o desconto
				while ($r = mysql_fetch_assoc($rs)){
					$sql = "select * from valor_exame where con_id = ".$convenio_origem." and exa_id = ".$r["exa_id"]." and vex_valor_absoluto > 0 limit 1";
					$rs2 = Db::sql($sql, "convenio::descontaValores() - busca o valor do convenio base para cada exame do convenio que sofrerá o desconto");
					if (mysql_num_rows($rs2)){
						$r2 = mysql_fetch_assoc($rs2);
						$sql = "update valor_exame set vex_valor_absoluto = ((".$r2["vex_valor_absoluto"].") - ((".$r2["vex_valor_absoluto"]." * ".$desconto.") / 100) ) where exa_id = ".$r["exa_id"]." and con_id = ".$this->get("con_id")." and vex_valor_absoluto > 0";
						$upd = Db::sql($sql, "convenio::descontaValores() -  aplica o desconto no convênio");
						$exames_convenio_origem_equivalentes .= ",".$r2["vex_id"];
					}
				}
				//depois de aplicar o desconto nos exames que existem nos dosi convênios, realiza uma busca nos exames existentes somente no convenio de origem, inserindo o valor com desconto para o convênio atual
				$sql = "select * from valor_exame where con_id = ".$convenio_origem." and vex_valor > 0 and vex_id not in (".$exames_convenio_origem_equivalentes.")";
				$rs	 = Db::sql($sql, "convenio::descontaValores() - busca os valores de exames que so existem no convenio de origem");
				while ($r = mysql_fetch_assoc($rs)){
					$sql = "insert into valor_exame (vex_valor_absoluto, exa_id, con_id) values (((".$r["vex_valor_absoluto"].") - ((".$r["vex_valor_absoluto"]." * ".$desconto.") / 100) ),".$r["exa_id"].",".$this->get("con_id").")";
					$upd = Db::sql($sql, "convenio::descontaValores() -  aplica o desconto no convênio");
				}
			} else {
				//esta rotina acontecerá caso o convenio alvo não possua nenhum valor de exame
				//busca todos o valores de exames do convenio de origem e insere no conveni alvo, aplicando o desconto.
				$sql = "select * from valor_exame where con_id = ".$convenio_origem." and vex_valor_absoluto > 0";
				$rs	 = Db::sql($sql, "convenio::descontaValores() - busca os valores de exames do convenio de origem");
				while ($r = mysql_fetch_assoc($rs)){
					$sql = "insert into valor_exame (vex_valor_absoluto, exa_id, con_id) values (((".$r["vex_valor_absoluto"].") - ((".$r["vex_valor_absoluto"]." * ".$desconto.") / 100) ),".$r["exa_id"].",".$this->get("con_id").")";
					$upd = Db::sql($sql, "convenio::descontaValores() -  aplica o desconto no convênio");
				}
			}
		}
	}
}
?>