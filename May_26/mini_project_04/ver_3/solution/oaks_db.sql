-- MySQL dump 10.13  Distrib 8.4.3, for Win64 (x86_64)
--
-- Host: localhost    Database: oaks_surgery
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
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `appointment` (
  `app_id` int NOT NULL AUTO_INCREMENT,
  `app_time` int NOT NULL,
  `app_reason` text COLLATE utf8mb4_general_ci NOT NULL,
  `patient_id` int NOT NULL,
  `doc_id` int NOT NULL,
  `app_date` int NOT NULL,
  PRIMARY KEY (`app_id`),
  KEY `patient_id` (`patient_id`),
  KEY `doc_id` (`doc_id`),
  CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `user` (`patient_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`doc_id`) REFERENCES `doctor` (`doc_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appointment`
--

LOCK TABLES `appointment` WRITE;
/*!40000 ALTER TABLE `appointment` DISABLE KEYS */;
/*!40000 ALTER TABLE `appointment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `appointment_audit`
--

DROP TABLE IF EXISTS `appointment_audit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `appointment_audit` (
  `app_audit_id` int NOT NULL AUTO_INCREMENT,
  `app_id` int NOT NULL,
  `date` date NOT NULL,
  `code` text NOT NULL,
  `longdesc` text NOT NULL,
  PRIMARY KEY (`app_audit_id`),
  KEY `app_id` (`app_id`),
  CONSTRAINT `appointment_audit_ibfk_1` FOREIGN KEY (`app_id`) REFERENCES `appointment` (`app_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appointment_audit`
--

LOCK TABLES `appointment_audit` WRITE;
/*!40000 ALTER TABLE `appointment_audit` DISABLE KEYS */;
/*!40000 ALTER TABLE `appointment_audit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `audit`
--

DROP TABLE IF EXISTS `audit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `audit` (
  `auditid` int NOT NULL AUTO_INCREMENT,
  `patientid` int NOT NULL,
  `date` date NOT NULL,
  `code` text COLLATE utf8mb4_general_ci NOT NULL,
  `longdesc` text COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`auditid`),
  KEY `patient_id` (`patientid`),
  CONSTRAINT `audit_ibfk_1` FOREIGN KEY (`patientid`) REFERENCES `user` (`patient_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `audit`
--

LOCK TABLES `audit` WRITE;
/*!40000 ALTER TABLE `audit` DISABLE KEYS */;
INSERT INTO `audit` VALUES (2,7,'2025-10-13','reg','User has registered'),(3,7,'2025-10-13','log','User has logged in'),(4,7,'2025-10-13','logout','User has logged out'),(5,7,'2025-10-13','log','User has logged in'),(6,7,'2025-10-13','logout','User has logged out'),(11,10,'2025-10-13','reg','User has registered'),(12,10,'2025-10-21','log','User has logged in'),(13,10,'2025-10-21','log','User has logged in'),(14,10,'2025-10-23','log','User has logged in'),(15,10,'2025-10-23','log','User has logged in'),(16,10,'2025-10-23','logout','User has logged out'),(17,11,'2025-10-23','reg','User has registered'),(18,11,'2025-10-23','log','User has logged in'),(19,11,'2025-10-23','log','User has logged in'),(20,11,'2025-10-23','log','User has logged in'),(21,11,'2025-10-23','log','User has logged in'),(22,11,'2025-10-23','log','User has logged in'),(23,11,'2025-10-23','log','User has logged in');
/*!40000 ALTER TABLE `audit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `docaudit`
--

DROP TABLE IF EXISTS `docaudit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `docaudit` (
  `docauditid` int NOT NULL AUTO_INCREMENT,
  `doc_id` int NOT NULL,
  `date` date NOT NULL,
  `code` text COLLATE utf8mb4_general_ci NOT NULL,
  `longdesc` text COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`docauditid`),
  KEY `doc_id` (`doc_id`),
  CONSTRAINT `docaudit_ibfk_1` FOREIGN KEY (`doc_id`) REFERENCES `doctor` (`doc_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `docaudit`
--

LOCK TABLES `docaudit` WRITE;
/*!40000 ALTER TABLE `docaudit` DISABLE KEYS */;
/*!40000 ALTER TABLE `docaudit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctor`
--

DROP TABLE IF EXISTS `doctor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doctor` (
  `doc_id` int NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8mb4_general_ci NOT NULL,
  `lname` text COLLATE utf8mb4_general_ci NOT NULL,
  `doc_password` text COLLATE utf8mb4_general_ci NOT NULL,
  `active` tinyint NOT NULL,
  `role` text COLLATE utf8mb4_general_ci NOT NULL,
  `room_numb` int NOT NULL,
  PRIMARY KEY (`doc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctor`
--

LOCK TABLES `doctor` WRITE;
/*!40000 ALTER TABLE `doctor` DISABLE KEYS */;
/*!40000 ALTER TABLE `doctor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `temp`
--

DROP TABLE IF EXISTS `temp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `temp` (
  `temp_id` int NOT NULL AUTO_INCREMENT,
  `doc_id` int NOT NULL,
  `code` bigint NOT NULL,
  `time` int NOT NULL,
  `used` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`temp_id`),
  KEY `doc_id` (`doc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
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
  `patient_id` int NOT NULL AUTO_INCREMENT,
  `f_name` text COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` text COLLATE utf8mb4_general_ci NOT NULL,
  `username` text COLLATE utf8mb4_general_ci NOT NULL,
  `password` text COLLATE utf8mb4_general_ci NOT NULL,
  `dob` text COLLATE utf8mb4_general_ci NOT NULL,
  `postcode` text COLLATE utf8mb4_general_ci NOT NULL,
  `nhs_numb` text COLLATE utf8mb4_general_ci NOT NULL,
  `allergies` text COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`patient_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (7,'Ben','Smith','Smithy_B92','$2y$10$XdKalSwn93g6KVBWjbTgD.lJ/tpkobV9bj9dCa5bh1qOT7jAD9aiS','20/11/1992','M1 1AE','2147483647','none'),(10,'Alice','Johnson','AJMed_2024','$2y$10$jBzTnlDrKJTCYIXxL0mPUuPEGNTGm1GDHiHpgKr0h0AxpB4w/vaCK','15/09/1990','SW1A 0AA','1234567890','Penicillin '),(11,'Chloe ','Davis','ChloDavi$','$2y$10$xw5GSxp7vTYpfm7aS9i.0.H4shb5RneZXzMCemJ0p3ik0KAkUNlYa','01/08/2001','EH1 1AA','456 789 0123','Peanuts');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-10-24 14:48:27
