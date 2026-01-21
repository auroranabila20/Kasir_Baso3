-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2026 at 06:30 AM
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
-- Database: `baso`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategoris`
--

INSERT INTO `kategoris` (`id`, `nama_kategori`, `slug`, `deskripsi`, `created_at`, `updated_at`) VALUES
(7, 'Minuman', 'minuman', 'Ice and Hot. Minuman hangat dan juga dingin.', '2026-01-19 01:21:12', '2026-01-19 01:21:12'),
(8, 'Mie Baso', 'mie-baso', 'Mie baso biasa yang terdiri dari Mie dan juga Baso', '2026-01-19 01:21:54', '2026-01-19 01:21:54'),
(9, 'Mie Ayam', 'mie-ayam', 'Mie Ayam biasa, Mie ayam Baso.', '2026-01-19 01:22:38', '2026-01-19 01:22:38'),
(10, 'Mie Kocok', 'mie-kocok', 'Mie Kocok Baso', '2026-01-19 01:23:05', '2026-01-19 01:23:05'),
(11, 'Yamin Baso', 'yamin-baso', 'Yamin Baso Besar, Sedang, Kecil.', '2026-01-19 01:23:35', '2026-01-19 01:23:35'),
(12, 'Indomie Baso', 'indomie-baso', 'Indomie Baso Besar, Kecil, Sedang', '2026-01-19 01:24:10', '2026-01-19 01:24:10'),
(13, 'Tambahan menu', 'tambahan-menu', 'Tahu Baso, Somay Basah, Ceker', '2026-01-19 01:24:45', '2026-01-19 01:24:45');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_01_16_143758_create_kategoris_table', 2),
(5, '2026_01_17_162036_create_products_table', 3),
(6, '2026_01_19_092554_create_transaksi_table', 4),
(7, '2026_01_19_093047_create_transaksi_details_table', 5),
(8, '2026_01_19_135642_add_subtotal_to_transaksi_details_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nama_menu` varchar(255) NOT NULL,
  `sku` varchar(255) NOT NULL COMMENT 'SKU (Stock Keeping Unit)/ Kode Menu',
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `stok_minimal` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `kategori_id`, `nama_menu`, `sku`, `harga`, `stok`, `stok_minimal`, `is_active`, `created_at`, `updated_at`) VALUES
(4, 8, 'Mie Baso Cincang', 'SKU-0001', 17000, 23, 1, 1, '2026-01-19 01:25:37', '2026-01-19 10:18:29'),
(5, 8, 'Mie Baso Urat', 'SKU-0005', 17000, 20, 1, 1, '2026-01-19 01:26:03', '2026-01-19 22:03:18'),
(6, 8, 'Mie Baso Telor', 'SKU-0006', 17000, 20, 1, 1, '2026-01-19 01:26:41', '2026-01-19 22:03:22'),
(7, 8, 'Mie Baso Cincang Sedang', 'SKU-0007', 13000, 20, 1, 1, '2026-01-19 01:28:48', '2026-01-19 10:18:32'),
(8, 8, 'Mie Baso Kecil', 'SKU-0008', 15000, 20, 1, 1, '2026-01-19 01:29:19', '2026-01-19 22:03:26'),
(9, 9, 'Mie Ayam', 'SKU-0009', 12000, 20, 1, 1, '2026-01-19 01:29:45', '2026-01-19 22:03:30'),
(10, 9, 'Mie Ayam Baso Kecil', 'SKU-0010', 15000, 20, 1, 1, '2026-01-19 01:30:15', '2026-01-19 09:33:13'),
(11, 9, 'Mie Ayam Baso Sedang', 'SKU-0011', 18000, 20, 1, 1, '2026-01-19 01:35:43', '2026-01-19 01:35:43'),
(12, 9, 'Mie Ayam Baso Besar', 'SKU-0012', 24000, 20, 1, 1, '2026-01-19 01:36:19', '2026-01-19 01:36:27'),
(13, 10, 'Mie Kocok Baso Besar', 'SKU-0013', 24000, 20, 1, 1, '2026-01-19 01:37:10', '2026-01-19 01:37:10'),
(14, 10, 'Mie Kocok Baso Sedang', 'SKU-0014', 19000, 20, 1, 1, '2026-01-19 01:37:39', '2026-01-19 01:37:39'),
(15, 10, 'Mie Kocok Baso Kecil', 'SKU-0015', 15000, 20, 1, 1, '2026-01-19 01:38:14', '2026-01-19 01:38:14'),
(16, 10, 'Mie Kocok', 'SKU-0016', 13000, 20, 1, 1, '2026-01-19 01:38:53', '2026-01-19 01:38:53'),
(17, 11, 'Yamin Baso Besar', 'SKU-0017', 19000, 20, 1, 1, '2026-01-19 01:39:28', '2026-01-19 09:33:16'),
(18, 11, 'Yamin Baso Sedang', 'SKU-0018', 13000, 20, 1, 1, '2026-01-19 01:40:01', '2026-01-19 01:40:01'),
(19, 11, 'Yamin Baso Kecil', 'SKU-0019', 16000, 20, 1, 1, '2026-01-19 01:40:27', '2026-01-19 01:40:27'),
(20, 12, 'Indomie Baso Besar', 'SKU-0020', 17000, 20, 1, 1, '2026-01-19 01:41:06', '2026-01-19 01:41:06'),
(21, 12, 'Indomie Baso Sedang', 'SKU-0021', 13000, 20, 1, 1, '2026-01-19 01:41:34', '2026-01-19 01:41:34'),
(22, 12, 'Indomie Baso Kecil', 'SKU-0022', 15000, 20, 1, 1, '2026-01-19 01:41:59', '2026-01-19 05:17:41'),
(23, 13, 'Tahu Baso', 'SKU-0023', 2000, 50, 1, 1, '2026-01-19 01:42:40', '2026-01-19 01:42:40'),
(24, 13, 'Somay Basah', 'SKU-0024', 2000, 50, 1, 1, '2026-01-19 01:43:19', '2026-01-19 01:43:19'),
(25, 13, 'Ceker', 'SKU-0025', 2000, 50, 1, 1, '2026-01-19 01:43:42', '2026-01-19 01:43:42'),
(26, 7, 'Teh Manis', 'SKU-0026', 4000, 50, 1, 1, '2026-01-19 01:44:29', '2026-01-19 01:44:29'),
(27, 7, 'Es Teh', 'SKU-0027', 5000, 50, 1, 1, '2026-01-19 01:45:09', '2026-01-19 01:45:09'),
(28, 7, 'Es Jeruk', 'SKU-0028', 7000, 50, 1, 1, '2026-01-19 01:45:32', '2026-01-19 01:45:32'),
(29, 7, 'Jeruk Hangat', 'SKU-0029', 5000, 50, 1, 1, '2026-01-19 01:45:56', '2026-01-19 01:45:56'),
(30, 7, 'Pop Ice', 'SKU-0030', 4000, 50, 1, 1, '2026-01-19 01:46:22', '2026-01-19 01:46:22'),
(31, 7, 'Nutrisari', 'SKU-0031', 4000, 50, 1, 1, '2026-01-19 01:46:48', '2026-01-19 22:03:18'),
(32, 7, 'Es Campur', 'SKU-0032', 12000, 50, 1, 1, '2026-01-19 01:47:13', '2026-01-19 01:47:13'),
(33, 7, 'Jus Alpukat', 'SKU-0033', 10000, 50, 1, 1, '2026-01-19 01:47:47', '2026-01-19 10:18:32'),
(34, 7, 'Jus Mangga', 'SKU-0034', 10000, 50, 1, 1, '2026-01-19 01:48:17', '2026-01-19 01:48:17');

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
('pHs1NPyfKEh4NRwIpH0FhMfCaG0X0qgElFJQgLHF', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiZkRyUGVVT2tEWFc4OXN3VGIyN0VaZ3B5N1p2Z3VpbXFHTUlsMGY4NyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MTg6e2k6MDtzOjE4OiJhbGVydC5kZWxldGUudGl0bGUiO2k6MTtzOjE3OiJhbGVydC5kZWxldGUudGV4dCI7aToyO3M6MjM6ImFsZXJ0LmRlbGV0ZS5iYWNrZ3JvdW5kIjtpOjM7czoxODoiYWxlcnQuZGVsZXRlLndpZHRoIjtpOjQ7czoyMzoiYWxlcnQuZGVsZXRlLmhlaWdodEF1dG8iO2k6NTtzOjIwOiJhbGVydC5kZWxldGUucGFkZGluZyI7aTo2O3M6Mjg6ImFsZXJ0LmRlbGV0ZS5zaG93Q2xvc2VCdXR0b24iO2k6NztzOjMwOiJhbGVydC5kZWxldGUuY29uZmlybUJ1dHRvblRleHQiO2k6ODtzOjI5OiJhbGVydC5kZWxldGUuY2FuY2VsQnV0dG9uVGV4dCI7aTo5O3M6Mjk6ImFsZXJ0LmRlbGV0ZS50aW1lclByb2dyZXNzQmFyIjtpOjEwO3M6MjQ6ImFsZXJ0LmRlbGV0ZS5jdXN0b21DbGFzcyI7aToxMTtzOjI5OiJhbGVydC5kZWxldGUuc2hvd0NhbmNlbEJ1dHRvbiI7aToxMjtzOjMxOiJhbGVydC5kZWxldGUuY29uZmlybUJ1dHRvbkNvbG9yIjtpOjEzO3M6MTc6ImFsZXJ0LmRlbGV0ZS5pY29uIjtpOjE0O3M6MzI6ImFsZXJ0LmRlbGV0ZS5zaG93TG9hZGVyT25Db25maXJtIjtpOjE1O3M6Mjc6ImFsZXJ0LmRlbGV0ZS5hbGxvd0VzY2FwZUtleSI7aToxNjtzOjMwOiJhbGVydC5kZWxldGUuYWxsb3dPdXRzaWRlQ2xpY2siO2k6MTc7czoxMjoiYWxlcnQuZGVsZXRlIjt9czozOiJuZXciO2E6MDp7fX1zOjk6Il9wcmV2aW91cyI7YToyOntzOjM6InVybCI7czo0MjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL21hc3Rlci1kYXRhL2thdGVnb3JpIjtzOjU6InJvdXRlIjtzOjI2OiJtYXN0ZXItZGF0YS5rYXRlZ29yaS5pbmRleCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czo1OiJhbGVydCI7YTowOnt9fQ==', 1768843125),
('wCRqKGjFDNJ8cbSSyjOyFsTHdpsxHWJZj9WW6YrN', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiOXYwaFRZTDA4ZHFLQ2pxRnYzZ2d6SEluRkhwUzFPVXBNUHRVZEpOSyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MTg6e2k6MDtzOjE4OiJhbGVydC5kZWxldGUudGl0bGUiO2k6MTtzOjE3OiJhbGVydC5kZWxldGUudGV4dCI7aToyO3M6MjM6ImFsZXJ0LmRlbGV0ZS5iYWNrZ3JvdW5kIjtpOjM7czoxODoiYWxlcnQuZGVsZXRlLndpZHRoIjtpOjQ7czoyMzoiYWxlcnQuZGVsZXRlLmhlaWdodEF1dG8iO2k6NTtzOjIwOiJhbGVydC5kZWxldGUucGFkZGluZyI7aTo2O3M6Mjg6ImFsZXJ0LmRlbGV0ZS5zaG93Q2xvc2VCdXR0b24iO2k6NztzOjMwOiJhbGVydC5kZWxldGUuY29uZmlybUJ1dHRvblRleHQiO2k6ODtzOjI5OiJhbGVydC5kZWxldGUuY2FuY2VsQnV0dG9uVGV4dCI7aTo5O3M6Mjk6ImFsZXJ0LmRlbGV0ZS50aW1lclByb2dyZXNzQmFyIjtpOjEwO3M6MjQ6ImFsZXJ0LmRlbGV0ZS5jdXN0b21DbGFzcyI7aToxMTtzOjI5OiJhbGVydC5kZWxldGUuc2hvd0NhbmNlbEJ1dHRvbiI7aToxMjtzOjMxOiJhbGVydC5kZWxldGUuY29uZmlybUJ1dHRvbkNvbG9yIjtpOjEzO3M6MTc6ImFsZXJ0LmRlbGV0ZS5pY29uIjtpOjE0O3M6MzI6ImFsZXJ0LmRlbGV0ZS5zaG93TG9hZGVyT25Db25maXJtIjtpOjE1O3M6Mjc6ImFsZXJ0LmRlbGV0ZS5hbGxvd0VzY2FwZUtleSI7aToxNjtzOjMwOiJhbGVydC5kZWxldGUuYWxsb3dPdXRzaWRlQ2xpY2siO2k6MTc7czoxMjoiYWxlcnQuZGVsZXRlIjt9czozOiJuZXciO2E6MDp7fX1zOjk6Il9wcmV2aW91cyI7YToyOntzOjM6InVybCI7czo0MjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL21hc3Rlci1kYXRhL2thdGVnb3JpIjtzOjU6InJvdXRlIjtzOjI2OiJtYXN0ZXItZGF0YS5rYXRlZ29yaS5pbmRleCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czo1OiJhbGVydCI7YTowOnt9fQ==', 1768885740);

-- --------------------------------------------------------

--
-- Table structure for table `transaksis`
--

CREATE TABLE `transaksis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `kode_transaksi` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_details`
--

CREATE TABLE `transaksi_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaksi_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', '2026-01-14 21:25:45', '$2y$12$HWLUzHXiQWtC0PaV8cR1Re/H34pCzFHncvTHlqTKg8ikysPuvEE2K', 'QwbBnuftwT77gAbsqX0biS4jXedTlbcQcSdlQeKWePbF7nJMyPPr0R4iWyyR', '2026-01-14 21:25:45', '2026-01-14 21:25:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_sku_unique` (`sku`),
  ADD KEY `products_kategori_id_foreign` (`kategori_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transaksis_kode_transaksi_unique` (`kode_transaksi`),
  ADD KEY `transaksis_user_id_foreign` (`user_id`);

--
-- Indexes for table `transaksi_details`
--
ALTER TABLE `transaksi_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_details_transaksi_id_foreign` (`transaksi_id`),
  ADD KEY `transaksi_details_product_id_foreign` (`product_id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `transaksi_details`
--
ALTER TABLE `transaksi_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategoris` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD CONSTRAINT `transaksis_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `transaksi_details`
--
ALTER TABLE `transaksi_details`
  ADD CONSTRAINT `transaksi_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `transaksi_details_transaksi_id_foreign` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksis` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
