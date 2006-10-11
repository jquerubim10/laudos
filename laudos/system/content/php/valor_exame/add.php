<?
	Util::VerificaChamada();
	$o = new ValorExame();

	foreach($o->propertiesGetConfig() as $campo => $config){
		$tpl->assign($campo, 		$_POST[$campo]);
		$o->set($campo,			$_POST[$campo]);
	}
	$tpl->assign("vet_exames", 	Exame::getOptions());
	$tpl->assign("vet_convenios", 	Convenio::getOptions());
	
	if ($_POST[con_id]){
		$con = new Convenio($_POST[con_id]);
		$tpl->assign("con_valor_ch", 	$con->get("con_valor_ch"));
		$tpl->assign("con_valor_filme",	$con->get("con_valor_filme"));
	}
	
	if ($_POST[form] == "ok"){
		//$o->propertiesDump(true);
		if ($new_id = $o->add()){
			Js::goto(array(
				"url" => "index.php?s=valor_exame&acao=add",
				"post_vars" => array(
					"exa_id"	=> $_POST["exa_id"],
					"con_id"	=> $_POST["con_id"]
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