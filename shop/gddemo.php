<?php
//新建一个真彩色图像
$img = imagecreatetruecolor(500,300);
//分配绿色
$green = imagecolorallocate($img, 0, 0xff, 0x0);
//填充颜色
$result  = imagefill($img,0,0,$green);
//导出
imagejpeg($img,'./green.jpg');
//销毁
imagedestroy($img);
