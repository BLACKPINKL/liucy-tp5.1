<?php

// 接口路由
$fix = 'api';
Route::group($fix, function() {
  // 表单生成接口
  Route::group('form', function() {
    Route::post('add', '/add');
    Route::get('get', '/get');
    Route::get('delete', '/delete');
    Route::get('getAll', '/getAll');
  })->prefix('api/Form');

  Route::group('brand', function() {
    Route::post('add', '/add');
    Route::get('get', '/get');
    Route::get('getById', '/getById');
    Route::get('del', '/del');
    Route::post('update', '/update');
    Route::get('recover', '/recover');
  })->prefix('api/Brand');

  
  Route::group('cate', function() {
    Route::post('add', '/add');
    Route::get('get', '/get');
    Route::get('getById', '/getById');
    Route::get('del', '/del');
    Route::post('update', '/update');
  })->prefix('api/Cate');


  Route::group('article', function() {
    Route::post('add', '/add');
    Route::get('get', '/get');
    Route::get('getById', '/getById');
    Route::get('del', '/del');
    Route::post('update', '/update');
    // Route::get('recover', '/recover');
  })->prefix('api/Article');

  
  Route::group('category', function() {
    Route::post('add', '/add');
    Route::get('get', '/get');
    Route::get('getById', '/getById');
    Route::get('del', '/del');
    Route::post('update', '/update');
    Route::get('recover', '/recover');
  })->prefix('api/Category');


  Route::group('type', function() {
    Route::post('add', '/add');
    Route::get('get', '/get');
    Route::get('getById', '/getById');
    Route::get('del', '/del');
    Route::post('update', '/update');
    Route::get('recover', '/recover');
  })->prefix('api/Type');

  Route::group('attr', function() {
    Route::post('add', '/add');
    Route::get('get', '/get');
    Route::get('getById', '/getById');
    Route::get('getTypesById', '/getTypesById');
    Route::get('del', '/del');
    Route::post('update', '/update');
  })->prefix('api/Attr');
  
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

  // 上传接口
  Route::post('upload/up', 'Upload/upload');
  
})->prefix($fix . '/')
->header('Access-Control-Allow-Credentials', 'true')
->header('Access-Control-Allow-Origin','http://localhost:8080')
->header('Access-Control-Allow-Headers', 'Authorization, authori-zation, Content-Type, X-Requested-With')
->allowCrossDomain();