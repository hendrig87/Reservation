-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 19, 2014 at 05:49 AM
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
-- Table structure for table `booking_info`
--

CREATE TABLE IF NOT EXISTS `booking_info` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `check_in_date` varchar(50) CHARACTER SET utf8 NOT NULL,
  `check_out_date` varchar(50) CHARACTER SET utf8 NOT NULL,
  `room_type` varchar(100) CHARACTER SET utf8 NOT NULL,
  `no_of_rooms_booked` int(3) NOT NULL,
  `booking_id` varchar(50) CHARACTER SET utf8 NOT NULL,
  `personal_info_id` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=77 ;

--
-- Dumping data for table `booking_info`
--

INSERT INTO `booking_info` (`id`, `check_in_date`, `check_out_date`, `room_type`, `no_of_rooms_booked`, `booking_id`, `personal_info_id`) VALUES
(6, '', '', 'Deluxe', 8, '', 0),
(7, '', '', 'Couple Room', 2, '', 0),
(8, '', '', 'Luxury', 3, '', 0),
(9, '', '', 'Luxury', 4, '', 0),
(10, '', '', 'Couple Room', 4, '', 0),
(11, '', '', 'Couple Room', 1, '', 0),
(12, '', '', 'Luxury', 6, '', 0),
(13, '', '', 'Economy ', 2, '', 0),
(14, '', '', 'Deluxe', 1, '', 0),
(15, '', '', 'Deluxe', 4, '', 0),
(16, '', '', 'Couple Room', 4, '', 0),
(17, '', '', 'Luxury', 4, '', 0),
(18, '', '', 'Deluxe', 3, '', 0),
(19, '', '', 'Couple Room', 3, '', 0),
(20, '', '', 'Couple Room', 3, '', 0),
(21, '', '', 'Couple Room', 1, '', 0),
(22, '', '', 'Couple Room', 1, '', 0),
(23, '', '', 'Couple Room', 2, '', 0),
(24, '', '', 'Luxury', 10, '', 0),
(25, '', '', 'Economy ', 1, '', 0),
(26, '', '', 'Deluxe', 7, '', 0),
(27, '', '', 'Luxury', 9, '', 0),
(28, '', '', 'Couple Room', 1, '', 0),
(29, '', '', 'Couple Room', 1, '', 0),
(30, '', '', '2', 2, '', 0),
(31, '', '', '2', 2, '', 0),
(32, '', '', '', 0, '', 0),
(33, '', '', '', 0, '', 0),
(34, '', '', '', 0, '', 0),
(35, '', '', '', 0, '', 0),
(36, '', '', '', 0, '', 0),
(37, '', '', '', 0, '', 0),
(38, '', '', '', 0, '', 0),
(39, '', '', '', 0, '', 0),
(40, '', '', '', 0, '', 0),
(41, '', '', '', 0, '', 0),
(42, '', '', 'Deluxe', 9, '', 0),
(43, '', '', 'Luxury', 11, '', 0),
(44, '', '', 'Luxury', 11, '', 0),
(45, '', '', 'Luxury', 9, '', 0),
(46, '', '', 'Deluxe', 8, '', 0),
(47, '', '', 'Deluxe', 9, '', 0),
(48, '2014-05-22', '2014-05-23', 'Deluxe', 3, '', 0),
(49, '2014-05-22', '2014-05-23', 'Economy ', 2, '', 0),
(50, '2014-05-22', '2014-05-23', 'Couple Room', 2, '', 0),
(51, '2014-05-22', '2014-05-23', 'Luxury', 2, '', 0),
(52, '2014-05-22', '2014-05-23', 'Deluxe', 2, '', 0),
(53, '2014-05-22', '2014-05-23', 'Economy ', 3, '', 0),
(54, '2014-05-20', '2014-05-21', 'Economy ', 2, '', 0),
(55, '2014-05-20', '2014-05-21', 'Couple Room', 3, '', 0),
(56, '2014-05-20', '2014-05-21', 'Luxury', 7, '', 0),
(57, '2014-05-20', '2014-05-21', 'Deluxe', 5, '', 0),
(58, '2014-05-20', '2014-05-21', 'Economy ', 3, '', 0),
(59, '2014-05-20', '2014-05-21', 'Couple Room', 1, '', 0),
(60, '2014-05-20', '2014-05-21', 'Luxury', 5, '', 0),
(61, '2014-05-20', '2014-05-21', 'Deluxe', 5, '', 0),
(62, '2014-05-22', '2014-05-24', 'Couple Room', 2, '', 0),
(63, '2014-05-22', '2014-05-24', 'Luxury', 10, '', 0),
(64, '2014-05-22', '2014-05-24', 'Deluxe', 5, '', 0),
(65, '2014-05-25', '2014-05-31', 'Economy ', 5, '', 0),
(66, '2014-05-25', '2014-05-31', 'Couple Room', 4, '', 0),
(67, '2014-05-25', '2014-05-31', 'Luxury', 12, '', 0),
(68, '2014-05-25', '2014-05-31', 'Deluxe', 10, '', 0),
(69, '2014-06-04', '2014-06-05', 'Economy ', 5, '', 0),
(70, '2014-06-04', '2014-06-05', 'Couple Room', 4, '', 0),
(71, '2014-06-04', '2014-06-05', 'Luxury', 12, '', 0),
(72, '2014-06-04', '2014-06-05', 'Deluxe', 10, '', 0),
(73, '2014-06-07', '2014-06-08', 'Economy ', 2, '', 0),
(74, '2014-06-07', '2014-06-08', 'Economy ', 3, '', 0),
(75, '2014-06-07', '2014-06-08', 'Couple Room', 2, '', 0),
(76, '2014-06-06', '2014-06-07', 'Couple Room', 1, '', 0);

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `hotel_info`
--

