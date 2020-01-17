<?php
namespace basic;

use think\Controller;

class ControllerBasic extends Controller {
  protected  $msg = 'success';
  protected  $code = 200;
  protected  $errCode = 666;
  public function suc($data = []) {
    $msg = $this->msg;
    $code = $this->code;
    $errCode = $this->errCode;
    
    $data += compact('msg', 'errCode');
    return json($data, $code);
  }
}