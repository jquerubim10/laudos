<?
/**
 * @package Utilitários
 */
	class Formatacao {
    /**#@+
     * Classe Formatacao
	 * Conjunto de métodos que formatam tipos de valores.
     */
	 
    /**
     * formatação de texto
     *
     * @param string $s texto a ser formatado.
     * @return string.
	 * 
     */
		function formatText($s){
			return(addslashes(htmlspecialchars(trim($s))));
		}	 
	 
    /**
     * formatação de e-mail
     *
     * @param string $s email a ser formatado.
     * @return string.
	 * 
     */
		function formatEmail($s){
			return(addslashes(htmlspecialchars(trim($s))));
		}
		
    /**
     * formatação de numeros inteiros
     *
     * @param string $var numero a ser formatado.
     * @return string.
	 * 
     */
		function formatInt($var){
		  return (addslashes(htmlspecialchars(trim(strval(intval($var))))));
		}

    /**
     * formatacao de numeros com casas decimais
     *
     * @param string $var numero a ser formatado.
     * @return string.
	 * 
     */
		function formatFloat($var){
		  return (addslashes(htmlspecialchars(trim(str_replace(",",".",str_replace(".","",$var))))));
		}
		
    /**
     * formatacao de numeros com casas decimais
     *
     * @param string $var numero a ser formatado.
     * @return string.
	 * 
     */
		function formatFloat4($var){
		  return (addslashes(htmlspecialchars(trim(str_replace(",",".",str_replace(".","",$var))))));
		}
		
    /**
     * formatacao de siglas de estados brasileiros
     *
     * @param string $var UF a ser formatado.
     * @return string.
	 * 
     */
		function formatUf($var){
			return(addslashes(htmlspecialchars(trim(strtoupper(trim(strval($var)))))));
		}
		
    /**
     * formatacao de Data para o mysql - entra 30/01/2005 e sai 2005-01-30
     *
     * @param string $var
     * @return string.
	 * 
     */
		function formatData($var){
			list ($dia, $mes, $ano_hora) = split ("/", $var);
			return(strval($ano_hora)."-".strval($mes)."-".strval($dia));
		}
		
    /**
     * formatacao de Data para o brasil - entra 2005-01-30 e sai 30/01/2005
     *
     * @param string $var
     * @return string.
	 * 
     */
		function formatBrData($var){
			list ($ano, $mes, $dia) = split ("-", $var);
			return(strval($dia)."/".strval($mes)."/".strval($ano)); 
		}
    /**
     * formatacao de DataHoraMinSeg para o formato do mysql - entra 30/12/2000 18:40:33 e sai 2000-12-30 18:40:33
     *
     * @param string $var
     * @return string.
	 * 
     */
		function formatDataHoraMinSeg($var){
			list ($dia, $mes, $ano_hora) = split ("/", $var);
			$ano_hora 		= strval($ano_hora);
			$vet_ano_hora 	= split(" ",$ano_hora);
			$ano 			= $vet_ano_hora[0];
			$vet_hora 		= split(":",$vet_ano_hora[1]);
			$h				= $vet_hora[0];
			$min			= $vet_hora[1];
			$seg			= $vet_hora[2];
			$seg    		= ($data_hora="datetime"?(empty($seg) ? ":00" : ":".$seg):":00");
			return($ano."-".$mes."-".$dia." ".$h.":".$min.$seg);
		}
		
    /**
     * formatacao de DataHoraMinSeg para o formato do brasil - entra 2000-12-30 18:40:33 e sai 30/12/2000 18:40:33
     *
     * @param string $var
     * @return string.
	 * 
     */
		function formatBrDataHoraMinSeg($var){
			list ($ano, $mes, $dia) = split ("-", $var);
			$data .= strval(substr($dia,0,2))."/".strval($mes)."/".strval($ano); 
			list ($hh, $mm) = split(":", $var);
			$data .= " ".strval(substr($hh, -2)) . ":" . strval($mm);
			return($data);
		
		}
		
    /**
     * formatacao de numeros float 1000.15 para decimal 1.000,15
     *
     * @param string $s numero a ser formatado.
     * @return string.
	 * 
     */
		function formatFloatToDecimal($s)
		{
			if (substr($s,0,1) == "-"){
				$add = "-";
				$s=str_replace("-","",$s);
			}
			$s=str_replace(".","",Formatacao::dd($s));
			////echo $s."<br><br>";
			$t = strlen($s);
			//echo $t."<br><br>";
			$a = $t;
			$a--;
			//echo $a."<br><br>";
			$novopreco = "";
			for($i=0; $i<=$t-1; $i++)
			{
				$x = $s{$i};
				$novopreco .= $x;
				//echo $x."<br>";
				if ($i==$a-2)
					$novopreco.=",";
				if ($i==$a-5)
					$novopreco.=".";
				if ($i==$a-8)
					$novopreco.=".";
				if ($i==$a-11)
					$novopreco.=".";
				if ($i==$a-14)
					$novopreco.=".";
				if ($i==$a-17)
					$novopreco.=".";
				if ($i==$a-20)
					$novopreco.=".";
			}
			return($add.$novopreco);
		}
		
		
    /**
     * formatacao de numeros float 1000.1512 para decimal 1.000,1512
     *
     * @param string $s numero a ser formatado.
     * @return string.
	 * 
     */
		function formatFloat4ToDecimal4($s)
		{
			if (substr($s,0,1) == "-"){
				$add = "-";
				$s=str_replace("-","",$s);
			}
			$s=str_replace(".","",Formatacao::dddd($s));
			////echo $s."<br><br>";
			$t = strlen($s);
			//echo $t."<br><br>";
			$a = $t;
			$a--;
			//echo $a."<br><br>";
			$novopreco = "";
			for($i=0; $i<=$t-1; $i++)
			{
				$x = $s{$i};
				$novopreco .= $x;
				//echo $x."<br>";
				if ($i==$a-4)
					$novopreco.=",";
				if ($i==$a-7)
					$novopreco.=".";
				if ($i==$a-10)
					$novopreco.=".";
				if ($i==$a-12)
					$novopreco.=".";
				if ($i==$a-16)
					$novopreco.=".";
				if ($i==$a-19)
					$novopreco.=".";
				if ($i==$a-22)
					$novopreco.=".";
			}
			return($add.$novopreco);
		}
		
		
    /**
     * utilitario para formatacao de casas decimais
     *
     * @param string $s numero a ser formatado.
     * @return string.
	 * 
     */
		function dd($s){
			$s = str_replace(",",".",$s);
			return(sprintf("%01.2f",strval(floatval($s))));
		}
		
    /**
     * utilitario para formatacao de casas decimais
     *
     * @param string $s numero a ser formatado.
     * @return string.
	 * 
     */
		function dddd($s){
			$s = str_replace(",",".",$s);
			return(sprintf("%01.4f",strval(floatval($s))));
		}
	}
?>