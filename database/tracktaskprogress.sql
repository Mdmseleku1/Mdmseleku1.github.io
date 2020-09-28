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
-- Table structure for table `tracktaskprogress`
--

DROP TABLE IF EXISTS `tracktaskprogress`;
CREATE TABLE IF NOT EXISTS `tracktaskprogress` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `early` int(10) NOT NULL DEFAULT 0,
  `onTime` int(10) NOT NULL DEFAULT 0,
  `late` int(10) NOT NULL DEFAULT 0,
  `empID` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `empID` (`empID`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tracktaskprogress`
--

INSERT INTO `tracktaskprogress` (`id`, `early`, `onTime`, `late`, `empID`) VALUES
(1, 0, 0, 1, NULL),
(2, 0, 0, 1, NULL),
(3, 21, 2, 1, NULL),
(4, 21, 1, 2, 123456),
(5, 20, 1, 3, 123456),
(6, 21, 1, 2, 123456),
(7, 22, 1, 2, 123456),
(8, 22, 1, 3, 123456),
(9, 22, 1, 3, 123456),
(10, 22, 1, 3, 123456),
(11, 22, 1, 3, 987654),
(12, 22, 1, 3, 123456),
(13, 22, 1, 3, 987654),
(14, 22, 1, 3, 987654),
(15, 22, 1, 3, 987654),
(16, 22, 1, 3, 987654),
(17, 22, 1, 3, 987654),
(18, 0, 0, 0, 987654),
(19, 3, 0, 1, 123456),
(20, 19, 1, 2, 97461),
(21, 3, 0, 1, 123456),
(22, 0, 0, 0, 987654),
(23, 19, 1, 2, 97461),
(24, 19, 1, 2, 97461),
(25, 19, 1, 2, 97461),
(26, 19, 1, 2, 97461),
(27, 19, 1, 2, 97461),
(28, 19, 1, 2, 97461),
(29, 19, 1, 2, 97461),
(30, 19, 1, 2, 97461),
(31, 19, 1, 2, 97461);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tracktaskprogress`
--
ALTER TABLE `tracktaskprogress`
  ADD CONSTRAINT `tracktaskprogress_ibfk_1` FOREIGN KEY (`empID`) REFERENCES `users` (`empID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
