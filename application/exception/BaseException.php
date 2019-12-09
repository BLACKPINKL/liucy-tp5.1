<?php
namespace app\exception;
use think\Exception;
// 自定义异常基类
class BaseException extends Exception {
  public $msg = '服务器错误';
  public $code = 400;
  public $errCode = 999;
  public function __construct(array $params = []) {
    if(array_key_exists('msg', $params)) {
      $this->msg = $params['msg'];
    }
    if(array_key_exists('code', $params)) {
      $this->code = $params['code'];
    }
    if(array_key_exists('errCode', $params)) {
      $this->errCode = $params['errCode'];
    }
  }
}