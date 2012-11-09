-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 09, 2012 at 01:58 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

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
-- Creation: Nov 05, 2012 at 04:46 AM
--

CREATE TABLE IF NOT EXISTS `friends` (
  `handle1` varchar(18) NOT NULL,
  `handle2` varchar(18) NOT NULL,
  `messages` text NOT NULL,
  PRIMARY KEY (`handle1`,`handle2`),
  KEY `handle1` (`handle1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--
-- Creation: Nov 04, 2012 at 12:24 AM
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
-- Creation: Nov 04, 2012 at 12:24 AM
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
-- Constraints for dumped tables
--

--
-- Constraints for table `friends`
--
ALTER TABLE `friends`
  ADD CONSTRAINT `friends_ibfk_1` FOREIGN KEY (`handle1`) REFERENCES `users` (`Handle`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
