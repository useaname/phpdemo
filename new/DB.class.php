<?php
class DB{
	private $host;
	private $port;
	private $user;
	private $pass;
	private $dbName;
	private $charset;
	private $link;
	private $last_sql;

	/**
	 * [__construct description]
	 * @param 数组形式的属性
	 */
	public function __construct($param = array()){
		$this->host = isset($param['host'])?'127.0.01.1':$param['host'];
		$this->port = iseet($param['port'])?'3306':$param['port'];
		$this->user = iseet($param['user'])?'root':$param['user'];
		$this->pass = iseet($param['pass'])?'root':$param['pass'];
		$this->charset = isset($param['charset'])?'utf8':$param['charset'];

	}

	/**
	 * 连接数据库
	 * @return [type]
	 */
	private function connection(){
		if (!mysql_connect("$this->host:$this->port",$this->user,$this->pass)) {
			echo '数据库连接失败!<br>';
			echo mysql_errno().'<br>';
			echo mysql_error().'<br/>';
			die();
		}
	}

	/**
	 * 设置字符集
	 */
	private function  setCharset(){
		if (mysql_query("set names $this->charset")) {
			echo '设置字符集失败!<br>';
			echo mysql_errno().'<br>';
			echo mysql_error().'<br/>';
			die();
		}
	}

	/**
	 * 设置使用数据库
	 */
	private function setDB(){
		if (mysql_query("use $this->dbName")) {
			echo '设置字符集失败!<br>';
			echo mysql_errno().'<br>';
			echo mysql_error().'<br/>';
			die();
		}
	}

	/**
	 * 根据传入SQL 返回记录
	 *
	 *
	 * @param  执行的
	 *
	 * @return 查询得到的资源
	 */
	public function query($sql){
		$this->last_sql = $sql;
		if (!$res = mysql_query($sql)) {
			echo "SQL执行失败<br>";
			echo "出错的SQL是$sql<br>";
			echo mysql_errno().'<br>';
			echo mysql_error().'<br/>';
			die();
		}else{
			return $res;
		}
	}

	/**
	 * [fetchAll description]
	 * @param  [type]
	 * @return 包含查询结果集的二维数组
	 */
	public function fetchAll($sql){
		if ($res = $this->query($sql)) {
			$rows = array();
			while ($row = mysql_fetch_assoc($res)) {
				$rows[] = $row;
			}
			mysql_free_result($res);
			return $rows;
		}else{
			return false;
		}
	}

	/**
	 * 获取查询结果中第一条记录
	 * @param  SQL
	 *
	 * @return 第一条记录
	 */
	public function  fetchRow($sql){
		if ($res = $this->query($sql)) {
			$row = mysql_fetch_assoc($res);
			mysql_free_result($res);
			return $row;
		}

	}


	/**
	 * 获取查询结果集中第一条记录的第一个字段值
	 * @param  待执行的SQL
	 * @return  字段值得
	 */
	public function fetchColum($sql){
		if ($res = $this->query($sql)) {
			if($row = mssql_fetch_assoc($res)){
				mysql_free_result($res);
				return $row[0];
			}else{
				return false;
			}
		}else{
			return  false;
		}
	}

	/**
	 * 序列化时 调用 指定哪些属性需要被序列化
	 * @return array
	 */
	public function __sleep(){
		return array('host','port','user','pass','charset','dbName');
	}

	/**
	 * f反序列化时调用
	 *‘
	 * 用于对对象属性的初始化
	 */
	public function __wakeup(){
		$this->connectionl();
		$this->setCharset();
		$this->setDB();
	}
}
