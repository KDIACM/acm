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
$smarty->assign('account_page', 1);
switch ($mode) {
  case '':
    if ($u_id != '') {
      $navigaton_type = new CNavigation('Add Account');
      $navigation_obj->AddNavigation($navigaton_type);
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
    $error = array();

    if (empty($_POST['u_id']))
      $error[] = "Invalid Form Input";
    if (empty($_POST['account_number']))
      $error[] = "Enter Account Number";
    if (empty($_POST['amount']))
      $error[] = "Enter Amount";
    if (empty($_POST['rate']))
      $error[] = "Enter Rate";
    if (empty($_POST['open_date']))
      $error[] = "Enter Open Date";

    if (!empty($error)) {
      $smarty->assign('error', $error);
      CUtility::Redirect('account.php?u_id=' . $u_id . '&err=1');
    } else {
      $arr_data['customer_id'] = $_POST['u_id'];
      $arr_data['account_number'] = $_POST['account_number'];
      $arr_data['amount'] = $_POST['amount'];
      $arr_data['rate'] = $_POST['rate'];
      $arr_data['open_date'] = $_POST['open_date'];
      $arr_data['garentee'] = $_POST['garentee'];

      $account_id = CAccount::Create($arr_data);

      $p_arr_data               = array();
      $p_arr_data['account_id'] = $account_id;
      $p_arr_data['amount']     = $_POST['amount'];
      $p_arr_data['owner']      = CAccountTransaction::TRNS_BY_ME;
      CAccountTransaction::Create($p_arr_data);

      CUtility::Redirect('account.php?mode=cust_acc_list&t_id='.$_POST['u_id']);
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
    $smarty->assign('account_list', CAccount::GetAll(true, 'all', $customer_id));
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
    $account_id = (!empty($t_id)) ? $t_id : 0;
    $account_obj = CAccount::getObject($account_id);
    
    $account_obj->m_customer_id    = $_POST['u_id'];
    $account_obj->m_account_number = $_POST['account_number'];
    $account_obj->m_amount         = $_POST['amount'];
    $account_obj->m_rate           = $_POST['rate'];
    $account_obj->m_update_date    = empty($_POST['update_date']) ? date('Y-m-d') : $_POST['update_date'];
    $account_obj->m_garentee       = !empty($_POST['garentee']) ? $_POST['garentee'] : '';

    $account_obj->Update();
    CUtility::Redirect('account.php?mode=list');
    break;

  case 'change';
    $account_id = $_GET['ac_id'];
    $account_obj = CAccount::getObject($account_id);
    $account_obj->m_status = ( $account_obj->m_status == INACTIVE ) ? ACTIVE : INACTIVE;
    $account_obj->updateStatus();
    CUtility::Redirect('account.php?mode=cust_acc_list&t_id=' . $account_obj->m_customer_id);
    break;

  case 'delete':
    if (is_numeric($t_id)) {
     $account_obj = CAccount::getObject($t_id);
     $account_obj->m_status = DELETED;
     $account_obj->updateStatus();
    }
    CUtility::Redirect('account.php?mode=list');
    break;

  case 'view':
    $smarty->display('account_add.html');
    break;

  case 'new_transaction':
    $smarty->assign('account_page', '');
    $smarty->assign('acc_trns_page', '1');
    if (is_numeric($t_id)) {
     $account_obj = CAccount::getObject($t_id);
     $smarty->assign('by_me', CAccountTransaction::TRNS_BY_ME);
     $smarty->assign('by_cust', CAccountTransaction::TRNS_BY_CUST);
     $smarty->assign('account_obj', $account_obj);
     $smarty->assign('customer_obj', $account_obj->getCustomer());
     $smarty->assign('mode', '');
     $smarty->display('add_transaction.html');
    } else {
      $smarty->display('invalid.html');
    }
    break;

  case 'add_transaction':
    $account_id = $_POST['u_id'];
    $p_arr_data['account_id'] = $account_id;
    $p_arr_data['amount']     = $_POST['amount'];
    $p_arr_data['owner']      = $_POST['owner'];
    CAccountTransaction::Create($p_arr_data);

    $balance = CAccountTransaction::GetAccountBalance($account_id);
    $account_obj = CAccount::getObject($account_id);
    $account_obj->m_amount = $balance;
    $account_obj->Update();
    CUtility::Redirect('account.php?mode=view_transaction&t_id='.$account_obj->m_account_id);
    break;

  case 'view_transaction':
    $trns_arr = array();
    
    $account_obj = CAccount::getObject($t_id);
    $trns = CAccountTransaction::GetAll($t_id);
    foreach ($trns as $k => $v ) {
      $trns_arr[$v->m_owner][] = $v;
    }
    
    $navigaton_type = new CNavigation('View Accounts', 'account.php?mode=cust_acc_list&t_id='.$account_obj->m_customer_id);
    $navigation_obj->AddNavigation($navigaton_type);
    $navigaton_type = new CNavigation('View Transaction');
    $navigation_obj->AddNavigation($navigaton_type);
    $smarty->assign('navigation', $navigation_obj);

    $smarty->assign('cust_list', $trns_arr[CAccountTransaction::TRNS_BY_CUST]);
    $smarty->assign('my_list', $trns_arr[CAccountTransaction::TRNS_BY_ME]);
    $smarty->assign('account_obj', $account_obj);
    $smarty->display('view_transaction.html');
    break;

}
?>
