/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : peoplefinder

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2016-03-15 01:29:09
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
  `resident_country ` varchar(100) DEFAULT NULL,
  `resident_city ` varchar(100) DEFAULT NULL,
  `resident_street` varchar(100) DEFAULT NULL,
  `missing_country ` varchar(100) DEFAULT NULL,
  `missing_city` varchar(100) DEFAULT NULL,
  `personal_photos` int(11) DEFAULT NULL,
  `mental_illness` varchar(5) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `kidnapped ` varchar(5) DEFAULT NULL,
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
  `email_verification_token` varchar(255) DEFAULT NULL,
  `account_type` varchar(25) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of reporters
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
