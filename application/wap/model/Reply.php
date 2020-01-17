<?php
namespace app\wap\model;

use think\Model;
use Exception;
class Reply extends Model {

  public static function add($data) {
    $user_id = $data['user_id'];
    
    $userModel = new User();
    $user = $userModel->where('id', $user_id)->hidden(['id'])->find();
    if(!$user) throw new Exception('用户不存在');

    $data += $user->toArray();
    $res = self::create($data);
    return $res;
  }
}