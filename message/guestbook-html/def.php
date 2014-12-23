<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-cn">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>网页标题</title>
	<meta name="keywords" content="关键字列表" />
	<meta name="description" content="网页描述" />
	<link rel="stylesheet" type="text/css" href="" />
	<style type="text/css"></style>
	<script type="text/javascript"></script>
</head>
<body>
	<p>这里是添加数据的页面</p>
<?php
	mysql_connect("localhost","root","");	//连接或登录数据库系统
	mysql_query("set names utf8;");	//设定编码；mysql_query()用于执行sql语句
	mysql_query("use liuyanban;");	//使用某数据库
	$result = mysql_query("insert into liuyanbiao(xingming,biaoti, fabushijian, neirong)values('姓名4','标题4','2013-1-1','内容4....');");
	if($result)
	{
		echo "成功！";
	}
	else
	{
		echo "失败：" . mysql_error();
	}

?>
</body>
</html>
