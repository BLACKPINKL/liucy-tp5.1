<?php
namespace app\api\validate;

use service\ValidateService;

class CategoryValidate extends ValidateService {
  protected $rule = [
    'cate_name' => 'require|unique:category',
    'cate_img' => 'url',
    'pid' => 'number',
    'id' => 'require|number'
  ];

  public function sceneAdd() {
    return $this->only([
      'cate_name', 
      'cate_img', 
      'pid', 
    ]);
  }

  public function sceneDel() {
    return $this->only([
      'id'
    ]);
  }
}