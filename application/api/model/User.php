<?php
namespace app\api\model;
// 自定义模型基类
use \basic\ModelBasic;

class User extends ModelBasic {
  protected static function login($userData) {
    $account = $userData['account'];
    $pass = $userData['password'];
    // md5加密比对

    // $user = self::where('account', $account)->where('password', )
    

  }
}