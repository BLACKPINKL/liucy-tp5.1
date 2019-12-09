<?php
namespace service;
use app\exception\BaseException;
use think\Validate;
// 全局请求参数校验
class ValidateService extends Validate {
  public function goCheck() {
    // 获取请求参数
    $params = request()->param();
    $res = $this->batch()->check($params);
    if(!$res) throw new BaseException(['msg' => '请求参数不合法', 'errCode' => 777]);
    return true;
  }
}