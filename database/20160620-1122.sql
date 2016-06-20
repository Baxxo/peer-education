-- MySQL dump 10.16  Distrib 10.1.13-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: peer
-- ------------------------------------------------------
-- Server version	10.1.13-MariaDB

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
-- Table structure for table `corso`
--

DROP TABLE IF EXISTS `corso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `corso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idTutor` int(11) NOT NULL,
  `scuola` int(11) NOT NULL,
  `idMateria` int(11) NOT NULL,
  `giorno` varchar(45) NOT NULL,
  `ora` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `corso`
--

LOCK TABLES `corso` WRITE;
/*!40000 ALTER TABLE `corso` DISABLE KEYS */;
INSERT INTO `corso` VALUES (1,1,1,1,'MartedÃ¬','14:00:00'),(2,1,1,1,'MartedÃ¬','14:30:00'),(3,2,2,5,'LunedÃ¬','13:45:00'),(4,2,1,9,'VenerdÃ¬','16:30:00'),(5,3,1,14,'LunedÃ¬','05:59:00'),(6,2,1,3,'MartedÃ¬','15:30:00'),(7,3,2,4,'MartedÃ¬','15:30:00'),(10,1,1,3,'LunedÃ¬<br>MartedÃ¬<br>','15:00<br>13:45<br>'),(11,1,1,7,'MartedÃ¬<br>MercoledÃ¬<br>','14:30<br>13:45<br>'),(12,1,1,3,'LunedÃ¬<br>MartedÃ¬<br>VenerdÃ¬<br>','13:30<br>14:00<br>13:42<br>'),(13,1,1,1,'LunedÃ¬<br>MartedÃ¬<br>','14:00<br>13:45<br>'),(14,1,1,16,'LunedÃ¬<br>','15:00<br>'),(15,1,3,1,'LunedÃ¬<br>','16:00<br>'),(16,6,3,2,'LunedÃ¬<br>','16:00<br>');
/*!40000 ALTER TABLE `corso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `iscrizioni`
--

DROP TABLE IF EXISTS `iscrizioni`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `iscrizioni` (
  `idCorso` int(11) NOT NULL,
  `idStudente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `iscrizioni`
--

LOCK TABLES `iscrizioni` WRITE;
/*!40000 ALTER TABLE `iscrizioni` DISABLE KEYS */;
INSERT INTO `iscrizioni` VALUES (4,2),(3,1),(6,1),(5,1),(4,6);
/*!40000 ALTER TABLE `iscrizioni` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lezione`
--

DROP TABLE IF EXISTS `lezione`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lezione` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idCorso` int(11) NOT NULL,
  `data` date NOT NULL,
  `Argomento` varchar(75) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lezione`
--

LOCK TABLES `lezione` WRITE;
/*!40000 ALTER TABLE `lezione` DISABLE KEYS */;
/*!40000 ALTER TABLE `lezione` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materie`
--

DROP TABLE IF EXISTS `materie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `materie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `materia` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materie`
--

LOCK TABLES `materie` WRITE;
/*!40000 ALTER TABLE `materie` DISABLE KEYS */;
INSERT INTO `materie` VALUES (1,'Matematica'),(2,'Storia'),(3,'Informatica'),(4,'Inglese'),(5,'Italiano'),(6,'TPS'),(7,'Sistemi'),(8,'Ed. Fisica'),(9,'Geografia'),(10,'Francese'),(11,'Tedesco'),(12,'Spagnolo'),(13,'Telecomunicazioni'),(14,'Fisica'),(15,'Chimica'),(16,'Scienze'),(17,'Diritto'),(18,'Economia');
/*!40000 ALTER TABLE `materie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `presenze`
--

DROP TABLE IF EXISTS `presenze`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `presenze` (
  `idLezione` int(11) NOT NULL,
  `idStudente` int(11) NOT NULL,
  `presente` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `presenze`
--

LOCK TABLES `presenze` WRITE;
/*!40000 ALTER TABLE `presenze` DISABLE KEYS */;
/*!40000 ALTER TABLE `presenze` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `scuole`
--

DROP TABLE IF EXISTS `scuole`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `scuole` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `scuole`
--

LOCK TABLES `scuole` WRITE;
/*!40000 ALTER TABLE `scuole` DISABLE KEYS */;
INSERT INTO `scuole` VALUES (1,'Einaudi'),(2,'Scarpa'),(3,'Liceo Levi');
/*!40000 ALTER TABLE `scuole` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utente`
--

DROP TABLE IF EXISTS `utente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `utente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `cognome` varchar(30) NOT NULL,
  `classe` varchar(10) NOT NULL,
  `scuola` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `nascita` date NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utente`
--

LOCK TABLES `utente` WRITE;
/*!40000 ALTER TABLE `utente` DISABLE KEYS */;
INSERT INTO `utente` VALUES (1,'Oleksandr','Demian','4B Inf',0,'oleksandrovsky@gmail.com','3423118025','1995-03-17','password'),(2,'fabio','biscaro','nessuna',0,'fabio.biscaro@gmail.com','3471474457','1974-05-04','fabio'),(3,'allah','popo','6^fre',0,'allahcdcd@arabia.com','66666666666666','0001-12-25','jesucristo'),(4,'Matteo','Basso','4b inf',0,'matteobasso9@gmail.com','34206','1998-09-06','Ciaone'),(5,'Qualcuno','Ciaone','4b inf',1,'ciaone','4564','2016-06-09','ciao'),(6,'Stracane Ciao','Bovis','4oÃ²pja',3,'acaso@chiociola.com','12321','2029-06-15','asdawdawd');
/*!40000 ALTER TABLE `utente` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-06-20 11:22:16
