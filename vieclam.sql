-- MySQL dump 10.13  Distrib 5.7.17, for Linux (x86_64)
--
-- Host: localhost    Database: vieclam
-- ------------------------------------------------------
-- Server version	5.7.17-0ubuntu0.16.04.1

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
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `city`
--

LOCK TABLES `city` WRITE;
/*!40000 ALTER TABLE `city` DISABLE KEYS */;
/*!40000 ALTER TABLE `city` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sub_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tax_number` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sologan` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `hotline` varchar(15) CHARACTER SET utf8 NOT NULL,
  `job_type` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `address` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `logo` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `banner` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `images` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_type` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company`
--

LOCK TABLES `company` WRITE;
/*!40000 ALTER TABLE `company` DISABLE KEYS */;
INSERT INTO `company` VALUES (1,'aaa','aaa','aaa','aaa',1,'0973.619.398',1,1,1,'aaa','aaa','bigLogo.png','slide.png','aaa',1,1,'2017-07-07 00:00:00',1,'2017-07-07 00:00:00');
/*!40000 ALTER TABLE `company` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cv`
--

DROP TABLE IF EXISTS `cv`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cv` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `birthday` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthmonth` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthyear` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `address` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `education` text COLLATE utf8_unicode_ci,
  `experience` text COLLATE utf8_unicode_ci,
  `language` text COLLATE utf8_unicode_ci,
  `skills` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `interests` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `computer` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `career_objective` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `images` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cv`
--

LOCK TABLES `cv` WRITE;
/*!40000 ALTER TABLE `cv` DISABLE KEYS */;
/*!40000 ALTER TABLE `cv` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `district`
--

DROP TABLE IF EXISTS `district`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `district` (
  `id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `district`
--

LOCK TABLES `district` WRITE;
/*!40000 ALTER TABLE `district` DISABLE KEYS */;
/*!40000 ALTER TABLE `district` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job`
--

DROP TABLE IF EXISTS `job`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `expiration_date` datetime DEFAULT NULL,
  `work_time` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `public` int(11) DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `required` text COLLATE utf8_unicode_ci,
  `benefit` text COLLATE utf8_unicode_ci,
  `city_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `position_id` int(11) DEFAULT NULL,
  `experience` int(11) DEFAULT NULL,
  `work_type` int(11) DEFAULT NULL,
  `job_type` int(11) DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job`
--

LOCK TABLES `job` WRITE;
/*!40000 ALTER TABLE `job` DISABLE KEYS */;
INSERT INTO `job` VALUES (1,'Nhân viên ship pizza tại nhà',5,'2017-07-31 00:00:00','8h-17h',1,'aaa','aaa','aa',1,1,8,0,1,1,1,1,1,1,0,0,'2017-07-07 14:32:04','2017-07-07 14:32:04'),(2,'Nhân viên bán hàng tại quầy',5,'2017-07-31 00:00:00','8h-17h',1,'aaa','aaa','aa',1,1,8,0,1,1,1,1,1,1,0,0,'2017-07-07 14:32:04','2017-07-07 14:32:04'),(3,'Nhân viên kinh doanh online',5,'2017-07-31 00:00:00','8h-17h',1,'aaa','aaa','aa',1,1,8,0,1,1,1,1,1,1,0,0,'2017-07-07 14:32:04','2017-07-07 14:32:04'),(4,'Nhân viên trông xe tại cửa hàng',5,'2017-07-31 00:00:00','8h-17h',1,'aaa','aaa','aa',1,1,8,0,1,1,1,1,1,1,0,0,'2017-07-07 14:32:04','2017-07-07 14:32:04'),(5,'Nhân viên quản lý',5,'2017-07-31 00:00:00','8h-17h',1,'aaa','aaa','aa',1,1,8,0,1,1,1,1,1,1,0,0,'2017-07-07 14:32:04','2017-07-07 14:32:04'),(6,'Nhân viên thu ngân',5,'2017-07-31 00:00:00','8h-17h',1,'aaa','aaa','aa',1,1,8,0,1,1,1,1,1,1,0,0,'2017-07-07 14:32:04','2017-07-07 14:32:04');
/*!40000 ALTER TABLE `job` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','tran.thanh.tuan269@gmail.com',NULL,'$2y$10$y93QjVW7pXehbKthA5BqJO0uCI7.Co0UN4qzFKVa0JbEj2u2W1.5K','A9SV49X5LvErht1Q91XIDOpCo2Gsl1YJZauYmaatTkS0RKXmmCzhpi5WYNod','2017-07-04 00:49:28','2017-07-04 00:49:28');
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

-- Dump completed on 2017-07-07 17:10:52
