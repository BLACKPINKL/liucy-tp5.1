/*
 Navicat Premium Data Transfer

 Source Server         : qin
 Source Server Type    : MySQL
 Source Server Version : 50726
 Source Host           : localhost:3306
 Source Schema         : test_kill

 Target Server Type    : MySQL
 Target Server Version : 50726
 File Encoding         : 65001

 Date: 07/01/2020 17:01:32
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for kill_goods
-- ----------------------------
DROP TABLE IF EXISTS `kill_goods`;
CREATE TABLE `kill_goods`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `amount` decimal(10, 2) NOT NULL,
  `count` int(10) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for kill_log
-- ----------------------------
DROP TABLE IF EXISTS `kill_log`;
CREATE TABLE `kill_log`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `status` tinyint(1) NULL DEFAULT 0,
  `create_time` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Table structure for kill_order
-- ----------------------------
DROP TABLE IF EXISTS `kill_order`;
CREATE TABLE `kill_order`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_no` int(11) UNSIGNED NOT NULL,
  `goods_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `price` decimal(10, 2) NOT NULL,
  `status` tinyint(1) NULL DEFAULT 1,
  `create_time` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
