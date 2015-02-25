<?php

class IndexController extends Controller{

	public function indexAction(){
		if (isset($_COOKIE['is_login']) && $_COOKIE['is_login'] == 'yes') {
			# code...
		}else{
			die('没有登录');
		}
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
