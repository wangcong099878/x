<?php

//数据库连接.....
$sql = "select * from `user` limit 0,500000000";
$stat = $pdo->query($sql);
$data = $stat->fetchAll();  //mysql buffered query遍历巨大的查询结果导致的内存溢出

var_dump($data);

//yield方式获取  数据库连接.....
function get()
{
    $sql = "select * from `user` limit 0,500000000";
    $stat = $pdo->query($sql);
    while ($row = $stat->fetch()) {
        yield $row;
    }
}

//可以在获取第一行后立即对结果集进行操作
foreach (get() as $row) {
    var_dump($row);
}