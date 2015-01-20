<?php
header('Content-Type:text/html;charset=utf-8');
$age = 10;
function outer(){
	$age = 10;
	$sayName = function () use($age){
		$age ++;
		echo '我是',$age;
	};
	$sayName();
	echo "<br />";
	echo $age;
}

outer();