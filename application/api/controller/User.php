<?php
namespace app\api\controller;
use app\api\model\User as UserModel;
use \service\JsonService;
use app\api\validate\UserValidate;
class User {
  public function login() {
    $data = (new UserValidate)->goCheck();
    $token = UserModel::login($data);
    return JsonService::success($token);
  }
}