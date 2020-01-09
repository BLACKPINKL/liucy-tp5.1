<?php
namespace app\wap\controller;

use think\Controller;
use app\wap\model\Article as ArticleModel;
// 文章
class Article extends Controller {
  public function index() {
    $arr = ArticleModel::getArts();
    $this->assign('list', $arr);
    return view();
  }
}