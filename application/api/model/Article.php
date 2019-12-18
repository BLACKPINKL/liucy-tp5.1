<?php
namespace app\api\model;
use Exception;
use basic\ModelBasic;

class Article extends ModelBasic {
  // 关联作者模型 多对多关系
  public function auth() {
    return $this->belongsToMany('Auth', 'article_auth', 'auth_id', 'article_id');
  }

  public function addArticle($data) {
    // 添加文章
    $res = self::create($data);
    // 获取刚添加的文章id
    $id = $res->id;
    $article = self::get($id);
    $auth_name = $data['auth_name'];
    $email = $data['email'];
    // 判断该文章下是否有作者
      $auth = Auth::where('auth_name', $auth_name)->find();
      
      // 新增作者
      if(!$auth) {
        $authData = compact('auth_name', 'email');
         // 添加作者
         $res = $article->auth()->save($authData);

      }else {
        // 更新中间表
        $res = $article->auth()->save($auth);
      }

      
     

    


    if(!$res) throw new Exception("添加分类失败");
    return $res;
  }


  public function getArticles() {
    // 获取品牌数据时需要包含已经软删除的数据
    $res = self::all();
    if(!$res) return [];
    return $res->toArray();
  }
  public static function getArticleById($id) {
    // 获取品牌数据时需要包含已经软删除的数据
    $res = self::get($id);
    if(!$res) return [];
    return $res->toArray();
  }
  public static function updateArticle($data) {
    $res = self::update($data);
    if(!$res) throw new Exception('更新文章失败');
    return $res;
  }
  public static function delArticle($id) {
    $res = self::destroy($id);
    
    if(!$res) throw new Exception('删除文章失败');
    return $res;
  }
}