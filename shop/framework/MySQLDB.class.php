<?php
class MySQLDB{
	//初始化属性
	private $host;
	private $port;
	private $user;
	private $pass;
	private $charset;
	private $dbname;

	//运行时生成属性
	private $link;
	private  $last_sql;

	//当前的实例对象
	private static $instance;

	/**
	 * 初始化连接参数
	 * @param array $params [description]
	 */
	private function __construct($params = array()){
		$this->host = isset($params['host'])?$params['host']:'127.0.0.1';
		$this->port = isset($params['port'])?$params['port']:'3306';
		$this->user = isset($params['user'])?$params['user']:'root';
		$this->pass = isset($params['pass'])?$params['pass']:'root';
		$this->charset = isset($params['charset'])?$params['charset']:'utf8';
		$this->dbname = isset($params['dbname'])?$params['dbname']:'match';

		$this->conn();
		$this->setCharset();
		$this->selectDB();
	}

	/**
	 * 单例 私有化clone
	 * @return [type] [description]
	 */
	private function __clone(){

	}

	/**
	 * 获得单例对象
	 * @param  [type] $params [description]
	 * @return [type]         [description]
	 */
	public static function getInstance($params){
		if (!(self::$instance instanceof self)) {
			self::$instance = new self($params);
		}
		return self::$instance;
	}


	/**
	 * 数据库连接
	 */
	private function conn(){
		if(!$link = mysql_connect("$this->host:$this->port",$this->user,$this->pass)){
			echo '连接失败<br/>';
			echo mysql_errno().'<br/>';
			echo mysql_error();
			die();
		}
		$this->link  = $link;
	}

	/**
	 * 设置字符集
	 */
	private function setCharset(){
		return $this->query("set names $this->charset");
	}

	/**
	 * 设置连接数据库
	 */
	private function selectDB(){
		if ($this->dbname === '') {
			return;
		}
		return $this->query("use `$this->dbname`");
	}

	/**
	 * 执行SQL的方法
	 * @param  [type] $sql 待执行的SQL
	 * @return [type]   执行后结果
	 */
	public function query($sql){
	 	$this->sql = $sql;
	 	if (!$result = mysql_query($sql)) {
	 		echo '操作失败!<br>';
	 		echo '出错的sql是：'.$this->sql;
			echo mysql_errno().'<br>';
			echo mysql_error();
			die();
	 	}
	 	return $result;
	}
	/**
	 * 获取执行SQL所有数据
	 * @param  [type] $sql 待执行
	 * @return [type]      执行返回结果
	 */
	public function fetchAll($sql){
		if ($result = $this->query($sql)) {
			$rows = array();
			while ($row = mysql_fetch_assoc($result)) {
				$rows[ ] = $row;
			}
			mysql_free_result($result);
			return $rows;
		}else{
			return false;
		}
	}

	/**
	 * 取出查询结果中第一行数据
	 * @param  [type] $sql 待执行SQL
	 * @return [type]      返回数据
	 */
	public function fetchRow($sql){
		if ($result = $this->query($sql)) {
			$row = mysql_fetch_assoc($result);
			mysql_free_result($result);
			return $row;
		}else{
			return false;
		}
	}

	/**
	 * 取出查询结果中第一行第一列数据
	 * @param  [type] $sql 待执行的
	 * @return [type]      返回数据
	 */
	public function fetchColoum($sql){
		if ($result = $this->query($sql)) {
			$row = mysql_fetch_row($result);
			mysql_free_result($result);
			return $row[0];
		}else{
			return false;
		}
	}

}

