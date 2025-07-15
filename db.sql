-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2025 at 10:59 AM
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
-- Database: `penjualan_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `validation` varchar(255) DEFAULT NULL,
  `is_required` tinyint(1) NOT NULL DEFAULT 0,
  `is_unique` tinyint(1) NOT NULL DEFAULT 0,
  `is_filterable` tinyint(1) NOT NULL DEFAULT 0,
  `is_configurable` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `code`, `name`, `type`, `validation`, `is_required`, `is_unique`, `is_filterable`, `is_configurable`, `created_at`, `updated_at`) VALUES
(1, 'size', 'size', 'Text', NULL, 0, 0, 1, 1, '2025-05-15 18:49:10', '2025-05-15 18:49:10'),
(2, 'color', 'color', 'Text', NULL, 0, 0, 1, 1, '2025-05-15 18:50:26', '2025-05-15 18:50:26');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_options`
--

CREATE TABLE `attribute_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `attribute_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attribute_options`
--

INSERT INTO `attribute_options` (`id`, `name`, `attribute_id`, `created_at`, `updated_at`) VALUES
(1, 'S', 1, '2025-05-15 18:49:48', '2025-05-15 18:49:48'),
(2, 'M', 1, '2025-05-15 18:49:55', '2025-05-15 18:49:55'),
(3, 'L', 1, '2025-05-15 18:50:01', '2025-05-15 18:50:01'),
(4, 'XL', 1, '2025-05-15 18:50:08', '2025-05-15 18:50:08'),
(5, 'Hitam', 2, '2025-05-15 18:50:35', '2025-05-15 18:50:35'),
(6, 'Putih', 2, '2025-05-15 18:50:42', '2025-05-15 18:50:42'),
(7, 'Merah', 2, '2025-05-15 18:50:49', '2025-05-15 18:50:49'),
(8, 'Hijau', 2, '2025-05-15 18:50:56', '2025-05-15 18:50:56'),
(9, 'Biru', 2, '2025-05-15 18:51:02', '2025-05-15 18:51:02'),
(10, 'Coklat', 2, '2025-05-15 18:51:09', '2025-05-15 18:51:09'),
(11, 'biru muda', 2, '2025-05-22 16:16:20', '2025-05-22 16:16:20'),
(12, 'XXL', 1, '2025-05-22 16:16:44', '2025-05-22 16:16:44');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `image`, `parent_id`, `created_at`, `updated_at`) VALUES
(2, 'Pakaian Perempuan', 'pakaian-perempuan', 'assets/categories/HqSrYzv03esIPiMX7j2SVbpmTQ1dwaeTpMUIMWVY.png', NULL, '2025-05-15 18:42:21', '2025-05-15 18:42:21'),
(3, 'Celana Pria', 'celana-pria', 'assets/categories/ywDSSD3FAa7FrWKolMjrs1SUNTy8G0zv71Lpc5I1.png', NULL, '2025-05-15 18:43:23', '2025-05-15 18:43:23'),
(4, 'Celana Perempuan', 'celana-perempuan', 'assets/categories/EjWZDsdlszFrWIeswZ7f5BSgnddbR9OCQIt8C4MR.png', NULL, '2025-05-15 18:44:24', '2025-05-15 18:44:24'),
(5, 'Gaun', 'gaun', 'assets/categories/1N4oxXGfJLTXXLOE7PP4WYJptHuqli89ovPycjaT.png', NULL, '2025-05-15 18:44:55', '2025-05-15 18:44:55'),
(6, 'Baju Pria', 'baju-pria', 'assets/categories/TlfqzE9yOmkaSf8htn6SueDvC9znFKNRVkuvKRY4.png', NULL, '2025-05-15 18:45:52', '2025-05-15 18:45:52'),
(7, 'Baju Perempuan', 'baju-perempuan', 'assets/categories/EKrogbAXFrqTkLNQJy30R5i6q9hFLF13NYC3bIbs.png', NULL, '2025-05-15 18:46:13', '2025-05-15 18:46:13'),
(8, 'Sepatu Pria', 'sepatu-pria', 'assets/categories/mhSr3d91Diz9mb6fr0JupAToXGSkDI2sE4LF45Ng.png', NULL, '2025-05-15 18:46:40', '2025-05-15 18:46:40'),
(9, 'Hoodie Perempuan', 'hoodie-perempuan', 'assets/categories/Dlg1dI3xcaypyEisGDMXN8LTZFMk4tF24ykmQLOP.png', NULL, '2025-05-15 18:47:56', '2025-05-15 18:47:56');

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
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_03_08_003606_create_categories_table', 1),
(7, '2023_03_08_003938_create_products_table', 1),
(8, '2023_03_08_011102_create_attributes_table', 1),
(9, '2023_03_08_011524_create_product_attribute_values_table', 1),
(10, '2023_03_08_012756_create_product_inventories_table', 1),
(11, '2023_03_08_013422_create_product_categories_table', 1),
(12, '2023_03_08_013611_create_product_images_table', 1),
(13, '2023_03_08_013906_create_attribute_options_table', 1),
(14, '2023_03_08_014314_create_orders_table', 1),
(15, '2023_03_08_015219_create_order_items_table', 1),
(16, '2023_03_08_015501_create_payments_table', 1),
(17, '2023_03_08_015812_create_wish_lists_table', 1),
(18, '2023_03_13_070603_create_shipments_table', 1),
(19, '2023_03_22_154139_create_slides_table', 1),
(20, '2025_05_15_023230_create_reviews_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `order_date` datetime NOT NULL,
  `payment_due` datetime NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `payment_file` varchar(255) DEFAULT NULL,
  `payment_token` varchar(255) DEFAULT NULL,
  `payment_url` varchar(255) DEFAULT NULL,
  `base_total_price` decimal(16,2) NOT NULL DEFAULT 0.00,
  `tax_amount` decimal(16,2) NOT NULL DEFAULT 0.00,
  `tax_percent` decimal(16,2) NOT NULL DEFAULT 0.00,
  `discount_amount` decimal(16,2) NOT NULL DEFAULT 0.00,
  `discount_percent` decimal(16,2) NOT NULL DEFAULT 0.00,
  `shipping_cost` decimal(16,2) NOT NULL DEFAULT 0.00,
  `grand_total` decimal(16,2) NOT NULL DEFAULT 0.00,
  `note` text DEFAULT NULL,
  `customer_first_name` varchar(255) NOT NULL,
  `customer_last_name` varchar(255) NOT NULL,
  `customer_address1` varchar(255) DEFAULT NULL,
  `customer_address2` varchar(255) DEFAULT NULL,
  `customer_phone` varchar(255) DEFAULT NULL,
  `customer_email` varchar(255) DEFAULT NULL,
  `customer_city_id` varchar(255) DEFAULT NULL,
  `customer_province_id` varchar(255) DEFAULT NULL,
  `customer_postcode` int(11) DEFAULT NULL,
  `shipping_courier` varchar(255) DEFAULT NULL,
  `shipping_service_name` varchar(255) DEFAULT NULL,
  `approved_by` bigint(20) UNSIGNED DEFAULT NULL,
  `approved_at` datetime DEFAULT NULL,
  `cancelled_by` bigint(20) UNSIGNED DEFAULT NULL,
  `cancelled_at` datetime DEFAULT NULL,
  `cancellation_note` text DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `code`, `status`, `order_date`, `payment_due`, `payment_status`, `payment_file`, `payment_token`, `payment_url`, `base_total_price`, `tax_amount`, `tax_percent`, `discount_amount`, `discount_percent`, `shipping_cost`, `grand_total`, `note`, `customer_first_name`, `customer_last_name`, `customer_address1`, `customer_address2`, `customer_phone`, `customer_email`, `customer_city_id`, `customer_province_id`, `customer_postcode`, `shipping_courier`, `shipping_service_name`, `approved_by`, `approved_at`, `cancelled_by`, `cancelled_at`, `cancellation_note`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'INV/20250523/V/XXIII/00001', 'completed', '2025-05-23 00:08:26', '2025-05-30 00:08:26', 'paid', 'assets/payment_file/8LUZNxaj6vsMyEIpQXbUGTrXiBEkwzM5fwZMJn8R.jpg', '829afebe-cc70-4cf6-85c6-27ec7c7ba45f', 'https://app.sandbox.midtrans.com/snap/v4/redirection/829afebe-cc70-4cf6-85c6-27ec7c7ba45f', 450000.00, 0.00, 0.00, 0.00, 0.00, 23000.00, 473000.00, 'tolong dijaga yang baik!', 'John', 'Doe', '722 West New Boulevard', 'Reiciendis aut labor', '081999483864', 'john@gmail.com', '114', '1', 32399, 'jne', 'JNE - REG', 1, '2025-05-23 00:11:47', NULL, NULL, NULL, 5, '2025-05-22 16:08:27', '2025-05-22 16:11:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `base_price` decimal(16,2) NOT NULL DEFAULT 0.00,
  `base_total` decimal(16,2) NOT NULL DEFAULT 0.00,
  `tax_amount` decimal(16,2) NOT NULL DEFAULT 0.00,
  `tax_percent` decimal(16,2) NOT NULL DEFAULT 0.00,
  `discount_amount` decimal(16,2) NOT NULL DEFAULT 0.00,
  `discount_percent` decimal(16,2) NOT NULL DEFAULT 0.00,
  `sub_total` decimal(16,2) NOT NULL DEFAULT 0.00,
  `sku` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `attributes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`attributes`)),
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `qty`, `base_price`, `base_total`, `tax_amount`, `tax_percent`, `discount_amount`, `discount_percent`, `sub_total`, `sku`, `type`, `name`, `weight`, `attributes`, `order_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 2, 100000.00, 200000.00, 0.00, 0.00, 0.00, 0.00, 200000.00, '1', 'simple', 'Baju Panjang', '400.00', '{\"options\":[]}', 1, 1, '2025-05-22 16:08:27', '2025-05-22 16:08:27'),
(2, 1, 250000.00, 250000.00, 0.00, 0.00, 0.00, 0.00, 250000.00, '2-3-7', 'configurable', 'Jaket Bomber - L - Merah', '200.00', '{\"options\":{\"size\":\"L\",\"color\":\"Merah\"}}', 1, 12, '2025-05-22 16:08:27', '2025-05-22 16:08:27');

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
  `number` varchar(255) NOT NULL,
  `amount` decimal(16,2) NOT NULL DEFAULT 0.00,
  `method` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `payloads` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`payloads`)),
  `payment_type` varchar(255) DEFAULT NULL,
  `va_number` varchar(255) DEFAULT NULL,
  `vendor_name` varchar(255) DEFAULT NULL,
  `biller_code` varchar(255) DEFAULT NULL,
  `bill_key` varchar(255) DEFAULT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `sku` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `price` decimal(15,2) DEFAULT NULL,
  `weight` decimal(10,2) DEFAULT NULL,
  `length` decimal(10,2) DEFAULT NULL,
  `width` decimal(10,2) DEFAULT NULL,
  `height` decimal(10,2) DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `sku`, `type`, `name`, `slug`, `price`, `weight`, `length`, `width`, `height`, `short_description`, `description`, `status`, `user_id`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, '1', 'simple', 'Baju Panjang', 'baju-panjang', 100000.00, 400.00, NULL, NULL, NULL, 'Produk ini nyaman digunakan saat terik matahari.', 'Produk ini nyaman digunakan saat terik matahari.', 1, 1, NULL, '2025-05-15 18:52:34', '2025-05-15 18:54:10'),
(2, '2', 'configurable', 'Jaket Bomber', 'jaket-bomber', NULL, NULL, NULL, NULL, NULL, 'Jaket terbaik sepanjang masa', 'Jaket terbaik sepanjang masa', 1, 1, NULL, '2025-05-15 19:04:25', '2025-05-15 19:07:45'),
(3, '2-1-6', 'simple', 'Jaket Bomber - S - Putih', 'jaket-bomber-s-putih', 250000.00, 200.00, NULL, NULL, NULL, NULL, NULL, 1, 1, 2, '2025-05-15 19:04:25', '2025-05-15 19:07:45'),
(4, '2-1-7', 'simple', 'Jaket Bomber - S - Merah', 'jaket-bomber-s-merah', 250000.00, 201.00, NULL, NULL, NULL, NULL, NULL, 1, 1, 2, '2025-05-15 19:04:25', '2025-05-15 19:07:45'),
(5, '2-1-9', 'simple', 'Jaket Bomber - S - Biru', 'jaket-bomber-s-biru', 250000.00, 201.00, NULL, NULL, NULL, NULL, NULL, 1, 1, 2, '2025-05-15 19:04:25', '2025-05-15 19:07:45'),
(6, '2-1-10', 'simple', 'Jaket Bomber - S - Coklat', 'jaket-bomber-s-coklat', 250000.00, 201.00, NULL, NULL, NULL, NULL, NULL, 1, 1, 2, '2025-05-15 19:04:25', '2025-05-15 19:07:45'),
(7, '2-2-6', 'simple', 'Jaket Bomber - M - Putih', 'jaket-bomber-m-putih', 250001.00, 201.00, NULL, NULL, NULL, NULL, NULL, 1, 1, 2, '2025-05-15 19:04:25', '2025-05-15 19:07:45'),
(8, '2-2-7', 'simple', 'Jaket Bomber - M - Merah', 'jaket-bomber-m-merah', 250001.00, 201.00, NULL, NULL, NULL, NULL, NULL, 1, 1, 2, '2025-05-15 19:04:25', '2025-05-15 19:07:45'),
(9, '2-2-9', 'simple', 'Jaket Bomber - M - Biru', 'jaket-bomber-m-biru', 250000.00, 200.00, NULL, NULL, NULL, NULL, NULL, 1, 1, 2, '2025-05-15 19:04:25', '2025-05-15 19:07:45'),
(10, '2-2-10', 'simple', 'Jaket Bomber - M - Coklat', 'jaket-bomber-m-coklat', 250000.00, 201.00, NULL, NULL, NULL, NULL, NULL, 1, 1, 2, '2025-05-15 19:04:25', '2025-05-15 19:07:45'),
(11, '2-3-6', 'simple', 'Jaket Bomber - L - Putih', 'jaket-bomber-l-putih', 250000.00, 201.00, NULL, NULL, NULL, NULL, NULL, 1, 1, 2, '2025-05-15 19:04:25', '2025-05-15 19:07:45'),
(12, '2-3-7', 'simple', 'Jaket Bomber - L - Merah', 'jaket-bomber-l-merah', 250000.00, 200.00, NULL, NULL, NULL, NULL, NULL, 1, 1, 2, '2025-05-15 19:04:25', '2025-05-15 19:07:45'),
(13, '2-3-9', 'simple', 'Jaket Bomber - L - Biru', 'jaket-bomber-l-biru', 250000.00, 200.00, NULL, NULL, NULL, NULL, NULL, 1, 1, 2, '2025-05-15 19:04:25', '2025-05-15 19:07:45'),
(14, '2-3-10', 'simple', 'Jaket Bomber - L - Coklat', 'jaket-bomber-l-coklat', 250000.00, 200.00, NULL, NULL, NULL, NULL, NULL, 1, 1, 2, '2025-05-15 19:04:25', '2025-05-15 19:07:45'),
(15, '2-4-6', 'simple', 'Jaket Bomber - XL - Putih', 'jaket-bomber-xl-putih', 250000.00, 200.00, NULL, NULL, NULL, NULL, NULL, 1, 1, 2, '2025-05-15 19:04:25', '2025-05-15 19:07:45'),
(16, '2-4-7', 'simple', 'Jaket Bomber - XL - Merah', 'jaket-bomber-xl-merah', 249999.00, 200.00, NULL, NULL, NULL, NULL, NULL, 1, 1, 2, '2025-05-15 19:04:25', '2025-05-15 19:07:45'),
(17, '2-4-9', 'simple', 'Jaket Bomber - XL - Biru', 'jaket-bomber-xl-biru', 250000.00, 200.00, NULL, NULL, NULL, NULL, NULL, 1, 1, 2, '2025-05-15 19:04:25', '2025-05-15 19:07:45'),
(18, '2-4-10', 'simple', 'Jaket Bomber - XL - Coklat', 'jaket-bomber-xl-coklat', 250000.00, 200.00, NULL, NULL, NULL, NULL, NULL, 1, 1, 2, '2025-05-15 19:04:25', '2025-05-15 19:07:45'),
(19, '3', 'simple', 'Gucci Comportable', 'gucci-comportable', 130000.00, 150.00, NULL, NULL, NULL, 'Jaket terbaik sepanjang masa', 'Jaket terbaik sepanjang masa', 1, 1, NULL, '2025-05-15 19:16:42', '2025-05-15 19:17:32'),
(20, '4', 'simple', 'Zara Cloth', 'zara-cloth', 135000.00, 230.00, NULL, NULL, NULL, 'Baju ternyaman dan terbaik', 'baju dengan berbagai ukuran dan warna', 1, 1, NULL, '2025-05-15 19:18:52', '2025-05-15 19:20:10'),
(21, '5', 'simple', 'Louis Vutton', 'louis-vutton', 150000.00, 150.00, NULL, NULL, NULL, 'Baju branded dengan kualitas produk yang nyaman.', 'Baju branded dengan kualitas produk yang nyaman dan awet', 1, 1, NULL, '2025-05-15 19:21:31', '2025-05-15 19:22:36'),
(22, '43t4345', 'simple', 'Baju Panjang vvvve', 'baju-panjang-vvvve', 120000.00, 300.00, NULL, NULL, NULL, 'rydrtd', 'tuutrrudr', 1, 1, NULL, '2025-05-22 16:17:49', '2025-05-22 16:19:29');

-- --------------------------------------------------------

--
-- Table structure for table `product_attribute_values`
--

CREATE TABLE `product_attribute_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text_value` text DEFAULT NULL,
  `boolean_value` tinyint(1) DEFAULT NULL,
  `integer_value` int(11) DEFAULT NULL,
  `float_value` decimal(8,2) DEFAULT NULL,
  `datetime_value` datetime DEFAULT NULL,
  `date_value` date DEFAULT NULL,
  `json_value` text DEFAULT NULL,
  `parent_product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `attribute_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_attribute_values`
