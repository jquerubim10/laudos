{.include file="lib/templates/$design.top.tpl".}
	<LINK REL=StyleSheet HREF="{.$path_tpl.}formulario.css" media="screen" TYPE="text/css">
	<form id="form" name="form" action="{.$self.}" method="post" >
		<input type="hidden" name="form">
	
		<div class="hos_nome">
			<label>Nome:</label> <span class="erro">{.$hos_nome_erro.}</span><br />
			<input class="hos_nome" type="text" name="hos_nome" value="{.$hos_nome.}">
		</div>
		<div class="hos_login">
			<label>Login:</label> <span class="erro">{.$hos_login_erro.}</span><br />
			<input class="hos_login" type="text" name="hos_login" value="{.$hos_login.}">
		</div>
		<div class="hos_senha">
			<label>Senha:</label> <span class="erro">{.$hos_senha_erro.}</span><br />
			<input class="hos_senha" type="password" name="hos_senha" value="{.$hos_senha.}">
		</div>
		<div class="hos_email">
			<label>E-Mail:</label> <span class="erro">{.$hos_email_erro.}</span><br />
			<input class="hos_email" type="text" name="hos_email" value="{.$hos_email.}">
		</div>
		<div class="hos_percentual">
			<label>Percentual:</label> <span class="erro">{.$hos_percentual_erro.}</span><br />
			<input onFocus="txtPadraoIn(this, '0,00');" onBlur="txtPadraoOut(this, '0,00');" onKeyPress="return mascara_peso(this, event);" class="hos_percentual" type="text" name="hos_percentual" value="{.$hos_percentual|decimal.}">
		</div>
		<div class="botoes">
			<input class="bt_cancelar"type="button" onClick="history.back();" value="Cancelar">
			<input class="bt_enviar" type="button" onClick="send('');" value="Enviar">
		</div>
	</form>
{.include file="lib/templates/$design.footer.tpl".}