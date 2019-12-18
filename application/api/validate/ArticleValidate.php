<?php
namespace app\api\validate;

use service\ValidateService;

class ArticleValidate extends ValidateService {
  protected $rule = [
    'title' => 'require',
    'description' => 'require',
    'thumb' => 'require',
    'content' => 'require',
    'show_top' => 'number|in:0,1',
    'cate_id' => 'require|number',
    'auth_name' => 'require',
    'email' => 'email',
    'id' => 'require|number'
  ];

  public function sceneAdd() {
    return $this->only([
      'title', 
      'description', 
      'thumb', 
      'content', 
      'show_top', 
      'cate_id',
      'auth_name',
      'email'
    ]);
  }

  
  public function sceneGetById() {
    return $this->only([
      'id' 
    ]);
  }
}