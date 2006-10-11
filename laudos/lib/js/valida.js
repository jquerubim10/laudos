// JavaScript Document
/*

	=====================
	 VALIDAÇÃO DE CPF
	++++++++++++++++++++

*/

	function valida_cpf(cpf)
	{
		valido = "sim";
		var i;
		s = cpf; 
		s = s.replace(".", "");
		s = s.replace(".", "");
		s = s.replace("-", "");
		var c = s.substr(0,9); 
		var dv = s.substr(9,2); 
		var d1 = 0; 
		for (i = 0; i < 9; i++) 
		{ 
			d1 += c.charAt(i)*(10-i); 
		} 
		if (d1 == 0)
		{ 
			valido = "nao";
		} 
		d1 = 11 - (d1 % 11); 
		if (d1 > 9) d1 = 0; 
		if (dv.charAt(0) != d1) 
		{ 
			valido = "nao";
  
		} 
		d1 *= 2; 
  		for (i = 0; i < 9; i++) 
		{ 
			d1 += c.charAt(i)*(11-i); 
		} 
		d1 = 11 - (d1 % 11); 
		if (d1 > 9) d1 = 0; 
		if (dv.charAt(1) != d1) 
		{ 
			valido = "nao";
		}
		if (valido == "nao")
			return false;
		else
			return true;

	}

/*

	=====================
	 VALIDAÇÃO DE CNPJ
	++++++++++++++++++++

*/
	function valida_cnpj(cnpj)
	{
		var cgc = trimtodigits(cnpj);  
		if ((cgc.indexOf("-") != -1) || (cgc.indexOf(".") != -1) || (cgc.indexOf("/") != -1)){  
			return( false )  
		}  
		var df, resto, dac = ""  
		df = 5*cgc.charAt(0)+4*cgc.charAt(1)+3*cgc.charAt(2)+2*cgc.charAt(3)+9*cgc.charAt(4)+8*cgc.charAt(5)+7*cgc.charAt(6)+6*cgc.charAt(7)+5*cgc.charAt(8)+4*cgc.charAt(9)+3*cgc.charAt(10)+2*cgc.charAt(11)  
		resto = df % 11  
		dac += ( (resto <= 1) ? 0 : (11-resto) )  
		df = 6*cgc.charAt(0)+5*cgc.charAt(1)+4*cgc.charAt(2)+3*cgc.charAt(3)+2*cgc.charAt(4)+9*cgc.charAt(5)+8*cgc.charAt(6)+7*cgc.charAt(7)+6*cgc.charAt(8)+5*cgc.charAt(9)+4*cgc.charAt(10)+3*cgc.charAt(11)+2*parseInt(dac)  
		resto = df % 11  
		dac += ( (resto <= 1) ? 0 : (11-resto) )  
		return (dac == cgc.substring(cgc.length-2,cgc.length))  
	}  
	function trimtodigits(tstring){  
		s="";  
		ts=new String(tstring);  
		for (x=0;x<ts.length;x++){  
			ch=ts.charAt(x);  
				if (asc(ch)>=48 && asc(ch)<=57){  
				s=s+ch;  
			}  
		}  
		return s;  
	}  
	// Retorna o código ASC do caracter passada por parâmetro  
	function asc(achar){  
		var n=0;  
		var ascstr = makeCharsetString()  
		for(i=0;i<ascstr.length;i++){  
			if(achar==ascstr.substring(i,i+1)){  
				n=i;  
				break;  
			}  
		}  
		return n+32  
	}  
	
	// Gera uma string com os caracteres básicos na sequência de códigos ASC  
	function makeCharsetString(){  
		var astr  
		astr = ' !"#$%&\'()*+,-./0123456789:;<=>?@'  
		astr+= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'  
		astr+= '[\]^_`abcdefghijklmnopqrstuvwxyz'  
		astr+= '{|}~'  
		return astr  
	}

/*

	=====================
	 VALIDAÇÃO DE EMAIL
	++++++++++++++++++++

*/

	function valida_email(email) {
  //  d+(ed+)*@d+(ed+)*.(d2|d3))
	  var filtro = /^([a-zA-Z0-9])+([\.\-\_]([a-zA-Z0-9])+)*\@([a-zA-Z0-9])+([\.\-\_]([a-zA-Z0-9])+)*\.([a-zA-Z0-9]{2,4})$/;
	  if (filtro.test(email)) {
		return true;
	  } else {
		return false;
	  }
  }

/*

	=====================
	 VALIDAÇÃO DE DATA
	++++++++++++++++++++

*/
	function valida_data(data)
	{
		if (data.length == 10)
		{
			vet = data.split("/");
			if (vet.length == 3)
			{
				if ((vet[0] > "00" ) && (vet[0] < "32" ) && (vet[1] > "00" ) && (vet[1] < "13" ) && (vet[2] > "1900") && (vet[2] < "3000"))
				{
					return true;
				}
			}
		}
		return false;
	}