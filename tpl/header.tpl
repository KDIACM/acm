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
{if $user_page}
<script src="js/acm_user.js" type="text/javascript"></script>
{elseif $customer_page}
<script src="js/acm_customer.js" type="text/javascript"></script>
{elseif $account_page}
<script src="js/acm_account.js" type="text/javascript"></script>
{elseif $payment_page}
<script src="js/acm_payment.js" type="text/javascript"></script>
{elseif $acc_trns_page}
<script src="js/acm_acc_transaction.js" type="text/javascript"></script>
{/if}

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
                {include file="left_menu.tpl"}

		<div id="slide_menu1" style="display:none;">
			<a href="#" onclick="swapLayers('navigation_container'); return false">Menu</a>
		</div>
		<div id="content">
		{include file="navigation.tpl"}
		<br />
		<fieldset>