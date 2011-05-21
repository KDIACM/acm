<?php

class CPayment {

    // --- ATTRIBUTES ---
    private $db = null;
    public $m_payment_id = '';
    public $m_account_id = '';
    public $m_payment_amount = '';
    public $m_payment_date = '';
    //public $m_extra_amount = '';
    public $m_status = '';
    public $m_sys_date = '';
    //public $m_paid_date = '';
    //public $m_paid_amount = '';
    public $m_last_month_amount = '';
    public $m_rest_amount = '';
    // public $m_extra_interest = '';
    public $m_account_obj = null;
    public $m_customer_obj = null;
    
  

    public function __construct() {
        
    }

    public static function Create($p_arr_data) {
        $db = CDBConnection::GetInstance();

        $sql = " INSERT INTO payment (account_id,payment_amount,payment_date,last_month_amount,rest_amount)" .
               " VALUES (" . CUtility::StringEscape($p_arr_data['account_id']) . ",
               " . CUtility::StringEscape($p_arr_data['payment_amount']) . ",
               " . CUtility::StringEscape($p_arr_data['payment_date']) . ",
               " . CUtility::StringEscape($p_arr_data['last_month_amount']) . ",
               " . CUtility::StringEscape($p_arr_data['rest_amount']) . ")";
               
        $rs = $db->Execute($sql) or CUtility::SQLError(__FILE__, __LINE__);
        $payment_id = $db->Insert_ID(); 
        
