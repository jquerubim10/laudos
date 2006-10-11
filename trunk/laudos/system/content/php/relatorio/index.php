<?
	Util::VerificaChamada();
	$o = new Interpretacao();
	//util::prt("", $_SESSION);
	$_GET["hos_id"]		= ($_GET["hos_id"] ? $_GET["hos_id"] : ($_SESSION["hos_id_listagem"] ? $_SESSION["hos_id_listagem"] : Hospital::getFirstId()));
	$_GET["agrupar"]	= ($_GET["agrupar"] ? $_GET["agrupar"] : "con_id");
	$filtros		= array(
		"hos_id"		=> $_GET["hos_id"],
		"periodo_mes"	=> $_GET["periodo_mes"],
		"periodo_ano"	=> $_GET["periodo_ano"],
		"agrupar"		=> $_GET["agrupar"],
	);
	if ($filtros["periodo_mes"] && $filtros["periodo_ano"]){
		$o->setSqlRelatorio($filtros);
		$p = new Pagination ("", $o->getSqlBusca(), 1000, 0);
		$registros = $p->getRegistrosPagina();
		$agrupador = $registros[0][agrupador];
		$q_total = 0;
		$vm_total = 0;
		$v_total = 0;
		$rs = array();
		$i_rs = 0;
		foreach($registros as $i => $r){
			//util::prt($i, $r);
			//util::prt($agrupador, $r[agrupador]);
			if($agrupador != $r[agrupador]){
				$v_total += $v;
				$vm_total += $vm;
				//echo "SETA VALORES DO RESULTADO FINAL (".$agrupador.")";
				$rs[$i_rs] = array(
					"agrupador" => $agrupador,
					"q"			=> $q,
					"v"			=> $v,
					"vm"		=> $vm,
				);
				$i_rs++;
				//echo "inicializa";
				$q 	= 0;
				$vm = 0;
				$v 	= 0;

			} else {
				//echo "nao inicializa";
			}
			
			$q++;
			$v += floatval($r[valor_final]);
			$vm += (floatval($r[valor_final]) * floatval($r[percentual]) / 100);
			
			$q_total++;

			
			$agrupador = $r[agrupador];
			//util::prt("rs", $rs[$i_rs-1]);
			//util::prt("total", $v_total);
		}
		$v_total += $v;
		$vm_total += $vm;
		$rs[$i_rs] = array(
			"agrupador" => $agrupador,
			"q"			=> $q,
			"v"			=> $v,
			"vm"		=> $vm,
		);
		//util::prt("", $r);
		$tpl->assign("q_total", 				$q_total);
		$tpl->assign("vm_total", 				$vm_total);
		$tpl->assign("v_total", 				$v_total);
		$tpl->assign("total_registros", 		$p->getTotalRegistros());
		$tpl->assign("registros", 				$rs);
	}
	$tpl->assign("agrupamentos", 			array("exa_id" => "Exame", "con_id" => "Convênio"));
	$tpl->assign("meses", 					array(
												"" => "",
												"01" => "Janeiro", 
												"02" => "Fevereiro",
												"03" => "Março",
												"04" => "Abril",
												"05" => "Maio",
												"06" => "Junho",
												"07" => "Julho",
												"08" => "Agosto",
												"09" => "Setembro",
												"10" => "Outubro",
												"11" => "Novembro",
												"12" => "Dezembro",
											));
	$tpl->assign("anos", 					array(
												"" => "",
												"2005" => "2005", 
												"2006" => "2006", 
												"2007" => "2007", 
												"2008" => "2008", 
												"2009" => "2009",
											));
	$tpl->assign("int_status", 				$_GET["int_status"]);
	$tpl->assign("medico", 					$_SESSION[medico]);
	$tpl->assign("hos_id", 					$_GET["hos_id"]);
	$tpl->assign("periodo_mes",				$_GET["periodo_mes"]);
	$tpl->assign("periodo_ano",				$_GET["periodo_ano"]);
	$tpl->assign("agrupar",					$_GET["agrupar"]);
	$tpl->assign("vet_hospitais", 			Hospital::getOptions());
	$template_html = $path_tpl."gerenciar.tpl";

?>