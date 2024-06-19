/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.4.32-MariaDB : Database - ignitethree
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ignitethree` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `ignitethree`;

/*Table structure for table `attendance` */

DROP TABLE IF EXISTS `attendance`;

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_id` int(11) DEFAULT NULL,
  `name` char(200) DEFAULT NULL,
  `reason` char(200) DEFAULT NULL,
  `attendance` enum('attend','absent') DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `attendance` */

insert  into `attendance`(`id`,`subject_id`,`name`,`reason`,`attendance`,`time`) values 
(1,NULL,'Muhammad Ali Dean Baskoro Ajie',NULL,'attend','2024-05-02 11:13:00'),
(2,NULL,'Musky Stinky Ani Wanky','Sick','absent','2024-05-02 11:30:00'),
(3,NULL,'Angelina Josiah Trelawny',NULL,'attend','2024-05-02 11:36:00'),
(4,NULL,'Efa Kyu Pinces',NULL,'attend','2024-05-02 16:26:00'),
(5,NULL,'Steven Nguyen Asu Bajingan','POOPY IN DA BATHROOOOMMM','absent','2024-05-02 16:28:00'),
(6,NULL,'Ko',NULL,'attend','2024-05-03 09:38:00'),
(7,NULL,'Angelina Josiah Trelawny','Sakit','absent','2024-05-03 09:39:00'),
(8,NULL,'Melia Cukura Mbut Fetra',NULL,'attend','2024-05-22 16:56:00'),
(9,NULL,'Melia Cukura Mbut Fetra','Sick','absent','2024-05-24 14:43:00'),
(18,13,'Muhammad Ali Dean Baskoro Ajie',NULL,'attend','2024-06-13 10:17:50'),
(19,1,'Amalee Phair',NULL,'attend','2024-06-13 11:26:05'),
(20,1,'Muhammad Ali Dean Baskoro Ajie',NULL,'attend','2024-06-13 16:29:56'),
(21,3,'Muhammad Ali Dean Baskoro Ajie',NULL,'attend','2024-06-14 14:36:42');

/*Table structure for table `faculties` */

DROP TABLE IF EXISTS `faculties`;

