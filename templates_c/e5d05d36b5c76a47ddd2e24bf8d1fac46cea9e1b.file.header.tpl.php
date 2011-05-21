<?php /* Smarty version Smarty-3.0.6, created on 2011-05-21 12:39:00
         compiled from "/home/deshapriya/www/acm/tpl/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14705019224dd7650cf016f9-14792899%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e5d05d36b5c76a47ddd2e24bf8d1fac46cea9e1b' => 
    array (
      0 => '/home/deshapriya/www/acm/tpl/header.tpl',
      1 => 1305926588,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14705019224dd7650cf016f9-14792899',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"><!-- InstanceBegin template="/Templates/index.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>ACM Admin</title>
<!-- InstanceEndEditable -->
<script type="text/javascript">
    var GB_ROOT_DIR = "greybox/";
</script>
<script type="text/javascript" src="js/datepicker.js"></script>
<link href="css/datepicker.css" rel="stylesheet" type="text/css" />
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script src="js/jquery.jeditable.js" type="text/javascript"></script>
<script type="text/javascript" src="js/thickbox.js"></script>
<link rel="stylesheet" href="css/thickbox.css" type="text/css" media="screen" />
<script type="text/javascript" src="js/jquery.tablesorter.js"></script>
<script type="text/javascript" src="js/jquery.confirm.js"></script>
<script type="text/javascript" src="js/jquery.bgColor.js"></script>

<script type="text/javascript" src="js/jquery.highlightFade.js"></script>
<script type="text/javascript" src="js/common.js"></script>
<script type="text/javascript" src="greybox/AJS.js"></script>
<script type="text/javascript" src="greybox/AJS_fx.js"></script>
<script type="text/javascript" src="greybox/gb_scripts.js"></script>
<link href="greybox/gb_styles.css" rel="stylesheet" type="text/css" />
<link href="css/jquery.tooltip.css" rel="stylesheet" type="text/css" />
<script src="js/jquery.bgiframe.js" type="text/javascript"></script>
<script src="js/jquery.dimensions.js" type="text/javascript"></script>
<script src="js/chili-1.7.pack.js" type="text/javascript"></script>
<script src="js/jquery.tooltip.js" type="text/javascript"></script>

<script type="text/javascript" src="js/jquery.blockUI.js"></script>
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->



<!-- acm js files -->
<script src="js/jquery.validate.js" type="text/javascript"></script>
<?php if ($_smarty_tpl->getVariable('user_page')->value){?>
<script src="js/acm_user.js" type="text/javascript"></script>
<?php }elseif($_smarty_tpl->getVariable('customer_page')->value){?>
<script src="js/acm_customer.js" type="text/javascript"></script>
<?php }elseif($_smarty_tpl->getVariable('account_page')->value){?>
<script src="js/acm_account.js" type="text/javascript"></script>
<?php }elseif($_smarty_tpl->getVariable('payment_page')->value){?>
<script src="js/acm_payment.js" type="text/javascript"></script>
<?php }elseif($_smarty_tpl->getVariable('acc_trns_page')->value){?>
<script src="js/acm_acc_transaction.js" type="text/javascript"></script>
<?php }?>

</head>

<body>
	<div id="wrapper">
		<div id="branding">
			<h1><a href="#"><span>Morfica UI Framework</span></a></h1>
		</div>
		<div id="welcome">
			<p>Welcome! [<a href="login.php?mode=logout">logout</a>]</p>
		</div>
		<ul id="sub_nav">
			<li><a href="#" onclick="SwitchMenu('sub_user')">Users</a></li>
			<li><a href="#" onclick="SwitchMenu('sub_account')">Account</a></li>
			<li><a href="#" onclick="SwitchMenu('sub_customer')">Customer</a></li>
			<li><a href="#" onclick="SwitchMenu('sub_payment')">Payment</a></li>
            <li><a href="#" onclick="SwitchMenu('sub_report')">Reports</a></li>
		</ul>
		<div id="content_container">
                <?php $_template = new Smarty_Internal_Template("left_menu.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

		<div id="slide_menu1" style="display:none;">
			<a href="#" onclick="swapLayers('navigation_container'); return false">Menu</a>
		</div>
		<div id="content">
		<?php $_template = new Smarty_Internal_Template("navigation.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
		<br />
		<fieldset>