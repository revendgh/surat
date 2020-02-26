-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.10-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for ridho-surat
DROP DATABASE IF EXISTS `ridho-surat`;
CREATE DATABASE IF NOT EXISTS `ridho-surat` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `ridho-surat`;

-- Dumping structure for table ridho-surat.jenis_surat
DROP TABLE IF EXISTS `jenis_surat`;
CREATE TABLE IF NOT EXISTS `jenis_surat` (
  `id` tinyint(1) NOT NULL AUTO_INCREMENT,
  `jenis_surat` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ridho-surat.jenis_surat: ~7 rows (approximately)
/*!40000 ALTER TABLE `jenis_surat` DISABLE KEYS */;
REPLACE INTO `jenis_surat` (`id`, `jenis_surat`) VALUES
	(1, 'Surat Aktif'),
	(2, 'Permohonan Data Untuk Tugas Akhir'),
	(3, 'Permohonan Survey, Wawancara dan Penyebaran Kuesioner Untuk Tugas Akhir'),
	(4, 'Permohonan Data Untuk Mata Kuliah'),
	(5, 'Permohonan Survey, Wawancara dan Penyebaran Kuesioner Untuk Mata Kuliah'),
	(6, 'Permohonan Izin Penelitian TA untuk Dinas Penanaman Modal'),
	(7, 'Surat Pernyataan Tidak Sedang Menerima BEASISWA');
/*!40000 ALTER TABLE `jenis_surat` ENABLE KEYS */;

-- Dumping structure for table ridho-surat.pengguna
DROP TABLE IF EXISTS `pengguna`;
CREATE TABLE IF NOT EXISTS `pengguna` (
  `Column 1` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ridho-surat.pengguna: ~0 rows (approximately)
/*!40000 ALTER TABLE `pengguna` DISABLE KEYS */;
/*!40000 ALTER TABLE `pengguna` ENABLE KEYS */;

-- Dumping structure for table ridho-surat.surat
DROP TABLE IF EXISTS `surat`;
CREATE TABLE IF NOT EXISTS `surat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_jenis_surat` tinyint(1) DEFAULT NULL,
  `tujuan` varchar(50) DEFAULT NULL,
  `instansi` varchar(50) DEFAULT NULL,
  `alamat_instansi` varchar(50) DEFAULT NULL,
  `kab_kota` varchar(50) DEFAULT NULL,
  `tgl_awal` date DEFAULT NULL,
  `tgl_akhir` date DEFAULT NULL,
  `no_hp` char(12) DEFAULT NULL,
  `pemilik_no` varchar(20) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_surat_jenis_surat` (`id_jenis_surat`),
  CONSTRAINT `FK_surat_jenis_surat` FOREIGN KEY (`id_jenis_surat`) REFERENCES `jenis_surat` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ridho-surat.surat: ~0 rows (approximately)
/*!40000 ALTER TABLE `surat` DISABLE KEYS */;
/*!40000 ALTER TABLE `surat` ENABLE KEYS */;

-- Dumping structure for table ridho-surat.surat_mahasiswa
DROP TABLE IF EXISTS `surat_mahasiswa`;
CREATE TABLE IF NOT EXISTS `surat_mahasiswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_surat` int(11) DEFAULT NULL,
  `nim` char(8) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `prodi` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__surat` (`id_surat`),
  CONSTRAINT `FK__surat` FOREIGN KEY (`id_surat`) REFERENCES `surat` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ridho-surat.surat_mahasiswa: ~0 rows (approximately)
/*!40000 ALTER TABLE `surat_mahasiswa` DISABLE KEYS */;
/*!40000 ALTER TABLE `surat_mahasiswa` ENABLE KEYS */;

-- Dumping structure for table ridho-surat.surat_matkul
DROP TABLE IF EXISTS `surat_matkul`;
CREATE TABLE IF NOT EXISTS `surat_matkul` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_surat` int(11) DEFAULT NULL,
  `mata_kuliah` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_surat_matkul_surat` (`id_surat`),
  CONSTRAINT `FK_surat_matkul_surat` FOREIGN KEY (`id_surat`) REFERENCES `surat` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ridho-surat.surat_matkul: ~0 rows (approximately)
/*!40000 ALTER TABLE `surat_matkul` DISABLE KEYS */;
/*!40000 ALTER TABLE `surat_matkul` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
