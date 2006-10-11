<?php /* Smarty version 2.6.9, created on 2006-08-14 12:47:06
         compiled from content/templates/autenticacao/index.tpl */ ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Gerência de Laudos - Dr. Ernesto Sousa Nunes</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['path_tpl']; ?>
login.css"/>
<script language="JavaScript" src="../lib/js/mascara.js"></script>
<script language="JavaScript" src="../lib/js/lib.js"></script>
</head>

<body>
	
	<div id="geral">
	
		<table cellpadding="0" cellspacing="0" border="0"><tr>
	
			<td width="50%"><div id="fundo_hor_esq"></div></td>
			
			<td><div id="conteudo">
				<div id="barra_topo"><img id="gerencia" src="<?php echo $this->_tpl_vars['path_tpl']; ?>
images/gerencia.jpg"/><div id="barra_topo_sombra"></div></div>
				
				<div id="centro">
					<img class="imagem" src="<?php echo $this->_tpl_vars['path_tpl']; ?>
images/centro_imagem.jpg"/>
					
					<div id="login">
						<form id="form" name="form" action="<?php echo $this->_tpl_vars['self']; ?>
" method="post" >
							<input type="hidden" name="form" value="ok">
							<label>Login:</label><br/>
							<input name="login" type="text" value="">
							<label>Senha:</label><br/>
							<input name="senha" type="password" >
							<a href="javascript:send('');"><img class="entrar" src="<?php echo $this->_tpl_vars['path_tpl']; ?>
images/botao_entrar.jpg"/></a>
						</form>
					</div>
				</div>
				
				<div id="barra_baixo"></div>
				
				<div id="drernesto"></div>
			</div></td>
			
			<td width="50%"><div id="fundo_hor_dir"></div></td>
			
		</tr></table>
		
	</div>

</body>
</html>