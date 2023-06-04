-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jun 04, 2023 at 09:35 AM
-- Server version: 10.6.5-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `infolekha`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertisementimages`
--

DROP TABLE IF EXISTS `advertisementimages`;
CREATE TABLE IF NOT EXISTS `advertisementimages` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_count` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advertisementimages`
--

INSERT INTO `advertisementimages` (`id`, `name`, `city_id`, `image_count`, `images`, `created_at`, `updated_at`) VALUES
(1, 'demo', '1', '2', '[\"public\\/images\\/gVR0g2ZTLMcpUaaN7Lmox8MixyCOotwptyEkru9i.jpg\"]', '2023-04-25 14:25:26', '2023-04-25 14:25:26'),
(2, 'demo2', '2', '2', '[\"public\\/images\\/g9YIMDHfUqKlO2P8uBhHYzoYd9WAYsy2szW7vez1.jpg\",\"public\\/images\\/knMwNhmtwNOQnVy7io5yJTKW8ysjmRoIsGIcfoUF.png\"]', '2023-04-25 14:59:06', '2023-04-25 14:59:06'),
(3, 'demo', '4', '4', '[\"public\\/images\\/OOMWNKg4qFDlrB2KvxFHZX0EZX6NGzcrd7ah3Rrj.png\",\"public\\/images\\/FAsXJTmRZ9OiUzy99ifaH4BwIs0iIx7eBsD1Sk9f.png\",\"public\\/images\\/DPf1W0MQMjt3pzbWK1LIhLAYsKgdM4bXYkNEqRRg.png\",\"public\\/images\\/9SQi1nlUMGAwONL9iqZZdSYosLNkJQESyMxLCbMr.png\"]', '2023-04-25 15:14:53', '2023-04-25 15:14:53');

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

DROP TABLE IF EXISTS `advertisements`;
CREATE TABLE IF NOT EXISTS `advertisements` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `city_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advertisements`
--

INSERT INTO `advertisements` (`id`, `city_id`, `banner_image`, `created_at`, `updated_at`) VALUES
(1, '1', '1682397591.png', '2023-04-25 11:32:41', '2023-04-25 11:39:51'),
(3, '3', '1682398819.png', '2023-04-25 12:00:19', '2023-04-25 12:00:19'),
(4, '3', '1682398819.png', '2023-04-25 12:00:19', '2023-04-25 12:00:19'),
(5, '5', '1682399218.png', '2023-04-25 12:00:36', '2023-04-25 12:06:58');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

DROP TABLE IF EXISTS `announcements`;
CREATE TABLE IF NOT EXISTS `announcements` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `city_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `announcement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `announcement_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Approve',' Rejected') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `city_id`, `date`, `announcement`, `announcement_image`, `status`, `created_at`, `updated_at`) VALUES
(6, 0, '0000-00-00', 'test', '<p><i><strong>test………………..</strong></i></p>', 'Approve', '2023-04-20 05:12:03', '2023-04-20 05:12:03'),
(7, 2, '2023-04-20', 'rt', '<p>sas</p>', 'Approve', '2023-04-20 06:33:11', '2023-04-20 06:33:11'),
(8, 2, '2015-09-27', 'Rem obcaecati harum', 'Sunt sint modi cons', 'Approve', '2023-06-03 13:14:29', '2023-06-03 13:14:29');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
CREATE TABLE IF NOT EXISTS `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `publish_date` date NOT NULL,
  `title` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_name` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blogs` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `publish_date`, `title`, `author_name`, `blog_image`, `blogs`, `created_at`, `updated_at`) VALUES
(8, '2006-09-17', 'Dolorum molestias od', 'Jasmine Simpson', 'images/95311685818087.png', 'Labore pariatur Sed', '2023-06-03 13:18:07', '2023-06-03 13:18:07');

-- --------------------------------------------------------

--
-- Table structure for table `brochures`
--

DROP TABLE IF EXISTS `brochures`;
CREATE TABLE IF NOT EXISTS `brochures` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `brochure_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brochures`
--

INSERT INTO `brochures` (`id`, `brochure_img`, `created_at`, `updated_at`) VALUES
(8, 'images/38071682511872.png', '2023-04-26 06:54:32', '2023-04-26 06:54:32');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
CREATE TABLE IF NOT EXISTS `city` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `citys` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `citys`, `created_at`, `updated_at`) VALUES
(2, 'dss', '2023-04-20 06:08:50', '2023-04-20 06:08:56');

-- --------------------------------------------------------

--
-- Table structure for table `classss`
--

DROP TABLE IF EXISTS `classss`;
CREATE TABLE IF NOT EXISTS `classss` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

DROP TABLE IF EXISTS `colleges`;
CREATE TABLE IF NOT EXISTS `colleges` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `colege` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`id`, `colege`, `created_at`, `updated_at`) VALUES
(2, 'asdasd', '2023-06-01 11:46:15', '2023-06-01 11:46:15');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact__us`
--

