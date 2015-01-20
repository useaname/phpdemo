<?php
function f( $n){
	if($n == 1){
		return 1;
	}elseif ($n == 2) {
		return 1;
	}

	return f($n - 1) + f($n - 2);
}


var_dump(f(5));

echo '<hr />';

function cb2($n){
	$before_1 = 1;
	$before_2 = 1;

	if ($n == 1) {
		return $before_2;
	}elseif ($n == 2) {
		return $before_1;
	}

	for ($i=3; $i <=$n ; $i++) { 
		$now = $before_1 +$before_2;
		$before_2 = $before_1;
		$before_1= $now;
	}
	return $now;
}

echo cb2(5);

echo '<hr />';

var_dump(function_exists('abs'));
var_dump(function_exists('ath'));
var_dump(function_exists('function'));