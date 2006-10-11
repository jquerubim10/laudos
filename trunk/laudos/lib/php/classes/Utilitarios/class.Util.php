<?
/**
 * @package Utilitários
 * Conjunto de métodos que servem de utilitários gerais para usar no sistema.
 */
class Util {
    /**
     * método utilizado para debugar.
	 * escreve na tela o valor da variável recebida, não importando o seu tipo.
	 * apresenta uma formatação adequada para entender o conteúdo de arrays.
     *
     * @param string $nome nome de exibição da variável.
     * @param mixed $var variável que terá seu valor exibido.
	 * 
     */
	function prt($nome, $var){
		if (is_array($var)){
			echo "<br><pre style=\"text-align:left; margin-top:1px; margin-bottom:1px;\">";
			echo "[".$nome."]\n";
			Util::prt_array($var, 0);
			echo "</pre><br>";
		} else {
			echo "<br>".$nome.": ";
			if (is_string($var))
				echo "\"".strval($var)."\"<br>";
			else
				echo strval($var)."<br>";
		}
	}
	
    /**
     * método utilizado para debugar.
	 * chamado somente pelo método {@link prt()}, recursivamente, para exibir todo o conteúdo interno de um array
	 * escreve na tela o valor da variável recebida, não importando o seu tipo.
	 * apresenta uma formatação adequada para entender o conteúdo de arrays.
     *
     * @param mixed $var variável que terá seu valor exibido.
     * @param int $nivel nivel hierarquico no array mestre.
	 * 
     */
	function prt_array($var, $nivel){
		$nivel++;
		$spc = "";
		for ($i = 0; $i <= $nivel; $i++){
			$spc .= "   ";
		}
		foreach($var as $k=>$v){
			if (is_array($v)){
				echo $spc."[".$k."] \n";
				Util::prt_array($v, $nivel);
			} else {
				if (is_string($v))
					echo $spc.$k."= \"".$v."\"\n";
				else
					echo $spc.$k."= ".$v."\n";
			}
		}
	}

    /**
     * método utilizado para debugar.
	 * escreve na tela todas as variáveis de POST, GET e SESSION.
     */
	function post_get(){
	?>
		<div style="z-index:40; position:absolute; left:900px; top:0px; margin-top:0px;">
	<?
		echo "<table cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#eeeeee\" align=\"right\" valign=\"top\">";
		echo "<tr><td>";
		if (sizeof($_POST)>0)
			Util::prt("POST",$_POST);
		if (sizeof($_GET)>0)
			Util::prt("GET",$_GET);
		if (sizeof($_SESSION)>0)
			Util::prt("SESSION",$_SESSION);
		echo "</td></tr></table>";
	?>
		</div>
	<?
	}
	
    /**
	 * verifica se a chamada do link foi feita através do arquivo index.php da raiz.
	 * todas as chamadas do sistema devem ser feitas através dele.
     */
	function VerificaChamada(){
		if (!defined("SYSTEM_ROOT")) exit("Acesso Negado");
	}
	
    /**
	 * monta uma string de variaveis get.
	 * @param array $vars
	 * @param bool $interrogacao
	 * @return string
     */
	function mount_get_vars($vars, $interrogacao=false){
		$i = 0;
		$interrogacao = ($interrogacao ? "?" : "&");
		if (is_array($vars)){
			foreach($vars as $name => $value){
				if (!empty($value)){
					$r.= ($i > 0 ? "&".$name."=".$value : $interrogacao.$name."=".$value);
					$i++;
				}
			}
		}
		return($r);
	}
	
	
    /**
	 * monta uma string de inputs hidden.
	 * @param array $vars
	 * @return string
     */
	function mount_post_vars($vars){
		if (is_array($vars)){
			foreach($vars as $name => $value){
				if (!empty($value)){
					$r.= "<input type=\"hidden\" name=\"".$name."\" value=\"".$value."\">\n";
				}
			}
		}
		return($r);
	}
	
    /**
	 * traduz o dia da semana de ingles paa portugues
	 * @param string $dia
	 * @return string
     */
	function translateDay($dia){
		$a = array(
			"Domingo" 			=> "Sunday",
			"Segunda-Feira" 	=> "Monday",
			"Terça-Feira" 		=> "Tuesday",
			"Quarta-Feira" 		=> "Wednesday",
			"Quinta-Feira" 		=> "Thursday",
			"Sexta-feira" 		=> "Friday",
			"Sábado"			=> "Saturday",
		);
		if (in_array($dia,$a)){
			return(array_search($dia,$a));
		} else {
			return($dia);
		}
	}
	
	function browser_compativel(){
		return true;
/*		$ok = Util::in_string("MSIE 6", $_SERVER['HTTP_USER_AGENT'], 1);
		if ($ok){
			return true;
		} else {
			return false;
		}
*/	}
	function in_string($needle, $haystack, $insensitive = 0) {
	   if ($insensitive) {
		   return (false !== stristr($haystack, $needle)) ? true : false;
	   } else {
		   return (false !== strpos($haystack, $needle))  ? true : false;
	   }
	}

	
}
?>
