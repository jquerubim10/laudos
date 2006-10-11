{.include file="lib/templates/$design.top.tpl".}
	<LINK REL=StyleSheet HREF="{.$path_tpl.}show.css" media="screen" TYPE="text/css">
	<form id="form" name="form" action="{.$self.}" method="post" >
		<input type="hidden" name="del" value="1">
		<input type="hidden" name="form">
		{.foreach name=dep from=$dependences key=i item=d .}
			{.if $smarty.foreach.dep.first.}
			<table width="100%" border="0" cellpadding="0" cellspacing="1" style="color:#CC3300;">
			<tr>
				<td><b>Existem informações vinculadas a este registro.</b></td>
			</tr>
			{./if.}
			<tr bgcolor="#CCCCCC">
				<td>
					&nbsp;{.$d.label.}
				</td>
			</tr>
			{.if $smarty.foreach.dep.last.}
			<tr>
				<td align="right">
					Deseja excluir este registro e todas as informações vinculadas a ele?<br>
					<a href="javascript:history.back();"><b style="color:#000000; ">Não</b></a>&nbsp;&nbsp;&nbsp;<a href="{.$vars_secao.}&acao=show&id={.$id.}&del=1&delete_dependences=1"><b style="color:#CC3300; ">Sim</b></a>
				</td>
			</tr>
			</table>
			{./if.}
		{./foreach.}
		
		<div class="hos_id">
			<label>Hospital:</label>
			<p class="hos_id">{.$hos_nome.}</p>
		</div>
		
		{.if $int_data_impressao|date_format:"%d/%m/%Y %H:%M:%S" != "30/11/1999 00:00:00".}
		<div class="int_data_impressao">
			<label>Data de Impressão:</label>
			<p class="int_data_impressao">{.$int_data_impressao|date_format:"%d/%m/%Y %H:%M:%S".}</p>
		</div>
		{./if.}
		{.if $int_data_interpretacao|date_format:"%d/%m/%Y %H:%M:%S" != "30/11/1999 00:00:00".}
		<div class="int_data_interpretacao">
			<label>Data de Interpretação:</label>
			<p class="int_data_interpretacao">{.$int_data_interpretacao|date_format:"%d/%m/%Y %H:%M:%S".}</p>
		</div>
		{./if.}
		{.if $int_data_cadastro|date_format:"%d/%m/%Y %H:%M:%S" != "30/11/1999 00:00:00".}
		<div class="int_data_cadastro">
			<label>Data de Cadastro:</label>
			<p class="int_data_cadastro">{.$int_data_cadastro|date_format:"%d/%m/%Y %H:%M:%S".}</p>
		</div>
		{./if.}
		<div class="int_paciente_prontuario">
			<label>Prontuário:</label>
			<p class="int_paciente_prontuario">{.$int_paciente_prontuario.}</p>
		</div>
		
		<div class="int_paciente_nome">
			<label>Nome do Paciente:</label>
			<p class="int_paciente_nome">{.$int_paciente_nome.}</p>
		</div>
		
		<div class="int_paciente_sexo">
			<label>Sexo:</label>
			<p class="int_paciente_sexo">{.$int_paciente_sexo.}</p>
		</div>
		
		<div class="int_paciente_nascimento">
			<label>Data de Nascimento:</label>
			<p class="int_paciente_nascimento">
			{.if $int_paciente_nascimento|date_format:"%d/%m/%Y" != "30/11/1999".}
				{.$int_paciente_nascimento|date_format:"%d/%m/%Y".}
			{./if.}</p>
		</div>
		
		<div class="exa_id">
			<label>Exame:</label>
			<p class="exa_id">{.$exa_nome.}</p>
		</div>
		
		<div class="int_opcional">
			<label>N° do Exame:</label>
			<p class="int_opcional">{.$int_opcional.}</p>
		</div>
		
		<div class="con_id">
			<label>Convênio:</label>
			<p class="con_id">{.$con_nome.}</p>
		</div>
		
	
		<div class="int_requisitante">
			<label>Médico requisitante:</label>
			<p class="int_requisitante">{.$int_requisitante.}</p>
		</div>
		
		<div class="int_tecnico_rx">
			<label>Técnico Rx:</label>
			<p class="int_tecnico_rx">{.$int_tecnico_rx.}</p>
		</div>
		
		<div class="int_texto">
			<label>Interpretação:</label>
			<p class="int_texto">{.$int_texto|nl2br.}</p>
		</div>
		
		{.if $medico == "1".}
		<div class="int_percentual">
			<label>Percentual:</label>
			<p class="int_percentual">{.$int_percentual|decimal.} %</p>
		</div>
		<div class="int_valor_absoluto">
			<label>Valor Absoluto do Exame:</label>
			<p class="int_valor_absoluto">R$ {.$int_valor_absoluto|decimal.}</p>
		</div>
		<div class="int_ch">
			<label>CH:</label>
			<p class="int_ch">{.$int_ch.}</p>
		</div>
		<div class="int_valor_ch">
			<label>Valor do CH:</label>
			<p class="int_valor_ch">R$ {.$int_valor_ch|decimal.}</p>
		</div>
		<div class="int_filme">
			<label>Filme:</label>
			<p class="int_filme">{.$int_filme|decimal4.}</p>
		</div>
		<div class="int_valor_filme">
			<label>Valor do Filme:</label>
			<p class="int_valor_filme">R$ {.$int_valor_filme|decimal.}</p>
		</div>
		<div class="int_valor_contraste">
			<label>Valor do Contraste:</label>
			<p class="int_valor_contraste">R$ {.$int_valor_contraste|decimal.}</p>
		</div>
		<div class="int_valor_final">
			<label>Valor Final do Exame:</label>
			<p class="int_valor_final">R$ {.$int_valor_final|decimal.}</p>
		</div>
		{./if.}
		<div class="botoes">
			<input type="button" onClick="bt_cancelar('{.$vars_secao.}', '');" value="Voltar">
		</div>
	</form>
{.include file="lib/templates/$design.footer.tpl".}
	