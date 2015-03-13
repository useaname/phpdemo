<?php
class CategoryController extends BackPlatformController{
	/**
	 *分类列表展示
	 * @return [type] [description]
	 */
	public function listAction(){
		$model_name = new CategoryModel;
		$list = $model_name->getList();
		require CURR_VIEW_DIR.'category.html';
	}

	/**
	 * 删除分类
	 */
	public function delAction(){
		$model_category = new CategoryModel;
		if ($model_category->delById($_GET['id'])) {
			//删除成功
			$this->jump('index.php?p=back&c=Category&a=list');
		}else{
			//删除失败
			$this->jump('index.php?p=back&c=Category&a=list','失败：'.$model_category->error_info);
		}
	}

	/**
	 * 增加分类
	 */
	public function addAction(){
		$model_name = new CategoryModel;
		$list = $model_name->getList(0);
		//echo '<pre>';
		//var_dump($list);
		//echo '</pre>';
		require CURR_VIEW_DIR.'categoryAdd.html';
	}

	public function insertAction(){
		$data['cat_name'] = $_POST['cat_name'];
		$data['parent_id'] =$_POST['parent_id'];
		$data['sort_order'] = $_POST['sort_order'];

		$model_name = new CategoryModel;
		if ($model_name->addCate($data)) {
			$this->jump('index.php?p=back&c=Category&a=list');
		}else{
			$this->jump('index.php?p=back&c=Category&a=list','失败：'.$model_category->error_info);
		}


	}

	/**
	 * 修改商品信息
	 * @param  [type] $cat_id 商品ID
	 * @return [type]         [description]
	 */
	public function editAction(){
		$cat_id = $_GET['id'];
		$modle_name = new CategoryModel;
		$curr_cat = $modle_name -> getById($cat_id);
		$cat_list = $modle_name->getList(0);
		require CURR_VIEW_DIR.'categoryEdit.html';
	}


	public function updateAction(){
		$data['cat_id'] = $_POST['cat_id'];
		$data['parent_id'] = $_POST['parent_id'];
		$data['sort_order'] = $_POST['sort_order'];
		$data['cat_name'] = $_POST['cat_name'];

		$model_name = new CategoryModel;
		if ($model_name -> updateCat($data)) {
			$this->jump('index.php?p=back&c=Category&a=list');
		}else{
			$this->jump('index.php?p=back&c=Category&a=list','修改失败'.$model_name->error_info);
		}
	}

}
