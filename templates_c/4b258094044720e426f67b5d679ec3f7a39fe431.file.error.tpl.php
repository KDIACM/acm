<?php /* Smarty version Smarty-3.0.6, created on 2011-05-21 17:05:51
         compiled from "D:/project/test_project/acm/tpl\error.tpl" */ ?>
<?php /*%%SmartyHeaderCode:46454dd7a3978621b8-32860200%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4b258094044720e426f67b5d679ec3f7a39fe431' => 
    array (
      0 => 'D:/project/test_project/acm/tpl\\error.tpl',
      1 => 1304539270,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '46454dd7a3978621b8-32860200',
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