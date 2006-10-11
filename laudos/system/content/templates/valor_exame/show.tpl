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
	
		<div class="exa_id">
			<label>Exame:</label>
			<p class="exa_id">{.$exa_nome.}</p>
		</div>
		
		<div class="con_id">
			<label>Convênio:</label>
			<p class="con_id">{.$hos_nome.}&nbsp;&nbsp;|&nbsp;&nbsp;{.$con_nome.}</p>
		</div>
		
		<div class="vex_valor_absoluto">
			<label>Valor Absoluto:</label>
			<p class="vex_valor_absoluto">R$ {.$vex_valor_absoluto|decimal.}</p>
		</div>
		
		<div class="vex_ch">
			<label>CH:</label>
			<p class="vex_ch">{.$vex_ch.}</p>
		</div>
		
		<div class="vex_filme">
			<label>Filme (M2):</label>
			<p class="vex_filme">{.$vex_filme|decimal4.}</p>
		</div>

		<div class="vex_valor_contraste">
			<label>Valor do Contraste:</label>
			<p class="vex_valor_contraste">R$ {.$vex_valor_contraste|decimal.}</p>
		</div>
		
		<div class="botoes">
			<input type="button" onClick="bt_cancelar('{.$vars_secao.}', '');" value="Voltar">
<!-- 			<input type="button" onClick="send('Confirma realmente a exclusão?');" value="Excluir">
			<input type="button" onClick="href('{.$vars_secao.}&acao=update&id={.$id.}', '');" value="Alterar">
 -->		</div>
	</form>
{.include file="lib/templates/$design.footer.tpl".}
	