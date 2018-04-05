/*
 Navicat Premium Data Transfer

 Source Server         : 本机
 Source Server Type    : MySQL
 Source Server Version : 50721
 Source Host           : localhost
 Source Database       : fang

 Target Server Type    : MySQL
 Target Server Version : 50721
 File Encoding         : utf-8

 Date: 04/05/2018 23:56:38 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `fang_admin`
-- ----------------------------
DROP TABLE IF EXISTS `fang_admin`;
CREATE TABLE `fang_admin` (
  `admin_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(180) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `admin_login_time` timestamp NULL DEFAULT NULL COMMENT '登录时间',
  `admin_login_num` int(11) NOT NULL DEFAULT '0' COMMENT '登录次数',
  `admin_is_super` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否超级管理员',
  `admin_gid` smallint(6) DEFAULT '0' COMMENT '权限组ID',
  PRIMARY KEY (`admin_id`),
  UNIQUE KEY `admin_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `fang_admin`
-- ----------------------------
BEGIN;
INSERT INTO `fang_admin` VALUES ('1', 'root', '137504949@qq.com', '$2y$10$Lxf7aWAPtAruUTBS.7VBP.CRjobfsngn7gb3MoO7zJn8CjOt/6c2u', 'F8oYCzOiJgamM1VNW8GgJTQqbK9lHbSfhT8pqJIwDfmTfXhE3TnOXrZAv3rP', '2017-09-25 08:04:57', '2017-09-28 05:03:33', null, '0', '1', '0');
COMMIT;

-- ----------------------------
--  Table structure for `fang_admin_log`
-- ----------------------------
DROP TABLE IF EXISTS `fang_admin_log`;
CREATE TABLE `fang_admin_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` varchar(200) NOT NULL COMMENT '内容',
  `created_at` timestamp NULL DEFAULT NULL COMMENT '添加时间',
  `admin_name` char(20) NOT NULL COMMENT '管理员',
  `admin_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '管理员ID',
  `ip` char(15) NOT NULL COMMENT 'IP地址',
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `fang_admin_log`
-- ----------------------------
BEGIN;
INSERT INTO `fang_admin_log` VALUES ('1', '管理员[root]登录', '2018-04-05 22:57:44', 'root', '1', '127.0.0.1', '2018-04-05 22:57:44'), ('2', '[root]创建菜单-站点设置', '2018-04-05 23:22:25', 'root', '1', '127.0.0.1', '2018-04-05 23:22:25'), ('3', '管理员[root]退出登录', '2018-04-05 23:51:33', 'root', '1', '127.0.0.1', '2018-04-05 23:51:33'), ('4', '管理员[root]登录', '2018-04-05 23:53:13', 'root', '1', '127.0.0.1', '2018-04-05 23:53:13');
COMMIT;

-- ----------------------------
--  Table structure for `fang_admin_menus`
-- ----------------------------
DROP TABLE IF EXISTS `fang_admin_menus`;
CREATE TABLE `fang_admin_menus` (
  `menu_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(50) NOT NULL DEFAULT '',
  `menu_icon` varchar(20) DEFAULT '',
  `menu_link` varchar(100) DEFAULT '',
  `parent_id` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `fang_admin_menus`
-- ----------------------------
BEGIN;
INSERT INTO `fang_admin_menus` VALUES ('1', '系统管理', 'fa-bar-chart-o', '', '0'), ('2', '角色管理', null, 'admin/role', '1'), ('3', '用户管理', null, 'admin/user', '1'), ('4', '菜单管理', '', 'admin/menu', '1'), ('5', '管理员日志', null, 'admin/admin-log', '1'), ('26', '站点设置', null, 'admin/system', '1');
COMMIT;

-- ----------------------------
--  Table structure for `fang_gadmin`
-- ----------------------------
DROP TABLE IF EXISTS `fang_gadmin`;
CREATE TABLE `fang_gadmin` (
  `gid` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `gname` varchar(50) DEFAULT NULL COMMENT '组名',
  `limits` text COMMENT '权限内容',
  PRIMARY KEY (`gid`),
  KEY `gid` (`gid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `fang_gadmin`
-- ----------------------------
BEGIN;
INSERT INTO `fang_gadmin` VALUES ('1', '后台管理员', '1,2,3,4,5,17,18,19,20,23,25,21,22,24'), ('2', '供应商', '17,18,19'), ('3', '出入库管理者', '17,20,23');
COMMIT;

-- ----------------------------
--  Table structure for `fang_system`
-- ----------------------------
DROP TABLE IF EXISTS `fang_system`;
CREATE TABLE `fang_system` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `icp` varchar(50) COLLATE utf8_bin DEFAULT NULL COMMENT '备案号',
  `tongji` text COLLATE utf8_bin COMMENT '第三方统计代码',
  `title` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `keywords` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `description` text COLLATE utf8_bin,
  `url` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '域名',
  `mobile` varchar(100) COLLATE utf8_bin DEFAULT NULL COMMENT '电话',
  `address` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '地址',
  `email` varchar(100) COLLATE utf8_bin DEFAULT NULL COMMENT '邮箱',
  `logo` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT 'logo',
  `phone` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '手机号',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
--  Records of `fang_system`
-- ----------------------------
BEGIN;
INSERT INTO `fang_system` VALUES ('1', '郑州-100344334', null, '郑州赢鸿', '郑州二手房_郑州二手房出售_郑州二手房网(郑州赢鸿网)', 0xe98391e5b79ee4ba8ce6898be688bf5fe98391e5b79ee4ba8ce6898be688bfe587bae594ae5fe98391e5b79ee4ba8ce6898be688bfe7bd9128e98391e5b79ee8b5a2e9b8bfe7bd9129, 'fang.net', '0371-60166618', '郑州市郑东新区地润路5-3号', '873366181@qq.com', null, '18037698368');
COMMIT;

-- ----------------------------
--  Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `migrations`
-- ----------------------------
BEGIN;
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1'), ('2', '2014_10_12_100000_create_password_resets_table', '1');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
