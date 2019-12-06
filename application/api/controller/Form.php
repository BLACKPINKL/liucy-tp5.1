<?php

namespace app\api\controller;
use app\api\model\Form as FormModel;
class Form {
  public function add() {
    $data = request()->param();
    // dump($data);
    $res = FormModel::addForm($data);
    if($res) {
      return json('成功');
    }else {
      return json('失败');
    }
  }

  public function get() {
    $data = request()->param();

    $res = FormModel::getForm($data['name']);
    
    
    // dump($res);
    return json($res);
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