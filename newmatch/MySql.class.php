<?php



class MySql{
	private $host;
	private $port;
	private $user;
	private $pass;
	private $charset;
	private $dbname;

	private $link;
	private $last_sql;

	private static $instance;

	private function __construct($params=array()){

		$this->host = isset($params['host'])?$params['host']:'127.0.0.1';
		$this->port = isset($params['port'])?$params['port']:'3306';
		$this->user = isset($params['user'])?$params['userr']:'root';
		$this->pass = isset($params['pass'])?$params['pass']:'root';
		$this->charset = isset($params['charset'])?$params['charset']:'utf8';
		$this->dbname = isset($params['dbname'])?$params['dbname']:'test';

		$this->conn();

		$this->setCharset();

		$this->selectDB();

	}

	private function conn(){
		if (!$link = mysql_connect("$this->host:$this->port",$this->user,$this->pass)) {
			echo '连接失败';
			echo  '<br>';
			echo mysql_errno();
			echo '<br />';
			echo mysql_error();
			die();
		}else{
			$this->link = $link;
		}
	}


	private  function setCharset(){
		$sql = "set names $this->charset";
		return $this->query($sql);
	}



	private function selectDB(){
		if($this->dbname === ''){
			return;
		}

		$sql = "use `$this->dbname`";
		return $this->query($sql);
	}

	public function query($sql){
		$this->last_sql = $sql;
		if(!$result = mysql_query($this->last_sql,$this->link)){
			echo 'sql执行失败<br />';
			echo '失败的sql是：'.$sql.'<br>';
			echo '错误代码:'.mysql_errno();
			echo '错误信息：'.mysql_error();
			die();
		}else{
			return $result;
		}
	}

	public function fetchAll($sql){
		echo 'in fetchAll...';
		if ($result = $this->query($sql)) {
			if (is_resource($result)) {
				echo 'not Res..';

			}
			$rows = array();
			while ($row = mysql_fetch_assoc($result)) {
				$rows[] = $row;
			}

			mysql_free_result($result);
			return $rows;
		}else{
			return false;
		}
	}

	public function fetchRow($sql){
		if ($result =$this->query($sql)) {
			$row = mysql_fetch_assoc($result);
			return $row;
		}else{
			return false;
		}
	}

	public static function getInstance($params){
		if (!(self::$instance instanceof self)) {
			self::$instance = new self($params);
		}

		return self::$instance;
	}

	// public function __destruct(){
	// 	echo 'a';
	// 	mysql_free_result($this->link);
	// 	echo 'b';
	// }
}

//var_dump(Mysql::getInstance(array()));
