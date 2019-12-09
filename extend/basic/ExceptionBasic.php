<?php
namespace basic;

use Exception;
use think\exception\Handle;
use app\exception\BaseException;
use think\Log;
// 全局错误处理
class ExceptionBasic extends Handle {
  protected $msg;
  protected $code;
  protected $errCode;
  public function render(Exception $e) {
    
    if($e instanceof BaseException) {
      // 自定义错误. 获取自定义类中的定义属性
      $this->msg = $e->msg;
      $this->code = $e->code;
      $this->errCode = $e->errCode;
      
    }else {
      // 其它类型错误 判断当前环境是否为开发环境
      if(config('app_debug')) {
        // 使用父类的错误提示
        return parent::render($e);
      }else {
        // 无需告知客户端 统一发放服务器错误
        $this->msg = '服务器异常';
        $this->code = 500;
        $this->errCode = 999;

        // 并把错误信息写入日志
        $this->recordErrorLog($e);
      }
    }

    $msg = $this->msg;
    $errCode = $this->errCode;

    return json(compact('msg', 'errCode'), $this->code);
  }
  // 错误信息写入日志
  private function recordErrorLog(Exception $e) {
    Log::init([
      'type' => 'File',
      'path' => LOG_PATH,
      'level' => ['error'],
    ]);
    Log::record($e->getMessage(), 'error');
  }
}