<?php
echo 10 % -3;
echo "<br />";
echo -10 % 3;
echo "<br />";
echo 10 / 2;
echo "<br />";
echo 8 % (-3);
echo "<br />";
echo 8 % -3;
echo "<br />";
echo $str = "hello world";
var_dump(strpos($str, 'hello'));
echo "<hr />";
if(strpos($str, 'hello') >= 0){
	echo 'yes';
}else{
	echo 'no';
}

$c = 5;
echo $c++ + $c++ + $c++;
$d = 5;
echo ++$d + ++$d + ++$d;