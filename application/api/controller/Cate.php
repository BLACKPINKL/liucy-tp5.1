<?php
namespace app\api\controller;
use app\api\model\Cate as CateModel;
use app\api\validate\CateValidate;
use \service\JsonService;

class Cate {
  // 添加分类
  public function add() {
    $data = (new CateValidate)->goCheck(['scene' => 'add']);
    CateModel::addCate($data);
    return JsonService::success();
  }
  public function get() {
    $res = CateModel::getCate();
    return JsonService::success(['data' => $res]);
  }
  public function getById() {
    $data = (new CateValidate)->goCheck(['scene' => 'getById']);
    $res = CateModel::getCateById($data['id']);
    return JsonService::success(['data' => $res]);
  }

  public function update() {
    $data = (new CateValidate)->goCheck(['scene' => 'update']);
    $res = CateModel::updateCate($data);
    return JsonService::success();
  }
  public function del() {
    $data = (new CateValidate)->goCheck(['scene' => 'del']);
    $res = CateModel::delCate($data['id']);
    return JsonService::success();
  }
}