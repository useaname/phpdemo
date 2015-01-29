<?php
class DB2{
	public $host;
	public $port;
	public $user;
	public $pass;
	public $charset;
	public $dbname;

	public $link;
	public $last_sql;

	public function __construct($params = array()){

		echo 'bbb<hr/>';

		$this->host = isset($params['host'])?$params['host']:'127.0.0.1';
		$this->port = isset($params['port'])?$params['port']:'3306';
		$this->user = isset($params['user'])?$params['user']:'root';
		$this->pass = isset($params['pass'])?$params['pass']:'root';
		$this->charset = isset($params['charset'])?$params['charset']:'utf8';
		$this->dbname = isset($params['dbname'])?$params['dbname']:'test';

		$this->connect();
		//$this->charset();
	}


	public function connect(){
		echo 'aaa<hr/>',$this->host,$this->port,$this->user,$this->pass;
		$link = mysql_connect("$this->host:$this->port",$this->user,$this->pass);
		//echo 'bbb<hr/>';
		//var_dump($link);
		if(!$link =mysql_connect("$this->host:$this->port",$this->user,$this->pass)){
			echo 'DBDAIL 01<br />';
			echo mysql_errno().':'.mysql_error();
			die();
		}else{
			$this->link = $link;
			var_dump($this->link);
			echo "<br />";
		}
	}

	// private ffunction setCharSet(){
	// 	if (!mysql_connect("set names $this->charset")) {
	// 		echo 'DBDAIL 01<br />';
	// 		echo mysql_errno().':'.mysql_error();
	// 		die();
	// 	}
	// }

}

$db = new DB2();
var_dump($db	);