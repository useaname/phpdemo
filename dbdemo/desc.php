<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php
$dbName = $_GET["dbName"];
$tbName = $_GET["tbName"];
?>
<title><?php echo $tbName."表结构"?></title>
</head>

<body>
<?php
require("conn.php");
$sql = "use $dbName";
mysql_query($sql,$link);
$sql = "desc $tbName";
$res = mysql_query($sql,$link);
var_dump($res);
echo "$sql".mysql_error();
//显示表结构
echo "<table border='1'>";
echo "<tr>";
echo "<td>Field</td><td>Type</td><td>Null</td><td>Default</td><td>Extra</td>";
echo "</tr>";
while ($row = mysql_fetch_assoc($res)) {
	echo "<tr>";
	echo "<td>{$row['Field']}</td><td>{$row['Type']}</td><td>{$row['Null']}</td><td>{$row['Default']}</td><td>{$row['Extra']}</td>";
	echo "</tr>";
}
echo "</table>";
?>
</body>
</html>
