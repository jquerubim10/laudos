<?
	Util::VerificaChamada();
	$o = new Interpretacao();

	foreach($o->propertiesGetConfig() as $campo => $config){
		$tpl->assign($campo, 		$_POST[$campo]);
		$o->set($campo,			$_POST[$campo]);
	}
	$tpl->assign("vet_exames", 	Exame::getOptions());
	$tpl->assign("vet_convenios", 	Convenio::getOptions());

	if ($_POST[form] == "ok"){
		$sep				= "\[.SEPARADOR.\]";
		$name				= "prontuarios";
		$_POST[$name]		= split($sep,$_POST[$name]);
		unset($_POST[$name][0]);
		$name				= "nomes";
		$_POST[$name]		= split($sep,$_POST[$name]);
		unset($_POST[$name][0]);
		$name				= "sexos";
		$_POST[$name]		= split($sep,$_POST[$name]);
		unset($_POST[$name][0]);
		$name				= "datas";
		$_POST[$name]		= split($sep,$_POST[$name]);
		unset($_POST[$name][0]);
		$name				= "exames";
		$_POST[$name]		= split($sep,$_POST[$name]);
		unset($_POST[$name][0]);
		$name				= "convenios";
		$_POST[$name]		= split($sep,$_POST[$name]);
		unset($_POST[$name][0]);
		$name				= "opcionais";
		$_POST[$name]		= split($sep,$_POST[$name]);
		unset($_POST[$name][0]);
		$name				= "requisitantes";
		$_POST[$name]		= split($sep,$_POST[$name]);
		unset($_POST[$name][0]);
		$name				= "tecnicos";
		$_POST[$name]		= split($sep,$_POST[$name]);
		unset($_POST[$name][0]);
	//	prt("", $_POST);
	//	exit();
		$data_cadastro		= date("Y-m-d H:i:s");
		for($i=1; $i<=intval($_POST["contador"]); $i++){
			$o = new Interpretacao();
			$con		= new Convenio($_POST["convenios"][$i]);
			$hos		= new Hospital($con->get("hos_id"));
			$exa		= new Exame($_POST["exames"][$i]);
			
			$o->set("hos_id"				, $con->get("hos_id"));
			$o->set("con_id"   				, $_POST["convenios"][$i]);
			$o->set("exa_id"   				, $_POST["exames"][$i]);
			
			$o->set("int_status"   					, "nao_interpretado");
			$o->set("int_data_cadastro"				, $data_cadastro);
			
			$o->set("int_paciente_nome"   			, $_POST["nomes"][$i]);
			$o->set("int_paciente_sexo"   			, $_POST["sexos"][$i]);
			$o->set("int_paciente_nascimento"		, Formatacao::formatData($_POST["datas"][$i]));
			$o->set("int_paciente_prontuario"   	, $_POST["prontuarios"][$i]);
			$o->set("int_opcional"   				, $_POST["opcionais"][$i]);
			$o->set("int_tecnico_rx"   				, $_POST["tecnicos"][$i]);
			$o->set("int_requisitante"   			, $_POST["requisitantes"][$i]);
			
			$valor_absoluto							= $exa->getValorAbsoluto($_POST["convenios"][$i]);
			$valor_contraste						= $exa->getValorContraste($_POST["convenios"][$i]);
			$ch										= $exa->getCh($_POST["convenios"][$i]);
			$filme									= $exa->getFilme($_POST["convenios"][$i]);
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

			$new_id = $o->add();
		}
		Js::goto(array("url" => "index.php?s=interpretacao"));
	}
	
	$template_html = $path_tpl."formulario_add_discado.tpl";
?>