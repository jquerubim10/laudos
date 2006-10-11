{.include file="lib/templates/$design.top.tpl".}
	<LINK REL=StyleSheet HREF="{.$path_tpl.}gerenciar.css" media="screen" TYPE="text/css"
	<LINK REL=StyleSheet HREF="{.$path_tpl.}gerenciar.css" media="print" TYPE="text/css">
	<form id="form" name="form" action="index.php" method="get" >
		<input type="hidden" name="tamanho_pagina" value="{.$tamanho_pagina.}"/>
	{.$input_secao.}
	{.if $int_status == "interpretado" or $int_status == "impresso".}
		<div class="imprimir">
			<a target="_blank" href="index.php?s=interpretacao&pdf=sim&hos_id={.$hos_id.}&int_status={.$int_status.}&int_paciente_nome={.$int_paciente_nome.}&int_data_inicial={.$int_data_inicial.}&int_data_final={.$int_data_final.}&tamanho_pagina=10000" class="imprimir">Imprimir Laudos</a><br />
		</div>
	{./if.}

		<div class="hos_id">
			<label>Hospital:</label><br />
			<select class="hos_id" name="hos_id">
				{.html_options options=$vet_hospitais selected=$hos_id.}
			</select>
		</div>
		<div class="int_paciente_nome">
			<label>Nome do Paciente:</label><br />
			<input class="int_paciente_nome" value="{.$int_paciente_nome.}" type="text" name="int_paciente_nome">
		</div>		
		<div class="int_status">
			<label>Situação:</label><br />
			<select class="int_status" name="int_status">
				{.html_options options=$vet_status selected=$int_status.}
			</select>
		</div>
		<div class="int_data_inicial">
			<label>de:</label><br />
			<input maxlength="10" onKeyPress="return mascara_data(this, event);"  class="int_data_inicial" value="{.$int_data_inicial.}" type="text" name="int_data_inicial">
			{.* jscalendar field="document.form.int_data_inicial" *.}
		</div>
		<div class="int_data_final">
			<label>até:</label><br />
			<input maxlength="10" onKeyPress="return mascara_data(this, event);"  class="int_data_final" value="{.$int_data_final.}" type="text" name="int_data_final">
			{.* jscalendar field="document.form.int_data_final" *.}
		</div>
		
		<div class="botoes">
			<input class="bt_enviar" type="button" onClick="document.form.submit();" value="Buscar">
		</div>
		
	</form>
<br />
{.if $total_registros > 0.}
	{.$paginacao.}
	<table width="100%" cellpadding="3" cellspacing="1">
		<form name="form_tamanho_pagina" action="index.php" method="get">
		{.$input_secao.}
		<input type="hidden" name="hos_id" value="{.$hos_id.}" />
		<input type="hidden" name="int_status" value="{.$int_status.}" />
		<input type="hidden" name="int_paciente_nome" value="{.$int_paciente_nome.}" />
		<input type="hidden" name="int_data_inicial" value="{.$int_data_inicial.}" />
		<input type="hidden" name="int_data_final" value="{.$int_data_final.}" />
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
	<table width="100%" cellpadding="3" cellspacing="1">
		<tr bgcolor="#FFE6B0">

		

			<td width="115" onClick="href('{.$link_ordenacao.int_data_cadastro.}');" style="cursor:pointer;">
				<table width="100%" cellpadding="0" cellspacing="0">
					<tr>
						<td><strong>Data de Cadastro</strong></td>
						<td width="20" align="right">{.$seta_ordenacao.int_data_cadastro.}&nbsp;</td>
					</tr>
				</table>
			</td>

		

			<td width="" onClick="href('{.$link_ordenacao.int_paciente_nome.}');" style="cursor:pointer;">
				<table width="100%" cellpadding="0" cellspacing="0">
					<tr>
						<td><strong>Nome do Paciente</strong></td>
						<td width="20" align="right">{.$seta_ordenacao.int_paciente_nome.}&nbsp;</td>
					</tr>
				</table>
			</td>


			<td width="" onClick="href('{.$link_ordenacao.exa_nome.}');" style="cursor:pointer;">
				<table width="100%" cellpadding="0" cellspacing="0">
					<tr>
						<td><strong>Nome do Exame</strong></td>
						<td width="20" align="right">{.$seta_ordenacao.exa_nome.}&nbsp;</td>
					</tr>
				</table>
			</td>
		
			<!-- <td width="15%">&nbsp;</td> -->
		</tr>
	{.foreach from=$registros key=i item=r .}
		<tr bgcolor="#FFFFFF" style="cursor:pointer; " onClick="href('{.$vars_secao.}&acao={.if $medico == "1" && $int_status == "nao_interpretado".}update{.else.}show{./if.}&id={.$r.int_id.}')">
			<td>
				&nbsp;{.$r.int_data_cadastro|date_format:"%d/%m/%Y %H:%M:%S".}
			</td>
		
			<td>
				&nbsp;{.$r.int_paciente_nome.}
			</td>
			
			<td>
				&nbsp;{.$r.exa_nome.}
			</td>
		
<!-- 			<td align="center">
				<a href="{.$vars_secao.}&acao=show&id={.$r.int_id.}"><img src="images/bt_visualizar.gif" border="0"></a>&nbsp;
				{.if $medico == "1".}
				<a href="{.$vars_secao.}&acao=update&id={.$r.int_id.}"><img src="images/bt_editar.gif" border="0"></a>&nbsp;
				<a href="{.$vars_secao.}&acao=show&id={.$r.int_id.}&del=1"><img src="images/bt_excluir.gif" border="0"></a>
				{./if.}
			</td> -->
		</tr>
		<tr>
			<td colspan="3" height="1" bgcolor="#CCCCCC"></td>
		</tr>
	{./foreach.}
		<tr>
			<td colspan="3" height="10" bgcolor="#FFE6B0"></td>
		</tr>
		<tr>
			<td colspan="3" height="10"></td>
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
	