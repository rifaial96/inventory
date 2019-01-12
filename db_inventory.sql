-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2018 at 04:34 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `activations`
--

CREATE TABLE `activations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activations`
--

INSERT INTO `activations` (`id`, `user_id`, `code`, `completed`, `completed_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'gljsLLM8Tg4RDTFkFq3r7qD5jBxHioYn', 1, '2018-08-21 22:24:53', '2018-08-21 22:24:53', '2018-08-21 22:24:53');

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` int(10) UNSIGNED NOT NULL,
  `log_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `subject_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` int(11) DEFAULT NULL,
  `causer_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `properties` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_id`, `subject_type`, `causer_id`, `causer_type`, `properties`, `created_at`, `updated_at`) VALUES
(1, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2018-08-23 06:07:01', '2018-08-23 06:07:01'),
(2, 'John Doe', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2018-08-23 06:31:33', '2018-08-23 06:31:33'),
(3, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2018-08-23 07:11:29', '2018-08-23 07:11:29'),
(4, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2018-08-23 07:41:38', '2018-08-23 07:41:38'),
(5, 'John Doe', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2018-08-24 14:22:13', '2018-08-24 14:22:13'),
(6, 'Admin Zaki', 'User Updated by John Doe', 1, 'App\\User', 1, 'App\\User', '[]', '2018-08-24 17:09:59', '2018-08-24 17:09:59'),
(7, 'Admin Zaki', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2018-08-24 17:23:23', '2018-08-24 17:23:23'),
(8, 'Admin Zaki', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2018-08-29 06:05:13', '2018-08-29 06:05:13'),
(9, 'Admin Zaki', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2018-08-29 14:04:46', '2018-08-29 14:04:46'),
(10, 'Admin Zaki', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2018-08-30 16:00:19', '2018-08-30 16:00:19'),
(11, 'Admin Zaki', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2018-08-31 08:00:27', '2018-08-31 08:00:27'),
(12, 'Admin Zaki', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2018-09-05 09:15:55', '2018-09-05 09:15:55'),
(13, 'Admin Zaki', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2018-09-06 06:25:22', '2018-09-06 06:25:22'),
(14, 'Admin Zaki', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2018-09-06 17:47:40', '2018-09-06 17:47:40'),
(15, 'Admin Zaki', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2018-09-07 07:55:32', '2018-09-07 07:55:32'),
(16, 'Admin Zaki', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2018-09-07 10:44:49', '2018-09-07 10:44:49'),
(17, 'Admin Zaki', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2018-09-13 16:19:16', '2018-09-13 16:19:16'),
(18, 'Admin Zaki', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2018-09-14 06:12:27', '2018-09-14 06:12:27'),
(19, 'Admin Zaki', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2018-09-14 11:35:05', '2018-09-14 11:35:05'),
(20, 'Admin Zaki', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2018-09-17 07:12:26', '2018-09-17 07:12:26'),
(21, 'Admin Zaki', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2018-09-22 19:39:30', '2018-09-22 19:39:30'),
(22, 'Admin Zaki', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2018-09-23 00:30:40', '2018-09-23 00:30:40'),
(23, 'Admin Zaki', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2018-09-23 06:48:11', '2018-09-23 06:48:11'),
(24, 'Admin Zaki', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2018-09-24 09:07:38', '2018-09-24 09:07:38'),
(25, 'Admin Zaki', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2018-09-28 08:00:37', '2018-09-28 08:00:37'),
(26, 'Admin Zaki', 'User Updated by Admin Zaki', 1, 'App\\User', 1, 'App\\User', '[]', '2018-09-28 08:10:38', '2018-09-28 08:10:38'),
(27, 'Admin Zaki', 'User Updated by Admin Zaki', 1, 'App\\User', 1, 'App\\User', '[]', '2018-09-28 08:17:19', '2018-09-28 08:17:19'),
(28, 'Admin Zaki', 'User Updated by Admin Zaki', 1, 'App\\User', 1, 'App\\User', '[]', '2018-09-28 08:18:35', '2018-09-28 08:18:35'),
(29, 'Admin Zaki', 'User Updated by Admin Zaki', 1, 'App\\User', 1, 'App\\User', '[]', '2018-09-28 08:21:19', '2018-09-28 08:21:19'),
(30, 'Admin Zaki', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2018-09-28 17:24:11', '2018-09-28 17:24:11');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `blog_category_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `blog_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cashs`
--

CREATE TABLE `cashs` (
  `id` int(11) NOT NULL,
  `date_flow` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `money` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cashs`
--

INSERT INTO `cashs` (`id`, `date_flow`, `description`, `money`, `status`, `created_at`, `updated_at`) VALUES
(1, '09/01/2018 8:08 AM', 'Buy Shoes 100 Pcs', 10000000, 0, '2018-09-06 18:06:34', '2018-09-06 18:08:57'),
(2, '09/18/2018 12:50 AM', 'Sell Shoes 1000 Pcs', 100000000, 1, '2018-09-17 10:50:23', '2018-09-17 10:50:23');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `discount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `discount`, `created_at`, `updated_at`) VALUES
(5, 'Nike', 0, '2018-08-24 15:05:20', '2018-08-24 15:05:20'),
(6, 'Adidas', 0, '2018-08-24 15:05:49', '2018-08-24 15:05:49'),
(7, 'yuhuuu', 5, '2018-08-29 14:12:44', '2018-08-29 14:12:44');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `sortname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `company` varchar(200) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `address` text,
  `city` varchar(200) DEFAULT NULL,
  `state` varchar(200) DEFAULT NULL,
  `member_type` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `company`, `name`, `phone`, `address`, `city`, `state`, `member_type`, `created_at`, `updated_at`) VALUES
(1, 'PT Kaya raya', 'Bambang', '0009999000999', 'Jl Buah Berlian', 'Bandung', 'Jawa Barat', 'Gold', '2018-08-24 15:34:21', '2018-08-24 15:34:21'),
(2, 'PT Murah Senyum', 'Adam', '1233332123', 'Subang', 'Subang', 'Jawa Barat', 'Silver', '2018-08-29 14:19:52', '2018-08-29 14:21:46'),
(3, 'PT Bell Indo Perk', 'Dani', '0898989', 'Jl.Kuning', 'Purwakarta', 'Jabar', 'Silver', '2018-09-28 08:30:05', '2018-09-28 08:30:05');

-- --------------------------------------------------------

--
-- Table structure for table `datatables`
--

CREATE TABLE `datatables` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `points` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `job` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(10) UNSIGNED NOT NULL,
  `filename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0000_00_00_000000_create_taggable_table', 1),
(2, '2014_07_02_230147_migration_cartalyst_sentinel', 1),
(3, '2014_10_04_174350_soft_delete_users', 1),
(4, '2014_12_10_011106_add_fields_to_user_table', 1),
(5, '2015_08_09_200015_create_blog_module_table', 1),
(6, '2015_08_11_064636_add_slug_to_blogs_table', 1),
(7, '2015_11_10_140011_create_files_table', 1),
(8, '2016_01_02_062647_create_tasks_table', 1),
(9, '2016_04_26_054601_create_datatables_table', 1),
(10, '2016_10_04_103149_add_fields_datatables_table', 1),
(11, '2017_09_29_113930_create_activity_log_table', 1),
(12, '2017_10_07_070138_create_countries_table', 1),
(13, '2017_10_24_130059_add_country_field', 1),
(14, '2018_02_14_072522_create_news_table', 1),
(15, '2018_03_01_063729_create_social_to_users', 1),
(16, '2018_03_06_063201_rename_user_state', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `persistences`
--

CREATE TABLE `persistences` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `persistences`
--

INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(2, 1, 'cKhxlKp3a2RXFeKpHfpyzDmtn3lc74IT', '2018-08-23 07:11:29', '2018-08-23 07:11:29'),
(3, 1, 'OfgL90RvflcHEtkIz0sLBZHPwSuteMGa', '2018-08-23 07:41:37', '2018-08-23 07:41:37'),
(4, 1, 'vfFsKHZQ8i56L7Ebr194CzkZHIxFeVYF', '2018-08-29 06:05:12', '2018-08-29 06:05:12'),
(5, 1, 'PLkx2MDqKU95xv5JOyDKz4mJUlWMtTst', '2018-08-29 14:04:46', '2018-08-29 14:04:46'),
(6, 1, 'ED6ObLtpUiGKhTNxgH2MNKe8f9CSTRyt', '2018-08-30 16:00:19', '2018-08-30 16:00:19'),
(7, 1, '2BQMz4caLYfJMwlG82xJFK3NC1oxXscR', '2018-08-31 08:00:27', '2018-08-31 08:00:27'),
(8, 1, 'XuiOXfm3vSoKFNsZirdMq985z0NG3wc7', '2018-09-05 09:15:55', '2018-09-05 09:15:55'),
(9, 1, 'rh6D3WJfu5wpiodKnVbYqZGyw5tbxffv', '2018-09-06 06:25:22', '2018-09-06 06:25:22'),
(10, 1, '8epSXPTYBCIALcTL4XiCjO3t07ruUxJe', '2018-09-06 17:47:40', '2018-09-06 17:47:40'),
(11, 1, '6IwEvdLJihLTBaiJs5ioxiGIo2Utbuoa', '2018-09-07 07:55:31', '2018-09-07 07:55:31'),
(12, 1, 'BENKRF4Ux24V3wkH5TINm5gbiNPUV1tc', '2018-09-07 10:44:49', '2018-09-07 10:44:49'),
(13, 1, 'WlcmbjHaTuaRgM8lCj950FjXGHbW44Vs', '2018-09-13 16:19:15', '2018-09-13 16:19:15'),
(14, 1, 'X7DsxH91lhUOr8w6fY0nryc3UXE3xMA3', '2018-09-14 06:12:26', '2018-09-14 06:12:26'),
(15, 1, 'K4FcAeDMLJ9tnX6e4hZywoYiudjuYR7X', '2018-09-14 11:35:05', '2018-09-14 11:35:05'),
(16, 1, 'G5hh5sGSKSXtTD8DHcMdSKB6yh5MrU4V', '2018-09-17 07:12:25', '2018-09-17 07:12:25'),
(17, 1, '1rbYdjxvlyBl3aEgSOOwLkNDgl2w8ues', '2018-09-22 19:39:30', '2018-09-22 19:39:30'),
(18, 1, 'e8Mmh4N34p50X2wMpVx33B0ZGXy0yQ7Z', '2018-09-23 00:30:40', '2018-09-23 00:30:40'),
(19, 1, 'IN5ZWVzjcnQOLK8mNGb8SrZ0nIq2B4tk', '2018-09-23 06:48:10', '2018-09-23 06:48:10'),
(20, 1, 'SkRVft9kImFbAIBsuGmdEaShnnhe8jsE', '2018-09-24 09:07:38', '2018-09-24 09:07:38'),
(21, 1, '7N7AvnRFIUwhFFMRw2nTcFr4w5z5aKmy', '2018-09-28 08:00:36', '2018-09-28 08:00:36'),
(22, 1, 'GJ4354tVpoU5ReoOqhkxPYyLMyoZplJx', '2018-09-28 17:24:10', '2018-09-28 17:24:10');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `alert_quantity` int(11) DEFAULT NULL,
  `warehouse_quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `code`, `category_id`, `price`, `alert_quantity`, `warehouse_quantity`, `created_at`, `updated_at`) VALUES
(1, 'Nike Jordan', 'NA0001', 5, 350000, 5, 50, '2018-08-24 16:57:29', '2018-08-29 16:23:13'),
(2, 'T-Shirt Go Indonesia', 'T110110', 7, 75000, 10, 100, '2018-08-29 16:22:29', '2018-08-29 16:22:29'),
(3, 'Jaket High neck', 'JK001', 6, 100000, 5, NULL, '2018-09-28 08:26:29', '2018-09-28 08:26:29');

-- --------------------------------------------------------

--
-- Table structure for table `product_suppliers`
--

CREATE TABLE `product_suppliers` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_suppliers`
--

INSERT INTO `product_suppliers` (`id`, `product_id`, `supplier_id`, `cost`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 500000, 0, '2018-09-28 15:34:31', '2018-09-28 08:34:31'),
(2, 1, 3, 500000, 45, '2018-09-14 18:46:30', '2018-09-07 10:48:28'),
(3, 2, 2, 500000, 80, '2018-09-17 14:16:57', '2018-09-17 07:16:57'),
(4, 2, 3, 500000, 90, '2018-09-17 14:16:57', '2018-09-17 07:16:57'),
(5, 3, 4, 10000, 23, '2018-09-28 15:32:38', '2018-09-28 08:32:38');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` int(11) NOT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `down_payment` int(11) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `supplier_id`, `status`, `down_payment`, `note`, `created_at`, `updated_at`) VALUES
(1, 2, 'Received', 50055, '<p>safddsfa</p>', '2018-08-31 10:18:38', '2018-09-23 03:26:31'),
(2, 4, 'Received', 10000, NULL, '2018-09-28 08:27:43', '2018-09-28 08:28:22');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_details`
--

CREATE TABLE `purchase_details` (
  `id` int(11) NOT NULL,
  `purchase_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_details`
--

INSERT INTO `purchase_details` (`id`, `purchase_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 2, '2018-08-31 10:23:05', '2018-08-31 10:23:28'),
(2, 1, 2, 3, '2018-09-23 03:32:04', '2018-09-23 03:32:04'),
(3, 2, 3, 15, '2018-09-28 08:28:00', '2018-09-28 08:28:00');

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE `reminders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `slug`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', '{\"admin\":1}', '2018-08-21 22:24:53', '2018-08-21 22:24:53'),
(2, 'user', 'User', NULL, '2018-08-21 22:24:53', '2018-08-21 22:24:53');

-- --------------------------------------------------------

--
-- Table structure for table `role_users`
--

CREATE TABLE `role_users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_users`
--

INSERT INTO `role_users` (`user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2018-08-21 22:24:53', '2018-08-21 22:24:53');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `amount_paid` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `payment_status` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `customer_id`, `note`, `amount_paid`, `status`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, 1, '<p>fdsafds</p>', 5656565, 'Completed', 'Paid', '2018-08-30 17:57:37', '2018-09-14 11:46:58'),
(2, 2, '<p>senyuum teruuuus</p>', 1000000, 'Completed', 'Paid', '2018-09-17 07:15:02', '2018-09-17 07:16:57'),
(3, 1, '<p>hgjhg</p>', NULL, 'Completed', 'Paid', '2018-09-17 10:54:49', '2018-09-28 08:34:31'),
(4, 3, NULL, NULL, 'Completed', 'Paid', '2018-09-28 08:31:48', '2018-09-28 08:32:38');

-- --------------------------------------------------------

--
-- Table structure for table `sale_details`
--

CREATE TABLE `sale_details` (
  `id` int(11) NOT NULL,
  `sale_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sale_details`
--

INSERT INTO `sale_details` (`id`, `sale_id`, `product_id`, `supplier_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, 45, '2018-08-31 09:36:33', '2018-08-31 09:47:08'),
(2, 1, 2, 3, 10, '2018-09-14 06:29:04', '2018-09-14 06:29:04'),
(3, 2, 2, 2, 10, '2018-09-17 07:15:44', '2018-09-17 07:15:44'),
(4, 2, 2, 3, 10, '2018-09-17 07:16:37', '2018-09-17 07:16:37'),
(5, 3, 1, 2, 10, '2018-09-17 10:58:27', '2018-09-17 10:58:27'),
(6, 4, 3, 4, 6, '2018-09-28 08:32:11', '2018-09-28 08:32:11');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `company` varchar(200) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `address` text,
  `city` varchar(200) DEFAULT NULL,
  `state` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `company`, `name`, `phone`, `address`, `city`, `state`, `created_at`, `updated_at`) VALUES
(2, 'PT Mahal Selamanya', 'Alex', '33333333', 'jl sempit', 'Palembang', 'Jawa Barat', '2018-08-24 15:17:42', '2018-08-24 15:18:30'),
(3, 'PT ABADI MAHAL', 'Asep', '123123123', '1111', '1111', '1111', '2018-09-07 10:47:54', '2018-09-07 10:47:54'),
(4, 'PT. Brand Ind', 'Bagas', '0999786767', 'Jl. Mangga', 'Bandung', 'Jabar', '2018-09-28 08:25:03', '2018-09-28 08:25:24');

-- --------------------------------------------------------

--
-- Table structure for table `taggable_taggables`
--

CREATE TABLE `taggable_taggables` (
  `tag_id` int(10) UNSIGNED NOT NULL,
  `taggable_id` int(10) UNSIGNED NOT NULL,
  `taggable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `taggable_tags`
--

CREATE TABLE `taggable_tags` (
  `tag_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `normalized` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `finished` tinyint(4) NOT NULL DEFAULT '0',
  `task_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `task_deadline` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `throttle`
--

CREATE TABLE `throttle` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci,
  `last_login` timestamp NULL DEFAULT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `pic` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `permissions`, `last_login`, `first_name`, `last_name`, `created_at`, `updated_at`, `deleted_at`, `phone`, `company`, `bio`, `gender`, `dob`, `pic`, `country`, `user_state`, `city`, `address`, `postal`, `provider`, `provider_id`) VALUES
(1, 'admin@admin.com', '$2y$10$nCA3B2ljN98/acWm9e/ig.WpPLaKb1e3UA60t/UwNgyrwA32x64Qq', NULL, '2018-09-28 17:24:10', 'Admin', 'Zaki', '2018-08-21 22:24:53', '2018-09-28 17:24:10', NULL, '0899374111', 'MLMTM', 'hehehe', 'male', '0000-00-00', 'F30gq5YJOV.png', NULL, NULL, NULL, 'Jl. Padjajaran', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activations`
--
ALTER TABLE `activations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_log_log_name_index` (`log_name`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cashs`
--
ALTER TABLE `cashs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datatables`
--
ALTER TABLE `datatables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `persistences`
--
ALTER TABLE `persistences`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `persistences_code_unique` (`code`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_suppliers`
--
ALTER TABLE `product_suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_details`
--
ALTER TABLE `purchase_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indexes for table `role_users`
--
ALTER TABLE `role_users`
  ADD PRIMARY KEY (`user_id`,`role_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_details`
--
ALTER TABLE `sale_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taggable_taggables`
--
ALTER TABLE `taggable_taggables`
  ADD KEY `i_taggable_fwd` (`tag_id`,`taggable_id`),
  ADD KEY `i_taggable_rev` (`taggable_id`,`tag_id`),
  ADD KEY `i_taggable_type` (`taggable_type`);

--
-- Indexes for table `taggable_tags`
--
ALTER TABLE `taggable_tags`
  ADD PRIMARY KEY (`tag_id`),
  ADD KEY `taggable_tags_normalized_index` (`normalized`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `throttle`
--
ALTER TABLE `throttle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `throttle_user_id_index` (`user_id`);

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
-- AUTO_INCREMENT for table `activations`
--
ALTER TABLE `activations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cashs`
--
ALTER TABLE `cashs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `datatables`
--
ALTER TABLE `datatables`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `persistences`
--
ALTER TABLE `persistences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_suppliers`
--
ALTER TABLE `product_suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `purchase_details`
--
ALTER TABLE `purchase_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sale_details`
--
ALTER TABLE `sale_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `taggable_tags`
--
ALTER TABLE `taggable_tags`
  MODIFY `tag_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `throttle`
--
ALTER TABLE `throttle`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
