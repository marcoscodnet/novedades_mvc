<?php

include './includes/include.php';

if (class_exists('Logger')) {
	Logger::configure(CDT_LOG4PHP_CONFIG_FILE);
}

include CDT_CORE_PATH . 'controller.php';


?>
