<?
/**
 * Classe Base para a manipulaчуo de informaчѕes do banco de dados.
 * @package Base
 * @link http://www.checkplant.com.br/
 * @version 3.0
 * @copyright Copyright: 2001-2005 CheckPlant Sistemas de Rastreabilidade LTDA.
 * @author Andrщ Cantarelli; Alexandre Fachinello <checkplant@checkplant.com.br>
 * @access public
 */
class Base {
    /**
     * Conjunto de propriedades que serуo setadas durante o processamento das informaчѕes.
     *
     * @var array
     */
    var $properties = array();
	
    /**
     * Conjunto de valores que determinam as configuraчѕes das propriedades que serуo manipulados.
     *
     * @var array
     */
    var $propertiesConfig = array();
	
    /**
     * Variсvel temporсria dos Conjunto de valores que determinam as configuraчѕes das propriedades que serуo manipulados.
     *
     * @var array
     */
    var $propertiesConfigTmp = array();

    /**
     * nome da tabela que serс manipulada pelo objeto.
     *
     * @var string
     */
    var $table;

    /**
     * nome do campo chave primсria da tabela em questуo.
     *
     * @var string
     */
    var $pk;
	
    /**
     * vetor de erros.
	 *
	 * щ populado por {@link propertyValidate()} quando um valor de uma propriedade nуo щ vсlido.
	 *
	 * щ consultado pelos mщtodos {@link add()} e {@link update()}
     *
     * @var array()
     */
    var $errors = array();
	
    /**
     * vetor de dependъncias de exclusуo.
	 *
	 * informaчѕe de registros em outras tabelas que estуo vinculados ao registro atual.
	 * щ consultado pelos mщtodos {@link delete()} e {@link deleteDependences()}
     *
     * @var array()
     */
    var $dependences = array();
	
	/**
     * sql utilizado na busca de clientes
     *
     * @var string
     */
	var $sql_busca;
	/**
     * link base para a paginaчуo dos resultados da busca
     *
     * @var string
     */
	var $link_base_paginacao;
	
	/**
     * vetor contendo strings de conteњdo html que chama a seta que deve ou nуo ser exibida em cada titulo de coluna na tela de paginaчуo
     *
     * @var array
     */
	var $setas_ordenacao = array();
	
	/**
     * vetor contendo strings de links que devem ser exibidos em cada titulo de coluna na tela de paginacao
     *
     * @var array
     */
	var $links_ordenacao = array();
	
    /**
     * Construtor da classe
     *
     * @param string $id id do registro a ser acessado
     * @param string $table tabela a ser acessada
	 * @param string $pk nome do campo chave primсria da tabela
	 * @param string $propertiesConfig configuraчѕes das propriedades
     */
    function Base ($id='', $table='', $pk='') {
        $this->properties 				= array();
        $this->propertiesConfig     	= array();
        $this->table      				= $table;
        $this->pk         				= $pk;
        $this->errors     				= array();
		$this->dependences 				= array();
		if (is_numeric($id)) { // chave primсria
			$sql    = 'SELECT * FROM ' . $this->table . ' WHERE ' . $this->pk . ' = ' . $id . ' limit 1';
			//print $sql;exit();
			$rs = Db::sql($sql, "Base::Base");
			if (mysql_num_rows($rs)) {
				$this->properties = mysql_fetch_assoc($rs);
			}
		}
    }
	
    /**
     * Seta um valor a uma propriedade
     *
     * @param string $p nome da propriedade
     * @param string $v valor a ser setado
     */
    function set ($p, $v) {
        $this->properties[$p] = $v;
    }
	
	
    /**
     * Recupera o valor de uma propriedade
     *
     * @param string $p nome da propriedade
     */
    function get ($p) {
        return $this->properties[$p];
    }


    /**
     * Insere um registro no banco de dados de acordo com as propriedades setadas
     *
     * @return string|bool id do registro 
     */
    function add() {
		$sql = '';
		$tmp = $this->properties;
		unset($this->properties[$this->pk]); //
		$keys = array_keys($this->properties);
		foreach ($this->properties as $k => $v) {
			//Util::prt($k, $v);
			$this->propertyValidate($k, $v);
			$this->propertyFormat($k, $v);
		}
		if (in_array("exists",get_class_methods($this))){
			$this->exists();
		}
//		exit;
		if (sizeof($this->errors) == 0){
			$sql .= 'INSERT INTO ' . $this->table . ' (' . $this->pk . ', ' . join(', ', $keys) . ') '.
					'VALUES (NULL, ' . join(", ", array_values($this->properties)) . ')';
			//Util::prt("", $sql);
			$save = Db::sql($sql, "Base::add");
			$this->properties = $tmp;
			$this->set($this->pk, mysql_insert_id());
			return $this->get($this->pk);
		} else {
			$this->properties = $tmp;
			return false;
		}
    }
	
