<?php
header('Content-Type:text/html;charset=utf-8');
$id = $_POST['id'];
$sql = 'update select_match set';
if(!isset($id)){
  echo '缺少参数';
  die();
}
if(isset($_POST['p1'])){
	$sql .= " player_1={$_POST['p1']},";
}
if(isset($_POST['p2'])){
	$sql.=" player_2={$_POST['p2']},";
}
if(isset($_POST['time'])){
	$sql .=" match_time='{$_POST['time']}',";
}
if(isset($_POST['result'])){
	$sql .=" match_result='{$_POST['result']}',";
}
if (isset($_POST['place'])) {
	$sql .=" match_address={$_POST['place']}";
}
$sql .= " where match_id={$_POST['id']}";

require('conn.php');
if (!mysql_query($sql)) {
	echo '修改失败！';
	echo '<br/>';
	echo mysql_errno();
	echo '<br/>';
	echo mysql_error().'-->'.$sql;
	die();
}
header('Location:detail.php');
