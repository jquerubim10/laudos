<?
class Gerador {
function Gerador($config){
	$str_show_tpl = "
{.include file=\"lib/templates/\$design.top.tpl\".}
{.include file=\"lib/templates/menu_superior.tpl\".}
	<LINK REL=StyleSheet HREF=\"{.\$path_tpl.}show.css\" media=\"screen\" TYPE=\"text/css\">
	<form id=\"form\" name=\"form\" action=\"{.\$self.}\" method=\"post\" >
		<input type=\"hidden\" name=\"del\" value=\"1\">
		<input type=\"hidden\" name=\"form\">
		{.foreach name=dep from=\$dependences key=i item=d .}
			{.if \$smarty.foreach.dep.first.}
			<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"1\" style=\"color:#CC3300;\">
			<tr>
				<td><b>Existem informações vinculadas este convênio.</b></td>
			</tr>
			{./if.}
			<tr bgcolor=\"#CCCCCC\">
				<td>
					&nbsp;{.\$d.label.}
				</td>
			</tr>
			{.if \$smarty.foreach.dep.last.}
			<tr>
				<td align=\"right\">
					Deseja excluir este convênio e todas as informações vinculadas a ele?<br>
					<a href=\"javascript:history.back();\"><b style=\"color:#000000; \">Não</b></a>&nbsp;&nbsp;&nbsp;<a href=\"{.\$vars_secao.}&acao=show&id={.\$id.}&del=1&delete_dependences=1\"><b style=\"color:#CC3300; \">Sim</b></a>
				</td>
			</tr>
			</table>
			{./if.}
		{./foreach.}
	";
	$str_show_css = "
/*-------------------------------------------------*/	
#form{
	margin:0px;
	padding:20px 0px 0px 15px;
	}
#form p{
	margin:0px;
	padding:5px;
	background-color:#FFCC00;
	}
	";
	$str_gerenciar_css = "
/*-------------------------------------------------*/	
#form{
	margin:10px 0px 0px 10px;
	padding:0px;
	}";
	$str_formulario_css = "
/*-------------------------------------------------*/	
#form{
	margin:0px;
	padding:20px 0px 0px 15px;
	}
	";
	$str_formulario_tpl = "{.include file=\"lib/templates/\$design.top.tpl\".}
{.include file=\"lib/templates/menu_superior.tpl\".}
	<LINK REL=StyleSheet HREF=\"{.\$path_tpl.}formulario.css\" media=\"screen\" TYPE=\"text/css\">
	<form id=\"form\" name=\"form\" action=\"{.\$self.}\" method=\"post\" >
		<input type=\"hidden\" name=\"form\">
	";
/////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////
	foreach($campos as $campo => $config){
////
		$str_formulario_tpl .= "
		<div class=\"".$campo."\">
			<label>".$config["titulo"].":</label> <span class=\"erro\">{.\$".$campo."_erro.}</span><br />
			<input class=\"".$campo."\" type=\"text\" name=\"".$campo."\" value=\"{.\$".$campo.".}\">
		</div>";
////
		$str_formulario_css .= "
/*-------------------------------------------------*/	
#form input.".$campo."{
	width:100px;
	margin-right:25px;
	}
#form div.".$campo."{
	}";
////
		$str_gerenciar_css .= "
/*-------------------------------------------------*/	
#form input.".$campo."{
	width:100px;
	margin-right:25px;
	}
#form div.".$campo."{
	}";
////
	$str_gerenciar_tpl_busca .= "
		<div class=\"".$campo."\">
			<label>".$config["titulo"].":</label><br />
			<input class=\"".$campo."\" type=\"text\" name=\"".$campo."\">
		</div>
	";
	$str_gerenciar_tpl_ord .= "

			<td width=\"\" onClick=\"href('{.\$link_ordenacao.".$campo.".}');\" style=\"cursor:pointer;\">
				<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">
					<tr>
						<td><strong>".$config["titulo"]."</strong></td>
						<td width=\"20\" align=\"right\">{.\$seta_ordenacao.".$campo.".}&nbsp;</td>
					</tr>
				</table>
			</td>

		";
		$str_gerenciar_tpl_campos .= "
			<td>
				&nbsp;{.\$r.".$campo.".}
			</td>
		";
		$str_show_css .= "
/*-------------------------------------------------*/
#form p.".$campo."{
	width:350px;
	margin-right:25px;
	}
#form div.".$campo."{
	}
		";
		$str_show_tpl .= "
		<div class=\"".$campo."\">
			<label>".$config["titulo"].":</label>
			<p class=\"".$campo."\">{.\$".$campo.".}</p>
		</div>
		";
	}
/////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////
	$str_formulario_tpl .= "
		<div class=\"botoes\">
			<input class=\"bt_cancelar\"type=\"button\" onClick=\"history.back();\" value=\"Cancelar\">
			<input class=\"bt_enviar\" type=\"button\" onClick=\"send('');\" value=\"Enviar\">
		</div>
	</form>
{.include file=\"lib/templates/\$design.footer.tpl\".}";
////
	$str_formulario_css .= "
/*-------------------------------------------------*/		
#form div.botoes{
	margin-top:10px;
	margin-left:407px;
	}
/*-------------------------------------------------*/
	";
	$str_gerenciar_css .= "
/*-------------------------------------------------*/	
#form div.botoes{
	margin-top:0px;
	margin-left:478px;
	}
