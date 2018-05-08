<?php

return [
    'app_directory' => APP_PATH . 'app',
    'db'            => [
        'driver'    => 'mysql',
        'read'      => ['host' => '192.168.8.20'],
        'write'     => ['host' => '192.168.8.20'],
        'database'  => 'liubang',
        'username'  => 'liubang',
        'password'  => '123456',
        'charset'   => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix'    => '',
    ],
    'log_path'      => '/data/logs/scripts/',
];