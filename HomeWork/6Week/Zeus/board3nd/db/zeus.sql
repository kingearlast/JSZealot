-- MySQL dump 10.13  Distrib 5.1.41, for Win32 (ia32)
--
-- Host: localhost    Database: myhomepage
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
  `title` varchar(255) NOT NULL,
  `content` text,
  `writer_id` varchar(50) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `read_count` int(11) DEFAULT '0',
  PRIMARY KEY (`seq`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `board`
--

LOCK TABLES `board` WRITE;
/*!40000 ALTER TABLE `board` DISABLE KEYS */;
INSERT INTO `board` VALUES (25,'22222','22222222222222','admin','EnterKey','2012-02-11 02:01:25',0),(24,'11111','111111111111111','admin','EnterKey','2012-02-11 02:01:23',0),(21,' 1231','123','1','1','2012-01-13 15:27:31',3),(22,' ','1','a','1','2012-02-10 11:24:39',0),(23,'a','a','admin','EnterKey','2012-02-11 02:01:19',0),(26,'3333','33333333333333','admin','EnterKey','2012-02-11 02:01:28',0),(27,'44444444','444444444444','admin','EnterKey','2012-02-11 02:01:31',0),(28,'555555555','555555555555555','admin','EnterKey','2012-02-11 02:01:35',0),(29,'66666666666666666666666','66666666666666666','admin','EnterKey','2012-02-11 02:01:39',0),(30,'123123','12313','admin','EnterKey','2012-02-11 02:01:42',0),(31,'aaaaaaa','aaaaaaaaaaaaaaaa','admin','EnterKey','2012-02-11 02:01:46',0),(32,'bbbbbbbbb','bbbbbbbbbbbbbbbb','admin','EnterKey','2012-02-11 02:01:50',0),(33,'asdfasdf','asdfasdf','admin','EnterKey','2012-02-11 02:01:58',0),(34,'11111111111','111111111111111','admin','EnterKey','2012-02-11 02:02:02',0),(35,'222222222222222','22222222222222222','admin','EnterKey','2012-02-11 02:02:07',0),(36,'3333333333333','3333333333333333','admin','EnterKey','2012-02-11 02:02:12',0),(37,'44444444444444444444','44444444444444444','admin','EnterKey','2012-02-11 02:02:16',0),(38,'123123123','123123123','admin','EnterKey','2012-02-11 02:26:45',0),(39,'12312313123123','123123123123','admin','EnterKey','2012-02-11 02:26:59',0),(40,'ë˜ëŠ”ê²¨ ë§ˆëŠ”ê²¨;;;','ì˜¤ë¥˜ì©”;','admin','EnterKey','2012-02-11 02:29:47',0),(41,'ë­”ê°€ ì•ˆëœë‹¼ã…‹;;','ã… ã… ã… ','admin','EnterKey','2012-02-11 02:30:02',0),(42,'ë­”ê°€ ì•ˆë¨;;','ã…ã…ã…ã…','admin','EnterKey','2012-02-11 02:30:17',0),(43,'ã… ã… ','ã… ','admin','EnterKey','2012-02-11 02:30:24',0),(44,'í›„.. íŽ˜ì´ì§•ì•ˆìŠµ','ã…ã…ã…','admin','EnterKey','2012-02-11 02:32:16',0),(45,'ã…ã…','ã…ã…','admin','EnterKey','2012-02-11 02:32:21',0),(46,'ã…ã…ã…ã…ã…ã…ã…ã…ã…ã…ã…ã…ã…ã…ã…ã…ã…ã…ã…','ã…ã…ã…ã…ã…ã…ã…ã…ã…ã…ã…ã…ã…ã…ã…ã…ã…ã…ã…ã…','admin','EnterKey','2012-02-11 02:33:36',0),(47,'ã„´ã„´ã„´','ã„´ã„´ã„´ã„´ã„´ã„´ã„´ã„´ã„´ã„´ã„´ã„´ã„´ã„´','admin','EnterKey','2012-02-11 02:33:40',0),(48,'ã… ã… ã… ã… ã… ','ã… ã… ã… ã… ã… ã… ã… ã… ã… ã… ã… ã… ã… ã… ã… ','admin','EnterKey','2012-02-11 02:33:45',0),(49,'ì™œ ì•ˆë˜ë‹ ã… ã… ','ã… ã… ã… ','admin','EnterKey','2012-02-11 02:33:51',0),(50,'ã…‹ã…‹','ã…‹ã…‹ã…‹ã…‹ã…‹ã…‹ã…‹ã…‹ã…‹ã…‹ã…‹ã…‹ã…‹ã…‹ã…‹','admin','EnterKey','2012-02-11 02:33:54',0),(51,'ë¯¸ì³ê°€ê³ ìžˆìŒ','ã…‹ã…‹ã…‹ã…‹ã…‹ã…‹ã…‹ã…‹ã…‹ã…‹ã…‹ã…‹','admin','EnterKey','2012-02-11 02:34:03',0),(52,'ã„´','ã„´ã„´ã„´ã„´ã„´ã„´ã„´ã„´ã„´ã„´ã„´ã„´ã„´ã„´','admin','EnterKey','2012-02-11 02:34:06',0);
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
  `name` varchar(20) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `visit_count` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member`
--

LOCK TABLES `member` WRITE;
/*!40000 ALTER TABLE `member` DISABLE KEYS */;
INSERT INTO `member` VALUES ('admin','123','EnterKey','iizeusii@naver.com',15),('hi','1','1','1',1),('1','1','1','1',2),('a','a','1','',0),('asd','123','123','123',6);
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

-- Dump completed on 2012-02-11 11:45:43
