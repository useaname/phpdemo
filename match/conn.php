<?php
$uname = "root";
$host = "127.0.0.1:3306";
$pwd = "root";

$link = mysql_connect($host,$uname,$pwd);
mysql_query("set names `utf8");
mysql_query('use `match');
?>
