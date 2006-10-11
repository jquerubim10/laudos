<?php /* Smarty version 2.6.9, created on 2006-08-14 12:47:06
         compiled from lib/templates/padrao.top.tpl */ ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>Gerência de Laudos</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<script language="JavaScript" src="../lib/js/mascara.js"></script>
		<script language="JavaScript" src="../lib/js/lib.js"></script>
		<LINK REL=StyleSheet HREF="lib/css/<?php echo $this->_tpl_vars['css']; ?>
.css" media="screen" TYPE="text/css">
		
<!-- 		<link rel="stylesheet" type="text/css" media="all" href="../lib/js/jscalendar/calendar-green.css" title="green" />
		<script type="text/javascript" src="../lib/js/jscalendar/calendar.js"></script>
		<script type="text/javascript" src="../lib/js/jscalendar/lang/calendar-br.js"></script>
		<script type="text/javascript" src="../lib/js/jscalendar/calendar-setup.js"></script>
 -->	</head>
<body>
	<table width="776" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td colspan="2">
				<div id="topo">
					<div id="parte01"></div>
					<div id="parte02"></div>
					<div id="sair">
						<div id="boneco"></div>
						<span class="usuario"><?php echo $this->_tpl_vars['tpl_login']; ?>
</span>
						<span class="usuario_cargo"><?php echo $this->_tpl_vars['tpl_nome']; ?>
</span>
						<a href="index.php?s=autenticacao&acao=logout">
						<div id="sair_botao"></div></a>
						<span class="sair_botao"><a href="index.php?s=autenticacao&acao=logout">Sair</a></span>
					</div>
					<div id="logo">
						<img src="images/logo.jpg">
					</div>
					<div id="data">
						<span><?php echo $this->_tpl_vars['hoje']; ?>
</span>
					</div>
					<div id="parte03">
						<div id="titulo">
							<p><?php echo $this->_tpl_vars['titulo_secao']; ?>
</p>
						</div>
						<div id="abas">
							<?php echo $this->_tpl_vars['str_tabs']; ?>

						</div>
					</div>
				</div>
			</td>
		</tr>
		<tr id="centro">
			<td id="menu">
				<ul>
				<?php $_from = $this->_tpl_vars['conteudo_menu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['s'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['s']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['name_s'] => $this->_tpl_vars['info_s']):
        $this->_foreach['s']['iteration']++;
?>
					<li><a href="index.php?s=<?php echo $this->_tpl_vars['name_s']; ?>
"><?php echo $this->_tpl_vars['info_s']['nome']; ?>
</a></li>
				<?php endforeach; endif; unset($_from); ?>
				</ul>
			</td>
			<td id="conteudo">
				<div id="miolo">