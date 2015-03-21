<?php
//require './framework/MySQLDB.class.php';
class Model{

	protected $db; //存储mysqldb类
	protected $prefix; //数据库表明前缀
	protected $fields; //所有字段

	public function __construct(){
		$this -> prefix = $GLOBALS['config']['database']['prefix'];
		$this->initLink();
		$this->getFields();
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


	protected function table(){
		return '`'.$this->prefix.$this->table_name.'`';
	}


	public function getFields(){
		//获取描述desc
		$sql = "desc {$this->table()}";
		$fields_rows = $this->db->fetchAll($sql);
		//获取字段部分
		foreach ($fields_rows as $row) {
			$this->fields[] = $row['Field'];
			if ($row['Key'] == 'PRI') {
				$this->fields['pk'] = $row['Field'];
			}
		}
	}

	/**
	 * 根据主键自动删除
	 * @param  [type] $pk_value [description]
	 * @return [type]           [description]
	 */
	public function auotoDelete($pk_value){
		$sql = "delete from {$this->table()} where `{$this->fields['pk']}`='{$pk_value}'";
		return $this->db->query($sql);
	}

	/**
	 * 自动添加一行数据
	 * @param  [type] $data [description]
	 * @return [type]       [description]
	 */
	public function autoInsert($data){

		//拼凑sql语句
		$sql = "insert into {$this->table()}";
		//拼凑字段列表
		//取得所有键
		$fields = array_keys($data);
		//为每个键加上反引号
		$fields = array_map(function($v){return '`'.$v.'`';}, $fields);
		//使用逗连接每个键
		$fields_str = implode(',',$fields);
		$sql .= '('.$fields_str.')';

		//获取$data的值
		$values = array_map(function($v){return  "'".$v."'";}, $data);
		$values_str = implode(',',$values);
		$sql .= ' value ('.$values_str.')';

		return $this->db->query($sql);
	}

	/**
	 * 自动查询一行
	 * @param  [type] $pk_value 查询行主键的值
	 * @return [type]           bool
	 */
	public function autoSelectRow($pk_value){
		$sql = "select * from {$this->table()} where `{$this->fields['pk']}`='{$pk_value}'";
		return $this->db->fetchRow($sql);
	}

	/**
	 * 自动增加一列数据
	 * @param  [type] $data 等待被增加的对象
	 * @return [type]       [description]
	 */
	public function autoUpdate($data){
		// $sql = "update {$this->table()}";

		// $fields = array_keys($data);
		// $fields = array_map(function($v){return '`'.$v.'`';},$fields);
		// $fields_str = implode(',',$fields);
		// $sql .=$fields_str;

		// $values = array_map(function($v){return "'".$v."'";},$data);
		// $values_str = implode(',',$values);
		// $sql .=
		$sql = "update {$this->table()} set";
		foreach ($data as $key => $value) {
			$sql_str[] = "`".$key."`='".$value."'";
		}

		$sql_val = implode(',',$sql_str);
		$pk = $this->fields['pk'];
		$sql .= $sql_val.' where '.$pk.'='.$data["$pk"];

		return $this->db->query($sql);


	}
}

