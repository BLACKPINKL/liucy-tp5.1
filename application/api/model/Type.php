<?php
namespace app\api\model;
use basic\ModelBasic;
use Exception;
use app\exception\BaseException;
use think\model\concern\SoftDelete;
class Type extends ModelBasic {
  use SoftDelete;
  protected $deleteTime = 'delete_time';

  public static function addType($data) {
    $res = self::create($data);
    if(!$res) throw new Exception('添加商品类型失败');
    return $res;
  }
  public static function getType() {
    // 获取商品类型数据时需要包含已经软删除的数据
    $res = self::withTrashed()->select();
    if(!$res) return [];
    return $res->toArray();
  }
  public static function getTypeById($id) {
    // 获取商品类型数据时需要包含已经软删除的数据
    $res = self::withTrashed()->find($id);
    if(!$res) return [];
    return $res->toArray();
  }
  public static function updateType($data) {
    $res = self::update($data);
    if(!$res) throw new Exception('更新商品类型失败');
    return $res;
  }
  public static function delType($id) {
    $res = self::destroy($id);
    // $Type = self::onlyTrashed()->find();
    // // dump($Type);
    // $Type->restore();
    if(!$res) throw new Exception('删除商品类型失败');
    return $res;
  }

  // 恢复删除
  public static function recoverType($id) {
    $Type = self::onlyTrashed()->find($id);
    if(!$Type) throw new BaseException(['msg' => '该商品类型未删除', 'errCode' => 20001]);
    $Type->restore();
    return $Type;
  }
}