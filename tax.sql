-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 27, 2020 at 01:50 PM
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
-- Table structure for table `tax`
--

DROP TABLE IF EXISTS `tax`;
CREATE TABLE IF NOT EXISTS `tax` (
  `sNo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `description` varchar(100) CHARACTER SET utf8 NOT NULL,
  `country` varchar(20) CHARACTER SET utf8 NOT NULL,
  `ou` text CHARACTER SET utf8 NOT NULL,
  `entity` varchar(20) CHARACTER SET utf8 NOT NULL,
  `period` varchar(20) CHARACTER SET utf8 NOT NULL,
  `fy` varchar(10) CHARACTER SET utf8 NOT NULL,
  `dueFor` varchar(20) CHARACTER SET utf8 NOT NULL,
  `dueIn` varchar(20) CHARACTER SET utf8 NOT NULL,
  `empID` int(10) UNSIGNED NOT NULL,
  `compliedOn` varchar(60) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`sNo`),
  KEY `empID` (`empID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tax`
--

INSERT INTO `tax` (`sNo`, `description`, `country`, `ou`, `entity`, `period`, `fy`, `dueFor`, `dueIn`, `empID`, `compliedOn`) VALUES
(7, 'SARS Corporate Tax Refund', 'South Africa', '511', 'Zensar SA PTY', '', '2017-18', 'April-March', 'April', 97461, '2020-01-27 12:58:25pm'),
(8, 'SARS Corporate Tax Refund', 'South Africa', '511', 'Zensar SA PTY', 'Monthly', '2017-18', 'April-March', 'April', 97461, '2020-01-27 13:22:45pm'),
(9, 'SARS Corporate Tax Refund', 'South Africa', '511', 'Zensar SA PTY', 'Monthly', '2017-18', 'April-March', 'April', 97461, '2020-01-27 13:41:01pm'),
(10, 'SARS Corporate Tax Refund', 'South Africa', '511', 'Zensar SA PTY', 'Monthly', '2017-18', 'April-March', 'April', 97461, '2020-01-27 13:42:18pm'),
(11, 'SARS Corporate Tax Refund', 'South Africa', '511', 'ZTL, SA Branch', 'Monthly', '2017-18', 'April-March', 'April', 97461, '2020-01-27 13:42:40pm');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tax`
--
ALTER TABLE `tax`
  ADD CONSTRAINT `tax_ibfk_1` FOREIGN KEY (`empID`) REFERENCES `users` (`empID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
