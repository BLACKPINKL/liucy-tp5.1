<?php
namespace traits;
use app\exception\BaseException;
class RequestTraits {
  public static function post($url, $data) {
    $curl = curl_init(); // 启动一个CURL会话
    curl_setopt($curl, CURLOPT_URL, $url); // 要访问的地址
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE); // 对认证证书来源的检查
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE); // 从证书中检查SSL加密算法是否存在
    //curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1); // 使用自动跳转
    //curl_setopt($curl, CURLOPT_AUTOREFERER, 1);    // 自动设置Referer
    curl_setopt($curl, CURLOPT_POST, 1);             // 发送一个常规的Post请求
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);   // Post提交的数据包x
    curl_setopt($curl, CURLOPT_TIMEOUT, 30);         // 设置超时限制 防止死循环
    curl_setopt($curl, CURLOPT_HEADER, 0);           // 显示返回的Header区域内容
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);   // 获取的信息以文件流的形式返回
 
    $tmpInfo = curl_exec($curl); // 执行操作
    (new self)->getErr($curl);
    curl_close($curl); // 关闭CURL会话
    return json_decode($tmpInfo); // 返回数据 json 类型
  }

  
  public static function get($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);  //设置访问的url地址
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//不输出内容
    $result = curl_exec($ch);
    (new self)->getErr($ch);
    curl_close ($ch);
    return json_decode($result);
  }

  private function getErr($curl) {
    //捕抓异常
    if(curl_errno($curl)) {
      $err = curl_error($curl);
      throw new BaseException(['msg' => $err]);
    }
  }
}