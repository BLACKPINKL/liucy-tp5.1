<?php

namespace app\http\middleware;

use app\exception\BaseException;
use traits\JwtAuthTraits;

// 拦截请求token
class AuthTokenMiddleware {
    public function handle($request, \Closure $next){
        $token = $request->header('authori-zation');
        if(!$token) throw new BaseException(['msg' => 'token不合法', 'errCode' => 10007]);
        // 校验token合法性
        JwtAuthTraits::parseToken($token);
        return $next($request);
    }
}