--

INSERT INTO `product_attribute_values` (`id`, `text_value`, `boolean_value`, `integer_value`, `float_value`, `datetime_value`, `date_value`, `json_value`, `parent_product_id`, `product_id`, `attribute_id`, `created_at`, `updated_at`) VALUES
(1, 'S', NULL, NULL, NULL, NULL, NULL, NULL, 2, 3, 1, '2025-05-15 19:04:25', '2025-05-15 19:04:25'),
(2, 'Putih', NULL, NULL, NULL, NULL, NULL, NULL, 2, 3, 2, '2025-05-15 19:04:25', '2025-05-15 19:04:25'),
(3, 'S', NULL, NULL, NULL, NULL, NULL, NULL, 2, 4, 1, '2025-05-15 19:04:25', '2025-05-15 19:04:25'),
(4, 'Merah', NULL, NULL, NULL, NULL, NULL, NULL, 2, 4, 2, '2025-05-15 19:04:25', '2025-05-15 19:04:25'),
(5, 'S', NULL, NULL, NULL, NULL, NULL, NULL, 2, 5, 1, '2025-05-15 19:04:25', '2025-05-15 19:04:25'),
(6, 'Biru', NULL, NULL, NULL, NULL, NULL, NULL, 2, 5, 2, '2025-05-15 19:04:25', '2025-05-15 19:04:25'),
(7, 'S', NULL, NULL, NULL, NULL, NULL, NULL, 2, 6, 1, '2025-05-15 19:04:25', '2025-05-15 19:04:25'),
(8, 'Coklat', NULL, NULL, NULL, NULL, NULL, NULL, 2, 6, 2, '2025-05-15 19:04:25', '2025-05-15 19:04:25'),
(9, 'M', NULL, NULL, NULL, NULL, NULL, NULL, 2, 7, 1, '2025-05-15 19:04:25', '2025-05-15 19:04:25'),
(10, 'Putih', NULL, NULL, NULL, NULL, NULL, NULL, 2, 7, 2, '2025-05-15 19:04:25', '2025-05-15 19:04:25'),
(11, 'M', NULL, NULL, NULL, NULL, NULL, NULL, 2, 8, 1, '2025-05-15 19:04:25', '2025-05-15 19:04:25'),
(12, 'Merah', NULL, NULL, NULL, NULL, NULL, NULL, 2, 8, 2, '2025-05-15 19:04:25', '2025-05-15 19:04:25'),
(13, 'M', NULL, NULL, NULL, NULL, NULL, NULL, 2, 9, 1, '2025-05-15 19:04:25', '2025-05-15 19:04:25'),
(14, 'Biru', NULL, NULL, NULL, NULL, NULL, NULL, 2, 9, 2, '2025-05-15 19:04:25', '2025-05-15 19:04:25'),
(15, 'M', NULL, NULL, NULL, NULL, NULL, NULL, 2, 10, 1, '2025-05-15 19:04:25', '2025-05-15 19:04:25'),
(16, 'Coklat', NULL, NULL, NULL, NULL, NULL, NULL, 2, 10, 2, '2025-05-15 19:04:25', '2025-05-15 19:04:25'),
(17, 'L', NULL, NULL, NULL, NULL, NULL, NULL, 2, 11, 1, '2025-05-15 19:04:25', '2025-05-15 19:04:25'),
(18, 'Putih', NULL, NULL, NULL, NULL, NULL, NULL, 2, 11, 2, '2025-05-15 19:04:25', '2025-05-15 19:04:25'),
(19, 'L', NULL, NULL, NULL, NULL, NULL, NULL, 2, 12, 1, '2025-05-15 19:04:25', '2025-05-15 19:04:25'),
(20, 'Merah', NULL, NULL, NULL, NULL, NULL, NULL, 2, 12, 2, '2025-05-15 19:04:25', '2025-05-15 19:04:25'),
(21, 'L', NULL, NULL, NULL, NULL, NULL, NULL, 2, 13, 1, '2025-05-15 19:04:25', '2025-05-15 19:04:25'),
(22, 'Biru', NULL, NULL, NULL, NULL, NULL, NULL, 2, 13, 2, '2025-05-15 19:04:25', '2025-05-15 19:04:25'),
(23, 'L', NULL, NULL, NULL, NULL, NULL, NULL, 2, 14, 1, '2025-05-15 19:04:25', '2025-05-15 19:04:25'),
(24, 'Coklat', NULL, NULL, NULL, NULL, NULL, NULL, 2, 14, 2, '2025-05-15 19:04:25', '2025-05-15 19:04:25'),
(25, 'XL', NULL, NULL, NULL, NULL, NULL, NULL, 2, 15, 1, '2025-05-15 19:04:25', '2025-05-15 19:04:25'),
(26, 'Putih', NULL, NULL, NULL, NULL, NULL, NULL, 2, 15, 2, '2025-05-15 19:04:25', '2025-05-15 19:04:25'),
(27, 'XL', NULL, NULL, NULL, NULL, NULL, NULL, 2, 16, 1, '2025-05-15 19:04:25', '2025-05-15 19:04:25'),
(28, 'Merah', NULL, NULL, NULL, NULL, NULL, NULL, 2, 16, 2, '2025-05-15 19:04:25', '2025-05-15 19:04:25'),
(29, 'XL', NULL, NULL, NULL, NULL, NULL, NULL, 2, 17, 1, '2025-05-15 19:04:25', '2025-05-15 19:04:25'),
(30, 'Biru', NULL, NULL, NULL, NULL, NULL, NULL, 2, 17, 2, '2025-05-15 19:04:25', '2025-05-15 19:04:25'),
(31, 'XL', NULL, NULL, NULL, NULL, NULL, NULL, 2, 18, 1, '2025-05-15 19:04:26', '2025-05-15 19:04:26'),
(32, 'Coklat', NULL, NULL, NULL, NULL, NULL, NULL, 2, 18, 2, '2025-05-15 19:04:26', '2025-05-15 19:04:26');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `product_id`, `category_id`) VALUES
(1, 1, 7),
(2, 2, 6),
(3, 3, 6),
(4, 4, 6),
(5, 5, 6),
(6, 6, 6),
(7, 7, 6),
(8, 8, 6),
(9, 9, 6),
(10, 10, 6),
(11, 11, 6),
(12, 12, 6),
(13, 13, 6),
(14, 14, 6),
(15, 15, 6),
(16, 16, 6),
(17, 17, 6),
(18, 18, 6),
(19, 19, 9),
(20, 20, 2),
(21, 21, 7),
(22, 22, 7),
(23, 22, 6);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `path` text NOT NULL,
  `extra_large` varchar(255) DEFAULT NULL,
  `large` varchar(255) DEFAULT NULL,
  `medium` varchar(255) DEFAULT NULL,
  `small` varchar(255) DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `path`, `extra_large`, `large`, `medium`, `small`, `product_id`, `created_at`, `updated_at`) VALUES
