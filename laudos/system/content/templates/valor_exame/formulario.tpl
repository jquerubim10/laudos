{.include file="lib/templates/$design.top.tpl".}
	<LINK REL=StyleSheet HREF="{.$path_tpl.}formulario.css" media="screen" TYPE="text/css">
	<form id="form" name="form" action="{.$self.}" method="post" >
		<input type="hidden" name="form">
	
		<div class="exa_id">
			<label>Exame:</label> <span class="erro">{.$exa_id_erro.}</span><br />
			<select class="exa_id" type="text" name="exa_id">
			<option></option>
			{.html_options options=$vet_exames selected=$exa_id.}
			</select>
		</div>
		<div class="con_id">
			<label>Convênio:</label> <span class="erro">{.$con_id_erro.}</span><br />
			<select class="con_id" type="text" name="con_id" onChange="document.form.submit();">
			<option></option>
			{.html_options options=$vet_convenios selected=$con_id.}
			</select>
		</div>
		<div class="vex_valor_absoluto">
			<label>Valor Absoluto:</label> <span class="erro">{.$vex_valor_absoluto_erro.}</span><br />
			R$ <input onFocus="txtPadraoIn(this, '0,00');" onBlur="txtPadraoOut(this, '0,00');" onKeyPress="return mascara_preco(this, event);" class="vex_valor_absoluto" type="text" name="vex_valor_absoluto" value="{.$vex_valor_absoluto|decimal.}">
		</div>
		<div class="vex_ch">
			<label>CH:</label> <span class="erro">{.$vex_ch_erro.}</span><br />
			<input class="vex_ch" type="text" name="vex_ch" value="{.$vex_ch.}"> x R$ {.$con_valor_ch|decimal.}
		</div>
		<div class="vex_filme">
			<label>Filme (M2):</label> <span class="erro">{.$vex_filme_erro.}</span><br />
			<input onFocus="txtPadraoIn(this, '0,0000');" onBlur="txtPadraoOut(this, '0,0000');" onKeyPress="return mascara_decimal4(this, event);" class="vex_filme" type="text" name="vex_filme" value="{.$vex_filme|decimal4.}"> x R$ {.$con_valor_filme|decimal.}
		</div>
		<div class="vex_valor_contraste">
			<label>Valor do Contraste:</label> <span class="erro">{.$vex_valor_contraste_erro.}</span><br />
			R$ <input onFocus="txtPadraoIn(this, '0,00');" onBlur="txtPadraoOut(this, '0,00');" onKeyPress="return mascara_preco(this, event);" class="vex_valor_contraste" type="text" name="vex_valor_contraste" value="{.$vex_valor_contraste|decimal.}">
		</div>
		<div class="botoes">
			<input class="bt_cancelar"type="button" onClick="history.back();" value="Cancelar">
			<input class="bt_enviar" type="button" onClick="send('');" value="Enviar">
		</div>
	</form>
{.include file="lib/templates/$design.footer.tpl".}