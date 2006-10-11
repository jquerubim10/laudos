{.include file="lib/templates/$design.top.tpl".}
	<LINK REL=StyleSheet HREF="{.$path_tpl.}gerenciar.css" media="screen" TYPE="text/css">
	<form id="form" name="form" action="index.php" method="get" >
	{.$input_secao.}
		<div class="imprimir">
			<a target="_blank" href="index.php?s=texto_padrao&imprimir=sim&&txp_codigo={.$txp_codigo.}&txp_texto={.$txp_texto.}&tamanho_pagina=10000" class="imprimir">Imprimir Textos</a><br />
		</div>
		<div class="txp_codigo">
			<label>Código:</label><br />
			<input class="txp_codigo" type="text" name="txp_codigo" value="{.$txp_codigo.}">
		</div>
	
		<div class="txp_texto">
			<label>Texto:</label><br />
			<input class="txp_texto" type="text" name="txp_texto" value="{.$txp_texto.}">
		</div>
	
		<div class="botoes">
			<input class="bt_enviar" type="button" onClick="document.form.submit();" value="Buscar">
		</div>
	</form>

{.if $total_registros > 0.}
	{.$paginacao.}
	<table width="540" cellpadding="3" cellspacing="1">
		<form name="form_tamanho_pagina" action="index.php" method="get">
		{.$input_secao.}
		<tr bgcolor="#FFFFFF">
			<td align="right">
				{.$total_registros.} Registro(s), mostrando 
				<select id="tamanho_pagina" name="tamanho_pagina" onChange="document.form_tamanho_pagina.submit();">
					{.html_options output=$vet_tamanho_pagina values=$vet_tamanho_pagina selected=$tamanho_pagina.}
				</select> por página.
			</td>
		</tr>
		</form>
	</table>
	<table width="540" cellpadding="3" cellspacing="1">
		<tr bgcolor="#FFE6B0">
			

			<td width="80" onClick="href('{.$link_ordenacao.txp_codigo.}');" style="cursor:pointer;">
				<table width="100%" cellpadding="0" cellspacing="0">
					<tr>
						<td><strong>Código</strong></td>
						<td width="20" align="right">{.$seta_ordenacao.txp_codigo.}&nbsp;</td>
					</tr>
				</table>
			</td>

		

			<td width="" onClick="href('{.$link_ordenacao.txp_texto.}');" style="cursor:pointer;">
				<table width="100%" cellpadding="0" cellspacing="0">
					<tr>
						<td><strong>Texto</strong></td>
						<td width="20" align="right">{.$seta_ordenacao.txp_texto.}&nbsp;</td>
					</tr>
				</table>
			</td>

		
<!-- 			<td width="15%">&nbsp;</td> -->
		</tr>
	{.foreach from=$registros key=i item=r .}
		<tr bgcolor="#FFFFFF" style="cursor:pointer; " onClick="href('{.$vars_secao.}&acao=show&id={.$r.txp_id.}')">
			
			<td valign="top" align="center">
				&nbsp;<b>{.$r.txp_codigo.}</b>
			</td>
		
			<td>
				&nbsp;{.$r.txp_texto.}
			</td>
		
<!-- 			<td>
				<a href="{.$vars_secao.}&acao=show&id={.$r.txp_id.}"><img src="images/bt_visualizar.gif" border="0"></a>&nbsp;
				<a href="{.$vars_secao.}&acao=update&id={.$r.txp_id.}"><img src="images/bt_editar.gif" border="0"></a>&nbsp;
				<a href="{.$vars_secao.}&acao=show&id={.$r.txp_id.}&del=1"><img src="images/bt_excluir.gif" border="0"></a>
			</td> -->
		</tr>
		<tr>
			<td colspan="2" height="1" bgcolor="#CCCCCC"></td>
		</tr>
	{./foreach.}
		<tr>
			<td colspan="2" height="10" bgcolor="#FFE6B0"></td>
		</tr>
		<tr>
			<td colspan="2" height="10"></td>
		</tr>

	</table>
	{.$paginacao.}


{.else.}
	<table width="540" border="0">
		<tr>
			<td>Nenhum registro encontrado.</td>
		</tr>
	</table>
{./if.}
{.include file="lib/templates/$design.footer.tpl".}
	