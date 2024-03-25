-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2023 at 08:02 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'جنس', '2023-02-21 12:46:54', '2023-02-21 12:55:37'),
(2, 'طرح پارچه', '2023-02-21 13:46:31', '2023-02-21 13:46:31'),
(3, 'رنگ', '2023-02-21 13:46:39', '2023-02-21 13:46:39'),
(4, 'سایز', '2023-02-21 13:46:46', '2023-02-21 13:46:46');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_category`
--

CREATE TABLE `attribute_category` (
  `attribute_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `is_filter` tinyint(1) NOT NULL DEFAULT 0,
  `is_variation` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attribute_category`
--

INSERT INTO `attribute_category` (`attribute_id`, `category_id`, `is_filter`, `is_variation`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 0, NULL, NULL),
(1, 4, 0, 1, NULL, NULL),
(1, 11, 1, 0, NULL, NULL),
(1, 12, 1, 0, NULL, NULL),
(1, 15, 1, 0, NULL, NULL),
(2, 3, 1, 0, NULL, NULL),
(2, 4, 1, 0, NULL, NULL),
(2, 12, 1, 0, NULL, NULL),
(2, 14, 1, 0, NULL, NULL),
(2, 15, 1, 0, NULL, NULL),
(3, 3, 0, 0, NULL, NULL),
(3, 11, 1, 0, NULL, NULL),
(3, 12, 1, 0, NULL, NULL),
(3, 14, 1, 0, NULL, NULL),
(3, 15, 1, 0, NULL, NULL),
(4, 3, 0, 1, NULL, NULL),
(4, 11, 0, 1, NULL, NULL),
(4, 12, 0, 1, NULL, NULL),
(4, 14, 0, 1, NULL, NULL),
(4, 15, 0, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `button_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image`, `title`, `text`, `priority`, `is_active`, `type`, `button_text`, `button_link`, `button_icon`, `created_at`, `updated_at`) VALUES
(9, '2023_5_2_12_38_58_343825_slider_1.jpg', 'لورم ایپسوم 1', 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد', 1, 1, 'slider', 'فروشگاه', '#', 'sli sli-basket-loaded', '2023-05-01 03:12:46', '2023-05-02 09:12:31'),
(10, '2023_5_2_12_40_30_548952_slider_2.jpg', 'لورم ایپسوم 2', 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد', 2, 1, 'slider', 'فروشگاه', '#', 'sli sli-basket-loaded', '2023-05-01 03:17:12', '2023-05-02 09:11:54'),
(11, '2023_5_2_13_21_3_792082_index_bottom_1.png', 'لورم ایپسوم', 'لورم ایپسوم 1', 1, 1, 'index-bottom', 'فروشگاه', '#', NULL, '2023-05-02 09:51:03', '2023-05-02 09:51:03'),
(12, '2023_5_2_13_22_4_225003_index_bottom_2.png', 'لورم ایپسوم', 'لورم ایپسوم 2', 2, 1, 'index-bottom', 'فروشگاه', '#', NULL, '2023-05-02 09:52:04', '2023-05-02 09:52:04'),
(13, '2023_5_2_13_23_56_778317_index_top_1.png', 'زنانه', NULL, 1, 1, 'index-top', NULL, '#', NULL, '2023-05-02 09:53:56', '2023-05-02 09:53:56'),
(14, '2023_5_2_13_24_21_109784_index_top_2.png', 'مردانه', NULL, 3, 1, 'index-top', NULL, '#', NULL, '2023-05-02 09:54:21', '2023-05-02 10:14:07'),
(15, '2023_5_2_13_24_44_216273_index_top_3.png', 'جین', NULL, 2, 1, 'index-top', NULL, '#', NULL, '2023-05-02 09:54:44', '2023-05-02 10:13:54'),
(16, '2023_5_2_13_25_30_175976_index_top_4.png', 'لورم ایپسوم 1', 'لورم ایپسوم متن ساختگی', 4, 1, 'index-top', 'فروشگاه', '#', NULL, '2023-05-02 09:55:30', '2023-05-02 09:56:47'),
(17, '2023_5_2_13_26_21_607635_index_top_5.png', 'لورم ایپسوم 2', 'لورم ایپسوم متن ساختگی', 5, 1, 'index-top', 'فروشگاه', '#', NULL, '2023-05-02 09:56:21', '2023-05-02 09:56:21');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'برند یک', 'برند-یک', 1, '2023-02-08 17:52:24', '2023-02-08 17:52:24'),
(2, 'برند دو', 'برند-دو', 1, '2023-02-08 17:52:43', '2023-06-25 07:45:08'),
(3, 'برند سه', 'برند-سه', 1, '2023-02-08 18:16:41', '2023-06-25 07:45:04'),
(4, 'برند چهار', 'برند-چهار', 1, '2023-02-08 18:17:48', '2023-02-21 11:53:15');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `slug`, `is_active`, `description`, `icon`, `created_at`, `updated_at`) VALUES
(3, 0, 'پوشاک مردانه', 'm', 1, NULL, NULL, '2023-03-15 12:20:17', '2023-06-25 08:17:24'),
(4, 0, 'پوشاک زنانه', 'z', 1, NULL, NULL, '2023-03-15 12:22:53', '2023-06-25 08:17:37'),
(11, 3, 'پیراهن', 'm1', 1, NULL, NULL, '2023-03-19 11:33:42', '2023-06-25 07:48:04'),
(12, 4, 'مانتو', 'z1', 1, NULL, NULL, '2023-03-19 11:36:04', '2023-06-25 07:47:52'),
(14, 0, 'پوشاک بچگانه', 'p', 1, NULL, NULL, '2023-05-02 08:29:43', '2023-06-25 08:18:08'),
(15, 14, 'نوزادی', 'p1', 1, NULL, NULL, '2023-05-02 08:30:34', '2023-06-25 07:46:56');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `province_id`, `created_at`, `updated_at`) VALUES
(1, 'مشهد', 1, NULL, NULL),
(2, 'کلات', 1, NULL, NULL),
(3, 'ری', 2, NULL, NULL),
(4, 'ورامین', 2, NULL, NULL),
(5, 'کهک', 3, NULL, NULL),
(6, 'جعفریه', 3, NULL, NULL),
(7, 'زاهدان', 4, NULL, NULL),
(8, 'زابل', 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT 0,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `subject`, `text`, `created_at`, `updated_at`) VALUES
(1, 'امیرحسین', 'amir@gmail.com', 'تست 1', 'تست تست تست تست تست تست تست تست تست تست تست تست تست تست تست تست', '2023-07-02 09:07:52', '2023-07-02 09:07:52');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('amount','percentage') COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(10) UNSIGNED DEFAULT NULL,
  `percentage` int(10) UNSIGNED DEFAULT NULL,
  `max_percentage_amount` int(10) UNSIGNED DEFAULT NULL,
  `expired_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `name`, `code`, `type`, `amount`, `percentage`, `max_percentage_amount`, `expired_at`, `description`, `created_at`, `updated_at`) VALUES
