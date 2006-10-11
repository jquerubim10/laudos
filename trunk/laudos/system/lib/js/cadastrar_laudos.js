contador = 0;
function insere_laudo(){
	f = document.form;
	fs = document.form_send;
	if (f.int_paciente_nome.value.length > 0){
		document.getElementById("pacientes_inseridos").innerHTML = " - "+f.int_paciente_nome.value+"<br>"+document.getElementById("pacientes_inseridos").innerHTML;
		document.getElementById("bt_enviar").style.visibility = "visible";
		contador = contador + 1;
		fs.contador.value = contador;

		add(f.int_paciente_prontuario, fs.prontuarios);
		add(f.int_paciente_nome, fs.nomes);
		fs.sexo_temp.value = f.int_paciente_sexo.options[f.int_paciente_sexo.selectedIndex].value;
		add(fs.sexo_temp, fs.sexos);
		//fs.data_temp.value = f.ano.options[f.ano.selectedIndex].value+"-"+f.mes.options[f.mes.selectedIndex].value+"-"+f.dia.options[f.dia.selectedIndex].value;
		add(f.int_paciente_nascimento, fs.datas);
		fs.exame_temp.value = f.exa_id.options[f.exa_id.selectedIndex].value;
		add(fs.exame_temp, fs.exames);
		fs.convenio_temp.value = f.con_id.options[f.con_id.selectedIndex].value;
		add(fs.convenio_temp, fs.convenios);
		add(f.int_opcional, fs.opcionais);
		add(f.int_requisitante, fs.requisitantes);
		add(f.int_tecnico_rx, fs.tecnicos);
		f.reset();	
	}
}

function envia_informacoes(){
	alert("Certifique-se de que sua conexão com a internet esteja ativada.");
	if(confirm("Confirma o envio das informações para o servidor?")){
		fs = document.form_send;
		fs.form.value= "ok";
		fs.submit();
	}
}

function add(obj_fonte, obj_destino){
	obj_destino.value += "[.SEPARADOR.]" + obj_fonte.value;
}