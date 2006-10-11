<?php /* Smarty version 2.6.9, created on 2005-11-18 11:12:46
         compiled from content/templates/interpretacao/print.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'nascimento', 'content/templates/interpretacao/print.tpl', 16, false),array('modifier', 'date_format', 'content/templates/interpretacao/print.tpl', 20, false),)), $this); ?>
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
<?php $_from = $this->_tpl_vars['registros']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['r']):
?>
<pre>
<?php echo $this->_tpl_vars['r']['hos_nome']; ?>


PACIENTE................: <?php echo $this->_tpl_vars['r']['int_paciente_prontuario']; ?>
 <?php echo $this->_tpl_vars['r']['int_paciente_nome']; ?>

NASCIMENTO..............: <?php echo ((is_array($_tmp=$this->_tpl_vars['r']['int_paciente_nascimento'])) ? $this->_run_mod_handler('nascimento', true, $_tmp) : smarty_modifier_nascimento($_tmp)); ?>

SEXO....................: <?php echo $this->_tpl_vars['r']['int_paciente_sexo']; ?>

CONVÊNIO................: <?php echo $this->_tpl_vars['r']['con_nome']; ?>

EXAME...................: <?php echo $this->_tpl_vars['r']['exa_nome']; ?>

DATA....................: <?php echo ((is_array($_tmp=$this->_tpl_vars['r']['int_data_interpretacao'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y %H:%M") : smarty_modifier_date_format($_tmp, "%d/%m/%Y %H:%M")); ?>

N DO EXAME..............: <?php echo $this->_tpl_vars['r']['int_opcional']; ?>

MÉDICO REQUISITANTE.....: <?php echo $this->_tpl_vars['r']['int_requisitante']; ?>

EXAME INTERPRETADO POR..: 9679 Ernesto Sousa Nunes
TÉCNICO RX..............: <?php echo $this->_tpl_vars['r']['int_tecnico_rx']; ?>


I N T E R P R E T A Ç Ã O
============================================================================
<?php echo $this->_tpl_vars['r']['int_texto']; ?>

============================================================================
Exame interpretado por: 9676 - Dr. Ernesto Sousa Nunes
</pre>
<img hspace="250" src="ass.jpg" border="0" />
<?php endforeach; endif; unset($_from); ?>
</body>
</html>