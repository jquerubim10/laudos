<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty {html_image} function plugin
 *
 * Type:     function<br>
 * Name:     html_image<br>
 * Date:     Feb 24, 2003<br>
 * Purpose:  format HTML tags for the image<br>
 * Input:<br>
 *         - file = file (and path) of image (required)
 *         - height = image height (optional, default actual height)
 *         - width = image width (optional, default actual width)
 *         - basedir = base directory for absolute paths, default
 *                     is environment variable DOCUMENT_ROOT
 *
 * Examples: {html_image file="images/masthead.gif"}
 * Output:   <img src="images/masthead.gif" width=400 height=23>
 * @link http://smarty.php.net/manual/en/language.function.html.image.php {html_image}
 *      (Smarty online manual)
 * @author   Monte Ohrt <monte at ohrt dot com>
 * @author credits to Duda <duda@big.hu> - wrote first image function
 *           in repository, helped with lots of functionality
 * @version  1.0
 * @param array
 * @param Smarty
 * @return string
 * @uses smarty_function_escape_special_chars()
 */
function smarty_function_jscalendar($params, &$smarty)
{
    require_once $smarty->_get_plugin_filepath('shared','escape_special_chars');
    
    $name = null;
    $values = null;
    $options = null;
    $selected = array();
    $output = null;
    
    $extra = '';
    
    foreach($params as $_key => $_val) {
        switch($_key) {
            case 'field':
                $$_key = (string)$_val;
                break;
            default:
                if(!is_array($_val)) {
                    $extra .= ' '.$_key.'="'.smarty_function_escape_special_chars($_val).'"';
                } else {
                    $smarty->trigger_error("html_options: extra attribute '$_key' cannot be an array", E_USER_NOTICE);
                }
                break;
        }
    }
	
	//$values = util::getUF();

    if (!isset($field)){
		$smarty->trigger_error("javascript_date: field é obrigatório", E_USER_NOTICE);
    	return '';
	}
	
	$vet		= split("\.",$field);
    if (sizeof($vet) != 3){
		$smarty->trigger_error("javascript_date: field deve ter o formato \"document.form_name.field_name\"", E_USER_NOTICE);
    	return '';
	}
	$field_name = $vet[2];
	$form_name 	= $vet[0].".".$vet[1];
	
    $_js_result = '
	<script language="javascript" type="text/javascript">';
	$_js_result .= '
		Calendar.setup({
			inputField     :    "'.$field_name.'",
			ifFormat       :    "%d-%m-%Y",
			showsTime      :    false,
			onUpdate       :    atualiza_'.$field_name.'
		});
		function atualiza_'.$field_name.'(cal) {
			var date = cal.date;
			'.$form_name.'.'.$field_name.'.value = date.print("%d/%m/%Y");
		}
	';
	$_js_result .= '
	</script>';

    return $_js_result;
}

/* vim: set expandtab: */

?>
