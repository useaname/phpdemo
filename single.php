<?php
class MySQLDB{
	private static $instance;
	private function  __construct($p1){

	}

	public static function getInstance($p1){
		if (!(self::$instance instanceof self)) {
			self::$instance = new self($p1);
		}
		return self::$instance;
	}

	private function __clone(){

	}
}

$db1 =  MySQLDB::getInstance($a);
$db2 =  MySQLDB::getInstance($a);

var_dump($db1,$db2);

