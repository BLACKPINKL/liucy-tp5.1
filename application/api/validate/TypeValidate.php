<?php
namespace app\api\validate;

use service\ValidateService;

class TypeValidate extends ValidateService {
  protected $rule = [
    'type_name' => 'require',
    'id' => 'require|number'
  ];

  public function sceneAdd() {
    return $this->only([
      'type_name', 
    ]);
  }

  public function sceneDel() {
    return $this->only([
      'id'
    ]);
  }
}