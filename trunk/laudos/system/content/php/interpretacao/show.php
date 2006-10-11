<?
	Util::VerificaChamada();
	if($_GET[id]){
		$o = new Interpretacao($_GET[id]);
		//$o->setDependences();
		//util::prt("", get_class_methods($o));
		foreach($o->propertiesGetConfig() as $campo => $config){
			$tpl->assign($campo, 	$o->get($campo));
		}
		
		$hos = new Hospital($o->get("hos_id"));
		$tpl->assign("hos_nome", 	$hos->get("hos_nome"));
		
		$con = new Convenio($o->get("con_id"));
		$tpl->assign("con_nome", 	$con->get("con_nome"));
		
		$exa = new Exame($o->get("exa_id"));
		$tpl->assign("exa_nome", 	$exa->get("exa_nome"));
		
		if ($_GET[del] == "1" || $_POST[del] == "1"){
			if($_SESSION["medico"] == "1"){
				if ($o->delete($_GET[delete_dependences])){
					Js::goto(array("url" => "index.php?s=interpretacao"));
				} else {
					$dep = $o->getDependences();
					if (sizeof($dep)){
						$tpl->assign("dependences", 	$dep);
					}
				}
			} else {
				Js::goto(array("url" => "index.php?s=interpretacao&acao=show&id=".$_GET[id]));
			}
		}
	} else {
		Js::goto(array("url" => "index.php?s=convenio"));
	}
	$template_html = $path_tpl."show.tpl";
?>