    /**
     * Atualiza um registro no banco de dados de acordo com as propriedades setadas
     *
     * @return bool id do registro 
     */
    function update () {
        if (is_numeric($id = $this->get($this->pk))) {
			$tmp = $this->properties;
            $sql    = '';
            $vUpd   = array();
            unset($this->properties[$this->pk]);
            $sql .= 'UPDATE ' . $this->table . ' SET ';
            foreach ($this->properties as $k => $v){
				$this->propertyValidate($k, $v);
				$this->propertyFormat($k, $v);
                $vUpd[] = $k . " = " . $this->get($k);
			}
			//$this->propertiesDump();
            $sql .= join(', ', $vUpd);
            $sql .= ' WHERE ' . $this->pk . ' = ' . $id;
            $this->set($this->pk, $id); // restaura o valor //
			if (in_array("exists",get_class_methods($this))){
				$this->exists();
			}
			if (sizeof($this->errors) == 0){
				//Util::prt("", $sql);
	            $update = Db::sql($sql, "Base::update");
				$this->properties = $tmp;
	            return true;
			} else {
				return false;
			}
        }
    }


    /**
     * Remove um registro no banco de dados
	 * 
	 * Verificando suas dependъncias de exclusуo
     *
     * @return bool
     */
    function delete ($delete_dependences = "") {
        $id = $this->get($this->pk);
        if (is_numeric($id)) {
			if (in_array("setdependences",get_class_methods($this))){
				$this->setDependences();
				//exit();
			}
            $sql = 'DELETE FROM ' . $this->table . ' WHERE ' . $this->pk . ' = ' . $id;
			if((sizeof($this->getDependences()) == 0) || ($delete_dependences == "1")){ 
				$del = Db::sql($sql, "Base::delete");
				$this->deleteDependences();
				return true;
			} else { 
				return false;
			}
        } else {
            return false;
        }
    }
	
    /**
     * exclui todos os registros de outras tabelas que sуo relacionados com o registro atual
     *
     */
    function deleteDependences() {
		$dep = $this->getDependences();
		foreach ($dep as $d){
			if ($d["sql_del"]) {
				$del 	= Db::sql($d["sql_del"]);
			}
		}
    }

    /**
     * Recupera um array com todas dependъncias de exclusуo do registro atual
     *
     * @return array
     */
    function getDependences () {
        return $this->dependences;
    }
		

    /**
     * Recupera um array com todas as configuraчѕes de todas as propriedades
     *
     * @return array
     */
    function propertiesGetConfig () {
        return $this->propertiesConfig;
    }
	
    /**
     * Seta todas as configuracoes das propriedaes de uma vez sѓ, substituindo as existentes.
     *
     * @param array $c array de configuraчѕes array("nome_campo" => array("titulo"=>"Tэtulo", "requerido"=>"0", "validacao"=>"Text"))
     */
    function propertiesSetConfig ($c) {
        $this->propertiesConfig = $c;
		$this->propertiesConfigTmp = $this->propertiesConfig;
    }

    /**
     * Limpa todas as configuraчѕes das propriedades
     *
     */
    function propertiesClearConfig () {
        $this->propertiesConfig = array();
    }
	
    /**
     * Restaura todas as configuracoes das propriedaes com os valores iniciais.
     *
     */
    function propertiesRestoreConfig () {
        $this->propertiesConfig = $this->propertiesConfigTmp;
    }
	
    /**
     * Escreve na tela todas as configuraчѕes de todas as propriedades
     *
     * @param bool $exit determina se a execuчуo irс parar ou nуo, depois da exibiчao das informaчѕes
     */
    function propertiesDumpConfig ($exit=true) {
        Util::prt("Configuraчѕes das Propriedades da Classe", $this->propertiesConfig);
        if ($exit)
            exit();
    }
	
    /**
     * Seta o tэtulo nas configuraчѕes de uma propriedade
     *
     * @param string $p nome da propriedade
     * @param string $v titulo da propriedade
     */
    function propertySetTitulo ($p, $v) {
        $this->propertiesConfig[$p]["titulo"] = $v;
    }
	
    /**
     * Recupera o titulo nas configuraчѕes de uma determinada propriedade
     *
     * @param string $p nome da propriedade
     */
    function propertyGetTitulo ($p) {
        return $this->propertiesConfig[$p]["titulo"];
    }
	
