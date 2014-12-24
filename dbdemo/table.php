<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php
$dbName = $_GET['dbName'];
?>
<title><?php echo '表'.$dbName?></title>
</head>

<body>
<?php
require('conn.php');
$sql = "use $dbName";
$res = mysql_query($sql,$link);
if(!$res){
	echo "sql失败:".$sql."<br />";
	echo "错误代码:".mysql_errno()."<br />";
	echo "错误信息:".mysql_error()."<br />";
	die();
}

//显示所有表
$sql = "show tables";
$res = mysql_query($sql,$link);
if(!$res){
	echo "sql失败:".$sql."<br />";
	echo "错误代码:".mysql_errno()."<br />";
	echo "错误信息:".mysql_error()."<br />";
	die();
}
echo "<table border='1'>";
while ($row = mysql_fetch_assoc($res)) {
	echo "<tr>";
	echo "<td>";
	echo "{$row['Tables_in_'.$dbName]} |"."<a href='desc.php?tbName={$row['Tables_in_'.$dbName]}&dbName=$dbName' >结构</a> | <a href='select.php?tbName={$row['Tables_in_'.$dbName]}&dbName=$dbName' >数据</a>";
	echo "</td>";
	echo "</tr>";
}
echo "</table>"
?>
</body>
</html>
