<?php
class CCustomer {
  // --- ATTRIBUTES ---
  private $db           = null;
  public $m_customer_id = '';
  public $m_first_name  = '';
  public $m_last_name   = '';
  public $m_nick_name   = '';
  public $m_address     = '';
  public $m_contact_no  = '';
  public $m_image_ext   = '';
  public $m_status      = '';
		public $m_customer_code = '';

  const IMG_PERFIX      = '_profile.';
  const IMG_TEMP_PERFIX = '_temp.';

  public function __construct($p_customer_id) {
    $this->db = CDBConnection::GetInstance();

    $sql = " SELECT * " .
            " FROM customer " .
            " WHERE customer_id =" . CUtility::StringEscape($p_customer_id);

    $rs = $this->db->Execute($sql) or CUtility::SQLError(__FILE__, __LINE__);

    if (!$rs)throw new CAdException(CAdException::ERROR_MSG_AD_NOT_FOUND);

    $data = $rs->FetchRow();

    $this->m_customer_id    = $data['customer_id'];
    $this->m_first_name     = $data['first_name'];
    $this->m_last_name      = $data['last_name'];
    $this->m_nick_name      = $data['nick_name'];
    $this->m_nic_number     = $data['nic_number'];
    $this->m_address        = $data['address'];
    $this->m_contact_no     = $data['contact_no'];
    $this->m_image_ext      = $data['image_ext'];
    $this->m_status         = $data['status'];
				$this->m_customer_code  = $data['customer_code'];

  }

  public function Create($p_arr_data) {
    $db = CDBConnection::GetInstance();

    $sql = " INSERT INTO customer (first_name,last_name,nick_name,nic_number,address,contact_no,image_ext,customer_code)" .
            " VALUES (" . CUtility::StringEscape($p_arr_data['first_name']) . ",
                      " . CUtility::StringEscape($p_arr_data['last_name']) . ",
                      " . CUtility::StringEscape($p_arr_data['nick_name']) . ",
                      " . CUtility::StringEscape($p_arr_data['nic_number']) . ",
                      " . CUtility::StringEscape($p_arr_data['address']) . ",
                      " . CUtility::StringEscape($p_arr_data['contact_no']) . ",
                      " . CUtility::StringEscape($p_arr_data['image_ext']) .",
																						" . CUtility::StringEscape($p_arr_data['customer_code']) .")";


    $rs = $db->Execute($sql) or CUtility::SQLError(__FILE__, __LINE__);

    $customer_obj = new CCustomer($db->Insert_ID());
    return $customer_obj;
  }

  public static function GetAll($status = array(ACTIVE, INACTIVE), $start = 0, $limit = 0 , $search_text = "")
  {
    $arr_customer_obj = array();
    $db   = CDBConnection::GetInstance();
    $sql  = " SELECT customer_id " .
            " FROM customer ".
            " WHERE status IN ( ".  implode(',', $status). " )";
    if (!empty ($search_text)) {
      $sql .= " AND (customer_code = ".CUtility::StringEscape($search_text)."
                OR first_name LIKE '%".CUtility::SqlSafe($search_text)."%'
                OR last_name LIKE '%".CUtility::SqlSafe($search_text)."%'
                OR nick_name LIKE '%".CUtility::SqlSafe($search_text)."%'
                OR nic_number = ".CUtility::StringEscape($search_text).")";
    }
    if (!empty ($start)) {
      $sql .= " LIMIT $start, $limit";
    }
    $rs   = $db->Execute($sql) or CUtility::SQLError(__FILE, __LINE);

    while ($data = $rs->FetchRow()) {
      array_push($arr_customer_obj, new CCustomer($data['customer_id']));
    }

    return $arr_customer_obj;
  }

  public static function GetAllCount($status = array(ACTIVE, INACTIVE), $search_text = "")
  {
    $arr_customer_obj = array();
    $db   = CDBConnection::GetInstance();
    $sql  = " SELECT customer_id " .
            " FROM customer ".
            " WHERE status IN ( ".  implode(',', $status). " )";
    if (!empty ($search_text)) {
      $sql .= " AND (customer_code = '%".CUtility::SqlSafe($search_text)."%'
                OR first_name = '%".CUtility::SqlSafe($search_text)."%'
                OR last_name = '%".CUtility::SqlSafe($search_text)."%'
                OR nick_name = '%".CUtility::SqlSafe($search_text)."%'
                OR nic_number = '%".CUtility::SqlSafe($search_text)."%')";
    }
    if (!empty ($start)) {
      $sql .= " LIMIT $start, $limit";
    }
    $rs   = $db->Execute($sql) or CUtility::SQLError(__FILE, __LINE);

    return $rs->RecordCount();
  }

  public function Update()
  {
    $sql = "UPDATE customer SET first_name=" . CUtility::StringEscape($this->m_first_name) . ",
                                last_name=" . CUtility::StringEscape($this->m_last_name) . ",
                                nick_name=" . CUtility::StringEscape($this->m_nick_name) . ",
                                nic_number=" . CUtility::StringEscape($this->m_nic_number) . ",
                                address=" . CUtility::StringEscape($this->m_address).",
                                contact_no=" . CUtility::StringEscape($this->m_contact_no).",
                                status=" . CUtility::StringEscape($this->m_status) . "
                                WHERE customer_id =". CUtility::StringEscape($this->m_customer_id );
    
    $res = $this->db->Execute($sql) or CUtility::SQLError(__FILE__, __LINE__);
  }

  public static function IdExist($id) {
    $db   = CDBConnection::GetInstance();
    
    $sql = "SELECT customer_id FROM customer WHERE customer_code = ".CUtility::StringEscape($id);
    $rs  = $db->Execute($sql) or CUtility::SQLError(__FILE, __LINE);
    $cunt= $rs->RecordCount();
    if (!empty ($cunt)) {
      return true;
    }
    return false;
  }

  public static function GetNextCustomerId() {
    $db   = CDBConnection::GetInstance();

    $sql = "SELECT max(customer_id) as next_id FROM customer";
    $rs  = $db->Execute($sql) or CUtility::SQLError(__FILE, __LINE);
    $data = $rs->FetchRow();
    return $data['next_id'];
  }


}

?>