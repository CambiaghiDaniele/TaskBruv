CREATE DATABASE  IF NOT EXISTS `taskbruv` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `taskbruv`;
-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: localhost    Database: taskbruv
-- ------------------------------------------------------
-- Server version	8.0.32

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
-- Table structure for table `categoriaoggetto`
--

DROP TABLE IF EXISTS `categoriaoggetto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categoriaoggetto` (
  `nome` varchar(32) NOT NULL,
  `descrizione` text,
  PRIMARY KEY (`nome`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoriaoggetto`
--

LOCK TABLES `categoriaoggetto` WRITE;
/*!40000 ALTER TABLE `categoriaoggetto` DISABLE KEYS */;
/*!40000 ALTER TABLE `categoriaoggetto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoriatask`
--

DROP TABLE IF EXISTS `categoriatask`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categoriatask` (
  `nome` varchar(32) NOT NULL,
  `descrizione` text,
  PRIMARY KEY (`nome`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoriatask`
--

LOCK TABLES `categoriatask` WRITE;
/*!40000 ALTER TABLE `categoriatask` DISABLE KEYS */;
/*!40000 ALTER TABLE `categoriatask` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chat`
--

DROP TABLE IF EXISTS `chat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chat` (
  `id` int NOT NULL,
  `id_utente_cliente` varchar(64) DEFAULT NULL,
  `id_utente_datore` varchar(64) DEFAULT NULL,
  `id_task` int DEFAULT NULL,
  `data_creazione` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_utente_cliente` (`id_utente_cliente`),
  KEY `id_utente_datore` (`id_utente_datore`),
  KEY `id_task` (`id_task`),
  CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`id_utente_cliente`) REFERENCES `utente` (`mail`),
  CONSTRAINT `chat_ibfk_2` FOREIGN KEY (`id_utente_datore`) REFERENCES `utente` (`mail`),
  CONSTRAINT `chat_ibfk_3` FOREIGN KEY (`id_task`) REFERENCES `task` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chat`
--

LOCK TABLES `chat` WRITE;
/*!40000 ALTER TABLE `chat` DISABLE KEYS */;
/*!40000 ALTER TABLE `chat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chatlines`
--

DROP TABLE IF EXISTS `chatlines`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chatlines` (
  `id_chat` int NOT NULL,
  `id_utente` varchar(64) NOT NULL,
  `messaggio` text,
  `data` datetime NOT NULL,
  PRIMARY KEY (`id_chat`,`id_utente`,`data`),
  KEY `id_utente` (`id_utente`),
  CONSTRAINT `chatlines_ibfk_1` FOREIGN KEY (`id_chat`) REFERENCES `chat` (`id`),
  CONSTRAINT `chatlines_ibfk_2` FOREIGN KEY (`id_utente`) REFERENCES `utente` (`mail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chatlines`
--

LOCK TABLES `chatlines` WRITE;
/*!40000 ALTER TABLE `chatlines` DISABLE KEYS */;
/*!40000 ALTER TABLE `chatlines` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cronologiatask`
--

DROP TABLE IF EXISTS `cronologiatask`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cronologiatask` (
  `id_task` int NOT NULL,
  `id_utente` varchar(64) NOT NULL,
  `duratafinale` varchar(8) DEFAULT NULL,
  `votoalcliente` int DEFAULT NULL,
  `votoaldatore` int DEFAULT NULL,
  PRIMARY KEY (`id_task`,`id_utente`),
  KEY `id_utente` (`id_utente`),
  CONSTRAINT `cronologiatask_ibfk_1` FOREIGN KEY (`id_task`) REFERENCES `task` (`id`),
  CONSTRAINT `cronologiatask_ibfk_2` FOREIGN KEY (`id_utente`) REFERENCES `utente` (`mail`),
  CONSTRAINT `cronologiatask_chk_1` CHECK (((`votoalcliente` < 11) and (`votoalcliente` > 0))),
  CONSTRAINT `cronologiatask_chk_2` CHECK (((`votoaldatore` < 11) and (`votoaldatore` > 0)))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cronologiatask`
--

LOCK TABLES `cronologiatask` WRITE;
/*!40000 ALTER TABLE `cronologiatask` DISABLE KEYS */;
/*!40000 ALTER TABLE `cronologiatask` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `immagine`
--

DROP TABLE IF EXISTS `immagine`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `immagine` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_task` int DEFAULT NULL,
  `immagine` blob,
  PRIMARY KEY (`id`),
  KEY `id_task` (`id_task`),
  CONSTRAINT `immagine_ibfk_1` FOREIGN KEY (`id_task`) REFERENCES `task` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `immagine`
--

LOCK TABLES `immagine` WRITE;
/*!40000 ALTER TABLE `immagine` DISABLE KEYS */;
/*!40000 ALTER TABLE `immagine` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oggetto`
--

DROP TABLE IF EXISTS `oggetto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oggetto` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(32) DEFAULT NULL,
  `categoria` varchar(32) DEFAULT NULL,
  `peso` double DEFAULT NULL,
  `id_task` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categoria` (`categoria`),
  KEY `id_task` (`id_task`),
  CONSTRAINT `oggetto_ibfk_1` FOREIGN KEY (`categoria`) REFERENCES `categoriaoggetto` (`nome`),
  CONSTRAINT `oggetto_ibfk_2` FOREIGN KEY (`id_task`) REFERENCES `task` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oggetto`
--

LOCK TABLES `oggetto` WRITE;
/*!40000 ALTER TABLE `oggetto` DISABLE KEYS */;
/*!40000 ALTER TABLE `oggetto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ricerca`
--

DROP TABLE IF EXISTS `ricerca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ricerca` (
  `id_utente` varchar(64) NOT NULL,
  `data` datetime NOT NULL,
  `parola` text,
  PRIMARY KEY (`id_utente`,`data`),
  CONSTRAINT `ricerca_ibfk_1` FOREIGN KEY (`id_utente`) REFERENCES `utente` (`mail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ricerca`
--

LOCK TABLES `ricerca` WRITE;
/*!40000 ALTER TABLE `ricerca` DISABLE KEYS */;
/*!40000 ALTER TABLE `ricerca` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `task`
--

DROP TABLE IF EXISTS `task`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `task` (
  `id` int NOT NULL AUTO_INCREMENT,
  `indirizzo` varchar(64) NOT NULL,
  `id_utente` varchar(64) NOT NULL,
  `retribuzione` double NOT NULL,
  `durata` varchar(8) NOT NULL,
  `descrizione` text NOT NULL,
  `nome` varchar(32) DEFAULT NULL,
  `categoria` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_utente` (`id_utente`),
  KEY `categoria` (`categoria`),
  CONSTRAINT `task_ibfk_1` FOREIGN KEY (`id_utente`) REFERENCES `utente` (`mail`),
  CONSTRAINT `task_ibfk_2` FOREIGN KEY (`categoria`) REFERENCES `categoriatask` (`nome`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `task`
--

LOCK TABLES `task` WRITE;
/*!40000 ALTER TABLE `task` DISABLE KEYS */;
/*!40000 ALTER TABLE `task` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `taskpreferite`
--

DROP TABLE IF EXISTS `taskpreferite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `taskpreferite` (
  `id_task` int NOT NULL,
  `id_utente` varchar(64) NOT NULL,
  PRIMARY KEY (`id_task`,`id_utente`),
  KEY `id_utente` (`id_utente`),
  CONSTRAINT `taskpreferite_ibfk_1` FOREIGN KEY (`id_task`) REFERENCES `task` (`id`),
  CONSTRAINT `taskpreferite_ibfk_2` FOREIGN KEY (`id_utente`) REFERENCES `utente` (`mail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `taskpreferite`
--

LOCK TABLES `taskpreferite` WRITE;
/*!40000 ALTER TABLE `taskpreferite` DISABLE KEYS */;
/*!40000 ALTER TABLE `taskpreferite` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utente`
--

DROP TABLE IF EXISTS `utente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `utente` (
  `mail` varchar(64) NOT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `indirizzo` varchar(36) DEFAULT NULL,
  `saldo` double DEFAULT NULL,
  `tel` int DEFAULT NULL,
  PRIMARY KEY (`mail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utente`
--

LOCK TABLES `utente` WRITE;
/*!40000 ALTER TABLE `utente` DISABLE KEYS */;
INSERT INTO `utente` VALUES ('gino@gmail.com','gino','gino123','via pascoli 4',2,12345);
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

-- Dump completed on 2024-01-24  7:00:48
