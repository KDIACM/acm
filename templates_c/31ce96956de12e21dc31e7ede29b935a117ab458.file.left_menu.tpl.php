<?php /* Smarty version Smarty-3.0.6, created on 2011-05-21 12:39:01
         compiled from "/home/deshapriya/www/acm/tpl/left_menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18945332514dd7650d045601-38405613%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '31ce96956de12e21dc31e7ede29b935a117ab458' => 
    array (
      0 => '/home/deshapriya/www/acm/tpl/left_menu.tpl',
      1 => 1304445180,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18945332514dd7650d045601-38405613',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="navigation_container">
  <div id="navigation_inner_container">
    <div id="navigation_inner">
      <div id="navigation">
        <ul>
          <li><a href="#" onclick="SwitchMenu('sub_user')">Users</a>
            <ul class="submenu" id="sub_user">
              <li><a href="user.php"><img src="images/manage_products.gif" alt="Suppliers" title="Suppliers" />New User</a></li>
              <li><a href="user.php?mode=list"><img src="images/manage_products.gif" alt="Orders" title="Orders" />View Users</a></li>
            </ul>
          </li>
        </ul>
        <ul>
          <li><a class="last" href="#" onclick="SwitchMenu('sub_account')">Account</a>
            <ul class="submenu" id="sub_account">
              <!-- <li><a href="account.php"><img src="images/manage_products.gif" alt="new account" title="new account" />New Account</a></li> -->
              <li><a href="account.php?mode=list"><img src="images/manage_products.gif" alt="view account" title="view account" />View Account</a></li>
            </ul>
          </li>
        </ul>
        <ul>
          <li><a class="last" href="#" onclick="SwitchMenu('sub_customer')">Customers</a>
            <ul class="submenu" id="sub_customer">
              <li><a href="customer.php"><img src="images/manage_products.gif" alt="Suppliers" title="Suppliers" />Add Customer</a></li>
              <li><a href="customer.php?mode=list"><img src="images/manage_products.gif" alt="Orders" title="Orders" />View Customers</a></li>
            </ul>
          </li>
        </ul>
        <ul>
        <li><a class="last" href="#" onclick="SwitchMenu('sub_payment')">Payment</a>
            <ul class="submenu" id="sub_payment">
              <!-- <li><a href="make_payment.php"><img src="images/manage_products.gif" alt="make payment" title="make payment" />Make Payment</a></li> -->
              <li><a href="make_payment.php?mode=list"><img src="images/manage_products.gif" alt="view payment" title="view payment" />View Payment</a></li>
            </ul>
          </li>
        </ul>
        <ul>
          <li><a class="last" href="#" onclick="SwitchMenu('sub_report')">Reports</a>
            <ul class="submenu" id="sub_report">
              <li><a href="advertisement.php?mode=report&amp;type=E"><img src="images/manage_products.gif" alt="Suppliers" title="Suppliers" />View Report</a></li>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div id="slide_menu">
    <a href="#" onclick="swapLayers('slide_menu1'); return false" onmouseover="window.status='Show Intro layer'; return true" onmouseout="window.status=''">Menu</a>
  </div>
</div>