DROP TABLE IF EXISTS `contact__us`;
CREATE TABLE IF NOT EXISTS `contact__us` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact__us`
--

INSERT INTO `contact__us` (`id`, `name`, `email`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(2, 'Akansha', 'akansha@gmail.com', '9874859612', 'test', '2023-04-18 08:43:43', '2023-04-18 08:43:43'),
(3, 'fsd', 'fds@gmail.com', '7485961236', 'sdafa', '2023-04-20 02:30:45', '2023-04-20 02:30:45'),
(4, 'SonyaStimi', 'woodthighgire1988@gmail.com', '82689972935', 'Hey, I\'m bored! My contacts: https://love2me.page.link/FgzB', '2023-04-27 06:44:30', '2023-04-27 06:44:30'),
(5, 'Ipsa voluptatem est', 'kojoris@mailinator.com', '01234567899', 'mayur adhayge', '2023-05-01 05:13:39', '2023-05-01 05:13:39');

-- --------------------------------------------------------

--
-- Table structure for table `courcess`
--

DROP TABLE IF EXISTS `courcess`;
CREATE TABLE IF NOT EXISTS `courcess` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `course` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courcess`
--

INSERT INTO `courcess` (`id`, `course`, `created_at`, `updated_at`) VALUES
(4, 'asdasd', '2023-06-01 11:56:20', '2023-06-01 11:56:20');

-- --------------------------------------------------------

--
-- Table structure for table `entitys`
--

DROP TABLE IF EXISTS `entitys`;
CREATE TABLE IF NOT EXISTS `entitys` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `entity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `facultiess`
--

DROP TABLE IF EXISTS `facultiess`;
CREATE TABLE IF NOT EXISTS `facultiess` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `faculti` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `institutess`
--

DROP TABLE IF EXISTS `institutess`;
CREATE TABLE IF NOT EXISTS `institutess` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `institute` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `institutess`
--

INSERT INTO `institutess` (`id`, `institute`, `created_at`, `updated_at`) VALUES
(3, 'asd', '2023-06-01 11:56:12', '2023-06-01 11:56:12');

-- --------------------------------------------------------

--
-- Table structure for table `jobtyps`
--

DROP TABLE IF EXISTS `jobtyps`;
CREATE TABLE IF NOT EXISTS `jobtyps` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `job` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(32, '2023_04_07_130114_create_user_tutor_table', 1),
(33, '2023_04_07_104309_create_user_student_table', 2),
(34, '2023_04_07_125439_create_user_school_institute_table', 3),
(35, '2023_04_10_030628_create_student_detail_table', 4),
(36, '2023_04_11_084545_create_school_institute_detail_table', 5),
(37, '2023_04_12_030025_create_tutor_detail_table', 6),
(38, '2023_04_18_091240_create_contact__us_table', 7),
(39, '2023_04_20_105043_create_city_table', 8),
(40, '2023_04_26_081633_create_sliders_table', 9),
(41, '2023_04_26_081655_create_brochures_table', 10),
(42, '2023_05_10_173224_create_transaction_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

DROP TABLE IF EXISTS `schools`;
CREATE TABLE IF NOT EXISTS `schools` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `schol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `schol`, `created_at`, `updated_at`) VALUES
(3, 'dszf', '2023-04-24 02:07:16', '2023-04-24 02:07:16');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

