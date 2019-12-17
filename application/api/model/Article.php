<?php
namespace app\api\model;
use Exception;
use basic\ModelBasic;

class Article extends ModelBasic {
  // 关联作者模型 多对多关系
  public function auth() {
    return $this->belongsToMany('Auth', 'app\\api\\model\\ArticleAuth');
  }

  public static function addArticle($data) {
    $res = self::create($data);
    if(!$res) throw new Exception("添加分类失败");
    return $res;
  }
  public static function getArticles() {
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