-- MySQL dump 10.13  Distrib 5.1.41, for Win32 (ia32)
--
-- Host: localhost    Database: myboard
-- ------------------------------------------------------
-- Server version	5.1.41-community-log

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
  `writer_id` char(20) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `content` text,
  `reg_date` int(10) unsigned NOT NULL,
  `visit_count` int(11) DEFAULT '0',
  PRIMARY KEY (`seq`)
) ENGINE=MyISAM AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `board`
--

LOCK TABLES `board` WRITE;
/*!40000 ALTER TABLE `board` DISABLE KEYS */;
INSERT INTO `board` VALUES (1,'ohhousun','오호호호','랄랄라',0,2),(2,'ohhousun','오효선은 이쁘다','오호호',0,1),(4,'admin','글쓰기 테스트','하나둘셋',0,3),(5,'admin','수정','ㄹㄶㅎ',0,16),(6,'admin','글수정 테스트','test',0,5),(14,'admin','adfaf','afdda',0,0),(15,'admin','adafads','adadf',0,0),(10,'admin','ㅂㅂㅂㅂ','',0,0),(11,'admin','ㄷㄷㄷㄷㄷㄷㄷ','',0,0),(12,'admin','ㄱㄱㄱㄱㄱㄱㄱㄱ','',0,0),(13,'admin','ㄹㄹㄹㄹㄹ','ㄹㄹㄹㄹㄹㄹㄹ',0,0),(17,'admin','ffffffffff','fffffffff',0,4),(18,'hyo','시간 테스트','ㅇㅇㅇㅇ',2012,1),(19,'hyo','시간테스트 2','ㅇㄴㅁㅇㄹ',2012,0),(20,'hyo','ㅇㅇㅇㅇㅇ','ㅇㅇㅇ',1326472880,3),(21,'hyo','ㅇㄴㄻㅇㄹ','ㅁㄹㅁㄴㄹ',1326473609,3),(22,'hyo','ㄹㄹㄹ','ㄹㄹ',1326477680,0),(23,'hyo','ㄹㄹ','ㄹㄹ',1326477684,0),(24,'hyo','ㄹㄹ','ㄹㄹ',1326477687,0),(25,'hyo','ㄹㄹ','ㄹㄹㄹ',1326477690,0),(26,'hyo','ㄹㄹ','ㄹㄹ',1326477693,0),(27,'hyo','ㄹㄹㄹ','ㄹㄹ',1326477696,1),(28,'hyo','ㄹㄹ','ㄹㄹ',1326477699,0),(29,'hyo','ㄹㄹ','ㄹㄹ',1326477701,0),(30,'hyo','ㄹㄹ','ㄹㄹ',1326477704,0),(31,'hyo','ㄹㄹ','ㄹㄹ',1326477707,0),(32,'hyo','ㄴㅇㄴ','ㄴㅇㄴㅇ',1326477710,0),(33,'hyo','ㅇㄴㅇ','ㅇㄴㅇㄴ',1326477713,0),(34,'hyo','ㄴㄴ','ㄴㄴ',1326477717,0),(35,'hyo','ㅇㅇ','ㅇㅇ',1326477719,1),(36,'hyo','ㅇㅇ','ㅇㅇ',1326477722,0),(37,'hyo','ㄴㄴ','ㄴㄴ',1326477727,0),(38,'hyo','ㄴㄴ','ㄴㄴ',1326477730,0),(39,'hyo','ㄴㄴ','ㄴㄴ',1326477733,0),(40,'hyo','ㄹㄹ','ㄹㄹ',1326477735,0),(41,'hyo','ㅇㅇ','ㅇㅇ',1326477738,0),(42,'hyo','ㅁㅁ','ㅁㅁ',1326477741,0),(43,'hyo','ㅁㅁ','ㅁㅁ',1326477743,0),(44,'hyo','ㅁㅁ','ㅁㅁ',1326477746,0),(45,'hyo','ㅁㅁ','ㅁㅁ',1326477748,0),(46,'hyo','ㅁㅇㄻㅇㄴㄻㅇㄹ','ㅇㅇ',1326477752,0),(47,'hyo','ㄹㄹ','ㄹㄹ',1326477755,0),(48,'hyo','ㅇㅇ','ㅇㅇ',1326477760,0),(49,'hyo','ㅇㅇ','ㅇㅇ',1326477763,0),(50,'hyo','ㅇㅇ','ㅇㅇ',1326477766,0),(51,'hyo','','ㅇㅇ',1326477770,0),(52,'hyo','ㄴ','ㄴ',1326477772,1),(53,'hyo','ㄴ','ㄴ',1326477775,0),(54,'hyo','ㄴㄴ','ㄴㄴ',1326477777,1),(55,'hyo','ㄴㄴ','ㄴㄴ',1326477783,2),(56,'hyo','ㄴ','ㄴ',1326477785,0),(57,'hyo','ㄴ','ㄴ',1326477788,0),(59,'hyo','ㄴㄴㄴ','ㄴ',1326477796,0),(60,'hyo','ㅁㅁ','ㅁㅁ',1326477798,1),(61,'hyo','ㅁㅇㄻㄹ','ㅁㅇㄹ',1326477802,22),(62,'hyo','asdfasdf','adfad\r\nsad\r\ndf\r\nafds\r\nafaafaf\r\ndfafafaadf\r\ndfafaaffa',1326487234,4);
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
  `tel_number` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member`
--

LOCK TABLES `member` WRITE;
/*!40000 ALTER TABLE `member` DISABLE KEYS */;
INSERT INTO `member` VALUES ('admin','1234','관리자','01041280000','ohho@hanmail.net'),('ohhousun','1234','뿡뿡이','12345678','adk@adsf'),('aaa','aa','aa','22','aaa'),('bbb','bbb','bbbb','22','aaa'),('hyo','1111','효선','01025864965','ohho@gamil.com'),('ccc','ccc','ccc','22','aaa');
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

-- Dump completed on 2012-01-14 13:14:46
