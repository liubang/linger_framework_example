<?php
error_reporting(E_ALL | E_NOTICE);
define('APP_PATH', realpath(__DIR__ . '/../') . '/');
spl_autoload_register(function ($class) {
    $filename = APP_PATH . 'app/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($filename)) {
        require $filename;
    }
});

set_exception_handler(function (Exception $e) {
    echo $e->getMessage(), PHP_EOL;
    echo $e->getTraceAsString();
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