(1, 'test1', 'coupon1402', 'amount', 10000, NULL, NULL, '2023-07-03 09:39:06', NULL, '2023-06-21 09:39:32', '2023-06-21 15:46:11'),
(3, 'test2', '123', 'percentage', NULL, 100, 40000, '2024-06-24 09:17:21', NULL, '2023-06-25 09:17:49', '2023-06-25 09:32:34'),
(4, 'test3', '1234', 'amount', 100000, NULL, NULL, '2024-06-23 09:27:37', NULL, '2023-06-25 09:28:20', '2023-06-25 09:28:20');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_02_05_163321_create_categories_table', 1),
(6, '2023_02_05_163634_create_brands_table', 1),
(7, '2023_02_05_163816_create_products_table', 1),
(8, '2023_02_05_164605_create_product_images_table', 1),
(9, '2023_02_06_064640_create_tags_table', 1),
(10, '2023_02_06_064730_create_product_tag_table', 1),
(11, '2023_02_06_065042_create_comments_table', 1),
(12, '2023_02_06_065418_create_product_rates_table', 1),
(13, '2023_02_06_065533_create_attributes_table', 1),
(14, '2023_02_06_065631_create_attribute_category_table', 1),
(15, '2023_02_06_070132_create_product_attributes_table', 1),
(16, '2023_02_06_070441_create_product_variations_table', 1),
(17, '2023_02_06_074258_create_provinces_table', 1),
(18, '2023_02_06_074332_create_cities_table', 1),
(19, '2023_02_06_074448_create_user_addresses_table', 1),
(20, '2023_02_06_074944_create_coupons_table', 1),
(21, '2023_02_06_080750_create_orders_table', 1),
(22, '2023_02_06_081931_create_order_items_table', 1),
(23, '2023_02_06_082637_create_transactions_table', 1),
(24, '2023_02_06_085110_create_wishlist_table', 1),
(25, '2023_02_06_085340_create_banners_table', 1),
(26, '2023_02_06_085802_create_contact_us_table', 1),
(27, '2023_02_06_090019_create_settings_table', 1),
(28, '2014_10_12_200000_add_two_factor_columns_to_users_table', 2),
(29, '2023_07_04_173925_create_permission_tables', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(10, 'App\\Models\\User', 11),
(10, 'App\\Models\\User', 13),
(11, 'App\\Models\\User', 11),
(11, 'App\\Models\\User', 12),
(12, 'App\\Models\\User', 11),
(12, 'App\\Models\\User', 14),
(13, 'App\\Models\\User', 11),
(13, 'App\\Models\\User', 15);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(3, 'App\\Models\\User', 11),
(4, 'App\\Models\\User', 12),
(5, 'App\\Models\\User', 13),
(6, 'App\\Models\\User', 14),
(7, 'App\\Models\\User', 15);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `address_id` bigint(20) UNSIGNED NOT NULL,
  `coupon_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `order_number` bigint(20) UNSIGNED NOT NULL,
  `total_amount` int(10) UNSIGNED NOT NULL,
  `delivery_amount` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `coupon_amount` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `paying_amount` int(10) UNSIGNED NOT NULL,
  `payment_type` enum('pos','cash','shabaNumber','cardToCard','online') COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` tinyint(4) NOT NULL DEFAULT 0,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `address_id`, `coupon_id`, `status`, `order_number`, `total_amount`, `delivery_amount`, `coupon_amount`, `paying_amount`, `payment_type`, `payment_status`, `description`, `created_at`, `updated_at`) VALUES
