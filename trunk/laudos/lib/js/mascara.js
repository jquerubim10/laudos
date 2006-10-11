// JavaScript Document
	function mascara_cpf(campo, event)
  	{
		var key; 
		var tecla;
		if(navigator.appName.indexOf("Netscape")!= -1) 
			tecla= event.which; 
		else 
			tecla= event.keyCode;
		key = String.fromCharCode(tecla);

		if ( (isNum(key)) || (isValid(tecla)) )
		{
			if (isNum(key)){
				return(iteracao_cpf(campo));
			} else {
					return(true);
			}
		}
		else
		{
			return(false);
		}
	}
	function iteracao_cpf(campo){
		cpf = limpa_campoNum(campo.value);
		t = cpf.length;
		if (t > 11)
			t = 11;
		novocpf = "";
		for(i=0; i<=t-1; i++)
		{
			if (i==3)
				novocpf+=".";
			if (i==6)
				novocpf+=".";
			if (i==9)
				novocpf+="-";
			novocpf+=cpf.charAt(i);
		}
		campo.value = novocpf;
		return(true);
	}





	function mascara_cnpj(campo, event)
  	{
		var key; 
		var tecla;
		if(navigator.appName.indexOf("Netscape")!= -1) 
			tecla= event.which; 
		else 
			tecla= event.keyCode;
		key = String.fromCharCode(tecla);

		if ( (isNum(key)) || (isValid(tecla)) )
		{
			if (isNum(key)){
				return(iteracao_cnpj(campo));
			} else {
					return(true);
			}
			
		}
		else
		{
			return(false);
		}
	}
	function iteracao_cnpj(campo){
		cnpj = limpa_campoNum(campo.value);
		t = cnpj.length;
		//alert(t);
		if (t > 14)
			t = 14;
		novocnpj = "";
		for(i=0; i<=t-1; i++)
		{
			novocnpj+=cnpj.charAt(i);
			if (i==1)
				novocnpj+=".";
			if (i==4)
				novocnpj+=".";
			if (i==7)
				novocnpj+="/";
			if (i==11)
				novocnpj+="-";
		}
		campo.value = novocnpj;
		return(true);
	}


	function mascara_decimal4(campo, event)
  	{
		var key; 
		var tecla;
		if(navigator.appName.indexOf("Netscape")!= -1) 
			tecla= event.which; 
		else 
			tecla= event.keyCode;
		key = String.fromCharCode(tecla);
		if ((isNum(key)) || (isValid(tecla)) )
		{
			if (isNum(key)){
				return(iteracao_decimal4(campo));
			} else {
					return(true);
			}
		}
		else
		{
			return(false);
		}
	} 
	function iteracao_decimal4(campo){
		valor = limpa_campoNum(campo.value);
		t = valor.length;
		a = t;
		//if (tecla == 0)
		a--;
		novovalor = "";
		for(i=0; i<=t-1; i++)
		{
			novovalor+=valor.charAt(i);
			if (i==a-3)
				novovalor+=",";
			if (i==a-6)
				novovalor+=".";
			if (i==a-9)
				novovalor+=".";
			if (i==a-12)
				novovalor+=".";
			if (i==a-15)
				novovalor+=".";
			if (i==a-18)
				novovalor+=".";
			if (i==a-21)
				novovalor+=".";
		}
		campo.value = novovalor;
		return(true);
	}


	function mascara_preco(campo, event)
  	{
		var key; 
		var tecla;
		if(navigator.appName.indexOf("Netscape")!= -1) 
			tecla= event.which; 
		else 
			tecla= event.keyCode;
		key = String.fromCharCode(tecla);

		if ((isNum(key)) || (isValid(tecla)) )
		{
			if (isNum(key)){
				return(iteracao_preco(campo));
			} else {
					return(true);
			}
		}
		else
		{
			return(false);
		}
	}
	
	function iteracao_preco(campo){
		preco = limpa_campoNum(campo.value);
		t = preco.length;
		a = t;
		//if (tecla == 0)
		a--;
		novopreco = "";
		for(i=0; i<=t-1; i++)
		{
			novopreco+=preco.charAt(i);
			if (i==a-1)
				novopreco+=",";
			if (i==a-4)
				novopreco+=".";
			if (i==a-7)
				novopreco+=".";
			if (i==a-10)
				novopreco+=".";
			if (i==a-13)
				novopreco+=".";
			if (i==a-16)
				novopreco+=".";
			if (i==a-19)
				novopreco+=".";
		}
		campo.value = novopreco;
		return(true);
	}
	
	
	function mascara_data(campo, event)
  	{
		var key; 
		var tecla;
		if(navigator.appName.indexOf("Netscape")!= -1) 
			tecla= event.which; 
		else 
			tecla= event.keyCode;
		key = String.fromCharCode(tecla);

		if ( (isNum(key)) || (isValid(tecla)) )
		{
			if (isNum(key)){
				return(iteracao_data(campo));
			} else {
				return(true);
			}
			
		} else {
			return(false);
		}
	} 
	
	function iteracao_data(campo){
		valor = limpa_campoNum(campo.value);
		t = valor.length;
		if (t > 8)
			t = 8;
		novodata = "";
		for(i=0; i<=t-1; i++)
		{
			if (i==2)
				novodata+="/";
			if (i==4)
				novodata+="/";
			novodata+=valor.charAt(i);
		}

		campo.value = novodata;
		return(true);
	}

	function mascara_data_hora(campo, event)
  	{
		var key; 
		var tecla;
		if(navigator.appName.indexOf("Netscape")!= -1) 
			tecla= event.which; 
		else 
			tecla= event.keyCode;
		key = String.fromCharCode(tecla);

		if ( (isNum(key)) || (isValid(tecla)) )
		{
			if (isNum(key)){
				return(iteracao_data_hora(campo));
			} else {
					return(true);
			}
			
		}
		else
		{
			return(false);
		}
	} 

	function iteracao_data_hora(campo){
		data_hora = limpa_campoNum(campo.value);
		t = data_hora.length;
		if (t > 12)
			t = 12;
		novodata_hora = "";
		for(i=0; i<=t-1; i++)
		{
			if (i==2)
				novodata_hora+="/";
			if (i==4)
				novodata_hora+="/";
			if (i==8)
				novodata_hora+=" ";
			if (i==10)
				novodata_hora+=":";

			novodata_hora+=data_hora.charAt(i);
		}

		campo.value = novodata_hora;
		return(true);
	}
	
	function mascara_hora(campo, event)
  	{
		var key; 
		var tecla;
		if(navigator.appName.indexOf("Netscape")!= -1) 
			tecla= event.which; 
		else 
			tecla= event.keyCode;
		key = String.fromCharCode(tecla);

		if ( (isNum(key)) || (isValid(tecla)) )
		{
			if (isNum(key)){
				return(iteracao_hora(campo));
			} else {
					return(true);
			}
			
		}
		else
		{
			return(false);
		}
	} 

	function iteracao_hora(campo){
		hora = limpa_campoNum(campo.value);
		t = hora.length;
		if (t > 4)
			t = 4;
		novohora = "";
		for(i=0; i<=t-1; i++)
		{
			if (i==2)
				novohora+=":";
			novohora+=hora.charAt(i);
		}
		campo.value = novohora;
		return(true);
	}

	

	function mascara_cep(campo, event)
  	{
		var key; 
		var tecla;
		if(navigator.appName.indexOf("Netscape")!= -1) 
			tecla= event.which; 
		else 
			tecla= event.keyCode;
		key = String.fromCharCode(tecla);
		var r = true;

		if ( (isNum(key)) || (isValid(tecla)) )
		{
			if (isNum(key)){
				return(iteracao_cep(campo));
			} else {
					return(true);
			}
		}
		else
		{
			r = false;
		}
		return(r);

	}
	
	function iteracao_cep(campo){
		cep = limpa_campoNum(campo.value);
		t = cep.length;
		if (t > 8)
			t = 8;
		novocep = "";
		for(i=0; i<=t-1; i++)
		{
			if (i==5)
				novocep+="-";
			novocep+=cep.charAt(i);
		}
		campo.value = novocep;
		return(true);
	}
	
