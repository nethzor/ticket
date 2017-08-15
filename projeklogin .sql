-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2017 at 05:41 PM
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
  `id` int(11) NOT NULL,
  `eventName` varchar(200) DEFAULT NULL,
  `eventDescription` varchar(5000) DEFAULT NULL,
  `eventCategory` varchar(200) DEFAULT NULL,
  `eventLink` text,
  `eventPrice` float DEFAULT NULL,
  `eventDate` date DEFAULT NULL,
  `eventPhotoLink` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `eventName`, `eventDescription`, `eventCategory`, `eventLink`, `eventPrice`, `eventDate`, `eventPhotoLink`) VALUES
(1, 'Baseball', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lorem sem, dignissim ut orci nec, vulputate varius ipsum. Cras tristique maximus ligula, ut posuere lorem lobortis nec. Duis lobortis varius vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Fusce vehicula augue vitae massa tempus, nec imperdiet lacus facilisis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras a nibh consectetur, pharetra metus sit amet, semper diam. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Ut mollis, turpis in varius pretium, elit ex faucibus ante, ac cursus massa elit vel ligula.', 'Sport', 'baseball.php', 10, '2018-08-16', 'media/images/bb/bb1.jpg'),
(2, 'Festival', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lorem sem, dignissim ut orci nec, vulputate varius ipsum. Cras tristique maximus ligula, ut posuere lorem lobortis nec. Duis lobortis varius vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae Fusce vehicula augue vitae massa tempus, nec imperdiet lacus facilisis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras a nibh consectetur, pharetra metus sit amet, semper diam. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Ut mollis, turpis in varius pretium, elit ex faucibus ante, ac cursus massa elit vel ligula.', 'Festival', 'festival.php', 20, '2017-11-08', 'media/images/festival/1.jpeg'),
(3, 'Theater', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lorem sem, dignissim ut orci nec, vulputate varius ipsum. Cras tristique maximus ligula, ut posuere lorem lobortis nec. Duis lobortis varius vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae Fusce vehicula augue vitae massa tempus, nec imperdiet lacus facilisis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras a nibh consectetur, pharetra metus sit amet, semper diam. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Ut mollis, turpis in varius pretium, elit ex faucibus ante, ac cursus massa elit vel ligula.', 'Theater', 'theater.php', 29.99, '2017-08-21', 'media/images/theater/1.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
