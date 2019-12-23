<?php
namespace app\api\controller;

use basic\ControllerBasic;
use app\api\validate\TypeValidate;
use app\api\model\Type as TypeModel;
class Type extends ControllerBasic {
  // 添加品牌
  public function add() {
    $data = (new TypeValidate)->goCheck(['scene' => 'add']);
    TypeModel::addType($data);
    return $this->suc();
  }
  // 获取品牌列表
  public function get() {
    $res = TypeModel::getType();
    return $this->suc(['data' => $res]);
  }
  // 获取某个品牌
  public function getById() {
    $data = (new TypeValidate)->goCheck(['scene' => 'del']);
    $res = TypeModel::getTypeById($data['id']);
    return $this->suc(['data' => $res]);
  }

  // 更新品牌
  public function update() {
    $data = (new TypeValidate)->goCheck();
    TypeModel::updateType($data);
    return $this->suc();
  }
  //删除品牌
  public function del() {
    $data = (new TypeValidate)->goCheck(['scene' => 'del']);
    $res = TypeModel::delType($data['id']);
    return $this->suc();
  }

  // 恢复删除
  public function recover() {
    $data = (new TypeValidate)->goCheck(['scene' => 'del']);
    TypeModel::recoverType($data['id']);
    return $this->suc();
  }
}