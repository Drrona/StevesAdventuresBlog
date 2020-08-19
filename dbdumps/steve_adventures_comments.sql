-- MySQL dump 10.13  Distrib 8.0.20, for Win64 (x86_64)
--
-- Host: localhost    Database: steve_adventures
-- ------------------------------------------------------
-- Server version	8.0.20

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comments` (
  `idcomments` int NOT NULL,
  `userId` int DEFAULT NULL,
  `commentText` varchar(500) DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL,
  `postId` int DEFAULT NULL,
  `isApproved` tinyint DEFAULT NULL,
  PRIMARY KEY (`idcomments`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,1,'This is a great comment!','2020-08-14 00:00:00',1,1),(2,1,'This is a great comment!','2020-08-14 00:00:00',2,1),(3,1,'This is a great comment!','2020-08-14 00:00:00',3,1),(4,1,'This is a great comment!','2020-08-14 00:00:00',4,1),(5,1,'This is a great comment!','2020-08-14 00:00:00',5,1),(6,2,'This is a great comment!','2020-08-14 00:00:00',6,1),(7,2,'This is a great comment!','2020-08-14 00:00:00',7,1),(8,2,'This is a great comment!','2020-08-14 00:00:00',8,1),(9,2,'This is a great comment!','2020-08-14 00:00:00',9,1),(10,2,'This is a great comment!','2020-08-14 00:00:00',10,1),(11,3,'This is a great comment!','2020-08-14 00:00:00',11,1),(12,3,'This is a great comment!','2020-08-14 00:00:00',12,1),(13,3,'This is a great comment!','2020-08-14 00:00:00',13,1),(14,3,'This is a great comment!','2020-08-14 00:00:00',14,1),(15,3,'This is a great comment!','2020-08-14 00:00:00',15,1),(16,4,'This is a great comment!','2020-08-14 00:00:00',16,1),(17,4,'This is a great comment!','2020-08-14 00:00:00',17,1),(18,4,'This is a great comment!','2020-08-14 00:00:00',18,1),(19,4,'This is a great comment!','2020-08-14 00:00:00',19,1),(20,4,'This is a great comment!','2020-08-14 00:00:00',20,1),(21,1,'This is a great comment!','2020-08-14 00:00:00',1,1),(22,1,'This is a great comment!','2020-08-14 00:00:00',2,1),(23,1,'This is a great comment!','2020-08-14 00:00:00',3,1),(24,1,'This is a great comment!','2020-08-14 00:00:00',4,1),(25,1,'This is a great comment!','2020-08-14 00:00:00',5,1),(26,2,'This is a great comment!','2020-08-14 00:00:00',6,1),(27,2,'This is a great comment!','2020-08-14 00:00:00',7,1),(28,2,'This is a great comment!','2020-08-14 00:00:00',8,1),(29,2,'This is a great comment!','2020-08-14 00:00:00',9,1),(30,2,'This is a great comment!','2020-08-14 00:00:00',10,1),(31,3,'This is a great comment!','2020-08-14 00:00:00',11,1),(32,3,'This is a great comment!','2020-08-14 00:00:00',12,1),(33,3,'This is a great comment!','2020-08-14 00:00:00',13,1),(34,3,'This is a great comment!','2020-08-14 00:00:00',14,1),(35,3,'This is a great comment!','2020-08-14 00:00:00',15,1),(36,4,'This is a great comment!','2020-08-14 00:00:00',16,1),(37,4,'This is a great comment!','2020-08-14 00:00:00',17,1),(38,4,'This is a great comment!','2020-08-14 00:00:00',18,1),(39,4,'This is a great comment!','2020-08-14 00:00:00',19,1),(40,4,'This is a great comment!','2020-08-14 00:00:00',20,1),(41,3,'OMG SO COOL!','2020-08-15 00:00:00',14,1),(42,3,'asdfsadf','2020-08-15 00:00:00',14,1),(43,3,'Wonderful Article!','2020-08-15 00:00:00',6,1),(44,1,'dsfgsdfg','2020-08-15 00:00:00',21,1),(45,1,'great','2020-08-15 00:00:00',4,1);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-08-15  0:22:08
