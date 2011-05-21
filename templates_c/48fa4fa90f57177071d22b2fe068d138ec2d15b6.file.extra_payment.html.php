<?php /* Smarty version Smarty-3.0.6, created on 2011-05-15 20:48:07
         compiled from "/home/deshapriya/www/acm/tpl/extra_payment.html" */ ?>
<?php /*%%SmartyHeaderCode:5455109174dcfeeaf6cf621-60203256%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '48fa4fa90f57177071d22b2fe068d138ec2d15b6' => 
    array (
      0 => '/home/deshapriya/www/acm/tpl/extra_payment.html',
      1 => 1305472630,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5455109174dcfeeaf6cf621-60203256',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template('header.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<div class="content_inner">
  <form action="make_payment.php" id="frm_payment_add" name="frm_payment_add" method="post">
    <input type="hidden" name="mode" value="<?php if ($_smarty_tpl->getVariable('mode')->value=="edit"){?>update<?php }else{ ?>add<?php }?>" />
				 <?php if ($_smarty_tpl->getVariable('mode')->value=="edit"){?>
           <input type="hidden" name="t_id" value="<?php echo $_smarty_tpl->getVariable('payment_obj')->value->m_payment_id;?>
" />
		  <?php }?>
    <input type="hidden" name="account_id" value="<?php echo $_smarty_tpl->getVariable('account_obj')->value->m_account_id;?>
" />
    <input type="hidden" name="c_id" value="<?php echo $_smarty_tpl->getVariable('customer_obj')->value->m_customer_id;?>
" />

    <fieldset>
      <legend><?php if ($_smarty_tpl->getVariable('mode')->value=="edit"){?>Edit <?php }else{ ?>Add<?php }?> Extra Payment</legend>
      <table width="100%" cellpadding="0" cellspacing="0" border="0">
        <tr>
          <td>Customer Name: <?php echo $_smarty_tpl->getVariable('customer_obj')->value->m_first_name;?>
 <?php echo $_smarty_tpl->getVariable('customer_obj')->value->m_last_name;?>
</td>
          <td>Telephone : <?php echo $_smarty_tpl->getVariable('customer_obj')->value->m_contact_no;?>
</td>
          <td>Account Number : <?php echo $_smarty_tpl->getVariable('customer_obj')->value->m_customer_code;?>
 - <?php echo $_smarty_tpl->getVariable('account_obj')->value->m_account_number;?>
</td>
        </tr>
      </table>
      <ol class="form_class">
        <li>
          <label for="payment_date">Payment Date</label>
          <input name="payment_date" id="payment_date" type="text" value="<?php echo $_smarty_tpl->getVariable('payment_obj')->value->m_payment_date;?>
"  size="30" />
        </li>
        <li>
          <label for="payment_amount">Payment Amount</label>
          <input name="payment_amount" id="payment_amount" type="text" value="<?php echo $_smarty_tpl->getVariable('payment_obj')->value->m_payment_amount;?>
" size="30" />
        </li>
        <li>
          <label for="paid_amount">Paid Amount</label>
          <input name="paid_amount" id="paid_amount" type="text" value="<?php echo $_smarty_tpl->getVariable('payment_obj')->value->m_paid_amount;?>
"  size="30" />
        </li>
        <li>
          <label for="paid_date">Paid Date</label>
          <input name="paid_date" id="paid_date" type="text" value="<?php echo $_smarty_tpl->getVariable('payment_obj')->value->m_paid_date;?>
"  size="30" />
        </li>
        <li>
          <label for="extra_amount">Extra Amount</label>
          <input name="extra_amount" id="extra_amount" type="text" value="<?php echo $_smarty_tpl->getVariable('payment_obj')->value->m_extra_amount;?>
" size="30" />
        </li>
        <li>
          <label for="last_month_amount">Last Month Amount</label>
          <input name="last_month_amount" id="last_month_amount" type="text" value="<?php echo $_smarty_tpl->getVariable('payment_obj')->value->m_last_month_amount;?>
"  size="30" />
        </li>
        <!--			<li>
<label for="rest_amount">Rest Amount</label>
<input name="rest_amount" id="rest_amount" type="text" value="<?php echo $_smarty_tpl->getVariable('payment_obj')->value->m_rest_amount;?>
"  size="30" />
</li> -->
        <li>
          <label for="extra_interest">Extra Interest</label>
          <input name="extra_interest" id="extra_interest" type="text" value="<?php echo $_smarty_tpl->getVariable('payment_obj')->value->m_extra_interest;?>
"  size="30" />
        </li>
      </ol>
      <div class="buttons">
        <button type="submit" class="positive"><?php if ($_smarty_tpl->getVariable('mode')->value=="edit"){?>Update<?php }else{ ?>Submit<?php }?></button>
				<?php if ($_smarty_tpl->getVariable('mode')->value=="edit"){?>
        <button type="button" class="positive" onclick="javascript:document.location.href='make_payment.php?mode=view_cust_pay&t_id=1&c_id=1'">Cancel</button>
				<?php }else{ ?>
        <button type="reset" class="positive">Reset</button>
				<?php }?>
      </div>
    </fieldset>
  </form>
</div>
<?php $_template = new Smarty_Internal_Template('footer.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
