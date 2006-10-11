<?
	Util::VerificaChamada();
	if($_GET[id]){
		$o = new Exame($_GET[id]);
		$_POST["med_id"] = $_SESSION["med_id"];
		
		foreach($o->propertiesGetConfig() as $campo => $config){
			$tpl->assign($campo, 		(empty($_POST[$campo]) ? $o->get($campo) : $_POST[$campo]));
			$o->set($campo,				$_POST[$campo]);
		}
		if ($_POST[form] == "ok"){
			if ($o->update()){
				Js::goto(array("url" => "index.php?s=exame"));
			} else {
				foreach($o->errors as $campo => $erro){
					$tpl->assign($campo."_erro", $erro);
					$tpl->assign($campo, "");
				}
			}
		}
	} else {
		Js::goto(array("url" => "index.php?s=exame"));
	}
	
	$template_html = $path_tpl."formulario.tpl";
?>