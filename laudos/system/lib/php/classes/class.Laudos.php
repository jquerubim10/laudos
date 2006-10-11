<?

/**
 * class.Manager.php
 *
 * Este arquivo faz parte da solução CheckSystem e sua cópia ou edição está proibida.
 * This file is part of CheckSystem and the copy or edition is prohibited.
 *
 * Os direitos de propriedade intelectual, decorrentes dos programas Caderno de Campo e CheckTracing e a marca 
 * CHECKPLANT, é de exclusiva titularidade da empresa CHECKPLANT Sistemas de Rastreabilidade LTDA.
 *
 * Ações como: recompilar, decompor, plagear, ou aplicar métodos de engenharia reversa nos Softwares ou em 
 * seus arquivos serão punidos de acordo com a Lei federal de Softwares. 
 *
 * @link http://www.checkplant.com.br/
 * @version 3.0
 * @copyright Copyright: 2001-2005 CheckPlant Sistemas de Rastreabilidade LTDA.
 * @author André Cantarelli; Alexandre Fachinello <checkplant@checkplant.com.br>
 * @access public
 * @package CheckSystem
 */
 class Manager{
    /**
     * Prepara um array com as informações do menu.
	 *
	 * as informações do array serão interpretadas no tamplate do menu;
     *
	 * @return array
     */
	function PreparaArrayMenu(){
		global $s, $ss, $sss, $ssss, $sssss, $config_menu;
		$menu = array();
		//s
		foreach($config_menu as $name_s => $info_s){
			if($info_s["hide_menu"] != "1"){
				$menu[$name_s]["nome"] = $info_s["nome"];
				if ($name_s == $s){
					$menu[$name_s]["selected"] = "1";
		//ss
					foreach($info_s["sub"] as $name_ss => $info_ss){
						if($info_ss["hide_menu"] != "1"){
							$menu[$name_s]["sub"][$name_ss]["nome"] = $info_ss["nome"];
							if ($name_ss == $ss){
								$menu[$name_s]["sub"][$name_ss]["selected"] = "1";
		//sss
								foreach($info_ss["sub"] as $name_sss => $info_sss){
									if($info_sss["hide_menu"] != "1"){
										$menu[$name_s]["sub"][$name_ss]["sub"][$name_sss]["nome"] = $info_sss["nome"];
										if ($name_sss == $sss){
											$menu[$name_s]["sub"][$name_ss]["sub"][$name_sss]["selected"] = "1";
		//ssss
											foreach($info_sss["sub"] as $name_ssss => $info_ssss){
												if($info_ssss["hide_menu"] != "1"){
													$menu[$name_s]["sub"][$name_ss]["sub"][$name_sss]["sub"][$name_ssss]["nome"] = $info_ssss["nome"];
													if ($name_ssss == $ssss){
														$menu[$name_s]["sub"][$name_ss]["sub"][$name_sss]["sub"][$name_ssss]["selected"] = "1";
		//sssss
														foreach($info_ssss["sub"] as $name_sssss => $info_sssss){
															if($info_sssss["hide_menu"] != "1"){
																$menu[$name_s]["sub"][$name_ss]["sub"][$name_sss]["sub"][$name_ssss]["sub"][$name_sssss]["nome"] = $info_sssss["nome"];
																if ($name_sssss == $sssss){
																	$menu[$name_s]["sub"][$name_ss]["sub"][$name_sss]["sub"][$name_ssss]["sub"][$name_sssss]["selected"] = "1";
																}
															}
														}
													}
												}
											}
										}
									}
								}
							}
						}
					}
				}
			}
		}
		//Util::prt("", $menu);
		return $menu;
	}
	
    /**
     * Procura dentro do array de configurações do menu o tpitulo da seçao atual.
	 *
	 * @return string
     */
	function TituloSecaoAtual(){
		global $s, $ss, $sss, $ssss, $sssss, $config_menu;
		$menu = array();
	//s
		foreach($config_menu as $name_s => $info_s){
			if ($name_s == $s){
				$titulo = $info_s["nome"];
	//ss
				foreach($info_s["sub"] as $name_ss => $info_ss){
					if ($name_ss == $ss){
						$titulo = $info_ss["nome"];
	//sss
						foreach($info_ss["sub"] as $name_sss => $info_sss){
							if ($name_sss == $sss){
								$titulo = $info_sss["nome"];
	//ssss
								foreach($info_sss["sub"] as $name_ssss => $info_ssss){
									if ($name_ssss == $ssss){
										$titulo = $info_ssss["nome"];
	//sssss
										foreach($info_ssss["sub"] as $name_sssss => $info_sssss){
											if ($name_sssss == $sssss){
												$titulo = $info_ssss["nome"];
											}
										}
									}
								}
							}
						}
					}
				}
			}
		}
		//Util::prt("", $titulo);
		return $titulo;
	}
	
    /**
     * monta uma string contendo o html para as abas do menu interno da seção
	 *
	 * @return string
     */
	function htmlTabs($acao, $id, $vars_secao){
		$str = '
			<table cellspacing="0" cellpadding="0" border="0">
			<tr>
			<td valign="bottom"><img src="images/tabs/sep.gif"></td>';
		if (($vars_secao != "?s=home") && ($vars_secao != "?s=relatorio")){
			//
			$link_bold 	= ($acao == "index" || $acao == "" ? "<b>":"");
			$ovr		= ($acao == "index" || $acao == "" ? "_ovr":"");
			$str.='
				<td valign="top">
					<table cellspacing="0" cellpadding="0">
					<tr>
					<td><img src="images/tabs/lat_esq'.$ovr.'.gif"></td>
					<td background="images/tabs/fundo'.$ovr.'.gif" valign="bottom">
						<div style="margin-left:5px;margin-right:8px;margin-bottom:3px;">
							<img src="images/tabs/seta.gif" hspace="3" vspace="1">'.$link_bold.'<a href="index.php'.$vars_secao.'">Listar</a></b>
						</div>
					</td>
					<td><img src="images/tabs/lat_dir'.$ovr.'.gif"></td>
					</tr>
					</table>
				</td>';
				//
			$link_bold 	= ($acao == "add" ? "<b>":"");
			$ovr		= ($acao == "add" ? "_ovr":"");
			$str.='
				<td valign="top">
					<table cellspacing="0" cellpadding="0">
					<tr>
					<td><img src="images/tabs/lat_esq'.$ovr.'.gif"></td>
					<td background="images/tabs/fundo'.$ovr.'.gif" valign="bottom">
						<div style="margin-left:5px;margin-right:8px;margin-bottom:3px;">
							<img src="images/tabs/seta.gif" hspace="3" vspace="1">'.$link_bold.'<a href="index.php'.$vars_secao.'&acao=add">Adicionar</a></b>
						</div>
					</td>
					<td><img src="images/tabs/lat_dir'.$ovr.'.gif"></td>
					</tr>
					</table>
				</td>';
			if (is_numeric($id)){
				//
				$link_bold 	= ($acao == "show" ? "<b>":"");
				$ovr		= ($acao == "show" ? "_ovr":"");
				$str.='
					<td valign="top" width="160" align=right>
						<table cellspacing="0" cellpadding="0">
						<tr>
						<td><img src="images/tabs/lat_esq'.$ovr.'.gif"></td>
						<td background="images/tabs/fundo'.$ovr.'.gif" valign="bottom">
							<div style="margin-left:5px;margin-right:8px;margin-bottom:3px;">
								<img src="images/tabs/seta.gif" hspace="3" vspace="1">'.$link_bold.'<a href="index.php'.$vars_secao.'&acao=show&id='.$id.'">Visualizar</a></b>
							</div>
						</td>
						<td><img src="images/tabs/lat_dir'.$ovr.'.gif"></td>
						</tr>
						</table>
					</td>';
				//
				$link_bold 	= ($acao == "update" ? "<b>":"");
				$ovr		= ($acao == "update" ? "_ovr":"");
				$str.='
					<td valign="top">
						<table cellspacing="0" cellpadding="0">
						<tr>
						<td><img src="images/tabs/lat_esq'.$ovr.'.gif"></td>
						<td background="images/tabs/fundo'.$ovr.'.gif" valign="bottom">
							<div style="margin-left:5px;margin-right:8px;margin-bottom:3px;">
								<img src="images/tabs/seta.gif" hspace="3" vspace="1">'.$link_bold.'<a href="index.php'.$vars_secao.'&acao=update&id='.$id.'">Alterar</a></b>
							</div>
						</td>
						<td><img src="images/tabs/lat_dir'.$ovr.'.gif"></td>
						</tr>
						</table>
					</td>';
				//
				$link_bold 	= ($_GET[del] == "1" || $_POST[del] == "1" ? "<b>":"");
				$ovr		= ($_GET[del] == "1" || $_POST[del] == "1" ? "_ovr":"");
				$str.='
					<td valign="top" width="150" align=right>
						<table cellspacing="0" cellpadding="0">
						<tr>
						<td><img src="images/tabs/lat_esq'.$ovr.'.gif"></td>
						<td background="images/tabs/fundo'.$ovr.'.gif" valign="bottom">
							<div style="margin-left:5px;margin-right:8px;margin-bottom:3px;">
								<img src="images/tabs/seta.gif" hspace="3" vspace="1">'.$link_bold.'<a href="javascript:send(\'Confirma realmente a exclusão?\');">Excluir</a></b>
							</div>
						</td>
						<td><img src="images/tabs/lat_dir'.$ovr.'.gif"></td>
						</tr>
						</table>
					</td>';
					
			}
		} elseif ($vars_secao == "?s=home") {
			//
			$link_bold 	= "<b>";
			$ovr		= "_ovr";
			$str.='
				<td valign="top">
					<table cellspacing="0" cellpadding="0">
					<tr>
					<td><img src="images/tabs/lat_esq'.$ovr.'.gif"></td>
					<td background="images/tabs/fundo'.$ovr.'.gif" valign="bottom">
						<div style="margin-left:5px;margin-right:8px;margin-bottom:3px;">
							<img src="images/tabs/seta.gif" hspace="3" vspace="1">'.$link_bold.'<a href="index.php'.$vars_secao.'">Home</a></b>
						</div>
					</td>
					<td><img src="images/tabs/lat_dir'.$ovr.'.gif"></td>
					</tr>
					</table>
				</td>';
		} elseif ($vars_secao == "?s=relatorio") {
			//
			$link_bold 	= "<b>";
			$ovr		= "_ovr";
			$str.='
				<td valign="top">
					<table cellspacing="0" cellpadding="0">
					<tr>
					<td><img src="images/tabs/lat_esq'.$ovr.'.gif"></td>
					<td background="images/tabs/fundo'.$ovr.'.gif" valign="bottom">
						<div style="margin-left:5px;margin-right:8px;margin-bottom:3px;">
							<img src="images/tabs/seta.gif" hspace="3" vspace="1">'.$link_bold.'<a href="index.php'.$vars_secao.'">Relatório Mensal</a></b>
						</div>
					</td>
					<td><img src="images/tabs/lat_dir'.$ovr.'.gif"></td>
					</tr>
					</table>
				</td>';
		}
		$str .= '
			</tr>
			</table>';
		return $str;
	}
	
    /**
     * gera um pdf dos laudos
	 *
	 * @param array $r
     */
	function pdfLaudos($rs){
	
		//error_reporting(E_ALL);
		set_time_limit(1800);
		include 'lib/php/classes/class.ezpdf.php';
		
		$pdf = new Cezpdf('a4','portrait');
		$pdf -> ezSetMargins(50,70,50,50);
		$all = $pdf->openObject();
		$pdf->saveState();
		$pdf->setStrokeColor(0,0,0,1);
		$pdf->restoreState();
		$pdf->closeObject();
		$pdf->addObject($all,'all');
		$mainFont = './fonts/Courier.afm';
		$codeFont = './fonts/Courier.afm';
		$pdf->selectFont($mainFont);
		$n_rows = sizeof($rs);

		$c = 0;
		$t=945;
		$fator = 25;
		foreach($rs as $id => $r){
			$o = new Interpretacao($r["int_id"]);
			
			$hos = new Hospital($o->get("hos_id"));
			$hos_nome = $hos->get("hos_nome");
			
			$con = new Convenio($o->get("con_id"));
			$con_nome = $con->get("con_nome");
			
			$exa = new Exame($o->get("exa_id"));
			$exa_nome = $exa->get("exa_nome");
			
			$pdf->ezText($hos_nome,18,array('justification'=>'center')); 
			$pdf->ezText(" ",20,array('justification'=>'left'));
			$pdf->ezText("PACIENTE      : ".$r["int_paciente_prontuario"]."   ".$r["int_paciente_nome"],10,array('justification'=>'left'));

			if ($r["int_paciente_nascimento"] == "0000-00-00")
				$pdf->ezText("NASCIMENTO    :                                   SEXO: ".$r["int_paciente_sexo"],10,array('justification'=>'left'));
			else
				$pdf->ezText("NASCIMENTO    : ".Formatacao::formatBrData($r["int_paciente_nascimento"])."                        SEXO: ".$r["int_paciente_sexo"],10,array('justification'=>'left'));
		
			$pdf->ezText("CONVÊNIO      : ".$con_nome,10,array('justification'=>'left'));
			$pdf->ezText("EXAME         : ".$exa_nome,10,array('justification'=>'left'));

			$pdf->ezText(" ",20,array('justification'=>'left'));

			$pdf->ezText("                                                  DATA: ".Formatacao::formatBrDataHoraminSeg($r["int_data_interpretacao"]),10,array('justification'=>'left'));
			$pdf->ezText("N DO EXAME               : ".$r["int_opcional"],10,array('justification'=>'left'));
			$pdf->ezText("MÉDICO REQUISITANTE      : ".$r["int_requisitante"],10,array('justification'=>'left'));
			$pdf->ezText("EXAME INTERPRETADO POR   : 9679 Ernesto Sousa Nunes",10,array('justification'=>'left'));
			$pdf->ezText("TÉCNICO RX               : ".$r["int_tecnico_rx"],10,array('justification'=>'left'));
			
			$pdf->ezText(" ",20,array('justification'=>'left'));
			
			$pdf->ezText("I N T E R P R E T A Ç Ã O",18,array('justification'=>'center')); 
			
			$pdf->ezText(" ",20,array('justification'=>'left'));
			
			$vet_txt = split("\n",$r["int_texto"]);
			
			$pdf->ezText("============================================================================",10,array('justification'=>'left'));
			
			$pdf->ezText(" ",8,array('justification'=>'left'));
			
			foreach($vet_txt as $linha){
				$pdf->ezText("      ".$linha,10,array('justification'=>'left'));
			}
			$pdf->ezText(" ",8,array('justification'=>'left'));
			
			$pdf->ezText("============================================================================",10,array('justification'=>'left'));
			
			$pdf->ezText("              Exame interpretado por: 9676 - Dr. Ernesto Sousa Nunes",10,array('justification'=>'left'));
			$pdf->addJpegFromFile('ass.jpg',250, 0);
			$pdf->openHere('Fit');
			if ($c+1 < $n_rows)
				$pdf->ezNewPage();
			$c++;
			
			$o->informaImpressao();
			//$sql = "update laudo set LAU_DATA_EXPORTACAO = now() where LAU_ID = ".$r["LAU_ID"]." LIMIT 1";
			//$up = mysql_query($sql, $db) or die(mysql_error());
		 }
		
		$pdfcode = $pdf->Output();
		//$pdfcode = str_replace("\n","\n<br>",htmlspecialchars($pdfcode));
		//$cont = trim($pdfcode);
		$fh = fopen("laudos_prontos.pdf", 'w+');
		fwrite($fh, $pdfcode);
		fclose($fh);
		?><script language="javascript">document.location.href="laudos_prontos.pdf";</script><?

	}
	
}
?>
