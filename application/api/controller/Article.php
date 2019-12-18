<?php
namespace app\api\controller;
use app\api\validate\ArticleValidate;
use app\api\model\Article as ArticleModel;
use app\api\model\Auth as AuthModel;
use service\JsonService;
class Article {
  public function add() {
    $data = (new ArticleValidate)->goCheck(['scene' => 'add']);
    // dump($data);
    $res = (new ArticleModel)->addArticle($data);
    // $res = (new AuthModel)->addArticle($data);

    return JsonService::success();
  }
  public function get() {
    $res = ArticleModel::getArticles();
    return JsonService::success(['data' => $res]);
  }
  public function getById() {
    $data = (new ArticleValidate())->goCheck(['scene' => 'getById']);
    $res = ArticleModel::getArticleById($data['id']);
    return JsonService::success(['data' => $res]);
  }
  public function update() {
    $data = (new ArticleValidate())->goCheck();
    $res = ArticleModel::updateArticle($data);
    return JsonService::success();
  }
  public function del() {
    $data = (new ArticleValidate())->goCheck(['scene' => 'getById']);
    $res = ArticleModel::delArticle($data['id']);
    return JsonService::success();
  }
}