<?php
require('conn.php');
$sql = 'delete from select_match where match_id='.$_GET['matchId'];
$res = mysql_query($sql);
if(!$res){
	echo '删除失败！';
	echo '<br/>';
	echo mysql_errno();
	die();
}else{
	header('Location: detail.php');
}
