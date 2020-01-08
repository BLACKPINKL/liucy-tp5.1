<?php
namespace app\index\model;

use Exception;
use think\Model;

class Goods extends Model{
  
  public static function getGoods($id) {
    $res = self::where('id', $id)->find();
    return $res;
  }
  public static function updateGoods($id) {
    $res = self::where('id', $id)->find();
    $res->dec('count', 1);
    $res->save();
    
    return $res;
  }
}