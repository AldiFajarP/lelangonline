-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2022 at 12:18 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lelangonline`
--

-- --------------------------------------------------------

--
-- Table structure for table `databarangs`
--

CREATE TABLE `databarangs` (
  `KodeBarang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeKategori` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NamaBarang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TipeBarang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `GambarItem` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `StatusLelang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeUser` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `databarangs`
--

INSERT INTO `databarangs` (`KodeBarang`, `KodeKategori`, `NamaBarang`, `TipeBarang`, `GambarItem`, `StatusLelang`, `Status`, `KodeUser`, `created_at`, `updated_at`) VALUES
('BRG-001', 'KAT-008', 'CBR 250 RR ABS SP 2021', 'Sport', '1636784638_wp3065342.webp', '0', 'OPN', '16', '2021-11-12 23:23:58', '2021-11-12 23:23:58'),
('BRG-002', 'KAT-001', 'Ducati Panigale Superleggera V4 2021', 'Super Sport', '1642486464_rosed.jpg', '0', 'OPN', '16', '2022-01-17 23:14:24', '2022-01-17 23:14:24');

-- --------------------------------------------------------

--
-- Table structure for table `databarang_details`
--

CREATE TABLE `databarang_details` (
  `KodeBarang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KapasitasCC` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Cylinder` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ABS` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KM` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `databarang_details`
--

INSERT INTO `databarang_details` (`KodeBarang`, `KapasitasCC`, `Cylinder`, `ABS`, `KM`, `Keterangan`) VALUES
('BRG-001', '250', '2', '1', '1233', 'Hanya Sebuah CBR'),
('BRG-002', '1000', '4', '1', '5243', 'Hanya Sebuah Apartemen Berjalan');

-- --------------------------------------------------------

--
-- Table structure for table `eventlogs`
--

