<?php

namespace boot;

use linger\framework\Application;
use linger\framework\Bootstrap;

class Test implements Bootstrap
{
    public function bootstrap(Application $application)
    {
        $query = $application->getRequest()->getQuery('q');
        switch ($query) {
            case "get":
                $application->getRouter()->get('/test/get', Test::class, 'testGet');
                $application->getRequest()->setUri('/test/get')->setMethod('get')
                    ->setQuery(['name' => 'liubang', 'age' => '25']);
                break;
            case "post":
                $application->getRouter()->post('/test/post', Test::class, 'testPost');
                $application->getRequest()->setUri('/test/post')->setMethod('post')
                    ->setPost();
        }
    }
}