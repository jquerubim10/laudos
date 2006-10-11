
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
		
		<div class="con_nome">
			<label>Nome do Convênio:</label>
			<p class="con_nome">{.$con_nome.}</p>
		</div>
		
		<div class="con_valor_ch">
			<label>Valor do CH:</label>
			<p class="con_valor_ch">R$ {.$con_valor_ch|decimal.}</p>
		</div>
		
		<div class="con_valor_filme">
			<label>Valor do Filme:</label>
			<p class="con_valor_filme">R$ {.$con_valor_filme|decimal.}</p>
		</div>
		
		<div class="botoes">
			<input type="button" onClick="bt_cancelar('{.$vars_secao.}', '');" value="Voltar">
<!-- 			<input type="button" onClick="send('Confirma realmente a exclusão?');" value="Excluir">
			<input type="button" onClick="href('{.$vars_secao.}&acao=update&id={.$id.}', '');" value="Alterar">
 -->		</div>
	</form>
{.include file="lib/templates/$design.footer.tpl".}
	