(25, 11, 5, NULL, 1, 7320461908, 85000, 3000, 0, 66000, 'online', 1, NULL, '2023-07-07 10:07:45', '2023-07-07 10:07:50'),
(26, 11, 5, NULL, 0, 9570988005, 85000, 3000, 0, 66000, 'online', 0, NULL, '2023-07-07 10:46:04', '2023-07-07 10:46:04'),
(27, 11, 5, NULL, 0, 1531380112, 535000, 4000, 0, 435000, 'online', 0, NULL, '2023-07-07 13:43:34', '2023-07-07 13:43:34'),
(28, 11, 5, 3, 1, 6351329517, 280000, 1000, 40000, 203000, 'online', 1, NULL, '2023-07-07 16:30:58', '2023-07-07 16:31:03');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_variation_id` bigint(20) UNSIGNED NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `subtotal` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `product_variation_id`, `price`, `quantity`, `subtotal`, `created_at`, `updated_at`) VALUES
(32, 25, 12, 31, 63000, 1, 63000, '2023-07-07 10:07:45', '2023-07-07 10:07:45'),
(33, 26, 12, 31, 63000, 1, 63000, '2023-07-07 10:46:04', '2023-07-07 10:46:04'),
(34, 27, 13, 36, 46000, 2, 92000, '2023-07-07 13:43:34', '2023-07-07 13:43:34'),
(35, 27, 11, 29, 75000, 2, 150000, '2023-07-07 13:43:34', '2023-07-07 13:43:34'),
(36, 27, 12, 31, 63000, 3, 189000, '2023-07-07 13:43:34', '2023-07-07 13:43:34'),
(37, 28, 13, 36, 46000, 2, 92000, '2023-07-07 16:30:58', '2023-07-07 16:30:58'),
(38, 28, 11, 29, 75000, 2, 150000, '2023-07-07 16:30:58', '2023-07-07 16:30:58');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `guard_name`, `created_at`, `updated_at`) VALUES
(10, 'users', 'بررسی کاربران', 'web', '2023-07-05 07:10:47', '2023-07-05 07:10:47'),
(11, 'shoping', 'بررسی فروشگاه', 'web', '2023-07-05 07:11:11', '2023-07-05 07:11:11'),
(12, 'orders', 'بررسی سفارشات', 'web', '2023-07-05 07:11:28', '2023-07-05 07:11:28'),
(13, 'settings', 'تنظیمات سایت', 'web', '2023-07-05 07:11:54', '2023-07-05 07:11:54');

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `primary_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `delivery_amount` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `delivery_amount_per_product` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `brand_id`, `category_id`, `slug`, `primary_image`, `description`, `status`, `is_active`, `delivery_amount`, `delivery_amount_per_product`, `created_at`, `updated_at`) VALUES
(11, 'پیراهن آبی', 1, 11, 'پیراهن-آبی', '2023_6_25_11_20_22_68147_m1.jpg', 'این پیراهن مردانه آبی است .', 1, 1, 0, 0, '2023-06-25 07:50:22', '2023-06-25 07:50:22'),
(12, 'پیراهن زرد', 2, 11, 'پیراهن-زرد', '2023_6_25_11_38_7_146858_m_2_1.jpg', 'این پیراهن مردانه زرد است .', 1, 1, 3000, 1000, '2023-06-25 08:08:07', '2023-06-25 08:08:07'),
(13, 'لباس نوزادی', 1, 15, 'لباس-نوزادی', '2023_6_25_11_42_58_132975_b1.jpg', 'این لباس نوزادی است .', 1, 1, 1000, NULL, '2023-06-25 08:12:58', '2023-06-25 08:12:58'),
(14, 'مانتو آبی', 4, 12, 'مانتو-آبی', '2023_6_25_11_46_4_320314_z1.jpg', 'این مانتو آبی زنانه است .', 1, 1, 2000, NULL, '2023-06-25 08:16:04', '2023-06-25 08:16:04');

