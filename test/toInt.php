<?php
header("Content-Type:text/html;charset:utf-8");
$a = true;
$b = false;

var_dump(5+$a);
var_dump(5+$b);
echo "<hr />";
echo 5 + $a ."<br />";
echo 5 + $b ;

//字符串－－》 整形
echo "<hr />";
echo 10 + 'hello';
echo '<br />';
echo 10 + '54hello';
echo '<br />';
echo 10 + '3.4hello';
echo '<br />';
echo 10 + '3.4e1hello';
echo '<hr />';
echo getType(10);

echo setType($a,'int');

$str;
echo "<hr />str:";
echo isset($str);
$str1 = "str";
echo "<hr />str1:";

echo isset($str1);

echo "<hr />";

var_dump((int)true,(int)false);
$res = "4.444hello" + 1;
echo "<hr />";


var_dump($res);
$res2 = "4.0hello" + 1;
echo "<hr />";

var_dump($res2);
$res3 = "4.0e2hello" + 1;
var_dump($res3);
echo "<hr />";

var_dump((bool)0);
echo "<hr />";

var_dump((Bool)0);
echo "<hr />";
var_dump((boolean)0);
echo "<hr />";
var_dump((boolean)"0.");
echo "<hr />";
var_dump((boolean)"0");
echo "<hr />11";

$foo = "5hello";
var_dump(setType($foo,'int'));
$arr = array();
echo "<hr /> arr:";

var_dump((bool)$arr);
echo "<br />";
var_dump(empty($arr));