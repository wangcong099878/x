<?php
/**
 * Created by PhpStorm.
 * User: wangcong
 * Date: 2017/05/18
 * Time: 22:33
 */

namespace Controller\api;

use Lib\Response as res;

class goods
{

    public function get(){
        res::ajaxReturn([],200,"请求成功");
    }


    public function getList()
    {
        $result = [
            [],
        ];


        res::ajaxReturn([], 200, "请求成功");
    }

}