INSERT INTO `hotel_info` (`id`, `name`, `address`, `contact`, `user_id`) VALUES
(1, 'New Galaxy Guest House', 'Pulchowk, Narayangarh, Chitwan', '+977-56-530848', 15),
(2, 'New Sagarmatha Lunch Point and Rest House', 'Pokhara Buspark, Chitwan', '+977-56-532650', 15),
(3, 'Central Palms Hotel', 'Lions Chowk, Chitwan', '+977-56-570050', 15),
(4, 'Hotel Monalisha', 'Sauraha, Chitwan', '+977-56-581588', 15);

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
  `contact_no` int(20) DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `remarks` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `total_amount` int(10) NOT NULL,
  `booking_id` int(5) NOT NULL,
  `child` int(5) NOT NULL,
  `adult` int(5) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=86 ;

--
-- Dumping data for table `room_registration`
--

INSERT INTO `room_registration` (`id`, `room_name`, `no_of_room`, `price`, `description`, `image`, `hotel_id`) VALUES
(81, 'Economy', 20, 1000, 'This room is normally 144 sq ft in area and has attached bathroom. Two beds are available and is best for 2 persons.', '', 1),
(82, 'Deluxe', 10, 1500, 'This room has capability of 2 person with two beds and 144 sq ft in area. This room contains A.C. and t.v. also.', '', 1),
(83, 'Deluxe Room', 10, 2000, 'This room contains two beds and it has t.v.. The scenario of nature can be viewed very nice and bird watching is easy from this room', '', 4),
(84, 'Economy Room', 15, 1500, 'This room normally contains two beds and has no attached bathroom and T.V.\r\nBut the natural scene is best viewed from here.', '', 4),
(85, 'Super Luxury Room', 15, 3500, 'This room is best for couple with a.c in it. ', '', 4);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `user_name`, `user_fname`, `user_lname`, `user_email`, `user_pass`, `user_auth_key`, `login_status`, `Last_login_date`) VALUES
(15, 'Homnath', 'Hom Nath ', 'Bagale', 'bhomnath@salyani.com.np', '179ad45c6ce2cb97cf1029e212046e81', '', 'Logged In', '2014-05-19 11:22:27'),
(16, 'Ramji', 'Ramji', 'Subedi', 'rsubedi@salyani.com.np', '179ad45c6ce2cb97cf1029e212046e81', '', 'Registered', 'Not logged in till');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
