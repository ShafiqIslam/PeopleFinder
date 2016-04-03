/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : peoplefinder

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2016-04-03 15:09:41
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `logs`
-- ----------------------------
DROP TABLE IF EXISTS `logs`;
CREATE TABLE `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `profile_id` int(11) DEFAULT NULL,
  `reporter_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `abuse` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of logs
-- ----------------------------
INSERT INTO `logs` VALUES ('1', '4', '7', null, 'Maybe Found by Shafiqul Islam XOR', '1', '2016-04-03 09:50:18', '2016-04-03 10:18:08');
INSERT INTO `logs` VALUES ('6', '4', '1', null, 'Found by Shawn  Parker', null, '2016-04-03 10:43:10', '2016-04-03 10:43:10');

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
  `lat` varchar(255) DEFAULT NULL,
  `lng` varchar(255) DEFAULT NULL,
  `mental_illness` varchar(5) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `kidnapped` varchar(5) DEFAULT NULL,
  `physical_illness` varchar(5) DEFAULT NULL,
  `image_link_1` varchar(255) DEFAULT NULL,
  `image_link_2` varchar(255) DEFAULT NULL,
  `image_link_3` varchar(255) DEFAULT NULL,
  `verified_profile` tinyint(1) DEFAULT NULL,
  `description` longtext,
  `maybe_found_by_admin` tinyint(1) DEFAULT NULL,
  `maybe_found_by` int(11) DEFAULT NULL,
  `maybe_found_log` int(11) DEFAULT NULL,
  `abuse_counter` int(3) DEFAULT '0',
  `reporter_id` int(11) DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of profiles
