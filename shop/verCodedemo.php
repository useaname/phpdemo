<?php
//随即声称图片文件名
$rand_bg_file = './captcha/captcha_bg'.mt_rand(1,5).'.jpg';
//创建画布
$img = imagecreatefromjpeg($rand_bg_file);

//绘制白色边框
$white = imagecolorallocate($img, 0xff,0xff, 0xff);

//在画布上画矩形 （不填充）
imagerectangle($img,0,0,1449,19,$white);

//写代值
//生成码值 随即生成4个只包含大写字母，和数字的字符串！
$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXZY0123456789';
$captcha_str = '';
for ($i=0,$strlen=strlen($chars); $i <= 4 ; $i++) {
	$rand_key = mt_rand(0,$strlen-1);
	$captcha_str .=$chars[$rand_key];
}

@session_start();
$_SESSION['captcha_code'] =$captcha_str;

//分配颜色
$blcak = imagecolorallocate($img, 0, 0, 0);

if (mt_rand(0,1) == 1) {
	$str_color = $white;
}else{
	$str_color = $blcak;
}

//描绘字符串
imagestring($img,5,60,3,$captcha_str,$str_color);

header('Content-Type:image/jpeg;chaset=utf-8');
//保存 直接输出到浏览器
imagejpeg($img);

imagedestroy($img);
