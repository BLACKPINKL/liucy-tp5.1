<?php
namespace app\api\validate;

use service\ValidateService;

class CateValidate extends ValidateService {
  protected $rule = [
    'cate_name' => 'require',
    // 'cate_type' => 'require|number|between:1,5',
    'description' => 'require',
    'show_nav' => 'number|in:0,1',
    'pid' => 'require|number',
    'id' => 'require|number|notBetween:1,3'
  ];

  public function sceneAdd() {
    return $this->only([
      'cate_name',
      'description',
      'show_nav',
      'pid'
    ])->append('cate_name', 'unique:cate');
  }
  
  public function sceneUpdate() {
    return $this->only([
      'cate_name',
      'description',
      'show_nav',
      'pid',
      'id'
    ])->remove('id', 'notBetween');
  }



  public function sceneGetById() {
    return $this->only(['id'])
    ->remove('id', 'notBetween');
  }

  public function sceneDel() {
    return $this->only(['id']);
  }
}