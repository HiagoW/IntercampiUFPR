-- MySQL dump 10.17  Distrib 10.3.15-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: intercampiufpr
-- ------------------------------------------------------
-- Server version	10.3.15-MariaDB

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
-- Current Database: `intercampiufpr`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `intercampiufpr` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;

USE `intercampiufpr`;

--
-- Table structure for table `campuses`
--

DROP TABLE IF EXISTS `campuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `campuses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nomeCampus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sigla` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campuses`
--

LOCK TABLES `campuses` WRITE;
/*!40000 ALTER TABLE `campuses` DISABLE KEYS */;
INSERT INTO `campuses` VALUES (1,'Agrárias','agrarias','2019-05-30 23:52:37','2019-05-31 20:21:50'),(2,'Botânico','botanico','2019-05-31 20:07:41','2019-05-31 20:22:00'),(3,'Comunicação','comunicacao','2019-05-31 20:22:20','2019-05-31 20:22:20'),(4,'DeArtes','artes','2019-05-31 20:22:28','2019-05-31 20:22:28'),(5,'Politécnico','poli','2019-05-31 20:22:35','2019-05-31 20:22:35'),(6,'Prae','prae','2019-05-31 20:22:42','2019-05-31 20:22:42'),(7,'Rebouças','reboucas','2019-05-31 20:22:49','2019-05-31 20:22:49'),(8,'Rebouças-Cassol','reboucas-c','2019-05-31 20:23:04','2019-05-31 20:23:04'),(9,'Rebouças-JN','reboucas-jn','2019-05-31 20:23:13','2019-05-31 20:23:13'),(10,'Reitoria','reitoria','2019-05-31 20:23:20','2019-05-31 20:23:20'),(11,'SEPT','sept','2019-05-31 20:23:25','2019-05-31 20:23:25');
/*!40000 ALTER TABLE `campuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `horarios`
--

DROP TABLE IF EXISTS `horarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `horarios` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `horario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chegada` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linha` bigint(20) unsigned NOT NULL,
  `campus` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `horarios_horario_linha_unique` (`horario`,`linha`),
  KEY `horarios_linha_foreign` (`linha`),
  KEY `horarios_campus_foreign` (`campus`),
  CONSTRAINT `horarios_campus_foreign` FOREIGN KEY (`campus`) REFERENCES `campuses` (`id`),
  CONSTRAINT `horarios_linha_foreign` FOREIGN KEY (`linha`) REFERENCES `linhas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horarios`
--

LOCK TABLES `horarios` WRITE;
/*!40000 ALTER TABLE `horarios` DISABLE KEYS */;
INSERT INTO `horarios` VALUES (4,'06:45',NULL,1,1,'2019-05-31 20:24:08','2019-05-31 20:24:08'),(5,'06:50',NULL,1,10,'2019-05-31 20:24:20','2019-05-31 20:24:20'),(6,'06:55',NULL,1,3,'2019-05-31 20:24:38','2019-05-31 20:24:38'),(7,'07:10',NULL,1,1,'2019-05-31 20:24:45','2019-05-31 20:24:45'),(8,'07:20',NULL,1,2,'2019-05-31 20:24:53','2019-05-31 20:24:53'),(9,'07:30',NULL,1,5,'2019-05-31 20:24:59','2019-05-31 20:24:59'),(10,'07:35',NULL,1,11,'2019-05-31 20:25:06','2019-05-31 20:25:06'),(11,'07:45',NULL,1,8,'2019-05-31 20:25:19','2019-05-31 20:25:19'),(12,'08:00',NULL,1,10,'2019-05-31 20:25:30','2019-05-31 20:25:30'),(13,'08:05',NULL,1,3,'2019-05-31 20:26:04','2019-05-31 20:26:04'),(14,'08:10',NULL,1,1,'2019-05-31 20:26:10','2019-05-31 20:26:10'),(15,'08:15',NULL,1,6,'2019-05-31 20:26:16','2019-05-31 20:26:16'),(16,'08:20',NULL,1,2,'2019-05-31 20:26:23','2019-05-31 20:26:23'),(17,'08:30',NULL,1,5,'2019-05-31 20:26:31','2019-05-31 20:26:31'),(18,'08:35',NULL,1,11,'2019-05-31 20:26:38','2019-05-31 20:26:38'),(19,'09:00','c',1,1,'2019-05-31 20:26:48','2019-05-31 20:26:48'),(20,'11:00',NULL,1,1,'2019-05-31 20:26:55','2019-05-31 20:26:55'),(21,'11:05',NULL,1,6,'2019-05-31 20:27:03','2019-05-31 20:27:03'),(22,'11:10',NULL,1,10,'2019-05-31 20:27:10','2019-05-31 20:27:10'),(23,'11:15',NULL,1,9,'2019-05-31 20:27:19','2019-05-31 20:27:19'),(24,'11:25',NULL,1,2,'2019-05-31 20:27:25','2019-05-31 20:27:25'),(25,'11:35',NULL,1,5,'2019-05-31 20:27:32','2019-05-31 20:27:32'),(26,'11:40',NULL,1,11,'2019-05-31 20:27:39','2019-05-31 20:27:39'),(27,'11:50',NULL,1,8,'2019-05-31 20:27:49','2019-05-31 20:27:49'),(28,'11:55',NULL,1,10,'2019-05-31 20:27:56','2019-05-31 20:27:56'),(29,'12:05',NULL,1,1,'2019-05-31 20:28:02','2019-05-31 20:28:02'),(30,'12:10',NULL,1,3,'2019-05-31 20:28:08','2019-05-31 20:28:08'),(31,'12:15',NULL,1,6,'2019-05-31 20:28:14','2019-05-31 20:28:14'),(32,'12:20',NULL,1,10,'2019-05-31 20:28:20','2019-05-31 20:28:20'),(33,'12:30','c',1,1,'2019-05-31 20:28:29','2019-05-31 20:28:29'),(34,'12:45',NULL,1,1,'2019-05-31 20:28:37','2019-05-31 20:28:37'),(35,'12:50',NULL,1,6,'2019-05-31 20:28:42','2019-05-31 20:28:42'),(36,'12:55',NULL,1,10,'2019-05-31 20:28:47','2019-05-31 20:28:47'),(37,'13:00',NULL,1,9,'2019-05-31 20:28:55','2019-05-31 20:28:55'),(38,'13:10',NULL,1,2,'2019-05-31 20:29:03','2019-05-31 20:29:03'),(39,'13:20',NULL,1,5,'2019-05-31 20:29:10','2019-05-31 20:29:10'),(40,'13:25',NULL,1,11,'2019-05-31 20:29:17','2019-05-31 20:29:17'),(41,'13:35',NULL,1,8,'2019-05-31 20:29:23','2019-05-31 20:29:23'),(42,'13:50',NULL,1,10,'2019-05-31 20:29:27','2019-05-31 20:29:27'),(43,'13:55',NULL,1,6,'2019-05-31 20:29:33','2019-05-31 20:29:33'),(44,'14:00','c',1,1,'2019-05-31 20:29:38','2019-05-31 20:29:38'),(45,'15:15',NULL,1,1,'2019-05-31 20:29:45','2019-05-31 20:29:45'),(46,'15:20',NULL,1,6,'2019-05-31 20:29:51','2019-05-31 20:29:51'),(47,'15:30',NULL,1,10,'2019-05-31 20:29:56','2019-05-31 20:29:56'),(48,'15:40',NULL,1,2,'2019-05-31 20:30:01','2019-05-31 20:30:01'),(49,'15:50',NULL,1,5,'2019-05-31 20:30:09','2019-05-31 20:30:09'),(50,'15:55',NULL,1,11,'2019-05-31 20:30:20','2019-05-31 20:30:20'),(51,'16:10',NULL,1,10,'2019-05-31 20:30:24','2019-05-31 20:30:24'),(52,'16:20','c',1,1,'2019-05-31 20:30:32','2019-05-31 20:30:32'),(53,'17:50',NULL,1,1,'2019-05-31 20:30:38','2019-05-31 20:30:38'),(54,'18:00',NULL,1,6,'2019-05-31 20:30:50','2019-05-31 20:30:50'),(55,'18:10',NULL,1,10,'2019-05-31 20:30:56','2019-05-31 20:30:56'),(56,'18:30',NULL,1,2,'2019-05-31 20:31:02','2019-05-31 20:31:02'),(57,'18:35',NULL,1,5,'2019-05-31 20:31:14','2019-05-31 20:31:14'),(58,'18:40',NULL,1,11,'2019-05-31 20:31:20','2019-05-31 20:31:20'),(59,'18:50',NULL,1,8,'2019-05-31 20:31:27','2019-05-31 20:31:27'),(60,'18:55',NULL,1,10,'2019-05-31 20:31:31','2019-05-31 20:31:31'),(61,'19:00',NULL,1,6,'2019-05-31 20:31:37','2019-05-31 20:31:37'),(62,'19:05','c',1,1,'2019-05-31 20:31:43','2019-05-31 20:31:43'),(63,'06:50',NULL,2,1,'2019-05-31 20:51:13','2019-05-31 20:51:13'),(64,'06:55',NULL,2,10,'2019-05-31 20:51:30','2019-05-31 20:51:30'),(65,'07:05',NULL,2,9,'2019-05-31 20:51:38','2019-05-31 20:51:38'),(66,'07:20',NULL,2,2,'2019-05-31 20:51:46','2019-05-31 20:51:46'),(67,'07:35',NULL,2,5,'2019-05-31 20:51:54','2019-05-31 20:51:54'),(68,'07:40',NULL,2,11,'2019-05-31 20:52:01','2019-05-31 20:52:01'),(69,'07:50',NULL,2,8,'2019-05-31 20:52:14','2019-05-31 20:52:14'),(70,'08:00','c',2,1,'2019-05-31 20:52:21','2019-05-31 20:52:21'),(71,'09:30',NULL,2,1,'2019-05-31 20:52:31','2019-05-31 20:52:31'),(72,'09:35',NULL,2,6,'2019-05-31 20:52:41','2019-05-31 20:52:41'),(73,'09:40',NULL,2,10,'2019-05-31 20:52:48','2019-05-31 20:52:48'),(74,'09:50',NULL,2,3,'2019-05-31 20:52:53','2019-05-31 20:52:53'),(75,'10:00',NULL,2,1,'2019-05-31 20:53:03','2019-05-31 20:53:03'),(76,'10:20',NULL,2,2,'2019-05-31 20:53:08','2019-05-31 20:53:08'),(77,'10:40',NULL,2,5,'2019-05-31 20:53:12','2019-05-31 20:53:12'),(78,'10:45',NULL,2,11,'2019-05-31 20:53:19','2019-05-31 20:53:19'),(79,'11:10',NULL,2,1,'2019-05-31 20:53:23','2019-05-31 20:53:23'),(80,'11:30',NULL,2,2,'2019-05-31 20:53:28','2019-05-31 20:53:28'),(81,'11:40',NULL,2,5,'2019-05-31 20:53:33','2019-05-31 20:53:33'),(82,'11:45',NULL,2,11,'2019-05-31 20:53:42','2019-05-31 20:53:42'),(83,'12:00',NULL,2,10,'2019-05-31 20:53:48','2019-05-31 20:53:48'),(84,'12:10','c',2,1,'2019-05-31 20:53:52','2019-05-31 20:53:52'),(85,'12:40',NULL,2,1,'2019-05-31 20:53:58','2019-05-31 20:53:58'),(86,'12:45',NULL,2,6,'2019-05-31 20:54:03','2019-05-31 20:54:03'),(87,'12:50',NULL,2,10,'2019-05-31 20:54:13','2019-05-31 20:54:13'),(88,'13:10',NULL,2,2,'2019-05-31 20:54:20','2019-05-31 20:54:20'),(89,'13:15',NULL,2,5,'2019-05-31 20:54:24','2019-05-31 20:54:24'),(90,'13:20',NULL,2,11,'2019-05-31 20:54:31','2019-05-31 20:54:31'),(91,'13:45',NULL,2,10,'2019-05-31 20:54:41','2019-05-31 20:54:41'),(92,'13:50','c',2,1,'2019-05-31 20:54:45','2019-05-31 20:54:45'),(93,'14:30',NULL,2,1,'2019-05-31 20:54:50','2019-05-31 20:54:50'),(94,'14:50',NULL,2,2,'2019-05-31 20:54:55','2019-05-31 20:54:55'),(95,'15:10',NULL,2,5,'2019-05-31 20:55:00','2019-05-31 20:55:00'),(96,'15:15',NULL,2,11,'2019-05-31 20:55:06','2019-05-31 20:55:06'),(97,'15:30',NULL,2,2,'2019-05-31 20:55:10','2019-05-31 20:55:10'),(98,'16:30',NULL,2,10,'2019-05-31 20:55:17','2019-05-31 20:55:17'),(99,'16:40',NULL,2,3,'2019-05-31 20:55:22','2019-05-31 20:55:22'),(100,'17:00',NULL,2,1,'2019-05-31 20:55:27','2019-05-31 20:55:27'),(101,'17:20',NULL,2,2,'2019-05-31 20:55:34','2019-05-31 20:55:34'),(102,'17:40',NULL,2,5,'2019-05-31 20:55:40','2019-05-31 20:55:40'),(103,'17:45',NULL,2,11,'2019-05-31 20:55:44','2019-05-31 20:55:44'),(104,'18:15',NULL,2,10,'2019-05-31 20:55:49','2019-05-31 20:55:49'),(105,'18:30',NULL,2,9,'2019-05-31 20:55:55','2019-05-31 20:55:55'),(106,'18:45','c',2,1,'2019-05-31 20:56:00','2019-05-31 20:56:00');
/*!40000 ALTER TABLE `horarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `linhas`
--

DROP TABLE IF EXISTS `linhas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `linhas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nomeLinha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `urlMaps` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `linhas`
--

LOCK TABLES `linhas` WRITE;
/*!40000 ALTER TABLE `linhas` DISABLE KEYS */;
INSERT INTO `linhas` VALUES (1,'Intercampi 1','2019-05-30 23:52:21','2019-05-30 23:52:21',''),(2,'Intercampi 2','2019-05-31 20:46:48','2019-05-31 20:46:48','');
/*!40000 ALTER TABLE `linhas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2019_05_30_150430_create_linhas_table',1),(2,'2019_05_30_154034_create_campuses_table',1),(3,'2019_05_30_161545_create_horarios_table',1),(7,'2019_06_01_141845_create_users_table',2),(8,'2019_06_01_181753_add_unique_and_url',3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','$2y$10$hkCFg13iSMW0PVGaX24aP.vqHy2.qMkSrzG8nllrs69Tr7C1nSJ4q',NULL,'2019-06-02 01:35:04','2019-06-02 01:35:04');
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

-- Dump completed on 2019-06-01 11:56:11
