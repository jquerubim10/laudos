{.include file="lib/templates/$design.top.tpl".}
	<LINK REL=StyleSheet HREF="{.$path_tpl.}gerenciar.css" media="screen" TYPE="text/css">
	<form id="form" name="form" action="index.php" method="get" >
	{.$input_secao.}
		<div class="exa_id">
			<label>Exame:</label> <span class="erro">{.$exa_id_erro.}</span><br />
			<select class="exa_id" type="text" name="exa_id">
			<option value=""></option>
			{.html_options options=$vet_exames selected=$exa_id.}
			</select>
		</div>
		<div class="con_id">
			<label>Convênio:</label> <span class="erro">{.$con_id_erro.}</span><br />
			<select class="con_id" type="text" name="con_id">
			<option value=""></option>
			{.html_options options=$vet_convenios selected=$con_id.}
			</select>
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
			<td width="320" onClick="href('{.$link_ordenacao.con_nome.}');" style="cursor:pointer;">
				<table width="100%" cellpadding="0" cellspacing="0">
					<tr>
						<td><strong>Convênio</strong></td>
						<td width="20" align="right">{.$seta_ordenacao.con_nome.}&nbsp;</td>
					</tr>
				</table>
			</td>
			<td width="" onClick="href('{.$link_ordenacao.exa_nome.}');" style="cursor:pointer;">
				<table width="100%" cellpadding="0" cellspacing="0">
					<tr>
						<td><strong>Exame</strong></td>
						<td width="20" align="right">{.$seta_ordenacao.exa_nome.}&nbsp;</td>
					</tr>
				</table>
			</td>
<!-- 			<td width="15%">&nbsp;</td> -->
		</tr>
	{.foreach from=$registros key=i item=r .}
		<tr bgcolor="#FFFFFF" style="cursor:pointer; " onClick="href('{.$vars_secao.}&acao=show&id={.$r.vex_id.}')">
			<td>
				{.$r.hos_nome.}&nbsp;&nbsp;|&nbsp;&nbsp;{.$r.con_nome.}
			</td>			
			<td>
				&nbsp;{.$r.exa_nome.}
			</td>
<!-- 			<td>
				<a href="{.$vars_secao.}&acao=show&id={.$r.vex_id.}"><img src="images/bt_visualizar.gif" border="0"></a>&nbsp;
				<a href="{.$vars_secao.}&acao=update&id={.$r.vex_id.}"><img src="images/bt_editar.gif" border="0"></a>&nbsp;
				<a href="{.$vars_secao.}&acao=show&id={.$r.vex_id.}&del=1"><img src="images/bt_excluir.gif" border="0"></a>
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
	