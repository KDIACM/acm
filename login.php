<?php
require_once('config.php');
require_once('classes/package.util.php');
require_once('classes/package.log.php');
require_once('classes/package.user.php');

// pass to user home, if session exists
if (!empty($_SESSION['admin']['user_id'])) {
  header('Location:index.php');
}

$mode = isset($_GET['mode']) ? $_GET['mode'] : '';
$mode = isset($_POST['mode']) ? $_POST['mode'] : $mode;

$smarty->assign('mode', $mode);

switch ($mode) {

  case '':
    $smarty->display('login.html');
    break;

  case 'login':
    $user_name = $_POST['txtUserName'];
    $user_password = $_POST['txtPassword'];

    $user_obj = CUser::GetValidUser($user_name, $user_password);

    if ($user_obj instanceof CUser) {
      if (empty($user_obj->m_user_name) || empty($user_obj->m_user_password)) {
        CUtility::Redirect('login.php');
        exit();
      } else {
        $_SESSION['admin']['user_id'] = $user_obj->m_user_id;
      }
      $redirect_page = isset($_SESSION['requested_url']) ? $_SESSION['requested_url'] : 'index.php';
      CUtility::Redirect($redirect_page);
    } else {
      $smarty->display('login.html');
    }
    break;

  case 'logout':
    unset($_SESSION['admin']['user_id']);
    CUtility::Redirect('login.php');
    break;
  
}
?>