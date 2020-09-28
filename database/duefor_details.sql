-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 10, 2020 at 12:39 PM
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
-- Table structure for table `duefor_details`
--

DROP TABLE IF EXISTS `duefor_details`;
CREATE TABLE IF NOT EXISTS `duefor_details` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `dueFor` varchar(20) CHARACTER SET utf8 NOT NULL,
  `deptID` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `deptID` (`deptID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `duefor_details`
--

INSERT INTO `duefor_details` (`id`, `dueFor`, `deptID`) VALUES
(2, 'April', 1),
(3, 'May', 1),
(4, 'April - March', 1),
(5, 'March', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
