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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

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
(9, 'New Item', 'James', 1, 123456);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`empID`) REFERENCES `users` (`empID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
