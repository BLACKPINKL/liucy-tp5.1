<?php

// 接口路由
$fix = 'api';

Route::group($fix, function() {
  Route::group('form', function() {
    Route::post('add', 'Form/add');
    Route::get('get', 'Form/get');
    Route::post('upload', 'Form/testUpload');
  });
})->prefix($fix . '/')
->header('Access-Control-Allow-Credentials', 'true')
->header('Access-Control-Allow-Headers', 'Authorization, authori-zation, Content-Type, X-Requested-With')
->allowCrossDomain();