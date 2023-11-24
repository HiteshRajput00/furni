-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 24, 2023 at 09:54 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `furniture`
--

-- --------------------------------------------------------

--
-- Table structure for table `billing_details`
--

CREATE TABLE `billing_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userID` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `companyname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `houseNO` varchar(255) DEFAULT NULL,
  `statecountry` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `billing_details`
--

INSERT INTO `billing_details` (`id`, `userID`, `fname`, `lname`, `companyname`, `email`, `number`, `street`, `houseNO`, `statecountry`, `zip`, `created_at`, `updated_at`) VALUES
(10, 1, 'Tom', 'John', 'tech', 'test@gmail.com', '1122334455', 'df-53', 'h-10', 'haryana', '1212AD', '2023-10-27 02:00:45', '2023-10-27 02:00:45'),
(11, 8, 'Sagar', 'Rana', 'Company1', 'sagar@gmail.com', '9899988812', 'N-212', 'h-155', 'Haryana', '132054', '2023-11-03 00:49:19', '2023-11-03 00:49:19'),
(13, 12, 'Test', 'User', 'Company2', 'test2@gmail.com', '1122334455', 'ef-22', 'hh-12', 'UP', '112121', '2023-11-03 04:52:41', '2023-11-03 04:52:41');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `sub_title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `short_description` text NOT NULL,
  `description` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `slug`, `sub_title`, `image`, `short_description`, `description`, `name`, `status`, `created_at`, `updated_at`) VALUES
(2, 'How To Keep Your Furniture Clean', 'How To Keep Your Furniture Clean', 'Your Furniture Clean', 'How To Keep Your Furniture Clean48.jpg', 'Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique.', 'If you need to customize the format of your timestamps, set the $dateFormat property on your model. This property determines how date attributes are stored in the database, as well as their format when the model is serialized to an array or JSON:', 'Robert Fox', 1, '2023-10-26 23:56:35', '2023-10-27 04:25:00');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `variationID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `userID`, `productID`, `variationID`, `quantity`, `created_at`, `updated_at`) VALUES
(111, 8, 263, 76, 1, '2023-11-06 06:28:12', '2023-11-06 06:28:12');

-- --------------------------------------------------------

--
-- Table structure for table `colours`
--

CREATE TABLE `colours` (
  `id` int(11) NOT NULL,
  `colour` varchar(255) NOT NULL,
  `colourcode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `colours`
--

INSERT INTO `colours` (`id`, `colour`, `colourcode`) VALUES
(9, 'black', '#000000'),
(10, 'red', '#f41010'),
(11, 'brown', '#b15625'),
(12, 'grey', '#d7d1d1'),
(13, 'white', '#fdfcfc'),
(14, 'green', '#4e7e5f'),
(15, 'sky blue', '#4cc7e6'),
(16, 'soft pink', '#d968bb');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `value` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `expiredate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `name`, `code`, `value`, `status`, `expiredate`, `created_at`, `updated_at`) VALUES
(2, '2% off', '1111', 3, 0, '2023-10-27 11:12:16', '2023-10-11 05:43:47', '2023-10-27 05:42:16'),
(3, '200 flat', '1@1@', 10, 0, '2023-10-27 11:18:59', '2023-10-27 05:48:47', '2023-10-27 05:48:59'),
(4, 'flat 10% off', '@@22@@', 10, 0, '2023-10-27 11:21:19', '2023-10-27 05:51:03', '2023-10-27 05:51:19'),
(5, 'flat 10% off', '111333', 10, 0, '2023-10-30 05:42:51', '2023-10-27 05:51:57', '2023-10-30 00:12:51'),
(6, '20 % off on diwali', '12as21', 20, 0, '2023-11-06 05:23:52', '2023-10-30 00:48:45', '2023-11-05 23:53:52'),
(7, '5% off on 10000+', '1212', 5, 0, '2023-11-24 05:52:10', '2023-11-06 05:08:43', '2023-11-24 00:22:10');

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
-- Table structure for table `furniture`
--

CREATE TABLE `furniture` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `furnituretype` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `furniture`
--

INSERT INTO `furniture` (`id`, `image`, `furnituretype`) VALUES
(1, '1697113460.png', 'CHAIR'),
(2, '1695639268.png', 'TABLE'),
(3, '1695895346.jpeg', 'SOFA'),
(4, '1695642105.jpeg', 'COUCH');

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `type`) VALUES
(1, 'glass'),
(2, 'wood'),
(3, 'plastic'),
(4, 'aluminum');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_09_11_063757_create_usermodels_table', 2),
(6, '2023_09_11_070750_create_roles_table', 2),
(7, '2023_09_11_085831_create_products_table', 2),
(8, '2023_09_12_053640_create_permission_tables', 3),
(9, '2023_09_12_064953_alter_users_table', 4),
(10, '2014_10_12_100000_create_password_resets_table', 5),
(11, '2023_09_14_075825_create_types_table', 6),
(12, '2023_09_14_081053_create_variations_table', 7),
(13, '2023_09_25_065644_create_userssers_table', 8),
(14, '2023_09_29_101725_create_carts_table', 9),
(15, '2023_09_29_102253_create_wishlists_table', 10),
(16, '2023_10_11_070337_create_coupons_table', 11),
(17, '2023_10_11_115001_create_discounts_table', 12),
(18, '2023_10_13_120137_create_orders_table', 13),
(19, '2023_10_13_123642_create_billing_details_table', 14),
(22, '2023_10_26_120525_create_blogs_table', 15),
(23, '2023_11_02_065922_create_payments_table', 16),
(24, '2023_11_03_080735_create_site_metas_table', 17);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `orderNUM` varchar(255) NOT NULL,
  `userID` int(11) NOT NULL,
  `productID` varchar(255) NOT NULL,
  `productvariation` varchar(255) NOT NULL,
  `variation_qty` varchar(255) NOT NULL,
  `billing_detailsID` int(11) NOT NULL,
  `Coupon` varchar(255) NOT NULL DEFAULT '0',
  `discount` int(11) NOT NULL,
  `totalamount` decimal(10,0) NOT NULL,
  `status` int(11) NOT NULL,
  `orderdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `orderNUM`, `userID`, `productID`, `productvariation`, `variation_qty`, `billing_detailsID`, `Coupon`, `discount`, `totalamount`, `status`, `orderdate`, `created_at`, `updated_at`) VALUES
