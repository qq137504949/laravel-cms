/*
SQLyog  v12.2.6 (64 bit)
MySQL - 5.5.53 : Database - gat
*********************************************************************
*/
/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`gat` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `gat`;

/*Table structure for table `gat_admin` */

DROP TABLE IF EXISTS `gat_admin`;

CREATE TABLE `gat_admin` (
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

/*Data for the table `gat_admin` */

insert  into `gat_admin`(`admin_id`,`user_name`,`email`,`password`,`remember_token`,`created_at`,`updated_at`,`admin_login_time`,`admin_login_num`,`admin_is_super`,`admin_gid`) values (1,'root','137504949@qq.com','$2y$10$Lxf7aWAPtAruUTBS.7VBP.CRjobfsngn7gb3MoO7zJn8CjOt/6c2u','vPjgkMwQvczizc38gWAQC4tlFlCqFofXEfqts5NVW6uu4y0wM8ZkwGsRja3S','2017-09-25 08:04:57','2017-09-28 05:03:33',NULL,0,1,0);

/*Table structure for table `gat_admin_log` */

DROP TABLE IF EXISTS `gat_admin_log`;

CREATE TABLE `gat_admin_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` varchar(200) NOT NULL COMMENT '内容',
  `created_at` timestamp NULL DEFAULT NULL COMMENT '添加时间',
  `admin_name` char(20) NOT NULL COMMENT '管理员',
  `admin_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '管理员ID',
  `ip` char(15) NOT NULL COMMENT 'IP地址',
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `gat_admin_log` */

/*Table structure for table `gat_admin_menus` */

DROP TABLE IF EXISTS `gat_admin_menus`;

CREATE TABLE `gat_admin_menus` (
  `menu_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(50) NOT NULL DEFAULT '',
  `menu_icon` varchar(20) DEFAULT '',
  `menu_link` varchar(100) DEFAULT '',
  `parent_id` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

/*Data for the table `gat_admin_menus` */

insert  into `gat_admin_menus`(`menu_id`,`menu_name`,`menu_icon`,`menu_link`,`parent_id`) values (1,'系统管理','fa-bar-chart-o','',0),(2,'角色管理',NULL,'admin/role',1),(3,'用户管理',NULL,'admin/user',1),(4,'菜单管理','','admin/menu',1),(5,'管理员日志',NULL,'admin/admin-log',1);


/*Table structure for table `gat_gadmin` */

DROP TABLE IF EXISTS `gat_gadmin`;

CREATE TABLE `gat_gadmin` (
  `gid` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `gname` varchar(50) DEFAULT NULL COMMENT '组名',
  `limits` text COMMENT '权限内容',
  PRIMARY KEY (`gid`),
  KEY `gid` (`gid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `gat_gadmin` */

insert  into `gat_gadmin`(`gid`,`gname`,`limits`) values (1,'后台管理员','1,2,3,4,5,17,18,19,20,23,25,21,22,24'),(2,'供应商','17,18,19'),(3,'出入库管理者','17,20,23');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
