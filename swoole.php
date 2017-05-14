<?php

ini_set("display_errors", "On");
error_reporting(E_ALL | E_STRICT);

require './vendor/autoload.php';
include 'autoload.php';
ini_set('date.timezone', 'Asia/Shanghai');
$http = new swoole_http_server("0.0.0.0", 9509);

$http->set(array(
    //'reactor_num' => 2, //reactor thread num  通过此参数来调节poll线程的数量，以充分利用多核
    'worker_num' => 16, //worker process num   设置启动的worker进程数量。swoole采用固定worker进程的模式。
        //'backlog' => 128, //listen backlog   此参数将决定最多同时有多少个待accept的连接，swoole本身accept效率是很高的，基本上不会出现大量排队情况。
        //'max_request' => 50, //此参数表示worker进程在处理完n次请求后结束运行。manager会重新创建一个worker进程。此选项用来防止worker进程内存溢出。
        //'dispatch_mode' => 1, //worker进程数据包分配模式 1平均分配，2按FD取摸固定分配，3抢占式分配，默认为取摸(dispatch=2)
        //'log_file' => './swoole.log', //指定swoole错误日志文件。在swoole运行期发生的异常信息会记录到这个文件中。默认会打印到屏幕。
));

//使用长连接连接到mongo
$http->on('request', function ($request, $response) {
    //请求过滤
    if ($request->server['path_info'] == '/favicon.ico' || $request->server['request_uri'] == '/favicon.ico') {
        return $response->end();
    }
    $request->get = isset($request->get) ? $request->get : [];
    $request->post = isset($request->post) ? $request->post : [];

    $_REQUEST = array_merge($request->get, $request->post);
    $_REQUEST['s'] = $request->server['path_info'];
    print_r($request->server);


    ob_start();
    X::route();
    $result = ob_get_contents();

    ob_end_clean();


    $response->end($result);
});

$http->start();
