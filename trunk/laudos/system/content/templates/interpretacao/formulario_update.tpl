{.include file="lib/templates/$design.top.tpl".}
	<LINK REL=StyleSheet HREF="{.$path_tpl.}formulario_update.css" media="screen" TYPE="text/css">
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
	<form id="form" name="form" action="{.$self.}" method="post" onsubmit="return verifica_submit();">
		<input type="hidden" name="form">
		<div class="hos_id">
			<label>Hospital:</label>
			<p class="hos_id">{.$hos_nome.}</p>
		</div>
<!-- 		
		<div class="int_paciente_prontuario">
			<label>Prontuário:</label>
			<p class="int_paciente_prontuario">{.$int_paciente_prontuario.}</p>
		</div> -->
		
<!-- 		<div class="int_data_cadastro">
			<label>Data de Cadastro:</label>
			<p class="int_data_cadastro">{.$int_data_cadastro|date_format:"%d/%m/%Y %H:%M:%S".}</p>
		</div> -->
		
		<div class="int_paciente_nome">
			<label>Nome do Paciente:</label>
			<p class="int_paciente_nome">{.$int_paciente_nome.}</p>
		</div>
		
		<div class="int_paciente_sexo">
			<label>Sexo:</label>
			<p class="int_paciente_sexo">{.$int_paciente_sexo.}</p>
		</div>
		
		<div class="int_paciente_nascimento">
			<label>Data de Nascimento:</label>
			<p class="int_paciente_nascimento">
			{.* if $int_paciente_nascimento|date_format:"%d/%m/%Y" != "30/11/1999" *.}
				{.$int_paciente_nascimento|nascimento.}
			{.* /if *.}
			</p>
		</div>
		
		<div class="exa_id">
			<label>Exame:</label>
			<p class="exa_id">{.$exa_nome.}</p>
		</div>
		<div class="int_opcional">
			<label>N° do Exame:</label>
			<p class="int_opcional">{.$int_opcional.}</p>
		</div>
		
 		<div class="con_id">
			<label>Convênio:</label>
			<p class="con_id">{.$con_nome.}</p>
		</div>
<!--		
		<div class="int_requisitante">
			<label>Médico requisitante:</label>
			<p class="int_requisitante">{.$int_requisitante.}</p>
		</div>
		
		<div class="int_tecnico_rx">
			<label>Técnico Rx:</label>
			<p class="int_tecnico_rx">{.$int_tecnico_rx.}</p>
		</div> -->
		
		<div class="int_codigo">
			<label>Código:</label> <span class="erro">{.$int_codigo_erro.}</span><br />
			<input class="int_codigo" type="text" name="int_codigo" onKeyPress="add_txt2(event);">
		</div>
		<div class="int_texto">
			<label>Interpretação:</label> <span class="erro">{.$int_texto_erro.}</span><br />
			<textarea class="int_texto" name="int_texto">{.$int_texto.}</textarea>
		</div>
		<div class="botoes">
			<input class="bt_cancelar"type="button" onClick="history.back();" value="Cancelar">
			<input class="bt_enviar" type="button" onClick="send('');" value="Enviar">
		</div>
	</form>
	<script language="javascript">
	document.form.int_codigo.focus();
	vet_codigos = new Array();
	{.foreach from=$textos key=codigo item=texto .}
		vet_codigos['{.$codigo.}'] = "{.$texto.}";
	{./foreach.}
	</script>
{.include file="lib/templates/$design.footer.tpl".}