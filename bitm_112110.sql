-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2017 at 04:54 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bitm_112110`
--

-- --------------------------------------------------------

--
-- Table structure for table `birthdays`
--

CREATE TABLE IF NOT EXISTS `birthdays` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `birthdays`
--

INSERT INTO `birthdays` (`id`, `title`, `created_at`, `modified_at`, `deleted_at`) VALUES
(10, '29-03-2016', '2016-03-29 05:13:16', '2016-03-30 05:28:42', NULL),
(11, '02-04-2016', '2016-03-29 05:13:20', '2016-03-29 05:13:20', NULL),
(12, '08-04-2016', '2016-03-29 05:13:24', '2016-03-29 05:13:24', NULL),
(13, '18-03-2016', '2016-03-30 12:11:05', '2016-03-30 12:11:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `booktitles`
--

CREATE TABLE IF NOT EXISTS `booktitles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `booktitles`
--

INSERT INTO `booktitles` (`id`, `title`, `created_at`, `modified_at`, `deleted_at`) VALUES
(44, 'Harry Potter', '2016-03-22 01:12:33', '2016-04-10 09:53:35', NULL),
(45, 'Dictator', '2016-03-22 01:19:47', '2016-03-22 01:19:47', NULL),
(46, 'The Hunger Games', '2016-03-22 01:21:12', '2016-03-22 01:21:12', NULL),
(47, 'To Kill a Mockingbird', '2016-03-22 01:21:22', '2016-03-22 01:21:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `citys`
--

CREATE TABLE IF NOT EXISTS `citys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `citys`
--

INSERT INTO `citys` (`id`, `title`, `created_at`, `modified_at`, `deleted_at`) VALUES
(1, 'Dhaka', '2016-03-30 05:06:54', '2016-04-11 09:57:15', NULL),
(2, 'Sylhet', '2016-03-30 05:07:54', '2016-03-30 08:21:01', NULL),
(4, 'Khulna', '2016-03-30 05:11:04', '2016-03-30 08:21:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `educationlevels`
--

CREATE TABLE IF NOT EXISTS `educationlevels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tittle` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `modified_at` int(11) NOT NULL,
  `deleted_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `genders`
--

CREATE TABLE IF NOT EXISTS `genders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `genders`
--

INSERT INTO `genders` (`id`, `title`, `sex`, `created_at`, `updated_at`, `deleted_at`) VALUES
(8, 'Salina', 'female', '2016-03-30 08:18:55', '2016-03-30 08:18:55', NULL),
(9, 'Harry Potter', 'male', '2016-04-05 09:20:48', '2016-04-05 09:20:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hobbys`
--

CREATE TABLE IF NOT EXISTS `hobbys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `hobbys`
--

INSERT INTO `hobbys` (`id`, `title`, `created_at`, `modified_at`, `deleted_at`) VALUES
(7, 'Football,Pool', '2016-03-22 08:21:07', '2016-03-22 08:21:07', NULL),
(8, 'Hocky', '2016-03-22 08:44:09', '2016-03-22 08:44:09', NULL),
(9, 'Cricket,Football,Hocky', '2016-03-23 06:10:51', '2016-03-23 06:10:51', NULL),
(10, 'Pool', '2016-03-23 06:10:55', '2016-03-23 06:10:55', NULL),
(11, 'Hocky', '2016-03-23 06:11:10', '2016-03-23 06:11:10', NULL),
(12, 'Cricket,Football,Hocky', '2016-03-23 06:54:06', '2016-03-23 06:54:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mobile`
--

CREATE TABLE IF NOT EXISTS `mobile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `create_at` datetime NOT NULL,
  `update_at` datetime NOT NULL,
  `delete_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=69 ;

--
-- Dumping data for table `mobile`
--

INSERT INTO `mobile` (`id`, `title`, `create_at`, `update_at`, `delete_at`) VALUES
(56, 'Sumsung', '2016-03-18 08:39:34', '2016-03-18 08:39:34', NULL),
(59, 'Nokia', '2016-04-11 10:04:33', '2016-04-11 10:04:33', NULL),
(60, 'iPhone', '2016-04-11 10:56:58', '2016-04-11 10:56:58', NULL),
(61, 'Nokias', '2016-04-11 10:59:09', '2016-04-11 10:59:09', '2016-04-11 11:07:16'),
(62, 'Nokia', '2016-04-11 10:59:36', '2016-04-11 10:59:36', '2016-04-11 11:07:14'),
(65, 'Nokia', '2016-04-11 11:04:44', '2016-04-11 11:04:44', '2016-04-11 11:07:13'),
(66, 'Nokia', '2016-04-11 11:06:42', '2016-04-11 11:06:50', NULL),
(67, 'Nokia', '2016-04-11 11:09:07', '2016-04-11 11:09:07', '2016-04-11 11:11:50'),
(68, 'Nokias', '2016-04-11 11:11:06', '2016-04-11 11:11:45', '2016-04-11 11:11:48');

-- --------------------------------------------------------

--
-- Table structure for table `profilepictures`
--

CREATE TABLE IF NOT EXISTS `profilepictures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `profile_image` varchar(255) NOT NULL,
  `set_as` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `profilepictures`
--

INSERT INTO `profilepictures` (`id`, `profile_image`, `set_as`, `created_at`, `updated_at`, `deleted_at`) VALUES
(20, '1459879946Desert.jpg', NULL, '2016-04-05 08:26:04', '2016-04-05 08:26:04', NULL),
(21, '1459882176Penguins.jpg', NULL, '2016-04-05 08:34:04', '2016-04-05 08:34:04', NULL),
(23, '1459880644Jellyfish.jpg', NULL, '2016-04-05 08:04:04', '2016-04-05 08:04:04', NULL),
(25, '1459882312user01.jpg', NULL, '2016-04-05 08:52:04', '2016-04-05 08:52:04', NULL),
(26, '1460366762Hydrangeas.jpg', '1', '2016-04-05 09:45:04', '2016-04-05 09:45:04', NULL),
(27, '1460366736Tulips.jpg', NULL, '2016-04-11 11:36:04', '2016-04-11 11:36:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE IF NOT EXISTS `profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `profile_photo` varchar(255) NOT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_name`, `profile_photo`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(21, 'Emon', '1459459026Lighthouse.jpg', NULL, '2016-03-31 10:32:54', '2016-03-31 10:32:54', NULL),
(22, 'Mesbaul Islam', '1460746942Hydrangeas.jpg', 1, '2016-03-31 10:33:30', '2016-03-31 10:33:30', NULL),
(23, 'Mesbaul Islam', '1459941364Tulips.jpg', NULL, '2016-03-31 10:34:40', '2016-03-31 10:34:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE IF NOT EXISTS `subscriptions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subscriber_name` varchar(255) NOT NULL,
  `subscriber_email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `subscriber_name`, `subscriber_email`, `created_at`, `updated_at`, `deleted_at`) VALUES
