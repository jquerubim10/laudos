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
function smarty_modifier_decimal4($s)
{
	if (substr($s,0,1) == "-"){
		$add = "-";
		$s=str_replace("-","",$s);
	}
	$s=str_replace(".","",smarty_modifier_decimal4_dddd($s));
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
		if ($i==$a-13)
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

function smarty_modifier_decimal4_dddd($s){
	$s = str_replace(",",".",$s);
	return(sprintf(
			"%01.4f",strval(floatval($s))
			));
}


?>
