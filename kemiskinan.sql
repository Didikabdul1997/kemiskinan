/*
 Navicat Premium Data Transfer

 Source Server         : MySQL
 Source Server Type    : MySQL
 Source Server Version : 50726
 Source Host           : localhost:3306
 Source Schema         : kemiskinan

 Target Server Type    : MySQL
 Target Server Version : 50726
 File Encoding         : 65001

 Date: 24/02/2020 17:15:11
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for data_anggota
-- ----------------------------
DROP TABLE IF EXISTS `data_anggota`;
CREATE TABLE `data_anggota`  (
  `id_anggota` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tempat_lahir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tanggal_lahir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kelas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_anggota`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of data_anggota
-- ----------------------------
INSERT INTO `data_anggota` VALUES (2, 'DIDIK22', '1', 'TUBAN', '30/12/1997', 'KUMPULREJO', '8', 'didikam.jpg');
INSERT INTO `data_anggota` VALUES (3, 'Abdul', '1', 'Tuban', '12/12/2012', 'Kumpulrejo', '9', '40739495.jpg');

-- ----------------------------
-- Table structure for data_buku
-- ----------------------------
DROP TABLE IF EXISTS `data_buku`;
CREATE TABLE `data_buku`  (
  `id_buku` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pengarang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tahun_terbit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tempat_terbit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_buku`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of data_buku
-- ----------------------------
INSERT INTO `data_buku` VALUES (1, 'Ilmu Pengetahuan Alam', 'siti zubaidah', '2014', 'jakarta', 'Ipa_Terpadu_kelas_VIII.jpg');
INSERT INTO `data_buku` VALUES (2, 'matematika', 'subchan', '2011', 'jakarta', 'Matematika_Progresif_SD_kls_6.jpg');
INSERT INTO `data_buku` VALUES (3, 'bahasa inggris', 'nur zaida', '2017', 'PT.Gelora Aksara Pratama', 'Modul_Bahasa_Inggris_Wustha(1)2005.jpg');
INSERT INTO `data_buku` VALUES (7, 'Bahasa indonesia', 'nurhadi', '2005', 'PT gelora aksara pratama', 'Aktif_Berbahasa_dan_Bersastra_Indonesia_2.jpg');

-- ----------------------------
-- Table structure for data_peminjaman
-- ----------------------------
DROP TABLE IF EXISTS `data_peminjaman`;
CREATE TABLE `data_peminjaman`  (
  `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT,
  `peminjam` int(11) NULL DEFAULT NULL,
  `buku` int(11) NULL DEFAULT NULL,
  `tanggal_pinjam` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tanggal_kembali` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_peminjaman`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of data_peminjaman
-- ----------------------------
INSERT INTO `data_peminjaman` VALUES (6, 34, 7, '30/10/2019', NULL, 2);
INSERT INTO `data_peminjaman` VALUES (7, 36, 7, '30/10/2019', '', 1);
INSERT INTO `data_peminjaman` VALUES (8, 34, 2, '30/10/2019', NULL, 2);
INSERT INTO `data_peminjaman` VALUES (9, 33, 2, '30/10/2019', '', 1);
INSERT INTO `data_peminjaman` VALUES (10, 34, 2, '30/10/2019', NULL, 1);
INSERT INTO `data_peminjaman` VALUES (11, NULL, 2, '17/02/2020', NULL, 1);
INSERT INTO `data_peminjaman` VALUES (12, 1, 1, '20/02/2020', NULL, 1);
INSERT INTO `data_peminjaman` VALUES (13, 1, 3, '20/02/2020', '', 1);

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
) ENGINE = MyISAM AUTO_INCREMENT = 19 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kemiskinan
-- ----------------------------
INSERT INTO `kemiskinan` VALUES (15, '2019', '1', '25140000');
INSERT INTO `kemiskinan` VALUES (14, '2018', '2', '25670000');
INSERT INTO `kemiskinan` VALUES (13, '2018', '1', '25950000');
INSERT INTO `kemiskinan` VALUES (12, '2017', '2', '26580000');
INSERT INTO `kemiskinan` VALUES (11, '2017', '1', '27770000');
INSERT INTO `kemiskinan` VALUES (10, '2016', '2', '27760000');
INSERT INTO `kemiskinan` VALUES (9, '2016', '1', '28010000');
INSERT INTO `kemiskinan` VALUES (8, '2015', '2', '28510000');
INSERT INTO `kemiskinan` VALUES (7, '2015', '1', '28590000');
INSERT INTO `kemiskinan` VALUES (2, '2012', '2', '28710000');
INSERT INTO `kemiskinan` VALUES (3, '2013', '1', '28170000');
INSERT INTO `kemiskinan` VALUES (4, '2013', '2', '28600000');
INSERT INTO `kemiskinan` VALUES (5, '2014', '1', '28280000');
INSERT INTO `kemiskinan` VALUES (6, '2014', '2', '27730000');
INSERT INTO `kemiskinan` VALUES (18, '2020', '2', '1234566');

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
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (9, 'Didik Abdul Mukmin', '2', 'Operator', 'Tuban', '21/21/2121', 'Nguluhan', 'didikam.jpg', 'admin', 'admin');
INSERT INTO `user` VALUES (10, 'Siti Jayanti', '2', 'Staff', 'Tuban', '21/21/2013', 'Kumpulrejo', 'icon-people.png', 'siti', 'admin');
INSERT INTO `user` VALUES (11, 'Siti Sulastri Ningsih', '2', 'Kepala', 'Tuban', '22/22/2223', 'Karang', 'images_(3)1.jpeg', 'gombloh', 'admin');

SET FOREIGN_KEY_CHECKS = 1;
