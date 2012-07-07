-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 07, 2012 at 04:25 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bandmanager`
--

-- --------------------------------------------------------

--
-- Table structure for table `bands`
--

CREATE TABLE IF NOT EXISTS `bands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `genre` varchar(20) NOT NULL,
  `tags` text,
  `localtouring` tinyint(1) NOT NULL,
  `soundslike` text,
  `homies` text,
  `notes` text,
  `lastcontact` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `bands`
--

INSERT INTO `bands` (`id`, `name`, `image`, `email`, `phone`, `genre`, `tags`, `localtouring`, `soundslike`, `homies`, `notes`, `lastcontact`) VALUES
(8, 'Single Mothers', 'SingleMothers.jpg', 'fake@fake.com', '000-0000', 'Punk', '', 0, 'unknown', 'TV Freaks, Touché Amoré, Teenage Kicks', 'Availability: Unknown\r\nPrevious Deals: $250\r\nDraw: 100, 150', '2012-07-01'),
(9, 'The Dirty Nil', 'TheDirtyNil.jpg', 'fake@fake.com', '000-0000', 'Rock and Roll', NULL, 1, 'Weezer', 'Single Mothers', 'Availability: Any\r\nPrevious Deals: $50\r\nDraw: 30', '2012-06-19'),
(10, 'TV Freaks', 'TVFreaks.jpg', 'fake@fake.com', '000-0000', 'Punk', NULL, 1, 'unknown', 'Single Mothers', 'Availability: Unknown\r\nPrevious Deals: $225\r\nDraw: 100', '2012-06-01'),
(11, 'Teenage Kicks', 'TeenageKicks.jpg', 'fake@fake.com', '000-0000', 'Rock and Roll', NULL, 1, 'Creedence Clearwater Revival', 'The Balconies', 'Availability: Unknown\r\nPrevious Deals: $200 + 50%, $200\r\nDraw: 75', '2012-06-01'),
(12, 'METZ', 'Metz.jpg', 'fake@fake.com', '000-0000', 'Punk', NULL, 1, 'unknown', NULL, 'Availability: Unknown\r\nPrevious Deals: None', '2012-07-01');

-- --------------------------------------------------------

--
-- Table structure for table `pairings`
--

CREATE TABLE IF NOT EXISTS `pairings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `band_id` int(11) NOT NULL,
  `band2_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `shows`
--

CREATE TABLE IF NOT EXISTS `shows` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `venue` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `shows`
--

INSERT INTO `shows` (`id`, `date`, `venue`) VALUES
(1, '2012-07-05 00:00:00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `shows_bands`
--

CREATE TABLE IF NOT EXISTS `shows_bands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `show_id` int(11) NOT NULL,
  `band_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `shows_bands`
--

INSERT INTO `shows_bands` (`id`, `show_id`, `band_id`) VALUES
(1, 1, 8),
(2, 1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `venues`
--

CREATE TABLE IF NOT EXISTS `venues` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `venues`
--

INSERT INTO `venues` (`id`, `name`) VALUES
(1, 'The Brass'),
(2, 'APK Live'),
(3, 'Call the Office');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
