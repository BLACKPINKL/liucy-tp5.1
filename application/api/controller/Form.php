<?php

namespace app\api\controller;
use app\api\model\Form as FormModel;
use app\api\validate\FormValidate;
use \service\JsonService;

class Form {
  // 添加表单
  public function add() {
    $data = (new FormValidate)->goCheck();
    // dump($data);
    $res = FormModel::addForm($data);
    return JsonService::success();
  }
  // 获取表单
  public function get() {
    $data = (new FormValidate)->goCheck('get');

    $res = FormModel::getForm($data['name']);
    
    return JsonService::success(['data' => $res->toArray()]);
  }

  public function testUpload() {
    $file = request()->file('file');
    $info = $file->move('static/upload');
    if($info) {
      return json('http://' . request()->host() . '/static/upload/' . $info->getSaveName());
    }else {
      return json($file->getError());
    }
    
  }
}