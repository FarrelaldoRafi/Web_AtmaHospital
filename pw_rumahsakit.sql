-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2024 at 11:46 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pw_rumahsakit`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin_layanan', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detailtambahpaketmcu`
--

CREATE TABLE `detailtambahpaketmcu` (
  `id_detailTambahPaketMCU` bigint(20) UNSIGNED NOT NULL,
  `id_paketMCU` bigint(20) UNSIGNED NOT NULL,
  `id_layanan` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detailtambahpaketmcu`
--

INSERT INTO `detailtambahpaketmcu` (`id_detailTambahPaketMCU`, `id_paketMCU`, `id_layanan`, `created_at`, `updated_at`) VALUES
(28, 25, 7, NULL, NULL),
(31, 26, 7, NULL, NULL),
(32, 24, 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` bigint(20) UNSIGNED NOT NULL,
  `nama_dokter` varchar(100) NOT NULL,
  `spesialis` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama_dokter`, `spesialis`, `no_telp`, `jam_mulai`, `jam_selesai`, `deskripsi`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'tes1', 'Jantung', '082345678901', '12:42:00', '15:48:00', 'tess', 'dokter_pictures/675e5be5070cf.jpg', '2024-12-14 19:42:44', '2024-12-17 01:24:53');

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `id_layanan` bigint(20) UNSIGNED NOT NULL,
  `nama_layanan` varchar(100) NOT NULL,
  `jenis_layanan` varchar(50) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id_layanan`, `nama_layanan`, `jenis_layanan`, `deskripsi`, `foto`, `created_at`, `updated_at`) VALUES
