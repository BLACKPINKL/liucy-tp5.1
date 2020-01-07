<?php
namespace app\index\model;

use Exception;
use think\Model;

class Goods extends Model{
  
  public static function get($id) {
    $res = self::field('count', 'amount')->where('id', $id)->find();
    return $res;
  }
}