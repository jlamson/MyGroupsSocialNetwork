-- phpMyAdmin SQL Dump
-- version 3.5.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 04, 2012 at 10:29 PM
-- Server version: 5.0.96-0ubuntu3
-- PHP Version: 5.2.4-2ubuntu5.26

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `team01_mon_amis`
--

-- --------------------------------------------------------

--
-- Table structure for table `friend_list`
--

CREATE TABLE IF NOT EXISTS `friend_list` (
  `user_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `status_comments`
--

CREATE TABLE IF NOT EXISTS `status_comments` (
  `id` int(11) NOT NULL auto_increment,
  `status_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text,
  PRIMARY KEY  (`id`),
  KEY `user_id` (`user_id`),
  KEY `status_id` (`status_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL auto_increment,
  `email` varchar(63) NOT NULL,
  `username` varchar(31) NOT NULL,
  `first_name` varchar(31) default NULL,
  `last_name` varchar(31) default NULL,
  `password` varchar(32) NOT NULL,
  `about` text,
  `gender` char(1) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_statuses`
--

CREATE TABLE IF NOT EXISTS `user_statuses` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `status` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
