<?php
function & f1(){
	$result = 10;
	return $result;
}
$value = & f1();
var_dump($value);
