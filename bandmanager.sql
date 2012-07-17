/*
Navicat MySQL Data Transfer

Source Server         : LOCALHOST
Source Server Version : 50520
Source Host           : localhost:3306
Source Database       : banager

Target Server Type    : MYSQL
Target Server Version : 50520
File Encoding         : 65001

Date: 2012-07-17 17:48:42
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `bands`
-- ----------------------------
DROP TABLE IF EXISTS `bands`;
CREATE TABLE `bands` (
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
  `location` varchar(50) NOT NULL DEFAULT 'London',
  `bandcamp` varchar(200) DEFAULT NULL,
  `website` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bands
-- ----------------------------
INSERT INTO `bands` VALUES ('8', 'Single Mothers', 'SingleMothers.jpg', 'fake@fake.com', '000-0000', 'Punk', '', '0', 'unknown', 'TV Freaks, Touché Amoré, Teenage Kicks', 'Availability: Unknown\r\nPrevious Deals: $250\r\nDraw: 100, 150', '2012-07-01', 'London', null, null);
INSERT INTO `bands` VALUES ('9', 'The Dirty Nil', 'TheDirtyNil.jpg', 'fake@fake.com', '000-0000', 'Rock and Roll', null, '1', 'Weezer', 'Single Mothers', 'Availability: Any\r\nPrevious Deals: $50\r\nDraw: 30', '2012-06-19', 'London', null, null);
INSERT INTO `bands` VALUES ('10', 'TV Freaks', 'TVFreaks.jpg', 'fake@fake.com', '000-0000', 'Punk', null, '1', 'unknown', 'Single Mothers', 'Availability: Unknown\r\nPrevious Deals: $225\r\nDraw: 100', '2012-06-01', 'London', null, null);
INSERT INTO `bands` VALUES ('11', 'Teenage Kicks', 'TeenageKicks.jpg', 'fake@fake.com', '000-0000', 'Rock and Roll', null, '1', 'Creedence Clearwater Revival', 'The Balconies', 'Availability: Unknown\r\nPrevious Deals: $200 + 50%, $200\r\nDraw: 75', '2012-06-01', 'London', null, null);
INSERT INTO `bands` VALUES ('12', 'METZ', 'Metz.jpg', 'fake@fake.com', '000-0000', 'Punk', '', '1', 'unknown', '', 'Availability: Unknown\r\nPrevious Deals: None', '2012-07-01', 'London', '', '');

-- ----------------------------
-- Table structure for `pairings`
-- ----------------------------
DROP TABLE IF EXISTS `pairings`;
CREATE TABLE `pairings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `band_id` int(11) NOT NULL,
  `band2_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pairings
-- ----------------------------

-- ----------------------------
-- Table structure for `shows`
-- ----------------------------
DROP TABLE IF EXISTS `shows`;
CREATE TABLE `shows` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `venue` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of shows
-- ----------------------------
INSERT INTO `shows` VALUES ('1', '2012-07-05 00:00:00', '3');

-- ----------------------------
-- Table structure for `shows_bands`
-- ----------------------------
DROP TABLE IF EXISTS `shows_bands`;
CREATE TABLE `shows_bands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `show_id` int(11) NOT NULL,
  `band_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of shows_bands
-- ----------------------------
INSERT INTO `shows_bands` VALUES ('1', '1', '8');
INSERT INTO `shows_bands` VALUES ('2', '1', '9');

-- ----------------------------
-- Table structure for `venues`
-- ----------------------------
DROP TABLE IF EXISTS `venues`;
CREATE TABLE `venues` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of venues
-- ----------------------------
INSERT INTO `venues` VALUES ('1', 'The Brass');
INSERT INTO `venues` VALUES ('2', 'APK Live');
INSERT INTO `venues` VALUES ('3', 'Call the Office');
