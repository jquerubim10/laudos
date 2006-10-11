{.include file="lib/templates/$design.top.tpl".}
	<LINK REL=StyleSheet HREF="{.$path_tpl.}gerenciar.css" media="screen" TYPE="text/css"
	<LINK REL=StyleSheet HREF="{.$path_tpl.}gerenciar.css" media="print" TYPE="text/css">
	<form id="form" name="form" action="index.php" method="get" >
		<input type="hidden" name="tamanho_pagina" value="{.$tamanho_pagina.}"/>
	{.$input_secao.}
		<div class="hos_id">
			<label>Hospital:</label><br />
			<select class="hos_id" name="hos_id">
				{.html_options options=$vet_hospitais selected=$hos_id.}
			</select>
		</div>
		<div class="periodo_mes">
			<label>Mês:</label><br />
			<select class="periodo_mes" name="periodo_mes">
				{.html_options options=$meses selected=$periodo_mes.}
			</select>
		</div>
		<div class="periodo_ano">
			<label>Ano:</label><br />
			<select class="periodo_ano" name="periodo_ano">
				{.html_options options=$anos selected=$periodo_ano.}
			</select>
		</div>
		<div class="agrupar">
			<label>Agrupar por:</label><br />
			<select class="agrupar" name="agrupar">
				{.html_options options=$agrupamentos selected=$agrupar.}
			</select>
		</div>		
		<div class="botoes">
			<input class="bt_enviar" type="button" onClick="document.form.submit();" value="Buscar">
		</div>
		
	</form>
<br />
{.if $total_registros > 0.}
	<table width="100%" cellpadding="3" cellspacing="1">
		<tr bgcolor="#FFE6B0">
			<td width="300">
				<strong></strong>
			</td>
			<td width="60" onClick="" align="right">
				<strong>Quantidade</strong>
			</td>
			<td width="100" onClick="" align="right">
				<strong>Valor Médico</strong>
			</td>
			<td width="100" onClick="" align="right">
				<strong>Valor Total</strong>
			</td>
		</tr>
	{.foreach from=$registros key=i item=r .}
		<tr bgcolor="#FFFFFF" style="" onClick="">
			<td>&nbsp;{.$r.agrupador.}</td>
			<td align="right">&nbsp;{.$r.q.}</td>
			<td align="right">&nbsp;R$ {.$r.vm|decimal.}</td>
			<td align="right">&nbsp;R$ {.$r.v|decimal.}</td>
		</tr>
		<tr>
			<td colspan="4" height="1" bgcolor="#CCCCCC"></td>
		</tr>
	{./foreach.}
		<tr bgcolor="#FFFFFF" style="" onClick="">
			<td>&nbsp;<strong>TOTAL</strong></td>
			<td align="right">&nbsp;<strong>{.$q_total.}</strong></td>
			<td align="right">&nbsp;<strong>R$ {.$vm_total|decimal.}</strong></td>
			<td align="right">&nbsp;<strong>R$ {.$v_total|decimal.}</strong></td>
		</tr>
		<tr>
			<td colspan="4" height="10" bgcolor="#FFE6B0"></td>
		</tr>
		<tr>
			<td colspan="4" height="10"></td>
		</tr>
	</table>
{.else.}
	<table width="" border="0" style="margin-left:30px; ">
		<tr>
			<td>
			{.if $periodo_mes == "" || $periodo_ano == "" .}
			Selecione um MÊS e um ANO.
			{. else .}
			Nenhum registro encontrado.
			{./if.}
			</td>
		</tr>
	</table>
{./if.}
{.include file="lib/templates/$design.footer.tpl".}
	