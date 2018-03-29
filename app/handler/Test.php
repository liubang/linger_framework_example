<?php

namespace handler;

use linger\framework\Controller;

class Test extends Controller
{

    protected function _init()
    {
        $this->getView()->setScriptPath(\APP_PATH . 'app/view/');
    }

    public function testGet()
    {
        \var_dump($this->getRequest()->getMethod());
        \print_r($this->getRequest()->getQuery());
    }

    public function testPost()
    {
        \var_dump($this->getRequest()->getMethod());
        \print_r($this->getRequest()->getPost());
    }

    public function testPut()
    {
        \var_dump($this->getRequest()->getMethod());
        \print_r($this->getRequest()->getPost());
    }
}