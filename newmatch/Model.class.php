<?php
class Model{
	protected $db;

	public function __construct(){
		$this->inintLink();
	}

	/**
	 * 初始化数据库连接
	 */

	public function inintLink(){

		require './MySql.class.php';

		$params = array(
			'host' => '127.0.0.1',
			'port' => '3306',
			'user' => 'root',
			'pass' => 'root',
			'charset' => 'utf8',
			'dbname' => 'match'
			);

		$this->db = MySql::getInstance(array('dbname'=>'match'));
	}
}



