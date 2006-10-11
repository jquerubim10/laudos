<?php /* Smarty version 2.6.9, created on 2005-12-05 10:17:01
         compiled from content/templates/relatorio/gerenciar.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'content/templates/relatorio/gerenciar.tpl', 10, false),array('modifier', 'decimal', 'content/templates/relatorio/gerenciar.tpl', 57, false),)), $this); ?>
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

		<div class="hos_id">
			<label>Hospital:</label><br />
			<select class="hos_id" name="hos_id">
				<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['vet_hospitais'],'selected' => $this->_tpl_vars['hos_id']), $this);?>

			</select>
		</div>
		<div class="periodo_mes">
			<label>Mês:</label><br />
			<select class="periodo_mes" name="periodo_mes">
				<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['meses'],'selected' => $this->_tpl_vars['periodo_mes']), $this);?>

			</select>
		</div>
		<div class="periodo_ano">
			<label>Ano:</label><br />
			<select class="periodo_ano" name="periodo_ano">
				<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['anos'],'selected' => $this->_tpl_vars['periodo_ano']), $this);?>

			</select>
		</div>
		<div class="agrupar">
			<label>Agrupar por:</label><br />
			<select class="agrupar" name="agrupar">
				<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['agrupamentos'],'selected' => $this->_tpl_vars['agrupar']), $this);?>

			</select>
		</div>		
		<div class="botoes">
			<input class="bt_enviar" type="button" onClick="document.form.submit();" value="Buscar">
		</div>
		
	</form>
<br />
<?php if ($this->_tpl_vars['total_registros'] > 0): ?>
	<table width="100%" cellpadding="3" cellspacing="1">
		<tr bgcolor="#FFE6B0">
			<td width="300">
				<strong></strong>
			</td>
			<td width="60" onClick="" align="right">
				<strong>Quantidade</strong>
			</td>
			<td width="100" onClick="" align="right">
				<strong>Valor Médico</strong>
			</td>
			<td width="100" onClick="" align="right">
				<strong>Valor Total</strong>
			</td>
		</tr>
	<?php $_from = $this->_tpl_vars['registros']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['r']):
?>
		<tr bgcolor="#FFFFFF" style="" onClick="">
			<td>&nbsp;<?php echo $this->_tpl_vars['r']['agrupador']; ?>
</td>
			<td align="right">&nbsp;<?php echo $this->_tpl_vars['r']['q']; ?>
</td>
			<td align="right">&nbsp;R$ <?php echo ((is_array($_tmp=$this->_tpl_vars['r']['vm'])) ? $this->_run_mod_handler('decimal', true, $_tmp) : smarty_modifier_decimal($_tmp)); ?>
</td>
			<td align="right">&nbsp;R$ <?php echo ((is_array($_tmp=$this->_tpl_vars['r']['v'])) ? $this->_run_mod_handler('decimal', true, $_tmp) : smarty_modifier_decimal($_tmp)); ?>
</td>
		</tr>
		<tr>
			<td colspan="4" height="1" bgcolor="#CCCCCC"></td>
		</tr>
	<?php endforeach; endif; unset($_from); ?>
		<tr bgcolor="#FFFFFF" style="" onClick="">
			<td>&nbsp;<strong>TOTAL</strong></td>
			<td align="right">&nbsp;<strong><?php echo $this->_tpl_vars['q_total']; ?>
</strong></td>
			<td align="right">&nbsp;<strong>R$ <?php echo ((is_array($_tmp=$this->_tpl_vars['vm_total'])) ? $this->_run_mod_handler('decimal', true, $_tmp) : smarty_modifier_decimal($_tmp)); ?>
</strong></td>
			<td align="right">&nbsp;<strong>R$ <?php echo ((is_array($_tmp=$this->_tpl_vars['v_total'])) ? $this->_run_mod_handler('decimal', true, $_tmp) : smarty_modifier_decimal($_tmp)); ?>
</strong></td>
		</tr>
		<tr>
			<td colspan="4" height="10" bgcolor="#FFE6B0"></td>
		</tr>
		<tr>
			<td colspan="4" height="10"></td>
		</tr>
	</table>
<?php else: ?>
	<table width="" border="0" style="margin-left:30px; ">
		<tr>
			<td>
			<?php if ($this->_tpl_vars['periodo_mes'] == "" || $this->_tpl_vars['periodo_ano'] == ""): ?>
			Selecione um MÊS e um ANO.
			<?php else: ?>
			Nenhum registro encontrado.
			<?php endif; ?>
			</td>
		</tr>
	</table>
<?php endif; ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "lib/templates/".($this->_tpl_vars['design']).".footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	