(3, 'product/images/7a1vzPHOuiHZZAbTLy01BjvF75JGdUIqU4YkylPp.jpg', NULL, NULL, NULL, NULL, 1, '2025-05-15 19:02:31', '2025-05-15 19:02:31'),
(4, 'product/images/KGly8yRLWcgCZOV76xUgebkU6BydPs1Q1eDuFY5U.jpg', NULL, NULL, NULL, NULL, 2, '2025-05-15 19:04:57', '2025-05-15 19:04:57'),
(5, 'product/images/1PD0XwQfgNXS3MSSCGGspgu3kXebii6gHXou1IQR.jpg', NULL, NULL, NULL, NULL, 2, '2025-05-15 19:05:04', '2025-05-15 19:05:04'),
(6, 'product/images/zMCRYhxbt0bF5Evf3vKF9ssp6dVbFti2I7NduInt.jpg', NULL, NULL, NULL, NULL, 2, '2025-05-15 19:05:11', '2025-05-15 19:05:11'),
(7, 'product/images/a2Q0Bd4iBynHIBsnaCVMg578mTtuFV8nZUdubMOP.jpg', NULL, NULL, NULL, NULL, 2, '2025-05-15 19:05:18', '2025-05-15 19:05:18'),
(8, 'product/images/XLiMghDs7TAFtZAclPzF1woZPYa2teBWIdFq36W7.jpg', NULL, NULL, NULL, NULL, 19, '2025-05-15 19:16:54', '2025-05-15 19:16:54'),
(9, 'product/images/R4d7KNqiY73tCzIIR5HrC0chOEjTFbAPtAzGq3KK.jpg', NULL, NULL, NULL, NULL, 19, '2025-05-15 19:17:01', '2025-05-15 19:17:01'),
(10, 'product/images/LHSSLcOejSUnguadwmiWJ4MHMxUsUMsnMCxgIx1X.jpg', NULL, NULL, NULL, NULL, 20, '2025-05-15 19:19:19', '2025-05-15 19:19:19'),
(11, 'product/images/mz9Ed9qHGxwucuQAkrCehcUBlhgVh3gvcVshtGkx.jpg', NULL, NULL, NULL, NULL, 20, '2025-05-15 19:19:31', '2025-05-15 19:19:31'),
(12, 'product/images/VD13Pe59TEVwbIg8Bg1IpOpNKhWg4ohJSpE4mWeK.jpg', NULL, NULL, NULL, NULL, 21, '2025-05-15 19:21:45', '2025-05-15 19:21:45'),
(13, 'product/images/Egufefwuz9pN5OtzytRf9MbrldMItTw4ufQp9UtV.jpg', NULL, NULL, NULL, NULL, 1, '2025-05-16 03:01:49', '2025-05-16 03:01:49'),
(14, 'product/images/fG7poDbBUyM5uyBn4Xc1aX4qefqTRgxZKiRoKj8z.jpg', NULL, NULL, NULL, NULL, 22, '2025-05-22 16:18:05', '2025-05-22 16:18:05');

