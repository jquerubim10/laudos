<?php /* Smarty version 2.6.9, created on 2005-09-23 14:53:11
         compiled from content/templates/convenio/formulario.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'content/templates/convenio/formulario.tpl', 9, false),array('modifier', 'decimal', 'content/templates/convenio/formulario.tpl', 18, false),)), $this); ?>
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
	
		<div class="hos_id">
			<label>Hospital:</label> <span class="erro"><?php echo $this->_tpl_vars['hos_id_erro']; ?>
</span><br />
			<select class="hos_id" name="hos_id">
				<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['vet_hospitais'],'selected' => $this->_tpl_vars['hos_id']), $this);?>

			</select>
		</div>
		<div class="con_nome">
			<label>Nome do Convênio:</label> <span class="erro"><?php echo $this->_tpl_vars['con_nome_erro']; ?>
</span><br />
			<input class="con_nome" type="text" name="con_nome" value="<?php echo $this->_tpl_vars['con_nome']; ?>
">
		</div>
		<div class="con_valor_ch">
			<label>Valor do CH:</label> <span class="erro"><?php echo $this->_tpl_vars['con_valor_ch_erro']; ?>
</span><br />
			R$ <input onFocus="txtPadraoIn(this, '0,00');" onBlur="txtPadraoOut(this, '0,00');" onKeypress="return mascara_preco(this, event);" class="con_valor_ch" type="text" name="con_valor_ch" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['con_valor_ch'])) ? $this->_run_mod_handler('decimal', true, $_tmp) : smarty_modifier_decimal($_tmp)); ?>
">
		</div>
		<div class="con_valor_filme">
			<label>Valor do Filme:</label> <span class="erro"><?php echo $this->_tpl_vars['con_valor_filme_erro']; ?>
</span><br />
			R$ <input onFocus="txtPadraoIn(this, '0,00');" onBlur="txtPadraoOut(this, '0,00');" onKeypress="return mascara_preco(this, event);" class="con_valor_filme" type="text" name="con_valor_filme" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['con_valor_filme'])) ? $this->_run_mod_handler('decimal', true, $_tmp) : smarty_modifier_decimal($_tmp)); ?>
">
		</div>
		<?php if ($this->_tpl_vars['acao'] == 'update'): ?>
		<br /><br /><br />
		<div class="con_desconto">
			<label>Desconto:</label> <span class="erro"><?php echo $this->_tpl_vars['con_desconto_erro']; ?>
</span><br />
			<input onFocus="txtPadraoIn(this, '0,00');" onBlur="txtPadraoOut(this, '0,00');" onKeypress="return mascara_preco(this, event);" class="con_desconto" type="text" name="con_desconto" value="0,00">
		</div>
		<div class="con_convenio_desc">
			<label>Convenio:</label> <span class="erro"><?php echo $this->_tpl_vars['con_convenio_desc_erro']; ?>
</span><br />
			<select class="con_convenio_desc" name="con_convenio_desc">
				<option value=""></option>
				<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['vet_convenios'],'selected' => $this->_tpl_vars['con_convenio_desc']), $this);?>

			</select>
		</div>
		<?php endif; ?>
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