/*
Navicat MySQL Data Transfer

Source Server         : please
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : db_esport

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2024-04-27 21:52:25
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `divisi`
-- ----------------------------
DROP TABLE IF EXISTS `divisi`;
CREATE TABLE `divisi` (
  `divisi_id` int(11) NOT NULL AUTO_INCREMENT,
  `divisi_nama` varchar(100) NOT NULL,
  PRIMARY KEY (`divisi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of divisi
-- ----------------------------
INSERT INTO `divisi` VALUES ('1', 'CS2');
INSERT INTO `divisi` VALUES ('2', 'Valorant');
INSERT INTO `divisi` VALUES ('3', 'Rainbow Six');
INSERT INTO `divisi` VALUES ('4', 'Fifa');
INSERT INTO `divisi` VALUES ('5', 'League Of Legend');

-- ----------------------------
-- Table structure for `peran`
-- ----------------------------
DROP TABLE IF EXISTS `peran`;
CREATE TABLE `peran` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_nama` varchar(100) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of peran
-- ----------------------------
INSERT INTO `peran` VALUES ('1', 'In Game Leader');
INSERT INTO `peran` VALUES ('2', 'Awper');
INSERT INTO `peran` VALUES ('3', 'Lurker');
INSERT INTO `peran` VALUES ('4', 'Rifler');
INSERT INTO `peran` VALUES ('5', 'Anchor');
INSERT INTO `peran` VALUES ('6', 'Gold lane');
INSERT INTO `peran` VALUES ('7', 'Mid lane');
INSERT INTO `peran` VALUES ('8', 'Top lane');
INSERT INTO `peran` VALUES ('9', '');

-- ----------------------------
-- Table structure for `player`
-- ----------------------------
DROP TABLE IF EXISTS `player`;
CREATE TABLE `player` (
  `player_id` int(11) NOT NULL AUTO_INCREMENT,
  `player_foto` varchar(255) NOT NULL,
  `player_nama` varchar(100) NOT NULL,
  `player_umur` int(3) NOT NULL,
  `divisi_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`player_id`),
  KEY `divisi_id` (`divisi_id`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `divisi_id` FOREIGN KEY (`divisi_id`) REFERENCES `divisi` (`divisi_id`),
  CONSTRAINT `role_id` FOREIGN KEY (`role_id`) REFERENCES `peran` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of player
-- ----------------------------
INSERT INTO `player` VALUES ('2', 'Dev1ce.jpg', 'Dev1ce', '28', '1', '1');
INSERT INTO `player` VALUES ('3', 'Dev1ce.jpg', 'Humay', '20', '1', '1');
