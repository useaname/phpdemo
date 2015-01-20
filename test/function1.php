<?

// function say($name){
// 	echo "hi,$name";
// }

// say();

//默认为值传递

// function sayHello($name){
// 	$name .='1016';
// 	echo "hello,$name";
// }

// $real_name = 'php';
// sayHello($real_name);
// echo '<br />';
// var_dump($real_name);

// //引用传递
// //会触发一个语法错误
// function sayHello($name){
// 	$name .='1016';
// 	echo "hello,$name";
// }
// $real_name = 'php';
// sayHello(& $real_name);
// echo "<br />";
// var_dump($real_name);

function sayHello(& $name){
	$name .= '1016';
	echo "hello,$name";
}
$real_name = 'PHP';
sayHello($real_name);
echo '<br />';
var_dump($real_name);
