/*
Navicat MySQL Data Transfer

Source Server         : honghu
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : db_diary

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2017-12-29 17:18:51
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for look_class
-- ----------------------------
DROP TABLE IF EXISTS `look_class`;
CREATE TABLE `look_class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class` varchar(255) DEFAULT NULL COMMENT '提醒任务',
  `sclass` varchar(255) DEFAULT NULL COMMENT '提醒任务添加人',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of look_class
-- ----------------------------

-- ----------------------------
-- Table structure for look_jj
-- ----------------------------
DROP TABLE IF EXISTS `look_jj`;
CREATE TABLE `look_jj` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL COMMENT '闹铃标题',
  `nows` varchar(255) DEFAULT NULL COMMENT '提醒的时间',
  `woed` varchar(255) DEFAULT NULL COMMENT '提醒添加人',
  `leixing` varchar(255) DEFAULT NULL COMMENT '闹铃执行方式',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of look_jj
-- ----------------------------

-- ----------------------------
-- Table structure for look_look
-- ----------------------------
DROP TABLE IF EXISTS `look_look`;
CREATE TABLE `look_look` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '日记记录',
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `nows` varchar(255) DEFAULT NULL COMMENT '添加时间',
  `jjj` varchar(255) DEFAULT NULL COMMENT '内容',
  `wordi` varchar(255) DEFAULT NULL COMMENT '添加人',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of look_look
-- ----------------------------

-- ----------------------------
-- Table structure for look_yong
-- ----------------------------
DROP TABLE IF EXISTS `look_yong`;
CREATE TABLE `look_yong` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin` varchar(255) DEFAULT NULL COMMENT '用户名',
  `adminchk` varchar(255) DEFAULT NULL COMMENT '密码',
  `nows` varchar(255) DEFAULT NULL COMMENT '登陆时间',
  `wenti` varchar(255) DEFAULT NULL COMMENT '密保问题',
  `daan` varchar(255) DEFAULT NULL COMMENT '密保答案',
  `mile` varchar(255) DEFAULT NULL COMMENT '邮箱',
  `name` varchar(255) DEFAULT NULL COMMENT '真实姓名',
  `cd` varchar(255) DEFAULT NULL COMMENT '证件号',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of look_yong
-- ----------------------------
