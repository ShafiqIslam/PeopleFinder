/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50516
Source Host           : localhost:3306
Source Database       : people_finder

Target Server Type    : MYSQL
Target Server Version : 50516
File Encoding         : 65001

Date: 2016-03-15 22:35:52
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
  `email_verified` tinyint(1) DEFAULT NULL,
  `email_verification_token` varchar(255) DEFAULT NULL,
  `account_type` varchar(25) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of reporters
-- ----------------------------
INSERT INTO `reporters` VALUES ('1', 'asdf', 'asdf', 'asdf', 'BD', 'Male', 'BD', null, 'shafiq.xor@gmail.com', 'e342df617ce15c040b95f90dc2f25273f630f6c5', '0', 'vkeIpthXGO7Oxq01', 'Normal', '2016-03-15 12:54:21', '2016-03-15 12:54:21');
INSERT INTO `reporters` VALUES ('2', 'test', 'test', 'test', 'BD', 'Male', 'BD', null, 'shafiq.xor@gmail.com', '30beba2a442a48986adf3d09ad5a360a7f53ca80', '0', 'cDPrWgnvC4AARP5U', 'Normal', '2016-03-15 12:55:47', '2016-03-15 12:55:47');
INSERT INTO `reporters` VALUES ('3', 'asdf', 'asdf', 'asdf', 'BD', 'Male', 'BD', null, 'shafiq.xor@gmail.com', 'e342df617ce15c040b95f90dc2f25273f630f6c5', '0', 'gaKx4PJpMZZuLF3x', 'Normal', '2016-03-15 14:02:32', '2016-03-15 14:02:32');
INSERT INTO `reporters` VALUES ('4', 'asdf', 'asdf', 'asdf', 'BD', 'Male', 'BD', null, 'shafiq.xor@gmail.com', 'e342df617ce15c040b95f90dc2f25273f630f6c5', '0', 'o8mI9KyiSnXgMJ7X', 'Normal', '2016-03-15 14:03:56', '2016-03-15 14:03:56');
INSERT INTO `reporters` VALUES ('5', 'asdf', 'asdf', 'asdf', 'BD', 'Select Gen', 'BD', null, 'shafiq.xor@gmail.com', 'e342df617ce15c040b95f90dc2f25273f630f6c5', '0', 'JBlVeShcBJuNhJyX', 'Normal', '2016-03-15 14:06:15', '2016-03-15 14:06:15');
INSERT INTO `reporters` VALUES ('6', 'asdf', 'asdf', 'asdf', 'BD', 'Select Gen', 'BD', null, 'shafiq.xor@gmail.com', 'e342df617ce15c040b95f90dc2f25273f630f6c5', '0', '2HfxfukTdV5it7gK', 'Normal', '2016-03-15 14:10:30', '2016-03-15 14:10:30');
INSERT INTO `reporters` VALUES ('7', 'asdf', 'asdf', 'asdf', 'BD', 'Select Gen', 'BD', null, 'shafiq.xor@gmail.com', 'e342df617ce15c040b95f90dc2f25273f630f6c5', '0', 'PABQzUOqQ31LTaNj', 'Normal', '2016-03-15 14:12:55', '2016-03-15 14:12:55');
INSERT INTO `reporters` VALUES ('8', 'asdf', 'asdf', 'asdf', 'BD', 'Select Gen', 'BD', null, 'shafiq.xor@gmail.com', 'e342df617ce15c040b95f90dc2f25273f630f6c5', '0', 'gVTJl7UJuL1lIvmu', 'Normal', '2016-03-15 14:12:59', '2016-03-15 14:12:59');
INSERT INTO `reporters` VALUES ('9', 'asdf', 'asdf', 'asdf', 'BD', 'Select Gen', 'BD', null, 'shafiq.xor@gmail.com', 'e342df617ce15c040b95f90dc2f25273f630f6c5', '0', 'TZlrnnjn2rMSodqs', 'Normal', '2016-03-15 14:13:14', '2016-03-15 14:13:14');
INSERT INTO `reporters` VALUES ('10', 'asdf', 'asdf', 'asdf', 'BD', 'Select Gen', 'BD', null, 'shafiq.xor@gmail.com', 'e342df617ce15c040b95f90dc2f25273f630f6c5', '0', 'S1OMMFNqlbZqCwDr', 'Normal', '2016-03-15 14:14:57', '2016-03-15 14:14:57');
INSERT INTO `reporters` VALUES ('11', 'asdf', 'asdf', 'asdf', 'BD', 'Select Gen', 'BD', null, 'shafiq.xor@gmail.com', 'e342df617ce15c040b95f90dc2f25273f630f6c5', '0', 'epmeQtZvCexK3xJD', 'Normal', '2016-03-15 14:19:26', '2016-03-15 14:19:26');
INSERT INTO `reporters` VALUES ('12', 'asdf', 'asdf', 'asdf', 'BD', 'Select Gen', 'BD', null, 'shafiq.xor@gmail.com', 'e342df617ce15c040b95f90dc2f25273f630f6c5', '0', 'ZslX6BGvTe8MhOQS', 'Normal', '2016-03-15 14:23:01', '2016-03-15 14:23:01');
INSERT INTO `reporters` VALUES ('13', 'asdf', 'asdf', 'asdf', 'BD', 'Select Gen', 'BD', null, 'shafiq.xor@gmail.com', 'e342df617ce15c040b95f90dc2f25273f630f6c5', '0', 'SM0tNJT7EvjUFNNy', 'Normal', '2016-03-15 14:31:20', '2016-03-15 14:31:20');
INSERT INTO `reporters` VALUES ('14', 'asdf', 'asdf', 'asdf', 'BD', 'Select Gen', 'BD', null, 'shafiq.xor@gmail.com', 'e342df617ce15c040b95f90dc2f25273f630f6c5', '0', 'RY9MnzViWoNYRSMI', 'Normal', '2016-03-15 14:43:07', '2016-03-15 14:43:07');
INSERT INTO `reporters` VALUES ('15', 'asdf', 'asdf', 'asdf', 'BD', 'Select Gen', 'BD', null, 'shafiq.xor@gmail.com', 'e342df617ce15c040b95f90dc2f25273f630f6c5', '0', 'ytJ5GCvI0XXZ5GRR', 'Normal', '2016-03-15 14:49:18', '2016-03-15 14:49:18');

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
