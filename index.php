<?php

include "vendor/autoload.php";
include "src/config/config.php";

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__));

ini_set('session.gc_maxlifetime', 36000);
session_set_cookie_params(36000);
session_start();

$router = new src\main\Router();
include "src/config/routes.php";
$router->dispatch();
