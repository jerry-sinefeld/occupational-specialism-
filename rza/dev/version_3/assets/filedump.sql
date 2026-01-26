-- MySQL dump 10.13  Distrib 8.4.3, for Win64 (x86_64)
--
-- Host: localhost    Database: rolsa_systems
-- ------------------------------------------------------
-- Server version	8.4.3

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `bookaudit`
--

DROP TABLE IF EXISTS `bookaudit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bookaudit` (
  `book_audit_id` int NOT NULL AUTO_INCREMENT,
  `book_id` int NOT NULL,
  `date` date NOT NULL,
  `code` text NOT NULL,
  `longdesc` text NOT NULL,
  PRIMARY KEY (`book_audit_id`),
  KEY `book_id` (`book_id`),
  CONSTRAINT `bookaudit_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `bookings` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookaudit`
--

LOCK TABLES `bookaudit` WRITE;
/*!40000 ALTER TABLE `bookaudit` DISABLE KEYS */;
/*!40000 ALTER TABLE `bookaudit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bookings` (
  `book_id` int NOT NULL AUTO_INCREMENT,
  `book_time` int NOT NULL,
  `book_reason` text NOT NULL,
  `userid` int NOT NULL,
  `enginid` int NOT NULL,
  `book_date` int NOT NULL,
  PRIMARY KEY (`book_id`),
  KEY `userid` (`userid`,`enginid`),
  KEY `enginid` (`enginid`),
  CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`),
  CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`enginid`) REFERENCES `engineer` (`enginid`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookings`
--

LOCK TABLES `bookings` WRITE;
/*!40000 ALTER TABLE `bookings` DISABLE KEYS */;
INSERT INTO `bookings` VALUES (7,1764174360,'new solar panels mate',2,2,1764080705);
/*!40000 ALTER TABLE `bookings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enginaudit`
--

DROP TABLE IF EXISTS `enginaudit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `enginaudit` (
  `engin_audit_id` int NOT NULL AUTO_INCREMENT,
  `enginid` int NOT NULL,
  `date` date NOT NULL,
  `code` text NOT NULL,
  `longdesc` text NOT NULL,
  PRIMARY KEY (`engin_audit_id`),
  KEY `enginid` (`enginid`),
  CONSTRAINT `enginaudit_ibfk_1` FOREIGN KEY (`enginid`) REFERENCES `engineer` (`enginid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enginaudit`
--

LOCK TABLES `enginaudit` WRITE;
/*!40000 ALTER TABLE `enginaudit` DISABLE KEYS */;
INSERT INTO `enginaudit` VALUES (1,1,'2025-11-25','log','Engineer has logged in'),(2,1,'2025-11-25','log','Engineer has logged in'),(3,1,'2025-11-25','logout','Engineer has logged out'),(4,1,'2025-11-25','log','Engineer has logged in'),(5,1,'2025-11-25','logout','Engineer has logged out'),(6,1,'2025-11-25','log','Engineer has logged in'),(7,1,'2025-11-25','logout','Engineer has logged out'),(8,1,'2025-11-25','log','Engineer has logged in'),(9,1,'2025-11-25','log','Staff has cancelled appointment'),(10,1,'2025-11-25','logout','Engineer has logged out'),(11,2,'2025-11-25','reg','Engineer has registered'),(12,2,'2025-11-25','logout','Engineer has logged out');
/*!40000 ALTER TABLE `enginaudit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `engineer`
--

DROP TABLE IF EXISTS `engineer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `engineer` (
  `enginid` int NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `password` text NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`enginid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `engineer`
--

LOCK TABLES `engineer` WRITE;
/*!40000 ALTER TABLE `engineer` DISABLE KEYS */;
INSERT INTO `engineer` VALUES (1,'Jwalker92','James','Walker','$2y$10$ZaeP6U9ptQY9r5As0QzD2uZ/e0qY4QiT4UBZ6uzyEG/skmo5FKLj.',1),(2,'s_martinez','Sofia','Martinez','$2y$10$jx65endlSP9eM9rt0vo8QOojrafvZkDwjASKnnkGG0ae5rx14HMHm',1);
/*!40000 ALTER TABLE `engineer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product` (
  `productid` int NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `price` int NOT NULL,
  `tti` int NOT NULL,
  PRIMARY KEY (`productid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'Solar Panel',350,2),(2,'EV Charger',1000,5),(3,'Smart Meter',100,1);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `temp`
--

DROP TABLE IF EXISTS `temp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `temp` (
  `tempid` int NOT NULL AUTO_INCREMENT,
  `enginid` int NOT NULL,
  `code` bigint NOT NULL,
  `time` int NOT NULL,
  PRIMARY KEY (`tempid`),
  KEY `enginid` (`enginid`),
  CONSTRAINT `temp_ibfk_1` FOREIGN KEY (`enginid`) REFERENCES `engineer` (`enginid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `temp`
--

LOCK TABLES `temp` WRITE;
/*!40000 ALTER TABLE `temp` DISABLE KEYS */;
/*!40000 ALTER TABLE `temp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `userid` int NOT NULL AUTO_INCREMENT,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `address` text NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (2,'Alice','Green','agreen123','$2y$10$kTrxBVsSDY6ZPNP72LHe.Oku.DVHTHN2OAWAHlbacRmKjT3rt.rwC','15 sunflower road leeds'),(3,'Ben','Carter','bcarter88','$2y$10$5rWcyzaU0NHW4icFIEyEsutW/VmVPOzgUA6s/k93y/oQaZhQRqPZi','42 Maple Street, Manchester');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `useraudit`
--

DROP TABLE IF EXISTS `useraudit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `useraudit` (
  `user_audit_id` int NOT NULL AUTO_INCREMENT,
  `userid` int NOT NULL,
  `date` date NOT NULL,
  `code` text NOT NULL,
  `longdesc` text NOT NULL,
  PRIMARY KEY (`user_audit_id`),
  KEY `userid` (`userid`),
  CONSTRAINT `useraudit_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `useraudit`
--

LOCK TABLES `useraudit` WRITE;
/*!40000 ALTER TABLE `useraudit` DISABLE KEYS */;
INSERT INTO `useraudit` VALUES (2,2,'2025-11-25','log','User has logged in'),(4,2,'2025-11-25','log','User has logged in'),(5,2,'2025-11-25','logout','User has logged out'),(6,2,'2025-11-25','log','User has logged in'),(7,2,'2025-11-25','logout','User has logged out'),(8,2,'2025-11-25','log','User has logged in'),(9,2,'2025-11-25','logout','User has logged out'),(10,3,'2025-11-25','reg','User has registered'),(11,2,'2025-11-25','log','User has logged in');
/*!40000 ALTER TABLE `useraudit` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-11-28  8:57:37
