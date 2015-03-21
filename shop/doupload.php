<?php
echo '<pre>';
 var_dump($_POST);
echo '------';
var_dump($_FILES);
echo uniqid('good_');
echo uniqid();
echo '</pre>';
echo strrchr('name.php.jpg', '.');


function upload($file){
	//检测是否存在错误
	if($file['error'] != 0){
		switch ($file['eroor']) {
			case 1:
				echo '文件太大，超出了php.init限制';# code...
			break;
			case 2:
				echo '文件太大，超出表单MAX_FILE_SIZE限制';
			break;
			case 3:
				echo '文件没有上传完';
			break;
			case 4:
				echo '没有上传文件';
			break;
			case 6:
			case 7:
				echo '临时文件夹错误';
			break;

		}
		return false;
	}

	//j检测类型
	$allow_types = array('image/jpeg','image/png','image/gif');
	if (!in_array($file['type'],$allow_types)) {
		echo '类型不对！';
		return false;
	}

	//检测大小
	$max_size = 100000;
	if($file['size'] > $max_size){
		echo '文件过大！';
		return false;
	}

	//检测文件是否为一个上传文件
	if (!is_uploaded_file($file['tmp_name'])) {
		echo '上传文件可疑！';
		return false;
	}

	$dst_file = uniqid('upload_').strrchr($file['name'], '.');
	if (move_uploaded_file($file['tmp_name'], $dst_file)) {
		return $dst_file;
	}else{
		echo '移动失败';
		return false;
	}
}

$result = upload($_FILES['goods_img']);
echo "<hr>";
var_dump($result);
