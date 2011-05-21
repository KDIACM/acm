<?php

class CAccount {

  // --- ATTRIBUTES ---
  private $db = null;
  public $m_account_id = '';
  public $m_customer_id = '';
  public $m_account_number = '';
  public $m_amount = '';
  public $m_rate = '';
  public $m_open_date = '';
  public $m_garentee = '';
  public $m_close_date = '';
  public $m_update_date = '';
  public $m_status = '';
  public $m_sys_date = '';
  public $m_customer_obj = null;

  public function __construct() {
    
  }

  public function Create($p_arr_data) {
    $db = CDBConnection::GetInstance();

    $sql = " INSERT INTO account (customer_id,account_number,amount,garentee,rate,open_date)" .
            " VALUES (" . CUtility::StringEscape($p_arr_data['customer_id']) . ",
                      " . CUtility::StringEscape($p_arr_data['account_number']) . ",
                      " . CUtility::StringEscape($p_arr_data['amount']) . ",
                      " . CUtility::StringEscape($p_arr_data['garentee']) . ",
                      " . CUtility::StringEscape($p_arr_data['rate']) . ",
                      " . CUtility::StringEscape($p_arr_data['open_date']) . ")";


    $rs = $db->Execute($sql) or CUtility::SQLError(__FILE__, __LINE__);
    return $db->Insert_ID();
  }

  public function Update() {
    $this->db = CDBConnection::GetInstance();

    $sql = " UPDATE account SET customer_id = " . CUtility::StringEscape($this->m_customer_id) . ",
				account_number = " . CUtility::StringEscape($this->m_account_number) . ",
				amount = " . CUtility::StringEscape($this->m_amount) . ",
				rate = " . CUtility::StringEscape($this->m_rate) . ",
                                garentee = " . CUtility::StringEscape($this->m_garentee) . ",
				update_date = " . CUtility::StringEscape($this->m_update_date) .
            " WHERE account_id = " . CUtility::StringEscape($this->m_account_id) . " ";

    $rs = $this->db->Execute($sql) or CUtility::SQLError(__FILE__, __LINE__);
  }

  public static function GetAll($relation=false, $status = 'all', $user_id = 0) {
    $arr_account_obj = array();
    $where = '';
    if ($status != 'all') {
      $where = " WHERE status = $status ";
    }
    if (!empty($user_id)) {
      $where .= empty($where) ? " WHERE " : " AND ";
      $where .= " customer_id = " . CUtility::StringEscape($user_id);
    }
    $db = CDBConnection::GetInstance();
    $sql = " SELECT * " .
            " FROM account " .
            $where .
            " ORDER BY sys_date";

    $rs = $db->Execute($sql) or CUtility::SQLError(__FILE, __LINE);

    while ($data = $rs->FetchRow()) {

      $account_obj = new CAccount();
      $account_obj->m_account_id = $data['account_id'];
      $account_obj->m_customer_id = $data['customer_id'];
      $account_obj->m_account_number = $data['account_number'];
      $account_obj->m_amount = $data['amount'];
      $account_obj->m_rate = $data['rate'];
      $account_obj->m_open_date = $data['open_date'];
      $account_obj->m_close_date = $data['close_date'];
      $account_obj->m_status = $data['status'];
      $account_obj->m_sys_date = $data['sys_date'];

      if ($relation == true) {
        $account_obj->m_customer_obj = new CCustomer($data['customer_id']);
      }
      array_push($arr_account_obj, $account_obj);
    }

    return $arr_account_obj;
  }

  public static function getObject($p_account_id) {
    $db = CDBConnection::GetInstance();
    $sql = " SELECT * " .
            " FROM account " .
            " WHERE account_id =" . CUtility::StringEscape($p_account_id);

    $rs = $db->Execute($sql) or CUtility::SQLError(__FILE__, __LINE__);
    if (!$rs

      )throw new Exception();

    $data = $rs->FetchRow();
    $account_obj = new CAccount();
    $account_obj->m_account_id = $data['account_id'];
    $account_obj->m_customer_id = $data['customer_id'];
    $account_obj->m_account_number = $data['account_number'];
    $account_obj->m_amount = $data['amount'];
    $account_obj->m_rate = $data['rate'];
    $account_obj->m_open_date = $data['open_date'];
    $account_obj->m_garentee = $data['garentee'];
    $account_obj->m_close_date = $data['close_date'];
    $account_obj->m_update_date = $data['update_date'];
    $account_obj->m_sys_date = $data['sys_date'];
    $account_obj->m_status = $data['status'];

    return $account_obj;
  }

  public function getCustomer() {
    return new CCustomer($this->m_customer_id);
  }

  public function updateStatus() {

    $this->db = CDBConnection::GetInstance();
    $sql = " UPDATE account SET status = " . CUtility::StringEscape($this->m_status) .
            " WHERE customer_id = " . CUtility::StringEscape($this->m_customer_id) . " AND account_id =" . CUtility::StringEscape($this->m_account_id);

    $rs = $this->db->Execute($sql) or CUtility::SQLError(__FILE__, __LINE__);
  }

}

?>
