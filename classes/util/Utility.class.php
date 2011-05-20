<?php

/**
 * Short description of class CUtility
 *
 * @access public
 * @date June 29 ,2006
 * @package vma.util
 * @version 1.0.0
 * @author Kasun Thilina, <kasun_uoc@yahoo.com>
 */
class CUtility {

  /**
   * CUtility constructor
   *
   * @access public
   */
  function CUtility() {

  }

  /**
   * Print SQL Error
   *
   * @access public
   * @param SQL statement
   * @param Error message
   */
  /* function SQLError( $p_sql = '', $p_errormsg='')
    {
    $adodb = CDBConnection::GetInstance();

    if ( $adodb->ErrorNo() != 0 )
    {
    $backtrace = self::GetBackTrace();

    if( isset($_SERVER['SERVER_NAME']) && $_SERVER['SERVER_NAME'] != "127.0.0.1" ) //we're in remote.. email the error
    {
    $to      = SYS_ENGINEER_1;
    $subject = 'ERP: SQL ERROR';
    $message = 'SQL Statement: '.$p_sql."\n\n Error:".$p_errormsg;
    $message .= "\n\n Backtrace dump follows: \n\n $backtrace";
    $headers = 'From: errorhandler@intelliware.com';
    mail($to, $subject, $message, $headers);
    }

    //echo str_replace("\n\n", "<br>", $backtrace);

    die("Error in SQL Statement: ". $p_sql."<br>".$p_errormsg);
    exit();
    }
    } */

  public static function buildPages($current_page, $total_pages) {
    $pages = array();

    # When the total is <= 11, it's a special case and we show 'em all
    if ($total_pages <= 11) {
      for ($i = 1; $i <= $total_pages; $i++) {
        $pages[] = $i;
      }

      return $pages;
    }

    # Let's figure out how wide to spread on each side of current_page
    if ($total_pages < 100) {
      $spread = 3;
    } else if ($total_pages < 1000) {
      $spread = 2;
    } else {
      $spread = 1;
    }

    $spread_left = $spread;
    $spread_right = $spread;

    # The first and last are always there
    $pages[] = 1;
    $pages[] = $total_pages;

    # First handle the left spread
    $left = ($current_page - 1);
    while (($spread_left > 0) && ($left > 1)) {
      $pages[] = $left--;
      $spread_left--;
    }
    $left++;

    # This will put any leftover on the right
    if ($spread_left > 0) {
      $spread_right += $spread_left;
    }

    # Now handle the right spread
    $right = ($current_page + 1);

    while (($spread_right > 0) && ($right < $total_pages)) {
      $pages[] = $right++;
      $spread_right--;
    }
    $right--;

    # This will put any leftover back on the left
    while ($spread_right > 0) {
      $pages[] = --$left;
      $spread_right--;
    }

    # If we're at first or last, then current_page will already be there, so work around it
    if ($current_page == 1) {
      $pages[] = ++$right;
    } else if ($current_page == $total_pages) {
      $pages[] = --$left;
    } else {
      $pages[] = $current_page;
    }

    # Add in our halfway back
    $halfway_back = (int) floor(($left + 1) / 2);
    if ((!(in_array($halfway_back, $pages))) && ($halfway_back > 1)) {
      $pages[] = $halfway_back;
    } else if ($left > 2) {
      # We covered it on the left, but still have room
      $pages[] = --$left;
    } else {
      # Left is full - add it to the right
      $pages[] = ++$right;
    }

    # And now throw in our halfway forward
    $halfway_forward = (int) floor(($right + $total_pages) / 2);
    if ((!(in_array($halfway_forward, $pages))) && ($halfway_forward < $total_pages)) {
      $pages[] = $halfway_forward;
    } else if ($right < ($total_pages - 1)) {
      # We covered it on the right, but still have room
      $pages[] = ++$right;
    } else {
      # Right is full - add it to the left
      $pages[] = --$left;
    }

    # We're finally done.  Sort our list of pages and go home.
    sort($pages);
    return $pages;
  }

  public static function SQLError($file_name = __FILE__, $line_no = __LINE__) {
    global $adodb;


    $adodb = CDBConnection::GetInstance();

    if ($adodb->ErrorNo() == '1044') {
      $adodb->RollbackTrans();
      CUtility::Redirect('error.php?msg=Access denied');
    }

    if ($adodb->ErrorNo() != 0) {

      print ( "<b>SQL error!</b> <br /> <b>File Name :</b> $file_name <br /> <b>Line No :</b> $line_no <br> <b>Error :</b> " . $adodb->ErrorMsg());
      $adodb->RollbackTrans();
      exit();
    }
  }

