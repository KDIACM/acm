<?php

require_once('config.php');
require_once('check_session.php');
require_once('classes/package.util.php');
require_once('classes/package.log.php');
require_once('classes/package.user.php');
require_once('classes/package.customer.php');
require_once('classes/package.account.php');
require_once('classes/package.ui.php');
require_once('common.php');

$mode = isset($_GET['mode']) ? $_GET['mode'] : '';
$mode = isset($_POST['mode']) ? $_POST['mode'] : $mode;

$t_id = isset($_GET['t_id']) ? $_GET['t_id'] : '';
$t_id = isset($_POST['t_id']) ? $_POST['t_id'] : $t_id;

$u_id = isset($_GET['u_id']) ? $_GET['u_id'] : '';
$u_id = isset($_POST['u_id']) ? $_POST['u_id'] : $u_id;

//Handled the navigation
$navigation_obj->AddNavigation($user_obj);
$navigaton_type = new CNavigation('Customer List', 'customer.php?mode=list');
$navigation_obj->AddNavigation($navigaton_type);

$smarty->assign('mode', $mode);
$smarty->assign('upage', 3);
switch ($mode) {
  case '':
    if ($u_id != '') {
      $navigaton_type = new CNavigation('Add Account');
      $navigation_obj->AddNavigation($navigaton_type);
      $smarty->assign('error', array());
      $smarty->assign('err', (isset($_GET['err']) ? $_GET['err'] : ''));
      $smarty->assign('navigation', $navigation_obj);
      $smarty->assign('customer_obj', new CCustomer($u_id));
      $smarty->display('account_add.html');
    } else {
      $smarty->display('invalid.html');
    }
    break;

  case 'add':
    $arr_data = array();
    $error    = array();

    if (empty ($_POST['u_id'])) $error[] = "Invalid Form Input";
    if (empty ($_POST['account_number'])) $error[] = "Enter Account Number";
    if (empty ($_POST['amount'])) $error[] = "Enter Amount";
    if (empty ($_POST['rate'])) $error[] = "Enter Rate";
    if (empty ($_POST['open_date'])) $error[] = "Enter Open Date";
    
    if (!empty ($error)) {
      $smarty->assign('error', $error);
      CUtility::Redirect('account.php?u_id='.$u_id.'&err=1');
    } else {
      $arr_data['customer_id'] = $_POST['u_id'];
      $arr_data['account_number'] = $_POST['account_number'];
      $arr_data['amount'] = $_POST['amount'];
      $arr_data['rate'] = $_POST['rate'];
      $arr_data['open_date'] = $_POST['open_date'];

      CAccount::Create($arr_data);
      CUtility::Redirect('account.php?mode=list');
    }
    break;

  case 'list':
    $navigaton_type = new CNavigation('View All Account');
    $navigation_obj->AddNavigation($navigaton_type);
    $smarty->assign('navigation', $navigation_obj);
    $smarty->assign('account_list', CAccount::GetAll(true));
    $smarty->display('account_list.html');
    break;
	
	case 'cust_acc_list':
	$customer_id = (!empty($t_id)) ? $t_id : 0;
    $navigaton_type = new CNavigation('View Customer Accounts');
    $navigation_obj->AddNavigation($navigaton_type);
    $smarty->assign('navigation', $navigation_obj);
    $smarty->assign('account_list', CAccount::GetAll(true,'all',$customer_id));
	$smarty->assign('customer_obj', new CCustomer($customer_id));
	$smarty->display('customer_account_list.html');
    break;

  case 'edit':
    $account_id = (!empty($t_id)) ? $t_id : 0;
    $navigaton_type = new CNavigation('Edit Account');
    $account_obj = CAccount::getObject($account_id);
    $navigation_obj->AddNavigation($navigaton_type);
    $smarty->assign('navigation', $navigation_obj);
    $smarty->assign('customer_obj', $account_obj->getCustomer());
    $smarty->assign('account_obj', $account_obj);
    $smarty->display('account_add.html');
    break;

  case 'update':
    $arr_data = array();
    $arr_data['customer_id'] = $_POST['u_id'];
    $arr_data['account_number'] = $_POST['account_number'];
    $arr_data['amount'] = $_POST['amount'];
    $arr_data['rate'] = $_POST['rate'];
    $arr_data['update_date'] = empty($_POST['update_date']) ? date('Y-m-d') : $_POST['update_date'];

    $account_obj = new CAccount();
    $account_id = (!empty($t_id)) ? $t_id : 0;
    $account_obj->Update($account_id, $arr_data);
    CUtility::Redirect('account.php?mode=list');
    break;
	
	case 'change';
		$customer_id = (!empty($t_id)) ? $t_id : 0;
		$account_id = $_GET['ac_id'];
		$account_obj = CAccount::getObject($account_id);
		$account_obj->m_status = ( $account_obj->m_status == INACTIVE ) ? ACTIVE : INACTIVE;
		$account_obj->updateStatus($customer_id,$account_id,$account_obj->m_status);
		CUtility::Redirect('account.php?mode=cust_acc_list&t_id='.$customer_id);
		break;

  case 'view':
    
    $smarty->display('account_add.html');
    break;
  
}
?>
