<?php
namespace app\api\controller;
use app\exception\BaseException;
use \service\JsonService;
use app\api\validate\UploadValidate;

class Upload {
  // 上传接口
  public function upload() {
    $data = (new UploadValidate)->goCheck();
    
    $fileField = $data['fileField'];

    $file = request()->file($fileField);
    $info = $file->move('static/upload');
    if(!$info) throw new BaseException(['msg' => $file->getError(), 'errCode' => 40001]);

    $fileName = 'http://' . request()->host() . '/static/upload/' . $info->getSaveName();
    return JsonService::success(['data' => $fileName]);

  }
}