(7, 'CT-SCAN', 'radiologi', 'CT-SCAN Radiologi', 'layanan_pictures/675e55f9af356.jpg', '2024-12-14 21:07:21', '2024-12-14 21:07:21');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(21, '2024_11_28_030706_create_sessions_table', 1),
(22, '2024_11_28_044906_create_personal_access_tokens_table', 1),
(23, '2024_11_28_050828_admin', 1),
(24, '2024_11_28_051123_pengguna', 1),
(25, '2024_11_28_051228_dokter', 1),
(26, '2024_11_28_051308_layanan', 1),
(27, '2024_11_28_051334_paketmcu', 1),
(28, '2024_11_28_051412_pendaftaranantrian', 1),
(29, '2024_11_28_051444_pendaftaranmcu', 1),
(30, '2024_11_28_051831_detailtambahpaketmcu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `paketmedicalcheckup`
--

CREATE TABLE `paketmedicalcheckup` (
  `id_paketMCU` bigint(20) UNSIGNED NOT NULL,
  `nama_paket` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `harga` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paketmedicalcheckup`
--

INSERT INTO `paketmedicalcheckup` (`id_paketMCU`, `nama_paket`, `deskripsi`, `harga`, `created_at`, `updated_at`) VALUES
(24, 'Paket Biasa', 'Paket Biasa', 1000000.00, '2024-12-14 21:15:05', '2024-12-14 21:15:05'),
(25, 'Paket Standar', 'Paket Standar', 2000000.00, '2024-12-14 21:15:45', '2024-12-14 21:15:45'),
(26, 'Paket Komplit', 'Paker Komplit', 3500000.00, '2024-12-14 21:16:23', '2024-12-14 21:16:23');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaranantrian`
--

CREATE TABLE `pendaftaranantrian` (
  `id_antrian` bigint(20) UNSIGNED NOT NULL,
  `id_pengguna` bigint(20) UNSIGNED NOT NULL,
  `id_dokter` bigint(20) UNSIGNED NOT NULL,
  `tanggal_antrian` date NOT NULL,
  `namaLengkap_pasien` varchar(100) NOT NULL,
  `jenis_kelamin_pasien` enum('Laki-laki','Perempuan') NOT NULL,
  `tanggal_lahir_pasien` date NOT NULL,
  `email_pasien` varchar(100) NOT NULL,
  `no_telp_pasien` varchar(15) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pendaftaranantrian`
--

INSERT INTO `pendaftaranantrian` (`id_antrian`, `id_pengguna`, `id_dokter`, `tanggal_antrian`, `namaLengkap_pasien`, `jenis_kelamin_pasien`, `tanggal_lahir_pasien`, `email_pasien`, `no_telp_pasien`, `created_at`, `updated_at`) VALUES
(1, 5, 1, '2024-12-26', 'tes', 'Laki-laki', '2024-12-01', 'tess@gmail.com', '321321321321', '2024-12-14 22:15:01', '2024-12-14 22:15:01');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaranmedicalcheckup`
--

CREATE TABLE `pendaftaranmedicalcheckup` (
  `id_daftarMCU` bigint(20) UNSIGNED NOT NULL,
  `id_pengguna` bigint(20) UNSIGNED NOT NULL,
  `id_paketMCU` bigint(20) UNSIGNED NOT NULL,
  `nama_pasien` varchar(100) NOT NULL,
  `tanggal_lahir_pasien` date NOT NULL,
  `no_telp_pasien` varchar(15) NOT NULL,
  `jenis_kelamin_pasien` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat_pasien` text NOT NULL,
  `riwayat_penyakit` text DEFAULT NULL,
  `tanggal_periksa` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pendaftaranmedicalcheckup`
--

INSERT INTO `pendaftaranmedicalcheckup` (`id_daftarMCU`, `id_pengguna`, `id_paketMCU`, `nama_pasien`, `tanggal_lahir_pasien`, `no_telp_pasien`, `jenis_kelamin_pasien`, `alamat_pasien`, `riwayat_penyakit`, `tanggal_periksa`, `created_at`, `updated_at`) VALUES
(1, 5, 25, 'abcd', '2024-12-03', '2123213122', 'Laki-laki', 'sadsadsaf', 'sadfsafsaf', '2024-12-20', '2024-12-15 20:19:04', '2024-12-15 20:19:04');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` bigint(20) UNSIGNED NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `foto_profil` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_lengkap`, `tanggal_lahir`, `alamat`, `no_telp`, `username`, `password`, `email`, `foto_profil`, `created_at`, `updated_at`) VALUES
(5, 'tes', '2024-12-06', 'sdfsda', '1234567890', 'tes', '$2y$12$bTgt68jU3xkCJH5kcshFKuytUgoGEKLlXTukxuxsTtW3A/9HkPOhu', 'tess@gmail.com', 'profile_pictures/67613668b29aa.jpg', '2024-12-14 20:37:30', '2024-12-17 01:29:28'),
(6, 'asas', '2024-12-04', 'dasdas', '1321321312321', 'sadsa', '$2y$12$9bF2D2iQUi1xpyQ6RoPiZOcIDjCVJR63GhwoUKfLqzGm7bvt99Y8y', 'abc@gmail.com', 'profile_pictures/default.jpg', '2024-12-14 20:39:03', '2024-12-14 20:39:03'),
(7, 'ddfg', '2024-12-02', 'asdsa', '1234567890', 'abc123', '$2y$12$slV1QoXuosMcZY6dORDlY.9GbvJqAzySJieJkJz5YQzwefhbFzxkS', 'user@gmail.com', 'profile_pictures/default.jpg', '2024-12-16 06:20:56', '2024-12-16 06:20:56');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\Pengguna', 2, 'user_token', '3f02c86dfffc438ed50e39f38a55ab8ed28b7c4744040a85b4fa842076db5e2e', '[\"*\"]', NULL, NULL, '2024-12-14 20:01:12', '2024-12-14 20:01:12'),
(2, 'App\\Models\\Admin', 1, 'admin_token', 'f7a9e0ef39d10511d3bd4617571b727b9c644e5e1f441b1435d5e1a546bf4133', '[\"*\"]', NULL, NULL, '2024-12-14 20:01:44', '2024-12-14 20:01:44'),
(3, 'App\\Models\\Pengguna', 2, 'user_token', 'e49c82ec8448d30138b68c608cc267d89018e7db56bbd94770db7fa5d72c440b', '[\"*\"]', NULL, NULL, '2024-12-14 20:02:22', '2024-12-14 20:02:22'),
(4, 'App\\Models\\Pengguna', 3, 'user_token', 'e14cded1bf5fb49856e298b61556b4cfcc71ec72d251c40385860575fa87bba2', '[\"*\"]', NULL, NULL, '2024-12-14 20:18:31', '2024-12-14 20:18:31'),
(5, 'App\\Models\\Pengguna', 4, 'user_token', '7d6246ed152b872ba04bf33f070d1399cc3f552accdaab9ed6d24c0529e013a5', '[\"*\"]', NULL, NULL, '2024-12-14 20:34:47', '2024-12-14 20:34:47'),
(6, 'App\\Models\\Pengguna', 5, 'user_token', '25a1f601f34164fb065b719dc16707c50ff2760d04220e10ca62d6747bf87e83', '[\"*\"]', NULL, NULL, '2024-12-14 20:39:14', '2024-12-14 20:39:14'),
(7, 'App\\Models\\Pengguna', 5, 'user_token', '24b1135b951437498ab9d3c0a76e2b1cdcc240f6d594545a966b70fae4a39ecd', '[\"*\"]', NULL, NULL, '2024-12-14 20:40:36', '2024-12-14 20:40:36');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('c2orRkHETgZtwvMlfEiFORMQKdU67U89O1q3FRMN', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibTVONGtBQjF5cmM1Q0ExOVFvWEVmdUxWRWtKUTczZG41cUYxWEFmUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi90YW1iYWhkb2t0ZXIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjQ6InVzZXIiO2E6Mzp7czoyOiJpZCI7aToxO3M6NDoibmFtZSI7czoxMzoiYWRtaW5fbGF5YW5hbiI7czo0OiJyb2xlIjtzOjU6ImFkbWluIjt9fQ==', 1734428054),
('cHFmH1tCtrjWZEOBrfbaPYQRMEFNZPxuFVsa10KL', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiY0JOMWpCVWxiVXptN2ptOW5ITEQ1Q3VhVTR2Z1dkYnZkeHJBNzlGeiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9qYWR3YWwiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1734432336),
('MZkSHyClBojJS0N0fk6aqbXFWp53wgUYaSOGWT2I', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMDNSQndXWlJzRjBXcVFGOUt6Y2hwc09LVjFsc0JuZWtobkFjbDQyZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1734424367),
('SJlhTAbciyL5KC66vQmS3HvERrJXjpbogogcp2Wb', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZXZZa2p6NE1BUXJtbWNzbmZhRmNTeTgyRkRDSkpxYVNGM3JNOFUwOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9kYXNoYWRtaW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjQ6InVzZXIiO2E6Mzp7czoyOiJpZCI7aToxO3M6NDoibmFtZSI7czoxMzoiYWRtaW5fbGF5YW5hbiI7czo0OiJyb2xlIjtzOjU6ImFkbWluIjt9fQ==', 1734359229),
('Y7oWf6B77xRnc4LY9zyglVgVHHMz5AotjFDlu2qp', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibmZ2YkVXZHA3aThvVTExYzZMc1hBc2ZxeFlVZXpEbXVOc0ZSNEZsUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9pbmZvamFuamkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjQ6InVzZXIiO2E6Njp7czoyOiJpZCI7aTo3O3M6NDoibmFtZSI7czo0OiJkZGZnIjtzOjg6InVzZXJuYW1lIjtzOjY6ImFiYzEyMyI7czo1OiJlbWFpbCI7czoxNDoidXNlckBnbWFpbC5jb20iO3M6MTU6InByb2ZpbGVfcGljdHVyZSI7czoyODoicHJvZmlsZV9waWN0dXJlcy9kZWZhdWx0LmpwZyI7czo0OiJyb2xlIjtzOjQ6InVzZXIiO319', 1734356275);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `detailtambahpaketmcu`
--
ALTER TABLE `detailtambahpaketmcu`
  ADD PRIMARY KEY (`id_detailTambahPaketMCU`),
  ADD KEY `detailtambahpaketmcu_id_paketmcu_foreign` (`id_paketMCU`),
  ADD KEY `detailtambahpaketmcu_id_layanan_foreign` (`id_layanan`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id_layanan`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paketmedicalcheckup`
--
ALTER TABLE `paketmedicalcheckup`
  ADD PRIMARY KEY (`id_paketMCU`);

--
-- Indexes for table `pendaftaranantrian`
--
ALTER TABLE `pendaftaranantrian`
  ADD PRIMARY KEY (`id_antrian`),
  ADD KEY `pendaftaranantrian_id_pengguna_foreign` (`id_pengguna`),
  ADD KEY `pendaftaranantrian_id_dokter_foreign` (`id_dokter`);

--
-- Indexes for table `pendaftaranmedicalcheckup`
--
ALTER TABLE `pendaftaranmedicalcheckup`
  ADD PRIMARY KEY (`id_daftarMCU`),
  ADD KEY `pendaftaranmedicalcheckup_id_pengguna_foreign` (`id_pengguna`),
  ADD KEY `pendaftaranmedicalcheckup_id_paketmcu_foreign` (`id_paketMCU`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD UNIQUE KEY `pengguna_username_unique` (`username`),
  ADD UNIQUE KEY `pengguna_email_unique` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `detailtambahpaketmcu`
--
ALTER TABLE `detailtambahpaketmcu`
  MODIFY `id_detailTambahPaketMCU` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id_layanan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `paketmedicalcheckup`
--
ALTER TABLE `paketmedicalcheckup`
  MODIFY `id_paketMCU` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pendaftaranantrian`
--
ALTER TABLE `pendaftaranantrian`
  MODIFY `id_antrian` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pendaftaranmedicalcheckup`
--
ALTER TABLE `pendaftaranmedicalcheckup`
  MODIFY `id_daftarMCU` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detailtambahpaketmcu`
--
ALTER TABLE `detailtambahpaketmcu`
  ADD CONSTRAINT `detailtambahpaketmcu_id_layanan_foreign` FOREIGN KEY (`id_layanan`) REFERENCES `layanan` (`id_layanan`) ON DELETE CASCADE,
  ADD CONSTRAINT `detailtambahpaketmcu_id_paketmcu_foreign` FOREIGN KEY (`id_paketMCU`) REFERENCES `paketmedicalcheckup` (`id_paketMCU`) ON DELETE CASCADE;

--
-- Constraints for table `pendaftaranantrian`
--
ALTER TABLE `pendaftaranantrian`
  ADD CONSTRAINT `pendaftaranantrian_id_dokter_foreign` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`) ON DELETE CASCADE,
  ADD CONSTRAINT `pendaftaranantrian_id_pengguna_foreign` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE;

--
-- Constraints for table `pendaftaranmedicalcheckup`
--
ALTER TABLE `pendaftaranmedicalcheckup`
  ADD CONSTRAINT `pendaftaranmedicalcheckup_id_paketmcu_foreign` FOREIGN KEY (`id_paketMCU`) REFERENCES `paketmedicalcheckup` (`id_paketMCU`) ON DELETE CASCADE,
  ADD CONSTRAINT `pendaftaranmedicalcheckup_id_pengguna_foreign` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
