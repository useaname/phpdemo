<?
$name = 'Lee';
$j = 'Hello';
$str = $j.$name;
echo $str;

$i = 10;
$s1 = "abcdef$i";
$s2 = 'abcdef';
$s3 = <<<ABCD1
你好啊汪汪汪汪$i......
<br />你好你好你好
<br /> 哈哈哈哈哈哈哈哈
<script>
alert("hello");
</script>
ABCD1;


echo $s1;
echo $s2;
echo $s3;