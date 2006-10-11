<?
/**
 * Classe de acesso ao banco de dados mysql.
 * @package Db
 */
class Db {
	/**
	 * servidor de banco de dados.
	 *
	 * @var string
	 */
	var $host;
	
	/**
	 * nome do usuário.
	 *
	 * @var string
	 */
	var $login;
	
	/**
	 * senha do usuário.
	 *
	 * @var string
	 */
	var $password;
	
	/**
	 * nome da base de dados que será acessada.
	 *
	 * @var string
	 */
	var $dbname;
	
	/**
	 * Conexão com o banco de dados.
	 *
	 * @var dbconn
	 */
	var $conn;
	

	/**
	 * Método construtor da Classe
	 *
	 * Faz a conexão com o banco de dados
	 *
	 * @param string $host {@link $host}
	 * @param string $login {@link $login}
	 * @param string $password {@link $password}
	 * @param string $dbname {@link $dbname}
	 *
	 * @return recordset
	 */
	function Db($host, $login, $password, $dbname){
		$this->host 		= $host;
		$this->login 		= $login;
		$this->password 	= $password;
		$this->dbname 		= $dbname;
		
		$this->conn = mysql_pconnect($this->host, $this->login, $this->password);
		
		if (mysql_errno()){
			Util::prt("<strong>MySql Error</strong> Problemas de conexão com o banco de dados.", mysql_errno(). "<br>" .mysql_error()."\n<br>");
			exit();
		} else {
			mysql_select_db($this->dbname, $this->conn);
			if (mysql_errno()){
				Util::prt("<strong>MySql Error</strong> Problemas com a seleção do banco de dados.", mysql_errno(). "<br>" .mysql_error()."\n<br>");
				exit();
			}
		}
	}
	
	/**
	 * Método que executa todas as consultas sql do sistema
	 *
	 * funciona somente se existir uma variável de conexão com o banco de dados chamada $db
	 *
	 * @param string $sql consulta sql a ser executada
	 * @param string $info informações adicionais para ajudar a debugar
	 *
	 * @return recordset
	 */
	function sql($sql, $info=""){
		global $db;
		$conn = $db->conn;
		
		if (REGISTRA_SQL_LOG == "1"){
			$sql_log = "insert into sql_log (sql_sql, sql_dt) values (\"".htmlentities($sql,ENT_QUOTES)."\", now())";
			$rs_log = mysql_query($sql_log, $conn);
		}
		//Util::prt("", $sql);
		$rs = mysql_query($sql, $conn);
		if (mysql_errno()){
			Util::prt("<strong>MySql Error</strong> (".$info.")", mysql_errno(). "<br>" .mysql_error()."\n<br><b>Consulta:</b><br>\n".$sql."\n<br>");
			exit();
		} else {
			return($rs);
		}
	}
	
	/**
	 * Método que otimiza todas as tabelas de um determinado banco de dados
	 *
	 * funciona somente se existir uma variável de conexão com o banco de dados chamada $db
	 *
	 */
	function otimiza(){
		global $db;
		$rs = mysql_list_tables($db->dbname);
		while ($row = mysql_fetch_row($rs)) {
			$sql = "OPTIMIZE TABLE ".$row[0]."";
			$opt = mysql_query($sql, $db->conn);
		}
	}
}
?>