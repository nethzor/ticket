-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2017 at 07:00 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projeklogin`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `eventName` varchar(255) NOT NULL,
  `eventDescription` varchar(255) NOT NULL,
  `eventCategory` varchar(255) NOT NULL,
  `eventLink` varchar(255) NOT NULL,
  `eventPrice` float NOT NULL,
  `eventDate` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `eventName`, `eventDescription`, `eventCategory`, `eventLink`, `eventPrice`, `eventDate`) VALUES
(1, 'Baseball match', 'Baseball match between yankees and bears', 'Baseball', 'eventOne.php', 250, '2017-08-31 16:30:00.000000'),
(2, 'Exes vs Ys', 'Baseball match between exes and Ys', 'Baseball', 'eventOne.php', 250, '2017-09-15 17:31:00.000000'),
(3, 'Fame', 'Musical of students', 'Theater', 'eventTwo.php', 250, '2017-10-20 17:30:00.000000'),
(4, 'Liefling', 'Afrikaans Musical', 'Theater', 'eventTwo.php', 150, '2017-08-22 20:00:00.000000'),
(5, '', '', '', '', 0, '0000-00-00 00:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `resell`
--

CREATE TABLE `resell` (
  `username` text NOT NULL,
  `Name` text NOT NULL,
  `id` int(11) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `contact_info` int(10) NOT NULL,
  `event_name` text NOT NULL,
  `num_of_tickets` int(1) NOT NULL DEFAULT '1',
  `ticket_price` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resell`
--

INSERT INTO `resell` (`username`, `Name`, `id`, `email`, `contact_info`, `event_name`, `num_of_tickets`, `ticket_price`) VALUES
('mcremer', '', 1234543210, 'name@mail.com', 812345678, 'baseball', 4, 0),
('zhoogenboezem', '', 123987654, 'zh@gmail.com', 734567890, 'theater', 2, 0),
('wwouda', '', 321654987, 'wwouda@mail.com', 6546548, 'dgbdgb', 5, 521),
('gjzTJ', '', NULL, '', 0, '', 1, 0),
('gxkyjxthj', '', 45648648, 'fhdztrhDh', 5685968, 'gzfgjzD', 1, 5),
('sadasd', '', NULL, 'sdassadas', 0, 'asdad', 2, 334),
('', '', NULL, '', 0, ' sdds', 3, 0),
('', '', NULL, '', 0, ' zebra', 560, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `ticket_code` int(11) NOT NULL,
  `ticket_price` int(5) NOT NULL,
  `seat_num` varchar(255) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `reserved` tinyint(1) NOT NULL DEFAULT '0',
  `booked` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`ticket_code`, `ticket_price`, `seat_num`, `event_id`, `reserved`, `booked`) VALUES
