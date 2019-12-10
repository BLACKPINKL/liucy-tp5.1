<?php
namespace app\api\model;
// 自定义模型基类
use \basic\ModelBasic;
use \traits\JwtAuthTraits;
use app\exception\BaseException;
class User extends ModelBasic {
  public static function login($userData) {
    $account = $userData['account'];
    $pass = $userData['password'];
    // md5加密比对
    // $code = encodeStr($pass, '158Q757E9610B41');
    $user = self::where('account', $account)->find();
    
    if(!$user) throw new BaseException(['msg' => '用户不存在', 'errCode' => 10004]);
    
    // // 用户存在 获取盐
    $salt = $user->salt;
    $code = encodeStr($pass, $salt);
    // // 比较密码是否匹配
    if($code !== $user->password) throw new BaseException(['msg' => '密码错误', 'errCode' => 10005]);
    
    // // 校验通过 获取 token 存入当前用户信息
    $params = ['data' => [
      'role' => $user->role, 
      'user' => $account
      ]
    ];
    $token = JwtAuthTraits::geteToken($params);
    $params['data'] += compact('token');
    return $params;
  }
}