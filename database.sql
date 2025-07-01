-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.4.3 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for hashtagtodo
CREATE DATABASE IF NOT EXISTS `hashtagtodo` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_bin */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `hashtagtodo`;

-- Dumping structure for table hashtagtodo.tasks
CREATE TABLE IF NOT EXISTS `tasks` (
  `taskId` int NOT NULL AUTO_INCREMENT,
  `taskName` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `status` enum('Completed','Not Completed') COLLATE utf8mb4_bin NOT NULL DEFAULT 'Not Completed',
  `added_At` timestamp NOT NULL DEFAULT (now()),
  `updated_At` timestamp NOT NULL DEFAULT (now()) ON UPDATE CURRENT_TIMESTAMP,
  `userId` int NOT NULL,
  PRIMARY KEY (`taskId`),
  KEY `fk_user_id` (`userId`),
  CONSTRAINT `fk_user_id` FOREIGN KEY (`userId`) REFERENCES `users` (`user_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Dumping data for table hashtagtodo.tasks: ~1 rows (approximately)
INSERT IGNORE INTO `tasks` (`taskId`, `taskName`, `status`, `added_At`, `updated_At`, `userId`) VALUES
	(1, 'Do PHP', 'Not Completed', '2025-07-01 11:20:41', '2025-07-01 11:20:41', 1),
	(2, 'juliiusssss', 'Not Completed', '2025-07-01 11:26:19', '2025-07-01 11:26:19', 1);

-- Dumping structure for table hashtagtodo.users
CREATE TABLE IF NOT EXISTS `users` (
  `user_Id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `created_At` timestamp NOT NULL DEFAULT (now()),
  `updated_At` timestamp NOT NULL DEFAULT (now()) ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_Id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Dumping data for table hashtagtodo.users: ~4 rows (approximately)
INSERT IGNORE INTO `users` (`user_Id`, `name`, `email`, `password`, `created_At`, `updated_At`) VALUES
	(1, 'John Doe', 'john.doe@sample.com', '$2y$10$AJ4PJMBvu8VYAvyi5JSCfeeLpLVEnmkBoxbpDmlHTtxhqXU9Rx9vm', '2025-06-28 10:29:04', '2025-06-28 10:29:04'),
	(2, 'Justin Anthony', 'anthony@sample.com', '$2y$10$kU.Ll5K1uFs1/Uz4IP5gte5wB82FXvcjytG1Tvf5QOhaIcePnjLiS', '2025-06-28 13:09:03', '2025-06-28 13:09:03'),
	(3, 'Eli', 'eli@sample.com', '$2y$10$JMpZAl9J/or.0lfjlrv4fuDXE.UdGOEEZV0EHWwwCSqSCyJsUkxyS', '2025-06-28 13:56:29', '2025-06-28 13:56:29'),
	(4, 'Lauv', 'love@sample.com', '$2y$10$Dmyav6zpjVJHNf1kJQL4deOEnAwjnomXQ8138xgez5vb1xUBvV.P6', '2025-07-01 09:22:06', '2025-07-01 09:22:06');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
