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

 Date: 28/05/2022 15:13:47
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
INSERT INTO `h_menu` VALUES ('PG000001', 1, 1, 1, 1, 1, 1, NULL, NULL, 'PG000001', '2022-05-28 13:57:58');
INSERT INTO `h_menu` VALUES ('PG000001', 0, 0, 0, 0, 0, 2, NULL, NULL, 'PG000001', '2022-05-28 13:57:58');
INSERT INTO `h_menu` VALUES ('PG000001', 1, 1, 1, 1, 1, 3, NULL, NULL, 'PG000001', '2022-05-28 13:57:58');
INSERT INTO `h_menu` VALUES ('PG000001', 1, 1, 1, 1, 1, 4, NULL, NULL, 'PG000001', '2022-05-28 13:57:58');
INSERT INTO `h_menu` VALUES ('PG000002', 1, 1, 1, 1, 1, 1, 'PG000001', '2022-05-20 23:24:41', NULL, NULL);
INSERT INTO `h_menu` VALUES ('PG000002', 1, 1, 1, 1, 1, 2, 'PG000001', '2022-05-20 23:24:41', NULL, NULL);
INSERT INTO `h_menu` VALUES ('PG000002', 1, 1, 1, 1, 1, 3, 'PG000001', '2022-05-20 23:24:41', NULL, NULL);
INSERT INTO `h_menu` VALUES ('PG000002', 1, 1, 1, 1, 1, 4, 'PG000001', '2022-05-20 23:24:41', NULL, NULL);

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
INSERT INTO `h_submenu` VALUES ('PG000001', 1, 1, 1, 1, 1, 1, NULL, NULL, 'PG000001', '2022-05-28 13:57:58');
INSERT INTO `h_submenu` VALUES ('PG000001', 1, 1, 1, 1, 1, 2, NULL, NULL, 'PG000001', '2022-05-28 13:57:58');
INSERT INTO `h_submenu` VALUES ('PG000001', 1, 1, 1, 1, 1, 3, 'PG000001', '2022-05-07 08:39:02', 'PG000001', '2022-05-28 13:57:58');
INSERT INTO `h_submenu` VALUES ('PG000001', 1, 1, 1, 1, 1, 4, 'PG000001', '2022-05-09 12:57:32', 'PG000001', '2022-05-28 13:57:58');
INSERT INTO `h_submenu` VALUES ('PG000001', 1, 1, 1, 1, 1, 5, 'PG000001', '2022-05-15 08:14:58', 'PG000001', '2022-05-28 13:57:58');
INSERT INTO `h_submenu` VALUES ('PG000001', 1, 1, 1, 1, 1, 6, 'PG000001', '2022-05-24 06:05:51', 'PG000001', '2022-05-28 13:57:58');
INSERT INTO `h_submenu` VALUES ('PG000002', 1, 1, 1, 1, 1, 1, 'PG000001', '2022-05-20 23:24:41', NULL, NULL);
INSERT INTO `h_submenu` VALUES ('PG000002', 1, 1, 1, 1, 1, 2, 'PG000001', '2022-05-20 23:24:41', NULL, NULL);
INSERT INTO `h_submenu` VALUES ('PG000002', 1, 1, 1, 1, 1, 3, 'PG000001', '2022-05-20 23:24:41', NULL, NULL);
INSERT INTO `h_submenu` VALUES ('PG000002', 1, 1, 1, 1, 1, 4, 'PG000001', '2022-05-20 23:24:41', NULL, NULL);
INSERT INTO `h_submenu` VALUES ('PG000002', 1, 1, 1, 1, 1, 5, 'PG000001', '2022-05-20 23:24:41', NULL, NULL);
INSERT INTO `h_submenu` VALUES ('PG000002', 1, 1, 1, 1, 1, 6, 'PG000001', '2022-05-24 06:05:51', NULL, NULL);

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

