<?
	Util::VerificaChamada();
	if($_GET[id]){
		$o = new Convenio($_GET[id]);
		
		foreach($o->propertiesGetConfig() as $campo => $config){
			$tpl->assign($campo, 		(empty($_POST[$campo]) ? $o->get($campo) : $_POST[$campo]));
			$o->set($campo,				$_POST[$campo]);
		}
		$tpl->assign("vet_hospitais", 	Hospital::getOptions());
		$tpl->assign("vet_convenios", 	Convenio::getOptions());
		if ($_POST[form] == "ok"){
			if ($o->update()){
				if ($_POST["con_convenio_desc"] != ""){
					$o->descontaValores($_POST["con_desconto"], $_POST["con_convenio_desc"]);
				}
				Js::goto(array("url" => "index.php?s=convenio"));
			} else {
				foreach($o->errors as $campo => $erro){
					$tpl->assign($campo."_erro", $erro);
					$tpl->assign($campo, "");
				}
			}
		}
	} else {
		Js::goto(array("url" => "index.php?s=convenio"));
	}
	
	$template_html = $path_tpl."formulario.tpl";
?>