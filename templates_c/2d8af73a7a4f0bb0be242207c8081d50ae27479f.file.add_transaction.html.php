<?php /* Smarty version Smarty-3.0.6, created on 2011-05-21 11:55:47
         compiled from "/home/deshapriya/www/acm/tpl/add_transaction.html" */ ?>
<?php /*%%SmartyHeaderCode:7276139884dd75aebb00b37-34095474%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2d8af73a7a4f0bb0be242207c8081d50ae27479f' => 
    array (
      0 => '/home/deshapriya/www/acm/tpl/add_transaction.html',
      1 => 1305926797,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7276139884dd75aebb00b37-34095474',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template('header.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<div class="content_inner">
  <form action="account.php" id="frm_account_trn_add" name="frm_account_trn_add" method="post" >
    <input type="hidden" name="u_id" value="<?php echo $_smarty_tpl->getVariable('account_obj')->value->m_account_id;?>
" />
    <input type="hidden" name="mode" value="<?php if ($_smarty_tpl->getVariable('mode')->value=="edit"){?>update_transaction<?php }else{ ?>add_transaction<?php }?>" />
    <?php if ($_smarty_tpl->getVariable('mode')->value=="edit"){?>
      <input type="hidden" name="t_id" value="<?php echo $_smarty_tpl->getVariable('transaction_obj')->value->m_transaction_id;?>
" />
    <?php }?>

    <fieldset>
      <legend><?php if ($_smarty_tpl->getVariable('mode')->value=="edit"){?>Edit <?php }else{ ?>Add<?php }?> Account Transaction</legend>
      <ol class="form_class">
        <?php $_template = new Smarty_Internal_Template('error.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
        <li>
          <label for="customer_id">Account Number</label>
          <?php echo $_smarty_tpl->getVariable('account_obj')->value->m_account_number;?>
 &nbsp;
        </li>
        <li>
          <label for="amount">Amount</label>
          <input name="amount" id="amount" type="text" value="<?php echo $_smarty_tpl->getVariable('transaction_obj')->value->m_amount;?>
" size="30" />
        </li>
        <li>
          <label for="rate">Owner</label>
          <input name="owner" checked id="owner" type="radio" value="<?php echo $_smarty_tpl->getVariable('by_me')->value;?>
" /> <?php echo $_smarty_tpl->getVariable('by_me')->value;?>

          <input name="owner" id="owner" type="radio" value="<?php echo $_smarty_tpl->getVariable('by_cust')->value;?>
" /> <?php echo $_smarty_tpl->getVariable('by_cust')->value;?>

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
