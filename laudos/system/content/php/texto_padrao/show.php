<?
	Util::VerificaChamada();
	if($_GET[id]){
		$o = new TextoPadrao($_GET[id]);
		//$o->setDependences();
		//util::prt("", get_class_methods($o));
		foreach($o->propertiesGetConfig() as $campo => $config){
			$tpl->assign($campo, 	$o->get($campo));
		}
		
		if ($_GET[del] == "1" || $_POST[del] == "1"){
			if ($o->delete($_GET[delete_dependences])){
				Js::goto(array("url" => "index.php?s=texto_padrao"));
			} else {
				$dep = $o->getDependences();
				if (sizeof($dep)){
					$tpl->assign("dependences", 	$dep);
				}
			}
		}
	} else {
		Js::goto(array("url" => "index.php?s=convenio"));
	}
	$template_html = $path_tpl."show.tpl";
?>