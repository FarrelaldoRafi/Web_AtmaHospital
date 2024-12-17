-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 18, 2024 at 06:17 AM
-- Server version: 8.0.40-cll-lve
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_e_10`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` bigint UNSIGNED NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `id_detailTambahPaketMCU` bigint UNSIGNED NOT NULL,
  `id_paketMCU` bigint UNSIGNED NOT NULL,
  `id_layanan` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detailtambahpaketmcu`
--

INSERT INTO `detailtambahpaketmcu` (`id_detailTambahPaketMCU`, `id_paketMCU`, `id_layanan`, `created_at`, `updated_at`) VALUES
(34, 28, 9, NULL, NULL),
(35, 29, 9, NULL, NULL),
(36, 29, 10, NULL, NULL),
(37, 30, 9, NULL, NULL),
(38, 30, 10, NULL, NULL),
(39, 30, 11, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` bigint UNSIGNED NOT NULL,
  `nama_dokter` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spesialis` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama_dokter`, `spesialis`, `no_telp`, `jam_mulai`, `jam_selesai`, `deskripsi`, `foto`, `created_at`, `updated_at`) VALUES
(3, 'dr. Narji Sandoro, Sp.PD', 'Penyakit Dalam', '08854611982', '10:00:00', '14:00:00', 'Dr. Narji Sandoro, Sp.PD, adalah dokter spesialis penyakit dalam di Atma Hospital, yang dikenal karena ketelitiannya dalam melakukan pemeriksaan mendalam untuk menentukan diagnosis yang tepat serta merancang perawatan terbaik bagi pasien. Kemampuannya dalam berkomunikasi secara efektif membuat pasien merasa nyaman dan memahami kondisi kesehatan mereka dengan baik.\r\n\r\nDr. Narji Sandoro, Sp.PD, memiliki keahlian dalam menangani berbagai penyakit kronis seperti penyakit degeneratif, metabolik, dan gangguan hormon. Ia juga berpengalaman dalam mengatasi masalah kesehatan terkait kadar kolesterol, asam urat, diabetes, gangguan tiroid, tekanan darah tinggi, serta berbagai infeksi yang menyerang sistem pencernaan, saluran kemih, hati, dan pernapasan. Selain itu, ia menangani berbagai kasus alergi yang sering terjadi pada pasien dewasa dengan pendekatan yang hati-hati dan teliti.', 'dokter_pictures/67613cdd9b18f.png', '2024-12-17 01:57:01', '2024-12-17 01:57:01'),
(4, 'dr. Surya Martono, Sp.JP', 'Jantung', '08216645190', '12:00:00', '15:00:00', 'Dr. Surya Martono, Sp.JP, adalah dokter spesialis jantung di Atma Hospital, dikenal dengan kepiawaiannya dalam mendiagnosis dan menangani berbagai penyakit jantung dan pembuluh darah. Pengalamannya yang luas mencakup penanganan hipertensi, aritmia, gangguan kolesterol, serta penyakit koroner. Dr. Surya memiliki keahlian dalam prosedur non-invasif seperti ekokardiografi dan elektrokardiografi (EKG), serta berfokus pada pencegahan dan pengelolaan penyakit jantung.\r\n\r\nDengan kemampuan berkomunikasi yang baik, Dr. Surya Martono memberikan perhatian yang mendalam kepada pasien, membantu mereka memahami kondisi jantung serta merancang perawatan yang efektif untuk meningkatkan kualitas hidup pasien.', 'dokter_pictures/67613d6988a6f.png', '2024-12-17 01:59:21', '2024-12-17 01:59:21'),
(5, 'drg. Susi Surusi, Sp.KGA', 'Gigi Anak', '085546290123', '10:00:00', '13:00:00', 'Drg. Susi Surusi, Sp.KGA, adalah dokter gigi spesialis kedokteran gigi anak di Atma Hospital. Drg. Susi dikenal karena kepiawaiannya dalam menangani berbagai masalah gigi dan mulut pada anak-anak dengan pendekatan yang lembut dan sabar. Dengan pengalaman yang mendalam, Drg. Susi mampu memberikan perawatan yang optimal bagi pasien anak, termasuk pencegahan dan penanganan gigi berlubang, gangguan pertumbuhan gigi, dan masalah ortodontik.\r\n\r\nDrg. Susi Surusi memiliki kemampuan untuk berkomunikasi dengan baik dengan anak-anak dan orang tua, menciptakan suasana yang nyaman dan penuh kepercayaan. Hal ini membantu pasien kecil merasa tenang selama proses pemeriksaan dan perawatan, serta meningkatkan pemahaman mereka mengenai pentingnya kesehatan gigi sejak dini. Drg. Susi juga aktif dalam memberikan edukasi kepada keluarga tentang kebiasaan gigi yang sehat untuk mencegah masalah gigi di masa depan.', 'dokter_pictures/67613e1062deb.png', '2024-12-17 02:02:08', '2024-12-17 02:02:08');

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `id_layanan` bigint UNSIGNED NOT NULL,
  `nama_layanan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_layanan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id_layanan`, `nama_layanan`, `jenis_layanan`, `deskripsi`, `foto`, `created_at`, `updated_at`) VALUES
