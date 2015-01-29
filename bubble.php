<?php
$arr = array(7,12,34,6,47,0,37,88);

for($i = 1,$len = count($arr);$i<  $len ; $i++){
	for ($j=0; $j < $len - 1 - $i; $j++) { 
		if ($arr[$j] > $arr[$j + 1]) {
			$temp = $arr[$j];
			$arr[$j] = $arr[$j + 1];
			$arr[$j + 1] = $temp;
		}
	}
}

var_dump($arr);