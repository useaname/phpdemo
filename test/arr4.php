<?php
$name =  array('a'=>'hongzi','b'=>'hanfeizi','c'=>'laozi','d'=>'sunzi','e'=>'zhuangzi','f'=>'memgzi');
while($ele = each($name)){
	$key = $ele['key'];
	$value = $ele['value'];
	var_dump($key,$value);
	echo '<br />';
}
//reset($name);
list($str1) = $name;
var_dump($str1);

$names = array('a','b','c');

echo '<hr />';
list($v1,$v2,$v3) = $names;
var_dump($v1,$v2,$v3);

// list($v1) = $names;
// var_dump($v1);

