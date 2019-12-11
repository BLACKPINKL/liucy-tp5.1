<?php
namespace app\api\model;
use \basic\ModelBasic;
use Exception;

class Form extends ModelBasic {
  // 获取form表单时将json转为数组
  public function getFormsAttr($val) {
    $data = json_decode($val);
    
    return $data;
  }
  // 添加表单
  public static function addForm($arr) {
    $createTime = date('Y-m-d H:i:s', time());
    $data = array_merge($arr, compact('createTime'));
    $res = self::create($data);
    if(!$res) throw new Exception('添加失败');
    
    return $res;
  }
  // 获取表单
  public static function getForm($name = '') {
    $data = null;
    if($name) $data = self::getByName($name);
    else $data = self::all();
    return $data->toArray();
  }

  public static function delFormInId($id) {
    $res = self::get($id)->delete();
    if(!$res) throw new Exception('删除失败');
    return $res;
  }

}