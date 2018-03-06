CREATE DATABASE  IF NOT EXISTS `medieval_battle` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `medieval_battle`;
-- MySQL dump 10.13  Distrib 5.7.17
--
-- Host: localhost    Database: medieval_battle
-- ------------------------------------------------------
-- Server version	5.7.20-log

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
-- Table structure for table `character_game`
--

DROP TABLE IF EXISTS `character_game`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `character_game` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `character_id` int(11) unsigned NOT NULL,
  `game_id` int(11) unsigned NOT NULL,
  `points` int(11) DEFAULT '0',
  `order` INT(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `IDX_Characters` (`character_id`),
  KEY `IDX_Games` (`game_id`),
  CONSTRAINT `FK_Characters` FOREIGN KEY (`character_id`) REFERENCES `characters` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Games` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Dumping data for table `character_game`
--

LOCK TABLES `character_game` WRITE;
/*!40000 ALTER TABLE `character_game` DISABLE KEYS */;
INSERT INTO `character_game` VALUES (1,1,1,0),(2,4,1,0),(3,3,20,0),(4,4,20,0),(5,4,21,22),(6,3,21,0),(7,4,22,17),(8,1,22,8),(9,2,23,15),(10,3,23,12),(11,5,24,83),(12,4,24,10);
/*!40000 ALTER TABLE `character_game` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `characters`
--

DROP TABLE IF EXISTS `characters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `characters` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(45) NOT NULL,
  `name` varchar(100) NOT NULL,
  `health` tinyint(4) NOT NULL,
  `power` tinyint(4) NOT NULL,
  `agility` tinyint(4) NOT NULL,
  `weapon_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_Weapon` (`weapon_id`),
  CONSTRAINT `FK_Weapon` FOREIGN KEY (`weapon_id`) REFERENCES `weapons` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `characters`
--

LOCK TABLES `characters` WRITE;
/*!40000 ALTER TABLE `characters` DISABLE KEYS */;
INSERT INTO `characters` VALUES (1,'human','Hitss',12,1,2,1),(2,'orc','Bug Orc',20,2,0,2),(3,'developer','Bernardo',10,2,2,1),(4,'valquíria','Isabel',20,3,3,2),(5,'Ogro','Samuel',50,100,70,2);
/*!40000 ALTER TABLE `characters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `games`
--

DROP TABLE IF EXISTS `games`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `games` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `games`
--

LOCK TABLES `games` WRITE;
/*!40000 ALTER TABLE `games` DISABLE KEYS */;
INSERT INTO `games` VALUES (1,'1ª guerra mundial','2017-12-31 15:35:17'),(2,'2ª Guerra Mundial','2017-12-31 15:35:17'),(17,'','2017-12-31 16:06:33'),(18,'','2017-12-31 16:07:28'),(19,'','2017-12-31 16:07:37'),(20,'','2017-12-31 16:08:52'),(21,'Modal','2017-12-31 16:11:17'),(22,'Teste 2','2017-12-31 19:15:40'),(23,'Teste 1','2017-12-31 20:03:48'),(24,'Irmãos','2017-12-31 20:39:27');
/*!40000 ALTER TABLE `games` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `weapons`
--

DROP TABLE IF EXISTS `weapons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `weapons` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(45) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `attack` tinyint(4) NOT NULL,
  `defense` tinyint(4) NOT NULL,
  `damage` tinyint(4) NOT NULL,
  `damage_amount` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `weapons`
--

LOCK TABLES `weapons` WRITE;
/*!40000 ALTER TABLE `weapons` DISABLE KEYS */;
INSERT INTO `weapons` VALUES (1,'Longsword','Montante',2,1,1,6),(2,'Wood mace','Clava de madeira',1,0,1,8),(5,'Magual','Estrela da manhã',6,2,1,8),(6,'Nunchaku','Duplo uso',3,2,1,8);
/*!40000 ALTER TABLE `weapons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'medieval_battle'
--

--
-- Dumping routines for database 'medieval_battle'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-12-31 21:00:20
