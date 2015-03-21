<?php

class UploadTool{
	private $upload_dir;//上传目录
	private $max_size;
	private $allpw_types;

	private $error_info;

	public function __construct($dir='',$size=2000000,$types=array()){
		$this->upload_dir = $dir;
		$this->max_size = $size;
		$this->allow_types = empty($types)?array('image/jpeg','image/png'):$types;
	}

	public function __set($p_name,$p_value){
		if (in_array($p_name,array('upload_dir','max_size','allow_types'))) {
			$this->p_name = $p_value;
		}
	}

	public function __get($p_name){
		if($p_name == 'erroe_info'){
			return $this->p_name;
		}
	}

	/**
	 * 拿到一个上传文件的信息
	 *判断其合理性 移动到指定目标
	 *
	 * @param  [type] $file   包含了5个上传文件信息的数组
	 * @param  string $prefix 声称文件的前缀
	 * @return  成功， 目标文件名；失败;false
	 */
	function upload($file,$prefix='upload_'){
		//判断是否有错误
		if ($file['error'] != 0) {
			switch ($file['error']) {
				case 1:
					$this->error_info = '文件太大.超过php.ini限制';
					break;
				case 2:
					$this->error_info = '文件太大，超出表单MAX_FILE_SIZE限制';
					break;
				case 3:
					$this->error_info = '文件没有上传完';
					break;
				case 4:
					$this->error_info = '没有上传文件';
					break;
				case 6:
				case 7:
					$this->error_info = '临时文件夹错误';
				break;
			}
			return false;
		}

		//判断类型
		if (!in_array($file['type'],$this->allow_types)) {
			$this->error_info = '类型不对';
			return false;
		}

		//判断大小
		if ($file['size'] > $this->max_size) {
			$this->error_info = '文件过大';
			return false;
		}

		//判断是否为真的上传文件
		$dst_file = uniqid($prefix).strrchr($file['name'],'.');
		if (move_uploaded_file($file['tmp_name'], $this->upload_dir.$dst_file)) {
			return $dst_file;
		}else{
			$this->error_info = '移动失败';
			return false;
		}
	}
}
