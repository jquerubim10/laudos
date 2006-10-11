<?php /* Smarty version 2.6.9, created on 2005-10-18 18:07:31
         compiled from content/templates/hospital/formulario.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'decimal', 'content/templates/hospital/formulario.tpl', 24, false),)), $this); ?>
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
	
		<div class="hos_nome">
			<label>Nome:</label> <span class="erro"><?php echo $this->_tpl_vars['hos_nome_erro']; ?>
</span><br />
			<input class="hos_nome" type="text" name="hos_nome" value="<?php echo $this->_tpl_vars['hos_nome']; ?>
">
		</div>
		<div class="hos_login">
			<label>Login:</label> <span class="erro"><?php echo $this->_tpl_vars['hos_login_erro']; ?>
</span><br />
			<input class="hos_login" type="text" name="hos_login" value="<?php echo $this->_tpl_vars['hos_login']; ?>
">
		</div>
		<div class="hos_senha">
			<label>Senha:</label> <span class="erro"><?php echo $this->_tpl_vars['hos_senha_erro']; ?>
</span><br />
			<input class="hos_senha" type="password" name="hos_senha" value="<?php echo $this->_tpl_vars['hos_senha']; ?>
">
		</div>
		<div class="hos_email">
			<label>E-Mail:</label> <span class="erro"><?php echo $this->_tpl_vars['hos_email_erro']; ?>
</span><br />
			<input class="hos_email" type="text" name="hos_email" value="<?php echo $this->_tpl_vars['hos_email']; ?>
">
		</div>
		<div class="hos_percentual">
			<label>Percentual:</label> <span class="erro"><?php echo $this->_tpl_vars['hos_percentual_erro']; ?>
</span><br />
			<input onFocus="txtPadraoIn(this, '0,00');" onBlur="txtPadraoOut(this, '0,00');" onKeyPress="return mascara_peso(this, event);" class="hos_percentual" type="text" name="hos_percentual" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['hos_percentual'])) ? $this->_run_mod_handler('decimal', true, $_tmp) : smarty_modifier_decimal($_tmp)); ?>
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