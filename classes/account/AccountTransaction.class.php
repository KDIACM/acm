<?php
class CAccountTransaction
{
  public $m_transaction_id = null;
  public $m_account_id     = null;
  public $m_amount         = null;
  public $m_owner          = null;
  public $m_updated_date   = null;
  public $m_created_date   = null;

  const TRNS_BY_ME   = 'me';
  const TRNS_BY_CUST = 'customer';

  public function  __construct() {
    
  }

  public static function getObject($p_transaction_id) {
    $db = CDBConnection::GetInstance();
    $sql = " SELECT * " .
            " FROM account_transaction " .
            " WHERE transaction_id =" . CUtility::StringEscape($p_transaction_id);

    $rs = $db->Execute($sql) or CUtility::SQLError(__FILE__, __LINE__);
    if (!$rs)throw new Exception();

    $data = $rs->FetchRow();
    $trans_obj = new CAccountTransaction();
    $trans_obj->m_transaction_id  = $data['transaction_id'];
    $trans_obj->m_account_id      = $data['account_id'];
    $trans_obj->m_amount          = $data['amount'];
    $trans_obj->m_owner           = $data['owner'];
    $trans_obj->m_updated_date    = $data['updated_date'];
    $trans_obj->m_created_date    = $data['created_date'];

    return $trans_obj;
  }

  public static function Create($p_arr_data) {
    $db = CDBConnection::GetInstance();
    $sign = $p_arr_data['owner'] == CAccountTransaction::TRNS_BY_ME? '+' : '-';
    $sql = " INSERT INTO account_transaction ( account_id, amount, owner, updated_date, created_date)" .
            " VALUES (" . CUtility::StringEscape($p_arr_data['account_id']) . ",
                      " . $sign. CUtility::StringEscape($p_arr_data['amount']) . ",
                      " . CUtility::StringEscape($p_arr_data['owner']) . ",
                      " . CUtility::StringEscape(date('Y-m-d H:i:s')) . ",
                      " . CUtility::StringEscape(date('Y-m-d H:i:s')) . ")";

    $rs = $db->Execute($sql) or CUtility::SQLError(__FILE__, __LINE__);
    return $db->Insert_ID();
  }

  public function getAccount()
  {
    return new CAccount($this->m_account_id);
  }

  public static  function GetAll($account_id = null)
  {
    $trns_obj_list = array();
    $where = "";
    if (!is_null($account_id)) {
      $where = " where account_id = ". CUtility::StringEscape($account_id);
    }
    $db = CDBConnection::GetInstance();
    $sql = " SELECT * " .
            " FROM account_transaction " .
            $where .
            " ORDER BY created_date";

    $rs = $db->Execute($sql) or CUtility::SQLError(__FILE, __LINE);

    while ($data = $rs->FetchRow()) {
      $trns_obj = new CAccountTransaction();
      $trns_obj->m_transaction_id = $data['transaction_id'];
      $trns_obj->m_account_id     = $data['account_id'];
      $trns_obj->m_amount         = $data['amount'];
      $trns_obj->m_owner = $data['owner'];
      $trns_obj->m_updated_date = $data['updated_date'];
      $trns_obj->m_created_date = $data['created_date'];
      $trns_obj_list[] = $trns_obj;
    }

    return $trns_obj_list;
  }

  public static function GetAccountBalance($p_account_id) {
    $db = CDBConnection::GetInstance();

    $sql = "SELECT SUM(amount) as balance FROM account_transaction WHERE account_id= ".CUtility::StringEscape($p_account_id);
    $rs  = $db->Execute($sql) or CUtility::SQLError(__FILE, __LINE);
    $data= $rs->FetchRow();
    return $data['balance'];
  }
}
?>
