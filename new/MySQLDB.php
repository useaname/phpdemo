<?php
class DB{
	private $host;
	private $port;
	private $user;
	private $pass;
	private $dbname;
	private $charset;
	private $last_sql;

	public function __construct($params = array()){
		$this->host =isset($param['host'])?$params['host']:'127.0.0.1';
		$this->port = isset($param['port'])?$params['port']:'3306';
		$this->user = isset($param['user'])?$params['user']:'root';
		$this->pass = isset($param['pass'])?$params['pass']:'root';
		$this->dbname = isset($param['dbname'])?$params['dbname']:'mysql';
		$this->charset = isset($param['charset'])?$params['charset']:'utf8';

		$this->getConnection();
		$this->setCharset();
		$this->setDB();
		//$this->exeSQL();
		$this->fetchAll();
	}

	private function getConnection(){
		if (!$link = mysql_connect("$this->host:$this->port",$this->user,$this->pass)) {
			echo 'DBFAIL 1<br>';
			echo mysql_errno(),mysql_error();
			die();
		}else{
 			$this->link = $link;
		}
	}

	private function setCharset(){
		$sql =  "set names $this->charset";
		if (!mysql_query($sql)) {
			echo 'DBFAIL 2<br>';
			echo mysql_errno(),mysql_error();
			die();
		}
	}

	private function setDB(){
		$sql =  "use $this->dbname";
		if (!mysql_query($sql)) {
			echo 'DBFAIL 3<br>';
			echo mysql_errno(),mysql_error();
			die();
		}	
	}

	// private function exeSQL(){
	// 	$sql = "select * from user";
	// 	$res = mysql_query($sql,$this->link);
	// 	while ($row = mysql_fetch_assoc($res)) {
	// 		echo $row['Host']."\t";
	// 		echo $row['User']."\t";
	// 		echo $row['Password']."\t";
	// 		echo '<br>';
	// 	}
	// }

	private function exeSQL(){
		$sql = "select * from user";
		$res = mysql_query($sql,$this->link);
		if (!$res) {
			echo 'DBFAIL 3<br>';
			echo mysql_errno(),mysql_error();
			die();
		}else{
			return $res;
		}
	}



	public function fetchAll(){
		if($res = $this->exeSQL()){
			$rows = array();
			while ($row = mysql_fetch_assoc($res)) {
				$rows[] = $row;
				mysql_free_result($res);
				return $rows;
			}
		}else{
			return false;
		}
	}
}
//echo 'aaaa';
$db = new DB();
echo '<pre>';
//var_dump($db);
echo '<hr>';
//$db->fetchAll();
var_dump($db->fetchAll('abc'));
echo '</pre>';
