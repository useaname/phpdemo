<?php
class CategoryModel extends Model{
	/**
	 * 获取所有分类信息
	 * @return 所有分类
	 */
	public function getList(){
		$sql = "select * from `demo_category` order by sort_order";
		$list = $this->db->fetchAll($sql);
		//return $list;
		$list =  $this->getTree($list,0,0);
		return $list;
	}

	/**
	 * 获取树形视图
	 * @param  [type]  $arr  所有信息
	 * @param  integer $pid  父分类ID
	 * @param  [type]  $deep 当前的分类深度
	 * @return [type]        [description]
	 */
	public function getTree($arr,$pid=0,$deep){
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
}
