<?php
namespace app\api\validate;

use service\ValidateService;
// 用户模块参数校验
class UserValidate extends ValidateService {
  protected $rule = [
    'account|账号' => 'require|max:10',
    'password|密码' => 'require|length:32'
  ];

}