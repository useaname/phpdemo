<?php
//require ('./framework/Model.class.php');
/**
 * demo_admin表模型
 */
class AdminModel extends Model{
	/**
	 * 利用登陆用户名 密码 进行登录验证
	 * @param  [type] $admin_name 用户名
	 * @param  [type] $admin_pass 用户密码
	 * @return [type]             [description]
	 */
	public function checkByLogin($admin_name,$admin_pass){
		$sql = "select * from demo_admin where admin_name='$admin_name' and admin_pass=md5('$admin_pass')";
		$row = $this->db->fetchRow($sql);
		//var_dump($row);
		return (bool)$row;
	}
}
