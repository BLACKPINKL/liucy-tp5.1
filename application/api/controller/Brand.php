<?php
namespace app\api\controller;
use app\api\validate\BrandValidate;
use app\api\model\Brand as BrandModel;
use service\JsonService;

class Brand {
  // 添加品牌
  public function add() {
    $data = (new BrandValidate)->goCheck(['scene' => 'add']);
    BrandModel::addBrand($data);
    return JsonService::success();
  }
  // 获取品牌
  public function get() {
    $res = BrandModel::getBrand();
    return JsonService::success(['data' => $res]);
  }
  //删除品牌
  public function del() {
    $data = (new BrandValidate)->goCheck(['scene' => 'del']);
    $res = BrandModel::delBrand($data['id']);
    return JsonService::success();
  }
}