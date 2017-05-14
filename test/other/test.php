<?php

/**
 * http://blog.csdn.net/qq_20329253/article/details/52202811
 * //https://github.com/yeaha/owl.git
 * 这是个很好地例子：   yield类似于return Generator对象
  1、yield作为语句（类似return语句），会返回$i给调用者。
  2、yield作为表达式。获取send函数传递值，赋值给$cmd。
  3、实现Generator对象和generator函数的通信。这个很重要。应该能实现很多generator的交互.
 * @return type
 */
function gen()
{
    for ($i = 1; $i <= 100; $i++) {
        echo "gen函数 \n";
        $cmd = (yield $i);    //跳出
        sleep(10);
        echo $cmd."\n";
        
        if ($cmd == 'stop') {
            return;
        }
    }
}

$gen = gen();





/**
 * 流程
 * Generators::rewind() 重置迭代器

 Generators::valid() 检查迭代器是否被关闭
 Generators::current() 返回当前产生的值
 Generators::next() 生成器继续执行

 Generators::valid() 
 Generators::current() 
 Generators::next() 
 ...
 Generators::valid() 直到返回 false 迭代结束
 */
$i = 0;
foreach ($gen as $item) {
    
    
    
    
    echo $item . "\n";
    if ($i >= 10) {
        $gen->send('stop');
    }
    $i++;
}


echo "#####";