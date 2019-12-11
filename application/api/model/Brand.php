<?php
namespace app\api\model;
use basic\ModelBasic;
use Exception;

class Brand extends ModelBasic {
  public static function addBrand($data) {
    $res = self::create($data);
    if(!$res) throw new Exception('添加品牌失败');
    return $res;
  }
}