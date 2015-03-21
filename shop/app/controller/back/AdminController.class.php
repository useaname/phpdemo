<?php
class AdminController extends BackPlatformController{


	/**
	 * 展示登陆页面
	 * @return [type] [description]
	 */
	public function indexAction(){
		require  CURR_VIEW_DIR.'login.html';
	}

	public function signinAction(){
		$captcha_tool = new CaptchaTool;
		if (!$captcha_tool -> checkCaptcha($_POST['captcha'])) {
			$this->jump('index.php?p=back&c=Admin&a=index','验证码错误',2);
		}
		//调用模型完成数据库操作
		//利用用户名 和 密码 验证用户身份
		$model_admin = new AdminModel;
		if ($admin_info = $model_admin->checkByLogin($_POST['username'],$_POST['password'])) {
			if (isset($_POST['remember']) && $_POST['remember'] == '1') {
				setcookie('admin_id',$admin_info['admin_id'],PHP_INT_MAX);
				setcookie('admin_pass',md5('demo'.$admin_info['pass'].'shop'),PHP_INT_MAX);
			}
			//setcookie('is_login','yes');
			//session_start();
			$_SESSION['is_login'] = 'yes';
			//echo '合法用户';
			$this->jump('index.php?p=back&c=Index&a=index');
		}else{
			//非法用户
			//echo '非法用户';
			$this->jump('index.php?p=back&c=Admin&a=index','非法用户',2);
		}
	}


	public function captchaAction(){
		$tool_captcha = new CaptchaTool;
		$tool_captcha -> generate();
	}

}
