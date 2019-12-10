<?php
namespace service;
// 接口成功 统一返回成功格式
class JsonService {
  public static $msg = 'success';
  public static $code = 200;
  public static $errCode = 666;
  public static function success($data = []) {
    $msg = self::$msg;
    $code = self::$code;
    $errCode = self::$errCode;
    
    $data += compact('msg', 'errCode');
    return json($data, $code);
  }
}