-- --------------------------------------------------------

--
-- Table structure for table `product_inventories`
--

CREATE TABLE `product_inventories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_inventories`
--

INSERT INTO `product_inventories` (`id`, `qty`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 97, 1, '2025-05-15 18:54:10', '2025-05-22 16:08:27'),
(2, 75, 3, '2025-05-15 19:07:45', '2025-05-15 19:07:45'),
(3, 54, 4, '2025-05-15 19:07:45', '2025-05-15 19:07:45'),
(4, 55, 5, '2025-05-15 19:07:45', '2025-05-15 19:07:45'),
(5, 75, 6, '2025-05-15 19:07:45', '2025-05-15 19:07:45'),
(6, 86, 7, '2025-05-15 19:07:45', '2025-05-15 19:07:45'),
(7, 88, 8, '2025-05-15 19:07:45', '2025-05-15 19:07:45'),
(8, 88, 9, '2025-05-15 19:07:45', '2025-05-15 19:07:45'),
(9, 88, 10, '2025-05-15 19:07:45', '2025-05-15 19:07:45'),
(10, 88, 11, '2025-05-15 19:07:45', '2025-05-15 19:07:45'),
(11, 85, 12, '2025-05-15 19:07:45', '2025-05-22 16:08:27'),
(12, 88, 13, '2025-05-15 19:07:45', '2025-05-15 19:07:45'),
(13, 86, 14, '2025-05-15 19:07:45', '2025-05-15 19:07:45'),
(14, 88, 15, '2025-05-15 19:07:45', '2025-05-15 19:07:45'),
(15, 87, 16, '2025-05-15 19:07:45', '2025-05-15 19:07:45'),
(16, 88, 17, '2025-05-15 19:07:45', '2025-05-15 19:07:45'),
(17, 88, 18, '2025-05-15 19:07:45', '2025-05-15 19:07:45'),
(18, 42, 19, '2025-05-15 19:17:33', '2025-05-15 19:17:33'),
(19, 67, 20, '2025-05-15 19:20:10', '2025-05-15 19:20:10'),
(20, 55, 21, '2025-05-15 19:22:36', '2025-05-15 19:22:36'),
(21, 66, 22, '2025-05-22 16:19:08', '2025-05-22 16:19:08');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `rating` tinyint(3) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `product_id`, `content`, `status`, `rating`, `ip_address`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 'bajunya bagus!', 1, 4, NULL, '2025-05-22 16:21:07', '2025-05-22 16:21:07');

