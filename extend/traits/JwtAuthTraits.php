<?php
namespace traits;

use Exception;
use \Firebase\JWT\JWT;
use think\facade\Env;
use \Firebase\JWT\BeforeValidException as BeforeValidEx;
use \Firebase\JWT\SignatureInvalidException as SignatureEx;
use \Firebase\JWT\ExpiredException as ExpiredEx;
use app\exception\BaseException;
class JwtAuthTraits {
  private static $key;
  public function __construct() {
    self::$key = Env::get('app.app_key');
  }
  public static function geteToken(array $params = []) {
    // 私钥
    $key = (new self)::$key;
    $host = app()->request->host();
    $scheme = app()->request->scheme();
    $time = time();
    $url = $scheme . '://' . $host;
    $aud = config('app_debug') ? Env::get('app.app_aud') : $url;
    $params += [
      // 签发者
      "iss" => $url,
      // 接受者
      "aud" => $aud,
      "iat" => $time,
      "nbf" => $time,
      // 过期时间 3小时
      "exp" => strtotime('+ 3hour')
    ];
    $token = JWT::encode($params, $key, 'HS256');
    return $token;
  }

  // 解析token
  public static function parseToken(string $token) {
    try {
      $key = (new self)::$key;
      
      $data = JWT::decode($token, $key, array('HS256'));
      
    }catch(SignatureEx $e) {
      //签名不正确
      throw new BaseException(['msg' => $e->getMessage(), 'errCode' => 10001]);
    }catch(BeforeValidEx $e) {
      throw new BaseException(['msg' => $e->getMessage(), 'errCode' => 10002]);
    }catch(ExpiredEx $e) {
      // token 过期
      throw new BaseException(['msg' => $e->getMessage(), 'errCode' => 10003]);

    }catch(Exception $e) {
      // 其它错误 使用系统错误
      throw new Exception($e->getMessage());

    }
    return $data;
  }
}