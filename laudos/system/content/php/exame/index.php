<?
	Util::VerificaChamada();
	$o = new Exame();
	$filtros			= array(
		"med_id"			=> $_GET["med_id"],
			"exa_nome"			=> $_GET["exa_nome"],
			
	);
	$ordenacao			= array(
		"campo_ordenacao"		=> $_GET["campo_ordenacao"],
		"tipo_ordenacao"		=> $_GET["tipo_ordenacao"]
	);
	$tamanho_pagina 	= (empty($_GET["tamanho_pagina"]) ? 20 : intval($_GET["tamanho_pagina"]));
	$pagina 			= (empty($_GET["pagina"]) ? 0 : intval($_GET["pagina"]));
	
	$o->setSqlBusca($filtros, $ordenacao, $tamanho_pagina);
	$p = new Pagination ($o->getLinkBasePaginacao(), $o->getSqlBusca(), $tamanho_pagina, $pagina);

	$tpl->assign("seta_ordenacao", 			$o->getSetasOrdenacao());
	$tpl->assign("link_ordenacao", 			$o->getLinksOrdenacao());
	$tpl->assign("vet_tamanho_pagina", 		array("10", "20", "30", "50", "100"));
	$tpl->assign("tamanho_pagina", 			$tamanho_pagina);
	$tpl->assign("total_registros", 			$p->getTotalRegistros());
	$tpl->assign("registros", 				$p->getRegistrosPagina());
	$tpl->assign("paginacao", 				$p->getHtml());
	
	$template_html = $path_tpl."gerenciar.tpl";
?>