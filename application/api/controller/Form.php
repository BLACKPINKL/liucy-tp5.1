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
    return json($res);
  }
}