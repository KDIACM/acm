<?php /* Smarty version Smarty-3.0.6, created on 2011-05-21 12:29:51
         compiled from "/home/deshapriya/www/acm/tpl/account_add.html" */ ?>
<?php /*%%SmartyHeaderCode:8944834564dd762e754a661-24698308%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '50e76971877c8b02b3e72bef3048e0c06325e62c' => 
    array (
      0 => '/home/deshapriya/www/acm/tpl/account_add.html',
      1 => 1305744273,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8944834564dd762e754a661-24698308',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template('header.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<div class="content_inner">
  <form action="account.php" id="frm_account_add" name="frm_account_add" method="post" >
    <input type="hidden" name="u_id" value="<?php echo $_smarty_tpl->getVariable('customer_obj')->value->m_customer_id;?>
" />
    <input type="hidden" name="mode" value="<?php if ($_smarty_tpl->getVariable('mode')->value=="edit"){?>update<?php }else{ ?>add<?php }?>" />
				 <?php if ($_smarty_tpl->getVariable('mode')->value=="edit"){?>
           <input type="hidden" name="t_id" value="<?php echo $_smarty_tpl->getVariable('account_obj')->value->m_account_id;?>
" />
		  <?php }?>

    <fieldset>
      <legend><?php if ($_smarty_tpl->getVariable('mode')->value=="edit"){?>Edit <?php }else{ ?>Add<?php }?> Account</legend>
      <ol class="form_class">
        <?php $_template = new Smarty_Internal_Template('error.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
        <li>
          <label for="customer_id">Customer name</label>
          <?php echo $_smarty_tpl->getVariable('customer_obj')->value->m_first_name;?>
 <?php echo $_smarty_tpl->getVariable('customer_obj')->value->m_last_name;?>
 &nbsp;
        </li>
        <li>
          <label for="account_number">Account Number: </label>
          <?php echo $_smarty_tpl->getVariable('customer_obj')->value->m_customer_code;?>
&nbsp;-
          <input name="account_number" id="account_number" style="width:65px;" type="text" value="<?php echo $_smarty_tpl->getVariable('account_obj')->value->m_account_number;?>
" size="30" />
        </li>
        <li>
          <label for="amount">Amount</label>
          <input name="amount" id="amount" type="text" value="<?php echo $_smarty_tpl->getVariable('account_obj')->value->m_amount;?>
" size="30" />
        </li>
        <li>
          <label for="rate">Rate</label>
          <input name="rate" id="rate" type="text" size="30" maxlength="2" value="<?php echo $_smarty_tpl->getVariable('account_obj')->value->m_rate;?>
" /> %
        </li>
								<li>
          <label for="open_date">Account Open date</label>
          <?php if ($_smarty_tpl->getVariable('mode')->value=="edit"){?>
            <?php echo $_smarty_tpl->getVariable('account_obj')->value->m_open_date;?>

          <?php }else{ ?>
          <input name="open_date" id="open_date" class="w8em format-y-m-d divider-dash range-low-today no-transparency" readonly value="<?php echo $_smarty_tpl->getVariable('account_obj')->value->m_open_date;?>
" maxlength="10" size="15" type="text" />
          <?php }?>
        </li>
	<?php if ($_smarty_tpl->getVariable('mode')->value=="edit"){?>
        <li>
          <label for="update_date">Account Update date</label>
          <input name="update_date" id="update_date" class="w8em format-y-m-d divider-dash range-low-today no-transparency" readonly value="<?php echo $_smarty_tpl->getVariable('account_obj')->value->m_update_date;?>
" maxlength="10" size="15" type="text" />
        </li>
	<?php }?>
	<li>
          <label for="garente">Garentee</label>
          <textarea cols="30" name="garentee" rows="5"><?php echo $_smarty_tpl->getVariable('account_obj')->value->m_garentee;?>
</textarea>
        </li>
      </ol>
      <div class="buttons">
        <button type="submit" class="positive"><?php if ($_smarty_tpl->getVariable('mode')->value=="edit"){?>Update<?php }else{ ?>Submit<?php }?></button>
				<?php if ($_smarty_tpl->getVariable('mode')->value=="edit"){?>
        <button type="button" class="positive" onclick="javascript:document.location.href='account.php?mode=list'">Cancel</button>
				<?php }else{ ?>
        <button type="reset" class="positive">Reset</button>
				<?php }?>
      </div>
    </fieldset>
  </form>
</div>
<?php $_template = new Smarty_Internal_Template('footer.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
