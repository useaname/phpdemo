<?php
//数据类型
header("Content-Type:text/html;charset=utf-8");
echo "<pre>";
echo PHP_INT_MAX,'---',PHP_INT_SIZE;
echo "<br />";
echo 012; //8进制
echo "<br />";
echo 0x12;//16进制
echo "</pre>";
echo "<hr />";
echo "10-->2:<br />";
echo decbin(20);
echo '浮点数<br />:';
$f1 = 3.5;
$f2 = 10/3;

var_dump($f1,$f2);
echo "<hr />";
var_dump($f1 == $f2);
echo "<hr />";
echo $f1 == $f2;
echo "<hr />";
//字符串类型
echo "字符串类型";
$a = "mysql";
$b = "php";
echo "<hr />";

echo "i like $a and $b";
echo "<hr />";
echo 'i like $a and $b';
echo "<hr />";
echo "<a href='a.a/test' onclick='javascript:alert(\"hello\");return false;'>AAAAA</a>";


echo "<hr />";

$content =<<<str
<table border="1" align="center" bgcolor="red">
	<tr>
		<th>Name</th>
	</tr>
	<tr>
		<td>Jim</td>
	</tr>
</table>
str;

echo $content;
//数组
echo "数组";
echo "<pre>";
$arr1  = array('php','mysql','apache' );
var_dump($arr1);
echo "</pre>";


echo "<pre>";
//声明方法1
$arr1  = array('php','mysql','apache1' );
print_r($arr1);
echo "</pre>";
//声明方法2
$arr2[0] = 'php';
$arr2[1] = 'javascript';
$arr2[2] = 3.14;

echo "<hr/><pre>";
var_dump($arr2);
echo "</pre>";

$arr3['a'] = 'a';
$arr3['c'] = 'c';
$arr3[1] = '1';
$arr3['我我吃']='wwc';

echo "<hr/><pre>";
var_dump($arr3);
echo "</pre>";
echo "<hr /><pre>";
$arr4 = array(
	'0' => 'tomcat',
	'1' => 'CentOS',
	'2' => 'PHP'
);
var_dump($arr4);
echo "</pre>";
//删除数组
unset($arr4);
var_dump($arr4);//Undefined variable
unset($arr3['c']); //删除arr3下标为c的元素
echo "<hr/><pre>";

var_dump($arr3);//下标为c的已经删除
echo "</pre>";
//对象
echo '对象';
/**
* 
*/
class Person
{
	var $name = 'Jim';
	var $age = 19;

	public function say(){
		echo 'hello,baby';
	}

}

$p = new Person;
var_dump($p);
?>
