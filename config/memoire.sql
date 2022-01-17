-- MySQL dump 10.15  Distrib 10.0.34-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: _memoire
-- ------------------------------------------------------
-- Server version	10.0.34-MariaDB-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` smallint(10) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (2,'sdkdjkjqkj','jkjkdjksjk'),(3,'KJDKJDLKQ','Kldsjdkjdks'),(9,'SIALSA','Movie'),(10,'DOCTEUR','Charles');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `etudiant` (
  `id` smallint(10) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `niveau` smallint(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `niveau` (`niveau`),
  CONSTRAINT `etudiant_ibfk_1` FOREIGN KEY (`niveau`) REFERENCES `niveau` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `etudiant`
--

LOCK TABLES `etudiant` WRITE;
/*!40000 ALTER TABLE `etudiant` DISABLE KEYS */;
/*!40000 ALTER TABLE `etudiant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `module`
--

DROP TABLE IF EXISTS `module`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `module` (
  `id` smallint(10) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `professeur` smallint(10) NOT NULL DEFAULT '0',
  `niveau` smallint(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`niveau`,`professeur`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `nom` (`nom`),
  KEY `professeur` (`professeur`),
  CONSTRAINT `module_ibfk_1` FOREIGN KEY (`professeur`) REFERENCES `professeur` (`id`),
  CONSTRAINT `module_ibfk_2` FOREIGN KEY (`niveau`) REFERENCES `niveau` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `module`
--

LOCK TABLES `module` WRITE;
/*!40000 ALTER TABLE `module` DISABLE KEYS */;
INSERT INTO `module` VALUES (1,'Intelligence Artificielle',1,2);
/*!40000 ALTER TABLE `module` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `niveau`
--

DROP TABLE IF EXISTS `niveau`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `niveau` (
  `id` smallint(10) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nom` (`nom`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `niveau`
--

LOCK TABLES `niveau` WRITE;
/*!40000 ALTER TABLE `niveau` DISABLE KEYS */;
INSERT INTO `niveau` VALUES (1,'L2 Informatique'),(2,'L3 Informatique');
/*!40000 ALTER TABLE `niveau` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `professeur`
--

DROP TABLE IF EXISTS `professeur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `professeur` (
  `id` smallint(10) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `professeur`
--

LOCK TABLES `professeur` WRITE;
/*!40000 ALTER TABLE `professeur` DISABLE KEYS */;
INSERT INTO `professeur` VALUES (1,'zeze','lamar');
/*!40000 ALTER TABLE `professeur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `question` (
  `id` smallint(30) NOT NULL AUTO_INCREMENT,
  `contenu` text NOT NULL,
  `sondage` smallint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sondage` (`sondage`),
  CONSTRAINT `question_ibfk_1` FOREIGN KEY (`sondage`) REFERENCES `sondage` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question`
--

LOCK TABLES `question` WRITE;
/*!40000 ALTER TABLE `question` DISABLE KEYS */;
INSERT INTO `question` VALUES (4,'fsfsfsf',4),(5,'Quel est votre type de mange ou anime préféré ?',5),(6,'Achetez-vous des régulièrement des mangas ou des coffrets DVD d\'animés ?',5),(7,'Quel est votre type de mange ou anime préféré ?',6),(8,'Achetez-vous des régulièrement des mangas ou des coffrets DVD d\'animés ?',6),(9,'Préférez-vous des mangas en papier ou animés ?',6),(10,'Fréquentez-vous les mangas café ?',6),(11,'Le concept du manga café vous est-il familier ? Si oui, vous séduit-il ?',6),(12,'Pensez-vous que le marché du manga va continuer à se développer de plus en plus en France ?',6),(13,'Première question',7),(14,'Deuxième question',7),(15,'fdsdfsdfdsfs',8);
/*!40000 ALTER TABLE `question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reponse`
--

DROP TABLE IF EXISTS `reponse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reponse` (
  `id` smallint(40) NOT NULL AUTO_INCREMENT,
  `contenu` text NOT NULL,
  `type` enum('radio','checkbox','text','number','datetime','textarea') DEFAULT NULL,
  `question` smallint(30) DEFAULT NULL,
  `min` varchar(5) DEFAULT NULL,
  `max` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `question` (`question`),
  CONSTRAINT `reponse_ibfk_1` FOREIGN KEY (`question`) REFERENCES `question` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reponse`
--

LOCK TABLES `reponse` WRITE;
/*!40000 ALTER TABLE `reponse` DISABLE KEYS */;
INSERT INTO `reponse` VALUES (1,'fsdfsfd','radio',4,'',''),(2,'Votre réponse','text',5,'',''),(3,'Oui','radio',6,'',''),(4,'Non','radio',6,'',''),(5,'Si oui, combien et à quelle fréquence ?','text',6,'',''),(6,'Votre réponse','text',7,'',''),(7,'Oui','radio',8,'',''),(8,'Non','radio',8,'',''),(9,'Si oui, combien et à quelle fréquence ?','text',8,'',''),(10,'Papier','radio',9,'',''),(11,'Animés','radio',9,'',''),(12,'Souvent','radio',10,'',''),(13,'Jamais','radio',10,'',''),(14,'Autre','radio',10,'',''),(15,'oui','checkbox',11,'',''),(16,'Non','checkbox',11,'',''),(17,'Oui','checkbox',11,'',''),(18,'Non','checkbox',11,'',''),(19,'Oui','radio',12,'',''),(20,'Non','radio',12,'',''),(21,'Une première réponse','radio',13,'',''),(22,'Une deuxième réponse','radio',13,'',''),(23,'Une première question','checkbox',14,'',''),(24,'Une réponse numérique','number',14,'2','12'),(25,'fsfsfsdfsdf','radio',15,'','');
/*!40000 ALTER TABLE `reponse` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sondage`
--

DROP TABLE IF EXISTS `sondage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sondage` (
  `id` smallint(20) NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `date_creation` datetime DEFAULT CURRENT_TIMESTAMP,
  `module` smallint(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `module` (`module`),
  CONSTRAINT `sondage_ibfk_1` FOREIGN KEY (`module`) REFERENCES `module` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sondage`
--

LOCK TABLES `sondage` WRITE;
/*!40000 ALTER TABLE `sondage` DISABLE KEYS */;
INSERT INTO `sondage` VALUES (4,'Sondage du module IA','2018-05-29 02:53:11',1),(5,'Dans le cadre de notre projet en master, nous effectuons une enquête sur le manga, souhaitons recueillir vos impressions sur ce sujet.','2018-05-29 03:16:45',1),(6,'Dans le cadre de notre projet en master, nous effectuons une enquête sur le manga, souhaitons recueillir vos impressions sur ce sujet.','2018-05-29 03:19:10',1),(7,'Un sondage de test','2018-05-29 03:24:32',1),(8,'Un autre sondage d\'essai','2018-05-29 03:51:50',1);
/*!40000 ALTER TABLE `sondage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` smallint(10) NOT NULL,
  `type` enum('professeur','admin','etudiant') NOT NULL DEFAULT 'etudiant',
  `pseudo` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`,`type`),
  UNIQUE KEY `pseudo` (`pseudo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'professeur','__zezelamar','940c0f26fd5a30775bb1cbd1f6840398d39bb813'),(2,'admin','kdsjkdjskjd','46c8e8dfa3a61fd39d81bfd1a475e13b8dc37ab7'),(3,'admin','kjkjkjkjk','d2a4d1a7e5308eb33481c6595d7b03f376320b73'),(9,'admin','sialsamovie','ef4215d1c34e841439fde65c0f5b8231320bcde6'),(10,'admin','docteur_charles','cda6ac5737093c6f8e29ff7fdf7ce1a2f740dadc');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vote`
--

DROP TABLE IF EXISTS `vote`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vote` (
  `id` smallint(50) NOT NULL AUTO_INCREMENT,
  `etudiant` smallint(10) DEFAULT NULL,
  `sondage` smallint(20) DEFAULT NULL,
  `question` smallint(30) DEFAULT NULL,
  `reponse` smallint(40) DEFAULT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY `id` (`id`),
  KEY `etudiant` (`etudiant`),
  KEY `sondage` (`sondage`),
  KEY `question` (`question`),
  KEY `reponse` (`reponse`),
  CONSTRAINT `vote_ibfk_1` FOREIGN KEY (`etudiant`) REFERENCES `etudiant` (`id`),
  CONSTRAINT `vote_ibfk_2` FOREIGN KEY (`sondage`) REFERENCES `sondage` (`id`),
  CONSTRAINT `vote_ibfk_3` FOREIGN KEY (`question`) REFERENCES `question` (`id`),
  CONSTRAINT `vote_ibfk_4` FOREIGN KEY (`reponse`) REFERENCES `reponse` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vote`
--

LOCK TABLES `vote` WRITE;
/*!40000 ALTER TABLE `vote` DISABLE KEYS */;
/*!40000 ALTER TABLE `vote` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-29  4:21:42
