<?php

require './vendor/autoload.php';
include 'autoload.php';           //引入框架文件

header('Access-Control-Allow-Origin: *');
define('CONTROLLER_PATH', 'api');

//ini_set("display_errors", "On");
//error_reporting(E_ALL | E_STRICT);


X::route();