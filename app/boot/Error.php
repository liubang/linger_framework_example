<?php

namespace boot;

use linger\framework\Application;

class Error implements \linger\framework\Bootstrap
{
    public function bootstrap(Application $application)
    {
        \set_exception_handler(function (\Exception $exception) use ($application) {
            \file_put_contents($application->getConfig()->get('log_path')
                . 'error.log', $exception->getMessage() . "\n" . $exception->getTraceAsString() . "\n", \FILE_APPEND);
        });
    }
}