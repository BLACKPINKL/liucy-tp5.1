<?php
namespace app\api\validate;

use service\ValidateService;

class BrandValidate extends ValidateService {
  protected $rule = [
    'brand_name' => 'require',
    'brand_url' => 'require|url',
    'brand_logo' => 'require',
    'id' => 'require|number'
  ];

  public function sceneAdd() {
    return $this->only([
      'brand_name', 
      'brand_url', 
      'brand_logo', 
    ]);
  }

  public function sceneDel() {
    return $this->only([
      'id'
    ]);
  }
}