<?php
namespace app\api\controller;
use app\api\model\User as UserModel;
use \service\JsonService;
class User {
  public function login() {
    $data = request()->param();
    $token = UserModel::login($data);
    return JsonService::success(compact('token'));
  }
}