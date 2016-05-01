/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : peoplefinder

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2016-05-01 07:17:01
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
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of logs
-- ----------------------------
INSERT INTO `logs` VALUES ('1', '4', '7', null, 'Maybe Found by Shafiqul Islam XOR', '1', '2016-04-03 09:50:18', '2016-04-03 10:18:08');
INSERT INTO `logs` VALUES ('6', '4', '1', null, 'Found by Shawn  Parker', null, '2016-04-03 10:43:10', '2016-04-03 10:43:10');
INSERT INTO `logs` VALUES ('7', '2', '1', null, 'Maybe Found by Shafiqul Islam XOR', null, '2016-04-04 18:44:04', '2016-04-04 18:44:04');
INSERT INTO `logs` VALUES ('8', '4', null, null, 'Reported abuse by   Total times of abuse reported: <b>1</b> ', null, '2016-04-06 15:48:38', '2016-04-06 15:48:38');
INSERT INTO `logs` VALUES ('10', '4', null, null, 'Reported abuse by GuestTotal times of abuse reported: <b>3</b> ', null, '2016-04-06 16:16:03', '2016-04-06 16:16:03');
INSERT INTO `logs` VALUES ('11', '4', null, null, 'Reported abuse by Guest. Total times of abuse reported: <b>4</b> ', null, '2016-04-06 16:17:10', '2016-04-06 16:17:10');
INSERT INTO `logs` VALUES ('12', '4', null, null, 'Reported abuse by Guest. Total times of abuse reported: <b>5</b> ', null, '2016-04-06 16:18:35', '2016-04-06 16:18:35');
INSERT INTO `logs` VALUES ('13', '4', null, null, 'Reported abuse by Guest. Total times of abuse reported: <b>6</b> ', null, '2016-04-06 16:19:02', '2016-04-06 16:19:02');
INSERT INTO `logs` VALUES ('14', '4', null, null, 'Reported abuse by Guest. Total times of abuse reported: <b>7</b> ', null, '2016-04-06 16:20:40', '2016-04-06 16:20:40');
INSERT INTO `logs` VALUES ('15', '4', null, null, 'Reported abuse by Guest. Total times of abuse reported: <b>8</b> ', null, '2016-04-06 16:21:06', '2016-04-06 16:21:06');
INSERT INTO `logs` VALUES ('16', '4', null, null, 'Reported abuse by Guest. Total times of abuse reported: <b>9</b> ', null, '2016-04-06 16:21:06', '2016-04-06 16:21:06');
INSERT INTO `logs` VALUES ('17', '4', null, null, 'Reported abuse by Guest. Total times of abuse reported: <b>10</b> ', null, '2016-04-06 16:21:32', '2016-04-06 16:21:32');
INSERT INTO `logs` VALUES ('18', '4', null, null, 'Reported abuse by Guest. Total times of abuse reported: <b>11</b> ', null, '2016-04-06 16:21:33', '2016-04-06 16:21:33');
INSERT INTO `logs` VALUES ('19', '4', null, null, 'Reported abuse by Guest. Total times of abuse reported: <b>12</b> ', null, '2016-04-06 17:36:00', '2016-04-06 17:36:00');
INSERT INTO `logs` VALUES ('20', '7', '7', null, 'Maybe Found by Shafiqul Islam XOR', null, '2016-04-08 15:56:09', '2016-04-08 15:56:09');
INSERT INTO `logs` VALUES ('21', '7', '7', null, 'Maybe Found by Shafiqul Islam XOR', null, '2016-04-08 16:14:05', '2016-04-08 16:14:05');
INSERT INTO `logs` VALUES ('22', '2', '7', null, 'Maybe Found by Shafiqul Islam XOR', null, '2016-04-08 16:39:20', '2016-04-08 16:39:20');
INSERT INTO `logs` VALUES ('23', '2', '7', null, 'Reported abuse by Shafiqul Islam XOR. Total times of abuse reported: <b>1</b> ', null, '2016-04-08 17:03:11', '2016-04-08 17:03:11');
INSERT INTO `logs` VALUES ('24', '2', '7', null, 'Reported abuse by Shafiqul Islam XOR. Total times of abuse reported: <b>2</b> ', null, '2016-04-08 17:09:54', '2016-04-08 17:09:54');
INSERT INTO `logs` VALUES ('25', '1', '7', null, 'Maybe Found by Shafiqul Islam XOR', null, '2016-04-08 17:11:45', '2016-04-08 17:11:45');
INSERT INTO `logs` VALUES ('26', '1', '7', null, 'Reported abuse by Shafiqul Islam XOR. Total times of abuse reported: <b>1</b> ', null, '2016-04-08 18:55:17', '2016-04-08 18:55:17');
INSERT INTO `logs` VALUES ('27', '2', null, null, 'Reported abuse by Guest. Total times of abuse reported: <b>3</b> ', null, '2016-04-08 20:12:02', '2016-04-08 20:12:02');
INSERT INTO `logs` VALUES ('28', '2', null, null, 'Reported abuse by Guest. Total times of abuse reported: <b>7</b> ', null, '2016-04-08 22:33:57', '2016-04-08 22:33:57');
INSERT INTO `logs` VALUES ('29', '2', '7', null, 'Maybe Found by Shafiqul Islam XOR', null, '2016-04-08 22:46:32', '2016-04-08 22:46:32');
INSERT INTO `logs` VALUES ('30', '2', '7', null, 'Reported abuse by Shafiqul Islam XOR. Total times of abuse reported: <b>8</b> ', null, '2016-04-08 22:51:43', '2016-04-08 22:51:43');
INSERT INTO `logs` VALUES ('31', '2', '7', null, 'Maybe Found by Shafiqul Islam XOR', null, '2016-04-08 22:55:04', '2016-04-08 22:55:04');
INSERT INTO `logs` VALUES ('32', '7', '7', null, 'Maybe Found by Shafiqul Islam XOR', null, '2016-04-08 22:58:58', '2016-04-08 22:58:58');
INSERT INTO `logs` VALUES ('33', '5', '1', null, 'Reported abuse by Shawn  Parker. Total times of abuse reported: <b>1</b> ', null, '2016-04-16 16:09:17', '2016-04-16 16:09:17');
INSERT INTO `logs` VALUES ('34', '20', '9', null, 'Reported abuse by Shamim  Forhad. Total times of abuse reported: <b>1</b> ', null, '2016-04-29 20:15:16', '2016-04-29 20:15:16');
INSERT INTO `logs` VALUES ('35', '5', '9', null, 'Maybe Found by Shamim  Forhad', null, '2016-04-29 20:15:40', '2016-04-29 20:15:40');
INSERT INTO `logs` VALUES ('36', '12', '11', null, 'Maybe Found by forhad  Shamim', null, '2016-04-30 17:35:00', '2016-04-30 17:35:00');
INSERT INTO `logs` VALUES ('37', '12', '11', null, 'Reported abuse by forhad  Shamim. Total times of abuse reported: <b>1</b> ', null, '2016-04-30 17:36:15', '2016-04-30 17:36:15');
INSERT INTO `logs` VALUES ('38', '25', null, '1', 'Maybe Found by Admin', null, '2016-04-30 18:32:11', '2016-04-30 18:32:11');

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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of profiles
-- ----------------------------
INSERT INTO `profiles` VALUES ('1', 'Abul', 'MF', 'Kashem', '2000-01-01', 'B-', null, 'BD', 'Male', 'Missing', 'BD', 'Dhaka', 'Rokeya Sarani', 'BD', 'Khulna', '22.845641', '89.5403279', 'No', 'Alive', 'Yes', 'Yes', null, null, null, '1', 'Test description blah blah blah', '0', '7', '25', '1', '1', '0', null, '2016-03-30 08:20:31', '2016-04-28 13:40:53');
INSERT INTO `profiles` VALUES ('2', 'Abdul', '', 'Jabbar', '2016-03-03', 'A+', null, 'BD', 'Male', 'Maybe Found', 'BD', 'Khulna', 'M A Bari', 'BD', 'Khulna', '22.845641', '89.5403279', 'Yes', 'Alive', 'Yes', 'Yes', null, null, null, '0', '', '0', '7', '31', '8', '1', '0', null, '2016-03-30 08:38:47', '2016-04-28 13:18:48');
INSERT INTO `profiles` VALUES ('4', 'Umme', 'Ahmed', 'Shishir', '1989-12-29', 'B+', null, 'BD', 'Female', 'Found', 'US', 'Wisconsin', '5th Avenue', 'BD', 'Dhaka', '23.810332', '90.4125181', 'Yes', 'Alive', 'Yes', 'No', null, null, null, '1', 'b l a h b l a h b l a h . . .', null, null, null, '12', '1', '0', null, '2016-04-02 02:01:32', '2016-04-28 13:35:54');
INSERT INTO `profiles` VALUES ('5', 'test', '', 'test', '2016-04-13', 'O-', null, 'BD', 'Female', 'Maybe Found', 'BD', 'Khulna', 'M A Bari', 'BD', 'Khulna', '22.845641', '89.5403279', 'No', 'Alive', 'Yes', 'Yes', 'http://res.cloudinary.com/dg0qpsar6/image/upload/v1459555291/amnp8kto09pxjoiyeovz.jpg', 'http://res.cloudinary.com/dg0qpsar6/image/upload/v1459555284/xbxh4mhzo2p829gboiaj.jpg', 'http://res.cloudinary.com/dg0qpsar6/image/upload/v1459555277/gmcbzajesxdinezqgnqj.jpg', '0', 'jfg hgfghfj', '0', '9', '35', '1', '2', '0', null, '2016-04-02 06:52:19', '2016-04-29 20:15:40');
INSERT INTO `profiles` VALUES ('8', 'Toru', '', 'konna', '2016-04-12', 'O+', null, 'BD', 'Female', 'Found', 'BD', 'khulna', 'BIDC Road', 'BD', '', '23.684994', '90.356331', 'Yes', 'Alive', '', 'Yes', null, null, null, '0', '', null, null, null, '0', '7', '0', null, '2016-04-08 20:06:38', '2016-04-08 20:06:38');
INSERT INTO `profiles` VALUES ('9', 'shamim', '', 'Forhad', '2016-04-13', 'A-', null, 'BD', 'Male', 'Missing', 'BD', '', '', 'BD', '', '23.684994', '90.356331', 'No', 'Alive', 'Yes', 'Yes', 'http://res.cloudinary.com/dg0qpsar6/image/upload/v1460138958/l43g5ocwljtbq4pu4jqy.jpg', '', '', '0', '', null, null, null, '0', '7', '0', null, '2016-04-08 20:09:25', '2016-04-08 20:09:25');
INSERT INTO `profiles` VALUES ('10', 'Tanjur', 'Rahman', 'Bappy', null, 'B+', null, 'BD', 'Male', 'Found', 'BD', 'Khulna', 'BIDC Road', 'BD', 'Khulna', '22.845641', '89.5403279', 'Yes', 'Alive', 'Yes', 'Yes', null, null, null, '0', 'sample description', null, null, null, '0', '7', '0', null, '2016-04-09 08:27:02', '2016-04-23 19:00:36');
INSERT INTO `profiles` VALUES ('12', 'shamim', 'Hosssain', 'Forhad', '1990-03-01', '', null, 'EG', 'Male', 'Maybe Found', 'BD', 'Khulna', 'BIDC Road', 'BD', 'Dhaka', '23.810332', '90.4125181', '', '', '', '', null, null, null, '0', '', '0', '11', '36', '1', '1', '0', null, '2016-04-16 16:46:37', '2016-04-30 17:36:04');
INSERT INTO `profiles` VALUES ('15', 'Ibna', '', 'Sina', '2016-04-13', null, null, 'EG', 'Male', 'Found', 'EG', '', '', 'EG', '', '26.820553', '30.802498', '', '', '', '', null, null, 'http://res.cloudinary.com/dg0qpsar6/image/upload/v1461955137/wj31khto2frrf09aykgg.jpg', '0', '', null, null, null, '0', '1', '0', null, '2016-04-16 16:55:40', '2016-04-29 20:39:18');
INSERT INTO `profiles` VALUES ('17', 'Salim', '', 'Uddin', null, null, null, 'EG', 'Male', 'Found', 'EG', '', '', 'EG', '', '26.820553', '30.802498', null, null, null, null, null, null, null, '0', '', null, null, null, '0', '1', '0', null, '2016-04-16 17:14:38', '2016-04-16 17:14:38');
INSERT INTO `profiles` VALUES ('19', 'shamim', '', 'Forhad', null, null, null, 'EG', 'Male', 'Missing', 'EG', '', '', 'EG', '', '26.820553', '30.802498', null, null, null, null, null, null, null, '0', '', null, null, null, '0', '1', '0', null, '2016-04-25 23:38:52', '2016-04-25 23:38:52');
INSERT INTO `profiles` VALUES ('20', 'Test', '', 'final-one', null, null, null, 'EG', 'Female', 'Found', 'EG', '', '', 'EG', '', '26.820553', '30.802498', null, null, null, null, null, 'http://res.cloudinary.com/dg0qpsar6/image/upload/v1461947331/qys8brbc4owtkv0te4q1.jpg', 'http://res.cloudinary.com/dg0qpsar6/image/upload/v1461947334/ltlsb6jwzwxokfombatw.jpg', '0', '', null, null, null, '1', '1', '0', null, '2016-04-29 18:06:54', '2016-04-29 20:15:05');
INSERT INTO `profiles` VALUES ('21', 'test', '', 'one', '2016-04-13', 'A-', null, 'FO', 'Male', 'Found', 'SV', '', '', 'EC', 'Syllet', null, null, 'No', 'Alive', 'Yes', 'Yes', 'http://res.cloudinary.com/dg0qpsar6/image/upload/v1462029958/a10lm2avzlwwmy7f2r9i.jpg', 'http://res.cloudinary.com/dg0qpsar6/image/upload/v1462029742/ijawz2zn1yvksnmfgpq2.jpg', 'http://res.cloudinary.com/dg0qpsar6/image/upload/v1462029744/qj0pz6vqvimfcudpk6su.jpg', '0', 'demo description', null, null, null, '0', '11', '0', null, '2016-04-30 17:21:01', '2016-04-30 17:26:06');
INSERT INTO `profiles` VALUES ('23', 'admin', '', 'test', null, null, null, 'BD', null, 'Missing', 'BD', '', '', 'BD', '', '23.684994', '90.356331', null, null, null, null, null, null, null, '1', '', null, null, null, '0', null, '1', '1', '2016-04-30 18:22:32', '2016-04-30 18:22:32');
INSERT INTO `profiles` VALUES ('24', 'admin', '', 'test', '2016-04-13', 'B+', null, 'SV', null, 'Found', 'EE', 'gjhgjk', 'dgjndjk', 'FI', 'fdg', null, null, 'Yes', 'Alive', 'Yes', 'Yes', 'http://res.cloudinary.com/dg0qpsar6/image/upload/v1462033762/ngnbioatjepk5j7a1g3r.jpg', 'http://res.cloudinary.com/dg0qpsar6/image/upload/v1462033765/rvxmkuhy8tlffifluku7.jpg', 'http://res.cloudinary.com/dg0qpsar6/image/upload/v1462033767/yu5a7z5gb1rynpfiroeb.jpg', '1', 'fdgdjgk', null, null, null, '0', null, '1', '1', '2016-04-30 18:29:35', '2016-04-30 18:29:35');
INSERT INTO `profiles` VALUES ('25', 'admin', '', 'two', '2016-04-13', 'B-', null, 'EG', null, 'Maybe Found', 'EG', '', '', 'EG', '', '26.820553', '30.802498', null, null, null, null, null, null, null, '1', '', '1', '1', '38', '0', null, '1', '1', '2016-04-30 18:31:40', '2016-04-30 18:32:11');
INSERT INTO `profiles` VALUES ('26', 'subadmin', '', 'test', '2016-04-20', 'B-', null, 'SV', 'Male', 'Found', 'SV', 'jhjkh ', 'nn', 'EC', 'mbhj', '28.5862104', '77.3119085', 'Yes', 'Alive', 'Yes', 'No', 'http://res.cloudinary.com/dg0qpsar6/image/upload/v1462037571/nlwvmq30imigvqxesyrn.jpg', 'http://res.cloudinary.com/dg0qpsar6/image/upload/v1462037574/zw3jkrz7zedsvpbobfit.jpg', 'http://res.cloudinary.com/dg0qpsar6/image/upload/v1462037580/ipgqx0cfxmmrojudafv2.jpg', '1', 'jhgkgkfghf', null, null, null, '0', null, '1', '2', '2016-04-30 19:24:54', '2016-04-30 19:33:08');
INSERT INTO `profiles` VALUES ('27', 'subadmin', '', 'test', '2016-04-13', 'O+', null, 'EC', null, 'Found', 'DO', 'jjnkj', 'mnb,', 'GQ', 'Syllet', null, null, 'No', 'Alive', 'Yes', 'Yes', 'http://res.cloudinary.com/dg0qpsar6/image/upload/v1462037439/is9wn4b9ylt3eofzsmru.jpg', 'http://res.cloudinary.com/dg0qpsar6/image/upload/v1462037442/k9fuymq7u4ytlgghyar3.jpg', 'http://res.cloudinary.com/dg0qpsar6/image/upload/v1462037444/kwvuacrvjjw1znzj6qo2.jpg', '1', 'mnkjlkj kjjhlku bjhl', null, null, null, '0', null, '1', '2', '2016-04-30 19:30:52', '2016-04-30 19:30:52');

