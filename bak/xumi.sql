/*
 Navicat Premium Data Transfer

 Source Server         : 本机
 Source Server Type    : MySQL
 Source Server Version : 50723
 Source Host           : 127.0.0.1
 Source Database       : cms

 Target Server Type    : MySQL
 Target Server Version : 50723
 File Encoding         : utf-8

 Date: 01/24/2019 10:25:43 AM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `cms_admin`
-- ----------------------------
DROP TABLE IF EXISTS `cms_admin`;
CREATE TABLE `cms_admin` (
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
  `name` varchar(50) DEFAULT NULL COMMENT '姓名',
  `mobile` varchar(11) DEFAULT NULL COMMENT '电话',
  PRIMARY KEY (`admin_id`),
  UNIQUE KEY `admin_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `cms_admin`
-- ----------------------------
BEGIN;
INSERT INTO `cms_admin` VALUES ('1', 'root', '137504949@qq.com', '$2y$10$Lxf7aWAPtAruUTBS.7VBP.CRjobfsngn7gb3MoO7zJn8CjOt/6c2u', 'TNUbbCEd2ARJu9mvOxubZX9Ahu6LyqPYCxFo4LYoAzjRm8sLZPlbUC5bgqcx', '2017-09-25 08:04:57', '2017-09-28 05:03:33', null, '0', '1', '0', '超级用户', '110');
COMMIT;

-- ----------------------------
--  Table structure for `cms_admin_log`
-- ----------------------------
DROP TABLE IF EXISTS `cms_admin_log`;
CREATE TABLE `cms_admin_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` varchar(200) NOT NULL COMMENT '内容',
  `created_at` timestamp NULL DEFAULT NULL COMMENT '添加时间',
  `admin_name` char(20) NOT NULL COMMENT '管理员',
  `admin_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '管理员ID',
  `ip` char(15) NOT NULL COMMENT 'IP地址',
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=584 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `cms_admin_log`
-- ----------------------------
BEGIN;
INSERT INTO `cms_admin_log` VALUES ('564', '管理员[root]登录', '2019-01-23 17:51:22', 'root', '1', '127.0.0.1', '2019-01-23 17:51:22'), ('565', '管理员[root]登录', '2019-01-23 17:58:39', 'root', '1', '127.0.0.1', '2019-01-23 17:58:39'), ('566', '[root]修改菜单-管理员用户->管理员', '2019-01-23 17:59:34', 'root', '1', '127.0.0.1', '2019-01-23 17:59:34'), ('567', '管理员[root]登录', '2019-01-24 09:21:30', 'root', '1', '127.0.0.1', '2019-01-24 09:21:30'), ('568', '[root]修改菜单-系统管理->系统管理', '2019-01-24 09:22:54', 'root', '1', '127.0.0.1', '2019-01-24 09:22:54'), ('569', '[root]修改菜单-角色管理->角色管理', '2019-01-24 09:23:01', 'root', '1', '127.0.0.1', '2019-01-24 09:23:01'), ('570', '[root]修改菜单-系统管理->系统管理', '2019-01-24 09:23:59', 'root', '1', '127.0.0.1', '2019-01-24 09:23:59'), ('571', '[root]创建角色-测试', '2019-01-24 09:53:28', 'root', '1', '127.0.0.1', '2019-01-24 09:53:28'), ('572', '[root]创建角色-s\'d\'f\'d的', '2019-01-24 09:54:10', 'root', '1', '127.0.0.1', '2019-01-24 09:54:10'), ('573', '[root]修改角色-测试->测试', '2019-01-24 09:54:52', 'root', '1', '127.0.0.1', '2019-01-24 09:54:52'), ('574', '[root]修改权限-测试->[]', '2019-01-24 09:58:49', 'root', '1', '127.0.0.1', '2019-01-24 09:58:49'), ('575', '[root]修改权限-测试->[1,2,3,4,5,26]', '2019-01-24 09:58:58', 'root', '1', '127.0.0.1', '2019-01-24 09:58:58'), ('576', '[root]修改权限-测试->[1,2,3,4,5,26]', '2019-01-24 09:59:32', 'root', '1', '127.0.0.1', '2019-01-24 09:59:32'), ('577', '[root]修改权限-测试->[1,2,3,4,5,26]', '2019-01-24 09:59:36', 'root', '1', '127.0.0.1', '2019-01-24 09:59:36'), ('578', '[root]修改权限-测试->[1,2,3,4,5,26]', '2019-01-24 10:00:00', 'root', '1', '127.0.0.1', '2019-01-24 10:00:00'), ('579', '[root]创建角色-dsfdfsfds', '2019-01-24 10:00:11', 'root', '1', '127.0.0.1', '2019-01-24 10:00:11'), ('580', '[root]修改角色-dsfdfsfds->sdfsdf', '2019-01-24 10:00:16', 'root', '1', '127.0.0.1', '2019-01-24 10:00:16'), ('581', '[root]删除用户-sdfdsf', '2019-01-24 10:15:29', 'root', '1', '127.0.0.1', '2019-01-24 10:15:29'), ('582', '管理员[root]登录', '2019-01-24 10:24:29', 'root', '1', '127.0.0.1', '2019-01-24 10:24:29'), ('583', '管理员[root]退出登录', '2019-01-24 10:24:40', 'root', '1', '127.0.0.1', '2019-01-24 10:24:40');
COMMIT;

-- ----------------------------
--  Table structure for `cms_admin_menus`
-- ----------------------------
DROP TABLE IF EXISTS `cms_admin_menus`;
CREATE TABLE `cms_admin_menus` (
  `menu_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(50) NOT NULL DEFAULT '',
  `menu_icon` varchar(20) DEFAULT '',
  `menu_link` varchar(100) DEFAULT '',
  `parent_id` tinyint(4) NOT NULL DEFAULT '0',
  `sort` int(11) DEFAULT '0' COMMENT '排序值',
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `cms_admin_menus`
-- ----------------------------
BEGIN;
INSERT INTO `cms_admin_menus` VALUES ('1', '系统管理', 'fa-bar-chart-o', null, '0', '10'), ('2', '角色管理', null, 'admin/role', '1', '2'), ('3', '管理员', null, 'admin/user', '1', '1'), ('4', '菜单管理', null, 'admin/menu', '1', '3'), ('5', '管理员日志', null, 'admin/admin-log', '1', '5'), ('26', '系统设置', null, 'admin/system', '1', '10');
COMMIT;

-- ----------------------------
--  Table structure for `cms_gadmin`
-- ----------------------------
DROP TABLE IF EXISTS `cms_gadmin`;
CREATE TABLE `cms_gadmin` (
  `gid` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `gname` varchar(50) DEFAULT NULL COMMENT '组名',
  `limits` text COMMENT '权限内容',
  PRIMARY KEY (`gid`),
  KEY `gid` (`gid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `cms_system`
-- ----------------------------
DROP TABLE IF EXISTS `cms_system`;
CREATE TABLE `cms_system` (
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
--  Records of `cms_system`
-- ----------------------------
BEGIN;
INSERT INTO `cms_system` VALUES ('1', '沪ICP备18016718号-1', null, '旭宓科技', '旭宓科技软件服务商专门提供软件定制包括网站开发，APP开发,微信二次开发，小程序开发等', 0xe697ade5ae93e7a791e68a80e8bdafe4bbb6e69c8de58aa1e59586e4b893e997a8e68f90e4be9be8bdafe4bbb6e5ae9ae588b6e58c85e68bace7bd91e7ab99e5bc80e58f91efbc8c415050e5bc80e58f912ce5beaee4bfa1e4ba8ce6aca1e5bc80e58f91efbc8ce5b08fe7a88be5ba8fe5bc80e58f91e7ad89, 'www.shxumi.com', '18602156507', '上海市浦东新区泥城镇云汉路979号2楼', '137504949@qq.com', null, '18037698368');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
