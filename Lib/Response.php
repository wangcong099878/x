<?php

/**
 * 请求返回
 * @author cason <wangcong66688@sina.cn>
 */
namespace Lib;

class Response {

    public static function ajaxReturn($result = array(), $code = '200', $message = null, $options = array())
    {
        $result = ['code' => ['errcode' => (string) $code, 'errmsg' => $message], 'data' => $result];
        if (is_array($options)) {
            $result = array_merge($options, $result);
        }
        header('Content-Type: application/javascript; charset=utf-8');
        exit(json_encode($result));
    }

}
