<?php

class X {

    //全局配置
    public static $config = [];

    public static function cliRoute()
    {
        
    }

    public static function route()
    {

        echo PHP_SAPI;

        //默认指向controller下的index方法
        //[REQUEST_URI] => /NGINX?name=123456
        // [QUERY_STRING] => s=/NGINX&name=123456
        //REQUEST_URI  
        //p($_SERVER);
        //p($_REQUEST);
        //去除伪静态.html
        $_REQUEST['s'] = str_replace('.html', "", $_REQUEST['s']);

        $s = isset($_REQUEST['s']) ? $_REQUEST['s'] : '';

        $t = explode('/', $s);
        $controller = isset($t[1]) && $t[1] != '' ? $t[1] : "index";
        $action = isset($t[2]) && $t[2] != '' ? $t[2] : "index";

        if (count($t) > 3) {
            unset($t[0]);
            unset($t[1]);
            unset($t[2]);

            // 解析剩余的URL参数
            $var = array();

            preg_replace_callback('/(\w+)\/([^\/]+)/', function($match) use(&$var) {
                $var[$match[1]] = strip_tags($match[2]);
            }, implode('/', $t));
            $_REQUEST = array_merge($var, $_REQUEST);
        }

        self::init($controller, $action, $_REQUEST);
    }

    public static function run($controller, $action, $param)
    {

        $objPath = 'Controller\\' . $controller;

        $obj = new $objPath();

        $reflector = new ReflectionObject($obj);

        /* $methods = array_column((array) $reflector->getMethods(), 'name');
          echo "<pre>"; */
        foreach ($reflector->getMethods() as $v) {
            $methods[] = $v->name;
        }

        if (!in_array($action, $methods)) {
            die("未在{$controller}找到{$action}方法");
        }

        $parameters = $reflector->getMethod($action)->getParameters();
        //构造参数
        //$request = is_cli ? $request : $_REQUEST;
        $data = [];
        foreach ($parameters as $v) {
            $data[] = isset($param[$v->name]) ? $param[$v->name] : '';
        }
        return call_user_func_array(array($obj, $action), $data);
    }

    /**
     * 
     * @param type $controller
     * @param type $action
     * @param type $param
     */
    public static function init($controller, $action, $param)
    {
        self::run($controller, $action, $param);
    }

    /**
     * 根据命名空间加载文件
     * @param type $class
     */
    public static function classLoader($class)
    {
        $path = str_replace('\\', DIRECTORY_SEPARATOR, $class);

        ///mnt/hgfs/phpwork/pro/tc/Controller/page.php
        $file = __DIR__ . '/' . $path . '.php';
        if (file_exists($file)) {
            require_once $file;
        } else {
            die("未找到该类：" . $file);
        }
    }

}

function p($a)
{
    echo "<pre>";
    print_r($a);
}

spl_autoload_register(['X', 'classLoader']);
//加载函数库
//require_once __DIR__ . '/src/Qiniu/functions.php';

