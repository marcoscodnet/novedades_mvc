<?php 
ini_set('memory_limit', '500M');
ini_set('max_execution_time', '0');
ini_set('post_max_size', '64M');
ini_set('upload_max_filesize', '64M');

define('CDT_UI_LANGUAGE', 'es');
define('BOL_NEWSLETTER_DS_MAIL', 'codnet@codnetnewsletter.com');
define('BOL_NEWSLETTER_CD_TEMPLATE', 1);
define('BOL_NEWSLETTER_CD_STATUS_DEFAULT', 1);
define('BOL_CONTACT_IMPORT_NUM_COLUMNS', 7);
define('BOL_SUBSCRIPTION_TITLE', 'Suscribirme al Newsletter');
define('BOL_MAIL_PER_HOUR', 10);
define('BOL_NEWSLETTER_CD_STATUS_SENDING', 2);
define('BOL_NEWSLETTER_CD_STATUS_TEMP', 3);
define('BOL_NEWSLETTER_CD_STATUS_PROCESS', 4);
define('BOL_NEWSLETTER_CD_STATUS_ERROR', 5);
define('BOL_NEWSLETTER_CD_STATUS_IN_SEND', 6);
define('BOL_NEWSLETTER_DS_MAIL_TO', 'marcosp@codnet.com.ar');
define('BOL_NEWSLETTER_POPUP_MULTIPLE_CONTACTCATEGORIES',  'FindPopupMultipleContactCategoriesRenderer');
define('BOL_NEWSLETTER_POPUP_MULTIPLE_CATEGORIES',  'FindPopupMultipleCategoriesRenderer');

define('BOL_NEWSLETTER_FILES', 'files');

//env�o de emails.
define('CDT_POP_MAIL_FROM', BOL_NEWSLETTER_DS_MAIL);
define('CDT_POP_MAIL_FROM_NAME', '');
define('CDT_POP_MAIL_HOST', 'mail.codnetnews.com');
//define('CDT_POP_MAIL_PORT', '465');
define('CDT_POP_MAIL_MAILER', 'smtp');
define('CDT_POP_MAIL_USERNAME', 'bounce_test@codnetnews.com');
define('CDT_POP_MAIL_PASSWORD', 'bost0149');
define('CDT_MAIL_ENVIO_POP', true);

define('BOL_HOST_ROOT', '74.208.72.243');
define('BOL_USER_FTP', 'root');
define('BOL_PASS_FTP', 'sZfBfkV6');
define('BOL_NET_PATH', '/var/www/vhosts/codnetnewsletter.com/httpdocs/mvc/libs/phpseclib0.2.2');
//define('BOL_BOUNCE_PATH', '/var/qmail/mailnames/codnetnewsletter.com/bounce_test/Maildir/cur/');
define('BOL_BOUNCE_PATH', 'C:/Users/Administrador/AppData/Roaming/Thunderbird/Profiles/9b8m9pki.default/Mail/pop.gmail.com/Boletin CodNet.mozmsgs/');
define('BOL_DAYS_WITHOUT_BOUNCING', 4);

define('CDT_SECURE_LOGIN_MAX_ATTEMPS', 5, true);

define('BOL_DATE_FORMAT', 'd/m/Y');
define('BOL_DATETIME_FORMAT', 'd/m/y H:i:s');
define('BOL_DATETIME_FORMAT_STRING', 'YmdHis');

?>