<?php
namespace app\api\controller;

use basic\ControllerBasic;
use app\api\validate\AttrValidate;
use app\api\model\Attr as AttrModel;
class Attr extends ControllerBasic {
  // 添加品牌
  public function add() {
    $data = (new AttrValidate)->goCheck(['scene' => 'add']);
    AttrModel::addAttr($data);
    return $this->suc();
  }
  // 获取品牌列表
  public function get() {
    $res = AttrModel::getAttrs();
    return $this->suc(['data' => $res]);
  }
  // 获取某个品牌
  public function getById() {
    $data = (new AttrValidate)->goCheck(['scene' => 'del']);
    $res = AttrModel::getAttrsById($data['id']);
    return $this->suc(['data' => $res]);
  }
  public function getTypesById() {
    $data = (new AttrValidate)->goCheck(['scene' => 'del']);
    $res = AttrModel::getTypesById($data['id']);
    return $this->suc(['data' => $res]);
  }

  // 更新品牌
  public function update() {
    $data = (new AttrValidate)->goCheck();
    AttrModel::updateAttr($data);
    return $this->suc();
  }
  //删除品牌
  public function del() {
    $data = (new AttrValidate)->goCheck(['scene' => 'del']);
    $res = AttrModel::delAttr($data['id']);
    return $this->suc();
  }

 
}