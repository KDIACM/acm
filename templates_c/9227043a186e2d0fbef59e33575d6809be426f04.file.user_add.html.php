<?php /* Smarty version Smarty-3.0.6, created on 2011-05-19 21:41:38
         compiled from "/home/deshapriya/www/acm/tpl/user_add.html" */ ?>
<?php /*%%SmartyHeaderCode:10155418824dd5413a43fd06-95847217%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9227043a186e2d0fbef59e33575d6809be426f04' => 
    array (
      0 => '/home/deshapriya/www/acm/tpl/user_add.html',
      1 => 1303324122,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10155418824dd5413a43fd06-95847217',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template('header.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

<!-- InstanceBeginEditable name="CONTENT" -->
<div class="content_inner">
  <form action="user.php" id="frm_user_add" name="frm_user_add" method="post">
    <input type="hidden" name="mode" value="<?php if ($_smarty_tpl->getVariable('mode')->value=="edit"){?>update<?php }else{ ?>add<?php }?>" />
		  <?php if ($_smarty_tpl->getVariable('mode')->value=="edit"){?>
           <input type="hidden" name="t_id" value="<?php echo $_smarty_tpl->getVariable('user_obj')->value->m_user_id;?>
" />
		  <?php }?>

    <fieldset>
      <legend><?php if ($_smarty_tpl->getVariable('mode')->value=="edit"){?>Edit <?php }else{ ?>Add<?php }?> User</legend>
      <ol class="form_class">
        <?php if ($_smarty_tpl->getVariable('err')->value==1){?>
        <li class="msg">
          <label class="error">Username already exists</label><br /><br /><br />
        </li>
        <?php }?>
        <li>
          <label for="txt_name">Username</label>
          <?php if ($_smarty_tpl->getVariable('mode')->value=="edit"){?>
          <?php echo $_smarty_tpl->getVariable('user_obj')->value->m_user_name;?>

          <?php }else{ ?>
          <input name="txt_name" id="txt_name" type="text" size="30" />
          <?php }?>
        </li>
        <li>
          <label for="txt_password">Password</label>
          <input name="txt_password" id="txt_password" type="password" size="30" />
        </li>
        <li>
          <label for="conf_password">Confirm Password</label>
          <input name="conf_password" id="conf_password" type="password" size="30" />
        </li>

      </ol>
      <div class="buttons">
        <button type="submit" class="positive"><?php if ($_smarty_tpl->getVariable('mode')->value=="edit"){?>Update<?php }else{ ?>Submit<?php }?></button>
				<?php if ($_smarty_tpl->getVariable('mode')->value=="edit"){?>
        <button type="button" class="positive" onclick="javascript:document.location.href='user.php?mode=list'">Cancel</button>
				<?php }else{ ?>
        <button type="reset" class="positive">Reset</button>
				<?php }?>
      </div>
    </fieldset>
  </form>
</div>

<?php $_template = new Smarty_Internal_Template('footer.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>