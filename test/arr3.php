<?php
$name = Array('a'=>'hongzi','b'=>'hanfeizi','c'=>'laozi','d'=>'sunzi','e'=>'zhuangzi','f'=>'memgzi');
foreach($name as $key => $value):
	var_dump($key,$value);
	echo '<br />';
	if ($key == 'c') {
		break;
	}
endForeach;
