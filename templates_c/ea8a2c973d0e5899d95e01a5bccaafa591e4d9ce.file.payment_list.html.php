<?php /* Smarty version Smarty-3.0.6, created on 2011-05-21 00:50:48
         compiled from "/home/deshapriya/www/acm/tpl/payment_list.html" */ ?>
<?php /*%%SmartyHeaderCode:19976561494dd6bf10433da8-54500955%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ea8a2c973d0e5899d95e01a5bccaafa591e4d9ce' => 
    array (
      0 => '/home/deshapriya/www/acm/tpl/payment_list.html',
      1 => 1305741072,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19976561494dd6bf10433da8-54500955',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_cycle')) include '/home/deshapriya/www/libs/smarty/libs/plugins/function.cycle.php';
?><?php $_template = new Smarty_Internal_Template('header.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

<div class="content_inner">
  <h2>View account</h2>
  <table width="100%" cellpadding="0" cellspacing="0" border="0" id="table1" class="tablesorter">
    <caption>

    </caption>
    <thead>
      <tr>
        <th title="Sort by Name" class="tooltip">Customer Name</th>
        <th title="Sort by Real Name" >Acc No</th>
        <th title="Sort by Email Address">Payment Amount</th>
        <th>Payment Date</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      </tr>
    </thead>
    <tbody>

      <?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['payment_list']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['payment_list']['name'] = 'payment_list';
$_smarty_tpl->tpl_vars['smarty']->value['section']['payment_list']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('payment_list')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['payment_list']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['payment_list']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['payment_list']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['payment_list']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['payment_list']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['payment_list']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['payment_list']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['payment_list']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['payment_list']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['payment_list']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['payment_list']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['payment_list']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['payment_list']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['payment_list']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['payment_list']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['payment_list']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['payment_list']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['payment_list']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['payment_list']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['payment_list']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['payment_list']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['payment_list']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['payment_list']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['payment_list']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['payment_list']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['payment_list']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['payment_list']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['payment_list']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['payment_list']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['payment_list']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['payment_list']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['payment_list']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['payment_list']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['payment_list']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['payment_list']['total']);
?>
      <tr id="<?php echo $_smarty_tpl->getVariable('payment_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['payment_list']['index']]->m_payment_id;?>
" class="<?php echo smarty_function_cycle(array('values'=>'odd_row,even_row'),$_smarty_tpl);?>
">
        <td><a href="customer.php?mode=view&amp;t_id=<?php echo $_smarty_tpl->getVariable('payment_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['payment_list']['index']]->m_customer_obj->m_customer_id;?>
" title="Click to View"><?php echo $_smarty_tpl->getVariable('payment_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['payment_list']['index']]->m_customer_obj->m_first_name;?>
 <?php echo $_smarty_tpl->getVariable('payment_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['payment_list']['index']]->m_customer_obj->m_last_name;?>
</a></td>
        <td><?php echo $_smarty_tpl->getVariable('payment_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['payment_list']['index']]->m_payment_id;?>
</td>
        <td class="lft"><?php echo $_smarty_tpl->getVariable('payment_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['payment_list']['index']]->m_payment_amount;?>
</td>
        <td class="lft"><?php echo $_smarty_tpl->getVariable('payment_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['payment_list']['index']]->m_payment_date;?>
</td>
        <td><a href="make_payment.php?mode=edit&amp;t_id=<?php echo $_smarty_tpl->getVariable('payment_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['payment_list']['index']]->m_payment_id;?>
" title="Edit">Edit Payment</a></td>
        <td><a href="make_payment.php?mode=delete&amp;t_id=<?php echo $_smarty_tpl->getVariable('payment_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['payment_list']['index']]->m_payment_id;?>
" class="handle1 delete" title="Delete" id="delete1"><span>Delete</span></a></td>
      </tr>
      <?php endfor; endif; ?>

    </tbody>
  </table>
</div>

<?php $_template = new Smarty_Internal_Template('footer.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>