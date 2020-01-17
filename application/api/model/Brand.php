<?php
namespace app\api\model;
use basic\ModelBasic;
use Exception;
use think\model\concern\SoftDelete;
use app\exception\BaseException;
class Brand extends ModelBasic {
  use SoftDelete;
  protected $deleteTime = 'brand_status';
  public static function addBrand($data) {
    $res = self::create($data);
    if(!$res) throw new Exception('添加品牌失败');
    return $res;
  }
  public static function getBrand() {
    // 获取品牌数据时需要包含已经软删除的数据
    $res = self::withTrashed()->select();
    if(!$res) return [];
    return $res->toArray();
  }
  public static function getBrandById($id) {
    // 获取品牌数据时需要包含已经软删除的数据
    $res = self::withTrashed()->find($id);
    if(!$res) return [];
    return $res->toArray();
  }
  public static function updateBrand($data) {
    $res = self::update($data);
    if(!$res) throw new Exception('更新品牌失败');
    return $res;
  }
  public static function delBrand($id) {
    $res = self::destroy($id);
    // $brand = self::onlyTrashed()->find();
    // // dump($brand);
    // $brand->restore();
    if(!$res) throw new Exception('删除品牌失败');
    return $res;
  }

  // 恢复删除
  public static function recoverBrand($id) {
    $brand = self::onlyTrashed()->find($id);
    if(!$brand) throw new BaseException(['msg' => '该品牌未删除', 'errCode' => 20001]);
    $brand->restore();
    return $brand;
  }
}