<?php /* Smarty version Smarty-3.0.6, created on 2011-05-19 21:39:13
         compiled from "/home/deshapriya/www/acm/tpl/customer_add.html" */ ?>
<?php /*%%SmartyHeaderCode:4666913764dd540a90e2970-96352258%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '46838c78d22b931df407b05ca6a6f16fc043b5e9' => 
    array (
      0 => '/home/deshapriya/www/acm/tpl/customer_add.html',
      1 => 1305734479,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4666913764dd540a90e2970-96352258',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template('header.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

<!-- InstanceBeginEditable name="CONTENT" -->
<div class="content_inner">
  <form action="customer.php" id="frm_customer_add" name="frm_customer_add" method="post" enctype="multipart/form-data">
    <input type="hidden" name="mode" value="<?php if ($_smarty_tpl->getVariable('mode')->value=="edit"){?>update<?php }else{ ?>add<?php }?>" />
		  <?php if ($_smarty_tpl->getVariable('mode')->value=="edit"){?>
           <input type="hidden" name="t_id" value="<?php echo $_smarty_tpl->getVariable('customer')->value->m_customer_id;?>
" />
		  <?php }?>

    <fieldset>
      <legend><?php if ($_smarty_tpl->getVariable('mode')->value=="edit"){?>Edit <?php }else{ ?>Add<?php }?> Customer</legend>
      <ol class="form_class">
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

        <?php if ($_smarty_tpl->getVariable('mode')->value=="edit"){?>
        <li>
          <label for="txt_name">Customer ID</label> <?php echo $_smarty_tpl->getVariable('customer')->value->m_customer_id;?>

        </li>
        <?php }else{ ?>
        <li>
          <label for="txt_name">Customer ID</label>
          <input name="txt_customer_id" id="txt_customer_id" value="<?php echo $_smarty_tpl->getVariable('next_id')->value;?>
" type="text" size="30" />
        </li>
        <?php }?>
        <li>
          <label for="txt_name">First Name</label>
          <input name="txt_f_name" id="txt_f_name" value="<?php echo $_smarty_tpl->getVariable('customer')->value->m_first_name;?>
" type="text" size="30" />
        </li>
        <li>
          <label for="txt_password">Last Name</label>
          <input name="txt_l_name" id="txt_l_name" value="<?php echo $_smarty_tpl->getVariable('customer')->value->m_last_name;?>
" type="text" size="30" />
        </li>
        <li>
          <label for="txt_password">Nick Name</label>
          <input name="txt_nick_name" id="txt_nick_name" value="<?php echo $_smarty_tpl->getVariable('customer')->value->m_nick_name;?>
" type="text" size="30" />
        </li>
        <li>
          <label for="txt_password">NIC Number</label>
          <input name="txt_nic_no" id="txt_nic_no" value="<?php echo $_smarty_tpl->getVariable('customer')->value->m_nic_number;?>
" type="text" size="30" />
        </li>
        <li>
          <label for="txt_password">Contact No.</label>
          <input name="txt_contact_no" id="txt_contact_no" value="<?php echo $_smarty_tpl->getVariable('customer')->value->m_contact_no;?>
" type="text" size="30" />
        </li>
        <li>
          <label for="txt_password">Address</label>
          <input name="txt_address" id="txt_address" value="<?php echo $_smarty_tpl->getVariable('customer')->value->m_address;?>
" type="text" size="30" />
        </li>
        <li>
          <label for="conf_password">Image</label>
          <input name="file_image" id="file_image" type="file" />
        </li>

      </ol>
      <div class="buttons">
        <button type="submit" class="positive"><?php if ($_smarty_tpl->getVariable('mode')->value=="edit"){?>Update<?php }else{ ?>Submit<?php }?></button>
				<?php if ($_smarty_tpl->getVariable('mode')->value=="edit"){?>
        <button type="button" class="positive" onclick="javascript:document.location.href='customer.php?mode=list'">Cancel</button>
				<?php }else{ ?>
        <button type="reset" class="positive">Reset</button>
				<?php }?>
      </div>
    </fieldset>
  </form>
</div>

<?php $_template = new Smarty_Internal_Template('footer.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>