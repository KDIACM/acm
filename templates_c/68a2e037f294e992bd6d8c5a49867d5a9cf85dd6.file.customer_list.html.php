<?php /* Smarty version Smarty-3.0.6, created on 2011-05-21 17:05:42
         compiled from "D:/project/test_project/acm/tpl\customer_list.html" */ ?>
<?php /*%%SmartyHeaderCode:185264dd7a38eefedd9-50830661%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '68a2e037f294e992bd6d8c5a49867d5a9cf85dd6' => 
    array (
      0 => 'D:/project/test_project/acm/tpl\\customer_list.html',
      1 => 1305740486,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '185264dd7a38eefedd9-50830661',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_cycle')) include 'D:/project/libs/smarty/libs/plugins\function.cycle.php';
?><?php $_template = new Smarty_Internal_Template('header.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

<div class="content_inner">
  <div>
    <form action="" method="get">
      <input type="hidden" value="<?php echo $_smarty_tpl->getVariable('action')->value;?>
" name="mode" />
      <input type="text" name="q" value="<?php echo $_smarty_tpl->getVariable('q')->value;?>
" />
      <input type="submit" value=" Search " /><input type="button" onclick="javascript:window.location='customer.php?mode=list';" value=" Reset " />
    </form>
    <span class="info-text">( search by firstname, lastname, nickname, NIC and user code )</span>
  </div> <br />
  <h2>View customers</h2>
  <table width="100%" cellpadding="0" cellspacing="0" border="0" id="table1" class="tablesorter">
    <caption>

    </caption>
    <thead>
      <tr>
        <th title="Sort by Name" class="tooltip">Customer No</th>
        <th title="Sort by Name" class="tooltip">Name</th>
        <th title="Sort by Real Name" >Nick Name</th>
        <th title="Sort by Email Address">Accounts</th>
        <th>Active/Inactive</th>
        <th>&nbsp;</th>
      </tr>
    </thead>
    <tbody>

      <?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['customer_list']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['customer_list']['name'] = 'customer_list';
$_smarty_tpl->tpl_vars['smarty']->value['section']['customer_list']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('customer_list')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['customer_list']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['customer_list']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['customer_list']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['customer_list']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['customer_list']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['customer_list']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['customer_list']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['customer_list']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['customer_list']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['customer_list']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['customer_list']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['customer_list']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['customer_list']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['customer_list']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['customer_list']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['customer_list']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['customer_list']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['customer_list']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['customer_list']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['customer_list']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['customer_list']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['customer_list']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['customer_list']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['customer_list']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['customer_list']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['customer_list']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['customer_list']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['customer_list']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['customer_list']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['customer_list']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['customer_list']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['customer_list']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['customer_list']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['customer_list']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['customer_list']['total']);
?>
      <tr id="<?php echo $_smarty_tpl->getVariable('customer_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['customer_list']['index']]->m_customer_id;?>
" class="<?php echo smarty_function_cycle(array('values'=>'odd_row,even_row'),$_smarty_tpl);?>
">
        <td><?php echo $_smarty_tpl->getVariable('customer_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['customer_list']['index']]->m_customer_code;?>
</td>
        <td><a href="customer.php?mode=view&amp;t_id=<?php echo $_smarty_tpl->getVariable('customer_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['customer_list']['index']]->m_customer_id;?>
" title="Click to View"><?php echo $_smarty_tpl->getVariable('customer_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['customer_list']['index']]->m_first_name;?>
 <?php echo $_smarty_tpl->getVariable('customer_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['customer_list']['index']]->m_last_name;?>
</a></td>
        <td><?php echo $_smarty_tpl->getVariable('customer_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['customer_list']['index']]->m_nick_name;?>
</td>
        <td class="lft"><a href="account.php?mode=cust_acc_list&t_id=<?php echo $_smarty_tpl->getVariable('customer_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['customer_list']['index']]->m_customer_id;?>
" title="View">View</a> &nbsp;&nbsp;<a href="account.php?u_id=<?php echo $_smarty_tpl->getVariable('customer_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['customer_list']['index']]->m_customer_id;?>
" title="add account">Add</a></td>
        <td>
          <a href="customer.php?mode=status&amp;t_id=<?php echo $_smarty_tpl->getVariable('customer_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['customer_list']['index']]->m_customer_id;?>
" title="States">
            <?php if ($_smarty_tpl->getVariable('customer_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['customer_list']['index']]->m_status==$_smarty_tpl->getVariable('active')->value){?> Inactive <?php }else{ ?> Active <?php }?>
          </a>
        </td>
        <td><a href="customer.php?mode=edit&amp;t_id=<?php echo $_smarty_tpl->getVariable('customer_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['customer_list']['index']]->m_customer_id;?>
" title="Edit">Edit</a></td>
      </tr>
      <?php endfor; endif; ?>

      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>
          <?php $_smarty_tpl->tpl_vars['next_item'] = new Smarty_variable(1, null, null);?>
          <?php  $_smarty_tpl->tpl_vars['page'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('page_list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['page']->key => $_smarty_tpl->tpl_vars['page']->value){
?>
          <?php if ($_smarty_tpl->getVariable('next_item')->value!=$_smarty_tpl->tpl_vars['page']->value){?>....&nbsp;&nbsp;<?php }?>
          <?php if ($_smarty_tpl->getVariable('q')->value){?>
          <a href="/acm/customer.php?mode=list&page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
&q=<?php echo $_smarty_tpl->getVariable('q')->value;?>
"> <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
 </a> &nbsp;&nbsp;
          <?php }else{ ?>
          <a href="/acm/customer.php?mode=list&page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
"> <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
 </a> &nbsp;&nbsp;
          <?php }?>
          <?php $_smarty_tpl->tpl_vars['next_item'] = new Smarty_variable($_smarty_tpl->tpl_vars['page']->value+1, null, null);?>
          <?php }} ?>
        </td>
      </tr>
    </tbody>
  </table>
</div>

<?php $_template = new Smarty_Internal_Template('footer.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>