-- --------------------------------------------------------

--
-- Table structure for table `shipments`
--

CREATE TABLE `shipments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `track_number` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `total_qty` int(11) NOT NULL,
  `total_weight` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `city_id` varchar(255) DEFAULT NULL,
  `province_id` varchar(255) DEFAULT NULL,
  `postcode` int(11) DEFAULT NULL,
  `shipped_at` datetime DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `shipped_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipments`
--

INSERT INTO `shipments` (`id`, `track_number`, `status`, `total_qty`, `total_weight`, `first_name`, `last_name`, `address1`, `address2`, `phone`, `email`, `city_id`, `province_id`, `postcode`, `shipped_at`, `user_id`, `order_id`, `shipped_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '#78928379832748', 'shipped', 3, 1000, 'John', 'Doe', '722 West New Boulevard', 'Reiciendis aut labor', '081999483864', 'john@gmail.com', '114', '1', 32399, '2025-05-23 00:11:00', 5, 1, 1, NULL, '2025-05-22 16:08:28', '2025-05-22 16:11:00');

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `position` int(11) NOT NULL DEFAULT 0,
  `status` varchar(255) NOT NULL,
  `body` text DEFAULT NULL,
  `path` text NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `title`, `url`, `position`, `status`, `body`, `path`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Penawaran Spesial', 'products', 2, 'active', 'Baju Trendy Masa Kini', 'assets/slides/bTpIwatVIGZJqWAJbRA4dV7A0TkDt8U8YKMTIoYm.png', 1, '2025-05-15 18:33:46', '2025-05-15 18:34:08'),
