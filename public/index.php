<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
define('APP_PATH', realpath(__DIR__ . '/../') . '/');
require APP_PATH . '/vendor/autoload.php';
$bootclass = [
    \boot\Error::class,
    \boot\Session::class,
    \boot\Router::class,
];
$app = new linger\framework\Application(require APP_PATH . '/conf/config.php');
$app->init($bootclass)
    ->run();