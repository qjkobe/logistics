/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 5.7.10-log : Database - logistics
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`logistics` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `logistics`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `AID` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(10) DEFAULT NULL,
  `password` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`AID`)
) ENGINE=InnoDB AUTO_INCREMENT=10006 DEFAULT CHARSET=utf8;

/*Data for the table `admin` */

insert  into `admin`(`AID`,`username`,`password`) values (10000,'admin','admin'),(10001,'qjkobe','qjkobe'),(10004,'test','test'),(10005,'test','test');

/*Table structure for table `client` */

DROP TABLE IF EXISTS `client`;

CREATE TABLE `client` (
  `CID` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(10) DEFAULT NULL,
  `password` varchar(15) DEFAULT NULL,
  `company` varchar(50) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `index` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`CID`)
) ENGINE=InnoDB AUTO_INCREMENT=1000000001 DEFAULT CHARSET=utf8;

/*Data for the table `client` */

insert  into `client`(`CID`,`username`,`password`,`company`,`phone`,`index`) values (1000000000,'qjkobe','qjkobe',NULL,NULL,NULL);

/*Table structure for table `goods` */

DROP TABLE IF EXISTS `goods`;

CREATE TABLE `goods` (
  `gid` int(9) NOT NULL AUTO_INCREMENT,
  `cid` int(11) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `tid` int(11) DEFAULT NULL,
  PRIMARY KEY (`gid`),
  KEY `kehuwuping` (`cid`),
  KEY `wupingleixing` (`tid`),
  CONSTRAINT `kehuwuping` FOREIGN KEY (`cid`) REFERENCES `client` (`CID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `wupingleixing` FOREIGN KEY (`tid`) REFERENCES `gtype` (`tid`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=100000000 DEFAULT CHARSET=utf8;

/*Data for the table `goods` */

/*Table structure for table `gtype` */

DROP TABLE IF EXISTS `gtype`;

CREATE TABLE `gtype` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) DEFAULT NULL COMMENT '危险品易碎品',
  `level` int(20) DEFAULT NULL COMMENT '危险等级',
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `gtype` */

/*Table structure for table `orderlist` */

DROP TABLE IF EXISTS `orderlist`;

CREATE TABLE `orderlist` (
  `oid` int(11) NOT NULL AUTO_INCREMENT,
  `sid` int(11) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL,
  `gid` int(11) DEFAULT NULL,
  `rid` int(11) DEFAULT NULL,
  `expense` int(11) DEFAULT NULL,
  `xiadantime` date DEFAULT NULL COMMENT '下单时间',
  `status` int(11) DEFAULT NULL COMMENT '0：未执行1：正在执行2：已完成',
  `destination` varchar(20) DEFAULT NULL COMMENT '目的地',
  PRIMARY KEY (`oid`),
  KEY `员工` (`sid`),
  KEY `路线` (`rid`),
  KEY `物品` (`gid`),
  KEY `客户` (`cid`),
  CONSTRAINT `员工` FOREIGN KEY (`sid`) REFERENCES `staff` (`SID`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `客户` FOREIGN KEY (`cid`) REFERENCES `client` (`CID`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `物品` FOREIGN KEY (`gid`) REFERENCES `goods` (`gid`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `路线` FOREIGN KEY (`rid`) REFERENCES `route` (`rid`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10000000000 DEFAULT CHARSET=utf8;

/*Data for the table `orderlist` */

/*Table structure for table `place` */

DROP TABLE IF EXISTS `place`;

CREATE TABLE `place` (
  `pid` int(3) NOT NULL AUTO_INCREMENT,
  `namex` varchar(50) DEFAULT NULL COMMENT '地名1',
  `namey` varchar(50) DEFAULT NULL COMMENT '地名2',
  `distance` int(11) DEFAULT NULL COMMENT '距离',
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8;

/*Data for the table `place` */

/*Table structure for table `route` */

DROP TABLE IF EXISTS `route`;

CREATE TABLE `route` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `place` varchar(255) DEFAULT NULL COMMENT '保存地点，逗号分割',
  `daodatime` varchar(255) DEFAULT NULL COMMENT '保存时间，数量应该为地点数量-1',
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `route` */

/*Table structure for table `staff` */

DROP TABLE IF EXISTS `staff`;

CREATE TABLE `staff` (
  `SID` int(6) NOT NULL AUTO_INCREMENT,
  `username` varchar(10) DEFAULT NULL,
  `password` varchar(15) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL COMMENT '真实姓名',
  `mail` varchar(50) DEFAULT NULL COMMENT '邮箱',
  `phone` varchar(11) DEFAULT NULL COMMENT '电话',
  `contro` text COMMENT '个人简介',
  `avatar` varchar(255) DEFAULT NULL COMMENT '储存图片路径',
  PRIMARY KEY (`SID`)
) ENGINE=InnoDB AUTO_INCREMENT=100001 DEFAULT CHARSET=utf8;

/*Data for the table `staff` */

insert  into `staff`(`SID`,`username`,`password`,`name`,`mail`,`phone`,`contro`,`avatar`) values (100000,'qjkobe','qjkobe',NULL,NULL,NULL,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
