<?php


/**
 * se configuran los módulos del mvc.
 * 
 * @author codnet archetype builder
 * @since 
 * 
 */
define('CLASS_LOADER_FROM_SESSION', 1);
define('BOL_PATH', APP_PATH . '/classes/com/newsletter_mvc/');

/* mvc */
define('CDT_MVC_PATH', $_SERVER ['DOCUMENT_ROOT'] . '/codnet_mvc/');

define('CDT_CORE_PATH', CDT_MVC_PATH .   'codnet_core/');
include_once (CDT_CORE_PATH . 'conf/init.php');
define('DEFAULT_MENU', 'Menu');
define('NOMBRE_APLICACION', 'NEWSLETTER_MVC');
define('NOMBRE_EMPRESA_PDF', 'NEWSLETTER_MVC');
define('CDT_MVC_APP_TITLE', 'BOL');
define('CDT_MVC_APP_SUBTITLE', 'newsletter_mvc');

define('CDT_EXTERNAL_LIB_PATH', APP_PATH . '/libs/');

//configuramos log4php
define( "CDT_LOG4PHP_PATH", CDT_EXTERNAL_LIB_PATH . "log4php") ;
define( "CDT_LOG4PHP_CONFIG_FILE", APP_PATH . "/conf/log4php.xml", true );
require_once( CDT_LOG4PHP_PATH . '/Logger.php' );

/* seguridad */
define('CDT_SECURE_PATH', CDT_MVC_PATH . 'codnet_secure/');
include_once (CDT_SECURE_PATH . 'conf/init.php');

define('CDT_SECURE_LOGIN_TITLE', CDT_MVC_APP_TITLE);
define('CDT_SECURE_LOGIN_SUBTITLE', CDT_MVC_APP_SUBTITLE);
define('CDT_SECURE_REGISTER_TITLE', CDT_MVC_APP_TITLE);
define('CDT_SECURE_REGISTER_SUBTITLE', CDT_MVC_APP_SUBTITLE);
define("CDT_SECURE_ACCESS_DENIED_ACTION", 'home');
define('CDT_SECURE_REGISTRATION_ENABLED', false);
/* geo */
define('CDT_GEO_PATH', CDT_MVC_PATH . 'codnet_geo/');
include_once (CDT_GEO_PATH . 'conf/init.php' );

/* ui */
define('CDT_UI_PATH', CDT_MVC_PATH . 'codnet_ui_0_2_4/');
include_once (CDT_UI_PATH . 'conf/init.php');

/* layout */
define('CDT_UI_SMILE_PATH', CDT_MVC_PATH  . 'codnet_ui_smile_0_2_3/');
include_once (CDT_UI_SMILE_PATH . 'conf/init.php');
define ( 'DEFAULT_LAYOUT', 'LayoutBOL' );
define ( 'DEFAULT_PANEL_LAYOUT', 'LayoutBOL');
define ( 'DEFAULT_EDIT_LAYOUT', 'LayoutBOL' );
define ( 'DEFAULT_LOGIN_LAYOUT', 'LayoutSmileLogin' );
define ( 'DEFAULT_POPUP_LAYOUT', 'LayoutSmilePopup' );

define ( 'CDT_UI_UTF8_ENCODE', true );

/* components */
define('CDT_CMP_PATH', CDT_MVC_PATH  . 'codnet_ui_components_2_0_7/');
include_once (CDT_CMP_PATH . 'conf/init.php');

date_default_timezone_set("America/Argentina/Buenos_Aires");
if (!defined('CLASS_PATH')) {
    $classpath = array();
    $classpath[] = CDT_CORE_PATH;
    $classpath[] = CDT_SECURE_PATH;
    $classpath[] = CDT_UI_PATH;
    $classpath[] = CDT_GEO_PATH;
    $classpath[] = CDT_UI_SMILE_PATH;
    $classpath[] = CDT_CMP_PATH;
    $classpath[] = BOL_PATH;
    define('CLASS_PATH', implode(",", $classpath));
}


//para optimizar el class_path.
if (!defined('CLASS_PATH_EXCLUDE')) {
    $exclude = array();
    $exclude[] = CDT_CORE_PATH . 'view/templates';
    $exclude[] = CDT_SECURE_PATH . 'view/templates';
    $exclude[] = CDT_GEO_PATH . 'view/templates';
    $exclude[] = CDT_UI_PATH . 'view/templates';
    $exclude[] = CDT_UI_SMILE_PATH . 'view/templates';
    $exclude[] = BOL_PATH . 'view/templates';
    define('CLASS_PATH_EXCLUDE', implode(",", $exclude));
}
