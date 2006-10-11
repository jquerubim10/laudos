<?
	Util::VerificaChamada();
	if($_GET[id]){
		$o = new ValorExame($_GET[id]);

		$con_id = (empty($_POST["con_id"]) ? $o->get("con_id") : $_POST["con_id"]);
		if ($con_id){
			$con = new Convenio($con_id);
			$tpl->assign("con_valor_ch", 	$con->get("con_valor_ch"));
			$tpl->assign("con_valor_filme",	$con->get("con_valor_filme"));
		}

		foreach($o->propertiesGetConfig() as $campo => $config){
			$tpl->assign($campo, 		(empty($_POST[$campo]) ? $o->get($campo) : $_POST[$campo]));
			$o->set($campo,				$_POST[$campo]);
		}
		$tpl->assign("vet_exames", 				Exame::getOptions());
		$tpl->assign("vet_convenios", 			Convenio::getOptions());
		
		if ($_POST[form] == "ok"){
			if ($o->update()){
				Js::goto(array("url" => "index.php?s=valor_exame"));
			} else {
				foreach($o->errors as $campo => $erro){
					$tpl->assign($campo."_erro", $erro);
					$tpl->assign($campo, "");
				}
			}
		}
	} else {
		Js::goto(array("url" => "index.php?s=valor_exame"));
	}
	
	$template_html = $path_tpl."formulario.tpl";
?>