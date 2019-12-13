<?php
namespace app\api\controller;
use app\api\model\Cate as CateModel;
use app\api\validate\CateValidate;
use \service\JsonService;

class Cate {
  // 添加分类
  public function add() {
    $data = (new CateValidate)->goCheck();
    CateModel::addCate($data);
    return JsonService::success();
  }
  public function get() {
    $res = CateModel::getCate();
    return JsonService::success(['data' =>$res]);
  }
}