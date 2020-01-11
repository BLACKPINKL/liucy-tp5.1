<?php
namespace app\wap\controller;

use think\Controller;
use app\wap\model\Article as ArticleModel;
use app\wap\model\Comment as CommentModel;
// 文章
class Article extends Controller {
  public function index() {
    $arr = ArticleModel::getArts();
    Cache('list', $arr);
    $this->assign('list', $arr);
    return view();
  }
  public function detail() {
    $id = request()->param('id');
    $arr = Cache('list');
    // dump($arr);
    $article = [];
    if(!$arr) {
      $article = ArticleModel::getArtById($id);
    }else {
      $article = array_filter($arr, function($item) use($id){
        return $item['id'] === (int)$id;
      })[0];
    }

    $this->assign('data', $article);
    return view();

  }

  public function comment() {
    $data = request()->param();
    CommentModel::add($data);
    // TODO
    return json(['msg' => 'ok']);
  }

  
}