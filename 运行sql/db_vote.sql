/*
Navicat MySQL Data Transfer

Source Server         : honghu
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : db_vote

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2017-12-29 17:18:16
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `pwd` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'faker', '222');
INSERT INTO `admin` VALUES ('2', 'pawn', '2333');
INSERT INTO `admin` VALUES ('3', 'imp', '111');
INSERT INTO `admin` VALUES ('4', 'omp', '343');

-- ----------------------------
-- Table structure for ve_gong
-- ----------------------------
DROP TABLE IF EXISTS `ve_gong`;
CREATE TABLE `ve_gong` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `publisher` varchar(255) DEFAULT NULL,
  `state` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ve_gong
-- ----------------------------

-- ----------------------------
-- Table structure for ve_ip
-- ----------------------------
DROP TABLE IF EXISTS `ve_ip`;
CREATE TABLE `ve_ip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ve_ip
-- ----------------------------
INSERT INTO `ve_ip` VALUES ('1', '::1', 'diyi', null, null);
INSERT INTO `ve_ip` VALUES ('2', '218.147.163.87', 'diyi', '3', '2017-12-28 00:00:00');
INSERT INTO `ve_ip` VALUES ('3', '218.136.213.237', 'diyi', '3', '2017-12-28 00:00:00');
INSERT INTO `ve_ip` VALUES ('4', '66.182.170.222', 'diyi', '1', '2017-12-28 00:00:00');
INSERT INTO `ve_ip` VALUES ('5', '218.161.194.171', '钱宝对与错', '1', '2017-12-28 00:00:00');
INSERT INTO `ve_ip` VALUES ('6', '60.156.106.209', '钱宝对与错', '4', '2017-12-28 00:00:00');
INSERT INTO `ve_ip` VALUES ('7', '218.139.90.96', '钱宝对与错', '4', '2017-12-28 00:00:00');
INSERT INTO `ve_ip` VALUES ('8', '66.171.82.127', '钱宝对与错', '1', '2017-12-29 00:00:00');

-- ----------------------------
-- Table structure for ve_liu
-- ----------------------------
DROP TABLE IF EXISTS `ve_liu`;
CREATE TABLE `ve_liu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title_id` int(11) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `user_ip` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ve_liu
-- ----------------------------
INSERT INTO `ve_liu` VALUES ('1', '1', '你滴哦', '2017-12-29 15:09:22', null, '1');
INSERT INTO `ve_liu` VALUES ('2', '1', '不对', '2017-12-29 15:09:25', null, '1');
INSERT INTO `ve_liu` VALUES ('3', '1', '不好', '2017-12-29 15:09:28', null, '2');
INSERT INTO `ve_liu` VALUES ('4', '1', '不支持', '2017-12-29 15:09:33', null, '2');
INSERT INTO `ve_liu` VALUES ('5', '2', '不赞同', '2017-12-29 15:09:49', null, '3');
INSERT INTO `ve_liu` VALUES ('6', '1', '\r\n             发达省份   ', '2017-12-29 00:00:00', '61.82.145.182', '2');
INSERT INTO `ve_liu` VALUES ('7', '1', '\r\n          4564      ', '2017-12-29 00:00:00', '218.200.176.173', '2');
INSERT INTO `ve_liu` VALUES ('8', '1', '\r\n非法                ', '2017-12-29 00:00:00', '66.86.199.226', '2');
INSERT INTO `ve_liu` VALUES ('9', '1', '\r\n                飞洒', '2017-12-29 00:00:00', '204.165.235.91', '2');
INSERT INTO `ve_liu` VALUES ('10', '1', '\r\n    发            ', '2017-12-29 00:00:00', '64.62.79.182', '2');
INSERT INTO `ve_liu` VALUES ('11', '1', '\r\n           飞洒     ', '2017-12-29 00:00:00', '60.126.245.240', '2');
INSERT INTO `ve_liu` VALUES ('12', '1', '\r\n             发   ', '2017-12-29 00:00:00', '59.194.135.255', '2');
INSERT INTO `ve_liu` VALUES ('13', '1', '\r\n非法                ', '2017-12-29 00:00:00', '61.141.79.146', '2');
INSERT INTO `ve_liu` VALUES ('14', '1', '\r\n 非法               ', '2017-12-29 00:00:00', '62.165.128.252', '2');
INSERT INTO `ve_liu` VALUES ('15', '1', '\r\n 非法               \r\n                ', '2017-12-29 00:00:00', '60.106.239.95', '2');
INSERT INTO `ve_liu` VALUES ('16', '1', '\r\n发生大幅a                ', '2017-12-29 00:00:00', '.179.192.197', '2');

-- ----------------------------
-- Table structure for ve_vote
-- ----------------------------
DROP TABLE IF EXISTS `ve_vote`;
CREATE TABLE `ve_vote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `publisher` varchar(255) DEFAULT NULL,
  `option_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ve_vote
-- ----------------------------
INSERT INTO `ve_vote` VALUES ('1', '钱宝对与错', '2017-12-28 11:07:06', null, null);
INSERT INTO `ve_vote` VALUES ('2', '叶檀的水平', null, null, null);

-- ----------------------------
-- Table structure for ve_xvote
-- ----------------------------
DROP TABLE IF EXISTS `ve_xvote`;
CREATE TABLE `ve_xvote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vote_title` varchar(255) DEFAULT NULL,
  `option` varchar(255) DEFAULT NULL,
  `title_id` int(11) DEFAULT NULL,
  `vote_num` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ve_xvote
-- ----------------------------
INSERT INTO `ve_xvote` VALUES ('1', '钱宝对与错', '有罪', '1', '14');
INSERT INTO `ve_xvote` VALUES ('3', '叶檀的水平', '2就开了', '2', '33');
INSERT INTO `ve_xvote` VALUES ('4', '钱宝对与错', '经济犯罪', '1', '2');
INSERT INTO `ve_xvote` VALUES ('5', '钱宝对与错', '刑事犯罪', '1', '1');
