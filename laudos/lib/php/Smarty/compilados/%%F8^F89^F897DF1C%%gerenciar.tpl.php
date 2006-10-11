<?php /* Smarty version 2.6.9, created on 2006-08-14 12:47:16
         compiled from content/templates/interpretacao/gerenciar.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'content/templates/interpretacao/gerenciar.tpl', 16, false),array('modifier', 'date_format', 'content/templates/interpretacao/gerenciar.tpl', 106, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "lib/templates/".($this->_tpl_vars['design']).".top.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<LINK REL=StyleSheet HREF="<?php echo $this->_tpl_vars['path_tpl']; ?>
gerenciar.css" media="screen" TYPE="text/css"
	<LINK REL=StyleSheet HREF="<?php echo $this->_tpl_vars['path_tpl']; ?>
gerenciar.css" media="print" TYPE="text/css">
	<form id="form" name="form" action="index.php" method="get" >
		<input type="hidden" name="tamanho_pagina" value="<?php echo $this->_tpl_vars['tamanho_pagina']; ?>
"/>
	<?php echo $this->_tpl_vars['input_secao']; ?>

	<?php if ($this->_tpl_vars['int_status'] == 'interpretado' || $this->_tpl_vars['int_status'] == 'impresso'): ?>
		<div class="imprimir">
			<a target="_blank" href="index.php?s=interpretacao&pdf=sim&hos_id=<?php echo $this->_tpl_vars['hos_id']; ?>
&int_status=<?php echo $this->_tpl_vars['int_status']; ?>
&int_paciente_nome=<?php echo $this->_tpl_vars['int_paciente_nome']; ?>
&int_data_inicial=<?php echo $this->_tpl_vars['int_data_inicial']; ?>
&int_data_final=<?php echo $this->_tpl_vars['int_data_final']; ?>
&tamanho_pagina=10000" class="imprimir">Imprimir Laudos</a><br />
		</div>
	<?php endif; ?>

		<div class="hos_id">
			<label>Hospital:</label><br />
			<select class="hos_id" name="hos_id">
				<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['vet_hospitais'],'selected' => $this->_tpl_vars['hos_id']), $this);?>

			</select>
		</div>
		<div class="int_paciente_nome">
			<label>Nome do Paciente:</label><br />
			<input class="int_paciente_nome" value="<?php echo $this->_tpl_vars['int_paciente_nome']; ?>
" type="text" name="int_paciente_nome">
		</div>		
		<div class="int_status">
			<label>Situação:</label><br />
			<select class="int_status" name="int_status">
				<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['vet_status'],'selected' => $this->_tpl_vars['int_status']), $this);?>

			</select>
		</div>
		<div class="int_data_inicial">
			<label>de:</label><br />
			<input maxlength="10" onKeyPress="return mascara_data(this, event);"  class="int_data_inicial" value="<?php echo $this->_tpl_vars['int_data_inicial']; ?>
" type="text" name="int_data_inicial">
			
		</div>
		<div class="int_data_final">
			<label>até:</label><br />
			<input maxlength="10" onKeyPress="return mascara_data(this, event);"  class="int_data_final" value="<?php echo $this->_tpl_vars['int_data_final']; ?>
" type="text" name="int_data_final">
			
		</div>
		
		<div class="botoes">
			<input class="bt_enviar" type="button" onClick="document.form.submit();" value="Buscar">
		</div>
		
	</form>
<br />
<?php if ($this->_tpl_vars['total_registros'] > 0): ?>
	<?php echo $this->_tpl_vars['paginacao']; ?>

	<table width="100%" cellpadding="3" cellspacing="1">
		<form name="form_tamanho_pagina" action="index.php" method="get">
		<?php echo $this->_tpl_vars['input_secao']; ?>

		<input type="hidden" name="hos_id" value="<?php echo $this->_tpl_vars['hos_id']; ?>
" />
		<input type="hidden" name="int_status" value="<?php echo $this->_tpl_vars['int_status']; ?>
" />
		<input type="hidden" name="int_paciente_nome" value="<?php echo $this->_tpl_vars['int_paciente_nome']; ?>
" />
		<input type="hidden" name="int_data_inicial" value="<?php echo $this->_tpl_vars['int_data_inicial']; ?>
" />
		<input type="hidden" name="int_data_final" value="<?php echo $this->_tpl_vars['int_data_final']; ?>
" />
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
	<table width="100%" cellpadding="3" cellspacing="1">
		<tr bgcolor="#FFE6B0">

		

			<td width="115" onClick="href('<?php echo $this->_tpl_vars['link_ordenacao']['int_data_cadastro']; ?>
');" style="cursor:pointer;">
				<table width="100%" cellpadding="0" cellspacing="0">
					<tr>
						<td><strong>Data de Cadastro</strong></td>
						<td width="20" align="right"><?php echo $this->_tpl_vars['seta_ordenacao']['int_data_cadastro']; ?>
&nbsp;</td>
					</tr>
				</table>
			</td>

		

			<td width="" onClick="href('<?php echo $this->_tpl_vars['link_ordenacao']['int_paciente_nome']; ?>
');" style="cursor:pointer;">
				<table width="100%" cellpadding="0" cellspacing="0">
					<tr>
						<td><strong>Nome do Paciente</strong></td>
						<td width="20" align="right"><?php echo $this->_tpl_vars['seta_ordenacao']['int_paciente_nome']; ?>
&nbsp;</td>
					</tr>
				</table>
			</td>


			<td width="" onClick="href('<?php echo $this->_tpl_vars['link_ordenacao']['exa_nome']; ?>
');" style="cursor:pointer;">
				<table width="100%" cellpadding="0" cellspacing="0">
					<tr>
						<td><strong>Nome do Exame</strong></td>
						<td width="20" align="right"><?php echo $this->_tpl_vars['seta_ordenacao']['exa_nome']; ?>
&nbsp;</td>
					</tr>
				</table>
			</td>
		
			<!-- <td width="15%">&nbsp;</td> -->
		</tr>
	<?php $_from = $this->_tpl_vars['registros']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['r']):
?>
		<tr bgcolor="#FFFFFF" style="cursor:pointer; " onClick="href('<?php echo $this->_tpl_vars['vars_secao']; ?>
&acao=<?php if ($this->_tpl_vars['medico'] == '1' && $this->_tpl_vars['int_status'] == 'nao_interpretado'): ?>update<?php else: ?>show<?php endif; ?>&id=<?php echo $this->_tpl_vars['r']['int_id']; ?>
')">
			<td>
				&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['r']['int_data_cadastro'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y %H:%M:%S") : smarty_modifier_date_format($_tmp, "%d/%m/%Y %H:%M:%S")); ?>

			</td>
		
			<td>
				&nbsp;<?php echo $this->_tpl_vars['r']['int_paciente_nome']; ?>

			</td>
			
			<td>
				&nbsp;<?php echo $this->_tpl_vars['r']['exa_nome']; ?>

			</td>
		
<!-- 			<td align="center">
				<a href="<?php echo $this->_tpl_vars['vars_secao']; ?>
&acao=show&id=<?php echo $this->_tpl_vars['r']['int_id']; ?>
"><img src="images/bt_visualizar.gif" border="0"></a>&nbsp;
				<?php if ($this->_tpl_vars['medico'] == '1'): ?>
				<a href="<?php echo $this->_tpl_vars['vars_secao']; ?>
&acao=update&id=<?php echo $this->_tpl_vars['r']['int_id']; ?>
"><img src="images/bt_editar.gif" border="0"></a>&nbsp;
				<a href="<?php echo $this->_tpl_vars['vars_secao']; ?>
&acao=show&id=<?php echo $this->_tpl_vars['r']['int_id']; ?>
&del=1"><img src="images/bt_excluir.gif" border="0"></a>
				<?php endif; ?>
			</td> -->
		</tr>
		<tr>
			<td colspan="3" height="1" bgcolor="#CCCCCC"></td>
		</tr>
	<?php endforeach; endif; unset($_from); ?>
		<tr>
			<td colspan="3" height="10" bgcolor="#FFE6B0"></td>
		</tr>
		<tr>
			<td colspan="3" height="10"></td>
		</tr>
	</table>
	<?php echo $this->_tpl_vars['paginacao']; ?>



<?php else: ?>
	<table width="540" border="0">
		<tr>
			<td>Nenhum registro encontrado.</td>
		</tr>
	</table>
<?php endif; ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "lib/templates/".($this->_tpl_vars['design']).".footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	