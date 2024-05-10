-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 25, 2024 at 02:38 PM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `se`
--

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(25) NOT NULL,
  `Prenom` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `système d'exploitation` int NOT NULL,
  `C Avancé` int NOT NULL,
  `ADO` int NOT NULL,
  `THL` int NOT NULL,
  `Développement web` int NOT NULL,
  `password` varchar(10) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`ID`, `Nom`, `Prenom`, `email`, `système d'exploitation`, `C Avancé`, `ADO`, `THL`, `Développement web`, `password`) VALUES
(1, 'Alaoui', 'Ali', 'Ali@gmail.com', 19, 18, 14, 13, 15, 'Ali03'),
(2, 'Lmrabet', 'Youssef', 'Youssef@gmail.com', 15, 12, 19, 14, 17, 'Youssef04'),
(3, 'Selmani', 'Ghita', 'Ghita@gmail.com', 16, 14, 13, 12, 17, 'Ghita02'),
(4, 'Akyab', 'Zaynab', 'Zaynab@gmail', 14, 12, 16, 13, 16, 'Zaynab05');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;