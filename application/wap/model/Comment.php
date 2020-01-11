<?php
namespace app\wap\model;

use think\Model;

class Comment extends Model {
  public function user() {
   
    return $this->belongsTo('user');
  }
  public static function add($data) {
    $res = self::create($data);
    return $res;
  }
  public static function getCommentsById($id) {

    $data = self::with('user')->where('compose_id', $id)->select();
    

    return $data->toArray();
  }
}