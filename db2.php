<?php
	class DB2{
	private $host;
	private $port;
	private $user;
	private $pass;
	private $charset;
	private $dbname;

	private $link;
	private $last_sql;

	public function __construct($params = array()){
		$this->host = isset($params['host'])?$param['host']:'127.0.0.1';
		$this->port = isset($params['port'])?$params['port']:'3306';
		$this->user = isset($params['user'])?$params['user']:'root';
		$this->pass = isset($params['pass'])?$params['pass']:'root';
		$this->charset = isset($params['charset'])?$params['charset']:'utf8';
		$this->dbname = isset($params['dbname'])?$params['dbname']:'test';

		$this->connect();
		$this->	setCharSet();
	}


	public function connect(){
		if(!$link =mysql_connect("$this->host:$this->port",$this->user,$this->pass)){
			echo 'DBDAIL 01<br />';
			echo mysql_errno().':'.mysql_error();
			die();
		}else{
			$this->link = $link;
		}
	}

	public ffunction setCharSet(){
		if (!mysql_connect("set names $this->charset")) {
			echo 'DBDAIL 01<br />';
			echo mysql_errno().':'.mysql_error();
			die();
		}
	}

}