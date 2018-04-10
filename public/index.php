<?php
error_reporting(32767);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
define('APP_PATH', realpath(__DIR__ . '/../') . '/');
spl_autoload_register(function ($class) {
    $filename = APP_PATH . 'app/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($filename)) {
        require $filename;
    }
});

set_exception_handler(function ($e) {
    var_dump($e);
});

set_error_handler(function ($err) {
    var_dump($err);
});

require APP_PATH . '/vendor/autoload.php';

$bootclass = [
    \boot\Session::class,
    \boot\Router::class,
];
$app = new linger\framework\Application(require APP_PATH . '/conf/config.php');
$app->init($bootclass);
$app->run();