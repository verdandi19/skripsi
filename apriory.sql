-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2021 at 10:00 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apriory`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama`, `code`, `qty`, `created_at`, `updated_at`) VALUES
(1, 'Raja Lele', 'RL', 0, '2021-09-18 08:29:24', '2021-09-29 00:55:12'),
(2, 'Mentik Wangi', 'MW', 0, '2021-09-18 08:29:24', '2021-09-18 08:29:24'),
(3, 'Pandan Wangi', 'PW', 0, '2021-09-18 08:30:01', '2021-09-18 08:30:01'),
(4, 'Beras C45', 'BC', 0, '2021-09-18 08:30:18', '2021-09-18 08:30:18'),
(5, 'Beras Batang Lembang', 'BBL', 0, '2021-09-18 08:30:35', '2021-09-18 08:30:35'),
(6, 'Beras Setra Ramos', 'BSR', 0, '2021-09-18 08:30:51', '2021-09-18 08:30:51'),
(7, 'Beras Hitam', 'BH', 0, '2021-09-18 08:34:16', '2021-09-18 08:34:16'),
(8, 'Beras Merah', 'BM', 0, '2021-09-18 08:34:29', '2021-09-18 08:34:29'),
(10, 'Beras Jatah', 'BJ', 0, '2021-09-30 00:54:52', '2021-09-30 00:54:52');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `barang_id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` bigint(20) UNSIGNED DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `barang_id`, `transaction_id`, `qty`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 10, '2021-09-20 06:24:49', '2021-09-20 07:13:23'),
(2, 2, 1, 2, '2021-09-20 06:24:49', '2021-09-20 06:24:49'),
(3, 3, 1, 2, '2021-09-20 06:25:16', '2021-09-20 06:25:16'),
(4, 4, 1, 2, '2021-09-20 06:25:16', '2021-09-20 06:25:16'),
(5, 5, 1, 1, '2021-09-20 06:26:17', '2021-09-20 06:26:17'),
(6, 6, 1, 3, '2021-09-20 06:26:17', '2021-09-20 06:26:17'),
(7, 7, 1, 2, '2021-09-20 06:26:17', '2021-09-20 06:26:17'),
(8, 1, 2, 1, '2021-09-20 07:53:56', '2021-09-20 07:53:56'),
(9, 2, 2, 2, '2021-09-20 07:53:56', '2021-09-20 07:53:56'),
(10, 7, 2, 2, '2021-09-20 07:54:56', '2021-09-20 07:54:56'),
(14, 4, 3, 1, '2021-09-20 08:07:15', '2021-09-20 08:07:15'),
(15, 6, 3, 1, '2021-09-20 08:07:15', '2021-09-20 08:07:15'),
(16, 8, 3, 1, '2021-09-20 08:08:07', '2021-09-20 08:08:07'),
(17, 1, 4, 1, '2021-09-20 08:10:48', '2021-09-20 08:10:48'),
(18, 2, 4, 2, '2021-09-20 08:10:48', '2021-09-20 08:10:48'),
(19, 3, 4, 1, '2021-09-20 08:11:32', '2021-09-20 08:11:32'),
(20, 4, 4, 1, '2021-09-20 08:11:32', '2021-09-20 08:11:32'),
(21, 5, 4, 1, '2021-09-20 08:12:02', '2021-09-20 08:12:02'),
(22, 1, 5, 1, '2021-09-20 08:13:25', '2021-09-20 08:13:25'),
(23, 4, 5, 1, '2021-09-20 08:13:25', '2021-09-20 08:13:25'),
(24, 6, 5, 1, '2021-09-20 08:13:25', '2021-09-20 08:13:25'),
(25, 1, 6, 1, '2021-09-20 08:16:13', '2021-09-20 08:16:13'),
(26, 3, 6, 1, '2021-09-20 08:16:13', '2021-09-20 08:16:13'),
(27, 4, 6, 1, '2021-09-20 08:16:13', '2021-09-20 08:16:13'),
(28, 8, 6, 1, '2021-09-20 08:16:13', '2021-09-20 08:16:13'),
(29, 1, 7, 1, '2021-09-20 08:18:26', '2021-09-20 08:18:26'),
(30, 2, 7, 1, '2021-09-20 08:18:26', '2021-09-20 08:18:26'),
(31, 6, 7, 2, '2021-09-20 08:18:26', '2021-09-20 08:18:26'),
(32, 7, 7, 1, '2021-09-20 08:18:26', '2021-09-20 08:18:26'),
(33, 1, 8, 1, '2021-09-20 08:18:26', '2021-09-20 08:18:26'),
(34, 5, 8, 2, '2021-09-20 08:18:26', '2021-09-20 08:18:26'),
(35, 6, 8, 1, '2021-09-20 08:18:26', '2021-09-20 08:18:26'),
(36, 1, 9, 1, '2021-09-20 08:18:26', '2021-09-20 08:18:26'),
(37, 3, 9, 1, '2021-09-20 08:18:26', '2021-09-20 08:18:26'),
(38, 4, 9, 2, '2021-09-20 08:18:26', '2021-09-20 08:18:26'),
(39, 8, 9, 1, '2021-09-20 08:18:26', '2021-09-20 08:18:26'),
(40, 1, 10, 1, '2021-09-20 08:18:26', '2021-09-20 08:18:26'),
(41, 2, 10, 1, '2021-09-20 08:18:26', '2021-09-20 08:18:26'),
(42, 4, 10, 2, '2021-09-20 08:18:26', '2021-09-20 08:18:26'),
(43, 6, 10, 1, '2021-09-20 08:18:26', '2021-09-20 08:18:26'),
(44, 6, 11, 2, '2021-09-20 08:18:26', '2021-09-20 08:18:26'),
(45, 7, 11, 1, '2021-09-20 08:18:26', '2021-09-20 08:18:26'),
(46, 1, 12, 2, '2021-09-20 08:18:26', '2021-09-20 08:18:26'),
(47, 2, 12, 1, '2021-09-20 08:18:26', '2021-09-20 08:18:26'),
(48, 4, 12, 2, '2021-09-20 08:18:26', '2021-09-20 08:18:26'),
(49, 8, 12, 1, '2021-09-20 08:18:26', '2021-09-20 08:18:26'),
(50, 1, 13, 2, '2021-09-20 08:18:26', '2021-09-20 08:18:26'),
(51, 3, 13, 1, '2021-09-20 08:18:26', '2021-09-20 08:18:26'),
(52, 2, 14, 1, '2021-09-20 08:18:26', '2021-09-20 08:18:26'),
(53, 4, 14, 2, '2021-09-20 08:18:26', '2021-09-20 08:18:26'),
(54, 8, 14, 1, '2021-09-20 08:18:26', '2021-09-20 08:18:26'),
(55, 1, 15, 1, '2021-09-20 08:18:26', '2021-09-20 08:18:26'),
(56, 2, 15, 2, '2021-09-20 08:18:26', '2021-09-20 08:18:26'),
(57, 7, 15, 1, '2021-09-20 08:18:26', '2021-09-20 08:18:26'),
(61, 1, 17, 1, '2021-09-29 02:28:43', '2021-09-29 02:33:08'),
(62, 2, 18, 2, '2021-09-30 00:51:57', '2021-09-30 00:52:07'),
(63, 1, 18, 4, '2021-09-30 00:52:04', '2021-09-30 00:52:07');

