<?php /* Smarty version 2.6.9, created on 2005-07-21 23:36:43
         compiled from lib/templates/menu.tpl */ ?>
<div style="margin-left:10px; margin-top:15px; ">
<?php $_from = $this->_tpl_vars['conteudo_menu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['s'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['s']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['name_s'] => $this->_tpl_vars['info_s']):
        $this->_foreach['s']['iteration']++;
?>
	<a href="index.php?s=<?php echo $this->_tpl_vars['name_s']; ?>
"><?php echo $this->_tpl_vars['info_s']['nome']; ?>
</a><br>
	<?php $_from = $this->_tpl_vars['info_s']['sub']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['ss'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['ss']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['name_ss'] => $this->_tpl_vars['info_ss']):
        $this->_foreach['ss']['iteration']++;
?>
		&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php?s=<?php echo $this->_tpl_vars['name_s']; ?>
&ss=<?php echo $this->_tpl_vars['name_ss']; ?>
"><?php echo $this->_tpl_vars['info_ss']['nome']; ?>
</a><br>
		<?php $_from = $this->_tpl_vars['info_ss']['sub']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['sss'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['sss']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['name_sss'] => $this->_tpl_vars['info_sss']):
        $this->_foreach['sss']['iteration']++;
?>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php?s=<?php echo $this->_tpl_vars['name_s']; ?>
&ss=<?php echo $this->_tpl_vars['name_ss']; ?>
&sss=<?php echo $this->_tpl_vars['name_sss']; ?>
"><?php echo $this->_tpl_vars['info_sss']['nome']; ?>
</a><br>
		<?php endforeach; endif; unset($_from); ?>
	<?php endforeach; endif; unset($_from); ?>
<?php endforeach; endif; unset($_from); ?>
</div>