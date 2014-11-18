-- MySQL dump 10.13  Distrib 5.5.40, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: MiniProject
-- ------------------------------------------------------
-- Server version	5.5.40-0ubuntu0.14.04.1

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
-- Table structure for table `BkingDetail`
--

DROP TABLE IF EXISTS `BkingDetail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `BkingDetail` (
  `Uname` varchar(20) NOT NULL DEFAULT '',
  `Rname` varchar(20) NOT NULL DEFAULT '',
  `Status` varchar(20) NOT NULL DEFAULT '',
  `fdate` date NOT NULL DEFAULT '0000-00-00',
  `tdate` date NOT NULL,
  PRIMARY KEY (`Uname`,`Rname`,`Status`,`fdate`),
  KEY `Rname` (`Rname`),
  CONSTRAINT `BkingDetail_ibfk_1` FOREIGN KEY (`Uname`) REFERENCES `User` (`Uname`),
  CONSTRAINT `BkingDetail_ibfk_2` FOREIGN KEY (`Rname`) REFERENCES `Room` (`Rname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `BkingDetail`
--

LOCK TABLES `BkingDetail` WRITE;
/*!40000 ALTER TABLE `BkingDetail` DISABLE KEYS */;
/*!40000 ALTER TABLE `BkingDetail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Room`
--

DROP TABLE IF EXISTS `Room`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Room` (
  `Rname` varchar(20) NOT NULL,
  `Rtype` varchar(20) DEFAULT NULL,
  `Rcapacity` int(11) DEFAULT NULL,
  `Rdetails` varchar(100) DEFAULT NULL,
  `Rprice` float DEFAULT NULL,
  PRIMARY KEY (`Rname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Room`
--

LOCK TABLES `Room` WRITE;
/*!40000 ALTER TABLE `Room` DISABLE KEYS */;
INSERT INTO `Room` VALUES ('203','Lecture Hall',50,'Good',1000),('204','Lecture Hall',50,'Good',1000),('217','Lecture Hall',150,'Room is fitted with LCD display, proper sound system',2000),('Basketball Court','Ground',0,'',2000),('Computer Lab','Lab',50,'',2000),('Mechanical Workshop','Lab',50,'',2000),('MP Hall','Drama Stage',0,'',2000);
/*!40000 ALTER TABLE `Room` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `User`
--

DROP TABLE IF EXISTS `User`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `User` (
  `Uname` varchar(20) NOT NULL,
  `Fname` varchar(20) DEFAULT NULL,
  `Lname` varchar(20) DEFAULT NULL,
  `Org` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Co_num` bigint(10) NOT NULL,
  `Password` varchar(20) NOT NULL,
  PRIMARY KEY (`Uname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User`
--

LOCK TABLES `User` WRITE;
/*!40000 ALTER TABLE `User` DISABLE KEYS */;
INSERT INTO `User` VALUES ('root','','','','mradul.master@gmail.com',0,'root'),('swap','Swapnil','Sharma','IITMandi','mradul.master@gmail.com',9816936034,'user');
/*!40000 ALTER TABLE `User` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-11-18 15:43:23
