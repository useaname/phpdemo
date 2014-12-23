<?php
$a = $_POST['a'];
$b = $_POST['b'];
$c = $_POST['c'];
$d = $b * $b - 4*$a*$c;

if ($d > 0) {
	echo "有两个解";
	$jie1 = (-$b + pow($d, 0.5)) / (2*$a);
	$jie2 = (-$b -  pow($d, 0.5)) / (2*$a);
	echo "$jie1,$jie2";
}
if ($d == 0) {
	echo "有一个解";
	$jie1 = (-$b) / (2*$a);
	echo "$jie1";
}
if ($d < 0) {
	echo "无解";
}
?>