(11, 'Rony', 'rony@gmail.com', '2016-03-24 05:54:15', '2016-03-24 05:54:15', NULL),
(12, 'Mesbaul Islam', 'mesbaul@gamil.com', '2016-03-24 05:54:23', '2016-03-24 05:54:23', NULL),
(14, 'rony', 'rony@gmail.com', '2016-03-29 05:38:54', '2016-03-29 05:38:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `summary`
--

CREATE TABLE IF NOT EXISTS `summary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `summary` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `summary`
--

INSERT INTO `summary` (`id`, `title`, `summary`, `created_at`, `updated_at`, `deleted_at`) VALUES
(9, 'The Organization', 'Higher Achievement is a four-year high school preparatory after-school program for disadvantaged urban children of various academic levels during middle school, 5th-8th grade.', '2016-03-24 11:16:39', '2016-03-24 11:16:39', NULL),
(10, 'Legal Entity', 'The Connecticut Motorsports Business Association, Inc. is a Connecticut nonprofit corporation.', '2016-03-24 11:17:28', '2016-03-24 11:17:28', NULL),
(11, 'Organization History', 'CMBA was founded in 1974 as the Connecticut Motorcycle Dealers Association. In 1992 the name was changed to the Connecticut Motorcycle Business Association to allow motorcycle accessory shops full participation in the Association.', '2016-03-24 03:37:55', '2016-03-24 03:37:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `termsconditions`
--

CREATE TABLE IF NOT EXISTS `termsconditions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(225) NOT NULL,
  `is_check` tinyint(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `update_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `termsconditions`
--

INSERT INTO `termsconditions` (`id`, `title`, `is_check`, `created_at`, `update_at`, `deleted_at`) VALUES
(5, 'rony.max83@yahoo.com', 1, '2016-03-29 07:44:38', '2016-03-29 07:44:38', NULL),
(6, 'rony.max83@yahoo.com', 1, '2016-03-30 12:12:03', '2016-03-30 12:12:03', NULL),
(7, 'rony.max83@yahoo.com', 1, '2016-04-11 11:27:28', '2016-04-11 11:27:28', NULL),
(8, 'rony.max83@yahoo.com', 1, '2016-04-11 11:28:23', '2016-04-11 11:28:23', NULL),
(9, 'rony.max83@yahoo.com', 1, '2016-04-11 11:28:44', '2016-04-11 11:28:44', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
