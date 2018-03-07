/*
SQLyog Ultimate v12.2.6 (64 bit)
MySQL - 5.5.53 : Database - shop
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`shop` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `shop`;

/*Table structure for table `su_admin` */

DROP TABLE IF EXISTS `su_admin`;

CREATE TABLE `su_admin` (
  `admin_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `admin_login_time` timestamp NULL DEFAULT NULL COMMENT '登录时间',
  `admin_login_num` int(11) NOT NULL DEFAULT '0' COMMENT '登录次数',
  `admin_is_super` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否超级管理员',
  `admin_gid` smallint(6) DEFAULT '0' COMMENT '权限组ID',
  PRIMARY KEY (`admin_id`),
  UNIQUE KEY `admin_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `su_admin` */

insert  into `su_admin`(`admin_id`,`user_name`,`email`,`password`,`remember_token`,`created_at`,`updated_at`,`admin_login_time`,`admin_login_num`,`admin_is_super`,`admin_gid`) values 
(1,'root','137504949@qq.com','$2y$10$Lxf7aWAPtAruUTBS.7VBP.CRjobfsngn7gb3MoO7zJn8CjOt/6c2u','853NK1dm6urvPALHfyPvS4S5a2exl3CcCJQ0uOKqgTTGcNkoMju7j49imgYH','2017-09-25 08:04:57','2017-09-28 05:03:33',NULL,0,1,0),
(5,'ceshi2','sudongxu@qq.com','$2y$10$P/7Mowp6avj7ab5qyUEgvepaAZMF/Uk69lyYP1WYHSySDX1w6Xo1u',NULL,'2017-09-28 14:00:59','2017-09-28 14:00:59',NULL,0,0,1),
(6,'ceshi','qq@qq','$2y$10$OT6RY1M75RSSVicap6G6I.DHSj/.AWZ80SSPPWyR43mHIOVRRNZJW',NULL,'2017-09-28 14:01:30','2017-09-28 14:01:30',NULL,0,0,1);

/*Table structure for table `su_admin_log` */

DROP TABLE IF EXISTS `su_admin_log`;

CREATE TABLE `su_admin_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` varchar(50) NOT NULL COMMENT '内容',
  `created_at` timestamp NULL DEFAULT NULL COMMENT '添加时间',
  `admin_name` char(20) NOT NULL COMMENT '管理员',
  `admin_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '管理员ID',
  `ip` char(15) NOT NULL COMMENT 'IP地址',
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4;

/*Data for the table `su_admin_log` */

insert  into `su_admin_log`(`id`,`content`,`created_at`,`admin_name`,`admin_id`,`ip`,`updated_at`) values 
(1,'管理员[root]退出登录','2017-09-27 03:09:52','root',1,'127.0.0.1','2017-09-27 03:09:52'),
(2,'管理员[root]登录','2017-09-27 03:10:22','root',1,'127.0.0.1','2017-09-27 03:10:22'),
(3,'管理员[root]退出登录','2017-09-27 03:10:25','root',1,'127.0.0.1','2017-09-27 03:10:25'),
(4,'管理员[root]登录','2017-09-27 03:10:29','root',1,'127.0.0.1','2017-09-27 03:10:29'),
(5,'管理员[root]退出登录','2017-09-27 03:30:50','root',1,'127.0.0.1','2017-09-27 03:30:50'),
(6,'管理员[root]登录','2017-09-27 03:33:17','root',1,'127.0.0.1','2017-09-27 03:33:17'),
(7,'管理员[root]退出登录','2017-09-27 12:59:54','root',1,'127.0.0.1','2017-09-27 12:59:54'),
(8,'管理员[root]登录','2017-09-27 13:00:03','root',1,'127.0.0.1','2017-09-27 13:00:03'),
(9,'[root]创建菜单-fddfs','2017-09-27 13:49:21','root',1,'127.0.0.1','2017-09-27 13:49:21'),
(10,'[root]删除菜单-fddfs','2017-09-27 13:49:30','root',1,'127.0.0.1','2017-09-27 13:49:30'),
(11,'[root]创建菜单-测试日志','2017-09-27 13:56:20','root',1,'127.0.0.1','2017-09-27 13:56:20'),
(12,'[root]修改菜单-测试日志->测试日志1111','2017-09-27 13:56:30','root',1,'127.0.0.1','2017-09-27 13:56:30'),
(13,'[root]删除菜单-测试日志1111','2017-09-27 13:56:38','root',1,'127.0.0.1','2017-09-27 13:56:38'),
(14,'[root]修改菜单-管理员日志->管理员日志','2017-09-27 14:03:00','root',1,'127.0.0.1','2017-09-27 14:03:00'),
(15,'管理员[root]登录','2017-09-28 02:13:49','root',1,'127.0.0.1','2017-09-28 02:13:49'),
(16,'[root]修改菜单-策划死->策划死','2017-09-28 02:16:00','root',1,'127.0.0.1','2017-09-28 02:16:00'),
(17,'[root]创建菜单-ceshi','2017-09-28 02:16:15','root',1,'127.0.0.1','2017-09-28 02:16:15'),
(18,'管理员[root]登录','2017-09-28 03:00:36','root',1,'127.0.0.1','2017-09-28 03:00:36'),
(19,'管理员[root]退出登录','2017-09-28 03:02:27','root',1,'127.0.0.1','2017-09-28 03:02:27'),
(20,'管理员[root]登录','2017-09-28 03:03:46','root',1,'127.0.0.1','2017-09-28 03:03:46'),
(21,'管理员[root]登录','2017-09-28 03:11:31','root',1,'127.0.0.1','2017-09-28 03:11:31'),
(22,'管理员[root]登录','2017-09-28 03:43:47','root',1,'127.0.0.1','2017-09-28 03:43:47'),
(23,'管理员[root]退出登录','2017-09-28 04:12:41','root',1,'127.0.0.1','2017-09-28 04:12:41'),
(24,'管理员[root]登录','2017-09-28 04:18:48','root',1,'127.0.0.1','2017-09-28 04:18:48'),
(25,'[root]修改菜单-用户管理->用户管理','2017-09-28 04:19:13','root',1,'127.0.0.1','2017-09-28 04:19:13'),
(26,'管理员[root]登录','2017-09-28 05:03:38','root',1,'127.0.0.1','2017-09-28 05:03:38'),
(27,'[root]修改菜单-用户管理->用户管理','2017-09-28 05:08:15','root',1,'127.0.0.1','2017-09-28 05:08:15'),
(28,'管理员[root]登录','2017-09-28 12:42:57','root',1,'127.0.0.1','2017-09-28 12:42:57'),
(29,'[root]删除用户-','2017-09-28 13:54:56','root',1,'127.0.0.1','2017-09-28 13:54:56'),
(30,'[root]删除用户-','2017-09-28 13:55:14','root',1,'127.0.0.1','2017-09-28 13:55:14'),
(31,'[root]删除用户-','2017-09-28 13:55:23','root',1,'127.0.0.1','2017-09-28 13:55:23'),
(32,'[root]删除用户-sudongxu1','2017-09-28 13:59:33','root',1,'127.0.0.1','2017-09-28 13:59:33'),
(33,'[root]删除用户-sudongxu','2017-09-28 13:59:49','root',1,'127.0.0.1','2017-09-28 13:59:49'),
(34,'[root]创建菜单-dsfdffd','2017-09-28 14:06:45','root',1,'127.0.0.1','2017-09-28 14:06:45'),
(35,'[root]创建菜单-dsfdfs','2017-09-28 14:08:58','root',1,'127.0.0.1','2017-09-28 14:08:58'),
(36,'[root]删除用户-dsfds','2017-09-28 14:09:43','root',1,'127.0.0.1','2017-09-28 14:09:43'),
(37,'[root]删除用户-hehehehe','2017-09-29 02:18:36','root',1,'127.0.0.1','2017-09-29 02:18:36'),
(38,'[root]修改菜单-角色管理->角色管理','2017-09-29 02:21:18','root',1,'127.0.0.1','2017-09-29 02:21:18'),
(39,'[root]修改菜单-角色管理->角色管理','2017-09-29 03:03:58','root',1,'127.0.0.1','2017-09-29 03:03:58'),
(40,'管理员[root]登录','2017-09-29 05:11:14','root',1,'127.0.0.1','2017-09-29 05:11:14'),
(41,'管理员[root]登录','2017-09-29 05:37:04','root',1,'127.0.0.1','2017-09-29 05:37:04'),
(42,'[root]创建角色-第三方都督府','2017-09-29 06:08:19','root',1,'127.0.0.1','2017-09-29 06:08:19'),
(43,'[root]修改角色-苏东旭->苏东旭','2017-09-29 06:09:39','root',1,'127.0.0.1','2017-09-29 06:09:39'),
(44,'[root]修改角色-苏东旭11111111->苏东旭11111111','2017-09-29 06:11:03','root',1,'127.0.0.1','2017-09-29 06:11:03'),
(45,'[root]修改角色-苏东旭11111111->苏东旭','2017-09-29 06:11:23','root',1,'127.0.0.1','2017-09-29 06:11:23'),
(46,'管理员[root]退出登录','2017-10-07 12:35:22','root',1,'127.0.0.1','2017-10-07 12:35:22'),
(47,'管理员[sudongxu]登录','2017-10-07 12:35:28','sudongxu',8,'127.0.0.1','2017-10-07 12:35:28'),
(48,'管理员[sudongxu]退出登录','2017-10-07 12:35:34','sudongxu',8,'127.0.0.1','2017-10-07 12:35:34'),
(49,'管理员[root]登录','2017-10-07 12:35:36','root',1,'127.0.0.1','2017-10-07 12:35:36'),
(50,'[root]删除菜单-dsfdfs','2017-10-07 12:37:59','root',1,'127.0.0.1','2017-10-07 12:37:59'),
(51,'[root]删除菜单-dsfdffd','2017-10-07 12:38:01','root',1,'127.0.0.1','2017-10-07 12:38:01'),
(52,'[root]删除菜单-ceshi','2017-10-07 12:38:04','root',1,'127.0.0.1','2017-10-07 12:38:04'),
(53,'[root]删除菜单-策划死','2017-10-07 12:38:07','root',1,'127.0.0.1','2017-10-07 12:38:07'),
(54,'[root]删除菜单-门票订单','2017-10-07 12:38:10','root',1,'127.0.0.1','2017-10-07 12:38:10'),
(55,'[root]删除菜单-预约管理','2017-10-07 12:38:12','root',1,'127.0.0.1','2017-10-07 12:38:12'),
(56,'[root]删除菜单-微信模块','2017-10-07 12:38:18','root',1,'127.0.0.1','2017-10-07 12:38:18'),
(57,'[root]删除菜单-首页轮播','2017-10-07 12:38:21','root',1,'127.0.0.1','2017-10-07 12:38:21'),
(58,'[root]删除菜单-广告管理','2017-10-07 12:38:24','root',1,'127.0.0.1','2017-10-07 12:38:24'),
(59,'[root]删除菜单-商家中心','2017-10-07 12:38:28','root',1,'127.0.0.1','2017-10-07 12:38:28'),
(60,'[root]删除菜单-商家管理','2017-10-07 12:38:31','root',1,'127.0.0.1','2017-10-07 12:38:31'),
(61,'[root]创建菜单-测试','2017-10-08 01:40:03','root',1,'127.0.0.1','2017-10-08 01:40:03'),
(62,'[root]创建菜单-测试','2017-10-08 01:40:21','root',1,'127.0.0.1','2017-10-08 01:40:21'),
(63,'[root]修改权限-财务->[1,2,3,4,5,17,18]','2017-10-08 03:11:08','root',1,'127.0.0.1','2017-10-08 03:11:08'),
(64,'[root]修改菜单-测试->库存管理','2017-10-08 04:10:43','root',1,'127.0.0.1','2017-10-08 04:10:43'),
(65,'[root]修改菜单-测试->供应商管理','2017-10-08 04:11:32','root',1,'127.0.0.1','2017-10-08 04:11:32'),
(66,'[root]修改权限-后台管理员->[1,2,3,4,5,17,18]','2017-10-08 04:12:19','root',1,'127.0.0.1','2017-10-08 04:12:19'),
(67,'[root]修改角色-后台管理员->后台管理员','2017-10-08 04:12:51','root',1,'127.0.0.1','2017-10-08 04:12:51'),
(68,'[root]删除用户-heheh','2017-10-08 04:13:29','root',1,'127.0.0.1','2017-10-08 04:13:29'),
(69,'[root]删除用户-sudongxu','2017-10-08 04:13:32','root',1,'127.0.0.1','2017-10-08 04:13:32');

/*Table structure for table `su_admin_menus` */

DROP TABLE IF EXISTS `su_admin_menus`;

CREATE TABLE `su_admin_menus` (
  `menu_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(50) NOT NULL DEFAULT '',
  `menu_icon` varchar(20) DEFAULT '',
  `menu_link` varchar(100) DEFAULT '',
  `parent_id` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

/*Data for the table `su_admin_menus` */

insert  into `su_admin_menus`(`menu_id`,`menu_name`,`menu_icon`,`menu_link`,`parent_id`) values 
(1,'系统管理','fa-bar-chart-o','',0),
(2,'角色管理',NULL,'admin/role',1),
(3,'用户管理',NULL,'admin/user',1),
(4,'菜单管理','','admin/menu',1),
(5,'管理员日志',NULL,'admin/admin-log',1),
(17,'库存管理','fa-info-circle',NULL,0),
(18,'供应商管理',NULL,'admin/supplier',17);

/*Table structure for table `su_category` */

DROP TABLE IF EXISTS `su_category`;

CREATE TABLE `su_category` (
  `cat_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(50) DEFAULT '',
  `store_id` int(100) DEFAULT '0',
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `su_category` */

/*Table structure for table `su_gadmin` */

DROP TABLE IF EXISTS `su_gadmin`;

CREATE TABLE `su_gadmin` (
  `gid` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `gname` varchar(50) DEFAULT NULL COMMENT '组名',
  `limits` text COMMENT '权限内容',
  PRIMARY KEY (`gid`),
  KEY `gid` (`gid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `su_gadmin` */

insert  into `su_gadmin`(`gid`,`gname`,`limits`) values 
(1,'后台管理员','1,2,3,4,5,17,18'),
(2,'总经理','1,2,3,4,5,17,18'),
(3,'财务','1,2,3,4,5,17,18');

/*Table structure for table `su_migrations` */

DROP TABLE IF EXISTS `su_migrations`;

CREATE TABLE `su_migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `su_migrations` */

insert  into `su_migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1);

/*Table structure for table `su_password_resets` */

DROP TABLE IF EXISTS `su_password_resets`;

CREATE TABLE `su_password_resets` (
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_user_name_index` (`user_name`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `su_password_resets` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
