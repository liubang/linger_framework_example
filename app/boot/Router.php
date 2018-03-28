<?php

namespace boot;

use handler\Home;
use linger\framework\Application;
use linger\framework\Bootstrap;

class Router implements Bootstrap {

    public function bootstrap(Application $app) {
        $app->getRouter()
            ->get('/', Home::class, 'index')
            ->get('/home/@userId:([0-9]+)', Home::class, 'home')
            ->get('/list/user.html', Home::class, 'get')
            ->post('/user', Home::class, 'post');
    }
}