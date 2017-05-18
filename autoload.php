<?php

class X
{

    //全局配置
    public static $config = [];
    public static $controller;
    public static $action;

    public static function cliRoute()
    {

    }

    public static function route()
    {


        if (isset($_REQUEST['s'])) {
            $s = $_REQUEST['s'] = str_replace('.html', "", $_REQUEST['s']);
        } else {
            $s = $_REQUEST['s'] = "";
        }

        $t = explode('/', $s);
        self::$controller = isset($t[1]) && $t[1] != '' ? $t[1] : "index";
        self::$action = isset($t[2]) && $t[2] != '' ? $t[2] : "index";


        if (count($t) > 3) {
            unset($t[0]);
            unset($t[1]);
            unset($t[2]);

            // 解析剩余的URL参数
            $var = array();

            preg_replace_callback('/(\w+)\/([^\/]+)/', function ($match) use (&$var) {
                $var[$match[1]] = strip_tags($match[2]);
            }, implode('/', $t));
            $_REQUEST = array_merge($var, $_REQUEST);
        }

        self::init();
    }

    public static function init()
    {


        Process\first::run();

        //处理主要业务
        $result = self::run();

        Process\after::run();
        //处理后置业务
        //echo "载入其他处理钩子";
    }

    public static function run()
    {

        $objPath = 'Controller\\' . self::$controller;

        $obj = new $objPath();

        $reflector = new ReflectionObject($obj);

        foreach ($reflector->getMethods() as $v) {
            $methods[] = $v->name;
        }

        if (!in_array(self::$action, $methods)) {
            die("未在" . self::$controller . "找到" . self::$action . "方法");
        }

        $parameters = $reflector->getMethod(self::$action)->getParameters();

        $data = [];
        foreach ($parameters as $v) {
            $data[] = isset($_REQUEST[$v->name]) ? $_REQUEST[$v->name] : ($v->isDefaultValueAvailable() ? $v->getDefaultValue() : '');
        }
        return call_user_func_array(array($obj, self::$action), $data);
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
            //die("未找到该类：" . $file);
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

