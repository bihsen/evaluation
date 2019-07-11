-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 11, 2019 at 02:55 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `real_estate`
--

-- --------------------------------------------------------

--
-- Table structure for table `housing`
--

DROP TABLE IF EXISTS `housing`;
CREATE TABLE IF NOT EXISTS `housing` (
  `housing_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  `adress` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `post_code` int(10) NOT NULL,
  `area` varchar(30) NOT NULL,
  `price` double NOT NULL,
  `photo` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`housing_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `housing`
--

INSERT INTO `housing` (`housing_id`, `title`, `adress`, `city`, `post_code`, `area`, `price`, `photo`, `type`, `description`) VALUES
(2, 'userOne', '10 rue des prunelles', 'luxembourg', 1454, 'cessange', 1254, 'uploads/userOne.jpg', 'different', 'stated in a cool area'),
(3, 'userTwo', '10 rue des prunelles', 'luxembourg', 4758, 'esch', 2453, 'uploads/userTwo.jpeg', 'house', 'stated in a cool area'),
(4, 'userThree', '10 rue des fleurs', 'esch', 1254, 'belval', 1548, 'uploads/userThree.jpg', ' for sale', 'cosy area '),
(5, 'userfour', '15 rue des banane', 'diekierch', 5487, 'luxembourg', 5487, 'uploads/userFour.jpg', ' for rent', 'big place and in a quite area ');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
