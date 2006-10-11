{.include file="lib/templates/$design.top.tpl".}
	<LINK REL=StyleSheet HREF="{.$path_tpl.}formulario.css" media="screen" TYPE="text/css">
	<form id="form" name="form" action="{.$self.}" method="post" >
		<input type="hidden" name="form">
	
		<div class="txp_codigo">
			<label>Código:</label> <span class="erro">{.$txp_codigo_erro.}</span><br />
			<input class="txp_codigo" type="text" name="txp_codigo" value="{.$txp_codigo.}">
		</div>
		<div class="txp_texto">
			<label>Texto:</label> <span class="erro">{.$txp_texto_erro.}</span><br />
			<textarea class="txp_texto" name="txp_texto">{.$txp_texto.}</textarea>
		</div>
		<div class="botoes">
			<input class="bt_cancelar"type="button" onClick="history.back();" value="Cancelar">
			<input class="bt_enviar" type="button" onClick="send('');" value="Enviar">
		</div>
	</form>
{.include file="lib/templates/$design.footer.tpl".}