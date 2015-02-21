<?php
class AdminController{

	/**
	 * 展示登陆页面
	 * @return [type] [description]
	 */
	public function indexAction(){
		require './app/view/back/login.html';
	}

	public function signinAction(){
		//调用模型完成数据库操作
		//利用用户名 和 密码 验证用户身份
		$model_admin = new AdminModel;
		if ($model_admin->checkByLogin($_POST['username'],$_POST['password'])) {
			echo '合法用户';
		}else{
			echo '非法用户';
		}
	}
}
