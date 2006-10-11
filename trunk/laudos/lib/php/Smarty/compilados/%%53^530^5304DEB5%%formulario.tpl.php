<?php /* Smarty version 2.6.9, created on 2005-07-22 13:51:10
         compiled from content/templates/interpretacao/formulario.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "lib/templates/".($this->_tpl_vars['design']).".top.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "lib/templates/menu_superior.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<LINK REL=StyleSheet HREF="<?php echo $this->_tpl_vars['path_tpl']; ?>
formulario.css" media="screen" TYPE="text/css">
	<form id="form" name="form" action="<?php echo $this->_tpl_vars['self']; ?>
" method="post" >
		<input type="hidden" name="form">
	
		<div class="int_status">
			<label>Situação:</label> <span class="erro"><?php echo $this->_tpl_vars['int_status_erro']; ?>
</span><br />
			<input class="int_status" type="text" name="int_status" value="<?php echo $this->_tpl_vars['int_status']; ?>
">
		</div>
		<div class="int_data_cadastro">
			<label>Data de Cadastro:</label> <span class="erro"><?php echo $this->_tpl_vars['int_data_cadastro_erro']; ?>
</span><br />
			<input class="int_data_cadastro" type="text" name="int_data_cadastro" value="<?php echo $this->_tpl_vars['int_data_cadastro']; ?>
">
		</div>
		<div class="int_data_interpretacao">
			<label>Data de Interpretação:</label> <span class="erro"><?php echo $this->_tpl_vars['int_data_interpretacao_erro']; ?>
</span><br />
			<input class="int_data_interpretacao" type="text" name="int_data_interpretacao" value="<?php echo $this->_tpl_vars['int_data_interpretacao']; ?>
">
		</div>
		<div class="int_data_impressao">
			<label>Data de Impressão:</label> <span class="erro"><?php echo $this->_tpl_vars['int_data_impressao_erro']; ?>
</span><br />
			<input class="int_data_impressao" type="text" name="int_data_impressao" value="<?php echo $this->_tpl_vars['int_data_impressao']; ?>
">
		</div>
		<div class="med_id">
			<label>Médico:</label> <span class="erro"><?php echo $this->_tpl_vars['med_id_erro']; ?>
</span><br />
			<input class="med_id" type="text" name="med_id" value="<?php echo $this->_tpl_vars['med_id']; ?>
">
		</div>
		<div class="hos_id">
			<label>Hospital:</label> <span class="erro"><?php echo $this->_tpl_vars['hos_id_erro']; ?>
</span><br />
			<input class="hos_id" type="text" name="hos_id" value="<?php echo $this->_tpl_vars['hos_id']; ?>
">
		</div>
		<div class="int_paciente_prontuario">
			<label>Prontuário:</label> <span class="erro"><?php echo $this->_tpl_vars['int_paciente_prontuario_erro']; ?>
</span><br />
			<input class="int_paciente_prontuario" type="text" name="int_paciente_prontuario" value="<?php echo $this->_tpl_vars['int_paciente_prontuario']; ?>
">
		</div>
		<div class="int_paciente_nome">
			<label>Nome do Paciente:</label> <span class="erro"><?php echo $this->_tpl_vars['int_paciente_nome_erro']; ?>
</span><br />
			<input class="int_paciente_nome" type="text" name="int_paciente_nome" value="<?php echo $this->_tpl_vars['int_paciente_nome']; ?>
">
		</div>
		<div class="int_paciente_nascimento">
			<label>Data de Nascimento:</label> <span class="erro"><?php echo $this->_tpl_vars['int_paciente_nascimento_erro']; ?>
</span><br />
			<input class="int_paciente_nascimento" type="text" name="int_paciente_nascimento" value="<?php echo $this->_tpl_vars['int_paciente_nascimento']; ?>
">
		</div>
		<div class="exa_id">
			<label>Exame:</label> <span class="erro"><?php echo $this->_tpl_vars['exa_id_erro']; ?>
</span><br />
			<input class="exa_id" type="text" name="exa_id" value="<?php echo $this->_tpl_vars['exa_id']; ?>
">
		</div>
		<div class="con_id">
			<label>Convênio:</label> <span class="erro"><?php echo $this->_tpl_vars['con_id_erro']; ?>
</span><br />
			<input class="con_id" type="text" name="con_id" value="<?php echo $this->_tpl_vars['con_id']; ?>
">
		</div>
		<div class="int_opcional">
			<label>Opcional:</label> <span class="erro"><?php echo $this->_tpl_vars['int_opcional_erro']; ?>
</span><br />
			<input class="int_opcional" type="text" name="int_opcional" value="<?php echo $this->_tpl_vars['int_opcional']; ?>
">
		</div>
		<div class="int_contraste">
			<label>Contraste:</label> <span class="erro"><?php echo $this->_tpl_vars['int_contraste_erro']; ?>
</span><br />
			<input class="int_contraste" type="text" name="int_contraste" value="<?php echo $this->_tpl_vars['int_contraste']; ?>
">
		</div>
		<div class="int_requisitante">
			<label>Médico requisitante:</label> <span class="erro"><?php echo $this->_tpl_vars['int_requisitante_erro']; ?>
</span><br />
			<input class="int_requisitante" type="text" name="int_requisitante" value="<?php echo $this->_tpl_vars['int_requisitante']; ?>
">
		</div>
		<div class="int_tecnico_rx">
			<label>Técnico Rx:</label> <span class="erro"><?php echo $this->_tpl_vars['int_tecnico_rx_erro']; ?>
</span><br />
			<input class="int_tecnico_rx" type="text" name="int_tecnico_rx" value="<?php echo $this->_tpl_vars['int_tecnico_rx']; ?>
">
		</div>
		<div class="int_texto">
			<label>Interpretacao:</label> <span class="erro"><?php echo $this->_tpl_vars['int_texto_erro']; ?>
</span><br />
			<input class="int_texto" type="text" name="int_texto" value="<?php echo $this->_tpl_vars['int_texto']; ?>
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