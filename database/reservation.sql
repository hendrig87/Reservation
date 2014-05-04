-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 04, 2014 at 06:52 AM
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
CREATE DATABASE IF NOT EXISTS `reservation` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
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
  `total_amount` varchar(50) CHARACTER SET utf8 NOT NULL,
  `no_of_nights` int(3) NOT NULL,
  `personal_info_id` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `hotel_info`
--

INSERT INTO `hotel_info` (`id`, `name`, `address`, `contact`, `user_id`) VALUES
(1, 'everest', 'pulchowk', 'bdhjgsagdjh', 7),
(2, 'nandan', 'ysdghj', 'dvhg', 7),
(3, 'Galaxy', 'Pokhara Bus Park', '98553123456', 10);

-- --------------------------------------------------------

--
-- Table structure for table `personal_info`
--

CREATE TABLE IF NOT EXISTS `personal_info` (
  `Id` int(5) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `address` varchar(300) CHARACTER SET utf8 NOT NULL,
  `occupation` varchar(100) CHARACTER SET utf8 NOT NULL,
  `nationality` varchar(100) CHARACTER SET utf8 NOT NULL,
  `contact_no` int(20) NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `remarks` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=79 ;

--
-- Dumping data for table `room_registration`
--

INSERT INTO `room_registration` (`id`, `room_name`, `no_of_room`, `price`, `description`, `image`, `hotel_id`) VALUES
(65, 'Deluxe', 10, 800, 'rybsvssfd', '2P2Z4.png', 1),
(66, 'Luxury', 12, 1000, 'dfh dvsrtruub  dsgd', 'arrow.jpg', 1),
(67, '', 1, 0, '', '', 0),
(68, '', 1, 0, '', '', 0),
(69, '', 1, 0, '', '', 0),
(70, 'asdas', 4, 500, 'sadsadasdas', 'DSCF3263.jpg', 0),
(71, '0', 0, 0, '0', '', 0),
(72, 'sdafdsdfsaa', 6, 2500, 'sadadas', '', 0),
(73, '0', 0, 0, '0', '', 2),
(74, '0', 0, 0, '0', '', 2),
(75, '0', 0, 0, '0', '', 1),
(76, 'My Room available', 7, 1233, '213213123', '', 2),
(77, '', 1, 0, '', '', 2),
(78, 'sdesa', 1, 0, 'sad', '', 3);

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
  `login_status` varchar(100) NOT NULL,
  `Last_login_date` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `user_name`, `user_fname`, `user_lname`, `user_email`, `user_pass`, `user_auth_key`, `login_status`, `Last_login_date`) VALUES
(3, 'ramji', 'ramu', 'ramu', 'rau@ra.co', 'ae3274d5bfa170ca69bb534be5a22467', '', 'Registered', '2014-05-01 23:43:31'),
(4, '\\sa', 'AS', 'A', 'A@akjs.ud', '8c80b057bc0b599b48cbd144558aeada', '', 'Registered', '2014-05-01 23:43:31'),
(5, 'admin', 'homnath', 'bagale', 'bhomnath@salyani.com', '21232f297a57a5a743894a0e4a801fc3', '1SYPD8XIWJ', 'Logged Out', '2014-05-01 23:43:31'),
(6, 'sushil', 'shrerha', 'lakfals', 'sushilsth21@gmail.co', '698d51a19d8a121ce581499d7b701668', '', 'Logged Out', '2014-05-01 23:43:31'),
(7, 'ksadfjlsafj', 'sadfkl', 'kldgjsdkl', 'sunil@gmail.com', '912ec803b2ce49e4a541068d495ab570', '', 'Logged Out', '2014-05-03 22:20:38'),
(8, 'jay', 'jayash', 'gsfdatgds', 'jayash@gmail.com', '912ec803b2ce49e4a541068d495ab570', '', 'Logged Out', '2014-05-01 23:43:31'),
(9, 'mynba', 'hsdydhas', 'joidjsaui', 'asdsy@gsuyguu.asyfg', '7f2b3b81e81984b415a16d0400388eda', '', 'Logged Out', '2014-05-01 23:43:31'),
(10, 'ramesh', 'ramesh', 'pah', 'pah@gmail.com', '912ec803b2ce49e4a541068d495ab570', '', 'Logged In', '2014-05-03 22:53:56'),
(11, 'raghu', 'raghu', 'kandel', 'raghu@gmail.com', '912ec803b2ce49e4a541068d495ab570', '', 'Logged Out', '2014-05-02 03:30:43'),
(12, 'pappu', 'pappu', 'daddu', 'pappu@gmail.com.np', 'd13fe0a49db0ea88fe97488f6713719c', '', 'Logged Out', '2014-05-02 03:25:34'),
(13, 'danku', 'daku', 'gada', 'daku@yahoo.com', '912ec803b2ce49e4a541068d495ab570', '', 'Logged Out', '2014-05-02 03:46:56');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
