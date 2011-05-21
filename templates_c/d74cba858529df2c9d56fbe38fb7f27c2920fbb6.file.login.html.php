<?php /* Smarty version Smarty-3.0.6, created on 2011-05-18 23:27:09
         compiled from "/home/deshapriya/www/acm/tpl/login.html" */ ?>
<?php /*%%SmartyHeaderCode:11513568024dd408753d9a43-16119228%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd74cba858529df2c9d56fbe38fb7f27c2920fbb6' => 
    array (
      0 => '/home/deshapriya/www/acm/tpl/login.html',
      1 => 1304444780,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11513568024dd408753d9a43-16119228',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ACM Admin</title>
<script type="text/javascript" src="js/datepicker.js"></script>
<link href="css/datepicker.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/tablesort.js"></script>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/common.js"></script>
</head>

<body>
	<div id="wrapper_login">
		<div id="content_container">
		<div id="content">
			<fieldset>
							<div class="content_inner" style="margin-top: 120px;">
					<form action="login.php" id="frm_name" method="post">
					<input type="hidden" name="mode" value="login" />
					<fieldset>
						<legend>Login</legend>
						<ol class="form_class">
							<li>
								<label for="txtUserName">User name</label>
								<input name="txtUserName" id="txtUserName" type="text" size="25" />
							</li>
							<li>
								<label for="txtPassword">Password</label>
								<input name="txtPassword" id="txtPassword" type="password" size="25" />
							</li>
						</ol>
						<div class="buttons login_btn">
							<button type="submit" class="positive">Submit</button>
							<button type="reset" class="positive">Reset</button>
						</div>
					</fieldset>
					</form>
				</div>
			</fieldset>
		</div>
		</div>
	</div>
</body>
</html>
