<?php
/**
 * Logger Class
 * 
 * @package hitad.log
 * @access public
 * @version 1.0.0
 * @author Indika Gunathilaka <igunathilaka.com>
 * @date 2008-01-31
 */
class CLogger
{
    // --- ATTRIBUTES ---
    
	Const LOG_PRIORITY_TYPE_CRITICAL =	3;
	Const LOG_PRIORITY_TYPE_IGNORE   =	4;
	Const LOG_PRIORITY_TYPE_FAILURE  =	5;
	Const LOG_PRIORITY_TYPE_SUCCESS  =	6;
    Const LOG_PRIORITY_TYPE_INFO	 =	8;
    
    private $db				=	null;

    public $m_log_id		= 0;
    public $m_log_type 		= '';
    public $m_fk_1 			= 0;
    public $m_fk_2 			= 0;
    public $m_fk_3 			= 0;
    public $m_date 			= '';
    public $m_subject 		= '';
    public $m_log_text 		= '';
    public $m_log_sql_text	= '';
    public $m_log_priority	= 0;
    public $m_user_id		= 0;
    
    public $m_user_obj		= null;

    // --- OPERATIONS ---
   /**
     * Short description of method attach
     *
     * @access public
     * @author Deshapriya De Silva
     * @return void
     */
   public function __construct( )
   {
   		$this->db			=	CDBConnection::GetInstance();
   }
	 
    /**
     * Short description of method attach
     *
     * @access public
     * @author Deshapriya De Silva
     * @return void
     */
    public function attach()
    {
        // section .:00000000000007D2 begin
        // section .:00000000000007D2 end
    }

    /**
     * Short description of method notify
     *
     * @access public
     * @author Deshapriya De Silva
     * @return void
     */
    public function notify($p_msg,$p_sql_msg,$p_msg_subject='',$p_priority=8)
    {
        $this->m_log_text		=	$p_msg;
        $this->m_log_sql_text	=	$p_sql_msg;
        $this->m_subject		=	$p_msg_subject;
        $this->m_log_priority	=	$p_priority;
       
    	$sql	=	" INSERT INTO ".
        			" tbl_event_log(log_type,log_date,log_priority,log_fk_1,log_fk_2,log_fk_3,log_msg,log_sql_msg,log_subject,user_id)".
        			" VALUES('$this->m_log_type',now(),'$this->m_log_priority','$this->m_fk_1','$this->m_fk_2','$this->m_fk_3','".CUtility::SqlSafe($this->m_log_text)."','$this->m_log_sql_text','$this->m_subject','$this->m_user_id')";
        
        $this->db->Execute( $sql ) or CUtility::SQLError( __FILE__, __LINE__ );
    }

    /**
     * Short description of method notifyAll
     *
     * @access public
     * @author Deshapriya De Silva
     * @return void
     */
    public function notifyAll()
    {
        // section .:00000000000007D6 begin
        // section .:00000000000007D6 end
    }

    /**
     * Get CLogger Properties
     *
     * @access public 
     * @author Deshapriya De Silva
     * @param int $p_log_id
     * @return CLogger Object $log_obj
     */
    public static function GetProperties( $p_log_id )
    {
    	$db			=	CDBConnection::GetInstance();
    	$sql		=	" SELECT * ".
   						" FROM tbl_event_log ".
    					" WHERE log_id = $p_log_id ";
    	$data		= 	$db->GetRow( $sql ) or CUtility::SQLError( __FILE__, __LINE__ );
    	
    	$log_obj					= 	new CLogger();
    	
    	$log_obj->m_log_id			=	$data['log_id'];
    	$log_obj->m_log_type		=	$data['log_type'];
    	$log_obj->m_date			=	$data['log_date'];
    	$log_obj->m_log_priority	=	$data['log_priority'];
    	$log_obj->m_fk_1			=	$data['log_fk_1'];
    	$log_obj->m_fk_2			=	$data['log_fk_2'];
    	$log_obj->m_fk_3			=	$data['log_fk_3'];
    	$log_obj->m_log_text		= 	$data['log_msg'];
    	$log_obj->m_subject			=	$data['log_subject'];
    	$log_obj->m_user_obj		= 	new CUser($data['user_id']);
    	
    	return $log_obj;
   	}

} 
?>