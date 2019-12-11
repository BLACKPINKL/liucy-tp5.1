<?php

namespace app\api\controller;
use app\api\model\Form as FormModel;
use app\api\validate\FormValidate;
use \service\JsonService;

class Form {
  // 添加表单
  public function add() {
    $data = (new FormValidate)->goCheck(['scene'=> 'add']);
    // dump($data);
    $res = FormModel::addForm($data);
    return JsonService::success();
  }
  // 获取单个表单
  public function get() {
    $data = (new FormValidate)->goCheck(['scene'=> 'get']);

    $res = FormModel::getForm($data['name']);
    
    return JsonService::success(['data' => $res]);
  }
  // 删除某个表单
  public function delete() {
    $data = (new FormValidate)->goCheck(['scene'=> 'del']);

    $res = FormModel::delFormInId($data['id']);
    
    return JsonService::success();
  }


  // 获取所有表单
  public function getAll() {
    $res = FormModel::getForm();
    return JsonService::success(['data' => $res]);
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