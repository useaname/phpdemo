<?php

$str = "abc";

function foo(){
	global $str; //
	echo "$str";
}

foo();
?>