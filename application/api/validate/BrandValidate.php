<?php
namespace app\api\validate;

use service\ValidateService;

class BrandValidate extends ValidateService {
  protected $rule = [
    'brand_name' => 'require',
    'brand_url' => 'require|url',
    'brand_logo' => 'require',
    'brand_status' => 'in:0,1',

  ];
}