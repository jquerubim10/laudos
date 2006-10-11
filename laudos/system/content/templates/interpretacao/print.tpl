<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title></title>
<style media="print" type="text/css">
img {page-break-after:always;}
</style>
</head>
<body>
{.foreach from=$registros key=i item=r .}
<pre>
{.$r.hos_nome.}

PACIENTE................: {.$r.int_paciente_prontuario.} {.$r.int_paciente_nome.}
NASCIMENTO..............: {.$r.int_paciente_nascimento|nascimento.}
SEXO....................: {.$r.int_paciente_sexo.}
CONVÊNIO................: {.$r.con_nome.}
EXAME...................: {.$r.exa_nome.}
DATA....................: {.$r.int_data_interpretacao|date_format:"%d/%m/%Y %H:%M".}
N DO EXAME..............: {.$r.int_opcional.}
MÉDICO REQUISITANTE.....: {.$r.int_requisitante.}
EXAME INTERPRETADO POR..: 9679 Ernesto Sousa Nunes
TÉCNICO RX..............: {.$r.int_tecnico_rx.}

I N T E R P R E T A Ç Ã O
============================================================================
{.$r.int_texto.}
============================================================================
Exame interpretado por: 9676 - Dr. Ernesto Sousa Nunes
</pre>
<img hspace="250" src="ass.jpg" border="0" />
{./foreach.}
</body>
</html>