(9, 'ORD4WLXq1Ji', 1, '251', '65', '1', 10, '0', 0, 12000, 0, '2023-11-02 12:45:16', '2023-10-30 00:35:52', '2023-10-30 00:35:52'),
(15, 'ORDyQpa5B1z', 8, '251,256', '65,68', '1,1', 11, '12as21', 4800, 19200, 1, '2023-11-03 00:49:19', '2023-11-03 00:49:21', '2023-11-03 00:49:21'),
(16, 'ORDwfcfNUCq', 12, '252', '66', '2', 13, '0', 0, 47998, 1, '2023-11-03 04:52:41', '2023-11-03 04:52:44', '2023-11-03 04:52:44'),
(17, 'ORDUjp5Jyfv', 12, '263', '76', '1', 13, '0', 0, 14999, 1, '2023-11-03 05:56:34', '2023-11-03 05:56:37', '2023-11-03 05:56:37'),
(18, 'ORDbQowdqE7', 12, '263', '76', '1', 13, '12as21', 3000, 11999, 1, '2023-11-03 06:15:37', '2023-11-03 06:15:40', '2023-11-03 06:15:40'),
(19, 'ORDs65wXTIM', 1, '260', '74', '1', 10, '0', 0, 12999, 1, '2023-11-03 06:40:38', '2023-11-03 06:40:41', '2023-11-03 06:40:41'),
(22, 'ORDtsZC9sDC', 8, '256,251', '68,65', '1,1', 11, '0', 0, 24000, 0, '2023-11-06 01:31:16', '2023-11-06 01:31:17', '2023-11-06 01:31:17'),
(28, 'ORDUICbUx5A', 8, '256,251', '68,65', '1,1', 11, '0', 0, 24000, 0, '2023-11-06 01:55:15', '2023-11-06 01:55:17', '2023-11-06 01:55:17'),
(30, 'ORD4r7yRTiH', 8, '256,251', '68,65', '1,1', 11, '0', 0, 24000, 0, '2023-11-06 01:58:30', '2023-11-06 01:58:31', '2023-11-06 01:58:31'),
(33, 'ORDoNSuc6XD', 8, '260', '75', '1', 11, '1212', 700, 13299, 1, '2023-11-06 10:42:24', '2023-11-06 05:11:19', '2023-11-06 05:12:24'),
(34, 'ORD1lN9ecCq', 1, '263,251', '76,65', '1,1', 10, '0', 0, 26999, 1, '2023-11-24 08:32:36', '2023-11-24 03:02:32', '2023-11-24 03:02:36');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `orderNUM` varchar(255) NOT NULL,
  `total_amount` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `orderNUM`, `total_amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ORDyQpa5B1z', '19200', '1', '2023-11-03 00:49:21', '2023-11-03 00:49:21'),
(2, 'ORDwfcfNUCq', '47998', '1', '2023-11-03 04:52:44', '2023-11-03 04:52:44'),
(3, 'ORDUjp5Jyfv', '14999', '1', '2023-11-03 05:56:37', '2023-11-03 05:56:37'),
(4, 'ORDbQowdqE7', '11999.2', '1', '2023-11-03 06:15:40', '2023-11-03 06:15:40'),
(5, 'ORDs65wXTIM', '12999', '1', '2023-11-03 06:40:41', '2023-11-03 06:40:41'),
(6, 'ORDoNSuc6XD', '13299.05', '1', '2023-11-06 05:11:19', '2023-11-06 05:12:24'),
(7, 'ORD1lN9ecCq', '26999', '1', '2023-11-24 03:02:32', '2023-11-24 03:02:36');

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

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `product` varchar(255) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `typeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product`, `categoryID`, `typeID`) VALUES
(251, 'simple table', 2, 1),
(252, 'brown couch', 4, 1),
(256, 'dark grey sofa', 3, 1),
(260, 'chair', 1, 2),
(263, 'Ergonomic Chair', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `site_metas`
--

CREATE TABLE `site_metas` (
  `header_text` varchar(255) DEFAULT NULL,
  `support_email` varchar(255) DEFAULT NULL,
  `support_phone` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `footer_title` varchar(255) DEFAULT NULL,
  `footer_text` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_metas`
