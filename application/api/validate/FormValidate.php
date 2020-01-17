<?php
namespace app\api\validate;
use \service\ValidateService;

class FormValidate extends ValidateService {
  protected $rule = [
    'name' => 'require|unique:form',
    'forms' => 'require',
    'id' => 'require|number'
  ];

  public function sceneAdd() {
    return $this->only(['name', 'forms']);
  }

  public function sceneGet() {
    return $this->only(['name'])
      ->remove('name', 'unique');
  }

  public function sceneDel() {
    return $this->only(['id']);
  }

}