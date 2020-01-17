<?php
namespace app\wap\model;

use think\Model;

class Article extends Model {
  public function user() {
    return $this->belongsTo('User', 'user_id');
  }
  public function category() {
    return $this->belongsTo('Category', 'category_id');
  }
  // 根据时间转换 天 小时 分钟 
  public function getCreateTimeAttr($value) {
    // 获取当前时间
    $now = date('Y-m-d H:i:s');
    return $this->timeDiff(strtotime($now), $value);
  }
  public static function add($data) {
    $res = self::create($data);
    return $res;
  }
  public static function getArts() {
    $res = self::all([], 'user,category');
    return $res->toArray();
  }
  public static function getArtById($id) {
    $res = self::get($id);
    return $res->toArray();
  }
  // 计算时间差
  protected function timeDiff($startTime, $endTime) {
    if($startTime < $endTime){
      $starttime = $startTime;
      $endtime = $endTime;
    }else{
        $starttime = $endTime;
        $endtime = $startTime;
    }
     //计算天数
     $timediff = $endtime-$starttime;
     $days = intval($timediff / 86400);
     //计算小时数
     $remain = $timediff % 86400;

     if($timediff < 60){
      $secs = $remain % 3600;
      return $secs . '秒';
     }
     if($timediff < 3600){
      $secs = $remain % 3600;
      $mins = intval($remain/60);
      return $mins . '分钟';
     }
     if($timediff < 86400){
      $hours = intval($remain / 3600);
      return $hours . '小时';
     }
     return $days . '天';
  }
}