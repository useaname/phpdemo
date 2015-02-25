<?php
$action = isset($_GET['a'])?$_GET['a']:'list';

if('list' == $action){

	require('./matchModel.class.php');
	$model = new matchModel();
	$rows = $model -> getList();
	require('./template/match_view.html');

}elseif('del' === $action){

	require('./matchModel.class.php');
	$model = new matchModel();
	$res = $model -> del($_GET['id']);
	header('Location: /newmatch/match_module.php');
}
