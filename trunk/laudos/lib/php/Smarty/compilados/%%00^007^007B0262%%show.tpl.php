<?php /* Smarty version 2.6.9, created on 2005-09-23 14:55:18
         compiled from content/templates/valor_exame/show.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'decimal', 'content/templates/valor_exame/show.tpl', 41, false),array('modifier', 'decimal4', 'content/templates/valor_exame/show.tpl', 51, false),)), $this); ?>
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
	
		<div class="exa_id">
			<label>Exame:</label>
			<p class="exa_id"><?php echo $this->_tpl_vars['exa_nome']; ?>
</p>
		</div>
		
		<div class="con_id">
			<label>Convênio:</label>
			<p class="con_id"><?php echo $this->_tpl_vars['hos_nome']; ?>
&nbsp;&nbsp;|&nbsp;&nbsp;<?php echo $this->_tpl_vars['con_nome']; ?>
</p>
		</div>
		
		<div class="vex_valor_absoluto">
			<label>Valor Absoluto:</label>
			<p class="vex_valor_absoluto">R$ <?php echo ((is_array($_tmp=$this->_tpl_vars['vex_valor_absoluto'])) ? $this->_run_mod_handler('decimal', true, $_tmp) : smarty_modifier_decimal($_tmp)); ?>
</p>
		</div>
		
		<div class="vex_ch">
			<label>CH:</label>
			<p class="vex_ch"><?php echo $this->_tpl_vars['vex_ch']; ?>
</p>
		</div>
		
		<div class="vex_filme">
			<label>Filme (M2):</label>
			<p class="vex_filme"><?php echo ((is_array($_tmp=$this->_tpl_vars['vex_filme'])) ? $this->_run_mod_handler('decimal4', true, $_tmp) : smarty_modifier_decimal4($_tmp)); ?>
</p>
		</div>

		<div class="vex_valor_contraste">
			<label>Valor do Contraste:</label>
			<p class="vex_valor_contraste">R$ <?php echo ((is_array($_tmp=$this->_tpl_vars['vex_valor_contraste'])) ? $this->_run_mod_handler('decimal', true, $_tmp) : smarty_modifier_decimal($_tmp)); ?>
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
	