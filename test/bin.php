<?
header("Content-Type:text/html;charset=utf-8");
echo 7| (-3);
echo "<br />";
echo 1|1;
echo "<br />";
echo 1|0;
echo "<br />";
echo decbin(-3); 
echo "<br />";
echo 24|-13;
echo "<br />";
echo 33|-20;
echo "<br />";
echo count('abc');
echo "<hr />";
//三个数最大值
$numA = "2";
$numB = "77";
$numC = "4";
$max = $numA > $numB ? ($numA>$numC?$numA:$numC):($numB>$numC?$numB:$numC);
echo $max;

echo "<hr />";
echo "<h2>if else代替写法判断测试</h2>";
$score = "99";
if ($score == 100) {
	echo "A+";
}elseif ($score <= 100 && $score >= 90) {
	echo "A";
}elseif ($score >= 80 && $score <= 90) {
	echo "B";
}elseif($score >= 70 && $score <= 80){
	echo "C";
}elseif ($score >= 60 && $score <=70) {
	echo "D";
}
