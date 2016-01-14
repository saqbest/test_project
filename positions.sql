/*
Navicat MySQL Data Transfer

Source Server         : 111
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : positions

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2016-01-13 17:53:55
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
  `key` smallint(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of positions
-- ----------------------------
INSERT INTO `positions` VALUES ('28', '60', '368', '1');
INSERT INTO `positions` VALUES ('29', '74', '93', '2');