(2, 'Spesial Diskon', 'products', 3, 'active', 'Gaun Holiday Import', 'assets/slides/uggebXPLDaSoV5f6RukAOCjaZ5qArllNmJQoboP6.png', 1, '2025-05-15 18:35:02', '2025-05-15 18:35:02'),
(3, 'Promo Hari Ini', 'products', 4, 'active', 'Pakaian Trendy Masa Kini', 'assets/slides/xoehy8kdhhkbyuCPOcxcYFaAfqmMTWsRikNqM6Sf.png', 1, '2025-05-15 18:36:42', '2025-05-15 18:36:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `province_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `postcode` int(11) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `remember_token`, `phone`, `address1`, `address2`, `province_id`, `city_id`, `postcode`, `is_admin`, `created_at`, `updated_at`) VALUES
(1, 'admin', '1', 'admin@admin.com', NULL, '$2y$10$pGEeMbbcGat/ICoAPTEyvOQaR0KS.bn22Pj49nG9i.tEMYQSs1WP6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-05-15 16:04:17', '2025-05-15 16:04:17'),
(5, 'John', 'Doe', 'john@gmail.com', NULL, '$2y$10$mKIxdGxmMMSxXlF2e5JjLu8o/dMf2GmF6fi1u2ISSrm7cyBwVEVrS', NULL, '081999483864', '722 West New Boulevard', 'Reiciendis aut labor', 1, 114, 32399, 0, '2025-05-22 16:07:09', '2025-05-22 16:08:27');

-- --------------------------------------------------------

--
-- Table structure for table `wish_lists`
--

CREATE TABLE `wish_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
-- Indexes for table `attribute_options`
--
ALTER TABLE `attribute_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attribute_options_attribute_id_foreign` (`attribute_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_code_unique` (`code`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_approved_by_foreign` (`approved_by`),
  ADD KEY `orders_cancelled_by_foreign` (`cancelled_by`),
  ADD KEY `orders_code_index` (`code`),
  ADD KEY `orders_code_order_date_index` (`code`,`order_date`),
  ADD KEY `orders_payment_token_index` (`payment_token`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`),
  ADD KEY `order_items_sku_index` (`sku`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payments_number_unique` (`number`),
  ADD KEY `payments_order_id_foreign` (`order_id`),
  ADD KEY `payments_number_index` (`number`),
  ADD KEY `payments_method_index` (`method`),
  ADD KEY `payments_token_index` (`token`),
  ADD KEY `payments_payment_type_index` (`payment_type`);

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
  ADD KEY `products_user_id_foreign` (`user_id`),
  ADD KEY `products_parent_id_foreign` (`parent_id`);
ALTER TABLE `products` ADD FULLTEXT KEY `search` (`name`,`slug`,`short_description`,`description`);

--
-- Indexes for table `product_attribute_values`
--
ALTER TABLE `product_attribute_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_attribute_values_parent_product_id_foreign` (`parent_product_id`),
  ADD KEY `product_attribute_values_product_id_foreign` (`product_id`),
  ADD KEY `product_attribute_values_attribute_id_foreign` (`attribute_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_categories_product_id_foreign` (`product_id`),
  ADD KEY `product_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_inventories`
--
ALTER TABLE `product_inventories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_inventories_product_id_foreign` (`product_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`),
  ADD KEY `reviews_product_id_foreign` (`product_id`);

--
-- Indexes for table `shipments`
--
ALTER TABLE `shipments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shipments_user_id_foreign` (`user_id`),
  ADD KEY `shipments_order_id_foreign` (`order_id`),
  ADD KEY `shipments_shipped_by_foreign` (`shipped_by`),
  ADD KEY `shipments_track_number_index` (`track_number`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slides_user_id_index` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wish_lists`
--
ALTER TABLE `wish_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wish_lists_product_id_foreign` (`product_id`),
  ADD KEY `wish_lists_user_id_product_id_index` (`user_id`,`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `attribute_options`
--
ALTER TABLE `attribute_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `product_attribute_values`
--
ALTER TABLE `product_attribute_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product_inventories`
--
ALTER TABLE `product_inventories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shipments`
--
ALTER TABLE `shipments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wish_lists`
--
ALTER TABLE `wish_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attribute_options`
--
ALTER TABLE `attribute_options`
  ADD CONSTRAINT `attribute_options_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_approved_by_foreign` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_cancelled_by_foreign` FOREIGN KEY (`cancelled_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `product_attribute_values`
--
ALTER TABLE `product_attribute_values`
  ADD CONSTRAINT `product_attribute_values_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`),
  ADD CONSTRAINT `product_attribute_values_parent_product_id_foreign` FOREIGN KEY (`parent_product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `product_attribute_values_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD CONSTRAINT `product_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_categories_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_inventories`
--
ALTER TABLE `product_inventories`
  ADD CONSTRAINT `product_inventories_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shipments`
--
ALTER TABLE `shipments`
  ADD CONSTRAINT `shipments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `shipments_shipped_by_foreign` FOREIGN KEY (`shipped_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `shipments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `slides`
--
ALTER TABLE `slides`
  ADD CONSTRAINT `slides_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `wish_lists`
--
ALTER TABLE `wish_lists`
  ADD CONSTRAINT `wish_lists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `wish_lists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
