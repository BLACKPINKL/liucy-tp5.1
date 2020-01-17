<?php
namespace app\api\validate;

use service\ValidateService;

class AttrValidate extends ValidateService {
  protected $rule = [
    'attr_name' => 'require|max:30',
    'attr_type' => 'number|in:0,1',
    'attr_values' => 'require',
    'type_id' => 'require|number',
    'id' => 'require|number'
  ];

  public function sceneAdd() {
    return $this->only([
      'attr_name', 
      'attr_type', 
      'type_id', 
      'attr_values', 
    ]);
  }

  public function sceneDel() {
    return $this->only([
      'id'
    ]);
  }
}