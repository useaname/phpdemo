<?php
abstract class T{
	abstract protected function f1();
	abstract protected function f2();
}
// class S1 extends T{

// }
// class S2  extends T{

// }
interface i_Goods {
	public function sayName();
	public function sayPrice();

}

abstract class Goods implements i_Goods{
	protected $goods_name;
	protected $goods_price;
	final public function sayPrice(){
		return 'Y'.$this->goods_price.'元';
	}
}


// final class Book{
// 	publiuc function sayName(){
// 		return  '《'.$this->goods_name.'》'；
// 	}
// }

final class Phone extends Goods{
	public function sayName(){
		return $this->goods_name;
	}
}

echo '<hr />';
interface i_a{
	const PAI = 3.14;
	public function sayA();
}
interface i_b{
	public function sayB();
}
class A implements i_a,i_b{
	public function sayA(){

	}
	public function sayB(){


	}
}
echo A::PAI;

var_dump(class_exists('i_a'));
var_dump(class_exists('A'));