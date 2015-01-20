<?
function sayHello($name){
	echo 'hello,'.$name;
}

sayHello('Jim');
echo '<hr />';
//可变函数
function sayHello1($name){
	echo 'hello,'.$name;
}
$fun_say = 'sayHello1';
$fun_say('Tome');
//匿名函数(必包函数)
$sayHi = function ($name){
	echo 'hi'.$name;
};

var_dump($sayHi);
echo '<hr />';
$sayHi('PHP');