DROP TABLE IF EXISTS `sliders`;
CREATE TABLE IF NOT EXISTS `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `slider` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `slider`, `link`, `created_at`, `updated_at`) VALUES
(3, 'images/18751682511964.png', 'cd', '2023-04-26 06:56:04', '2023-04-26 06:56:04');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

DROP TABLE IF EXISTS `state`;
CREATE TABLE IF NOT EXISTS `state` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `state`, `created_at`, `updated_at`) VALUES
(1, 'maharashtra', '2023-04-19 03:36:38', '2023-04-19 03:36:38'),
(2, 'Goa', '2023-04-19 03:36:45', '2023-04-19 03:36:45'),
(3, 'Goa', '2023-04-19 03:40:17', '2023-04-19 03:40:17'),
(4, 'Goa', '2023-04-19 03:41:34', '2023-04-19 03:41:34'),
(5, 'Goa', '2023-04-19 03:42:22', '2023-04-19 03:42:22'),
(6, 'uttar-pradesh', '2023-04-19 03:44:38', '2023-04-19 03:44:38'),
(7, 'himachal pradesh', '2023-04-19 03:45:34', '2023-04-19 03:45:34'),
(8, 'Gujarat', '2023-04-19 09:19:33', '2023-04-19 09:19:33');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
CREATE TABLE IF NOT EXISTS `transaction` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mob` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `amount` float NOT NULL,
  `user_role` int(11) NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `transaction_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `name`, `mob`, `address`, `user_id`, `amount`, `user_role`, `transaction_id`, `transaction_status`, `created_at`, `updated_at`) VALUES
(1, 'Jacob Hopkins', '8585858544', 'Est rerum eos et et', 241, 500, 2, 'I-LEKHA1685813427732', 'userCancelled', '2023-06-03 12:00:27', '2023-06-03 12:00:33'),
(2, 'abc', '2312312312', 'ama', 244, 500, 1, 'I-LEKHA1685863073397', 'NA', '2023-06-04 01:47:53', '2023-06-04 01:47:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('0','1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0-admin,1-institute,2-tutor,3-student	',
  `active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=245 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `active`, `remember_token`, `created_at`, `updated_at`) VALUES
(232, 'admin', 'admin@gmail.com', NULL, '$2y$10$ERIIYUGvHAxRQPrVCUSu9.uFIz4RtKOqKarMr1AY0gpcgJ/7v73pu', '0', '1', NULL, NULL, NULL),
(244, 'abc', 'abcd@gm', NULL, '$2y$10$dY2IA.AJonJ4ah4WWUg05ObyU0SQPJclwLbMIncx2W0bywmOgDpQK', '1', '0', NULL, '2023-06-04 01:38:08', '2023-06-04 01:38:08'),
(243, 'Gannon Giles', 'xazatihyx@mailinator.com', NULL, '$2y$10$iHcgufteUcd.UD.81IfByexb5VlNmRHrZJ6WwLPnDNbBeXaC758QG', '2', '0', NULL, '2023-06-03 12:48:42', '2023-06-03 12:48:42'),
(242, 'Cameran Nieves', 'kudovo@mailinator.com', NULL, '$2y$10$N9ygTkHqE1o80jLc0FLZw.jQq3EliZgNs0IeF04XooSZtmXfOvabq', '1', '0', NULL, '2023-06-03 12:43:34', '2023-06-03 12:43:34');

-- --------------------------------------------------------

--
-- Table structure for table `user_school_institute`
--

