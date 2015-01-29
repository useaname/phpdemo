<?php
class Goods{
	protected $goods_name;
	protected $goods_price;

	final public function getPrice(){
		return '$'.$goods_price.'Yuan';
	}

}

final class Book extends Goods{
	public function getPrice(){
		return '$'.$goods_price * 0.9.'Yuan';
	}
}
