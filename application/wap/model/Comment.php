<?php
namespace app\wap\model;

use think\Model;

class Comment extends Model {
  public static function add($data) {
    $res = self::create($data);
    return $res;
  }
}