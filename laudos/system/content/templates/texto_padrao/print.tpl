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

{.foreach from=$registros key=i item=r .}
<table width="550" class="{.if $i%2 > 0.}impar{./if.}">
	<tr>
		<td width="50" valign="top">{.$r.txp_codigo.}</td>
		<td>{.$r.txp_texto.}</td>
	</tr></table>
{./foreach.}

</body>
</html>