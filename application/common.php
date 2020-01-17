<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

// 生成 n位随机不重复的字符串
function randStr($len) {
  $chars ='ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz';
  $string = time();
  for(;$len >= 1; $len--) {
    $position = rand() % strlen($chars);
    $position2 = rand() % strlen($string);
    $string = substr_replace($string, substr($chars, $position, 1), $position2, 0);
  }
  return $string;
}

function encodeStr($str, $salt) {
  return md5(md5($str) . $salt);
}