--

INSERT INTO `site_metas` (`header_text`, `support_email`, `support_phone`, `facebook`, `instagram`, `linkedin`, `twitter`, `footer_title`, `footer_text`, `created_at`, `updated_at`) VALUES
('Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique.', 'info@yourdomain.com', '+1 294 3925 3939', '#', '#', '#', '#', 'Furniture', 'Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. Pellentesque habitant', '2023-11-03 02:50:47', '2023-11-03 02:50:47');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `type`) VALUES
(1, 'simple'),
(2, 'variable');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `number` bigint(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `email`, `password`, `number`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'hitesh', 'hitesh@gmail.com', '$2y$10$0yyFtRwF4KgBL4WuHzPu4OTGP.1Xg4gEGHF2BlLr5ScnaTlH00Wg2', 7162391325, NULL, '2023-09-11 14:14:47', '2023-09-11 14:14:47'),
(7, 'user', 'vansh', 'vansh@gmail.com', '$2y$10$LUlJmQdubd9Y93jZqR9Wxuat9ihSISERvMwPgaLl0Sov80PYiDKO2', 2233112222, NULL, '2023-09-21 17:39:10', '2023-09-21 17:39:10'),
(8, 'user', 'sagar', 'sagar@gmail.com', '$2y$10$3aPeXwszjXcK6TRx5x8roOByVWm.Tnw8VaRVVQeYlCK9ra4QfvWF6', 8767685656, NULL, '2023-09-21 18:03:38', '2023-09-21 18:03:38'),
(12, 'user', 'test2', 'test2@gmail.com', '$2y$10$zdq11mgjlLtffCO1ivqx0Ohrx4UmLSerBlMoVA6DN80q.sJTTSjMe', 1122112221, NULL, '2023-10-12 01:23:03', '2023-10-12 01:23:03'),
(26, 'user', 'Test', 'test@gmail.com', '$2y$10$5cpZgqfVF/QP2ReBxwq3xOrSjO/C1TJTIO1kb9s5DHZ.iwemF4RMS', 7784515643, NULL, '2023-11-07 06:57:19', '2023-11-07 06:57:19');

-- --------------------------------------------------------

--
-- Table structure for table `variations`
--

CREATE TABLE `variations` (
  `id` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `price` bigint(20) NOT NULL,
  `image` varchar(255) NOT NULL,
  `colourID` int(11) NOT NULL,
  `size` varchar(255) NOT NULL,
  `materialID` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `variations`
--

INSERT INTO `variations` (`id`, `productID`, `price`, `image`, `colourID`, `size`, `materialID`, `stock`, `status`) VALUES
(65, 251, 12000, '1695639268.png', 12, '11x11', 1, 1, 1),
(66, 252, 23999, '1695642105.jpeg', 11, '10x10', 2, 0, 1),
(68, 256, 12000, '1695895346.jpeg', 12, '20x20', 2, 8, 1),
(74, 260, 12999, '169832047714.png', 9, '4x4', 4, 1, 1),
(75, 260, 13999, '169832047761.png', 12, '12x20', 4, 7, 1),
(76, 263, 14999, '1698996367.png', 14, '4x4', 2, 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `variationID` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `userID`, `productID`, `variationID`, `created_at`, `updated_at`) VALUES
(178, 12, 256, 68, '2023-10-12 02:24:35', '2023-10-12 02:24:35'),
(201, 1, 260, 75, '2023-10-30 07:58:50', '2023-10-30 07:58:50'),
(208, 1, 263, 76, '2023-11-06 03:20:10', '2023-11-06 03:20:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billing_details`
--
ALTER TABLE `billing_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productID` (`productID`),
  ADD KEY `variationID` (`variationID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `colours`
--
ALTER TABLE `colours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_code_unique` (`code`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `furniture`
--
ALTER TABLE `furniture`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_ordernum_unique` (`orderNUM`),
  ADD KEY `userID` (`userID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `typeID` (`typeID`),
  ADD KEY `categoryID` (`categoryID`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `number` (`number`);

--
-- Indexes for table `variations`
--
ALTER TABLE `variations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `colourID` (`colourID`),
  ADD KEY `materialID` (`materialID`),
  ADD KEY `sizeID` (`size`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productID` (`productID`),
  ADD KEY `variationID` (`variationID`),
  ADD KEY `userID` (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billing_details`
--
ALTER TABLE `billing_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `colours`
--
ALTER TABLE `colours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `furniture`
--
ALTER TABLE `furniture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=264;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `variations`
--
ALTER TABLE `variations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `billing_details`
--
ALTER TABLE `billing_details`
  ADD CONSTRAINT `billing_details_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
