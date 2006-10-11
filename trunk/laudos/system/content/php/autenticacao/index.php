<?
	Util::VerificaChamada();
	if (util::browser_compativel()){
		//util::prt("",$_SESSION);
		if ($_SESSION["med_id"] == ""){
			if ($_POST[form] == "ok"){
				$login = $_POST['login'];
				$senha = $_POST['senha'];
				if($login != "" && $senha != ""){
					$sql 	= "SELECT * FROM medico WHERE med_login='".addslashes($login)."' AND med_senha = '".addslashes($senha)."'";
					$rs		= Db::sql($sql);
					$erro = true;
					if (mysql_num_rows($rs) == 0){
						$sql 	= "SELECT * FROM hospital, medico WHERE hos_login='".addslashes($login)."' AND hos_senha = '".addslashes($senha)."' and hospital.med_id = medico.med_id";
						$rs		= Db::sql($sql);
						if (mysql_num_rows($rs) == 0){
							$tpl->assign("login", "Informações Incorretas.");
						} else {
							$_SESSION = mysql_fetch_assoc($rs);
							$_SESSION[medico] 	= "0";
							$_SESSION[hospital] = "1";
							Js::code("document.location.href = 'index.php';");
							exit();
						}
					} else {
						$_SESSION = mysql_fetch_assoc($rs);
						$_SESSION[medico] 	= "1";
						$_SESSION[hospital] = "0";
						Js::code("document.location.href = 'index.php';");
						exit();
					}
				} else {
					$tpl->assign("login", "Informações Incorretas.");
				}
			}
			
			$template_html = $path_tpl."index.tpl";
		} else {
			Js::code("document.location.href = 'index.php';");
		}
	} else {
		Js::code("document.location.href = 'ie.htm';");
	}
?>