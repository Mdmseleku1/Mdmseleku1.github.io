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
-- Table structure for table `fy_details`
--

DROP TABLE IF EXISTS `fy_details`;
CREATE TABLE IF NOT EXISTS `fy_details` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `fy` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `deptID` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `deptID` (`deptID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `fy_details`
--

INSERT INTO `fy_details` (`id`, `fy`, `deptID`) VALUES
(1, '2017 - 18', 1),
(2, '2018 - 19', 1),
(3, '2019 - 20', 1),
(4, '2020 - 21', 1),
(5, '2021 - 22', 1),
(6, '2022 - 23', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
