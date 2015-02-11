<?php
header('Content-Type:text/html;charset=utf-8');
require('conn.php');
$sql = 'select match_id,s1.stu_name p1,s2.stu_name p2,match_time `time`,match_result as `result` from select_match'.
	' left join select_student as s1'.
	' on select_match.player_1 = s1.id'.
	' left join select_student as s2 '.
	' on select_match.player_2 = s2.id';

$res = mysql_query($sql);
echo '<table border="1">';
while ($row = mysql_fetch_assoc($res)) {
	echo "<tr><td>{$row['p1']}</td><td>{$row['p2']}</td><td>{$row['time']}</td><td>{$row['result']}</td><td><a href='del.php?matchId={$row['match_id']}'>删除</a></td><td><a href='mod.php?id={$row['match_id']}'>修改</a></td></tr>";
}
echo '</table>';
