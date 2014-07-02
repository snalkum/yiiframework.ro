-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 02, 2014 at 05:44 PM
-- Server version: 5.5.37
-- PHP Version: 5.4.6-1ubuntu1.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `yiiframework`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `news_id` int(11) NOT NULL,
  `comment_user` int(11) NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE IF NOT EXISTS `group` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `writen_on` datetime NOT NULL,
  `modifed_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `writen_on`, `modifed_on`) VALUES
(1, 'Testgsdgsdgfsdg', 'Nu stiu fasfasfafsafasfasfasf', '2014-06-27 07:57:43', '2014-06-27 07:57:43'),
(2, 'Yii 2.0 Beta is released', 'Test', '2014-06-16 15:43:46', '2014-06-16 15:43:46'),
(3, 'Yii 2.0 Beta is released', 'tas', '2014-06-16 15:43:54', '2014-06-16 15:43:54'),
(4, 'test', 'test', '2014-06-27 08:00:45', '2014-06-27 08:00:45'),
(5, 'test', 'test', '2014-06-16 11:06:05', '2014-06-16 11:06:05'),
(6, 'test', 'test', '2014-06-16 11:10:45', '2014-06-16 11:10:45'),
(7, 'test', 'test', '2014-06-16 11:10:52', '2014-06-16 11:10:52'),
(8, 'test', 'test', '2014-06-16 11:11:41', '2014-06-16 11:11:41'),
(9, 'test', 'test', '2014-06-16 11:11:55', '2014-06-16 11:11:55'),
(10, 'Doar un test', 'fasf', '2014-06-30 15:13:17', '2014-06-30 15:13:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(255) NOT NULL,
  `salt` varchar(40) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_status` tinyint(4) NOT NULL DEFAULT '1',
  `activation_key` varchar(40) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
