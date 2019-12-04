<?php
namespace app\api\model;
use think\Model;
class Form extends Model {
  protected $pk = 'id';
  // 添加表单
  public static function addForm($arr) {
    $res = self::create($arr);
    return $res;
  }
}