(1, 500, '001A', 1, 0, 0),
(2, 500, '002A', 1, 0, 0),
(3, 500, '003A', 1, 0, 0),
(4, 500, '004A', 1, 0, 0),
(5, 500, '005A', 1, 0, 0),
(6, 500, '006A', 1, 0, 0),
(7, 500, '007A', 1, 0, 0),
(8, 500, '008A', 1, 0, 0),
(9, 500, '009A', 1, 0, 0),
(10, 500, '010A', 1, 0, 0),
(11, 500, '011A', 1, 0, 0),
(12, 500, '012A', 1, 0, 0),
(13, 500, '013A', 1, 0, 0),
(14, 500, '014A', 1, 0, 0),
(15, 500, '015A', 1, 0, 0),
(16, 500, '016A', 1, 0, 0),
(17, 500, '017A', 1, 0, 0),
(18, 500, '018A', 1, 0, 0),
(19, 500, '019A', 1, 0, 0),
(20, 500, '020A', 1, 0, 0),
(21, 500, '001B', 1, 0, 0),
(22, 500, '002B', 1, 0, 0),
(23, 500, '003B', 1, 0, 0),
(24, 500, '004B', 1, 0, 0),
(25, 500, '005B', 1, 0, 0),
(26, 500, '006B', 1, 0, 0),
(27, 500, '007B', 1, 0, 0),
(28, 500, '008B', 1, 0, 0),
(29, 500, '009B', 1, 0, 0),
(30, 500, '010B', 1, 0, 0),
(31, 500, '011B', 1, 0, 0),
(32, 500, '012B', 1, 0, 0),
(33, 500, '013B', 1, 0, 0),
(34, 500, '014B', 1, 0, 0),
(35, 500, '015B', 1, 0, 0),
(36, 500, '016B', 1, 0, 0),
(37, 500, '017B', 1, 0, 0),
(38, 500, '018B', 1, 0, 0),
(39, 500, '019B', 1, 0, 0),
(40, 500, '020B', 1, 0, 0),
(41, 500, '001C', 1, 0, 0),
(42, 500, '002C', 1, 0, 0),
(43, 500, '003C', 1, 0, 0),
(44, 500, '004C', 1, 0, 0),
(45, 500, '005C', 1, 0, 0),
(46, 500, '006C', 1, 0, 0),
(47, 500, '007C', 1, 0, 0),
(48, 500, '008C', 1, 0, 0),
(49, 500, '009C', 1, 0, 0),
(50, 500, '010C', 1, 0, 0),
(51, 500, '011C', 1, 0, 0),
(52, 500, '012C', 1, 0, 0),
(53, 500, '013C', 1, 0, 0),
(54, 500, '014C', 1, 0, 0),
(55, 500, '015C', 1, 0, 0),
(56, 500, '016C', 1, 0, 0),
(57, 500, '017C', 1, 0, 0),
(58, 500, '018C', 1, 0, 0),
(59, 500, '019C', 1, 0, 0),
(60, 500, '020C', 1, 0, 0),
(61, 500, '637E', 1, 0, 0),
(62, 500, '445C', 1, 0, 0),
(63, 500, '625E', 1, 0, 0),
(64, 500, '134S', 1, 0, 0),
(65, 500, '012C', 1, 0, 0),
(66, 500, '013C', 1, 0, 0),
(67, 500, '014C', 1, 0, 0),
(68, 500, '015C', 1, 0, 0),
(69, 500, '016C', 1, 0, 0),
(70, 500, '017C', 1, 0, 0),
(71, 500, '018C', 1, 0, 0),
(72, 500, '019C', 1, 0, 0),
(73, 500, '020C', 1, 0, 0),
(74, 500, '987T', 1, 0, 0),
(75, 500, '348H', 1, 0, 0),
(76, 500, '958M', 1, 0, 0),
(77, 500, '455B', 1, 0, 0),
(78, 500, '356B', 1, 0, 0),
(79, 500, '214D', 1, 0, 0),
(80, 500, '658Y', 1, 0, 0),
(81, 500, '923F', 1, 0, 0),
(82, 500, '360H', 1, 0, 0),
(83, 500, '578S', 1, 0, 0),
(84, 500, '236W', 1, 0, 0),
(85, 500, '331V', 1, 0, 0),
(86, 500, '934P', 1, 0, 0),
(87, 500, '546D', 1, 0, 0),
(88, 500, '206Y', 1, 0, 0),
(89, 500, '013Z', 1, 0, 0),
(90, 500, '541T', 1, 0, 0),
(91, 500, '114E', 1, 0, 0),
(92, 500, '598S', 1, 0, 0),
(93, 500, '257F', 1, 0, 0),
(94, 500, '745N', 1, 0, 0),
(95, 500, '114V', 1, 0, 0),
(96, 500, '414B', 1, 0, 0),
(97, 500, '507K', 1, 0, 0),
(98, 500, '098F', 1, 0, 0),
(99, 500, '009B', 1, 0, 0),
(100, 500, '862V', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `userinformationtable`
--

CREATE TABLE `userinformationtable` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userinformationtable`
--

INSERT INTO `userinformationtable` (`id`, `username`, `password`, `email`) VALUES
(1, 'Admin', '123', 'I@me.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ticket_code`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `userinformationtable`
--
ALTER TABLE `userinformationtable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ticket_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT for table `userinformationtable`
--
ALTER TABLE `userinformationtable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
