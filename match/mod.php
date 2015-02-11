<?php
header('Content-Type:text/html;charset=utf-8');
$id = $_GET['id'];
require('conn.php');
$res = mysql_query("select * from select_match where match_id=$id");
if(!$res){
	echo '查询失败！<br />';
	echo mysql_errno().':'.mysql_error();
	die();
}
$row = mysql_fetch_assoc($res);
$str =<<<HTML
<form method="post" action="doMod.php">
选手1:<input name="p1" value="{$row['player_1']}" /><br/>
选手2:<input name="p2" value="{$row['player_2']}" /><br/>
比赛时间:<input name="time" value="{$row['match_time']}" /><br />
结果:<input name="result" value="{$row['match_result']}" /><br />
地点:<input name="place" value="{$row['match_address']}" /><br />
<input type="hidden" name="id" value="{$row['match_id']}" />
<input type="submit" />
</form>
HTML;

echo $str;
