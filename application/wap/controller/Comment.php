<?php
namespace app\wap\controller;

use think\Controller;
use app\wap\model\Comment as ComModel;
class Comment extends Controller {
  public function get() {
    $id = request()->param('id');
    $data = ComModel::getCommentsById($id);
    return json($data);
  }
}