-- --------------------------------------------------------

--
-- Table structure for table `confidences`
--

CREATE TABLE `confidences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kombinasi1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kombinasi2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `support_xUy` double NOT NULL,
  `confidence` double NOT NULL,
  `status` tinyint(4) NOT NULL,
  `min_support` double NOT NULL,
  `min_confidence` double NOT NULL,
  `nilai_uji_lift` double NOT NULL,
  `korelasi_rule` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `jumlah_a` int(11) NOT NULL,
  `jumlah_b` int(11) NOT NULL,
  `jumlah_ab` int(11) NOT NULL,
  `px` double NOT NULL,
  `py` double NOT NULL,
  `pxUy` double NOT NULL,
  `from_itemset` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `tanggal`, `nama_produk`, `created_at`, `updated_at`) VALUES
(1, '2021-08-25', 'Mie Sedap Kari Ayam,Indomie Goreng,Floridina,Pocari Sweat', '2021-08-25 12:17:01', '2021-08-27 04:56:59'),
(2, '2021-08-26', 'Oreo Strawberry,Lays Rumput Laut,Floridina,Pocari Sweat', '2021-08-25 06:17:29', '2021-08-27 04:57:18'),
(3, '2021-08-27', 'Indomie Goreng,Floridina', '2021-08-27 04:29:39', '2021-08-27 04:57:38');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_awal` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `min_support` int(11) NOT NULL,
  `min_confidence` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`id`, `tanggal_awal`, `tanggal_akhir`, `min_support`, `min_confidence`, `created_at`, `updated_at`) VALUES
