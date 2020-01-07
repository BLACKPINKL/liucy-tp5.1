<?php
namespace app\index\controller;

use app\exception\BaseException;
use think\facade\Cache;
use app\index\model\Goods;
use app\index\model\Log;
use app\index\model\Order;
class kill {
  public $redis = null;
  public function __construct() {
    if(!$this->redis) {
       $redis = Cache::store('redis')->handler();
       $this->redis = $redis;
    }
    
  }
  // 秒杀入口
  public function index() {
    // 这里只是模拟商品初始化 实际上这个入口就是用户点击抢购进入的
    $redis = $this->initGoods();



    // 抢购开始
    // 获取当前抢购的商品id
    $id = request()->param(['id']);
    // 减少商品库存 出队  返回剩余商品库存
    $count = $redis->lpop('goods_store');
    // 一旦库存为0 说明当前商品抢购完了 该用户未抢到
    if(!$count || $count < 0) {
      // 记录抢购失败日志
      Log::add();
      throw new BaseException(['msg' => '很抱歉，当前秒杀已结束，您未抢到']);
    }

    // 说明当前还有库存
    // 生成订单号
    $order_no = $this->createOrderNo();
    // 用户id 这里模拟随机生成
    $user_id = mt_rand(0, 1000);
    // 获取商品
    $goods = Goods::get($id);
    // TODO: 生成订单
  }
  private function initGoods() {
    // 库存50
    $store = 50;
    $redis = $this->redis;
    // 删除库存表
    $redis->del('goods_store');
    // 添加50件商品 进队列
    for ($i=0; $i < $store; $i++) { 
      $redis->rpush('goods_store', 1);
    }
    return $redis;
  }
  protected function createOrderNo() {

    return date('ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
  
  }
}