(9, 'Pemeriksaan Darah', 'laboratorium', 'Laboratorium Pemeriksaan Darah di Atma Hospital menawarkan berbagai layanan tes darah untuk mendukung diagnosis dan perawatan pasien.   Layanan ini mencakup tes cek gula darah, yang digunakan untuk memantau kadar glukosa dalam tubuh, serta tes koagulasi darah, yang penting untuk mengevaluasi kemampuan pembekuan darah pasien.  Selain itu, laboratorium ini juga menyediakan berbagai tes lain yang membantu dalam mendeteksi kondisi medis seperti infeksi, anemia, gangguan fungsi hati, dan penyakit metabolik lainnya. Laboratorium Atma Hospital didukung oleh tenaga medis profesional dan teknologi terkini untuk memastikan hasil yang akurat dan cepat.', 'layanan_pictures/67613e6dd993d.png', '2024-12-17 02:03:41', '2024-12-17 02:03:41'),
(10, 'Pemeriksaan Psikologi', 'poliklinik', 'Layanan Pemeriksaan Psikologi di Poliklinik Atma Hospital menawarkan berbagai tes dan evaluasi untuk mendukung diagnosis dan pengelolaan kondisi mental pasien.  Layanan ini meliputi evaluasi klinis seperti tes psikologi untuk mengidentifikasi gangguan kecemasan, depresi, gangguan tidur, dan masalah emosional lainnya. Selain itu, pemeriksaan juga mencakup asesmen untuk gangguan kepribadian, stres, dan konseling terkait permasalahan hidup yang berdampak pada kesehatan mental.  Poliklinik ini dilayani oleh tim psikolog berpengalaman yang menggunakan metode asesmen terkini serta teknologi berbasis penelitian untuk memastikan hasil yang akurat dan penanganan yang sesuai. Fasilitas ini bertujuan memberikan layanan komprehensif dan mendukung pasien dalam pemulihan kesehatan mental dengan pendekatan yang personal dan berbasis bukti.', 'layanan_pictures/67613f2009ca9.jpeg', '2024-12-17 02:06:40', '2024-12-17 02:06:40'),
(11, 'CT-Scan', 'radiologi', 'Layanan CT-Scan di Departemen Radiologi Atma Hospital menawarkan pemeriksaan imaging berbasis teknologi canggih untuk mendukung diagnosis yang akurat dan mendalam.  Layanan ini mencakup CT-Scan kepala, abdomen, toraks, dan anggota tubuh untuk mendeteksi berbagai kondisi medis seperti tumor, cedera traumatik, infeksi, gangguan pembuluh darah, dan kelainan struktural lainnya. CT-Scan membantu memberikan gambar 3D yang detail, sehingga memudahkan identifikasi dan penilaian kondisi pasien secara lebih akurat.  Dilengkapi dengan perangkat CT-Scan berteknologi tinggi dan tenaga medis profesional yang terlatih, layanan ini bertujuan untuk memberikan hasil pemeriksaan yang cepat, akurat, dan membantu pengambilan keputusan medis yang optimal. Atma Hospital berkomitmen untuk memberikan pelayanan radiologi dengan standar kualitas tinggi dan keamanan yang terjamin.', 'layanan_pictures/67613f743252a.jpg', '2024-12-17 02:08:04', '2024-12-17 02:08:04');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
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
  `id_paketMCU` bigint UNSIGNED NOT NULL,
  `nama_paket` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `harga` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paketmedicalcheckup`
--

INSERT INTO `paketmedicalcheckup` (`id_paketMCU`, `nama_paket`, `deskripsi`, `harga`, `created_at`, `updated_at`) VALUES
(28, 'Paket Basic', 'Meliputi pemeriksaan Tes Gula Darah dan Tes Koagulasi', 200000.00, '2024-12-17 02:09:06', '2024-12-17 02:09:06'),
(29, 'Paket Standard', 'Paket Standard di Atma Hospital menawarkan pemeriksaan kesehatan komprehensif yang meliputi pemeriksaan darah untuk mengevaluasi fungsi tubuh dan mendeteksi berbagai gangguan kesehatan, seperti kadar gula darah, kolesterol, fungsi hati, dan ginjal. Selain itu, paket ini juga mencakup layanan pemeriksaan psikologi untuk menilai kesehatan mental, seperti deteksi gangguan kecemasan, depresi, dan stres, serta memberikan rekomendasi penanganan yang sesuai. Dengan kombinasi ini, pasien dapat memperoleh informasi lengkap tentang kesehatan fisik dan mental mereka.', 450000.00, '2024-12-17 02:11:06', '2024-12-17 02:11:06'),
(30, 'Paket Premium', 'Paket Premium di Atma Hospital dirancang untuk pemeriksaan kesehatan yang mendalam, meliputi pemeriksaan darah lengkap untuk mengevaluasi fungsi tubuh, seperti kadar gula darah, kolesterol, fungsi hati, dan ginjal. Paket ini juga mencakup pemeriksaan psikologi untuk menilai kondisi mental, termasuk gangguan kecemasan, depresi, dan stres, serta konsultasi dengan psikolog jika diperlukan. Selain itu, pasien akan mendapatkan layanan CT-Scan untuk gambar detail dari organ tubuh, seperti kepala, abdomen, toraks, dan anggota tubuh, membantu mendeteksi kondisi medis seperti tumor, infeksi, dan kelainan struktural. Paket Premium memberikan pemantauan kesehatan fisik dan mental secara menyeluruh untuk deteksi dini dan penanganan yang optimal.', 750000.00, '2024-12-17 02:12:30', '2024-12-17 02:12:30');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaranantrian`
--

