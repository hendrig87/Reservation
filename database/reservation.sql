-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 24, 2014 at 04:54 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `reservation`
--
CREATE DATABASE IF NOT EXISTS `reservation` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `reservation`;

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE IF NOT EXISTS `user_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(64) NOT NULL,
  `user_fname` varchar(64) DEFAULT NULL,
  `user_lname` varchar(64) DEFAULT NULL,
  `user_email` varchar(20) DEFAULT NULL,
  `user_pass` varchar(64) DEFAULT NULL,
  `user_auth_key` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `user_name`, `user_fname`, `user_lname`, `user_email`, `user_pass`, `user_auth_key`) VALUES
(3, 'ramji', 'ramu', 'ramu', 'rau@ra.co', 'ae3274d5bfa170ca69bb534be5a22467', ''),
(4, '\\sa', 'AS', 'A', 'A@akjs.ud', '8c80b057bc0b599b48cbd144558aeada', ''),
(5, 'admin', 'homnath', 'bagale', 'bhomnath@salyani.com', '21232f297a57a5a743894a0e4a801fc3', '1SYPD8XIWJ');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
