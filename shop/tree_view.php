<?php


// create table `category`(
// cat_id int unsigned not null primary key auto_increment,
// cat_name varchar(100) not null,
// sort_order int default 0 comment'排序',
// parent_id int unsigned
// ) charset=utf8;

mysql_connect('127.0.01:3306','root','root');
$sql = "select * from demo_category where 1 order by sort_order";
$result = mysql_query($sql);
while ($row = mysql_fetch_assoc($result)) {
	$list = $row;
}

/**
 * [getTree description]
 * @param  [type]  $arr  当前所有可能的分类 在该数组哪查找分类
 * @param  [type]  $p_id [当前查找的父类ID
 * @param  integer $deep 当前递归调用的深度
 * @return [type] 排序好的数组列表
 */
function getTree($arr,$p_id,$deep=0){
	static $tree = array();

	foreach ($arr as $row) {
		if($row['parent_id'] == $p_id){
			$row['deep'] = $deep;
			$tree[] = $row;
			getTree($arr,$row['cat_id'],$deep+1);
		}
	}

	return $tree;
}

$tree = getTree($list,0);

foreach ($tree as $row) {
	echo $row['deep'];
	echo str_repeat('&nbsp;&nbsp;',$row['deep']);
	echo $row['cat_name'];
	echo '<br>';
}
