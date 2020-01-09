/*
 Navicat Premium Data Transfer

 Source Server         : qin
 Source Server Type    : MySQL
 Source Server Version : 50726
 Source Host           : localhost:3306
 Source Schema         : comment

 Target Server Type    : MySQL
 Target Server Version : 50726
 File Encoding         : 65001

 Date: 09/01/2020 16:46:48
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for qin_article
-- ----------------------------
DROP TABLE IF EXISTS `qin_article`;
CREATE TABLE `qin_article`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '文章标题',
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL COMMENT '文章内容',
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT 1 COMMENT '状态：1：显示，0：隐藏',
  `user_id` int(10) UNSIGNED NOT NULL COMMENT '作者',
  `category_id` int(10) UNSIGNED NOT NULL COMMENT '所属栏目',
  `is_top` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '是否置顶',
  `thumb` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '缩略图',
  `create_time` int(10) UNSIGNED NOT NULL,
  `update_time` int(10) NULL DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx_status`(`status`) USING BTREE,
  INDEX `idx_category_id`(`category_id`) USING BTREE,
  INDEX `idx_is_top`(`is_top`) USING BTREE,
  INDEX `idx_create_time`(`create_time`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of qin_article
-- ----------------------------
INSERT INTO `qin_article` VALUES (1, '关于Vue和React的一些对比及个人思考', '<h2>前言</h2>\n<p>Vue和React都是目前最流行、生态最好的前端框架之一。框架本身没有优劣之分，只有适用之别，选择符合自身业务场景、团队基础的技术才是我们最主要的目的。</p>\n<p>博主1年前用的是Vue框架，近半年转技术栈到React框架，对于Vue和React都有一些基本的了解。接下来博主将与大家一起走近Vue和React，共同探讨它们的差异。（比如你正在用vue，对react感兴趣也可以看下两者之间的用法差异，反之亦然）</p><div><p>由于内容较长，将分上、中、下三部分和大家一起共同探讨（有不同意见的欢迎文章下方一起探讨交流，感谢支持）。</p>\n<h2>1.背景</h2>\n<h3>vue</h3>\n<p>Google 前工程师尤雨溪于 2014 年创建了这个框架。Vue是一套用于构建用户界面的渐进式框架。与其它大型框架不同的是，Vue 被设计为可以自底向上逐层应用。Vue 的核心库只关注视图层，不仅易于上手，还便于与第三方库或既有项目整合。</p>\n<h3>react</h3>\n<p>与 Vue 不同，react 库是由 Facebook 创建的。最初是为了 Facebook 广告流量管理创建的。那时 Facebook 遇到了维护和编码方面的问题。它以动态创建和交互式 UI 的能力而闻名。</p>\n<h2>2.核心思想</h2>\n<p>vue与react都推崇组件式的开发理念，但是在设计的核心思想上有很大差别。</p>\n<h3>vue</h3>\n<p>vue的整体思想仍然是拥抱经典的html(结构)+css(表现)+js(行为)的形式，vue鼓励开发者使用template模板，并提供指令供开发者使用(v-if、v-show、v-for等等)，因此在开发vue应用的时候会有一种在写经典web应用（结构、表现、行为分离）的感觉。另一方面，在针对组件数据上，vue2.0通过<code>Object.defineProperty</code>对数据做到了更细致的监听，精准实现组件级别的更新。</p>\n<h3>react</h3>\n<p>react整体上是函数式的思想，组件使用jsx语法，all in js，将html与css全都融入javaScript，jsx语法相对来说更加灵活，我一开始刚转过来也不是很适应，感觉写react应用感觉就像是在写javaScript。当组件调用setState或props变化的时候，组件内部render会重新渲染，子组件也会随之重新渲染，可以通过<code>shouldComponentUpdate</code>或者<code>PureComponent</code>可以避免不必要的重新渲染（个人感觉这一点上不如vue做的好）。</p><div><h2>3.组件形式</h2>\n<h3>vue</h3>\n<p>vue组件定义使用xx.vue文件来表示，vue组件将html、css、js组合到一起，模板部分使用数据使用<code>{{}}</code>，形式如下：</p>\n<pre><code lang=\"bash\">// 模板(html)\n&lt;template&gt;\n  &lt;div&gt;{{name}}&lt;/div&gt;\n&lt;/template&gt;\n\n// 数据管理(js)\n&lt;script&gt;\nexport default {\n  name: \'NewComponent\',\n  data() {\n    return {\n      name: \'xx\'\n    }\n  }\n}\n&lt;/script&gt;\n\n// 样式(css)\n&lt;style scoped&gt;\n\n&lt;/style&gt;\n<br></code></pre><p>组件使用：</p>\n<pre><code lang=\"bash\">&lt;new-component name=\"xx\" /&gt;\n<br></code></pre><h3>react</h3>\n<p>react推荐使用jsx或者js文件来表示组件，react支持class组件和function组件2种形式，react使用<code>{}</code>包裹变量，这点需要注意。</p>\n<blockquote>\n<p>注意： 组件名称必须以大写字母开头。React 会将以小写字母开头的组件视为原生 DOM 标签。例如，<code>&lt;div /&gt;</code> 代表 HTML 的 div 标签，而 <code>&lt;Welcome /&gt;</code> 则代表一个组件，并且需在作用域内使用 Welcome。</p>\n</blockquote>\n<p>（1）class组件</p>\n<pre><code lang=\"bash\">import React from \'react\';\n\nclass NewComponent extends React.Component {\n  constructor(props) {\n    super(props);\n    this.state = {\n      name: \'xx\'\n    };\n  }\n  render() {\n    rerurn(&lt;div&gt;{name}&lt;/div&gt;);\n  }\n}\n\nexport default NewComponent;\n<br></code></pre><p>（2）function组件</p>\n<p>hooks的出现赋予了function组件管理state的能力。</p>\n<pre><code lang=\"bash\">import React, { useState } from \'react\';\n\nfunction NewComponent() {\n  const [name, setName] = useState(\'\');\n  return (&lt;div&gt;{name}&lt;/div&gt;);\n}\n\nexport default NewComponent;</code></pre></div></div>', 1, 1, 1, 0, NULL, 1578559380, NULL);
INSERT INTO `qin_article` VALUES (2, '覃建飞的天才之路', 'dasdsadsadasd', 1, 1, 2, 0, NULL, 1578558992, NULL);

-- ----------------------------
-- Table structure for qin_category
-- ----------------------------
DROP TABLE IF EXISTS `qin_category`;
CREATE TABLE `qin_category`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of qin_category
-- ----------------------------
INSERT INTO `qin_category` VALUES (1, '前端');
INSERT INTO `qin_category` VALUES (2, '后端');
INSERT INTO `qin_category` VALUES (3, '小程序');
INSERT INTO `qin_category` VALUES (4, 'mysql');

-- ----------------------------
-- Table structure for qin_comment
-- ----------------------------
DROP TABLE IF EXISTS `qin_comment`;
CREATE TABLE `qin_comment`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `compose_type` tinyint(1) UNSIGNED NULL DEFAULT 1 COMMENT '主题类型： 1：文章，2：抽奖',
  `compose_id` int(10) UNSIGNED NOT NULL COMMENT '所属主题',
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '评论内容',
  `user_id` int(10) UNSIGNED NOT NULL COMMENT '评论用户',
  `is_hot` tinyint(1) UNSIGNED NULL DEFAULT 0 COMMENT '是否为热评：1：是',
  `is_top` tinyint(1) UNSIGNED NULL DEFAULT 0 COMMENT '是否置顶：1：是',
  `status` tinyint(1) UNSIGNED NULL DEFAULT 1 COMMENT '状态：1显示',
  `create_time` int(10) UNSIGNED NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx_compose_type`(`compose_type`) USING BTREE,
  INDEX `idx_compose_id`(`compose_id`) USING BTREE,
  INDEX `idx_user_id`(`user_id`) USING BTREE,
  INDEX `idx_is_hot`(`is_hot`) USING BTREE,
  INDEX `idx_is_top`(`is_top`) USING BTREE,
  INDEX `idx_status`(`status`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for qin_reply
-- ----------------------------
DROP TABLE IF EXISTS `qin_reply`;
CREATE TABLE `qin_reply`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `comment_id` int(10) UNSIGNED NOT NULL COMMENT '所属评论',
  `reply_type` tinyint(1) UNSIGNED NULL DEFAULT 1 COMMENT '回复类型：1：回复评论，2：回复别人的回复',
  `reply_id` int(10) UNSIGNED NOT NULL COMMENT '如果回复类型为1：则是comment_id，反之是回复表的id',
  `user_id` int(10) UNSIGNED NOT NULL COMMENT '回复人',
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '回复内容',
  `status` tinyint(1) UNSIGNED NULL DEFAULT 1 COMMENT '状态',
  `create_time` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx_comment_id`(`comment_id`) USING BTREE,
  INDEX `idx_reply_type`(`reply_type`) USING BTREE,
  INDEX `idx_user_id`(`user_id`) USING BTREE,
  INDEX `idx_status`(`status`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for qin_user
-- ----------------------------
DROP TABLE IF EXISTS `qin_user`;
CREATE TABLE `qin_user`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '用户名',
  `password` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '密码',
  `avatar` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '头像',
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT 1 COMMENT '状态',
  `create_time` int(10) NOT NULL DEFAULT CURRENT_TIMESTAMP(10),
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx_status`(`status`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of qin_user
-- ----------------------------
INSERT INTO `qin_user` VALUES (1, '柳成荫', '4679e9a3adf49c3c898ad531c1633fc7', NULL, 1, 1578542412);
INSERT INTO `qin_user` VALUES (2, 'asd', '202cb962ac59075b964b07152d234b70', NULL, 1, 1578542600);
INSERT INTO `qin_user` VALUES (3, 'asscxc', '140b543013d988f4767277b6f45ba542', NULL, 1, 1578542601);

SET FOREIGN_KEY_CHECKS = 1;
