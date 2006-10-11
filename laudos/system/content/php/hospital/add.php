<?
	Util::VerificaChamada();
	$o = new Hospital();
	$_POST["med_id"] = $_SESSION["med_id"];
	foreach($o->propertiesGetConfig() as $campo => $config){
		$tpl->assign($campo, 		$_POST[$campo]);
		$o->set($campo,			$_POST[$campo]);
	}
	if ($_POST[form] == "ok"){
		//$o->propertiesDump(true);
		if ($new_id = $o->add()){
			Js::goto(array("url" => "index.php?s=hospital"));
		} else {
			foreach($o->errors as $campo => $erro){
				$tpl->assign($campo."_erro", $erro);
				$tpl->assign($campo, "");
			}
		}
	}
	
	$template_html = $path_tpl."formulario.tpl";
?>