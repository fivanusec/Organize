-- MySQL dump 10.13  Distrib 8.0.21, for Linux (x86_64)
--
-- Host: localhost    Database: Organize
-- ------------------------------------------------------

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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `ID` bigint NOT NULL,
  `Name` text,
  `Surname` text,
  `Email` text,
  `Password` text,
  `User_Type` varchar(20) DEFAULT NULL,
  `salt` text,
  `news` varchar(2) DEFAULT NULL,
  `Company` text,
  `Website` text,
  `Address` text,
  `City` text,
  `State` text,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Cards`
--

DROP TABLE IF EXISTS `Cards`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Cards` (
  `Card_ID` bigint NOT NULL,
  `User_ID` bigint NOT NULL,
  `Card_Name` text,
  `Card_Description` text,
  `Todo_ID` bigint NOT NULL,
  PRIMARY KEY (`Card_ID`),
  KEY `Cards_User_ID_index` (`User_ID`),
  KEY `Cards_Todo_ID_index` (`Todo_ID`),
  CONSTRAINT `Cards_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `users` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Todo_Item`
--

DROP TABLE IF EXISTS `Todo_Item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Todo_Item` (
  `Todo_Item_ID` bigint NOT NULL,
  `Todo_Item_Name` text,
  `Todo_Item_Completion_Date` date,
  `Todo_Item_Completion` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`Todo_Item_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Todo_List`
--

DROP TABLE IF EXISTS `Todo_List`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Todo_List` (
  `Todo_List_ID` bigint NOT NULL,
  `Todo_Description` text,
  `Todo_Name` text,
  PRIMARY KEY (`Todo_List_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Todo_List_Prep`
--

DROP TABLE IF EXISTS `Todo_List_Prep`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Todo_List_Prep` (
  `Todo_List_ID` bigint DEFAULT NULL,
  `Todo_Item_ID` bigint DEFAULT NULL,
  KEY `Todo_List_Prep_ibfk_1` (`Todo_List_ID`),
  KEY `Todo_List_Prep_ibfk_2` (`Todo_Item_ID`),
  CONSTRAINT `Todo_List_Prep_ibfk_1` FOREIGN KEY (`Todo_List_ID`) REFERENCES `Todo_List` (`Todo_List_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Todo_List_Prep_ibfk_2` FOREIGN KEY (`Todo_Item_ID`) REFERENCES `Todo_Item` (`Todo_Item_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Todo_Prep`
--

DROP TABLE IF EXISTS `Todo_Prep`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Todo_Prep` (
  `Todo_ID` bigint NOT NULL,
  `Todo_List_ID` bigint NOT NULL,
  KEY `Todo_Prep_ibfk_1` (`Todo_ID`),
  KEY `Todo_Prep_ibfk_2` (`Todo_List_ID`),
  CONSTRAINT `Todo_Prep_ibfk_1` FOREIGN KEY (`Todo_ID`) REFERENCES `Cards` (`Todo_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Todo_Prep_ibfk_2` FOREIGN KEY (`Todo_List_ID`) REFERENCES `Todo_List` (`Todo_List_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `profile_images`
--

DROP TABLE IF EXISTS `profile_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profile_images` (
  `Image_ID` bigint NOT NULL,
  `User_ID` bigint DEFAULT NULL,
  `Image_Name` text,
  `Image_Dir` text,
  PRIMARY KEY (`Image_ID`),
  KEY `FK_IMG_USER_ID` (`User_ID`),
  CONSTRAINT `FK_IMG_USER_ID` FOREIGN KEY (`User_ID`) REFERENCES `users` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user_cookies`
--

DROP TABLE IF EXISTS `user_cookies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_cookies` (
  `ID` bigint NOT NULL AUTO_INCREMENT,
  `hash` text,
  `User_ID` bigint DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_USER_ID` (`User_ID`),
  CONSTRAINT `user_cookies_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `users` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `notes`
--

DROP TABLE IF EXISTS `notes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notes`(
    `Note_ID` bigint NOT NULL,
    `Note_Name` text,
    `Note_Data` text,
    `Todo_List_ID` bigint,
    PRIMARY KEY(`Note_ID`),
    KEY `FK_NOTES_TODO_LIST_ID` (`Todo_List_ID`),
    CONSTRAINT `Notes_Todo_ibfk_1` FOREIGN KEY (`Todo_List_ID`) REFERENCES `Todo_List`(`Todo_List_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;