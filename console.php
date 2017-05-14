<?php

ini_set("display_errors", "On");
error_reporting(E_ALL | E_STRICT);

require './vendor/autoload.php';
include 'autoload.php';

$_REQUEST['s'] = isset($argv[1]) ? $argv[1] : '';


//cli环境解析参数
//$str = "first=value&arr[]=foo+bar&arr[]=baz";
/* $str = "sfds";
  parse_str($str, $output);

  print_r($output); */


//判断是否是cli
//echo PHP_SAPI=='cli';
//php index.php -a=1 -b=2
//获取 -a -b -c参数    php console.php controller action -a=1 -b=2
//$args = getopt('-');
//print_r($args);
//print_r($argc); //CLI下获取参数的数目，最小值为1
//print_r($argv); //CLI下传递给脚本的参数数组，第一个参数总是当前脚本的文件名，因此 $argv[0] 就是
//$argv[1] 控制器   $argv[2] 方法名   $argv[3]所有传递参数
//exit;
#通过cli模式访问
//php console.php /index/index/name/1


X::route();


print_r($argv);
