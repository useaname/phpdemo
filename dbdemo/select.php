<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php
$dbName = $_GET['dbName'];
$tbName = $_GET['tbName'];
?>
<title><?php echo "$dbName.$tbName"?></title>
</head>
<body>
<?php
require("conn.php");
$res = mysql_query("use `$dbName`");
var_dump($res);
if (!$res && !$link) {
	echo "mysql_errno().mysql_error()";
	die();
}
//显示表中前100条数据
$sql = "desc $tbName";
$res = mysql_query($sql,$link);
echo "<table border='1'>";
echo "<tr>";
//显示列名 
while ($row = mysql_fetch_assoc($res)) {
	echo "<td>{$row['Field']}</td>";
}
echo "</tr>";
//循环取出数据
$sql = "select * from $tbName limit 100";
$res = mysql_query($sql,$link);
while ($row = mysql_fetch_assoc($res)) {
	echo "<tr>";
	foreach ($row as $key => $value) {
		echo "<td>";
		echo $value === ' '? '&nbsp' : ($value === NULL?'NULL':$value);
		echo "</td>";
	}
	echo "</tr>";
}
echo "</table>";
?>
</body>
</html>