(1, '2021-09-01', '2021-09-03', 10, 12, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hasils`
--

CREATE TABLE `hasils` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no` int(11) NOT NULL,
  `tanggal_awal` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `min_support` int(11) NOT NULL,
  `min_confidence` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hasil_akhirs`
--

CREATE TABLE `hasil_akhirs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kombinasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `min_support` int(11) NOT NULL,
  `min_confidence` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `intemset1s`
--

CREATE TABLE `intemset1s` (
  `idProses` bigint(20) UNSIGNED NOT NULL,
  `atribut` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlahItem` int(11) NOT NULL,
  `jumlahTransaksi` int(11) NOT NULL,
  `persen` double NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `minSupport` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `intemset2s`
--

CREATE TABLE `intemset2s` (
  `idProses` bigint(20) UNSIGNED NOT NULL,
  `kombinasiItem` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlahItem` int(11) NOT NULL,
  `jumlahTransaksi` int(11) NOT NULL,
  `persen` double NOT NULL,
  `hasil` double NOT NULL,
  `minSupport` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2020_05_21_100000_create_teams_table', 1),
(7, '2020_05_21_200000_create_team_user_table', 1),
(8, '2020_05_21_300000_create_team_invitations_table', 1),
(9, '2021_08_10_122206_create_sessions_table', 1),
(10, '2021_08_10_123202_create_data_table', 1),
(11, '2021_08_10_123430_create_proses_table', 1),
(12, '2021_08_10_123603_create_hasils_table', 1),
(13, '2021_08_19_114235_create_intemset1s_table', 1),
(14, '2021_08_19_114316_create_intemset2s_table', 1),
(15, '2021_08_19_114350_create_hasil_intemset1s_table', 1),
(16, '2021_08_19_114408_create_confidences_table', 1),
(17, '2021_08_19_114424_create_hasil_akhirs_table', 1),
(18, '2021_09_18_075930_add_master_barang', 2),
(21, '2021_09_18_081129_add_transaction', 3),
(22, '2021_09_18_081515_add_cart', 3),
(24, '2021_09_20_070548_add_code', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proses`
--

CREATE TABLE `proses` (
  `id_proses` bigint(20) UNSIGNED NOT NULL,
  `tanggal_awal` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `min_support` int(11) NOT NULL,
  `min_confidence` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('S4brklKdhajVXMciU05uZFSr6vcou7QqgjT0gzPD', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoicU02WEpJcXppdExWcTFnRE5lM29nU3RmeWFnYVFvOEFDQ0FBcm5saSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQvcGVyaGl0dW5nYW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjM6InVybCI7YTowOnt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJGZwYVBWVGdEVzhQbXkybkdyOXdVdE9udFRiVFI2emNwTnl1dUZYN0JVYkZNVFNuTTVhYldTIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRmcGFQVlRnRFc4UG15Mm5Hcjl3VXRPbnRUYlRSNnpjcE55dXVGWDdCVWJGTVRTbk01YWJXUyI7fQ==', 1632988768);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_team` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `user_id`, `name`, `personal_team`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin\'s Team', 1, '2021-09-18 00:34:23', '2021-09-18 00:34:23');

-- --------------------------------------------------------

--
-- Table structure for table `team_invitations`
--

CREATE TABLE `team_invitations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team_user`
--

CREATE TABLE `team_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_transaksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `no_transaksi`, `tgl_transaksi`, `created_at`, `updated_at`) VALUES
(1, 'trans1', '2021-09-20', '2021-09-20 06:15:29', '2021-09-20 06:15:29'),
(2, 'trans2', '2021-09-20', '2021-09-20 06:15:29', '2021-09-20 06:15:29'),
(3, 'trans3', '2021-09-20', '2021-09-20 06:15:29', '2021-09-20 06:15:29'),
(4, 'trans4', '2021-09-20', '2021-09-20 06:15:29', '2021-09-20 06:15:29'),
(5, 'trans5', '2021-09-20', '2021-09-20 06:15:29', '2021-09-20 06:15:29'),
(6, 'trans6', '2021-09-20', '2021-09-20 06:15:29', '2021-09-20 06:15:29'),
(7, 'trans7', '2021-09-20', '2021-09-20 06:15:29', '2021-09-20 06:15:29'),
(8, 'trans8', '2021-09-20', '2021-09-20 06:15:29', '2021-09-20 06:15:29'),
(9, 'trans9', '2021-09-20', '2021-09-20 06:15:29', '2021-09-20 06:15:29'),
(10, 'trans10', '2021-09-20', '2021-09-20 06:15:29', '2021-09-20 06:15:29'),
(11, 'trans11', '2021-09-20', '2021-09-20 06:15:29', '2021-09-20 06:15:29'),
(12, 'trans12', '2021-09-20', '2021-09-20 06:15:29', '2021-09-20 06:15:29'),
(13, 'trans13', '2021-09-20', '2021-09-20 06:15:29', '2021-09-20 06:15:29'),
(14, 'trans14', '2021-09-20', '2021-09-20 06:15:29', '2021-09-20 06:15:29'),
(15, 'trans15', '2021-09-20', '2021-09-20 06:15:29', '2021-09-20 06:15:29'),
(17, 'trans 16', '2021-09-30', '2021-09-29 02:33:08', '2021-09-29 02:33:08'),
(18, 'Transaksi 17', '2021-09-30', '2021-09-30 00:52:07', '2021-09-30 00:52:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `alamat`, `jabatan`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$fpaPVTgDW8Pmy2nGr9wUtOntTbTR6zcpNyuuFX7BUbFMTSnM5abWS', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2021-09-18 00:34:23', '2021-09-18 00:38:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `barang_code_unique` (`code`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_barang_id_foreign` (`barang_id`),
  ADD KEY `cart_transaction_id_foreign` (`transaction_id`);

--
-- Indexes for table `confidences`
--
ALTER TABLE `confidences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hasils`
--
ALTER TABLE `hasils`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hasil_akhirs`
--
ALTER TABLE `hasil_akhirs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `intemset1s`
--
ALTER TABLE `intemset1s`
  ADD PRIMARY KEY (`idProses`);

--
-- Indexes for table `intemset2s`
--
ALTER TABLE `intemset2s`
  ADD PRIMARY KEY (`idProses`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `proses`
--
ALTER TABLE `proses`
  ADD PRIMARY KEY (`id_proses`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams_user_id_index` (`user_id`);

--
-- Indexes for table `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_invitations_team_id_email_unique` (`team_id`,`email`);

--
-- Indexes for table `team_user`
--
ALTER TABLE `team_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_user_team_id_user_id_unique` (`team_id`,`user_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `confidences`
--
ALTER TABLE `confidences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hasils`
--
ALTER TABLE `hasils`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hasil_akhirs`
--
ALTER TABLE `hasil_akhirs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `intemset1s`
--
ALTER TABLE `intemset1s`
  MODIFY `idProses` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `intemset2s`
--
ALTER TABLE `intemset2s`
  MODIFY `idProses` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proses`
--
ALTER TABLE `proses`
  MODIFY `id_proses` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `team_invitations`
--
ALTER TABLE `team_invitations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team_user`
--
ALTER TABLE `team_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`),
  ADD CONSTRAINT `cart_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`id`);

--
-- Constraints for table `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD CONSTRAINT `team_invitations_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
