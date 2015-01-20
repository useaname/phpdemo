<?php
header('Content-Type:text/html;charset=utf-8');
for ($i=0,$j=10; $i <=$j ; $i++,$j--) { 
	echo $i,'--',$j;
	echo '<br />';
}
echo "<hr />";
for ($i=0,$j=10; $i >= $j,$i<=$j; $i++,$j--) { 
	echo $i,'--',$j;
	echo '<br />';
}
echo "<hr />";
for ($i=0,$j=10; $i<=$j,$i >= $j; $i++,$j--) { 
	echo $i,'--',$j;
	echo '<br />';
}
echo "<hr />";
echo '<hr />';
// for (;  ; ) { 
// 	echo 'str'.'<br />';
// }
echo "<br />替代语法：<br />";
for ($i=0; $i < 10; $i++):
	echo $i,'<br/>';
endfor;
echo '<br/>计算平均分:<br />';
$key = 0;
$chinese = array(89 ,78,60);
$math = array(70,67,99);


$avg = ($chinese[$key] + $math[$key]) / 2;

echo $chinese[$key],'&nbsp',$math[$key],'&nbsp',$avg;
echo '<br />';

var_dump($chinese[$key]); var_dump($math[$key]);
echo '<hr/>';
// while ($chinese[$key] >= $math[$key]) {
// 	++ $key;
// 	echo "sign:";
// 	var_dump($chinese[$key]); var_dump($math[$key]);
// 	var_dump($chinese[$key] >= $math[$key]);
// 	echo '<br />';
	
// 	echo 'Chinese',$chinese[$key],'Math',$math[$key],'<br />';
// 	$avg = ($chinese[$key] + $math[$key]) / 2;
// 	echo $chinese[$key],'&nbsp',$math[$key],'&nbsp',$avg;
// 	echo '<br />';
// }
echo '<hr />';
echo '语文','&nbsp','数学','&nbsp','平均分<br />';

do {
	$avg = ($chinese[$key] + $math[$key])/2;
	echo $chinese[$key],'&nbsp',$math[$key],'&nbsp',$avg,'<br />';
	//var_dump($chinese[$key] > 70);
	++$key;
} while ($chinese[$key] > 70);
?>
