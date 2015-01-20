<?php
$concat = function (){
	$arr = func_get_args();
	$str = '';
	for ($i=0,$len=count($arr); $i < $len; $i++) { 
		//echo $arr["$i"];
		//echo '<br/>';
		$str .= $arr["$i"];
	}
	return $str;
};

$res = $concat('b','abs(number)','huioo');
var_dump($res);

// $arr = array('b','abs(number)','huioo');
// $str ='';
// for ($i=0,$len=count($arr); $i < $len; $i++) { 
// 	//echo $arr["$i"];
// 	//echo '<br/>';
// 	$str .= $arr["$i"];
// }
// //echo $str;
// echo $i;
