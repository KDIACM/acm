<?php /* Smarty version Smarty-3.0.6, created on 2011-05-21 11:53:49
         compiled from "/home/deshapriya/www/acm/tpl/account_list.html" */ ?>
<?php /*%%SmartyHeaderCode:13684770914dd75a751a9fb0-00877260%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd3c62cb534da2917ef2dcf6e55f599d023e54565' => 
    array (
      0 => '/home/deshapriya/www/acm/tpl/account_list.html',
      1 => 1305830854,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13684770914dd75a751a9fb0-00877260',
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
        <th title="Sort by Email Address">Status</th>
								<th>&nbsp;</th>
        <th>&nbsp;</th>
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
        <td><a href="customer.php?mode=view&amp;t_id=<?php echo $_smarty_tpl->getVariable('account_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['account_list']['index']]->m_customer_obj->m_customer_id;?>
" title="Click to View"><?php echo $_smarty_tpl->getVariable('account_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['account_list']['index']]->m_customer_obj->m_first_name;?>
 <?php echo $_smarty_tpl->getVariable('account_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['account_list']['index']]->m_customer_obj->m_last_name;?>
</a></td>
        <td>
          <?php if ($_smarty_tpl->getVariable('account_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['account_list']['index']]->m_status==$_smarty_tpl->getVariable('deleted')->value){?><del><?php }?>
            <?php echo $_smarty_tpl->getVariable('account_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['account_list']['index']]->m_account_number;?>

          <?php if ($_smarty_tpl->getVariable('account_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['account_list']['index']]->m_status==$_smarty_tpl->getVariable('deleted')->value){?></del><?php }?>
        </td>
        <td class="lft"><?php if ($_smarty_tpl->getVariable('account_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['account_list']['index']]->m_status=="1"){?> Enable<?php }else{ ?>Disable<?php }?></td>
								<td><a href="account.php?mode=view_pay&amp;t_id=<?php echo $_smarty_tpl->getVariable('account_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['account_list']['index']]->m_account_id;?>
" title="payment">View Payment</a></td>
        <td><a href="account.php?mode=edit&amp;t_id=<?php echo $_smarty_tpl->getVariable('account_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['account_list']['index']]->m_account_id;?>
" title="Edit">Edit Account</a></td>
        <td>
          <a onclick="return confirm('Are you sure to delete this account?');" href="account.php?mode=delete&amp;t_id=<?php echo $_smarty_tpl->getVariable('account_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['account_list']['index']]->m_account_id;?>
" class="handle1 delete" title="Delete" id="delete1">
            <span>Delete</span>
          </a>
        </td>
      </tr>
      <?php endfor; endif; ?>

    </tbody>
  </table>
</div>

<?php $_template = new Smarty_Internal_Template('footer.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>