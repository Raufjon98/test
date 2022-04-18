/*
SQLyog Ultimate v12.14 (64 bit)
MySQL - 5.6.38 : Database - projectsend
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`projectsend` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `projectsend`;

/*Table structure for table `documentis` */

DROP TABLE IF EXISTS `documentis`;

CREATE TABLE `documentis` (
  `document_id` int(11) NOT NULL AUTO_INCREMENT,
  `document_name` varchar(50) DEFAULT NULL,
  `input_date` datetime DEFAULT NULL,
  `user_status` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `document_path` varchar(100) DEFAULT NULL,
  `comments` mediumblob,
  KEY `document_id` (`document_id`)
) ENGINE=InnoDB AUTO_INCREMENT=232 DEFAULT CHARSET=utf8;

/*Data for the table `documentis` */

insert  into `documentis`(`document_id`,`document_name`,`input_date`,`user_status`,`user_id`,`document_path`,`comments`) values 
(1,'nothing ','2020-10-08 07:28:31',1,17564,'1','<p>only letter</p>'),
(2,'nothing ','2020-10-08 07:28:31',1,17564,'1','<p>only letter</p>'),
(3,'nothing ','2020-10-08 07:28:31',1,17564,'1','<p>only letter</p>'),
(4,'nothing ','2020-10-08 07:28:31',1,17564,'1','<p>only letter</p>'),
(5,'nothing ','2020-10-08 07:28:31',1,17564,'1','<p>only letter</p>'),
(6,'for 6 people','2020-10-08 07:35:31',2,25849,'0 ','<p>no file mail</p>'),
(7,'for 6 people','2020-10-08 07:35:31',2,25849,'0','<p>no file mail</p>'),
(8,'for 6 people','2020-10-08 07:35:31',2,25849,'0','<p>no file mail</p>'),
(9,'for 6 people','2020-10-08 07:35:31',2,25849,'0','<p>no file mail</p>'),
(10,'for 6 people','2020-10-08 07:35:31',2,25849,'1','<p>no file mail</p>'),
(11,'for 6 people','2020-10-08 07:35:31',2,25849,'1','<p>no file mail</p>'),
(12,'5 people','2020-10-08 07:36:56',2,25849,'1','<p>4 files</p>'),
(231,NULL,NULL,NULL,NULL,'',NULL);

/*Table structure for table `documents` */

DROP TABLE IF EXISTS `documents`;

