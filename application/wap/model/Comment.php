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
    $user = User::where('id', $user_id)->toArray();
    $data += $user;
    $res = self::create($data);
    return $res;
  }

  public static function getCommentsById($id) {

    $data = self::with('reply')->where('compose_id', $id)->select();
    foreach($data as $item) {
      // 获取该评论下的回复列表
      
      $reply = $item->reply;
      if(!count($reply)) continue;
      foreach($reply as &$re) {
        $to_user_id = $re['to_user_id'];
        // 获取回复用户
        $user = User::get($to_user_id);
        $re['to_username'] = $user->username;
        $re['to_avatar'] = $user->avatar;
      }
      
      
    }
    return $data->toArray();
  }
}