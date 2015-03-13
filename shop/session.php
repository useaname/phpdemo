<?php
session_set_save_handler(
	'sess_open',
	'sess_close',
	'sess_read',
	'sess_write',
	'sess_destory',
	'sess_gc'
);

function sess_open(){
	echo 'sess_open<br/>';
}

function sess_close(){
	echo 'sess_close<br/>';
}

function sess_read(){
	echo 'sess_read<br/>';
}

function sess_write(){
	echo 'sess_write<br/>';
}

function sess_destory(){
	echo 'sess_destory<br/>';
}

function sess_gc(){
	echo 'sess_gc<br/>';
}

@session_start();
//var_dump($_SESSION);
