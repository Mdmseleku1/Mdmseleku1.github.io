-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 19, 2020 at 07:34 AM
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
-- Table structure for table `country_details`
--

DROP TABLE IF EXISTS `country_details`;
CREATE TABLE IF NOT EXISTS `country_details` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `country` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `deptID` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `deptID` (`deptID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `country_details`
--

INSERT INTO `country_details` (`id`, `country`, `deptID`) VALUES
(1, 'South Africa', 1),
(2, 'India', 1),
(3, 'United Kingdom', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `duefor_details`
--

INSERT INTO `duefor_details` (`id`, `dueFor`, `deptID`) VALUES
(2, 'April', 1),
(3, 'May', 1),
(4, 'April - March', 1),
(5, 'March', 1),
(6, 'Tax for 2017', 1),
(7, 'Quarterly', 1);

-- --------------------------------------------------------

--
-- Table structure for table `duein_details`
--

DROP TABLE IF EXISTS `duein_details`;
CREATE TABLE IF NOT EXISTS `duein_details` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `dueIn` varchar(20) CHARACTER SET utf8 NOT NULL,
  `deptID` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `deptID` (`deptID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `duein_details`
--

INSERT INTO `duein_details` (`id`, `dueIn`, `deptID`) VALUES
(1, 'April', 1),
(2, 'May', 1),
(3, 'June', 1),
(4, 'July', 1),
(6, 'January', 1);

-- --------------------------------------------------------

--
-- Table structure for table `entity_details`
--

DROP TABLE IF EXISTS `entity_details`;
CREATE TABLE IF NOT EXISTS `entity_details` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `entity` varchar(60) CHARACTER SET utf8 NOT NULL,
  `deptID` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `deptID` (`deptID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `entity_details`
--

INSERT INTO `entity_details` (`id`, `entity`, `deptID`) VALUES
(1, 'Zensar SA Pty', 1),
(2, 'ZTL, SA Branch', 1),
(4, 'Zensar India', 1),
(5, 'Zensar China', 1);

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

-- --------------------------------------------------------

--
-- Table structure for table `login_tokens`
--

DROP TABLE IF EXISTS `login_tokens`;
CREATE TABLE IF NOT EXISTS `login_tokens` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `token` varchar(255) CHARACTER SET utf8 NOT NULL,
  `empID` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `empID` (`empID`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `login_tokens`
--

INSERT INTO `login_tokens` (`id`, `token`, `empID`) VALUES
(58, '358b00a101580605f9515d39bf311245ed802a17', 123456);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `subject` varchar(60) CHARACTER SET utf8 NOT NULL,
  `text` varchar(120) COLLATE latin1_general_ci NOT NULL,
  `status` int(3) NOT NULL,
  `empID` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `empID` (`empID`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `subject`, `text`, `status`, `empID`) VALUES
(1, 'VAT/GST Payment ', 'Mthokozisi', 1, 97461),
(2, 'VAT/GST Payment ', 'Mthokozisi', 1, 97461),
(3, 'VAT/GST Payment ', 'Mthokozisi', 1, 97461),
(4, 'VAT/GST Payment ', 'Mthokozisi', 1, 97461),
(5, 'SARS Audit - ITR 14 YOA', 'Mthokozisi', 1, 97461),
(6, 'New Item', 'James', 1, 123456),
(7, 'New Item', 'James', 1, 123456),
(8, 'New Item', 'James', 1, 123456),
(9, 'New Item', 'James', 1, 123456),
(10, 'New Item', 'Mthokozisi', 1, 97461),
(11, 'New Item', 'James', 1, 123456),
(12, 'New Item', 'James', 1, 123456),
(13, 'New item 6', 'James', 1, 123456),
(14, 'New item 5', 'James', 1, 123456),
(15, 'New item 6', 'Mthokozisi', 1, 97461),
(16, 'VAT/GST Return', 'Mthokozisi', 1, 97461),
(17, 'New item 6', 'James', 1, 123456);

-- --------------------------------------------------------

--
-- Table structure for table `ou_details`
--

DROP TABLE IF EXISTS `ou_details`;
CREATE TABLE IF NOT EXISTS `ou_details` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ou` int(10) NOT NULL,
  `deptID` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `deptID` (`deptID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `ou_details`
--

INSERT INTO `ou_details` (`id`, `ou`, `deptID`) VALUES
(1, 511, 1),
(2, 513, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `password_tokens`
--

INSERT INTO `password_tokens` (`id`, `token`, `empID`) VALUES
(2, 'a149a093a2ce3826cd65a1870c3b8033ee095a87', 0),
(3, '80b709ef47e4d8c25615f68e67ed325b6b059909', 0),
(4, 'a9e387c90c9b46e8fc03a1f9db2eddcc1a177736', 0);

-- --------------------------------------------------------

--
-- Table structure for table `period_details`
--

DROP TABLE IF EXISTS `period_details`;
CREATE TABLE IF NOT EXISTS `period_details` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `period` varchar(20) CHARACTER SET utf8 NOT NULL,
  `deptID` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `deptID` (`deptID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `period_details`
--

INSERT INTO `period_details` (`id`, `period`, `deptID`) VALUES
(1, 'On Notice', 1),
(2, 'Monthly', 1),
(3, 'Yearly', 1),
(6, 'Weekly', 1);

-- --------------------------------------------------------

--
-- Table structure for table `task_details`
--

DROP TABLE IF EXISTS `task_details`;
CREATE TABLE IF NOT EXISTS `task_details` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `task` varchar(160) CHARACTER SET utf8 NOT NULL,
  `deptID` int(10) NOT NULL,
  `taskType` tinyint(2) NOT NULL,
  `linkedTo` varchar(100) CHARACTER SET utf8 NOT NULL,
  `dueMonth` varchar(10) CHARACTER SET utf8 NOT NULL,
  `dueYear` varchar(10) CHARACTER SET utf8 NOT NULL,
  `dueDay` tinyint(2) NOT NULL,
  `status` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `deptID` (`deptID`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `task_details`
--

INSERT INTO `task_details` (`id`, `task`, `deptID`, `taskType`, `linkedTo`, `dueMonth`, `dueYear`, `dueDay`, `status`) VALUES
(2, 'SARS Audit - Procisional Tax YOA', 1, 0, '', '', '', 0, 0),
(3, 'SARS Audit - ITR 14 YOA', 1, 0, '', '', '', 0, 0),
(4, 'VAT/GST Return', 1, 2, 'SARS - Corporate Tax Refunds', '4', '2020', 18, 0),
(5, 'VAT/GST Payment ', 1, 0, '', '', '', 0, 0),
(9, 'New Item 2', 1, 1, '0', '2', '2020', 26, 0),
(10, 'New item 3', 1, 2, 'New Item 2', '3', '2020', 19, 1),
(12, 'New item 5', 1, 2, 'SARS - Corporate Tax Refunds', '1', '2021', 0, 1),
(13, 'SARS - Corporate Tax Refunds', 1, 1, '0', '12', '2021', 27, 0),
(15, 'New item 4', 1, 1, '0', '3', '2020', 1, 0),
(16, 'New item 6', 1, 2, 'New item 4', '2', '2020', 9, 1),
(22, 'New item 4', 1, 1, '0', '2', '2020', 28, 0);

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
  `compliedOnMon` varchar(20) CHARACTER SET utf8 NOT NULL DEFAULT current_timestamp(),
  `day` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`sNo`),
  KEY `empID` (`empID`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tax`
--

INSERT INTO `tax` (`sNo`, `description`, `country`, `ou`, `entity`, `period`, `fy`, `dueFor`, `dueIn`, `empID`, `compliedOn`, `compliedOnMon`, `day`) VALUES
(7, 'SARS Corporate Tax Refund', 'South Africa', '511', 'Zensar SA PTY', '', '2017-18', 'April-March', 'January', 97461, '2020-01-27 12:58:25pm', '01', NULL),
(8, 'SARS Corporate Tax Refund', 'South Africa', '511', 'Zensar SA PTY', 'Monthly', '2017-18', 'April-March', 'April', 97461, '2020-01-27 13:22:45pm', '01', NULL),
(9, 'SARS Corporate Tax Refund', 'South Africa', '511', 'Zensar SA PTY', 'Monthly', '2017-18', 'April-March', 'April', 97461, '2020-01-27 13:41:01pm', '01', NULL),
(10, 'SARS Corporate Tax Refund', 'South Africa', '511', 'Zensar SA PTY', 'Monthly', '2017-18', 'April-March', 'April', 97461, '2020-01-27 13:42:18pm', '01', NULL),
(11, 'SARS Corporate Tax Refund', 'South Africa', '511', 'ZTL, SA Branch', 'Monthly', '2017-18', 'April-March', 'April', 97461, '2020-01-27 13:42:40pm', '01', NULL),
(12, 'SARS Corporate Tax Refund', 'South Africa', '511', 'Zensar SA PTY', 'Monthly', '2017-18', 'April-March', 'April', 97461, '2020-01-28 07:36:50am', '01', NULL),
(13, 'SARS Corporate Tax Refund', 'South Africa', '513', 'Zensar SA PTY', 'Monthly', '2017-18', 'April-March', 'April', 97461, '2020-01-28 07:37:12am', '01', NULL),
(14, 'VAT/GST Payment', 'South Africa', '513', 'ZTL, SA Branch', 'Yearly', '2021 - 22', 'April - March', 'July', 97461, '2020-01-28 08:48:05am', '01', NULL),
(15, 'SARS Audit - ITR 14 YOA', 'South Africa', '513', 'ZTL, SA Branch', 'Yearly', '2022 - 23', 'April - March', 'July', 97461, '2020-01-29 11:40:34am', '01', NULL),
(16, 'SARS Audit - ITR 14 YOA', 'South Africa', '511', 'Zensar SA Pty', 'Monthly', '2019 - 20', 'April - March', 'January', 97461, '2020-02-03 08:20:52am', '02', NULL),
(17, 'SARS Audit - ITR 14 YOA', 'South Africa', '511', 'Zensar SA Pty', 'Monthly', '2021 - 22', 'April - March', 'July', 97461, '2020-02-03 08:33:46am', '02', NULL),
(18, 'VAT/GST Payment ', 'South Africa', '513', 'Zensar India', 'Yearly', '2022 - 23', 'March', 'July', 97461, '2020-02-04 07:36:37am', '02', NULL),
(19, 'VAT/GST Payment ', 'South Africa', '513', 'Zensar India', 'Yearly', '2022 - 23', 'March', 'July', 97461, '2020-02-04 07:37:02am', '02', NULL),
(20, 'VAT/GST Payment ', 'South Africa', '513', 'Zensar India', 'Yearly', '2022 - 23', 'March', 'July', 97461, '2020-02-04 07:37:48am', '02', NULL),
(21, 'VAT/GST Payment ', 'South Africa', '513', 'Zensar India', 'Yearly', '2022 - 23', 'March', 'July', 97461, '2020-02-04 07:38:57am', '02', NULL),
(22, 'VAT/GST Payment ', 'South Africa', '513', 'Zensar India', 'Yearly', '2022 - 23', 'March', 'January', 97461, '2020-02-04 07:39:14am', '02', NULL),
(23, 'VAT/GST Payment ', 'South Africa', '513', 'Zensar India', 'Yearly', '2022 - 23', 'March', 'July', 97461, '2020-02-04 07:40:32am', '02', NULL),
(24, 'VAT/GST Payment ', 'South Africa', '513', 'Zensar India', 'Yearly', '2022 - 23', 'March', 'July', 97461, '2020-02-04 08:26:32am', '02', NULL),
(25, 'VAT/GST Payment ', 'South Africa', '513', 'Zensar India', 'Yearly', '2022 - 23', 'March', 'July', 97461, '2020-02-04 12:55:34pm', '02', NULL),
(26, 'VAT/GST Payment ', 'South Africa', '513', 'Zensar India', 'Yearly', '2022 - 23', 'March', 'July', 97461, '2020-02-04 12:56:33pm', '02', NULL),
(27, 'VAT/GST Payment ', 'South Africa', '513', 'Zensar India', 'Yearly', '2022 - 23', 'March', 'July', 97461, '2020-02-04 12:57:32pm', '02', NULL),
(28, 'SARS Audit - ITR 14 YOA', 'South Africa', '513', 'Zensar SA Pty', 'Yearly', '2022 - 23', 'March', 'July', 97461, '2020-02-05 07:38:24am', '02', NULL),
(29, 'New Item', 'South Africa', '513', 'Zensar India', 'Yearly', '2022 - 23', 'March', 'July', 123456, '2020-02-06 07:25:16am', '02', NULL),
(30, 'New Item', 'South Africa', '513', 'Zensar India', 'Yearly', '2022 - 23', 'March', 'July', 123456, '2020-02-06 07:55:15am', '02', NULL),
(31, 'New Item', 'South Africa', '513', 'Zensar India', 'Yearly', '2022 - 23', 'March', 'July', 123456, '2020-02-06 09:19:10am', '02', NULL),
(32, 'New Item', 'South Africa', '513', 'Zensar India', 'Yearly', '2022 - 23', 'March', 'January', 123456, '2020-02-06 09:20:05am', '02', NULL),
(33, 'New Item', 'South Africa', '513', 'Zensar India', 'Yearly', '2022 - 23', 'March', 'January', 97461, '2020-02-10 13:18:28pm', '02', NULL),
(34, 'New Item', 'South Africa', '513', 'Zensar India', 'Yearly', '2022 - 23', 'March', 'January', 123456, '2020-02-10 13:36:31pm', '02', NULL),
(35, 'New Item', 'South Africa', '513', 'Zensar India', 'Yearly', '2022 - 23', 'March', 'January', 123456, '2020-02-12 06:20:30am', '02', NULL),
(36, 'New item 6', 'South Africa', '513', 'Zensar SA Pty', 'Monthly', '2020 - 21', 'March', 'July', 123456, '2020-02-17 08:59:38am', '02', 16),
(37, 'New item 5', 'United Kingdom', '513', 'Zensar China', 'Yearly', '2022 - 23', 'Quarterly', 'January', 123456, '2020-02-17 09:00:24am', '02', NULL),
(38, 'New item 6', 'United Kingdom', '513', 'Zensar China', 'Yearly', '2019 - 20', 'Quarterly', 'January', 97461, '2020-02-17 11:49:27am', '02', 1),
(39, 'VAT/GST Return', 'United Kingdom', '513', 'Zensar China', 'Yearly', '2022 - 23', 'Quarterly', 'January', 97461, '2020-02-19 06:20:53am', '02', NULL),
(40, 'New item 6', 'United Kingdom', '513', 'Zensar China', 'Weekly', '2022 - 23', 'Quarterly', 'January', 123456, '2020-02-19 07:09:30am', '02', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

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
(31, 19, 1, 2, 97461),
(32, 3, 0, 1, 123456),
(33, 3, 0, 1, 123456),
(34, 22, 1, 4, 97461),
(35, 22, 1, 4, 97461),
(36, 22, 1, 4, 123456),
(37, 3, 0, 1, 123456),
(38, 22, 1, 4, 123456),
(39, 3, 0, 1, 123456),
(40, 3, 0, 2, 123456),
(41, 3, 0, 2, 123456),
(42, 22, 1, 5, 123456),
(43, 3, 0, 2, 123456),
(44, 3, 0, 3, 123456),
(45, 22, 1, 6, 123456),
(46, 3, 0, 3, 123456),
(47, 3, 0, 3, 123456),
(48, 22, 1, 6, 123456),
(49, 22, 1, 6, 123456),
(50, 3, 0, 3, 123456),
(51, 3, 0, 3, 123456),
(52, 3, 0, 3, 123456),
(53, 3, 0, 3, 123456),
(54, 3, 0, 3, 123456),
(55, 3, 0, 3, 123456),
(56, 3, 0, 3, 123456),
(57, 3, 0, 3, 123456),
(58, 3, 0, 3, 123456),
(59, 3, 0, 3, 123456),
(60, 3, 0, 3, 123456),
(61, 3, 0, 3, 123456),
(62, 22, 1, 6, 123456),
(63, 3, 0, 3, 123456),
(64, 22, 1, 6, 123456),
(65, 22, 1, 6, 123456),
(66, 3, 0, 3, 123456),
(67, 22, 1, 6, 123456),
(68, 22, 1, 6, 123456),
(69, 22, 1, 6, 123456),
(70, 22, 1, 6, 123456),
(71, 22, 1, 6, 123456),
(72, 22, 1, 6, 123456),
(73, 22, 1, 6, 123456),
(74, 22, 1, 6, 123456),
(75, 22, 1, 6, 123456),
(76, 22, 1, 6, 123456),
(77, 22, 1, 6, 123456),
(78, 22, 1, 6, 123456),
(79, 22, 1, 6, 123456),
(80, 22, 1, 6, 123456),
(81, 22, 1, 6, 123456),
(82, 22, 1, 6, 123456),
(83, 3, 0, 3, 123456),
(84, 3, 0, 3, 123456),
(85, 3, 0, 3, 123456),
(86, 4, 0, 3, 123456),
(87, 4, 0, 4, 123456),
(88, 4, 0, 4, 123456),
(89, 23, 1, 7, 123456),
(90, 4, 0, 4, 123456),
(91, 19, 1, 4, 97461),
(92, 19, 1, 4, 97461),
(93, 19, 1, 4, 97461),
(94, 19, 1, 4, 97461),
(95, 19, 1, 4, 97461),
(96, 19, 1, 4, 97461),
(97, 19, 1, 4, 97461),
(98, 19, 1, 4, 97461),
(99, 19, 1, 5, 97461),
(100, 19, 1, 5, 97461),
(101, 4, 0, 4, 123456),
(102, 4, 0, 4, 123456),
(103, 4, 0, 4, 123456),
(104, 4, 0, 5, 123456),
(105, 4, 0, 5, 123456),
(106, 4, 0, 5, 123456);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `empID` int(10) UNSIGNED NOT NULL,
  `firstName` varchar(60) CHARACTER SET utf8 NOT NULL,
  `lastName` varchar(60) CHARACTER SET utf8 NOT NULL,
  `email` varchar(60) CHARACTER SET utf8 NOT NULL,
  `phoneNum` varchar(15) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `securityAns` text CHARACTER SET utf8 NOT NULL,
  `profilePic` varchar(60) CHARACTER SET utf8 NOT NULL DEFAULT 'https://i.imgur.com/hb19E1c.png',
  `deptID` int(10) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  PRIMARY KEY (`empID`),
  KEY `deptID` (`deptID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`empID`, `firstName`, `lastName`, `email`, `phoneNum`, `password`, `securityAns`, `profilePic`, `deptID`, `isAdmin`) VALUES
(97461, 'Mthokozisi', 'Mseleku', 'mdmseleku95@gmail.com', '0793865820', '$2y$10$hFqJu1MBG8QRZo2sJD6VzuuXJwFDPzAYIs5zH994fbRHBBNx5JZ.6', 'bubbles', 'https://i.imgur.com/hb19E1c.png', 1, 1),
(97469, 'Mthokozisi', 'Mseleku', 'mthokozisi.mseleku@zensar.com', '0793865820', '*6FC13CAA9F43CA6F74B384A993727632E63AE970', 'bubbles', 'https://i.imgur.com/hb19E1c.png', 0, 0),
(98765, 'Mthokozisi', 'Mseleku', 'oshtakokapan@gmail.com', '0793865820', '$2y$10$wVs23.9wCn8TP5A9CYehJuOBLIKJAXqgyRQ.DMlSYC8HOPg.Flyl6', 'bubbles', 'https://i.imgur.com/hb19E1c.png', 1, 0),
(123456, 'James', 'Bond', 'jgordon9501@gmail.com', '0793865820', '$2y$10$Vxa46a.gcRQ6HNP9HTGlBOaiebWyjbQ.3yDHZT.3vYPlz15yZb3yG', 'bubbles', 'https://i.imgur.com/hb19E1c.png', 1, 1),
(132435, 'Monash', 'University', 'test2@gmail.com', '0793865820', '$2y$10$eDwUCnQSi9xt4bqUt3LWdOQIw8eLTEJJg56upbQ4izVovl1qUpHIO', 'bubbles', 'https://i.imgur.com/hb19E1c.png', 0, 0),
(807968, 'Jimmy', 'telele', 'jimmy@gmail.com', '0123456789', '$2y$10$7K5/XbvwWRPr44swONVt5ecUnDimX5xliVeKatQus9NmTDtttL5ya', 'bubbles', 'https://i.imgur.com/hb19E1c.png', 1, 0),
(876543, 'Jimmy', 'Bravo', 'jim@gmail.com', '0793865820', '$2y$10$TGg4kkBPsw.EqiWAT.DzmurLeCMKT5czGSoHnkAcGZKVOW1Sx5TGm', 'bubbles', 'https://i.imgur.com/hb19E1c.png', 1, 0),
(987654, 'Mthokozisi', 'Mseleku', 'email@gmail.com', '0793865820', '$2y$10$MbY.ylgF9byZRP.6VagxWOPi6iyJbkqT3nchPwdy/lgOU2pLQ6J4i', 'bubbles', 'https://i.imgur.com/hb19E1c.png', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `view`
--

DROP TABLE IF EXISTS `view`;
CREATE TABLE IF NOT EXISTS `view` (
  `empID` int(10) UNSIGNED NOT NULL,
  `view` varchar(10) CHARACTER SET utf8 NOT NULL,
  `view2` varchar(10) CHARACTER SET utf8 NOT NULL,
  `view3` varchar(10) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`empID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `view`
--

INSERT INTO `view` (`empID`, `view`, `view2`, `view3`) VALUES
(987654, 'viewOwn', 'viewOwn', 'viewOwn'),
(97461, 'viewOwn', 'viewComp', 'viewOwn'),
(123456, 'viewOwn', 'viewComp', 'viewOwn');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `login_tokens`
--
ALTER TABLE `login_tokens`
  ADD CONSTRAINT `login_tokens_ibfk_1` FOREIGN KEY (`empID`) REFERENCES `users` (`empID`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`empID`) REFERENCES `users` (`empID`);

--
-- Constraints for table `tax`
--
ALTER TABLE `tax`
  ADD CONSTRAINT `tax_ibfk_1` FOREIGN KEY (`empID`) REFERENCES `users` (`empID`);

--
-- Constraints for table `tracktaskprogress`
--
ALTER TABLE `tracktaskprogress`
  ADD CONSTRAINT `tracktaskprogress_ibfk_1` FOREIGN KEY (`empID`) REFERENCES `users` (`empID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
