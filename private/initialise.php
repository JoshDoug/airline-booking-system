<?php

define("PRIVATE_PATH", __DIR__);
define("WEB_ROOT", dirname(PRIVATE_PATH));
define("SRC_ROOT", WEB_ROOT . '/html');
define("VIEW_ROOT", PRIVATE_PATH . '/view');
define("INCLUDE_ROOT", PRIVATE_PATH . '/include');
define("CONFIG_PATH", WEB_ROOT . '/config');
define("MODEL_PATH", PRIVATE_PATH . '/model');

// Load Class Definitions
function my_autoload($class) {
    if (preg_match('/\A\w+\Z/', $class)) {
        include('model/' . $class . '.class.php');
    }
}

spl_autoload_register('my_autoload');

require_once(PRIVATE_PATH . '/pdoConnect.php');
require_once(PRIVATE_PATH . '/dataAccess.php');

// Array of Days
$days = [
    'Monday',
    'Tuesday',
    'Wednesday',
    'Thursday',
    'Friday',
    'Saturday',
    'Sunday'
];

// Set default timezone once
date_default_timezone_set("UTC");

// Begin Session - all pages have a session for using the basket
session_start();

if (!isset($_SESSION["basket"])) {
    $_SESSION["basket"] = [];
}