-- ----------------------------
-- Table structure for `removed_profiles`
-- ----------------------------
DROP TABLE IF EXISTS `removed_profiles`;
CREATE TABLE `removed_profiles` (
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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of removed_profiles
-- ----------------------------
INSERT INTO `removed_profiles` VALUES ('11', 'Tanjur', 'Rahman', 'Bappy', '2016-04-20', '', null, 'BD', 'Male', 'Found', 'BD', 'Khulna', 'Khulna', 'BD', '', '23.684994', '90.356331', 'Yes', 'Alive', 'Yes', 'Yes', null, null, null, '0', 'dsfsdjkfsd', null, null, null, '0', '7', '0', null, '2016-04-09 08:43:55', '2016-04-23 19:07:28');
INSERT INTO `removed_profiles` VALUES ('13', 'shamim', 'Hosssain', 'Forhad', '1990-03-01', '', null, 'EG', 'Male', 'Missing', 'BD', 'Khulna', 'BIDC Road', 'BD', 'Dhaka', '23.810332', '90.4125181', '', '', '', '', null, null, null, '0', '', null, null, null, '0', '1', '0', null, '2016-04-16 16:47:34', '2016-04-16 16:47:34');
INSERT INTO `removed_profiles` VALUES ('14', 'shamim', '', 'Forhad', '2016-04-13', '', null, 'EG', 'Male', 'Missing', 'EG', '', '', 'EG', '', '26.820553', '30.802498', '', '', '', '', null, null, null, '0', '', null, null, null, '0', '1', '0', null, '2016-04-16 16:48:57', '2016-04-16 16:48:57');
INSERT INTO `removed_profiles` VALUES ('16', 'Thomas ', '', 'Kin', '2016-04-20', null, null, 'EG', 'Male', 'Missing', 'EG', '', '', 'EG', '', '26.820553', '30.802498', null, null, null, null, null, null, null, '0', '', null, null, null, '0', '1', '0', null, '2016-04-16 17:08:01', '2016-04-16 17:08:01');
INSERT INTO `removed_profiles` VALUES ('21', 'tt', 'tt', 'tt', '2016-04-12', 'O-', null, 'EG', 'Male', 'Found', 'EG', 'ada', 'sadad', 'SV', 'asd', '13.9844196', '-89.5585513', 'No', 'Dead', 'No', 'No', 'http://res.cloudinary.com/dg0qpsar6/image/upload/v1461947104/mldcn5yjkkksbdqzphzh.jpg', 'http://res.cloudinary.com/dg0qpsar6/image/upload/v1461946860/qrnal0vdf6hgee6xkfi2.jpg', 'http://res.cloudinary.com/dg0qpsar6/image/upload/v1461946531/euv86bcxarvifl5m0emw.jpg', '0', 'asdsadasdsada sdas', null, null, null, '0', '1', '0', null, '2016-04-29 18:15:39', '2016-04-29 18:26:05');
INSERT INTO `removed_profiles` VALUES ('22', 'Test', '', 'Two', '2016-04-20', 'A+', null, 'ER', 'Female', 'Missing', 'SV', 'London', '12 Park Street', 'FJ', 'Brossels', null, null, 'Yes', 'Alive', 'Yes', 'Yes', 'http://res.cloudinary.com/dg0qpsar6/image/upload/v1462030104/qepx1rpdqm18biiginpj.jpg', 'http://res.cloudinary.com/dg0qpsar6/image/upload/v1462030107/llngmnsybpms7fwoyu9w.jpg', 'http://res.cloudinary.com/dg0qpsar6/image/upload/v1462030110/lcbx4zwr0cgf3tfxsr67.jpg', '0', 'demo text', null, null, null, '0', '11', '0', null, '2016-04-30 17:28:38', '2016-04-30 17:29:17');
INSERT INTO `removed_profiles` VALUES ('23', 'test', 'drd', 'dgd', '2016-04-20', 'O+', null, 'EG', 'Male', 'Found', 'EG', 'serr', 'fesrs', 'EG', 'ereter', null, null, 'Yes', 'Alive', 'Yes', 'Yes', 'http://res.cloudinary.com/dg0qpsar6/image/upload/v1461953132/osy7ocwiwpiebctefc4j.jpg', 'http://res.cloudinary.com/dg0qpsar6/image/upload/v1461953134/obiot7e1sbspskpkzhzw.jpg', 'http://res.cloudinary.com/dg0qpsar6/image/upload/v1461953137/wa2wfxc69toupncpxgt4.jpg', '0', 'esrer tre tre tre trertr t rtr t', null, null, null, '0', '9', '0', null, '2016-04-29 20:05:44', '2016-04-29 20:05:44');
INSERT INTO `removed_profiles` VALUES ('24', 'fdmnsd', 'fnndjk', 'dfmndn', '2016-04-14', 'A+', null, 'EG', 'Female', 'Found', 'EG', 'Kabul', 'BIDC Road', 'EC', 'Kabul', '-1.6768635', '-78.6312231', 'Yes', 'Alive', 'Yes', 'Yes', 'http://res.cloudinary.com/dg0qpsar6/image/upload/v1461966987/nn51sjgxdmxv7liltmqg.jpg', 'http://res.cloudinary.com/dg0qpsar6/image/upload/v1461953583/mckhvdmfdf0spimc3fik.jpg', 'http://res.cloudinary.com/dg0qpsar6/image/upload/v1461953511/tz6kgh5zuganhe5pkc9y.jpg', '0', 'fndbn nfdjkgfdn mnvfjkd jnjkfdn', null, null, null, '0', '9', '0', null, '2016-04-29 20:12:03', '2016-04-29 23:56:34');

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of reporters
-- ----------------------------
INSERT INTO `reporters` VALUES ('3', 'Shafiq', 'Islam', 'sdfasd', 'BD', 'Male', 'BD', null, null, null, 'islamshafiq03@gmail.com', 'e342df617ce15c040b95f90dc2f25273f630f6c5', '1', 'mjRguRvNCgr8kBHq', 'Normal', '0', '2016-03-16 07:34:52', '2016-03-19 04:31:41');
INSERT INTO `reporters` VALUES ('8', 'Shafiqul', '', 'Islam', 'BD', 'Male', 'BD', null, null, null, 'shafiq.xor@gmail.com', 'c8e392bc6a1fcd9795f76e4d171e468391eb39cf', '0', 'exmSNJoZjrQFGAUn', 'Normal', '0', '2016-04-10 20:38:37', '2016-04-10 20:38:37');
INSERT INTO `reporters` VALUES ('9', 'Shamim', '', 'Forhad', 'BD', 'Male', 'AU', null, null, null, 'shamimforhad.xor@gmail.com', 'c8e392bc6a1fcd9795f76e4d171e468391eb39cf', '1', 'wdwsVPKsT9Lwj64r', 'Rejected', '0', '2016-04-21 06:29:13', '2016-04-29 20:25:21');
INSERT INTO `reporters` VALUES ('11', 'forhad', '', 'Shamim', 'EG', 'Male', 'EG', null, null, null, 'shamimforhad.bl@gmail.com', 'c8e392bc6a1fcd9795f76e4d171e468391eb39cf', '1', 'QmFaq5lIhgPkk183', 'Normal', '0', '2016-04-30 16:58:38', '2016-04-30 17:03:12');

-- ----------------------------
-- Table structure for `testimonials`
-- ----------------------------
DROP TABLE IF EXISTS `testimonials`;
CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `testimonial` text,
  `reporter_id` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of testimonials
-- ----------------------------
INSERT INTO `testimonials` VALUES ('1', 'Great service!!!', '1', '1', '2016-04-04 01:24:55', '2016-04-04 01:24:58');
INSERT INTO `testimonials` VALUES ('2', 'sagdagds fsfsdfsdf dfsdfsdf sgdfsdsdfsdfshgshfhsdfsfgf dg dfdfd ffgd fddfgd gf dgfd ', '1', '1', '2016-04-04 22:26:14', '2016-04-04 22:26:14');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin@gmail.com', '79908cc35dde4688962dfde172179ff3dd958465', 'a', '', 'admin', '2016-03-14 19:58:44', '2016-03-14 20:14:43');
INSERT INTO `users` VALUES ('2', 'shamimforhad.xor@gmail.com', 'c8e392bc6a1fcd9795f76e4d171e468391eb39cf', '112233', null, 'subadmin', '2016-04-30 18:57:50', '2016-04-30 18:57:50');
