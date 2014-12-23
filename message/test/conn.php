<?php
	mysql_connect("localhost","root","root");	//连接或登录数据库系统
	mysql_query("set names utf8;");	//设定编码；mysql_query()用于执行sql语句
	mysql_query("use liuyanban;");	//使用某数据库
?>