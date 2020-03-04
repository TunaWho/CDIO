-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2017 at 06:02 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project-lar`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_01_20_081442_vp_user', 1),
(4, '2017_01_21_095513_vp_categories', 2),
(5, '2017_01_22_063102_vp_products', 3),
(6, '2017_01_23_102348_vp_comment', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vp_categories`
--

CREATE TABLE `vp_categories` (
  `cate_id` int(10) UNSIGNED NOT NULL,
  `cate_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cate_slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vp_categories`
--

INSERT INTO `vp_categories` (`cate_id`, `cate_name`, `cate_slug`, `parent`, `created_at`, `updated_at`) VALUES
(1, 'iPhone', 'iphone', 0, NULL, NULL),
(2, 'Samsung', 'samsung', 0, NULL, NULL),
(6, 'Sony', 'sony', 0, '2017-01-21 03:58:59', '2017-06-25 20:55:51'),
(8, 'HTC', 'htc', 0, '2017-01-21 03:59:18', '2017-06-25 20:57:01'),
(9, 'Sony', 'sony', 0, '2017-01-21 03:59:23', '2017-01-21 03:59:23'),
(11, 'OPPO', 'oppo', 0, '2017-06-25 19:40:32', '2017-06-25 19:40:32'),
(12, 'iphone 7', 'iphone-7', 1, '2017-06-25 20:21:29', '2017-06-25 20:21:29'),
(14, 'Iphone 8', 'iphone-8', 1, '2017-06-25 20:45:07', '2017-06-25 20:45:07');

-- --------------------------------------------------------

--
-- Table structure for table `vp_comment`
--

CREATE TABLE `vp_comment` (
  `com_id` int(10) UNSIGNED NOT NULL,
  `com_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `com_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `com_content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `com_product` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vp_comment`
--

INSERT INTO `vp_comment` (`com_id`, `com_email`, `com_name`, `com_content`, `com_product`, `created_at`, `updated_at`) VALUES
(1, 'vietpro@gmail.com', 'Vietpro', 'Sản phẩm còn hàng không vậy?', 11, '2017-01-23 03:42:41', '2017-01-23 03:42:41'),
(2, 'dinhcongsang@gmail.com', 'sang', 'sam pham chat luong tot', 2, '2017-01-23 03:45:57', '2017-04-07 02:19:52'),
(3, 'vietpro@gmail.com', 'vietpro', 'mau ma dep', 2, '2017-04-07 02:20:46', '2017-04-07 02:20:46'),
(17, 'dinhcongsang92@gmail.com', 'dinh sang', 'thiết kế ẩn tượng, cấu hình tốt trong tầm giá', 3, '2017-04-09 09:08:40', '2017-04-09 09:08:40'),
(18, 'thanhhong@gmail.com', 'hong bui', 'giá đắt quá', 3, '2017-04-09 09:09:59', '2017-04-09 09:09:59'),
(20, 'dinhcongsang@gmail.com', 'sang', 'thiet ke an tuong', 2, '2017-04-10 04:20:23', '2017-04-10 04:20:23'),
(21, 'dff@gmail.com', 'fdfdf', 'dfdfdf', 2, '2017-06-30 06:08:31', '2017-06-30 06:08:31'),
(22, 'vietpro@gmail.com', 'vietpro', 'hjhjhj', 2, '2017-07-02 19:07:12', '2017-07-02 19:07:12');

-- --------------------------------------------------------

--
-- Table structure for table `vp_products`
--

CREATE TABLE `vp_products` (
  `prod_id` int(10) UNSIGNED NOT NULL,
  `prod_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prod_slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prod_price` int(11) NOT NULL,
  `prod_img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prod_warranty` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prod_accessories` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prod_condition` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prod_promotion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prod_status` tinyint(4) NOT NULL,
  `prod_description` text COLLATE utf8_unicode_ci NOT NULL,
  `prod_featured` tinyint(4) NOT NULL,
  `prod_cate` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vp_products`
--

INSERT INTO `vp_products` (`prod_id`, `prod_name`, `prod_slug`, `prod_price`, `prod_img`, `prod_warranty`, `prod_accessories`, `prod_condition`, `prod_promotion`, `prod_status`, `prod_description`, `prod_featured`, `prod_cate`, `created_at`, `updated_at`) VALUES
(2, 'IPhone 7s', 'iphone-7s', 11990000, 'NpDqasy7TM7IhnzsXqL2uSLSAe06d6eUu9g6F3Ku-iphone.jpg', '12 tháng', 'Sạc, cáp, tai nghe', 'Máy mới 100%', 'Dán cường lực', 0, '<p>Sản phẩm mới 100% được bảo h&agrave;nh 12 th&aacute;ng tại Vietproshop, đổi mới 30 ng&agrave;y đầu sử dụng.</p>\r\n', 1, 1, '2017-01-22 00:55:39', '2017-06-30 05:30:47'),
(3, 'IPhone 7 P', 'iphone-7-plus', 11990000, 'iphone.jpg', '12 tháng', 'Sạc, cáp, tai nghe', 'Máy mới 100%', 'Dán cường lực', 1, '<p>Sản phẩm mới 100% được bảo h&agrave;nh 12 th&aacute;ng tại Vietproshop, đổi mới 30 ng&agrave;y đầu sử dụng.</p>\r\n', 1, 1, '2017-01-22 00:56:23', '2017-06-30 05:28:54'),
(4, 'IPhone 6S', 'iphone-6s', 11990000, '2UezycqvdEdeiVBGy9fkeEEV46Y3kNO68zkJQp1R-iphone.jpg', '12 tháng', 'Sạc, cáp, tai nghe', 'Máy mới 100%', 'Dán cường lực', 1, '', 1, 1, '2017-01-22 00:57:13', '2017-06-30 05:29:02'),
(5, 'IPhone 6', 'iphone-6', 11990000, 'WQPd72O7I4bdZLXEAJ4JwAzekwaEZuZxIdxuY956-iphone.jpg', '12 tháng', 'Sạc, cáp, tai nghe', 'Máy mới 100%', 'Dán cường lực', 1, '<p>Sản phẩm mới 100% được bảo h&agrave;nh 12 th&aacute;ng tại Vietproshop, đổi mới 30 ng&agrave;y đầu sử dụng.</p>\r\n', 1, 1, '2017-01-22 00:57:45', '2017-06-30 05:29:09'),
(7, 'IPhone 6S ', 'iphone-6s-plus', 11990000, 'oBaVNzDwTKI7Dt48c3Yv6ep46ly0LBsEWR9rDM7e-iphone.jpg', '12 tháng', 'Sạc, cáp, tai nghe', 'Máy mới 100%', 'Dán cường lực', 1, '', 1, 1, '2017-01-22 00:59:42', '2017-06-30 05:29:17'),
(8, 'IPhone 5', 'iphone-5', 11990000, 'pbQRJG21nv2gwy8pNzgysVaszcGUBn1JgKXBAwRy-iphone.jpg', '12 tháng', 'Sạc, cáp, tai nghe', 'Máy mới 100%', 'Dán cường lực', 1, '<p>Sản phẩm mới 100% được bảo h&agrave;nh 12 th&aacute;ng tại Vietproshop, đổi mới 30 ng&agrave;y đầu sử dụng.</p>\r\n', 0, 1, '2017-01-22 01:00:49', '2017-06-30 05:29:24'),
(9, 'IPhone 5S', 'iphone-5s', 11990000, 'ED70FuNKKafIIY7M4VEh4nlxvA3ParRNGw4vlQxl-iphone.jpg', '12 tháng', 'Sạc, cáp, tai nghe', 'Máy mới 100%', 'Dán cường lực', 1, '', 1, 1, '2017-01-22 01:01:21', '2017-06-30 05:29:31'),
(10, 'IPhone 4', 'iphone-4', 11990000, '2ZPw3I2LXMdcJN0m01SI2Vbta8GBpeoFvb9043U7-iphone.jpg', '12 tháng', 'Sạc, cáp, tai nghe', 'Máy mới 100%', 'Dán cường lực', 1, '<p>Sản phẩm mới 100% được bảo h&agrave;nh 12 th&aacute;ng tại Vietproshop, đổi mới 30 ng&agrave;y đầu sử dụng.</p>\r\n', 1, 1, '2017-01-22 01:02:17', '2017-06-30 05:29:38'),
(11, 'IPhone 4S', 'iphone-4s', 11990000, '17E6TYZ7C9KikQjWZDTLx9cnfQnQxQU30O09bHsN-iphone.jpg', '12 tháng', 'Sạc, cáp, tai nghe', 'Máy mới 100%', 'Dán cường lực', 1, '<p>Sản phẩm mới 100% được bảo h&agrave;nh 12 th&aacute;ng tại Vietproshop, đổi mới 30 ng&agrave;y đầu sử dụng.</p>\r\n', 0, 1, '2017-01-22 01:03:04', '2017-06-30 05:29:45'),
(13, 'HTC 10', 'htc-10', 11990000, '7drvjyw6OUZhobo6dV9fJTk2BOZINA3m9sdlpwjE-iphone.jpg', '12 tháng', 'Sạc, cáp, tai nghe', 'Máy mới 100%', 'Dán cường lực', 1, '<p>Sản phẩm mới 100% được bảo h&agrave;nh 12 th&aacute;ng tại Vietproshop, đổi mới 30 ng&agrave;y đầu sử dụng.</p>\r\n', 1, 1, '2017-01-22 01:03:51', '2017-06-30 05:29:53'),
(14, 'sangsung', 'sangsung', 5000000, 'kbGMreSGNbktNapDHIWJs9F7p9QXZn752jqF7fhM-iphone.jpg', '12 tháng', 'Fullbox', 'Mới 100%', 'Cục sạc dự phòng 10000mha', 1, '<p>Thiết kế sang trọng, cấu h&igrave;nh cao cấp</p>\r\n', 0, 2, '2017-04-06 07:14:20', '2017-06-30 05:32:40'),
(31, 'samsung A3', 'samsung-a3', 5000000, '97XIau1O0G51mzlhWB5DcsX1nvvnm0Qbb71DMNb3-iphone.jpg', 'dsdsd', 'sdsd', 'dsdsd', 'dsdsds', 1, '<p>dsdd</p>\r\n', 0, 2, '2017-06-27 20:00:00', '2017-06-30 05:33:01'),
(32, 'samsung A5', 'samsung-a5', 5000000, 'RXrYSJFAfaoqFKc2CP9i0xq2hRQIEaej2x9JDsGQ-iphone.jpg', 'asasas', 'sasasa', 'sasas', 'asa', 1, '<p>sass</p>\r\n', 0, 2, '2017-06-28 05:53:17', '2017-06-30 05:33:09');

-- --------------------------------------------------------

--
-- Table structure for table `vp_users`
--

CREATE TABLE `vp_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` tinyint(4) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vp_users`
--

INSERT INTO `vp_users` (`id`, `email`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'vietpro@gmail.com', '$2y$10$Sj85rm7hS3FrcEUcBubLpO4wwAuR.XQhUJi5o3ha1KsCPNMPID8du', 1, '0gbEHTPoqV2YASxwA4tgXyzOGnNYIsADdcxaJbqlIkQoJc99wLsxSp7BLS70', NULL, '2017-06-20 20:54:39'),
(2, 'admin@gmail.com', '$2y$10$khtRKtqKqLAsP9SPC8Gmge9MjPgqA9fNnmZRo4L6rX6dJ6.W4U8W6', 1, 'kOZE3Xq2Vo6daWGtImvpDMJaQuqMb7UMJ9LEbTMud8SUKmBpTbc6aDHFrGw3', NULL, '2017-04-24 15:16:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vp_categories`
--
ALTER TABLE `vp_categories`
  ADD PRIMARY KEY (`cate_id`);

--
-- Indexes for table `vp_comment`
--
ALTER TABLE `vp_comment`
  ADD PRIMARY KEY (`com_id`),
  ADD KEY `vp_comment_com_product_foreign` (`com_product`);

--
-- Indexes for table `vp_products`
--
ALTER TABLE `vp_products`
  ADD PRIMARY KEY (`prod_id`),
  ADD KEY `vp_products_prod_cate_foreign` (`prod_cate`);

--
-- Indexes for table `vp_users`
--
ALTER TABLE `vp_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vp_categories`
--
ALTER TABLE `vp_categories`
  MODIFY `cate_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `vp_comment`
--
ALTER TABLE `vp_comment`
  MODIFY `com_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `vp_products`
--
ALTER TABLE `vp_products`
  MODIFY `prod_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `vp_users`
--
ALTER TABLE `vp_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `vp_comment`
--
ALTER TABLE `vp_comment`
  ADD CONSTRAINT `vp_comment_com_product_foreign` FOREIGN KEY (`com_product`) REFERENCES `vp_products` (`prod_id`) ON DELETE CASCADE;

--
-- Constraints for table `vp_products`
--
ALTER TABLE `vp_products`
  ADD CONSTRAINT `vp_products_prod_cate_foreign` FOREIGN KEY (`prod_cate`) REFERENCES `vp_categories` (`cate_id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