-- --------------------------------------------------------

--
-- Table structure for table `product_attributes`
--

CREATE TABLE `product_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attribute_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_attributes`
--

INSERT INTO `product_attributes` (`id`, `attribute_id`, `product_id`, `value`, `is_active`, `created_at`, `updated_at`) VALUES
(30, 1, 11, 'نخی', 1, '2023-06-25 07:50:22', '2023-06-25 07:50:22'),
(31, 3, 11, 'آبی', 1, '2023-06-25 07:50:22', '2023-06-25 07:50:22'),
(32, 1, 12, 'نخی', 1, '2023-06-25 08:08:07', '2023-06-25 08:08:07'),
(33, 3, 12, 'زرد', 1, '2023-06-25 08:08:07', '2023-06-25 08:08:07'),
(34, 1, 13, 'نخی', 1, '2023-06-25 08:12:58', '2023-06-25 08:12:58'),
(35, 2, 13, 'ساده', 1, '2023-06-25 08:12:58', '2023-06-25 08:12:58'),
(36, 3, 13, 'سفید', 1, '2023-06-25 08:12:58', '2023-06-25 08:12:58'),
(37, 1, 14, 'نخی', 1, '2023-06-25 08:16:04', '2023-06-25 08:16:04'),
(38, 2, 14, 'ساده', 1, '2023-06-25 08:16:04', '2023-06-25 08:16:04'),
(39, 3, 14, 'آبی', 1, '2023-06-25 08:16:04', '2023-06-25 08:16:04');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(24, 11, '2023_6_25_11_20_22_69176_m2.jpg', '2023-06-25 07:50:22', '2023-06-25 07:50:22'),
(25, 11, '2023_6_25_11_20_22_69558_m3.jpg', '2023-06-25 07:50:22', '2023-06-25 07:50:22'),
(26, 12, '2023_6_25_11_38_7_147607_m_2_2.jpg', '2023-06-25 08:08:07', '2023-06-25 08:08:07'),
(27, 12, '2023_6_25_11_38_7_147946_m_2_3.jpg', '2023-06-25 08:08:07', '2023-06-25 08:08:07'),
(28, 13, '2023_6_25_11_42_58_133926_b2.jpg', '2023-06-25 08:12:58', '2023-06-25 08:12:58'),
(29, 13, '2023_6_25_11_42_58_134342_b3.jpg', '2023-06-25 08:12:58', '2023-06-25 08:12:58'),
(30, 14, '2023_6_25_11_46_4_321147_z2.jpg', '2023-06-25 08:16:04', '2023-06-25 08:16:04'),
(31, 14, '2023_6_25_11_46_4_321537_z3.jpg', '2023-06-25 08:16:04', '2023-06-25 08:16:04');

