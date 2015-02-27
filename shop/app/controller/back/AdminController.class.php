<?php
class AdminController extends Controller{

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
			//setcookie('is_login','yes');
			session_start();
			$_SESSION['is_login'] = 'yes';
			//echo '合法用户';
			$this->jump('index.php?p=back&c=Index&a=index');
		}else{
			//非法用户
			//echo '非法用户';
			$this->jump('index.php?p=back&c=Admin&a=index','非法用户',2);
		}
	}
}
