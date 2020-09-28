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
-- Table structure for table `task_details`
--

DROP TABLE IF EXISTS `task_details`;
CREATE TABLE IF NOT EXISTS `task_details` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `task` varchar(160) CHARACTER SET utf8 NOT NULL,
  `deptID` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `deptID` (`deptID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `task_details`
--

INSERT INTO `task_details` (`id`, `task`, `deptID`) VALUES
(1, 'SARS - Corporate Tax Refund', 1),
(2, 'SARS Audit - Procisional Tax YOA', 1),
(3, 'SARS Audit - ITR 14 YOA', 1),
(4, 'VAT/GST Return', 1),
(5, 'VAT/GST Payment ', 1),
(8, 'New Item', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
