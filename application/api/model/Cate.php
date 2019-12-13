<?php
namespace app\api\model;

use basic\ModelBasic;
use Exception;
class Cate extends ModelBasic {
  public static function addCate($data) {
    $res = self::create($data);
    if(!$res) throw new Exception("添加分类失败");
    return $res;
  }
  public static function getCate() {
    $res = self::all();
    if(!$res) return [];
    return $res->toArray();
  }
}