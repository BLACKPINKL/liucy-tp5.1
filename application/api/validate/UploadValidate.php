<?php
namespace app\api\validate;
use \service\ValidateService;
      
class UploadValidate extends ValidateService {
  protected $rule = [
    'fileField' => 'require'
  ];
}