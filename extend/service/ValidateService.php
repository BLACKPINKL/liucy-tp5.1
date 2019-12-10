<?php
namespace service;
use app\exception\BaseException;
use think\Validate;
// 全局请求参数校验
class ValidateService extends Validate {
  public function goCheck($scene = '') {
    // 获取请求参数
    $params = request()->param();
    if(!$scene) $res = $this->check($params);
    else $res = $this->scene($scene)->check($params);
    if(!$res) throw new BaseException(['msg' => $this->getError(), 'errCode' => 777]);
    return $params;
  }
}