<?php
require_once('config.php');
require_once('check_session.php');
require_once('classes/package.util.php');
require_once('classes/package.log.php');
require_once('classes/package.user.php');
require_once('classes/package.ui.php');
require_once('common.php');

$mode = isset($_GET['mode']) ? $_GET['mode'] : '';
$mode = isset($_POST['mode']) ? $_POST['mode'] : $mode;

$smarty->assign('upage', 0);

switch ($mode) {
  case '':
      
    $navigaton_type	=	new CNavigation('Home');
    $navigation_obj->AddNavigation( $navigaton_type );
    $smarty->assign('navigation',$navigation_obj);
    $smarty->display('welcome.html');
    break;
}
?>