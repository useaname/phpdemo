<?php
//require './framework/MySQLDB.class.php';
class Model{

	protected $db;

	public function __construct(){
		$this->initLink();
	}

	protected function initLink(){
		// $options = array(
		// 	'host' =>'127.0.0.1',
		// 	'port' => '3306',
		// 	'user' => 'root',
		// 	'pass' =>'root',
		// 	'charset' => 'utf8',
		// 	'dbname' => 'demo_shop'
		// );

		$this->db = MySQLDB::getInstance($GLOBALS['config']['database']);
	}
}

