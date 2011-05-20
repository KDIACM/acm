<?php
/**
 * Database connection class
 * This has Singleton pattern
 * 
 * @access public
 * @package hitad.util
 * @version 1.0.0
 * @author Kasun Thilina, <kasun_uoc@yahoo.com>
 * @date 2006-07-21
 */
class CDBConnection
{

	static private 	$m_dbconnection = 	NULL; //dbconnection Instance
	
	static private	$db_host		=	MYSQL_HOST;
	static private  $db_user		=	MYSQL_USER;
	static private  $db_pwd			=	MYSQL_PWD;
	static private  $db_name		=	MYSQL_DB;
	
	static private  $ado_db_type	=	'mysqlt';
	
	/**
	 * Constructor of Database connection class
	 *
	 * @access private
	 * @author Kasun Thilina, <kasun_uoc@yahoo.com>
	 */
	private function __construct()
	{
		
	}
	
	/**
	 * static get instance function
	 *
	 * @access private
	 * @author Kasun Thilina, <kasun_uoc@yahoo.com>
	 */
	static public function GetInstance()
	{
		if ( null == self::$m_dbconnection )
		{
			self::$m_dbconnection = NewADOConnection(self::$ado_db_type);
			try
			{
				self::$m_dbconnection->Connect(self::$db_host,self::$db_user, self::$db_pwd, self::$db_name) ;
			}catch (Exception $e)
			{
				die("Could Not Connect Database!".$e->getMessage());
			}
		}
		return self::$m_dbconnection;
	}
}
?>