<?php
namespace app\index\controller;
use app\api\model\User;
use \service\JsonService;
use  think\facade\Cache;
// use think\cache\driver\Redis;
use think\Db;

class Index
{
    public function index()
    {
        
        return '<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px;} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:) </h1><p> ThinkPHP V5.1<br/><span style="font-size:30px">12载初心不改（2006-2018） - 你值得信赖的PHP框架</span></p></div><script type="text/javascript" src="https://tajs.qq.com/stats?sId=64890268" charset="UTF-8"></script><script type="text/javascript" src="https://e.topthink.com/Public/static/client.js"></script><think id="eab4b9f840753f8e7"></think>';
    }

    public function hello($name = 'ThinkPHP5')
    {
        // 使用redis
        
        // $redis = Cache::store('redis');

        // // 获取redis对象
        // $redisHanlder = $redis->handler();
        // $redisHanlder->del('goods_store');
        //    $redis->set('bbb', 789);
        //    $data = $redis->get('bbb');
        //    dump($data);

        // 实现商品秒杀
        // 1.
        // for ($i=0; $i < 100; $i++) { 
        //     // 添加100件商品入队
        //     $redisHanlder->rpush('goods_store', 1);
        // }

        // 2. 设置秒杀时间
        // $redisHanlder->setTimeout('goods_store', 30);

    }
}
