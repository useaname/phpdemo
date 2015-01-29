<?php
$options = array(
	'host' => '127.0.0.1',
	'port' => '3306',
	'user' => 'root',
	'pass' => 'root',
	'charset' => 'utf8',
	'dbname' => 'test'
	);
// require './db3.php';
// $data = new db

var_dump($options);
echo '<hr />';
$ser_data = serialize($options);

$len = file_put_contents('./data.txt',$ser_data);
echo '<hr />';
var_dump($len);