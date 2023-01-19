-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2016 at 06:29 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `usrreg`
--

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE IF NOT EXISTS `profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user_uniqid` varchar(255) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `personal_phone` int(11) DEFAULT NULL,
  `home_phone` int(11) DEFAULT NULL,
  `office_phone` int(11) DEFAULT NULL,
  `current_address` varchar(255) DEFAULT NULL,
  `permanent_address` varchar(255) DEFAULT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `user_uniqid`, `first_name`, `last_name`, `personal_phone`, `home_phone`, `office_phone`, `current_address`, `permanent_address`, `profile_pic`, `created_at`, `modified_at`, `deleted_at`, `modified_by`) VALUES
(19, 46, '57135ef0bb7b5', 'rony', 'islam', 1738120411, 1738120411, 1738120411, 'Tajgaon', 'Tajgaon', '1460923155Penguins.jpg', NULL, '2016-04-17 09:59:15', NULL, 57135),
(21, 48, '57135fbf3076e', 'mesbaul', 'islam', 1738120411, 1738120411, 0, 'Tajgaon', 'Tajgaon', '1460923781Desert.jpg', NULL, '2016-04-17 10:13:04', NULL, 57135),
(23, 50, '5713ee7c4a1f5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_group_id` int(11) NOT NULL,
  `unique_id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `modified_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_group_id`, `unique_id`, `username`, `password`, `email`, `modified_at`, `created_at`, `deleted_at`, `is_active`) VALUES
(46, 1, '57135ef0bb7b5', 'rony', '123', 'rony.max24@gmail.com', '0000-00-00 00:00:00', '2016-04-17 12:01:20', NULL, 1),
(48, 0, '57135fbf3076e', 'ronyk', '123', 'rony@gmail.com', '0000-00-00 00:00:00', '2016-04-17 12:04:47', NULL, 1),
(50, 0, '5713ee7c4a1f5', 'abc', '123', 'abc@abc.abc', '0000-00-00 00:00:00', '2016-04-17 10:13:48', NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
