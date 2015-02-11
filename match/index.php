<?php
header('Content-Type:text/html;charset=utf-8');
require("conn.php");
//mysql_query('use `match`');

$res = mysql_query('select * from select_match');
echo '<table border='1'>';
echo '<tr><th>match_id</th><th>player1</th><th>player2</th><th>match_time</th><th>match_result</th><th>match_place</th></tr>';
while($row = mysql_fetch_assoc($res)){
	echo "<tr><td>{$row['match_id']}</td><td>{$row['player_1']}</td><td>{$row['player_2']}</td><td>{$row['match_time']}</td><td>{$row['match_result']}</td><td>{$row['match_address']}</td></tr>";
}
echo '</table>';
echo '<a href="detail.php">查看详细</a>';
echo '<br>';
echo '<a href="add.php">新增</a>';
echo '<br>';

