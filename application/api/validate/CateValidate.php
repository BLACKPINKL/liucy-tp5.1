<?php
namespace app\api\validate;

use service\ValidateService;

class CateValidate extends ValidateService {
  protected $rule = [
    'cate_name' => 'require',
    // 'cate_type' => 'require|number|between:1,5',
    'description' => 'require',
    'show_nav' => 'number|in:0,1',
    'pid' => 'require|number'
  ];
}