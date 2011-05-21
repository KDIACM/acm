<?php /* Smarty version Smarty-3.0.6, created on 2011-05-19 00:09:05
         compiled from "/home/deshapriya/www/acm/tpl/invalid.html" */ ?>
<?php /*%%SmartyHeaderCode:21054734544dd412493d8875-56092183%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bf40ff7f8f7ed26f5fc09328c583ed838c4c4454' => 
    array (
      0 => '/home/deshapriya/www/acm/tpl/invalid.html',
      1 => 1304535038,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21054734544dd412493d8875-56092183',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template('header.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<div class="content_inner">
  <form action="account.php" id="frm_account_add" name="frm_account_add" method="post" >
    <fieldset>
      <legend>Invalid Request</legend>
      <p>This is a invalid URL. Can not proceed. </p>
      <br /><br /><br />
      
      <div class="buttons">
        <button type="button" class="positive" onclick="javascript:document.location.href='index.php'">Go To Main Page</button>
      </div>
    </fieldset>
  </form>
</div>
<?php $_template = new Smarty_Internal_Template('footer.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
