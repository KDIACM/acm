<?php
class CUser {
  // --- ATTRIBUTES ---
  private $db = null;
  public $m_user_id = '';
  public $m_user_name = '';
  public $m_user_password = '';
  public $m_status    = '';

  // user status
  const ACTIVE    = 1;
  const INACTIVE  = 0;
  const DELETED   =-1;

  public function __construct($p_user_id) {
    $this->db = CDBConnection::GetInstance();

    $sql = " SELECT * " .
            " FROM admin_user " .
            " WHERE user_id =" . CUtility::StringEscape($p_user_id);

    $rs = $this->db->Execute($sql) or CUtility::SQLError(__FILE__, __LINE__);

    if (!$rs)throw new CAdException(CAdException::ERROR_MSG_AD_NOT_FOUND);

    $data = $rs->FetchRow();

    $this->m_user_id        = $data['user_id'];
    $this->m_user_name      = $data['user_name'];
    $this->m_user_password  = $data['user_password'];
    $this->m_status         = $data['status'];
  }

  public static function GetValidUser($p_user_name, $p_password) {
    if ($p_user_name == "" || $p_password == "") {
      return false;
    }
    $db = CDBConnection::GetInstance();

    $sql = " SELECT user_id" .
            " FROM admin_user" .
            " WHERE user_name=" . CUtility::StringEscape($p_user_name) . " AND user_password=" . CUtility::StringEscape(md5($p_password));
    $rs = $db->Execute($sql) or CUtility::SQLError(__FILE__, __LINE__);

    $data = $rs->FetchRow();

    if ($data['user_id'] == 0) {
      return false;
    } else {
      $user_obj = new CUser($data['user_id']);
      return $user_obj;
    }
  }

  public function Create($p_arr_data) {
    $db = CDBConnection::GetInstance();

    $sql = " INSERT INTO admin_user (user_name,user_password)" .
            " VALUES (" . CUtility::StringEscape($p_arr_data['user_name']) . "," . CUtility::StringEscape(md5($p_arr_data['user_pwd'])) . ")";

    $rs = $db->Execute($sql) or CUtility::SQLError(__FILE__, __LINE__);

    $user_obj = new CUser($db->Insert_ID());
    return $user_obj;
  }

  public static function IsUserExists($user_name) {
    $db = CDBConnection::GetInstance();

    $sql = " SELECT user_id" .
            " FROM admin_user" .
            " WHERE user_name=" . CUtility::StringEscape($user_name);
    $rs = $db->Execute($sql) or CUtility::SQLError(__FILE__, __LINE__);
    $data = $rs->FetchRow();

    if ($data['user_id'] == 0) {
      return false;
    } else {
      return true;
    }
  }

  public static function GetAll($status = array(self::ACTIVE, self::INACTIVE) ) {
    $arr_user_obj = array();
    $db = CDBConnection::GetInstance();
    $sql = " SELECT user_id " .
           " FROM admin_user ".
           " WHERE status IN ( ".  implode(',', $status). " )";

    $rs = $db->Execute($sql) or CUtility::SQLError(__FILE, __LINE);

    while ($data = $rs->FetchRow()) {
      array_push($arr_user_obj, new CUser($data['user_id']));
    }

    return $arr_user_obj;
  }

  public function Update() {
    $sql = " UPDATE admin_user " .
            " SET user_name=" . CUtility::StringEscape($this->m_user_name) . ", user_password=" . CUtility::StringEscape(md5($this->m_user_password)) . ",status=" . CUtility::StringEscape($this->m_status) .
            " WHERE user_id=" . CUtility::StringEscape($this->m_user_id);

    $rs = $this->db->Execute($sql) or CUtility::SQLError(__FILE__, __LINE__);
  }














  
  
  
}

?>