/*
Navicat MySQL Data Transfer

Source Server         : MySQL XAMPP
Source Server Version : 50616
Source Host           : 127.0.1.1:3306
Source Database       : fujitsu

Target Server Type    : MYSQL
Target Server Version : 50616
File Encoding         : 65001

Date: 2017-06-25 22:52:22
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for t_pelajaran
-- ----------------------------
DROP TABLE IF EXISTS `t_pelajaran`;
CREATE TABLE `t_pelajaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mapel` varchar(255) DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `dialog_1` longtext,
  `dialog_2` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_pelajaran
-- ----------------------------
INSERT INTO `t_pelajaran` VALUES ('1', 'Pelajaran 1', 'Hajimemashite', 'lesson1.png', 'bla bla', 'bla bala');
INSERT INTO `t_pelajaran` VALUES ('12', 'Pelajaran 2', 'Judul 2', '411407.jpg', 'aku ', 'badak');

-- ----------------------------
-- Table structure for t_pengguna
-- ----------------------------
DROP TABLE IF EXISTS `t_pengguna`;
CREATE TABLE `t_pengguna` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(78) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `level` enum('admin','murid') NOT NULL DEFAULT 'murid',
  `name_first` varchar(255) NOT NULL,
  `name_last` varchar(255) DEFAULT NULL,
  `class` enum('11 RPL 2','11 RPL 1','11 AK 3','11 AK 2','11 AK 1') DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_pengguna
-- ----------------------------
INSERT INTO `t_pengguna` VALUES ('1', 'ikuy.rz@gmail.com', '*4ACFE3202A5FF5CF467898FC58AAB1D615029441', '1', 'admin', 'Yuki', 'Zain Rohman', '');
INSERT INTO `t_pengguna` VALUES ('2', 'dudi.haryadi@gmail.com', '*4ACFE3202A5FF5CF467898FC58AAB1D615029441', '1', 'admin', 'Dudi', 'Haryadi', '');
INSERT INTO `t_pengguna` VALUES ('3', 'alya@rohman.com', '*4ACFE3202A5FF5CF467898FC58AAB1D615029441', '1', 'murid', 'Alya', 'Rohman', '11 AK 1');