  /**
   * Returns backtrace information as a string for debugging (you might want this beautfied with HTML markup later)
   *
   * @access private
   * @author Kasun Thilina, <kasun_uoc@yahoo.com>
   * @return String
   */
  private function GetBackTrace() {
    $arr_backtrace = debug_backtrace();
    $trace = '';

    //echo "<pre> "; print_r($arr_backtrace); echo "</pre>";

    for ($x = 0; $x < count($arr_backtrace); $x++) {
      foreach ($arr_backtrace[$x] as $key => $value) {
        if (is_array($value)) { //arguments array (append)
          for ($y = 0; $y < count($value); $y++) {
            $arg = print_r($value[$y], true);
            $trace .= "Function argument $y: $value[$y]\n\n";
          }
        }

        if (!is_array($value))
          $trace .= "$key: $value";
        $trace .="\n\n";
      }
      $trace .= "---------------------------------------------------------------------------\n\n";
    }

    return $trace;
  }

  /**
   * Print Array
   *
   * @access public
   * @param array array to print
   */
  function Redirect($url) {
    header("Location: $url");
    exit();
  }

  /**
   * get templated email
   *
   * @access public
   * @param array array to print
   * @return email body
   */
  function GetTemplateMail($template, $array, $lang_id = 66) {
    global $adodb;

    $sql = "SELECT mt_from_email, mt_from_name, mt_subject, mt_body FROM tbl_mailT mt, tbl_mailT_lang mtl WHERE mt.mt_id=mtl.mt_id and mt.mt_name='$template' and mtl.lang_id=$lang_id";
    $mail = $adodb->GetRow($sql) or SQLError(__FILE__, __LINE__);

    $out = array('from_mail' => $mail['mt_from_email'],
        'from_name' => $mail['mt_from_name'],
        'subject' => strtr($mail['mt_subject'], $array),
        'body' => strtr($mail['mt_body'], $array)
    );

    return $out;
  }

  /**
   * Print Array
   *
   * @access public
   * @param array array to print
   */
  function PrintArray($array) {
    print ( "<pre>");
    print_r($array);
    print ( "</pre>");
  }

  function GetValueOf($p_table, $p_field, $p_condition) {
    $db = CDBConnection::GetInstance();
    $sql = "SELECT $p_field FROM $p_table WHERE $p_condition";
    $rs = $db->Execute($sql) or CUtility::SQLError($sql, $db->ErrorMsg());

    $data = $rs->FetchRow();
    return $data[$p_field];
  }

  function GetBaseUrl() {
    $BASE_URL = isset($_SERVER['HTTPS']) ? HTTPS_ROOT . '/' . VIRTUAL_ROOT : HTTP_ROOT . '/' . VIRTUAL_ROOT;
    return substr($BASE_URL, 0, strlen($BASE_URL) - 1);
  }

  /**
   * Load the html editor
   *
   * @access public
   * @param HTML editor
   */
  function LoadHtmlEditor($name, $value = '', $height = 300) {
    require_once("../FCKeditor/fckeditor.php");

    $FCKeditor_obj = new FCKeditor($name);
    $FCKeditor_obj->Height = $height;
    $FCKeditor_obj->BasePath = HTTP_ROOT . '/' . VIRTUAL_ROOT . 'FCKeditor/';
    $FCKeditor_obj->Value = $value;
    //$FCKeditor_obj->Config['UserFilesPath']	=$FCKEDITOR_IMAGE_PATH;
    //$FCKeditor_obj->ToolbarSet = 'Basic' ;
    $FCKeditor_obj->Config['StylesXmlPath'] = HTTP_ROOT . '/' . VIRTUAL_ROOT . 'css/bm_text_style.xml';
    $FCKeditor_obj->Config['EditorAreaCSS'] = HTTP_ROOT . '/' . VIRTUAL_ROOT . 'css/bm_text_style.css';


    return $FCKeditor_obj->CreateHtml();

    /* $sw = new SPAW_Wysiwyg($name,$value,'','full');

      return $sw->getHtml(); */
  }

  /**
   * Check admin status
   *
   * @access public
   * @param CAdmin $p_admin_obj
   */
  public static function CheckSuperUser($p_admin_obj) {
    global $smarty;
    $is_super_user = false;

    if ($p_admin_obj->m_is_super_admin == 1) {
      $is_super_user = true;
    } else {
      $is_super_user = false;
      $smarty->assign('message', 'You have not privileges to access this page!');
    }
    return $is_super_user;
  }

  /**
   * Check admin status
   *
   * @access public
   * @param CAdmin $p_admin_obj
   */
  public static function SqlSafe($str) {
    return addslashes($str);
  }

  public static function StringEscape($str) {
    $str = self::SqlSafe($str);
    if (is_numeric($str)) {
      return $str;
    }
    return "'" . $str . "'";
  }

}

/* end of class CUtility */