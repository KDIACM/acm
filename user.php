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

$t_id = isset($_GET['t_id']) ? $_GET['t_id'] : '';
$t_id = isset($_POST['t_id']) ? $_POST['t_id'] : $t_id;

//Handled the navigation
$navigation_obj->AddNavigation( $user_obj );
$navigaton_type	=	new CNavigation('Users','user.php?mode=list');
$navigation_obj->AddNavigation( $navigaton_type );

$smarty->assign('mode', $mode);
$smarty->assign('upage', 1);

switch ($mode) {
  case '':
    $navigaton_type	=	new CNavigation('New User');
    $navigation_obj->AddNavigation( $navigaton_type );
    $smarty->assign('err', (isset ($_GET['err'])?$_GET['err']:''));
    $smarty->assign('navigation',$navigation_obj);
    $smarty->display('user_add.html');
    break;

  case 'add':
    $arr_data = array();
    // check for existing users
    if (CUser::IsUserExists($_POST['txt_name'])) {
      CUtility::Redirect('user.php?err=1');
      break;
    }
    $arr_data['user_name'] = $_POST['txt_name'];
    $arr_data['user_pwd'] = $_POST['txt_password'];
    
    CUser::Create($arr_data);
    CUtility::Redirect('user.php?mode=list');

    break;

  case 'list':
    $navigaton_type = new CNavigation('View Users');
    $navigation_obj->AddNavigation($navigaton_type);

    $smarty->assign('active', CUser::ACTIVE);
    $smarty->assign('navigation', $navigation_obj);
    $smarty->assign('user_list', CUser::GetAll());
    $smarty->display('user_list.html');
    break;

  case 'delete':
    $user_obj = new CUser($t_id);
    $user_obj->m_status = CUser::DELETED;
    $user_obj->Update();

    CUtility::Redirect('user.php?mode=list');
    break;

  case 'status':
    $user_obj = new CUser($t_id);
    $user_obj->m_status = ( $user_obj->m_status == CUser::INACTIVE ) ? CUser::ACTIVE : CUser::INACTIVE;
    $user_obj->Update();

    CUtility::Redirect('user.php?mode=list');
    break;

  case 'edit':
    $user_obj = new CUser($t_id);
    $navigaton_type = new CNavigation('Edit User');
    $navigation_obj->AddNavigation($navigaton_type);
    $smarty->assign('err', '');
    $smarty->assign('user_obj', $user_obj);
    $smarty->assign('navigation', $navigation_obj);
    $smarty->display('user_add.html');
    break;

  case 'update':
    $user_obj = new CUser($t_id);
    $user_obj->m_user_real_name = $_POST['txt_real_name'];
    $user_obj->m_user_password = $_POST['txt_password'];
    $user_obj->m_user_email = $_POST['txt_mail'];

    $user_obj->Update();
    CUtility::Redirect('user.php?mode=list');
    break;

  

  
}
?>