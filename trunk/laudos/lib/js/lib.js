// JavaScript Document

	function change_select(a){
		document.form.submit();
		}
		
	function muda_classe_css(obj, classe){
		obj.className=classe;
		}
	
	function confirm_action(url, message) {
		res = confirm(message);
		if (res)
			document.location.href = url;
	}
	
	function popup (url, name, tamW, tamH, TopPosition, LeftPosition, scrolling)
	{
		settings='width='+tamW+',height='+tamH+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scrolling+',location=no,directories=no,status=no,menubar=no,toolbar=no,resizable=no';
		win=window.open(url,name,settings);
	}
	
	function popup_add_new(nome_campo, vars){
	
			//popup("site.php?"+vars, nome_campo, "587", "450", "10", "1", "yes");
			popup("site.php?"+vars, nome_campo, screen.availWidth, screen.availHeight, "10", "1", "yes");
			
		}
	
	
	function popup_foto(nome_campo, vars){
	
			popup("site.php?"+vars, nome_campo, "587", "510", "1", "1", "yes");
			
		}
		
	function popup_relatorio(nome_campo, vars){
		popup("site.php?"+vars, nome_campo, screen.availWidth, screen.availHeight, "10", "1", "yes");
	}
	
	function popup_levantamento_estatistico(nome_campo, vars){
		popup(vars, nome_campo, "580", "500", "10", "1", "yes");
	}
	
	function maximize_window(){
	/***********************************************
	* Auto Maximize Window Script- © Dynamic Drive (www.dynamicdrive.com)
	* This notice must stay intact for use
	* Visit http://www.dynamicdrive.com/ for this script and 100's more.
	***********************************************/
		top.window.moveTo(-3,-2);
		if (document.all) {
			top.window.resizeTo(screen.availWidth+8,screen.availHeight+8);
		} else if (document.layers||document.getElementById) {
			if (top.window.outerHeight<screen.availHeight||top.window.outerWidth<screen.availWidth){
			top.window.outerHeight = screen.availHeight+8;
			top.window.outerWidth = screen.availWidth+8;
			}
		}
	}
	
		
	msg_erro = "";
	msg_sucesso = "";
	foco = "";
	
	function show_msg_erro(){
			if (msg_erro != ""){
				alert("ERRO!\n\n\n"+msg_erro);
			}
		}
	function show_msg_sucesso(){
			if (msg_sucesso != ""){
				alert("SUCESSO!\n\n\n"+msg_sucesso);
			}
		}
		
	function set_focus(){
		if (foco != ""){
			eval("document.form."+foco+".focus();");
			//alert("document.form."+foco+".focus();");
		}
	}
	
	
	function send_btn(confirmar){
		f = document.form;
		if (confirmar == ""){
			f.form.value = "ok";
			f.submit();
		} else {
			if (confirm(confirmar)){
				f.form.value = "ok";
				f.submit();
			}
		}
		f.button_send.value = "Aguarde...";
		f.button_send.disabled = true;
	}
	
	function send(confirmar){
		f = document.form;
		if (confirmar == ""){
			f.form.value = "ok";
			f.submit();
			//f.button_send.onclick = "";
			//document.getElementById("aviso_send").innerHTML = "Enviando ... &nbsp;&nbsp;"
		} else {
			if (confirm(confirmar)){
				f.form.value = "ok";
				f.submit();
				//f.button_send.onclick = "";
				//document.getElementById("aviso_send").innerHTML = "Enviando ... &nbsp;&nbsp;"
			}
		}
	//	f.button_send.disabled = true;
	}
	
	function keypress(confirmar, event){
		var tecla;
		if(navigator.appName.indexOf("Netscape")!= -1) 
			tecla= event.which; 
		else 
			tecla= event.keyCode;
		if (tecla == "13")
			send(confirmar);
	}
	
	function permite_enter(event){
		var tecla;
		if(navigator.appName.indexOf("Netscape")!= -1) 
			tecla= event.which; 
		else 
			tecla= event.keyCode;
		if (tecla == "13")
			true;
	}
	
	
	// JavaScript Document
		function isNum( caractere ) 
		{ 
			var strValidos = "0123456789" 
			if ( strValidos.indexOf( caractere ) == -1 ) 
				return false; 
			return true; 
		}
		
		function isValid(valor)
		{
			//alert("valido: "+valor);
			var LEFT = 37;
			var RIGHT = 39;
			var HOM = 36;
			var END = 35;
	//		var DEL = 46;
			var INS = 45;
			var CAPS = 20;
			var SHIFT = 16;
			var BACKSPACE = 8;
			var TAB = 0;
			if ((valor == LEFT) || (valor == RIGHT) || (valor == HOM) || (valor == END) || (valor == INS) || (valor == CAPS) || (valor == SHIFT) || (valor == BACKSPACE) || (valor == TAB))
				return(true);
			return(false);
		}
	
		function limpa_campoNum(valor)
		{
			t = valor.length;
			novovalor='';
			for(i=0; i<=t-1; i++)
			{
				if (isNum(valor.charAt(i)))
				{
					novovalor += valor.charAt(i);
				}
			}
			return(novovalor);
		}
		
		function add_select(value, text, select){
			  campo = eval("document.form."+select);
			  option = document.createElement("OPTION");
			  option.text = text;
			  option.value = value;
			  campo.options.add(option);
			  //alert(campo.options.length-1);
			  campo.options[campo.options.length-1].selected=true;
		}
		
		function float_to_peso(valor){
			var vet_valor = new Array(2);
			vet_valor = valor.split(".");
			if (vet_valor[1])
				decimal = vet_valor[1].charAt(0)+vet_valor[1].charAt(1);
			else
				decimal = "00";
			if (decimal.length == 1)
				decimal += "0";
			//alert(decimal);
			peso = limpa_campoNum(vet_valor[0]+decimal);
			t = peso.length;
			a = t;
			//if (tecla == 0)
			a--;
			a--;
			novopeso = "";
			for(i=0; i<=t-1; i++)
			{
				novopeso+=peso.charAt(i);
				if (i==a-1)
					novopeso+=",";
				if (i==a-4)
					novopeso+=".";
				if (i==a-7)
					novopeso+=".";
				if (i==a-10)
					novopeso+=".";
				if (i==a-13)
					novopeso+=".";
				if (i==a-16)
					novopeso+=".";
				if (i==a-19)
					novopeso+=".";
			}
	/*
	3 casas
			var vet_valor = new Array(2);
			vet_valor = valor.split(".");
			if (vet_valor[1])
				decimal = vet_valor[1].charAt(0)+vet_valor[1].charAt(1)+vet_valor[1].charAt(2);
			else
				decimal = "000";
			if (decimal.length == 1)
				decimal += "00";
			else if (decimal.length == 2)
				decimal += "0";
			//alert(decimal);
			peso = limpa_campoNum(vet_valor[0]+decimal);
			t = peso.length;
			a = t;
			//if (tecla == 0)
			a--;
			a--;
			novopeso = "";
			for(i=0; i<=t-1; i++)
			{
				novopeso+=peso.charAt(i);
				if (i==a-2)
					novopeso+=",";
				if (i==a-5)
					novopeso+=".";
				if (i==a-8)
					novopeso+=".";
				if (i==a-11)
					novopeso+=".";
				if (i==a-14)
					novopeso+=".";
				if (i==a-17)
					novopeso+=".";
				if (i==a-20)
					novopeso+=".";
			}
	*/
			return(novopeso);
		}
		
		
		function peso_to_float(valor)
		{
			t = valor.length;
			novovalor='';
			for(i=0; i<=t-1; i++)
			{
				if (isNum(valor.charAt(i)))
				{
					novovalor += valor.charAt(i);
				} else if(valor.charAt(i) == ","){
					novovalor += ".";
				}
			}
			return(novovalor);
		}
		
		function select_get_text(valor, campo){
			t = campo.options.length;
			for(i=0;i<=t-1;i++){
				if (campo.options[i].value == valor){
					return(campo.options[i].text);
					break;
				}
			}
		}
		
		function href(url){
			document.location.href = url;
		}
		
		function bt_cancelar(url, url_opener){
/*			if (window.opener){
				if (url_opener == "") {
					if (window.opener.form){
						window.opener.document.form.submit();
					} else {
						window.opener.document.location.reload();
					}
				} else {
					window.opener.document.location.href = url_opener;
				}
				window.opener.focus();
				window.close();
			} else if (url == "") {*/
				history.back();
			/*} else {
				href(url);
			}*/
		}
		
		function txtPadraoIn(obj, padrao){
			if (obj.value == padrao){
				obj.value = "";
				}
			}
		function txtPadraoOut(obj, padrao){
			if (obj.value == ""){
				obj.value = padrao;
				}
			}