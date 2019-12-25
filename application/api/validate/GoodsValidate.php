<?php
namespace app\api\validate;

use service\ValidateService;

class GoodsValidate extends ValidateService {
  protected $rule = [
    'goods_name' => 'require|max:50|min:5',
    'goods_des' => 'require',
    'thumb' => 'require|url',
    'mark_price' => 'require|number|>0',
    'shop_price' => 'require|number|>0',
    'on_sale' => 'require|number|in:0,1',
    'category_id' => 'require|number',
    'brand_id' => 'number',
    'type_id' => 'number',
    'id' => 'require|number',
  ];

  // 自定义验证价格
  protected function checkPrice($value) { 
    if (!preg_match('/^[0-9]+(.[0-9]{2})$/', $value)) return '商品价格只能保留两位小数点';
    return true;
  }

  public function sceneAdd() {
    return $this->only([
      'goods_name',
      'goods_des',
      'thumb',
      'mark_price',
      'shop_price',
      'on_sale',
      'category_id', 
    ]);
  }

  public function sceneDel() {
    return $this->only([
      'id'
    ]);
  }
}