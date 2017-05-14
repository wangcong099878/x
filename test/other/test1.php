<?php

$Generatorg = call_user_func(function() {
    //yield就类似一个断点
    $hello = (yield '[1yield] say hello <br />' . PHP_EOL);
    echo $hello . PHP_EOL;
    try {
        $jump = (yield '[2yield] 收到了，我是服务方啊  <br />' . PHP_EOL);
    } catch (Exception $e) {
        echo '[Exception]' . $e->getMessage() . PHP_EOL;
    }

    yield '不要多说了';
});

$hello = $Generatorg->current();
echo $hello;
$jump = $Generatorg->send('[3main] 你好，我是请求方收到请回。  <br />');
echo $jump;
$Generatorg->throw(new Exception('[4main] 好吧  我去  <br />'));

//双向通信
var_dump($Generatorg->current());
/*
 * output
 *
 * [yield] say hello
 * [main] say hello
 * [yield] I jump,you jump
 * [Exception][main] No,I can't jump
 */

