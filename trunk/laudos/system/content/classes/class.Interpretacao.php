<?
/**
 * @package Base
 *
 * classe que realiza operações epecícficas nos registros da tabela relacionamento
 */
class Interpretacao extends Base{
    /**
     * Construtor da classe
     *
     * @param string $id id do registro a ser acessado
     */
	function Interpretacao($id=''){
		//inicializa a classe mãe - obrigatório
		parent::Base($id, "interpretacao", "int_id");
		//seta as configurações - não é obrigatório, caso seja uma classe com muitas peculiaridades
 		parent::propertiesSetConfig(
			array(
				"int_status"	=> array(
					"titulo"		=> "Situação",
					"requerido"		=> "",
					"validacao"		=> "Text",
				),
				"int_data_cadastro"	=> array(
					"titulo"		=> "Data de Cadastro",
					"requerido"		=> "",
					"validacao"		=> "DataHoraMinSeg",
				),
				"int_data_interpretacao"	=> array(
					"titulo"		=> "Data de Interpretação",
					"requerido"		=> "",
					"validacao"		=> "DataHoraMinSeg",
				),
				"int_data_impressao"	=> array(
					"titulo"		=> "Data de Impressão",
					"requerido"		=> "",
					"validacao"		=> "DataHoraMinSeg",
				),
/* 				"med_id"	=> array(
					"titulo"		=> "Médico",
					"requerido"		=> "",
					"validacao"		=> "Int",
				), */
				"hos_id"	=> array(
					"titulo"		=> "Hospital",
					"requerido"		=> "",
					"validacao"		=> "Int",
				),
				"int_paciente_prontuario"	=> array(
					"titulo"		=> "Prontuário",
					"requerido"		=> "",
					"validacao"		=> "Text",
				),
				"int_paciente_nome"	=> array(
					"titulo"		=> "Nome do Paciente",
					"requerido"		=> "",
					"validacao"		=> "Text",
				),
				"int_paciente_nascimento"	=> array(
					"titulo"		=> "Data de Nascimento",
					"requerido"		=> "",
					"validacao"		=> "Data",
				),
				"int_paciente_sexo"	=> array(
					"titulo"		=> "Sexo",
					"requerido"		=> "",
					"validacao"		=> "Text",
				),
				"exa_id"	=> array(
					"titulo"		=> "Exame",
					"requerido"		=> "",
					"validacao"		=> "Int",
				),
				"con_id"	=> array(
					"titulo"		=> "Convênio",
					"requerido"		=> "",
					"validacao"		=> "Int",
				),
				"int_opcional"	=> array(
					"titulo"		=> "Opcional",
					"requerido"		=> "",
					"validacao"		=> "Text",
				),
				"int_requisitante"	=> array(
					"titulo"		=> "Médico requisitante",
					"requerido"		=> "",
					"validacao"		=> "Text",
				),
				"int_tecnico_rx"	=> array(
					"titulo"		=> "Técnico Rx",
					"requerido"		=> "",
					"validacao"		=> "Text",
				),
				"int_percentual"	=> array(
					"titulo"		=> "Percentual",
					"requerido"		=> "",
					"validacao"		=> "Float",
				),
				"int_valor_ch"	=> array(
					"titulo"		=> "Valor do CH",
					"requerido"		=> "",
					"validacao"		=> "Float",
				),
				"int_ch"	=> array(
					"titulo"		=> "CH",
					"requerido"		=> "",
					"validacao"		=> "Int",
				),
				"int_valor_filme"	=> array(
					"titulo"		=> "Valor do Filme",
					"requerido"		=> "",
					"validacao"		=> "Float",
				),
				"int_filme"	=> array(
					"titulo"		=> "Filme (M2)",
					"requerido"		=> "",
					"validacao"		=> "Float4",
				),
				"int_valor_absoluto"	=> array(
					"titulo"		=> "Valor Absoluto",
					"requerido"		=> "",
					"validacao"		=> "Float",
				),
				"int_valor_contraste"	=> array(
					"titulo"		=> "Valor do Contraste",
					"requerido"		=> "",
					"validacao"		=> "Float",
				),
				"int_valor_final"	=> array(
					"titulo"		=> "Valor Final",
					"requerido"		=> "",
					"validacao"		=> "Float",
				),
				"int_texto"	=> array(
					"titulo"		=> "Interpretacao",
					"requerido"		=> "",
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
		$sql = "
			select 
				* 
			from 
				interpretacao i, 
				hospital h, 
				exame e, 
				convenio c 
			where 
				h.med_id = ".$_SESSION[med_id]." 
				and i.hos_id = h.hos_id 
				and e.exa_id = i.exa_id 
				and c.con_id = i.con_id 
		";

		if ($filtros["int_status"]){
			$sql .= " and int_status = '".addslashes($filtros["int_status"])."' ";
		}
		
		if ($filtros["int_data_inicial"]){
			$sql .= " and DATE_FORMAT(int_data_cadastro, '%Y-%m-%d') >= '".addslashes(formatacao::formatData($filtros["int_data_inicial"]))."' ";
		}

		if ($filtros["int_data_final"]){
			$sql .= " and '".addslashes(formatacao::formatData($filtros["int_data_final"]))."' >= DATE_FORMAT(int_data_cadastro, '%Y-%m-%d') ";
		}

		if ($filtros["hos_id"]){
			$sql .= " and i.hos_id = ".addslashes($filtros["hos_id"])." ";
		}

		if ($filtros["int_paciente_prontuario"]){
			$sql .= " and int_paciente_prontuario like '%".addslashes($filtros["int_paciente_prontuario"])."%' ";
		}

		if ($filtros["int_paciente_nome"]){
			$sql .= " and int_paciente_nome like '%".addslashes($filtros["int_paciente_nome"])."%' ";
		}

		if ($filtros["exa_id"]){
			$sql .= " and exa_id like '%".addslashes($filtros["exa_id"])."%' ";
		}

		if ($filtros["con_id"]){
			$sql .= " and con_id like '%".addslashes($filtros["con_id"])."%' ";
		}


		if ($ordenacao["campo_ordenacao"]){
			$sql .= " order by ".addslashes($ordenacao["campo_ordenacao"])." ";
		} else {
			$sql .= " order by int_data_cadastro";
		}
		if ($ordenacao["tipo_ordenacao"]){
			$sql .= " ".addslashes($ordenacao["tipo_ordenacao"])." ";
		} else {
			$sql .= " desc ";
		}
		$this->setLinksBusca($filtros, $ordenacao, $tamanho_pagina);
//		Util::prt("", $sql);
//		exit();
//		Js::alert($sql);
		$this->sql_busca = $sql;
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
	function setSqlRelatorio($filtros=array()){
		if ($filtros["periodo_mes"] && $filtros["periodo_ano"]){
			$sql_filtros .= " and int_data_cadastro >= '".$filtros["periodo_ano"]."-".$filtros["periodo_mes"]."-01 00:00:00'  ";
			$sql_filtros .= " and int_data_cadastro <= '".$filtros["periodo_ano"]."-".$filtros["periodo_mes"]."-31 23:59:59'  ";
		}
		if ($filtros["hos_id"]){
			$sql_filtros .= " and i.hos_id = ".addslashes($filtros["hos_id"])." ";
		}
		$sql = "
			select 
				e.exa_id, 
				".($filtros[agrupar] == "exa_id" ? "exa_nome as " : "con_nome as ")." agrupador,
				int_valor_final as valor_final,
				int_percentual as percentual
			from 
				interpretacao i, 
				hospital h, 
				exame e, 
				convenio c 
			where 
				h.med_id = ".$_SESSION[med_id]." 
				and i.hos_id = h.hos_id 
				and e.exa_id = i.exa_id 
				and c.con_id = i.con_id 
		".$sql_filtros;
		//$sql .= "group by i.".$filtros["agrupar"]." ";
		if ($filtros["agrupar"] == "con_id"){
			$sql .= " order by con_nome, exa_nome";
		} else {
			$sql .= " order by exa_nome, con_nome";
		}
/* 		$sql .= ") union (
			select 
				".($filtros[agrupar] == "exa_id" ? "'TOTAL' as exame," : "'TOTAL' as convenio,")."
				count(int_id) as quantidade,
				sum(int_valor_final) as valor_total
			from 
				interpretacao i, 
				hospital h, 
				exame e, 
				convenio c 
			where 
				h.med_id = ".$_SESSION[med_id]." 
				and i.hos_id = h.hos_id 
				and e.exa_id = i.exa_id 
				and c.con_id = i.con_id 
		".$sql_filtros."
			group by i.hos_id
		)"; */
//		Util::prt("", $sql);
//		exit();
//		Js::alert($sql);
		$this->sql_busca = $sql;
	}
	
    /**
     * monta um array de objetos, contendo todos os registros da base de dados
	 *
     * @return array
     */
	function getAll(){
        $sql 	= "select * from interpretacao ";
		$rs		= Db::sql($sql, "Interpretacao::getAll()");
        $out 	= array();
        while ($r = mysql_fetch_assoc($rs)) {
            $out[] = new Interpretacao($r["int_id"]);
        }
        return $out;
	}
	
    /**
     * informa que a interpretacao fo impressa
	 *
     */
	function informaImpressao(){
        $sql 	= "update interpretacao set int_data_impressao = now(), int_status = 'impresso' where int_id = ".$this->get("int_id");
		$rs		= Db::sql($sql, "Interpretacao::informaImpressao()");
	}
	
    /**
     * monta um array com os dados que deverão ser exibidos em options de select
	 *
     * @return array
     */
	function getOptions(){
		$objs	= Interpretacao::getAll();
        $out 	= array();
        foreach($objs as $o) {
            $out[$o->get("int_id")] = $o->get("int_paciente_nome");
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
		$ordenacao["campo_ordenacao"] 		= ($ordenacao["campo_ordenacao"] ? $ordenacao["campo_ordenacao"] : "int_paciente_nome");
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
		
		$campo = "int_data_cadastro";
		if ($campo == $ordenacao["campo_ordenacao"]){
			$this->setas_ordenacao[$campo] 	= "<img src='images\seta_".$ordenacao["tipo_ordenacao"].".gif'>";
			$this->links_ordenacao[$campo]	= VARS_SECAO.$vars_get_filtros."&campo_ordenacao=$campo&tipo_ordenacao=".$tipo_ordenacao_inverso."&tamanho_pagina=".$tamanho_pagina;
		} else {
			$this->links_ordenacao[$campo] 	= VARS_SECAO.$vars_get_filtros."&campo_ordenacao=$campo&tipo_ordenacao=asc&tamanho_pagina=".$tamanho_pagina;
		}
		
		$campo = "exa_nome";
		if ($campo == $ordenacao["campo_ordenacao"]){
			$this->setas_ordenacao[$campo] 	= "<img src='images\seta_".$ordenacao["tipo_ordenacao"].".gif'>";
			$this->links_ordenacao[$campo]	= VARS_SECAO.$vars_get_filtros."&campo_ordenacao=$campo&tipo_ordenacao=".$tipo_ordenacao_inverso."&tamanho_pagina=".$tamanho_pagina;
		} else {
			$this->links_ordenacao[$campo] 	= VARS_SECAO.$vars_get_filtros."&campo_ordenacao=$campo&tipo_ordenacao=asc&tamanho_pagina=".$tamanho_pagina;
		}

		$campo = "int_data_interpretacao";
		if ($campo == $ordenacao["campo_ordenacao"]){
			$this->setas_ordenacao[$campo] 	= "<img src='images\seta_".$ordenacao["tipo_ordenacao"].".gif'>";
			$this->links_ordenacao[$campo]	= VARS_SECAO.$vars_get_filtros."&campo_ordenacao=$campo&tipo_ordenacao=".$tipo_ordenacao_inverso."&tamanho_pagina=".$tamanho_pagina;
		} else {
			$this->links_ordenacao[$campo] 	= VARS_SECAO.$vars_get_filtros."&campo_ordenacao=$campo&tipo_ordenacao=asc&tamanho_pagina=".$tamanho_pagina;
		}
		$campo = "int_data_impressao";
		if ($campo == $ordenacao["campo_ordenacao"]){
			$this->setas_ordenacao[$campo] 	= "<img src='images\seta_".$ordenacao["tipo_ordenacao"].".gif'>";
			$this->links_ordenacao[$campo]	= VARS_SECAO.$vars_get_filtros."&campo_ordenacao=$campo&tipo_ordenacao=".$tipo_ordenacao_inverso."&tamanho_pagina=".$tamanho_pagina;
		} else {
			$this->links_ordenacao[$campo] 	= VARS_SECAO.$vars_get_filtros."&campo_ordenacao=$campo&tipo_ordenacao=asc&tamanho_pagina=".$tamanho_pagina;
		}

		$campo = "hos_nome";
		if ($campo == $ordenacao["campo_ordenacao"]){
			$this->setas_ordenacao[$campo] 	= "<img src='images\seta_".$ordenacao["tipo_ordenacao"].".gif'>";
			$this->links_ordenacao[$campo]	= VARS_SECAO.$vars_get_filtros."&campo_ordenacao=$campo&tipo_ordenacao=".$tipo_ordenacao_inverso."&tamanho_pagina=".$tamanho_pagina;
		} else {
			$this->links_ordenacao[$campo] 	= VARS_SECAO.$vars_get_filtros."&campo_ordenacao=$campo&tipo_ordenacao=asc&tamanho_pagina=".$tamanho_pagina;
		}

		$campo = "int_paciente_prontuario";
		if ($campo == $ordenacao["campo_ordenacao"]){
			$this->setas_ordenacao[$campo] 	= "<img src='images\seta_".$ordenacao["tipo_ordenacao"].".gif'>";
			$this->links_ordenacao[$campo]	= VARS_SECAO.$vars_get_filtros."&campo_ordenacao=$campo&tipo_ordenacao=".$tipo_ordenacao_inverso."&tamanho_pagina=".$tamanho_pagina;
		} else {
			$this->links_ordenacao[$campo] 	= VARS_SECAO.$vars_get_filtros."&campo_ordenacao=$campo&tipo_ordenacao=asc&tamanho_pagina=".$tamanho_pagina;
		}
		$campo = "int_paciente_nome";
		if ($campo == $ordenacao["campo_ordenacao"]){
			$this->setas_ordenacao[$campo] 	= "<img src='images\seta_".$ordenacao["tipo_ordenacao"].".gif'>";
			$this->links_ordenacao[$campo]	= VARS_SECAO.$vars_get_filtros."&campo_ordenacao=$campo&tipo_ordenacao=".$tipo_ordenacao_inverso."&tamanho_pagina=".$tamanho_pagina;
		} else {
			$this->links_ordenacao[$campo] 	= VARS_SECAO.$vars_get_filtros."&campo_ordenacao=$campo&tipo_ordenacao=asc&tamanho_pagina=".$tamanho_pagina;
		}
	}
	
}
?>