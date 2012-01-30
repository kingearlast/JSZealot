-- MySQL dump 10.13  Distrib 5.1.41, for Win32 (ia32)
--
-- Host: localhost    Database: myboard
-- ------------------------------------------------------
-- Server version	5.1.41-community

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `board`
--

DROP TABLE IF EXISTS `board`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `board` (
  `seq` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` char(20) DEFAULT NULL,
  `writer_id` char(20) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `content` text,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `visit_count` int(11) DEFAULT '0',
  PRIMARY KEY (`seq`),
  KEY `fk_member_id` (`writer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=74 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `board`
--

LOCK TABLES `board` WRITE;
/*!40000 ALTER TABLE `board` DISABLE KEYS */;
INSERT INTO `board` VALUES (60,NULL,'kingear','테스트1','내용물 입니다','2012-01-14 03:33:38',0),(61,NULL,'kingear','테스트2','안녕하세요','2012-01-14 03:33:59',0),(62,NULL,'kingear','테스트3','안녕하세요3','2012-01-14 03:34:06',0),(63,NULL,'kingear','테스트4','안녕하세요4','2012-01-14 03:34:15',0),(64,NULL,'hdm','테스트5','안녕못한데요???','2012-01-14 03:34:43',0),(65,NULL,'hdm','테스트6','안녕못한데요???','2012-01-14 03:34:55',0),(66,NULL,'hdm','테스트6','아는척 하지 마세요','2012-01-14 03:35:05',1),(67,NULL,'hdm','테스트6','아는척 하지 마세요','2012-01-14 03:35:11',0),(68,NULL,'hdm','테스트6','엘오엘 하지마라..','2012-01-14 03:35:23',0),(69,NULL,'kingear','테스트6','축하해 주세요 만렙달성 엘오엘 !!','2012-01-14 03:35:56',0),(70,NULL,'kingear','테스트6','축하해 주세요 만렙달성 엘오엘 !!','2012-01-14 03:35:57',0),(71,NULL,'kingear','테스트11','축하해 주세요 만렙달성 엘오엘 !!','2012-01-14 03:36:09',0),(72,NULL,'hdm','안녕하세요','황대민입니다.','2012-01-14 03:39:47',1),(73,NULL,'zeus','Ajax 쓰고 싶다 ','A\nAjax 쓰고 싶다.. ㅠㅠ 아 ...\nAjax 쓰고 싶다.. ㅠㅠ 아 ...\njax 쓰고 싶다.. ㅠㅠ 아 ...','2012-01-14 03:45:05',1);
/*!40000 ALTER TABLE `board` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `member` (
  `id` char(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `social_number` char(13) NOT NULL,
  `name` varchar(20) NOT NULL,
  `tel_number` varchar(20) NOT NULL,
  `email_id` varchar(20) NOT NULL,
  `email_domain` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member`
--

LOCK TABLES `member` WRITE;
/*!40000 ALTER TABLE `member` DISABLE KEYS */;
INSERT INTO `member` VALUES ('kingear','kingear','8310151032214','김양귀','01099746337','kingear','gmail.com'),('hdm','hdm','8410151032214','황대민','01099746337','s20307','naver.com'),('test1','test1','test1','test1','test1','test1','test1'),('황대민1','황대민1','8410151032214','황대민','01022223333','test2','test2'),('홍길동','홍길동','8410151032214','홍길동','01088887777','test3','test3'),('zeus','zeus','8970701010332','제우스','01055555555','god','hanmail.net');
/*!40000 ALTER TABLE `member` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-01-14 12:46:58
