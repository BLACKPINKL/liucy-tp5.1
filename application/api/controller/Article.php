<?php
namespace app\api\controller;
use app\api\validate\ArticleValidate;
use app\api\model\Article as ArticleModel;
use service\JsonService;
class Article {
  public function add() {
    $data = (new ArticleValidate())->getCheck(['scene' => 'add']);
    $res = ArticleModel::addArticle($data);
    return JsonService::success();
  }
  public function get() {
    $res = ArticleModel::getArticles();
    return JsonService::success(['data' => $res]);
  }
  public function getById() {
    $data = (new ArticleValidate())->getCheck(['scene' => 'getById']);
    $res = ArticleModel::getArticleById($data['id']);
    return JsonService::success(['data' => $res]);
  }
  public function update() {
    $data = (new ArticleValidate())->getCheck();
    $res = ArticleModel::updateArticle($data);
    return JsonService::success();
  }
  public function del() {
    $data = (new ArticleValidate())->getCheck(['scene' => 'getById']);
    $res = ArticleModel::delArticle($data['id']);
    return JsonService::success();
  }
}