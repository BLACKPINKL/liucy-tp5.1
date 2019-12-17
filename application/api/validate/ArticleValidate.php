<?php
namespace app\api\validate;

use service\ValidateService;

class ArticleValidate extends ValidateService {
  protected $rule = [
    'title' => 'require|max:30',
    'keywords' => 'max:100',
    'description' => 'max:150',
    'thumb' => 'require',
    'content' => 'require|min:25',
    'show_top' => 'number|in:0,1',
    'cate_id' => 'require|number',
    'id' => 'require|number'
  ];

  public function sceneAdd() {
    return $this->only([
      'title', 
      'keywords', 
      'description', 
      'thumb', 
      'content', 
      'show_top', 
      'cate_id', 
    ]);
  }

  
  public function sceneGetById() {
    return $this->only([
      'id' 
    ]);
  }
}