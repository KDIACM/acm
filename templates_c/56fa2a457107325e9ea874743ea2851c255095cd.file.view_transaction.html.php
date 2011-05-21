<?php /* Smarty version Smarty-3.0.6, created on 2011-05-21 11:58:05
         compiled from "/home/deshapriya/www/acm/tpl/view_transaction.html" */ ?>
<?php /*%%SmartyHeaderCode:5616616684dd75b756230e6-55986596%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '56fa2a457107325e9ea874743ea2851c255095cd' => 
    array (
      0 => '/home/deshapriya/www/acm/tpl/view_transaction.html',
      1 => 1305959283,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5616616684dd75b756230e6-55986596',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_cycle')) include '/home/deshapriya/www/libs/smarty/libs/plugins/function.cycle.php';
if (!is_callable('smarty_modifier_replace')) include '/home/deshapriya/www/libs/smarty/libs/plugins/modifier.replace.php';
?><?php $_template = new Smarty_Internal_Template('header.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

<div class="content_inner">
  <h2>View Transaction for <?php echo $_smarty_tpl->getVariable('account_obj')->value->m_account_number;?>
</h2>
  Current Account Balance : Rs <?php echo $_smarty_tpl->getVariable('account_obj')->value->m_amount;?>

  <table width="100%" cellpadding="0" cellspacing="0" border="0" id="table1" class="tablesorter">
    <thead>
      <tr>
        <th title="Sort by Name">My Transactions</th>
        <th title="Sort by Name">Customer Transactions</th>
      </tr>
    </thead>
    <tbody>

      <tr class="<?php echo smarty_function_cycle(array('values'=>'odd_row,even_row'),$_smarty_tpl);?>
">
        <td>
          <table>
          <tr>
            <td class="underline">Amount (Rs:)</td>
            <td class="underline">Created At</td>
          </tr>
          <?php  $_smarty_tpl->tpl_vars['my'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('my_list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['my']->key => $_smarty_tpl->tpl_vars['my']->value){
?>
          <tr>
            <td style="text-align: right;"><?php echo $_smarty_tpl->getVariable('my')->value->m_amount;?>
</td>
            <td><?php echo $_smarty_tpl->getVariable('my')->value->m_created_date;?>
</td>
          </tr>
          <?php }} else { ?>
          <tr>
            <td colspan="2"><i>No transaction by you</i></td>
          </tr>
          <?php } ?>
          </table>
        </td>
        <td>
          <table>
          <tr>
            <td class="underline">Amount (Rs:)</td>
            <td class="underline">Created At</td>
          </tr>
          <?php  $_smarty_tpl->tpl_vars['cust'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('cust_list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['cust']->key => $_smarty_tpl->tpl_vars['cust']->value){
?>
          <tr>
            <td style="text-align: right;"><?php echo smarty_modifier_replace($_smarty_tpl->getVariable('cust')->value->m_amount,'-','');?>
</td>
            <td><?php echo $_smarty_tpl->getVariable('cust')->value->m_created_date;?>
</td>
          </tr>
          <?php }} else { ?>
          <tr>
            <td colspan="2"><i>No transaction by customer</i></td>
          </tr>
          <?php } ?>
          </table>
        </td>
      </tr>

      <tr>
        <td>&nbsp;</td>
      </tr>

    </tbody>
  </table>
</div>

<?php $_template = new Smarty_Internal_Template('footer.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>