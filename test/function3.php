<?

header('Content-Type:text/html;charset=utf-8');
//参数的默认值
function say($name,$say='hello'){
	echo $say,',',$name;
}
say('Jim');
echo ('<br />');
say('Tom','Hi');

function study($classroom = '102'){
	echo "在{$classroom}自习";
}
echo "<hr />";
study('106');
//函数的个数
echo "<hr />";

// function sayCount($p1,$p2){

// }
// say(10,20,30,40);

echo "<hr />";
//不定参数函数
function sayCount(){
	$args = func_get_args();
	var_dump($args);
	for ($i=0,$len = count($args); $i < $len; $i++) { 
		echo $args["$i"];
		echo '<br />';
	}
}
//var_dump($args);
sayCount(10,20,30,40);