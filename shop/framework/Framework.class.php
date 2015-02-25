<?php
class Framework{

	public static function run(){
		self::initRuquest();
		self::inintPath();
		self::loadConfig();
		spl_autoload_register(array('Framework','shop_autoload'));
		self::dispatch();
	}

	/**
	 * 初始化请求参数
	 * @return [type] [description]
	 */
	public static function initRuquest(){
		//确定当前的平台
		define('PLATFORM',isset($_GET['p'])?$_GET['p']:'back');
		define('CONTROLLER',isset($_GET['c'])?$_GET['c']:'Admin');
		define('ACTION',isset($_GET['a'])?$_GET['a']:'index');


	}

	/**
	 * 初始化路径常量
	 * @return [type] [description]
	 */
	public static function inintPath(){
		define('DS',DIRECTORY_SEPARATOR); //j简化目录分隔符  linux:/ windows: / 或 \
		define('ROOT_DIR',dirname(dirname(__FILE__)).DS); //更目录 dirname() 获取参数得父目录
		define('APP_DIR',ROOT_DIR.'app'.DS); //应用程序目录
		define('CONT_DIR',APP_DIR.'controller'.DS); //控制器目录
		define('CURR_CONT_DIR',CONT_DIR.PLATFORM.DS); //当前控制器
		define('VIEW_DIR', APP_DIR.'view'.DS);//试图目录
		define('CURR_VIEW_DIR',VIEW_DIR.PLATFORM.DS);//当前视图目录
		define('MODEL_DIR',APP_DIR.'model'.DS); //模型路径
		define('FRAME_DIR', ROOT_DIR.'framework'.DS); //框架路径
		define('CONFIG_DIR',APP_DIR.'config'.DS);//配置文件目录
	}

	/**
	 * 自定义自动加载方法
	 * @param  [type] $class_name [description]
	 * @return [type]             [description]
	 */
	public static function shop_autoload($class_name){
		//两个特例
		$map = array(
			'MySQLDB' => FRAME_DIR.'MySQLDB.class.php',
			'Model' => FRAME_DIR.'Model.class.php',
			'Controller' => FRAME_DIR.'Controller.class.php'
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
	/**
	 * 请求奋发
	 * @return [type] [description]
	 */
	private static function dispatch(){
		//实例化控制器类
		$controller_name = CONTROLLER.'Controller';
		$controller = new $controller_name;
		//调用相应的方法
		$action_name = ACTION.'Action';
		$controller->$action_name();
		//echo $controller_name.$action_name;

	}
	/**
	 * 载入配置文件
	 */
	public static function loadConfig(){
		$GLOBALS['config'] = require CONFIG_DIR.'app.config.php';
	}
}
