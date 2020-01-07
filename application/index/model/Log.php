<?php
namespace app\index\model;

use Exception;
use think\Model;

class Log extends Model{
  public static function add() {
    $res = self::create(['status' => 0]);
    if(!$res) throw new Exception();
    return $res;
  }
  
}