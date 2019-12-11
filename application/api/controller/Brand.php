<?php
namespace app\api\controller;
use app\api\validate\BrandValidate;
use app\api\model\Brand as BrandModel;
use service\JsonService;

class Brand {
  // 添加品牌
  public function add() {
    $data = (new BrandValidate)->goCheck();
    BrandModel::addBrand($data);
    return JsonService::success();
  }
}