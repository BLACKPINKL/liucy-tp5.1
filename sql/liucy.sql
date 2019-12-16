/*
Navicat MySQL Data Transfer

Source Server         : qin
Source Server Version : 50726
Source Host           : localhost:3306
Source Database       : liucy

Target Server Type    : MYSQL
Target Server Version : 50726
File Encoding         : 65001

Date: 2019-12-16 16:50:12
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for liucy_article
-- ----------------------------
DROP TABLE IF EXISTS `liucy_article`;
CREATE TABLE `liucy_article` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `title` char(30) DEFAULT NULL,
  `keywords` varchar(100) DEFAULT NULL,
  `description` varchar(150) DEFAULT NULL,
  `link_url` varchar(100) DEFAULT NULL,
  `thumb` varchar(150) DEFAULT NULL,
  `content` text,
  `show_top` tinyint(1) DEFAULT '0' COMMENT '是否置顶 0：不',
  `show_status` tinyint(1) DEFAULT '1' COMMENT '是否显示',
  `cate_id` smallint(6) DEFAULT NULL COMMENT '所属分类',
  `addTime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of liucy_article
-- ----------------------------

-- ----------------------------
-- Table structure for liucy_article_auth
-- ----------------------------
DROP TABLE IF EXISTS `liucy_article_auth`;
CREATE TABLE `liucy_article_auth` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `auth_name` char(15) DEFAULT NULL COMMENT '作者',
  `email` char(32) DEFAULT NULL COMMENT '邮箱',
  `article_id` smallint(6) DEFAULT NULL COMMENT '文章id',
  `description` varchar(100) DEFAULT NULL COMMENT '简介',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of liucy_article_auth
-- ----------------------------

-- ----------------------------
-- Table structure for liucy_cate
-- ----------------------------
DROP TABLE IF EXISTS `liucy_cate`;
CREATE TABLE `liucy_cate` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `cate_name` char(20) DEFAULT NULL,
  `cate_type` tinyint(1) DEFAULT '5' COMMENT '5：普通分类',
  `keywords` varchar(100) DEFAULT NULL COMMENT '关键词',
  `description` varchar(150) DEFAULT '' COMMENT '描述',
  `show_nav` tinyint(1) DEFAULT '0' COMMENT '显示到导航栏    1:显示 0 隐藏',
  `pid` smallint(6) DEFAULT '1' COMMENT '上级栏目id 1：顶级分类',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of liucy_cate
-- ----------------------------
INSERT INTO `liucy_cate` VALUES ('1', '系统', '1', '系统', '系统', '0', '0');
INSERT INTO `liucy_cate` VALUES ('2', '网店帮助', '5', '网店帮助', '网店帮助', '1', '1');
INSERT INTO `liucy_cate` VALUES ('3', '网店信息', '5', '网店信息', '网店信息', '1', '1');
INSERT INTO `liucy_cate` VALUES ('4', '新手上路', '5', '新手上路2', '新手上路2', '1', '2');
INSERT INTO `liucy_cate` VALUES ('5', '配送与支付', '5', '配送与支付', '配送与支付', '1', '2');

-- ----------------------------
-- Table structure for liucy_form
-- ----------------------------
DROP TABLE IF EXISTS `liucy_form`;
CREATE TABLE `liucy_form` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) DEFAULT NULL,
  `forms` text,
  `createTime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of liucy_form
-- ----------------------------
INSERT INTO `liucy_form` VALUES ('11', 'add_brand', '[{\"class\":{},\"style\":{},\"attrs\":{},\"props\":{\"placeholder\":\"请输入品牌名称\"},\"domProps\":{},\"on\":{},\"nativeOn\":{},\"directives\":[],\"scopedSlots\":{},\"validate\":[{\"required\":true,\"message\":\"请输入品牌名称\",\"trigger\":\"blur\"}],\"options\":[],\"col\":{\"span\":14},\"children\":[],\"emit\":[],\"type\":\"input\",\"title\":\"品牌名称\",\"field\":\"brand_name\",\"value\":\"\",\"filed\":\"brand_name\",\"placeholder\":\"请输入品牌名称\"},{\"class\":{},\"style\":{},\"attrs\":{},\"props\":{\"type\":\"textarea\",\"placeholder\":\"描述...\",\"autosize\":{\"minRows\":5,\"maxRows\":9},\"rows\":5},\"domProps\":{},\"on\":{},\"nativeOn\":{},\"directives\":[],\"scopedSlots\":{},\"validate\":[{\"required\":false,\"message\":\"请输入品牌描述\",\"trigger\":\"blur\"}],\"options\":[],\"col\":{\"span\":14},\"children\":[],\"emit\":[],\"type\":\"input\",\"title\":\"品牌描述\",\"field\":\"brand_des\",\"value\":\"\",\"filed\":\"brand_des\",\"placeholder\":\"描述...\"},{\"class\":{},\"style\":{},\"attrs\":{},\"props\":{\"placeholder\":\"请输入品牌链接\"},\"domProps\":{},\"on\":{},\"nativeOn\":{},\"directives\":[],\"scopedSlots\":{},\"validate\":[{\"required\":true,\"message\":\"请输入品牌链接\",\"trigger\":\"blur\"}],\"options\":[],\"col\":{\"span\":14},\"children\":[],\"emit\":[],\"type\":\"input\",\"title\":\"品牌链接\",\"field\":\"brand_url\",\"value\":\"http://\",\"filed\":\"brand_url\",\"placeholder\":\"请输入品牌链接\"},{\"class\":{},\"style\":{},\"attrs\":{},\"props\":{\"action\":\"http://www.liucy.io/api/upload/up\",\"multiple\":true,\"type\":\"select\",\"uploadType\":\"image\",\"name\":\"brand_logo\",\"data\":{\"fileField\":\"brand_logo\"}},\"domProps\":{},\"on\":{},\"nativeOn\":{},\"directives\":[],\"scopedSlots\":{},\"validate\":[{\"required\":true,\"type\":\"array\",\"message\":\"请输入品牌logo\",\"trigger\":\"change\"}],\"options\":[],\"col\":{\"span\":24},\"children\":[],\"emit\":[\"onSuccess\"],\"type\":\"upload\",\"title\":\"品牌logo\",\"field\":\"brand_logo\",\"value\":[],\"filed\":\"brand_logo\",\"action\":\"http://www.liucy.io/api/upload/up\"}]', '2019-12-12 15:46:32');
INSERT INTO `liucy_form` VALUES ('23', 'add_cate', '[{\"class\":{},\"style\":{},\"attrs\":{},\"props\":{\"placeholder\":\"请输入分类名称\"},\"domProps\":{},\"on\":{},\"nativeOn\":{},\"directives\":[],\"scopedSlots\":{},\"validate\":[{\"required\":true,\"message\":\"请输入分类名称\",\"trigger\":\"blur\"}],\"options\":[],\"col\":{\"span\":14},\"children\":[],\"emit\":[],\"type\":\"input\",\"title\":\"分类名称\",\"field\":\"cate_name\",\"value\":\"\",\"filed\":\"cate_name\",\"placeholder\":\"请输入分类名称\"},{\"class\":{},\"style\":{},\"attrs\":{},\"props\":{\"type\":\"textarea\",\"placeholder\":\"请输入xxx\",\"autosize\":{\"minRows\":5,\"maxRows\":9},\"rows\":5},\"domProps\":{},\"on\":{},\"nativeOn\":{},\"directives\":[],\"scopedSlots\":{},\"validate\":[{\"required\":false,\"message\":\"请输入关键词\",\"trigger\":\"blur\"}],\"options\":[],\"col\":{\"span\":14},\"children\":[],\"emit\":[],\"type\":\"input\",\"title\":\"关键词\",\"field\":\"keywords\",\"value\":\"\",\"filed\":\"keywords\"},{\"class\":{},\"style\":{},\"attrs\":{},\"props\":{\"type\":\"textarea\",\"placeholder\":\"请输入描述\",\"autosize\":{\"minRows\":5,\"maxRows\":9},\"rows\":5},\"domProps\":{},\"on\":{},\"nativeOn\":{},\"directives\":[],\"scopedSlots\":{},\"validate\":[{\"required\":true,\"message\":\"请输入描述\",\"trigger\":\"blur\"}],\"options\":[],\"col\":{\"span\":14},\"children\":[],\"emit\":[],\"type\":\"input\",\"title\":\"描述\",\"field\":\"description\",\"value\":\"\",\"filed\":\"description\",\"placeholder\":\"请输入描述\"},{\"class\":{},\"style\":{},\"attrs\":{},\"props\":{\"placeholder\":\"请输入xxx\"},\"domProps\":{},\"on\":{},\"nativeOn\":{},\"directives\":[],\"scopedSlots\":{},\"validate\":[{\"required\":false,\"message\":\"请选择select\",\"trigger\":\"blur\"}],\"options\":[{\"value\":\"0\",\"label\":\"顶级分类\",\"valueKey\":\"option1-iwo8\",\"labelKey\":\"label1-iwo8\"}],\"col\":{\"span\":24},\"children\":[],\"emit\":[],\"type\":\"select\",\"title\":\"select\",\"field\":\"pid\",\"value\":\"0\",\"filed\":\"pid\"},{\"class\":{},\"style\":{},\"attrs\":{},\"props\":{},\"domProps\":{},\"on\":{},\"nativeOn\":{},\"directives\":[],\"scopedSlots\":{},\"validate\":[{\"required\":false,\"message\":\"请输入显示导航\",\"trigger\":\"blur\"}],\"options\":[{\"value\":\"0\",\"label\":\"显示\",\"valueKey\":\"option1-mm9d\",\"labelKey\":\"label1-mm9d\"},{\"value\":\"1\",\"label\":\"隐藏\",\"valueKey\":\"option2-mm9d\",\"labelKey\":\"label2-mm9d\"}],\"col\":{\"span\":24},\"children\":[],\"emit\":[],\"type\":\"radio\",\"title\":\"显示导航\",\"field\":\"show_nav\",\"value\":\"0\",\"filed\":\"show_nav\"}]', '2019-12-13 16:50:46');
INSERT INTO `liucy_form` VALUES ('22', 'test', '[{\"class\":{},\"style\":{},\"attrs\":{},\"props\":{\"placeholder\":\"请输入xxx\"},\"domProps\":{},\"on\":{},\"nativeOn\":{},\"directives\":[],\"scopedSlots\":{},\"validate\":[{\"required\":false,\"message\":\"请选择select\",\"trigger\":\"blur\"}],\"options\":[{\"value\":\"0\",\"label\":\"option1-label1\",\"valueKey\":\"option1-vjbm\",\"labelKey\":\"label1-vjbm\"}],\"col\":{\"span\":24},\"children\":[],\"emit\":[],\"type\":\"select\",\"title\":\"select\",\"field\":\"aa\",\"value\":\"0\",\"filed\":\"aa\"}]', '2019-12-13 16:46:52');
INSERT INTO `liucy_form` VALUES ('24', 'add_article', '[{\"class\":{},\"style\":{},\"attrs\":{},\"props\":{\"placeholder\":\"请选择\"},\"domProps\":{},\"on\":{},\"nativeOn\":{},\"directives\":[],\"scopedSlots\":{},\"validate\":[{\"required\":true,\"message\":\"请输入所属分类\",\"trigger\":\"blur\"}],\"options\":[],\"col\":{\"span\":24},\"children\":[],\"emit\":[],\"type\":\"select\",\"title\":\"所属分类\",\"field\":\"cate_id\",\"value\":\"\",\"filed\":\"cate_id\",\"placeholder\":\"请选择\"},{\"class\":{},\"style\":{},\"attrs\":{},\"props\":{\"placeholder\":\"请输入标题\"},\"domProps\":{},\"on\":{},\"nativeOn\":{},\"directives\":[],\"scopedSlots\":{},\"validate\":[{\"required\":true,\"message\":\"请输入标题\",\"trigger\":\"blur\"}],\"options\":[],\"col\":{\"span\":14},\"children\":[],\"emit\":[],\"type\":\"input\",\"title\":\"标题\",\"field\":\"title\",\"value\":\"\",\"filed\":\"title\",\"placeholder\":\"请输入标题\"},{\"class\":{},\"style\":{},\"attrs\":{},\"props\":{\"placeholder\":\"请输入作者\"},\"domProps\":{},\"on\":{},\"nativeOn\":{},\"directives\":[],\"scopedSlots\":{},\"validate\":[{\"required\":true,\"message\":\"请输入作者\",\"trigger\":\"blur\"}],\"options\":[],\"col\":{\"span\":14},\"children\":[],\"emit\":[],\"type\":\"input\",\"title\":\"作者\",\"field\":\"auth_name\",\"value\":\"\",\"filed\":\"auth_name\",\"placeholder\":\"请输入作者\"},{\"class\":{},\"style\":{},\"attrs\":{},\"props\":{\"placeholder\":\"请输入邮箱\"},\"domProps\":{},\"on\":{},\"nativeOn\":{},\"directives\":[],\"scopedSlots\":{},\"validate\":[{\"required\":true,\"message\":\"请输入邮箱\",\"trigger\":\"blur\"}],\"options\":[],\"col\":{\"span\":14},\"children\":[],\"emit\":[],\"type\":\"input\",\"title\":\"邮箱\",\"field\":\"email\",\"value\":\"\",\"filed\":\"email\",\"placeholder\":\"请输入邮箱\"},{\"class\":{},\"style\":{},\"attrs\":{},\"props\":{\"type\":\"textarea\",\"placeholder\":\"enter something...\",\"autosize\":{\"minRows\":5,\"maxRows\":9},\"rows\":5},\"domProps\":{},\"on\":{},\"nativeOn\":{},\"directives\":[],\"scopedSlots\":{},\"validate\":[{\"required\":false,\"message\":\"请输入关键词\",\"trigger\":\"blur\"}],\"options\":[],\"col\":{\"span\":14},\"children\":[],\"emit\":[],\"type\":\"input\",\"title\":\"关键词\",\"field\":\"keywords\",\"value\":\"\",\"filed\":\"keywords\",\"placeholder\":\"enter something...\"},{\"class\":{},\"style\":{},\"attrs\":{},\"props\":{\"type\":\"textarea\",\"placeholder\":\"请输入描述\",\"autosize\":{\"minRows\":5,\"maxRows\":9},\"rows\":5},\"domProps\":{},\"on\":{},\"nativeOn\":{},\"directives\":[],\"scopedSlots\":{},\"validate\":[{\"required\":true,\"message\":\"请输入描述\",\"trigger\":\"blur\"}],\"options\":[],\"col\":{\"span\":14},\"children\":[],\"emit\":[],\"type\":\"input\",\"title\":\"描述\",\"field\":\"description\",\"value\":\"\",\"filed\":\"description\",\"placeholder\":\"请输入描述\"},{\"class\":{},\"style\":{},\"attrs\":{},\"props\":{\"placeholder\":\"外部链接\"},\"domProps\":{},\"on\":{},\"nativeOn\":{},\"directives\":[],\"scopedSlots\":{},\"validate\":[{\"required\":false,\"message\":\"请输入外链\",\"trigger\":\"blur\"}],\"options\":[],\"col\":{\"span\":14},\"children\":[],\"emit\":[],\"type\":\"input\",\"title\":\"外链\",\"field\":\"link_url\",\"value\":\"\",\"placeholder\":\"外部链接\",\"filed\":\"link_url\"},{\"class\":{},\"style\":{},\"attrs\":{},\"props\":{\"action\":\"http://www.liucy.io/api/upload/up\",\"multiple\":true,\"type\":\"select\",\"uploadType\":\"image\",\"name\":\"thumb\",\"data\":{\"fileField\":\"thumb\"},\"placeholder\":\"\"},\"domProps\":{},\"on\":{},\"nativeOn\":{},\"directives\":[],\"scopedSlots\":{},\"validate\":[{\"required\":true,\"type\":\"array\",\"message\":\"请输入缩略图\",\"trigger\":\"change\"}],\"options\":[],\"col\":{\"span\":24},\"children\":[],\"emit\":[\"onSuccess\"],\"type\":\"upload\",\"title\":\"缩略图\",\"field\":\"thumb\",\"value\":[],\"filed\":\"thumb\",\"action\":\"http://www.liucy.io/api/upload/up\",\"placeholder\":\"\"},{\"class\":{},\"style\":{},\"attrs\":{},\"props\":{},\"domProps\":{},\"on\":{},\"nativeOn\":{},\"directives\":[],\"scopedSlots\":{},\"validate\":[{\"required\":false,\"message\":\"请输入置顶\",\"trigger\":\"blur\"}],\"options\":[{\"value\":\"1\",\"label\":\"是\",\"valueKey\":\"option1-xacb\",\"labelKey\":\"label1-xacb\"},{\"value\":\"0\",\"label\":\"否\",\"valueKey\":\"option2-xacb\",\"labelKey\":\"label2-xacb\"}],\"col\":{\"span\":24},\"children\":[],\"emit\":[],\"type\":\"radio\",\"title\":\"置顶\",\"field\":\"show_top\",\"value\":\"0\",\"filed\":\"show_top\"}]', '2019-12-16 15:21:46');

-- ----------------------------
-- Table structure for liucy_user
-- ----------------------------
DROP TABLE IF EXISTS `liucy_user`;
CREATE TABLE `liucy_user` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `account` varchar(10) DEFAULT NULL,
  `password` char(32) DEFAULT NULL,
  `role` varchar(10) DEFAULT NULL COMMENT '权限',
  `salt` char(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of liucy_user
-- ----------------------------
INSERT INTO `liucy_user` VALUES ('1', 'admin', 'b99574ff006e5897ed59e19522dc7618', 'admin', 'c1X57P5g87017I8');
