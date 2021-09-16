-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.38-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;




-- Dumping structure for table adope.dokumenpengadaan
CREATE TABLE IF NOT EXISTS `dokumenpengadaan` (
  `id_dokumen` int(11) NOT NULL AUTO_INCREMENT,
  `nama_dokumen` varchar(200) NOT NULL,
  `kode_dokumen` varchar(50) DEFAULT NULL,
  `unit_krj` varchar(500) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_lemari` int(11) NOT NULL,
  `diproses` enum('belum','selesai') DEFAULT NULL,
  `file` varchar(100) DEFAULT NULL,
  `jumlah_le` int(10) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id_dokumen`),
  UNIQUE KEY `kode_dokumen` (`kode_dokumen`),
  KEY `id_kategori` (`id_kategori`),
  KEY `kode_lemari` (`id_lemari`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `dokumenpengadaan_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`),
  CONSTRAINT `dokumenpengadaan_ibfk_3` FOREIGN KEY (`id_lemari`) REFERENCES `lemari` (`id_lemari`),
  CONSTRAINT `dokumenpengadaan_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- Dumping data for table adope.dokumenpengadaan: ~5 rows (approximately)
/*!40000 ALTER TABLE `dokumenpengadaan` DISABLE KEYS */;
REPLACE INTO `dokumenpengadaan` (`id_dokumen`, `nama_dokumen`, `kode_dokumen`, `unit_krj`, `user_id`, `id_kategori`, `id_lemari`, `diproses`, `file`, `jumlah_le`, `created`, `updated`) VALUES
	(11, 'Adaro S002', 'D002', 'Programmer', 1, 5, 2, NULL, 'dokumen-pengadaan-200514-431fcd9f3c.pdf', 1, '2020-05-14 11:25:19', '2020-05-16 04:18:06'),
	(12, 'Amix 20020', 'D003', NULL, 1, 3, 1, NULL, 'dokumen-pengadaan-200514-8086d56be9.pdf', 5, '2020-05-14 15:55:05', '2020-05-16 04:19:18'),
	(15, 'Adaro SS031', 'D001', NULL, 1, 4, 2, NULL, 'dokumen-pengadaan-200516-f08b7ac8aa.pdf', 1, '2020-05-16 13:28:03', '2020-05-16 07:28:29'),
	(19, 'Partixle 2020', 'D004', NULL, 1, 2, 2, NULL, 'dokumen-pengadaan-200516-acf666483b.pdf', 1, '2020-05-16 13:55:02', NULL),
	(20, 'covid 2019', 'D005', NULL, 1, 6, 2, NULL, 'dokumen-pengadaan-200518-2ff385c6e7.pdf', 1, '2020-05-18 15:15:20', NULL);
/*!40000 ALTER TABLE `dokumenpengadaan` ENABLE KEYS */;

-- Dumping structure for table adope.dok_proses
CREATE TABLE IF NOT EXISTS `dok_proses` (
  `id_masuk` int(11) NOT NULL AUTO_INCREMENT,
  `id_dokumen` int(11) NOT NULL,
  `type` enum('in','done') NOT NULL,
  `qty` int(10) NOT NULL,
  `diproses` enum('selesai') DEFAULT NULL,
  `date` date NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_masuk`),
  KEY `id_dokumen` (`id_dokumen`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `dok_proses_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumenpengadaan` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `dok_proses_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Dumping data for table adope.dok_proses: ~5 rows (approximately)
/*!40000 ALTER TABLE `dok_proses` DISABLE KEYS */;
REPLACE INTO `dok_proses` (`id_masuk`, `id_dokumen`, `type`, `qty`, `diproses`, `date`, `created`, `id_user`) VALUES
	(7, 12, 'in', 5, 'selesai', '2020-06-05', '2020-06-05 16:27:34', 1),
	(8, 15, 'in', 1, 'selesai', '2020-06-09', '2020-06-09 09:58:42', 1),
	(9, 11, 'in', 1, 'selesai', '2020-06-09', '2020-06-09 10:08:04', 1),
	(10, 19, 'in', 1, 'selesai', '2020-06-09', '2020-06-09 10:10:24', 1),
	(11, 20, 'in', 1, 'selesai', '2020-06-09', '2020-06-09 10:43:47', 1);
/*!40000 ALTER TABLE `dok_proses` ENABLE KEYS */;

-- Dumping structure for table adope.kategori
CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(200) NOT NULL,
  `jum_per_kat` int(10) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table adope.kategori: ~6 rows (approximately)
/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;
REPLACE INTO `kategori` (`id_kategori`, `nama_kategori`, `jum_per_kat`, `created`, `updated`) VALUES
	(2, 'Memorandum', 0, '2020-05-07 11:05:08', '2020-06-09 02:53:18'),
	(3, 'Nota Dinas', 0, '2020-05-07 11:05:08', '2020-06-09 02:57:11'),
	(4, 'Surat Keluar', 0, '2020-05-07 11:05:08', '2020-06-09 02:57:39'),
	(5, 'Undangan', 12, '2020-05-07 11:05:08', '2020-06-09 02:57:53'),
	(6, 'Surat Edaran', 2, '2020-05-18 13:46:46', '2020-06-09 02:58:10');
/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;

-- Dumping structure for table adope.lemari
CREATE TABLE IF NOT EXISTS `lemari` (
  `id_lemari` int(11) NOT NULL AUTO_INCREMENT,
  `kode_lemari` varchar(50) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id_lemari`),
  UNIQUE KEY `kode_rak` (`kode_lemari`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table adope.lemari: ~2 rows (approximately)
/*!40000 ALTER TABLE `lemari` DISABLE KEYS */;
REPLACE INTO `lemari` (`id_lemari`, `kode_lemari`, `created`, `updated`) VALUES
	(1, 'LE001', '2020-05-09 07:36:21', '2020-05-15 03:14:41'),
	(2, 'LE002', '2020-05-09 07:36:21', '2020-05-15 03:14:50');
/*!40000 ALTER TABLE `lemari` ENABLE KEYS */;

-- Dumping structure for table adope.user
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(200) NOT NULL,
  `jeniskelamin` enum('L','P') NOT NULL COMMENT '1:Laki-laki, 2:Perempuan',
  `jabatan` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `level` int(1) NOT NULL COMMENT '1:admin, 2:karyawan',
  `status` int(1) NOT NULL COMMENT '1: aktif, 0:tidak aktif',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table adope.user: ~0 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
REPLACE INTO `user` (`user_id`, `username`, `password`, `name`, `jeniskelamin`, `jabatan`, `email`, `address`, `level`, `status`) VALUES
	(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Armiya Noermi', 'L', 'Kepala Divisi', 'armiya@gmail.com', 'Kandangan', 1, 1),
	(6, 'admin2', '315f166c5aca63a157f7d41007675cb44a948b33', 'Natasha Aditama', 'P', 'Sekretaris Utama', 'natasha@outlook.com', 'Bogor Tengah', 1, 1),
	(7, 'karyawan', '87c78b8da768468c4f3826791496385536c11dad', 'Herdy', 'L', 'Karyawan umum', 'herdy@yahoo.com', 'Kandangan', 2, 1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
