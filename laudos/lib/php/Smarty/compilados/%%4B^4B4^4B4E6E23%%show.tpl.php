<?php /* Smarty version 2.6.9, created on 2005-11-16 21:29:51
         compiled from content/templates/exame/show.tpl */ ?>
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
	
		<div class="exa_nome">
			<label>Exame:</label>
			<p class="exa_nome"><?php echo $this->_tpl_vars['exa_nome']; ?>
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
	