<?php

namespace Controller;

class page {

    public function run(int $ppx = 123)
    {
        //如果传递  数值类型会自动转换

        var_dump($ppx);
        echo 123456;
    }

}
