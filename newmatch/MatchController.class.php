<?php

class MatchController{

	public function listAction(){
		require('./matchModel.class.php');
		$model = new matchModel();
		$rows = $model -> getList();
		require('./template/match_view.html');
	}

	public function delAction(){
		require('./matchModel.class.php');
		$model = new matchModel();
		$res = $model -> del($_GET['id']);
		header('Location: /newmatch/index.php');
	}

}