    /**
     * Seta o valor que determina se uma propriedade щ requerida ou nуo
     *
     * @param string $p nome da propriedade
     * @param string $r requerido ou nуo ("0" ou "1")
     */
    function propertySetRequerido ($p, $v) {
        $this->propertiesConfig[$p]["requerido"] = $v;
    }
	
    /**
     * Retorna o se uma propriedade щ requerida ou nуo ("0" ou "1")
     *
     * @param string $p nome da propriedade
     */
    function propertyGetRequerido ($p) {
        return $this->propertiesConfig[$p]["requerido"];
    }
	
    /**
     * Seta o tipo de validaчуo nas configuraчѕes de uma propriedade
     *
     * @param string $p nome da propriedade
     * @param string $t tipo de validaчуo ("Uf", "Text", "Email", "Int", "Float")
     */
    function propertySetValidacao ($p, $v) {
        $this->propertiesConfig[$p]["validacao"] = $v;
    }
	
	
    /**
     * Seta uma mensagemde erro em uma propriedade
     *
     * @param string $p nome da propriedade
     * @param string $v erro
     */
    function propertySetError ($p, $v) {
        $this->errors[$p] = $v;
    }
	
    /**
     * Recupera o tipo de validaчуo nas configuraчѕes de uma determinada propriedade
     *
     * @param string $p nome da propriedade
     */
    function propertyGetValidacao ($p) {
        return $this->propertiesConfig[$p]["validacao"];
    }

    /**
     * Valida o valor de uma determinada propriedade
     *
	 * @param string $p nome da propriedade
	 * @param string $v valor da propriedade
     */
    function propertyValidate($p, $v) {
		//Util::prt($p, $v);
        if (array_key_exists($p, $this->propertiesConfig)){
			$validacao 		= $this->propertyGetValidacao($p);
			$requerido 		= $this->propertyGetRequerido($p);
			//Util::prt($p, "existe configuracao definida para esta propriedade");
			if(strlen($v) && strlen($validacao)){
				//Util::prt($p, "nуo щ vazio e possui um tipo de validacao");
				eval("\$valido = Validacao::is".$validacao."(\$v);");
				if (!$valido){
					//Util::prt($p, "valor invalido");
					$this->propertySetError ($p, "Valor Invсlido");
				}
			} else {
				//Util::prt($p, "щ vazio");
				if ($requerido == "1"){
					//Util::prt($p, "nao pode ser vazio");
					$this->propertySetError ($p, "Preenchimento Obrigatѓrio");
				}
			}
		}
		//exit;
    }
	
    /**
     * Formata o valor de uma determinada propriedade, preparando-o para ser inserido no banco de dados.
     *
	 * @param string $p nome da propriedade
	 * @param string $v valor da propriedade
     */
    function propertyFormat($p, $v) {
		//Util::prt($p, $v);
        if (array_key_exists($p, $this->propertiesConfig)){
			$formatacao 		= $this->propertyGetValidacao($p);
			//Util::prt($p, "existe configuracao definida para esta propriedade");
			if(strlen($v) && strlen($formatacao)){
				//Util::prt($p, "nуo щ vazio e possui um tipo de validacao");
//				Util::prt($p,$v);
				eval("\$v = Formatacao::format".$formatacao."(\$v);");
//				Util::prt($p,$v);
			}
		}
		$this->set($p,'"'.addslashes($v).'"');
		//exit;
    }
	
    /**
     * Remove todas as propriedades setadas
     *
     */
    function propertiesClear () {
        $this->properties = array();
    }

    /**
     * Exibe na pсgina o valor de todas as propriedades
     *
	 * @param bool $exit define se a execuчуo do php irс ser interrompida ou nуo, depois de exibir os valores
     */
    function propertiesDump($exit=true) {
        Util::prt("Propriedades da Classe", $this->properties);
        if ($exit)
            exit();
    }
	
    /**
     * retorna a propriedade {@link $setas_ordenacao}
     *
	 * @return array
     */
	function getSetasOrdenacao(){
		return $this->setas_ordenacao;
	}

    /**
     * retorna a propriedade {@link $links_ordenacao}
     *
	 * @return array
     */
	function getLinksOrdenacao(){
		return $this->links_ordenacao;
	}
	
    /**
     * retorna a propriedade {@link $link_base_paginacao}
     *
	 * @return string
     */
	function getLinkBasePaginacao(){
		return $this->link_base_paginacao;
	}
	
    /**
     * retorna a propriedade {@link $sql_busca}
     *
	 * @return string
     */
	function getSqlBusca(){
		return $this->sql_busca;
	}
}
?>