-- ----------------------------
-- Table structure for icon
-- ----------------------------
DROP TABLE IF EXISTS `icon`;
CREATE TABLE `icon`  (
  `nama_icon` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `font` char(5) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`nama_icon`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of icon
-- ----------------------------
INSERT INTO `icon` VALUES ('fas fa-address-book', 'f2b9');
INSERT INTO `icon` VALUES ('fas fa-address-card', 'f2bb');
INSERT INTO `icon` VALUES ('fas fa-archive', 'f187');
INSERT INTO `icon` VALUES ('fas fa-archway', 'f557');
INSERT INTO `icon` VALUES ('fas fa-asterisk', 'f069');
INSERT INTO `icon` VALUES ('fas fa-award', 'f559');
INSERT INTO `icon` VALUES ('fas fa-balance-scale', 'f24e');
INSERT INTO `icon` VALUES ('fas fa-ban', 'f05e');
INSERT INTO `icon` VALUES ('fas fa-barcode', 'f02a');
INSERT INTO `icon` VALUES ('fas fa-battery-full', 'f240');
INSERT INTO `icon` VALUES ('fas fa-bed', 'f236');
INSERT INTO `icon` VALUES ('fas fa-bell', 'f0f3');
INSERT INTO `icon` VALUES ('fas fa-calculator', 'f1ec');
INSERT INTO `icon` VALUES ('fas fa-calendar', 'f133');
INSERT INTO `icon` VALUES ('fas fa-camera', 'f030');
INSERT INTO `icon` VALUES ('fas fa-car', 'f1b9');
INSERT INTO `icon` VALUES ('fas fa-cash-register', 'f788');
INSERT INTO `icon` VALUES ('fas fa-cog', 'f013');
INSERT INTO `icon` VALUES ('fas fa-database', 'f1c0');
INSERT INTO `icon` VALUES ('fas fa-desktop', 'f108');
INSERT INTO `icon` VALUES ('fas fa-dolly', 'f472');
INSERT INTO `icon` VALUES ('fas fa-door-closed', 'f52a');
INSERT INTO `icon` VALUES ('fas fa-download', 'f019');
INSERT INTO `icon` VALUES ('fas fa-dungeon', 'f6d9');
INSERT INTO `icon` VALUES ('fas fa-edit', 'f044');
INSERT INTO `icon` VALUES ('fas fa-envelope', 'f0e0');
INSERT INTO `icon` VALUES ('fas fa-exclamation', 'f12a');
INSERT INTO `icon` VALUES ('fas fa-eye', 'f06e');
INSERT INTO `icon` VALUES ('fas fa-eye-slash', 'f070');
INSERT INTO `icon` VALUES ('fas fa-faucet', 'e005');
INSERT INTO `icon` VALUES ('fas fa-female', 'f182');
INSERT INTO `icon` VALUES ('fas fa-file', 'f15b');
INSERT INTO `icon` VALUES ('fas fa-fire', 'f06d');
INSERT INTO `icon` VALUES ('fas fa-flag', 'f024');
INSERT INTO `icon` VALUES ('fas fa-gem', 'f3a5');
INSERT INTO `icon` VALUES ('fas fa-gift', 'f06b');
INSERT INTO `icon` VALUES ('fas fa-glass-martini', 'f000');
INSERT INTO `icon` VALUES ('fas fa-glasses', 'f530');
INSERT INTO `icon` VALUES ('fas fa-globe', 'f0ac');
INSERT INTO `icon` VALUES ('fas fa-graduation-cap', 'f19d');
INSERT INTO `icon` VALUES ('fas fa-hamburger', 'f805');
INSERT INTO `icon` VALUES ('fas fa-hammer', 'f6e3');
INSERT INTO `icon` VALUES ('fas fa-hand-holding-heart', 'f4be');
INSERT INTO `icon` VALUES ('fas fa-handshake', 'f2b5');
INSERT INTO `icon` VALUES ('fas fa-hdd', 'f0a0');
INSERT INTO `icon` VALUES ('fas fa-headphones', 'f025');
INSERT INTO `icon` VALUES ('fas fa-ice-cream', 'f810');
INSERT INTO `icon` VALUES ('fas fa-icons', 'f86d');
INSERT INTO `icon` VALUES ('fas fa-id-badge', 'f2c1');
INSERT INTO `icon` VALUES ('fas fa-id-card', 'f2c2');
INSERT INTO `icon` VALUES ('fas fa-image', 'f03e');
INSERT INTO `icon` VALUES ('fas fa-info-circle', 'f05a');
INSERT INTO `icon` VALUES ('fas fa-jedi', 'f669');
INSERT INTO `icon` VALUES ('fas fa-key', 'f084');
INSERT INTO `icon` VALUES ('fas fa-keyboard', 'f11c');
INSERT INTO `icon` VALUES ('fas fa-landmark', 'f66f');
INSERT INTO `icon` VALUES ('fas fa-language', 'f1ab');
INSERT INTO `icon` VALUES ('fas fa-laptop', 'f109');
INSERT INTO `icon` VALUES ('fas fa-lightbulb', 'f0eb');
INSERT INTO `icon` VALUES ('fas fa-link', 'f0c1');
INSERT INTO `icon` VALUES ('fas fa-lock', 'f023');
INSERT INTO `icon` VALUES ('fas fa-magic', 'f0d0');
INSERT INTO `icon` VALUES ('fas fa-mail-bulk', 'f674');
INSERT INTO `icon` VALUES ('fas fa-male', 'f183');
INSERT INTO `icon` VALUES ('fas fa-map-marker-alt', 'f3c5');
INSERT INTO `icon` VALUES ('fas fa-marker', 'f5a1');
INSERT INTO `icon` VALUES ('fas fa-medal', 'f5a2');
INSERT INTO `icon` VALUES ('fas fa-network-wired', 'f6ff');
INSERT INTO `icon` VALUES ('fas fa-notes-medical', 'f481');
INSERT INTO `icon` VALUES ('fas fa-paint-roller', 'f5aa');
INSERT INTO `icon` VALUES ('fas fa-palette', 'f53f');
INSERT INTO `icon` VALUES ('fas fa-paper-plane', 'f1d8');
INSERT INTO `icon` VALUES ('fas fa-paperclip', 'f0c6');
INSERT INTO `icon` VALUES ('fas fa-pepper-hot', 'f816');
INSERT INTO `icon` VALUES ('fas fa-phone', 'f095');
INSERT INTO `icon` VALUES ('fas fa-qrcode', 'f029');
INSERT INTO `icon` VALUES ('fas fa-question-circle', 'f059');
INSERT INTO `icon` VALUES ('fas fa-random', 'f074');
INSERT INTO `icon` VALUES ('fas fa-receipt', 'f543');
INSERT INTO `icon` VALUES ('fas fa-recycle', 'f1b8');
INSERT INTO `icon` VALUES ('fas fa-redo', 'f01e');
INSERT INTO `icon` VALUES ('fas fa-reply', 'f3e5');
INSERT INTO `icon` VALUES ('fas fa-restroom', 'f7bd');
INSERT INTO `icon` VALUES ('fas fa-satellite-dish', 'f7c0');
INSERT INTO `icon` VALUES ('fas fa-save', 'f0c7');
INSERT INTO `icon` VALUES ('fas fa-scroll', 'f70e');
INSERT INTO `icon` VALUES ('fas fa-sd-card', 'f7c2');
INSERT INTO `icon` VALUES ('fas fa-search', 'f002');
INSERT INTO `icon` VALUES ('fas fa-server', 'f233');
INSERT INTO `icon` VALUES ('fas fa-table', 'f0ce');
INSERT INTO `icon` VALUES ('fas fa-tachometer-alt', 'f3fd');
INSERT INTO `icon` VALUES ('fas fa-tags', 'f02c');
INSERT INTO `icon` VALUES ('fas fa-thumbs-up', 'f164');
INSERT INTO `icon` VALUES ('fas fa-times', 'f00d');
INSERT INTO `icon` VALUES ('fas fa-trash', 'f1f8');
INSERT INTO `icon` VALUES ('fas fa-umbrella', 'f0e9');
INSERT INTO `icon` VALUES ('fas fa-user', 'f007');
INSERT INTO `icon` VALUES ('fas fa-walking', 'f554');
INSERT INTO `icon` VALUES ('fas fa-wallet', 'f555');
INSERT INTO `icon` VALUES ('fas fa-wifi', 'f1eb');
INSERT INTO `icon` VALUES ('fas fa-wine-glass', 'f4e3');

-- ----------------------------
-- Table structure for jabatan
-- ----------------------------
DROP TABLE IF EXISTS `jabatan`;
CREATE TABLE `jabatan`  (
  `id_jabatan` char(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'JB001',
  `nama_jabatan` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `keterangan` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `no_urut` double NULL DEFAULT NULL,
  PRIMARY KEY (`id_jabatan`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of jabatan
-- ----------------------------
INSERT INTO `jabatan` VALUES ('JB001', 'Direktur Utama (CEO)', '', 1);
INSERT INTO `jabatan` VALUES ('JB002', 'Chief Finance Officer (CFO)', '', 2);
INSERT INTO `jabatan` VALUES ('JB003', 'Chief Marketing Officer (CMO)', '', 3);
INSERT INTO `jabatan` VALUES ('JB004', 'HR Officer', '', 4);
INSERT INTO `jabatan` VALUES ('JB005', 'Administrator Aplikasi', '', 5);

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu`  (
  `kode_menu` int(9) NOT NULL,
  `menu` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_menu` int(6) NULL DEFAULT NULL,
  `link` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `icon` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status_aktif` bit(1) NULL DEFAULT b'1',
  PRIMARY KEY (`kode_menu`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES (1, 'Beranda', 1, 'Beranda', 'fas fa-tachometer-alt', b'1');
INSERT INTO `menu` VALUES (2, 'Profil', 2, 'Profil', 'fas fa-user', b'1');
INSERT INTO `menu` VALUES (3, 'Master Data', 3, '#', 'fas fa-database', b'1');
INSERT INTO `menu` VALUES (4, 'Hak Akses', 4, '#', 'fas fa-lock', b'1');

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
  `status` char(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
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
INSERT INTO `pegawai` VALUES ('PG000001', 'Yusuf', 'Jl. Pulo Wonokromo 223', 'L', 'JB005', NULL, NULL, '', 'yusuf', 'dd2eb170076a5dec97cdbbbbff9a4405', 'PG000001', '2022-04-04 14:51:57', NULL, NULL, 1);
INSERT INTO `pegawai` VALUES ('PG000002', 'Agnes Monica', 'Jl. Erlangga No. 23', 'P', 'JB001', NULL, NULL, 'Tetap', 'agnes', '2d8463b5c3a3c6c8854a175683fe6303', 'PG000001', '2022-05-20 23:24:41', NULL, NULL, 2);

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
INSERT INTO `perusahaan` VALUES ('PR01', 'PT. Syahdina Land Putra', '', '', 'PR01.jpeg', 'image/jpeg', '', 1);

-- ----------------------------
-- Table structure for submenu
-- ----------------------------
DROP TABLE IF EXISTS `submenu`;
CREATE TABLE `submenu`  (
  `kode_submenu` int(10) NOT NULL,
  `kode_menu` int(9) NULL DEFAULT NULL,
  `submenu` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_submenu` int(6) NULL DEFAULT NULL,
  `link` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `icon` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status_aktif` bit(1) NULL DEFAULT b'1',
  PRIMARY KEY (`kode_submenu`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of submenu
-- ----------------------------
INSERT INTO `submenu` VALUES (1, 4, 'Menu', 1, 'Akses/atur_menu', NULL, b'1');
INSERT INTO `submenu` VALUES (2, 4, 'Atur Akses', 2, 'Akses/akses', NULL, b'1');
INSERT INTO `submenu` VALUES (3, 3, 'Master Icon', 3, 'MasterIcon', NULL, b'1');
INSERT INTO `submenu` VALUES (4, 3, 'Master Jabatan', 4, 'MasterJabatan', NULL, b'1');
INSERT INTO `submenu` VALUES (5, 3, 'Master Pegawai', 5, 'MasterPegawai', NULL, b'1');
INSERT INTO `submenu` VALUES (6, 3, 'Master Perusahaan', 6, 'MasterPerusahaan', NULL, b'1');

-- ----------------------------
-- Table structure for subsubmenu
-- ----------------------------
DROP TABLE IF EXISTS `subsubmenu`;
CREATE TABLE `subsubmenu`  (
  `kode_subsubmenu` int(11) NOT NULL,
  `kode_submenu` int(10) NULL DEFAULT NULL,
  `subsubmenu` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_subsubmenu` int(6) NULL DEFAULT NULL,
  `link` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `icon` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status_aktif` bit(1) NULL DEFAULT b'1',
  PRIMARY KEY (`kode_subsubmenu`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of subsubmenu
-- ----------------------------

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
