<?php
abstract class Goods{
	protected $goods_name;
	protected $goods_price;

	final public function getPrice(){
		return '$'.$goods_price.'Yuan';
	}

	abstract public function getName();
}

class Book extends Goods{
	public function getName(){
		return $this->goods_name;
	}
}

class Phone extends Goods{
	public function getName(){
		return $this->goods_name;
	}
}