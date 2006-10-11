{.include file="lib/templates/$design.top.tpl".}
	<LINK REL=StyleSheet HREF="{.$path_tpl.}formulario.css" media="screen" TYPE="text/css">
	<form id="form" name="form" action="{.$self.}" method="post" >
		<input type="hidden" name="form">
	
		<div class="hos_id">
			<label>Hospital:</label> <span class="erro">{.$hos_id_erro.}</span><br />
			<select class="hos_id" name="hos_id">
				{.html_options options=$vet_hospitais selected=$hos_id.}
			</select>
		</div>
		<div class="con_nome">
			<label>Nome do Convênio:</label> <span class="erro">{.$con_nome_erro.}</span><br />
			<input class="con_nome" type="text" name="con_nome" value="{.$con_nome.}">
		</div>
		<div class="con_valor_ch">
			<label>Valor do CH:</label> <span class="erro">{.$con_valor_ch_erro.}</span><br />
			R$ <input onFocus="txtPadraoIn(this, '0,00');" onBlur="txtPadraoOut(this, '0,00');" onKeypress="return mascara_preco(this, event);" class="con_valor_ch" type="text" name="con_valor_ch" value="{.$con_valor_ch|decimal.}">
		</div>
		<div class="con_valor_filme">
			<label>Valor do Filme:</label> <span class="erro">{.$con_valor_filme_erro.}</span><br />
			R$ <input onFocus="txtPadraoIn(this, '0,00');" onBlur="txtPadraoOut(this, '0,00');" onKeypress="return mascara_preco(this, event);" class="con_valor_filme" type="text" name="con_valor_filme" value="{.$con_valor_filme|decimal.}">
		</div>
		{.if $acao == "update".}
		<br /><br /><br />
		<div class="con_desconto">
			<label>Desconto:</label> <span class="erro">{.$con_desconto_erro.}</span><br />
			<input onFocus="txtPadraoIn(this, '0,00');" onBlur="txtPadraoOut(this, '0,00');" onKeypress="return mascara_preco(this, event);" class="con_desconto" type="text" name="con_desconto" value="0,00">
		</div>
		<div class="con_convenio_desc">
			<label>Convenio:</label> <span class="erro">{.$con_convenio_desc_erro.}</span><br />
			<select class="con_convenio_desc" name="con_convenio_desc">
				<option value=""></option>
				{.html_options options=$vet_convenios selected=$con_convenio_desc.}
			</select>
		</div>
		{./if.}
		<div class="botoes">
			<input class="bt_cancelar"type="button" onClick="history.back();" value="Cancelar">
			<input class="bt_enviar" type="button" onClick="send('');" value="Enviar">
		</div>
	</form>
{.include file="lib/templates/$design.footer.tpl".}