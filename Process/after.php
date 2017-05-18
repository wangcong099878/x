<?php
/**
 * Created by PhpStorm.
 * User: wangcong
 * Date: 2017/05/18
 * Time: 10:01
 */

namespace Process;

class after
{
    public static function run()
    {

        echo "<pre>";
        var_dump(\X::$action);
        var_dump($_REQUEST);
        //所有最后的钩子写在这里
        //echo "我在最后面执行了";
    }
}