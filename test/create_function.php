<?php
$sayhello = create_function('$name','echo "hello $name";');
var_dump($sayhello);
$sayhello('php');


function demo(){
	return __FUNCTION__;
}
var_dump(demo());

echo '<hr />';
$name = 'Jim';
$say = function () use ($name){
	echo  "hi,$name";
};

$say();

echo '<hr />';
function outer(){
	$name = 'Tom';
	$sayName = function () use($name) {
		echo "1hi,$name";
	};
	$sayName();
}

outer();

//$sayName();