-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 15, 2017 at 07:02 PM
-- Server version: 5.5.57-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE IF NOT EXISTS `ticket` (
  `ticket_id` int(8) NOT NULL AUTO_INCREMENT,
  `ticket_name` varchar(255) DEFAULT NULL,
  `ticket_desc` varchar(255) NOT NULL,
  `ticket_start_date` datetime NOT NULL,
  `ticket_end_date` datetime NOT NULL,
  `ticket_price` decimal(5,2) DEFAULT NULL,
  PRIMARY KEY (`ticket_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`ticket_id`, `ticket_name`, `ticket_desc`, `ticket_start_date`, `ticket_end_date`, `ticket_price`) VALUES
(1, 'IIC_match3', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 589.99),
(2, 'super_rugby_18_Aug_2017', 'Brumbies vs Sharks, 14:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 420.00);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
