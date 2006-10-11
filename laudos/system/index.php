<?
//inicializa a sessуo
	if (!isset($_SESSION)) {
		session_cache_limiter('none');
		session_start();
	}
	
	function getmicrotime() 
	{ 
	   list($usec, $sec) = explode(" ", microtime()); 
	   return ((float)$usec + (float)$sec); 
	}
	$time_start = getmicrotime();
//Chamada de bibliotecas
	require_once('config/config.php');
	require_once('config/config.db.php');
	
	ini_set("session.save_path", SESSION_PATH);
	ini_set("max_execution_time", "120");
	set_include_path(".");
	
	require_once("../lib/php/classes/Utilitarios/class.Util.php");
	require_once("../lib/php/classes/Db/class.Db.php");
	require_once("../lib/php/classes/Utilitarios/class.Validacao.php");
	require_once("../lib/php/classes/Utilitarios/class.Formatacao.php");
	require_once("../lib/php/classes/Utilitarios/class.Js.php");
	require_once("../lib/php/classes/Utilitarios/class.Files.php");
	require_once("../lib/php/classes/Base/class.Base.php");
	require_once("../lib/php/classes/Base/class.Pagination.php");
	require_once (SMARTY_DIR."Smarty.class.php");
	require_once("lib/php/classes/class.Laudos.php");

//conecta no banco
	$db = new Db($dbhost, $dbuname, $dbpass, $dbname);

	require_once('config/config.menu.php');
	
	//if(!isset($_SESSION["content_classes"])){
		//$_SESSION["content_classes"] = Files::getArrayFromPath("content/classes");
	//}
	
	//Files::includeFiles("content/classes", $_SESSION["content_classes"]);
	require_once("content/classes/class.Convenio.php");
	require_once("content/classes/class.Exame.php");
	require_once("content/classes/class.Hospital.php");
	require_once("content/classes/class.Interpretacao.php");
	require_once("content/classes/class.TextoPadrao.php");
	require_once("content/classes/class.ValorExame.php");

//cria as variсveis que determinarуo o caminho para o arquivo solicitado	
	$s = (!empty($_GET["s"]) ? $_GET["s"] : "home");
	$ss = (!empty($_GET["ss"]) ? $_GET["ss"] : "");
	$sss = (!empty($_GET["sss"]) ? $_GET["sss"] : "");
	$ssss = (!empty($_GET["ssss"]) ? $_GET["ssss"] : "");
	$sssss = (!empty($_GET["sssss"]) ? $_GET["sssss"] : "");
	
//verifica se o usuсrio estс logado
	if ($_SESSION["med_id"] == "" && $s != "autenticacao"){
		Js::code("document.location.href = 'index.php?s=autenticacao';");
	}

//cria a variсvel que determinarс a aчуo (add, upate, show, etc)
	$acao = (!empty($_GET["acao"]) ? $_GET["acao"] : "");
	
//define o caminho GET do script atual, incluindo todos as outras variaveis enviadas via GET
	$self = $_SERVER['PHP_SELF'];
	if (isset($_SERVER['QUERY_STRING'])) {
		$self .= "?" . htmlentities($_SERVER['QUERY_STRING']);
		define("SELF", $self);
	}
	
//define o caminho GET da seчao atual. somente as variaveis GET que determinam o caminho
	$vars_secao = "?";
	$vars_secao .= (!empty($s)? "s=".$s : "");
	$vars_secao .= (!empty($ss)? "&ss=".$ss : "");
	$vars_secao .= (!empty($sss)? "&sss=".$sss : "");
	$vars_secao .= (!empty($ssss)? "&ssss=".$ssss : "");
	$vars_secao .= (!empty($sssss)? "&sssss=".$sssss : "");
	define("VARS_SECAO", $vars_secao);
	
	define("INPUT_SECAO", Util::mount_post_vars(
		array(
			"s" => $s,
			"ss" => $ss,
			"sss" => $sss,
			"ssss" => $ssss,
			"sssss" => $sssss,
		)
	));
	
//monta o caminho das pastas de acordo com as variaveis do GET
	$path_php = "content/php/";
	$path_php .= (!empty($s)? $s."/" : "");
	$path_php .= (!empty($ss)? $ss."/" : "");
	$path_php .= (!empty($sss)? $sss."/" : "");
	$path_php .= (!empty($ssss)? $ssss."/" : "");
	$path_php .= (!empty($sssss)? $sssss."/" : "");
	
//monta o caminho das pastas dos templates de acordo com as variaveis do GET
	$path_tpl = "content/templates/";
	$path_tpl .= (!empty($s)? $s."/" : "");
	$path_tpl .= (!empty($ss)? $ss."/" : "");
	$path_tpl .= (!empty($sss)? $sss."/" : "");
	$path_tpl .= (!empty($ssss)? $ssss."/" : "");
	$path_tpl .= (!empty($sssss)? $sssss."/" : "");
	
//define qual o arquivo serс carregado na pagina escolhida
	$arq = (!empty($acao)? $acao : "index");

//define qual o design serс carregado	
	$design = "padrao";
	if (!empty($_GET["design"]))
		$design = $_GET["design"];
//define qual o css serс carregado	
	$css = "padrao";
	if (!empty($_GET["css"]))
		$css = $_GET["css"];
		
//define uma constante com o link atual
	$vars_get_options = Util::mount_get_vars(
		array(
			"css"		=> $_GET["css"],
			"design"	=> $_GET["design"],
			"acao"		=> $_GET["acao"],
		)
	);
	define("LINK_BASE_ATUAL", "index.php".VARS_SECAO.$vars_get_options);
	
//concatena a informaчуo do caminho com o nome do arquivo a ser carregado
	$include 	= $path_php . $arq . ".php";
	
	define("TITULO_SECAO", Manager::TituloSecaoAtual());
	
	$tpl = new Smarty;
	
	require_once($include);//chama o script solicitado

	$time_end = getmicrotime();
	$time = $time_end - $time_start;
	if ($template_html)	{
		$tpl->assign('conteudo_menu', 					Manager::PreparaArrayMenu());
		$tpl->assign('str_tabs', 						Manager::htmlTabs($acao, $_GET[id], VARS_SECAO));
		$tpl->assign('titulo_secao', 					TITULO_SECAO);
		$tpl->assign('self', 							SELF);
		$tpl->assign('vars_secao', 						VARS_SECAO);
		$tpl->assign('input_secao',						INPUT_SECAO);
		$tpl->assign('path_tpl', 						$path_tpl);
		$tpl->assign('design', 							$design);
		$tpl->assign('css', 							$css);
		$tpl->assign('acao', 							$acao);
		$tpl->assign('medico',							$_SESSION["medico"]);
		$tpl->assign('tpl_login', 						($_SESSION["medico"] == "1" ? $_SESSION[med_login] : $_SESSION[hos_login]));
		$tpl->assign('tpl_nome', 						($_SESSION["medico"] == "1" ? $_SESSION[med_nome] : $_SESSION[hos_nome]));
		$tpl->assign('hoje', 							Util::translateDay(date("l"))." - ".date("d/m/Y"));
		$tpl->assign('id', 								$_GET[id]);
		$tpl->assign('time', 							$time);
		$tpl->display($template_html);
	}
	
?>