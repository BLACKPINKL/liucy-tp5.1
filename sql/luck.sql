/*
 Navicat Premium Data Transfer

 Source Server         : qin
 Source Server Type    : MySQL
 Source Server Version : 80012
 Source Host           : localhost:3306
 Source Schema         : luck

 Target Server Type    : MySQL
 Target Server Version : 80012
 File Encoding         : 65001

 Date: 17/01/2020 13:10:09
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for qin_customer
-- ----------------------------
DROP TABLE IF EXISTS `qin_customer`;
CREATE TABLE `qin_customer`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '用户名',
  `join_num` int(10) UNSIGNED NULL DEFAULT 1 COMMENT '抽奖次数',
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT 1 COMMENT '状态：1 可用',
  `create_time` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `idx_name`(`name`) USING BTREE,
  INDEX `idx_status`(`status`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for qin_invite_record
-- ----------------------------
DROP TABLE IF EXISTS `qin_invite_record`;
CREATE TABLE `qin_invite_record`  (
  `user_id` int(10) UNSIGNED NOT NULL COMMENT '发起邀请用户',
  `to_user_id` int(10) UNSIGNED NOT NULL COMMENT '被邀请用户',
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '邀请用户名',
  `to_username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '被邀请用户名',
  `create_time` int(10) UNSIGNED NULL DEFAULT NULL COMMENT '邀请时间',
  PRIMARY KEY (`user_id`, `to_user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for qin_join_record
-- ----------------------------
DROP TABLE IF EXISTS `qin_join_record`;
CREATE TABLE `qin_join_record`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NULL DEFAULT NULL COMMENT '用户',
  `luck_id` int(10) UNSIGNED NULL DEFAULT NULL COMMENT '参与的哪一期抽奖',
  `create_time` int(10) UNSIGNED NULL DEFAULT NULL COMMENT '参与时间',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx_user_id`(`user_id`) USING BTREE,
  INDEX `idx_luck_id`(`luck_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for qin_luck
-- ----------------------------
DROP TABLE IF EXISTS `qin_luck`;
CREATE TABLE `qin_luck`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `luck_no` int(10) UNSIGNED NOT NULL COMMENT '活动编号',
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT 1 COMMENT '活动状态 1：进行中 0：结束',
  `create_time` int(10) UNSIGNED NOT NULL COMMENT '创建时间',
  `start_time` int(10) UNSIGNED NOT NULL COMMENT '开奖时间',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `unq_luck_no`(`luck_no`) USING BTREE,
  INDEX `idx_luck_no`(`luck_no`) USING BTREE,
  INDEX `idx_status`(`status`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for qin_prize
-- ----------------------------
DROP TABLE IF EXISTS `qin_prize`;
CREATE TABLE `qin_prize`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '奖品名称',
  `luck_id` int(10) UNSIGNED NOT NULL COMMENT '所属哪期抽奖',
  `prize_no` int(10) UNSIGNED NOT NULL COMMENT '奖品编号',
  `type` tinyint(1) UNSIGNED NOT NULL DEFAULT 1 COMMENT '奖品类型： 1：虚拟商品 2：实物',
  `thumb` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '奖品图',
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT 1 COMMENT '奖品状态： 0为删除',
  `create_time` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `unq_prize_no`(`prize_no`) USING BTREE,
  INDEX `idx_luck_id`(`luck_id`) USING BTREE,
  INDEX `idx_prize_no`(`prize_no`) USING BTREE,
  INDEX `idx_status`(`status`) USING BTREE,
  INDEX `idx_type`(`type`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for qin_prize_count
-- ----------------------------
DROP TABLE IF EXISTS `qin_prize_count`;
CREATE TABLE `qin_prize_count`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `prize_id` int(10) UNSIGNED NULL DEFAULT NULL COMMENT '所属奖品',
  `count` int(10) UNSIGNED NULL DEFAULT NULL COMMENT '奖品数量',
  `create_time` int(10) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx_prize_id`(`prize_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for qin_prize_record
-- ----------------------------
DROP TABLE IF EXISTS `qin_prize_record`;
CREATE TABLE `qin_prize_record`  (
  `user_id` int(10) UNSIGNED NOT NULL COMMENT '中奖用户',
  `luck_id` int(10) UNSIGNED NOT NULL COMMENT '哪期奖',
  `create_time` int(10) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`, `luck_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Fixed;

SET FOREIGN_KEY_CHECKS = 1;
