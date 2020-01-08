<?php
namespace app\index\model;

use Exception;
use think\Model;

class Order extends Model{
  
  public static function add($data) {
    $res = self::create($data);
    if(!$res) throw new Exception();
    return $res;
  }
}