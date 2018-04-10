<?php

namespace linger\framework;

final class Application
{
    /** @var Application */
    protected static $_app;

    /** @var Config */
    protected $_config;

    /** @var Router */
    protected $_router;

    /** @var Dispatcher */
    protected $_dispatcher;

    /**
     * Application constructor.
     * @param array $config
     */
    public function __construct(array $config)
    {
    }

    /**
     * @return Application
     */
    public static function app()
    {
    }

    /**
     * @param array $bootclass
     * @return Application
     */
    public function init(array $bootclass)
    {
    }

    public function run()
    {
    }

    /**
     * @return Config
     */
    public function getConfig()
    {
    }

    /**
     * @return Router
     */
    public function getRouter()
    {
    }

    /**
     * @return Dispatcher
     */
    public function getDispatcher()
    {
    }
}

interface Bootstrap
{
    public function bootstrap(Application $application);
}

final class Config implements \Iterator, \ArrayAccess, \Countable
{
    /** @var Config */
    protected static $_instance;

    /** @var array */
    protected $_config;

    public function __construct()
    {
    }

    private function __clone()
    {
    }

    private function __sleep()
    {
    }

    private function __wakeup()
    {
    }

    public function get()
    {
    }

    public function set()
    {
    }

    public function has()
    {
    }

    public function del()
    {
    }

    public function count()
    {
    }

    public function rewind()
    {
    }

    public function next()
    {
    }

    public function current()
    {
    }

    public function key()
    {
    }

    public function valid()
    {
    }

    public function clear()
    {
    }

    public function offsetGet($offset)
    {
    }

    public function offsetSet($offset, $val)
    {
    }

    public function offsetExists($offset)
    {
    }

    public function offsetUnset($offset)
    {
    }

    public function __get()
    {
    }

    public function __set()
    {
    }

    public function __isset()
    {
    }

    public function __unset()
    {
    }

    public function __destruct()
    {
    }
}

abstract class Controller
{
    /** @var Request */
    protected $_request;

    /** @var Response */
    protected $_response;

    /** @var View */
    protected $_view;

    private function __construct()
    {
    }

    protected function _init()
    {
    }

    /**
     * @return Request
     */
    protected function getRequest()
    {
    }

    /**
     * @return Response
     */
    protected function getResponse()
    {
    }

    /**
     * @return View
     */
    protected function getView()
    {
    }
}

class Dispatcher
{
    /** @var Dispatcher */
    protected static $_instance;

    /** @var Router */
    private $_router;


    /** @var Request */
    private $_request;

    private function __construct()
    {
    }

    /**
     * @return RouterRule
     */
    public function findRouter()
    {
    }

    /**
     * @return Request
     */
    public function getRequest()
    {
    }
}

class Request
{
    protected static $_instance;
    protected $_method;
    protected $_uri;
    protected $_cookie;
    protected $_query;
    protected $_param;
    protected $_post;
    protected $_files;

    public function __construct()
    {
    }

    /**
     * @return string
     */
    public function getMethod()
    {
    }

    /**
     * @return string
     */
    public function getUri()
    {
    }

    /**
     * @param string|null $key
     * @param mixed $default
     * @param callable|null $filter
     * @return mixed
     */
    public function getQuery(string $key = null, $default = null, callable $filter = null)
    {
    }

    /**
     * @param string|null $key
     * @param mixed $default
     * @param callable|null $filter
     * @return mixed
     */
    public function getPost($key = null, $default = null, callable $filter = null)
    {
    }

    /**
     * @param string|null $key
     * @param mixed $default
     * @param callable|null $filter
     * @return mixed
     */
    public function getParam($key = null, $default = null, callable $filter = null)
    {
    }

    /**
     * @param string|null $key
     * @return mixed
     */
    public function getFile($key = null)
    {
    }

    /**
     * @param string|null $key
     * @return mixed
     */
    public function getCookie($key = null)
    {
    }

    public function isAjax()
    {
    }

    public function isPost()
    {
    }

    public function isGet()
    {
    }

    public function isCli()
    {
    }

    /**
     * @param string $method
     * @return Request
     */
    public function setMethod(string $method)
    {
    }

    /**
     * @param string $uri
     * @return Request
     */
    public function setUri(string $uri)
    {
    }

    /**
     * @param array $param
     * @return Request
     */
    public function setParam(array $param)
    {
    }

    /**
     * @param array $post
     * @return Request
     */
    public function setPost(array $post)
    {
    }

    /**
     * @param array $query
     * @return Request
     */
    public function setQuery(array $query)
    {
    }
}

class Response
{
    protected static $_instance;
    protected $_header;
    protected $_status;
    protected $_body;

    private function __construct()
    {
    }

    public function status($code)
    {
    }

    /**
     * @param $key
     * @param $val
     * @return Response
     */
    public function header($key, $val)
    {
    }

    /**
     * @param $content
     * @return Response
     */
    public function body($content)
    {
    }

    public function send()
    {
    }

    /**
     * @param $obj
     * @return Response
     */
    public function json($obj)
    {
    }
}

class Router
{
    protected static $_instance;
    protected $_rules;

    public function __construct()
    {
    }

    /**
     * @param RouterRule $rule
     * @return Router
     */
    public function add(RouterRule $rule)
    {
    }

    /**
     * @param string $uri
     * @param string $class
     * @param string $classMethod
     * @return Router
     */
    public function get(string $uri, string $class, string $classMethod)
    {
    }

    /**
     * @param string $uri
     * @param string $class
     * @param string $classMethod
     * @return Router
     */
    public function put(string $uri, string $class, string $classMethod)
    {
    }

    /**
     * @param string $uri
     * @param string $class
     * @param string $classMethod
     * @return Router
     */
    public function post(string $uri, string $class, string $classMethod)
    {
    }

    /**
     * @param string $uri
     * @param string $class
     * @param string $classMethod
     * @return Router
     */
    public function delete(string $uri, string $class, string $classMethod)
    {
    }
}

class RouterRule
{
    private $_request_method;
    private $_uri;
    private $_class;
    private $_class_method;

    public function __construct()
    {
    }

    public function getRequestMethod()
    {
    }

    public function getUri()
    {
    }

    public function getClass()
    {
    }

    public function getClassMethod()
    {
    }
}

class View
{
    protected $_vars;
    protected $_tpl_dir;

    public function __construct()
    {
    }

    public function setScriptPath($path)
    {
    }

    public function getScriptPath()
    {
    }

    public function display($tpl)
    {
    }

    public function render($tpl)
    {
    }

    /**
     * @return array
     */
    public function getVars()
    {
    }

    /**
     * @param $key
     * @param $val
     * @return View
     */
    public function assign($key, $val)
    {
    }
}
