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
-- Table structure for table `taxduetasks`
--

DROP TABLE IF EXISTS `taxduetasks`;
CREATE TABLE IF NOT EXISTS `taxduetasks` (
  `sNo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `country` varchar(60) CHARACTER SET utf8 NOT NULL,
  `ou` int(10) NOT NULL,
  `entity` varchar(60) CHARACTER SET utf8 NOT NULL,
  `description` varchar(110) CHARACTER SET utf8 NOT NULL,
  `fy` varchar(60) CHARACTER SET utf8 NOT NULL,
  `periodicity` varchar(60) CHARACTER SET utf8 NOT NULL,
  `dueFor` varchar(60) CHARACTER SET utf8 NOT NULL,
  `dueIn` varchar(60) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`sNo`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `taxduetasks`
--

INSERT INTO `taxduetasks` (`sNo`, `country`, `ou`, `entity`, `description`, `fy`, `periodicity`, `dueFor`, `dueIn`) VALUES
(1, 'South Africa', 513, 'Zensar SA Pty & ZTL SA Branch', 'SARS - Corporate Tax Refund', '2020 - 21', 'Yearly', 'Apr - Mar', 'June'),
(3, 'South Africa', 513, 'Zensar SA Pty & ZTL SA Branch', 'SARS Audit - ITR 14 YOA ', '2020 - 21', 'On Notice', 'Apr - Mar', 'July'),
(5, 'South Africa', 513, 'Zensar SA Pty & ZTL SA Branch', 'SARS Audit - Provisional Tax YOA ', '2020 - 21', 'On Notice', 'Apr - Mar', 'May'),
(7, 'South Africa', 511, 'Zensar SA Pty & ZTL SA Branch', 'VAT/GST Return', '2020 - 21', 'Monthly', 'Apr', 'Monthly'),
(9, 'South Africa', 511, 'Zensar SA Pty & ZTL SA Branch', 'VAT/GST Payment', '2020 - 21', 'Monthly', 'Apr', 'Monthly');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
