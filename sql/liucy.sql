/*
 Navicat Premium Data Transfer

 Source Server         : qinjianfei
 Source Server Type    : MySQL
 Source Server Version : 80012
 Source Host           : localhost:3306
 Source Schema         : liucy

 Target Server Type    : MySQL
 Target Server Version : 80012
 File Encoding         : 65001

 Date: 13/12/2019 11:43:25
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for liucy_article
-- ----------------------------
DROP TABLE IF EXISTS `liucy_article`;
CREATE TABLE `liucy_article`  (
  `id` smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` char(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `keywords` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `description` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `link_url` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `thumb` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `show_top` tinyint(1) NULL DEFAULT 0 COMMENT '是否置顶 1：置顶  0：默认',
  `show_status` tinyint(1) NULL DEFAULT 1 COMMENT '1显示',
  `cate_id` smallint(6) NULL DEFAULT NULL COMMENT '所属分类id',
  `createTime` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for liucy_article_auth
-- ----------------------------
DROP TABLE IF EXISTS `liucy_article_auth`;
CREATE TABLE `liucy_article_auth`  (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `auth_name` char(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '作者',
  `email` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '邮箱',
  `article_id` smallint(6) NULL DEFAULT NULL COMMENT '文章id',
  `description` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '简介',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for liucy_brand
-- ----------------------------
DROP TABLE IF EXISTS `liucy_brand`;
CREATE TABLE `liucy_brand`  (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `brand_name` char(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `brand_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `brand_logo` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `brand_des` char(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `brand_status` int(1) NULL DEFAULT NULL COMMENT 'null：显示  时间戳：软删除',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id`(`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of liucy_brand
-- ----------------------------
INSERT INTO `liucy_brand` VALUES (1, '阿迪达斯', 'http://www.baidu.com', 'http://www.liucy.io/static/upload/20191211\\7444a567bdc513b4ebc68d8a92804d90.png', 'adidas（阿迪达斯）创办于1949年，是德国运动用品制造商阿迪达斯AG成员公司', NULL);
INSERT INTO `liucy_brand` VALUES (2, 'nike', 'http://www.baidu.com', 'http://www.liucy.io/static/upload/20191212\\5d8273a3b00f38665b7f40445204ebf7.png', '发送到发送到', NULL);

-- ----------------------------
-- Table structure for liucy_cate
-- ----------------------------
DROP TABLE IF EXISTS `liucy_cate`;
CREATE TABLE `liucy_cate`  (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `cate_name` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `cate_type` tinyint(1) NULL DEFAULT 5 COMMENT '1：系统分类  2：帮助分类  3：网店帮助  4：网店信息 5：普通分类',
  `keywords` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL COMMENT '关键词',
  `description` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT '' COMMENT '描述',
  `show_nav` tinyint(1) NULL DEFAULT 0 COMMENT '1:显示 0 隐藏',
  `pid` smallint(6) NULL DEFAULT 0 COMMENT '上级栏目id',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for liucy_form
-- ----------------------------
DROP TABLE IF EXISTS `liucy_form`;
CREATE TABLE `liucy_form`  (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `forms` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL,
  `createTime` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of liucy_form
-- ----------------------------
INSERT INTO `liucy_form` VALUES (11, 'add_brand', '[{\"class\":{},\"style\":{},\"attrs\":{},\"props\":{\"placeholder\":\"请输入品牌名称\"},\"domProps\":{},\"on\":{},\"nativeOn\":{},\"directives\":[],\"scopedSlots\":{},\"validate\":[{\"required\":true,\"message\":\"请输入品牌名称\",\"trigger\":\"blur\"}],\"options\":[],\"col\":{\"span\":14},\"children\":[],\"emit\":[],\"type\":\"input\",\"title\":\"品牌名称\",\"field\":\"brand_name\",\"value\":\"\",\"filed\":\"brand_name\",\"placeholder\":\"请输入品牌名称\"},{\"class\":{},\"style\":{},\"attrs\":{},\"props\":{\"type\":\"textarea\",\"placeholder\":\"描述...\",\"autosize\":{\"minRows\":5,\"maxRows\":9},\"rows\":5},\"domProps\":{},\"on\":{},\"nativeOn\":{},\"directives\":[],\"scopedSlots\":{},\"validate\":[{\"required\":false,\"message\":\"请输入品牌描述\",\"trigger\":\"blur\"}],\"options\":[],\"col\":{\"span\":14},\"children\":[],\"emit\":[],\"type\":\"input\",\"title\":\"品牌描述\",\"field\":\"brand_des\",\"value\":\"\",\"filed\":\"brand_des\",\"placeholder\":\"描述...\"},{\"class\":{},\"style\":{},\"attrs\":{},\"props\":{\"placeholder\":\"请输入品牌链接\"},\"domProps\":{},\"on\":{},\"nativeOn\":{},\"directives\":[],\"scopedSlots\":{},\"validate\":[{\"required\":true,\"message\":\"请输入品牌链接\",\"trigger\":\"blur\"}],\"options\":[],\"col\":{\"span\":14},\"children\":[],\"emit\":[],\"type\":\"input\",\"title\":\"品牌链接\",\"field\":\"brand_url\",\"value\":\"http://\",\"filed\":\"brand_url\",\"placeholder\":\"请输入品牌链接\"},{\"class\":{},\"style\":{},\"attrs\":{},\"props\":{\"action\":\"http://www.liucy.io/api/upload/up\",\"multiple\":true,\"type\":\"select\",\"uploadType\":\"image\",\"name\":\"brand_logo\",\"data\":{\"fileField\":\"brand_logo\"}},\"domProps\":{},\"on\":{},\"nativeOn\":{},\"directives\":[],\"scopedSlots\":{},\"validate\":[{\"required\":true,\"type\":\"array\",\"message\":\"请输入品牌logo\",\"trigger\":\"change\"}],\"options\":[],\"col\":{\"span\":24},\"children\":[],\"emit\":[\"onSuccess\"],\"type\":\"upload\",\"title\":\"品牌logo\",\"field\":\"brand_logo\",\"value\":[],\"filed\":\"brand_logo\",\"action\":\"http://www.liucy.io/api/upload/up\"}]', '2019-12-12 15:46:32');
INSERT INTO `liucy_form` VALUES (12, 'add_cate', '[{\"class\":{},\"style\":{},\"attrs\":{},\"props\":{\"placeholder\":\"请输入分类名称\"},\"domProps\":{},\"on\":{},\"nativeOn\":{},\"directives\":[],\"scopedSlots\":{},\"validate\":[{\"required\":true,\"message\":\"请输入分类名称\",\"trigger\":\"blur\"}],\"options\":[],\"col\":{\"span\":14},\"children\":[],\"emit\":[],\"type\":\"input\",\"title\":\"分类名称\",\"field\":\"cate_name\",\"value\":\"\",\"filed\":\"cate_name\",\"placeholder\":\"请输入分类名称\"},{\"class\":{},\"style\":{},\"attrs\":{},\"props\":{\"type\":\"textarea\",\"placeholder\":\"\",\"autosize\":{\"minRows\":5,\"maxRows\":9},\"rows\":5},\"domProps\":{},\"on\":{},\"nativeOn\":{},\"directives\":[],\"scopedSlots\":{},\"validate\":[{\"required\":false,\"message\":\"请输入关键词\",\"trigger\":\"blur\"}],\"options\":[],\"col\":{\"span\":14},\"children\":[],\"emit\":[],\"type\":\"input\",\"title\":\"关键词\",\"field\":\"keywords\",\"value\":\"\",\"filed\":\"keywords\",\"placeholder\":\"\"},{\"class\":{},\"style\":{},\"attrs\":{},\"props\":{\"type\":\"textarea\",\"placeholder\":\"请输入描述\",\"autosize\":{\"minRows\":5,\"maxRows\":9},\"rows\":5},\"domProps\":{},\"on\":{},\"nativeOn\":{},\"directives\":[],\"scopedSlots\":{},\"validate\":[{\"required\":true,\"message\":\"请输入描述\",\"trigger\":\"blur\"}],\"options\":[],\"col\":{\"span\":14},\"children\":[],\"emit\":[],\"type\":\"input\",\"title\":\"描述\",\"field\":\"description\",\"value\":\"\",\"filed\":\"description\",\"placeholder\":\"请输入描述\"},{\"class\":{},\"style\":{},\"attrs\":{},\"props\":{\"placeholder\":\"请选择\"},\"domProps\":{},\"on\":{},\"nativeOn\":{},\"directives\":[],\"scopedSlots\":{},\"validate\":[{\"type\":\"array\",\"required\":true,\"message\":\"请输入上级分类\",\"trigger\":\"blur\"}],\"options\":[{\"value\":\"0\",\"label\":\"顶级分类\",\"valueKey\":\"option1-feev\",\"labelKey\":\"label1-feev\"}],\"col\":{\"span\":24},\"children\":[],\"emit\":[],\"type\":\"select\",\"title\":\"上级分类\",\"field\":\"pid\",\"value\":\"0\",\"filed\":\"pid\",\"placeholder\":\"请选择\"},{\"class\":{},\"style\":{},\"attrs\":{},\"props\":{},\"domProps\":{},\"on\":{},\"nativeOn\":{},\"directives\":[],\"scopedSlots\":{},\"validate\":[{\"required\":false,\"message\":\"请输入显示到导航\",\"trigger\":\"blur\"}],\"options\":[{\"value\":\"1\",\"label\":\"是\",\"valueKey\":\"option1-chpk\",\"labelKey\":\"label1-chpk\"},{\"value\":\"0\",\"label\":\"否\",\"valueKey\":\"option2-chpk\",\"labelKey\":\"label2-chpk\"}],\"col\":{\"span\":24},\"children\":[],\"emit\":[],\"type\":\"radio\",\"title\":\"显示到导航\",\"field\":\"show_nav\",\"value\":\"1\",\"filed\":\"show_nav\"}]', '2019-12-13 11:25:52');

-- ----------------------------
-- Table structure for liucy_user
-- ----------------------------
DROP TABLE IF EXISTS `liucy_user`;
CREATE TABLE `liucy_user`  (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `account` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `password` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `role` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL COMMENT '权限',
  `salt` char(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of liucy_user
-- ----------------------------
INSERT INTO `liucy_user` VALUES (1, 'admin', 'b99574ff006e5897ed59e19522dc7618', 'admin', 'c1X57P5g87017I8');

SET FOREIGN_KEY_CHECKS = 1;
