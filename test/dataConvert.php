<?php
//类型转换


/****转换为字符串****/
echo "/****转换为整形****/<hr />";
//数值类型
$a = 10;
$b = 3.1415;
echo $a,$b;

//布尔类型
$c = true;
$d = false;
echo $c,$d;

echo "<br />";

//数组类型
$e = array('language' =>'php' ,'server' => 'apache' );
echo $e;
echo "<br />";

//资源类型
$link = mysql_connect('127.0.0.1','root','root');
var_dump($link);
echo $link;
echo "<br />";

//null
echo null; //空字符串

/****转换为整形****/
echo 	"/****转换为整形****/<hr />";
