<?php
	/**
	 * CNavigation
	 * 
	 * @author Samantha Jayasinghe
	 * @date 2008-10-10
	 */
	class CNavigation
	{
		// --- ATTRIBUTES ---
		public $m_navi_name		=	'';
		public $m_navi_link		=	'';
		
		/**
		 * Constructor of Navigation class
		 * 
		 * @access public
		 * @author Indika Gunathilaka
		 * @return void
		 */
		public function __construct( $p_navi_name ,$p_navi_link='' )
		{
			$this->m_navi_name		=	$p_navi_name;
			$this->m_navi_link		=	$p_navi_link;
		}
	}
	
   /**
	 * Navigation UI
	 * 
	 * @author Indika Gunathilaka
	 * @date 2006-10-10
	 */
	class CHitAdNavigationUI
	{
		// --- ATTRIBUTES ---
		
		public $m_navigation_obj	=	array();
		
		/**
		 * Constructor of NavigationUI class
		 * 
		 * @access public
		 * @author Indika Gunathilaka
		 * @return void
		 */
		public function __construct( )
		{
			
		}
		
		/**
		 * Add Navigation object
		 * 
		 * @access public
		 * @author Indika Gunathilaka
		 * @return void
		 */
		public function AddNavigation( $p_object )
		{
			if(  $p_object instanceof CNavigation )
			{
				array_push($this->m_navigation_obj,$p_object);
			}else
			{
				$navi_name		=	CHitAdNavigationUI::GetNavigationName( $p_object );
				$navi_url		=	CHitAdNavigationUI::GetNavigationLink( $p_object );
				$navigation_obj	=	new CNavigation( $navi_name ,$navi_url);
				array_push( $this->m_navigation_obj,$navigation_obj);
			}
		}
		
		/**
		 * Get navigation name
		 * 
		 * @access public
		 * @author Indika Gunathilaka
		 * @return String name
		 */
		public static function GetNavigationName( $p_object )
		{
			$class_name	=	get_class($p_object);
			$navigation	=	'';
			switch( $class_name )
			{
				case 'CUser':
					$navigation	=	$p_object->m_user_name;
				break;
				
				case 'CReseller':
					$navigation	=	$p_object->m_reseller_company;
				break;
				
				case 'CROrder':
					$navigation	=	$p_object->m_po;
				break;
				
				case 'CResellerCreditNote':
					$navigation	=	$p_object->GetCustomerReferenceNumber();
				break;
				
				case 'CShipment':
					$navigation	=	$p_object->m_ship_code;
				break;
				
				case 'CPayment':
					$navigation	=	$p_object->m_ship_code;
				break;
				
			}
			return $navigation;
		}
		
		/**
		 * Get navigation Link
		 * 
		 * @access public
		 * @author Indika Gunathilaka
		 * @return String name
		 */
		public static function GetNavigationLink( $p_object )
		{
			$class_name	=	get_class($p_object);
			$link		=	'';
			switch( $class_name )
			{
				case 'CUser':
					$link	=	'user_home.php';
				break;
				
				case 'CReseller':
					$link	=	'reseller_home.php?t_id='.$p_object->m_res_id;
				break;
				
				case 'CROrder':
					$link	=	'rorder.php?mode=view&ro_id='.$p_object->m_ro_id;
				break;
				
				case 'CShipment':
					$link	=	'shipment_detail.php?t_id='.$p_object->m_ship_id;
				break;
				
				case 'CPayment':
					$link	=	'payment_detail.php?t_id='.$p_object->m_ship_id;
				break;
				
			}
			return $link;
		}
	}
?>