<?php
/**
 * Created by PhpStorm.
 * User: wangcong
 * Date: 2017/05/18
 * Time: 10:00
 */

namespace Process;

class first
{
    public static function run()
    {
        if (PHP_SAPI != 'cli') {
            //处理前置业务
            header("Content-Type: text/html; charset=UTF-8");
        }
        //所有的钩子写在这里
        //echo "我在最前面执行了";
    }
}