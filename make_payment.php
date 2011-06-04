<?php
require_once('config.php');
require_once('check_session.php');
require_once('classes/package.util.php');
require_once('classes/package.log.php');
require_once('classes/package.user.php');
require_once('classes/package.customer.php');
require_once('classes/package.account.php');
require_once('classes/package.payment.php');
require_once('classes/package.ui.php');
require_once('common.php');

$mode = isset($_GET['mode']) ? $_GET['mode'] : '';
$mode = isset($_POST['mode']) ? $_POST['mode'] : $mode;

$t_id = isset($_GET['t_id']) ? $_GET['t_id'] : '';
$t_id = isset($_POST['t_id']) ? $_POST['t_id'] : $t_id;

//Handled the navigation
$navigation_obj->AddNavigation( $user_obj );
$navigaton_type	= new CNavigation('Payment','make_payment.php?mode=list');
$navigation_obj->AddNavigation( $navigaton_type );

$smarty->assign('mode', $mode);
$smarty->assign('upage', 4);

switch ($mode) {

  case '':

    $navigaton_type	=	new CNavigation('Make Payment');
    $navigation_obj->AddNavigation( $navigaton_type );
    $smarty->assign('err', (isset ($_GET['err'])?$_GET['err']:''));
    $smarty->assign('navigation',$navigation_obj);
    $smarty->assign('account_obj_arr',CAccount::GetAll(false,ACTIVE));
    $smarty->display('make_payment.html');
    break;

    case 'add_pay':

    $account_id = (!empty ($t_id)) ? $t_id : 0;
    $account_obj = CAccount::getObject($account_id);
    $customer_obj = $account_obj->getCustomer();

    $navigaton_type	=	new CNavigation('Make Payment');
    $navigation_obj->AddNavigation( $navigaton_type );
    $smarty->assign('err', (isset ($_GET['err'])?$_GET['err']:''));
    $smarty->assign('navigation' , $navigation_obj);
    $smarty->assign('account_obj' , $account_obj);
    $smarty->assign('customer_obj', $customer_obj);

    $payment_obj = new CPayment();
    $payment_obj->setLastMonthAmountAndNextPaymentDate($customer_obj->m_customer_id,$account_obj->m_account_id);
    $payment_obj->setPaymentAmount($account_obj->m_account_id);

    $smarty->assign('payment_obj', $payment_obj);
    $smarty->display('make_payment.html');
    break;

  case 'add':
						
    $arr_data = array();
    $account_id = $_POST['account_id'];
    $customer_id = $_POST['c_id'];
    $arr_data['account_id']   = $account_id;
    $arr_data['payment_amount']  = $_POST['payment_amount'];
    $arr_data['extra_amount']    = $_POST['extra_amount'];
    $arr_data['payment_date']   = $_POST['payment_date'];
    $arr_data['paid_amount']   = $_POST['paid_amount'];
    $arr_data['paid_date']   = $_POST['paid_date'];
    $arr_data['last_month_amount']   = $_POST['last_month_amount'];
    $arr_data['rest_amount']   = (($_POST['payment_amount']+$_POST['last_month_amount']+$_POST['extra_amount']+$_POST['extra_interest']) - ($_POST['paid_amount']) );
    $arr_data['extra_interest']   = $_POST['extra_interest'];

    CPayment::Create($arr_data);
    CUtility::Redirect("make_payment.php?mode=view_cust_pay&t_id=$account_id&c_id=$customer_id");

    break;

  case 'list':
    $navigaton_type = new CNavigation('View All Payment');
    $navigation_obj->AddNavigation($navigaton_type);
    $smarty->assign('navigation', $navigation_obj);
    $smarty->assign('payment_list', CPayment::GetAll(true));
    $smarty->display('payment_list.html');
    break;

case 'edit':

    $payment_id = (!empty ($t_id)) ? $t_id : 0 ;
    $account_id = $_GET['ac_id'] ;
    $account_obj = CAccount::getObject($account_id);
    $customer_obj = $account_obj->getCustomer();
    $navigaton_type	=	new CNavigation('Edit Payment');
    $navigation_obj->AddNavigation( $navigaton_type );
    $smarty->assign('navigation',$navigation_obj);
    $smarty->assign('account_obj_arr', CAccount::GetAll(false,ACTIVE));
    $smarty->assign('payment_obj', CPayment::getObject($payment_id));
    $smarty->assign('account_obj' , $account_obj);
    $smarty->assign('customer_obj', $customer_obj);
    $smarty->display('make_payment.html');

    break;
				
case 'view_cust_pay';

    $customer_id = isset($_GET['c_id'])? $_GET['c_id'] : 0;
    $account_id = (!empty ($t_id)) ? $t_id : 0 ;
    $navigaton_type = new CNavigation('View All Payment');
    $navigation_obj->AddNavigation($navigaton_type);
    $payment_list = array();
    $payment_list_temp = array();
    $payment_list_temp = CPayment::getPaymentByAccountAndCustomer($customer_id,$account_id);
    $account_obj = CAccount::getObject($account_id);

    //$payment_amount = $account_obj->m_amount;
    //echo '<pre>'; print_r($payment_list_temp);
    $data_arr = array();
    $inc = 0;
    
    $last_index = "";  
    $rest_amount = 0;
    
    foreach ($payment_list_temp as $payment)
    {
      $payment_amount =   $payment->m_payment_amount;
      list($y, $m , $d) = explode('-' , $payment->m_paid_date);    
      $index = $y.'-'.$m;
      if ($last_index != $index) {
        $data_arr[$inc]['payment_amount'] = $payment_amount;
        $data_arr[$inc]['payment_date']   = $payment->m_payment_date;
        $data_arr[$inc]['action']         = 1;
        $data_arr[$inc]['last_month_amount']    = $payment->m_last_month_amount;
        $last_index = $index;
        $rest_amount = $payment_amount + $payment->m_last_month_amount;
      } else {
        $data_arr[$inc]['last_month_amount'] = '';  
        $data_arr[$inc]['payment_amount'] = '';
        $data_arr[$inc]['payment_date']   = '';
        $data_arr[$inc]['action']         = 0;
      }
      
      $rest_amount = $rest_amount+$payment->m_extra_amount+$payment->m_extra_interest-$payment->m_paid_amount;
      $data_arr[$inc]['payment_id']     = $payment->m_payment_id;
      $data_arr[$inc]['account_id']     = $account_id;
      $data_arr[$inc]['extra_amount']   = $payment->m_extra_amount;
      $data_arr[$inc]['paid_date']      = $payment->m_paid_date;
      $data_arr[$inc]['paid_amount']    = $payment->m_paid_amount;
      $data_arr[$inc]['rest_amount']    = $rest_amount;
      $data_arr[$inc]['extra_interest']   = $payment->m_extra_interest;
      $inc++;
    }
    
    //echo '<pre>';
    //print_r($data_arr);
    //die();
    $smarty->assign('data_arr', $data_arr);
    $smarty->assign('navigation', $navigation_obj);
    $smarty->assign('payment_list',$payment_list_temp );
    $smarty->assign('customer_obj', new CCustomer($customer_id));
    $smarty->assign('account_obj', CAccount::getObject($account_id));
    $smarty->display('make_cust_payment_list.html');

break;

case 'add_ex_pay':

    $payment_id = (!empty ($t_id)) ? $t_id : 0 ;
    $account_id = $_GET['ac_id'] ;
    $account_obj = CAccount::getObject($account_id);
    $customer_obj = $account_obj->getCustomer();
    $navigaton_type	=	new CNavigation('Add Sub Payment');
    $navigation_obj->AddNavigation( $navigaton_type );
    $smarty->assign('navigation',$navigation_obj);
    $smarty->assign('account_obj_arr', CAccount::GetAll(false,ACTIVE));
    $smarty->assign('payment_obj', CPayment::getObject($payment_id));
    $smarty->assign('account_obj' , $account_obj);
    $smarty->assign('customer_obj', $customer_obj);
    $smarty->display('make_sub_payment.html');

    break;

case 'add_sub':
    
    $arr_data = array();
    $account_id = $_POST['account_id'];
    $customer_id = $_POST['c_id'];
    $payment_id = $_POST['payment_id'];
    $rest_amount = $_POST['rest_amount'];
    $arr_data['account_id']   = $account_id;
    $arr_data['payment_id']   = $payment_id;
    $arr_data['extra_amount'] = $_POST['extra_amount'];
    $arr_data['paid_amount']  = $_POST['paid_amount'];
    $arr_data['paid_date']   = $_POST['paid_date'];
    $arr_data['rest_amount']   = (($rest_amount+$_POST['extra_amount']+$_POST['extra_interest']) - ($_POST['paid_amount']) );
    $arr_data['extra_interest']   = $_POST['extra_interest'];

    CSubPayment::Create($arr_data);
    CUtility::Redirect("make_payment.php?mode=view_cust_pay&t_id=$account_id&c_id=$customer_id");
    break;

}

?>
