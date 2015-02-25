<?php

require_once('./Model.class.php');

class ClassModel extends Model{

	public function getList(){
		$sql = 'select count(select_student.stu_name) as count,select_class.class_name as classname from select_student left join select_class on select_student.class_id = select_class.id group by select_class.id';

		//return $this->db->query($sql);
		return $this->db->fetchAll($sql);
	}

	public function delClass($id){
		$sql = "delete from select_class where class_id=$id";
		return $this->db->query($sql);
	}
}
