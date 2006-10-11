<?
	Util::VerificaChamada();
	$o = new Convenio();

	foreach($o->propertiesGetConfig() as $campo => $config){
		$tpl->assign($campo, 		$_POST[$campo]);
		$o->set($campo,				$_POST[$campo]);
	}
	$tpl->assign("vet_hospitais", 	Hospital::getOptions());
	//util::prt("",$o->exists());
	if ($_POST[form] == "ok"){
		//$o->propertiesDump(true);
		if ($new_id = $o->add()){
			Js::goto(array(
				"url" => "index.php?s=convenio&acao=add",
				"post_vars" => array(
					"hos_id" => $_POST[hos_id]
				)
			));
		} else {
			foreach($o->errors as $campo => $erro){
				$tpl->assign($campo."_erro", $erro);
				$tpl->assign($campo, "");
			}
		}
	}
	
	$template_html = $path_tpl."formulario.tpl";
?>