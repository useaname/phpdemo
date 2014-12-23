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
<?php
	$n1 = $_POST['n1'];		//昵称（姓名）
	$n2 = $_POST['n2'];		//标题
	$n3 = $_POST['n3'];		//内容

	require("conn.php");	//引入一个文件，该文件中准备好了的操作数据库的基本语句

	$sql = "insert into liuyanbiao(xingming,biaoti, fabushijian, neirong)values('$n1','$n2',now(),'$n3');";
	$result = mysql_query($sql);
	if($result)
	{
			//echo "留言成功！<br /><a href='index.php'>返回首页</a>";
			header("location:index.php");	//让“页面”转向到“index.php”——后台页面转向（跳转/链接）
											//header("location:要跳转去的页面地址")
	}
	else
	{
		echo "留言失败，非常抱歉，请跟管理员联系， 参考信息：" . mysql_error();
	}

?>
</body>
</html>
