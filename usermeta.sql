-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2017 at 05:29 PM
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
-- Database: `usermeta`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_GUID` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `entry_date` datetime NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = pending, 1 = approved'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_GUID`, `email`, `password`, `entry_date`, `status`) VALUES
(17, '9959ddbd81aaaa6be891cfb12e2d8559', 'xandrepret@hotmail.com', '08de07ede1ebf81881128ab6abc86206', '2017-08-14 13:41:52', '0'),
(18, 'd1d0f82c2ed2149e60e03630375c81a1', 'megan@gmail.com', '501ce25051f92cb4215050172d270208', '2017-08-14 13:44:00', '0'),
(19, '9db9fc17a52d0ab8acad89a2af89da25', 'xpretorius@gmail.com', '501ce25051f92cb4215050172d270208', '2017-08-14 13:45:48', '0'),
(20, '7f949beb7eada457f8dc83628d64720e', 'johan@gmail.com', '501ce25051f92cb4215050172d270208', '2017-08-15 03:12:43', '0'),
(21, 'b8242b4e9bad1cd10685ab81ed2f51ce', 'riaanh@gmail.com', 'c06db68e819be6ec3d26c6038d8e8d1f', '2017-08-15 13:32:12', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_profile`
--

CREATE TABLE `tbl_user_profile` (
  `profile_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_profile`
--

INSERT INTO `tbl_user_profile` (`profile_id`, `user_id`, `name`) VALUES
(1, 17, 'Xandre Pretorius'),
(2, 18, 'Megan Cremer'),
(3, 19, 'Xandre Pretorius 2'),
(4, 20, 'Johan Pieterse'),
(5, 21, 'Riaan Hoogenboezem');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_user_profile`
--
ALTER TABLE `tbl_user_profile`
  ADD PRIMARY KEY (`profile_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tbl_user_profile`
--
ALTER TABLE `tbl_user_profile`
  MODIFY `profile_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_user_profile`
--
ALTER TABLE `tbl_user_profile`
  ADD CONSTRAINT `tbl_user_profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
