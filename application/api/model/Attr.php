<?php
namespace app\api\model;
use basic\ModelBasic;
use Exception;
use app\exception\BaseException;
class Attr extends ModelBasic {
  protected $deleteTime = 'delete_time';
  // 多对一 使用相对关系 belongsTo
  public function type() {
    
    return $this->belongsTo('Type');
  }

  public static function addAttr($data) {
    // 中文逗号转英文
    $data['attr_values'] = str_replace('，', ',', $data['attr_values']);
    $res = self::create($data);
    if(!$res) throw new Exception('添加商品属性失败');
    return $res;
  }
  public static function getAttrs() {
    // 关联查询 type模型
    $res = self::all([], 'type');
    if(!$res) return [];
    return $res->toArray();
  }
  public static function getAttrsById($id) {
    // 获取商品属性数据时需要包含已经软删除的数据
    $res = self::get($id);
    if(!$res) return [];
    return $res->toArray();
  }
  // 根据商品类型id 获取当前属性
  public static function getTypesById($id) {
    $attrs = self::where('type_id', $id)->select();
    $type = Type::get($id);
    foreach($attrs as &$key) {
      $key['type'] = $type;
    }
    if(!$attrs) return [];
    return $attrs->toArray();
  }
  public static function updateAttr($data) {
    $res = self::update($data);
    if(!$res) throw new Exception('更新商品属性失败');
    return $res;
  }
  public static function delAttr($id) {
    $res = self::destroy($id, true);
    // $Attr = self::onlyTrashed()->find();
    // // dump($Attr);
    // $Attr->restore();
    if(!$res) throw new Exception('删除商品属性失败');
    return $res;
  }
}