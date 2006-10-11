<?
	Util::VerificaChamada();
	$o = new Interpretacao();
	//util::prt("", $_SESSION);
	$_GET["int_status"] 			= ($_GET["int_status"] ? $_GET["int_status"] : ($_SESSION[medico] == "1" ? "nao_interpretado" : "interpretado"));
	$_GET["hos_id"]					= ($_GET["hos_id"] ? $_GET["hos_id"] : ($_SESSION["hos_id_listagem"] ? $_SESSION["hos_id_listagem"] : Hospital::getFirstId()));
	$_SESSION["hos_id_listagem"] 	= $_GET["hos_id"];
	
	$filtros			= array(
		"int_status"			=> $_GET["int_status"],
		"hos_id"				=> $_GET["hos_id"],
		"int_paciente_nome"		=> $_GET["int_paciente_nome"],
		"int_data_inicial"		=> $_GET["int_data_inicial"],
		"int_data_final"		=> $_GET["int_data_final"],
	);
	
	$ordenacao			= array(
		"campo_ordenacao"		=> ($_GET["campo_ordenacao"] ? $_GET["campo_ordenacao"] : "int_paciente_nome" ),
		"tipo_ordenacao"		=> ($_GET["tipo_ordenacao"] ? $_GET["tipo_ordenacao"] : "asc")
	);
	$tamanho_pagina 	= (empty($_GET["tamanho_pagina"]) ? 50 : intval($_GET["tamanho_pagina"]));
	$pagina 			= (empty($_GET["pagina"]) ? 0 : intval($_GET["pagina"]));
	
	$o->setSqlBusca($filtros, $ordenacao, $tamanho_pagina);
	$p = new Pagination ($o->getLinkBasePaginacao(), $o->getSqlBusca(), $tamanho_pagina, $pagina);
	if ($_GET[pdf] != "sim"){	
		$tpl->assign("vet_hospitais", 			Hospital::getOptions());
		$tpl->assign("vet_status", 				array("nao_interpretado" => "Não Interpretados", "interpretado" => "Interpretados", "impresso" => "Impressos"));
		$tpl->assign("int_status", 				$_GET["int_status"]);
		$tpl->assign("medico", 					$_SESSION[medico]);
		$tpl->assign("hos_id", 					$_GET["hos_id"]);
		$tpl->assign("int_paciente_nome",		$_GET["int_paciente_nome"]);
		$tpl->assign("int_data_inicial",		$_GET["int_data_inicial"]);
		$tpl->assign("int_data_final",			$_GET["int_data_final"]);
		$tpl->assign("seta_ordenacao", 			$o->getSetasOrdenacao());
		$tpl->assign("link_ordenacao", 			$o->getLinksOrdenacao());
		$tpl->assign("vet_tamanho_pagina", 		array("10", "20", "30", "50", "100", "300", "500"));
		$tpl->assign("tamanho_pagina", 			$tamanho_pagina);
		$tpl->assign("total_registros", 		$p->getTotalRegistros());
		$tpl->assign("registros", 				$p->getRegistrosPagina());
		$tpl->assign("paginacao", 				$p->getHtml());
		$template_html = $path_tpl."gerenciar.tpl";
	} else {
		//util::prt("", $p->getRegistrosPagina());
		$max_caracteres = 75;
		$rs = array();
		$i = 0;
		foreach($p->getRegistrosPagina() as $id => $r){
			//util::prt("", $r);
			$rs[$i]	= $r;
			$o = new Interpretacao($r["int_id"]);
			$hos = new Hospital($o->get("hos_id"));
			$rs[$i]["hos_nome"] = $hos->get("hos_nome");
			$con = new Convenio($o->get("con_id"));
			$rs[$i]["con_nome"] = $con->get("con_nome");
			$exa = new Exame($o->get("exa_id"));
			$rs[$i]["exa_nome"] = $exa->get("exa_nome");
			$vet_txt = split("\n",$r["int_texto"]);
			$rs[$i]["int_texto"] = "";
			foreach($vet_txt as $linha){
				if(strlen($linha) > $max_caracteres){
					//util::prt(strlen($linha), $linha);
					$parte1	= substr($linha,0,$max_caracteres)."\n";
					$parte2	= substr($linha,$max_caracteres,$max_caracteres)."\n";
					$parte3	= substr($linha,$max_caracteres*2,$max_caracteres)."\n";
					$parte4	= substr($linha,$max_caracteres*3,$max_caracteres)."\n";
					//util::prt("1", $parte1);
					//util::prt("2", $parte2);
					//util::prt("3", $parte3);
					//util::prt("4", $parte4);
					$rs[$i]["int_texto"] = $parte1.$parte2.$parte3.$parte4;
				} else {
					$rs[$i]["int_texto"] .= $linha."\n";
				};
			}
			//$rs[$i]["int_texto"] = "";//util::prt("", $r);
			$o->informaImpressao();
			$i++;
		}
		$tpl->assign("registros", 				$rs);
		$template_html = $path_tpl."print.tpl";
		//Manager::pdfLaudos($p->getRegistrosPagina());
	}
?>