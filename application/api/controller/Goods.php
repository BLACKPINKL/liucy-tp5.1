<?php
namespace app\api\controller;

use basic\ControllerBasic;
use app\api\validate\GoodsValidate;
use app\api\model\Goods as GoodsModel;
class Goods extends ControllerBasic {
  // 添加品牌
  public function add() {
    $data = (new GoodsValidate)->goCheck(['scene' => 'add']);
    GoodsModel::addGoods($data);
    return $this->suc();
  }
  // 获取品牌列表
  public function get() {
    $res = GoodsModel::getGoods();
    return $this->suc(['data' => $res]);
  }
  // 获取某个品牌
  public function getById() {
    $data = (new GoodsValidate)->goCheck(['scene' => 'del']);
    $res = GoodsModel::getGoodsById($data['id']);
    return $this->suc(['data' => $res]);
  }

  // 更新品牌
  public function update() {
    $data = (new GoodsValidate)->goCheck();
    GoodsModel::updateGoods($data);
    return $this->suc();
  }
  //删除品牌
  public function del() {
    $data = (new GoodsValidate)->goCheck(['scene' => 'del']);
    $res = GoodsModel::delGoods($data['id']);
    return $this->suc();
  }

  // 恢复删除
  public function recover() {
    $data = (new GoodsValidate)->goCheck(['scene' => 'del']);
    GoodsModel::recoverGoods($data['id']);
    return $this->suc();
  }
}