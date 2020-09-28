-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 10, 2020 at 12:40 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zencompliance`
--

-- --------------------------------------------------------

--
-- Table structure for table `password_tokens`
--

DROP TABLE IF EXISTS `password_tokens`;
CREATE TABLE IF NOT EXISTS `password_tokens` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `token` varchar(255) CHARACTER SET utf8 NOT NULL,
  `empID` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `empID` (`empID`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `password_tokens`
--

INSERT INTO `password_tokens` (`id`, `token`, `empID`) VALUES
(2, 'a149a093a2ce3826cd65a1870c3b8033ee095a87', 0),
(3, '80b709ef47e4d8c25615f68e67ed325b6b059909', 0),
(4, 'a9e387c90c9b46e8fc03a1f9db2eddcc1a177736', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
