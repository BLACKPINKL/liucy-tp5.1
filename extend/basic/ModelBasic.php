<?php
namespace basic;

use think\Model;
// 自定义模型基类
class ModelBasic extends Model {
  protected $pk = 'id';
}