CREATE TABLE `pendaftaranantrian` (
  `id_antrian` bigint UNSIGNED NOT NULL,
  `id_pengguna` bigint UNSIGNED NOT NULL,
  `id_dokter` bigint UNSIGNED NOT NULL,
  `tanggal_antrian` date NOT NULL,
  `namaLengkap_pasien` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin_pasien` enum('Laki-laki','Perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir_pasien` date NOT NULL,
  `email_pasien` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp_pasien` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pendaftaranantrian`
--

INSERT INTO `pendaftaranantrian` (`id_antrian`, `id_pengguna`, `id_dokter`, `tanggal_antrian`, `namaLengkap_pasien`, `jenis_kelamin_pasien`, `tanggal_lahir_pasien`, `email_pasien`, `no_telp_pasien`, `created_at`, `updated_at`) VALUES
(10, 10, 3, '2024-12-20', 'Ilham Wahyu', 'Laki-laki', '2004-05-11', 'ilhamWahyu@gmail.com', '08566452891', '2024-12-17 02:14:47', '2024-12-17 02:14:47'),
(11, 11, 3, '2024-12-27', 'Ridwan Setiawan', 'Laki-laki', '2003-10-21', 'ridwanSetiawan@gmail.com', '085647443201', '2024-12-17 02:19:53', '2024-12-17 02:19:53');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaranmedicalcheckup`
--

CREATE TABLE `pendaftaranmedicalcheckup` (
  `id_daftarMCU` bigint UNSIGNED NOT NULL,
  `id_pengguna` bigint UNSIGNED NOT NULL,
  `id_paketMCU` bigint UNSIGNED NOT NULL,
  `nama_pasien` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir_pasien` date NOT NULL,
  `no_telp_pasien` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin_pasien` enum('Laki-laki','Perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_pasien` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `riwayat_penyakit` text COLLATE utf8mb4_unicode_ci,
  `tanggal_periksa` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pendaftaranmedicalcheckup`
--

INSERT INTO `pendaftaranmedicalcheckup` (`id_daftarMCU`, `id_pengguna`, `id_paketMCU`, `nama_pasien`, `tanggal_lahir_pasien`, `no_telp_pasien`, `jenis_kelamin_pasien`, `alamat_pasien`, `riwayat_penyakit`, `tanggal_periksa`, `created_at`, `updated_at`) VALUES
(5, 10, 29, 'Ilham Wahyu', '2004-05-11', '08566452891', 'Laki-laki', 'Jl Babarsai no 57', 'Diabetes', '2024-12-25', '2024-12-17 02:16:57', '2024-12-17 02:16:57');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` bigint UNSIGNED NOT NULL,
  `nama_lengkap` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_profil` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_lengkap`, `tanggal_lahir`, `alamat`, `no_telp`, `username`, `password`, `email`, `foto_profil`, `created_at`, `updated_at`) VALUES
