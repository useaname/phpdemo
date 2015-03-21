<?php
/**
 * array_map函数 参数为数组的值
 * @var [type]
 */
$arr1 = Array(
	'a'=>'1',
	'b'=>'2',
	'c'=>'3'
	);

array_map(function($v){
	echo $v.'<br/>';
}, $arr1);


echo '---------------------------------------------';


$arr2 = Array(
	'a'=>'A1',
	'b'=>'B1',
	'c'=>'C1',
	'd'=>'D1'
	);

foreach ($arr2 as $key => $value) {
	$sql_str[]= "`".$key."`='".$value."'";
}
$sql = implode(',',$sql_str);

var_dump($sql);
echo '<br>'.$sql;
