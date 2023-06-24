-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.27-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table loker.category
CREATE TABLE IF NOT EXISTS `category` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cat_nm` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table loker.category: ~13 rows (approximately)
INSERT INTO `category` (`id`, `cat_nm`, `created_at`, `updated_at`) VALUES
	(1, 'Akuntansi / Keuangan', '2023-05-17 20:41:18', '2023-05-17 21:22:35'),
	(2, 'Administrasi / Personalia', '2023-05-17 21:23:14', '2023-05-17 22:00:49'),
	(3, 'Seni / Media / Komunikasi', '2023-05-17 21:23:50', '2023-05-17 21:23:50'),
	(4, 'Bangunan / Konstruksi', '2023-05-17 21:24:04', '2023-05-17 21:24:04'),
	(5, 'Komputer / IT', '2023-05-17 21:24:18', '2023-05-17 21:24:18'),
	(6, 'Pendidikan / Pelatihan', '2023-05-17 21:24:33', '2023-05-17 21:24:33'),
	(7, 'Teknik', '2023-05-17 21:24:46', '2023-05-17 21:24:46'),
	(8, 'Kesehatan', '2023-05-17 21:24:56', '2023-05-17 21:24:56'),
	(9, 'Hotel / Restoran', '2023-05-17 21:25:09', '2023-05-17 21:25:09'),
	(10, 'Manufaktur', '2023-05-17 21:25:20', '2023-05-17 21:25:20'),
	(11, 'Penjualan / Marketing', '2023-05-17 21:25:36', '2023-05-17 21:25:36'),
	(12, 'Ilmu Pengetahuan', '2023-05-17 21:25:48', '2023-05-17 21:25:48'),
	(13, 'Pelayanan', '2023-05-17 21:25:58', '2023-05-17 21:25:58');

-- Dumping structure for table loker.datauser
CREATE TABLE IF NOT EXISTS `datauser` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table loker.datauser: ~2 rows (approximately)
INSERT INTO `datauser` (`id`, `nama`, `email`, `password`, `created_at`, `updated_at`) VALUES
	(1, 'Felix', 'felix@gmail.com', '12345678', '2023-05-18 00:04:09', '2023-05-18 00:04:09'),
	(2, 'qwert', 'qwert@gmail.com', '12345678', '2023-05-18 00:07:41', '2023-05-18 00:07:41');

-- Dumping structure for table loker.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table loker.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table loker.lowongan
CREATE TABLE IF NOT EXISTS `lowongan` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_cat` int(11) NOT NULL,
  `nama_low` varchar(100) NOT NULL,
  `perusahaan_low` varchar(100) NOT NULL,
  `alamat_low` varchar(100) NOT NULL,
  `desc_low` varchar(100) NOT NULL,
  `kriteria_low` varchar(100) NOT NULL,
  `foto` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table loker.lowongan: ~2 rows (approximately)
INSERT INTO `lowongan` (`id`, `id_cat`, `nama_low`, `perusahaan_low`, `alamat_low`, `desc_low`, `kriteria_low`, `foto`, `created_at`, `updated_at`) VALUES
	(1, 1, 'akutansi', 'test', 'test', 'test', 'test', 'uploads/ftloker/1684813422.jpg', '2023-05-22 20:43:42', '2023-05-22 20:43:42'),
	(2, 13, 'pelayanan', 'test', 'test', 'test', 'test', 'uploads/ftloker/1684816651.jpg', '2023-05-22 21:37:31', '2023-05-22 21:37:31');

-- Dumping structure for table loker.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table loker.migrations: ~7 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2023_05_18_030708_create_category', 1),
	(6, '2023_05_18_064329_create_datauser', 2),
	(7, '2023_05_19_024656_create_lowongan', 3);

-- Dumping structure for table loker.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table loker.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table loker.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table loker.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table loker.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table loker.users: ~3 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Felix', 'felix@gmail.com', NULL, '$2y$10$nqZclbwnP5gQLfedhgNLlekY.Jb6PLvIcOJvb8Vi5t46lXZpqv9pO', NULL, '2023-05-18 00:22:36', '2023-05-18 00:22:36'),
	(2, 'Test', 'test@gmail.com', NULL, '$2y$10$owxRvQ7FHdTcjvu68KmM1uZ9cUaGwDBOOK8hWxOvAJvD6ZYDUPK6y', NULL, '2023-05-19 23:27:04', '2023-05-19 23:27:04'),
	(3, 'user', 'user@gmail.com', NULL, '$2y$10$eQsn.wEURmWoqWi04T/jJO2BpsZ5/ZXrDIv4fVTljg.7cCrJnPnfe', NULL, '2023-05-19 23:38:10', '2023-05-19 23:38:10');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
