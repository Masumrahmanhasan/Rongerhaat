-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 22, 2019 at 03:12 PM
-- Server version: 5.7.27-0ubuntu0.18.04.1
-- PHP Version: 7.2.20-2+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lv_alam_rongerhaat`
--

-- --------------------------------------------------------

--
-- Table structure for table `basic_info`
--

CREATE TABLE `basic_info` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `copy_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `copy_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `copy_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `map` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `basic_info`
--

INSERT INTO `basic_info` (`id`, `title`, `name`, `phone`, `email`, `address`, `logo`, `footer_logo`, `copy_name`, `copy_link`, `copy_year`, `footer_desc`, `map`, `video`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Single Page Website.', 'RongerHaat', '01632651361', 'RongerHaat@gmail.com', 'Dhaka, Bangladesh', '1565516436.png', '1560230949.jpg', 'rongerhaat.com', 'javascript:;', '2019', 'Test', '', 'https://www.youtube.com/embed/UE5UsaSSiP8', 1, 1, NULL, '2019-05-05 13:10:19', '2019-08-11 09:40:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `br_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `br_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL COMMENT '0 = Inactive, 1 = Active',
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `br_name`, `br_image`, `status`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Sanderson', '1565518108.jpeg', 1, 1, NULL, NULL, '2019-08-11 10:08:28', '2019-08-11 10:08:28', NULL),
(2, 'Shannon', '1565518138.JPG', 1, 1, NULL, NULL, '2019-08-11 10:08:58', '2019-08-11 10:08:58', NULL),
(3, 'Oacacia', '1565518163.jpg', 1, 1, NULL, NULL, '2019-08-11 10:09:22', '2019-08-11 10:09:22', NULL),
(4, 'Trade Talk', '1565518198.jpg', 1, 1, NULL, NULL, '2019-08-11 10:09:57', '2019-08-11 10:09:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `usr_id` bigint(20) UNSIGNED NOT NULL,
  `prod_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `total_price` double NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'New, Completed',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL COMMENT '0 = Inactive, 1 = Active',
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_name`, `cat_image`, `status`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Fashion & Clothes', '1565517253.png', 1, 1, NULL, NULL, '2019-08-11 09:54:12', '2019-08-11 09:54:12', NULL),
(2, 'Electronics & Computers', '1565517301.png', 1, 1, NULL, NULL, '2019-08-11 09:55:00', '2019-08-11 09:55:00', NULL),
(3, 'Home & Garden', '1565517726.png', 1, 1, NULL, NULL, '2019-08-11 10:02:05', '2019-08-11 10:02:05', NULL),
(4, 'Sports & Fitness', '1565517776.png', 1, 1, NULL, NULL, '2019-08-11 10:02:55', '2019-08-11 10:02:55', NULL),
(5, 'Gifts', '1565517839.png', 1, 1, NULL, NULL, '2019-08-11 10:03:58', '2019-08-11 10:03:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `inv_no` bigint(20) NOT NULL,
  `usr_id` bigint(20) UNSIGNED NOT NULL,
  `prod_ids` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `sub_price` double NOT NULL,
  `discount` double NOT NULL,
  `total_price` double NOT NULL,
  `shipping_address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `pay_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pay_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'New, Pending, Proccessing, Completed, Cancelled',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'New, Pending, Proccessing, Completed, Cancelled',
  `pay_at` timestamp NULL DEFAULT NULL,
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `inv_no`, `usr_id`, `prod_ids`, `discount_code`, `quantity`, `sub_price`, `discount`, `total_price`, `shipping_address`, `billing_address`, `pay_type`, `pay_status`, `status`, `pay_at`, `completed_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1566400500, 1, '4,3', '', 2, 950, 0, 950, '{\"s_name\":\"Mehediul Hassan Miton\",\"s_address\":\"Kk\",\"s_country\":\"Bangladesh\",\"s_city\":\"Dhaka\",\"s_state\":\"Dhaka\",\"s_zip\":\"1212\",\"s_phone\":\"01632651361\"}', '{\"b_name\":\"Mehediul Hassan Miton\",\"b_address\":\"KK\",\"b_country\":\"Bangladesh\",\"b_city\":\"Dhaka\",\"b_state\":\"Badda\",\"b_zip\":\"1212\",\"b_phone\":\"0163265136\"}', 'Cash', 'Completed', 'Completed', '2019-08-22 14:19:44', '2019-08-22 14:19:44', '2019-08-21 15:09:27', '2019-08-22 14:19:44', NULL),
(2, 1566402643, 1, '4', '', 1, 450, 0, 450, '{\"s_name\":\"Mehediul Hassan Miton\",\"s_address\":\"Kk\",\"s_country\":\"Bangladesh\",\"s_city\":\"Dhaka\",\"s_state\":\"Dhaka\",\"s_zip\":\"1212\",\"s_phone\":\"01632651361\"}', '{\"b_name\":\"Mehediul Hassan Miton\",\"b_address\":\"KK\",\"b_country\":\"Bangladesh\",\"b_city\":\"Dhaka\",\"b_state\":\"Badda\",\"b_zip\":\"1212\",\"b_phone\":\"0163265136\"}', 'Cash', 'Pending', 'Pending', NULL, NULL, '2019-08-21 15:39:40', '2019-08-21 15:39:40', NULL),
(3, 2147483647, 1, '1,2', '', 2, 750, 0, 750, '{\"s_name\":\"Mehediul Hassan Miton\",\"s_address\":\"Kk\",\"s_country\":\"Bangladesh\",\"s_city\":\"Dhaka\",\"s_state\":\"Dhaka\",\"s_zip\":\"1212\",\"s_phone\":\"01632651361\"}', '{\"b_name\":\"Mehediul Hassan Miton\",\"b_address\":\"KK\",\"b_country\":\"Bangladesh\",\"b_city\":\"Dhaka\",\"b_state\":\"Badda\",\"b_zip\":\"1212\",\"b_phone\":\"0163265136\"}', 'Cash', 'Pending', 'Cancelled', NULL, NULL, '2019-08-22 08:17:39', '2019-08-22 14:07:59', NULL),
(4, 15664624471, 1, '1,2,3,4,5', '', 5, 2700, 0, 2700, '{\"s_name\":\"Mehediul Hassan Miton\",\"s_address\":\"Kk\",\"s_country\":\"Bangladesh\",\"s_city\":\"Dhaka\",\"s_state\":\"Dhaka\",\"s_zip\":\"1212\",\"s_phone\":\"01632651361\"}', '{\"b_name\":\"Mehediul Hassan Miton\",\"b_address\":\"KK\",\"b_country\":\"Bangladesh\",\"b_city\":\"Dhaka\",\"b_state\":\"Badda\",\"b_zip\":\"1212\",\"b_phone\":\"0163265136\"}', 'Cash', 'Completed', 'Completed', '2019-08-22 10:54:14', '2019-08-22 10:54:14', '2019-08-22 08:22:16', '2019-08-22 10:54:14', NULL);

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
(1, '2019_08_07_000000_create_software_users_table', 1),
(2, '2019_08_07_060540_create_basic_info_table', 1),
(3, '2019_08_07_113048_create_slider_table', 1),
(4, '2019_08_07_154517_create_social_table', 1),
(5, '2019_08_07_155505_create_category_table', 1),
(6, '2019_08_07_162535_create_sub_category_table', 1),
(7, '2019_08_08_092019_create_products_table', 1),
(8, '2019_08_09_163412_create_product_image_table', 1),
(9, '2019_08_11_150709_create_brand_table', 1),
(11, '2019_08_15_105941_create_carts_table', 3),
(12, '2019_08_13_152801_create_web_users_table', 4),
(13, '2019_08_20_213007_create_invoice_table', 5),
(15, '2019_08_21_192829_create_orders_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `inv_id` bigint(20) UNSIGNED NOT NULL,
  `usr_id` bigint(20) UNSIGNED NOT NULL,
  `prod_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `sub_price` double NOT NULL,
  `prod_data` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'New, Pending, Proccessing, Completed, Cancelled',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `inv_id`, `usr_id`, `prod_id`, `quantity`, `price`, `sub_price`, `prod_data`, `status`, `completed_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 4, 1, 450, 450, '{\"id\":4,\"post_id\":1565518808,\"cat_id\":1,\"sub_cat_id\":1,\"brand_id\":1,\"name\":\"Baseball Cap\",\"description\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.\",\"colors\":\"\",\"size\":\"\",\"price\":450,\"discount\":0,\"quantity\":0,\"views\":0,\"meta_title\":\"\",\"meta_keywords\":\"\",\"meta_desc\":\"\",\"status\":1,\"created_by\":1,\"updated_by\":1,\"deleted_by\":null,\"created_at\":\"2019-08-11 16:14:42\",\"updated_at\":\"2019-08-11 16:17:22\",\"deleted_at\":null,\"category\":{\"id\":1,\"cat_name\":\"Fashion & Clothes\",\"cat_image\":\"1565517253.png\",\"status\":1,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null,\"created_at\":\"2019-08-11 15:54:12\",\"updated_at\":\"2019-08-11 15:54:12\",\"deleted_at\":null},\"sub_category\":{\"id\":1,\"cat_id\":1,\"sub_cat_name\":\"SC-1\",\"status\":1,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null,\"created_at\":\"2019-08-11 16:07:38\",\"updated_at\":\"2019-08-11 16:07:38\",\"deleted_at\":null},\"brand\":{\"id\":1,\"br_name\":\"Sanderson\",\"br_image\":\"1565518108.jpeg\",\"status\":1,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null,\"created_at\":\"2019-08-11 16:08:28\",\"updated_at\":\"2019-08-11 16:08:28\",\"deleted_at\":null},\"product_img\":[{\"id\":9,\"prod_id\":4,\"image\":\"1565518633.jpg\",\"thumb\":0,\"created_at\":\"2019-08-11 16:14:42\",\"updated_at\":\"2019-08-11 16:17:12\"}]}', 'Completed', '2019-08-22 14:19:44', '2019-08-21 15:09:27', '2019-08-22 14:19:44', NULL),
(2, 1, 1, 3, 1, 500, 500, '{\"id\":3,\"post_id\":1565518512,\"cat_id\":1,\"sub_cat_id\":1,\"brand_id\":1,\"name\":\"Collar Shirt\",\"description\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.\",\"colors\":\"\",\"size\":\"\",\"price\":600,\"discount\":500,\"quantity\":0,\"views\":0,\"meta_title\":\"\",\"meta_keywords\":\"\",\"meta_desc\":\"\",\"status\":1,\"created_by\":1,\"updated_by\":1,\"deleted_by\":null,\"created_at\":\"2019-08-11 16:13:39\",\"updated_at\":\"2019-08-11 16:17:39\",\"deleted_at\":null,\"category\":{\"id\":1,\"cat_name\":\"Fashion & Clothes\",\"cat_image\":\"1565517253.png\",\"status\":1,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null,\"created_at\":\"2019-08-11 15:54:12\",\"updated_at\":\"2019-08-11 15:54:12\",\"deleted_at\":null},\"sub_category\":{\"id\":1,\"cat_id\":1,\"sub_cat_name\":\"SC-1\",\"status\":1,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null,\"created_at\":\"2019-08-11 16:07:38\",\"updated_at\":\"2019-08-11 16:07:38\",\"deleted_at\":null},\"brand\":{\"id\":1,\"br_name\":\"Sanderson\",\"br_image\":\"1565518108.jpeg\",\"status\":1,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null,\"created_at\":\"2019-08-11 16:08:28\",\"updated_at\":\"2019-08-11 16:08:28\",\"deleted_at\":null},\"product_img\":[{\"id\":6,\"prod_id\":3,\"image\":\"1565518660.jpg\",\"thumb\":0,\"created_at\":\"2019-08-11 16:13:39\",\"updated_at\":\"2019-08-11 16:17:39\"},{\"id\":7,\"prod_id\":3,\"image\":\"1565518408.png\",\"thumb\":0,\"created_at\":\"2019-08-11 16:13:39\",\"updated_at\":\"2019-08-11 16:13:39\"},{\"id\":8,\"prod_id\":3,\"image\":\"1565518410.jpeg\",\"thumb\":0,\"created_at\":\"2019-08-11 16:13:39\",\"updated_at\":\"2019-08-11 16:13:39\"}]}', 'Completed', '2019-08-22 14:19:44', '2019-08-21 15:09:27', '2019-08-22 14:19:44', NULL),
(3, 2, 1, 4, 1, 450, 450, '{\"id\":4,\"post_id\":1565518808,\"cat_id\":1,\"sub_cat_id\":1,\"brand_id\":1,\"name\":\"Baseball Cap\",\"description\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.\",\"colors\":\"\",\"size\":\"\",\"price\":450,\"discount\":0,\"quantity\":0,\"views\":0,\"meta_title\":\"\",\"meta_keywords\":\"\",\"meta_desc\":\"\",\"status\":1,\"created_by\":1,\"updated_by\":1,\"deleted_by\":null,\"created_at\":\"2019-08-11 16:14:42\",\"updated_at\":\"2019-08-11 16:17:22\",\"deleted_at\":null,\"category\":{\"id\":1,\"cat_name\":\"Fashion & Clothes\",\"cat_image\":\"1565517253.png\",\"status\":1,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null,\"created_at\":\"2019-08-11 15:54:12\",\"updated_at\":\"2019-08-11 15:54:12\",\"deleted_at\":null},\"sub_category\":{\"id\":1,\"cat_id\":1,\"sub_cat_name\":\"SC-1\",\"status\":1,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null,\"created_at\":\"2019-08-11 16:07:38\",\"updated_at\":\"2019-08-11 16:07:38\",\"deleted_at\":null},\"brand\":{\"id\":1,\"br_name\":\"Sanderson\",\"br_image\":\"1565518108.jpeg\",\"status\":1,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null,\"created_at\":\"2019-08-11 16:08:28\",\"updated_at\":\"2019-08-11 16:08:28\",\"deleted_at\":null},\"product_img\":[{\"id\":9,\"prod_id\":4,\"image\":\"1565518633.jpg\",\"thumb\":0,\"created_at\":\"2019-08-11 16:14:42\",\"updated_at\":\"2019-08-11 16:17:12\"}]}', 'Pending', NULL, '2019-08-21 15:39:40', '2019-08-21 15:39:40', NULL),
(4, 3, 1, 1, 1, 350, 350, '{\"id\":1,\"post_id\":1565519123,\"cat_id\":1,\"sub_cat_id\":1,\"brand_id\":1,\"name\":\"Palm Print Shirt\",\"description\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.\\r\\n\\r\\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.\",\"colors\":\"\",\"size\":\"\",\"price\":350,\"discount\":0,\"quantity\":0,\"views\":0,\"meta_title\":\"\",\"meta_keywords\":\"\",\"meta_desc\":\"\",\"status\":1,\"created_by\":1,\"updated_by\":1,\"deleted_by\":null,\"created_at\":\"2019-08-11 16:11:44\",\"updated_at\":\"2019-08-11 16:18:03\",\"deleted_at\":null,\"category\":{\"id\":1,\"cat_name\":\"Fashion & Clothes\",\"cat_image\":\"1565517253.png\",\"status\":1,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null,\"created_at\":\"2019-08-11 15:54:12\",\"updated_at\":\"2019-08-11 15:54:12\",\"deleted_at\":null},\"sub_category\":{\"id\":1,\"cat_id\":1,\"sub_cat_name\":\"SC-1\",\"status\":1,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null,\"created_at\":\"2019-08-11 16:07:38\",\"updated_at\":\"2019-08-11 16:07:38\",\"deleted_at\":null},\"brand\":{\"id\":1,\"br_name\":\"Sanderson\",\"br_image\":\"1565518108.jpeg\",\"status\":1,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null,\"created_at\":\"2019-08-11 16:08:28\",\"updated_at\":\"2019-08-11 16:08:28\",\"deleted_at\":null},\"product_img\":[{\"id\":1,\"prod_id\":1,\"image\":\"1565518684.jpg\",\"thumb\":0,\"created_at\":\"2019-08-11 16:11:44\",\"updated_at\":\"2019-08-11 16:18:03\"},{\"id\":2,\"prod_id\":1,\"image\":\"1565518285.png\",\"thumb\":0,\"created_at\":\"2019-08-11 16:11:44\",\"updated_at\":\"2019-08-11 16:11:44\"},{\"id\":3,\"prod_id\":1,\"image\":\"1565518286.jpeg\",\"thumb\":0,\"created_at\":\"2019-08-11 16:11:44\",\"updated_at\":\"2019-08-11 16:11:44\"}]}', 'Cancelled', NULL, '2019-08-22 08:17:40', '2019-08-22 14:07:59', NULL),
(5, 3, 1, 2, 1, 400, 400, '{\"id\":2,\"post_id\":1565518632,\"cat_id\":1,\"sub_cat_id\":2,\"brand_id\":2,\"name\":\"Cuffed Chino Shorts\",\"description\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.\",\"colors\":\"\",\"size\":\"\",\"price\":500,\"discount\":400,\"quantity\":0,\"views\":0,\"meta_title\":\"\",\"meta_keywords\":\"\",\"meta_desc\":\"\",\"status\":1,\"created_by\":1,\"updated_by\":1,\"deleted_by\":null,\"created_at\":\"2019-08-11 16:12:49\",\"updated_at\":\"2019-08-11 16:17:52\",\"deleted_at\":null,\"category\":{\"id\":1,\"cat_name\":\"Fashion & Clothes\",\"cat_image\":\"1565517253.png\",\"status\":1,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null,\"created_at\":\"2019-08-11 15:54:12\",\"updated_at\":\"2019-08-11 15:54:12\",\"deleted_at\":null},\"sub_category\":{\"id\":2,\"cat_id\":2,\"sub_cat_name\":\"SC-2\",\"status\":1,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null,\"created_at\":\"2019-08-11 16:07:47\",\"updated_at\":\"2019-08-11 16:07:47\",\"deleted_at\":null},\"brand\":{\"id\":2,\"br_name\":\"Shannon\",\"br_image\":\"1565518138.JPG\",\"status\":1,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null,\"created_at\":\"2019-08-11 16:08:58\",\"updated_at\":\"2019-08-11 16:08:58\",\"deleted_at\":null},\"product_img\":[{\"id\":4,\"prod_id\":2,\"image\":\"1565518673.jpg\",\"thumb\":0,\"created_at\":\"2019-08-11 16:12:49\",\"updated_at\":\"2019-08-11 16:17:52\"},{\"id\":5,\"prod_id\":2,\"image\":\"1565518355.jpg\",\"thumb\":0,\"created_at\":\"2019-08-11 16:12:49\",\"updated_at\":\"2019-08-11 16:12:49\"}]}', 'Cancelled', NULL, '2019-08-22 08:17:40', '2019-08-22 14:07:59', NULL),
(6, 4, 1, 1, 1, 350, 350, '{\"id\":1,\"post_id\":1565519123,\"cat_id\":1,\"sub_cat_id\":1,\"brand_id\":1,\"name\":\"Palm Print Shirt\",\"description\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.\\r\\n\\r\\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.\",\"colors\":\"\",\"size\":\"\",\"price\":350,\"discount\":0,\"quantity\":0,\"views\":0,\"meta_title\":\"\",\"meta_keywords\":\"\",\"meta_desc\":\"\",\"status\":1,\"created_by\":1,\"updated_by\":1,\"deleted_by\":null,\"created_at\":\"2019-08-11 16:11:44\",\"updated_at\":\"2019-08-11 16:18:03\",\"deleted_at\":null,\"category\":{\"id\":1,\"cat_name\":\"Fashion & Clothes\",\"cat_image\":\"1565517253.png\",\"status\":1,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null,\"created_at\":\"2019-08-11 15:54:12\",\"updated_at\":\"2019-08-11 15:54:12\",\"deleted_at\":null},\"sub_category\":{\"id\":1,\"cat_id\":1,\"sub_cat_name\":\"SC-1\",\"status\":1,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null,\"created_at\":\"2019-08-11 16:07:38\",\"updated_at\":\"2019-08-11 16:07:38\",\"deleted_at\":null},\"brand\":{\"id\":1,\"br_name\":\"Sanderson\",\"br_image\":\"1565518108.jpeg\",\"status\":1,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null,\"created_at\":\"2019-08-11 16:08:28\",\"updated_at\":\"2019-08-11 16:08:28\",\"deleted_at\":null},\"product_img\":[{\"id\":1,\"prod_id\":1,\"image\":\"1565518684.jpg\",\"thumb\":0,\"created_at\":\"2019-08-11 16:11:44\",\"updated_at\":\"2019-08-11 16:18:03\"},{\"id\":2,\"prod_id\":1,\"image\":\"1565518285.png\",\"thumb\":0,\"created_at\":\"2019-08-11 16:11:44\",\"updated_at\":\"2019-08-11 16:11:44\"},{\"id\":3,\"prod_id\":1,\"image\":\"1565518286.jpeg\",\"thumb\":0,\"created_at\":\"2019-08-11 16:11:44\",\"updated_at\":\"2019-08-11 16:11:44\"}]}', 'Completed', '2019-08-22 10:54:14', '2019-08-22 08:22:16', '2019-08-22 10:54:14', NULL),
(7, 4, 1, 2, 1, 400, 400, '{\"id\":2,\"post_id\":1565518632,\"cat_id\":1,\"sub_cat_id\":2,\"brand_id\":2,\"name\":\"Cuffed Chino Shorts\",\"description\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.\",\"colors\":\"\",\"size\":\"\",\"price\":500,\"discount\":400,\"quantity\":0,\"views\":0,\"meta_title\":\"\",\"meta_keywords\":\"\",\"meta_desc\":\"\",\"status\":1,\"created_by\":1,\"updated_by\":1,\"deleted_by\":null,\"created_at\":\"2019-08-11 16:12:49\",\"updated_at\":\"2019-08-11 16:17:52\",\"deleted_at\":null,\"category\":{\"id\":1,\"cat_name\":\"Fashion & Clothes\",\"cat_image\":\"1565517253.png\",\"status\":1,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null,\"created_at\":\"2019-08-11 15:54:12\",\"updated_at\":\"2019-08-11 15:54:12\",\"deleted_at\":null},\"sub_category\":{\"id\":2,\"cat_id\":2,\"sub_cat_name\":\"SC-2\",\"status\":1,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null,\"created_at\":\"2019-08-11 16:07:47\",\"updated_at\":\"2019-08-11 16:07:47\",\"deleted_at\":null},\"brand\":{\"id\":2,\"br_name\":\"Shannon\",\"br_image\":\"1565518138.JPG\",\"status\":1,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null,\"created_at\":\"2019-08-11 16:08:58\",\"updated_at\":\"2019-08-11 16:08:58\",\"deleted_at\":null},\"product_img\":[{\"id\":4,\"prod_id\":2,\"image\":\"1565518673.jpg\",\"thumb\":0,\"created_at\":\"2019-08-11 16:12:49\",\"updated_at\":\"2019-08-11 16:17:52\"},{\"id\":5,\"prod_id\":2,\"image\":\"1565518355.jpg\",\"thumb\":0,\"created_at\":\"2019-08-11 16:12:49\",\"updated_at\":\"2019-08-11 16:12:49\"}]}', 'Completed', '2019-08-22 10:54:14', '2019-08-22 08:22:16', '2019-08-22 10:54:14', NULL),
(8, 4, 1, 3, 1, 500, 500, '{\"id\":3,\"post_id\":1565518512,\"cat_id\":1,\"sub_cat_id\":1,\"brand_id\":1,\"name\":\"Collar Shirt\",\"description\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.\",\"colors\":\"\",\"size\":\"\",\"price\":600,\"discount\":500,\"quantity\":0,\"views\":0,\"meta_title\":\"\",\"meta_keywords\":\"\",\"meta_desc\":\"\",\"status\":1,\"created_by\":1,\"updated_by\":1,\"deleted_by\":null,\"created_at\":\"2019-08-11 16:13:39\",\"updated_at\":\"2019-08-11 16:17:39\",\"deleted_at\":null,\"category\":{\"id\":1,\"cat_name\":\"Fashion & Clothes\",\"cat_image\":\"1565517253.png\",\"status\":1,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null,\"created_at\":\"2019-08-11 15:54:12\",\"updated_at\":\"2019-08-11 15:54:12\",\"deleted_at\":null},\"sub_category\":{\"id\":1,\"cat_id\":1,\"sub_cat_name\":\"SC-1\",\"status\":1,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null,\"created_at\":\"2019-08-11 16:07:38\",\"updated_at\":\"2019-08-11 16:07:38\",\"deleted_at\":null},\"brand\":{\"id\":1,\"br_name\":\"Sanderson\",\"br_image\":\"1565518108.jpeg\",\"status\":1,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null,\"created_at\":\"2019-08-11 16:08:28\",\"updated_at\":\"2019-08-11 16:08:28\",\"deleted_at\":null},\"product_img\":[{\"id\":6,\"prod_id\":3,\"image\":\"1565518660.jpg\",\"thumb\":0,\"created_at\":\"2019-08-11 16:13:39\",\"updated_at\":\"2019-08-11 16:17:39\"},{\"id\":7,\"prod_id\":3,\"image\":\"1565518408.png\",\"thumb\":0,\"created_at\":\"2019-08-11 16:13:39\",\"updated_at\":\"2019-08-11 16:13:39\"},{\"id\":8,\"prod_id\":3,\"image\":\"1565518410.jpeg\",\"thumb\":0,\"created_at\":\"2019-08-11 16:13:39\",\"updated_at\":\"2019-08-11 16:13:39\"}]}', 'Completed', '2019-08-22 10:54:14', '2019-08-22 08:22:16', '2019-08-22 10:54:14', NULL),
(9, 4, 1, 4, 1, 450, 450, '{\"id\":4,\"post_id\":1565518808,\"cat_id\":1,\"sub_cat_id\":1,\"brand_id\":1,\"name\":\"Baseball Cap\",\"description\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.\",\"colors\":\"\",\"size\":\"\",\"price\":450,\"discount\":0,\"quantity\":0,\"views\":0,\"meta_title\":\"\",\"meta_keywords\":\"\",\"meta_desc\":\"\",\"status\":1,\"created_by\":1,\"updated_by\":1,\"deleted_by\":null,\"created_at\":\"2019-08-11 16:14:42\",\"updated_at\":\"2019-08-11 16:17:22\",\"deleted_at\":null,\"category\":{\"id\":1,\"cat_name\":\"Fashion & Clothes\",\"cat_image\":\"1565517253.png\",\"status\":1,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null,\"created_at\":\"2019-08-11 15:54:12\",\"updated_at\":\"2019-08-11 15:54:12\",\"deleted_at\":null},\"sub_category\":{\"id\":1,\"cat_id\":1,\"sub_cat_name\":\"SC-1\",\"status\":1,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null,\"created_at\":\"2019-08-11 16:07:38\",\"updated_at\":\"2019-08-11 16:07:38\",\"deleted_at\":null},\"brand\":{\"id\":1,\"br_name\":\"Sanderson\",\"br_image\":\"1565518108.jpeg\",\"status\":1,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null,\"created_at\":\"2019-08-11 16:08:28\",\"updated_at\":\"2019-08-11 16:08:28\",\"deleted_at\":null},\"product_img\":[{\"id\":9,\"prod_id\":4,\"image\":\"1565518633.jpg\",\"thumb\":0,\"created_at\":\"2019-08-11 16:14:42\",\"updated_at\":\"2019-08-11 16:17:12\"}]}', 'Completed', '2019-08-22 10:54:14', '2019-08-22 08:22:17', '2019-08-22 10:54:14', NULL),
(10, 4, 1, 5, 1, 1000, 1000, '{\"id\":5,\"post_id\":1565519632,\"cat_id\":1,\"sub_cat_id\":1,\"brand_id\":1,\"name\":\"Cotton Bomber Jacket\",\"description\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.\",\"colors\":\"\",\"size\":\"\",\"price\":1000,\"discount\":0,\"quantity\":0,\"views\":0,\"meta_title\":\"\",\"meta_keywords\":\"\",\"meta_desc\":\"\",\"status\":1,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null,\"created_at\":\"2019-08-11 16:19:12\",\"updated_at\":\"2019-08-11 16:19:12\",\"deleted_at\":null,\"category\":{\"id\":1,\"cat_name\":\"Fashion & Clothes\",\"cat_image\":\"1565517253.png\",\"status\":1,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null,\"created_at\":\"2019-08-11 15:54:12\",\"updated_at\":\"2019-08-11 15:54:12\",\"deleted_at\":null},\"sub_category\":{\"id\":1,\"cat_id\":1,\"sub_cat_name\":\"SC-1\",\"status\":1,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null,\"created_at\":\"2019-08-11 16:07:38\",\"updated_at\":\"2019-08-11 16:07:38\",\"deleted_at\":null},\"brand\":{\"id\":1,\"br_name\":\"Sanderson\",\"br_image\":\"1565518108.jpeg\",\"status\":1,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null,\"created_at\":\"2019-08-11 16:08:28\",\"updated_at\":\"2019-08-11 16:08:28\",\"deleted_at\":null},\"product_img\":[{\"id\":11,\"prod_id\":5,\"image\":\"1565518741.jpg\",\"thumb\":0,\"created_at\":\"2019-08-11 16:19:12\",\"updated_at\":\"2019-08-11 16:19:12\"}]}', 'Completed', '2019-08-22 10:54:14', '2019-08-22 08:22:17', '2019-08-22 10:54:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `cat_id` bigint(20) UNSIGNED NOT NULL,
  `sub_cat_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `colors` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `discount` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `views` int(11) NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL COMMENT '0 = Inactive, 1 = Active',
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `post_id`, `cat_id`, `sub_cat_id`, `brand_id`, `name`, `description`, `colors`, `size`, `price`, `discount`, `quantity`, `views`, `meta_title`, `meta_keywords`, `meta_desc`, `status`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1565519123, 1, 1, 1, 'Palm Print Shirt', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.', '', '', 350, 0, 0, 0, '', '', '', 1, 1, 1, NULL, '2019-08-11 10:11:44', '2019-08-11 10:18:03', NULL),
(2, 1565518632, 1, 2, 2, 'Cuffed Chino Shorts', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.', '', '', 500, 400, 0, 0, '', '', '', 1, 1, 1, NULL, '2019-08-11 10:12:49', '2019-08-11 10:17:52', NULL),
(3, 1565518512, 1, 1, 1, 'Collar Shirt', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.', '', '', 600, 500, 0, 0, '', '', '', 1, 1, 1, NULL, '2019-08-11 10:13:39', '2019-08-11 10:17:39', NULL),
(4, 1565518808, 1, 1, 1, 'Baseball Cap', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.', '', '', 450, 0, 0, 0, '', '', '', 1, 1, 1, NULL, '2019-08-11 10:14:42', '2019-08-11 10:17:22', NULL),
(5, 1565519632, 1, 1, 1, 'Cotton Bomber Jacket', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.', '', '', 1000, 0, 0, 0, '', '', '', 1, 1, NULL, NULL, '2019-08-11 10:19:12', '2019-08-11 10:19:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prod_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumb` int(11) NOT NULL COMMENT '0 = Inactive, 1 = Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`id`, `prod_id`, `image`, `thumb`, `created_at`, `updated_at`) VALUES
(1, 1, '1565518684.jpg', 0, '2019-08-11 10:11:44', '2019-08-11 10:18:03'),
(2, 1, '1565518285.png', 0, '2019-08-11 10:11:44', '2019-08-11 10:11:44'),
(3, 1, '1565518286.jpeg', 0, '2019-08-11 10:11:44', '2019-08-11 10:11:44'),
(4, 2, '1565518673.jpg', 0, '2019-08-11 10:12:49', '2019-08-11 10:17:52'),
(5, 2, '1565518355.jpg', 0, '2019-08-11 10:12:49', '2019-08-11 10:12:49'),
(6, 3, '1565518660.jpg', 0, '2019-08-11 10:13:39', '2019-08-11 10:17:39'),
(7, 3, '1565518408.png', 0, '2019-08-11 10:13:39', '2019-08-11 10:13:39'),
(8, 3, '1565518410.jpeg', 0, '2019-08-11 10:13:39', '2019-08-11 10:13:39'),
(9, 4, '1565518633.jpg', 0, '2019-08-11 10:14:42', '2019-08-11 10:17:12'),
(11, 5, '1565518741.jpg', 0, '2019-08-11 10:19:12', '2019-08-11 10:19:12');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `heading` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL COMMENT '0 = Inactive, 1 = Active',
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `social`
--

CREATE TABLE `social` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL COMMENT '0 = Inactive, 1 = Active',
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social`
--

INSERT INTO `social` (`id`, `icon`, `url`, `status`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'fa fa-google', 'https://www.google.com/', 1, 1, NULL, NULL, '2019-08-11 09:45:19', '2019-08-11 09:45:19', NULL),
(2, 'fa fa-twitter', 'https://www.twitter.com/', 1, 1, NULL, NULL, '2019-08-11 09:45:31', '2019-08-11 09:45:31', NULL),
(3, 'fa fa-linkedin', 'https://www.linkedin.com/', 1, 1, NULL, NULL, '2019-08-11 09:45:46', '2019-08-11 09:45:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `software_users`
--

CREATE TABLE `software_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verify_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone_verified_at` timestamp NULL DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL COMMENT '0 = Inactive, 1 = Active',
  `online` int(11) NOT NULL COMMENT '0 = Inactive, 1 = Active',
  `login_at` timestamp NULL DEFAULT NULL,
  `logout_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `software_users`
--

INSERT INTO `software_users` (`id`, `role`, `name`, `email`, `phone`, `nid`, `image`, `birth_date`, `username`, `password`, `remember_token`, `verify_token`, `email_verified_at`, `phone_verified_at`, `country`, `state`, `city`, `zip_code`, `address`, `status`, `online`, `login_at`, `logout_at`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'SuperAdmin', 'Mehediul Hassan Miton', 'mdmiton321@gmail.com', '01632651361', NULL, '', '', 'admin', '$2y$10$xFGesW66qB4ABwCipWuo7.61Endyd6tKgV1UoVPnFaCfNh31eVAK2', NULL, '', NULL, NULL, '', '', '', '', '', 1, 0, '2019-08-22 13:58:21', '2019-08-22 15:11:35', 1, NULL, NULL, '2019-08-13 09:49:04', '2019-08-22 15:11:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_id` bigint(20) UNSIGNED NOT NULL,
  `sub_cat_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL COMMENT '0 = Inactive, 1 = Active',
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`id`, `cat_id`, `sub_cat_name`, `status`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'SC-1', 1, 1, NULL, NULL, '2019-08-11 10:07:38', '2019-08-11 10:07:38', NULL),
(2, 2, 'SC-2', 1, 1, NULL, NULL, '2019-08-11 10:07:47', '2019-08-11 10:07:47', NULL),
(3, 3, 'SC-3', 1, 1, NULL, NULL, '2019-08-11 10:07:55', '2019-08-11 10:07:55', NULL),
(4, 1, 'SC-4', 1, 1, NULL, NULL, '2019-08-11 10:08:04', '2019-08-11 10:08:04', NULL),
(5, 5, 'SC-5', 1, 1, NULL, NULL, '2019-08-11 10:08:12', '2019-08-11 10:08:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `web_users`
--

CREATE TABLE `web_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `access_code` bigint(20) NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verify_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone_verified_at` timestamp NULL DEFAULT NULL,
  `shipping_address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL COMMENT '0 = Inactive, 1 = Active',
  `online` int(11) NOT NULL COMMENT '0 = Inactive, 1 = Active',
  `login_at` timestamp NULL DEFAULT NULL,
  `logout_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `web_users`
--

INSERT INTO `web_users` (`id`, `access_code`, `role`, `name`, `email`, `phone`, `nid`, `image`, `birth_date`, `gender`, `username`, `password`, `remember_token`, `verify_token`, `email_verified_at`, `phone_verified_at`, `shipping_address`, `billing_address`, `status`, `online`, `login_at`, `logout_at`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1566294823, 'General', 'Mehediul Hassan Miton', 'mdmiton321@gmail.com', '0163265136', NULL, '1566294062.jpg', '23-01-1980', 'Male', 'miton247', '$2y$10$khm78atlmk7A1nNjfgx9BO0n.XFLft37y7r8xsCxvmSWzgH0csyXu', NULL, 'miton247-rX4BOlJKyhEKvaoi6Xd7XjEDwa7ropUY', '2019-08-20 09:39:00', NULL, '{\"s_name\":\"Mehediul Hassan Miton\",\"s_address\":\"Kk\",\"s_country\":\"Bangladesh\",\"s_city\":\"Dhaka\",\"s_state\":\"Dhaka\",\"s_zip\":\"1212\",\"s_phone\":\"01632651361\"}', '{\"b_name\":\"Mehediul Hassan Miton\",\"b_address\":\"KK\",\"b_country\":\"Bangladesh\",\"b_city\":\"Dhaka\",\"b_state\":\"Badda\",\"b_zip\":\"1212\",\"b_phone\":\"0163265136\"}', 1, 1, '2019-08-22 15:10:49', NULL, 0, NULL, NULL, '2019-08-20 09:38:14', '2019-08-22 15:10:49', NULL),
(2, 1566486766, 'General', 'Mehediul Hassan Miton', 'md@gmail.com', '01632651363', NULL, '', '', '', 'mmm', '$2y$10$yvbqSdWcutVcJm6X.NkSKeSGN7LQl.hbOdig9pIJtHimaF7EUKHzy', NULL, 'mmm-cySnyJBP9X1tZN7MgxFc4z4ElkGOqApc', NULL, NULL, '', '', 0, 0, NULL, NULL, 0, NULL, NULL, '2019-08-22 15:11:58', '2019-08-22 15:11:58', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basic_info`
--
ALTER TABLE `basic_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `basic_info_created_by_foreign` (`created_by`),
  ADD KEY `basic_info_updated_by_foreign` (`updated_by`),
  ADD KEY `basic_info_deleted_by_foreign` (`deleted_by`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brand_created_by_foreign` (`created_by`),
  ADD KEY `brand_updated_by_foreign` (`updated_by`),
  ADD KEY `brand_deleted_by_foreign` (`deleted_by`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_usr_id_foreign` (`usr_id`),
  ADD KEY `carts_prod_id_foreign` (`prod_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_created_by_foreign` (`created_by`),
  ADD KEY `category_updated_by_foreign` (`updated_by`),
  ADD KEY `category_deleted_by_foreign` (`deleted_by`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_usr_id_foreign` (`usr_id`);

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
  ADD KEY `orders_inv_id_foreign` (`inv_id`),
  ADD KEY `orders_usr_id_foreign` (`usr_id`),
  ADD KEY `orders_prod_id_foreign` (`prod_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_post_id_unique` (`post_id`),
  ADD KEY `products_cat_id_foreign` (`cat_id`),
  ADD KEY `products_sub_cat_id_foreign` (`sub_cat_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`),
  ADD KEY `products_created_by_foreign` (`created_by`),
  ADD KEY `products_updated_by_foreign` (`updated_by`),
  ADD KEY `products_deleted_by_foreign` (`deleted_by`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_image_prod_id_foreign` (`prod_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slider_created_by_foreign` (`created_by`),
  ADD KEY `slider_updated_by_foreign` (`updated_by`),
  ADD KEY `slider_deleted_by_foreign` (`deleted_by`);

--
-- Indexes for table `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`id`),
  ADD KEY `social_created_by_foreign` (`created_by`),
  ADD KEY `social_updated_by_foreign` (`updated_by`),
  ADD KEY `social_deleted_by_foreign` (`deleted_by`);

--
-- Indexes for table `software_users`
--
ALTER TABLE `software_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `software_users_email_unique` (`email`),
  ADD UNIQUE KEY `software_users_phone_unique` (`phone`),
  ADD UNIQUE KEY `software_users_username_unique` (`username`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_category_cat_id_foreign` (`cat_id`),
  ADD KEY `sub_category_created_by_foreign` (`created_by`),
  ADD KEY `sub_category_updated_by_foreign` (`updated_by`),
  ADD KEY `sub_category_deleted_by_foreign` (`deleted_by`);

--
-- Indexes for table `web_users`
--
ALTER TABLE `web_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `web_users_access_code_unique` (`access_code`),
  ADD UNIQUE KEY `web_users_email_unique` (`email`),
  ADD UNIQUE KEY `web_users_phone_unique` (`phone`),
  ADD UNIQUE KEY `web_users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basic_info`
--
ALTER TABLE `basic_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `social`
--
ALTER TABLE `social`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `software_users`
--
ALTER TABLE `software_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `web_users`
--
ALTER TABLE `web_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `brand`
--
ALTER TABLE `brand`
  ADD CONSTRAINT `brand_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `software_users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `brand_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `software_users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `brand_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `software_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_prod_id_foreign` FOREIGN KEY (`prod_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_usr_id_foreign` FOREIGN KEY (`usr_id`) REFERENCES `web_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `software_users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `software_users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `software_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_usr_id_foreign` FOREIGN KEY (`usr_id`) REFERENCES `web_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_inv_id_foreign` FOREIGN KEY (`inv_id`) REFERENCES `invoice` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_prod_id_foreign` FOREIGN KEY (`prod_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_usr_id_foreign` FOREIGN KEY (`usr_id`) REFERENCES `web_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `sub_category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `software_users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `software_users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_sub_cat_id_foreign` FOREIGN KEY (`sub_cat_id`) REFERENCES `sub_category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `software_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_image`
--
ALTER TABLE `product_image`
  ADD CONSTRAINT `product_image_prod_id_foreign` FOREIGN KEY (`prod_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `slider`
--
ALTER TABLE `slider`
  ADD CONSTRAINT `slider_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `software_users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `slider_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `software_users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `slider_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `software_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `social`
--
ALTER TABLE `social`
  ADD CONSTRAINT `social_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `software_users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `social_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `software_users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `social_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `software_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD CONSTRAINT `sub_category_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sub_category_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `software_users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sub_category_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `software_users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sub_category_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `software_users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
