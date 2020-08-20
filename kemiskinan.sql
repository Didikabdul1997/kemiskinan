/*
 Navicat Premium Data Transfer

 Source Server         : Localhost
 Source Server Type    : MySQL
 Source Server Version : 100144
 Source Host           : localhost:3306
 Source Schema         : kemiskinan

 Target Server Type    : MySQL
 Target Server Version : 100144
 File Encoding         : 65001

 Date: 20/08/2020 16:15:24
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for forecast
-- ----------------------------
DROP TABLE IF EXISTS `forecast`;
CREATE TABLE `forecast`  (
  `id_kemiskinan` int(11) NOT NULL,
  `tahun` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `semester` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jumlah` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `forecast` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `e` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `e2` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ape` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_kemiskinan`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of forecast
-- ----------------------------
INSERT INTO `forecast` VALUES (1, '2012', '1', '29250000', NULL, NULL, NULL, NULL);
INSERT INTO `forecast` VALUES (2, '2012', '2', '28710000', NULL, NULL, NULL, NULL);
INSERT INTO `forecast` VALUES (3, '2013', '1', '28170000', NULL, NULL, NULL, NULL);
INSERT INTO `forecast` VALUES (4, '2013', '2', '28600000', NULL, NULL, NULL, NULL);
INSERT INTO `forecast` VALUES (5, '2014', '1', '28280000', '28682500', '-402500', '162006250000', '1.42');
INSERT INTO `forecast` VALUES (6, '2014', '2', '27730000', '28440000', '-710000', '504100000000', '2.56');
INSERT INTO `forecast` VALUES (7, '2015', '1', '28590000', '28195000', '395000', '156025000000', '1.38');
INSERT INTO `forecast` VALUES (8, '2015', '2', '28510000', '28300000', '210000', '44100000000', '0.74');
INSERT INTO `forecast` VALUES (9, '2016', '1', '28010000', '28277500', '-267500', '71556250000', '0.96');
INSERT INTO `forecast` VALUES (10, '2016', '2', '27760000', '28210000', '-450000', '202500000000', '1.62');
INSERT INTO `forecast` VALUES (11, '2017', '1', '27770000', '28217500', '-447500', '200256250000', '1.61');
INSERT INTO `forecast` VALUES (12, '2017', '2', '26580000', '28012500', '-1432500', '2052056250000', '5.39');
INSERT INTO `forecast` VALUES (13, '2018', '1', '25950000', '27530000', '-1580000', '2496400000000', '6.09');
INSERT INTO `forecast` VALUES (14, '2018', '2', '25670000', '27015000', '-1345000', '1809025000000', '5.24');
INSERT INTO `forecast` VALUES (15, '2019', '1', '25140000', '26492500', '-1352500', '1829256250000', '5.38');
INSERT INTO `forecast` VALUES (16, '2019', '2', '26492500', '25835000', '657500', '432306250000', '2.48');
INSERT INTO `forecast` VALUES (17, '2020', '1', '25835000', '25813125', '21875', '478515625', '0.08');
INSERT INTO `forecast` VALUES (18, '2020', '2', '25813125', '25784375', '28750', '826562500', '0.11');
INSERT INTO `forecast` VALUES (19, '2021', '1', '25784375', '25820156', '-35781', '1280279961', '0.14');
INSERT INTO `forecast` VALUES (20, '2021', '2', '25820156', '25981250', '-161094', '25951276836', '0.62');
INSERT INTO `forecast` VALUES (21, '2022', '1', '25981250', '25813164', '168086', '28252903396', '0.65');
INSERT INTO `forecast` VALUES (22, '2022', '2', '25813164', '25849727', '-36563', '1336852969', '0.14');
INSERT INTO `forecast` VALUES (23, '2023', '1', '25849727', '25849736', '-9', '81', '0.00');
INSERT INTO `forecast` VALUES (24, '2023', '2', '25849736', '25866074', '-16338', '266930244', '0.06');
INSERT INTO `forecast` VALUES (25, '2024', '1', '25866074', '25873469', '-7395', '54686025', '0.03');
INSERT INTO `forecast` VALUES (26, '2024', '2', '25873469', '25844675', '28794', '829094436', '0.11');
INSERT INTO `forecast` VALUES (27, '2025', '1', '25844675', '25859752', '-15077', '227315929', '0.06');
INSERT INTO `forecast` VALUES (28, '2025', '2', '25859752', '25858489', '1264', '1597696', '0.00');
INSERT INTO `forecast` VALUES (29, '2026', '1', '25858489', '25860993', '-2504', '6270016', '0.01');
INSERT INTO `forecast` VALUES (30, '2026', '2', '25860993', '25859096', '1897', '3598609', '0.01');

-- ----------------------------
-- Table structure for hasil_forecast
-- ----------------------------
DROP TABLE IF EXISTS `hasil_forecast`;
CREATE TABLE `hasil_forecast`  (
  `periode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tahunakhir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `sse` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `mse` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `rmse` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `mape` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of hasil_forecast
-- ----------------------------
INSERT INTO `hasil_forecast` VALUES ('4', '2026', '10019103384323', '385350130166.27', '620765.76', '1.42');

-- ----------------------------
-- Table structure for kemiskinan
-- ----------------------------
DROP TABLE IF EXISTS `kemiskinan`;
CREATE TABLE `kemiskinan`  (
  `id_kemiskinan` int(11) NOT NULL AUTO_INCREMENT,
  `tahun` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `semester` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jumlah` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_kemiskinan`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 21 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kemiskinan
-- ----------------------------
INSERT INTO `kemiskinan` VALUES (14, '2018', '2', '25670000');
INSERT INTO `kemiskinan` VALUES (13, '2018', '1', '25950000');
INSERT INTO `kemiskinan` VALUES (12, '2017', '2', '26580000');
INSERT INTO `kemiskinan` VALUES (11, '2017', '1', '27770000');
INSERT INTO `kemiskinan` VALUES (10, '2016', '2', '27760000');
INSERT INTO `kemiskinan` VALUES (9, '2016', '1', '28010000');
INSERT INTO `kemiskinan` VALUES (8, '2015', '2', '28510000');
INSERT INTO `kemiskinan` VALUES (7, '2015', '1', '28590000');
INSERT INTO `kemiskinan` VALUES (6, '2014', '2', '27730000');
INSERT INTO `kemiskinan` VALUES (5, '2014', '1', '28280000');
INSERT INTO `kemiskinan` VALUES (4, '2013', '2', '28600000');
INSERT INTO `kemiskinan` VALUES (3, '2013', '1', '28170000');
INSERT INTO `kemiskinan` VALUES (2, '2012', '2', '28710000');
INSERT INTO `kemiskinan` VALUES (1, '2012', '1', '29250000');
INSERT INTO `kemiskinan` VALUES (15, '2019', '1', '25140000');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jabatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tempat_lahir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tanggal_lahir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (9, 'Didik Abdul Mukmin', '1', '1', 'Tuban', '21/21/2121', 'Kumpulrejo', 'didikam1.jpg', 'admin', 'admin');
INSERT INTO `user` VALUES (10, 'Siti Jayanti', '2', '2', 'Tuban', '21/21/2013', 'Kumpulrejo', '7bea48410b1cad6b99941d319d4d2401.jpeg', 'jayanti', 'admin');
INSERT INTO `user` VALUES (11, 'Siti Sulastri Ningsih', '2', '3', 'Tuban', '22/22/2223', 'Karang', '060a161f835e99c05be86a90481473ab.png', 'sulas', 'admin');

SET FOREIGN_KEY_CHECKS = 1;
