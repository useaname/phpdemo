<?php


// create table `category`(
// cat_id int unsigned not null primary key auto_increment,
// cat_name varchar(100) not null,
// sort_order int default 0 comment'排序',
// parent_id int unsigned
// ) charset=utf8;

 mysql_connect('127.0.0.1:3306','root','root');
 $list = mysql_query('select * from demo_shop.demo_category order by sort_order');

while ($row = mysql_fetch_assoc($list)) {
	$res[] = $row;
}

echo '<pre>';
//分类表中所有数据
//var_dump($res);
//得到简单分类列表
var_dump(getTree($res,0,0));
echo '</pre>';

 // function getTree($list,$pid=0,$deep=0){
 // 	static $tree = array();
 // 	foreach ($list as $row) {
 // 		if ($pid == $row['parent_id']) {
 // 			$row['deep'] = $deep;
 // 			$tree[] = $row;
 // 			getTree($list,$row['cat_id'],$deep+1);
 // 		}
 // 	}
 // 	return $tree;
 // }


function getTree($arr,$pid=0,$deep){
	static $tree = array();
	foreach ($arr as $row ) {
		if ($row['parent_id'] == $pid) {
			$row['deep'] =$deep;
			$tree[ ]= $row;
			getTree($arr,$row['cat_id'],$deep+1);
		}
	}
	return $tree;
}
