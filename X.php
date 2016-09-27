<?php

class X {

    //装载所有已经实例化的类
    protected static $_classMap = [];
    protected static $_config = [];         //一些常量配置   控制器命名空间  model命名空间   当前环境执行的目录版本

    /**
     * 
     * @param type $className
     * @param type $param
     * @param type $flag
     * @return \className
     */

    public static function getObj($className = 'd_wm_wechat', $param = [], $flag = false)
    {
        if ($flag == true) {
            return new $className($param);
        }
        try {
            if (!isset(self::$_classMap[$className])) {
                self::$_classMap[$className] = new $className($param);
            }
        } catch (Exception $exc) {
            die($exc->getMessage());
        }

        return self::$_classMap[$className];
    }

    /**
     * 执行一次请求
     */
    public static function run()
    {
        /**
         * 可选执行流程组合
         */
        //过滤参数
        //中间件处理
        //执行请求
        //运行日志
    }

    /**
     * 初始化配置
     */
    public static function init()
    {
        
    }

    /**
     * 导入非命名空间的类
     */
    public static function import()
    {
        
    }

}
