<?php /* Smarty version 2.6.9, created on 2005-11-09 00:23:13
         compiled from content/templates/interpretacao/show.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'content/templates/interpretacao/show.tpl', 34, false),array('modifier', 'nl2br', 'content/templates/interpretacao/show.tpl', 103, false),array('modifier', 'decimal', 'content/templates/interpretacao/show.tpl', 109, false),array('modifier', 'decimal4', 'content/templates/interpretacao/show.tpl', 125, false),)), $this); ?>
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
		
		<div class="hos_id">
			<label>Hospital:</label>
			<p class="hos_id"><?php echo $this->_tpl_vars['hos_nome']; ?>
</p>
		</div>
		
		<?php if (((is_array($_tmp=$this->_tpl_vars['int_data_impressao'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y %H:%M:%S") : smarty_modifier_date_format($_tmp, "%d/%m/%Y %H:%M:%S")) != "30/11/1999 00:00:00"): ?>
		<div class="int_data_impressao">
			<label>Data de Impressão:</label>
			<p class="int_data_impressao"><?php echo ((is_array($_tmp=$this->_tpl_vars['int_data_impressao'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y %H:%M:%S") : smarty_modifier_date_format($_tmp, "%d/%m/%Y %H:%M:%S")); ?>
</p>
		</div>
		<?php endif; ?>
		<?php if (((is_array($_tmp=$this->_tpl_vars['int_data_interpretacao'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y %H:%M:%S") : smarty_modifier_date_format($_tmp, "%d/%m/%Y %H:%M:%S")) != "30/11/1999 00:00:00"): ?>
		<div class="int_data_interpretacao">
			<label>Data de Interpretação:</label>
			<p class="int_data_interpretacao"><?php echo ((is_array($_tmp=$this->_tpl_vars['int_data_interpretacao'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y %H:%M:%S") : smarty_modifier_date_format($_tmp, "%d/%m/%Y %H:%M:%S")); ?>
</p>
		</div>
		<?php endif; ?>
		<?php if (((is_array($_tmp=$this->_tpl_vars['int_data_cadastro'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y %H:%M:%S") : smarty_modifier_date_format($_tmp, "%d/%m/%Y %H:%M:%S")) != "30/11/1999 00:00:00"): ?>
		<div class="int_data_cadastro">
			<label>Data de Cadastro:</label>
			<p class="int_data_cadastro"><?php echo ((is_array($_tmp=$this->_tpl_vars['int_data_cadastro'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y %H:%M:%S") : smarty_modifier_date_format($_tmp, "%d/%m/%Y %H:%M:%S")); ?>
</p>
		</div>
		<?php endif; ?>
		<div class="int_paciente_prontuario">
			<label>Prontuário:</label>
			<p class="int_paciente_prontuario"><?php echo $this->_tpl_vars['int_paciente_prontuario']; ?>
</p>
		</div>
		
		<div class="int_paciente_nome">
			<label>Nome do Paciente:</label>
			<p class="int_paciente_nome"><?php echo $this->_tpl_vars['int_paciente_nome']; ?>
</p>
		</div>
		
		<div class="int_paciente_sexo">
			<label>Sexo:</label>
			<p class="int_paciente_sexo"><?php echo $this->_tpl_vars['int_paciente_sexo']; ?>
</p>
		</div>
		
		<div class="int_paciente_nascimento">
			<label>Data de Nascimento:</label>
			<p class="int_paciente_nascimento">
			<?php if (((is_array($_tmp=$this->_tpl_vars['int_paciente_nascimento'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")) != "30/11/1999"): ?>
				<?php echo ((is_array($_tmp=$this->_tpl_vars['int_paciente_nascimento'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>

			<?php endif; ?></p>
		</div>
		
		<div class="exa_id">
			<label>Exame:</label>
			<p class="exa_id"><?php echo $this->_tpl_vars['exa_nome']; ?>
</p>
		</div>
		
		<div class="int_opcional">
			<label>N° do Exame:</label>
			<p class="int_opcional"><?php echo $this->_tpl_vars['int_opcional']; ?>
</p>
		</div>
		
		<div class="con_id">
			<label>Convênio:</label>
			<p class="con_id"><?php echo $this->_tpl_vars['con_nome']; ?>
</p>
		</div>
		
	
		<div class="int_requisitante">
			<label>Médico requisitante:</label>
			<p class="int_requisitante"><?php echo $this->_tpl_vars['int_requisitante']; ?>
</p>
		</div>
		
		<div class="int_tecnico_rx">
			<label>Técnico Rx:</label>
			<p class="int_tecnico_rx"><?php echo $this->_tpl_vars['int_tecnico_rx']; ?>
</p>
		</div>
		
		<div class="int_texto">
			<label>Interpretação:</label>
			<p class="int_texto"><?php echo ((is_array($_tmp=$this->_tpl_vars['int_texto'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</p>
		</div>
		
		<?php if ($this->_tpl_vars['medico'] == '1'): ?>
		<div class="int_percentual">
			<label>Percentual:</label>
			<p class="int_percentual"><?php echo ((is_array($_tmp=$this->_tpl_vars['int_percentual'])) ? $this->_run_mod_handler('decimal', true, $_tmp) : smarty_modifier_decimal($_tmp)); ?>
 %</p>
		</div>
		<div class="int_valor_absoluto">
			<label>Valor Absoluto do Exame:</label>
			<p class="int_valor_absoluto">R$ <?php echo ((is_array($_tmp=$this->_tpl_vars['int_valor_absoluto'])) ? $this->_run_mod_handler('decimal', true, $_tmp) : smarty_modifier_decimal($_tmp)); ?>
</p>
		</div>
		<div class="int_ch">
			<label>CH:</label>
			<p class="int_ch"><?php echo $this->_tpl_vars['int_ch']; ?>
</p>
		</div>
		<div class="int_valor_ch">
			<label>Valor do CH:</label>
			<p class="int_valor_ch">R$ <?php echo ((is_array($_tmp=$this->_tpl_vars['int_valor_ch'])) ? $this->_run_mod_handler('decimal', true, $_tmp) : smarty_modifier_decimal($_tmp)); ?>
</p>
		</div>
		<div class="int_filme">
			<label>Filme:</label>
			<p class="int_filme"><?php echo ((is_array($_tmp=$this->_tpl_vars['int_filme'])) ? $this->_run_mod_handler('decimal4', true, $_tmp) : smarty_modifier_decimal4($_tmp)); ?>
</p>
		</div>
		<div class="int_valor_filme">
			<label>Valor do Filme:</label>
			<p class="int_valor_filme">R$ <?php echo ((is_array($_tmp=$this->_tpl_vars['int_valor_filme'])) ? $this->_run_mod_handler('decimal', true, $_tmp) : smarty_modifier_decimal($_tmp)); ?>
</p>
		</div>
		<div class="int_valor_contraste">
			<label>Valor do Contraste:</label>
			<p class="int_valor_contraste">R$ <?php echo ((is_array($_tmp=$this->_tpl_vars['int_valor_contraste'])) ? $this->_run_mod_handler('decimal', true, $_tmp) : smarty_modifier_decimal($_tmp)); ?>
</p>
		</div>
		<div class="int_valor_final">
			<label>Valor Final do Exame:</label>
			<p class="int_valor_final">R$ <?php echo ((is_array($_tmp=$this->_tpl_vars['int_valor_final'])) ? $this->_run_mod_handler('decimal', true, $_tmp) : smarty_modifier_decimal($_tmp)); ?>
</p>
		</div>
		<?php endif; ?>
		<div class="botoes">
			<input type="button" onClick="bt_cancelar('<?php echo $this->_tpl_vars['vars_secao']; ?>
', '');" value="Voltar">
		</div>
	</form>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "lib/templates/".($this->_tpl_vars['design']).".footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	