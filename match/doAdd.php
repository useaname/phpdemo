<?php
header('Content-type:text/html;charset=utf-8');
$p1= $_POST['player1'];
$p2 = $_POST['player2'];
$time = $_POST['time'];
$res = $_POST['result'];
$place = $_POST['place'];

require('conn.php');
$result = mysql_query("insert into select_match (player_1,player_2,match_time,match_result,match_address) values(	'$p1','$p2','$time','$res','$place')");
if(!$result){
	echo '添加失败！';
	echo '<br/>';
	echo mysql_error();
	die();
}else{
	header('Location:index.php');
}
