<?php
error_reporting(E_ALL);
ini_set('display_errors', 'off');

$log_user_id = $_SESSION['admin']['user_id'];

//Assign common user
$user_obj = new CUser($log_user_id);
$smarty->assign('user_obj', $user_obj);

//Intiated navigation obj
$navigation_obj = (class_exists('CHitAdNavigationUI')) ? new CHitAdNavigationUI() : null;

$smarty->assign('active', ACTIVE);
$smarty->assign('inactive', INACTIVE);
$smarty->assign('deleted', DELETED);

?>