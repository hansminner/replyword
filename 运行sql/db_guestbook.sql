/*
Navicat MySQL Data Transfer

Source Server         : honghu
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : db_guestbook

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2017-12-29 17:18:41
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tb_adm
-- ----------------------------
DROP TABLE IF EXISTS `tb_adm`;
CREATE TABLE `tb_adm` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Userword` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Ip` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_adm
-- ----------------------------
INSERT INTO `tb_adm` VALUES ('1', '18024579565', '18024579565', null, null);
INSERT INTO `tb_adm` VALUES ('2', '15935834414', '15935834414', null, null);
INSERT INTO `tb_adm` VALUES ('3', '18816891211', '18816891211', null, null);

-- ----------------------------
-- Table structure for tb_leaveword
-- ----------------------------
DROP TABLE IF EXISTS `tb_leaveword`;
CREATE TABLE `tb_leaveword` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Userid` int(11) DEFAULT NULL,
  `Createtime` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `Title` varchar(255) DEFAULT NULL,
  `Content` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_leaveword
-- ----------------------------
INSERT INTO `tb_leaveword` VALUES ('1', '10', '2017-12-20 18:18:12', '551', '范德萨3染发');
INSERT INTO `tb_leaveword` VALUES ('2', '10', '2017-12-20 15:07:00', '5555', '发呆发呆发呆萨芬');
INSERT INTO `tb_leaveword` VALUES ('3', '10', '2017-12-20 15:08:11', '55556', '放大vvjdlkaln');
INSERT INTO `tb_leaveword` VALUES ('4', '10', '2017-12-20 15:08:11', '549898', '反了你们就开了');
INSERT INTO `tb_leaveword` VALUES ('5', '10', '2017-12-20 15:08:11', '324', '凡达发出vzjhfk');
INSERT INTO `tb_leaveword` VALUES ('6', '11', '2017-12-20 18:17:01', '794614', '范德萨');
INSERT INTO `tb_leaveword` VALUES ('7', '1', '2017-12-21 15:15:11', '', '45613');
INSERT INTO `tb_leaveword` VALUES ('42', '1', '2017-12-21 08:08:03', 'èŒƒå¾·è¨', 'fdsafdaå‘çš„        ');
INSERT INTO `tb_leaveword` VALUES ('43', '1', '2017-12-21 08:08:10', 'èŒƒå¾·è¨', 'fdsafdaå‘çš„        ');
INSERT INTO `tb_leaveword` VALUES ('44', '1', '2017-12-21 08:11:52', '范德萨', '飞洒');
INSERT INTO `tb_leaveword` VALUES ('45', '1', '2017-12-21 08:11:57', '范德萨', '飞洒');
INSERT INTO `tb_leaveword` VALUES ('33', '1', '2017-12-21 07:58:39', 'è®©', '       å‘çš„è¨è² ');
INSERT INTO `tb_leaveword` VALUES ('34', '1', '2017-12-21 07:59:18', 'è®©', 'å‘çš„è¨è² ');
INSERT INTO `tb_leaveword` VALUES ('35', '1', '2017-12-21 08:00:37', 'å‘çš„è¨è²', 'å‘çš„è¨è²');
INSERT INTO `tb_leaveword` VALUES ('36', '1', '2017-12-21 08:01:48', 'fdsafda', '3333     ');
INSERT INTO `tb_leaveword` VALUES ('37', '1', '2017-12-21 08:03:13', 'fdsafda', 'å‘çš„è¯´æ³•  ');
INSERT INTO `tb_leaveword` VALUES ('38', '1', '2017-12-21 08:05:52', 'fdsafda', 'å‘çš„è¯´æ³•  ');
INSERT INTO `tb_leaveword` VALUES ('39', '1', '2017-12-21 08:06:07', 'èŒƒå¾·è¨', 'èŒƒå¾·è¨');
INSERT INTO `tb_leaveword` VALUES ('40', '1', '2017-12-21 08:07:02', 'èŒƒå¾·è¨', 'èŒƒå¾·è¨');
INSERT INTO `tb_leaveword` VALUES ('41', '1', '2017-12-21 08:07:12', 'èŒƒå¾·è¨', 'fdsafdaå‘çš„        ');
INSERT INTO `tb_leaveword` VALUES ('46', '1', '2017-12-21 08:12:08', '范德萨', '非');
INSERT INTO `tb_leaveword` VALUES ('47', '1', '2017-12-21 08:12:21', '发的萨菲', '发打发        ');
INSERT INTO `tb_leaveword` VALUES ('48', '1', '2017-12-21 08:14:09', '发的萨菲', '发打发        ');
INSERT INTO `tb_leaveword` VALUES ('49', '1', '2017-12-21 08:14:24', '范德萨', '范德萨        ');
INSERT INTO `tb_leaveword` VALUES ('50', '1', '2017-12-21 08:17:40', '发送', '非        ');
INSERT INTO `tb_leaveword` VALUES ('51', '1', '2017-12-21 08:19:02', '富士达', '蟆        ');

-- ----------------------------
-- Table structure for tb_replyword
-- ----------------------------
DROP TABLE IF EXISTS `tb_replyword`;
CREATE TABLE `tb_replyword` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Userid` int(11) DEFAULT NULL,
  `Createtimes` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `Title` varchar(255) DEFAULT NULL,
  `Content` text,
  `Leave_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_replyword
-- ----------------------------

-- ----------------------------
-- Table structure for tb_user
-- ----------------------------
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(255) DEFAULT NULL,
  `Userpwd` varchar(255) DEFAULT NULL,
  `Truename` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Qq` varchar(255) DEFAULT NULL,
  `Tel` varchar(255) DEFAULT NULL,
  `Ip` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Face` varchar(255) DEFAULT NULL,
  `Regtime` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `Sex` varchar(255) DEFAULT NULL,
  `Usertype` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_user
-- ----------------------------
INSERT INTO `tb_user` VALUES ('10', '1802457956', '18024579565', 'jonyj', '360@qq.com', '1670704741', '18024579565', null, null, null, null, null, null);
INSERT INTO `tb_user` VALUES ('11', '15935834414', '18024579565', 'jonyj', '360@qq.com', '1670704741', '18024579565', null, null, null, '2017-12-20 18:18:57', null, null);
