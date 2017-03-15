-- MySQL dump 10.13  Distrib 5.5.46, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: helpday1
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
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu` (
  `navi_menu` varchar(20) NOT NULL,
  `navi_link` varchar(100) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `no` int(3) DEFAULT NULL,
  `menu` varchar(30) NOT NULL,
  `id_menu` int(4) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES ('BANK','bank.php',0,10,'MANAGE TO LINK',1),('BOOKDETAIL','bookdetail.php',0,0,'FITUR',2),('CEK PDF & TKTNO','cekpdf.php',0,14,'MANAGE TO LINK',3),('DORONG PNR PDF','pnrpdf.php',0,13,'MANAGE TO LINK',4),('PEMBANDING FARE','index2.php',0,7,'FITUR',5),('GROUP','grup.php',0,5,'MANAGE ADMIN',6),('MANAGE ROUTE','managecity.php',0,8,'MANAGE ADMIN',7),('MANAGE SERVER','server.php',0,3,'MANAGE ADMIN',8),('NAMA GROUP','namagrup.php',0,6,'MANAGE ADMIN',9),('PNRCODE','pnr.php',0,2,'FITUR',10),('STOP PNR SJMES','stoppnr.php',0,12,'MANAGE TO LINK',11),('UPDATE FARE','http://10.10.10.77/frbaru/cekrute.php',0,9,'MANAGE TO LINK',12),('UPDATE TKTNO','tktno.php',0,11,'MANAGE TO LINK',13),('USERS','user.php',0,4,'MANAGE ADMIN',14),('MANAGE MENU','manage-menu.php',0,15,'MANAGE ADMIN',15),('FARE JT','farejt.php',0,9,'FITUR',16),('PSC VAYA','surchargesvaya.php',0,9,'FITUR',17),('JADWAL API','jadwalApi.php',0,16,'FITUR',18),('PSC','surcharges.php',0,9,'FITUR',19),('KIOS','kios.php',0,17,'FITUR',20);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-08-22 14:21:10
