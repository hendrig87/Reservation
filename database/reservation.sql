-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 28, 2014 at 12:04 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

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
-- Table structure for table `room_registration`
--

CREATE TABLE IF NOT EXISTS `room_registration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_name` varchar(255) NOT NULL,
  `no_of_room` int(11) NOT NULL,
  `price` double NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=62 ;

--
-- Dumping data for table `room_registration`
--

INSERT INTO `room_registration` (`id`, `room_name`, `no_of_room`, `price`, `description`, `image`) VALUES
(44, 'Luxury', 1, 34, 'dfgsdfgsdg', '2P2Z41.png'),
(45, 'Luxury', 1, 34, 'dfgsdfgsdg', '2P2Z42.png'),
(46, 'Luxury', 1, 34, 'dfgsdfgsdg', '2P2Z43.png'),
(47, 'Deluxe', 1, 23, 'eewterwtwe', ''),
(48, 'dfasfas', 1, 34, 'asdfsafas', ''),
(49, '', 1, 0, '', ''),
(50, '', 1, 0, 'zfggfs', ''),
(51, '', 1, 0, 'sgdfgsd', ''),
(52, '', 9, 0, '', ''),
(53, '', 13, 0, '', ''),
(54, '', 1, 0, '', ''),
(55, '', 1, 0, '', ''),
(56, '', 1, 0, '', ''),
(57, '', 1, 0, '', 'American-Double-Beef-Cheese-Burger-11.jpg'),
(58, '', 1, 0, '', '2P2Z44.png'),
(59, 'a', 1, 0, '', ''),
(60, '', 1, 0, '', 'American-Double-Beef-Cheese-Burger-12.jpg'),
(61, '', 1, 0, '', 'American-Double-Beef-Cheese-Burger-13.jpg');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `user_name`, `user_fname`, `user_lname`, `user_email`, `user_pass`, `user_auth_key`) VALUES
(3, 'ramji', 'ramu', 'ramu', 'rau@ra.co', 'ae3274d5bfa170ca69bb534be5a22467', ''),
(4, '\\sa', 'AS', 'A', 'A@akjs.ud', '8c80b057bc0b599b48cbd144558aeada', ''),
(5, 'admin', 'homnath', 'bagale', 'bhomnath@salyani.com', '21232f297a57a5a743894a0e4a801fc3', '1SYPD8XIWJ'),
(6, 'sushil', 'shrerha', 'lakfals', 'sushilsth21@gmail.co', '698d51a19d8a121ce581499d7b701668', ''),
(7, 'ksadfjlsafj', 'sadfkl', 'kldgjsdkl', 'sunil@gmail.com', '912ec803b2ce49e4a541068d495ab570', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
