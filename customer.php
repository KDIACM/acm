<?php
require_once('config.php');
require_once('check_session.php');
require_once('classes/package.util.php');
require_once('classes/package.log.php');
require_once('classes/package.user.php');
require_once('classes/package.customer.php');
require_once('classes/package.ui.php');
require_once('common.php');

$mode = isset($_GET['mode']) ? $_GET['mode'] : '';
$mode = isset($_POST['mode']) ? $_POST['mode'] : $mode;

$t_id = isset($_GET['t_id']) ? $_GET['t_id'] : '';
$t_id = isset($_POST['t_id']) ? $_POST['t_id'] : $t_id;

//Handled the navigation
$navigation_obj->AddNavigation( $user_obj );
$navigaton_type	=	new CNavigation('Customer','customer.php?mode=list');
$navigation_obj->AddNavigation( $navigaton_type );

$smarty->assign('mode', $mode);
$smarty->assign('upage', 2);

switch ($mode) {
  case '':
    $navigaton_type	=	new CNavigation('Add Customer');
    $navigation_obj->AddNavigation( $navigaton_type );
    //$smarty->assign('next_id', CCustomer::GetNextCustomerId());
    $smarty->assign('err', (isset ($_GET['err'])?$_GET['err']:''));
    $smarty->assign('navigation',$navigation_obj);
    $smarty->display('customer_add.html');
    break;

  case 'add':
    $arr_data = array();
    $error    = array();

    if (empty ($_POST['txt_f_name'])) $error[] = "Enter first name";
    if (empty ($_POST['txt_l_name'])) $error[] = "Enter last name";
    if (CCustomer::IdExist($_POST['txt_customer_id'])) $error[] = "Customer ID already exists or Incorrect";

    if (!empty ($error)) {
      //$smarty->assign('next_id', CCustomer::GetNextCustomerId());
      $smarty->assign('error', $error);
      $smarty->display('customer_add.html');
    } else {
      $arr_data['first_name']   = $_POST['txt_f_name'];
      $arr_data['last_name']    = $_POST['txt_l_name'];
      $arr_data['nick_name']    = $_POST['txt_nick_name'];
      $arr_data['nic_number']   = $_POST['txt_nic_no'];
      $arr_data['address']      = $_POST['txt_address'];
      $arr_data['contact_no']   = $_POST['txt_contact_no'];
      $arr_data['image_ext']    = $_POST['file_image'];
						$arr_data['customer_code'] = $_POST['txt_customer_id'];

      // set image extention
      if (is_uploaded_file($_FILES['file_image']['tmp_name'])) {
        $img = $_FILES['file_image']['name'];
        $img_tmp_arr = explode('.', $img);
        $arr_data['image_ext']    = $img_tmp_arr[count($img_tmp_arr)-1];
      }

      $customer = CCustomer::Create($arr_data);

      // upload file
      if (is_uploaded_file($_FILES['file_image']['tmp_name'])) {
        move_uploaded_file($_FILES['file_image']['tmp_name'], UPLOAD_PATH. 'customer_images/'.$customer->m_customer_id.CCustomer::IMG_PERFIX.$arr_data['image_ext']);
      }
      CUtility::Redirect('customer.php?mode=list');
      
    }
    break;

  case 'list':
    $page = isset ($_GET['page'])?$_GET['page']:1;
    $q    = isset ($_GET['q'])?$_GET['q']:'';
    
    $navigaton_type = new CNavigation('View Customers');
    $navigation_obj->AddNavigation($navigaton_type);
    $customer_list = CCustomer::GetAll(array(ACTIVE, INACTIVE), $page-1, ITEMS_PER_PAGE,$q);
    $tot_items = CCustomer::GetAllCount(array(ACTIVE, INACTIVE),$q);
    $tot_page  = $tot_items/ITEMS_PER_PAGE;
    $smarty->assign('page_list', CUtility::buildPages($page, $tot_page));
    $smarty->assign('navigation', $navigation_obj);
    $smarty->assign('customer_list', $customer_list);
    $smarty->assign('q', $q);
    $smarty->assign('action', 'list');
    $smarty->display('customer_list.html');
    break;

  case 'delete':
    $customer = new CCustomer($t_id);
    $customer->m_status = DELETED;
    $customer->Update();
    
    CUtility::Redirect('customer.php?mode=list');
    break;

  case 'status':
    $customer = new CCustomer($t_id);
    $customer->m_status = ( $customer->m_status == INACTIVE ) ? ACTIVE : INACTIVE;
    $customer->Update();

    CUtility::Redirect('customer.php?mode=list');
    break;

  case 'edit':
    $customer = new CCustomer($t_id);
    $navigaton_type = new CNavigation('Edit Customer');
    $navigation_obj->AddNavigation($navigaton_type);
    $smarty->assign('err', '');
    $smarty->assign('customer', $customer);
    $smarty->assign('navigation', $navigation_obj);
    $smarty->display('customer_add.html');
    break;

  case 'update':
    $customer = new CCustomer($t_id);
    $customer->m_first_name = $_POST['txt_f_name'];
    $customer->m_last_name = $_POST['txt_l_name'];
    $customer->m_nick_name = $_POST['txt_nick_name'];
    $customer->m_nic_number = $_POST['txt_nic_no'];
    $customer->m_address = $_POST['txt_address'];
    
    // set image extention and upload file
    if (is_uploaded_file($_FILES['file_image']['tmp_name'])) {
      $img = $_FILES['file_image']['name'];
      $img_tmp_arr = explode('.', $img);
      $arr_data['image_ext']    = $img_tmp_arr[count($img_tmp_arr)-1];
      move_uploaded_file($_FILES['file_image']['tmp_name'], UPLOAD_PATH. 'customer_images/'.$customer->m_customer_id.CCustomer::IMG_PERFIX.$arr_data['image_ext']);
    }

    $customer->Update();
    CUtility::Redirect('customer.php?mode=list');
    break;

case 'view':
    $customer = new CCustomer($t_id);
    $navigaton_type = new CNavigation(ucfirst($customer->m_first_name). ' ' . ucfirst($customer->m_last_name));
    $navigation_obj->AddNavigation($navigaton_type);
    $smarty->assign('customer', $customer);
    
    if (file_exists(UPLOAD_PATH. 'customer_images/'. $customer->m_customer_id.CCustomer::IMG_PERFIX.$customer->m_image_ext)) {
      $smarty->assign('img_path' , UPLOAD_PATH. 'customer_images/'. $customer->m_customer_id.CCustomer::IMG_PERFIX.$customer->m_image_ext);
    }
    
    $smarty->assign('navigation', $navigation_obj);
    $smarty->display('customer_view.html');
    break;

}
?>