<?php /* Smarty version Smarty-3.0.6, created on 2011-05-19 21:41:54
         compiled from "/home/deshapriya/www/acm/tpl/user_list.html" */ ?>
<?php /*%%SmartyHeaderCode:7840782094dd5414aeddb15-33737858%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '88f0e013faa57ab6ce053e2cfe3ba837ea3b34e0' => 
    array (
      0 => '/home/deshapriya/www/acm/tpl/user_list.html',
      1 => 1305741005,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7840782094dd5414aeddb15-33737858',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_cycle')) include '/home/deshapriya/www/libs/smarty/libs/plugins/function.cycle.php';
?><?php $_template = new Smarty_Internal_Template('header.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

<div class="content_inner">
  <h2>View Users</h2>
  <table width="100%" cellpadding="0" cellspacing="0" border="0" id="table1" class="tablesorter">
    <caption>

    </caption>
    <thead>
      <tr>
        <th title="Sort by Name" class="tooltip">Username</th>
        <th title="Sort by Name" class="tooltip">View Accounts</th>
        <th>Edit</th>
        <th>Active/Inactive</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      <?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['user_list']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['user_list']['name'] = 'user_list';
$_smarty_tpl->tpl_vars['smarty']->value['section']['user_list']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('user_list')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['user_list']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['user_list']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['user_list']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['user_list']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['user_list']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['user_list']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['user_list']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['user_list']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['user_list']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['user_list']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['user_list']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['user_list']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['user_list']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['user_list']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['user_list']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['user_list']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['user_list']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['user_list']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['user_list']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['user_list']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['user_list']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['user_list']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['user_list']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['user_list']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['user_list']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['user_list']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['user_list']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['user_list']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['user_list']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['user_list']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['user_list']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['user_list']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['user_list']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['user_list']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['user_list']['total']);
?>
      <tr id="<?php echo $_smarty_tpl->getVariable('user_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['user_list']['index']]->m_user_id;?>
" class="<?php echo smarty_function_cycle(array('values'=>'odd_row,even_row'),$_smarty_tpl);?>
">
        <td><?php echo $_smarty_tpl->getVariable('user_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['user_list']['index']]->m_user_name;?>
</td>
        <td><a href="#" title="View Account">View</a></td>
        <td><a href="user.php?mode=edit&amp;t_id=<?php echo $_smarty_tpl->getVariable('user_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['user_list']['index']]->m_user_id;?>
" title="Edit">Edit</a></td>
        <td>
          <a href="user.php?mode=status&amp;t_id=<?php echo $_smarty_tpl->getVariable('user_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['user_list']['index']]->m_user_id;?>
" title="States">
            <?php if ($_smarty_tpl->getVariable('user_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['user_list']['index']]->m_status==$_smarty_tpl->getVariable('active')->value){?> Inactive <?php }else{ ?> Active <?php }?>
          </a>
        </td>
        <td><a href="user.php?mode=delete&amp;t_id=<?php echo $_smarty_tpl->getVariable('user_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['user_list']['index']]->m_user_id;?>
" onclick="return confirm('Are you sure to remove this user?');" class="handle1 delete" title="Delete" id="delete1"><span>Delete</span></a></td>
      </tr>
      <?php endfor; endif; ?>
    </tbody>
  </table>
</div>

<?php $_template = new Smarty_Internal_Template('footer.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>