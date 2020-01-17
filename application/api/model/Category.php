<?php
namespace app\api\model;
use basic\ModelBasic;
use Exception;
use app\exception\BaseException;
use think\model\concern\SoftDelete;
class Category extends ModelBasic {
  use SoftDelete;
  protected $deleteTime = 'delete_time';

  public static function addCategory($data) {
    $res = self::create($data);
    if(!$res) throw new Exception('添加商品分类失败');
    return $res;
  }
  public static function getCategory() {
    // 获取商品分类数据时需要包含已经软删除的数据
    $res = self::withTrashed()->select();
    if(!$res) return [];
    return $res->toArray();
  }
  public static function getCategoryById($id) {
    // 获取商品分类数据时需要包含已经软删除的数据
    $res = self::withTrashed()->find($id);
    if(!$res) return [];
    return $res->toArray();
  }
  public static function updateCategory($data) {
    $res = self::update($data);
    if(!$res) throw new Exception('更新商品分类失败');
    return $res;
  }
  public static function delCategory($id) {
    $res = self::destroy($id);
    // $Category = self::onlyTrashed()->find();
    // // dump($Category);
    // $Category->restore();
    if(!$res) throw new Exception('删除商品分类失败');
    return $res;
  }

  // 恢复删除
  public static function recoverCategory($id) {
    $category = self::onlyTrashed()->find($id);
    if(!$category) throw new BaseException(['msg' => '该商品分类未删除', 'errCode' => 20001]);
    $category->restore();
    return $category;
  }
}