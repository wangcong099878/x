<?php

ini_set("display_errors", "On");
error_reporting(E_ALL | E_STRICT);
//set_time_limit(0);
//ini_set("memory_limit", "1000M");

require './vendor/autoload.php';
include 'autoload.php';

$_REQUEST['s'] = isset($argv[1]) ? $argv[1] : '';

X::route();
