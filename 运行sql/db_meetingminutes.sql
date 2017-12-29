/*
Navicat MySQL Data Transfer

Source Server         : honghu
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : db_meetingminutes

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2017-12-29 17:18:33
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tb_meeting_depart
-- ----------------------------
DROP TABLE IF EXISTS `tb_meeting_depart`;
CREATE TABLE `tb_meeting_depart` (
  `department_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`department_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_meeting_depart
-- ----------------------------

-- ----------------------------
-- Table structure for tb_meeting_info
-- ----------------------------
DROP TABLE IF EXISTS `tb_meeting_info`;
CREATE TABLE `tb_meeting_info` (
  `meeting_id` int(11) NOT NULL AUTO_INCREMENT,
  `meeting_name` varchar(255) DEFAULT NULL,
  `meeting_depart` varchar(255) DEFAULT NULL,
  `meeting_place` varchar(255) DEFAULT NULL,
  `meeting_date` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `meeting_host` varchar(255) DEFAULT NULL,
  `meeting_present` varchar(255) DEFAULT NULL,
  `meeting_saver` varchar(255) DEFAULT NULL,
  `meeting_abstract` varchar(255) DEFAULT NULL,
  `meeting_address` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`meeting_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_meeting_info
-- ----------------------------
INSERT INTO `tb_meeting_info` VALUES ('1', '代表大会', '1', '浙江嘉兴', '2017-12-26 11:42:56', '张国立', '王凯', '书记', '', 'upfile1514196113.txt');
INSERT INTO `tb_meeting_info` VALUES ('2', '代表大会', '1', '浙江嘉兴', '2017-12-26 11:42:56', '张国立', '王凯', '书记', '', 'upfile1514196245.txt');
INSERT INTO `tb_meeting_info` VALUES ('3', '代表大会', '1', '浙江嘉兴', '2017-12-26 11:42:56', '张国立', '王凯', '书记', '', 'upfile1514196275.txt');
INSERT INTO `tb_meeting_info` VALUES ('4', '代表大会', '1', '浙江嘉兴', '2017-12-26 11:42:56', '张国立', '王凯', '书记', '', 'upfile1514196288.txt');
INSERT INTO `tb_meeting_info` VALUES ('5', '代表大会', '1', '浙江嘉兴', '2017-12-26 11:42:56', '张国立', '王凯', '书记', '', 'upfile1514196353.txt');
INSERT INTO `tb_meeting_info` VALUES ('6', '代表大会', '1', '红船', '2017-12-26 11:42:56', '董卿', '赵忠祥', '书记', '', 'upfile1514196395.txt');
INSERT INTO `tb_meeting_info` VALUES ('7', '代表大会', '1', '红船', '2017-12-26 11:42:56', '董卿', '赵忠祥', '书记', '', 'upfile1514196403.txt');
INSERT INTO `tb_meeting_info` VALUES ('8', '代表大会', '1', '红船', '2017-12-26 11:42:56', '董卿', '赵忠祥', '书记', '', 'upfile1514196419.txt');
INSERT INTO `tb_meeting_info` VALUES ('9', '代表大会', '1', '红船', '2017-12-26 11:42:56', '董卿', '赵忠祥', '书记', '', 'upfile1514196603.txt');
INSERT INTO `tb_meeting_info` VALUES ('10', '代表大会', '1', '红船', '2017-12-26 11:42:56', '董卿', '赵忠祥', '书记', '', 'upfile1514196613.txt');
INSERT INTO `tb_meeting_info` VALUES ('11', '代表大会', '1', '红船', '2017-12-26 11:42:56', '董卿', '于谦', '书记', '', 'upfile1514196625.txt');
INSERT INTO `tb_meeting_info` VALUES ('12', '代表大会', '1', '红船', '2017-12-26 11:42:56', '董卿', '于谦', '书记', '', 'upfile1514196772.txt');
INSERT INTO `tb_meeting_info` VALUES ('13', '代表大会', '1', '一大', '2017-12-26 11:42:56', '撒贝宁', '于谦', '书记', '', 'upfile1514196794.txt');
INSERT INTO `tb_meeting_info` VALUES ('14', '代表大会', '1', '一大', '2017-12-26 11:42:56', '撒贝宁', '于谦', '书记', '', 'upfile1514197224.txt');
INSERT INTO `tb_meeting_info` VALUES ('15', '代表大会', '1', '一大', '2017-12-26 11:42:56', '撒贝宁', '于谦', '书记', '', 'upfile1514197256.txt');

-- ----------------------------
-- Table structure for tb_meeting_user
-- ----------------------------
DROP TABLE IF EXISTS `tb_meeting_user`;
CREATE TABLE `tb_meeting_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_last_login_date` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `user_login_count` int(11) unsigned DEFAULT '0',
  `user_rights` int(11) DEFAULT NULL,
  `user_whether` int(1) DEFAULT NULL,
  `user_depart` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_meeting_user
-- ----------------------------
INSERT INTO `tb_meeting_user` VALUES ('1', '1670704741@qq.com', 'qwer1234', '2017-12-27 01:56:47', '18', '1', '0', null);
INSERT INTO `tb_meeting_user` VALUES ('2', '1670704740@qq.com', 'qwer1234', '2017-12-25 14:12:43', '1', '0', '0', null);
