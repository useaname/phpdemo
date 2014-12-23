<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>
<body>
<?php
require("conn.php");
//显示所有数据库
if($link){
	//echo '连接成功';
	$res = mysql_query("show databases",$link);
	//var_dump($res);
	echo "Database<br/>";
	while ($row = mysql_fetch_array($res)) {
		echo "<a href='table.php?dbName={$row['Database']}' > {$row['Database']}  </a> | 结构 | 定义 <br />";
	}
	mysql_free_result($res);
	mysql_close($link);
}else{
	echo '连接失败';
}
?>
</body>
</html>
