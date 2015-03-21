<?php
class GoodsController extends BackPlatformController{
	/**
	 * 增加商品跳转动作
	 */
	public function addAction(){
		//得到所有分类
		$model_category = new CategoryModel;
		$cat_list = $model_category -> getList();
		require CURR_VIEW_DIR.'goodsAdd.html';
	}

          /**
	 * 增加商品
	 */
	public function insertAction(){
		//获取添加的商品信息
		$data['goods_name'] = $_POST['goods_name'];
		$data['goods_sn'] = $_POST['goods_sn'];
		$data['cat_id'] = $_POST['cat_id'];
		$data['shop_price'] = $_POST['shop_price'];
		$data['market_price'] = $_POST['market_price'];
		$data['goods_desc'] = $_POST['goods_desc'];
		$data['goods_number'] = $_POST['goods_number'];
		//商品状态
		$is_best = isset($_POST['is_best'])?$_POST['is_best']:0;
		$is_new = isset($_POST['is_new'])?$_POST['is_new']:0;
		$is_hot = isset($_POST['is_hot'])?$_POST['is_hot']:0;
		$data['goods_status'] = 0|$is_best|$is_new|$is_hot;
		$data['is_on_sale'] = isset($_POST['is_on_sale'])?$_POST['is_on_sale']:'0';
		$data['add_time'] = time();


		$model_goods = new  GoodsModel;
		if ($model_goods -> insertGoods($data)) {
			$this->jump('index.php?p=back&c=Goods&a=list');
		}else{
			$this->jump('index.php?p=back&c=Goods&a=add','失败原因');
		}
	}
}
