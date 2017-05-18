<?php

namespace Controller;

use Controller\base;

class index extends base
{

    /**
     * http://127.0.0.1:8091/index/index?pps=1
     * http://127.0.0.1:8091/index/index/pps/1
     * http://127.0.0.1:8091/index/index/pps/1.html
     * @param type $ppx
     */
    public function index($pps,$name="wangcong")
    {

        var_dump($pps);

        var_dump($name);

        echo "index.index";
    }


    public function show()
    {
        echo "index.show";
    }


}
