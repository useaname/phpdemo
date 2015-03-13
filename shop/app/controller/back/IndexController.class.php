<?php

class IndexController extends BackPlatformController{
	/**
	 * 载入后台首页动作
	 * @return [type] [description]
	 */
	public function indexAction(){
		//判断用户是否已经登陆
		//if (isset($_COOKIE['is_login']) && $_COOKIE['is_login'] == 'yes') {
		// session_start();
		// if(isset($_SESSION['is_login']) && $_SESSION['is_login'] == 'yes'){
		// 	# code...
		// }else{
		// 	//die('没有登录');
		// 	$this->jump('index.php?p=back&c=Admin&a=index','没有用户',5);
		// 	die();
		// }
		require CURR_VIEW_DIR.'index.html';
	}

	/**
	 * top
	 * @return [type] [description]
	 */
	public function topAction(){
		require CURR_VIEW_DIR.'top.html';
	}

	/**
	 * menu
	 * @return [type] [description]
	 */
	public function menuAction(){
		require CURR_VIEW_DIR.'menu.html';
	}

	/**
	 * drag
	 * @return [type] [description]
	 */
	public function dragAction(){
		require CURR_VIEW_DIR.'drag.hmll';
	}

	/**
	 * main
	 * @return [type] [description]
	 */
	public function mainAction(){
		require CURR_VIEW_DIR.'main.html';
	}
}
