<?php
class GoodsModel extends Model{
	protected $table_name = 'goods';

	public function insertGoods($data){

		return $this->autoInsert($data);	}
}
