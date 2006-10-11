<?
	Util::VerificaChamada();
	$o = new Interpretacao();

	foreach($o->propertiesGetConfig() as $campo => $config){
		$tpl->assign($campo, 		$_POST[$campo]);
		//$o->set($campo,				$_POST[$campo]);
		//util::prt($campo, $_POST[$campo]);
	}
	$tpl->assign("vet_exames", 	Exame::getOptions());
	$tpl->assign("vet_convenios", 	Convenio::getOptions());
	if ($_POST[form] == "ok"){
		$data_cadastro		= date("Y-m-d H:i:s");
		$con		= new Convenio($_POST["con_id"]);
		$hos		= new Hospital($con->get("hos_id"));
		$exa		= new Exame($_POST["exa_id"]);
		
		$o->set("hos_id"				, $con->get("hos_id"));
		$o->set("con_id"   				, $_POST["con_id"]);
		$o->set("exa_id"   				, $_POST["exa_id"]);
		
		$o->set("int_status"   					, "nao_interpretado");
		$o->set("int_data_cadastro"				, $data_cadastro);
		
		$o->set("int_paciente_nome"   			, $_POST["int_paciente_nome"]);
		$o->set("int_paciente_sexo"   			, $_POST["int_paciente_sexo"]);
		$o->set("int_paciente_nascimento"		, Formatacao::formatData($_POST["int_paciente_nascimento"]));
		$o->set("int_paciente_prontuario"   	, $_POST["int_paciente_prontuario"]);
		$o->set("int_opcional"   				, $_POST["int_opcional"]);
		$o->set("int_tecnico_rx"   				, $_POST["int_tecnico_rx"]);
		$o->set("int_requisitante"   			, $_POST["int_requisitante"]);
		
		$valor_absoluto							= $exa->getValorAbsoluto($_POST["con_id"]);
		$valor_contraste						= $exa->getValorContraste($_POST["con_id"]);
		$ch										= $exa->getCh($_POST["con_id"]);
		$filme									= $exa->getFilme($_POST["con_id"]);
		$valor_ch								= $con->get("con_valor_ch");
		$valor_filme							= $con->get("con_valor_filme");
		
		$o->set("int_percentual"   				, $hos->get("hos_percentual"));
		$o->set("int_valor_absoluto"			, $valor_absoluto);
		$o->set("int_valor_contraste"			, $valor_contraste);
		$o->set("int_ch"   						, $ch);
		$o->set("int_filme"						, $filme);
		$o->set("int_valor_ch"					, $valor_ch);
		$o->set("int_valor_filme"				, $valor_filme);
		$o->set("int_valor_final"				, strval(floatval($valor_absoluto) > 0 ? $valor_absoluto : floatval($valor_contraste) + (floatval($ch) * floatval($valor_ch)) + (floatval($filme) * floatval($valor_filme))));

		$o->propertiesClearConfig();
		
		if ($new_id = $o->add()){
			if ($_POST[mesmo_paciente] != "1") {
				Js::goto(array("url" => "index.php?s=interpretacao&acao=add"));
			} else {
				unset($_POST[form]);
				unset($_POST[exa_id]);
				unset($_POST[int_opcional]);
				Js::goto(array("url" => "index.php?s=interpretacao&acao=add",
				"post_vars" => $_POST));
			}
		} else {
			foreach($o->errors as $campo => $erro){
				$tpl->assign($campo."_erro", $erro);
				$tpl->assign($campo, "");
			}
		}
	}
	$tpl->assign("mesmo_paciente", 		$_POST["mesmo_paciente"]);
	$template_html = $path_tpl."formulario_add_bandalarga.tpl";
?>