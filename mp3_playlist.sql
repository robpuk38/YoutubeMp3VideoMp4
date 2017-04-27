/*
Navicat MySQL Data Transfer

Source Server         : PCT
Source Server Version : 50552
Source Host           : 107.180.58.217:3306
Source Database       : pbt

Target Server Type    : MYSQL
Target Server Version : 50552
File Encoding         : 65001

Date: 2016-12-28 13:56:05
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for mp3_playlist
-- ----------------------------
DROP TABLE IF EXISTS `mp3_playlist`;
CREATE TABLE `mp3_playlist` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `fbuserid` varchar(255) NOT NULL DEFAULT '0',
  `ytid` varchar(255) NOT NULL DEFAULT '0',
  `songname` varchar(255) NOT NULL DEFAULT '0',
  `filelocation` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for mp3_tmp
-- ----------------------------
DROP TABLE IF EXISTS `mp3_tmp`;
CREATE TABLE `mp3_tmp` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `fbuserid` varchar(255) NOT NULL DEFAULT '0',
  `ytid` varchar(255) NOT NULL DEFAULT '0',
  `songname` varchar(255) NOT NULL DEFAULT '0',
  `filelocation` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=115 DEFAULT CHARSET=latin1;
