<?
/**
 * @package Base
 *
 * classe que realiza operações epecícficas nos registros da tabela relacionamento
 */
class Hospital extends Base{
    /**
     * Construtor da classe
     *
     * @param string $id id do registro a ser acessado
     */
	function Hospital($id=''){
		//inicializa a classe mãe - obrigatório
		parent::Base($id, "hospital", "hos_id");
		//seta as configurações - não é obrigatório, caso seja uma classe com muitas peculiaridades
		parent::propertiesSetConfig(
			array(
				"med_id"	=> array(
					"titulo"		=> "Médico",
					"requerido"		=> "1",
					"validacao"		=> "Int",
				),
				"hos_nome"	=> array(
					"titulo"		=> "Nome",
					"requerido"		=> "1",
					"validacao"		=> "Text",
				),
				"hos_login"	=> array(
					"titulo"		=> "Login",
					"requerido"		=> "1",
					"validacao"		=> "Text",
				),
				"hos_senha"	=> array(
					"titulo"		=> "senha",
					"requerido"		=> "1",
					"validacao"		=> "Text",
				),
				"hos_email"	=> array(
					"titulo"		=> "E-Mail",
					"requerido"		=> "1",
					"validacao"		=> "Email",
				),
				"hos_percentual"	=> array(
					"titulo"		=> "Percentual",
					"requerido"		=> "",
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
		$sql = "select * from hospital where med_id = ".$_SESSION["med_id"]." ";

		if ($filtros["hos_nome"]){
			$sql .= " and hos_nome like '%".addslashes($filtros["hos_nome"])."%' ";
		}

		if ($ordenacao["campo_ordenacao"]){
			$sql .= " order by ".addslashes($ordenacao["campo_ordenacao"])." ";
		} else {
			$sql .= " order by hos_nome ";
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
		if ($_SESSION[medico] == "1"){
	        $sql 	= "select * from hospital where med_id = ".$_SESSION["med_id"]." order by hos_nome";
		} else {
			$sql 	= "select * from hospital where hos_id = ".$_SESSION[hos_id];
		}
		$rs		= Db::sql($sql, "Hospital::getAll()");
        $out 	= array();
        while ($r = mysql_fetch_assoc($rs)) {
            $out[] = new Hospital($r["hos_id"]);
        }
        return $out;
	}
	
	
    /**
     * retorns o primiro id de um hospital
	 *
     * @return string
     */
	function getFirstId(){
		if ($_SESSION[medico] == "1"){
	        $sql 	= "select hos_id from hospital where med_id = ".$_SESSION["med_id"]." order by hos_nome limit 1";
			$rs		= Db::sql($sql, "Hospital::getFirstId()");
			$r = mysql_fetch_assoc($rs);
			return $r["hos_id"];
		} else {
			return $_SESSION[hos_id];
		}
	}
	
    /**
     * monta um array com os dados que deverão ser exibidos em options de select
	 *
     * @return array
     */
	function getOptions(){
		$objs	= Hospital::getAll();
        $out 	= array();
        foreach($objs as $o) {
            $out[$o->get("hos_id")] = $o->get("hos_nome");
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
		$ordenacao["campo_ordenacao"] 		= ($ordenacao["campo_ordenacao"] ? $ordenacao["campo_ordenacao"] : "hos_nome");
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
		
		$campo = "hos_nome";
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

		$sql 	= "hos_login = ".$this->get("hos_login");
		if (mysql_num_rows(Db::sql($sql_inicio.$sql.$sql_fim))){
			$this->propertySetError ("hos_login", "Já existe no banco de dados.");
		}

		$sql 	= "hos_nome = ".$this->get("hos_nome");
		if (mysql_num_rows(Db::sql($sql_inicio.$sql.$sql_fim))){
			$this->propertySetError ("hos_nome", "Já existe no banco de dados.");
		}
		
		$sql 	= "hos_email = ".$this->get("hos_email");
		if (mysql_num_rows(Db::sql($sql_inicio.$sql.$sql_fim))){
			$this->propertySetError ("hos_email", "Já existe no banco de dados.");
		}
	}
	
    /**
     * pega informacoes sobre todos os registros de outras tabelas que estão relacionados com o registro atual
	 * 
	 * suas informações serão usadas no método {@link Base::deleteDependences()} e na montagem da interface que apontará quais registros estão vinculados ao registro atual, na hora da exclusão.
	 * este método é normalmente chamado em {@link Base::delete()}
     *
	 * @return array
     */
     function setdependences() {
		$dep 	= array();

		$sql 	= "select * from convenio where ".$this->pk." = ".$this->get($this->pk);
		$rs 	= Db::sql($sql);
		while ($r = mysql_fetch_assoc($rs)){
			$dep[]	= array(
				"sql_del"	=> "
					delete from 
						convenio c, 
						valor_exame v
					where 
						".$this->pk." = ".$r[$this->pk]."
						and c.con_id = v.con_id
					",
				"label"		=> "Convênio ".$r["con_nome"],
				"url"		=> "",
			);
		}
		
		$sql 	= "select * from interpretacao where ".$this->pk." = ".$this->get($this->pk);
		$rs 	= Db::sql($sql);
		while ($r = mysql_fetch_assoc($rs)){
			$dep[]	= array(
				"sql_del"	=> "
					delete from 
						interpretacao
					where 
						".$this->pk." = ".$r[$this->pk]."
					",
				"label"		=> "Interpretação de ".$r["int_paciente_nome"],
				"url"		=> "",
			);
		}
		$this->dependences = $dep;
    }
}
?>