-- --------------------------------------------------------

--
-- Table structure for table `product_rates`
--

CREATE TABLE `product_rates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `rate` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_tag`
--

CREATE TABLE `product_tag` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_tag`
--

INSERT INTO `product_tag` (`product_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(13, 1, NULL, NULL),
(14, 1, NULL, NULL),
(11, 2, NULL, NULL),
(12, 2, NULL, NULL),
(13, 2, NULL, NULL),
(14, 3, NULL, NULL),
(14, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_variations`
--

CREATE TABLE `product_variations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attribute_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_price` int(10) UNSIGNED DEFAULT NULL,
  `date_on_sale_from` timestamp NULL DEFAULT NULL,
  `date_on_sale_to` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_variations`
--

INSERT INTO `product_variations` (`id`, `attribute_id`, `product_id`, `value`, `price`, `quantity`, `sku`, `sale_price`, `date_on_sale_from`, `date_on_sale_to`, `created_at`, `updated_at`, `deleted_at`) VALUES
(27, 4, 11, 'S', 50000, 0, '101', 30000, '2023-06-25 08:04:43', '2024-07-03 08:04:43', '2023-06-25 07:50:22', '2023-06-25 08:05:53', NULL),
(28, 4, 11, 'M', 60000, 0, '101', 40000, '2023-06-25 08:04:43', '2024-07-09 08:04:43', '2023-06-25 07:50:22', '2023-07-01 19:00:58', NULL),
(29, 4, 11, 'XL', 75000, 7, '101', NULL, NULL, NULL, '2023-06-25 07:50:22', '2023-07-07 16:31:03', NULL),
(30, 4, 12, 'S', 70000, 4, '101', 68000, '2023-06-25 08:08:17', '2024-07-15 08:08:17', '2023-06-25 08:08:07', '2023-06-25 08:09:07', NULL),
(31, 4, 12, 'L', 85000, 3, '101', 63000, '2023-06-25 08:08:17', '2024-07-10 08:08:17', '2023-06-25 08:08:07', '2023-07-07 10:07:50', NULL),
(32, 4, 12, 'XL', 90000, 1, '101', NULL, NULL, NULL, '2023-06-25 08:08:07', '2023-07-01 18:12:39', NULL),
(33, 4, 12, 'XXL', 105000, 0, '101', 60000, '2023-06-25 08:08:17', '2024-07-13 08:08:17', '2023-06-25 08:08:07', '2023-07-01 06:49:46', NULL),
(34, 4, 13, 'S', 50000, 4, '201', NULL, NULL, NULL, '2023-06-25 08:12:58', '2023-06-25 08:12:58', NULL),
(35, 4, 13, 'M', 60000, 2, '201', NULL, NULL, NULL, '2023-06-25 08:12:58', '2023-07-01 06:48:58', NULL),
(36, 4, 13, 'L', 65000, 3, '201', 46000, '2023-06-25 08:13:06', '2024-07-15 08:13:06', '2023-06-25 08:12:58', '2023-07-07 16:31:03', NULL),
(37, 4, 14, 'L', 235000, 9, '301', 200000, '2023-06-25 08:16:17', '2024-07-02 08:16:17', '2023-06-25 08:16:04', '2023-06-25 08:16:42', NULL),
(38, 4, 14, 'XL', 249000, 6, '301', NULL, NULL, NULL, '2023-06-25 08:16:04', '2023-06-25 08:16:04', NULL),
(39, 4, 14, 'XXL', 266000, 2, '301', 250000, '2023-06-25 08:16:17', '2024-07-10 08:16:17', '2023-06-25 08:16:04', '2023-06-25 08:16:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'خراسان رضوی', NULL, NULL),
(2, 'تهران', NULL, NULL),
(3, 'قم', NULL, NULL),
(4, 'سیستان و بلوچستان', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `guard_name`, `created_at`, `updated_at`) VALUES
(3, 'admin', 'ادمین', 'web', '2023-07-05 07:12:23', '2023-07-05 07:12:23'),
(4, 'products_management', 'مدیریت محصولات', 'web', '2023-07-05 07:13:44', '2023-07-05 07:13:44'),
(5, 'users_management', 'مدیریت کاربران', 'web', '2023-07-05 07:14:21', '2023-07-05 07:14:21'),
(6, 'orders_management', 'مدیریت سفارشات', 'web', '2023-07-05 07:14:45', '2023-07-05 07:14:45'),
(7, 'settings_management', 'مدیریت تنظیمات سایت', 'web', '2023-07-05 07:15:09', '2023-07-05 07:15:09');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(10, 3),
(10, 5),
(11, 3),
(11, 4),
(12, 3),
(12, 6),
(13, 3),
(13, 7);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telegram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `address`, `telephone`, `telephone2`, `longitude`, `latitude`, `instagram`, `telegram`, `facebook`, `created_at`, `updated_at`) VALUES
(1, 'طبرسی شمالی 12 سوختانلو 13', '09931681273', '09232035866', '59.54444900', '36.32606200', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'کت', '2023-03-24 07:39:07', '2023-03-24 09:05:17'),
(2, 'پیراهن', '2023-03-24 09:05:28', '2023-03-24 09:05:28'),
(3, 'دامن', '2023-03-24 09:05:40', '2023-03-24 09:05:40'),
(4, 'ژاکت', '2023-03-24 09:05:49', '2023-03-24 09:05:49');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `amount` int(10) UNSIGNED NOT NULL,
  `ref_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gateway` enum('zarinpal','pay') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `order_id`, `amount`, `ref_id`, `token`, `description`, `gateway`, `status`, `created_at`, `updated_at`) VALUES
