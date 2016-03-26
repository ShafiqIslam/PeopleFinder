/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50516
Source Host           : localhost:3306
Source Database       : people_finder

Target Server Type    : MYSQL
Target Server Version : 50516
File Encoding         : 65001

Date: 2016-03-26 14:49:02
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `logs`
-- ----------------------------
DROP TABLE IF EXISTS `logs`;
CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `profile_id` int(11) DEFAULT NULL,
  `reporter_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `message` varchar(500) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of logs
-- ----------------------------

-- ----------------------------
-- Table structure for `profiles`
-- ----------------------------
DROP TABLE IF EXISTS `profiles`;
CREATE TABLE `profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `second_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `blood_type` varchar(5) DEFAULT NULL,
  `day_of_birth` varchar(15) DEFAULT NULL,
  `nationality` varchar(100) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `person_status` varchar(15) DEFAULT NULL,
  `resident_country` varchar(100) DEFAULT NULL,
  `resident_city` varchar(100) DEFAULT NULL,
  `resident_street` varchar(100) DEFAULT NULL,
  `missing_country` varchar(100) DEFAULT NULL,
  `missing_city` varchar(100) DEFAULT NULL,
  `personal_photos` int(11) DEFAULT NULL,
  `mental_illness` varchar(5) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `kidnapped` varchar(5) DEFAULT NULL,
  `physical_illness` varchar(5) DEFAULT NULL,
  `document_id` int(11) DEFAULT NULL,
  `verified_profile` tinyint(1) DEFAULT NULL,
  `description` longtext,
  `reporter_id` int(11) DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of profiles
-- ----------------------------

-- ----------------------------
-- Table structure for `reporters`
-- ----------------------------
DROP TABLE IF EXISTS `reporters`;
CREATE TABLE `reporters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `second_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `resident_country` varchar(255) DEFAULT NULL,
  `document_id` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email_verified` tinyint(1) DEFAULT NULL,
  `email_verification_token` varchar(255) DEFAULT NULL,
  `account_type` varchar(25) DEFAULT NULL,
  `is_blacklisted` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of reporters
-- ----------------------------
INSERT INTO `reporters` VALUES ('1', 'Shafiq', null, 'Islam', 'BD', 'Male', 'BD', null, 'shafiq.xor@gmail.com', 'e342df617ce15c040b95f90dc2f25273f630f6c5', '1', 'mjRguRvNCgr8kBHq', 'Normal', '0', '2016-03-15 12:54:21', '2016-03-16 07:34:52');
INSERT INTO `reporters` VALUES ('3', 'Shafiq', 'Islam', 'sdfasd', 'BD', 'Male', 'BD', null, 'islamshafiq03@gmail.com', 'e342df617ce15c040b95f90dc2f25273f630f6c5', '1', 'mjRguRvNCgr8kBHq', 'Normal', '0', '2016-03-16 07:34:52', '2016-03-19 04:31:41');

-- ----------------------------
-- Table structure for `testimonials`
-- ----------------------------
DROP TABLE IF EXISTS `testimonials`;
CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `testimonial` text,
  `reporter_id` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of testimonials
-- ----------------------------

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `simple_pwd` varchar(255) DEFAULT NULL,
  `email_verification_token` varchar(255) DEFAULT NULL,
  `role` varchar(10) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin@gmail.com', '79908cc35dde4688962dfde172179ff3dd958465', 'a', '', 'admin', '2016-03-14 19:58:44', '2016-03-14 20:14:43');
