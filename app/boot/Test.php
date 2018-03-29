<?php

namespace boot;

use linger\framework\Application;
use linger\framework\Bootstrap;
use handler\Test as T;

class Test implements Bootstrap
{
    public function bootstrap(Application $application)
    {
        $query = $application->getRequest()->getQuery('q');
        switch ($query) {
            case "get":
                $application->getRouter()->get('/test/get', T::class, 'testGet');
                $application->getRequest()->setUri('/test/get')->setMethod('get')
                    ->setQuery(['name' => 'liubang', 'age' => '25']);
                break;
            case "post":
                $application->getRouter()->post('/test/post', T::class, 'testPost');
                $application->getRequest()->setUri('/test/post')->setMethod('post')
                    ->setPost(['name' => 'liubang', 'age' => '25']);
                break;
            case "put":
                $application->getRouter()->put('/test/put', T::class, 'testPut');
                $application->getRequest()->setUri('/test/put')->setMethod('put')
                    ->setPost(['name' => 'liubang', 'age' => '25']);
        }
    }
}