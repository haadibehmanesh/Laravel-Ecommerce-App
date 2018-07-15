-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2018 at 04:21 PM
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
-- Table structure for table `bi_products`
--

CREATE TABLE `bi_products` (
  `id` int(11) NOT NULL,
  `model` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `upc` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ean` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jan` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isbn` varchar(17) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mpn` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `stock_status_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manufacturer_id` int(11) NOT NULL,
  `shipping` tinyint(4) NOT NULL DEFAULT '1',
  `price` decimal(10,0) NOT NULL DEFAULT '0',
  `points` int(11) NOT NULL DEFAULT '0',
  `tax_class_id` int(11) NOT NULL,
  `date_available` date NOT NULL,
  `weight` decimal(10,0) NOT NULL DEFAULT '0',
  `weight_class_id` int(11) NOT NULL DEFAULT '0',
  `length` decimal(10,0) NOT NULL DEFAULT '0',
  `width` decimal(10,0) NOT NULL DEFAULT '0',
  `height` decimal(10,0) NOT NULL DEFAULT '0',
  `length_class_id` int(11) NOT NULL DEFAULT '0',
  `subtract` tinyint(4) NOT NULL DEFAULT '1',
  `minimum` int(11) NOT NULL DEFAULT '1',
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `viewed` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bi_product_attribute`
--

CREATE TABLE `bi_product_attribute` (
  `product_id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bi_product_descriptions`
--

CREATE TABLE `bi_product_descriptions` (
  `product_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
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
(151, 14, 'model', 'text', 'Model', 1, 1, 1, 1, 1, 1, '{\"null\":\"Nothing\"}', 3),
(152, 14, 'sku', 'text', 'Sku', 1, 0, 1, 1, 1, 1, '{\"null\":\"Nothing\"}', 4),
(153, 14, 'upc', 'text', 'Upc', 1, 0, 1, 1, 1, 1, '{\"null\":\"Nothing\"}', 5),
(154, 14, 'ean', 'text', 'Ean', 1, 0, 1, 1, 1, 1, '{\"null\":\"Nothing\"}', 6),
(155, 14, 'jan', 'text', 'Jan', 1, 0, 1, 1, 1, 1, '{\"null\":\"Nothing\"}', 7),
(156, 14, 'isbn', 'text', 'Isbn', 1, 0, 1, 1, 1, 1, '{\"null\":\"Nothing\"}', 8),
(157, 14, 'mpn', 'text', 'Mpn', 1, 0, 1, 1, 1, 1, '{\"null\":\"Nothing\"}', 9),
(158, 14, 'location', 'text', 'Location', 1, 0, 1, 1, 1, 1, '{\"null\":\"Nothing\"}', 10),
(159, 14, 'quantity', 'number', 'Quantity', 1, 1, 1, 1, 1, 1, NULL, 11),
(160, 14, 'stock_status_id', 'number', 'Stock Status Id', 1, 0, 0, 0, 0, 0, NULL, 12),
(161, 14, 'image', 'image', 'Image', 0, 1, 1, 1, 1, 1, NULL, 13),
(162, 14, 'manufacturer_id', 'number', 'Manufacturer Id', 1, 0, 0, 0, 0, 0, NULL, 14),
(163, 14, 'shipping', 'checkbox', 'Shipping', 1, 0, 1, 1, 1, 1, NULL, 15),
(164, 14, 'price', 'number', 'Price', 1, 1, 1, 1, 1, 1, NULL, 16),
(165, 14, 'points', 'number', 'Points', 1, 0, 1, 1, 1, 1, '{\"null\":\"Nothing\"}', 17),
(166, 14, 'tax_class_id', 'number', 'Tax Class Id', 1, 0, 0, 0, 0, 0, NULL, 18),
(167, 14, 'date_available', 'date', 'Date Available', 1, 0, 1, 1, 1, 1, NULL, 19),
(168, 14, 'weight', 'number', 'Weight', 1, 0, 1, 1, 1, 1, '{\"null\":\"Nothing\"}', 20),
(169, 14, 'weight_class_id', 'number', 'Weight Class Id', 1, 0, 0, 0, 0, 0, NULL, 21),
(170, 14, 'length', 'number', 'Length', 1, 0, 1, 1, 1, 1, '{\"null\":\"Nothing\"}', 22),
(171, 14, 'width', 'number', 'Width', 1, 0, 1, 1, 1, 1, '{\"null\":\"Nothing\"}', 23),
(172, 14, 'height', 'number', 'Height', 1, 0, 1, 1, 1, 1, '{\"null\":\"Nothing\"}', 24),
(173, 14, 'length_class_id', 'number', 'Length Class Id', 1, 0, 0, 0, 0, 0, NULL, 25),
(174, 14, 'subtract', 'checkbox', 'Subtract', 1, 0, 1, 1, 1, 1, NULL, 26),
(175, 14, 'minimum', 'number', 'Minimum', 1, 0, 1, 1, 1, 1, NULL, 27),
(176, 14, 'sort_order', 'number', 'Sort Order', 1, 0, 0, 0, 0, 0, NULL, 28),
(177, 14, 'status', 'checkbox', 'Status', 1, 1, 1, 1, 1, 1, NULL, 29),
(178, 14, 'viewed', 'number', 'Viewed', 1, 0, 1, 1, 1, 1, NULL, 30),
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
(194, 14, 'bi_product_hasone_bi_product_description_relationship', 'relationship', 'name', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\BiProductDescription\",\"table\":\"bi_product_descriptions\",\"type\":\"hasOne\",\"column\":\"product_id\",\"key\":\"product_id\",\"label\":\"name\",\"pivot_table\":\"bi_product_attribute\",\"pivot\":\"0\",\"taggable\":\"0\"}', 2);

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
(14, 'bi_products', 'bi-products', 'Bi Product', 'Bi Products', 'voyager-bag', 'App\\BiProduct', NULL, NULL, NULL, 1, 1, '{\"order_column\":null,\"order_display_column\":null}', '2018-07-14 05:29:09', '2018-07-14 05:29:09'),
(15, 'bi_product_attribute', 'bi-product-attribute', 'Bi Product Attribute', 'Bi Product Attributes', NULL, 'App\\BiProductAttribute', NULL, NULL, NULL, 1, 1, '{\"order_column\":null,\"order_display_column\":null}', '2018-07-14 05:45:07', '2018-07-14 05:45:07'),
(16, 'bi_product_description', 'bi-product-description', 'Bi Product Description', 'Bi Product Descriptions', NULL, 'App\\BiProductDescription', NULL, NULL, NULL, 1, 1, '{\"order_column\":null,\"order_display_column\":null}', '2018-07-14 06:14:43', '2018-07-14 06:14:43');

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
(2, 1, 'Media', '', '_self', 'voyager-images', NULL, NULL, 5, '2018-07-13 02:50:35', '2018-07-13 04:06:17', 'voyager.media.index', NULL),
(3, 1, 'Users', '', '_self', 'voyager-person', NULL, NULL, 4, '2018-07-13 02:50:35', '2018-07-13 04:06:17', 'voyager.users.index', NULL),
(4, 1, 'Roles', '', '_self', 'voyager-lock', NULL, NULL, 3, '2018-07-13 02:50:35', '2018-07-13 03:23:41', 'voyager.roles.index', NULL),
(5, 1, 'Tools', '', '_self', 'voyager-tools', NULL, NULL, 9, '2018-07-13 02:50:35', '2018-07-14 05:30:07', NULL, NULL),
(6, 1, 'Menu Builder', '', '_self', 'voyager-list', NULL, 5, 1, '2018-07-13 02:50:35', '2018-07-13 03:23:10', 'voyager.menus.index', NULL),
(7, 1, 'Database', '', '_self', 'voyager-data', NULL, 5, 2, '2018-07-13 02:50:35', '2018-07-13 03:23:10', 'voyager.database.index', NULL),
(8, 1, 'Compass', '', '_self', 'voyager-compass', NULL, 5, 3, '2018-07-13 02:50:35', '2018-07-13 03:23:10', 'voyager.compass.index', NULL),
(9, 1, 'BREAD', '', '_self', 'voyager-bread', NULL, 5, 4, '2018-07-13 02:50:35', '2018-07-13 03:23:10', 'voyager.bread.index', NULL),
(10, 1, 'Settings', '', '_self', 'voyager-settings', NULL, NULL, 10, '2018-07-13 02:50:35', '2018-07-14 05:30:07', 'voyager.settings.index', NULL),
(11, 1, 'Hooks', '', '_self', 'voyager-hook', NULL, 5, 5, '2018-07-13 02:50:37', '2018-07-13 03:23:10', 'voyager.hooks', NULL),
(12, 1, 'Categories', '', '_self', 'voyager-categories', NULL, NULL, 8, '2018-07-13 03:02:21', '2018-07-13 04:06:17', 'voyager.categories.index', NULL),
(13, 1, 'Posts', '', '_self', 'voyager-news', NULL, NULL, 6, '2018-07-13 03:02:22', '2018-07-13 04:06:17', 'voyager.posts.index', NULL),
(14, 1, 'Pages', '', '_self', 'voyager-file-text', NULL, NULL, 7, '2018-07-13 03:02:22', '2018-07-13 04:06:17', 'voyager.pages.index', NULL),
(15, 1, 'Catalog', '/admin', '_self', 'voyager-list', '#000000', NULL, 2, '2018-07-13 03:22:53', '2018-07-13 04:07:41', NULL, ''),
(16, 1, 'Bi Products', '', '_self', 'voyager-bag', NULL, 15, 1, '2018-07-14 05:29:09', '2018-07-14 05:30:07', 'voyager.bi-products.index', NULL),
(17, 1, 'Bi Product Attributes', '', '_self', NULL, NULL, NULL, 11, '2018-07-14 05:45:07', '2018-07-14 05:45:07', 'voyager.bi-product-attribute.index', NULL),
(18, 1, 'Bi Product Descriptions', '', '_self', NULL, NULL, NULL, 12, '2018-07-14 06:14:43', '2018-07-14 06:14:43', 'voyager.bi-product-description.index', NULL);

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
(56, 'delete_bi_product_description', 'bi_product_description', '2018-07-14 06:14:43', '2018-07-14 06:14:43');

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
(56, 1);

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
-- Indexes for table `bi_products`
--
ALTER TABLE `bi_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bi_product_attribute`
--
ALTER TABLE `bi_product_attribute`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `bi_product_descriptions`
--
ALTER TABLE `bi_product_descriptions`
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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_name_unique` (`name`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_key_index` (`key`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_permission_id_index` (`permission_id`),
  ADD KEY `permission_role_role_id_index` (`role_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `user_roles_user_id_index` (`user_id`),
  ADD KEY `user_roles_role_id_index` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bi_products`
--
ALTER TABLE `bi_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `data_rows`
--
ALTER TABLE `data_rows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT for table `data_types`
--
ALTER TABLE `data_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

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

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
