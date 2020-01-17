<?php
namespace app\api\model;
use basic\ModelBasic;
use Exception;
use app\exception\BaseException;
use think\model\concern\SoftDelete;
class Goods extends ModelBasic {
  use SoftDelete;
  protected $deleteTime = 'delete_time';

  public static function addGoods($data) {
    $res = self::create($data);
    if(!$res) throw new Exception('添加商品分类失败');
    return $res;
  }
  public static function getGoods() {
    // 获取商品分类数据时需要包含已经软删除的数据
    $res = self::withTrashed()->select();
    if(!$res) return [];
    return $res->toArray();
  }
  public static function getGoodsById($id) {
    // 获取商品分类数据时需要包含已经软删除的数据
    $res = self::withTrashed()->find($id);
    if(!$res) return [];
    return $res->toArray();
  }
  public static function updateGoods($data) {
    $res = self::update($data);
    if(!$res) throw new Exception('更新商品分类失败');
    return $res;
  }
  public static function delGoods($id) {
    $res = self::destroy($id);
    // $Goods = self::onlyTrashed()->find();
    // // dump($Goods);
    // $Goods->restore();
    if(!$res) throw new Exception('删除商品分类失败');
    return $res;
  }

  // 恢复删除
  public static function recoverGoods($id) {
    $Goods = self::onlyTrashed()->find($id);
    if(!$Goods) throw new BaseException(['msg' => '该商品分类未删除', 'errCode' => 20001]);
    $Goods->restore();
    return $Goods;
  }
}