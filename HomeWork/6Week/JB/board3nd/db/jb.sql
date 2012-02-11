-- MySQL dump 10.13  Distrib 5.1.41, for Win32 (ia32)
--
-- Host: localhost    Database: jb
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
  `visitCount` int(11) DEFAULT '0',
  `writeId` char(20) DEFAULT NULL,
  `categoryId` char(20) DEFAULT NULL,
  `writeDay` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`seq`),
  KEY `writeId` (`writeId`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `board`
--

LOCK TABLES `board` WRITE;
/*!40000 ALTER TABLE `board` DISABLE KEYS */;
INSERT INTO `board` VALUES (1,'adf','asdf',0,'123','123','2012-02-10 04:40:32'),(2,'123','123',0,'123','123','2012-02-10 04:42:58'),(3,'123','123',0,'123','123','2012-02-10 04:59:41'),(4,'123','44',0,'123','123','2012-02-10 05:00:51'),(5,'123','4444',0,'123','123','2012-02-10 05:01:21'),(6,'aaa','aaa',0,'123','123','2012-02-10 05:01:32'),(7,'ì œë°œ..','ì•„íž˜ë“¤ë‹¤',0,'9713','9713','2012-02-10 05:09:25'),(8,'','',0,'9713','9713','2012-02-10 05:12:33'),(9,'','',0,'9713','9713','2012-02-10 05:12:44'),(10,'','',0,'9713','9713','2012-02-10 05:12:47'),(11,'','',0,'9713','9713','2012-02-10 05:13:39'),(12,'','',0,'9713','9713','2012-02-10 05:15:08'),(13,'','',0,'9713','9713','2012-02-10 05:25:23'),(14,'','',0,'9713','9713','2012-02-10 05:32:44'),(15,'','',0,'9713','9713','2012-02-10 15:14:10'),(17,'123','444444',0,'9713','9713','2012-02-10 15:55:16');
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
  `password` char(20) NOT NULL,
  `name` char(20) NOT NULL,
  `nickName` char(20) NOT NULL,
  `email` char(30) NOT NULL,
  `phone` char(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member`
--

LOCK TABLES `member` WRITE;
/*!40000 ALTER TABLE `member` DISABLE KEYS */;
INSERT INTO `member` VALUES ('admin','123','ÇÑÁ¾ºó','stompesi','stompesi@gmail.com','01041920787'),('','741','','741','741','741'),('abcd','1234','í•œì¢…ë¹ˆ','stompesi','star.gg@hanmail.net','01041920787'),('1234','1234','1234','1234','1234@naver.com','01012341234'),('456','456','456','456','456@naver.com','01012341234'),('789','789','789','789','789@naver.com','01041920787'),('stompesi','123412','í•œì¢…ë¹ˆ','stompesi','star.gg@hanmail.net','01090830715'),('9713','1','a','1','1','1'),('9715','9713','a','9713','9713@naver.com','01097139713'),('741','123','741','123','123','123'),('12345','12345','12345','12345','12345@naver.com','01041920787'),('123','123','156','123','1232@naver.com','01041920787'),('1','123','1','123','123','123');
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

-- Dump completed on 2012-02-11  3:43:24
