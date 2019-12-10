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
->header('Access-Control-Allow-Origin','http://localhost:8080')
->header('Access-Control-Allow-Headers', 'Authorization, authori-zation, Content-Type, X-Requested-With')
->middleware('auth')
->allowCrossDomain();

// 登录接口单独抽离
Route::group($fix, function() {
  Route::group('user', function() {

    Route::post('login', 'User/login');
  });
})->prefix($fix . '/')
->header('Access-Control-Allow-Credentials', 'true')
->header('Access-Control-Allow-Origin','http://localhost:8080')
->header('Access-Control-Allow-Headers', 'Authorization, authori-zation, Content-Type, X-Requested-With')
->allowCrossDomain();