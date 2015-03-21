<?php

class CaptchaTool{
	/**
	 * 生成验证码的方法
	 */
	public function generate(){
		//随机获取图片背景
		$rand_bg_file = TOOL_DIR.'captcha/captcha_bg'.mt_rand(1,5).'.jpg';

		//创建画布
		$img = imagecreatefromjpeg($rand_bg_file);

		//绘制边框
		$white = imagecolorallocate($img, 0xff, 0xff, 0xff);
		//不填充矩形
		imagerectangle($img, 0, 0, 144, 19, $white);

		//生成验证码
		$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXZY0123456789';

		//随机取出4个
		$captcha_str = '';
		for ($i=0,$strlen = strlen($chars); $i < 4; $i++) {
			$rand_key = mt_rand(0,$strlen-1);
			$captcha_str .= $chars[$rand_key];
		}

		//echo $captcha_str;die;
		@session_start();
		$_SESSION['captcha_code'] = $captcha_str;
		//分配黑色
		$blcak = imagecolorallocate($img, 0, 0, 0);
		if (mt_rand(0,1) == 1) {
			$str_color = $white;
		}else{
			$str_color = $blcak;
		}

		//echo $str_color.'<br/>'.$captcha_str;die;
		//写字符串
		imagestring($img, 5, 60, 3, $captcha_str, $str_color);

		//header('content-Type:image/jpg;charset=utf-8');
		//输出到浏览器
		imagejpeg($img);

		imagedestroy($img);
	}

	/**
	 * 验证验证码
	 * @param  string $code 用户输入的验证码
	 *
	 * @return bool
	 */
	public function checkCaptcha($code){
		@session_start();
		//不区分大小写
		//return $code == $_SESSION['captcha_code'];
		return strcasecmp($code,$_SESSION['captcha_code']) == 0;
	}
}
