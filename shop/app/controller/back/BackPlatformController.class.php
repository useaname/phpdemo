<?php

class BackPlatformController extends Controller{

	public function __construct(){
		//开启session
		$this->initSeesion();
		//验证是否登陆
		$this->checkLogin();
	}

	/**
	 *  初始化入库的代码
	 *
	 */
	protected function initSeesion(){
		new SessionDBTool;
	}

	/**
	 * 检验当前是否登陆
	 */
	protected function checkLogin(){
		// 判断用户是否登陆
		@session_start();
		if (CONTROLLER == 'Admin' && (ACTION == 'index' || ACTION=='signin' || ACTION=='captcha')) {
			//不需要验证
		}else{
			//需要
			if(isset($_SESSION['is_login']) && $_SESSION['is_login'] == 'yes'){
				//继续执行
			}else{
				$model_admin = new AdminModel;
				if ($model_admin -> checkByCookie()) {
					$_SESSION['is_login'] = 'yes';
				}else{
					$this->jump('index.php?p=back&c=Admin&a=index','请登录',2);
				}

			}
		}
	}

}
