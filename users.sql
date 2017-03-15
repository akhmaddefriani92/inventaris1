-- MySQL dump 10.13  Distrib 5.5.46, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: inventaris1
-- ------------------------------------------------------
-- Server version	5.5.46-0+deb7u1-log

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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id_user` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `level` int(4) DEFAULT NULL,
  `id_kota` int(4) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin','the admin',1,20),(10,'defri','defri','defri',2,8),(13,'mcodjb','mcodjb','MCO DJB',2,4),(14,'mcohlp','mcohlp','MCO HLP',2,5),(15,'mcot3u','mcot3u','MCO T3U',2,6),(16,'mcoplm','mcoplm','MCO PLM',2,2),(17,'mcopnk','mcopnk','MCO PNK',2,15),(18,'mcopdg','mcopdg','MCO PDG',2,1),(19,'mcopku','mcopku','MCO PKU',2,16),(20,'mcokno','mcokno','MCO KNO',2,3),(21,'mcobdo','mcobdo','MCO BDO',2,17),(22,'mcopgk','mcopgk','MCO PGK',2,21),(23,'indra','indrara','indra',1,20),(24,'Hendra','hendra','Hendra',2,1),(25,'Chandra','chandra','Chandra Gunawan',2,2),(27,'Dedi','dedi','Dedi Sumartanto',2,15),(28,'Yudi','yudi','Yudi',2,3),(29,'Herdy','hedri','Herdy',2,17),(30,'Hafid','hafid','Hafid Sutisna',2,4),(31,'Denart','denart','Denart',2,21),(32,'achmad','achmad','achmad',2,16);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-03-01 16:26:24
