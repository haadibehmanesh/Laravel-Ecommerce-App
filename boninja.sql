-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 22, 2018 at 04:44 PM
-- Server version: 5.7.22-0ubuntu0.16.04.1
-- PHP Version: 7.0.30-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bi_categories`
--

INSERT INTO `bi_categories` (`id`, `parent_id`, `language_id`, `name`, `description`, `image`, `sort_order`, `top`, `column`, `status`, `created_at`, `updated_at`, `meta_title`, `meta_description`, `meta_keyword`, `slug`) VALUES
(1, NULL, NULL, 'services', NULL, NULL, NULL, NULL, NULL, 0, '2018-07-19 04:06:58', '2018-07-19 04:06:58', NULL, NULL, NULL, NULL),
(2, 0, NULL, 'Rest', 'Resturant', NULL, NULL, NULL, NULL, 1, '2018-07-19 09:34:08', '2018-07-19 09:34:08', NULL, NULL, NULL, 'rest'),
(3, NULL, NULL, 'fastfood', NULL, NULL, NULL, NULL, NULL, 0, '2018-07-20 05:50:00', '2018-07-20 07:31:09', NULL, NULL, NULL, 'fastfood');

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
(21, 2, 3, '2018-07-21 08:07:53', '2018-07-21 08:07:53');

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
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `email` varchar(96) NOT NULL,
  `telephone` varchar(32) NOT NULL,
  `fax` varchar(32) DEFAULT NULL,
  `password` varchar(128) NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bi_customers`
--

INSERT INTO `bi_customers` (`id`, `store_id`, `language_id`, `firstname`, `lastname`, `email`, `telephone`, `fax`, `password`, `salt`, `cart`, `wishlist`, `newsletter`, `address_id`, `custom_field`, `ip`, `status`, `safe`, `token`, `code`, `created_at`, `updated_at`) VALUES
(3, 0, NULL, 'Hamid', 'Alizadeh', 'hamid@hamid.hamid', '935', NULL, '$2y$10$zg452Zbl5WaK0IKVVemakOqXAyh7958rOF/2CKcEu5KtK/CHJeCoS', NULL, NULL, NULL, 0, 0, NULL, NULL, 0, 0, NULL, NULL, '2018-07-22 11:20:00', '2018-07-22 11:20:41');

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
(2, 'vip 2', NULL, NULL, '2018-07-22 11:11:29', '2018-07-22 11:11:29');

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
(5, 1, 3, '2018-07-22 11:20:41', '2018-07-22 11:20:41');

-- --------------------------------------------------------

--
-- Table structure for table `bi_merchants`
--

