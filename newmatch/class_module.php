<?php
$action = isset($_GET['a']) ? $_GET['a'] : 'list';

if('list' === $action){

	require('./classModel.class.php');
	$model = new ClassModel();
	$rows = $model -> getList();
	// var_dump(mysql_fetch_assoc($rows));
	require('./template/class_view.html');

}elseif('delmatch' === $action){

	require('./classModel.class.php');
	$model = new ClassModel();
	$rows = $model->delMact();
	header(');

}elseif('viewmatch' === $action){

}
