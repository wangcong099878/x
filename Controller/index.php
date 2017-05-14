<?php

namespace Controller;

use Controller\base;

class index extends base {

    /**
     * http://192.168.245.208:9588/index/index/ok/1/nginx/1
     * http://192.168.245.208:9509/index/index/ok/1/nginx/1
     * http://192.168.245.208:9509/index/index/ok/1/nginx/1/ppx/1
     * http://192.168.245.208:9509/index/index/ok/1/nginx/1/ppx/1?name=1
     * 
     * http://192.168.245.208:9509/index/index/ok/1/nginx/1.html?np=999999
     * http://192.168.245.208:9588/index/index/ok/1/nginx/1.html
     * @param type $ppx
     */
    public function index(int $ppx)
    {
        //如果传递  数值类型会自动转换
        var_dump($ppx);
        echo 123456;
        p($_REQUEST);
    }

}
