<?php /* Smarty version 2.6.9, created on 2005-11-25 19:27:39
         compiled from content/templates/texto_padrao/print.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title></title>
<style media="all" type="text/css">
body{
	font-family:Arial;
	font-size:11px;}
table{
/*	border-bottom-color:#999999; 
	border-bottom-style:solid; 
	border-bottom-width:1px;*/
}
.impar{color:#FF0000;}
</style>
</head>
<body>

<?php $_from = $this->_tpl_vars['registros']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['r']):
?>
<table width="550" class="<?php if ($this->_tpl_vars['i']%2 > 0): ?>impar<?php endif; ?>">
	<tr>
		<td width="50" valign="top"><?php echo $this->_tpl_vars['r']['txp_codigo']; ?>
</td>
		<td><?php echo $this->_tpl_vars['r']['txp_texto']; ?>
</td>
	</tr></table>
<?php endforeach; endif; unset($_from); ?>

</body>
</html>