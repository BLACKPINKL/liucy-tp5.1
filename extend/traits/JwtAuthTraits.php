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
    self::$key = Env::get('app.app_key', 'liucy_admin');
  }
  public static function geteToken(array $params = []) {
    // 私钥
    $key = self::$key;
    $host = request()->host();
    $time = time();
    $params += [
      "iss" => $host,
      "aud" => $host,
      "iat" => $time,
      "nbf" => $time,
      // 过期时间 3小时
      "exp" => strtotime('+ 3hour')
    ];
    $token = JWT::encode($params, $key);
    return $token;
  }

  // 解析token
  public static function parseToken(string $token) {
    try {
      JWT::$leeway = 60;
      $data = JWT::decode($token, self::$key, array('HS256'));

      return json($data);
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
    
  }
}