<?php

class CSubPayment {

    // --- ATTRIBUTES ---
    private $db = null;
    public $m_payment_option_id = '';
    public $m_payment_id = '';
    public $m_extra_amount = '';
    public $m_sys_date = '';
    public $m_paid_date = '';
    public $m_paid_amount = '';
    public $m_extra_interest = '';
    
    public function __construct($p_payment_id) {
      /*$db   = CDBConnection::GetInstance();
      $sql  = " SELECT * FROM payment_option WHERE payment_option_id = ".CUtility::StringEscape($p_payment_id);
      $rs   = $db->Execute($sql) or CUtility::SQLError(__FILE__, __LINE__);
      $data = $rs->FetchRow();

      $this->m_payment_option_id = $data['payment_option_id'];
      $this->m_payment_id = $data['payment_id'];
      $this->m_extra_amount = $data['extra_amount'];
      $this->m_paid_amount = $data['paid_amount'];
      $this->m_paid_date = $data['paid_date'];
      $this->m_extra_interest = $data['extra_interest'];*/
    }

    public static function Create($p_arr_data) {
        $db = CDBConnection::GetInstance();
        
        $sql = " INSERT INTO payment_option (payment_id,paid_amount,paid_date,extra_amount,extra_interest)" .
               " VALUES (" . CUtility::StringEscape($p_arr_data['payment_id']) . ",
               " . CUtility::StringEscape($p_arr_data['paid_amount']) . ",
               " . CUtility::StringEscape($p_arr_data['paid_date']) . ",
               " . CUtility::StringEscape($p_arr_data['extra_amount']) . ",
               " . CUtility::StringEscape($p_arr_data['extra_interest']) . ")";
        
        $rs = $db->Execute($sql) or CUtility::SQLError(__FILE__, __LINE__);
        $payment_option_id = $db->Insert_ID();
        
        $sql = "UPDATE payment SET rest_amount=" . CUtility::StringEscape($p_arr_data['rest_amount']) . "
                WHERE payment_id =". CUtility::StringEscape($p_arr_data['payment_id']);
    
       $res = $db->Execute($sql) or CUtility::SQLError(__FILE__, __LINE__);
       
           
    }
 
    
    public static function getObject($p_payment_option_id) {
        $db = CDBConnection::GetInstance();
        $sql = " SELECT * " .
                " FROM payment_option " .
                " WHERE payment_id =" . CUtility::StringEscape($p_payment_option_id);
echo $sql;
        $rs = $db->Execute($sql) or CUtility::SQLError(__FILE__, __LINE__);
        if (!$rs)
            throw new Exception();

        $data = $rs->FetchRow();
        $payment_obj = new CPayment();
        $payment_obj->m_payment_id = $data['payment_id'];
        $payment_obj->m_account_id = $data['account_id'];
        $payment_obj->m_payment_amount = $data['payment_amount'];
        $payment_obj->m_extra_amount = $data['extra_amount'];
        $payment_obj->m_payment_date = $data['payment_date'];
        $payment_obj->m_paid_amount = $data['paid_amount'];
        $payment_obj->m_paid_date = $data['paid_date'];
        $payment_obj->m_last_month_amount = $data['last_month_amount'];
        $payment_obj->m_rest_amount = $data['rest_amount'];
        $payment_obj->m_extra_interest = $data['extra_interest'];
        $payment_obj->m_status = $data['status'];
        $payment_obj->m_sys_date = $data['sys_date'];

        return $payment_obj;
    }

    public function Update($rest_amount) {
      $sql = " UPDATE payment_option SET
                   paid_amount=" . CUtility::StringEscape($this->m_paid_amount) . ",
                   paid_date=" . CUtility::StringEscape($this->m_paid_date) . ",
                   extra_amount=" . CUtility::StringEscape($this->m_extra_amount) . ",
                   extra_interest=" . CUtility::StringEscape($this->m_extra_interest);

      $rs = $db->Execute($sql) or CUtility::SQLError(__FILE__, __LINE__);
      $payment_option_id = $db->Insert_ID();
      
      $sql = "UPDATE payment SET rest_amount=" . CUtility::StringEscape($rest_amount) . "
                WHERE payment_id =". CUtility::StringEscape($this->m_payment_id);

      $res = $db->Execute($sql) or CUtility::SQLError(__FILE__, __LINE__);
    }

    
}

?>
