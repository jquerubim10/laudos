<?php /* Smarty version 2.6.9, created on 2005-11-22 14:46:08
         compiled from content/templates/interpretacao/formulario_update.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'content/templates/interpretacao/formulario_update.tpl', 46, false),array('modifier', 'nascimento', 'content/templates/interpretacao/formulario_update.tpl', 63, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "lib/templates/".($this->_tpl_vars['design']).".top.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<LINK REL=StyleSheet HREF="<?php echo $this->_tpl_vars['path_tpl']; ?>
formulario_update.css" media="screen" TYPE="text/css">
	<script language="javascript">
		function add_txt2(event){
			var tecla;
			if(navigator.appName.indexOf("Netscape")!= -1) 
				tecla= event.which; 
			else 
				tecla= event.keyCode;
			if (tecla == "13"){
				txt = vet_codigos[document.form.int_codigo.value];
				if (txt){
					interpertacao = document.form.int_texto;
					if (interpertacao.value == "") {
						interpertacao.value  = interpertacao.value + txt;
					} else {
						interpertacao.value  = interpertacao.value + "\n" + txt;
					}
				}
				document.form.int_codigo.value = '';
				document.form.int_codigo.focus();		
			}
		}
		function verifica_submit(){
			if (document.form.form.value == 'ok')
				return true;
			else
				return false;
		}
	
	</script>
	<form id="form" name="form" action="<?php echo $this->_tpl_vars['self']; ?>
" method="post" onsubmit="return verifica_submit();">
		<input type="hidden" name="form">
		<div class="hos_id">
			<label>Hospital:</label>
			<p class="hos_id"><?php echo $this->_tpl_vars['hos_nome']; ?>
</p>
		</div>
<!-- 		
		<div class="int_paciente_prontuario">
			<label>Prontuário:</label>
			<p class="int_paciente_prontuario"><?php echo $this->_tpl_vars['int_paciente_prontuario']; ?>
</p>
		</div> -->
		
<!-- 		<div class="int_data_cadastro">
			<label>Data de Cadastro:</label>
			<p class="int_data_cadastro"><?php echo ((is_array($_tmp=$this->_tpl_vars['int_data_cadastro'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y %H:%M:%S") : smarty_modifier_date_format($_tmp, "%d/%m/%Y %H:%M:%S")); ?>
</p>
		</div> -->
		
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
							<?php echo ((is_array($_tmp=$this->_tpl_vars['int_paciente_nascimento'])) ? $this->_run_mod_handler('nascimento', true, $_tmp) : smarty_modifier_nascimento($_tmp)); ?>

						</p>
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
<!--		
		<div class="int_requisitante">
			<label>Médico requisitante:</label>
			<p class="int_requisitante"><?php echo $this->_tpl_vars['int_requisitante']; ?>
</p>
		</div>
		
		<div class="int_tecnico_rx">
			<label>Técnico Rx:</label>
			<p class="int_tecnico_rx"><?php echo $this->_tpl_vars['int_tecnico_rx']; ?>
</p>
		</div> -->
		
		<div class="int_codigo">
			<label>Código:</label> <span class="erro"><?php echo $this->_tpl_vars['int_codigo_erro']; ?>
</span><br />
			<input class="int_codigo" type="text" name="int_codigo" onKeyPress="add_txt2(event);">
		</div>
		<div class="int_texto">
			<label>Interpretação:</label> <span class="erro"><?php echo $this->_tpl_vars['int_texto_erro']; ?>
</span><br />
			<textarea class="int_texto" name="int_texto"><?php echo $this->_tpl_vars['int_texto']; ?>
</textarea>
		</div>
		<div class="botoes">
			<input class="bt_cancelar"type="button" onClick="history.back();" value="Cancelar">
			<input class="bt_enviar" type="button" onClick="send('');" value="Enviar">
		</div>
	</form>
	<script language="javascript">
	document.form.int_codigo.focus();
	vet_codigos = new Array();
	<?php $_from = $this->_tpl_vars['textos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['codigo'] => $this->_tpl_vars['texto']):
?>
		vet_codigos['<?php echo $this->_tpl_vars['codigo']; ?>
'] = "<?php echo $this->_tpl_vars['texto']; ?>
";
	<?php endforeach; endif; unset($_from); ?>
	</script>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "lib/templates/".($this->_tpl_vars['design']).".footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>