        $sql = " INSERT INTO payment_option (payment_id,paid_amount,paid_date,extra_amount,extra_interest)" .
               " VALUES (" . CUtility::StringEscape($payment_id) . ",
               " . CUtility::StringEscape($p_arr_data['paid_amount']) . ",
               " . CUtility::StringEscape($p_arr_data['paid_date']) . ",
               " . CUtility::StringEscape($p_arr_data['extra_amount']) . ",
               " . CUtility::StringEscape($p_arr_data['extra_interest']) . ")";
        
        $rs = $db->Execute($sql) or CUtility::SQLError(__FILE__, __LINE__);
               
        return $db->Insert_ID();  
    }
 
    public static function GetAll($relation=false) {
        $arr_payment_obj = array();
        $db = CDBConnection::GetInstance();
        $sql = " SELECT P.payment_id, P.account_id, P.payment_amount, P.status, P.sys_date, P.payment_date, AC.customer_id, " .
                " P.last_month_amount, P.rest_amount" .
                " FROM payment P, account AC, customer C" .
                " WHERE P.account_id = AC.account_id AND AC.customer_id = C.customer_id " .
                " ORDER BY P.sys_date";


        $rs = $db->Execute($sql) or CUtility::SQLError(__FILE, __LINE);

        while ($data = $rs->FetchRow()) {

            $payment_obj = new CPayment();
            $payment_obj->m_payment_id = $data['payment_id'];
            $payment_obj->m_account_id = $data['account_id'];
            $payment_obj->m_payment_amount = $data['payment_amount'];
            $payment_obj->m_extra_amount = $data['extra_amount'];
            $payment_obj->m_payment_date = $data['payment_date'];
            $payment_obj->m_paid_date = $data['paid_date'];
            $payment_obj->m_paid_amount = $data['paid_amount'];
            $payment_obj->m_last_month_amount = $data['last_month_amount'];
            $payment_obj->m_rest_amount = $data['rest_amount'];
            $payment_obj->m_extra_interest = $data['extra_interest'];

            $payment_obj->m_status = $data['status'];
            $payment_obj->m_sys_date = $data['sys_date'];

            if ($relation == true) {
                $payment_obj->m_account_obj = CAccount::getObject($data['account_id']);
                $payment_obj->m_customer_obj = new CCustomer($data['customer_id']);
            }

            array_push($arr_payment_obj, $payment_obj);
        }
        return $arr_payment_obj;
    }

    public static function getObject($p_payment_id) {
        $db = CDBConnection::GetInstance();
        $sql = " SELECT * " .
                " FROM payment " .
                " WHERE payment_id =" . CUtility::StringEscape($p_payment_id);

        $rs = $db->Execute($sql) or CUtility::SQLError(__FILE__, __LINE__);
        if (!$rs)
            throw new Exception();

        $data = $rs->FetchRow();
        $payment_obj = new CPayment();
        $payment_obj->m_payment_id = $data['payment_id'];
        $payment_obj->m_account_id = $data['account_id'];
        $payment_obj->m_payment_amount = $data['payment_amount'];
        //$payment_obj->m_extra_amount = $data['extra_amount'];
        $payment_obj->m_payment_date = $data['payment_date'];
        //$payment_obj->m_paid_amount = $data['paid_amount'];
        //$payment_obj->m_paid_date = $data['paid_date'];
        $payment_obj->m_last_month_amount = $data['last_month_amount'];
        $payment_obj->m_rest_amount = $data['rest_amount'];
        //$payment_obj->m_extra_interest = $data['extra_interest'];
        $payment_obj->m_status = $data['status'];
        $payment_obj->m_sys_date = $data['sys_date'];

        return $payment_obj;
    }

    public static function getPaymentByAccountAndCustomer($customer_id, $account_id, $relation=false) {
        $arr_payment_obj = array();
        $db = CDBConnection::GetInstance();

        $sql = " SELECT P.payment_id, P.account_id, P.payment_amount, PO.extra_amount, P.status, P.sys_date, P.payment_date, AC.customer_id, " .
                " PO.paid_date, PO.paid_amount, P.last_month_amount, P.rest_amount, PO.extra_interest " .
                " FROM payment P, account AC, customer C ,payment_option PO" .
                " WHERE P.account_id = AC.account_id AND AC.customer_id = C.customer_id AND P.payment_id = PO.payment_id  AND C.customer_id = " . CUtility::StringEscape($customer_id) . " AND AC.account_id = " . CUtility::StringEscape($account_id) .
                " ORDER BY PO.paid_date ASC";
        
        $rs = $db->Execute($sql) or CUtility::SQLError(__FILE, __LINE);

        while ($data = $rs->FetchRow()) {

            $payment_obj = new CPayment();
            $payment_obj->m_payment_id = $data['payment_id'];
            $payment_obj->m_account_id = $data['account_id'];
            $payment_obj->m_payment_amount = $data['payment_amount'];
            $payment_obj->m_extra_amount = $data['extra_amount'];
            $payment_obj->m_payment_date = $data['payment_date'];
            $payment_obj->m_status = $data['status'];
            $payment_obj->m_paid_date = $data['paid_date'];
            $payment_obj->m_paid_amount = $data['paid_amount'];
            $payment_obj->m_last_month_amount = $data['last_month_amount'];
            $payment_obj->m_rest_amount = $data['rest_amount'];
            $payment_obj->m_extra_interest = $data['extra_interest'];
            $payment_obj->m_sys_date = $data['sys_date'];
            if ($relation == true) {
                $payment_obj->m_account_obj = CAccount::getObject($data['account_id']);
                //$payment_obj->m_customer_obj = new CCustomer($data['customer_id']);
            }

            array_push($arr_payment_obj, $payment_obj);
        }
        return $arr_payment_obj;
    }

    public function setLastMonthAmountAndNextPaymentDate($p_customer_id, $p_account_id) {
        $db = CDBConnection::GetInstance();

        $sql = " SELECT MAX(payment_id) as payment_id" .
                " FROM payment " .
                " WHERE account_id =" . CUtility::StringEscape($p_account_id);

        $rs = $db->Execute($sql) or CUtility::SQLError(__FILE__, __LINE__);
        if (!$rs)
            throw new Exception();
        $data = $rs->FetchRow();
        
        if (!empty ($data['payment_id'])) {
            
            $sql = " SELECT rest_amount , payment_date" .
                    " FROM payment " .
                    " WHERE payment_id =" . CUtility::StringEscape($data['payment_id']) . " AND account_id =" . CUtility::StringEscape($p_account_id);

            $rs = $db->Execute($sql) or CUtility::SQLError(__FILE__, __LINE__);
            if (!$rs)
                throw new Exception();
            $data = $rs->FetchRow();
            
            $this->m_last_month_amount = $data['rest_amount']; 
            $this->m_payment_date = date('Y-m-d' , strtotime("next month", strtotime($data['payment_date'])));
        
        }
        else
        {
            $sql = " SELECT open_date" .
                    " FROM account " .
                    " WHERE account_id =" . CUtility::StringEscape($p_account_id);

            $rs = $db->Execute($sql) or CUtility::SQLError(__FILE__, __LINE__);
            if (!$rs)
                throw new Exception();
            $data = $rs->FetchRow();
            
            $this->m_last_month_amount = 0; 
            $this->m_payment_date = date('Y-m-d' , strtotime("next month", strtotime($data['open_date'])));
        }
         
        
    }

    public function setPaymentAmount($p_account_id) {
        $db = CDBConnection::GetInstance();

        $sql = " SELECT rate ,amount  " .
                " FROM account " .
                " WHERE account_id =" . CUtility::StringEscape($p_account_id);

        $rs = $db->Execute($sql) or CUtility::SQLError(__FILE__, __LINE__);
        if (!$rs)
            throw new Exception();
        $data = $rs->FetchRow();
        $this->m_payment_amount = ($data['rate'] * $data['amount']) / 100;
    }

}

?>
