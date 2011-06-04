<?php
@header('content-type: text/html; charset=utf-8');
@session_start(); //in case session_auto_start is not set
error_reporting(E_ALL);
ini_set('display_errors', 'on');
date_default_timezone_set("Asia/Colombo");

/* Database configuration */
define('MYSQL_HOST','localhost');
define('MYSQL_USER','root');
define('MYSQL_PWD','root');
define('MYSQL_DB','acm');

/*define doc root */
define( 'VIRTUAL_ROOT', 'acm/' );
define( 'DOC_ROOT', "/home/deshapriya/www/" );
define( 'UPLOAD_PATH', "uploads/" );
define( 'IS_HTTPS', false );
define( 'HTTP_ROOT', 'http://localhost/acm' );

/* Smarty configuration */
define("SMARTY_DIR",DOC_ROOT."libs/smarty/libs/");
require_once(SMARTY_DIR."Smarty.class.php");

$smarty = new Smarty;
$smarty->template_dir 	= DOC_ROOT.VIRTUAL_ROOT.'tpl';
$smarty->compile_dir 	= DOC_ROOT.VIRTUAL_ROOT.'templates_c/';
$smarty->config_dir 	= DOC_ROOT.VIRTUAL_ROOT.'configs/';
$smarty->cache_dir 		= DOC_ROOT.VIRTUAL_ROOT.'cache/';
//trip these variable in the production enviroment for better performance
$smarty->force_compile 	= true;
$smarty->caching = 0;

/* ADODB configuration */
define("ADODB_DIR", DOC_ROOT."libs/adodb/");
require_once(ADODB_DIR."adodb.inc.php");
$adodb = NewADOConnection('mysqlt');
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;

/* Common constant */
define('ACTIVE', 1);
define('INACTIVE', 0);
define('DELETED', -1);
define('ITEMS_PER_PAGE', 5);



?>