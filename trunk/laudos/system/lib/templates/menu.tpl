<div style="margin-left:10px; margin-top:15px; ">
{.foreach name=s from=$conteudo_menu key=name_s item=info_s .}
	<a href="index.php?s={.$name_s.}">{.$info_s.nome.}</a><br>
	{.foreach name=ss from=$info_s.sub key=name_ss item=info_ss .}
		&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php?s={.$name_s.}&ss={.$name_ss.}">{.$info_ss.nome.}</a><br>
		{.foreach name=sss from=$info_ss.sub key=name_sss item=info_sss .}
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php?s={.$name_s.}&ss={.$name_ss.}&sss={.$name_sss.}">{.$info_sss.nome.}</a><br>
		{./foreach.}
	{./foreach.}
{./foreach.}
</div>