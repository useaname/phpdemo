<?php
$name = Array('a'=>'hongzi','b'=>'hanfeizi','c'=>'laozi','d'=>'sunzi','e'=>'zhuangzi','f'=>'memgzi');
foreach($name as $key => $value){
	var_dump($key,$value);
	echo "<br />";
}
echo '<hr />';
echo reset($name);
echo '<hr />';
while(key($name) !== null){
	echo "string";
	echo 'key:',key($name),'<br />';
	echo 'value:',current($name),'<br />';

	next($name);
}