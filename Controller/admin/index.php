<?php
/**
 * Created by PhpStorm.
 * User: wangcong
 * Date: 2017/05/18
 * Time: 13:58
 */

namespace Controller\admin;


class index
{


    public function index()
    {

        echo "admin.index.index";

    }

    //http://127.0.0.1:8091/admin.php?s=/index/show/pxx/2222
    public function show($pxx = 111)
    {
        echo $pxx;
    }


}
