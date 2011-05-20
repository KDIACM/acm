<?php
/**
 * Property class for manipulate system user property functionalities
 * 
 * @access public
 * @package hitad.user
 * @version 1.0.0
 * @author Indika Gunathilaka <igunathilaka@yahoo.com>
 */
class CProperty
{
	// --- ATTRIBUTES ---
	const C_LOG_TYPE			= "USER_PROPERTY";
	
	private $db				  	= null;
	public $m_property_id		= '';
	public $m_property_name		= '';
	public $m_property_des		= '';
	public $m_property_enabled 	= '';
	
	// --- OPERATIONS ---
	
	/**
	 * Constructor for CUser class
	 * 
	 * @access public
	 * @author Indika Gunathilaka <igunathilaka@yahoo.com>
	 * @param int $p_user_id
	 * @return void
	 */
	public function __construct( $p_property_id )
	{
		$this->db 			= CDBConnection::GetInstance();

		$sql      			= 	" SELECT * ".
				     		  	" FROM tbl_user_property  ".
		             		  	" WHERE property_id =$p_property_id ";
		 
		$rs	      			= 	$this->db->Execute($sql) or CUtility::SQLError( __FILE__, __LINE__ );

		$data	  			= 	$rs->FetchRow();
		
		$this->m_property_id 		= $data['property_id'];
		$this->m_property_name 	= $data['property_name'];
		$this->m_property_des	= $data['property_des'];
		$this->m_property_enabled 	= $data['property_enabled'];
	}
	
	/**
	 * Create new Property
	 *
	 * @access public
	 * @author Indika Gunathilaka <igunathilaka@yahoo.com>
	 * @param array $p_arr_data
	 * @return CProperty object
	 */
	public function Create( $p_arr_data )
	{
		$db			=	CDBConnection::GetInstance();
		
		$sql 		=	" INSERT INTO tbl_user_property (property_name,property_des,property_enabled)".
						" VALUES ('$p_arr_data[property_name]','$p_arr_data[property_des]','$p_arr_data[property_enabled]')";
		$rs			= 	$db->Execute($sql) or CUtility::SQLError( __FILE__, __LINE__ );

		$property_obj = new CProperty($db->Insert_ID());
		$property_obj->Log("Property[Name='$property_obj->m_property_name'] created successfully.",CUtility::SqlSafe($sql),"Manage Property",CLogger::LOG_PRIORITY_TYPE_SUCCESS);
		return $property_obj;
	}
	
	/**
	 * Update user Property
	 *
	 * @access public
	 * @author Indika Gunathilaka <igunathilaka@yahoo.com>
	 * @return void
	 */
	public function Update()
	{
		$sql		=	" UPDATE tbl_user_property ".
						" SET property_name='$this->m_property_name',property_des='$this->m_property_des',property_enabled='$this->m_property_enabled' ".
						" WHERE property_id=$this->m_property_id ";
        $this->db->Execute($sql) or CUtility::SQLError( __FILE__, __LINE__ );
        $this->Log("Property[Name='$this->m_property_name'] updated successfully.",CUtility::SqlSafe($sql),"Manage Property",CLogger::LOG_PRIORITY_TYPE_SUCCESS);
	}
	
	/**
	 * Delete user Property
	 *
	 * @access public
	 * @author Indika Gunathilaka <igunathilaka@yahoo.com>
	 * @return void
	 */
	public function Delete()
	{
		$sql	=	" DELETE ".
					" FROM tbl_user_property ".
					" WHERE property_id=$this->m_property_id ";
		$this->db->Execute($sql) or CUtility::SQLError( __FILE__, __LINE__ );
		$this->Log("Property[Name='$this->m_property_name'] deleted successfully.",CUtility::SqlSafe($sql),"Manage Property",CLogger::LOG_PRIORITY_TYPE_SUCCESS);
	}
	
	/**
	 * Get All User Properties 
	 *
	 * @access public
	 * @author Indika Gunathilaka <indika.gunathilaka@gmail.com>
	 * @return array $arr_property_obj
	 */
	public static function GetAll($p_enable='')
	{
		$arr_property_obj	= array();
		$enable_str = "";
		$db		=	CDBConnection::GetInstance();
		($p_enable)?$enable_str="WHERE property_enabled=1":$enable_str="WHERE property_enabled=0";
		$sql	= 	" SELECT property_id ".
					" FROM tbl_user_property ";
		$rs		=	$db->Execute( $sql ) or CUtility::SQLError( __FILE, __LINE );
		
		while( $data = $rs->FetchRow())
		{
			array_push( $arr_property_obj ,new CProperty($data['property_id']) );
		}
		return $arr_property_obj;
	}
	
	/**
     * Implement Log function from ILogHandler
     * 
     * @access public
     * @author Indika Gunathilaka <igunathilaka@yahoo.com>
     * @param String $p_log_msg
     * @param String $p_log_subject
     * @param int $p_log_priority
     * @return void
     */
	public function Log( $p_log_msg,$p_log_sql_msg,$p_log_subject='',$p_log_priority=CLogger::LOG_PRIORITY_TYPE_INFO)
    {
    	$log_obj				= 	new CLogger();
    	$log_obj->m_log_type	= 	self::C_LOG_TYPE;
    	$log_obj->m_fk_1		=	$this->m_property_id;
    	$log_obj->m_fk_2		=	-1;//$this->m_cus_id;
    	$log_obj->m_user_id		=	isset($_SESSION['admin']['user_id'])? $_SESSION['admin']['user_id']:$this->m_user_id;;
    	$log_obj->notify($p_log_msg,$p_log_sql_msg,$p_log_subject,$p_log_priority);
    }
    
    /**
     * Get Events Log of Property
     *
     * @access public
     * @author Indika Gunathilaka
     * @return Array $arr_logger_obj
     */
    public static function GetLogEvents()
    {
    	$arr_logger_obj	=	array();
    	$db		=	CDBConnection::GetInstance();
    	$sql	=	" SELECT log_id ".
    				" FROM tbl_event_log ".
    				" WHERE log_type IN ('USER_PROPERTY') ".
    				" ORDER BY log_date DESC ";
    	$rs		=	$db->Execute( $sql ) or CUtility::SQLError( __FILE__, __LINE__ );
    	
    	while( $data = $rs->FetchRow() )
    	{
    		array_push($arr_logger_obj,CLogger::GetProperties( $data['log_id'] ));
    	}
    	return $arr_logger_obj;
    }
	
	
}
?>