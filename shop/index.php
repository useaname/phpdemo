<?php

//require './app/controller/back/AdminController.class.php';
//require './app/model/AdminModel.class.php';

//确定当前的平台
$p = isset($_GET['p'])?$_GET['p']:'back';
define('PLATFORM',$p);

define('DS',DIRECTORY_SEPARATOR); //j简化目录分隔符  linux:/ windows: / 或 \
define('ROOT_DIR',dirname(__FILE__).DS); //更目录 dirname() 获取参数得父目录
define('APP_DIR',ROOT_DIR.'app'.DS); //应用程序目录
define('CONT_DIR',APP_DIR.'controller'.DS); //控制器目录
define('CURR_CONT_DIR',CONT_DIR.PLATFORM.DS); //当前控制器
define('MODEL_DIR',APP_DIR.'model'.DS); //模型路径
define('FRAME_DIR', ROOT_DIR.'framework'.DS); //框架路径

$c = isset($_GET['c'])?$_GET['c']:'Admin';
$controll_name = $c.'Controller';

$a = isset($_GET['a'])?$_GET['a']:'index';
$action_name = $a.'Action';

$controller = new $controll_name;
$controller->$action_name();


function __autoload($class_name){
	//两个特例
	$map = array(
		'MySQLDB' => FRAME_DIR.'MySQLDB.class.php',
		'Model' => FRAME_DIR.'Model.class.php'
		);
	//将所有的特例做成一个类与类名的映射
	//判断当前所需加载的类是否属于特例
	if (isset($map[$class_name])) {
		require $map[$class_name];
	}elseif (substr($class_name, -10) == 'Controller') {
		require CURR_CONT_DIR.$class_name.'.class.php';
	}elseif (substr($class_name,-5) == 'Model') {
		require MODEL_DIR.$class_name.'.class.php';
	}
}
