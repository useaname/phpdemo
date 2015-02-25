<?php

require_once('./Model.class.php');

class MatchModel extends Model{

	public function getList(){
		$sql = 'select m.match_id as id,s1.stu_name as p1,s2.stu_name as p2,m.match_time as time,m.match_result as result from select_match m left join select_student s1 on s1.id=m.player_1 left join select_student s2 on s2.id = m.player_2';

		return $this->db->fetchAll($sql);
	}

	public function del($id){
		$sql = "delete from select_match where match_id=$id";
		return $this->db->query($sql);
	}
}
