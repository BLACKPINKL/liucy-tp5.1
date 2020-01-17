<?php
namespace app\api\controller;

use basic\ControllerBasic;
use app\api\validate\CategoryValidate;
use app\api\model\Category as CategoryModel;
class Category extends ControllerBasic {
  // 添加品牌
  public function add() {
    $data = (new CategoryValidate)->goCheck(['scene' => 'add']);
    CategoryModel::addCategory($data);
    return $this->suc();
  }
  // 获取品牌列表
  public function get() {
    $res = CategoryModel::getCategory();
    return $this->suc(['data' => $res]);
  }
  // 获取某个品牌
  public function getById() {
    $data = (new CategoryValidate)->goCheck(['scene' => 'del']);
    $res = CategoryModel::getCategoryById($data['id']);
    return $this->suc(['data' => $res]);
  }

  // 更新品牌
  public function update() {
    $data = (new CategoryValidate)->goCheck();
    CategoryModel::updateCategory($data);
    return $this->suc();
  }
  //删除品牌
  public function del() {
    $data = (new CategoryValidate)->goCheck(['scene' => 'del']);
    $res = CategoryModel::delCategory($data['id']);
    return $this->suc();
  }

  // 恢复删除
  public function recover() {
    $data = (new CategoryValidate)->goCheck(['scene' => 'del']);
    CategoryModel::recoverCategory($data['id']);
    return $this->suc();
  }
}