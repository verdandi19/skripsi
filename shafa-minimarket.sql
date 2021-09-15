-- Adminer 4.8.1 MySQL 5.7.33 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `confidences`;
CREATE TABLE `confidences` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
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
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `data`;
CREATE TABLE `data` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `data` (`id`, `tanggal`, `nama_produk`, `created_at`, `updated_at`) VALUES
(1,	'2021-08-25',	'Mie Sedap Kari Ayam,Indomie Goreng,Floridina,Pocari Sweat',	'2021-08-25 12:17:01',	'2021-08-27 04:56:59'),
(2,	'2021-08-26',	'Oreo Strawberry,Lays Rumput Laut,Floridina,Pocari Sweat',	'2021-08-25 06:17:29',	'2021-08-27 04:57:18'),
(3,	'2021-08-27',	'Indomie Goreng,Floridina',	'2021-08-27 04:29:39',	'2021-08-27 04:57:38');

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `hasil`;
CREATE TABLE `hasil` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tanggal_awal` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `min_support` int(11) NOT NULL,
  `min_confidence` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `hasil` (`id`, `tanggal_awal`, `tanggal_akhir`, `min_support`, `min_confidence`, `created_at`, `updated_at`) VALUES
(1,	'2021-09-01',	'2021-09-03',	10,	12,	NULL,	NULL);

DROP TABLE IF EXISTS `hasil_akhirs`;
CREATE TABLE `hasil_akhirs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_kombinasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `min_support` int(11) NOT NULL,
  `min_confidence` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `hasil_intemset1s`;
CREATE TABLE `hasil_intemset1s` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_item` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hasil` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `hasil_intemset1s_ibfk_1` FOREIGN KEY (`id`) REFERENCES `proses` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `itemset1`;
CREATE TABLE `itemset1` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `atribut` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `min_support` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `itemset1_ibfk_1` FOREIGN KEY (`id`) REFERENCES `proses` (`id`),
  CONSTRAINT `itemset1_ibfk_2` FOREIGN KEY (`id`) REFERENCES `proses` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `itemset2`;
CREATE TABLE `itemset2` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `atribut1` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `atribut2` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `jumlah` int(11) NOT NULL,
  `min_support` double NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `itemset2_ibfk_1` FOREIGN KEY (`id`) REFERENCES `proses` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `itemset3`;
CREATE TABLE `itemset3` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `atribut1` varchar(255) DEFAULT NULL,
  `atribut2` varchar(255) NOT NULL,
  `atribut3` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `min_support` double NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_resets_table',	1),
