<?php /* Smarty version 2.6.9, created on 2005-10-23 20:34:18
         compiled from content/templates/valor_exame/formulario.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'content/templates/valor_exame/formulario.tpl', 10, false),array('modifier', 'decimal', 'content/templates/valor_exame/formulario.tpl', 22, false),array('modifier', 'decimal4', 'content/templates/valor_exame/formulario.tpl', 30, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "lib/templates/".($this->_tpl_vars['design']).".top.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<LINK REL=StyleSheet HREF="<?php echo $this->_tpl_vars['path_tpl']; ?>
formulario.css" media="screen" TYPE="text/css">
	<form id="form" name="form" action="<?php echo $this->_tpl_vars['self']; ?>
" method="post" >
		<input type="hidden" name="form">
	
		<div class="exa_id">
			<label>Exame:</label> <span class="erro"><?php echo $this->_tpl_vars['exa_id_erro']; ?>
</span><br />
			<select class="exa_id" type="text" name="exa_id">
			<option></option>
			<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['vet_exames'],'selected' => $this->_tpl_vars['exa_id']), $this);?>

			</select>
		</div>
		<div class="con_id">
			<label>Convênio:</label> <span class="erro"><?php echo $this->_tpl_vars['con_id_erro']; ?>
</span><br />
			<select class="con_id" type="text" name="con_id" onChange="document.form.submit();">
			<option></option>
			<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['vet_convenios'],'selected' => $this->_tpl_vars['con_id']), $this);?>

			</select>
		</div>
		<div class="vex_valor_absoluto">
			<label>Valor Absoluto:</label> <span class="erro"><?php echo $this->_tpl_vars['vex_valor_absoluto_erro']; ?>
</span><br />
			R$ <input onFocus="txtPadraoIn(this, '0,00');" onBlur="txtPadraoOut(this, '0,00');" onKeyPress="return mascara_preco(this, event);" class="vex_valor_absoluto" type="text" name="vex_valor_absoluto" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['vex_valor_absoluto'])) ? $this->_run_mod_handler('decimal', true, $_tmp) : smarty_modifier_decimal($_tmp)); ?>
">
		</div>
		<div class="vex_ch">
			<label>CH:</label> <span class="erro"><?php echo $this->_tpl_vars['vex_ch_erro']; ?>
</span><br />
			<input class="vex_ch" type="text" name="vex_ch" value="<?php echo $this->_tpl_vars['vex_ch']; ?>
"> x R$ <?php echo ((is_array($_tmp=$this->_tpl_vars['con_valor_ch'])) ? $this->_run_mod_handler('decimal', true, $_tmp) : smarty_modifier_decimal($_tmp)); ?>

		</div>
		<div class="vex_filme">
			<label>Filme (M2):</label> <span class="erro"><?php echo $this->_tpl_vars['vex_filme_erro']; ?>
</span><br />
			<input onFocus="txtPadraoIn(this, '0,0000');" onBlur="txtPadraoOut(this, '0,0000');" onKeyPress="return mascara_decimal4(this, event);" class="vex_filme" type="text" name="vex_filme" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['vex_filme'])) ? $this->_run_mod_handler('decimal4', true, $_tmp) : smarty_modifier_decimal4($_tmp)); ?>
"> x R$ <?php echo ((is_array($_tmp=$this->_tpl_vars['con_valor_filme'])) ? $this->_run_mod_handler('decimal', true, $_tmp) : smarty_modifier_decimal($_tmp)); ?>

		</div>
		<div class="vex_valor_contraste">
			<label>Valor do Contraste:</label> <span class="erro"><?php echo $this->_tpl_vars['vex_valor_contraste_erro']; ?>
</span><br />
			R$ <input onFocus="txtPadraoIn(this, '0,00');" onBlur="txtPadraoOut(this, '0,00');" onKeyPress="return mascara_preco(this, event);" class="vex_valor_contraste" type="text" name="vex_valor_contraste" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['vex_valor_contraste'])) ? $this->_run_mod_handler('decimal', true, $_tmp) : smarty_modifier_decimal($_tmp)); ?>
">
		</div>
		<div class="botoes">
			<input class="bt_cancelar"type="button" onClick="history.back();" value="Cancelar">
			<input class="bt_enviar" type="button" onClick="send('');" value="Enviar">
		</div>
	</form>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "lib/templates/".($this->_tpl_vars['design']).".footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>