<?
	Util::VerificaChamada();
	if(is_numeric($_GET[id])){
		if($_SESSION["medico"] == "1"){
			$o = new Interpretacao($_GET[id]);
			
			foreach($o->propertiesGetConfig() as $campo => $config){
				$tpl->assign($campo, 		(empty($_POST[$campo]) ? $o->get($campo) : $_POST[$campo]));
				//util::prt($campo, (empty($_POST[$campo]) ? $o->get($campo) : $_POST[$campo]));
				//$o->set($campo,				$_POST[$campo]);
			}
			$hos = new Hospital($o->get("hos_id"));
			$tpl->assign("hos_nome", 	$hos->get("hos_nome"));
			
			$con = new Convenio($o->get("con_id"));
			$tpl->assign("con_nome", 	$con->get("con_nome"));
			
			$exa = new Exame($o->get("exa_id"));
			$tpl->assign("exa_nome", 	$exa->get("exa_nome"));
			
			$tpl->assign("textos", 	TextoPadrao::getToJs());
			
			if ($_POST[form] == "ok"){
				$o->propertiesClearConfig();
				$o->propertiesSetConfig(
					array(
						"int_status"	=> array(
							"titulo"		=> "Situaчуo",
							"requerido"		=> "",
							"validacao"		=> "Text",
						),
						"int_data_interpretacao"	=> array(
							"titulo"		=> "Data de Interpretaчуo",
							"requerido"		=> "",
							"validacao"		=> "DataHoraMinSeg",
						),
						"int_texto"	=> array(
							"titulo"		=> "Interpretacao",
							"requerido"		=> "1",
							"validacao"		=> "Text",
						),
					)
				);
				$o->set("int_texto"						, $_POST["int_texto"]);
				$o->set("int_status" 					, "interpretado");
				$o->set("int_data_interpretacao" 		, date("d/m/Y H:i:s"));
				if ($o->update()){
					Js::goto(array("url" => "index.php?s=interpretacao"));
				} else {
					foreach($o->errors as $campo => $erro){
						$tpl->assign($campo."_erro", $erro);
						$tpl->assign($campo, "");
					}
					//util::prt("",$o->errors);
				}
			}
		} else {
			Js::goto(array("url" => "index.php?s=interpretacao&acao=show&id=".$_GET[id]));
		}
	} else {
		Js::goto(array("url" => "index.php?s=interpretacao"));
	}
	
	$template_html = $path_tpl."formulario_update.tpl";
?>