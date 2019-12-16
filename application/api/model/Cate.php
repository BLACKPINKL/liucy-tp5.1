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
  public static function getCateById($id) {
    $res = self::get($id);
    if(!$res) return [];
    return $res->toArray();
  }
  public static function delCate($id) {
    
    $res = self::destroy($id);
    if(!$res) throw new Exception("删除分类失败");
    return $res;
  }
  public static function updateCate($data) {
    
    $res = self::update($data);
    if(!$res) throw new Exception("更新分类失败");
    return $res;
  }
}