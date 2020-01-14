<?php
namespace app\wap\controller;

use think\Controller;
use app\wap\model\Article as ArticleModel;
use app\wap\model\Comment as CommentModel;

require_once 'static/lib/jieba-php/index.php';
use Fukuball\Jieba\Jieba;
use Fukuball\Jieba\Finalseg;
Jieba::init();
Finalseg::init();
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

  public function add() {
    $title = request()->param('title');
    // 中文分词切割 返回数组
    $seg_list = Jieba::cut($title);
    // 以空格切割成字符串
    $str = implode(' ', $seg_list);
    $data = [
      'title' => $str,
      'content' => 'dsad' . mt_rand(0, 9999) . 'asd' . mt_rand(0, 9999),
      'user_id' => mt_rand(1, 10),
      'category_id' => mt_rand(1, 4)
    ];
    ArticleModel::add($data);
    return json(['msg' => 'ok']);

  }

  public function search() {
    $keyword = request()->param('keyword');
    
  }
}