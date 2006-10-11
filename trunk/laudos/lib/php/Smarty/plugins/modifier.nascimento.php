<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty cantarelli modifier plugin
 *
 * Type:     modifier<br>
 * Name:     cantarelli<br>
 * Purpose:  capitalize words in the string
 * @link http://smarty.php.net/manual/en/language.modifiers.php#LANGUAGE.MODIFIER.CAPITALIZE
 *      capitalize (Smarty online manual)
 * @param string
 * @return string
 */
function smarty_modifier_nascimento($s)
{
	list ($ano, $mes, $dia) = split ("-", $s);
	$d = strval($dia)."/".strval($mes)."/".strval($ano);
	return(($d == "00/00/0000" ? "":$d)); 
}



?>
