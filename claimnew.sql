-- MySQL dump 10.13  Distrib 5.5.46, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: claim
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
-- Table structure for table `grup`
--

DROP TABLE IF EXISTS `grup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grup` (
  `id_grup` int(4) NOT NULL AUTO_INCREMENT,
  `id_menu` int(4) DEFAULT NULL,
  `level` int(4) DEFAULT NULL,
  PRIMARY KEY (`id_grup`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grup`
--

LOCK TABLES `grup` WRITE;
/*!40000 ALTER TABLE `grup` DISABLE KEYS */;
INSERT INTO `grup` VALUES (1,1,1),(6,2,1),(7,22,1),(8,22,2),(9,21,1);
/*!40000 ALTER TABLE `grup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoice` (
  `id_invoice` int(4) NOT NULL AUTO_INCREMENT,
  `no_invoice` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `tanggal_invoice` datetime DEFAULT NULL,
  `bandara` char(3) DEFAULT NULL,
  `bulan` char(7) DEFAULT NULL,
  `tanggal_rekon` char(15) DEFAULT NULL,
  `rekon_no` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `rekon_data` varchar(400) DEFAULT NULL,
  `tanggal_invoice_diterima` datetime DEFAULT NULL,
  `pengirim` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `penerima` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `informasi_invoice` varchar(500) DEFAULT NULL,
  `jumlah` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `ppn` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `total` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `kelengkapan_data` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `tanggal_dibayar` char(15) DEFAULT NULL,
  `bank` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `keterangan` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `pdf_files` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id_invoice`)
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoice`
--

LOCK TABLES `invoice` WRITE;
/*!40000 ALTER TABLE `invoice` DISABLE KEYS */;
INSERT INTO `invoice` VALUES (53,'MCO-026/VI/2016','2016-06-01 00:00:00','KNO','Nov2015','','','336.707','2016-06-02 00:00:00','Rusdi','Irfan','Produksi Nov 2015','603011627.3','60301162.73','663312789.73','Lengkap','10 Okt 2016','Mandiri','','pdffiles/MCO-026.pdf'),(54,'MCO-026/VI/2016','2016-06-01 00:00:00','KNO','Dec2015','','','392.436','2016-06-02 00:00:00','Rusdi','Irfan','Produksi Des 2015','702817200','70281720','773098920','Lengkap','10 Okt 2016','Mandiri','','pdffiles/MCO-026.pdf'),(55,'MCO-026/VI/2016','2016-06-01 00:00:00','KNO','Jan2016','','','427.424','2016-06-02 00:00:00','Rusdi','Irfan','Produksi Jan 2016','765477527.3','76547752.73','842025279.73','Lengkap','10 Okt 2016','Mandiri','','pdffiles/MCO-026.pdf'),(56,'MCO-033/VII/2016','2016-07-11 00:00:00','KNO','Feb2016','','','362.299','2016-07-15 00:00:00','Rusdi','Hendha','Produksi Feb 2016','648844572.7','64884457.27000001','713729029.27','Lengkap','18 Okt 2016','Mandiri','','pdffiles/MCO-033.pdf'),(57,'MCO-033/VII/2016','2016-07-11 00:00:00','KNO','Mar2016','','','389.797','2016-07-15 00:00:00','Rusdi','Hendha','Produksi Mar 2016','698090990.9','69809099.09','767900089.09','Lengkap','18 Okt 2016','Mandiri','','pdffiles/MCO-033.pdf'),(58,'MCO-033/VII/2016','2016-07-11 00:00:00','KNO','Apr2016','','','372.917','2016-07-15 00:00:00','Rusdi','Hendha','Produksi Apr 2016','667860445.5','66786044.550000004','734646489.55','Lengkap','19 Okt 2016','Mandiri','','pdffiles/MCO-033.pdf'),(59,'MCO-039/VIII/2016','2016-08-08 00:00:00','KNO','May2016','','','401.008','2016-08-10 00:00:00','Hasan','Vivie','Produksi Mei 2016','718168872.7','71816887.27000001','789985759.27','Lengkap','19 Okt 2016','Mandiri','','pdffiles/MCO-039.pdf'),(60,'MCO-043/VIII/2016','2016-08-08 00:00:00','BDO','Feb2016','','','142.772','2016-08-10 00:00:00','Hasan','Vivie','Produksi Feb 2016','189886760','18988676','208875436','Belum ada FP','24 Okt 2016','Maybank','','pdffiles/MCO-043.pdf'),(61,'MCO-043/VIII/2016','2016-08-08 00:00:00','BDO','Mar2016','','','140.915','2016-08-10 00:00:00','Hasan','Vivie','Produksi Mar 2016','187416950','18741695','206158645','Belum ada FP','24 Okt 2016','Maybank','','pdffiles/MCO-043.pdf'),(62,'MCO-043/VIII/2016','2016-08-08 00:00:00','BDO','Apr2016','','','146.962','2016-08-10 00:00:00','Hasan','Vivie','Produksi Apr 2016','195459460','19545946','215005406','Belum ada FP','24 Okt 2016','Maybank','','pdffiles/MCO-043.pdf'),(63,'MCO-034/VII/2016','2016-07-11 00:00:00','PKU','Apr2016','','','133.289','2016-07-15 00:00:00','Rusdi','Hendha','Produksi Apr 2016','177274370','17727437','195001807','Lengkap','26 Sep 2016','Maybank','','pdffiles/MCO-034.pdf'),(64,'MCO-040/VIII/2016','2016-08-08 00:00:00','PKU','May2016','','','148.446','2016-08-10 00:00:00','Hasan','Vivie','Produksi Mei 2016','197433180','19743318','217176498','Lengkap','18 Okt 2016','Maybank','','pdffiles/MCO-040.pdf'),(65,'MCO-036/VII/2016','2016-07-11 00:00:00','PLM','Apr2016','','','161.174','2016-07-15 00:00:00','Rusdi','Hendha','Produksi Apr 2016','214361420','21436142','235797562','Lengkap','18 Okt 2016','Maybank','','pdffiles/MCO-036.pdf'),(66,'MCO-037/VII/2016','2016-07-18 00:00:00','PDG','Feb2016','','','127.742','2016-07-21 00:00:00','Rusdi','Dyah Puji','Produksi Feb 2016','169896860','16989686','186886546','Lengkap','24 Okt 2016','Maybank','','pdffiles/MCO-037.pdf'),(67,'MCO-037/VII/2016','2016-07-18 00:00:00','PDG','Mar2016','','','133.388','2016-07-21 00:00:00','Rusdi','Dyah Puji','Produksi Mar 2016','177406040','17740604','195146644','Belum ada FP','24 Okt 2016','Maybank','','pdffiles/MCO-037.pdf'),(68,'MCO-037/VII/2016','2016-07-18 00:00:00','PDG','Apr2016','','','127.463','2016-07-21 00:00:00','Rusdi','Dyah Puji','Produksi Apr 2016','169525790','16952579','186478369','Belum ada FP','24 Okt 2016','Maybank','','pdffiles/MCO-037.pdf'),(69,'MCO-035/VII/2016','2016-07-11 00:00:00','PNK','Apr2016','','','126.752','2016-07-15 00:00:00','Rusdi','Hendha','Produksi Apr 2016','168580160','16858016','185438176','Belum ada FP','26 Sep 2016','Maybank','','pdffiles/MCO-035.pdf'),(70,'MCO-041/VIII/2016','2016-08-08 00:00:00','PNK','May2016','','','137.313','2016-08-10 00:00:00','Hasan','Vivie','Produksi Mei 2016','182626290','18262629','200888919','Lengkap','18 Okt 2016','Maybank','','pdffiles/MCO-041.pdf'),(71,'MCO-030/VI/2016','2016-06-01 00:00:00','CRS','Jan2016','','','Jan - Apr 2016','2016-06-02 00:00:00','Rusdi','Irfan','Railink Jan - Apr 2016','97792064','9779206.4','107571270.4','Lengkap','Belum Bayar','Mandiri','','pdffiles/MCO-030.pdf'),(72,'MCO-045/IX/2016','2016-09-14 00:00:00','KNO','Jun2016','','','356.538','2016-09-14 00:00:00','Hasan','Rida Istiani','Prod Jun 2016','638527145','63852714.5','702379859.5','belum ada FP','Belum Bayar','Mandiri','','pdffiles/MCO-045.pdf'),(73,'MCO-046/IX/2016','2016-09-14 00:00:00','PKU','Jun2016','','','135.368','2016-09-14 00:00:00','Hasan','Rida Istiani','Prod Jun 2016','180039440','18003944','198043384','belum ada FP','Belum Bayar','Maybank','','pdffiles/MCO-046.pdf'),(74,'MCO-047/IX/2016','2016-09-14 00:00:00','DJB','Jun2016','','','63.351','2016-09-14 00:00:00','Hasan','Rida Istiani','Prod Jun 2016','84256830','8425683','92682513','belum ada FP','Belum Bayar','Maybank','','pdffiles/MCO-047.pdf'),(75,'MCO-047/IX/2016','2016-09-14 00:00:00','DJB','Jul2016','','','90.454','2016-09-14 00:00:00','Hasan','Rida Istiani','Prod Jul 2016','120303820','12030382','132334202','belum ada FP','Belum Bayar','Maybank','','pdffiles/MCO-047.pdf'),(76,'MCO-049/X/2016','2016-10-04 00:00:00','KNO','Jul2016','2016-08-15','15.01/05/08/2016/478','Domestik 387867, inter 81475, jumlah 469342','2016-10-07 00:00:00','Rusdi','Selvina','Prod Juli 2016','840548855','84054885.5','924603740.5','Belum ada FP','Belum Bayar','Mandiri','','pdffiles/MCO-049.pdf'),(77,'MCO-050/X/2016','2016-10-04 00:00:00','PKU','Jul2016','2016-09-15','  /APS-APII/ICT/IX/2','180316','2016-10-07 00:00:00','Rusdi','Selvina','Prod Juli 2016','239820280','23982028','263802308','Belum ada FP','Belum Bayar','Maybank','','pdffiles/MCO-050.pdf'),(78,'MCO-051/X/2016','2016-10-04 00:00:00','BDO','May2016','2016-09-14','BAC.15.01.01/08/09/2','170411','2016-10-07 00:00:00','Rusdi','Selvina','Prod Mei 2016','226646630','22664663','249311293','Belum ada FP','Belum Bayar','Maybank','','pdffiles/MCO-051.pdf'),(79,'MCO-051/X/2016','2016-10-04 00:00:00','BDO','Jun2016','2016-09-14','BAC.15.01.01/08/09/2','144626','2016-10-07 00:00:00','Rusdi','Selvina','Prod Juni 2016','192352580','19235258','211587838','Belum ada FP','Belum Bayar','Maybank','','pdffiles/MCO-051.pdf'),(80,'MCO-051/X/2016','2016-10-04 00:00:00','BDO','Jul2016','2016-09-14','BAC.15.01.01/08/09/2','178748','2016-10-07 00:00:00','Rusdi','Selvina','Prod Juli 2016','237734840','23773484','261508324','Belum ada FP','Belum Bayar','Maybank','','pdffiles/MCO-051.pdf'),(81,'MCO-052/X/2016','2016-10-04 00:00:00','PNK','Jun2016','2016-09-13','  /APS-APII/ICT/IX/2','130684','2016-10-07 00:00:00','Rusdi','Selvina','Prod Juni 2016','173809720','17380972','191190692','Belum ada FP','Belum Bayar','Maybank','','pdffiles/MCO-052.pdf'),(82,'MCO-052/X/2016','2016-10-04 00:00:00','PNK','Jul2016','2016-09-13','  /APS-APII/ICT/IX/2','151381','2016-10-07 00:00:00','Rusdi','Selvina','Prod Juli 2016','201336730','20133673','221470403','Belum ada FP','Belum Bayar','Maybank','','pdffiles/MCO-052.pdf'),(83,'MCO-053/X/2016','2016-10-04 00:00:00','PDG','May2016','2016-05-31','BAC.15.01/03/05/2016','155787','2016-10-07 00:00:00','Rusdi','Selvina','Prod Mei 2016','207196710','20719671','227916381','Belum ada FP','Belum Bayar','Maybank','','pdffiles/MCO-053.pdf'),(84,'MCO-053/X/2016','2016-10-04 00:00:00','PDG','Jun2016','2016-06-30','BAC.15.01/03/06/2016','104679','2016-10-07 00:00:00','Rusdi','Selvina','Prod Juni 2016','139223070','13922307','153145377','Belum ada FP','Belum Bayar','Maybank','','pdffiles/MCO-053.pdf'),(85,'MCO-053/X/2016','2016-10-04 00:00:00','PDG','Jul2016','2016-07-29','BAC.15.01/03/07/2016','195059','2016-10-07 00:00:00','Rusdi','Selvina','Prod Juli 2016','259428470','25942847','285371317','Belum ada FP','Belum Bayar','Maybank','','pdffiles/MCO-053.pdf'),(86,'MCO-053/IX/2015','2015-09-01 00:00:00','CRS','Jun2015','','','Jun - Aug','2015-09-04 00:00:00','Rusdi','...','Railink Jun-Aug 2015','73344048','7334404.800000001','80678452.8','Lengkap','Belum Bayar','Mandiri','','pdffiles/MCO-053.pdf'),(87,'MCO-054/X/2015','2016-10-12 00:00:00','CRS','May2016','','','Mei - Aug 2016','2016-10-13 00:00:00','Hasan','Budy Setyawan','Railink Mei-Aug 2016','122240080','12224008','134464088','Belum ada FP','Belum Bayar','Mandiri','','pdffiles/MCO-054.pdf'),(88,'MCO-057/XI/2016','2016-11-01 00:00:00','KNO','Aug2016','2016-09-06','15.01/05/09/2016/543','Domestik 330.428, Inter 66.595','2016-11-02 00:00:00','Hasan','Inna Hakim','Produksi Agustus 2016','711032100','71103210','782135310','Belum ada FP','Belum Bayar','Mandiri','','pdffiles/MCO-057.pdf'),(89,'MCO-057/XI/2016','2016-11-01 00:00:00','KNO','Sep2016','2016-10-10','15.01/05/10/2016/604','Domestik 301.735, Inter 67.582','2016-11-02 00:00:00','Hasan','Inna Hakim','Produksi September 2016','661413173','66141317.300000004','727554490.3','Belum ada FP','Belum Bayar','Mandiri','','pdffiles/MCO-057.pdf'),(90,'MCO-058/XI/2016','2016-11-01 00:00:00','PKU','Aug2016','2016-09-15','  /APS-APII/ICT/IX/2','141.614','2016-11-02 00:00:00','Hasan','Inna Hakim','Produksi Agustus 2016','188346620','18834662','207181282','Belum ada FP','Belum Bayar','Maybank','','pdffiles/MCO-058.pdf'),(91,'MCO-058/XI/2016','2016-11-01 00:00:00','PKU','Sep2016','2016-10-17','  /APS-APII/ICT/X/20','135.802','2016-11-02 00:00:00','Hasan','Inna Hakim','Produksi September 2016','180616660','18061666','198678326','Belum ada FP','Belum Bayar','Maybank','','pdffiles/MCO-058.pdf'),(92,'MCO-059/XI/2016','2016-11-01 00:00:00','BDO','Aug2016','2016-09-14','BAC.15.01.01/08/09/2','157.545','2016-11-02 00:00:00','Hasan','Inna Hakim','Produksi Agustus 2016','209534850','20953485','230488335','Belum ada FP','Belum Bayar','Maybank','','pdffiles/MCO-059.pdf'),(93,'MCO-060/XI/2016','2016-11-01 00:00:00','PNK','Aug2016','2016-09-13','  /APS-APII/ICT/IX/2','136.675','2016-11-02 00:00:00','Hasan','Inna Hakim','Produksi Agustus 2016','181777750','18177775','199955525','Belum ada FP','Belum Bayar','Maybank','','pdffiles/MCO-060.pdf'),(94,'MCO-061/XI/2016','2016-11-01 00:00:00','PDG','Aug2016','2016-08-31','BAC.15.01/03/08/2016','162.302','2016-11-02 00:00:00','Hasan','Inna Hakim','Produksi Agustus 2016','215861660','21586166','237447826','Belum ada FP','Belum Bayar','Maybank','','pdffiles/MCO-061.pdf'),(95,'MCO-062/XI/2016','2016-11-01 00:00:00','PLM','May2016','2016-10-10','  /APS-APII/ICT/IX/2','196.523','2016-11-02 00:00:00','Hasan','Inna Hakim','Produksi Mei 2016','261375590','26137559','287513149','Belum ada FP','Belum Bayar','Maybank','','pdffiles/MCO-062.pdf'),(96,'MCO-062/XI/2016','2016-11-01 00:00:00','PLM','Jun2016','2016-10-10','  /APS-APII/ICT/IX/2','143.989','2016-11-02 00:00:00','Hasan','Inna Hakim','Produksi Juni 2016','191505370','19150537','210655907','Belum ada FP','Belum Bayar','Maybank','','pdffiles/MCO-062.pdf'),(97,'MCO-062/XI/2016','2016-11-01 00:00:00','PLM','Jul2016','2016-10-10','  /APS-APII/ICT/IX/2','221.720','2016-11-02 00:00:00','Hasan','Inna Hakim','Produksi Juli 2016','294887600','29488760','324376360','Belum ada FP','Belum Bayar','Maybank','','pdffiles/MCO-062.pdf');
/*!40000 ALTER TABLE `invoice` ENABLE KEYS */;
UNLOCK TABLES;

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
  `id_menu` int(4) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES ('Manage Menu','manage-menu.php',0,1),('Manage Users','users.php',0,2),('Manage Grup','grup.php',0,21),('Invoice','invoice.php',0,22);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

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
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','invoadmin','the admin',1),(6,'P.Uli','puli','Pak Uli',2),(7,'P.Riza','priza','Pak Riza',2),(8,'P.Darto','pdarto','Pak Sudarto',2),(9,'APS','apsaja','Angkasa Pura Solusi',2),(10,'defri','defri','defri',2);
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

-- Dump completed on 2016-11-29 21:30:01
