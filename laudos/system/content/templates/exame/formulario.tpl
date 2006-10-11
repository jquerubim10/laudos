{.include file="lib/templates/$design.top.tpl".}
	<LINK REL=StyleSheet HREF="{.$path_tpl.}formulario.css" media="screen" TYPE="text/css">
	<form id="form" name="form" action="{.$self.}" method="post" >
		<input type="hidden" name="form">
		
		<div class="exa_nome">
			<label>Nome do Exame:</label> <span class="erro">{.$exa_nome_erro.}</span><br />
			<input class="exa_nome" type="text" name="exa_nome" value="{.$exa_nome.}">
		</div>
		<div class="botoes">
			<input class="bt_cancelar"type="button" onClick="history.back();" value="Cancelar">
			<input class="bt_enviar" type="button" onClick="send('');" value="Enviar">
		</div>
		
	</form>
{.include file="lib/templates/$design.footer.tpl".}