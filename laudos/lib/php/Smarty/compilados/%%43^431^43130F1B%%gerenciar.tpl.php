<?php /* Smarty version 2.6.9, created on 2005-10-23 20:37:10
         compiled from content/templates/exame/gerenciar.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'content/templates/exame/gerenciar.tpl', 25, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "lib/templates/".($this->_tpl_vars['design']).".top.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<LINK REL=StyleSheet HREF="<?php echo $this->_tpl_vars['path_tpl']; ?>
gerenciar.css" media="screen" TYPE="text/css">
	<form id="form" name="form" action="index.php" method="get" >
	<?php echo $this->_tpl_vars['input_secao']; ?>

		
		<div class="exa_nome">
			<label>Exame:</label><br />
			<input class="exa_nome" type="text" name="exa_nome">
		</div>
	
		<div class="botoes">
			<input class="bt_enviar" type="button" onClick="document.form.submit();" value="Buscar">
		</div>
	</form>

<?php if ($this->_tpl_vars['total_registros'] > 0): ?>
	<?php echo $this->_tpl_vars['paginacao']; ?>

	<table width="540" cellpadding="3" cellspacing="1">
		<form name="form_tamanho_pagina" action="index.php" method="get">
		<?php echo $this->_tpl_vars['input_secao']; ?>

		<tr bgcolor="#FFFFFF">
			<td align="right">
				<?php echo $this->_tpl_vars['total_registros']; ?>
 Registro(s), mostrando 
				<select id="tamanho_pagina" name="tamanho_pagina" onChange="document.form_tamanho_pagina.submit();">
					<?php echo smarty_function_html_options(array('output' => $this->_tpl_vars['vet_tamanho_pagina'],'values' => $this->_tpl_vars['vet_tamanho_pagina'],'selected' => $this->_tpl_vars['tamanho_pagina']), $this);?>

				</select> por página.
			</td>
		</tr>
		</form>
	</table>
	<table width="540" cellpadding="3" cellspacing="1">
		<tr bgcolor="#FFE6B0">
			

			<td width="" onClick="href('<?php echo $this->_tpl_vars['link_ordenacao']['exa_nome']; ?>
');" style="cursor:pointer;">
				<table width="100%" cellpadding="0" cellspacing="0">
					<tr>
						<td><strong>Exame</strong></td>
						<td width="20" align="right"><?php echo $this->_tpl_vars['seta_ordenacao']['exa_nome']; ?>
&nbsp;</td>
					</tr>
				</table>
			</td>

		
<!-- 			<td width="15%">&nbsp;</td> -->
		</tr>
	<?php $_from = $this->_tpl_vars['registros']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['r']):
?>
		<tr bgcolor="#FFFFFF" style="cursor:pointer; " onClick="href('<?php echo $this->_tpl_vars['vars_secao']; ?>
&acao=show&id=<?php echo $this->_tpl_vars['r']['exa_id']; ?>
')">
			
			<td>
				&nbsp;<?php echo $this->_tpl_vars['r']['exa_nome']; ?>

			</td>
		
<!-- 			<td>
				<a href="<?php echo $this->_tpl_vars['vars_secao']; ?>
&acao=show&id=<?php echo $this->_tpl_vars['r']['exa_id']; ?>
"><img src="images/bt_visualizar.gif" border="0"></a>&nbsp;
				<a href="<?php echo $this->_tpl_vars['vars_secao']; ?>
&acao=update&id=<?php echo $this->_tpl_vars['r']['exa_id']; ?>
"><img src="images/bt_editar.gif" border="0"></a>&nbsp;
				<a href="<?php echo $this->_tpl_vars['vars_secao']; ?>
&acao=show&id=<?php echo $this->_tpl_vars['r']['exa_id']; ?>
&del=1"><img src="images/bt_excluir.gif" border="0"></a>
			</td>
 -->		</tr>
		<tr>
			<td height="1" bgcolor="#CCCCCC"></td>
		</tr>
	<?php endforeach; endif; unset($_from); ?>
		<tr>
			<td height="10" bgcolor="#FFE6B0"></td>
		</tr>
		<tr>
			<td height="10"></td>
		</tr>
	</table>
	<?php echo $this->_tpl_vars['paginacao']; ?>



<?php else: ?>
	<table width="540" border="0">
		<tr>
			<td>Nenhum registro encontrado.</td>
		</tr>
	</table>
<?php endif;  $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "lib/templates/".($this->_tpl_vars['design']).".footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	