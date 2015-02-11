<?php
header('Content-type:text/html;charset=utf-8');
$from =<<<HTML
<form method="post"  action="doAdd.php">
选手1<input name="player1" /><br/>
选手2<input name="player2" /><br/>
比赛时间<input name="time" /><br/>
比赛结果<input name="result" /><br/>
比赛地点<input name="place" /><br/>
<input type="submit" />
</form>
HTML;

echo $from;
