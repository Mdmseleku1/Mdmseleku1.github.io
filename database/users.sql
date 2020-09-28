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
(97461, 'Mthokozisi', 'Mseleku', 'mdmseleku95@gmail.com', '0793865820', '$2y$10$m9wDX569yRwySmqJaS0EUuZ6ucli5vnUspAG8au7fKL8bfUpH.PCy', 'bubbles', 'https://i.imgur.com/hb19E1c.png', 1, 1),
(97469, 'Mthokozisi', 'Mseleku', 'mthokozisi.mseleku@zensar.com', '0793865820', '*6FC13CAA9F43CA6F74B384A993727632E63AE970', 'bubbles', 'https://i.imgur.com/hb19E1c.png', 0, 0),
(98765, 'Mthokozisi', 'Mseleku', 'oshtakokapan@gmail.com', '0793865820', '$2y$10$wVs23.9wCn8TP5A9CYehJuOBLIKJAXqgyRQ.DMlSYC8HOPg.Flyl6', 'bubbles', 'https://i.imgur.com/hb19E1c.png', 1, 0),
(123456, 'James', 'Bond', 'jgordon9501@gmail.com', '0793865820', '$2y$10$03BLeiIN29b5y6/Oc/TwXuDy0ee0tR6hRo8HdjZJKJv4ONW0IIIoK', 'bubbles', 'https://i.imgur.com/hb19E1c.png', 1, 0),
(807968, 'Jimmy', 'telele', 'jimmy@gmail.com', '0123456789', '$2y$10$7K5/XbvwWRPr44swONVt5ecUnDimX5xliVeKatQus9NmTDtttL5ya', 'bubbles', 'https://i.imgur.com/hb19E1c.png', 1, 0),
(876543, 'Jimmy', 'Bravo', 'jim@gmail.com', '0793865820', '$2y$10$TGg4kkBPsw.EqiWAT.DzmurLeCMKT5czGSoHnkAcGZKVOW1Sx5TGm', 'bubbles', 'https://i.imgur.com/hb19E1c.png', 1, 0),
(987654, 'Mthokozisi', 'Mseleku', 'email@gmail.com', '0793865820', '$2y$10$MbY.ylgF9byZRP.6VagxWOPi6iyJbkqT3nchPwdy/lgOU2pLQ6J4i', 'bubbles', 'https://i.imgur.com/hb19E1c.png', 1, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
