<?php
namespace app\wap\model;

use think\Model;

class Comment extends Model {
  public function user() {
   
    return $this->belongsTo('user');
  }
  public function reply() {
   
    return $this->hasMany('reply');
  }

  public static function add($data) {

    // 获取用户id
    $user_id = $data['user_id'];
    $user = User::get($user_id)->toArray();
    $data += $user;
    $res = self::create($data);
    return $res;
  }

  public static function getCommentsById($id) {

    $data = self::with('reply')->where('compose_id', $id)->select();

    return $data->toArray();
  }
}