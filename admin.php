<?php

require './vendor/autoload.php';
include 'autoload.php';           //引入框架文件


define('CONTROLLER_PATH', 'admin');

//ini_set("display_errors", "On");
//error_reporting(E_ALL | E_STRICT);


X::route();