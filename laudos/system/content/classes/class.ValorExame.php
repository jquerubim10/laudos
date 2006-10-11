<?
/**
 * @package Base
 *
 * classe que realiza operações epecícficas nos registros da tabela relacionamento
 */
class ValorExame extends Base{
    /**
     * Construtor da classe
     *
     * @param string $id id do registro a ser acessado
     */
	function ValorExame($id=''){
		//inicializa a classe mãe - obrigatório
		parent::Base($id, "valor_exame", "vex_id");
		//seta as configurações - não é obrigatório, caso seja uma classe com muitas peculiaridades
		parent::propertiesSetConfig(
			array(
				"exa_id"	=> array(
					"titulo"		=> "Exame",
					"requerido"		=> "1",
					"validacao"		=> "Int",
				),
				"con_id"	=> array(
					"titulo"		=> "Convênio",
					"requerido"		=> "1",
					"validacao"		=> "Int",
				),
				"vex_valor_absoluto"	=> array(
					"titulo"		=> "Valor Absoluto",
					"requerido"		=> "",
					"validacao"		=> "Float",
				),
				"vex_filme"	=> array(
					"titulo"		=> "Filme (M2)",
					"requerido"		=> "",
					"validacao"		=> "Float4",
				),
				"vex_valor_contraste"	=> array(
					"titulo"		=> "Valor do Contraste",
					"requerido"		=> "",
					"validacao"		=> "Float",
				),
				"vex_ch"	=> array(
					"titulo"		=> "CH",
					"requerido"		=> "",
					"validacao"		=> "Int",
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
		$sql = "
			select 
				* 
			from 
				valor_exame vex, 
				exame exa, 
				convenio con,
				hospital hos
			where
				vex.con_id = con.con_id
				and con.hos_id = hos.hos_id
				and hos.med_id = ".$_SESSION[med_id]."
				and vex.exa_id = exa.exa_id
		";

		if ($filtros["exa_id"]){
			$sql .= " and exa.exa_id = ".addslashes($filtros["exa_id"])." ";
		}

		if ($filtros["con_id"]){
			$sql .= " and con.con_id = ".addslashes($filtros["con_id"])." ";
		}
		
		$campo_ordenacao_temp = $ordenacao["campo_ordenacao"];
		if ($ordenacao["campo_ordenacao"]){
			$ordenacao["campo_ordenacao"] = ($ordenacao["campo_ordenacao"] == "con_nome" ? "hos_nome, con_nome" : $ordenacao["campo_ordenacao"]);
			$sql .= " order by ".addslashes($ordenacao["campo_ordenacao"])." ";
		} else {
			$sql .= " order by hos_nome, con_nome ";
		}
		$ordenacao["campo_ordenacao"] = $campo_ordenacao_temp;
		
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
		$ordenacao["campo_ordenacao"] 		= ($ordenacao["campo_ordenacao"] ? $ordenacao["campo_ordenacao"] : "con_nome");
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
		
		$campo = "exa_nome";
		if ($campo == $ordenacao["campo_ordenacao"]){
			$this->setas_ordenacao[$campo] 	= "<img src='images\seta_".$ordenacao["tipo_ordenacao"].".gif'>";
			$this->links_ordenacao[$campo]	= VARS_SECAO.$vars_get_filtros."&campo_ordenacao=$campo&tipo_ordenacao=".$tipo_ordenacao_inverso."&tamanho_pagina=".$tamanho_pagina;
		} else {
			$this->links_ordenacao[$campo] 	= VARS_SECAO.$vars_get_filtros."&campo_ordenacao=$campo&tipo_ordenacao=asc&tamanho_pagina=".$tamanho_pagina;
		}
		$campo = "con_nome";
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
		
		$sql 	= "con_id = ".$this->get("con_id")." and exa_id = ".$this->get("exa_id")." ";
		if (mysql_num_rows(Db::sql($sql_inicio.$sql.$sql_fim))){
			$this->propertySetError ("con_id", "Já existe no banco de dados.");
			$this->propertySetError ("exa_id", "Já existe no banco de dados.");
		}
	}
	
	
}
?>