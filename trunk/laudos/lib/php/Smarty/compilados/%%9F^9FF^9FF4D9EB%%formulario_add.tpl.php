<?php /* Smarty version 2.6.9, created on 2005-11-07 09:54:30
         compiled from content/templates/interpretacao/formulario_add.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'jscalendar', 'content/templates/interpretacao/formulario_add.tpl', 42, false),array('function', 'html_options', 'content/templates/interpretacao/formulario_add.tpl', 48, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "lib/templates/".($this->_tpl_vars['design']).".top.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<LINK REL=StyleSheet HREF="<?php echo $this->_tpl_vars['path_tpl']; ?>
formulario_add.css" media="screen" TYPE="text/css">
	<script language="JavaScript" src="lib/js/cadastrar_laudos.js"></script>
		<form name="form_send" action="<?php echo $this->_tpl_vars['self']; ?>
" method="post">
			<input type="hidden" name="form">
			<input type="hidden" name="prontuarios">
			<input type="hidden" name="nomes">
			<input type="hidden" name="sexo_temp">
			<input type="hidden" name="sexos">
			<input type="hidden" name="data_temp">
			<input type="hidden" name="datas">
			<input type="hidden" name="exame_temp">
			<input type="hidden" name="exames">
			<input type="hidden" name="convenio_temp">
			<input type="hidden" name="convenios">
			<input type="hidden" name="opcionais">
			<input type="hidden" name="contrastes">
			<input type="hidden" name="requisitantes">
			<input type="hidden" name="tecnicos">
			<input type="hidden" name="contador" value="0">
		</form>
	<form id="form" name="form" action="<?php echo $this->_tpl_vars['self']; ?>
" method="post" >
		<input type="hidden" name="form">
		<div class="int_paciente_nome">
			<label>Nome do Paciente:</label> <span class="erro"><?php echo $this->_tpl_vars['int_paciente_nome_erro']; ?>
</span><br />
			<input class="int_paciente_nome" type="text" name="int_paciente_nome" value="<?php echo $this->_tpl_vars['int_paciente_nome']; ?>
">
		</div>
		<div class="int_paciente_prontuario">
			<label>Prontuário:</label> <span class="erro"><?php echo $this->_tpl_vars['int_paciente_pront_erro']; ?>
</span><br />
			<input class="int_paciente_prontuario" type="text" name="int_paciente_prontuario">
		</div>
		<div class="int_paciente_sexo">
			<label>Sexo:</label> <span class="erro"><?php echo $this->_tpl_vars['int_paciente_sexo_erro']; ?>
</span><br />
			<select class="int_paciente_sexo" type="text" name="int_paciente_sexo">
			<option value="M">M</option>
			<option value="F">F</option>
			</select>
		</div>
		<div class="int_paciente_nascimento">
			<label>Nascimento:</label> <span class="erro"><?php echo $this->_tpl_vars['int_paciente_nascimento_erro']; ?>
</span><br />
			<input maxlength="10" class="int_paciente_nascimento" type="text" name="int_paciente_nascimento" value="<?php echo $this->_tpl_vars['int_paciente_nascimento']; ?>
" onKeyPress="return mascara_data(this, event);" >
			<?php echo smarty_function_jscalendar(array('field' => "document.form.int_paciente_nascimento"), $this);?>

		</div>
		
		<div class="exa_id">
			<label>Exame:</label> <span class="erro"><?php echo $this->_tpl_vars['exa_id_erro']; ?>
</span><br />
			<select class="exa_id" type="text" name="exa_id">
			<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['vet_exames'],'selected' => $this->_tpl_vars['exa_id']), $this);?>

			</select>
		</div>
		<div class="int_opcional">
			<label>N° do Exame:</label> <span class="erro"><?php echo $this->_tpl_vars['int_opcional_erro']; ?>
</span><br />
			<input class="int_opcional" type="text" name="int_opcional" value="<?php echo $this->_tpl_vars['int_opcional']; ?>
">
		</div>
		
		<div class="con_id">
			<label>Convênio:</label> <span class="erro"><?php echo $this->_tpl_vars['con_id_erro']; ?>
</span><br />
			<select class="con_id" type="text" name="con_id">
			<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['vet_convenios'],'selected' => $this->_tpl_vars['con_id']), $this);?>

			</select>
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
		<div class="botoes">
			<input class="bt_enviar" type="button" onClick="insere_laudo();" value="Cadastrar">
		</div>
		<input type="button" id="bt_enviar" style="visibility:hidden; margin-left:255px;" onClick="envia_informacoes();" value="Enviar Informações >>">
		<div id="pacientes_inseridos"></div>
	</form>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "lib/templates/".($this->_tpl_vars['design']).".footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>