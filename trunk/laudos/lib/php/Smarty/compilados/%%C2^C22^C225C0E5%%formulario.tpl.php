<?php /* Smarty version 2.6.9, created on 2006-04-06 22:08:36
         compiled from content/templates/texto_padrao/formulario.tpl */ ?>
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
	
		<div class="txp_codigo">
			<label>Código:</label> <span class="erro"><?php echo $this->_tpl_vars['txp_codigo_erro']; ?>
</span><br />
			<input class="txp_codigo" type="text" name="txp_codigo" value="<?php echo $this->_tpl_vars['txp_codigo']; ?>
">
		</div>
		<div class="txp_texto">
			<label>Texto:</label> <span class="erro"><?php echo $this->_tpl_vars['txp_texto_erro']; ?>
</span><br />
			<textarea class="txp_texto" name="txp_texto"><?php echo $this->_tpl_vars['txp_texto']; ?>
</textarea>
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