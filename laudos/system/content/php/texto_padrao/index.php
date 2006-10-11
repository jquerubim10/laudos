<?
	Util::VerificaChamada();
	$o = new TextoPadrao();
	$filtros			= array(
		"txp_codigo"			=> $_GET["txp_codigo"],
			"txp_texto"			=> $_GET["txp_texto"],
			
	);
	$ordenacao			= array(
		"campo_ordenacao"		=> $_GET["campo_ordenacao"],
		"tipo_ordenacao"		=> $_GET["tipo_ordenacao"]
	);
	$tamanho_pagina 	= (empty($_GET["tamanho_pagina"]) ? 20 : intval($_GET["tamanho_pagina"]));
	$pagina 			= (empty($_GET["pagina"]) ? 0 : intval($_GET["pagina"]));
	
	$o->setSqlBusca($filtros, $ordenacao, $tamanho_pagina);
	$p = new Pagination ($o->getLinkBasePaginacao(), $o->getSqlBusca(), $tamanho_pagina, $pagina);


	
	
	if ($_GET[imprimir] != "sim"){	
		$tpl->assign("seta_ordenacao", 			$o->getSetasOrdenacao());
		$tpl->assign("txp_codigo", 				$_GET["txp_codigo"]);
		$tpl->assign("txp_texto", 				$_GET["txp_texto"]);
		$tpl->assign("link_ordenacao", 			$o->getLinksOrdenacao());
		$tpl->assign("vet_tamanho_pagina", 		array("10", "20", "30", "50", "100"));
		$tpl->assign("tamanho_pagina", 			$tamanho_pagina);
		$tpl->assign("total_registros", 		$p->getTotalRegistros());
		$tpl->assign("registros", 				$p->getRegistrosPagina());
		$tpl->assign("paginacao", 				$p->getHtml());
		$template_html = $path_tpl."gerenciar.tpl";
	} else {
		//util::prt("", $p->getRegistrosPagina());
		$max_caracteres = 70;
		$rs = array();
		$i = 0;
		foreach($p->getRegistrosPagina() as $id => $r){
			//util::prt("", $r);
			$rs[$i]	= $r;
			//$o = new Interpretacao($r["int_id"]);
			//$hos = new Hospital($o->get("hos_id"));
			//$rs[$i]["hos_nome"] = $hos->get("hos_nome");
			//$con = new Convenio($o->get("con_id"));
		//	$rs[$i]["con_nome"] = $con->get("con_nome");
			//$exa = new Exame($o->get("exa_id"));
			//$rs[$i]["exa_nome"] = $exa->get("exa_nome");
			$vet_txt = split("\n",$r["txp_texto"]);
			$rs[$i]["txp_texto"] = "";
			foreach($vet_txt as $linha){
				if(strlen($linha) > $max_caracteres){
					//util::prt(strlen($linha), $linha);
					$parte1	= substr($linha,0,$max_caracteres)."<br>";
					$parte2	= substr($linha,$max_caracteres,$max_caracteres)."<br>";
					$parte3	= substr($linha,$max_caracteres*2,$max_caracteres)."<br>";
					$parte4	= substr($linha,$max_caracteres*3,$max_caracteres)."<br>";
					//util::prt("1", $parte1);
					//util::prt("2", $parte2);
					//util::prt("3", $parte3);
					//util::prt("4", $parte4);
					$rs[$i]["txp_texto"] = $parte1.$parte2.$parte3.$parte4;
				} else {
					$rs[$i]["txp_texto"] .= $linha."<br>";
				};
			}
			//$rs[$i]["int_texto"] = "";//util::prt("", $r);
			//$o->informaImpressao();
			$i++;
		}
		$tpl->assign("registros", 				$rs);
		$template_html = $path_tpl."print.tpl";
		//Manager::pdfLaudos($p->getRegistrosPagina());
	}
?>