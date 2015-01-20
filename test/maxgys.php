<?php
header("Content-Type:text/html;charset=utf-8");
$m = isset($_GET['m'])?$_GET['m']:12;
$n = isset($_GET['n'])?$_GET['n']:8;

if ($m > $n ) {
	$max = $m;
	$small = $n;
}else{
	$max = $n;
	$small = $m;
}
echo $m,'===',$n,'<hr />';
for ($d=$small;$d >= 1;$d--) { 
	if ($small % $d == 0 && $max % $d == 0) {
		echo $d;
		break;
	}
}
echo '<hr />';
echo  '辗转相除法（欧吉米的算法）：';
echo  '<hr />';
do {
	$mod = $m % $n;
	$m = $n;
	$n = $mod;
} while ( $mod != 0 );
echo "最大公约数为：$m";
?>
