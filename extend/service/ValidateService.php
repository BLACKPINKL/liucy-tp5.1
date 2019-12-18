<?php
namespace service;
use app\exception\BaseException;
use think\Validate;
use think\facade\Request;
// 全局请求参数校验
class ValidateService extends Validate {
  public function goCheck($params = []) {
    // 获取请求参数
    $data = Request::param();
    // dump($data);
    // $res = $this->check($data);
    // return $res;
    // 判断是否传入scene为验证场景
    if(!array_key_exists('scene', $params)) $res = $this->check($data);
    else $res = $this->scene($params['scene'])->check($data);
    if(!$res) throw new BaseException(['msg' => $this->getError(), 'errCode' => 777]);
    
    return $data;
  }
}