function mascara_int(campo, event)
  	{
		var key; 
		var tecla;
		if(navigator.appName.indexOf("Netscape")!= -1) 
			tecla= event.which; 
		else 
			tecla= event.keyCode;
		key = String.fromCharCode(tecla);
		//alert(isValid(tecla));
		if ( ( isNum(key) ) || ( isValid(tecla) ) )
		{
			return(true);
		} else {
			return(false);
		}

	}


	function mascara_telefone(campo, event, tipo)
  	{
		var key; 
		var tecla;
		if(navigator.appName.indexOf("Netscape")!= -1) 
			tecla= event.which; 
		else 
			tecla= event.keyCode;
		key = String.fromCharCode(tecla);
		var r = true;

		if ( (isNum(key)) || (isValid(tecla)) )
		{
			telefone = limpa_campoNum(campo.value);
			t = telefone.length;
			switch (tipo) {
			case "fixo":
				tmax = 9;
				pos_traco = 5;
				break;
			case "celular":
				tmax = 10;
				pos_traco = 6;
				break;
			}
			if (t > tmax)
				t = tmax;
			novotelefone = "";
			for(i=0; i<=t-1; i++)
			{
				if (i==0)
					novotelefone+="(";
				if (i==2)
					novotelefone+=") ";
				if (i==pos_traco)
					novotelefone+="-";
				novotelefone+=telefone.charAt(i);
			}
			campo.value = novotelefone;
		}
		else
		{
			r = false;
		}
		return(r);

	}