CREATE TABLE `faculties` (
  `faculty_id` int(11) NOT NULL AUTO_INCREMENT,
  `faculty_name` char(100) NOT NULL,
  PRIMARY KEY (`faculty_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `faculties` */

insert  into `faculties`(`faculty_id`,`faculty_name`) values 
(1,'University Of Whola'),
(2,'University Of The Stinks'),
(3,'University of Padang'),
(4,'Yale University'),
(5,'Massachusetts Institute of Technology'),
(6,'California Institute of Technology'),
(7,'Amikom University'),
(8,'University of Cambridge'),
(9,'National University of Yogyakarta'),
(10,'Columbia University'),
(11,'University Of Institute'),
(12,'University of Amuniman'),
(13,'Institute Of Le Université'),
(20,'University Of Gajah Mada'),
(24,'University Of Niga');

/*Table structure for table `mentors` */

DROP TABLE IF EXISTS `mentors`;

CREATE TABLE `mentors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nim` int(5) NOT NULL,
  `name` char(100) NOT NULL,
  `birth_date` date NOT NULL,
  `birth_place` char(100) NOT NULL,
  `subject_id` int(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `mentors` */

insert  into `mentors`(`id`,`nim`,`name`,`birth_date`,`birth_place`,`subject_id`) values 
(1,948025,'Sutrisno Bambang Yudhisyono','1984-06-12','Lagras, Yogyakarta',1),
(2,329706,'Lebaksiputra Petrus Wicaksono','1980-06-11','Saint Denis, Lampung',3),
(3,735093,'Mukhti Nur Jakasutra','1992-04-23','Rhodes, Solo',4),
(4,214097,'Jusmika Alputika Arya','1985-07-25','Valentine, Jakarta',6),
(5,892175,'Justice Kelo Pakmata Sari','1978-12-12','Blackwater, Bogor',9),
(6,531262,'Pomo Pirap Tirang Giga Nuganopso','1988-09-23','New Austin, Palembang',10),
(8,421880,'Musky Stinky Ani Wanky','1984-06-06','Morain, Pestaria',12),
(9,948325,'Joko Fitriana Mulya Padi','1983-01-12','Niger, Klak-Klok',13),
(10,532982,'Citra Muski Cupitasari','1980-11-28','Palembang, Indonesia',2),
(11,949823,'George Smith Palamino','1986-04-22','Kopyano, Philipine',14);

/*Table structure for table `prodi` */

DROP TABLE IF EXISTS `prodi`;

CREATE TABLE `prodi` (
  `prodi_id` int(11) NOT NULL AUTO_INCREMENT,
  `prodi` varchar(100) NOT NULL,
  PRIMARY KEY (`prodi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `prodi` */

insert  into `prodi`(`prodi_id`,`prodi`) values 
(1,'Biology'),
(2,'Computer Science'),
(3,'Psychology'),
(4,'Engineering'),
(5,'Business Administration'),
(6,'English Literature'),
(7,'History'),
(8,'Mathematics'),
(9,'Art History'),
(10,'Political Science'),
(11,'Sociology'),
(12,'Economics'),
(13,'Chemistry'),
(14,'Communications'),
(15,'Physics'),
(16,'Music'),
(17,'Philosophy'),
(18,'Environmental Science'),
(19,'Anthropology'),
(20,'Theater'),
(21,'Sex Time');

/*Table structure for table `stinky` */

DROP TABLE IF EXISTS `stinky`;

CREATE TABLE `stinky` (
  `faculty_id` int(11) NOT NULL AUTO_INCREMENT,
  `faculty_name` char(100) DEFAULT NULL,
  PRIMARY KEY (`faculty_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `stinky` */

/*Table structure for table `students` */

DROP TABLE IF EXISTS `students`;

CREATE TABLE `students` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `nim` int(5) DEFAULT NULL,
  `name` char(100) DEFAULT NULL,
  `birth_place` char(100) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `gender` enum('M','F') NOT NULL,
  `faculty_id` int(2) NOT NULL,
  `prodi_id` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=335 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `students` */

insert  into `students`(`id`,`nim`,`name`,`birth_place`,`birth_date`,`gender`,`faculty_id`,`prodi_id`) values 
(1,12489,'Misty Putri Kencani','Yogyakarta','2006-06-11','F',11,5),
(2,33856,'Muhammad Ali Dean Baskoro Ajie','Riau, Tembilahan','2005-08-20','M',13,16),
(3,43689,'Supri Bausaos Patriot','Solo','2003-07-18','M',3,11),
(104,29660,'Brigitta Lemonnier','Sudan','2004-12-11','M',3,8),
(106,9660,'Nickie McCumesky','Guinea','2003-12-11','M',13,2),
(107,2380,'Art Balshaw','China','2004-02-10','F',5,13),
(108,51454,'Benita Attersoll','Portugal','2000-12-20','M',1,7),
(110,1711,'Glenn McCrossan','Indonesia','2004-03-07','F',10,20),
(111,90085,'Minta Juleff','Brazil','2001-12-01','F',11,2),
(112,20498,'Cumslaude Jamal Patricia','Bronx, New York','2004-11-25','M',24,14),
(113,63225,'Bary Rosbottom','Indonesia','2002-05-19','F',8,7),
(114,14496,'Ynez Donalson','Japan','2002-05-16','M',12,13),
(115,30611,'Brigit Musk','Honduras','2002-05-01','F',6,4),
(116,6846,'Justine Vidgen','Portugal','2002-06-14','F',10,1),
(117,82075,'Claus Labbey','Poland','2003-04-04','M',13,18),
(118,6965,'Juana Belvin','Thailand','2002-04-10','M',7,14),
(119,98933,'Nikolai Cumming','Malaysia','2000-07-01','F',1,3),
(120,54667,'Sigfrid O\'Rodane','Canada','2004-06-29','M',7,1),
(121,63746,'Meade Loweth','Colombia','2002-05-24','F',10,13),
(122,39323,'Sharyl Ash','China','2000-02-24','M',12,9),
(123,2622,'Carmelle Pedder','United States','2005-01-15','F',8,11),
(124,44182,'Tedi Guillon','Cambodia','2000-07-01','M',1,10),
(125,46524,'Ricardo Curgenven','Brazil','2002-05-11','F',6,10),
(126,10927,'Lee Neumann','France','2003-09-27','M',2,8),
(127,23333,'Kip Cuel','China','2001-04-09','F',6,18),
(128,48567,'Carolyne Wanley','Peru','2000-08-10','F',3,10),
(129,28473,'Debera Murgatroyd','Philippines','2001-04-06','F',9,19),
(130,45789,'Morissa Sircomb','China','2003-03-22','M',8,2),
(131,9377,'Blinni Rapper','Indonesia','2001-11-09','F',10,5),
(132,5337,'Garth Spottswood','Poland','2003-07-02','M',2,19),
(133,83957,'Gerry Filliskirk','Philippines','2002-06-12','F',2,19),
(134,52195,'Shep Calam','China','2001-02-21','M',5,16),
(135,75752,'Ann-marie Jesty','United States','2003-01-16','M',1,14),
(136,21784,'Kally Bucksey','China','2002-12-16','F',5,16),
(137,71021,'Enid Giddons','Russia','2000-11-04','F',10,5),
(138,72999,'Rita O\'Driscoll','China','2000-05-05','M',13,7),
(139,50385,'Fran Doxsey','China','2002-11-16','M',7,16),
(140,9746,'Ruben Mibourne','Afghanistan','2003-03-23','M',4,20),
(141,21257,'Lauren Labern','Bulgaria','2004-09-04','M',1,9),
(143,1167,'Rhianon Credland','Peru','2001-02-09','M',11,19),
(144,1566,'Jone Wymer','Indonesia','2000-10-08','M',3,1),
(145,87111,'Amalee Phair','Belarus','2001-02-16','F',10,12),
(146,34723,'Martainn Rampage','China','2002-10-19','F',9,13),
(147,83247,'Jewelle Prestage','Indonesia','2002-03-18','M',1,5),
(148,6079,'Levi Myles','Vietnam','2003-06-06','F',2,19),
(149,55221,'Hyacinth Magarrell','Poland','2001-12-23','F',3,8),
(150,75067,'Derrik Coumbe','Indonesia','2002-06-11','M',2,10),
(151,65871,'Pren Bleckly','China','2000-02-24','F',13,10),
(152,49758,'Nerta Rabson','Indonesia','2004-07-11','M',7,3),
(153,57518,'Field Lowde','Russia','2001-04-01','F',13,13),
(154,96988,'Brod Doull','United States','2000-12-08','F',4,8),
(155,33382,'Stoddard Dearle','China','2002-06-11','F',13,17),
(156,32443,'Donia Gladdifh','Croatia','2002-04-30','M',4,20),
(157,51034,'Rozanne Leavy','Indonesia','2004-02-15','M',13,17),
(158,60924,'Bili Van Leijs','Philippines','2000-01-19','M',4,16),
(159,96198,'Laura Jeffcoat','China','2000-03-30','M',2,6),
(160,24660,'Manda Cleeve','Latvia','2000-01-16','F',1,7),
(161,56495,'Christoper Gunda','China','2001-07-06','M',6,6),
(162,88465,'Rebecca Shambrook','Indonesia','2000-07-09','M',2,16),
(163,13126,'Esther Kiddell','United States','2003-04-07','M',8,8),
(164,13475,'Dion Tiery','Portugal','2004-05-25','M',2,12),
(165,39671,'Stanwood Lithcow','Pakistan','2001-11-09','M',7,14),
(166,33357,'Wit Sired','China','2000-12-24','F',12,7),
(167,30729,'Napoleon Colling','Malaysia','2004-03-14','F',1,2),
(168,22524,'Cos Francey','Micronesia','2001-01-07','M',6,18),
(169,41466,'Mathian Aspinall','Indonesia','2001-10-31','M',3,4),
(170,15821,'Baird Dooly','Indonesia','2002-02-24','F',6,14),
(171,16553,'Amie Cordero','Portugal','2004-05-08','M',2,10),
(172,55499,'Ellie Warby','Indonesia','2002-03-22','M',2,1),
(173,76132,'Waylan Middis','Canada','2002-08-31','F',11,20),
(174,21251,'Phylys Andre','Japan','2000-05-04','M',6,6),
(175,30680,'Palmer Craigie','Philippines','2002-08-19','M',1,5),
(176,85722,'Parker Pidgen','China','2004-04-25','F',3,8),
(177,42641,'Orran Mews','China','2003-08-07','M',2,11),
(178,42781,'Orlando Attree','Portugal','2002-02-12','F',4,17),
(179,80469,'Fabien Lartice','Poland','2003-10-14','F',4,15),
(180,62105,'Rebe McClelland','Indonesia','2003-09-19','M',12,6),
(181,85153,'Avril Abbey','Sierra Leone','2001-12-13','F',10,20),
(182,84026,'Mateo Yardy','China','2003-12-14','M',9,3),
(183,61658,'Letizia Mountain','Libya','2000-07-31','F',11,12),
(184,98940,'Charlene Aitken','Japan','2000-09-04','M',8,3),
(186,41676,'Pandora Purdy','Vietnam','2000-09-03','M',11,14),
(187,74738,'Happy De Ruggero','Russia','2002-09-07','M',1,1),
(188,68541,'Marlee Falconer','Thailand','2003-11-27','F',1,2),
(189,87910,'Tommie Coolahan','United States','2002-05-09','M',5,9),
(190,79323,'Carlo Faloon','South Africa','2002-08-27','M',3,14),
(191,40647,'Gwenny Whitwham','China','2004-03-12','F',10,15),
(192,56520,'Val Checklin','Ukraine','2004-10-22','M',7,3),
(193,98252,'Hinda Moore','Russia','2004-01-06','M',5,2),
(194,74946,'Sheppard Agostini','China','2003-08-09','M',8,10),
(195,16939,'Rey Capstick','Poland','2000-01-04','F',10,8),
(196,14645,'Smith Buchanan','Honduras','2002-01-29','M',7,6),
(197,70777,'Tedi Parkins','Indonesia','2000-06-28','F',1,9),
(198,74163,'Andrey Bothwell','Uzbekistan','2002-11-25','F',13,8),
(199,71225,'Duffy Cartman','Indonesia','2003-02-14','M',2,8),
(200,67151,'Jenn Gilyatt','Indonesia','2000-07-05','F',8,16),
(201,84489,'Brett Pittet','Russia','2002-09-19','F',3,10),
(202,16480,'Helenelizabeth Tousey','Ukraine','2004-06-26','F',12,2),
(203,31442,'Cchaddie Bance','Poland','2001-12-23','F',10,11),
(215,82741,'Melia Cuk Urambut Fetra','Strawberry, Magelang','2004-06-24','F',5,6),
(216,39948,'Glorb Jigalorb Smorp Blorp','Mars','1192-12-02','M',4,9),
(323,53092,'Musti Pocrot Melor','Axthra, Mars','1755-01-31','F',6,14),
(324,42879,'Glarb Martian Mornarb','Astharax, Martian Galaxy','1666-12-02','M',4,7),
(329,98749,'Angelina Josiah Trelawny','Cest Paqtue, France','2005-06-16','F',10,15),
(330,14825,'Mustika Sukab Abimadu','Yogyakarta','2004-07-15','F',13,19),
(331,45982,'Jasmine Praud Ofyu','Jurugentong, Wonocatur','2002-06-19','M',6,3);

/*Table structure for table `subjects` */

DROP TABLE IF EXISTS `subjects`;

CREATE TABLE `subjects` (
  `subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `subjects` char(100) NOT NULL,
  `time` time NOT NULL,
  `day` enum('Monday','Tuesday','Wednesday','Thursday','Friday') NOT NULL,
  PRIMARY KEY (`subject_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `subjects` */

insert  into `subjects`(`subject_id`,`subjects`,`time`,`day`) values 
(1,'Mathematics','08:00:00','Monday'),
(2,'Economics','11:00:00','Monday'),
(3,'IT','14:00:00','Monday'),
(4,'Physics','17:00:00','Monday'),
(6,'Psychology','20:00:00','Monday'),
(9,'Chemistry','08:00:00','Tuesday'),
(10,'Sexology','12:00:00','Tuesday'),
(12,'Art','14:00:00','Tuesday'),
(13,'Science','16:00:00','Tuesday'),
(14,'Dinostrology','18:00:00','Tuesday');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `is_active` int(1) DEFAULT NULL,
  `day_created` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `user` */

/*Table structure for table `user_table` */

DROP TABLE IF EXISTS `user_table`;

CREATE TABLE `user_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `user_table` */

insert  into `user_table`(`id`,`role`) values 
(1,'Administrator'),
(2,'Member');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
