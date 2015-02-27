<?php
/**
 * 在session开启时执行
 * @return [type] [description]
 */
function  sess_open(){
	echo 'open<br>';

	$link = mysql_connect('127.0.0.1:3306','root','root');
	mysql_query('set names `utf8`');
	mysql_query('use `demo_shop`');
}
/**
 * session_start()时，开启seesions被执行
 *负责从session纪录中华，将seesion数据读取出来
 * @param  [type] $sess_id 当前的seession_id
 * @return [type]    读取到seesion的数据
 */
function sess_read($sess_id){
	echo 'read<br>';
	$sql = "select  sess_data from `demo_session` where sess_id='$sess_id'";
	$result = mysql_query($sql);
	if ($row = mysql_fetch_assoc($result)) {
		return $row['sees_data'];
	}else{
		return '';
	}

}

/**
 * 在脚本结束时被执行
 *
 * 负责，将当前的session 数据同步到当前的seesion纪录中
 * @param  [type] $sees_id   [description]
 * @param  [type] $sees_data [description]
 * @return [type]            [description]
 */
function sess_write($sees_id,$sees_data){
	echo 'write<br>';
	$sql = "insert into `demo_session` values('$sees_id','$sess_data') on dupllicate key update sess_data='$sess_data";
	return mysql_query($sql);
}

/**
 * 在调用了seesion_destory()系统函数，被自动调用
 * 负责的功能 利用当前的ID 删除被当前的session 的纪录
 * @return [type] [description]
 */
function sess_destory(){
	echo 'destory<br>';
	$sql = "delete from `session` where seess_id='$sess_id";
	return mysql_query($sql);
}

function sess_gc(){
	echo 'gc<br>';
}

function sess_close(){
	echo 'close<br>';
	return true;

}
session_set_save_handler(
	'sess_open',
	'sess_close',
	'sess_read',
	'sess_write',
	'sess_destory',
	'sess_gc'
);
