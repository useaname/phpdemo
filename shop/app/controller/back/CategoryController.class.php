<?php
class CategoryController extends Controller{
	/**
	 *分类列表展示
	 * @return [type] [description]
	 */
	public function listAction(){
		$model_name = new CategoryModel;
		$list = $model_name->getList();
		require CURR_VIEW_DIR.'category.html';
	}
}
