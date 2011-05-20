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
class CCreditLogger
{
	private $db				=	null;

    public $m_payment_log_id		=	0;
	public $m_ref_id				=	0;
	public $m_log_date				=	"";
    public $m_transcation_id		=	0;
    public $m_receipt_id			=   0;
    public $m_user_id				=	0;
    public $m_pay_discription		=	"";
    
    public $m_user_obj				= null;
    
 // --- OPERATIONS ---
   /**
     * Short description of method attach
     *
     * @access public
     * @author Deshapriya De Silva
     * @return void
     */
   public function __construct()
   {
   		$this->db			=	CDBConnection::GetInstance();
   }
   
/**
     * Short description of method notify
     *
     * @access public
     * @author Deshapriya De Silva
     * @return void
     */
    public function notify($p_ref_id,$p_transcation_id,$p_receipt_id,$p_user_id,$p_pay_discription)
    {
        $this->m_ref_id				=	$p_ref_id;
        $this->m_transcation_id		=	$p_transcation_id;
        $this->m_receipt_id			=	$p_receipt_id;
        $this->m_user_id			=	$p_user_id;
        $this->m_pay_discription	=	$p_pay_discription;
       
    	$sql	=	" INSERT INTO ".
        			" tbl_payment_log(ref_id,log_date,transcation_id,user_id,pay_discription)".
       $this->db->Execute( $sql ) or CUtility::SQLError( __FILE__, __LINE__ );
    }
    
/**
     * Get CLogger Properties
     *
     * @access public 
     * @author Deshapriya De Silva
     * @param int $p_log_id
     * @return CLogger Object $log_obj
     */
    public static function GetProperties()
    {
    	$db			=	CDBConnection::GetInstance();
    	
    	$sql		=	" SELECT * ".
   						" FROM tbl_payment_log ";
    					
    					
    	$data		= 	$db->GetRow( $sql ) or CUtility::SQLError( __FILE__, __LINE__ );
    	
    	$log_obj					= 	new CCreditLogger();
    	
    	$log_obj->m_payment_log_id			=	$data['payment_log_id'];
    	$log_obj->m_ref_id					=	$data['ref_id'];
    	$log_obj->m_log_date				=	$data['log_date'];
    	$log_obj->m_transcation_id			=	$data['transcation_id'];
    	$log_obj->m_receipt_id		 		=	$data['receipt_id'];
    	$log_obj->m_user_id					=	$data['user_id'];
    	$log_obj->m_pay_discription			=	$data['pay_discription'];
    	
    	
    	return $log_obj;
   	}
}

?>