(23, 11, 25, 66000, '12345678', '000000000000000000000000000001155326', NULL, 'zarinpal', 1, '2023-07-07 10:07:45', '2023-07-07 10:07:50'),
(24, 11, 25, 66000, '12345678', '000000000000000000000000000001155326', NULL, 'zarinpal', 0, '2023-07-07 10:07:45', '2023-07-07 10:07:50'),
(25, 11, 25, 66000, '12345678', '000000000000000000000000000001155326', NULL, 'zarinpal', 1, '2023-07-07 10:07:45', '2023-07-07 10:07:50'),
(26, 11, 25, 66000, '12345678', '000000000000000000000000000001155326', NULL, 'zarinpal', 0, '2023-11-10 10:07:50', '2023-11-10 10:07:50'),
(27, 11, 26, 66000, NULL, '000000000000000000000000000001155350', NULL, 'zarinpal', 0, '2023-07-07 10:46:04', '2023-07-07 10:46:04'),
(28, 11, 27, 435000, NULL, '000000000000000000000000000001155465', NULL, 'zarinpal', 0, '2023-07-07 13:43:34', '2023-07-07 13:43:34'),
(29, 12, 25, 66000, '12345678', '000000000000000000000000000001155461', NULL, 'zarinpal', 1, '2023-01-04 13:54:29', '2023-01-04 13:54:29'),
(30, 12, 26, 550000, '12345678', '000000000000000000000000000001155463', NULL, 'zarinpal', 1, '2023-02-11 13:54:29', '2023-02-11 13:54:29'),
(31, 11, 28, 203000, '12345678', '000000000000000000000000000001155529', NULL, 'zarinpal', 1, '2023-07-07 16:30:58', '2023-07-07 16:31:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cellphone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avater` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `otp` int(11) DEFAULT NULL,
  `login_token` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `cellphone`, `avater`, `status`, `otp`, `login_token`, `provider_name`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(11, 'Amir', 'amir@gmail.com', '09100000000', '2023_7_5_10_33_48_802944_champion_male.png', 1, NULL, NULL, NULL, NULL, '$2y$10$INhChiTEnh4mLzU5Es5sqeviSwylHyTmB5s.RzDCqri34j4op/mj.', NULL, NULL, NULL, NULL, '2023-07-05 06:57:53', '2023-07-08 10:10:33'),
(12, 'Ali', 'ali@gmail.com', '09100000000', '2023_7_5_10_33_37_807507_tourist_male.png', 1, NULL, NULL, NULL, NULL, '$2y$10$Dsboo6ziUCzmfaypjga9levwEkvJh3sZZvtWXAyTRC81GxeTzdysi', NULL, NULL, NULL, NULL, '2023-07-05 06:58:55', '2023-07-05 07:03:37'),
(13, 'Reza', 'raza@gmail.com', '09100000000', '2023_7_5_10_33_22_32347_waiter_male.png', 1, NULL, NULL, NULL, NULL, '$2y$10$Qj4zNlDCEQD3JNEf/PnmIu5Mc.NF8lV5BStAkTCR9TU0neGdl2wIe', NULL, NULL, NULL, NULL, '2023-07-05 06:59:37', '2023-07-05 07:03:22'),
(14, 'sara', 'sara@gmail.com', '09100000000', '2023_7_5_10_32_54_223613_african_american_female.png', 1, NULL, NULL, NULL, NULL, '$2y$10$5iDylCA2AnAqL4npKqduq.ZLKmyGleN0Vr/na0zXXtOaqNUykeysi', NULL, NULL, NULL, NULL, '2023-07-05 07:00:24', '2023-07-05 07:02:54'),
(15, 'hasan', 'hasan@gmail.com', '09100000000', '2023_7_5_10_32_41_250757_african_american_male.png', 1, NULL, NULL, NULL, NULL, '$2y$10$2Yx6psn/1zu4nbuqC22B/uv2HNLi7p0ai4foBMWAwCp27D6Anv28O', NULL, NULL, NULL, NULL, '2023-07-05 07:01:06', '2023-07-05 07:02:41'),
(16, 'Mohsen', 'mohsen@gamil.com', NULL, NULL, 1, NULL, NULL, NULL, NULL, '$2y$10$K961dQf.ca6x3yxVwq5Cu.dDrgm78C5gPWgJHsViw9Rr7dG./LmoS', NULL, NULL, NULL, NULL, '2023-07-05 08:40:46', '2023-07-05 08:40:46'),
(17, NULL, NULL, '09111111111', NULL, 1, 600353, '$2y$10$RAAXlqxZg6oYhhHfKfEyLeOAItXBPQvTVg6uOeYRAp0C51U05fSIW', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-08 10:19:13', '2023-07-08 10:19:16'),
(18, 'Amisssr', 'amssssir@gmail.com', NULL, NULL, 1, NULL, NULL, NULL, NULL, '$2y$10$4xVAEE/XtaKQ4GPhs/ZFpeEuFxiEI6dg0.XQOcgcEeUUwfuaj5tA.', NULL, NULL, NULL, NULL, '2023-07-08 11:03:39', '2023-07-08 11:03:39'),
(19, 'aaaaaa', 'aaaaaaaaaaaaawwwwwaaaali@gmail.com', NULL, NULL, 1, NULL, NULL, NULL, NULL, '$2y$10$tLJd65s9aL6BkciQFeyF/OAaVLPRV2c589ohAs3l5dXHXGlgY/sz.', NULL, NULL, NULL, NULL, '2023-07-08 13:48:58', '2023-07-08 13:48:58');

-- --------------------------------------------------------

--
-- Table structure for table `user_addresses`
--

CREATE TABLE `user_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cellphone` varchar(199) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `province_id` bigint(20) NOT NULL,
  `city_id` bigint(20) NOT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_addresses`
--

INSERT INTO `user_addresses` (`id`, `title`, `address`, `cellphone`, `postal_code`, `user_id`, `province_id`, `city_id`, `longitude`, `latitude`, `created_at`, `updated_at`) VALUES
(5, 'خانه1', 'خیابان فلان کوچه فلان', '09100000000', '1619735744', 11, 1, 1, NULL, NULL, '2023-07-07 10:07:27', '2023-07-07 10:07:27');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attribute_category`
--
ALTER TABLE `attribute_category`
  ADD PRIMARY KEY (`attribute_id`,`category_id`),
  ADD KEY `attribute_category_category_id_foreign` (`category_id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_slug_unique` (`slug`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_province_id_foreign` (`province_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_product_id_foreign` (`product_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
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
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_address_id_foreign` (`address_id`),
  ADD KEY `orders_coupon_id_foreign` (`coupon_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`),
  ADD KEY `order_items_product_variation_id_foreign` (`product_variation_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

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
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_brand_id_foreign` (`brand_id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_attributes_attribute_id_foreign` (`attribute_id`),
  ADD KEY `product_attributes_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_rates`
--
ALTER TABLE `product_rates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_rates_user_id_foreign` (`user_id`),
  ADD KEY `product_rates_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_tag`
--
ALTER TABLE `product_tag`
  ADD PRIMARY KEY (`tag_id`,`product_id`),
  ADD KEY `product_tag_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_variations`
--
ALTER TABLE `product_variations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_variations_attribute_id_foreign` (`attribute_id`),
  ADD KEY `product_variations_product_id_foreign` (`product_id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`),
  ADD KEY `transactions_order_id_foreign` (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_addresses`
--
ALTER TABLE `user_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_addresses_user_id_foreign` (`user_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`user_id`,`product_id`),
  ADD KEY `wishlist_product_id_foreign` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `product_rates`
--
ALTER TABLE `product_rates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_variations`
--
ALTER TABLE `product_variations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_addresses`
--
ALTER TABLE `user_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attribute_category`
--
ALTER TABLE `attribute_category`
  ADD CONSTRAINT `attribute_category_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attribute_category_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_address_id_foreign` FOREIGN KEY (`address_id`) REFERENCES `user_addresses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_coupon_id_foreign` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_variation_id_foreign` FOREIGN KEY (`product_variation_id`) REFERENCES `product_variations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD CONSTRAINT `product_attributes_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_attributes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_rates`
--
ALTER TABLE `product_rates`
  ADD CONSTRAINT `product_rates_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_rates_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_tag`
--
ALTER TABLE `product_tag`
  ADD CONSTRAINT `product_tag_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_variations`
--
ALTER TABLE `product_variations`
  ADD CONSTRAINT `product_variations_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_variations_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_addresses`
--
ALTER TABLE `user_addresses`
  ADD CONSTRAINT `user_addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlist_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
