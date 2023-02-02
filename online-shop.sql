-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2023 at 04:21 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online-shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`) VALUES
(1, 'Clothes', 'categories/Dygr8HBxQv0blcCVlZOqdDsHBven1up3yTc9gr5m.jpg'),
(2, 'Photography', 'categories/llYOzqB8kW9gtvNvr44tiiAwSNTiVdA4X9QJn0P1.jpg'),
(3, 'Shoes', 'categories/VdtRHjQPcneIwrnKVpZiC9iWKvmGSKR5cZchowW6.jpg'),
(4, 'Cosmetics', 'categories/wIePCzFclfNHjOMlbvy79ZGLor7vMm6uV2QJkhb5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`) VALUES
(1, 'Black'),
(2, 'Blue'),
(3, 'Red'),
(5, 'White'),
(6, 'Green');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_01_15_162821_categories', 2),
(6, '2023_01_15_170342_add_fields_to_categories', 3),
(7, '2023_01_17_142656_create_product_table', 4),
(8, '2023_01_18_213139_add_fields_to_products', 5),
(9, '2023_01_18_230945_create_size_table', 6),
(10, '2023_01_18_231209_create_color_table', 6),
(12, '2023_01_20_180905_add_fields_to_users', 7),
(13, '2023_01_21_212428_add_fields_to_products', 8),
(14, '2023_01_22_001340_add_references_to_products_table', 9),
(15, '2023_01_22_002437_remove_columns_from_products', 10),
(16, '2023_01_27_222655_add_fields_to_users', 11),
(17, '2023_02_02_010041_create_order_table', 12),
(18, '2023_02_02_011015_add_fields_to_order_table', 13),
(19, '2023_02_02_121007_add_fields_to_order_table', 14);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `rating` double(8,2) NOT NULL,
  `rating_count` int(11) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `discount` double(8,2) NOT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT 1,
  `is_recent` tinyint(1) NOT NULL DEFAULT 1,
  `color_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `size_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `rating`, `rating_count`, `image`, `category_id`, `price`, `created_at`, `updated_at`, `discount`, `is_featured`, `is_recent`, `color_id`, `size_id`) VALUES
(1, 'Product 1', 'this is a good product this is a good product this is a good product this is a good product this is a good product', 4.00, 26, 'products/VGd6XBxo4py8ksrhQc0RekP01WKXDMIm1jVgOH9c.jpg', 1, 100.00, '2023-01-18 14:31:46', '2023-01-19 12:56:32', 0.00, 1, 1, 1, 1),
(2, 'Product 2', 'this is a good product this is a good product this is a good product this is a good product this is a good product', 4.50, 17, 'products/lpsswN4COPFviWtsxiJRKB2UtB0XzYtD2aQNysjq.jpg', 2, 150.00, '2023-01-18 14:31:50', '2023-01-19 12:57:32', 0.00, 1, 1, 2, 2),
(4, 'Product 4', 'goooooooooooood', 3.00, 22, 'products/v782ebA696TbOfSsksB1YvIgNAZ5h5zqLSVCeUkE.jpg', 4, 250.00, '2023-01-18 21:48:13', '2023-01-19 12:58:53', 0.20, 1, 1, 5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `name`) VALUES
(1, 'XS'),
(2, 'S'),
(3, 'M'),
(4, 'L'),
(5, 'XL');

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `api_token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `is_admin`, `api_token`) VALUES
(1, 'Abdelrahman', 'fayed@hotmail.com', NULL, '$2y$10$.bsl8xMNmPyAU7v.ZsmSTuA9nW7PLG1SWKY3pKhZZHWN9lCbSeSom', NULL, '2023-02-02 12:56:00', '2023-02-02 13:01:56', 1, '0veEblWHdOo5X1tNo2SgxylV7VIIMbMRSkUD7AAGtG3G6wwSXT3vBamm0YxmRx2GnOjAx0VvPDlOpsAqwdQuSr0vTKANcLhXckGP'),
(2, 'Abdelrahman', 'abdo@hotmail.com', NULL, '$2y$10$on2MVCWZhXxNJZAiCbUBIeoP/a6bskJITW1KVxjXO6/vqDkb.4bde', NULL, '2023-01-31 14:46:02', '2023-02-02 13:06:52', 0, 'ZHUs6WMdQ6lfhbPvsEkPG4wgyGj2eHyeTjMgPuOh5WOoYlzVSHPvs9pgdXtLhd1lsxl55k4Fb3EyOcvY5lKM5NxTWHqkydlxT1jm'),
(7, 'mohamed', 'mohamed@hotmail.com', NULL, '$2y$10$0k3.OBl55seYCuy.xopwEuz5.o5Jg93EBBzXjCSwKEUORWQpWTPKi', NULL, '2023-02-02 13:16:09', '2023-02-02 13:17:54', 0, 'aEUupdDY6TW5gQyzaNZq3XyYXF3REYYdcaGk4fVS2Xt6HoZwn7YIbkEwbza7N9ja8idHA9lF129NyoF3XPUtlib8SoaPsH9J74nG'),
(8, 'Ahmed', 'ahmed@hotmail.com', NULL, '$2y$10$DDO6Oduxo8ismGrFjdSgeuewBnTj0r5ILm.Dgd7W0gVb0CdL1D9y6', NULL, '2023-02-02 13:18:29', '2023-02-02 13:19:23', 1, '7yaOpFWOggaafTgTaDGzozFh7V6IWQgsReeCPcdVJw8jCsyydGmvlHovG4MIJz011ojpXjKqTIkviWL6w7jNuDKouyCuQv8b0kKp');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_category_id_foreign` (`category_id`),
  ADD KEY `products_color_id_foreign` (`color_id`),
  ADD KEY `products_size_id_foreign` (`size_id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `product_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`),
  ADD CONSTRAINT `products_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
