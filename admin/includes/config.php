<?php

//Database Connection Constants

define('db_host','localhost');
define('db_user','root');
define('db_pass','root');
define('db_name','gallery_db');


defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

define('SITE_ROOT', "C:\\MAMP" . DS . "htdocs" . DS . "OOPDEMO");   // makes current directory the root directory

defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH', SITE_ROOT . DS . 'admin'. DS .'includes');

defined('IMAGES_PATH') ? null : define('IMAGES_PATH', SITE_ROOT. DS . 'admin' . DS . 'images');



session_start();
?>