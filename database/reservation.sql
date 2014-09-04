-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 04, 2014 at 07:27 AM
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
-- Table structure for table `app_info`
--

CREATE TABLE IF NOT EXISTS `app_info` (
  `id` varchar(15) NOT NULL,
  `api_name` varchar(200) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  UNIQUE KEY `id` (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `app_info`
--

INSERT INTO `app_info` (`id`, `api_name`, `user_id`) VALUES
('172QcAUY7r', 'sample api', '15');

-- --------------------------------------------------------

--
-- Table structure for table `booked_room_info`
--

CREATE TABLE IF NOT EXISTS `booked_room_info` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `booking_id` varchar(64) NOT NULL,
  `room_type` varchar(200) NOT NULL,
  `no_of_rooms_booked` varchar(64) NOT NULL,
  `check_in_date` varchar(50) NOT NULL,
  `check_out_date` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=157 ;

--
-- Dumping data for table `booked_room_info`
--

INSERT INTO `booked_room_info` (`id`, `booking_id`, `room_type`, `no_of_rooms_booked`, `check_in_date`, `check_out_date`) VALUES
(40, '90', 'bibesh ko room', '1', '2014-08-11', '2014-08-12'),
(41, '90', 'new central palm', '1', '2014-08-11', '2014-08-12'),
(42, '91', 'bibesh ko room', '1', '2014-08-11', '2014-08-12'),
(43, '92', 'bibesh ko room', '1', '2014-08-11', '2014-08-12'),
(44, '93', 'naya user room1', '3', '2014-08-11', '2014-08-12'),
(45, '94', 'naya user room1', '2', '2014-08-17', '2014-08-18'),
(46, '95', 'naya user room1', '1', '2014-08-18', '2014-08-19'),
(47, '96', 'naya user room1', '1', '2014-08-20', '2014-08-21'),
(48, '97', 'naya user room1', '2', '2014-08-21', '2014-08-22'),
(49, '98', 'naya user room1', '3', '2014-08-27', '2014-08-28'),
(50, '99', 'Super Luxury Room', '3', '2014-08-12', '2014-08-13'),
(51, '99', 'Economy Room', '2', '2014-08-12', '2014-08-13'),
(52, '99', 'Deluxe Room', '1', '2014-08-12', '2014-08-13'),
(53, '100', 'bibesh ko room', '5', '2014-08-21', '2014-08-22'),
(54, '100', 'new central palm', '1', '2014-08-21', '2014-08-22'),
(55, '101', 'fjhdgshjgfdsj', '5', '2014-08-12', '2014-08-14'),
(56, '102', 'sample room3', '2', '2014-08-18', '2014-08-20'),
(57, '102', 'sample room2', '2', '2014-08-18', '2014-08-20'),
(58, '102', 'sample room1', '2', '2014-08-18', '2014-08-20'),
(59, '103', 'bibesh ko room', '17', '2014-08-19', '2014-08-28'),
(60, '104', 'bibesh ko room', '7', '2014-08-19', '2014-08-28'),
(61, '105', 'bibesh ko room', '16', '2014-08-19', '2014-08-28'),
(62, '106', 'bibesh ko room', '14', '2014-08-21', '2014-08-22'),
(63, '107', 'bibesh ko room', '2', '2014-08-22', '2014-08-23'),
(64, '108', 'bibesh ko room', '2', '2014-08-22', '2014-08-23'),
(65, '109', 'Economy Room', '15', '2014-08-22', '2014-08-23'),
(66, '109', 'Deluxe Room', '10', '2014-08-22', '2014-08-23'),
(67, '110', 'bibesh ko room', '16', '2014-08-27', '2014-08-28'),
(68, '110', 'new central palm', '1', '2014-08-27', '2014-08-28'),
(69, '111', 'room1', '1', '2014-09-06', '2014-09-09'),
(73, '113', 'sample room3', '1', '2014-08-28', '2014-08-29'),
(74, '114', 'sample room3', '1', '2014-08-28', '2014-08-29'),
(77, '117', 'sample room3', '5', '2014-09-15', '2014-09-19'),
(78, '118', 'sample room2', '7', '2014-09-17', '2014-09-19'),
(81, '121', 'sample room3', '5', '2014-09-22', '2014-09-26'),
(82, '122', 'bibesh ko room', '4', '2014-09-24', '2014-10-07'),
(84, '112', 'sample room1', '2', '2014-09-08', '2014-09-09'),
(85, '112', 'sample room2', '2', '2014-09-08', '2014-09-09'),
(122, '115', 'sample room1', '2', '2014-09-08', '2014-09-10'),
(127, '119', 'sample room1', '5', '2014-09-17', '2014-09-19'),
(128, '119', 'sample room3', '5', '2014-09-17', '2014-09-19'),
(134, '120', 'sample room1', '2', '2014-09-17', '2014-09-19'),
(135, '120', 'sample room2', '4', '2014-09-17', '2014-09-19'),
(136, '116', 'sample room1', '2', '2014-09-04', '2014-09-10'),
(137, '116', 'sample room2', '2', '2014-09-04', '2014-09-10'),
(138, '116', 'sample room3', '2', '2014-09-04', '2014-09-10'),
(139, '123', 'sample room3', '2', '2014-09-03', '2014-09-04'),
(140, '124', 'sample room3', '2', '2014-09-03', '2014-09-04'),
(141, '125', 'dsjhhfds', '1', '', ''),
(142, '126', 'dsjhhfds', '1', '', ''),
(156, '127', 'new central palm', '1', '2014-09-03', '2014-09-04');

-- --------------------------------------------------------

--
-- Table structure for table `booking_info`
--

CREATE TABLE IF NOT EXISTS `booking_info` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `check_in_date` varchar(50) CHARACTER SET utf8 NOT NULL,
  `check_out_date` varchar(50) CHARACTER SET utf8 NOT NULL,
  `room_type` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `no_of_rooms_booked` int(3) DEFAULT NULL,
  `booking_id` varchar(50) CHARACTER SET utf8 NOT NULL,
  `hotel_id` int(3) NOT NULL,
  `status` int(3) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `user_id_2` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=165 ;

--
-- Dumping data for table `booking_info`
--

INSERT INTO `booking_info` (`id`, `check_in_date`, `check_out_date`, `room_type`, `no_of_rooms_booked`, `booking_id`, `hotel_id`, `status`, `user_id`) VALUES
(127, '2014-08-11', '2014-08-14', NULL, NULL, '90', 3, 1, 15),
(128, '2014-08-11', '2014-08-12', NULL, NULL, '92', 3, 1, 15),
(129, '2014-08-11', '2014-08-12', NULL, NULL, '93', 13, 0, 18),
(130, '2014-08-17', '2014-08-18', NULL, NULL, '94', 13, 0, 18),
(131, '2014-08-18', '2014-08-19', NULL, NULL, '95', 13, 0, 18),
(132, '2014-08-20', '2014-08-21', NULL, NULL, '96', 13, 0, 18),
(133, '2014-08-21', '2014-08-22', NULL, NULL, '97', 13, 0, 18),
(134, '2014-08-27', '2014-08-28', NULL, NULL, '98', 13, 0, 18),
(135, '2014-08-12', '2014-08-13', NULL, NULL, '99', 4, 0, 15),
(136, '2014-08-21', '2014-08-28', NULL, NULL, '100', 3, 0, 15),
(137, '2014-08-12', '2014-08-14', NULL, NULL, '101', 14, 0, 15),
(139, '2014-08-18', '2014-08-20', NULL, NULL, '102', 9, 0, 15),
(140, '2014-08-19', '2014-08-28', NULL, NULL, '103', 3, 0, 15),
(141, '2014-08-19', '2014-08-28', NULL, NULL, '104', 3, 0, 15),
(142, '2014-08-19', '2014-08-28', NULL, NULL, '105', 3, 1, 15),
(143, '2014-08-21', '2014-08-22', NULL, NULL, '106', 3, 0, 15),
(144, '2014-08-22', '2014-08-23', NULL, NULL, '107', 3, 0, 15),
(145, '2014-08-22', '2014-08-23', NULL, NULL, '108', 3, 0, 15),
(146, '2014-08-22', '2014-08-23', NULL, NULL, '109', 4, 0, 15),
(147, '2014-08-27', '2014-08-28', NULL, NULL, '110', 3, 1, 15),
(148, '2014-09-06', '2014-09-09', NULL, NULL, '111', 10, 0, 17),
(149, '2014-09-08', '2014-09-09', NULL, NULL, '112', 9, 0, 15),
(150, '2014-08-28', '2014-08-29', NULL, NULL, '113', 9, 0, 15),
(151, '2014-08-28', '2014-08-29', NULL, NULL, '114', 9, 0, 15),
(152, '2014-09-08', '2014-09-10', NULL, NULL, '115', 9, 0, 15),
(153, '2014-09-04', '2014-09-10', NULL, NULL, '116', 9, 1, 15),
(154, '2014-09-15', '2014-09-19', NULL, NULL, '117', 9, 0, 15),
(155, '2014-09-17', '2014-09-19', NULL, NULL, '118', 9, 0, 15),
(156, '2014-09-17', '2014-09-19', NULL, NULL, '119', 9, 0, 15),
(157, '2014-09-17', '2014-09-19', NULL, NULL, '120', 9, 0, 15),
(158, '2014-09-22', '2014-09-26', NULL, NULL, '121', 9, 0, 15),
(159, '2014-09-24', '2014-10-07', NULL, NULL, '122', 3, 1, 15),
(160, '2014-09-03', '2014-09-04', NULL, NULL, '123', 9, 0, 15),
(161, '2014-09-03', '2014-09-04', NULL, NULL, '124', 9, 1, 15),
(162, '', '', NULL, NULL, '125', 3, 0, 15),
(163, '', '', NULL, NULL, '126', 3, 0, 15),
(164, '2014-09-03', '2014-09-04', NULL, NULL, '127', 3, 0, 15);

-- --------------------------------------------------------

--
-- Table structure for table `code_info`
--

CREATE TABLE IF NOT EXISTS `code_info` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `api_id` varchar(15) NOT NULL,
  `hotel_id` varchar(200) NOT NULL,
  `template_id` varchar(15) NOT NULL,
  `payment_info` varchar(50) DEFAULT NULL,
  `code` varchar(1000) DEFAULT NULL,
  `user_id` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=135 ;

--
-- Dumping data for table `code_info`
--

INSERT INTO `code_info` (`id`, `title`, `api_id`, `hotel_id`, `template_id`, `payment_info`, `code`, `user_id`) VALUES
(127, 'sample api', '172QcAUY7r', 'sample hotel', '1', '0', '<pre>\r\n<code>\r\n    <textarea readonly  style="border: none; min-height:170px; width: 400px; margin:  0px ; padding: 0px;">\r\n        <script src="http://localhost/reservation/contents/scripts/jquery.js" ></script> \r\n       <script src="http://localhost/reservation/apiTesting/scripts/common.js" ></script>\r\n        <link rel="stylesheet" type="text/css" href="http://localhost/reservation/apiTesting/styles/first.css" /> \r\n        <div id="api-data-reserve" name="sample api" data="172QcAUY7r"></div></textarea></code></pre>', '15'),
(128, 'sample api2', '172QcAUY7r', 'sample hotel', '2', '1', '<pre>\r\n<code>\r\n    <textarea readonly  style="border: none; min-height:170px; width: 400px; margin:  0px ; padding: 0px;">\r\n <script src="http://localhost/reservation/contents/scripts/jquery.js" ></script> \r\n       <script src="http://localhost/reservation/apiTesting/scripts/common.js" ></script>\r\n        <link rel="stylesheet" type="text/css" href="http://localhost/reservation/apiTesting/styles/second.css" /> \r\n        <div id="api-data-reserve" name="sample api2" data="172QcAUY7r"></div></textarea></code></pre>', '15'),
(129, 'sample api3', '172QcAUY7r', 'sample hotel', '3', '0', '<pre>\r\n<code>\r\n    <textarea readonly  style="border: none; min-height:170px; width: 400px; margin:  0px ; padding: 0px;">\r\n  <script src="http://localhost/reservation/contents/scripts/jquery.js" ></script> \r\n       <script src="http://localhost/reservation/apiTesting/scripts/common.js" ></script>\r\n        <link rel="stylesheet" type="text/css" href="http://localhost/reservation/apiTesting/styles/third.css" /> \r\n        <div id="api-data-reserve" name="sample api3" data="172QcAUY7r"></div></textarea></code></pre>', '15'),
(130, 'sample api4', '172QcAUY7r', 'sample hotel', '4', '1', '<pre>\r\n<code>\r\n    <textarea readonly  style="border: none; min-height:170px; width: 400px; margin:  0px ; padding: 0px;">\r\n  <script src="http://localhost/reservation/contents/scripts/jquery.js" ></script> \r\n       <script src="http://localhost/reservation/apiTesting/scripts/common.js" ></script>\r\n        <link rel="stylesheet" type="text/css" href="http://localhost/reservation/apiTesting/styles/fourth.css" /> \r\n        <div id="api-data-reserve" name="sample api4" data="172QcAUY7r"></div></textarea></code></pre>', '15'),
(131, 'sample titles', '172QcAUY7r', 'sample hotel', '1', '0', '<pre>\r\n<code>\r\n    <textarea readonly  style="border: none; min-height:170px; width: 400px; margin:  0px ; padding: 0px;">\r\n        <script src="http://localhost/reservation/"/contents/scripts/jquery.js" ></script> \r\n       <script src="http://localhost/reservation/"/apiTesting/scripts/common.js" ></script>\r\n        <link rel="stylesheet" type="text/css" href="http://localhost/reservation/"/apiTesting/styles/first.css" /> \r\n        <div id="api-data-reserve" name="sample titles" data="172QcAUY7r"></div></textarea></code></pre>', '15'),
(132, 'sadghgfdsjhghjf', '172QcAUY7r', 'sample hotel', '1', '0', '<pre>\r\n<code>\r\n    <textarea readonly  style="border: none; min-height:170px; width: 400px; margin:  0px ; padding: 0px;">\r\n        <script src="http://localhost/reservation/contents/scripts/jquery.js" ></script> \r\n       <script src="http://localhost/reservation/apiTesting/scripts/common.js" ></script>\r\n        <link rel="stylesheet" type="text/css" href="http://localhost/reservation/apiTesting/styles/first.css" /> \r\n        <div id="api-data-reserve" name="sadghgfdsjhghjf" data="172QcAUY7r"></div></textarea></code></pre>', '15'),
(133, 'zXfsdgvfdgvfd', '172QcAUY7r', 'sample hotel', '1', '0', '<pre>\r\n<code>\r\n    <textarea readonly  style="border: none; min-height:170px; width: 400px; margin:  0px ; padding: 0px;">\r\n        <script src="http://localhost/reservation/contents/scripts/jquery.js" ></script> \r\n       <script src="http://localhost/reservation/apiTesting/scripts/common.js" ></script>\r\n        <link rel="stylesheet" type="text/css" href="http://localhost/reservation/apiTesting/styles/first.css" /> \r\n        <div id="api-data-reserve" name="zXfsdgvfdgvfd" data="172QcAUY7r"></div></textarea></code></pre>', '15'),
(134, 'my new central', '172QcAUY7r', 'Central Palms Hotel', '1', '0', '<pre>\r\n<code>\r\n    <textarea readonly  style="border: none; min-height:170px; width: 400px; margin:  0px ; padding: 0px;">\r\n        <script src="http://localhost/reservation/contents/scripts/jquery.js" ></script> \r\n       <script src="http://localhost/reservation/apiTesting/scripts/common.js" ></script>\r\n        <link rel="stylesheet" type="text/css" href="http://localhost/reservation/apiTesting/styles/first.css" /> \r\n        <div id="api-data-reserve" name="my new central" data="172QcAUY7r"></div></textarea></code></pre>', '15');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `event` varchar(200) DEFAULT NULL,
  `location` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `start_date`, `end_date`, `event`, `location`) VALUES
(2, '2014-08-13 00:00:00', '2014-08-13 00:00:00', 'next event1', '1'),
(21, '2014-08-15 00:00:00', '2014-08-16 00:00:00', 'event 2', '2'),
(22, '2014-08-12 00:00:00', '2014-08-12 00:00:00', 'dsaadas', '1'),
(23, '2014-08-12 00:00:00', '2014-08-12 00:00:00', '12321q', '1'),
(24, '2014-08-12 00:00:00', '2014-08-12 00:00:00', '3213', '1'),
(25, '2014-08-04 00:00:00', '2014-08-12 00:00:00', 'dsafdsfds', '2'),
(26, '2014-08-01 00:00:00', '2014-08-12 00:00:00', 'svdhgfds', '5'),
(27, '2014-08-13 00:00:00', '2014-08-14 00:00:00', 'asvvhgdfagsy', '2'),
(28, '2014-08-13 00:00:00', '2014-08-13 00:00:00', 'eventsssss', '1'),
(29, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hotel_info`
--

CREATE TABLE IF NOT EXISTS `hotel_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `address` varchar(200) CHARACTER SET utf8 NOT NULL,
  `contact` varchar(100) CHARACTER SET utf8 NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`,`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `hotel_info`
--

INSERT INTO `hotel_info` (`id`, `name`, `address`, `contact`, `user_id`, `status`) VALUES
(3, 'Central Palms Hotel', 'Lions Chowk, Chitwan', '+977-56-570050', 15, '1'),
(4, 'Hotel Monalisha', 'Sauraha, Chitwan', '+977-56-581588', 15, '1'),
(9, 'sample hotel', 'sample address', '056533977', 15, '1'),
(10, 'asdf hotel', 'bdsahjfgyhsdg', '777777777', 17, '1'),
(11, 'asdf hotel2', 'dfsdfdsfds', '3333333388', 17, '1'),
(12, 'asdf hotel3', 'gdjhgfdsjhgfj', '999999999', 17, '1'),
(13, 'naya user hotel', 'cxkhkjh', '9999999999', 18, '1'),
(14, 'naya user hotel2', 'fhagfhgadhjghj', '5645736756765', 18, '1');

-- --------------------------------------------------------

--
-- Table structure for table `personal_info`
--

CREATE TABLE IF NOT EXISTS `personal_info` (
  `Id` int(5) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `address` varchar(300) CHARACTER SET utf8 DEFAULT NULL,
  `occupation` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `nationality` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `contact_no` varchar(20) DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `remarks` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `total_amount` int(10) NOT NULL,
  `booking_id` int(5) NOT NULL,
  `child` int(5) NOT NULL,
  `adult` int(5) NOT NULL,
  `verification_code` varchar(15) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=167 ;

--
-- Dumping data for table `personal_info`
--

INSERT INTO `personal_info` (`Id`, `full_name`, `address`, `occupation`, `nationality`, `contact_no`, `email`, `remarks`, `total_amount`, `booking_id`, `child`, `adult`, `verification_code`) VALUES
(99, 'Hom Nath Bagale', 'chitwan', 'sTUDENT', 'nepali', '9845052575', 'bhomnath@salyani.com.np', '', 14000, 60, 0, 2, NULL),
(100, 'xhgfshdg', 'dhgcsfjhdh', 'ghdgsfhgsdjh', 'ghfdgshfgsh', '99999999', 'asd@asd.asd', '', 222, 61, 0, 3, 'pscCfjCHMI'),
(101, 'hjcghvjkfxh', 'bhjcgjhvd', 'fxgjhgjkdh', 'jbjhvbgjhdfbjh', '88888888', 'bshdjgfjh@asd.asd', '', 222, 62, 0, 2, NULL),
(102, 'gjhbgfjhs', 'bdsjhdfhjsbd', 'vshcxbvfhjsdvb', 'vvfhjsvbxjh', '86547345443', 'sdfgfh@asd.asd', '', 1111, 63, 0, 2, NULL),
(103, 'gdhsjgfjhc', 'gjhghjgfjhgsdjh', 'gjhgjhfgdsjhgxhj', 'gvjhdsgdhjfgdsjh', '78653657634', 'jhdsgfjch@asads.asd', '', 1111, 64, 0, 2, NULL),
(104, 'vghjgdfjh', 'vvhgfhjvsdhj', 'vavvghfvgshdx', 'vsvfvhzx', '99999999', 'asd@asd.asd', '', 1000, 65, 0, 2, NULL),
(105, 'hjhghj', 'qjhhjfgshj', 'jhghjgfsdhj', 'gjhsghgvfdh', '99999999', 'asd@asd.asd', '', 1000, 66, 0, 2, NULL),
(106, 'jhfgdsjhgfsc', 'ghghjghgfsdjh', 'ghghjgfhjgfdjh', 'gghghghjgghj', '99999999', 'vdghjgfh@asd.asd', '', 1000, 67, 0, 2, NULL),
(107, 'dshjfghsjg', 'gshghgh', 'jhghjfdshjg', 'gfhgshfgshj', '99999999', 'asd@asd.asd', '', 1000, 68, 0, 2, NULL),
(108, 'hfjhdsjhgsjd', 'jhghjfdjhg', 'jhdsghjfgdjhgh', 'gjhgghjgf', '99999999', 'asd@asd.asd', '', 45500, 69, 0, 2, NULL),
(109, 'sanjeev amgai', 'bharatpur', 'ghfghjdgh', 'HJGHJGJHG', '99999999', 'ASD@ASD.ASD', '', 2333, 70, 0, 2, NULL),
(110, 'TWO MONTHS ', 'DSVHGFHSJD', 'HGHJFGSHJGH', 'GHHGHJGHJ', '99999999', 'ASD@ASD.ASD', '', 1333, 71, 0, 5, NULL),
(111, 'someone', 'somewhere', 'something', 'somes', '9999999999', 'email@test.test', '', 2333, 72, 0, 3, NULL),
(112, 'bhghzjfghsj', 'hgjhfghjg', 'ghghghjghj', 'gjhgjhghjghjg', '88888888', 'asd@asd.asd', '', 1000, 73, 0, 2, NULL),
(113, 'meroname', 'meroghar', 'meropesa', 'merorastriyata', '8888888888', 'mero@email.com', '', 12222, 74, 0, 4, NULL),
(114, 'ghjfgshjdgfjhs', 'bsbxhjfbgsdjhgbfjh', 'jhbbxhjfdshjfsjh', 'hhjfsdhjfhjshj', '9999999999', 'asd@asd.asd', '', 21611, 75, 0, 3, NULL),
(115, 'mero naam k ho', 'anighar kaha ho', 'ma k garchu', 'nagarik kun deshko', '552165656', 'email@kkk.ho', '', 7222, 76, 0, 2, NULL),
(116, 'dahkjfhsjk', 'cxjhgfhjkghd', 'bbjsbjhbjh', 'bjjhjkhjkhjkh', '99999999', 'dsbhb@asd.asd', '', 4222, 77, 0, 2, NULL),
(117, 'shchfjbghj', 'bjhgjhjhhj', 'bvhjhjbjh', 'bjhbjhbjhb', '67576567', 'vjhsg@assd.asd', '', 1000, 78, 0, 2, NULL),
(118, 'gdshjgfsdjhgjh', 'ghgjhfghjgjhg', 'ggjhgjhgjhgjh', 'ghjghjgjhgjhgjh', '9898998089080', 'bvhjghg@asd.asd', '', 15000, 79, 0, 2, NULL),
(119, 'guygfjhsgjdh', 'hkjhgkjhjkh', 'hjhjkhjkhjkh', 'hjkhjkhkjhjkh', '88888888', 'jhdsyfhgsjh@asd.asd', '', 80000, 80, 0, 2, NULL),
(120, 'hdsuhfgkjshdkj', 'hjkhfjkhshjk', 'jhdsjhgjskhd', 'hhjhsdjhfsjhk', '6576565', 'jhsjhfhsjhh@asd.asd', '', 2000, 81, 0, 1, NULL),
(121, 'gsdjhfgdsjh', 'djhdbgjhfdjh', 'ghgxhjghj', 'ghjghjghj', '9855565566', 'fvdghfgdsagh@asd.asd', '', 2000, 82, 0, 1, NULL),
(122, 'vgahgxfach', 'vhgdjsgfhjdsg', 'gvhdsgfhjsgdhj', 'gdshgzhjfsdghj', '43645645645', 'fgadsfd@adfdas.sad', '', 2000, 83, 0, 1, NULL),
(123, 'dshfjkdshjk', 'qjhfhcjhgdjh', 'gjhfdgjhdfgj', 'gjhgjhghjkh', '546754763', 'gdfastyfd@asdf.asdf', '', 2000, 84, 0, 1, NULL),
(124, 'fdjkhgkjhd', 'fhgjhdfj', 'hjsdgfdgjfd', 'hjfdgdfjghd', '9999999999', 'asdf@asd.asd', '', 1500, 85, 0, 2, NULL),
(125, 'dgszxjhgfjh', 'ghjdsgzxjhfgah', 'ghdsgzjhfgwjh', 'ghddgsjhfgdsjh', '7867676776', 'sads@asd.asd', '', 5000, 86, 0, 2, NULL),
(126, 'dfhjdsjh', 'gjhsghjgfjh', 'ghsdgjhfgdsjh', 'ghjsdgfjhgdshjx', '76768767676', 'asdf@asd.asd', '', 111, 87, 0, 0, NULL),
(127, 'sahriufhgs', 'hhdfhghedg', 'ghdfsghjfgedjh', 'gdgshjgd', '675675675675', 'asdf@asd.asd', '', 5000, 88, 0, 3, NULL),
(128, 'sdjgdfvjhbgqjhjhfdgjh', 'hdsjfhhgjdfvq', 'dfhhjgdfvhj', 'gdjhfgghjdfjx', '8888888888', 'sdhjxzgfscjh@asd.asd', '', 5000, 89, 0, 3, NULL),
(129, 'ewhdfhsjh', 'jhsdhhjfs', 'hhjsdjhfs', 'jhsdfhjs', '78677676', 'asd@asd.asd', '', 3222, 90, 0, 2, NULL),
(130, 'dsgfkdsj', 'hjkfdhgjdfvh', 'hhjhdjhhgdj', 'jhsdjhgdfj', '5675675675', 'sdjhfj@asd.asd', '', 1000, 91, 0, 2, NULL),
(131, 'bdshxfgch', 'hvhfvshvdhj', 'hshjfhjsdhj', 'ghjdsghjfgdjhs', '6666789789', 'asds@asd.asd', '', 1000, 92, 0, 2, NULL),
(132, 'sdhgfvdsjh', 'hdxjhcgfdsjh', 'hdsghjfgjhd', 'gghjsdfgxjhfgs', '2356453', 'gdsaf@asd.asd', '', 1500, 93, 0, 2, NULL),
(133, 'hhgjkfdhjk', 'hhjhdshjfgdsjh', 'hddsghjgfdjh', 'hdgdscxhjfgdsjhdg', '76567554', 'ddsgfhsd@asd.asd', '', 1000, 94, 0, 2, NULL),
(134, 'safgdshg', 'gdsjhgfjhsdg', 'hjdsghjgfdsjh', 'gjhgdsjhfgjhds', '5454544545', 'fsytda@sada.sad', '', 500, 95, 0, 4, NULL),
(135, 'gfdhfghfjdgs', 'hfjdgjhfvdcxjh', 'hfdgchjgfdj', 'gjhddgchjgfdjh', '6767644455', 'sbdjhfbghvdj@asd.asd', '', 500, 96, 0, 1, NULL),
(136, 'sdhyfugdhx', 'hdsfjhdhj', 'hdsgjhfgs', 'jhgdshjfgdsjh', '46456556', 'sadfa@ads.asd', '', 1000, 97, 0, 2, NULL),
(137, 'dshkjfhsdkj', 'jhdgsjhfgdsjh', 'jgsdhjgfjsh', 'ghgshjcgfhsd', '8888888888', 'sgdfvgs@asd.asd', '', 1500, 98, 0, 5, NULL),
(138, 'jhgcxfjhgdsjh', 'ghgsdjhxcgfdfjhx', 'ghjdsgjhfgjhd', 'ghghjgfdsjh', '4556756756', 'asd@asd.asd', '', 15500, 99, 0, 2, NULL),
(139, 'gdshjgfjhsd', 'hgsgfdsjh', 'ghdghjfgdshjgfjh', 'ghgsjhfgdsjhg', '55675656756', 'gsdhjgfj@asd.asd', '', 7222, 100, 0, 3, NULL),
(140, 'dsghfgdsjh', 'gdshjfghjdsg', 'ghdsghjfgdsjh', 'gsfdgjhfgjdsh', '787867868', 'asdf@asdf.asdf', '', 3750, 101, 0, 3, NULL),
(141, 'Ramji Subedi', 'bdsajhgbfdsjhb', 'gdjhfgbfjhg', 'bdjhbcghjggds', '8798789789789', 'sdghjfg@asd.asd', '', 9000, 102, 0, 3, NULL),
(142, 'sdahfgvjh', 'bbssjhdgfjhq', 'gsjhdgfjh', 'gedjshgfjh', '898898898', 'dsghf@asd.asd', '', 17000, 103, 0, 2, NULL),
(143, 'sdkhskj', 'hdsjhghfjhs', 'hsgdjhfhw', 'ghdsghhjfvshjdgh', '89890890890', 'sgdjhfg@asd.asd', '', 7000, 104, 0, 2, NULL),
(144, 'sdkjhyudhekj', 'sdfdsgfvds', 'hhjhdsgjhfws', 'gjhewdgfjhvs', '767689789798', 'dbsfjhgjs@asd.asd', '', 16000, 105, 0, 2, NULL),
(145, 'lskjdfl', 'sjdljf sldjfl ', 'sjldfj sldjfl', 'lsjkdlfjlsj', '023809283', 'infotechnab@gmail.com', 'jsldkjf ', 14000, 106, 11, 8, NULL),
(146, 'dshcgvshh', 'gsdgfjhsdi', 'gfgdsfhsu', 'gsdgfhgsiu', '6767676767', 'asdf@asd.asd', '', 2000, 107, 0, 2, NULL),
(147, 'dshcgvshh', 'gsdgfjhsdi', 'gfgdsfhsu', 'gsdgfhgsiu', '6767676767', 'asdf@asd.asd', '', 2000, 108, 0, 2, NULL),
(148, 'wdjgfikdsj', 'bfkjhgkjd', 'bjfbdjkghkjx', 'bjfbcjkgvdckj', '6767667567567', 'sgdghf@asd.asd', '', 42500, 109, 0, 5, NULL),
(149, 'cvjkghdkfjhfjk', 'jdhdjkhjdk', 'djkhdhjkdhkj', 'bbdjhjkhvhfd', '87897897987', 'asd@asd.asd', '', 18222, 110, 0, 2, NULL),
(150, 'shgjfdhjfg', 'jhkjghkjdhkj', 'jjghkjhhjkgfd', 'jhjhghjhhjk', '8989889898', 'gdshgf@asd.asd', '', 111, 111, 0, 5, NULL),
(151, 'dfjkhgdjkhjk', 'jhhcjhgdjh', 'gghjdgjhgdfj', 'hjgjhjh', '878978676', 'asd@asd.asd', '', 14500, 112, 0, 5, NULL),
(152, 'bsdkjhfhj', 'jhhgjhfgjh', 'gbjhgsjhgjh', 'gjhgjhgjhf', '7987987897', 'dshgg@asd.asd', '', 2000, 113, 0, 2, NULL),
(153, 'sdgfhghs', 'gjhgjhfgsh', 'gjhgsdjhgfjhgjh', 'ghgdsjhfgjhsdg', '809890809890', 'gddshg@asd.asd', '', 2000, 114, 0, 2, NULL),
(154, 'wdhsafjgjh', 'jhgjhgbhjd', 'jhgdhjgfjh', 'hjfgbcjhgfjh', '789798789', 'gsdhgf@asd.asd', '', 8000, 115, 0, 2, NULL),
(155, 'dfsfgjhgjh', 'hjjgshjgfjh', 'ghgsjhgjhg', 'gjhgjhgjhgjhhg', '798798798789', 'gdhsggfu@asd.asd', '', 6000, 116, 0, 2, NULL),
(156, 'vdsjhgfhgh', 'ghsdgjhgjhgghg', 'gdshgfhsgh', 'hjghjgjhghj', '98908908908', 'shdjgfh@ASD.ASD', '', 10000, 117, 0, 2, NULL),
(157, 'efndgkjvbjk', 'nsdffghjd', 'hsghdjhj', 'jhhjhfskhjkghj', '898798989', 'bhad@bhadra.bha', '', 10500, 118, 0, 2, NULL),
(158, 'hgsjhhgfshj', 'gjhghjhghjh', 'gjhgjhgjh', 'gjhgjhgjhhg', '786786866876', 'asdf@asd.asd', '', 6000, 119, 0, 2, NULL),
(159, 'jhdsghjgghjh', 'ghgsdhgsg', 'gghghgg', 'gguguguui', '6768686868', 'dsgafg@asd.asd', '', 4500, 120, 0, 2, NULL),
(160, 'fdshjighfd', 'hiuhsduifhiu', 'jhghjghhhg', 'hkjhjkhkjhjk', '78789798789', 'asd@asd.asd', '', 10000, 121, 0, 2, NULL),
(161, 'hsfdjkgjks', 'hskjdhgjkhsdkj', 'jhsdkjghkjsh', 'hjhsdkjghkj', '7987897987', 'bhomnath@salyani.com.np', '', 4000, 122, 0, 4, NULL),
(162, 'gsadhjfagjhg', 'gdhsjgfjhsg', 'gjhsgdjhfg', 'gjhsdgfsjh', '666666666', 'asdf@asd.asd', '', 4000, 123, 0, 0, NULL),
(163, 'gsadhjfagjhg', 'gdhsjgfjhsg', 'gjhsgdjhfg', 'gjhsdgfsjh', '666666666', 'asdf@asd.asd', '', 4000, 124, 0, 0, NULL),
(164, 'gsadhjfagjhg', 'gdhsjgfjhsg', 'gjhsgdjhfg', 'gjhsdgfsjh', '666666666', 'asdf@asd.asd', '', 4343, 125, 0, 1, NULL),
(165, 'gsadhjfagjhg', 'gdhsjgfjhsg', 'gjhsgdjhfg', 'gjhsdgfsjh', '666666666', 'asdf@asd.asd', '', 4343, 126, 0, 1, NULL),
(166, 'gsadhjfagjhg', 'gdhsjgfjhsg', 'gjhsgdjhfg', 'gjhsdgfsjh', '666666666', 'asdf@asd.asd', '', 4343, 127, 0, 1, NULL);

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
  `hotel_id` int(11) NOT NULL,
  `user_id` varchar(15) NOT NULL,
  `status` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `hotel_id` (`hotel_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=114 ;

--
-- Dumping data for table `room_registration`
--

INSERT INTO `room_registration` (`id`, `room_name`, `no_of_room`, `price`, `description`, `image`, `hotel_id`, `user_id`, `status`) VALUES
(83, 'Deluxe Room', 10, 2000, 'This room contains two beds and it has t.v.. The scenario of nature can be viewed very nice and bird watching is easy from this room', '', 4, '15', '1'),
(84, 'Economy Room', 15, 1500, 'This room normally contains two beds and has no attached bathroom and T.V.\r\nBut the natural scene is best viewed from here.', '', 4, '15', '1'),
(85, 'Super Luxury Room', 15, 3500, 'This room is best for couple with a.c in it. ', 'samart_Access_Services2.jpg', 4, '15', '1'),
(90, 'new central palm', 1, 2222, '22222', '', 3, '15', '1'),
(91, 'bibesh ko room', 100, 1000, 'bjhsfgcjdshbfkjvsd', '', 3, '15', '1'),
(92, 'sample room1', 10, 1000, 'this is for demo', '1.jpg', 9, '15', '1'),
(93, 'sample room2', 10, 1500, 'this is for demo', '2.jpg', 9, '15', '1'),
(94, 'sample room3', 10, 2000, 'this is for demo', '3.jpg', 9, '15', '1'),
(104, 'room1', 1, 111, 'sadsadsa', '', 10, '15', '1'),
(105, 'naya user room1', 3, 500, 'dsfsdfdsfsfds', '', 13, '18', '1'),
(106, 'fjhdgshjgfdsj', 5, 750, 'shygftedshghfyhu', '', 14, '18', '1'),
(107, 'naya user room2', 3, 100, 'dsjfkdsjfkd', '', 13, '18', '1'),
(108, 'naya user room3', 5, 1001, 'sjkfvhsdjkhjkfds', '', 13, '18', '1'),
(109, 'naya user room4', 3, 1500, 'dshfhjsgdhjf', '', 13, '18', '1'),
(110, 'naya user room5', 1, 100, 'wsghgfgh', '', 13, '18', '1'),
(111, 'gfdhgdfjhgj', 1, 9999, 'sdjhgfjhsgdh', '', 14, '18', '1'),
(112, 'dsjhhfds', 1, 4343, 'sdfsdfsdf', '', 3, '15', '1'),
(113, 'fdsfsdfsd', -3, 3443, 'dsfdscfds', '', 9, '15', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE IF NOT EXISTS `user_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(64) NOT NULL,
  `user_fname` varchar(64) DEFAULT NULL,
  `user_lname` varchar(64) DEFAULT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `user_pass` varchar(64) DEFAULT NULL,
  `user_auth_key` varchar(64) NOT NULL,
  `login_status` varchar(100) NOT NULL,
  `Last_login_date` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `user_name`, `user_fname`, `user_lname`, `user_email`, `user_pass`, `user_auth_key`, `login_status`, `Last_login_date`) VALUES
(15, 'Homnath', 'Hom Nath ', 'Bagale', 'bhomnath@salyani.com.np', '9fe3ef0f7bab8b8f9c60056e680cd727', '3L5F1VSACK', 'Logged In', '2014-09-03 11:03:35'),
(17, 'ghdsafygds', 'gdsahfdsh', 'hafdgshfgdsh', 'asdf@asdf.asd', 'a152e841783914146e4bcd4f39100686', '', 'Registered', 'Not logged in till'),
(18, 'ma naya user', 'meronaam', 'merosirname', 'email@asdf.asd', '9fe3ef0f7bab8b8f9c60056e680cd727', '', 'Logged In', '2014-08-11 13:41:41');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking_info`
--
ALTER TABLE `booking_info`
  ADD CONSTRAINT `booking_info_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`id`);

--
-- Constraints for table `hotel_info`
--
ALTER TABLE `hotel_info`
  ADD CONSTRAINT `hotel_info_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`id`);

--
-- Constraints for table `room_registration`
--
ALTER TABLE `room_registration`
  ADD CONSTRAINT `room_registration_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `hotel_info` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
