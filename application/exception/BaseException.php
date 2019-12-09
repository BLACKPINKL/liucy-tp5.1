<?php
namespace app\exception;
use think\Exception;
// 自定义异常基类
class BaseException extends Exception {
  protected $msg = '服务器错误';
  protected $code = 400;
  protected $errCode = 999;
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