(3,	'2014_10_12_200000_add_two_factor_columns_to_users_table',	1),
(4,	'2019_08_19_000000_create_failed_jobs_table',	1),
(5,	'2019_12_14_000001_create_personal_access_tokens_table',	1),
(6,	'2020_05_21_100000_create_teams_table',	1),
(7,	'2020_05_21_200000_create_team_user_table',	1),
(8,	'2020_05_21_300000_create_team_invitations_table',	1),
(9,	'2021_08_10_122206_create_sessions_table',	1),
(10,	'2021_08_10_123202_create_data_table',	2),
(11,	'2021_08_10_123430_create_proses_table',	2),
(12,	'2021_08_10_123603_create_hasils_table',	2),
(13,	'2021_08_19_114235_create_intemset1s_table',	3),
(14,	'2021_08_19_114316_create_intemset2s_table',	3),
(15,	'2021_08_19_114350_create_hasil_intemset1s_table',	3),
(16,	'2021_08_19_114408_create_confidences_table',	3),
(17,	'2021_08_19_114424_create_hasil_akhirs_table',	3);

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `proses`;
CREATE TABLE `proses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tanggal_awal` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `min_support` int(11) NOT NULL,
  `min_confidence` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('7U5R2LJx47oa9dKttJavNaccUTNTeIfdy10wpjIM',	9,	'127.0.0.1',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36',	'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiNm1UZ3ZrbEdRS2hVTVNHazBLdzZpYzN6TzlmODdYRWphck5WWkdPbSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHA6Ly9zaGFmYS1taW5pbWFya2V0LnRlc3QvZGFzaGJvYXJkL2hhc2lscyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjA6e31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo5O3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkLi40cDMuVlF1cXUvVnFZaDB1TGc3T3U1NVpOaWkyajNYTEVPeFBzY3JVWWxBc1lmVUtUQkciO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJC4uNHAzLlZRdXF1L1ZxWWgwdUxnN091NTVaTmlpMmozWExFT3hQc2NyVVlsQXNZZlVLVEJHIjt9',	1630683692),
('IrO2LFklei9o6ijMtuZdc4xdnSX3Kwr4X2ZOsfG1',	9,	'127.0.0.1',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36',	'YTo3OntzOjY6Il90b2tlbiI7czo0MDoieXM3ZWI4eU1EQlkzMjBiREdkQjRQZkYzVHJ4Z1hCVTdZM3VkdjliRCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTA6Imh0dHA6Ly9zaGFmYS1taW5pbWFya2V0LnRlc3QvZGFzaGJvYXJkL2RhdGEvY3JlYXRlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjk7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCQuLjRwMy5WUXVxdS9WcVloMHVMZzdPdTU1Wk5paTJqM1hMRU94UHNjclVZbEFzWWZVS1RCRyI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkLi40cDMuVlF1cXUvVnFZaDB1TGc3T3U1NVpOaWkyajNYTEVPeFBzY3JVWWxBc1lmVUtUQkciO30=',	1631694524),
('JTkNORCs6MD3wxC40CzutqrE1Usja5fKlqZRy5U6',	9,	'127.0.0.1',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36',	'YTo3OntzOjY6Il90b2tlbiI7czo0MDoibEZqV0l3cXRxQklwazZLOTY1SEdKMFdkOGRNbXlQN3hqOHVsY0hrVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHA6Ly9zaGFmYS1taW5pbWFya2V0LnRlc3QvZGFzaGJvYXJkL2RhdGEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjM6InVybCI7YTowOnt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6OTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJC4uNHAzLlZRdXF1L1ZxWWgwdUxnN091NTVaTmlpMmozWExFT3hQc2NyVVlsQXNZZlVLVEJHIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCQuLjRwMy5WUXVxdS9WcVloMHVMZzdPdTU1Wk5paTJqM1hMRU94UHNjclVZbEFzWWZVS1RCRyI7fQ==',	1631531878);

DROP TABLE IF EXISTS `teams`;
CREATE TABLE `teams` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_team` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `teams_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `teams` (`id`, `user_id`, `name`, `personal_team`, `created_at`, `updated_at`) VALUES
(1,	1,	'Nurrosyid\'s Team',	1,	'2021-08-10 06:09:12',	'2021-08-10 06:09:12'),
(2,	2,	'isti\'s Team',	1,	'2021-08-21 08:06:38',	'2021-08-21 08:06:38'),
(3,	3,	'Andi\'s Team',	1,	'2021-08-22 05:24:22',	'2021-08-22 05:24:22'),
(4,	4,	'justdo\'s Team',	1,	'2021-08-22 06:22:37',	'2021-08-22 06:22:37'),
(5,	5,	'andhi\'s Team',	1,	'2021-08-22 06:36:05',	'2021-08-22 06:36:05'),
(6,	6,	'wanandi\'s Team',	1,	'2021-08-25 01:35:52',	'2021-08-25 01:35:52'),
(7,	8,	'legion\'s Team',	1,	'2021-08-27 03:25:31',	'2021-08-27 03:25:31'),
(8,	9,	'gulali\'s Team',	1,	'2021-08-27 07:24:34',	'2021-08-27 07:24:34'),
(9,	10,	'admin\'s Team',	1,	'2021-08-27 07:58:37',	'2021-08-27 07:58:37');

DROP TABLE IF EXISTS `team_invitations`;
CREATE TABLE `team_invitations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `team_id` bigint(20) unsigned NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `team_invitations_team_id_email_unique` (`team_id`,`email`),
  CONSTRAINT `team_invitations_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `team_user`;
CREATE TABLE `team_user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `team_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `team_user_team_id_user_id_unique` (`team_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) unsigned DEFAULT NULL,
  `profile_photo_path` varchar(2048) CHARACTER SET utf8mb4 DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `alamat`, `jabatan`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(9,	'gulali',	'gulali@gmail.com',	NULL,	'$2y$10$..4p3.VQuqu/VqYh0uLg7Ou55ZNii2j3XLEOxPscrUYlAsYfUKTBG',	NULL,	NULL,	NULL,	NULL,	'ADMIN',	8,	NULL,	'2021-08-27 07:24:34',	'2021-08-27 07:50:07'),
(10,	'admin',	'admin@gmail.com',	NULL,	'$2y$10$63h30LvX8APvRY200ZCkP.RwhHl3X/tT.bNJ.NgUkdWr69.pnRrhe',	NULL,	NULL,	NULL,	NULL,	'ADMIN',	9,	NULL,	'2021-08-27 07:58:37',	'2021-08-27 07:59:33');

-- 2021-09-15 08:54:11
