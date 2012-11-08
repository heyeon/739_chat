-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2012 at 01:24 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `connect`
--
CREATE DATABASE `connect` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `connect`;

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE IF NOT EXISTS `friends` (
  `handle1` varchar(18) NOT NULL,
  `handle2` varchar(18) NOT NULL,
  `messages` text NOT NULL,
  PRIMARY KEY (`handle1`,`handle2`),
  KEY `handle1` (`handle1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`handle1`, `handle2`, `messages`) VALUES
('aa', 'ab', ''),
('aa', 'borno', ''),
('aa', 'borno2', '');

-- --------------------------------------------------------

--
-- Table structure for table `loadinfo`
--

CREATE TABLE IF NOT EXISTS `loadinfo` (
  `ServerIP` int(11) NOT NULL,
  `NumConns` int(11) NOT NULL,
  PRIMARY KEY (`ServerIP`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `Handle` varchar(16) NOT NULL,
  `Message` text NOT NULL,
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `Handle` varchar(18) NOT NULL,
  `Password` text NOT NULL,
  `EMail` text NOT NULL,
  `FName` text NOT NULL,
  `LName` text NOT NULL,
  `IsConnected` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Handle`),
  UNIQUE KEY `Handle` (`Handle`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Handle`, `Password`, `EMail`, `FName`, `LName`, `IsConnected`) VALUES
('', '$1$mB4.1D2.$tGWbtEvsFh7RYDhvBfT1y/', '', '', '', 0),
('aa', '0$4LDvVLxB8CI', 'aa', 'a', 'a', 1),
('ab', '$1$Sj5.z4/.$P3.Da4n6GtU3yVALKw8ZA1', 'ab', 'bo', 'rno', 0),
('borno', '$1$2F5.hY4.$Aydk4u68lMOl3rFGc1M1e/', 'dsfsf', 'borno', 'akhter', 0),
('borno2', '*1518DD839417E62F85A86B63403A4AD11F846CFF', 'borno', 'borno2', 'akhter', 0),
('borno3', '$1$A.0.Jp5.$0TU60pSyHwuGkZiWKfHmU0', 'dsfsf', 'borno', 'akhter', 0),
('borno4', '$1$av1.bk..$gTF.YhGPInLrZv15uv.Rs0', 'blabla', 'borno', 'akhter', 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `friends`
--
ALTER TABLE `friends`
  ADD CONSTRAINT `friends_ibfk_2` FOREIGN KEY (`handle1`) REFERENCES `users` (`Handle`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
