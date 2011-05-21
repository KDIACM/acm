<?php /* Smarty version Smarty-3.0.6, created on 2011-05-21 16:32:35
         compiled from "D:/project/test_project/acm/tpl\make_cust_payment_list.html" */ ?>
<?php /*%%SmartyHeaderCode:66544dd79bcbc914c8-38123765%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f590fdbcc185b4d126cfe3b4e4fbe48ddcd45d9e' => 
    array (
      0 => 'D:/project/test_project/acm/tpl\\make_cust_payment_list.html',
      1 => 1305975754,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '66544dd79bcbc914c8-38123765',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_cycle')) include 'D:/project/libs/smarty/libs/plugins\function.cycle.php';
?><?php $_template = new Smarty_Internal_Template('header.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
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

      <?php  $_smarty_tpl->tpl_vars['data_item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data_arr')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data_item']->key => $_smarty_tpl->tpl_vars['data_item']->value){
?>
      <?php if ($_smarty_tpl->tpl_vars['data_item']->value['action']==1){?>
        <?php ob_start();?><?php echo smarty_function_cycle(array('values'=>'odd_row,even_row'),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['class'] = new Smarty_variable($_tmp1, null, null);?>
      <?php }?>  
      <tr  class="<?php echo $_smarty_tpl->getVariable('class')->value;?>
">
        <td><?php echo $_smarty_tpl->tpl_vars['data_item']->value['payment_amount'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['data_item']->value['payment_date'];?>
</td>
        <td class="lft"><?php echo $_smarty_tpl->tpl_vars['data_item']->value['extra_amount'];?>
</td>
	<td class="lft"><?php echo $_smarty_tpl->tpl_vars['data_item']->value['paid_date'];?>
</td>
	<td><?php echo $_smarty_tpl->tpl_vars['data_item']->value['paid_amount'];?>
</td>
	<td><?php echo $_smarty_tpl->tpl_vars['data_item']->value['last_month_amount'];?>
</td>
	<td><?php echo $_smarty_tpl->tpl_vars['data_item']->value['rest_amount'];?>
</td>
	<td><?php echo $_smarty_tpl->tpl_vars['data_item']->value['extra_interest'];?>
</td>
        <td>
            <?php if ($_smarty_tpl->tpl_vars['data_item']->value['action']==1){?>
            <a href="make_payment.php?mode=add_ex_pay&amp;t_id=<?php echo $_smarty_tpl->tpl_vars['data_item']->value[$_smarty_tpl->getVariable('smarty')->value['section']['payment_id']['index']];?>
&amp;ac_id=<?php echo $_smarty_tpl->tpl_vars['data_item']->value[$_smarty_tpl->getVariable('smarty')->value['section']['account_id']['index']];?>
" title="Edit">Add EP</a>
            <?php }?> 
        </td>
	<td>
            <?php if ($_smarty_tpl->tpl_vars['data_item']->value['action']==1){?>
            <a href="make_payment.php?mode=editdd&amp;t_id=<?php echo $_smarty_tpl->tpl_vars['data_item']->value[$_smarty_tpl->getVariable('smarty')->value['section']['payment_id']['index']];?>
&amp;ac_id=<?php echo $_smarty_tpl->tpl_vars['data_item']->value[$_smarty_tpl->getVariable('smarty')->value['section']['account_id']['index']];?>
" title="Edit">Edit</a>
            <?php }?>
        </td>
      </tr>
      <?php }} ?>

    </tbody>
  </table>
</div>

<?php $_template = new Smarty_Internal_Template('footer.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>