/*-------------------------------------------------*/	
	";
	
	$str_gerenciar_tpl = "
{.include file=\"lib/templates/\$design.top.tpl\".}
{.include file=\"lib/templates/menu_superior.tpl\".}
	<LINK REL=StyleSheet HREF=\"{.\$path_tpl.}gerenciar.css\" media=\"screen\" TYPE=\"text/css\">
	<form id=\"form\" name=\"form\" action=\"index.php\" method=\"get\" >
	{.\$input_secao.}
		".$str_gerenciar_tpl_busca."
		<div class=\"botoes\">
			<input class=\"bt_enviar\" type=\"button\" onClick=\"send('');\" value=\"Buscar\">
		</div>
	</form>

{.if \$total_registros > 0.}
	{.\$paginacao.}
	<table width=\"540\" cellpadding=\"3\" cellspacing=\"1\" bgcolor=\"#333333\">
		<form name=\"form_tamanho_pagina\" action=\"index.php\" method=\"get\">
		{.\$input_secao.}
		<tr bgcolor=\"#FFFFFF\">
			<td align=\"right\">
				{.\$total_registros.} Registro(s), mostrando 
				<select id=\"tamanho_pagina\" name=\"tamanho_pagina\" onChange=\"document.form_tamanho_pagina.submit();\">
					{.html_options output=\$vet_tamanho_pagina values=\$vet_tamanho_pagina selected=\$tamanho_pagina.}
				</select> por página.
			</td>
		</tr>
		</form>
	</table>
	<table width=\"540\" cellpadding=\"3\" cellspacing=\"1\" bgcolor=\"#333333\">
		<tr bgcolor=\"#3293C7\">
			".$str_gerenciar_tpl_ord."
			<td width=\"15%\">&nbsp;</td>
		</tr>
	{.foreach from=\$registros key=i item=r .}
		<tr bgcolor=\"#FFFFFF\">
			".$str_gerenciar_tpl_campos."
			<td>
				<a href=\"{.\$vars_secao.}&acao=show&id={.\$r.".$prefixo."_id.}\"><img src=\"images/bt_visualizar.gif\" border=\"0\"></a>&nbsp;
				<a href=\"{.\$vars_secao.}&acao=update&id={.\$r.".$prefixo."_id.}\"><img src=\"images/bt_editar.gif\" border=\"0\"></a>&nbsp;
				<a href=\"{.\$vars_secao.}&acao=show&id={.\$r.".$prefixo."_id.}&del=1\"><img src=\"images/bt_excluir.gif\" border=\"0\"></a>
			</td>
		</tr>
	{./foreach.}
	</table>
	{.\$paginacao.}


{.else.}
	<table width=\"540\" border=\"0\">
		<tr>
			<td>Nenhum registro encontrado.</td>
		</tr>
	</table>
{./if.}
{.include file=\"lib/templates/\$design.footer.tpl\".}
	";
	
	$str_show_css .= "
/*-------------------------------------------------*/	
#form div.botoes{
	margin-top:10px;
	margin-left:402px;
	}
/*-------------------------------------------------*/	
	";
	
	$str_show_tpl .= "
		<div class=\"botoes\">
			<input type=\"button\" onClick=\"bt_cancelar('?".$s."', '');\" value=\"Voltar\">
			<input type=\"button\" onClick=\"send('');\" value=\"Excluir\">
			<input type=\"button\" onClick=\"href('?".$s."&acao=update&id={.\$id.}', '');\" value=\"Alterar\">
		</div>
	</form>
{.include file=\"lib/templates/\$design.footer.tpl\".}
	";
	
//cria o arquivo de dados
		$data_filename = "gerados/formulario.tpl";
		$r = true;
		if (!$handle = fopen($data_filename, 'a')) {
			$r = false;
			exit();
		}
		if (fwrite($handle, $str_formulario_tpl) === FALSE) {
			$r = false;
			exit();
		}
		fclose($handle);
		
//cria o arquivo de dados
		$data_filename = "gerados/formulario.css";
		$r = true;
		if (!$handle = fopen($data_filename, 'a')) {
			$r = false;
			exit();
		}
		if (fwrite($handle, $str_formulario_css) === FALSE) {
			$r = false;
			exit();
		}
		fclose($handle);

//cria o arquivo de dados
		$data_filename = "gerados/gerenciar.css";
		$r = true;
		if (!$handle = fopen($data_filename, 'a')) {
			$r = false;
			exit();
		}
		if (fwrite($handle, $str_gerenciar_css) === FALSE) {
			$r = false;
			exit();
		}
		fclose($handle);
		
//cria o arquivo de dados
		$data_filename = "gerados/gerenciar.tpl";
		$r = true;
		if (!$handle = fopen($data_filename, 'a')) {
			$r = false;
			exit();
		}
		if (fwrite($handle, $str_gerenciar_tpl) === FALSE) {
			$r = false;
			exit();
		}
		fclose($handle);
//cria o arquivo de dados
		$data_filename = "gerados/show.css";
		$r = true;
		if (!$handle = fopen($data_filename, 'a')) {
			$r = false;
			exit();
		}
		if (fwrite($handle, $str_show_css) === FALSE) {
			$r = false;
			exit();
		}
		fclose($handle);
//cria o arquivo de dados
		$data_filename = "gerados/show.tpl";
		$r = true;
		if (!$handle = fopen($data_filename, 'a')) {
			$r = false;
			exit();
		}
		if (fwrite($handle, $str_show_tpl) === FALSE) {
			$r = false;
			exit();
		}
		fclose($handle);
		
		echo "<h1>Arquivos Gerados</h1>";
	}
	
	function criaArquivo($data_filename, $content){
		$r = true;
		if (!$handle = fopen($data_filename, 'a')) {
			$r = false;
		}
		if (fwrite($handle, $content) === FALSE) {
			$r = false;
		}
		fclose($handle);
		return $r;
	}
}
?>