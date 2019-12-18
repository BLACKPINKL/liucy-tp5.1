<?php
namespace app\api\model;
use Exception;
use basic\ModelBasic;

class Auth extends ModelBasic{
  public function articles() {
    return $this->belongsToMany('Article', 'article_auth', 'article_id', 'auth_id');
  }

  public function addArticle($data) {
    $auth = self::getByAuthName($data['auth_name']);
    
    $res = $auth->articles()->save($data);
    // return $res;
  }
}