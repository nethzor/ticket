-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 15, 2017 at 07:01 PM
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
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `username` varchar(40) NOT NULL,
  `cust_fname` varchar(255) NOT NULL,
  `cust_lname` varchar(255) NOT NULL,
  `cust_email` varchar(255) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`username`, `cust_fname`, `cust_lname`, `cust_email`) VALUES
('dylanheunis', 'dylan', 'heunis', 'dylanheunis11@gmail.com'),
('marykemarx', 'maryke', 'marx', 'rykemarx@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `customer_ticket`
--

CREATE TABLE IF NOT EXISTS `customer_ticket` (
  `username` varchar(40) NOT NULL,
  `ticket_id` int(8) NOT NULL,
  `quantity` int(8) NOT NULL DEFAULT '1',
  PRIMARY KEY (`username`,`ticket_id`),
  KEY `fk_ticket_id` (`ticket_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer_ticket`
--

INSERT INTO `customer_ticket` (`username`, `ticket_id`, `quantity`) VALUES
('dylanheunis', 1, 5),
('dylanheunis', 2, 1),
('marykemarx', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `query`
--

CREATE TABLE IF NOT EXISTS `query` (
  `query_id` int(8) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `query_message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`query_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=111 ;

--
-- Dumping data for table `query`
--

INSERT INTO `query` (`query_id`, `username`, `query_message`, `timestamp`) VALUES
(108, 'Dylan Heunis', 'asdfasdf sdaf asdf asdf', '2017-08-14 18:34:32'),
(109, 'sdfasdf ', 'asdf asdf asdf asdf asdf', '2017-08-14 18:34:40'),
(110, 'Dylan Heunis', '12312312 3asdff dfsd afsdf asdf asdf asdf', '2017-08-14 18:35:03');

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

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_ticket`
--
ALTER TABLE `customer_ticket`
  ADD CONSTRAINT `fk_ticket_id` FOREIGN KEY (`ticket_id`) REFERENCES `ticket` (`ticket_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_username` FOREIGN KEY (`username`) REFERENCES `customer` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