(10, 'Ilham Wahyu', '2004-05-11', 'Jl Babarsari no 57', '085342889712', 'ilham', '$2y$12$sVslWfDb9JHKGcgfUTBEwu2HvHaZIRxmZC.Ju7fy36d09XmJ7upMW', 'ilhamWahyu@gmail.com', 'profile_pictures/67613b9281247.jpg', '2024-12-17 01:49:41', '2024-12-17 01:51:30'),
(11, 'Ridwan Setiawan', '2003-10-21', 'Jl Letjend S Parman no 17', '088526118740', 'ridwan', '$2y$12$liqd0VaadGOoWQnJ78vIGOkWKKJcqA/anHwOsgVrjk7I7ccgokZpK', 'ridwanSetiawan@gmail.com', 'profile_pictures/default.jpg', '2024-12-17 02:18:18', '2024-12-17 02:18:18'),
(12, 'budi sibudi', '2005-05-05', 'Jalan Tambang', '081564738377', 'budi', '$2y$12$uw83SWNFnAW6nlMqamEOhOItuLdi4MA0nENF1TsYvKCRrOKjqFpKW', 'budi@gmail.com', 'profile_pictures/67619676eb21f.png', '2024-12-17 08:13:18', '2024-12-17 08:19:18');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\Pengguna', 2, 'user_token', '3f02c86dfffc438ed50e39f38a55ab8ed28b7c4744040a85b4fa842076db5e2e', '[\"*\"]', NULL, NULL, '2024-12-14 13:01:12', '2024-12-14 13:01:12'),
(2, 'App\\Models\\Admin', 1, 'admin_token', 'f7a9e0ef39d10511d3bd4617571b727b9c644e5e1f441b1435d5e1a546bf4133', '[\"*\"]', NULL, NULL, '2024-12-14 13:01:44', '2024-12-14 13:01:44'),
(3, 'App\\Models\\Pengguna', 2, 'user_token', 'e49c82ec8448d30138b68c608cc267d89018e7db56bbd94770db7fa5d72c440b', '[\"*\"]', NULL, NULL, '2024-12-14 13:02:22', '2024-12-14 13:02:22'),
(4, 'App\\Models\\Pengguna', 3, 'user_token', 'e14cded1bf5fb49856e298b61556b4cfcc71ec72d251c40385860575fa87bba2', '[\"*\"]', NULL, NULL, '2024-12-14 13:18:31', '2024-12-14 13:18:31'),
(5, 'App\\Models\\Pengguna', 4, 'user_token', '7d6246ed152b872ba04bf33f070d1399cc3f552accdaab9ed6d24c0529e013a5', '[\"*\"]', NULL, NULL, '2024-12-14 13:34:47', '2024-12-14 13:34:47'),
(6, 'App\\Models\\Pengguna', 5, 'user_token', '25a1f601f34164fb065b719dc16707c50ff2760d04220e10ca62d6747bf87e83', '[\"*\"]', NULL, NULL, '2024-12-14 13:39:14', '2024-12-14 13:39:14'),
(7, 'App\\Models\\Pengguna', 5, 'user_token', '24b1135b951437498ab9d3c0a76e2b1cdcc240f6d594545a966b70fae4a39ecd', '[\"*\"]', NULL, NULL, '2024-12-14 13:40:36', '2024-12-14 13:40:36');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('6ltVFOJX59tL3NEWQ9grbJqZ0Cvl7WZHfjF1JeZ4', NULL, '117.20.60.47', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTlpmTTNNUmcyd3U5T1VtOVJmZUIxWTlqanNScW9NZHhEUndueHBGUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHBzOi8vYXRtYWhvc3BpdGFsLmF0bWEubXkuaWQvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1734448380),
('cIoRsKnlFyvZErbP0YyBxs69yQkaAT7hJ5CSEUkb', NULL, '182.253.183.14', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidUx4T002ZzRZWHdEOXV6blJmVnpzbGhCTFZJRmJxN3lSaEF1SHJkOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHBzOi8vYXRtYWhvc3BpdGFsLmF0bWEubXkuaWQvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1734449603),
('Tx1lrHvfKdjy2PtL0enALYynhfytCXQQ55G8AyTD', NULL, '114.10.152.63', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibkJWTHFrODVGTEVvVW9CRmZ3NHljSW4zaDdudlpITmpJeEd2bndpaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHBzOi8vYXRtYWhvc3BpdGFsLmF0bWEubXkuaWQvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1734446496),
('vf3mgYUiIoVPAzAgOF11ofJNg9jqLXcZFgQsGs0F', NULL, '117.20.60.47', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.1 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRDhPU2tpaG9SM2dCbFN3dmhsM1VpOWFKWHUycDFnaFNLN1RsUmtnYyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHA6Ly9hdG1haG9zcGl0YWwuYXRtYS5teS5pZC9tZWRpY2FsY2hlY2t1cCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1734447132),
('ZU8qqobuBlfo25dPZKVymXFeBQ0I0ZUFnNyOtGLv', NULL, '114.10.151.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOElydHcyemdmTHpNbUdiS0FjOWh1eUpoRFJka3JzOENiZEdoT3d0eCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHBzOi8vYXRtYWhvc3BpdGFsLmF0bWEubXkuaWQvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1734475667);

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
  MODIFY `id_admin` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `detailtambahpaketmcu`
--
ALTER TABLE `detailtambahpaketmcu`
  MODIFY `id_detailTambahPaketMCU` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id_layanan` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `paketmedicalcheckup`
--
ALTER TABLE `paketmedicalcheckup`
  MODIFY `id_paketMCU` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `pendaftaranantrian`
--
ALTER TABLE `pendaftaranantrian`
  MODIFY `id_antrian` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pendaftaranmedicalcheckup`
--
ALTER TABLE `pendaftaranmedicalcheckup`
  MODIFY `id_daftarMCU` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
