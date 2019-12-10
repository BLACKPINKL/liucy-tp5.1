<?php
namespace app\api\validate;
use \service\ValidateService;

class FormValidate extends ValidateService {
  protected $rule = [
    'name' => 'require|unique:form',
    'forms' => 'require'
  ];

  public function sceneGet() {
    return $this->only(['name'])
      ->remove('name', 'unique');
  }

}