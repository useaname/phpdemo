<?php
$name =  array('a'=>'hongzi','b'=>'hanfeizi','c'=>'laozi','d'=>'sunzi','e'=>'zhuangzi','f'=>'memgzi');
while(list($key,$value) = each($name)){
	var_dump($key,$value);
	echo "<br />";
}