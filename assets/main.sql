-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 26, 2019 at 05:03 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `main`
--
CREATE DATABASE IF NOT EXISTS `main` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `main`;

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE IF NOT EXISTS `buyer` (
  `buyerid` int(11) NOT NULL AUTO_INCREMENT,
  `buyername` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `conpassword` varchar(30) NOT NULL,
  `email` varchar(20) NOT NULL,
  `licenseno` varchar(15) NOT NULL,
  `mobileno` varchar(10) NOT NULL,
  PRIMARY KEY (`buyerid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `buyer`
--

INSERT INTO `buyer` (`buyerid`, `buyername`, `password`, `conpassword`, `email`, `licenseno`, `mobileno`) VALUES
(10, 'nishi7', 'nishi98', 'nishi98', 'nishi.shah21@gmail.c', 'GJ2120193564874', '9435265937'),
(11, 'twinkle3', 'qwe123', 'qwe123', 'twinkle3@gmail.com', 'GJ2120145423879', '9856418554'),
(12, 'nirav78', 'asd12q', 'asd12q', 'nir.av3@gmail.com', 'GJ2120125412987', '9654356884');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `proid` int(11) NOT NULL AUTO_INCREMENT,
  `proname` varchar(30) NOT NULL,
  `endtime` time NOT NULL,
  `bidamnt` int(11) NOT NULL,
  `descr` varchar(500) NOT NULL,
  PRIMARY KEY (`proid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE IF NOT EXISTS `seller` (
  `userid` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `conpassword` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pancardno` varchar(10) NOT NULL,
  `mobileno` varchar(10) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`userid`, `username`, `password`, `conpassword`, `email`, `pancardno`, `mobileno`) VALUES
(5, 'adiipatel', 'adi123', 'adi123', 'adip232@gmail.com', 'AQWSE6512W', '9409523164'),
(6, 'malay8', 'ma234', 'ma234', 'malay8@gmail.com', 'GEDSF6432T', '8000802025'),
(7, 'narsi46', 'narsij12', 'narsij12', 'narsi.joshi7@gmail.com', 'DEWSF3241T', '9656453643'),
(8, 'bhavya49', 'bhavyas2', 'bhavyas2', 'bhavya21@gmail.com', 'DWSRF3487R', '9756423749');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
