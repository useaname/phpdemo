<?php
header('Content-Type:text/html; charset=utf-8');
$a = "abc".'<br />';
echo $a;
$a = "mysql";
echo $a.'<br />';
unset( $a); //释放变量a
echo $a.'<br />哈哈哈哈哈哈哈哈哈哈'; //输出变量a，提示 Undefined variable
//可变变量
$hello = 'word';
$$hello = "howareyou";
echo "$word<br />";
echo '$_SERVER:<br />';
echo "<pre>";
var_dump($_SERVER);
echo "</pre>";

//常量
echo '<br />定义常量<br />';
define('PATH','c:/windows');
echo PATH.'<br />';

//判断常量是否已经被定义
echo "判断常量是否已经被定义<br />";
echo '---------';
var_dump(defined('PATH'));
echo '-------';
var_dump(isset($PATH));
echo '-------';
if(defined('PATH')){
	echo "已定义！";
}else{
	echo "未定义！";
}
//预定义常量
echo '<pre>';
echo '打印常量：';
echo PHP_INT_MAX.'<br />';
echo PHP_VERSION;
echo DIRECTORY_SEPARATOR;
echo '</pre>';
//魔术常量 两个下划线开始，两个下划线结尾
echo '魔术常量：'.'<br />';
echo  __FILE__.'<br />';
echo __DIR__;
?>