<?php
class Controller{
	/**
	 * 跳转方法
	 * @param  [type]  $message [description]
	 * @param  integer $time    [description]
	 * @return [type]           [description]
	 */
	protected function jump($url,$message='',$time=3){
		if ($message == '') {
			//立即跳转
			header('Location: ' .$url);
			//echo 'url:'.$url;
		}else{
			//提示跳转
			//判断是否用用户自定义的跳转模版
			if (file_exists(CURR_VIEW_DIR.'jump.html')) {
				require CURR_VIEW_DIR.'jump.html';
			}else{
				//没有 则使用默认模版
				echo <<<HTML
<HTML>
 <HEAD>
  <TITLE> 提示：$message </TITLE>
  <META HTTP-EQUIV="Content-Type" CONTENT="text/html ;charset=utf-8">
  <META HTTP-EQUIV="Refresh" CONTENT="$time; url=$url">
 </HEAD>
 <BODY>
	默认的：$message
 </BODY>
</HTML>
HTML;
			}
		}
		die; //强制停止脚本
	}
}