CREATE TABLE `eventlogs` (
  `id` bigint(20) NOT NULL,
  `KodeUser` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tanggal` date NOT NULL,
  `Jam` time NOT NULL,
  `Keterangan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tipe` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eventlogs`
--

INSERT INTO `eventlogs` (`id`, `KodeUser`, `Tanggal`, `Jam`, `Keterangan`, `Tipe`, `created_at`, `updated_at`) VALUES
(1, '16', '2021-10-04', '02:35:31', 'Tambah klasifikasi KLA-001', 'OPN', '2021-10-03 19:35:31', '2021-10-03 19:35:31'),
(2, '16', '2021-10-04', '02:35:39', 'Tambah klasifikasi KLA-002', 'OPN', '2021-10-03 19:35:39', '2021-10-03 19:35:39'),
(3, '16', '2021-10-04', '02:42:28', 'Tambah klasifikasi KLA-003', 'OPN', '2021-10-03 19:42:28', '2021-10-03 19:42:28'),
(4, '16', '2021-10-04', '02:42:33', 'Tambah klasifikasi KLA-004', 'OPN', '2021-10-03 19:42:33', '2021-10-03 19:42:33'),
(5, '16', '2021-10-04', '02:42:38', 'Tambah klasifikasi KLA-005', 'OPN', '2021-10-03 19:42:38', '2021-10-03 19:42:38'),
(6, '16', '2021-10-04', '02:42:44', 'Tambah klasifikasi KLA-006', 'OPN', '2021-10-03 19:42:44', '2021-10-03 19:42:44'),
(7, '16', '2021-10-04', '02:42:52', 'Tambah klasifikasi KLA-007', 'OPN', '2021-10-03 19:42:52', '2021-10-03 19:42:52'),
(8, '16', '2021-10-04', '02:42:57', 'Tambah klasifikasi KLA-008', 'OPN', '2021-10-03 19:42:57', '2021-10-03 19:42:57'),
(9, '16', '2021-10-06', '04:30:32', 'Tambah kategori KAT-001', 'OPN', '2021-10-05 21:30:32', '2021-10-05 21:30:32'),
(10, '16', '2021-10-06', '04:38:11', 'Tambah kategori KAT-002', 'OPN', '2021-10-05 21:38:11', '2021-10-05 21:38:11'),
(11, '16', '2021-10-06', '04:40:56', 'Tambah kategori KAT-003', 'OPN', '2021-10-05 21:40:56', '2021-10-05 21:40:56'),
(12, '16', '2021-10-06', '04:41:05', 'Tambah kategori KAT-004', 'OPN', '2021-10-05 21:41:05', '2021-10-05 21:41:05'),
(13, '16', '2021-10-06', '04:41:27', 'Tambah kategori KAT-005', 'OPN', '2021-10-05 21:41:27', '2021-10-05 21:41:27'),
(14, '16', '2021-10-06', '04:41:35', 'Tambah kategori KAT-006', 'OPN', '2021-10-05 21:41:35', '2021-10-05 21:41:35'),
(15, '16', '2021-10-06', '04:41:53', 'Tambah kategori KAT-007', 'OPN', '2021-10-05 21:41:53', '2021-10-05 21:41:53'),
(16, '16', '2021-10-06', '04:45:03', 'Update klasifikasi KLA-002', 'OPN', '2021-10-05 21:45:03', '2021-10-05 21:45:03'),
(17, '16', '2021-10-06', '04:45:09', 'Update klasifikasi KLA-002', 'OPN', '2021-10-05 21:45:09', '2021-10-05 21:45:09'),
(18, '16', '2021-10-06', '04:49:21', 'Update kategori ', 'OPN', '2021-10-05 21:49:21', '2021-10-05 21:49:21'),
(19, '16', '2021-10-06', '04:49:28', 'Update kategori ', 'OPN', '2021-10-05 21:49:28', '2021-10-05 21:49:28'),
(20, '16', '2021-10-08', '11:40:36', 'Tambah klasifikasi KLA-009', 'OPN', '2021-10-08 04:40:36', '2021-10-08 04:40:36'),
(21, '16', '2021-10-08', '12:03:14', 'Tambah kategori KAT-008', 'OPN', '2021-10-08 05:03:14', '2021-10-08 05:03:14'),
(22, '16', '2021-10-08', '12:03:21', 'Tambah kategori KAT-009', 'OPN', '2021-10-08 05:03:21', '2021-10-08 05:03:21'),
(23, '16', '2021-10-08', '12:03:27', 'Tambah kategori KAT-010', 'OPN', '2021-10-08 05:03:27', '2021-10-08 05:03:27'),
(24, '16', '2021-10-08', '13:45:43', 'Tambah data barang BRG-001', 'OPN', '2021-10-08 06:45:43', '2021-10-08 06:45:43'),
(25, '16', '2021-10-08', '14:05:35', 'Tambah data barang BRG-002', 'OPN', '2021-10-08 07:05:35', '2021-10-08 07:05:35'),
(26, '16', '2021-10-20', '11:40:52', 'Tambah data barang BRG-003', 'OPN', '2021-10-20 04:40:52', '2021-10-20 04:40:52'),
(27, '16', '2021-10-21', '05:17:13', 'Tambah lelang LNG-001', 'OPN', '2021-10-20 22:17:13', '2021-10-20 22:17:13'),
(28, '16', '2021-10-21', '06:10:03', 'Tambah lelang LNG-002', 'OPN', '2021-10-20 23:10:03', '2021-10-20 23:10:03'),
(29, '16', '2021-10-28', '06:00:14', 'Tambah data barang BRG-004', 'OPN', '2021-10-27 23:00:14', '2021-10-27 23:00:14'),
(30, '16', '2021-11-13', '06:18:09', 'Tambah data barang BRG-001', 'OPN', '2021-11-12 23:18:09', '2021-11-12 23:18:09'),
(31, '16', '2021-11-13', '06:22:10', 'Update data barang BRG-001', 'OPN', '2021-11-12 23:22:10', '2021-11-12 23:22:10'),
(32, '16', '2021-11-13', '06:23:27', 'Tambah data barang BRG-001', 'OPN', '2021-11-12 23:23:27', '2021-11-12 23:23:27'),
(33, '16', '2021-11-13', '06:23:40', 'Update data barang BRG-001', 'OPN', '2021-11-12 23:23:40', '2021-11-12 23:23:40'),
(34, '16', '2021-11-13', '06:23:58', 'Update data barang BRG-001', 'OPN', '2021-11-12 23:23:58', '2021-11-12 23:23:58'),
(35, '16', '2021-11-13', '11:19:15', 'Tambah kategori KAT-011', 'OPN', '2021-11-13 04:19:15', '2021-11-13 04:19:15'),
(36, '16', '2022-01-18', '06:14:24', 'Tambah data barang BRG-002', 'OPN', '2022-01-17 23:14:24', '2022-01-17 23:14:24');

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
-- Table structure for table `lelangs`
--

CREATE TABLE `lelangs` (
  `KodeLelang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeBarang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TanggalMulai` date DEFAULT NULL,
  `JamMulai` time DEFAULT NULL,
  `TanggalPenutupan` date DEFAULT NULL,
  `JamPenutupan` time DEFAULT NULL,
  `OpenBid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `BuyItNow` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeUser` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lelang_kelipatans`
--

CREATE TABLE `lelang_kelipatans` (
  `KodeLelang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Kelipatan1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Kelipatan2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Kelipatan3` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Kelipatan4` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeUser` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `masterkategoris`
--

CREATE TABLE `masterkategoris` (
  `KodeKlasifikasi` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeKategori` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `NamaKategori` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeUser` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `masterkategoris`
--

INSERT INTO `masterkategoris` (`KodeKlasifikasi`, `KodeKategori`, `NamaKategori`, `Status`, `KodeUser`, `created_at`, `updated_at`) VALUES
('KLA-001', 'KAT-001', 'Panigale V4', 'OPN', '16', '2021-10-05 21:30:32', '2021-10-05 21:49:28'),
('KLA-001', 'KAT-002', 'Monster', 'OPN', '16', '2021-10-05 21:38:11', '2021-10-05 21:38:11'),
('KLA-001', 'KAT-003', 'MultiStrada', 'OPN', '16', '2021-10-05 21:40:56', '2021-10-05 21:40:56'),
('KLA-001', 'KAT-004', 'Panigale', 'OPN', '16', '2021-10-05 21:41:05', '2021-10-05 21:41:05'),
('KLA-001', 'KAT-005', 'Diavel', 'OPN', '16', '2021-10-05 21:41:27', '2021-10-05 21:41:27'),
('KLA-001', 'KAT-006', 'XDiavel', 'OPN', '16', '2021-10-05 21:41:35', '2021-10-05 21:41:35'),
('KLA-001', 'KAT-007', 'Scrambler', 'OPN', '16', '2021-10-05 21:41:53', '2021-10-05 21:41:53'),
('KLA-002', 'KAT-008', 'CBR', 'OPN', '16', '2021-10-08 05:03:14', '2021-10-08 05:03:14'),
('KLA-002', 'KAT-009', 'CB', 'OPN', '16', '2021-10-08 05:03:21', '2021-10-08 05:03:21'),
('KLA-002', 'KAT-010', 'CRF', 'OPN', '16', '2021-10-08 05:03:27', '2021-10-08 05:03:27'),
('KLA-004', 'KAT-011', 'ZX', 'OPN', '16', '2021-11-13 04:19:15', '2021-11-13 04:19:15');

-- --------------------------------------------------------

--
-- Table structure for table `masterklasifikasis`
--

CREATE TABLE `masterklasifikasis` (
  `KodeKlasifikasi` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `NamaKlasifikasi` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeUser` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `masterklasifikasis`
--

INSERT INTO `masterklasifikasis` (`KodeKlasifikasi`, `NamaKlasifikasi`, `Status`, `KodeUser`, `created_at`, `updated_at`) VALUES
('KLA-001', 'Ducati', 'OPN', '16', '2021-10-03 19:35:31', '2021-10-03 19:35:31'),
('KLA-002', 'Honda', 'OPN', '16', '2021-10-03 19:35:39', '2021-10-05 21:45:09'),
('KLA-003', 'MV - Agusta', 'OPN', '16', '2021-10-03 19:42:28', '2021-10-03 19:42:28'),
('KLA-004', 'Kawasaki', 'OPN', '16', '2021-10-03 19:42:33', '2021-10-03 19:42:33'),
('KLA-005', 'Yamaha', 'OPN', '16', '2021-10-03 19:42:38', '2021-10-03 19:42:38'),
('KLA-006', 'Triumph', 'OPN', '16', '2021-10-03 19:42:44', '2021-10-03 19:42:44'),
('KLA-007', 'Harley Davidson', 'OPN', '16', '2021-10-03 19:42:52', '2021-10-03 19:42:52'),
('KLA-008', 'Suzuki', 'OPN', '16', '2021-10-03 19:42:57', '2021-10-03 19:42:57'),
('KLA-009', 'BMW', 'OPN', '16', '2021-10-08 04:40:36', '2021-10-08 04:40:36');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'pelanggan'),
(2, 'karyawan'),
(3, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `Username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profilpicture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `roleId` bigint(20) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Username`, `email`, `email_verified_at`, `password`, `profilpicture`, `status`, `remember_token`, `created_at`, `updated_at`, `roleId`) VALUES
(14, 'pelanggan', 'pel@pel', NULL, '$2y$10$hs3A6MNxEQmk/aptME0NLuPhGyWx17QesMQU7J99qeQNJauN5sgde', NULL, 'OPN', NULL, NULL, NULL, 1),
(15, 'karyawan', 'kar@kar', NULL, '$2y$10$hs3A6MNxEQmk/aptME0NLuPhGyWx17QesMQU7J99qeQNJauN5sgde', NULL, 'OPN', NULL, NULL, NULL, 2),
(16, 'admin', 'adm@adm', NULL, '$2y$10$hs3A6MNxEQmk/aptME0NLuPhGyWx17QesMQU7J99qeQNJauN5sgde', NULL, 'OPN', NULL, NULL, NULL, 3),
(17, 'test', 'test@test', NULL, '$2y$10$a.pkHdDMBaIT9qMpm1zUwO3HvcLoMIeCGwOQnyYyekXtXba1q34pC', NULL, 'OPN', NULL, '2021-10-03 19:16:58', '2021-10-03 19:16:58', 1),
(18, 'pelanggantest', 'pelanggan@gmaaw.cs', NULL, '$2y$10$h6nuJ4YT7CxFx69EkLilPu73RzK0w988fNkgZR0hz.Fsd2SMWoVuC', NULL, 'OPN', NULL, '2021-11-13 04:00:03', '2021-11-13 04:00:03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(11) NOT NULL,
  `NamaLengkap` int(11) NOT NULL,
  `NoHP` int(11) NOT NULL,
  `FotoKTP` int(11) NOT NULL,
  `NamaBank` int(11) NOT NULL,
  `NoRekBank` int(11) NOT NULL,
  `Deposit` int(11) NOT NULL,
  `Status` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `databarangs`
--
ALTER TABLE `databarangs`
  ADD PRIMARY KEY (`KodeBarang`);

--
-- Indexes for table `databarang_details`
--
ALTER TABLE `databarang_details`
  ADD PRIMARY KEY (`KodeBarang`);

--
-- Indexes for table `eventlogs`
--
ALTER TABLE `eventlogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `lelangs`
--
ALTER TABLE `lelangs`
  ADD PRIMARY KEY (`KodeLelang`);

--
-- Indexes for table `lelang_kelipatans`
--
ALTER TABLE `lelang_kelipatans`
  ADD KEY `KodeLelang` (`KodeLelang`);

--
-- Indexes for table `masterkategoris`
--
ALTER TABLE `masterkategoris`
  ADD PRIMARY KEY (`KodeKategori`),
  ADD KEY `NamaKategori` (`NamaKategori`);

--
-- Indexes for table `masterklasifikasis`
--
ALTER TABLE `masterklasifikasis`
  ADD PRIMARY KEY (`KodeKlasifikasi`);

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
-- Indexes for table `roles`
--
ALTER TABLE `roles`
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
-- AUTO_INCREMENT for table `eventlogs`
--
ALTER TABLE `eventlogs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
