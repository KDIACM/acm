<?php /* Smarty version Smarty-3.0.6, created on 2011-05-21 02:38:53
         compiled from "/home/deshapriya/www/acm/tpl/customer_view.html" */ ?>
<?php /*%%SmartyHeaderCode:6064467484dd6d866007276-98939337%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9febee53d0da83f170f66395626b0122ba66d0ea' => 
    array (
      0 => '/home/deshapriya/www/acm/tpl/customer_view.html',
      1 => 1305733399,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6064467484dd6d866007276-98939337',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template('header.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

<div class="content_inner">
  <fieldset>
    <legend>View User</legend>
    <ol class="form_class">
      <?php if ($_smarty_tpl->getVariable('img_path')->value){?>
      <li>
        <label></label>
        <img src="<?php echo $_smarty_tpl->getVariable('img_path')->value;?>
" />
      </li>
      <?php }?>
      <li>
        <label>First Name</label>
					<?php echo $_smarty_tpl->getVariable('customer')->value->m_first_name;?>
&nbsp;
      </li>
      <li>
        <label>Last name</label>
					<?php echo $_smarty_tpl->getVariable('customer')->value->m_last_name;?>
&nbsp;
      </li>
      <li>
        <label>Nick Name</label>
					<?php echo $_smarty_tpl->getVariable('customer')->value->m_nick_name;?>
 &nbsp;
      </li>
      <li>
        <label>NIC Number</label>
					<?php echo $_smarty_tpl->getVariable('customer')->value->m_nic_number;?>
&nbsp;
      </li>
      <li>
        <label>Address</label>
					<?php echo $_smarty_tpl->getVariable('customer')->value->m_address;?>
&nbsp;
      </li>
      <li>
        <label>&nbsp;</label>
        &nbsp;
      </li>
      <li>
        <label>&nbsp;&nbsp;</label>
        <a href="#">View Accounts</a> | <a href="#">View Payments</a>
      </li>
    </ol>
  </fieldset>
</div>

<?php $_template = new Smarty_Internal_Template('footer.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
