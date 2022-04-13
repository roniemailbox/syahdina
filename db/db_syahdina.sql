/*
 Navicat Premium Data Transfer

 Source Server         : ServerIni
 Source Server Type    : MySQL
 Source Server Version : 50626
 Source Host           : localhost:3306
 Source Schema         : db_syahdina

 Target Server Type    : MySQL
 Target Server Version : 50626
 File Encoding         : 65001

 Date: 13/04/2022 14:23:58
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for blok
-- ----------------------------
DROP TABLE IF EXISTS `blok`;
CREATE TABLE `blok`  (
  `kode_blok` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `kode_cluster` varchar(13) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `keterangan` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`kode_blok`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of blok
-- ----------------------------

-- ----------------------------
-- Table structure for cluster
-- ----------------------------
DROP TABLE IF EXISTS `cluster`;
CREATE TABLE `cluster`  (
  `kode_cluster` varchar(13) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'CL01000100001 (CL,id_perusahaan,id_perumahan,no_urut)',
  `nama` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `id_perumahan` char(8) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `gambar` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `mime` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `keterangan` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `user_entry` char(8) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tgl_entry` datetime NULL DEFAULT NULL,
  `user_edit` char(8) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tgl_edit` datetime NULL DEFAULT NULL,
  `no_urut` double NULL DEFAULT NULL,
  PRIMARY KEY (`kode_cluster`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of cluster
-- ----------------------------

-- ----------------------------
-- Table structure for h_menu
-- ----------------------------
DROP TABLE IF EXISTS `h_menu`;
CREATE TABLE `h_menu`  (
  `id_pegawai` char(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `c` tinyint(1) NOT NULL DEFAULT 0,
  `r` tinyint(1) NOT NULL DEFAULT 0,
  `u` tinyint(1) NOT NULL DEFAULT 0,
  `d` tinyint(1) NOT NULL DEFAULT 0,
  `p` tinyint(1) NOT NULL DEFAULT 0,
  `kode_menu` int(9) NOT NULL,
  `user_entry` char(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl_entry` datetime NULL DEFAULT NULL,
  `user_edit` char(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl_edit` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_pegawai`, `kode_menu`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of h_menu
-- ----------------------------
INSERT INTO `h_menu` VALUES ('PG000001', 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, NULL);
INSERT INTO `h_menu` VALUES ('PG000001', 0, 0, 0, 0, 0, 3, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for h_submenu
-- ----------------------------
DROP TABLE IF EXISTS `h_submenu`;
CREATE TABLE `h_submenu`  (
  `id_pegawai` char(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `c` tinyint(1) NOT NULL DEFAULT 0,
  `r` tinyint(1) NOT NULL DEFAULT 0,
  `u` tinyint(1) NOT NULL DEFAULT 0,
  `d` tinyint(1) NOT NULL DEFAULT 0,
  `p` tinyint(1) NOT NULL DEFAULT 0,
  `kode_submenu` int(10) NOT NULL,
  `user_entry` char(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl_entry` datetime NULL DEFAULT NULL,
  `user_edit` char(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl_edit` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_pegawai`, `kode_submenu`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of h_submenu
-- ----------------------------
INSERT INTO `h_submenu` VALUES ('PG000001', 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL);
INSERT INTO `h_submenu` VALUES ('PG000001', 1, 1, 1, 1, 1, 2, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for h_subsubmenu
-- ----------------------------
DROP TABLE IF EXISTS `h_subsubmenu`;
CREATE TABLE `h_subsubmenu`  (
  `id_pegawai` char(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `c` tinyint(1) NOT NULL DEFAULT 0,
  `r` tinyint(1) NOT NULL DEFAULT 0,
  `u` tinyint(1) NOT NULL DEFAULT 0,
  `d` tinyint(1) NOT NULL DEFAULT 0,
  `p` tinyint(1) NOT NULL DEFAULT 0,
  `kode_subsubmenu` int(11) NOT NULL,
  `user_entry` char(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl_entry` datetime NULL DEFAULT NULL,
  `user_edit` char(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl_edit` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_pegawai`, `kode_subsubmenu`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of h_subsubmenu
-- ----------------------------
INSERT INTO `h_subsubmenu` VALUES ('PG000001', 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, NULL);
INSERT INTO `h_subsubmenu` VALUES ('PG000001', 0, 0, 0, 0, 0, 2, NULL, NULL, NULL, NULL);
INSERT INTO `h_subsubmenu` VALUES ('PG000001', 0, 0, 0, 0, 0, 3, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for jabatan
-- ----------------------------
DROP TABLE IF EXISTS `jabatan`;
CREATE TABLE `jabatan`  (
  `id_jabatan` char(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'JB001',
  `nama_jabatan` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `keterangan` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_jabatan`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of jabatan
-- ----------------------------

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu`  (
  `kode_menu` int(9) NOT NULL AUTO_INCREMENT,
  `menu` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_menu` int(6) NULL DEFAULT NULL,
  `link` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `icon` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status_aktif` bit(1) NULL DEFAULT b'1',
  PRIMARY KEY (`kode_menu`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES (1, 'Beranda', 1, 'Beranda', 'fa-tachometer-alt', b'1');
INSERT INTO `menu` VALUES (2, 'Profil', 2, 'Profil', 'fa-user', b'1');
INSERT INTO `menu` VALUES (3, 'Master Data', 3, '#', 'fa-database', b'1');
INSERT INTO `menu` VALUES (4, 'Hak Akses', 4, 'Akses', 'fa-lock', b'1');

-- ----------------------------
-- Table structure for pegawai
-- ----------------------------
DROP TABLE IF EXISTS `pegawai`;
CREATE TABLE `pegawai`  (
  `id_pegawai` char(8) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'PG000001',
  `nama` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `alamat` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `jk` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `id_jabatan` char(5) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `foto` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `mime` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '(0) Non-Aktif, (1) Aktif',
  `username` char(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `password` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `user_entry` char(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tgl_entry` datetime NULL DEFAULT NULL,
  `user_edit` char(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tgl_edit` datetime NULL DEFAULT NULL,
  `no_urut` double NULL DEFAULT NULL,
  PRIMARY KEY (`id_pegawai`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pegawai
-- ----------------------------
INSERT INTO `pegawai` VALUES ('PG000001', 'Yusuf', 'Jl. Pulo Wonokromo 223', 'L', 'JB001', NULL, NULL, '1', 'yusuf', 'dd2eb170076a5dec97cdbbbbff9a4405', 'PG000001', '2022-04-04 14:51:57', NULL, NULL, 1);

-- ----------------------------
-- Table structure for perumahan
-- ----------------------------
DROP TABLE IF EXISTS `perumahan`;
CREATE TABLE `perumahan`  (
  `id_perumahan` char(8) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'PM010001 (PM,id_perusahaan,no_urut)',
  `nama` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `alamat` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `no_telp` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `id_perusahaan` char(4) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `gambar` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `mime` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `keterangan` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `user_entry` char(8) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tgl_entry` datetime NULL DEFAULT NULL,
  `user_edit` char(8) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tgl_edit` datetime NULL DEFAULT NULL,
  `no_urut` double NULL DEFAULT NULL,
  PRIMARY KEY (`id_perumahan`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of perumahan
-- ----------------------------

-- ----------------------------
-- Table structure for perusahaan
-- ----------------------------
DROP TABLE IF EXISTS `perusahaan`;
CREATE TABLE `perusahaan`  (
  `id_perusahaan` char(4) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'PR01',
  `nama_perusahaan` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `alamat` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `no_telp` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `logo` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `mime` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `keterangan` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `no_urut` double NULL DEFAULT NULL,
  PRIMARY KEY (`id_perusahaan`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of perusahaan
-- ----------------------------

-- ----------------------------
-- Table structure for submenu
-- ----------------------------
DROP TABLE IF EXISTS `submenu`;
CREATE TABLE `submenu`  (
  `kode_submenu` int(10) NOT NULL AUTO_INCREMENT,
  `kode_menu` int(9) NULL DEFAULT NULL,
  `submenu` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_submenu` int(6) NULL DEFAULT NULL,
  `link` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `icon` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status_aktif` bit(1) NULL DEFAULT b'1',
  PRIMARY KEY (`kode_submenu`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of submenu
-- ----------------------------
INSERT INTO `submenu` VALUES (1, 3, 'Master Pegawai', 1, 'MasterPegawai', 'fa-user', b'1');
INSERT INTO `submenu` VALUES (2, 3, 'Master Admin', 2, 'MasterAdmin', 'fa-user', b'1');

-- ----------------------------
-- Table structure for subsubmenu
-- ----------------------------
DROP TABLE IF EXISTS `subsubmenu`;
CREATE TABLE `subsubmenu`  (
  `kode_subsubmenu` int(11) NOT NULL AUTO_INCREMENT,
  `kode_submenu` int(10) NULL DEFAULT NULL,
  `subsubmenu` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_subsubmenu` int(6) NULL DEFAULT NULL,
  `link` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `icon` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status_aktif` bit(1) NULL DEFAULT b'1',
  PRIMARY KEY (`kode_subsubmenu`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of subsubmenu
-- ----------------------------
INSERT INTO `subsubmenu` VALUES (1, 1, 'Pegawai Honorer', 1, 'PegawaiHonorer', '', b'1');
INSERT INTO `subsubmenu` VALUES (2, 1, 'Pegawai Harian', 2, 'PegawaiHarian', '', b'1');
INSERT INTO `subsubmenu` VALUES (3, 1, 'Pegawai Tetap', 3, 'PegawaiTetap', NULL, b'1');

-- ----------------------------
-- Table structure for type
-- ----------------------------
DROP TABLE IF EXISTS `type`;
CREATE TABLE `type`  (
  `kode_type` char(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '32,46,dst',
  `luas_bangunan` double NULL DEFAULT NULL COMMENT 'm3',
  `panjang` double NULL DEFAULT NULL COMMENT 'm',
  `lebar` double NULL DEFAULT NULL COMMENT 'm',
  PRIMARY KEY (`kode_type`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of type
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