CREATE TABLE `documents` (
  `document_id` int(11) NOT NULL AUTO_INCREMENT,
  `document_name` varchar(50) DEFAULT NULL,
  `input_date` datetime DEFAULT NULL,
  `user_status` int(11) DEFAULT NULL,
  `date_order` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `document_path` varchar(100) DEFAULT NULL,
  `comments` mediumblob,
  `file_name` varchar(50) DEFAULT NULL,
  `extension` varchar(20) DEFAULT NULL,
  `document_status` int(11) DEFAULT NULL,
  KEY `document_id` (`document_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Data for the table `documents` */

insert  into `documents`(`document_id`,`document_name`,`input_date`,`user_status`,`date_order`,`user_id`,`document_path`,`comments`,`file_name`,`extension`,`document_status`) values 
(1,'nothing ','2020-10-08 07:28:31',1,'2020-10-08 07:28:31',17564,NULL,'<p>only letter</p>',NULL,'',1),
(2,'nothing ','2020-10-08 07:28:31',1,'2020-10-08 07:28:31',17564,NULL,'<p>only letter</p>',NULL,'',1),
(3,'nothing ','2020-10-08 07:28:31',1,'2020-10-08 07:28:31',17564,NULL,'<p>only letter</p>',NULL,'',1),
(4,'nothing ','2020-10-08 07:28:31',1,'2020-10-08 07:28:31',17564,NULL,'<p>only letter</p>',NULL,'',1),
(5,'nothing ','2020-10-08 07:28:31',1,'2020-10-08 07:28:31',17564,NULL,'<p>only letter</p>',NULL,'',1),
(6,'for 6 people','2020-10-08 07:35:31',2,'2020-10-08 07:35:31',25849,NULL,'<p>no file mail</p>',NULL,'',1),
(7,'for 6 people','2020-10-08 07:35:31',2,'2020-10-08 07:35:31',25849,NULL,'<p>no file mail</p>',NULL,'',1),
(8,'for 6 people','2020-10-08 07:35:31',2,'2020-10-08 07:35:31',25849,NULL,'<p>no file mail</p>',NULL,'',1),
(9,'for 6 people','2020-10-08 07:35:31',2,'2020-10-08 07:35:31',25849,NULL,'<p>no file mail</p>',NULL,'',1),
(10,'for 6 people','2020-10-08 07:35:31',2,'2020-10-08 07:35:31',25849,NULL,'<p>no file mail</p>',NULL,'',1),
(11,'for 6 people','2020-10-08 07:35:31',2,'2020-10-08 07:35:31',25849,NULL,'<p>no file mail</p>',NULL,'',1),
(12,'5 people','2020-10-08 07:36:56',2,'2022-04-18 16:52:29',25849,'uploaded_files','<p>4 files</p>','file_5f7e9768dee7e0.57800621.rar','rar',1),
(13,'example','2021-12-04 18:43:29',2,'2021-12-04 18:43:29',25849,'uploaded_files','<font style=\"vertical-align: inherit;\"><font style=\"vertical-align: inherit;\">&nbsp;пример</font></font><font style=\"vertical-align: inherit;\"><font style=\"vertical-align: inherit;\">&nbsp;пример</font></font><font style=\"vertical-align: inherit;\"><font style=\"vertical-align: inherit;\">&nbsp;пример</font></font><font style=\"vertical-align: inherit;\"><font style=\"vertical-align: inherit;\">&nbsp;пример</font></font><font style=\"vertical-align: inherit;\"><font style=\"vertical-align: inherit;\">&nbsp;пример</font></font><font style=\"vertical-align: inherit;\"><font style=\"vertical-align: inherit;\">&nbsp;пример</font></font><font style=\"vertical-align: inherit;\"><font style=\"vertical-align: inherit;\">&nbsp;пример</font></font><font style=\"vertical-align: inherit;\"><font style=\"vertical-align: inherit;\">&nbsp;пример</font></font><font style=\"vertical-align: inherit;\"><font style=\"vertical-align: inherit;\">&nbsp;пример</font></font><font style=\"vertical-align: inherit;\"><font style=\"vertical-align: inherit;\">&nbsp;пример</font></font><font style=\"vertical-align: inherit;\"><font style=\"vertical-align: inherit;\">&nbsp;пример</font></font><font style=\"vertical-align: inherit;\"><font style=\"vertical-align: inherit;\">&nbsp;пример</font></font><font style=\"vertical-align: inherit;\"><font style=\"vertical-align: inherit;\">&nbsp;пример</font></font>','file_61ab7081c17f6.png','png',1);

/*Table structure for table `group_members` */

DROP TABLE IF EXISTS `group_members`;

CREATE TABLE `group_members` (
  `group_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `group_members_id` int(11) NOT NULL AUTO_INCREMENT,
  KEY `id` (`group_members_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

/*Data for the table `group_members` */

insert  into `group_members`(`group_id`,`user_id`,`group_members_id`) values 
(1,17564,1),
(2,25849,2),
(3,25848,3),
(4,25750,4),
(5,25751,5),
(6,25752,6),
(6,17564,7),
(4,17564,8),
(6,25750,9),
(6,25752,10),
(6,25751,11),
(6,25753,12),
(6,25754,13),
(6,25755,14),
(6,25757,15),
(6,25756,16),
(6,25758,17),
(6,25751,18);

/*Table structure for table `groups` */

DROP TABLE IF EXISTS `groups`;

CREATE TABLE `groups` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` tinytext,
  KEY `group_id` (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `groups` */

insert  into `groups`(`group_id`,`group_name`) values 
(1,'Шуъбаи IT'),
(2,'Шуъбаи таълим\r\n'),
(3,'Шуъбаи тарбия'),
(4,'Маркази тестӣ'),
(5,'Маркази мартаба'),
(6,'Шуъбаи фосилавӣ');

/*Table structure for table `letter` */

DROP TABLE IF EXISTS `letter`;

CREATE TABLE `letter` (
  `id_letter` int(11) NOT NULL AUTO_INCREMENT,
  `sender` int(11) DEFAULT NULL,
  `receiver` int(11) DEFAULT NULL,
  `is_group` tinyint(1) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `is_file` tinyint(1) DEFAULT NULL,
  `document_id` int(11) DEFAULT NULL,
  `unical` varchar(100) NOT NULL,
  `document_status` int(11) DEFAULT NULL,
  KEY `id_letter` (`id_letter`)
) ENGINE=InnoDB AUTO_INCREMENT=259 DEFAULT CHARSET=utf8;

/*Data for the table `letter` */

insert  into `letter`(`id_letter`,`sender`,`receiver`,`is_group`,`group_id`,`is_file`,`document_id`,`unical`,`document_status`) values 
(1,17564,25751,0,NULL,0,1,'5f7e956f0abc6',1),
(2,17564,25752,0,NULL,0,2,'5f7e956f0abc6',1),
(3,17564,25753,0,NULL,0,3,'5f7e956f0abc6',1),
(4,17564,25754,0,NULL,0,4,'5f7e956f0abc6',1),
(5,17564,25756,0,NULL,0,5,'5f7e956f0abc6',1),
(6,25849,25750,0,NULL,0,6,'5f7e971310b95',1),
(7,25849,25751,0,NULL,0,7,'5f7e971310b95',1),
(8,25849,25752,0,NULL,0,8,'5f7e971310b95',1),
(9,25849,25753,0,NULL,0,9,'5f7e971310b95',1),
(10,25849,25755,0,NULL,0,10,'5f7e971310b95',1),
(11,25849,17564,0,NULL,0,11,'5f7e971310b95',1),
(12,25849,25750,0,NULL,1,12,'5f7e9768dee66',1),
(13,25849,25751,0,NULL,1,13,'5f7e9768dee66',1),
(14,25849,25752,0,NULL,1,14,'5f7e9768dee66',1),
(15,25849,25754,0,NULL,1,15,'5f7e9768dee66',1),
(16,25849,17564,0,NULL,1,16,'5f7e9768dee66',1),
(17,25849,25750,0,NULL,1,17,'5f7e9768dee66',1),
(18,25849,25751,0,NULL,1,18,'5f7e9768dee66',1),
(19,25849,25752,0,NULL,1,19,'5f7e9768dee66',1),
(20,25849,25754,0,NULL,1,20,'5f7e9768dee66',1),
(21,25849,17564,0,NULL,1,21,'5f7e9768dee66',1),
(22,25849,25750,0,NULL,1,22,'5f7e9768dee66',1),
(23,25849,25751,0,NULL,1,23,'5f7e9768dee66',1),
(24,25849,25752,0,NULL,1,24,'5f7e9768dee66',1),
(25,25849,25754,0,NULL,1,25,'5f7e9768dee66',1),
(26,25849,17564,0,NULL,1,26,'5f7e9768dee66',1),
(27,25849,25750,0,NULL,1,27,'5f7e9768dee66',1),
(28,25849,25751,0,NULL,1,28,'5f7e9768dee66',1),
(29,25849,25752,0,NULL,1,29,'5f7e9768dee66',1),
(30,25849,25754,0,NULL,1,30,'5f7e9768dee66',1),
(31,25849,17564,0,NULL,1,31,'5f7e9768dee66',1),
(32,17564,1,1,1,1,32,'5f7e97c4866a0',1),
(33,17564,2,1,2,1,33,'5f7e97c4866a0',1),
(34,17564,3,1,3,1,34,'5f7e97c4866a0',1),
(35,17564,1,1,1,1,35,'5f7e97c4866a0',1),
(36,17564,2,1,2,1,36,'5f7e97c4866a0',1),
(37,17564,3,1,3,1,37,'5f7e97c4866a0',1),
(38,17564,25750,0,NULL,1,38,'5f7e982f77ac4',1),
(39,17564,25751,0,NULL,1,39,'5f7e982f77ac4',1),
(40,17564,25752,0,NULL,1,40,'5f7e982f77ac4',1),
(41,17564,25753,0,NULL,1,41,'5f7e982f77ac4',1),
(42,17564,25754,0,NULL,1,42,'5f7e982f77ac4',1),
(43,17564,25756,0,NULL,1,43,'5f7e982f77ac4',1),
(44,17564,25750,0,NULL,1,44,'5f7e982f77ac4',1),
(45,17564,25751,0,NULL,1,45,'5f7e982f77ac4',1),
(46,17564,25752,0,NULL,1,46,'5f7e982f77ac4',1),
(47,17564,25753,0,NULL,1,47,'5f7e982f77ac4',1),
(48,17564,25754,0,NULL,1,48,'5f7e982f77ac4',1),
(49,17564,25756,0,NULL,1,49,'5f7e982f77ac4',1),
(50,17564,25750,0,NULL,1,50,'5f7e982f77ac4',1),
(51,17564,25751,0,NULL,1,51,'5f7e982f77ac4',1),
(52,17564,25752,0,NULL,1,52,'5f7e982f77ac4',1),
(53,17564,25753,0,NULL,1,53,'5f7e982f77ac4',1),
(54,17564,25754,0,NULL,1,54,'5f7e982f77ac4',1),
(55,17564,25756,0,NULL,1,55,'5f7e982f77ac4',1),
(56,17564,25750,0,NULL,1,56,'5f7e982f77ac4',1),
(57,17564,25751,0,NULL,1,57,'5f7e982f77ac4',1),
(58,17564,25752,0,NULL,1,58,'5f7e982f77ac4',1),
(59,17564,25753,0,NULL,1,59,'5f7e982f77ac4',1),
(60,17564,25754,0,NULL,1,60,'5f7e982f77ac4',1),
(61,17564,25756,0,NULL,1,61,'5f7e982f77ac4',1),
(62,25849,1,1,1,1,62,'5f7ecc7a8085e',1),
(63,25849,5,1,5,1,63,'5f7ecc7a8085e',1),
(64,25849,1,1,1,1,64,'5f7ecc7a8085e',1),
(65,25849,5,1,5,1,65,'5f7ecc7a8085e',1),
(66,25849,25750,0,NULL,1,66,'5f7ed78e137f5',1),
(67,17564,1,1,1,1,67,'5f7fdf3f7f795',1),
(68,17564,1,1,1,1,68,'5f7fdf3f7f795',1),
(69,17564,1,1,1,1,69,'5f7fdf3f7f795',1),
(70,17564,1,1,1,1,70,'5f7fdf3f7f795',1),
(71,17564,1,1,1,1,71,'5f7fdf3f7f795',1),
(72,17564,1,1,1,1,72,'5f7fdf3f7f795',1),
(73,17564,1,1,1,1,73,'5f7fdf3f7f795',1),
(74,17564,1,1,1,1,74,'5f7fdf3f7f795',1),
(75,17564,1,1,1,1,75,'5f7fdf3f7f795',1),
(76,17564,6,1,6,1,76,'5f7fdf7620d5d',1),
(77,17564,6,1,6,1,77,'5f7fdf7620d5d',1),
(78,17564,6,1,6,1,78,'5f7fdf7620d5d',1),
(79,17564,6,1,6,1,79,'5f7fdf7620d5d',1),
(80,17564,6,1,6,1,80,'5f7fdf7620d5d',1),
(81,17564,5,1,5,1,81,'5f7fdf9f643c5',1),
(82,17564,5,1,5,1,82,'5f7fdf9f643c5',1),
(83,17564,5,1,5,1,83,'5f7fdf9f643c5',1),
(84,17564,5,1,5,1,84,'5f7fdf9f643c5',1),
(85,17564,5,1,5,1,85,'5f7fdf9f643c5',1),
(86,17564,25751,0,NULL,1,86,'5f7fe3cfe8330',1),
(87,17564,4,1,4,1,87,'5f7fe4410e64a',1),
(88,17564,4,1,4,1,88,'5f7fe4410e64a',1),
(89,17564,4,1,4,1,89,'5f7fe4410e64a',1),
(90,17564,4,1,4,1,90,'5f7fe4410e64a',1),
(91,17564,17564,0,NULL,1,91,'5f7fe4b49e51c',1),
(92,17564,25752,0,NULL,1,92,'5f7fe57362541',1),
(93,17564,25750,0,NULL,1,93,'5f7fe80fb9312',1),
(94,17564,17564,0,NULL,1,94,'5f7fe91ee74f8',1),
(95,17564,17564,0,NULL,1,95,'5f7fe91ee74f8',1),
(96,17564,17564,0,NULL,1,96,'5f7fe91ee74f8',1),
(97,17564,17564,0,NULL,1,97,'5f7fe91ee74f8',1),
(98,17564,17564,0,NULL,1,98,'5f7fe91ee74f8',1),
(99,17564,25751,0,NULL,1,99,'5f7fee65c0f8b',1),
(100,17564,25750,0,NULL,1,101,'5f7ff1bca1333',1),
(101,17564,17564,0,NULL,1,102,'5f7ff213798ca',1),
(102,17564,17564,0,NULL,1,103,'5f7ff25d0a8c0',1),
(103,17564,17564,0,NULL,1,104,'5f7ff2856bc2b',1),
(104,17564,17564,0,NULL,1,105,'5f7ff2c15de33',1),
(105,17564,17564,0,NULL,1,106,'5f7ff6fd40350',1),
(106,17564,17564,0,NULL,1,107,'5f7ff7a71800b',1),
(107,17564,17564,0,NULL,1,108,'5f7ff9d62e203',1),
(108,17564,17564,0,NULL,1,109,'5f7ff9d62e203',1),
(109,17564,17564,0,NULL,1,110,'5f7ff9d62e203',1),
(110,25849,25752,0,NULL,0,113,'5f83e5bd1e6db',1),
(111,25849,25753,0,NULL,0,114,'5f83e5bd1e6db',1),
(112,25849,17564,0,NULL,0,115,'5f83e5bd1e6db',1),
(113,25849,25751,0,NULL,0,118,'5f83e6d357667',1),
(114,25849,25753,0,NULL,0,119,'5f83e6d357667',1),
(115,25849,25754,0,NULL,0,120,'5f83e6d357667',1),
(116,25849,25751,0,NULL,0,121,'5f83e6f29fc8d',1),
(117,25849,25753,0,NULL,0,122,'5f83e6f29fc8d',1),
(118,25849,25754,0,NULL,0,123,'5f83e6f29fc8d',1),
(119,25849,25751,0,NULL,0,125,'5f83e766aaa07',1),
(120,25849,25752,0,NULL,0,126,'5f83e766aaa07',1),
(121,25849,25754,0,NULL,0,127,'5f83e766aaa07',1),
(122,25849,25751,0,NULL,0,128,'5f83e795c0350',1),
(123,25849,25752,0,NULL,0,129,'5f83e795c0350',1),
(124,25849,25754,0,NULL,0,130,'5f83e795c0350',1),
(125,25849,17564,0,NULL,0,138,'5f83ec267632f',1),
(126,17564,25849,0,NULL,1,139,'5f8420055805a',1),
(127,17564,25849,0,NULL,1,140,'5f8420055805a',1),
(128,17564,25849,0,NULL,0,141,'5f842e81d20f8',1),
(129,17564,25849,0,NULL,1,142,'5f842e9647391',1),
(130,25849,1,1,1,1,143,'5f84342ed0390',1),
(131,25849,1,1,1,1,144,'5f84342ed0390',1),
(132,25849,1,1,1,1,145,'5f84342ed0390',1),
(133,25849,1,1,1,1,146,'5f84342ed0390',1),
(134,25849,1,1,1,1,147,'5f84342ed0390',1),
(135,25849,17564,0,NULL,1,148,'5f85180ae82af',1),
(136,25849,17564,0,NULL,1,149,'5f85180ae82af',1),
(137,25849,17564,0,NULL,1,150,'5f851bc04a1c5',1),
(138,25849,17564,0,NULL,1,151,'5f851bc04a1c5',1),
(139,25849,17564,0,NULL,1,152,'5f851bc04a1c5',1),
(140,25849,1,1,1,1,153,'5f851d8b2172a',1),
(141,25849,17564,0,NULL,1,154,'5f851e3b7cce2',1),
(142,25849,1,1,1,1,155,'5f851e541f47b',1),
(143,25849,6,1,6,1,156,'5f851e541f47b',1),
(144,25849,4,1,4,0,157,'5f851e67e4278',1),
(145,25849,25750,0,NULL,0,158,'5f851e9293c86',0),
(146,25849,25754,0,NULL,0,159,'5f851e9293c86',0),
(147,25849,17564,0,NULL,0,160,'5f851e9293c86',0),
(148,25849,0,0,NULL,0,161,'5f851ea2553f8',1),
(149,17564,17564,0,NULL,1,162,'5f85291eb72a7',1),
(150,17564,17564,0,NULL,1,163,'5f85291eb72a7',1),
(151,17564,17564,0,NULL,1,164,'5f85291eb72a7',1),
(152,17564,25751,0,NULL,1,165,'5f8575df88950',1),
(153,17564,25752,0,NULL,1,166,'5f8575df88950',1),
(154,17564,25754,0,NULL,1,167,'5f8575df88950',1),
(155,17564,25751,0,NULL,1,168,'5f8575df88950',1),
(156,17564,25752,0,NULL,1,169,'5f8575df88950',1),
(157,17564,25754,0,NULL,1,170,'5f8575df88950',1),
(158,17564,25751,0,NULL,1,171,'5f8575df88950',1),
(159,17564,25752,0,NULL,1,172,'5f8575df88950',1),
(160,17564,25754,0,NULL,1,173,'5f8575df88950',1),
(161,17564,6,1,6,1,174,'5f85768a904b6',1),
(162,17564,6,1,6,1,175,'5f85768a904b6',1),
(163,17564,6,1,6,1,176,'5f85768a904b6',1),
(164,17564,6,1,6,1,177,'5f85768a904b6',1),
(165,17564,6,1,6,1,178,'5f85768a904b6',1),
(166,17564,6,1,6,1,179,'5f85768a904b6',1),
(167,17564,6,1,6,1,180,'5f85768a904b6',1),
(168,17564,6,1,6,1,181,'5f85768a904b6',1),
(169,17564,6,1,6,1,182,'5f85768a904b6',1),
(170,17564,6,1,6,1,183,'5f85768a904b6',1),
(171,17564,6,1,6,1,184,'5f85768a904b6',1),
(172,17564,6,1,6,1,185,'5f85768a904b6',1),
(173,17564,6,1,6,1,186,'5f85768a904b6',1),
(174,17564,6,1,6,1,187,'5f85768a904b6',1),
(175,17564,6,1,6,1,188,'5f85768a904b6',1),
(176,17564,6,1,6,1,189,'5f85768a904b6',1),
(177,17564,6,1,6,1,190,'5f85768a904b6',1),
(178,17564,6,1,6,1,191,'5f85768a904b6',1),
(179,17564,6,1,6,1,192,'5f85768a904b6',1),
(180,17564,6,1,6,1,193,'5f85768a904b6',1),
(181,17564,17564,0,NULL,1,194,'5f8577efbaa5d',1),
(182,17564,17564,0,NULL,1,195,'5f8577efbaa5d',1),
(183,17564,17564,0,NULL,1,196,'5f8577efbaa5d',1),
(184,17564,17564,0,NULL,1,197,'5f8577efbaa5d',1),
(185,17564,17564,0,NULL,1,198,'5f8577efbaa5d',1),
(186,17564,17564,0,NULL,1,199,'5f8577efbaa5d',1),
(187,17564,17564,0,NULL,1,200,'5f85787195736',1),
(188,17564,17564,0,NULL,1,201,'5f85787195736',1),
(189,17564,17564,0,NULL,1,202,'5f85787195736',1),
(190,17564,17564,0,NULL,1,203,'5f85787195736',1),
(191,17564,17564,0,NULL,1,204,'5f85787195736',1),
(192,17564,17564,0,NULL,1,205,'5f85787195736',1),
(193,17564,17564,0,NULL,0,206,'5f857c4a7603c',1),
(194,17564,17564,0,NULL,0,207,'5f857c6d295b1',1),
(195,17564,17564,0,NULL,0,208,'5f857c809032b',1),
(196,17564,17564,0,NULL,0,209,'5f857cb68d8c2',1),
(197,17564,17564,0,NULL,0,210,'5f857d07d9f9d',1),
(198,17564,17564,0,NULL,0,211,'5f857e637d47f',1),
(199,17564,17564,0,NULL,0,212,'5f857e906a19f',1),
(200,17564,17564,0,NULL,0,213,'5f85812b765ac',1),
(201,17564,17564,0,NULL,1,214,'5f858244234b1',1),
(202,17564,17564,0,NULL,1,215,'5f858244234b1',1),
(203,17564,17564,0,NULL,1,216,'5f8582711e9ff',2),
(204,17564,17564,0,NULL,1,217,'5f8582711e9ff',2),
(205,17564,17564,0,NULL,1,218,'5f8582711e9ff',2),
(206,17564,17564,0,NULL,1,219,'5f8582e4386f2',1),
(207,17564,17564,0,NULL,1,220,'5f8582e4386f2',1),
(208,17564,17564,0,NULL,1,221,'5f85833104919',1),
(209,17564,17564,0,NULL,1,222,'5f85833104919',1),
(210,17564,17564,0,NULL,1,223,'5f85833104919',1),
(211,17564,17564,0,NULL,1,224,'5f858390d3f53',2),
(212,17564,17564,0,NULL,1,225,'5f858390d3f53',2),
(213,17564,0,0,NULL,1,226,'5f8594a368e58',1),
(214,17564,0,0,NULL,1,227,'5f8594a368e58',1),
(215,17564,0,0,NULL,1,228,'5f8594a368e58',1),
(216,17564,0,0,NULL,1,229,'5f8594a368e58',1),
(217,17564,0,0,NULL,1,230,'5f8594a368e58',1),
(218,17564,0,0,NULL,1,231,'5f8594a368e58',1),
(219,17564,0,0,NULL,1,232,'5f8594a368e58',1),
(220,17564,0,0,NULL,1,233,'5f8594a368e58',1),
(221,17564,0,0,NULL,1,234,'5f8594a368e58',1),
(222,17564,0,0,NULL,1,235,'5f8594a368e58',1),
(223,17564,0,0,NULL,1,236,'5f8594a368e58',1),
(224,17564,0,0,NULL,1,237,'5f8594a368e58',1),
(225,17564,0,0,NULL,1,238,'5f8594a368e58',1),
(226,17564,0,0,NULL,1,239,'5f8594a368e58',1),
(227,17564,0,0,NULL,1,240,'5f8594a368e58',1),
(228,17564,0,0,NULL,1,241,'5f8594a368e58',1),
(229,17564,0,0,NULL,1,242,'5f8594a368e58',1),
(230,17564,0,0,NULL,1,243,'5f8594a368e58',1),
(231,17564,0,0,NULL,1,244,'5f8594a368e58',1),
(232,17564,0,0,NULL,1,245,'5f8594a368e58',1),
(233,17564,0,0,NULL,1,246,'5f85955e645e5',1),
(234,17564,0,0,NULL,1,247,'5f85955e645e5',1),
(235,17564,0,0,NULL,1,248,'5f85955e645e5',1),
(236,17564,0,0,NULL,1,249,'5f85955e645e5',1),
(237,17564,0,0,NULL,1,250,'5f85955e645e5',1),
(238,17564,0,0,NULL,1,251,'5f85955e645e5',1),
(239,17564,0,0,NULL,1,252,'5f85955e645e5',1),
(240,17564,0,0,NULL,1,253,'5f85955e645e5',1),
(241,17564,0,0,NULL,1,254,'5f85955e645e5',1),
(242,17564,0,0,NULL,1,255,'5f85955e645e5',1),
(243,17564,0,0,NULL,1,256,'5f85955e645e5',1),
(244,17564,0,0,NULL,1,257,'5f85955e645e5',1),
(245,17564,0,0,NULL,1,258,'5f85955e645e5',1),
(246,17564,0,0,NULL,1,259,'5f85955e645e5',1),
(247,17564,0,0,NULL,1,260,'5f85955e645e5',1),
(248,17564,0,0,NULL,1,261,'5f85955e645e5',1),
(249,17564,0,0,NULL,1,262,'5f85955e645e5',1),
(250,17564,0,0,NULL,1,263,'5f85955e645e5',1),
(251,17564,0,0,NULL,1,264,'5f85955e645e5',1),
(252,17564,0,0,NULL,1,265,'5f85955e645e5',1),
(253,25849,17564,0,NULL,0,226,'5f87ea9e4ed62',1),
(254,25849,0,0,NULL,0,227,'5f87eb280d6a7',1),
(255,25849,17564,0,NULL,0,228,'5f87eb45781ec',0),
(256,25849,17564,0,NULL,1,229,'5f8910a47f5a1',0),
(257,25849,0,0,NULL,1,230,'5f8911048133a',0),
(258,25849,17564,0,NULL,1,13,'61ab7081c1474',1);

/*Table structure for table `remove` */

DROP TABLE IF EXISTS `remove`;

CREATE TABLE `remove` (
  `remove_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `document_id` varchar(100) DEFAULT NULL,
  KEY `remove_id` (`remove_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `remove` */

insert  into `remove`(`remove_id`,`uid`,`document_id`) values 
(1,26112,'5f8911048133a');

/*Table structure for table `saw` */

DROP TABLE IF EXISTS `saw`;

CREATE TABLE `saw` (
  `id_saw` int(11) NOT NULL AUTO_INCREMENT,
  `document_id` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `document_status` int(11) DEFAULT NULL,
  `unicaly` varchar(100) DEFAULT NULL,
  UNIQUE KEY `nicaly` (`unicaly`),
  KEY `id_saw` (`id_saw`)
) ENGINE=InnoDB AUTO_INCREMENT=291 DEFAULT CHARSET=utf8;

/*Data for the table `saw` */

insert  into `saw`(`id_saw`,`document_id`,`user_id`,`document_status`,`unicaly`) values 
(1,'5f7e9768dee66',25849,3,'258495f7e9768dee66'),
(2,'5f7e9768dee66',17564,3,'175645f7e9768dee66'),
(4,'5f7e97c4866a0',17564,3,'175645f7e97c4866a0'),
(6,'5f7e982f77ac4',17564,3,'175645f7e982f77ac4'),
(69,'5f7ecc7a8085e',25849,3,'258495f7ecc7a8085e'),
(70,'5f7ecc7a8085e',17564,3,'175645f7ecc7a8085e'),
(71,'5f7ed78e137f5',25849,3,'258495f7ed78e137f5'),
(78,'5f7ecc7a8075e',17564,3,'175645f7ecc7a8075e'),
(80,'5f7fdf3f7f795',17564,3,'175645f7fdf3f7f795'),
(81,'5f7fdf7620d5d',17564,3,'175645f7fdf7620d5d'),
(82,'5f7fdf9f643c5',17564,3,'175645f7fdf9f643c5'),
(84,'5f7fe4b49e51c',17564,3,'175645f7fe4b49e51c'),
(85,'5f7fe80fb9312',17564,3,'175645f7fe80fb9312'),
(87,'5f7fe57362541',17564,3,'175645f7fe57362541'),
(90,'5f7fe91ee74f8',17564,3,'175645f7fe91ee74f8'),
(91,'5f7fee65c0f8b',17564,3,'175645f7fee65c0f8b'),
(92,'5f7ff1bca1333',17564,3,'175645f7ff1bca1333'),
(93,'5f7ff7a71800b',17564,3,'175645f7ff7a71800b'),
(94,'5f7ff9d62e203',17564,3,'175645f7ff9d62e203'),
(97,'5f7ff213798ca',17564,3,'175645f7ff213798ca'),
(100,'5f7ff7a7180',17564,3,'175645f7ff7a7180'),
(101,'5f7ff6fd40350',17564,3,'175645f7ff6fd40350'),
(103,'5f7ff6fd403',17564,3,'175645f7ff6fd403'),
(106,'5f7ff6fd4035',17564,3,'175645f7ff6fd4035'),
(109,'5f7ff7a71800',17564,3,'175645f7ff7a71800'),
(113,'5f7ff7a71',17564,3,'175645f7ff7a71'),
(116,'5f7ff7a',17564,3,'175645f7ff7a'),
(118,'5f7e971310b95',17564,3,'175645f7e971310b95'),
(119,'5f7e97c4866a0',25849,3,'258495f7e97c4866a0'),
(120,'5f83e5bd1e6db',25849,3,'258495f83e5bd1e6db'),
(122,'5f83ec267632f',25849,3,'258495f83ec267632f'),
(123,'5f83e5bd1e6db',17564,3,'175645f83e5bd1e6db'),
(124,'5f83ec267632f',17564,3,'175645f83ec267632f'),
(129,'5f7ff2856bc2b',17564,3,'175645f7ff2856bc2b'),
(130,'5f7ff2856b',17564,3,'175645f7ff2856b'),
(131,'5f7ff2c15de33',17564,3,'175645f7ff2c15de33'),
(133,'5f7ff2c15d',17564,3,'175645f7ff2c15d'),
(135,'5f7ff7a7',17564,3,'175645f7ff7a7'),
(138,'5f7ff7a718',17564,3,'175645f7ff7a718'),
(156,'5f7fe4410e64a',17564,3,'175645f7fe4410e64a'),
(175,'5f8420055805a',17564,3,'175645f8420055805a'),
(176,'5f8420055805a',25849,3,'258495f8420055805a'),
(189,'5f7e971310b95',25849,3,'258495f7e971310b95'),
(196,'5f83e6f29fc8d',25849,3,'258495f83e6f29fc8d'),
(206,'5f83e795c0350',25849,3,'258495f83e795c0350'),
(212,'5f842e9647391',25849,3,'258495f842e9647391'),
(216,'5f84342ed0390',25849,3,'258495f84342ed0390'),
(220,'5f85180ae82af',25849,3,'258495f85180ae82af'),
(223,'5f842e81d20f8',25849,3,'258495f842e81d20f8'),
(224,'5f85180ae82af',17564,3,'175645f85180ae82af'),
(225,'5f84342ed0390',17564,3,'175645f84342ed0390'),
(226,'5f851d8b2172a',17564,3,'175645f851d8b2172a'),
(227,'5f851bc04a1c5',17564,3,'175645f851bc04a1c5'),
(228,'5f842e9647391',17564,3,'175645f842e9647391'),
(231,'5f851ea2553f8',17564,3,'175645f851ea2553f8'),
(232,'5f851e3b7cce2',17564,3,'175645f851e3b7cce2'),
(233,'5f85291eb72a7',17564,3,'175645f85291eb72a7'),
(241,'5f8575df88950',17564,3,'175645f8575df88950'),
(243,'5f85768a904b6',17564,3,'175645f85768a904b6'),
(247,'5f8577efbaa5d',17564,3,'175645f8577efbaa5d'),
(249,'5f85787195736',17564,3,'175645f85787195736'),
(251,'5f857c4a7603c',17564,3,'175645f857c4a7603c'),
(252,'5f857cb68d8c2',17564,3,'175645f857cb68d8c2'),
(253,'5f857d07d9f9d',17564,3,'175645f857d07d9f9d'),
(254,'5f857e637d47f',17564,3,'175645f857e637d47f'),
(255,'5f858244234b1',17564,3,'175645f858244234b1'),
(257,'5f8582711e9ff',17564,3,'175645f8582711e9ff'),
(259,'5f8582e4386f2',17564,3,'175645f8582e4386f2'),
(262,'5f85833104919',17564,3,'175645f85833104919'),
(264,'5f858390d3f53',17564,3,'175645f858390d3f53'),
(268,'5f8594a368e58',17564,3,'175645f8594a368e58'),
(270,'5f85955e645e5',17564,3,'175645f85955e645e5'),
(272,'5f851e67e4278',17564,3,'175645f851e67e4278'),
(275,'5f87ea9e4ed62',25849,3,'258495f87ea9e4ed62'),
(276,'5f8594a368e58',25849,3,'258495f8594a368e58'),
(277,'5f87eb45781ec',25849,3,'258495f87eb45781ec'),
(278,'5f8910a47f5a1',25849,3,'258495f8910a47f5a1'),
(279,'5f8911048133a',25849,3,'258495f8911048133a'),
(280,'5f851e541f47b',25849,3,'258495f851e541f47b'),
(281,'12',25849,2,'2584912'),
(284,'61ab7081c1474',25849,3,'2584961ab7081c1474');

/*Table structure for table `users_tmp` */

DROP TABLE IF EXISTS `users_tmp`;

CREATE TABLE `users_tmp` (
  `user_id` double DEFAULT NULL,
  `fio` varchar(255) DEFAULT NULL,
  `login` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `users_tmp` */

insert  into `users_tmp`(`user_id`,`fio`,`login`,`password`,`status`,`image`) values 
(25750,'Қамарова Маҳбуба Маҳмадраҷабовна','789','789',2,'img\\a3.jpg'),
(25751,'Юлдошов Юлдош Азимҷонович','987','987',2,'img\\a1.jpg'),
(25752,'Рауфҷонов Шарифҷон Давронҷонович',NULL,NULL,2,'img\\a2.jpg'),
(25753,'Бозорбоева Мукаддам Хамрокуловна',NULL,NULL,3,'img\\a5.jpg'),
(25754,'Ҳакимӣ Фирдавс Ғайратзода',NULL,NULL,3,'img\\a1.jpg'),
(25755,'Хоҷакалонов Амонуллоҳ Акпархӯҷаевич',NULL,NULL,3,'img\\a5.jpg'),
(25756,'Сабурзода Маҳмадсурури Маҳмадсабур',NULL,NULL,2,NULL),
(25757,'Фарзиддин Сарвар ',NULL,NULL,2,NULL),
(25758,'Тиллопур Шоҳруз Аводуллои',NULL,NULL,2,NULL),
(25759,'Бурҳонов Акмалҷон Аскарович',NULL,NULL,3,NULL),
(25760,'Махкамов Диловар Фарҳодҷонович',NULL,NULL,3,NULL),
(25761,'Бобоев Санҷар Набиҷонович',NULL,NULL,3,NULL),
(25762,'Шакиров Шамиль Александрович',NULL,NULL,2,NULL),
(25763,'Дадохоҷаев Сӯҳробхоҷа Рустамхоҷаевич',NULL,NULL,2,NULL),
(25764,'Файзиев Ноилҷон Умедҷонович',NULL,NULL,3,NULL),
(25765,'Назаров Аҳрорбек Бахтиёрович',NULL,NULL,3,NULL),
(25766,'Эшонқулова Мунира Ҳамидуллоевна',NULL,NULL,3,NULL),
(25767,'Хидиров Беҳруз Эргашевич',NULL,NULL,NULL,NULL),
(25768,'Холмуродов Абдумуталлиб Толибҷонович',NULL,NULL,NULL,NULL),
(25769,'Набиев Нурмуҳаммад Абдусамадович',NULL,NULL,NULL,NULL),
(25770,'Холматова Янишой Ғаниевна',NULL,NULL,NULL,NULL),
(25771,'Холиқов Диёрбек Зафарҷонович',NULL,NULL,NULL,NULL),
(25772,'Ортиқова Феруза Темуралиевна',NULL,NULL,NULL,NULL),
(25773,'Ҳамдамов Дилшодбек Комилҷонович',NULL,NULL,NULL,NULL),
(25774,'Ҳафизов Нуриддин Абдусаид Ӯғли',NULL,NULL,NULL,NULL),
(25775,'Авазов Исломҷон Музаффарович',NULL,NULL,NULL,NULL),
(25776,'Қодиров Ҳусейнхӯҷа Мирзоанварович',NULL,NULL,NULL,NULL),
(25777,'Самиева Сабрина Латифовна',NULL,NULL,NULL,NULL),
(25778,'Назарқулов Ҳусен Ойбекович',NULL,NULL,NULL,NULL),
(25779,'Исмонов Азамат Сӯҳробович',NULL,NULL,NULL,NULL),
(25780,'Ҷӯраев Ҷӯрабек Наимҷонович',NULL,NULL,NULL,NULL),
(25781,'Мирзоев Баҳодурхӯҷа Обидхоҷаевич',NULL,NULL,NULL,NULL),
(25782,'Ҷумазода Ҳаким Ҷумақул',NULL,NULL,NULL,NULL),
(25783,'Раҷабов Зарифҷон Зафарович',NULL,NULL,NULL,NULL),
(25784,'Аҳмадов Шодмон Қаҳрамонович',NULL,NULL,NULL,NULL),
(25785,'Аъзамов Ҳоҷиакбар Аъзамович',NULL,NULL,NULL,NULL),
(25786,'Ҷӯраев Асадбек Тулқинович',NULL,NULL,NULL,NULL),
(25787,'Қаршибоева Гулҳаё Равшанбековна',NULL,NULL,NULL,NULL),
(25788,'Сангинов Бахтиёр Илҳомович',NULL,NULL,NULL,NULL),
(25789,'Сафаров Муслиҳиддин Абдуғаниевич',NULL,NULL,NULL,NULL),
(25790,'Кенҷаев Фирӯз Фарҳодович',NULL,NULL,NULL,NULL),
(25791,'Сидиқов Билолхон Илҳомович',NULL,NULL,NULL,NULL),
(25792,'Шарипов Фарҳодҷон Абдунабиевич',NULL,NULL,NULL,NULL),
(25793,'Шодиев Бахтовар Қутбиддинович',NULL,NULL,NULL,NULL),
(25794,'Маҳмадназарзода Меҳроҷиддини Худойназар',NULL,NULL,NULL,NULL),
(25795,'Раҳмонов Муҳаммадҷон Мубинҷонович',NULL,NULL,NULL,NULL),
(25796,'Валиев Саидбек Набиҷонович',NULL,NULL,NULL,NULL),
(25797,'Шерназаров Илҳомҷон Абдухолиқович',NULL,NULL,NULL,NULL),
(25798,'Турдиев Ҳикматулло Боймуротович',NULL,NULL,NULL,NULL),
(25799,'Султонов Мираброр Мирҷамолович',NULL,NULL,NULL,NULL),
(25800,'Ҷавҳаров Асадбек Бахтиёрович',NULL,NULL,NULL,NULL),
(25801,'Қӯзиев Фаридун Ҳусенович',NULL,NULL,NULL,NULL),
(25802,'Қурбонов Носирҷон Каримназарович',NULL,NULL,NULL,NULL),
(25803,'Исмоилов Давлатшоҳ Ҳаётович',NULL,NULL,NULL,NULL),
(25804,'Каримҷонов Сардор Шавкатҷонович',NULL,NULL,NULL,NULL),
(25805,'Азимова Мадинаҷон Абдуқодировна',NULL,NULL,NULL,NULL),
(25806,'Муллоев Муносиб Мирзоевич',NULL,NULL,NULL,NULL),
(25807,'Аҳмадзода Шаҳром Ҳаким',NULL,NULL,NULL,NULL),
(25808,'Одиназода Баҳромҷон Амриддин',NULL,NULL,NULL,NULL),
(25809,'Шохоҷазода Муҳаммадалӣ Бобохоҷа',NULL,NULL,NULL,NULL),
(25810,'Хаккулов Шоҳруҳ Ҷамшидович',NULL,NULL,NULL,NULL),
(25811,'Рустамов Зафарҷон Юнусович',NULL,NULL,NULL,NULL),
(25812,'Окилов Мехрожиддин Орифжонович',NULL,NULL,NULL,NULL),
(25813,'Тождоров Шохрухкхан Зарифжонович',NULL,NULL,NULL,NULL),
(25814,'Мӯминов Алишерҷон Нозимҷонович',NULL,NULL,NULL,NULL),
(25815,'Толибов Умедҷон Султонқулович',NULL,NULL,NULL,NULL),
(25816,'Юсупалиев Далер Шухратҷонович',NULL,NULL,NULL,NULL),
(25817,'Кенҷаев Абдуғаффор Абдурауфович',NULL,NULL,NULL,NULL),
(25818,'Абдуқодирова Бимӯтабар Насимҷоновна',NULL,NULL,NULL,NULL),
(25819,'Алиматов Ҳусниддин Ҳасанбоевич',NULL,NULL,NULL,NULL),
(25820,'Ҷумаева Сарвиноз Юнусҷоновна',NULL,NULL,NULL,NULL),
(25821,'Мирзоева Зилола Бердиалиевна',NULL,NULL,NULL,NULL),
(25822,'Темуров Қосимҷон Қобилҷонович',NULL,NULL,NULL,NULL),
(25823,'Ҷамолов Сарафроз Мирзоҳакимович',NULL,NULL,NULL,NULL),
(25824,'Бобоҷонов Нурбек Омоналиевич',NULL,NULL,NULL,NULL),
(25825,'Додобоева Мафтуна Хомидҷоновна',NULL,NULL,NULL,NULL),
(25826,'Дадобоев Илҳомҷон Бахтиёрович',NULL,NULL,NULL,NULL),
(25827,'Ризоев Ҳамдуллоҳ Ҳабибуллоевич',NULL,NULL,NULL,NULL),
(25828,'Бегалиев Сунатулло Ҳусниддинович',NULL,NULL,NULL,NULL),
(25829,'Намозов Сарбоз Шавкатҷонович',NULL,NULL,NULL,NULL),
(25830,'Набиев Алишер Аҳрорович',NULL,NULL,NULL,NULL),
(25831,'Мамадҷонова Оиша Абдуғафоровна',NULL,NULL,NULL,NULL),
(25832,'Каримова Шарифахон Насимҷоновна',NULL,NULL,NULL,NULL),
(25833,'Холбутаева Машҳурахон Баховадиновна',NULL,NULL,NULL,NULL),
(25834,'Абдиева Сумая Абдураҳимовна',NULL,NULL,NULL,NULL),
(25835,'Қаландарова Биойша Иброҳимовна',NULL,NULL,NULL,NULL),
(25836,'Мухридинова Азиза Хусенҷоновна',NULL,NULL,NULL,NULL),
(25837,'Абдуллоева Дилноза Рахматҷоновна',NULL,NULL,NULL,NULL),
(25838,'Мамашокирова Шоҳона Алишеровна',NULL,NULL,NULL,NULL),
(25839,'Ҳошимова Нигинахон Давроновна',NULL,NULL,NULL,NULL),
(25840,'Худойбердиева Рухсора Дилшодовна',NULL,NULL,NULL,NULL),
(25841,'Ҷураева Адолат Турабековна',NULL,NULL,NULL,NULL),
(25842,'Ҳакимова Шаҳло Толибовна',NULL,NULL,NULL,NULL),
(25843,'Баротов Далер Зарифович',NULL,NULL,NULL,NULL),
(25844,'Раҳимӣ Суннатуллои ',NULL,NULL,NULL,NULL),
(25845,'Темуров Ботур Туйчибойевич',NULL,NULL,NULL,NULL),
(25846,'Абдураҳмонов Суҳроб Рустамович',NULL,NULL,NULL,NULL),
(25847,'Ҳазратқулов Раббони Шавкатович',NULL,NULL,NULL,NULL),
(25848,'Ғафорзода Довудшоҳ Шамсулло','321','321',3,NULL),
(25849,'Сулаймонов Фаридун Соҳибҷонович','123','caf1a3dfb505ffed0d024130f58c5cfa',2,'img\\a7.jpg'),
(17564,'Алибоев Рауф Толибович','st17564','202cb962ac59075b964b07152d234b70',1,'img\\a4.jpg'),
(0,'Барои ҳама',NULL,NULL,NULL,NULL);

/* Function  structure for function  `get_fio` */

/*!50003 DROP FUNCTION IF EXISTS `get_fio` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`%` FUNCTION `get_fio`(forward int) RETURNS varchar(50) CHARSET utf8
BEGIN
    declare fl_user varchar(50);
    set fl_user = (select fio from users_tmp  where user_id=forward);
    return fl_user;
    END */$$
DELIMITER ;

/* Function  structure for function  `get_groupname` */

/*!50003 DROP FUNCTION IF EXISTS `get_groupname` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`%` FUNCTION `get_groupname`(forward INT) RETURNS varchar(50) CHARSET utf8
BEGIN
    DECLARE name_group VARCHAR(50);
    SET name_group = (SELECT group_name FROM groups  WHERE group_id=forward);
    RETURN name_group;
    END */$$
DELIMITER ;

/* Function  structure for function  `ww` */

/*!50003 DROP FUNCTION IF EXISTS `ww` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`%` FUNCTION `ww`() RETURNS int(11)
BEGIN
return (1111);
    END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
