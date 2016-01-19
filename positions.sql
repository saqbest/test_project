/*
Navicat MySQL Data Transfer

Source Server         : 111
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : positions

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2016-01-19 16:54:13
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for positions
-- ----------------------------
DROP TABLE IF EXISTS `positions`;
CREATE TABLE `positions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `top` smallint(4) NOT NULL,
  `left` smallint(4) NOT NULL,
  `color` varchar(15) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `positions(user_id)--users(id)` (`user_id`),
  CONSTRAINT `positions(user_id)--users(id)` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of positions
-- ----------------------------
INSERT INTO `positions` VALUES ('12', '291', '391', 'rgb(80,119,179)', '17');
INSERT INTO `positions` VALUES ('13', '10', '20', 'rgb(105,102,102', '17');
INSERT INTO `positions` VALUES ('14', '260', '1147', 'rgb(104,2,78)', '17');
INSERT INTO `positions` VALUES ('15', '-7', '523', 'rgb(136,9,187)', '17');
INSERT INTO `positions` VALUES ('16', '25', '35', 'rgb(160,150,241', '17');
INSERT INTO `positions` VALUES ('17', '49', '-69', 'rgb(12,115,199)', '17');
INSERT INTO `positions` VALUES ('18', '5', '15', 'rgb(246,236,96)', '18');
INSERT INTO `positions` VALUES ('19', '5', '15', 'rgb(120,126,129', '19');
INSERT INTO `positions` VALUES ('20', '10', '20', 'rgb(101,212,109', '19');
INSERT INTO `positions` VALUES ('21', '15', '25', 'rgb(158,229,128', '19');
INSERT INTO `positions` VALUES ('22', '20', '30', 'rgb(53,87,156)', '19');
INSERT INTO `positions` VALUES ('23', '25', '35', 'rgb(244,239,227', '19');
INSERT INTO `positions` VALUES ('24', '30', '40', 'rgb(96,39,51)', '19');
INSERT INTO `positions` VALUES ('25', '5', '15', 'rgb(251,137,145', '20');
INSERT INTO `positions` VALUES ('26', '20', '40', 'rgb(24,214,240)', '20');
INSERT INTO `positions` VALUES ('27', '35', '65', 'rgb(43,55,44)', '20');
INSERT INTO `positions` VALUES ('28', '50', '90', 'rgb(236,109,167', '20');
INSERT INTO `positions` VALUES ('29', '65', '115', 'rgb(55,86,78)', '20');
INSERT INTO `positions` VALUES ('30', '80', '140', 'rgb(0,172,133)', '20');
INSERT INTO `positions` VALUES ('31', '68', '208', 'rgb(159,153,38)', '21');
INSERT INTO `positions` VALUES ('32', '100', '100', 'rgb(164,231,202', '21');
INSERT INTO `positions` VALUES ('33', '97', '413', 'rgb(89,181,76)', '21');
INSERT INTO `positions` VALUES ('34', '200', '200', 'rgb(138,166,162', '21');
INSERT INTO `positions` VALUES ('35', '72', '885', 'rgb(38,81,36)', '21');
INSERT INTO `positions` VALUES ('36', '300', '300', 'rgb(162,78,24)', '21');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('17', 'test', 'fghdfghdfh@fgdfg.tt', '96e79218965eb72c92a549dd5a330112');
INSERT INTO `users` VALUES ('18', 'test1', 'adda@ffrew.frf', '96e79218965eb72c92a549dd5a330112');
INSERT INTO `users` VALUES ('19', 'test3', 'fghdfghdfh@fgdfg.tt', '96e79218965eb72c92a549dd5a330112');
INSERT INTO `users` VALUES ('20', 'test5', 'adda@ffrew.frf', '96e79218965eb72c92a549dd5a330112');
INSERT INTO `users` VALUES ('21', 'test11', 'adda@ffrew.frf', '96e79218965eb72c92a549dd5a330112');
