<?php
namespace app\api\model;
use think\Model;
class Form extends Model {
  protected $pk = 'id';
  // 获取form表单时将json转为数组
  public function getFormsAttr($val) {
    return json_decode($val);
  }
  // 添加表单
  public static function addForm($arr) {
    $createTime = date('Y-m-d H:i:s', time());
    $data = array_merge($arr, compact('createTime'));
    $res = self::create($data);
    return $res;
  }
  // 获取表单
  public static function getForm($name) {
    $data = self::getByName($name);
    return $data;
  }

}