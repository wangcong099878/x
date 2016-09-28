<?php

/**
 * 框架入口文件
 */
use Hello\Hello;
use OSS\OssClient;

//use My\Full\Classname as Another, My\Full\NSname;  
ini_set("display_errors", "On");
error_reporting(E_ALL | E_STRICT);
set_time_limit(0);
ini_set("memory_limit", "1000M");
require './vendor/autoload.php';


//cli环境解析参数
//$str = "first=value&arr[]=foo+bar&arr[]=baz";
/* $str = "sfds";
  parse_str($str, $output);

  print_r($output); */


//判断是否是cli
//echo PHP_SAPI=='cli';
//php index.php -a=1 -b=2
//获取 -a -b -c参数    php index.php controller action -a=1 -b=2
//$args = getopt('-');
//print_r($args);
//print_r($argc); //CLI下获取参数的数目，最小值为1
//print_r($argv); //CLI下传递给脚本的参数数组，第一个参数总是当前脚本的文件名，因此 $argv[0] 就是
//$argv[1] 控制器   $argv[2] 方法名   $argv[3]所有传递参数
//exit;
//echo 6666688;
//全局对象池
$objList = [];

include 'autoload.php';


$page = (new \Controller\page())->run();

#使用composer
$hello = new Hello();

$hello->say_hello();

class nginx {

    public function run($id, $name)
    {
        return $id . $name;
    }

}

$reflector = new ReflectionClass('nginx');

$parameters = $reflector->getMethod('run')->getParameters();

echo "<pre>";
print_r($parameters);

//构造参数
//$request = is_cli ? $request : $_REQUEST;

$request = [
    'id' => 1,
    'name' => 'wangcong'
];

$data = [];
//Loop through each parameter and get the type
foreach ($parameters as $param) {
    $data[] = isset($request[$param->name]) ? $request[$param->name] : '';
}

$objName = 'nginx';


$obj = new nginx();
echo call_user_func_array(array($obj, "run"), $data);




//function 
