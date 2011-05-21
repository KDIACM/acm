<?php /* Smarty version Smarty-3.0.6, created on 2011-05-21 12:29:51
         compiled from "/home/deshapriya/www/acm/tpl/error.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12062015244dd762e779b295-06955584%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cc6f7e7184dfdb9802bab12bbc2c2792e50a7036' => 
    array (
      0 => '/home/deshapriya/www/acm/tpl/error.tpl',
      1 => 1304539270,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12062015244dd762e779b295-06955584',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<?php if ($_smarty_tpl->getVariable('error')->value){?>
  <li class="msg">
    <label class="error">
      <?php  $_smarty_tpl->tpl_vars['err'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('error')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['err']->key => $_smarty_tpl->tpl_vars['err']->value){
?>
        <?php echo $_smarty_tpl->tpl_vars['err']->value;?>
<br />
      <?php }} ?>
    </label>
    <div style="clear: both;"></div>
  </li>
<?php }?>
<?php if ($_smarty_tpl->getVariable('err')->value){?>
  <li class="msg">
    <label class="error">
        Errors occured on form submission
    </label>
    <div style="clear: both;"></div>
  </li>
  <li style="height:5px;">
  </li>
<?php }?>