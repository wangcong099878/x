<?php
/**
 * Created by PhpStorm.
 * User: wangcong
 * Date: 2017/05/17
 * Time: 21:33
 */

namespace Controller;

use Medoo\Medoo;

class test
{

    public function testgoto()
    {
        //并发中使用
        $a = 0;
        $sign = 0;    //定义一个尝试超时时间
        a:
        $a++;
        $sign++;


        if ($a < 10) {
            sleep(1); //停顿1秒
            goto a;
        }

        echo $a;
    }

    public function testcli($pps, $nginx)
    {
        var_dump($pps);
        var_dump($nginx);
    }

    public function index()
    {
        echo "test.index";
    }

    public function testlib()
    {
        $tools = new \Lib\tools();
        $tools->show();


        //echo '234235675xvdffd6';
        //如果传递  数值类型会自动转换
        //var_dump($ppx);
        //echo 123456;
        //p($_REQUEST);
        //直接实例化    不用上面生命use    不过建议最好use代码易读
        //$hello = new \Hello\Hello();
        //$hello->say_hello();
    }

    public function testdb()
    {

        /*        $database = new Medoo([
                    // Started using customized DSN connection
                    'dsn' => [
                        // The PDO driver name for DSN driver parameter
                        'driver' => 'mydb',
                        // The parameters with key and value for DSN
                        'server' => '12.23.34.45',
                        'port' => '8886'
                    ],
                    // [optional] Medoo will have different handle method according to different database type
                    'database_type' => 'mysql',

                    'username' => 'your_username',
                    'password' => 'your_password'
                ]);

                // The final DSN connection string will be generated like this
                //mydb:server=12.23.34.45;port=8886*/

        // Initialize
        $database = new Medoo([
            'database_type' => 'mysql',
            'database_name' => 'tc',
            'server' => 'localhost',
            'username' => 'root',
            'password' => '',

            /*            // [optional]
                        'charset' => 'utf8',
                        'port' => 3306,

                        // [optional] Table prefix
                        'prefix' => 'PREFIX_',

                        // [optional] Enable logging (Logging is disabled by default for better performance)
                        'logging' => true,

                        // [optional] MySQL socket (shouldn't be used with server and port)
                        'socket' => '/tmp/mysql.sock',

                        // [optional] driver_option for connection, read more from http://www.php.net/manual/en/pdo.setattribute.php
                        'option' => [
                            PDO::ATTR_CASE => PDO::CASE_NATURAL
                        ],

                        // [optional] Medoo will execute those commands after connected to the database for initialization
                        'command' => [
                            'SET SQL_MODE=ANSI_QUOTES'
                        ]*/
        ]);

        // Enjoy
        $database->insert('account', [
            'user_name' => 'foo',
            'email' => 'foo@bar.com'
        ]);

        $data = $database->select('account', [
            'user_name',
            'email'
        ], [
            'id' => 1
        ]);

        echo json_encode($data);

        #where语法


    }
}