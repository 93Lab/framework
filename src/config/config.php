<?php

//ERROR REPORTING
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

//TIME ZONE AND MONETARY
date_default_timezone_set('Asia/Kolkata');
setlocale(LC_MONETARY, 'en_IN');

//FRAMEWORK CONSTANTS
define('ENABLE_LOGIN', 1);

//APP CONSTANTS
define('APP', 'fr');
define('DEFAULT_TITLE', 'Framework');
define('HOME', 'http://localhost:8888/framework/');

//NOTIFICATION CONSTANTS
define('SMS_HOST', 'http://sms.growingnetworks.com/api/sendhttp.php');
define('SMS_API', 'XXXXXX');
define('SMS_SENDER_ID', 'XXXXXX');
define('MAILGUN_API', 'XXXXXX');
define('MAILGUN_DOMAIN', 'XXXXXX');

//DATABASE CONSTANTS
define('DB_HOST', 'localhost');
define('DB_NAME', 'test');
define('DB_USER', 'test');
define('DB_PASSWORD', 'test');

//DIRECTORY CONSTANTS
//define('UPLOAD', ROOT . DS . 'uploads' . DS);