-- ----------------------------
INSERT INTO `profiles` VALUES ('1', 'Abul', 'test', 'Kashem', '2000-01-01', 'B-', null, 'BD', 'Male', 'Found', 'BD', 'Dhaka', 'Rokeya Sarani', 'BD', 'Khulna', '22.845641', '89.5403279', 'No', 'Alive', 'Yes', 'Yes', 'http://res.cloudinary.com/dg0qpsar6/image/upload/v1459533121/pwbpvq9bi0xxdndqvi5y.jpg', 'http://res.cloudinary.com/dg0qpsar6/image/upload/v1459532790/rn3xyd1orsdqhsc8dsf4.jpg', 'http://res.cloudinary.com/dg0qpsar6/image/upload/v1459319036/vxim9benjffbovxfuu6c.jpg', '1', 'Test description blah blah blah', null, null, null, '0', '1', '0', null, '2016-03-30 08:20:31', '2016-04-01 19:48:33');
INSERT INTO `profiles` VALUES ('2', 'Abdul', '', 'Jabbar', '2016-03-03', 'A+', null, 'BD', 'Male', 'Missing', 'BD', 'Khulna', 'M A Bari', 'BD', 'Khulna', '22.845641', '89.5403279', 'Yes', 'Alive', 'Yes', 'Yes', 'http://res.cloudinary.com/dg0qpsar6/image/upload/v1459319036/vxim9benjffbovxfuu6c.jpg', 'http://res.cloudinary.com/dg0qpsar6/image/upload/v1459320127/qv7gtrm1zkpoffscrfqu.jpg', 'http://res.cloudinary.com/dg0qpsar6/image/upload/v1459320132/xdzufs6mgmynpvf4ktzd.jpg', '0', '', null, null, null, '0', '1', '0', null, '2016-03-30 08:38:47', '2016-03-30 08:38:47');
INSERT INTO `profiles` VALUES ('4', 'Umme', 'Ahmed', 'Shishir', '1989-12-29', 'B+', null, 'BD', 'Female', 'Found', 'US', 'Wisconsin', '5th Avenue', 'BD', 'Dhaka', '23.810332', '90.4125181', 'Yes', 'Alive', 'Yes', 'No', 'http://res.cloudinary.com/dg0qpsar6/image/upload/v1459555277/gmcbzajesxdinezqgnqj.jpg', 'http://res.cloudinary.com/dg0qpsar6/image/upload/v1459555284/xbxh4mhzo2p829gboiaj.jpg', 'http://res.cloudinary.com/dg0qpsar6/image/upload/v1459555291/amnp8kto09pxjoiyeovz.jpg', '0', 'b l a h b l a h b l a h . . .', null, null, null, '0', '1', '0', null, '2016-04-02 02:01:32', '2016-04-03 10:43:10');
INSERT INTO `profiles` VALUES ('5', 'test', '', 'test', '2016-04-13', 'O-', null, 'BD', 'Female', 'Missing', 'BD', 'Khulna', 'M A Bari', 'BD', 'Khulna', '22.845641', '89.5403279', 'No', 'Alive', 'Yes', 'Yes', 'http://res.cloudinary.com/dg0qpsar6/image/upload/v1459555291/amnp8kto09pxjoiyeovz.jpg', 'http://res.cloudinary.com/dg0qpsar6/image/upload/v1459555284/xbxh4mhzo2p829gboiaj.jpg', 'http://res.cloudinary.com/dg0qpsar6/image/upload/v1459555277/gmcbzajesxdinezqgnqj.jpg', '0', 'jfg hgfghfj', null, null, null, '0', '2', '0', null, '2016-04-02 06:52:19', '2016-04-02 06:52:19');
INSERT INTO `profiles` VALUES ('6', 'girl ', '', 'girl', '2016-04-12', 'B+', null, 'BD', 'Male', 'Missing', 'BD', 'test', 'test', 'BD', 'Khulna', '22.845641', '89.5403279', 'No', 'Dead', 'Yes', 'Yes', null, null, null, '1', 'dsfas dfsd fsd fdas f ds', null, null, null, '0', '1', '0', null, '2016-04-02 06:57:35', '2016-04-02 18:08:33');
INSERT INTO `profiles` VALUES ('7', 'Admin', 'Middle', 'Test', '2016-04-12', 'O+', null, 'BD', 'Male', 'Missing', 'BD', 'Khulna', 'M A Bari', 'BD', 'Khulna', '22.845641', '89.5403279', 'No', 'Dead', 'No', 'Yes', null, null, null, '1', 'hgfhgf ff ghffjghfgff ghf ghfgfghfgfjhg fgf jfjgfgf j', null, null, null, '0', null, '1', '1', '2016-04-02 17:59:01', '2016-04-02 18:01:10');

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
  `id_image_link_1` varchar(255) DEFAULT NULL,
  `id_image_link_2` varchar(255) DEFAULT NULL,
  `id_image_link_3` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email_verified` tinyint(1) DEFAULT NULL,
  `email_verification_token` varchar(255) DEFAULT NULL,
  `account_type` varchar(25) DEFAULT NULL,
  `is_blacklisted` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of reporters
-- ----------------------------
INSERT INTO `reporters` VALUES ('1', 'Shawn', null, 'Parker', 'BD', 'Male', 'BD', null, null, null, 'shawnparker09@gmail.com', 'c8e392bc6a1fcd9795f76e4d171e468391eb39cf', '1', 'mjRguRvNCgr8kBHq', 'Normal', '0', '2016-03-15 12:54:21', '2016-04-01 20:22:39');
INSERT INTO `reporters` VALUES ('3', 'Shafiq', 'Islam', 'sdfasd', 'BD', 'Male', 'BD', null, null, null, 'islamshafiq03@gmail.com', 'e342df617ce15c040b95f90dc2f25273f630f6c5', '1', 'mjRguRvNCgr8kBHq', 'Normal', '0', '2016-03-16 07:34:52', '2016-03-19 04:31:41');
INSERT INTO `reporters` VALUES ('7', 'Shafiqul', 'Islam', 'XOR', 'BD', 'Male', 'BD', 'http://res.cloudinary.com/dg0qpsar6/image/upload/v1459620669/k89utyrkijwaki7v8znj.jpg', '', '', 'shafiq.xor@gmail.com', 'c8e392bc6a1fcd9795f76e4d171e468391eb39cf', '1', '2s4nuOz6nBvLLt4m', 'Normal', '0', '2016-04-02 20:11:08', '2016-04-02 20:12:49');

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
INSERT INTO `users` VALUES ('1', 'shawnparker09@gmail.com', '79908cc35dde4688962dfde172179ff3dd958465', 'a', '', 'admin', '2016-03-14 19:58:44', '2016-03-14 20:14:43');
