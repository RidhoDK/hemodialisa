-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 8.0.30 - MySQL Community Server - GPL
-- OS Server:                    Win64
-- HeidiSQL Versi:               12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Membuang struktur basisdata untuk hd_db
CREATE DATABASE IF NOT EXISTS `hd_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `hd_db`;

-- membuang struktur untuk table hd_db.tbl_akun
CREATE TABLE IF NOT EXISTS `tbl_akun` (
  `id_akun` int NOT NULL AUTO_INCREMENT,
  `username` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `type` enum('admin','operator','dokter','farmasi') COLLATE utf8mb4_general_ci DEFAULT 'admin',
  PRIMARY KEY (`id_akun`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table hd_db.tbl_alatobat
CREATE TABLE IF NOT EXISTS `tbl_alatobat` (
  `id_alatobat` int NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `jumlah_stok` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_exp` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `tersedia` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_alatobat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table hd_db.tbl_hasillab
CREATE TABLE IF NOT EXISTS `tbl_hasillab` (
  `id_hasillab` int NOT NULL AUTO_INCREMENT,
  `nama_pasien` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `no_rm` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `urea` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `kreatinin` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `hemoglobin` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `sebelum_hd` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `sesudah_hd` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_hasillab`),
  KEY `nama_pasien` (`nama_pasien`),
  CONSTRAINT `tbl_hasillab_ibfk_1` FOREIGN KEY (`nama_pasien`) REFERENCES `tbl_pasien` (`nama_pasien`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table hd_db.tbl_jadwal
CREATE TABLE IF NOT EXISTS `tbl_jadwal` (
  `id_jadwal` int NOT NULL AUTO_INCREMENT,
  `nama_pasien` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tanggal` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `jam` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `ruangan` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `mesin` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_jadwal`),
  KEY `key_pasien` (`nama_pasien`) USING BTREE,
  CONSTRAINT `FK_tbl_jadwal_tbl_pasien` FOREIGN KEY (`nama_pasien`) REFERENCES `tbl_pasien` (`nama_pasien`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table hd_db.tbl_pasien
CREATE TABLE IF NOT EXISTS `tbl_pasien` (
  `id_pasien` int NOT NULL AUTO_INCREMENT,
  `nama_pasien` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `no_rm` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `umur` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_kelamin` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `durasi` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `tensi` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `berat_badan` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `diagnosa` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `obat` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_pasien`),
  KEY `nama_pasien` (`nama_pasien`)
) ENGINE=InnoDB AUTO_INCREMENT=12318 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table hd_db.tbl_permintaan
CREATE TABLE IF NOT EXISTS `tbl_permintaan` (
  `id_permintaan` int NOT NULL AUTO_INCREMENT,
  `nama_pasien` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `no_rm` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `gol_dar` varchar(3) COLLATE utf8mb4_general_ci NOT NULL,
  `rhesus` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jumlah_diminta` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_permintaan` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `prioritas` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `catatan` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_permintaan`),
  KEY `nama_pasien` (`nama_pasien`),
  CONSTRAINT `tbl_permintaan_ibfk_1` FOREIGN KEY (`nama_pasien`) REFERENCES `tbl_pasien` (`nama_pasien`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table hd_db.tbl_resep
CREATE TABLE IF NOT EXISTS `tbl_resep` (
  `id_resep` int NOT NULL AUTO_INCREMENT,
  `nama_pasien` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `dokter` varchar(80) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_resep` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_obat` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `dosis` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `jumlah` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `aturan_pakai` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_resep`) USING BTREE,
  KEY `FK_tbl_resep_tbl_pasien` (`nama_pasien`),
  CONSTRAINT `FK_tbl_resep_tbl_pasien` FOREIGN KEY (`nama_pasien`) REFERENCES `tbl_pasien` (`nama_pasien`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table hd_db.tbl_stokdarah
CREATE TABLE IF NOT EXISTS `tbl_stokdarah` (
  `id_stokdarah` int NOT NULL AUTO_INCREMENT,
  `gol_darah` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `rhesus` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jumlah` int NOT NULL,
  `tempat` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_exp` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `last_update` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_stokdarah`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table hd_db.tbl_tagihan
CREATE TABLE IF NOT EXISTS `tbl_tagihan` (
  `id_tagihan` int NOT NULL AUTO_INCREMENT,
  `nama_pasien` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `no_rm` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `total_biaya` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_pembayaran` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `metode_pembayaran` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `status_pembayaran` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_tagihan`),
  KEY `nama_pasien` (`nama_pasien`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Pengeluaran data tidak dipilih.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
