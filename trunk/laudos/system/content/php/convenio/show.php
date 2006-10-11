<?
	Util::VerificaChamada();
	if($_GET[id]){
		$o = new Convenio($_GET[id]);
		//$o->setDependences();
		//util::prt("", get_class_methods($o));
		foreach($o->propertiesGetConfig() as $campo => $config){
			$tpl->assign($campo, 	$o->get($campo));
		}
		$hos = new Hospital($o->get("hos_id"));
		$tpl->assign("hos_nome", 	$hos->get("hos_nome"));
		
		if ($_GET[del] == "1" || $_POST[del] == "1"){
			if ($o->delete($_GET[delete_dependences])){
				Js::goto(array("url" => "index.php?s=convenio"));
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