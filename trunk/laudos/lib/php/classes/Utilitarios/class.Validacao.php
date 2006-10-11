<?
/**
 * @package Utilitários
 */
	class Validacao {
    /**#@+
     * Classe Validacao
	 * Conjunto de métodos que validam determinados formatos de valores.
     */
	 
    /**
     * validação de texto
     *
     * @param string $s texto a ser validado.
     * @return bool.
	 * 
     */
		function isText($s){
			return(true);
		}	 
	 
    /**
     * validação de e-mail
     *
     * @param string $s email a ser validado.
     * @return bool.
	 * 
     */
		function isEmail($s){
			return(eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $s));
		}
		
    /**
     * validação de numeros inteiros
     *
     * @param mixed $var numero a ser validado.
     * @return bool.
	 * 
     */
		function isInt($var){
		  return ereg('^[\+-]{0,1}[0-9]+(\.[0]+){0,1}$', trim(strval($var)));
		}

    /**
     * validação de numeros com casas decimais
     *
     * @param mixed $var numero a ser validado.
     * @return bool.
	 * 
     */
		function isFloat($var){
		  $var = Formatacao::formatFloat($var);
		  return ereg('^[\+-]{0,1}[0-9]+(\.[0-9]+){0,1}$', trim(strval($var)));
		}
		
    /**
     * validação de numeros com casas decimais
     *
     * @param mixed $var numero a ser validado.
     * @return bool.
	 * 
     */
		function isFloat4($var){
		  $var = Formatacao::formatFloat4($var);
		  return ereg('^[\+-]{0,1}[0-9]+(\.[0-9]+){0,1}$', trim(strval($var)));
		}
		
    /**
     * validação de siglas de estados brasileiros
     *
     * @param string $var UF a ser validado.
     * @return bool.
	 * 
     */
		function isUf($var){
			return(in_array(strtoupper(trim(strval($var))), array("RS", "SC", "PR", "SP", "MG", "AL", "RJ", "MT", "PE", "BA")));
		}
		
    /**
     * validação Data
     *
     * @param string $var
     * @return bool.
	 * 
     */
		function isData($var){
			$vet	= split("/",$var);
			$dia	= intval($vet["0"]);
			$mes	= intval($vet["1"]);
			$ano	= intval($vet["2"]);
			$resto	= $vet["3"];
			if (($dia > 31) || ($dia < 0)){
				return(false);
			} else if (($mes > 12) || ($mes < 0)){
				return(false);
			} else if (($ano > 2030) || ($ano < 1900)){
				return(false);
			} else if (empty($resto)) {
				return(true);
			} else {
				return(false);
			}
		}
		
    /**
     * validação DataHoraMinSeg
     *
     * @param string $var
     * @return bool.
	 * 
     */
		function isDataHoraMinSeg($var){
			$vet			= split("/",$var);
			$dia			= intval($vet["0"]);
			$mes			= intval($vet["1"]);
			$ano_hora		= $vet["2"];
			$vet_ano_hora 	= split(" ",$ano_hora);
			$ano 			= intval($vet_ano_hora[0]);
			$vet_hora 		= split(":",$vet_ano_hora[1]);
			$h				= intval($vet_hora[0]);
			$min			= intval($vet_hora[1]);
			$seg			= intval($vet_hora[2]);
			$resto			= $vet_hora[3];
			//prt("dia", $dia);
			//prt("mes", $mes);
			//prt("ano", $ano);
			//prt("h", $h);
			//prt("min", $min);
			if (($dia > 31) || ($dia < 0)){
				//prt("dia errado","");
				return(false);
			} else if (($mes > 12) || ($mes < 0)){
				return(false);
			} else if (($ano > 2030) || ($ano < 1900)){
				return(false);
			} else if (($h > 24) || ($h < 0)){
				return(false);
			} else if (($min > 59) || ($min < 0)){
				return(false);
			} else if (($seg > 59) || ($seg < 0)){
				return(false);
			} else if (empty($resto)) {
				return(true);
			} else {
				return(false);
			}
		}
	}
?>