<?php

namespace handler;

use linger\framework\Controller;
use model\UserModel;

class Home extends Controller
{

    public function _init()
    {
        $this->getView()->setScriptPath(\APP_PATH . 'app/view/');
    }

    public function index()
    {
        $this->getView()
            ->assign('title', '这是测试用的')
            ->assign('content', "测试文字")
            ->assign('arr', [
                ['name' => 'liubang', 'email' => 'it.liubang@gmail.com'],
                ['name' => 'zhangsan', 'email' => 'zhangsan@aaa.com'],
            ])
            ->display('home/index.phtml');
        \sleep(1);
    }

    public function home()
    {
        $userId = $this->getRequest()->getParam('userId');
        \var_dump($userId);
        $userId = $this->getRequest()->getParam('userId', 0, 'intval');
        \var_dump($userId);
    }

    public function post()
    {
        $name = $this->getRequest()->getPost('name', '', 'trim');
        $age = $this->getRequest()->getPost('age', 0, 'intval');
        $model = new UserModel();
        $id = $model->addUser([
            'name' => $name,
            'age'  => $age,
        ]);
        $this->getResponse()
            ->json(['status' => 1, 'code' => '0', 'data' => $id])
            ->send();
    }

    public function get()
    {
        $model = new UserModel();
        $this->getResponse()
            ->json($model->getUserInfo())
            ->send();
    }
}