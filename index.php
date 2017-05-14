<?php

/**
 * 框架入口文件
 */
use Hello\Hello,
    OSS\OssClient;

require './vendor/autoload.php';
include 'autoload.php';           //引入框架文件
//use My\Full\Classname as Another, My\Full\NSname;  
ini_set("display_errors", "On");
error_reporting(E_ALL | E_STRICT);
set_time_limit(0);
ini_set("memory_limit", "1000M");



//

/* echo md5(56976073);

  exit; */

//echo 6666688;
//全局对象池
$objList = [];



//echo 99999;exit;
#手动执行一个控制器
//$page = (new \Controller\page())->run('11111');
//exit;
#使用composer
//$hello = new Hello();
//$hello->say_hello();

/* class nginx {

  public function run($id, $name)
  {
  return $id . $name;
  }

  } */

X::route();
