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
  PRIMARY KEY (`sNo`),
  KEY `empID` (`empID`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tax`
--

INSERT INTO `tax` (`sNo`, `description`, `country`, `ou`, `entity`, `period`, `fy`, `dueFor`, `dueIn`, `empID`, `compliedOn`, `compliedOnMon`) VALUES
(7, 'SARS Corporate Tax Refund', 'South Africa', '511', 'Zensar SA PTY', '', '2017-18', 'April-March', 'January', 97461, '2020-01-27 12:58:25pm', '01'),
(8, 'SARS Corporate Tax Refund', 'South Africa', '511', 'Zensar SA PTY', 'Monthly', '2017-18', 'April-March', 'April', 97461, '2020-01-27 13:22:45pm', '01'),
(9, 'SARS Corporate Tax Refund', 'South Africa', '511', 'Zensar SA PTY', 'Monthly', '2017-18', 'April-March', 'April', 97461, '2020-01-27 13:41:01pm', '01'),
(10, 'SARS Corporate Tax Refund', 'South Africa', '511', 'Zensar SA PTY', 'Monthly', '2017-18', 'April-March', 'April', 97461, '2020-01-27 13:42:18pm', '01'),
(11, 'SARS Corporate Tax Refund', 'South Africa', '511', 'ZTL, SA Branch', 'Monthly', '2017-18', 'April-March', 'April', 97461, '2020-01-27 13:42:40pm', '01'),
(12, 'SARS Corporate Tax Refund', 'South Africa', '511', 'Zensar SA PTY', 'Monthly', '2017-18', 'April-March', 'April', 97461, '2020-01-28 07:36:50am', '01'),
(13, 'SARS Corporate Tax Refund', 'South Africa', '513', 'Zensar SA PTY', 'Monthly', '2017-18', 'April-March', 'April', 97461, '2020-01-28 07:37:12am', '01'),
(14, 'VAT/GST Payment', 'South Africa', '513', 'ZTL, SA Branch', 'Yearly', '2021 - 22', 'April - March', 'July', 97461, '2020-01-28 08:48:05am', '01'),
(15, 'SARS Audit - ITR 14 YOA', 'South Africa', '513', 'ZTL, SA Branch', 'Yearly', '2022 - 23', 'April - March', 'July', 97461, '2020-01-29 11:40:34am', '01'),
(16, 'SARS Audit - ITR 14 YOA', 'South Africa', '511', 'Zensar SA Pty', 'Monthly', '2019 - 20', 'April - March', 'January', 97461, '2020-02-03 08:20:52am', '02'),
(17, 'SARS Audit - ITR 14 YOA', 'South Africa', '511', 'Zensar SA Pty', 'Monthly', '2021 - 22', 'April - March', 'July', 97461, '2020-02-03 08:33:46am', '02'),
(18, 'VAT/GST Payment ', 'South Africa', '513', 'Zensar India', 'Yearly', '2022 - 23', 'March', 'July', 97461, '2020-02-04 07:36:37am', '02'),
(19, 'VAT/GST Payment ', 'South Africa', '513', 'Zensar India', 'Yearly', '2022 - 23', 'March', 'July', 97461, '2020-02-04 07:37:02am', '02'),
(20, 'VAT/GST Payment ', 'South Africa', '513', 'Zensar India', 'Yearly', '2022 - 23', 'March', 'July', 97461, '2020-02-04 07:37:48am', '02'),
(21, 'VAT/GST Payment ', 'South Africa', '513', 'Zensar India', 'Yearly', '2022 - 23', 'March', 'July', 97461, '2020-02-04 07:38:57am', '02'),
(22, 'VAT/GST Payment ', 'South Africa', '513', 'Zensar India', 'Yearly', '2022 - 23', 'March', 'January', 97461, '2020-02-04 07:39:14am', '02'),
(23, 'VAT/GST Payment ', 'South Africa', '513', 'Zensar India', 'Yearly', '2022 - 23', 'March', 'July', 97461, '2020-02-04 07:40:32am', '02'),
(24, 'VAT/GST Payment ', 'South Africa', '513', 'Zensar India', 'Yearly', '2022 - 23', 'March', 'July', 97461, '2020-02-04 08:26:32am', '02'),
(25, 'VAT/GST Payment ', 'South Africa', '513', 'Zensar India', 'Yearly', '2022 - 23', 'March', 'July', 97461, '2020-02-04 12:55:34pm', '02'),
(26, 'VAT/GST Payment ', 'South Africa', '513', 'Zensar India', 'Yearly', '2022 - 23', 'March', 'July', 97461, '2020-02-04 12:56:33pm', '02'),
(27, 'VAT/GST Payment ', 'South Africa', '513', 'Zensar India', 'Yearly', '2022 - 23', 'March', 'July', 97461, '2020-02-04 12:57:32pm', '02'),
(28, 'SARS Audit - ITR 14 YOA', 'South Africa', '513', 'Zensar SA Pty', 'Yearly', '2022 - 23', 'March', 'July', 97461, '2020-02-05 07:38:24am', '02'),
(29, 'New Item', 'South Africa', '513', 'Zensar India', 'Yearly', '2022 - 23', 'March', 'July', 123456, '2020-02-06 07:25:16am', '02'),
(30, 'New Item', 'South Africa', '513', 'Zensar India', 'Yearly', '2022 - 23', 'March', 'July', 123456, '2020-02-06 07:55:15am', '02'),
(31, 'New Item', 'South Africa', '513', 'Zensar India', 'Yearly', '2022 - 23', 'March', 'July', 123456, '2020-02-06 09:19:10am', '02'),
(32, 'New Item', 'South Africa', '513', 'Zensar India', 'Yearly', '2022 - 23', 'March', 'January', 123456, '2020-02-06 09:20:05am', '02');

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
