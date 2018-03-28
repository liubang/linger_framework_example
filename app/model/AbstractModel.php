<?php

namespace model;

use Illuminate\Database\Capsule\Manager;
use Illuminate\Database\Eloquent\Model;
use linger\framework\Application;

abstract class AbstractModel extends Model
{
    /**
     * @var string
     */
    protected $table = '';

    /**
     * AbstractModel constructor.
     */
    public function __construct()
    {
        $this->init();
    }

    protected function init()
    {
        $config = Application::app()->getConfig()->get('db');
        $capsule = new Manager();
        // 创建连接
        $capsule->addConnection($config);
        // 设置全局静态可访问
        $capsule->setAsGlobal();
        // 启动Eloquent
        $capsule->bootEloquent();
    }
}