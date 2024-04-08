CREATE DATABASE  IF NOT EXISTS `musica` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `musica`;
-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: musica
-- ------------------------------------------------------
-- Server version	8.0.35

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
-- Table structure for table `musica`
--

DROP TABLE IF EXISTS `musica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `musica` (
  `id` int NOT NULL,
  `nome` varchar(200) DEFAULT NULL,
  `letra` text,
  `fk_album_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_musica_2` (`fk_album_id`),
  CONSTRAINT `FK_musica_2` FOREIGN KEY (`fk_album_id`) REFERENCES `album` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `musica`
--

LOCK TABLES `musica` WRITE;
/*!40000 ALTER TABLE `musica` DISABLE KEYS */;
INSERT INTO `musica` VALUES (1,'Walk of Life','Here comes Johnny singing oldies, goldies\n\"Be-Bop-A-Lula, \" \"Baby What I Say\"\nHere comes Johnny singing, \"I Gotta Woman\"\nDown in the tunnels, trying to make it pay\nHe got the action, he got the motion\nYeah, the boy can play\nDedication, devotion\nTurning all the night time into the day\nHe do the song about the sweet lovin woman\nHe do the song about the knife\nHe do the walk, do the walk of life\nYeah, he do the walk of life\nHere comes Johnny, gonna tell you the story\nHand me down my walkin shoes\nHere comes Johnny with the power and the glory\nBackbeat the talkin blues\nHe got the action, he got the motion\nYeah, the boy can play\nDedication, devotion\nTurning all the night time into the day\nThe song about the sweet lovin woman\nHe do the song about the knife\nThen he do the walk, he do the walk of life\nYeah, he do the walk of life\nHere comes Johnny singing oldies, goldies\n\"Be-Bop-A-Lula, \" \"Baby What I Say\"\nHere comes Johnny singing, \"I Gotta Woman\"\nDown in the tunnels, trying to make it pay\nHe got the action, he got the motion\nYeah, the boy can play\nDedication, devotion\nTurning all the night time into the day\nAnd after all the violence and double talk\nTheres just a song in all the trouble and the strife\nYou do the walk, yeah, you do the walk of life\nHmm, you do the walk of life',3);
/*!40000 ALTER TABLE `musica` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-03-22 17:06:46
