<?php /* Smarty version Smarty-3.0.6, created on 2011-05-21 12:39:00
         compiled from "/home/deshapriya/www/acm/tpl/customer_account_list.html" */ ?>
<?php /*%%SmartyHeaderCode:1046431754dd7650cdeaf58-90984835%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0c7ad135488f8edd962ef211af18406963d726c2' => 
    array (
      0 => '/home/deshapriya/www/acm/tpl/customer_account_list.html',
      1 => 1305929145,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1046431754dd7650cdeaf58-90984835',
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
  <legend style="margin: 0px 10px 20px;"><a href="customer.php?mode=view&amp;t_id=<?php echo $_smarty_tpl->getVariable('customer_obj')->value->m_customer_id;?>
" title="Click to View">Customer: <?php echo $_smarty_tpl->getVariable('customer_obj')->value->m_first_name;?>
 <?php echo $_smarty_tpl->getVariable('customer_obj')->value->m_last_name;?>
</a></legend>
  <table width="100%" cellpadding="0" cellspacing="0" border="0" id="table1" class="tablesorter">
    <thead>
      <tr>
        <th title="Sort by Real Name" >Acc No</th>
        <th>Open Date</th>
        <th>Amount</th>
        <th>Rate</th>
        <th>Status</th>
        <th>Payment</th>
        <th>Account</th>
        <th>&nbsp;</th>
      </tr>
    </thead>
    <tbody>
      <?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['account_list']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['account_list']['name'] = 'account_list';
$_smarty_tpl->tpl_vars['smarty']->value['section']['account_list']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('account_list')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['account_list']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['account_list']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['account_list']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['account_list']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['account_list']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['account_list']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['account_list']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['account_list']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['account_list']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['account_list']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['account_list']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['account_list']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['account_list']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['account_list']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['account_list']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['account_list']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['account_list']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['account_list']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['account_list']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['account_list']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['account_list']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['account_list']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['account_list']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['account_list']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['account_list']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['account_list']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['account_list']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['account_list']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['account_list']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['account_list']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['account_list']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['account_list']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['account_list']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['account_list']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['account_list']['total']);
?>
      <tr id="<?php echo $_smarty_tpl->getVariable('account_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['account_list']['index']]->m_account_id;?>
" class="<?php echo smarty_function_cycle(array('values'=>'odd_row,even_row'),$_smarty_tpl);?>
">
        <td>
          <a href="account.php?mode=view_transaction&amp;t_id=<?php echo $_smarty_tpl->getVariable('account_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['account_list']['index']]->m_account_id;?>
" title="Edit">
            <?php echo $_smarty_tpl->getVariable('customer_obj')->value->m_customer_code;?>
 - <?php echo $_smarty_tpl->getVariable('account_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['account_list']['index']]->m_account_number;?>

          </a>
        </td>
        <td><?php echo $_smarty_tpl->getVariable('account_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['account_list']['index']]->m_open_date;?>
</td>
        <td><?php echo $_smarty_tpl->getVariable('account_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['account_list']['index']]->m_amount;?>
</td>
        <td><?php echo $_smarty_tpl->getVariable('account_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['account_list']['index']]->m_rate;?>
</td>
        <td class="lft"><?php if ($_smarty_tpl->getVariable('account_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['account_list']['index']]->m_status=="1"){?> Enable<?php }else{ ?>Disable<?php }?></td>
        <td><a href="make_payment.php?mode=view_cust_pay&amp;t_id=<?php echo $_smarty_tpl->getVariable('account_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['account_list']['index']]->m_account_id;?>
&amp;c_id=<?php echo $_smarty_tpl->getVariable('customer_obj')->value->m_customer_id;?>
" title="payment">View</a>&nbsp;&nbsp;<a href="make_payment.php?mode=add_pay&amp;t_id=<?php echo $_smarty_tpl->getVariable('account_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['account_list']['index']]->m_account_id;?>
" title="payment">Add</a></td>
        <td>
          <a href="account.php?mode=edit&amp;t_id=<?php echo $_smarty_tpl->getVariable('account_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['account_list']['index']]->m_account_id;?>
" title="Edit">Edit</a>
          <a href="account.php?mode=new_transaction&amp;t_id=<?php echo $_smarty_tpl->getVariable('account_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['account_list']['index']]->m_account_id;?>
" title="Add Transaction">Add Transaction</a>
        </td>
        <td><a href="account.php?mode=change&amp;ac_id=<?php echo $_smarty_tpl->getVariable('account_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['account_list']['index']]->m_account_id;?>
&amp;t_id=<?php echo $_smarty_tpl->getVariable('customer_obj')->value->m_customer_id;?>
" title="status"><?php if ($_smarty_tpl->getVariable('account_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['account_list']['index']]->m_status=="1"){?> Active<?php }else{ ?>Inactive<?php }?></a></td>
      </tr>
      <?php endfor; endif; ?>

    </tbody>
  </table>
</div>

<?php $_template = new Smarty_Internal_Template('footer.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>