<?php
namespace app\wap\controller;

use think\Controller;
use app\wap\model\Comment as ComModel;
use app\wap\model\Reply as ReplyModel;
class Comment extends Controller {
  public function get() {
    $id = request()->param('id');
    $data = ComModel::getCommentsById($id);
    return json($data);
  }
  // 评论回复
  public function reply() {
    $data = request()->param();
    // dump($data);
    ReplyModel::add($data);
    return json(['msg' => 'ok']);
  }
}