DROP TABLE IF EXISTS `user_school_institute`;
CREATE TABLE IF NOT EXISTS `user_school_institute` (
  `user_school_institute_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `r_entity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `r_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `r_contact_person` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `r_mob` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_school_institute_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_school_institute`
--

INSERT INTO `user_school_institute` (`user_school_institute_id`, `r_entity`, `r_name`, `r_contact_person`, `r_mob`, `address`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Institute', 'Cameran Nieves', 'Quis cillum perspici', '8585857485', 'Ut vero aperiam null', '242', '2023-06-03 12:43:34', '2023-06-03 12:43:34'),
(2, 'School', 'abc', 'abcd', '2312312312', 'Amravati, Maharashtra, India', '244', '2023-06-04 01:38:08', '2023-06-04 01:38:08');

-- --------------------------------------------------------

--
-- Table structure for table `user_school_institute_detail`
--

DROP TABLE IF EXISTS `user_school_institute_detail`;
CREATE TABLE IF NOT EXISTS `user_school_institute_detail` (
  `school_institute_detail_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `entity_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pin_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oprating_since` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registration_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entity_select` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mob` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `yt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course` varchar(1024) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opening_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `closing_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facilities` varchar(1024) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(1024) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(1024) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subscription_status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`school_institute_detail_id`),
  KEY `school_institute_detail_user_school_institute_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_school_institute_detail`
--

INSERT INTO `user_school_institute_detail` (`school_institute_detail_id`, `entity_name`, `address`, `about`, `pin_code`, `oprating_since`, `registration_no`, `entity_select`, `mob`, `email`, `website`, `fb`, `insta`, `google`, `yt`, `course`, `opening_time`, `closing_time`, `facilities`, `image`, `video`, `user_id`, `logo`, `subscription_status`, `created_at`, `updated_at`) VALUES
(1, 'Cameran Nieves', 'Ut vero aperiam null', 'lorem asdasdasdasd asdasdasd', '444525', '2008', NULL, 'Select', '8585857485', 'kudovo@mailinator.com', NULL, NULL, NULL, NULL, NULL, '[\"Yoga\"]', NULL, NULL, '[\"Classrooms\"]', NULL, NULL, 242, 'database_files/school_institute/logo/', 0, '2023-06-03 12:45:38', '2023-06-03 12:45:38'),
(2, 'abc', 'ama', 'dghhdgfhghfjhgjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', '431001', '2013', NULL, 'CBSC', '2312312312', 'abcd@gm', NULL, NULL, NULL, NULL, NULL, '[\"Select Cources\",\"1Nursery\",\"Primary\",\"Junior KG\",\"4th Standard\"]', NULL, NULL, '[\"Select Facilities\",\"Digital classroom\",\"A\\/c classroom\",\"Library\",\"Computer Lab\"]', '[\"database_files\\/school_institute\\/photo\\/1685863041.png\"]', NULL, 244, 'database_files/school_institute/logo/', 0, '2023-06-04 01:47:21', '2023-06-04 01:47:21');

-- --------------------------------------------------------

--
-- Table structure for table `user_student`
--

DROP TABLE IF EXISTS `user_student`;
CREATE TABLE IF NOT EXISTS `user_student` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `r_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `r_current_school_institute` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mob` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_student_detail`
--

DROP TABLE IF EXISTS `user_student_detail`;
CREATE TABLE IF NOT EXISTS `user_student_detail` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mob` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pin_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_tutor`
--

DROP TABLE IF EXISTS `user_tutor`;
CREATE TABLE IF NOT EXISTS `user_tutor` (
  `user_tutor_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `r_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mob` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_tutor_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_tutor`
--

INSERT INTO `user_tutor` (`user_tutor_id`, `r_name`, `mob`, `address`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Gannon Giles', '8585858585', 'Placeat alias nobis', 243, '2023-06-03 12:48:42', '2023-06-03 12:48:42');

-- --------------------------------------------------------

--
-- Table structure for table `user_tutor_detail`
--

DROP TABLE IF EXISTS `user_tutor_detail`;
CREATE TABLE IF NOT EXISTS `user_tutor_detail` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experiance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mob` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pin_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `declaration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subscription_status` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_tutor_detail`
--

INSERT INTO `user_tutor_detail` (`id`, `name`, `subject`, `experiance`, `mob`, `job_type`, `email`, `address`, `pin_code`, `declaration`, `subscription_status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Gannon Giles', 'wdaw', '4', '8585858585', 'Select', 'xazatihyx@mailinator.com', 'Placeat alias nobis', '444555', NULL, 0, 243, '2023-06-03 12:49:13', '2023-06-03 12:49:13');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