CREATE TABLE `bi_merchants` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` text COLLATE utf8mb4_unicode_ci,
  `geocode` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `city_id` int(11) DEFAULT NULL,
  `postcode` varchar(18) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `region_id` int(11) DEFAULT NULL,
  `account_id` int(11) DEFAULT NULL,
  `password` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `contract_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `ip` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL
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
  `model` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upc` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ean` varchar(14) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jan` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isbn` varchar(17) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mpn` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `stock_status_id` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manufacturer_id` int(11) DEFAULT NULL,
  `shipping` tinyint(4) DEFAULT '1',
  `price` decimal(10,0) NOT NULL DEFAULT '0',
  `points` int(11) DEFAULT '0',
  `tax_class_id` int(11) DEFAULT NULL,
  `date_available` date DEFAULT NULL,
  `weight` decimal(10,0) DEFAULT '0',
  `weight_class_id` int(11) DEFAULT '0',
  `length` decimal(10,0) DEFAULT '0',
  `width` decimal(10,0) DEFAULT '0',
  `height` decimal(10,0) DEFAULT '0',
  `length_class_id` int(11) DEFAULT '0',
  `subtract` tinyint(4) DEFAULT '1',
  `minimum` int(11) DEFAULT '1',
  `sort_order` int(11) DEFAULT '0',
  `status` tinyint(4) DEFAULT '0',
  `viewed` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bi_products`
--

INSERT INTO `bi_products` (`id`, `language_id`, `name`, `description`, `tag`, `meta_title`, `meta_description`, `meta_keyword`, `model`, `sku`, `upc`, `ean`, `jan`, `isbn`, `mpn`, `location`, `quantity`, `stock_status_id`, `image`, `manufacturer_id`, `shipping`, `price`, `points`, `tax_class_id`, `date_available`, `weight`, `weight_class_id`, `length`, `width`, `height`, `length_class_id`, `subtract`, `minimum`, `sort_order`, `status`, `viewed`, `created_at`, `updated_at`) VALUES
(2, NULL, 'product4', NULL, NULL, NULL, NULL, NULL, 'p4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 20, NULL, NULL, NULL, 0, '25000', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, 0, NULL, 0, 0, NULL, '2018-07-20 07:27:00', '2018-07-20 07:29:45');

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
(9, 1, 'user_belongsto_role_relationship', 'relationship', 'Role', 0, 1, 1, 1, 1, 0, '{"model":"TCG\\\\Voyager\\\\Models\\\\Role","table":"roles","type":"belongsTo","column":"role_id","key":"id","label":"display_name","pivot_table":"roles","pivot":"0"}', 10),
(10, 1, 'user_belongstomany_role_relationship', 'relationship', 'Roles', 0, 1, 1, 1, 1, 0, '{"model":"TCG\\\\Voyager\\\\Models\\\\Role","table":"roles","type":"belongsToMany","column":"id","key":"id","label":"display_name","pivot_table":"user_roles","pivot":"1","taggable":"0"}', 11),
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
(24, 4, 'parent_id', 'select_dropdown', 'Parent', 0, 0, 1, 1, 1, 1, '{"default":"","null":"","options":{"":"-- None --"},"relationship":{"key":"id","label":"name"}}', 2),
(25, 4, 'order', 'text', 'Order', 1, 1, 1, 1, 1, 1, '{"default":1}', 3),
(26, 4, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '', 4),
(27, 4, 'slug', 'text', 'Slug', 1, 1, 1, 1, 1, 1, '{"slugify":{"origin":"name"}}', 5),
(28, 4, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 0, 0, 0, '', 6),
(29, 4, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '', 7),
(30, 5, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, '', 1),
(31, 5, 'author_id', 'text', 'Author', 1, 0, 1, 1, 0, 1, '', 2),
(32, 5, 'category_id', 'text', 'Category', 1, 0, 1, 1, 1, 0, '', 3),
(33, 5, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, '', 4),
(34, 5, 'excerpt', 'text_area', 'Excerpt', 1, 0, 1, 1, 1, 1, '', 5),
(35, 5, 'body', 'rich_text_box', 'Body', 1, 0, 1, 1, 1, 1, '', 6),
(36, 5, 'image', 'image', 'Post Image', 0, 1, 1, 1, 1, 1, '{"resize":{"width":"1000","height":"null"},"quality":"70%","upsize":true,"thumbnails":[{"name":"medium","scale":"50%"},{"name":"small","scale":"25%"},{"name":"cropped","crop":{"width":"300","height":"250"}}]}', 7),
(37, 5, 'slug', 'text', 'Slug', 1, 0, 1, 1, 1, 1, '{"slugify":{"origin":"title","forceUpdate":true},"validation":{"rule":"unique:posts,slug"}}', 8),
(38, 5, 'meta_description', 'text_area', 'Meta Description', 1, 0, 1, 1, 1, 1, '', 9),
(39, 5, 'meta_keywords', 'text_area', 'Meta Keywords', 1, 0, 1, 1, 1, 1, '', 10),
(40, 5, 'status', 'select_dropdown', 'Status', 1, 1, 1, 1, 1, 1, '{"default":"DRAFT","options":{"PUBLISHED":"published","DRAFT":"draft","PENDING":"pending"}}', 11),
(41, 5, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, '', 12),
(42, 5, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '', 13),
(43, 5, 'seo_title', 'text', 'SEO Title', 0, 1, 1, 1, 1, 1, '', 14),
(44, 5, 'featured', 'checkbox', 'Featured', 1, 1, 1, 1, 1, 1, '', 15),
(45, 6, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, '', 1),
(46, 6, 'author_id', 'text', 'Author', 1, 0, 0, 0, 0, 0, '', 2),
(47, 6, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, '', 3),
(48, 6, 'excerpt', 'text_area', 'Excerpt', 1, 0, 1, 1, 1, 1, '', 4),
(49, 6, 'body', 'rich_text_box', 'Body', 1, 0, 1, 1, 1, 1, '', 5),
(50, 6, 'slug', 'text', 'Slug', 1, 0, 1, 1, 1, 1, '{"slugify":{"origin":"title"},"validation":{"rule":"unique:pages,slug"}}', 6),
(51, 6, 'meta_description', 'text', 'Meta Description', 1, 0, 1, 1, 1, 1, '', 7),
(52, 6, 'meta_keywords', 'text', 'Meta Keywords', 1, 0, 1, 1, 1, 1, '', 8),
(53, 6, 'status', 'select_dropdown', 'Status', 1, 1, 1, 1, 1, 1, '{"default":"INACTIVE","options":{"INACTIVE":"INACTIVE","ACTIVE":"ACTIVE"}}', 9),
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
(151, 14, 'model', 'text', 'Model', 1, 1, 1, 1, 1, 1, '{"null":" "}', 3),
(152, 14, 'sku', 'text', 'Sku', 0, 0, 1, 1, 1, 1, '{"null":" "}', 14),
(153, 14, 'upc', 'text', 'Upc', 0, 0, 1, 1, 1, 1, '{"null":" "}', 15),
(154, 14, 'ean', 'text', 'Ean', 0, 0, 1, 1, 1, 1, '{"null":" "}', 16),
(155, 14, 'jan', 'text', 'Jan', 0, 0, 1, 1, 1, 1, '{"null":" "}', 17),
(156, 14, 'isbn', 'text', 'Isbn', 0, 0, 1, 1, 1, 1, '{"null":" "}', 18),
(157, 14, 'mpn', 'text', 'Mpn', 0, 0, 1, 1, 1, 1, '{"null":" "}', 19),
(158, 14, 'location', 'text', 'Location', 0, 0, 1, 1, 1, 1, '{"null":" "}', 20),
(159, 14, 'quantity', 'number', 'Quantity', 1, 1, 1, 1, 1, 1, NULL, 11),
(160, 14, 'stock_status_id', 'number', 'Stock Status Id', 0, 0, 0, 0, 0, 0, NULL, 21),
(161, 14, 'image', 'image', 'Image', 0, 1, 1, 1, 1, 1, NULL, 9),
(162, 14, 'manufacturer_id', 'number', 'Manufacturer Id', 0, 0, 0, 0, 0, 0, NULL, 22),
(163, 14, 'shipping', 'checkbox', 'Shipping', 0, 0, 1, 1, 1, 1, NULL, 23),
(164, 14, 'price', 'number', 'Price', 1, 1, 1, 1, 1, 1, NULL, 10),
(165, 14, 'points', 'number', 'Points', 0, 0, 1, 1, 1, 1, '{"null":" "}', 24),
(166, 14, 'tax_class_id', 'number', 'Tax Class Id', 0, 0, 0, 0, 0, 0, NULL, 25),
(167, 14, 'date_available', 'date', 'Date Available', 0, 0, 1, 1, 1, 1, NULL, 26),
(168, 14, 'weight', 'number', 'Weight', 0, 0, 1, 1, 1, 1, '{"null":" "}', 27),
(169, 14, 'weight_class_id', 'number', 'Weight Class Id', 0, 0, 0, 0, 0, 0, NULL, 28),
(170, 14, 'length', 'number', 'Length', 0, 0, 1, 1, 1, 1, '{"null":" "}', 29),
(171, 14, 'width', 'number', 'Width', 0, 0, 1, 1, 1, 1, '{"null":" "}', 30),
(172, 14, 'height', 'number', 'Height', 0, 0, 1, 1, 1, 1, '{"null":" "}', 31),
(173, 14, 'length_class_id', 'number', 'Length Class Id', 0, 0, 0, 0, 0, 0, NULL, 32),
(174, 14, 'subtract', 'checkbox', 'Subtract', 0, 0, 1, 1, 1, 1, NULL, 33),
(175, 14, 'minimum', 'number', 'Minimum', 0, 0, 1, 1, 1, 1, NULL, 34),
(176, 14, 'sort_order', 'number', 'Sort Order', 0, 0, 0, 0, 0, 0, NULL, 35),
(177, 14, 'status', 'checkbox', 'Status', 0, 1, 1, 1, 1, 1, NULL, 12),
(178, 14, 'viewed', 'number', 'Viewed', 0, 0, 1, 1, 1, 1, NULL, 36),
(179, 14, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, NULL, 37),
(180, 14, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 38),
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
(195, 14, 'language_id', 'number', 'Language Id', 0, 0, 0, 0, 0, 0, NULL, 13),
(196, 14, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(197, 14, 'description', 'rich_text_box', 'Description', 0, 0, 1, 1, 1, 1, '{"null":" "}', 4),
(198, 14, 'tag', 'text', 'Tag', 0, 0, 1, 1, 1, 1, '{"null":" "}', 5),
(199, 14, 'meta_title', 'text', 'Meta Title', 0, 0, 1, 1, 1, 1, '{"null":" "}', 6),
(200, 14, 'meta_description', 'text', 'Meta Description', 0, 0, 1, 1, 1, 1, '{"null":" "}', 7),
(201, 14, 'meta_keyword', 'text', 'Meta Keyword', 0, 0, 1, 1, 1, 1, '{"null":" "}', 8),
(202, 17, 'id', 'hidden', 'Id', 1, 0, 1, 1, 1, 0, NULL, 1),
(203, 17, 'image', 'text', 'Image', 0, 0, 1, 1, 1, 1, NULL, 4),
(204, 17, 'parent_id', 'number', 'Parent Id', 0, 0, 1, 1, 1, 1, '{"default":"","null":"","options":{"":"-- None --"},"relationship":{"key":"id","label":"name"}}', 5),
(205, 17, 'top', 'number', 'Top', 0, 0, 1, 1, 1, 1, NULL, 6),
(206, 17, 'column', 'number', 'Column', 0, 0, 1, 1, 1, 1, NULL, 7),
(207, 17, 'sort_order', 'number', 'Sort Order', 0, 1, 1, 1, 1, 1, NULL, 8),
(208, 17, 'status', 'checkbox', 'Status', 0, 1, 1, 1, 1, 1, NULL, 9),
(209, 17, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 1, 0, 1, NULL, 10),
(210, 17, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 11),
(211, 17, 'language_id', 'text', 'Language Id', 0, 0, 1, 1, 1, 1, NULL, 12),
(212, 17, 'name', 'text', 'Name', 0, 1, 1, 1, 1, 1, NULL, 2),
(213, 17, 'description', 'text', 'Description', 0, 1, 1, 1, 1, 1, NULL, 3),
(214, 17, 'meta_title', 'text', 'Meta Title', 0, 0, 1, 1, 1, 1, NULL, 13),
(215, 17, 'meta_description', 'text', 'Meta Description', 0, 0, 1, 1, 1, 1, NULL, 14),
(216, 17, 'meta_keyword', 'text', 'Meta Keyword', 0, 0, 1, 1, 1, 1, NULL, 15),
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
(232, 17, 'slug', 'text', 'Slug', 0, 1, 1, 1, 1, 1, '{"slugify":{"origin":"name"}}', 16),
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
(267, 23, 'customer_id', 'hidden', 'Customer Id', 1, 0, 0, 0, 0, 0, NULL, 1),
(268, 23, 'store_id', 'text', 'Store Id', 0, 0, 0, 0, 0, 0, NULL, 2),
(269, 23, 'language_id', 'text', 'Language Id', 0, 0, 0, 0, 0, 0, NULL, 3),
(270, 23, 'firstname', 'text', 'Firstname', 1, 1, 1, 1, 1, 1, NULL, 4),
(271, 23, 'lastname', 'text', 'Lastname', 1, 1, 1, 1, 1, 1, NULL, 5),
(272, 23, 'email', 'text', 'Email', 1, 1, 1, 1, 1, 1, NULL, 6),
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
(289, 24, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, NULL, 1),
(290, 24, 'company_name', 'text', 'Company Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(291, 24, 'email', 'text', 'Email', 1, 1, 1, 1, 1, 1, NULL, 3),
(292, 24, 'first_name', 'text', 'First Name', 0, 1, 1, 1, 1, 1, NULL, 4),
(293, 24, 'last_name', 'text', 'Last Name', 0, 1, 1, 1, 1, 1, NULL, 5),
(294, 24, 'tel', 'text', 'Tel', 1, 1, 1, 1, 1, 1, NULL, 6),
(295, 24, 'mobile', 'text', 'Mobile', 1, 1, 1, 1, 1, 1, NULL, 7),
(296, 24, 'description', 'text', 'Description', 0, 1, 1, 1, 1, 1, NULL, 8),
(297, 24, 'image', 'text', 'Image', 0, 1, 1, 1, 1, 1, NULL, 9),
(298, 24, 'geocode', 'text', 'Geocode', 0, 1, 1, 1, 1, 1, NULL, 10),
(299, 24, 'address', 'text', 'Address', 0, 1, 1, 1, 1, 1, NULL, 11),
(300, 24, 'city_id', 'text', 'City Id', 0, 1, 1, 1, 1, 1, NULL, 12),
(301, 24, 'postcode', 'text', 'Postcode', 0, 1, 1, 1, 1, 1, NULL, 13),
(302, 24, 'country_id', 'text', 'Country Id', 0, 1, 1, 1, 1, 1, NULL, 14),
(303, 24, 'region_id', 'text', 'Region Id', 0, 1, 1, 1, 1, 1, NULL, 15),
(304, 24, 'account_id', 'text', 'Account Id', 0, 1, 1, 1, 1, 1, NULL, 16),
(305, 24, 'password', 'text', 'Password', 1, 1, 1, 1, 1, 1, NULL, 17),
(306, 24, 'start_date', 'text', 'Start Date', 0, 1, 1, 1, 1, 1, NULL, 18),
(307, 24, 'end_date', 'text', 'End Date', 0, 1, 1, 1, 1, 1, NULL, 19),
(308, 24, 'contract_date', 'text', 'Contract Date', 0, 1, 1, 1, 1, 1, NULL, 20),
(309, 24, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, NULL, 21),
(310, 24, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 22),
(311, 24, 'status', 'text', 'Status', 0, 1, 1, 1, 1, 1, NULL, 23),
(312, 24, 'ip', 'text', 'Ip', 0, 1, 1, 1, 1, 1, NULL, 24);

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
(13, 'oc_products', 'oc-products', 'Oc Product', 'Oc Products', NULL, 'App\\OcProduct', NULL, NULL, NULL, 1, 0, '{"order_column":null,"order_display_column":null}', '2018-07-13 04:54:14', '2018-07-13 04:54:14'),
(14, 'bi_products', 'bi-products', 'Bi Product', 'Bi Products', 'voyager-bag', 'App\\BiProduct', NULL, '\\App\\Http\\Controllers\\Voyager\\BiProductsController', NULL, 1, 1, '{"order_column":null,"order_display_column":null}', '2018-07-14 05:29:09', '2018-07-19 10:27:20'),
(15, 'bi_product_attribute', 'bi-product-attribute', 'Bi Product Attribute', 'Bi Product Attributes', NULL, 'App\\BiProductAttribute', NULL, NULL, NULL, 1, 1, '{"order_column":null,"order_display_column":null}', '2018-07-14 05:45:07', '2018-07-14 05:45:07'),
(16, 'bi_product_description', 'bi-product-description', 'Bi Product Description', 'Bi Product Descriptions', NULL, 'App\\BiProductDescription', NULL, NULL, NULL, 1, 1, '{"order_column":null,"order_display_column":null}', '2018-07-14 06:14:43', '2018-07-14 06:14:43'),
(17, 'bi_categories', 'bi-categories', 'Bi Category', 'Bi Categories', 'voyager-window-list', 'App\\BiCategory', NULL, NULL, NULL, 1, 1, '{"order_column":null,"order_display_column":null}', '2018-07-19 04:02:15', '2018-07-19 04:02:15'),
(18, 'bi_coupons', 'bi-coupons', 'Bi Coupon', 'Bi Coupons', 'voyager-dollar', 'App\\BiCoupon', NULL, NULL, NULL, 1, 1, '{"order_column":null,"order_display_column":null}', '2018-07-19 05:08:55', '2018-07-19 05:08:55'),
(21, 'bi_c_group', 'bi-c-group', 'Bi C Group', 'Bi C Groups', NULL, 'App\\BiCGroup', NULL, NULL, NULL, 1, 1, '{"order_column":null,"order_display_column":null}', '2018-07-22 09:16:35', '2018-07-22 09:16:35'),
(23, 'bi_customers', 'bi-customers', 'Bi Customer', 'Bi Customers', NULL, 'App\\BiCustomer', NULL, '\\App\\Http\\Controllers\\Voyager\\BiCustomerController', NULL, 1, 1, '{"order_column":null,"order_display_column":null}', '2018-07-22 11:08:34', '2018-07-22 11:08:34'),
(24, 'bi_merchants', 'bi-merchants', 'Bi Merchant', 'Bi Merchants', NULL, 'App\\BiMerchant', NULL, NULL, NULL, 1, 1, '{"order_column":null,"order_display_column":null}', '2018-07-22 12:13:26', '2018-07-22 12:13:26');

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
(2, 1, 'Media', '', '_self', 'voyager-images', NULL, NULL, 7, '2018-07-13 02:50:35', '2018-07-22 09:18:28', 'voyager.media.index', NULL),
(3, 1, 'Users', '', '_self', 'voyager-person', NULL, NULL, 6, '2018-07-13 02:50:35', '2018-07-22 09:18:28', 'voyager.users.index', NULL),
(4, 1, 'Roles', '', '_self', 'voyager-lock', NULL, NULL, 5, '2018-07-13 02:50:35', '2018-07-22 09:18:27', 'voyager.roles.index', NULL),
(5, 1, 'Tools', '', '_self', 'voyager-tools', NULL, NULL, 11, '2018-07-13 02:50:35', '2018-07-22 09:18:33', NULL, NULL),
(6, 1, 'Menu Builder', '', '_self', 'voyager-list', NULL, 5, 1, '2018-07-13 02:50:35', '2018-07-13 03:23:10', 'voyager.menus.index', NULL),
(7, 1, 'Database', '', '_self', 'voyager-data', NULL, 5, 2, '2018-07-13 02:50:35', '2018-07-19 04:09:12', 'voyager.database.index', NULL),
(8, 1, 'Compass', '', '_self', 'voyager-compass', NULL, 5, 3, '2018-07-13 02:50:35', '2018-07-19 04:09:12', 'voyager.compass.index', NULL),
(9, 1, 'BREAD', '', '_self', 'voyager-bread', NULL, 5, 4, '2018-07-13 02:50:35', '2018-07-19 04:09:12', 'voyager.bread.index', NULL),
(10, 1, 'Settings', '', '_self', 'voyager-settings', NULL, NULL, 12, '2018-07-13 02:50:35', '2018-07-22 09:18:33', 'voyager.settings.index', NULL),
(11, 1, 'Hooks', '', '_self', 'voyager-hook', NULL, 5, 5, '2018-07-13 02:50:37', '2018-07-19 04:09:12', 'voyager.hooks', NULL),
(12, 1, 'Categories', '', '_self', 'voyager-categories', NULL, NULL, 10, '2018-07-13 03:02:21', '2018-07-22 09:18:33', 'voyager.categories.index', NULL),
(13, 1, 'Posts', '', '_self', 'voyager-news', NULL, NULL, 8, '2018-07-13 03:02:22', '2018-07-22 09:18:28', 'voyager.posts.index', NULL),
(14, 1, 'Pages', '', '_self', 'voyager-file-text', NULL, NULL, 9, '2018-07-13 03:02:22', '2018-07-22 09:18:33', 'voyager.pages.index', NULL),
(15, 1, 'Catalog', '/admin', '_self', 'voyager-list', '#000000', NULL, 2, '2018-07-13 03:22:53', '2018-07-13 04:07:41', NULL, ''),
(16, 1, 'Bi Products', '', '_self', 'voyager-bag', NULL, 15, 2, '2018-07-14 05:29:09', '2018-07-21 10:43:26', 'voyager.bi-products.index', NULL),
(19, 1, 'Bi Categories', '', '_self', 'voyager-window-list', NULL, 15, 1, '2018-07-19 04:02:15', '2018-07-21 10:43:26', 'voyager.bi-categories.index', NULL),
(20, 1, 'Bi Coupons', '', '_self', 'voyager-dollar', NULL, NULL, 4, '2018-07-19 05:08:55', '2018-07-22 09:18:27', 'voyager.bi-coupons.index', NULL),
(21, 1, 'Customers', '/admin', '_self', 'voyager-group', '#000000', NULL, 3, '2018-07-21 10:43:05', '2018-07-21 11:05:33', NULL, ''),
(22, 1, 'Bi Customers', '', '_self', 'voyager-people', '#000000', 21, 1, '2018-07-21 11:01:59', '2018-07-21 11:04:23', 'voyager.bi-customers.index', 'null'),
(23, 1, 'Bi C Groups', '', '_self', NULL, NULL, 21, 2, '2018-07-22 09:16:35', '2018-07-22 09:18:33', 'voyager.bi-c-group.index', NULL),
(25, 1, 'Bi Merchants', '', '_self', NULL, NULL, NULL, 13, '2018-07-22 12:13:26', '2018-07-22 12:13:26', 'voyager.bi-merchants.index', NULL);

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
(26, '2017_04_11_000000_alter_post_nullable_fields_table', 2);

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
(82, 'browse_bi_customers', 'bi_customers', '2018-07-22 11:08:34', '2018-07-22 11:08:34'),
(83, 'read_bi_customers', 'bi_customers', '2018-07-22 11:08:34', '2018-07-22 11:08:34'),
(84, 'edit_bi_customers', 'bi_customers', '2018-07-22 11:08:34', '2018-07-22 11:08:34'),
(85, 'add_bi_customers', 'bi_customers', '2018-07-22 11:08:34', '2018-07-22 11:08:34'),
(86, 'delete_bi_customers', 'bi_customers', '2018-07-22 11:08:34', '2018-07-22 11:08:34'),
(87, 'browse_bi_merchants', 'bi_merchants', '2018-07-22 12:13:26', '2018-07-22 12:13:26'),
(88, 'read_bi_merchants', 'bi_merchants', '2018-07-22 12:13:26', '2018-07-22 12:13:26'),
(89, 'edit_bi_merchants', 'bi_merchants', '2018-07-22 12:13:26', '2018-07-22 12:13:26'),
(90, 'add_bi_merchants', 'bi_merchants', '2018-07-22 12:13:26', '2018-07-22 12:13:26'),
(91, 'delete_bi_merchants', 'bi_merchants', '2018-07-22 12:13:26', '2018-07-22 12:13:26');

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
(91, 1);

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
(1, 1, 'Admin', 'admin@admin.com', 'users/default.png', '$2y$10$kVU.s1c1XdNnW9KCspD1cuN1AhufvyO8VRXoGJ1FeSYB1MVZPL3Sm', 'MiSIC7Xlc5N4IvzJqy5Awt9tdrsnyTiA1FNC0cVeFE9XpvBfwNpKwqbhEkoA', NULL, '2018-07-13 03:02:21', '2018-07-13 03:02:21');

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
-- Indexes for table `bi_products`
--
ALTER TABLE `bi_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bi_product_attributes`
--
ALTER TABLE `bi_product_attributes`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

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
-- AUTO_INCREMENT for table `bi_categories`
--
ALTER TABLE `bi_categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `bi_category_bi_product`
--
ALTER TABLE `bi_category_bi_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `bi_customers`
--
ALTER TABLE `bi_customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `bi_c_groups`
--
ALTER TABLE `bi_c_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `bi_c_group_bi_customer`
--
ALTER TABLE `bi_c_group_bi_customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `bi_merchants`
--
ALTER TABLE `bi_merchants`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bi_products`
--
ALTER TABLE `bi_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `data_rows`
--
ALTER TABLE `data_rows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=313;
--
-- AUTO_INCREMENT for table `data_types`
--
ALTER TABLE `data_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
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
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
