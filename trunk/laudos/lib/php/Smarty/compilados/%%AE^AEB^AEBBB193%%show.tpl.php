<?php /* Smarty version 2.6.9, created on 2006-02-14 19:15:37
         compiled from content/templates/texto_padrao/show.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'nl2br', 'content/templates/texto_padrao/show.tpl', 36, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "lib/templates/".($this->_tpl_vars['design']).".top.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<LINK REL=StyleSheet HREF="<?php echo $this->_tpl_vars['path_tpl']; ?>
show.css" media="screen" TYPE="text/css">
	<form id="form" name="form" action="<?php echo $this->_tpl_vars['self']; ?>
" method="post" >
		<input type="hidden" name="del" value="1">
		<input type="hidden" name="form">
		<?php $_from = $this->_tpl_vars['dependences']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['dep'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['dep']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['d']):
        $this->_foreach['dep']['iteration']++;
?>
			<?php if (($this->_foreach['dep']['iteration'] <= 1)): ?>
			<table width="100%" border="0" cellpadding="0" cellspacing="1" style="color:#CC3300;">
			<tr>
				<td><b>Existem informações vinculadas a este registro.</b></td>
			</tr>
			<?php endif; ?>
			<tr bgcolor="#CCCCCC">
				<td>
					&nbsp;<?php echo $this->_tpl_vars['d']['label']; ?>

				</td>
			</tr>
			<?php if (($this->_foreach['dep']['iteration'] == $this->_foreach['dep']['total'])): ?>
			<tr>
				<td align="right">
					Deseja excluir este registro e todas as informações vinculadas a ele?<br>
					<a href="javascript:history.back();"><b style="color:#000000; ">Não</b></a>&nbsp;&nbsp;&nbsp;<a href="<?php echo $this->_tpl_vars['vars_secao']; ?>
&acao=show&id=<?php echo $this->_tpl_vars['id']; ?>
&del=1&delete_dependences=1"><b style="color:#CC3300; ">Sim</b></a>
				</td>
			</tr>
			</table>
			<?php endif; ?>
		<?php endforeach; endif; unset($_from); ?>
	
		<div class="txp_codigo">
			<label>Código:</label>
			<p class="txp_codigo"><?php echo $this->_tpl_vars['txp_codigo']; ?>
</p>
		</div>
		
		<div class="txp_texto">
			<label>Texto:</label>
			<p class="txp_texto"><?php echo ((is_array($_tmp=$this->_tpl_vars['txp_texto'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</p>
		</div>
		
		<div class="botoes">
			<input type="button" onClick="bt_cancelar('<?php echo $this->_tpl_vars['vars_secao']; ?>
', '');" value="Voltar">
<!-- 			<input type="button" onClick="send('Confirma realmente a exclusão?');" value="Excluir">
			<input type="button" onClick="href('<?php echo $this->_tpl_vars['vars_secao']; ?>
&acao=update&id=<?php echo $this->_tpl_vars['id']; ?>
', '');" value="Alterar">
 -->		</div>
	</form>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "lib/templates/".($this->_tpl_vars['design']).".footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	