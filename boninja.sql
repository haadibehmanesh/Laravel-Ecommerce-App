-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2018 at 05:25 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.1.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `boninja`
--

-- --------------------------------------------------------

--
-- Table structure for table `bi_cart`
--

CREATE TABLE `bi_cart` (
  `id` int(11) UNSIGNED NOT NULL,
  `api_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `session_id` varchar(32) CHARACTER SET utf8 NOT NULL,
  `product_id` int(11) NOT NULL,
  `recurring_id` int(11) NOT NULL,
  `option` text CHARACTER SET utf8 NOT NULL,
  `quantity` int(5) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bi_categories`
--

CREATE TABLE `bi_categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `parent_id` int(11) DEFAULT '0',
  `language_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` int(11) DEFAULT '0',
  `top` tinyint(4) DEFAULT NULL,
  `column` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bi_categories`
--

INSERT INTO `bi_categories` (`id`, `parent_id`, `language_id`, `name`, `description`, `image`, `sort_order`, `top`, `column`, `status`, `created_at`, `updated_at`, `meta_title`, `meta_description`, `meta_keyword`, `slug`, `icon`) VALUES
(1, NULL, NULL, 'تفریح و ورزشی', 'تفریح و ورزشی', NULL, 2, NULL, NULL, 1, '2018-07-19 04:06:00', '2018-08-27 06:05:49', NULL, NULL, NULL, 'تفریح-و-ورزشی', 'fa-futbol-o'),
(2, NULL, NULL, 'رستوران و کافی شاپ', 'رستوران و کافی شاپ', 'bi-categories\\August2018\\VtbdxGEx6zcKlT5o63VA.jpg', 1, NULL, NULL, 1, '2018-07-19 09:34:00', '2018-08-01 08:12:30', NULL, NULL, NULL, 'رستوران-و-کافی-شاپ', 'fa-cutlery'),
(3, NULL, NULL, 'زیبایی و آرایشی', 'زیبایی و آرایشی', NULL, 6, NULL, NULL, 1, '2018-07-20 05:50:00', '2018-08-01 08:31:57', NULL, NULL, NULL, 'زیبایی-و-آرایشی', 'fa-scissors'),
(4, NULL, NULL, 'پزشکی و سلامت', 'پزشکی و سلامت', NULL, 3, NULL, NULL, 1, '2018-07-28 06:11:00', '2018-08-01 08:21:34', NULL, NULL, NULL, 'پزشکی-و-سلامت', 'fa-heartbeat'),
(7, NULL, NULL, 'هنر و تئاتر', 'هنر و تئاتر', NULL, 4, NULL, NULL, 1, '2018-08-01 04:45:00', '2018-08-01 08:24:14', NULL, NULL, NULL, 'هنر-و-تئاتر', 'fa-film'),
(8, NULL, NULL, 'آموزشی', 'آموزشی', NULL, 5, NULL, NULL, 1, '2018-08-01 04:46:00', '2018-08-01 08:25:15', NULL, NULL, NULL, 'آموزشی', 'fa-graduation-cap'),
(9, NULL, NULL, 'بن های فروشگاهی', 'بن های فروشگاهی', NULL, 8, NULL, NULL, 1, '2018-08-01 04:47:00', '2018-08-19 07:06:23', NULL, NULL, NULL, 'بن-های-فروشگاهی', 'fa-shopping-bag'),
(10, 2, NULL, 'غذای ایرانی و سنتی', 'غذای ایرانی و سنتی', NULL, NULL, NULL, NULL, 1, '2018-08-01 04:48:00', '2018-08-01 04:57:46', NULL, NULL, NULL, 'غذای-ایرانی-و-سنتی', NULL),
(11, 2, NULL, 'غذای ایتالیایی و بین المللی', 'غذای ایتالیایی و بین المللی', NULL, NULL, NULL, NULL, 1, '2018-08-01 04:52:00', '2018-08-01 06:37:36', NULL, NULL, NULL, 'غذای-ایتالیایی-و-بین-المللی', NULL),
(12, 2, NULL, 'فست فود', 'فست فود', NULL, NULL, NULL, NULL, 1, '2018-08-01 04:53:11', '2018-08-01 04:53:11', NULL, NULL, NULL, 'فست-فود', NULL),
(13, 2, NULL, 'سفره خانه', 'سفره خانه', NULL, NULL, NULL, NULL, 1, '2018-08-01 04:53:32', '2018-08-01 04:53:32', NULL, NULL, NULL, 'سفره-خانه', NULL),
(14, 2, NULL, 'بوفه', 'بوفه', NULL, NULL, NULL, NULL, 1, '2018-08-01 04:53:58', '2018-08-01 04:53:58', NULL, NULL, NULL, 'بوفه', NULL),
(16, 2, NULL, 'کافی شاپ', 'کافی شاپ', NULL, NULL, NULL, NULL, 1, '2018-08-01 04:56:00', '2018-08-01 04:57:10', NULL, NULL, NULL, 'کافی-شاپ', NULL),
(18, 2, NULL, 'صبحانه', 'صبحانه', NULL, NULL, NULL, NULL, 1, '2018-08-01 04:58:19', '2018-08-01 04:58:19', NULL, NULL, NULL, 'صبحانه', NULL),
(19, 1, NULL, 'تورهای مسافرتی', 'تورهای مسافرتی', NULL, NULL, NULL, NULL, 1, '2018-08-01 07:51:16', '2018-08-01 07:51:17', NULL, NULL, NULL, 'تورهای-مسافرتی', NULL),
(20, 1, NULL, 'هتل و اقامتگاه', 'هتل و اقامتگاه', NULL, NULL, NULL, NULL, 1, '2018-08-03 04:11:23', '2018-08-03 04:11:23', NULL, NULL, NULL, 'هتل-و-اقامتگاه', NULL),
(21, 1, NULL, 'شهربازی و مراکز تفریحی', 'شهربازی و مراکز تفریحی', NULL, NULL, NULL, NULL, 1, '2018-08-03 04:12:28', '2018-08-03 04:12:28', NULL, NULL, NULL, 'شهربازی-و-مراکز-تفریحی', NULL),
(22, 1, NULL, 'بازی های گروهی و زمین بازی', 'بازی های گروهی و زمین بازی', NULL, NULL, NULL, NULL, 1, '2018-08-03 04:12:56', '2018-08-03 04:12:56', NULL, NULL, NULL, 'بازی-های-گروهی-و-زمین-بازی', NULL),
(23, 1, NULL, 'استخر و ورزش های آبی', 'استخر و ورزش های آبی', NULL, NULL, NULL, NULL, 1, '2018-08-03 04:13:23', '2018-08-03 04:13:23', NULL, NULL, NULL, 'استخر-و-ورزش-های-آبی', NULL),
(24, 1, NULL, 'ورزش های هوایی', 'ورزش های هوایی', NULL, NULL, NULL, NULL, 1, '2018-08-03 04:42:39', '2018-08-03 04:42:39', NULL, NULL, NULL, 'ورزش-های-هوایی', NULL),
(26, NULL, NULL, 'خدمات', 'خدمات', NULL, 7, NULL, NULL, 1, '2018-08-19 06:18:00', '2018-08-19 07:05:20', NULL, NULL, NULL, 'خدمات', 'fa-wrench'),
(27, 4, NULL, 'ماساژ و آب درمانی', 'ماساژ و آب درمانی', NULL, NULL, NULL, NULL, 1, '2018-08-26 03:21:36', '2018-08-26 03:21:36', NULL, NULL, NULL, 'ماساژ-و-آب-درمانی', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bi_category_bi_product`
--

CREATE TABLE `bi_category_bi_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `bi_product_id` int(10) UNSIGNED DEFAULT NULL,
  `bi_category_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bi_category_bi_product`
--

INSERT INTO `bi_category_bi_product` (`id`, `bi_product_id`, `bi_category_id`, `created_at`, `updated_at`) VALUES
(11, 1, 1, '2018-07-20 07:11:45', '2018-07-20 07:11:45'),
(12, 1, 3, '2018-07-20 07:11:45', '2018-07-20 07:11:45'),
(20, 2, 2, '2018-07-21 08:07:53', '2018-07-21 08:07:53'),
(21, 2, 3, '2018-07-21 08:07:53', '2018-07-21 08:07:53'),
(35, 5, 3, '2018-08-03 03:49:13', '2018-08-03 03:49:13'),
(36, 5, 4, '2018-08-03 03:49:13', '2018-08-03 03:49:13'),
(106, 9, 2, '2018-08-25 06:44:14', '2018-08-25 06:44:14'),
(107, 9, 12, '2018-08-25 06:44:14', '2018-08-25 06:44:14'),
(108, 7, 1, '2018-08-25 07:06:11', '2018-08-25 07:06:11'),
(109, 7, 21, '2018-08-25 07:06:11', '2018-08-25 07:06:11'),
(110, 7, 23, '2018-08-25 07:06:12', '2018-08-25 07:06:12'),
(115, 4, 3, '2018-08-26 09:23:33', '2018-08-26 09:23:33'),
(116, 4, 4, '2018-08-26 09:23:33', '2018-08-26 09:23:33'),
(171, 10, 2, '2018-09-02 03:06:58', '2018-09-02 03:06:58'),
(172, 10, 16, '2018-09-02 03:06:58', '2018-09-02 03:06:58'),
(173, 8, 2, '2018-09-02 03:07:28', '2018-09-02 03:07:28'),
(174, 8, 12, '2018-09-02 03:07:28', '2018-09-02 03:07:28'),
(175, 6, 2, '2018-09-02 03:07:41', '2018-09-02 03:07:41'),
(176, 6, 11, '2018-09-02 03:07:41', '2018-09-02 03:07:41'),
(177, 6, 14, '2018-09-02 03:07:41', '2018-09-02 03:07:41');

-- --------------------------------------------------------

--
-- Table structure for table `bi_coupons`
--

CREATE TABLE `bi_coupons` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` decimal(10,0) DEFAULT NULL,
  `logged` tinyint(4) DEFAULT NULL,
  `shipping` tinyint(4) DEFAULT NULL,
  `total` decimal(10,0) DEFAULT NULL,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `uses_total` int(11) DEFAULT NULL,
  `uses_customer` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bi_customers`
--

CREATE TABLE `bi_customers` (
  `id` int(11) NOT NULL,
  `store_id` int(11) DEFAULT '0',
  `language_id` int(11) DEFAULT NULL,
  `firstname` varchar(32) DEFAULT NULL,
  `lastname` varchar(32) DEFAULT NULL,
  `telephone` varchar(32) DEFAULT NULL,
  `fax` varchar(32) DEFAULT NULL,
  `salt` varchar(9) DEFAULT NULL,
  `cart` text,
  `wishlist` text,
  `newsletter` tinyint(4) DEFAULT '0',
  `address_id` int(11) DEFAULT '0',
  `custom_field` text,
  `ip` varchar(40) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `safe` tinyint(4) DEFAULT NULL,
  `token` text,
  `code` varchar(40) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bi_customers`
--

INSERT INTO `bi_customers` (`id`, `store_id`, `language_id`, `firstname`, `lastname`, `telephone`, `fax`, `salt`, `cart`, `wishlist`, `newsletter`, `address_id`, `custom_field`, `ip`, `status`, `safe`, `token`, `code`, `created_at`, `updated_at`, `customer_id`) VALUES
(10, 0, NULL, 'hadi', 'behmanesh', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-09-03 11:25:36', 1),
(11, 0, NULL, 'hamid', 'alizadeh', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-09-03 10:48:49', 11),
(12, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 15),
(13, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16);

-- --------------------------------------------------------

--
-- Table structure for table `bi_c_groups`
--

CREATE TABLE `bi_c_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `language_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bi_c_groups`
--

INSERT INTO `bi_c_groups` (`id`, `name`, `description`, `language_id`, `created_at`, `updated_at`) VALUES
(1, 'VIP', 'Very Important People', NULL, '2018-07-22 10:13:32', '2018-07-22 10:13:32'),
(2, 'vip 2', NULL, NULL, '2018-07-22 11:11:29', '2018-07-22 11:11:29'),
(3, 'vip 3', 'vip 3', NULL, '2018-08-22 07:59:07', '2018-08-22 07:59:07');

-- --------------------------------------------------------

--
-- Table structure for table `bi_c_group_bi_customer`
--

CREATE TABLE `bi_c_group_bi_customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `bi_c_group_id` int(11) NOT NULL,
  `bi_customer_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bi_c_group_bi_customer`
--

INSERT INTO `bi_c_group_bi_customer` (`id`, `bi_c_group_id`, `bi_customer_id`, `created_at`, `updated_at`) VALUES
(12, 1, 3, '2018-08-22 08:40:32', '2018-08-22 08:40:32'),
(13, 3, 3, '2018-08-22 08:40:32', '2018-08-22 08:40:32');

-- --------------------------------------------------------

--
-- Table structure for table `bi_merchants`
--

CREATE TABLE `bi_merchants` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` text COLLATE utf8mb4_unicode_ci,
  `geocode` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `city_id` int(11) DEFAULT NULL,
  `postcode` varchar(18) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `region_id` int(11) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `contract_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `ip` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bi_merchants`
--

INSERT INTO `bi_merchants` (`id`, `company_name`, `email`, `first_name`, `last_name`, `tel`, `mobile`, `description`, `image`, `geocode`, `address`, `city_id`, `postcode`, `country_id`, `region_id`, `start_date`, `end_date`, `contract_date`, `created_at`, `updated_at`, `status`, `ip`, `customer_id`) VALUES
(1, 'haftkhan', 'haftkhan@boninja.com', NULL, NULL, '071388818818', '09178883333', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-24 02:57:10', '2018-07-24 02:57:10', 1, NULL, 0),
(2, 'soofi', 'soofi@boninja.com', NULL, NULL, '03423423', '03423423423', NULL, NULL, NULL, 'shiraz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-24 03:39:00', '2018-07-24 03:39:40', 1, NULL, 0),
(3, 'Hadi Shop', NULL, NULL, NULL, '07137213344', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-24 09:20:32', '2018-08-24 09:20:32', 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bi_m_groups`
--

CREATE TABLE `bi_m_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `language_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bi_m_groups`
--

INSERT INTO `bi_m_groups` (`id`, `name`, `description`, `language_id`, `created_at`, `updated_at`) VALUES
(1, 'Popular', NULL, NULL, '2018-07-24 03:34:20', '2018-07-24 03:34:20');

-- --------------------------------------------------------

--
-- Table structure for table `bi_m_group_bi_merchant`
--

CREATE TABLE `bi_m_group_bi_merchant` (
  `id` int(10) UNSIGNED NOT NULL,
  `bi_merchant_id` int(11) NOT NULL,
  `bi_m_group_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bi_m_group_bi_merchant`
--

INSERT INTO `bi_m_group_bi_merchant` (`id`, `bi_merchant_id`, `bi_m_group_id`, `created_at`, `updated_at`) VALUES
(2, 2, 1, '2018-07-24 03:47:02', '2018-07-24 03:47:02');

-- --------------------------------------------------------

--
-- Table structure for table `bi_orders`
--

CREATE TABLE `bi_orders` (
  `id` int(11) NOT NULL,
  `invoice_no` int(11) DEFAULT '0',
  `invoice_prefix` varchar(26) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `store_id` int(11) DEFAULT '0',
  `store_name` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `store_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` int(11) DEFAULT '0',
  `customer_group_id` int(11) DEFAULT '0',
  `firstname` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(96) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `custom_field` text COLLATE utf8mb4_unicode_ci,
  `payment_firstname` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_lastname` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_company` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_address_1` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_address_2` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_city` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_postcode` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_country` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_country_id` int(11) DEFAULT NULL,
  `payment_zone` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_zone_id` int(11) DEFAULT NULL,
  `payment_address_format` text COLLATE utf8mb4_unicode_ci,
  `payment_custom_field` text COLLATE utf8mb4_unicode_ci,
  `payment_method` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_code` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_firstname` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_lastname` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_company` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_1` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_2` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_city` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_postcode` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_country` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_country_id` int(11) DEFAULT NULL,
  `shipping_zone` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_zone_id` int(11) DEFAULT NULL,
  `shipping_address_format` text COLLATE utf8mb4_unicode_ci,
  `shipping_custom_field` text COLLATE utf8mb4_unicode_ci,
  `shipping_method` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_code` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `total` decimal(10,0) DEFAULT NULL,
  `order_status_id` int(11) DEFAULT '0',
  `affiliate_id` int(11) DEFAULT NULL,
  `commission` decimal(15,4) DEFAULT NULL,
  `marketing_id` int(11) DEFAULT NULL,
  `tracking` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language_id` int(11) DEFAULT NULL,
  `currency_id` int(11) DEFAULT NULL,
  `currency_code` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_value` decimal(15,8) DEFAULT '1.00000000',
  `ip` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `forwarded_ip` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accept_language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `order_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bi_orders`
--

INSERT INTO `bi_orders` (`id`, `invoice_no`, `invoice_prefix`, `store_id`, `store_name`, `store_url`, `customer_id`, `customer_group_id`, `firstname`, `lastname`, `email`, `telephone`, `fax`, `custom_field`, `payment_firstname`, `payment_lastname`, `payment_company`, `payment_address_1`, `payment_address_2`, `payment_city`, `payment_postcode`, `payment_country`, `payment_country_id`, `payment_zone`, `payment_zone_id`, `payment_address_format`, `payment_custom_field`, `payment_method`, `payment_code`, `shipping_firstname`, `shipping_lastname`, `shipping_company`, `shipping_address_1`, `shipping_address_2`, `shipping_city`, `shipping_postcode`, `shipping_country`, `shipping_country_id`, `shipping_zone`, `shipping_zone_id`, `shipping_address_format`, `shipping_custom_field`, `shipping_method`, `shipping_code`, `comment`, `total`, `order_status_id`, `affiliate_id`, `commission`, `marketing_id`, `tracking`, `language_id`, `currency_id`, `currency_code`, `currency_value`, `ip`, `forwarded_ip`, `user_agent`, `accept_language`, `created_at`, `updated_at`, `order_code`) VALUES
(76, 861734, NULL, 0, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7920', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1.00000000', NULL, NULL, NULL, NULL, '2018-08-25 11:13:08', '2018-08-25 11:13:08', '31246785'),
(80, 782391, NULL, 0, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '90000', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1.00000000', NULL, NULL, NULL, NULL, '2018-08-30 21:07:38', '2018-08-30 21:07:38', '62487135'),
(81, 721639, NULL, 0, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8600', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1.00000000', NULL, NULL, NULL, NULL, '2018-09-03 02:26:40', '2018-09-03 02:26:40', '98654273'),
(79, 138796, NULL, 0, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '31720', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1.00000000', NULL, NULL, NULL, NULL, '2018-08-26 02:58:45', '2018-08-26 02:58:45', '12579486'),
(78, 479163, NULL, 0, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7920', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1.00000000', NULL, NULL, NULL, NULL, '2018-08-25 11:58:29', '2018-08-25 11:58:29', '57461893'),
(77, 352798, NULL, 0, NULL, NULL, 11, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '45000', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1.00000000', NULL, NULL, NULL, NULL, '2018-08-25 11:28:26', '2018-08-25 11:28:26', '98261437');

-- --------------------------------------------------------

--
-- Table structure for table `bi_order_items`
--

CREATE TABLE `bi_order_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `bi_order_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `total` decimal(10,0) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bi_product_id` int(11) DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code_used_count` smallint(6) NOT NULL DEFAULT '0',
  `bi_merchant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bi_order_items`
--

INSERT INTO `bi_order_items` (`id`, `bi_order_id`, `name`, `price`, `total`, `quantity`, `created_at`, `updated_at`, `bi_product_id`, `code`, `code_used_count`, `bi_merchant_id`) VALUES
(17, 76, 'کافه پرستیژ با منو باز کافه، منو مزه یا غذایی', '7920', '7920', 1, '2018-08-25 11:13:08', '2018-08-25 11:13:08', 8, '98514273', 0, 3),
(18, 77, 'دلفیناریوم برج میلاد', '45000', '45000', 1, '2018-08-25 11:28:26', '2018-08-25 11:28:26', 7, '23691457', 0, 1),
(19, 78, 'کافه پرستیژ با منو باز کافه، منو مزه یا غذایی', '7920', '7920', 1, '2018-08-25 11:58:29', '2018-08-25 11:58:29', 8, '75324698', 0, 3),
(20, 79, 'فست فود داوین با منو باز غذاهای لذیذ', '7930', '31720', 4, '2018-08-26 02:58:45', '2018-08-26 02:58:45', 9, '59412763', 0, 3),
(21, 80, 'کافه هنر شیراز', '15000', '45000', 3, '2018-08-30 21:07:38', '2018-08-30 21:07:38', 10, '75943862', 0, 2),
(22, 80, 'دلفیناریوم برج میلاد', '45000', '45000', 1, '2018-08-30 21:07:38', '2018-08-30 21:07:38', 7, '95872143', 0, 1),
(23, 81, 'آرایشگاه کاملیا', '8600', '8600', 1, '2018-09-03 02:26:40', '2018-09-03 02:26:40', 4, '27614859', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bi_order_status`
--

CREATE TABLE `bi_order_status` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bi_products`
--

CREATE TABLE `bi_products` (
  `id` int(11) NOT NULL,
  `language_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `tag` text COLLATE utf8mb4_unicode_ci,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bi_merchant_id` int(11) DEFAULT NULL,
  `shipping` tinyint(4) DEFAULT '1',
  `price` decimal(10,0) NOT NULL DEFAULT '0',
  `points` int(11) DEFAULT '0',
  `date_available` date DEFAULT NULL,
  `minimum` int(11) DEFAULT '1',
  `sort_order` int(11) DEFAULT '0',
  `status` tinyint(4) DEFAULT '0',
  `viewed` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` int(11) NOT NULL,
  `sold` int(11) DEFAULT '0',
  `featured` tinyint(4) DEFAULT '0',
  `gallery` text COLLATE utf8mb4_unicode_ci,
  `attributies` text COLLATE utf8mb4_unicode_ci,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `usage_terms` text COLLATE utf8mb4_unicode_ci,
  `description_details` text COLLATE utf8mb4_unicode_ci,
  `cat_featured` tinyint(4) DEFAULT NULL,
  `index_gallery` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bi_products`
--

INSERT INTO `bi_products` (`id`, `language_id`, `name`, `description`, `tag`, `meta_title`, `meta_description`, `meta_keyword`, `model`, `location`, `quantity`, `image`, `bi_merchant_id`, `shipping`, `price`, `points`, `date_available`, `minimum`, `sort_order`, `status`, `viewed`, `created_at`, `updated_at`, `slug`, `discount`, `sold`, `featured`, `gallery`, `attributies`, `start_date`, `end_date`, `usage_terms`, `description_details`, `cat_featured`, `index_gallery`) VALUES
(3, NULL, 'آرایشگاه النا', '<p><span style=\"color: #707070; font-family: IRANSans; font-size: 21.3333px; background-color: #f2f2f2;\">&nbsp;</span></p>\r\n<h2 style=\"box-sizing: border-box; font-weight: normal; font-family: IRANSans; line-height: 29px; color: #000000; margin-top: 20px; margin-bottom: 10px; font-size: 16px; display: inline;\">کاشت ناخن درآرایشگاه النا با ۸۰% تخفیف</h2>', NULL, NULL, NULL, NULL, 'آرایشگاه النا', NULL, 20, 'bi-products\\July2018\\KKcrRb0idOkQWMNfvtW7.jpg', 3, 0, '40000', NULL, NULL, NULL, 0, 1, NULL, '2018-07-27 04:14:00', '2018-08-06 09:31:05', 'آرایشگاه-النا', 30, 5, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, NULL, 'آرایشگاه کاملیا', '<p><span style=\"color: #000000; font-family: IRANSans; font-size: 16px; background-color: #f2f2f2;\">کاشت مژه در آرایشگاه کاملیا با ۸۰% تخفیف</span></p>', NULL, NULL, NULL, NULL, 'آرایشگاه کاملیا', NULL, 10, 'bi-products\\July2018\\mYqwXdCUKmKMyCxzGHis.jpg', 1, 0, '20000', NULL, NULL, NULL, 0, 1, NULL, '2018-07-27 05:04:00', '2018-09-03 02:26:41', 'آرایشگاه-کاملیا', 57, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1),
(5, NULL, 'آرایشگاه مردانه اس تی پی STP', '<p><span style=\"color: #000000; font-family: IRANSans; font-size: 16px; background-color: #f2f2f2;\">کوتاهی ، شستشو و حالت دادن مو در آرایشگاه مردانه اس تی پی STP با ۸۶% تخفیف</span></p>', NULL, NULL, NULL, NULL, 'آرایشگاه مردانه اس تی پی STP', NULL, 20, 'bi-products\\July2018\\VJRSmbZJ7NCE6E3qt8Y5.jpg', 2, 0, '40000', NULL, NULL, NULL, 0, 1, NULL, '2018-07-27 05:06:00', '2018-08-03 03:49:13', 'آرایشگاه-مردانه-اس-تی-پی-stp', 24, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, NULL, 'افتتاحیه بوفه شام رستوران بین المللی ۵ ستاره اسفندیار', '<p><span style=\"color: #000000; font-family: IRANSans; font-size: 16px; background-color: #f2f2f2;\">با موسیقی زنده با ۳۰% تخفیف و پرداخت تنها ۷۷,۰۰۰ تومان به جای ۱۱۰,۰۰۰ تومان</span></p>', NULL, NULL, NULL, NULL, 'افتتاحیه بوفه شام رستوران بین المللی ۵ ستاره اسفندیار', NULL, 10, 'bi-products\\July2018\\yC8LK59okjxt6KkVPDg5.jpg', 1, 0, '100000', NULL, NULL, NULL, 0, 1, NULL, '2018-07-28 01:39:00', '2018-09-02 03:07:41', 'افتتاحیه-بوفه-شام-رستوران-بین-المللی-ستاره-اسفندیار', 50, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1),
(7, NULL, 'دلفیناریوم برج میلاد', '<p><span style=\"color: #000000; font-family: IRANSans; font-size: 16px; background-color: #f2f2f2;\">اولین و تنهاترین دلفیناریوم غیر ساحلی در ایران و خاورمیانه تا 60 درصد تخفیف استثنائی</span></p>', NULL, NULL, NULL, NULL, NULL, NULL, 10, 'bi-products\\July2018\\8QjoKtydxuuT3z3RMM7n.jpg', 1, 0, '50000', NULL, NULL, NULL, 0, 1, NULL, '2018-07-28 06:43:00', '2018-08-30 21:07:39', 'دلفیناریوم-برج-میلاد', 10, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1),
(8, NULL, 'کافه پرستیژ با منو باز کافه، منو مزه یا غذایی', '<p>کافه پرستیژ با منو باز کافه یا منو مزه یا غذاهای متنوع با 56% تخفیف و پرداخت تنها 7,920 تومان به جای 18,000 تومان</p>', NULL, NULL, NULL, NULL, NULL, NULL, 130, 'bi-products\\August2018\\ntlvI0rVO6VLIyfU84lf.jpg', 1, 0, '18000', NULL, NULL, NULL, 0, 1, NULL, '2018-08-03 06:05:00', '2018-09-02 03:07:28', 'کافه-پرستیژ-با-منو-باز-کافه-منو-مزه-یا-غذایی', 56, 13, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1),
(9, NULL, 'فست فود داوین با منو باز غذاهای لذیذ', 'فست فود داوین با منو باز غذاهای لذیذ', NULL, NULL, NULL, NULL, NULL, NULL, 28, 'bi-products\\August2018\\UVJKG8Um0gSGzFEQXarV.jpg', 3, 0, '13000', NULL, NULL, NULL, 0, 1, NULL, '2018-08-03 06:10:00', '2018-08-26 02:58:45', 'فست-فود-داوین-با-منو-باز-غذاهای-لذیذ', 39, 28, 1, '[\"bi-products\\\\August2018\\\\IaOeEGZ9eoaR732awWDz.jpg\",\"bi-products\\\\August2018\\\\AWYfRUlhiNaGEAUHmI92.jpg\"]', '<p style=\"text-align: right;\">&nbsp;بدون محدودیت در خرید</p>\r\n<p style=\"text-align: right;\">&nbsp;سانس آزاد بانوان</p>\r\n<p style=\"text-align: right;\">&nbsp;روزهای شنبه تا پنجشنبه &nbsp;ساعت 9 صبح الی 15:45</p>\r\n<p style=\"text-align: right;\">جمعه 9 الی 14:45</p>\r\n<p style=\"text-align: right;\">سانس آزاد آقایان</p>\r\n<p style=\"text-align: right;\">همه روزه 17 الی 23</p>\r\n<p style=\"text-align: right;\">&nbsp;مراجعه با هماهنگی و رزرو قبلی با تلفن : 44713219 - 44711155</p>\r\n<p style=\"text-align: right;\">قبل از خرید نت برگ بررسی های لازم را به عمل آورید</p>\r\n<p style=\"text-align: right;\">نت برگ خریداری شده قابل استرداد نمی باشد</p>\r\n<p style=\"text-align: right;\">&nbsp;نت برگی عزیز، استفاده از نت برگ خود را به روزهای پایانی موکول نفرمایید</p>\r\n<p style=\"text-align: right;\">رزرو و هماهنگی حداکثر تا دوهفته قبل از پایان مهلت استفاده</p>', NULL, NULL, '<p style=\"text-align: right;\">زمان استفاده تا تاریخ: 25 شهریورماه</p>\r\n<p style=\"text-align: right;\">ساعت پاسخگویی و سرویس دهی:&nbsp;<span style=\"box-sizing: border-box; color: #020a19;\">تمام وقت</span></p>\r\n<p style=\"text-align: right;\">روزهای سرویس دهی:&nbsp;<span style=\"box-sizing: border-box; color: #020a19;\">شنبه ، یکشنبه ، دوشنبه ، سه شنبه ، چهارشنبه ، پنجشنبه</span></p>\r\n<p style=\"text-align: right;\">تلفن تماس:&nbsp;<span style=\"box-sizing: border-box; color: #020a19;\">۰۵۱۳۸۵۵۵۸۱۵</span></p>\r\n<p style=\"text-align: right;\">آدرس:&nbsp;<span style=\"box-sizing: border-box; color: #020a19;\">مشهد - خیابان امام خمینی - خیابان خرمشهر - خرمشهر ۱۳</span></p>', '<p style=\"text-align: right;\">تا بحال به کافه زیبا و دنج&nbsp;<strong style=\"box-sizing: border-box; font-size: 1.4rem;\">پرستیژ</strong>&nbsp;رفته اید؟</p>\r\n<p style=\"text-align: right;\">اگر در نزدیکی میدان انقلاب هستید پیشنهاد نت برگ به شما کافه دنج و زیبا<strong style=\"box-sizing: border-box; font-size: 1.4rem;\">&nbsp;پرستیژ</strong>&nbsp;است. مطابق با ذائقه و سلیقه شما لیستی بلند بالا از منو کافه، منو مزه ها و غذایی را در&nbsp;<strong style=\"box-sizing: border-box; font-size: 1.4rem;\">کافه پرستیژ&nbsp;</strong>دور هم جمع آوری کرده است. سفارش دهید و به موسیقی گوش نوازی که در فضای&nbsp;<strong style=\"box-sizing: border-box; font-size: 1.4rem;\">کافه پرستیژ</strong>&nbsp;است گوش دهید و لذت ببرید</p>\r\n<p style=\"text-align: right;\">لحظاتی خوش را در&nbsp;<strong style=\"box-sizing: border-box; font-size: 1.4rem;\">کافه پرستیژ</strong>&nbsp;بگذرانید</p>', 1, NULL),
(10, NULL, 'کافه هنر شیراز', 'کافه هنر شیراز', NULL, NULL, NULL, NULL, NULL, 'شیراز', 100, 'bi-products\\August2018\\lCywQoyP04kgrkiRjIjJ.jpg', 2, 1, '30000', 0, NULL, NULL, 0, 1, NULL, '2018-08-26 03:30:00', '2018-09-02 03:06:58', 'کافه-هنر-شیراز', 50, 3, 0, '[\"bi-products\\\\August2018\\\\6wQ4clslHT7gzp8B3qJ6.jpg\",\"bi-products\\\\August2018\\\\UXTlkuLx78TnEbBKsZQH.jpg\"]', '<p style=\"text-align: right;\">خرید نا محدود</p>', '2018-08-27 00:00:00', '2018-09-30 00:00:00', '<p style=\"text-align: right;\">روزهای نوبت دهی شنبه</p>', NULL, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bi_product_attributes`
--

CREATE TABLE `bi_product_attributes` (
  `product_id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bi_reviews`
--

CREATE TABLE `bi_reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `bi_product_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` text COLLATE utf8mb4_unicode_ci,
  `rating` tinyint(4) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bi_reviews`
--

INSERT INTO `bi_reviews` (`id`, `bi_product_id`, `customer_id`, `author`, `text`, `rating`, `status`, `created_at`, `updated_at`, `email`) VALUES
(11, 9, 1, 'hadi', NULL, 3, NULL, '2018-08-28 07:08:38', '2018-09-04 10:17:27', NULL),
(12, 4, 1, 'sds', 'sdsd', NULL, NULL, '2018-08-28 07:11:07', '2018-08-28 09:36:42', 'demo@example.com'),
(13, 7, 1, 'sss', 'sss', NULL, NULL, '2018-08-28 09:39:36', '2018-08-28 09:44:06', 'admin@admin.com'),
(14, 7, 11, 'ddddddddd', 'ddddddddddd', NULL, NULL, '2018-08-28 09:45:17', '2018-08-28 09:50:22', 'admin@admin.com'),
(15, 8, 11, 'هادی', 'خیلی عالی بود', NULL, NULL, '2018-08-28 09:51:26', '2018-08-28 09:51:26', 'haadibehmanesh@gmail.com'),
(16, 4, 11, 'ggggg', 'lkkllklklklkl', NULL, NULL, '2018-08-28 10:03:01', '2018-08-28 10:04:15', 'haadibehmanesh@gmail.com'),
(17, 10, 1, 'هادی', 'خیلی خوب بود', NULL, NULL, '2018-09-03 10:14:09', '2018-09-03 10:14:09', 'haadibehmanesh@gmail.com'),
(18, 9, 11, 'حمید', 'خیلی عالی بود', 5, NULL, '2018-09-04 10:21:00', '2018-09-04 10:21:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bi_sliders`
--

CREATE TABLE `bi_sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bi_sliders`
--

INSERT INTO `bi_sliders` (`id`, `created_at`, `updated_at`, `name`) VALUES
(3, '2018-08-02 04:51:31', '2018-08-02 04:51:31', 'index'),
(4, '2018-08-02 07:13:00', '2018-08-21 06:27:23', 'رستوران و کافی شاپ'),
(5, '2018-08-26 03:17:41', '2018-08-26 03:17:41', 'تفریحی و ورزشی');

-- --------------------------------------------------------

--
-- Table structure for table `bi_slider_images`
--

CREATE TABLE `bi_slider_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bi_slider_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bi_slider_images`
--

INSERT INTO `bi_slider_images` (`id`, `name`, `url`, `created_at`, `updated_at`, `image`, `bi_slider_id`) VALUES
(8, '1', '/', '2018-08-02 07:04:00', '2018-08-02 07:18:44', 'bi-slider-images\\August2018\\9NINZJco7ofr16dD9ETi.jpg', 3),
(10, '2', '/', '2018-08-02 07:07:00', '2018-08-02 07:18:24', 'bi-slider-images\\August2018\\uu0SybyPfnUW22LveLBH.jpg', 3),
(11, '3', '/products', '2018-08-02 07:07:00', '2018-08-02 07:18:34', 'bi-slider-images\\August2018\\HQr3MTlMEzAUgOp4olR9.jpg', 3),
(14, NULL, '/', '2018-08-21 05:44:05', '2018-08-21 05:44:05', 'bi-slider-images\\August2018\\YcsYsFrd5irr9yRl7KTM.jpg', 4),
(17, NULL, NULL, '2018-08-21 05:53:04', '2018-08-21 05:53:04', 'bi-slider-images\\August2018\\9UaCYbfFiug4ARxva8uf.jpg', 4),
(18, NULL, NULL, '2018-08-21 05:56:59', '2018-08-21 05:56:59', 'bi-slider-images\\August2018\\8bZRebXbzYe6zfBJ1LhM.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `order`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 'Category 1', 'category-1', '2018-07-13 03:02:21', '2018-07-13 03:02:21'),
(2, NULL, 1, 'Category 2', 'category-2', '2018-07-13 03:02:21', '2018-07-13 03:02:21');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_merchant` tinyint(4) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `phone`, `email`, `password`, `is_merchant`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'hadi', '09178145534', 'haadibehmanesh@gmail.com', '$2y$10$bf5K5mSaouoRMBeFWiRCP.T7P3whA2G4XvP4E6dI5O5nI62u19d2O', 1, 'U4CstHWlQ17j6J6PNP5BIVpJqJ2OIFvd8Vz3LyOV71kYNRFpVveSTFT9DE67', '2018-08-20 04:45:59', '2018-08-23 06:11:09'),
(11, 'hamid', '09355482921', 'hamid@boninja.com', '$2y$10$ym0udEXxnuOgfdP.iNjPd.KmecUW1oNg7cfhQsTm/ouDdXPFcG1Dy', 0, 'Hay8TCkrO1p5L20H4DBYaRDC4BnfwSAV0IPurhGHOOtv6OgbhfjtNngQuay5', '2018-08-21 02:25:22', '2018-08-22 12:51:47'),
(15, 'haadi', '09128145534', 'hadi@boninja.com', '$2y$10$IzL8b8SY8aJaM2RrsKzLF.MXtfPa5lpcHQge4xCoVMsAfqvVovxg.', 0, 'kwHoIeZbRGQC6N6BG4gSUX2kc8mCJ8J7WobIYzuD7lRow0nquksmpI4PwJ0U', '2018-08-23 02:06:05', '2018-08-23 02:06:05'),
(16, 'data', '09178145566', NULL, '$2y$10$ZDa6vX7yEiDOkn9B40ekeOtGxHe4S9eWd5SUvkdF7f/rem9gzXBCi', 0, '5qPH9lUEBQJavkzaHMm4RasTGjbtpvMznPp07KQeMBvh4IxrW3wN4mcAnCoX', '2018-09-03 09:25:26', '2018-09-03 09:25:26');

-- --------------------------------------------------------

--
-- Table structure for table `customer_password_resets`
--

CREATE TABLE `customer_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_rows`
--

CREATE TABLE `data_rows` (
  `id` int(10) UNSIGNED NOT NULL,
  `data_type_id` int(10) UNSIGNED NOT NULL,
  `field` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `browse` tinyint(1) NOT NULL DEFAULT '1',
  `read` tinyint(1) NOT NULL DEFAULT '1',
  `edit` tinyint(1) NOT NULL DEFAULT '1',
  `add` tinyint(1) NOT NULL DEFAULT '1',
  `delete` tinyint(1) NOT NULL DEFAULT '1',
  `details` text COLLATE utf8mb4_unicode_ci,
  `order` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_rows`
--

INSERT INTO `data_rows` (`id`, `data_type_id`, `field`, `type`, `display_name`, `required`, `browse`, `read`, `edit`, `add`, `delete`, `details`, `order`) VALUES
(1, 1, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, '', 1),
(2, 1, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '', 2),
(3, 1, 'email', 'text', 'Email', 1, 1, 1, 1, 1, 1, '', 3),
(4, 1, 'password', 'password', 'Password', 1, 0, 0, 1, 1, 0, '', 4),
(5, 1, 'remember_token', 'text', 'Remember Token', 0, 0, 0, 0, 0, 0, '', 5),
(6, 1, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, '', 6),
(7, 1, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '', 7),
(8, 1, 'avatar', 'image', 'Avatar', 0, 1, 1, 1, 1, 1, '', 8),
(9, 1, 'user_belongsto_role_relationship', 'relationship', 'Role', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":\"0\"}', 10),
(10, 1, 'user_belongstomany_role_relationship', 'relationship', 'Roles', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}', 11),
(11, 1, 'locale', 'text', 'Locale', 0, 1, 1, 1, 1, 0, '', 12),
(12, 1, 'settings', 'hidden', 'Settings', 0, 0, 0, 0, 0, 0, '', 12),
(13, 2, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, '', 1),
(14, 2, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '', 2),
(15, 2, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '', 3),
(16, 2, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '', 4),
(17, 3, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, '', 1),
(18, 3, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '', 2),
(19, 3, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '', 3),
(20, 3, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '', 4),
(21, 3, 'display_name', 'text', 'Display Name', 1, 1, 1, 1, 1, 1, '', 5),
(22, 1, 'role_id', 'text', 'Role', 1, 1, 1, 1, 1, 1, '', 9),
(23, 4, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, '', 1),
(24, 4, 'parent_id', 'select_dropdown', 'Parent', 0, 0, 1, 1, 1, 1, '{\"default\":\"\",\"null\":\"\",\"options\":{\"\":\"-- None --\"},\"relationship\":{\"key\":\"id\",\"label\":\"name\"}}', 2),
(25, 4, 'order', 'text', 'Order', 1, 1, 1, 1, 1, 1, '{\"default\":1}', 3),
(26, 4, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '', 4),
(27, 4, 'slug', 'text', 'Slug', 1, 1, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"name\"}}', 5),
(28, 4, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 0, 0, 0, '', 6),
(29, 4, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '', 7),
(30, 5, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, '', 1),
(31, 5, 'author_id', 'text', 'Author', 1, 0, 1, 1, 0, 1, '', 2),
(32, 5, 'category_id', 'text', 'Category', 1, 0, 1, 1, 1, 0, '', 3),
(33, 5, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, '', 4),
(34, 5, 'excerpt', 'text_area', 'Excerpt', 1, 0, 1, 1, 1, 1, '', 5),
(35, 5, 'body', 'rich_text_box', 'Body', 1, 0, 1, 1, 1, 1, '', 6),
(36, 5, 'image', 'image', 'Post Image', 0, 1, 1, 1, 1, 1, '{\"resize\":{\"width\":\"1000\",\"height\":\"null\"},\"quality\":\"70%\",\"upsize\":true,\"thumbnails\":[{\"name\":\"medium\",\"scale\":\"50%\"},{\"name\":\"small\",\"scale\":\"25%\"},{\"name\":\"cropped\",\"crop\":{\"width\":\"300\",\"height\":\"250\"}}]}', 7),
(37, 5, 'slug', 'text', 'Slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\",\"forceUpdate\":true},\"validation\":{\"rule\":\"unique:posts,slug\"}}', 8),
(38, 5, 'meta_description', 'text_area', 'Meta Description', 1, 0, 1, 1, 1, 1, '', 9),
(39, 5, 'meta_keywords', 'text_area', 'Meta Keywords', 1, 0, 1, 1, 1, 1, '', 10),
(40, 5, 'status', 'select_dropdown', 'Status', 1, 1, 1, 1, 1, 1, '{\"default\":\"DRAFT\",\"options\":{\"PUBLISHED\":\"published\",\"DRAFT\":\"draft\",\"PENDING\":\"pending\"}}', 11),
(41, 5, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, '', 12),
(42, 5, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '', 13),
(43, 5, 'seo_title', 'text', 'SEO Title', 0, 1, 1, 1, 1, 1, '', 14),
(44, 5, 'featured', 'checkbox', 'Featured', 1, 1, 1, 1, 1, 1, '', 15),
(45, 6, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, '', 1),
(46, 6, 'author_id', 'text', 'Author', 1, 0, 0, 0, 0, 0, '', 2),
(47, 6, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, '', 3),
(48, 6, 'excerpt', 'text_area', 'Excerpt', 1, 0, 1, 1, 1, 1, '', 4),
(49, 6, 'body', 'rich_text_box', 'Body', 1, 0, 1, 1, 1, 1, '', 5),
(50, 6, 'slug', 'text', 'Slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\"},\"validation\":{\"rule\":\"unique:pages,slug\"}}', 6),
(51, 6, 'meta_description', 'text', 'Meta Description', 1, 0, 1, 1, 1, 1, '', 7),
(52, 6, 'meta_keywords', 'text', 'Meta Keywords', 1, 0, 1, 1, 1, 1, '', 8),
(53, 6, 'status', 'select_dropdown', 'Status', 1, 1, 1, 1, 1, 1, '{\"default\":\"INACTIVE\",\"options\":{\"INACTIVE\":\"INACTIVE\",\"ACTIVE\":\"ACTIVE\"}}', 9),
(54, 6, 'created_at', 'timestamp', 'Created At', 1, 1, 1, 0, 0, 0, '', 10),
(55, 6, 'updated_at', 'timestamp', 'Updated At', 1, 0, 0, 0, 0, 0, '', 11),
(56, 6, 'image', 'image', 'Page Image', 0, 1, 1, 1, 1, 1, '', 12),
(119, 13, 'product_id', 'text', 'Product Id', 1, 0, 0, 0, 0, 0, NULL, 1),
(120, 13, 'model', 'text', 'Model', 1, 1, 1, 1, 1, 1, NULL, 2),
(121, 13, 'sku', 'text', 'Sku', 1, 1, 1, 1, 1, 1, NULL, 3),
(122, 13, 'upc', 'text', 'Upc', 1, 1, 1, 1, 1, 1, NULL, 4),
(123, 13, 'ean', 'text', 'Ean', 1, 1, 1, 1, 1, 1, NULL, 5),
(124, 13, 'jan', 'text', 'Jan', 1, 1, 1, 1, 1, 1, NULL, 6),
(125, 13, 'isbn', 'text', 'Isbn', 1, 1, 1, 1, 1, 1, NULL, 7),
(126, 13, 'mpn', 'text', 'Mpn', 1, 1, 1, 1, 1, 1, NULL, 8),
(127, 13, 'location', 'text', 'Location', 1, 1, 1, 1, 1, 1, NULL, 9),
(128, 13, 'quantity', 'text', 'Quantity', 1, 1, 1, 1, 1, 1, NULL, 10),
(129, 13, 'stock_status_id', 'text', 'Stock Status Id', 1, 1, 1, 1, 1, 1, NULL, 11),
(130, 13, 'image', 'text', 'Image', 0, 1, 1, 1, 1, 1, NULL, 12),
(131, 13, 'manufacturer_id', 'text', 'Manufacturer Id', 1, 1, 1, 1, 1, 1, NULL, 13),
(132, 13, 'shipping', 'text', 'Shipping', 1, 1, 1, 1, 1, 1, NULL, 14),
(133, 13, 'price', 'text', 'Price', 1, 1, 1, 1, 1, 1, NULL, 15),
(134, 13, 'points', 'text', 'Points', 1, 1, 1, 1, 1, 1, NULL, 16),
(135, 13, 'tax_class_id', 'text', 'Tax Class Id', 1, 1, 1, 1, 1, 1, NULL, 17),
(136, 13, 'date_available', 'text', 'Date Available', 1, 1, 1, 1, 1, 1, NULL, 18),
(137, 13, 'weight', 'text', 'Weight', 1, 1, 1, 1, 1, 1, NULL, 19),
(138, 13, 'weight_class_id', 'text', 'Weight Class Id', 1, 1, 1, 1, 1, 1, NULL, 20),
(139, 13, 'length', 'text', 'Length', 1, 1, 1, 1, 1, 1, NULL, 21),
(140, 13, 'width', 'text', 'Width', 1, 1, 1, 1, 1, 1, NULL, 22),
(141, 13, 'height', 'text', 'Height', 1, 1, 1, 1, 1, 1, NULL, 23),
(142, 13, 'length_class_id', 'text', 'Length Class Id', 1, 1, 1, 1, 1, 1, NULL, 24),
(143, 13, 'subtract', 'text', 'Subtract', 1, 1, 1, 1, 1, 1, NULL, 25),
(144, 13, 'minimum', 'text', 'Minimum', 1, 1, 1, 1, 1, 1, NULL, 26),
(145, 13, 'sort_order', 'text', 'Sort Order', 1, 1, 1, 1, 1, 1, NULL, 27),
(146, 13, 'status', 'text', 'Status', 1, 1, 1, 1, 1, 1, NULL, 28),
(147, 13, 'viewed', 'text', 'Viewed', 1, 1, 1, 1, 1, 1, NULL, 29),
(148, 13, 'date_added', 'text', 'Date Added', 1, 1, 1, 1, 1, 1, NULL, 30),
(149, 13, 'date_modified', 'text', 'Date Modified', 1, 1, 1, 1, 1, 1, NULL, 31),
(150, 14, 'id', 'hidden', 'Id', 1, 0, 1, 1, 1, 0, NULL, 1),
(151, 14, 'model', 'text', 'Model', 0, 0, 0, 0, 0, 1, NULL, 4),
(158, 14, 'location', 'text', 'Location', 0, 0, 1, 1, 1, 1, '{\"null\":\" \"}', 18),
(159, 14, 'quantity', 'number', 'Quantity', 1, 1, 1, 1, 1, 1, NULL, 14),
(161, 14, 'image', 'image', 'Image', 0, 1, 1, 1, 1, 1, NULL, 10),
(163, 14, 'shipping', 'checkbox', 'Shipping', 0, 0, 0, 0, 0, 0, NULL, 19),
(164, 14, 'price', 'number', 'Price', 1, 1, 1, 1, 1, 1, NULL, 12),
(165, 14, 'points', 'number', 'Points', 0, 0, 0, 0, 0, 0, '{\"null\":\" \"}', 20),
(167, 14, 'date_available', 'date', 'Date Available', 0, 0, 0, 0, 0, 0, NULL, 21),
(175, 14, 'minimum', 'number', 'Minimum', 0, 0, 1, 1, 1, 1, NULL, 28),
(176, 14, 'sort_order', 'number', 'Sort Order', 0, 0, 0, 0, 0, 0, NULL, 29),
(177, 14, 'status', 'checkbox', 'Status', 0, 0, 1, 1, 1, 1, NULL, 15),
(178, 14, 'viewed', 'number', 'Viewed', 0, 1, 1, 1, 1, 1, NULL, 30),
(179, 14, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, NULL, 31),
(180, 14, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 32),
(181, 15, 'product_id', 'number', 'Product Id', 1, 1, 1, 1, 1, 1, NULL, 1),
(182, 15, 'attribute_id', 'number', 'Attribute Id', 1, 1, 1, 1, 1, 1, NULL, 2),
(183, 15, 'language_id', 'number', 'Language Id', 1, 1, 1, 1, 1, 1, NULL, 3),
(184, 15, 'text', 'text', 'Text', 1, 1, 1, 1, 1, 1, NULL, 4),
(185, 16, 'product_id', 'number', 'Product Id', 1, 1, 1, 1, 1, 1, NULL, 1),
(186, 16, 'language_id', 'number', 'Language Id', 1, 1, 1, 1, 1, 1, NULL, 2),
(187, 16, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 3),
(188, 16, 'description', 'rich_text_box', 'Description', 1, 1, 1, 1, 1, 1, NULL, 4),
(189, 16, 'tag', 'text', 'Tag', 1, 1, 1, 1, 1, 1, NULL, 5),
(190, 16, 'meta_title', 'text', 'Meta Title', 1, 1, 1, 1, 1, 1, NULL, 6),
(191, 16, 'meta_description', 'text', 'Meta Description', 1, 1, 1, 1, 1, 1, NULL, 7),
(192, 16, 'meta_keyword', 'text', 'Meta Keyword', 1, 1, 1, 1, 1, 1, NULL, 8),
(195, 14, 'language_id', 'number', 'Language Id', 0, 0, 0, 0, 0, 0, NULL, 16),
(196, 14, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 3),
(197, 14, 'description', 'text', 'Description', 0, 0, 1, 1, 1, 1, NULL, 5),
(198, 14, 'tag', 'text', 'Tag', 0, 0, 1, 0, 0, 1, '{\"null\":\" \"}', 6),
(199, 14, 'meta_title', 'text', 'Meta Title', 0, 0, 1, 0, 0, 1, '{\"null\":\" \"}', 7),
(200, 14, 'meta_description', 'text', 'Meta Description', 0, 0, 1, 0, 0, 1, '{\"null\":\" \"}', 8),
(201, 14, 'meta_keyword', 'text', 'Meta Keyword', 0, 0, 1, 0, 0, 1, '{\"null\":\" \"}', 9),
(202, 17, 'id', 'hidden', 'Id', 1, 0, 1, 1, 1, 0, NULL, 1),
(203, 17, 'image', 'image', 'Image', 0, 0, 1, 1, 1, 1, NULL, 5),
(204, 17, 'parent_id', 'select_dropdown', 'Parent Id', 0, 0, 1, 1, 1, 1, '{\"default\":\"\",\"null\":\"\",\"options\":{\"\":\"-- None --\"},\"relationship\":{\"key\":\"id\",\"label\":\"name\"}}', 18),
(205, 17, 'top', 'number', 'Top', 0, 0, 1, 1, 1, 1, NULL, 6),
(206, 17, 'column', 'number', 'Column', 0, 0, 1, 1, 1, 1, NULL, 7),
(207, 17, 'sort_order', 'number', 'Sort Order', 0, 1, 1, 1, 1, 1, NULL, 8),
(208, 17, 'status', 'checkbox', 'Status', 0, 1, 1, 1, 1, 1, NULL, 9),
(209, 17, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 1, 0, 1, NULL, 11),
(210, 17, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 12),
(211, 17, 'language_id', 'text', 'Language Id', 0, 0, 1, 1, 1, 1, NULL, 13),
(212, 17, 'name', 'text', 'Name', 0, 1, 1, 1, 1, 1, NULL, 2),
(213, 17, 'description', 'text', 'Description', 0, 1, 1, 1, 1, 1, NULL, 3),
(214, 17, 'meta_title', 'text', 'Meta Title', 0, 0, 1, 1, 1, 1, NULL, 14),
(215, 17, 'meta_description', 'text', 'Meta Description', 0, 0, 1, 1, 1, 1, NULL, 15),
(216, 17, 'meta_keyword', 'text', 'Meta Keyword', 0, 0, 1, 1, 1, 1, NULL, 16),
(217, 18, 'id', 'hidden', 'Id', 1, 0, 1, 1, 1, 0, NULL, 1),
(218, 18, 'name', 'text', 'Name', 0, 1, 1, 1, 1, 1, NULL, 2),
(219, 18, 'code', 'text', 'Code', 0, 1, 1, 1, 1, 1, NULL, 3),
(220, 18, 'type', 'text', 'Type', 0, 0, 1, 1, 1, 1, NULL, 4),
(221, 18, 'discount', 'number', 'Discount', 0, 1, 1, 1, 1, 1, NULL, 5),
(222, 18, 'logged', 'checkbox', 'Logged', 0, 0, 1, 1, 1, 1, NULL, 6),
(223, 18, 'shipping', 'checkbox', 'Shipping', 0, 0, 1, 1, 1, 1, NULL, 7),
(224, 18, 'total', 'number', 'Total', 0, 0, 1, 1, 1, 1, NULL, 8),
(225, 18, 'date_start', 'date', 'Date Start', 0, 1, 1, 1, 1, 1, NULL, 9),
(226, 18, 'date_end', 'date', 'Date End', 0, 1, 1, 1, 1, 1, NULL, 10),
(227, 18, 'uses_total', 'number', 'Uses Total', 0, 0, 1, 1, 1, 1, NULL, 11),
(228, 18, 'uses_customer', 'text', 'Uses Customer', 0, 0, 1, 1, 1, 1, NULL, 12),
(229, 18, 'status', 'checkbox', 'Status', 0, 1, 1, 1, 1, 1, NULL, 13),
(230, 18, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 1, 0, 1, NULL, 14),
(231, 18, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 15),
(232, 17, 'slug', 'text', 'Slug', 0, 1, 0, 0, 0, 0, NULL, 17),
(233, 19, 'customer_id', 'hidden', 'Customer Id', 1, 0, 1, 1, 1, 0, NULL, 1),
(234, 19, 'customer_group_id', 'number', 'Customer Group Id', 1, 0, 0, 0, 0, 0, NULL, 2),
(235, 19, 'store_id', 'number', 'Store Id', 1, 0, 0, 0, 0, 0, NULL, 3),
(236, 19, 'language_id', 'number', 'Language Id', 1, 0, 0, 0, 0, 0, NULL, 4),
(237, 19, 'firstname', 'text', 'Firstname', 1, 1, 1, 1, 1, 1, NULL, 5),
(238, 19, 'lastname', 'text', 'Lastname', 1, 1, 1, 1, 1, 1, NULL, 6),
(239, 19, 'email', 'text', 'Email', 1, 1, 1, 1, 1, 1, NULL, 7),
(240, 19, 'telephone', 'number', 'Telephone', 1, 0, 1, 1, 1, 1, NULL, 8),
(241, 19, 'fax', 'number', 'Fax', 0, 0, 1, 1, 1, 1, NULL, 9),
(242, 19, 'password', 'text', 'Password', 1, 0, 1, 1, 1, 1, NULL, 10),
(243, 19, 'salt', 'text', 'Salt', 0, 0, 0, 0, 0, 0, NULL, 11),
(244, 19, 'cart', 'text', 'Cart', 0, 0, 0, 0, 0, 0, NULL, 12),
(245, 19, 'wishlist', 'text', 'Wishlist', 0, 0, 0, 0, 0, 0, NULL, 13),
(246, 19, 'newsletter', 'checkbox', 'Newsletter', 0, 0, 1, 1, 1, 1, NULL, 14),
(247, 19, 'address_id', 'number', 'Address Id', 1, 0, 0, 0, 0, 0, NULL, 15),
(248, 19, 'custom_field', 'text', 'Custom Field', 0, 0, 0, 0, 0, 0, NULL, 16),
(249, 19, 'ip', 'text', 'Ip', 0, 0, 0, 0, 0, 0, NULL, 17),
(250, 19, 'status', 'checkbox', 'Status', 0, 1, 1, 1, 1, 1, NULL, 18),
(251, 19, 'safe', 'checkbox', 'Safe', 0, 0, 1, 1, 1, 1, NULL, 19),
(252, 19, 'token', 'text', 'Token', 0, 0, 0, 0, 0, 0, NULL, 20),
(253, 19, 'code', 'text', 'Code', 0, 0, 0, 0, 0, 0, NULL, 21),
(254, 19, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 0, 0, 0, NULL, 22),
(255, 19, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 23),
(256, 21, 'id', 'hidden', 'Id', 1, 0, 1, 1, 1, 0, NULL, 1),
(257, 21, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(258, 21, 'description', 'text', 'Description', 0, 0, 1, 1, 1, 1, NULL, 3),
(259, 21, 'language_id', 'text', 'Language Id', 0, 0, 0, 0, 0, 0, NULL, 4),
(260, 21, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 0, 0, 0, NULL, 5),
(261, 21, 'updated_at', 'timestamp', 'Updated At', 0, 0, 1, 0, 0, 0, NULL, 6),
(262, 22, 'id', 'hidden', 'Id', 1, 0, 1, 1, 1, 0, NULL, 1),
(263, 22, 'bi_c_group_id', 'text', 'Bi C Group Id', 1, 1, 1, 1, 1, 1, NULL, 2),
(264, 22, 'bi_customer_id', 'text', 'Bi Customer Id', 1, 1, 1, 1, 1, 1, NULL, 3),
(265, 22, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 1, 0, 1, NULL, 4),
(266, 22, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 5),
(267, 23, 'customer_id', 'text', 'Customer Id', 1, 1, 1, 1, 1, 1, NULL, 1),
(268, 23, 'store_id', 'text', 'Store Id', 0, 0, 0, 0, 0, 0, NULL, 2),
(269, 23, 'language_id', 'text', 'Language Id', 0, 0, 0, 0, 0, 0, NULL, 3),
(270, 23, 'firstname', 'text', 'Firstname', 1, 1, 1, 1, 1, 1, NULL, 4),
(271, 23, 'lastname', 'text', 'Lastname', 1, 1, 1, 1, 1, 1, NULL, 5),
(273, 23, 'telephone', 'text', 'Telephone', 1, 1, 1, 1, 1, 1, NULL, 7),
(274, 23, 'fax', 'text', 'Fax', 0, 0, 1, 1, 1, 1, NULL, 8),
(275, 23, 'password', 'password', 'Password', 1, 0, 1, 1, 1, 1, NULL, 9),
(276, 23, 'salt', 'text', 'Salt', 0, 0, 0, 0, 0, 0, NULL, 10),
(277, 23, 'cart', 'text', 'Cart', 0, 0, 0, 0, 0, 0, NULL, 11),
(278, 23, 'wishlist', 'text', 'Wishlist', 0, 0, 0, 0, 0, 0, NULL, 12),
(279, 23, 'newsletter', 'checkbox', 'Newsletter', 0, 0, 1, 1, 1, 1, NULL, 13),
(280, 23, 'address_id', 'text', 'Address Id', 0, 0, 0, 0, 0, 0, NULL, 14),
(281, 23, 'custom_field', 'text', 'Custom Field', 0, 0, 0, 0, 0, 0, NULL, 15),
(282, 23, 'ip', 'text', 'Ip', 0, 1, 1, 0, 0, 0, NULL, 16),
(283, 23, 'status', 'checkbox', 'Status', 0, 1, 1, 1, 1, 1, NULL, 17),
(284, 23, 'safe', 'checkbox', 'Safe', 0, 0, 1, 1, 1, 1, NULL, 18),
(285, 23, 'token', 'text', 'Token', 0, 0, 0, 0, 0, 0, NULL, 19),
(286, 23, 'code', 'text', 'Code', 0, 0, 0, 0, 0, 0, NULL, 20),
(287, 23, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, NULL, 21),
(288, 23, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 22),
(289, 24, 'id', 'hidden', 'Id', 1, 0, 0, 0, 0, 0, NULL, 1),
(290, 24, 'company_name', 'text', 'Company Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(291, 24, 'email', 'text', 'Email', 0, 1, 1, 1, 1, 1, NULL, 3),
(292, 24, 'first_name', 'text', 'First Name', 0, 0, 1, 1, 1, 1, NULL, 4),
(293, 24, 'last_name', 'text', 'Last Name', 0, 0, 1, 1, 1, 1, NULL, 5),
(294, 24, 'tel', 'number', 'Tel', 1, 0, 1, 1, 1, 1, NULL, 6),
(295, 24, 'mobile', 'number', 'Mobile', 0, 0, 1, 1, 1, 1, NULL, 7),
(296, 24, 'description', 'text', 'Description', 0, 0, 1, 1, 1, 1, NULL, 8),
(297, 24, 'image', 'image', 'Image', 0, 0, 1, 1, 1, 1, NULL, 9),
(298, 24, 'geocode', 'text', 'Geocode', 0, 0, 0, 0, 0, 0, NULL, 10),
(299, 24, 'address', 'text', 'Address', 0, 0, 1, 1, 1, 1, NULL, 11),
(300, 24, 'city_id', 'number', 'City Id', 0, 0, 0, 0, 0, 0, NULL, 12),
(301, 24, 'postcode', 'number', 'Postcode', 0, 0, 1, 1, 1, 1, NULL, 13),
(302, 24, 'country_id', 'text', 'Country Id', 0, 0, 0, 0, 0, 0, NULL, 14),
(303, 24, 'region_id', 'text', 'Region Id', 0, 0, 0, 0, 0, 0, NULL, 15),
(306, 24, 'start_date', 'date', 'Start Date', 0, 1, 1, 1, 1, 1, NULL, 18),
(307, 24, 'end_date', 'date', 'End Date', 0, 1, 1, 1, 1, 1, NULL, 19),
(308, 24, 'contract_date', 'date', 'Contract Date', 0, 0, 1, 1, 1, 1, NULL, 20),
(309, 24, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 1, 0, 1, NULL, 21),
(310, 24, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 22),
(311, 24, 'status', 'checkbox', 'Status', 0, 1, 1, 1, 1, 1, NULL, 23),
(312, 24, 'ip', 'text', 'Ip', 0, 1, 1, 1, 1, 1, NULL, 24),
(313, 25, 'id', 'hidden', 'Id', 1, 0, 0, 0, 0, 0, NULL, 1),
(314, 25, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(315, 25, 'description', 'text', 'Description', 0, 1, 1, 1, 1, 1, NULL, 3),
(316, 25, 'language_id', 'number', 'Language Id', 0, 0, 0, 0, 0, 0, NULL, 4),
(317, 25, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, NULL, 5),
(318, 25, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 6),
(319, 14, 'slug', 'text', 'Slug', 0, 0, 0, 0, 0, 0, NULL, 33),
(320, 17, 'bi_category_belongsto_bi_category_relationship', 'relationship', 'Category', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\BiCategory\",\"table\":\"bi_categories\",\"type\":\"belongsTo\",\"column\":\"parent_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"bi_c_group_bi_customer\",\"pivot\":\"0\",\"taggable\":\"0\"}', 4),
(321, 17, 'icon', 'text', 'Icon', 0, 0, 1, 1, 1, 1, NULL, 10),
(322, 26, 'id', 'hidden', 'Id', 1, 0, 0, 0, 0, 0, NULL, 1),
(327, 26, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, NULL, 7),
(328, 26, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 8),
(329, 26, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(330, 27, 'id', 'hidden', 'Id', 1, 0, 0, 0, 0, 0, NULL, 1),
(331, 27, 'name', 'text', 'Name', 0, 1, 1, 1, 1, 1, NULL, 4),
(332, 27, 'url', 'text', 'Url', 0, 1, 1, 1, 1, 1, NULL, 5),
(333, 27, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, NULL, 6),
(334, 27, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 7),
(335, 27, 'image', 'image', 'Image', 1, 1, 1, 1, 1, 1, NULL, 3),
(336, 27, 'bi_slider_image_belongsto_bi_slider_relationship', 'relationship', 'slider name', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\BiSlider\",\"table\":\"bi_sliders\",\"type\":\"belongsTo\",\"column\":\"bi_slider_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"bi_c_group_bi_customer\",\"pivot\":\"0\",\"taggable\":\"0\"}', 2),
(337, 27, 'bi_slider_id', 'text', 'Bi Slider Id', 1, 1, 1, 1, 1, 1, NULL, 7),
(338, 14, 'discount', 'text', 'Discount', 1, 1, 1, 1, 1, 1, NULL, 13),
(341, 14, 'bi_merchant_id', 'text', 'Bi Merchant Id', 0, 0, 0, 0, 0, 0, NULL, 17),
(342, 14, 'sold', 'number', 'Sold', 0, 1, 1, 0, 0, 0, NULL, 34),
(343, 28, 'id', 'hidden', 'Id', 1, 1, 1, 0, 0, 0, NULL, 1),
(344, 28, 'name', 'text', 'Name', 0, 1, 1, 1, 1, 1, NULL, 2),
(345, 14, 'featured', 'checkbox', 'Featured', 0, 1, 1, 1, 1, 1, NULL, 35),
(352, 29, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, NULL, 20),
(353, 29, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 21),
(355, 23, 'bi_customer_id', 'hidden', 'Bi Customer Id', 1, 0, 0, 0, 0, 0, NULL, 1),
(357, 29, 'store_id', 'text', 'Store Id', 0, 1, 1, 1, 1, 1, NULL, 2),
(358, 29, 'language_id', 'text', 'Language Id', 0, 1, 1, 1, 1, 1, NULL, 3),
(359, 29, 'firstname', 'text', 'Firstname', 1, 1, 1, 1, 1, 1, NULL, 4),
(360, 29, 'lastname', 'text', 'Lastname', 1, 1, 1, 1, 1, 1, NULL, 5),
(361, 29, 'telephone', 'text', 'Telephone', 1, 1, 1, 1, 1, 1, NULL, 6),
(362, 29, 'fax', 'text', 'Fax', 0, 1, 1, 1, 1, 1, NULL, 7),
(363, 29, 'salt', 'text', 'Salt', 0, 1, 1, 1, 1, 1, NULL, 9),
(364, 29, 'cart', 'text', 'Cart', 0, 1, 1, 1, 1, 1, NULL, 10),
(365, 29, 'wishlist', 'text', 'Wishlist', 0, 1, 1, 1, 1, 1, NULL, 11),
(366, 29, 'newsletter', 'text', 'Newsletter', 0, 1, 1, 1, 1, 1, NULL, 12),
(367, 29, 'address_id', 'text', 'Address Id', 0, 1, 1, 1, 1, 1, NULL, 13),
(368, 29, 'custom_field', 'text', 'Custom Field', 0, 1, 1, 1, 1, 1, NULL, 14),
(369, 29, 'ip', 'text', 'Ip', 0, 1, 1, 1, 1, 1, NULL, 15),
(370, 29, 'status', 'text', 'Status', 0, 1, 1, 1, 1, 1, NULL, 16),
(371, 29, 'safe', 'text', 'Safe', 0, 1, 1, 1, 1, 1, NULL, 17),
(372, 29, 'token', 'text', 'Token', 0, 1, 1, 1, 1, 1, NULL, 18),
(373, 29, 'code', 'text', 'Code', 0, 1, 1, 1, 1, 1, NULL, 19),
(374, 29, 'customer_id', 'text', 'Customer Id', 1, 1, 1, 1, 1, 1, NULL, 22),
(375, 29, 'bi_customer_belongsto_customer_relationship', 'relationship', 'customers', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Customer\",\"table\":\"customers\",\"type\":\"belongsTo\",\"column\":\"customer_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"bi_c_group_bi_customer\",\"pivot\":\"0\",\"taggable\":\"0\"}', 23),
(376, 29, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, NULL, 1),
(377, 24, 'bi_merchant_belongsto_customer_relationship', 'relationship', 'customers', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Customer\",\"table\":\"customers\",\"type\":\"belongsTo\",\"column\":\"customer_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"bi_c_group_bi_customer\",\"pivot\":\"0\",\"taggable\":\"0\"}', 25),
(378, 24, 'customer_id', 'text', 'Customer Id', 1, 1, 1, 1, 1, 1, NULL, 25),
(379, 14, 'gallery', 'multiple_images', 'Gallery', 0, 0, 1, 1, 1, 1, NULL, 11),
(381, 14, 'attributies', 'rich_text_box', 'Attributies', 0, 0, 1, 1, 1, 1, NULL, 22),
(382, 14, 'start_date', 'date', 'Start Date', 0, 0, 1, 1, 1, 1, NULL, 23),
(383, 14, 'end_date', 'date', 'End Date', 0, 0, 1, 1, 1, 1, NULL, 24),
(384, 14, 'usage_terms', 'rich_text_box', 'Usage Terms', 0, 0, 1, 1, 1, 1, NULL, 25),
(385, 14, 'description_details', 'rich_text_box', 'Description Details', 0, 0, 1, 1, 1, 1, NULL, 26),
(386, 14, 'cat_featured', 'checkbox', 'Cat Featured', 0, 0, 1, 1, 1, 1, NULL, 27),
(387, 14, 'bi_product_belongsto_bi_merchant_relationship', 'relationship', 'Merchant', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\BiMerchant\",\"table\":\"bi_merchants\",\"type\":\"belongsTo\",\"column\":\"bi_merchant_id\",\"key\":\"id\",\"label\":\"company_name\",\"pivot_table\":\"bi_c_group_bi_customer\",\"pivot\":\"0\",\"taggable\":\"0\"}', 2),
(388, 30, 'id', 'hidden', 'Id', 1, 0, 0, 0, 1, 0, NULL, 1),
(389, 30, 'bi_product_id', 'number', 'Bi Product Id', 0, 0, 1, 1, 1, 1, NULL, 2),
(390, 30, 'customer_id', 'number', 'Customer Id', 0, 0, 1, 1, 1, 1, NULL, 3),
(391, 30, 'author', 'text', 'Author', 0, 1, 1, 1, 1, 1, NULL, 4),
(392, 30, 'text', 'text_area', 'Text', 0, 1, 1, 1, 1, 1, NULL, 5),
(393, 30, 'rating', 'number', 'Rating', 0, 1, 1, 1, 1, 1, NULL, 6),
(394, 30, 'status', 'checkbox', 'Status', 0, 1, 1, 1, 1, 1, NULL, 7),
(395, 30, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, NULL, 8),
(396, 30, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 9),
(397, 14, 'index_gallery', 'checkbox', 'index Gallery', 0, 0, 1, 1, 1, 1, NULL, 35);

-- --------------------------------------------------------

--
-- Table structure for table `data_types`
--

CREATE TABLE `data_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT '0',
  `server_side` tinyint(4) NOT NULL DEFAULT '0',
  `details` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_types`
--

INSERT INTO `data_types` (`id`, `name`, `slug`, `display_name_singular`, `display_name_plural`, `icon`, `model_name`, `policy_name`, `controller`, `description`, `generate_permissions`, `server_side`, `details`, `created_at`, `updated_at`) VALUES
(1, 'users', 'users', 'User', 'Users', 'voyager-person', 'TCG\\Voyager\\Models\\User', 'TCG\\Voyager\\Policies\\UserPolicy', '', '', 1, 0, NULL, '2018-07-13 02:50:34', '2018-07-13 02:50:34'),
(2, 'menus', 'menus', 'Menu', 'Menus', 'voyager-list', 'TCG\\Voyager\\Models\\Menu', NULL, '', '', 1, 0, NULL, '2018-07-13 02:50:34', '2018-07-13 02:50:34'),
(3, 'roles', 'roles', 'Role', 'Roles', 'voyager-lock', 'TCG\\Voyager\\Models\\Role', NULL, '', '', 1, 0, NULL, '2018-07-13 02:50:34', '2018-07-13 02:50:34'),
(4, 'categories', 'categories', 'Category', 'Categories', 'voyager-categories', 'TCG\\Voyager\\Models\\Category', NULL, '', '', 1, 0, NULL, '2018-07-13 03:02:21', '2018-07-13 03:02:21'),
(5, 'posts', 'posts', 'Post', 'Posts', 'voyager-news', 'TCG\\Voyager\\Models\\Post', 'TCG\\Voyager\\Policies\\PostPolicy', '', '', 1, 0, NULL, '2018-07-13 03:02:22', '2018-07-13 03:02:22'),
(6, 'pages', 'pages', 'Page', 'Pages', 'voyager-file-text', 'TCG\\Voyager\\Models\\Page', NULL, '', '', 1, 0, NULL, '2018-07-13 03:02:22', '2018-07-13 03:02:22'),
(13, 'oc_products', 'oc-products', 'Oc Product', 'Oc Products', NULL, 'App\\OcProduct', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null}', '2018-07-13 04:54:14', '2018-07-13 04:54:14'),
(14, 'bi_products', 'bi-products', 'Bi Product', 'Bi Products', 'voyager-bag', 'App\\BiProduct', NULL, '\\App\\Http\\Controllers\\Voyager\\BiProductsController', NULL, 1, 1, '{\"order_column\":null,\"order_display_column\":null}', '2018-07-14 05:29:09', '2018-07-19 10:27:20'),
(15, 'bi_product_attribute', 'bi-product-attribute', 'Bi Product Attribute', 'Bi Product Attributes', NULL, 'App\\BiProductAttribute', NULL, NULL, NULL, 1, 1, '{\"order_column\":null,\"order_display_column\":null}', '2018-07-14 05:45:07', '2018-07-14 05:45:07'),
(16, 'bi_product_description', 'bi-product-description', 'Bi Product Description', 'Bi Product Descriptions', NULL, 'App\\BiProductDescription', NULL, NULL, NULL, 1, 1, '{\"order_column\":null,\"order_display_column\":null}', '2018-07-14 06:14:43', '2018-07-14 06:14:43'),
(17, 'bi_categories', 'bi-categories', 'Bi Category', 'Bi Categories', 'voyager-window-list', 'App\\BiCategory', NULL, '\\App\\Http\\Controllers\\Voyager\\BiCategoryController', NULL, 1, 1, '{\"order_column\":null,\"order_display_column\":null}', '2018-07-19 04:02:15', '2018-07-28 06:27:37'),
(18, 'bi_coupons', 'bi-coupons', 'Bi Coupon', 'Bi Coupons', 'voyager-dollar', 'App\\BiCoupon', NULL, NULL, NULL, 1, 1, '{\"order_column\":null,\"order_display_column\":null}', '2018-07-19 05:08:55', '2018-07-19 05:08:55'),
(21, 'bi_c_group', 'bi-c-group', 'Bi C Group', 'Bi C Groups', NULL, 'App\\BiCGroup', NULL, NULL, NULL, 1, 1, '{\"order_column\":null,\"order_display_column\":null}', '2018-07-22 09:16:35', '2018-07-22 09:16:35'),
(24, 'bi_merchants', 'bi-merchants', 'Bi Merchant', 'Bi Merchants', NULL, 'App\\BiMerchant', NULL, '\\App\\Http\\Controllers\\Voyager\\BiMerchantController', NULL, 1, 1, '{\"order_column\":null,\"order_display_column\":null}', '2018-07-22 12:13:26', '2018-07-24 03:37:56'),
(25, 'bi_m_groups', 'bi-m-groups', 'Bi M Group', 'Bi M Groups', NULL, 'App\\BiMGroup', NULL, NULL, NULL, 1, 1, '{\"order_column\":null,\"order_display_column\":null}', '2018-07-24 03:33:32', '2018-07-24 03:33:32'),
(26, 'bi_sliders', 'bi-sliders', 'Bi Slider', 'Bi Sliders', NULL, 'App\\BiSlider', NULL, NULL, NULL, 1, 1, '{\"order_column\":null,\"order_display_column\":null}', '2018-08-02 04:27:15', '2018-08-02 04:27:15'),
(27, 'bi_slider_images', 'bi-slider-images', 'Bi Slider Image', 'Bi Slider Images', NULL, 'App\\BiSliderImage', NULL, NULL, NULL, 1, 1, '{\"order_column\":null,\"order_display_column\":null}', '2018-08-02 04:47:45', '2018-08-02 04:47:45'),
(28, 'bi_order_status', 'bi-order-status', 'Bi Order Status', 'Bi Order Statuses', NULL, 'App\\BiOrderStatus', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null}', '2018-08-06 09:51:04', '2018-08-06 09:51:04'),
(29, 'bi_customers', 'bi-customers', 'Bi Customer', 'Bi Customers', NULL, 'App\\BiCustomer', NULL, '\\App\\Http\\Controllers\\Voyager\\BiCustomerController', NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null}', '2018-08-22 08:07:57', '2018-08-22 08:07:57'),
(30, 'bi_reviews', 'bi-reviews', 'Bi Review', 'Bi Reviews', NULL, 'App\\BiReview', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null}', '2018-08-27 16:17:39', '2018-08-27 16:17:39');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2018-07-13 02:50:35', '2018-07-13 02:50:35');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_id`, `title`, `url`, `target`, `icon_class`, `color`, `parent_id`, `order`, `created_at`, `updated_at`, `route`, `parameters`) VALUES
(1, 1, 'Dashboard', '', '_self', 'voyager-boat', NULL, NULL, 1, '2018-07-13 02:50:35', '2018-07-13 02:50:35', 'voyager.dashboard', NULL),
(2, 1, 'Media', '', '_self', 'voyager-images', NULL, NULL, 9, '2018-07-13 02:50:35', '2018-08-02 05:19:15', 'voyager.media.index', NULL),
(3, 1, 'Users', '', '_self', 'voyager-person', NULL, NULL, 8, '2018-07-13 02:50:35', '2018-08-02 05:19:15', 'voyager.users.index', NULL),
(4, 1, 'Roles', '', '_self', 'voyager-lock', NULL, NULL, 7, '2018-07-13 02:50:35', '2018-08-02 05:19:15', 'voyager.roles.index', NULL),
(5, 1, 'Tools', '', '_self', 'voyager-tools', NULL, NULL, 13, '2018-07-13 02:50:35', '2018-08-02 05:19:15', NULL, NULL),
(6, 1, 'Menu Builder', '', '_self', 'voyager-list', NULL, 5, 1, '2018-07-13 02:50:35', '2018-07-13 03:23:10', 'voyager.menus.index', NULL),
(7, 1, 'Database', '', '_self', 'voyager-data', NULL, 5, 2, '2018-07-13 02:50:35', '2018-08-02 05:18:49', 'voyager.database.index', NULL),
(8, 1, 'Compass', '', '_self', 'voyager-compass', NULL, 5, 3, '2018-07-13 02:50:35', '2018-08-02 05:18:49', 'voyager.compass.index', NULL),
(9, 1, 'BREAD', '', '_self', 'voyager-bread', NULL, 5, 4, '2018-07-13 02:50:35', '2018-08-02 05:18:49', 'voyager.bread.index', NULL),
(10, 1, 'Settings', '', '_self', 'voyager-settings', NULL, NULL, 14, '2018-07-13 02:50:35', '2018-08-02 05:19:15', 'voyager.settings.index', NULL),
(11, 1, 'Hooks', '', '_self', 'voyager-hook', NULL, 5, 5, '2018-07-13 02:50:37', '2018-08-02 05:18:49', 'voyager.hooks', NULL),
(12, 1, 'Categories', '', '_self', 'voyager-categories', NULL, NULL, 12, '2018-07-13 03:02:21', '2018-08-02 05:19:15', 'voyager.categories.index', NULL),
(13, 1, 'Posts', '', '_self', 'voyager-news', NULL, NULL, 10, '2018-07-13 03:02:22', '2018-08-02 05:19:15', 'voyager.posts.index', NULL),
(14, 1, 'Pages', '', '_self', 'voyager-file-text', NULL, NULL, 11, '2018-07-13 03:02:22', '2018-08-02 05:19:15', 'voyager.pages.index', NULL),
(15, 1, 'Catalog', '/admin', '_self', 'voyager-list', '#000000', NULL, 3, '2018-07-13 03:22:53', '2018-08-02 05:19:15', NULL, ''),
(16, 1, 'Bi Products', '', '_self', 'voyager-bag', NULL, 15, 2, '2018-07-14 05:29:09', '2018-08-02 05:18:58', 'voyager.bi-products.index', NULL),
(19, 1, 'Bi Categories', '', '_self', 'voyager-window-list', NULL, 15, 1, '2018-07-19 04:02:15', '2018-07-21 10:43:26', 'voyager.bi-categories.index', NULL),
(20, 1, 'Bi Coupons', '', '_self', 'voyager-dollar', NULL, NULL, 6, '2018-07-19 05:08:55', '2018-08-02 05:19:15', 'voyager.bi-coupons.index', NULL),
(21, 1, 'Customers', '/admin', '_self', 'voyager-group', '#000000', NULL, 4, '2018-07-21 10:43:05', '2018-08-02 05:19:15', NULL, ''),
(22, 1, 'Bi Customers', '', '_self', 'voyager-people', '#000000', 21, 2, '2018-07-21 11:01:59', '2018-08-02 05:17:53', 'voyager.bi-customers.index', 'null'),
(23, 1, 'Bi C Groups', '', '_self', NULL, NULL, 21, 1, '2018-07-22 09:16:35', '2018-08-02 05:17:53', 'voyager.bi-c-group.index', NULL),
(25, 1, 'Bi Merchants', '', '_self', NULL, NULL, 26, 2, '2018-07-22 12:13:26', '2018-07-24 03:35:08', 'voyager.bi-merchants.index', NULL),
(26, 1, 'Merchants', '/admin', '_self', 'voyager-shop', '#000000', NULL, 5, '2018-07-24 03:00:39', '2018-08-02 05:19:15', NULL, ''),
(27, 1, 'Bi M Groups', '', '_self', NULL, NULL, 26, 1, '2018-07-24 03:33:32', '2018-07-24 03:35:08', 'voyager.bi-m-groups.index', NULL),
(28, 1, 'Bi Sliders', '', '_self', NULL, NULL, 30, 1, '2018-08-02 04:27:15', '2018-08-02 05:18:58', 'voyager.bi-sliders.index', NULL),
(29, 1, 'Bi Slider Images', '', '_self', NULL, NULL, 30, 2, '2018-08-02 04:47:46', '2018-08-02 05:20:01', 'voyager.bi-slider-images.index', NULL),
(30, 1, 'Sliders', '/admin', '_self', 'voyager-images', '#000000', NULL, 2, '2018-08-02 05:17:37', '2018-08-02 08:58:11', NULL, ''),
(31, 1, 'Bi Reviews', '', '_self', NULL, NULL, NULL, 15, '2018-08-27 16:17:39', '2018-08-27 16:17:39', 'voyager.bi-reviews.index', NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_01_01_000000_add_voyager_user_fields', 1),
(4, '2016_01_01_000000_create_data_types_table', 1),
(5, '2016_05_19_173453_create_menu_table', 1),
(6, '2016_10_21_190000_create_roles_table', 1),
(7, '2016_10_21_190000_create_settings_table', 1),
(8, '2016_11_30_135954_create_permission_table', 1),
(9, '2016_11_30_141208_create_permission_role_table', 1),
(10, '2016_12_26_201236_data_types__add__server_side', 1),
(11, '2017_01_13_000000_add_route_to_menu_items_table', 1),
(12, '2017_01_14_005015_create_translations_table', 1),
(13, '2017_01_15_000000_make_table_name_nullable_in_permissions_table', 1),
(14, '2017_03_06_000000_add_controller_to_data_types_table', 1),
(15, '2017_04_21_000000_add_order_to_data_rows_table', 1),
(16, '2017_07_05_210000_add_policyname_to_data_types_table', 1),
(17, '2017_08_05_000000_add_group_to_settings_table', 1),
(18, '2017_11_26_013050_add_user_role_relationship', 1),
(19, '2017_11_26_015000_create_user_roles_table', 1),
(20, '2018_03_11_000000_add_user_settings', 1),
(21, '2018_03_14_000000_add_details_to_data_types_table', 1),
(22, '2018_03_16_000000_make_settings_value_nullable', 1),
(23, '2016_01_01_000000_create_pages_table', 2),
(24, '2016_01_01_000000_create_posts_table', 2),
(25, '2016_02_15_204651_create_categories_table', 2),
(26, '2017_04_11_000000_alter_post_nullable_fields_table', 2),
(27, '2018_07_29_164649_create_shoppingcart_table', 3),
(28, '2018_08_19_183151_create__bi_user_table', 4),
(29, '2018_08_20_071139_create_customers_table', 5),
(30, '2018_08_20_071140_create_customer_password_resets_table', 5),
(31, '2018_08_20_082553_create_customers_table', 6),
(32, '2018_08_20_082554_create_customer_password_resets_table', 6),
(33, '2018_08_20_091148_create_customers_table', 7),
(34, '2018_08_20_091149_create_customer_password_resets_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'INACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `author_id`, `title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 'Hello World', 'Hang the jib grog grog blossom grapple dance the hempen jig gangway pressgang bilge rat to go on account lugger. Nelsons folly gabion line draught scallywag fire ship gaff fluke fathom case shot. Sea Legs bilge rat sloop matey gabion long clothes run a shot across the bow Gold Road cog league.', '<p>Hello World. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', 'pages/page1.jpg', 'hello-world', 'Yar Meta Description', 'Keyword1, Keyword2', 'ACTIVE', '2018-07-13 03:02:23', '2018-07-13 03:02:23');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `key`, `table_name`, `created_at`, `updated_at`) VALUES
(1, 'browse_admin', NULL, '2018-07-13 02:50:35', '2018-07-13 02:50:35'),
(2, 'browse_bread', NULL, '2018-07-13 02:50:35', '2018-07-13 02:50:35'),
(3, 'browse_database', NULL, '2018-07-13 02:50:35', '2018-07-13 02:50:35'),
(4, 'browse_media', NULL, '2018-07-13 02:50:35', '2018-07-13 02:50:35'),
(5, 'browse_compass', NULL, '2018-07-13 02:50:36', '2018-07-13 02:50:36'),
(6, 'browse_menus', 'menus', '2018-07-13 02:50:36', '2018-07-13 02:50:36'),
(7, 'read_menus', 'menus', '2018-07-13 02:50:36', '2018-07-13 02:50:36'),
(8, 'edit_menus', 'menus', '2018-07-13 02:50:36', '2018-07-13 02:50:36'),
(9, 'add_menus', 'menus', '2018-07-13 02:50:36', '2018-07-13 02:50:36'),
(10, 'delete_menus', 'menus', '2018-07-13 02:50:36', '2018-07-13 02:50:36'),
(11, 'browse_roles', 'roles', '2018-07-13 02:50:36', '2018-07-13 02:50:36'),
(12, 'read_roles', 'roles', '2018-07-13 02:50:36', '2018-07-13 02:50:36'),
(13, 'edit_roles', 'roles', '2018-07-13 02:50:36', '2018-07-13 02:50:36'),
(14, 'add_roles', 'roles', '2018-07-13 02:50:36', '2018-07-13 02:50:36'),
(15, 'delete_roles', 'roles', '2018-07-13 02:50:36', '2018-07-13 02:50:36'),
(16, 'browse_users', 'users', '2018-07-13 02:50:36', '2018-07-13 02:50:36'),
(17, 'read_users', 'users', '2018-07-13 02:50:36', '2018-07-13 02:50:36'),
(18, 'edit_users', 'users', '2018-07-13 02:50:36', '2018-07-13 02:50:36'),
(19, 'add_users', 'users', '2018-07-13 02:50:36', '2018-07-13 02:50:36'),
(20, 'delete_users', 'users', '2018-07-13 02:50:36', '2018-07-13 02:50:36'),
(21, 'browse_settings', 'settings', '2018-07-13 02:50:36', '2018-07-13 02:50:36'),
(22, 'read_settings', 'settings', '2018-07-13 02:50:36', '2018-07-13 02:50:36'),
(23, 'edit_settings', 'settings', '2018-07-13 02:50:36', '2018-07-13 02:50:36'),
(24, 'add_settings', 'settings', '2018-07-13 02:50:36', '2018-07-13 02:50:36'),
(25, 'delete_settings', 'settings', '2018-07-13 02:50:36', '2018-07-13 02:50:36'),
(26, 'browse_hooks', NULL, '2018-07-13 02:50:37', '2018-07-13 02:50:37'),
(27, 'browse_categories', 'categories', '2018-07-13 03:02:21', '2018-07-13 03:02:21'),
(28, 'read_categories', 'categories', '2018-07-13 03:02:21', '2018-07-13 03:02:21'),
(29, 'edit_categories', 'categories', '2018-07-13 03:02:21', '2018-07-13 03:02:21'),
(30, 'add_categories', 'categories', '2018-07-13 03:02:21', '2018-07-13 03:02:21'),
(31, 'delete_categories', 'categories', '2018-07-13 03:02:21', '2018-07-13 03:02:21'),
(32, 'browse_posts', 'posts', '2018-07-13 03:02:22', '2018-07-13 03:02:22'),
(33, 'read_posts', 'posts', '2018-07-13 03:02:22', '2018-07-13 03:02:22'),
(34, 'edit_posts', 'posts', '2018-07-13 03:02:22', '2018-07-13 03:02:22'),
(35, 'add_posts', 'posts', '2018-07-13 03:02:22', '2018-07-13 03:02:22'),
(36, 'delete_posts', 'posts', '2018-07-13 03:02:22', '2018-07-13 03:02:22'),
(37, 'browse_pages', 'pages', '2018-07-13 03:02:22', '2018-07-13 03:02:22'),
(38, 'read_pages', 'pages', '2018-07-13 03:02:22', '2018-07-13 03:02:22'),
(39, 'edit_pages', 'pages', '2018-07-13 03:02:23', '2018-07-13 03:02:23'),
(40, 'add_pages', 'pages', '2018-07-13 03:02:23', '2018-07-13 03:02:23'),
(41, 'delete_pages', 'pages', '2018-07-13 03:02:23', '2018-07-13 03:02:23'),
(42, 'browse_bi_products', 'bi_products', '2018-07-14 05:29:09', '2018-07-14 05:29:09'),
(43, 'read_bi_products', 'bi_products', '2018-07-14 05:29:09', '2018-07-14 05:29:09'),
(44, 'edit_bi_products', 'bi_products', '2018-07-14 05:29:09', '2018-07-14 05:29:09'),
(45, 'add_bi_products', 'bi_products', '2018-07-14 05:29:09', '2018-07-14 05:29:09'),
(46, 'delete_bi_products', 'bi_products', '2018-07-14 05:29:09', '2018-07-14 05:29:09'),
(47, 'browse_bi_product_attribute', 'bi_product_attribute', '2018-07-14 05:45:07', '2018-07-14 05:45:07'),
(48, 'read_bi_product_attribute', 'bi_product_attribute', '2018-07-14 05:45:07', '2018-07-14 05:45:07'),
(49, 'edit_bi_product_attribute', 'bi_product_attribute', '2018-07-14 05:45:07', '2018-07-14 05:45:07'),
(50, 'add_bi_product_attribute', 'bi_product_attribute', '2018-07-14 05:45:07', '2018-07-14 05:45:07'),
(51, 'delete_bi_product_attribute', 'bi_product_attribute', '2018-07-14 05:45:07', '2018-07-14 05:45:07'),
(52, 'browse_bi_product_description', 'bi_product_description', '2018-07-14 06:14:43', '2018-07-14 06:14:43'),
(53, 'read_bi_product_description', 'bi_product_description', '2018-07-14 06:14:43', '2018-07-14 06:14:43'),
(54, 'edit_bi_product_description', 'bi_product_description', '2018-07-14 06:14:43', '2018-07-14 06:14:43'),
(55, 'add_bi_product_description', 'bi_product_description', '2018-07-14 06:14:43', '2018-07-14 06:14:43'),
(56, 'delete_bi_product_description', 'bi_product_description', '2018-07-14 06:14:43', '2018-07-14 06:14:43'),
(57, 'browse_bi_categories', 'bi_categories', '2018-07-19 04:02:15', '2018-07-19 04:02:15'),
(58, 'read_bi_categories', 'bi_categories', '2018-07-19 04:02:15', '2018-07-19 04:02:15'),
(59, 'edit_bi_categories', 'bi_categories', '2018-07-19 04:02:15', '2018-07-19 04:02:15'),
(60, 'add_bi_categories', 'bi_categories', '2018-07-19 04:02:15', '2018-07-19 04:02:15'),
(61, 'delete_bi_categories', 'bi_categories', '2018-07-19 04:02:15', '2018-07-19 04:02:15'),
(62, 'browse_bi_coupons', 'bi_coupons', '2018-07-19 05:08:55', '2018-07-19 05:08:55'),
(63, 'read_bi_coupons', 'bi_coupons', '2018-07-19 05:08:55', '2018-07-19 05:08:55'),
(64, 'edit_bi_coupons', 'bi_coupons', '2018-07-19 05:08:55', '2018-07-19 05:08:55'),
(65, 'add_bi_coupons', 'bi_coupons', '2018-07-19 05:08:55', '2018-07-19 05:08:55'),
(66, 'delete_bi_coupons', 'bi_coupons', '2018-07-19 05:08:55', '2018-07-19 05:08:55'),
(72, 'browse_bi_c_group', 'bi_c_group', '2018-07-22 09:16:35', '2018-07-22 09:16:35'),
(73, 'read_bi_c_group', 'bi_c_group', '2018-07-22 09:16:35', '2018-07-22 09:16:35'),
(74, 'edit_bi_c_group', 'bi_c_group', '2018-07-22 09:16:35', '2018-07-22 09:16:35'),
(75, 'add_bi_c_group', 'bi_c_group', '2018-07-22 09:16:35', '2018-07-22 09:16:35'),
(76, 'delete_bi_c_group', 'bi_c_group', '2018-07-22 09:16:35', '2018-07-22 09:16:35'),
(87, 'browse_bi_merchants', 'bi_merchants', '2018-07-22 12:13:26', '2018-07-22 12:13:26'),
(88, 'read_bi_merchants', 'bi_merchants', '2018-07-22 12:13:26', '2018-07-22 12:13:26'),
(89, 'edit_bi_merchants', 'bi_merchants', '2018-07-22 12:13:26', '2018-07-22 12:13:26'),
(90, 'add_bi_merchants', 'bi_merchants', '2018-07-22 12:13:26', '2018-07-22 12:13:26'),
(91, 'delete_bi_merchants', 'bi_merchants', '2018-07-22 12:13:26', '2018-07-22 12:13:26'),
(92, 'browse_bi_m_groups', 'bi_m_groups', '2018-07-24 03:33:32', '2018-07-24 03:33:32'),
(93, 'read_bi_m_groups', 'bi_m_groups', '2018-07-24 03:33:32', '2018-07-24 03:33:32'),
(94, 'edit_bi_m_groups', 'bi_m_groups', '2018-07-24 03:33:32', '2018-07-24 03:33:32'),
(95, 'add_bi_m_groups', 'bi_m_groups', '2018-07-24 03:33:32', '2018-07-24 03:33:32'),
(96, 'delete_bi_m_groups', 'bi_m_groups', '2018-07-24 03:33:32', '2018-07-24 03:33:32'),
(97, 'browse_bi_sliders', 'bi_sliders', '2018-08-02 04:27:15', '2018-08-02 04:27:15'),
(98, 'read_bi_sliders', 'bi_sliders', '2018-08-02 04:27:15', '2018-08-02 04:27:15'),
(99, 'edit_bi_sliders', 'bi_sliders', '2018-08-02 04:27:15', '2018-08-02 04:27:15'),
(100, 'add_bi_sliders', 'bi_sliders', '2018-08-02 04:27:15', '2018-08-02 04:27:15'),
(101, 'delete_bi_sliders', 'bi_sliders', '2018-08-02 04:27:15', '2018-08-02 04:27:15'),
(102, 'browse_bi_slider_images', 'bi_slider_images', '2018-08-02 04:47:46', '2018-08-02 04:47:46'),
(103, 'read_bi_slider_images', 'bi_slider_images', '2018-08-02 04:47:46', '2018-08-02 04:47:46'),
(104, 'edit_bi_slider_images', 'bi_slider_images', '2018-08-02 04:47:46', '2018-08-02 04:47:46'),
(105, 'add_bi_slider_images', 'bi_slider_images', '2018-08-02 04:47:46', '2018-08-02 04:47:46'),
(106, 'delete_bi_slider_images', 'bi_slider_images', '2018-08-02 04:47:46', '2018-08-02 04:47:46'),
(107, 'browse_bi_order_status', 'bi_order_status', '2018-08-06 09:51:04', '2018-08-06 09:51:04'),
(108, 'read_bi_order_status', 'bi_order_status', '2018-08-06 09:51:04', '2018-08-06 09:51:04'),
(109, 'edit_bi_order_status', 'bi_order_status', '2018-08-06 09:51:04', '2018-08-06 09:51:04'),
(110, 'add_bi_order_status', 'bi_order_status', '2018-08-06 09:51:04', '2018-08-06 09:51:04'),
(111, 'delete_bi_order_status', 'bi_order_status', '2018-08-06 09:51:04', '2018-08-06 09:51:04'),
(112, 'browse_bi_customers', 'bi_customers', '2018-08-22 08:07:58', '2018-08-22 08:07:58'),
(113, 'read_bi_customers', 'bi_customers', '2018-08-22 08:07:58', '2018-08-22 08:07:58'),
(114, 'edit_bi_customers', 'bi_customers', '2018-08-22 08:07:58', '2018-08-22 08:07:58'),
(115, 'add_bi_customers', 'bi_customers', '2018-08-22 08:07:58', '2018-08-22 08:07:58'),
(116, 'delete_bi_customers', 'bi_customers', '2018-08-22 08:07:58', '2018-08-22 08:07:58'),
(117, 'browse_bi_reviews', 'bi_reviews', '2018-08-27 16:17:39', '2018-08-27 16:17:39'),
(118, 'read_bi_reviews', 'bi_reviews', '2018-08-27 16:17:39', '2018-08-27 16:17:39'),
(119, 'edit_bi_reviews', 'bi_reviews', '2018-08-27 16:17:39', '2018-08-27 16:17:39'),
(120, 'add_bi_reviews', 'bi_reviews', '2018-08-27 16:17:39', '2018-08-27 16:17:39'),
(121, 'delete_bi_reviews', 'bi_reviews', '2018-08-27 16:17:39', '2018-08-27 16:17:39');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(77, 1),
(78, 1),
(79, 1),
(80, 1),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(85, 1),
(86, 1),
(87, 1),
(88, 1),
(89, 1),
(90, 1),
(91, 1),
(92, 1),
(93, 1),
(94, 1),
(95, 1),
(96, 1),
(97, 1),
(98, 1),
(99, 1),
(100, 1),
(101, 1),
(102, 1),
(103, 1),
(104, 1),
(105, 1),
(106, 1),
(107, 1),
(108, 1),
(109, 1),
(110, 1),
(111, 1),
(112, 1),
(113, 1),
(114, 1),
(115, 1),
(116, 1),
(112, 1),
(113, 1),
(114, 1),
(115, 1),
(116, 1),
(117, 1),
(118, 1),
(119, 1),
(120, 1),
(121, 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `status` enum('PUBLISHED','DRAFT','PENDING') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'DRAFT',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `author_id`, `category_id`, `title`, `seo_title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `featured`, `created_at`, `updated_at`) VALUES
(1, 0, NULL, 'Lorem Ipsum Post', NULL, 'This is the excerpt for the Lorem Ipsum Post', '<p>This is the body of the lorem ipsum post</p>', 'posts/post1.jpg', 'lorem-ipsum-post', 'This is the meta description', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2018-07-13 03:02:22', '2018-07-13 03:02:22'),
(2, 0, NULL, 'My Sample Post', NULL, 'This is the excerpt for the sample Post', '<p>This is the body for the sample post, which includes the body.</p>\n                <h2>We can use all kinds of format!</h2>\n                <p>And include a bunch of other stuff.</p>', 'posts/post2.jpg', 'my-sample-post', 'Meta Description for sample post', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2018-07-13 03:02:22', '2018-07-13 03:02:22'),
(3, 0, NULL, 'Latest Post', NULL, 'This is the excerpt for the latest post', '<p>This is the body for the latest post</p>', 'posts/post3.jpg', 'latest-post', 'This is the meta description', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2018-07-13 03:02:22', '2018-07-13 03:02:22'),
(4, 0, NULL, 'Yarr Post', NULL, 'Reef sails nipperkin bring a spring upon her cable coffer jury mast spike marooned Pieces of Eight poop deck pillage. Clipper driver coxswain galleon hempen halter come about pressgang gangplank boatswain swing the lead. Nipperkin yard skysail swab lanyard Blimey bilge water ho quarter Buccaneer.', '<p>Swab deadlights Buccaneer fire ship square-rigged dance the hempen jig weigh anchor cackle fruit grog furl. Crack Jennys tea cup chase guns pressgang hearties spirits hogshead Gold Road six pounders fathom measured fer yer chains. Main sheet provost come about trysail barkadeer crimp scuttle mizzenmast brig plunder.</p>\n<p>Mizzen league keelhaul galleon tender cog chase Barbary Coast doubloon crack Jennys tea cup. Blow the man down lugsail fire ship pinnace cackle fruit line warp Admiral of the Black strike colors doubloon. Tackle Jack Ketch come about crimp rum draft scuppers run a shot across the bow haul wind maroon.</p>\n<p>Interloper heave down list driver pressgang holystone scuppers tackle scallywag bilged on her anchor. Jack Tar interloper draught grapple mizzenmast hulk knave cable transom hogshead. Gaff pillage to go on account grog aft chase guns piracy yardarm knave clap of thunder.</p>', 'posts/post4.jpg', 'yarr-post', 'this be a meta descript', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2018-07-13 03:02:22', '2018-07-13 03:02:22');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', '2018-07-13 02:50:35', '2018-07-13 02:50:35'),
(2, 'user', 'Normal User', '2018-07-13 02:50:35', '2018-07-13 02:50:35');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `details` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `group` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `display_name`, `value`, `details`, `type`, `order`, `group`) VALUES
(1, 'site.title', 'Site Title', 'Boninja', '', 'text', 1, 'Site'),
(2, 'site.description', 'Site Description', 'Site Description', '', 'text', 2, 'Site'),
(3, 'site.logo', 'Site Logo', '', '', 'image', 3, 'Site'),
(4, 'site.google_analytics_tracking_id', 'Google Analytics Tracking ID', NULL, '', 'text', 4, 'Site'),
(5, 'admin.bg_image', 'Admin Background Image', '', '', 'image', 5, 'Admin'),
(6, 'admin.title', 'Admin Title', 'Boninja', '', 'text', 1, 'Admin'),
(7, 'admin.description', 'Admin Description', 'Welcome to Boninja Admin Panel', '', 'text', 2, 'Admin'),
(8, 'admin.loader', 'Admin Loader', '', '', 'image', 3, 'Admin'),
(9, 'admin.icon_image', 'Admin Icon Image', '', '', 'image', 4, 'Admin'),
(10, 'admin.google_analytics_client_id', 'Google Analytics Client ID (used for admin dashboard)', NULL, '', 'text', 1, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `identifier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `translations`
--

CREATE TABLE `translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `table_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int(10) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `translations`
--

INSERT INTO `translations` (`id`, `table_name`, `column_name`, `foreign_key`, `locale`, `value`, `created_at`, `updated_at`) VALUES
(1, 'data_types', 'display_name_singular', 5, 'pt', 'Post', '2018-07-13 03:02:23', '2018-07-13 03:02:23'),
(2, 'data_types', 'display_name_singular', 6, 'pt', 'Página', '2018-07-13 03:02:23', '2018-07-13 03:02:23'),
(3, 'data_types', 'display_name_singular', 1, 'pt', 'Utilizador', '2018-07-13 03:02:23', '2018-07-13 03:02:23'),
(4, 'data_types', 'display_name_singular', 4, 'pt', 'Categoria', '2018-07-13 03:02:23', '2018-07-13 03:02:23'),
(5, 'data_types', 'display_name_singular', 2, 'pt', 'Menu', '2018-07-13 03:02:23', '2018-07-13 03:02:23'),
(6, 'data_types', 'display_name_singular', 3, 'pt', 'Função', '2018-07-13 03:02:23', '2018-07-13 03:02:23'),
(7, 'data_types', 'display_name_plural', 5, 'pt', 'Posts', '2018-07-13 03:02:23', '2018-07-13 03:02:23'),
(8, 'data_types', 'display_name_plural', 6, 'pt', 'Páginas', '2018-07-13 03:02:23', '2018-07-13 03:02:23'),
(9, 'data_types', 'display_name_plural', 1, 'pt', 'Utilizadores', '2018-07-13 03:02:23', '2018-07-13 03:02:23'),
(10, 'data_types', 'display_name_plural', 4, 'pt', 'Categorias', '2018-07-13 03:02:23', '2018-07-13 03:02:23'),
(11, 'data_types', 'display_name_plural', 2, 'pt', 'Menus', '2018-07-13 03:02:23', '2018-07-13 03:02:23'),
(12, 'data_types', 'display_name_plural', 3, 'pt', 'Funções', '2018-07-13 03:02:23', '2018-07-13 03:02:23'),
(13, 'categories', 'slug', 1, 'pt', 'categoria-1', '2018-07-13 03:02:23', '2018-07-13 03:02:23'),
(14, 'categories', 'name', 1, 'pt', 'Categoria 1', '2018-07-13 03:02:23', '2018-07-13 03:02:23'),
(15, 'categories', 'slug', 2, 'pt', 'categoria-2', '2018-07-13 03:02:23', '2018-07-13 03:02:23'),
(16, 'categories', 'name', 2, 'pt', 'Categoria 2', '2018-07-13 03:02:23', '2018-07-13 03:02:23'),
(17, 'pages', 'title', 1, 'pt', 'Olá Mundo', '2018-07-13 03:02:23', '2018-07-13 03:02:23'),
(18, 'pages', 'slug', 1, 'pt', 'ola-mundo', '2018-07-13 03:02:23', '2018-07-13 03:02:23'),
(19, 'pages', 'body', 1, 'pt', '<p>Olá Mundo. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\r\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', '2018-07-13 03:02:23', '2018-07-13 03:02:23'),
(20, 'menu_items', 'title', 1, 'pt', 'Painel de Controle', '2018-07-13 03:02:23', '2018-07-13 03:02:23'),
(21, 'menu_items', 'title', 2, 'pt', 'Media', '2018-07-13 03:02:23', '2018-07-13 03:02:23'),
(22, 'menu_items', 'title', 13, 'pt', 'Publicações', '2018-07-13 03:02:23', '2018-07-13 03:02:23'),
(23, 'menu_items', 'title', 3, 'pt', 'Utilizadores', '2018-07-13 03:02:23', '2018-07-13 03:02:23'),
(24, 'menu_items', 'title', 12, 'pt', 'Categorias', '2018-07-13 03:02:23', '2018-07-13 03:02:23'),
(25, 'menu_items', 'title', 14, 'pt', 'Páginas', '2018-07-13 03:02:23', '2018-07-13 03:02:23'),
(26, 'menu_items', 'title', 4, 'pt', 'Funções', '2018-07-13 03:02:23', '2018-07-13 03:02:23'),
(27, 'menu_items', 'title', 5, 'pt', 'Ferramentas', '2018-07-13 03:02:23', '2018-07-13 03:02:23'),
(28, 'menu_items', 'title', 6, 'pt', 'Menus', '2018-07-13 03:02:23', '2018-07-13 03:02:23'),
(29, 'menu_items', 'title', 7, 'pt', 'Base de dados', '2018-07-13 03:02:23', '2018-07-13 03:02:23'),
(30, 'menu_items', 'title', 10, 'pt', 'Configurações', '2018-07-13 03:02:23', '2018-07-13 03:02:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `avatar`, `password`, `remember_token`, `settings`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', 'admin@admin.com', 'users/default.png', '$2y$10$kVU.s1c1XdNnW9KCspD1cuN1AhufvyO8VRXoGJ1FeSYB1MVZPL3Sm', '6t7JMD9t4g2c73gR2mvwXFUCz8v4Ur0Pz8e5YAGjSxg830EnhhHNWQlS2otv', NULL, '2018-07-13 03:02:21', '2018-07-13 03:02:21');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bi_cart`
--
ALTER TABLE `bi_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_id` (`api_id`,`customer_id`,`session_id`,`product_id`,`recurring_id`);

--
-- Indexes for table `bi_categories`
--
ALTER TABLE `bi_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bi_category_bi_product`
--
ALTER TABLE `bi_category_bi_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bi_product_category_product_id_index` (`bi_product_id`),
  ADD KEY `bi_product_category_category_id_index` (`bi_category_id`);

--
-- Indexes for table `bi_coupons`
--
ALTER TABLE `bi_coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bi_customers`
--
ALTER TABLE `bi_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bi_c_groups`
--
ALTER TABLE `bi_c_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bi_c_group_name_unique` (`name`);

--
-- Indexes for table `bi_c_group_bi_customer`
--
ALTER TABLE `bi_c_group_bi_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bi_merchants`
--
ALTER TABLE `bi_merchants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bi_m_groups`
--
ALTER TABLE `bi_m_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bi_m_groups_name_unique` (`name`);

--
-- Indexes for table `bi_m_group_bi_merchant`
--
ALTER TABLE `bi_m_group_bi_merchant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bi_orders`
--
ALTER TABLE `bi_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bi_order_items`
--
ALTER TABLE `bi_order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bi_order_status`
--
ALTER TABLE `bi_order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bi_products`
--
ALTER TABLE `bi_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bi_products_sold_index` (`sold`);

--
-- Indexes for table `bi_product_attributes`
--
ALTER TABLE `bi_product_attributes`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `bi_reviews`
--
ALTER TABLE `bi_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bi_sliders`
--
ALTER TABLE `bi_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bi_slider_images`
--
ALTER TABLE `bi_slider_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `customer_password_resets`
--
ALTER TABLE `customer_password_resets`
  ADD KEY `customer_password_resets_email_index` (`email`),
  ADD KEY `customer_password_resets_token_index` (`token`);

--
-- Indexes for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_rows_data_type_id_foreign` (`data_type_id`);

--
-- Indexes for table `data_types`
--
ALTER TABLE `data_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `data_types_name_unique` (`name`),
  ADD UNIQUE KEY `data_types_slug_unique` (`slug`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`identifier`,`instance`);

--
-- Indexes for table `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bi_cart`
--
ALTER TABLE `bi_cart`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bi_categories`
--
ALTER TABLE `bi_categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `bi_category_bi_product`
--
ALTER TABLE `bi_category_bi_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT for table `bi_customers`
--
ALTER TABLE `bi_customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `bi_c_groups`
--
ALTER TABLE `bi_c_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bi_c_group_bi_customer`
--
ALTER TABLE `bi_c_group_bi_customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `bi_merchants`
--
ALTER TABLE `bi_merchants`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bi_m_groups`
--
ALTER TABLE `bi_m_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bi_m_group_bi_merchant`
--
ALTER TABLE `bi_m_group_bi_merchant`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bi_orders`
--
ALTER TABLE `bi_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `bi_order_items`
--
ALTER TABLE `bi_order_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `bi_order_status`
--
ALTER TABLE `bi_order_status`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bi_products`
--
ALTER TABLE `bi_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `bi_reviews`
--
ALTER TABLE `bi_reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `bi_sliders`
--
ALTER TABLE `bi_sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bi_slider_images`
--
ALTER TABLE `bi_slider_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `data_rows`
--
ALTER TABLE `data_rows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=398;

--
-- AUTO_INCREMENT for table `data_types`
--
ALTER TABLE `data_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
