<?php
namespace app\api\controller;

use app\api\validate\ArticleValidate;
use app\api\model\Article as ArticleModel;
use basic\ControllerBasic;
// use app\api\model\Auth as AuthModel;
use service\JsonService;

class Article extends ControllerBasic {
  protected $articleModel;
  protected $articleValidate;
  public function __construct()
  {
    $this->articleValidate = new ArticleValidate;
    $this->articleModel = new ArticleModel;
    
  }

  public function add() {
    $data = $this->articleValidate->goCheck(['scene' => 'add']);
    // dump($data);
    $res = $this->articleModel->addArticle($data);

    return $this->suc();
  }
  public function get() {
    $res = ArticleModel::getArticles();
    return $this->suc(['data' => $res]);
  }
  public function getById() {
    $data = (new ArticleValidate())->goCheck(['scene' => 'getById']);
    $res = ArticleModel::getArticleById($data['id']);
    return $this->suc(['data' => $res]);
  }
  public function update() {
    $data = (new ArticleValidate())->goCheck();
    $res = ArticleModel::updateArticle($data);
    return $this->suc();
  }
  public function del() {
    $data = (new ArticleValidate())->goCheck(['scene' => 'getById']);
    $res = ArticleModel::delArticle($data['id']);
    return $this->suc();
  }
}