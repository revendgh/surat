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


-- Dumping database structure for esurat
DROP DATABASE IF EXISTS `esurat`;
CREATE DATABASE IF NOT EXISTS `esurat` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `esurat`;

-- Dumping structure for table esurat.jenis_surat
DROP TABLE IF EXISTS `jenis_surat`;
CREATE TABLE IF NOT EXISTS `jenis_surat` (
  `id` tinyint(1) NOT NULL AUTO_INCREMENT,
  `jenis_surat` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table esurat.jenis_surat: ~7 rows (approximately)
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

-- Dumping structure for table esurat.pengguna
DROP TABLE IF EXISTS `pengguna`;
CREATE TABLE IF NOT EXISTS `pengguna` (
  `Column 1` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table esurat.pengguna: ~0 rows (approximately)
/*!40000 ALTER TABLE `pengguna` DISABLE KEYS */;
/*!40000 ALTER TABLE `pengguna` ENABLE KEYS */;

-- Dumping structure for table esurat.surat
DROP TABLE IF EXISTS `surat`;
CREATE TABLE IF NOT EXISTS `surat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_jenis_surat` tinyint(1) DEFAULT NULL,
  `tujuan` varchar(50) DEFAULT NULL,
  `instansi` varchar(50) DEFAULT NULL,
  `alamat_instansi` varchar(50) DEFAULT NULL,
  `kab_kota` varchar(50) DEFAULT NULL,
  `tgl_awal` varchar(50) DEFAULT NULL,
  `tgl_akhir` varchar(50) DEFAULT NULL,
  `no_hp` char(12) DEFAULT NULL,
  `pemilik_no` varchar(50) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `tahun_akademik` char(9) DEFAULT NULL,
  `semester` char(1) DEFAULT NULL,
  `ipk` char(4) DEFAULT NULL,
  `judul_ta` text DEFAULT NULL,
  `dosen` varchar(50) DEFAULT NULL,
  `jabatan_dosen` text DEFAULT NULL,
  `no_dosen` varchar(13) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_surat_jenis_surat` (`id_jenis_surat`),
  CONSTRAINT `FK_surat_jenis_surat` FOREIGN KEY (`id_jenis_surat`) REFERENCES `jenis_surat` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table esurat.surat: ~6 rows (approximately)
/*!40000 ALTER TABLE `surat` DISABLE KEYS */;
REPLACE INTO `surat` (`id`, `id_jenis_surat`, `tujuan`, `instansi`, `alamat_instansi`, `kab_kota`, `tgl_awal`, `tgl_akhir`, `no_hp`, `pemilik_no`, `keterangan`, `tahun_akademik`, `semester`, `ipk`, `judul_ta`, `dosen`, `jabatan_dosen`, `no_dosen`, `created_at`, `updated_at`, `status`) VALUES
	(11, 3, 'Kepala Sekolah SMK Negeri 7 Samarinda', 'SMK Negeri 7 Samarinda', 'Jln. Aminah Syukur', 'Samarinda', '29 Maret 2020', '04 April 2020', '085131316464', 'RIdho Wibi Pradana', '1. testing\r\n2. testing', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-02-27', '2020-02-27', NULL),
	(12, 2, 'Kepala Sekolah SMK Negeri 7 Samarinda', 'SMK Negeri 7 Samarinda', 'Jln. Aminah Syukur', 'Samarinda', '01 Maret 2020', '05 Maret 2020', '085113131313', 'testing', 'tessssssssssssssssss', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-02-28', '2020-02-28', NULL),
	(22, 4, 'Pimpinan PT. Kaltim Prima Coal', 'PT. Kaltim Prima Coal', 'M1 testing mess side, sangatta', 'kutai timur', '09 Maret 2020', '16 Maret 2020', '082212345678', 'Enamitha Okta Sedelia', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05', '2020-03-05', NULL),
	(24, 2, 'Kepala Sekolah SMK Negeri 7 Samarinda', 'SMK Negeri 7 Samarinda', 'Jln. Aminah Syukur', 'Samarinda', '09 Maret 2020', '16 Maret 2020', '081212345678', 'RIdho Wibi Pradana', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-05', '2020-03-05', NULL),
	(26, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Kelengkapan Persyaratan Beasiswa BI', '2019/2020', '1', NULL, NULL, NULL, NULL, NULL, '2020-03-05', '2020-03-05', NULL),
	(28, 7, NULL, NULL, NULL, NULL, NULL, NULL, '081212345678', NULL, NULL, '2019/2020', '4', '3.86', NULL, NULL, NULL, NULL, '2020-03-05', '2020-03-05', NULL);
/*!40000 ALTER TABLE `surat` ENABLE KEYS */;

-- Dumping structure for table esurat.surat_keterangan
DROP TABLE IF EXISTS `surat_keterangan`;
CREATE TABLE IF NOT EXISTS `surat_keterangan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_surat` int(11) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_surat_keterangan_surat` (`id_surat`),
  CONSTRAINT `FK_surat_keterangan_surat` FOREIGN KEY (`id_surat`) REFERENCES `surat` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table esurat.surat_keterangan: ~5 rows (approximately)
/*!40000 ALTER TABLE `surat_keterangan` DISABLE KEYS */;
REPLACE INTO `surat_keterangan` (`id`, `id_surat`, `keterangan`) VALUES
	(3, 22, 'Data Pergudangan'),
	(4, 22, 'Profil Perusahaan'),
	(5, 24, 'Profil Sekolah'),
	(6, 24, 'Data Mahasiswa'),
	(7, 24, 'Data Pegawai dan Pengajar');
/*!40000 ALTER TABLE `surat_keterangan` ENABLE KEYS */;

-- Dumping structure for table esurat.surat_mahasiswa
DROP TABLE IF EXISTS `surat_mahasiswa`;
CREATE TABLE IF NOT EXISTS `surat_mahasiswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_surat` int(11) DEFAULT NULL,
  `nim` char(8) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `prodi` varchar(50) DEFAULT NULL,
  `tempat` varchar(50) DEFAULT NULL,
  `tgl_lahir` varchar(50) DEFAULT NULL,
  `alamat_asal` text DEFAULT NULL,
  `alamat_skrg` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__surat` (`id_surat`),
  CONSTRAINT `FK__surat` FOREIGN KEY (`id_surat`) REFERENCES `surat` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table esurat.surat_mahasiswa: ~7 rows (approximately)
/*!40000 ALTER TABLE `surat_mahasiswa` DISABLE KEYS */;
REPLACE INTO `surat_mahasiswa` (`id`, `id_surat`, `nim`, `nama`, `prodi`, `tempat`, `tgl_lahir`, `alamat_asal`, `alamat_skrg`) VALUES
	(6, 11, '16615001', 'Ridho Wibi Pradana', 'Teknik Informatika', NULL, NULL, NULL, NULL),
	(7, 12, '16615003', 'testing', 'Teknik Elektro', NULL, NULL, NULL, NULL),
	(8, 12, '16615014', 'testingg', 'Teknik Informatika', NULL, NULL, NULL, NULL),
	(23, 22, '16615018', 'RIDHO WIBI PRADANA', 'EKONOMI', NULL, NULL, NULL, NULL),
	(24, 22, '16615019', 'Enamitha Okta Sedelia', 'EKONOMI', NULL, NULL, NULL, NULL),
	(26, 24, '16615001', 'Ridho Wibi Pradana', 'Teknik Informatika', NULL, NULL, NULL, NULL),
	(28, 26, '16615018', 'Ridho Wibi Pradana', 'Teknik Informatika', NULL, NULL, NULL, NULL),
	(30, 28, '16615018', 'Ridho Wibi Pradana', 'Teknik Informatika', 'Anggana', '03 April 1998', 'Jln. Veteran RT. 4 No. 21 Desa Anggana, Kecamatan Anggana, Kab. Kutai Kartanegara, Kalimantan Timur', 'Jln. Veteran RT. 4 No. 21 Desa Anggana, Kecamatan Anggana, Kab. Kutai Kartanegara, Kalimantan Timur');
/*!40000 ALTER TABLE `surat_mahasiswa` ENABLE KEYS */;

-- Dumping structure for table esurat.surat_matkul
DROP TABLE IF EXISTS `surat_matkul`;
CREATE TABLE IF NOT EXISTS `surat_matkul` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_surat` int(11) DEFAULT NULL,
  `mata_kuliah` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_surat_matkul_surat` (`id_surat`),
  CONSTRAINT `FK_surat_matkul_surat` FOREIGN KEY (`id_surat`) REFERENCES `surat` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table esurat.surat_matkul: ~2 rows (approximately)
/*!40000 ALTER TABLE `surat_matkul` DISABLE KEYS */;
REPLACE INTO `surat_matkul` (`id`, `id_surat`, `mata_kuliah`) VALUES
	(7, 22, 'MATEMATIKA 2'),
	(8, 22, 'PERPAJAKAN');
/*!40000 ALTER TABLE `surat_matkul` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
