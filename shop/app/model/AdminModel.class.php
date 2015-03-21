<?php
//require ('./framework/Model.class.php');
/**
 * demo_admin表模型
 */
class AdminModel extends Model{

	protected $table_name = 'admin';
	/**
	 * 利用登陆用户名 密码 进行登录验证
	 * @param  [type] $admin_name 用户名
	 * @param  [type] $admin_pass 用户密码
	 * @return [type]             [description]
	 */
	public function checkByLogin($admin_name,$admin_pass){
		$sql = "select * from {$this->table()} where admin_name='$admin_name' and admin_pass=md5('$admin_pass')";
		$row = $this->db->fetchRow($sql);
		//var_dump($row);
		return $row;
	}


	public function checkByCookie(){
		if (!isset($_COOKIE['admin']) || !isset($_COOKIE['admin_pass'])) {
			return false;
		}


		$sql = "select * from {$this->table()} where admin_id='{$_COOKIE['admin_id']}' and md5(concat('demo',admin_pass,'php')) = '{$_COOKIE['admin_pass']}'";
		return $this->db->fetchRow($sql);
	}
}
