<?php
class CategoryModel extends Model{
	/**
	 * 获取所有分类信息
	 * @return 所有分类
	 */
	public function getList($p_id=0){
		$sql = "select * from `demo_category` order by sort_order";
		$list = $this->db->fetchAll($sql);
		//return $list;
		$list =  $this->getTree($list,$p_id,0);
		return $list;
	}

	/**
	 * 获取树形视图
	 * @param  [type]  $arr  所有信息
	 * @param  integer $pid  父分类ID
	 * @param  [type]  $deep 当前的分类深度
	 * @return [type]        [description]
	 */
	public function getTree($arr,$pid=0,$deep=0){
		static $tree = array();
		foreach ($arr as $row ) {
			if ($row['parent_id'] == $pid) {
				$row['deep'] =$deep;
				$tree[ ]= $row;
				$this->getTree($arr,$row['cat_id'],$deep+1);
			}
		}
		return $tree;
	}
	/**
	 * 利用ID删除分类
	 * @param  [type] $id [description]
	 * @return bool
	 */
	public function delById($id){
		if ($this->isLeaf($id) ){
			$this->error_info = '分类不是末级分类';
			return false;
		}
		$sql = "delete from demo_category where `cat_id`=$id";
		return $this->db->query($sql);
	}

	/**
	 * 判断当前分类下是否有子节点
	 * @return boolean         [description]
	 */
	public function isLeaf($cat_id){
		$sql = "select count(*) from demo_category where parent_id=$cat_id";
		$child_count = $this->db->fetchColoum($sql);
		return $child_count == 0;
	}

	/**
	 * 插入新分类
	 * @param $data 当前插入分类的信息
	 */
	public function addCate($data){
		if($data['cat_name'] ==''){
			$this->error_info = '分类名不能为空';
			// return false;
		}

		$sql = "SELECT count(*) from demo_category where parent_id={$data['parent_id']} and cat_name='{$data['cat_name']}' ";

		$cat_count = $this->db->fetchColoum($sql);
		if ($cat_count > 0) {
			$this->error_info = '分类已经存在';
		}

		$sql = "INSERT INTO `demo_category`(`cat_name`, `sort_order`, `parent_id`) VALUES ('{$data['cat_name']}','{$data['sort_order']}','{$data['parent_id']}')";
		return $this->db->query($sql);
	}

	public function getById($cat_id){
		$sql = "select * from demo_category where cat_id='{$cat_id}'";
		return $this->db->fetchRow($sql);
	}

	public function updateCat($data){
		//上级id不能为自己和后代ID
		$child_list = $this->getList($data['cat_id']);
		$ids = array($data['cat_id']);
		foreach ($child_list as $row) {
			$ids[] = $row['cat_id'];
		}

		if (in_array($data['parent_id'],$ids)) {
			$this->error_info = '不能为自己或后带分类的字分类';
			return false;
		}

		//echo $data['cat_id'];die();

		$sql = "update demo_category set cat_name='{$data['cat_name']}',sort_order={$data['sort_order']},parent_id={$data['parent_id']} where cat_id={$data['cat_id']}";
		return $this->db->query($sql);
	}

}
