<?php /* Smarty version Smarty-3.0.6, created on 2011-05-15 21:20:09
         compiled from "/home/deshapriya/www/acm/tpl/make_cust_payment_list.html" */ ?>
<?php /*%%SmartyHeaderCode:11963237014dcff6313be251-79117064%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a80382d4abb3d6de8f2495aad97749e4dfc6205d' => 
    array (
      0 => '/home/deshapriya/www/acm/tpl/make_cust_payment_list.html',
      1 => 1304826196,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11963237014dcff6313be251-79117064',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template('header.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

<div class="content_inner">
  <h2>View Customer Payments</h2>
  <br>
  <table width="100%" cellpadding="0" cellspacing="0" border="0">
	<tr>
	<td>Customer Name: <?php echo $_smarty_tpl->getVariable('customer_obj')->value->m_first_name;?>
 <?php echo $_smarty_tpl->getVariable('customer_obj')->value->m_last_name;?>
</td>
	<td>Telephone : <?php echo $_smarty_tpl->getVariable('customer_obj')->value->m_contact_no;?>
</td>
	<td>Amount : <?php echo $_smarty_tpl->getVariable('account_obj')->value->m_amount;?>
</td>
	</tr>
	<tr>
	<td>Customer Id: <?php echo $_smarty_tpl->getVariable('customer_obj')->value->m_customer_code;?>
</td>
	<td>Opne Date : <?php echo $_smarty_tpl->getVariable('account_obj')->value->m_open_date;?>
</td>
	<td>Rate : <?php echo $_smarty_tpl->getVariable('account_obj')->value->m_rate;?>
</td>
	</tr>
	<tr>
	<td>Acc No: <?php echo $_smarty_tpl->getVariable('customer_obj')->value->m_customer_code;?>
 - <?php echo $_smarty_tpl->getVariable('account_obj')->value->m_account_number;?>
</td>
	<td></td>
	<td></td>
	</tr>
  </table>
  <br>
  <table width="100%" cellpadding="0" cellspacing="0" border="0" id="table1" class="tablesorter">
    <caption>

    </caption>
    <thead>
   <tr>
  <th>Payment Amount</th>
		<th>Payment Date</th>
		<th>Extra Amount</th>
		<th>Paid Date</th>
		<th>Paid Amount</th>
		<th>Last Month Amount</th>
		<th>Rest Amount</th>
		<th>Extra Interest</th>
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
">
        <td><?php echo $_smarty_tpl->getVariable('payment_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['payment_list']['index']]->m_payment_amount;?>
</td>
        <td><?php echo $_smarty_tpl->getVariable('payment_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['payment_list']['index']]->m_payment_date;?>
</td>
        <td class="lft"><?php echo $_smarty_tpl->getVariable('payment_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['payment_list']['index']]->m_extra_amount;?>
</td>
								<td class="lft"><?php echo $_smarty_tpl->getVariable('payment_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['payment_list']['index']]->m_paid_date;?>
</td>
								<td><?php echo $_smarty_tpl->getVariable('payment_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['payment_list']['index']]->m_paid_amount;?>
</td>
								<td><?php echo $_smarty_tpl->getVariable('payment_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['payment_list']['index']]->m_last_month_amount;?>
</td>
								<td><?php echo $_smarty_tpl->getVariable('payment_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['payment_list']['index']]->m_rest_amount;?>
</td>
								<td><?php echo $_smarty_tpl->getVariable('payment_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['payment_list']['index']]->m_extra_interest;?>
</td>
								<td><a href="make_payment.php?mode=edit&amp;t_id=<?php echo $_smarty_tpl->getVariable('payment_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['payment_list']['index']]->m_payment_id;?>
&amp;ac_id=<?php echo $_smarty_tpl->getVariable('account_obj')->value->m_account_id;?>
" title="Edit">Add EP</a></td>
								<td><a href="make_payment.php?mode=edit&amp;t_id=<?php echo $_smarty_tpl->getVariable('payment_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['payment_list']['index']]->m_payment_id;?>
&amp;ac_id=<?php echo $_smarty_tpl->getVariable('account_obj')->value->m_account_id;?>
" title="Edit">Edit</a></td>
      </tr>
      <?php endfor; endif; ?>

    </tbody>
  </table>
</div>

<?php $_template = new Smarty_Internal_Template('footer.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>