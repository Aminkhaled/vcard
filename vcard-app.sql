-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 06 مارس 2023 الساعة 18:23
-- إصدار الخادم: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vcard-app`
--

-- --------------------------------------------------------

--
-- بنية الجدول `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `address_type` varchar(255) DEFAULT NULL,
  `address_name` varchar(255) DEFAULT NULL,
  `address_street` varchar(255) DEFAULT NULL,
  `address_extended` varchar(255) DEFAULT NULL,
  `address_city` varchar(255) DEFAULT NULL,
  `address_region` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `address_zip` varchar(255) DEFAULT NULL,
  `card_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `emails`
--

CREATE TABLE `emails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(60) DEFAULT NULL,
  `card_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `failed_jobs`
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
-- بنية الجدول `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_11_03_090109_create_vcards_table', 1),
(6, '2022_11_20_142125_create_phones_table', 1),
(7, '2022_11_21_075826_create_emails_table', 1),
(8, '2022_11_21_080458_create_websites_table', 1),
(9, '2022_11_21_131510_create_addresses_table', 1);

-- --------------------------------------------------------

--
-- بنية الجدول `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `phones`
--

CREATE TABLE `phones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(60) DEFAULT NULL,
  `card_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Khaled Khaled', 'admin@mail.com', NULL, '$2y$10$VI90UVTCZbYQOYFJCkswNOL1xg7mm2CsyTFe8qfJwbE7gRVckI.Qy', 0, NULL, '2023-02-21 16:57:54', '2023-02-21 16:57:54'),
(2, 'Khaled Khaled', 'admin@mdail.com', NULL, '$2y$10$mTwzMhhfFulc8sZ1Bqy1E.U8cWFiOSpA684Uy1gJxmyRllec/Yk2q', 0, NULL, '2023-02-21 17:00:20', '2023-02-21 17:00:20'),
(3, 'Admin', 'aminabdo8@gmail.com', '2023-02-22 19:47:00', '$2y$10$bIxYemSc24TgHBQKoDC0i.Br78egMoz/7NZ2/PvLNjjX14EevgAQi', 1, NULL, '2023-02-22 19:47:00', '2023-02-22 19:47:00'),
(4, 'Khaled Khaled', 'amenkhaled@admin.com', NULL, '$2y$10$o1yXbS/7WS1s.C9SBfezKOz4hazH.ggt4gKnMfQfOzJ5IuNAVAzri', 0, NULL, '2023-02-22 20:18:58', '2023-02-22 20:18:58');

-- --------------------------------------------------------

--
-- بنية الجدول `vcards`
--

CREATE TABLE `vcards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cardName` varchar(255) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) NOT NULL DEFAULT 'avatar.jpg',
  `logo` varchar(255) NOT NULL DEFAULT 'avatar.jpg',
  `birthday` date DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `organisationName` varchar(255) DEFAULT NULL,
  `positionTitle` varchar(255) DEFAULT NULL,
  `notes` varchar(500) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `vcards`
--

INSERT INTO `vcards` (`id`, `cardName`, `fname`, `lname`, `avatar`, `logo`, `birthday`, `title`, `organisationName`, `positionTitle`, `notes`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'pUXsC', 'Khaled', 'Amen', 'avatar.png', 'avatar.png', NULL, 'Graphic Designer', '2creativeagency', NULL, NULL, 2, '2023-02-21 17:00:20', '2023-02-21 17:00:20'),
(3, 'pUxRy', 'Khaled', 'samah', 'avatar.png', 'avatar.png', '2023-02-18', 'manager', '2creativeagency', 'web developer', 'we are jere sakjfhdjfkhwjke', 4, '2023-02-22 20:18:58', '2023-02-22 20:18:58');

-- --------------------------------------------------------

--
-- بنية الجدول `websites`
--

CREATE TABLE `websites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(200) DEFAULT NULL,
  `card_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_card_id_foreign` (`card_id`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emails_card_id_foreign` (`card_id`);

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
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `phones`
--
ALTER TABLE `phones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phones_card_id_foreign` (`card_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vcards`
--
ALTER TABLE `vcards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vcards_user_id_foreign` (`user_id`);

--
-- Indexes for table `websites`
--
ALTER TABLE `websites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `websites_card_id_foreign` (`card_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phones`
--
ALTER TABLE `phones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vcards`
--
ALTER TABLE `vcards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `websites`
--
ALTER TABLE `websites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- قيود الجداول المحفوظة
--

--
-- القيود للجدول `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_card_id_foreign` FOREIGN KEY (`card_id`) REFERENCES `vcards` (`id`) ON DELETE CASCADE;

--
-- القيود للجدول `emails`
--
ALTER TABLE `emails`
  ADD CONSTRAINT `emails_card_id_foreign` FOREIGN KEY (`card_id`) REFERENCES `vcards` (`id`) ON DELETE CASCADE;

--
-- القيود للجدول `phones`
--
ALTER TABLE `phones`
  ADD CONSTRAINT `phones_card_id_foreign` FOREIGN KEY (`card_id`) REFERENCES `vcards` (`id`) ON DELETE CASCADE;

--
-- القيود للجدول `vcards`
--
ALTER TABLE `vcards`
  ADD CONSTRAINT `vcards_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- القيود للجدول `websites`
--
ALTER TABLE `websites`
  ADD CONSTRAINT `websites_card_id_foreign` FOREIGN KEY (`card_id`) REFERENCES `vcards` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
