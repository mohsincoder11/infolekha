-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jun 14, 2023 at 05:03 AM
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
  `college_id` int(11) NOT NULL,
  `city_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Pending','Rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advertisements`
--

INSERT INTO `advertisements` (`id`, `college_id`, `city_id`, `banner_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, '1', '1682397591.png', 'Pending', '2023-04-25 11:32:41', '2023-04-25 11:39:51'),
(3, 0, '3', '1682398819.png', 'Pending', '2023-04-25 12:00:19', '2023-04-25 12:00:19'),
(4, 0, '3', '1682398819.png', 'Pending', '2023-04-25 12:00:19', '2023-04-25 12:00:19'),
(5, 0, '5', '1682399218.png', 'Pending', '2023-04-25 12:00:36', '2023-04-25 12:06:58');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

DROP TABLE IF EXISTS `announcements`;
CREATE TABLE IF NOT EXISTS `announcements` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `plan_id` int(11) DEFAULT NULL COMMENT 'selected plan',
  `college_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `heading` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Pending','Active',' Rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `plan_id`, `college_id`, `city_id`, `start_date`, `end_date`, `heading`, `image`, `main_content`, `status`, `created_at`, `updated_at`) VALUES
(9, 0, 251, 1, '2023-06-01', '2023-06-05', 'College Event 1', 'images/95311685818087.png', 'Welcome to XYZ School, a vibrant learning community dedicated to nurturing students\' academic and personal growth. With a supportive faculty and state-of-the-art facilities, we offer a comprehensive curriculum that encourages critical thinking, creativity, and collaboration. Our school fosters a positive and inclusive environment where students can thrive and explore their passions. Join us in shaping the leaders of tomorrow', 'Active', NULL, NULL),
(10, 0, 251, 2, '2023-06-10', '2023-06-12', 'College Event 2', 'image2.jpg', 'Main content 2', 'Pending', NULL, NULL),
(11, 0, 103, 606, '2023-06-15', '2023-06-18', 'College Event 3', 'image3.jpg', 'Main content 3', 'Active', NULL, NULL),
(12, 0, 104, 1, '2023-06-20', '2023-06-25', 'College Event 4', 'image4.jpg', 'Main content 4', 'Active', NULL, NULL),
(13, 0, 105, 2, '2023-06-27', '2023-06-30', 'College Event 5', 'image5.jpg', 'Main content 5', 'Active', NULL, NULL),
(14, 0, 101, 3, '2023-07-05', '2023-07-10', 'College Event 6', 'image6.jpg', 'Main content 6', 'Active', NULL, NULL),
(15, 0, 102, 1, '2023-07-15', '2023-07-20', 'College Event 7', 'image7.jpg', 'Main content 7', ' Rejected', NULL, NULL),
(16, 0, 103, 2, '2023-07-22', '2023-07-25', 'College Event 8', 'image8.jpg', 'Main content 8', 'Active', NULL, NULL),
(17, 0, 104, 3, '2023-07-30', '2023-08-03', 'College Event 9', 'image9.jpg', 'Main content 9', 'Active', NULL, NULL),
(18, 0, 105, 1, '2023-08-05', '2023-08-08', 'College Event 10', 'image10.jpg', 'Main content 10', 'Active', NULL, NULL),
(19, NULL, 251, 315, NULL, NULL, 'Accusamus id tempori', 'public/announcement/WcLSgh8VdRKY5Eq1rmbhUYBssBUPmr9LaDdZclC9.png', 'Tempora deserunt accTempora deserunt accTempora deserunt accTempora deserunt accTempora deserunt accTempora deserunt accTempora deserunt accTempora deserunt acc', 'Pending', '2023-06-11 12:43:28', '2023-06-11 12:43:28'),
(20, NULL, 251, 315, NULL, NULL, 'Ipsum totam enim ea', '/announcement/1686507323.png', 'Non libero enim obca\r\nNon libero enim obcaNon libero enim obca', 'Active', '2023-06-11 12:45:23', '2023-06-11 12:45:23'),
(21, NULL, 251, 315, NULL, NULL, 'gfgfgf', '/announcement/1686658379.png', 'hgfggh', 'Pending', '2023-06-13 06:42:59', '2023-06-13 06:42:59');

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
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=610 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city`, `created_at`, `updated_at`) VALUES
(2, 'South Andaman', NULL, NULL),
(1, 'North and Middle Andaman', NULL, NULL),
(3, 'Nicobar', NULL, NULL),
(4, 'Adilabad', NULL, NULL),
(5, 'Anantapur', NULL, NULL),
(6, 'Chittoor', NULL, NULL),
(7, 'East Godavari', NULL, NULL),
(8, 'Guntur', NULL, NULL),
(9, 'Hyderabad', NULL, NULL),
(10, 'Kadapa', NULL, NULL),
(11, 'Karimnagar', NULL, NULL),
(12, 'Khammam', NULL, NULL),
(13, 'Krishna', NULL, NULL),
(14, 'Kurnool', NULL, NULL),
(15, 'Mahbubnagar', NULL, NULL),
(16, 'Medak', NULL, NULL),
(17, 'Nalgonda', NULL, NULL),
(18, 'Nellore', NULL, NULL),
(19, 'Nizamabad', NULL, NULL),
(20, 'Prakasam', NULL, NULL),
(21, 'Rangareddi', NULL, NULL),
(22, 'Srikakulam', NULL, NULL),
(23, 'Vishakhapatnam', NULL, NULL),
(24, 'Vizianagaram', NULL, NULL),
(25, 'Warangal', NULL, NULL),
(26, 'West Godavari', NULL, NULL),
(27, 'Anjaw', NULL, NULL),
(28, 'Changlang', NULL, NULL),
(29, 'East Kameng', NULL, NULL),
(30, 'Lohit', NULL, NULL),
(31, 'Lower Subansiri', NULL, NULL),
(32, 'Papum Pare', NULL, NULL),
(33, 'Tirap', NULL, NULL),
(34, 'Dibang Valley', NULL, NULL),
(35, 'Upper Subansiri', NULL, NULL),
(36, 'West Kameng', NULL, NULL),
(37, 'Barpeta', NULL, NULL),
(38, 'Bongaigaon', NULL, NULL),
(39, 'Cachar', NULL, NULL),
(40, 'Darrang', NULL, NULL),
(41, 'Dhemaji', NULL, NULL),
(42, 'Dhubri', NULL, NULL),
(43, 'Dibrugarh', NULL, NULL),
(44, 'Goalpara', NULL, NULL),
(45, 'Golaghat', NULL, NULL),
(46, 'Hailakandi', NULL, NULL),
(47, 'Jorhat', NULL, NULL),
(48, 'Karbi Anglong', NULL, NULL),
(49, 'Karimganj', NULL, NULL),
(50, 'Kokrajhar', NULL, NULL),
(51, 'Lakhimpur', NULL, NULL),
(52, 'Marigaon', NULL, NULL),
(53, 'Nagaon', NULL, NULL),
(54, 'Nalbari', NULL, NULL),
(55, 'North Cachar Hills', NULL, NULL),
(56, 'Sibsagar', NULL, NULL),
(57, 'Sonitpur', NULL, NULL),
(58, 'Tinsukia', NULL, NULL),
(59, 'Araria', NULL, NULL),
(60, 'Aurangabad', NULL, NULL),
(61, 'Banka', NULL, NULL),
(62, 'Begusarai', NULL, NULL),
(63, 'Bhagalpur', NULL, NULL),
(64, 'Bhojpur', NULL, NULL),
(65, 'Buxar', NULL, NULL),
(66, 'Darbhanga', NULL, NULL),
(67, 'Purba Champaran', NULL, NULL),
(68, 'Gaya', NULL, NULL),
(69, 'Gopalganj', NULL, NULL),
(70, 'Jamui', NULL, NULL),
(71, 'Jehanabad', NULL, NULL),
(72, 'Khagaria', NULL, NULL),
(73, 'Kishanganj', NULL, NULL),
(74, 'Kaimur', NULL, NULL),
(75, 'Katihar', NULL, NULL),
(76, 'Lakhisarai', NULL, NULL),
(77, 'Madhubani', NULL, NULL),
(78, 'Munger', NULL, NULL),
(79, 'Madhepura', NULL, NULL),
(80, 'Muzaffarpur', NULL, NULL),
(81, 'Nalanda', NULL, NULL),
(82, 'Nawada', NULL, NULL),
(83, 'Patna', NULL, NULL),
(84, 'Purnia', NULL, NULL),
(85, 'Rohtas', NULL, NULL),
(86, 'Saharsa', NULL, NULL),
(87, 'Samastipur', NULL, NULL),
(88, 'Sheohar', NULL, NULL),
(89, 'Sheikhpura', NULL, NULL),
(90, 'Saran', NULL, NULL),
(91, 'Sitamarhi', NULL, NULL),
(92, 'Supaul', NULL, NULL),
(93, 'Siwan', NULL, NULL),
(94, 'Vaishali', NULL, NULL),
(95, 'Pashchim Champaran', NULL, NULL),
(96, 'Bastar', NULL, NULL),
(97, 'Bilaspur', NULL, NULL),
(98, 'Dantewada', NULL, NULL),
(99, 'Dhamtari', NULL, NULL),
(100, 'Durg', NULL, NULL),
(101, 'Jashpur', NULL, NULL),
(102, 'Janjgir-Champa', NULL, NULL),
(103, 'Korba', NULL, NULL),
(104, 'Koriya', NULL, NULL),
(105, 'Kanker', NULL, NULL),
(106, 'Kawardha', NULL, NULL),
(107, 'Mahasamund', NULL, NULL),
(108, 'Raigarh', NULL, NULL),
(109, 'Rajnandgaon', NULL, NULL),
(110, 'Raipur', NULL, NULL),
(111, 'Surguja', NULL, NULL),
(112, 'Diu', NULL, NULL),
(113, 'Daman', NULL, NULL),
(114, 'Central Delhi', NULL, NULL),
(115, 'East Delhi', NULL, NULL),
(116, 'New Delhi', NULL, NULL),
(117, 'North Delhi', NULL, NULL),
(118, 'North East Delhi', NULL, NULL),
(119, 'North West Delhi', NULL, NULL),
(120, 'South Delhi', NULL, NULL),
(121, 'South West Delhi', NULL, NULL),
(122, 'West Delhi', NULL, NULL),
(123, 'North Goa', NULL, NULL),
(124, 'South Goa', NULL, NULL),
(125, 'Ahmedabad', NULL, NULL),
(126, 'Amreli District', NULL, NULL),
(127, 'Anand', NULL, NULL),
(128, 'Banaskantha', NULL, NULL),
(129, 'Bharuch', NULL, NULL),
(130, 'Bhavnagar', NULL, NULL),
(131, 'Dahod', NULL, NULL),
(132, 'The Dangs', NULL, NULL),
(133, 'Gandhinagar', NULL, NULL),
(134, 'Jamnagar', NULL, NULL),
(135, 'Junagadh', NULL, NULL),
(136, 'Kutch', NULL, NULL),
(137, 'Kheda', NULL, NULL),
(138, 'Mehsana', NULL, NULL),
(139, 'Narmada', NULL, NULL),
(140, 'Navsari', NULL, NULL),
(141, 'Patan', NULL, NULL),
(142, 'Panchmahal', NULL, NULL),
(143, 'Porbandar', NULL, NULL),
(144, 'Rajkot', NULL, NULL),
(145, 'Sabarkantha', NULL, NULL),
(146, 'Surendranagar', NULL, NULL),
(147, 'Surat', NULL, NULL),
(148, 'Vadodara', NULL, NULL),
(149, 'Valsad', NULL, NULL),
(150, 'Ambala', NULL, NULL),
(151, 'Bhiwani', NULL, NULL),
(152, 'Faridabad', NULL, NULL),
(153, 'Fatehabad', NULL, NULL),
(154, 'Gurgaon', NULL, NULL),
(155, 'Hissar', NULL, NULL),
(156, 'Jhajjar', NULL, NULL),
(157, 'Jind', NULL, NULL),
(158, 'Karnal', NULL, NULL),
(159, 'Kaithal', NULL, NULL),
(160, 'Kurukshetra', NULL, NULL),
(161, 'Mahendragarh', NULL, NULL),
(162, 'Mewat', NULL, NULL),
(163, 'Panchkula', NULL, NULL),
(164, 'Panipat', NULL, NULL),
(165, 'Rewari', NULL, NULL),
(166, 'Rohtak', NULL, NULL),
(167, 'Sirsa', NULL, NULL),
(168, 'Sonepat', NULL, NULL),
(169, 'Yamuna Nagar', NULL, NULL),
(170, 'Palwal', NULL, NULL),
(171, 'Bilaspur', NULL, NULL),
(172, 'Chamba', NULL, NULL),
(173, 'Hamirpur', NULL, NULL),
(174, 'Kangra', NULL, NULL),
(175, 'Kinnaur', NULL, NULL),
(176, 'Kulu', NULL, NULL),
(177, 'Lahaul and Spiti', NULL, NULL),
(178, 'Mandi', NULL, NULL),
(179, 'Shimla', NULL, NULL),
(180, 'Sirmaur', NULL, NULL),
(181, 'Solan', NULL, NULL),
(182, 'Una', NULL, NULL),
(183, 'Anantnag', NULL, NULL),
(184, 'Badgam', NULL, NULL),
(185, 'Bandipore', NULL, NULL),
(186, 'Baramula', NULL, NULL),
(187, 'Doda', NULL, NULL),
(188, 'Jammu', NULL, NULL),
(189, 'Kargil', NULL, NULL),
(190, 'Kathua', NULL, NULL),
(191, 'Kupwara', NULL, NULL),
(192, 'Leh', NULL, NULL),
(193, 'Poonch', NULL, NULL),
(194, 'Pulwama', NULL, NULL),
(195, 'Rajauri', NULL, NULL),
(196, 'Srinagar', NULL, NULL),
(197, 'Samba', NULL, NULL),
(198, 'Udhampur', NULL, NULL),
(199, 'Bokaro', NULL, NULL),
(200, 'Chatra', NULL, NULL),
(201, 'Deoghar', NULL, NULL),
(202, 'Dhanbad', NULL, NULL),
(203, 'Dumka', NULL, NULL),
(204, 'Purba Singhbhum', NULL, NULL),
(205, 'Garhwa', NULL, NULL),
(206, 'Giridih', NULL, NULL),
(207, 'Godda', NULL, NULL),
(208, 'Gumla', NULL, NULL),
(209, 'Hazaribagh', NULL, NULL),
(210, 'Koderma', NULL, NULL),
(211, 'Lohardaga', NULL, NULL),
(212, 'Pakur', NULL, NULL),
(213, 'Palamu', NULL, NULL),
(214, 'Ranchi', NULL, NULL),
(215, 'Sahibganj', NULL, NULL),
(216, 'Seraikela and Kharsawan', NULL, NULL),
(217, 'Pashchim Singhbhum', NULL, NULL),
(218, 'Ramgarh', NULL, NULL),
(219, 'Bidar', NULL, NULL),
(220, 'Belgaum', NULL, NULL),
(221, 'Bijapur', NULL, NULL),
(222, 'Bagalkot', NULL, NULL),
(223, 'Bellary', NULL, NULL),
(224, 'Bangalore Rural District', NULL, NULL),
(225, 'Bangalore Urban District', NULL, NULL),
(226, 'Chamarajnagar', NULL, NULL),
(227, 'Chikmagalur', NULL, NULL),
(228, 'Chitradurga', NULL, NULL),
(229, 'Davanagere', NULL, NULL),
(230, 'Dharwad', NULL, NULL),
(231, 'Dakshina Kannada', NULL, NULL),
(232, 'Gadag', NULL, NULL),
(233, 'Gulbarga', NULL, NULL),
(234, 'Hassan', NULL, NULL),
(235, 'Haveri District', NULL, NULL),
(236, 'Kodagu', NULL, NULL),
(237, 'Kolar', NULL, NULL),
(238, 'Koppal', NULL, NULL),
(239, 'Mandya', NULL, NULL),
(240, 'Mysore', NULL, NULL),
(241, 'Raichur', NULL, NULL),
(242, 'Shimoga', NULL, NULL),
(243, 'Tumkur', NULL, NULL),
(244, 'Udupi', NULL, NULL),
(245, 'Uttara Kannada', NULL, NULL),
(246, 'Ramanagara', NULL, NULL),
(247, 'Chikballapur', NULL, NULL),
(248, 'Yadagiri', NULL, NULL),
(249, 'Alappuzha', NULL, NULL),
(250, 'Ernakulam', NULL, NULL),
(251, 'Idukki', NULL, NULL),
(252, 'Kollam', NULL, NULL),
(253, 'Kannur', NULL, NULL),
(254, 'Kasaragod', NULL, NULL),
(255, 'Kottayam', NULL, NULL),
(256, 'Kozhikode', NULL, NULL),
(257, 'Malappuram', NULL, NULL),
(258, 'Palakkad', NULL, NULL),
(259, 'Pathanamthitta', NULL, NULL),
(260, 'Thrissur', NULL, NULL),
(261, 'Thiruvananthapuram', NULL, NULL),
(262, 'Wayanad', NULL, NULL),
(263, 'Alirajpur', NULL, NULL),
(264, 'Anuppur', NULL, NULL),
(265, 'Ashok Nagar', NULL, NULL),
(266, 'Balaghat', NULL, NULL),
(267, 'Barwani', NULL, NULL),
(268, 'Betul', NULL, NULL),
(269, 'Bhind', NULL, NULL),
(270, 'Bhopal', NULL, NULL),
(271, 'Burhanpur', NULL, NULL),
(272, 'Chhatarpur', NULL, NULL),
(273, 'Chhindwara', NULL, NULL),
(274, 'Damoh', NULL, NULL),
(275, 'Datia', NULL, NULL),
(276, 'Dewas', NULL, NULL),
(277, 'Dhar', NULL, NULL),
(278, 'Dindori', NULL, NULL),
(279, 'Guna', NULL, NULL),
(280, 'Gwalior', NULL, NULL),
(281, 'Harda', NULL, NULL),
(282, 'Hoshangabad', NULL, NULL),
(283, 'Indore', NULL, NULL),
(284, 'Jabalpur', NULL, NULL),
(285, 'Jhabua', NULL, NULL),
(286, 'Katni', NULL, NULL),
(287, 'Khandwa', NULL, NULL),
(288, 'Khargone', NULL, NULL),
(289, 'Mandla', NULL, NULL),
(290, 'Mandsaur', NULL, NULL),
(291, 'Morena', NULL, NULL),
(292, 'Narsinghpur', NULL, NULL),
(293, 'Neemuch', NULL, NULL),
(294, 'Panna', NULL, NULL),
(295, 'Rewa', NULL, NULL),
(296, 'Rajgarh', NULL, NULL),
(297, 'Ratlam', NULL, NULL),
(298, 'Raisen', NULL, NULL),
(299, 'Sagar', NULL, NULL),
(300, 'Satna', NULL, NULL),
(301, 'Sehore', NULL, NULL),
(302, 'Seoni', NULL, NULL),
(303, 'Shahdol', NULL, NULL),
(304, 'Shajapur', NULL, NULL),
(305, 'Sheopur', NULL, NULL),
(306, 'Shivpuri', NULL, NULL),
(307, 'Sidhi', NULL, NULL),
(308, 'Singrauli', NULL, NULL),
(309, 'Tikamgarh', NULL, NULL),
(310, 'Ujjain', NULL, NULL),
(311, 'Umaria', NULL, NULL),
(312, 'Vidisha', NULL, NULL),
(313, 'Ahmednagar', NULL, NULL),
(314, 'Akola', NULL, NULL),
(315, 'Amravati', NULL, NULL),
(316, 'Aurangabad', NULL, NULL),
(317, 'Bhandara', NULL, NULL),
(318, 'Beed', NULL, NULL),
(319, 'Buldhana', NULL, NULL),
(320, 'Chandrapur', NULL, NULL),
(321, 'Dhule', NULL, NULL),
(322, 'Gadchiroli', NULL, NULL),
(323, 'Gondiya', NULL, NULL),
(324, 'Hingoli', NULL, NULL),
(325, 'Jalgaon', NULL, NULL),
(326, 'Jalna', NULL, NULL),
(327, 'Kolhapur', NULL, NULL),
(328, 'Latur', NULL, NULL),
(329, 'Mumbai City', NULL, NULL),
(330, 'Mumbai suburban', NULL, NULL),
(331, 'Nandurbar', NULL, NULL),
(332, 'Nanded', NULL, NULL),
(333, 'Nagpur', NULL, NULL),
(334, 'Nashik', NULL, NULL),
(335, 'Osmanabad', NULL, NULL),
(336, 'Parbhani', NULL, NULL),
(337, 'Pune', NULL, NULL),
(338, 'Raigad', NULL, NULL),
(339, 'Ratnagiri', NULL, NULL),
(340, 'Sindhudurg', NULL, NULL),
(341, 'Sangli', NULL, NULL),
(342, 'Solapur', NULL, NULL),
(343, 'Satara', NULL, NULL),
(344, 'Thane', NULL, NULL),
(345, 'Wardha', NULL, NULL),
(346, 'Washim', NULL, NULL),
(347, 'Yavatmal', NULL, NULL),
(348, 'Bishnupur', NULL, NULL),
(349, 'Churachandpur', NULL, NULL),
(350, 'Chandel', NULL, NULL),
(351, 'Imphal East', NULL, NULL),
(352, 'Senapati', NULL, NULL),
(353, 'Tamenglong', NULL, NULL),
(354, 'Thoubal', NULL, NULL),
(355, 'Ukhrul', NULL, NULL),
(356, 'Imphal West', NULL, NULL),
(357, 'East Garo Hills', NULL, NULL),
(358, 'East Khasi Hills', NULL, NULL),
(359, 'Jaintia Hills', NULL, NULL),
(360, 'Ri-Bhoi', NULL, NULL),
(361, 'South Garo Hills', NULL, NULL),
(362, 'West Garo Hills', NULL, NULL),
(363, 'West Khasi Hills', NULL, NULL),
(364, 'Aizawl', NULL, NULL),
(365, 'Champhai', NULL, NULL),
(366, 'Kolasib', NULL, NULL),
(367, 'Lawngtlai', NULL, NULL),
(368, 'Lunglei', NULL, NULL),
(369, 'Mamit', NULL, NULL),
(370, 'Saiha', NULL, NULL),
(371, 'Serchhip', NULL, NULL),
(372, 'Dimapur', NULL, NULL),
(373, 'Kohima', NULL, NULL),
(374, 'Mokokchung', NULL, NULL),
(375, 'Mon', NULL, NULL),
(376, 'Phek', NULL, NULL),
(377, 'Tuensang', NULL, NULL),
(378, 'Wokha', NULL, NULL),
(379, 'Zunheboto', NULL, NULL),
(380, 'Angul', NULL, NULL),
(381, 'Boudh', NULL, NULL),
(382, 'Bhadrak', NULL, NULL),
(383, 'Bolangir', NULL, NULL),
(384, 'Bargarh', NULL, NULL),
(385, 'Baleswar', NULL, NULL),
(386, 'Cuttack', NULL, NULL),
(387, 'Debagarh', NULL, NULL),
(388, 'Dhenkanal', NULL, NULL),
(389, 'Ganjam', NULL, NULL),
(390, 'Gajapati', NULL, NULL),
(391, 'Jharsuguda', NULL, NULL),
(392, 'Jajapur', NULL, NULL),
(393, 'Jagatsinghpur', NULL, NULL),
(394, 'Khordha', NULL, NULL),
(395, 'Kendujhar', NULL, NULL),
(396, 'Kalahandi', NULL, NULL),
(397, 'Kandhamal', NULL, NULL),
(398, 'Koraput', NULL, NULL),
(399, 'Kendrapara', NULL, NULL),
(400, 'Malkangiri', NULL, NULL),
(401, 'Mayurbhanj', NULL, NULL),
(402, 'Nabarangpur', NULL, NULL),
(403, 'Nuapada', NULL, NULL),
(404, 'Nayagarh', NULL, NULL),
(405, 'Puri', NULL, NULL),
(406, 'Rayagada', NULL, NULL),
(407, 'Sambalpur', NULL, NULL),
(408, 'Subarnapur', NULL, NULL),
(409, 'Sundargarh', NULL, NULL),
(410, 'Karaikal', NULL, NULL),
(411, 'Mahe', NULL, NULL),
(412, 'Puducherry', NULL, NULL),
(413, 'Yanam', NULL, NULL),
(414, 'Amritsar', NULL, NULL),
(415, 'Bathinda', NULL, NULL),
(416, 'Firozpur', NULL, NULL),
(417, 'Faridkot', NULL, NULL),
(418, 'Fatehgarh Sahib', NULL, NULL),
(419, 'Gurdaspur', NULL, NULL),
(420, 'Hoshiarpur', NULL, NULL),
(421, 'Jalandhar', NULL, NULL),
(422, 'Kapurthala', NULL, NULL),
(423, 'Ludhiana', NULL, NULL),
(424, 'Mansa', NULL, NULL),
(425, 'Moga', NULL, NULL),
(426, 'Mukatsar', NULL, NULL),
(427, 'Nawan Shehar', NULL, NULL),
(428, 'Patiala', NULL, NULL),
(429, 'Rupnagar', NULL, NULL),
(430, 'Sangrur', NULL, NULL),
(431, 'Ajmer', NULL, NULL),
(432, 'Alwar', NULL, NULL),
(433, 'Bikaner', NULL, NULL),
(434, 'Barmer', NULL, NULL),
(435, 'Banswara', NULL, NULL),
(436, 'Bharatpur', NULL, NULL),
(437, 'Baran', NULL, NULL),
(438, 'Bundi', NULL, NULL),
(439, 'Bhilwara', NULL, NULL),
(440, 'Churu', NULL, NULL),
(441, 'Chittorgarh', NULL, NULL),
(442, 'Dausa', NULL, NULL),
(443, 'Dholpur', NULL, NULL),
(444, 'Dungapur', NULL, NULL),
(445, 'Ganganagar', NULL, NULL),
(446, 'Hanumangarh', NULL, NULL),
(447, 'Juhnjhunun', NULL, NULL),
(448, 'Jalore', NULL, NULL),
(449, 'Jodhpur', NULL, NULL),
(450, 'Jaipur', NULL, NULL),
(451, 'Jaisalmer', NULL, NULL),
(452, 'Jhalawar', NULL, NULL),
(453, 'Karauli', NULL, NULL),
(454, 'Kota', NULL, NULL),
(455, 'Nagaur', NULL, NULL),
(456, 'Pali', NULL, NULL),
(457, 'Pratapgarh', NULL, NULL),
(458, 'Rajsamand', NULL, NULL),
(459, 'Sikar', NULL, NULL),
(460, 'Sawai Madhopur', NULL, NULL),
(461, 'Sirohi', NULL, NULL),
(462, 'Tonk', NULL, NULL),
(463, 'Udaipur', NULL, NULL),
(464, 'East Sikkim', NULL, NULL),
(465, 'North Sikkim', NULL, NULL),
(466, 'South Sikkim', NULL, NULL),
(467, 'West Sikkim', NULL, NULL),
(468, 'Ariyalur', NULL, NULL),
(469, 'Chennai', NULL, NULL),
(470, 'Coimbatore', NULL, NULL),
(471, 'Cuddalore', NULL, NULL),
(472, 'Dharmapuri', NULL, NULL),
(473, 'Dindigul', NULL, NULL),
(474, 'Erode', NULL, NULL),
(475, 'Kanchipuram', NULL, NULL),
(476, 'Kanyakumari', NULL, NULL),
(477, 'Karur', NULL, NULL),
(478, 'Madurai', NULL, NULL),
(479, 'Nagapattinam', NULL, NULL),
(480, 'The Nilgiris', NULL, NULL),
(481, 'Namakkal', NULL, NULL),
(482, 'Perambalur', NULL, NULL),
(483, 'Pudukkottai', NULL, NULL),
(484, 'Ramanathapuram', NULL, NULL),
(485, 'Salem', NULL, NULL),
(486, 'Sivagangai', NULL, NULL),
(487, 'Tiruppur', NULL, NULL),
(488, 'Tiruchirappalli', NULL, NULL),
(489, 'Theni', NULL, NULL),
(490, 'Tirunelveli', NULL, NULL),
(491, 'Thanjavur', NULL, NULL),
(492, 'Thoothukudi', NULL, NULL),
(493, 'Thiruvallur', NULL, NULL),
(494, 'Thiruvarur', NULL, NULL),
(495, 'Tiruvannamalai', NULL, NULL),
(496, 'Vellore', NULL, NULL),
(497, 'Villupuram', NULL, NULL),
(498, 'Dhalai', NULL, NULL),
(499, 'North Tripura', NULL, NULL),
(500, 'South Tripura', NULL, NULL),
(501, 'West Tripura', NULL, NULL),
(502, 'Almora', NULL, NULL),
(503, 'Bageshwar', NULL, NULL),
(504, 'Chamoli', NULL, NULL),
(505, 'Champawat', NULL, NULL),
(506, 'Dehradun', NULL, NULL),
(507, 'Haridwar', NULL, NULL),
(508, 'Nainital', NULL, NULL),
(509, 'Pauri Garhwal', NULL, NULL),
(510, 'Pithoragharh', NULL, NULL),
(511, 'Rudraprayag', NULL, NULL),
(512, 'Tehri Garhwal', NULL, NULL),
(513, 'Udham Singh Nagar', NULL, NULL),
(514, 'Uttarkashi', NULL, NULL),
(515, 'Agra', NULL, NULL),
(516, 'Allahabad', NULL, NULL),
(517, 'Aligarh', NULL, NULL),
(518, 'Ambedkar Nagar', NULL, NULL),
(519, 'Auraiya', NULL, NULL),
(520, 'Azamgarh', NULL, NULL),
(521, 'Barabanki', NULL, NULL),
(522, 'Badaun', NULL, NULL),
(523, 'Bagpat', NULL, NULL),
(524, 'Bahraich', NULL, NULL),
(525, 'Bijnor', NULL, NULL),
(526, 'Ballia', NULL, NULL),
(527, 'Banda', NULL, NULL),
(528, 'Balrampur', NULL, NULL),
(529, 'Bareilly', NULL, NULL),
(530, 'Basti', NULL, NULL),
(531, 'Bulandshahr', NULL, NULL),
(532, 'Chandauli', NULL, NULL),
(533, 'Chitrakoot', NULL, NULL),
(534, 'Deoria', NULL, NULL),
(535, 'Etah', NULL, NULL),
(536, 'Kanshiram Nagar', NULL, NULL),
(537, 'Etawah', NULL, NULL),
(538, 'Firozabad', NULL, NULL),
(539, 'Farrukhabad', NULL, NULL),
(540, 'Fatehpur', NULL, NULL),
(541, 'Faizabad', NULL, NULL),
(542, 'Gautam Buddha Nagar', NULL, NULL),
(543, 'Gonda', NULL, NULL),
(544, 'Ghazipur', NULL, NULL),
(545, 'Gorkakhpur', NULL, NULL),
(546, 'Ghaziabad', NULL, NULL),
(547, 'Hamirpur', NULL, NULL),
(548, 'Hardoi', NULL, NULL),
(549, 'Mahamaya Nagar', NULL, NULL),
(550, 'Jhansi', NULL, NULL),
(551, 'Jalaun', NULL, NULL),
(552, 'Jyotiba Phule Nagar', NULL, NULL),
(553, 'Jaunpur District', NULL, NULL),
(554, 'Kanpur Dehat', NULL, NULL),
(555, 'Kannauj', NULL, NULL),
(556, 'Kanpur Nagar', NULL, NULL),
(557, 'Kaushambi', NULL, NULL),
(558, 'Kushinagar', NULL, NULL),
(559, 'Lalitpur', NULL, NULL),
(560, 'Lakhimpur Kheri', NULL, NULL),
(561, 'Lucknow', NULL, NULL),
(562, 'Mau', NULL, NULL),
(563, 'Meerut', NULL, NULL),
(564, 'Maharajganj', NULL, NULL),
(565, 'Mahoba', NULL, NULL),
(566, 'Mirzapur', NULL, NULL),
(567, 'Moradabad', NULL, NULL),
(568, 'Mainpuri', NULL, NULL),
(569, 'Mathura', NULL, NULL),
(570, 'Muzaffarnagar', NULL, NULL),
(571, 'Pilibhit', NULL, NULL),
(572, 'Pratapgarh', NULL, NULL),
(573, 'Rampur', NULL, NULL),
(574, 'Rae Bareli', NULL, NULL),
(575, 'Saharanpur', NULL, NULL),
(576, 'Sitapur', NULL, NULL),
(577, 'Shahjahanpur', NULL, NULL),
(578, 'Sant Kabir Nagar', NULL, NULL),
(579, 'Siddharthnagar', NULL, NULL),
(580, 'Sonbhadra', NULL, NULL),
(581, 'Sant Ravidas Nagar', NULL, NULL),
(582, 'Sultanpur', NULL, NULL),
(583, 'Shravasti', NULL, NULL),
(584, 'Unnao', NULL, NULL),
(585, 'Varanasi', NULL, NULL),
(586, 'Birbhum', NULL, NULL),
(587, 'Bankura', NULL, NULL),
(588, 'Bardhaman', NULL, NULL),
(589, 'Darjeeling', NULL, NULL),
(590, 'Dakshin Dinajpur', NULL, NULL),
(591, 'Hooghly', NULL, NULL),
(592, 'Howrah', NULL, NULL),
(593, 'Jalpaiguri', NULL, NULL),
(594, 'Cooch Behar', NULL, NULL),
(595, 'Kolkata', NULL, NULL),
(596, 'Malda', NULL, NULL),
(597, 'Midnapore', NULL, NULL),
(598, 'Murshidabad', NULL, NULL),
(599, 'Nadia', NULL, NULL),
(600, 'North 24 Parganas', NULL, NULL),
(601, 'South 24 Parganas', NULL, NULL),
(602, 'Purulia', NULL, NULL),
(603, 'Uttar Dinajpur', NULL, NULL),
(604, 'Nala Sopara', '2023-06-08 13:19:42', '2023-06-08 13:19:42'),
(605, 'Amaravati', '2023-06-08 13:26:16', '2023-06-08 13:26:16'),
(606, 'Mumbai', '2023-06-08 22:03:55', '2023-06-08 22:03:55'),
(607, 'Chandur Bazar', '2023-06-08 22:06:07', '2023-06-08 22:06:07'),
(608, 'Nandura', '2023-06-08 22:08:24', '2023-06-08 22:08:24'),
(609, 'Chandur Railway', '2023-06-08 23:39:32', '2023-06-08 23:39:32');

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `entitys`
--

INSERT INTO `entitys` (`id`, `entity`, `created_at`, `updated_at`) VALUES
(5, 'College', NULL, NULL),
(4, 'School', NULL, NULL),
(6, 'Institute', NULL, NULL);

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
-- Table structure for table `job_vacancy`
--

DROP TABLE IF EXISTS `job_vacancy`;
CREATE TABLE IF NOT EXISTS `job_vacancy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `college_id` int(11) DEFAULT NULL,
  `vacancy_type` enum('admin','teaching') NOT NULL,
  `subject_name` varchar(255) DEFAULT NULL,
  `experience_required` float DEFAULT NULL,
  `skills_required` text DEFAULT NULL,
  `estimated_package` float DEFAULT NULL,
  `job_type` enum('Part Time','Full Time','Remote') DEFAULT NULL,
  `post` varchar(255) DEFAULT NULL,
  `scope_of_work` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `college_id` (`college_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_vacancy`
--

INSERT INTO `job_vacancy` (`id`, `college_id`, `vacancy_type`, `subject_name`, `experience_required`, `skills_required`, `estimated_package`, `job_type`, `post`, `scope_of_work`, `created_at`, `updated_at`) VALUES
(1, 251, 'teaching', 'enggg', 34, 'Velit illo ratione', 12500, 'Part Time', NULL, NULL, '2023-06-11 10:14:14', '2023-06-11 10:14:14'),
(3, 251, 'admin', NULL, 2, 'Et doloremque fugit', 34567, 'Remote', 'manager', 'lot to do', '2023-06-11 11:10:00', '2023-06-11 11:10:00');

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
-- Table structure for table `post_results`
--

DROP TABLE IF EXISTS `post_results`;
CREATE TABLE IF NOT EXISTS `post_results` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `college_id` int(11) NOT NULL,
  `file` varchar(100) NOT NULL,
  `start_year` year(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `end_year` year(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_results`
--

INSERT INTO `post_results` (`id`, `college_id`, `file`, `start_year`, `created_at`, `updated_at`, `end_year`) VALUES
(4, 251, '/school_result/1686493784.jpeg', 2019, '2023-06-11 08:59:44', '2023-06-11 08:59:44', 2018),
(2, 251, '/school_result/1686492834.avif', 2020, '2023-06-11 08:43:54', '2023-06-11 08:43:54', 2019),
(5, 251, '/school_result/1686658315.sql', 2023, '2023-06-13 06:41:55', '2023-06-13 06:41:55', 2022);

-- --------------------------------------------------------

--
-- Table structure for table `school_types`
--

DROP TABLE IF EXISTS `school_types`;
CREATE TABLE IF NOT EXISTS `school_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_types`
--

INSERT INTO `school_types` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'State Board', '2023-06-07 15:50:40', '2023-06-07 15:50:40'),
(2, 'CBSC', '2023-06-07 15:50:40', '2023-06-07 15:50:40'),
(3, 'ICSE', '2023-06-07 15:51:29', '2023-06-07 15:51:29');

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
(1, 'Jacob Hopkins', '8585858544', 'Est rerum eos et et', 242, 500, 1, 'I-LEKHA1685813427732', 'userCancelled', '2023-06-03 12:00:27', '2023-06-03 12:00:33'),
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
  `logo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `role` enum('0','1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0-admin,1-institute,2-tutor,3-student	',
  `active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=256 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `logo`, `city_id`, `role`, `active`, `remember_token`, `created_at`, `updated_at`) VALUES
(232, 'admin', 'admin@gmail.com', NULL, '$2y$10$ERIIYUGvHAxRQPrVCUSu9.uFIz4RtKOqKarMr1AY0gpcgJ/7v73pu', NULL, 0, '0', '1', 'bLJhWd54VlhrA3UHfXMX9oEefGFHk0ARsukeZ85uIk4Emt9wMyjdSN4TEAjb', NULL, NULL),
(251, 'Ganeshdas', 'school@gmail.com', NULL, '$2y$10$mCswGoV0.6v4MxZTV2lJzeg5uyEUSK7Gx0fnTjT2F91t6vU75WzZq', 'database_files/school_institute/logo/1686486385.avif', 315, '1', '1', NULL, '2023-06-07 10:15:01', '2023-06-13 06:32:02'),
(252, 'student', 'student@gmail.com', NULL, '$2y$10$XqV/P1O761Lppm8VvcZ8pOBdX2ztA4bWqFIfwA4wd5waiS9Qd9iF6', 'database_files/student/photo/1686480402.jpeg', 60, '3', '1', NULL, '2023-06-08 13:34:35', '2023-06-13 12:53:22'),
(253, 'vmv', 'college@gmail.com', NULL, '$2y$10$ikRn.SIBZCSmMEDeuRXEA.X8xZI8H.wHRv4FDlsGa.R6X5mOh4os.', 'icon/user.png', NULL, '1', '1', NULL, '2023-06-09 13:14:51', '2023-06-11 01:47:22'),
(254, 'patil', 'institute@gmail.com', NULL, '$2y$10$UewDoGj1w.VsEfIqoURdy.6n0fA4d/9UAbXt4oncCrISKiHJhKjx6', 'icon/user.png', NULL, '1', '1', NULL, '2023-06-10 13:10:18', '2023-06-11 02:17:18'),
(255, 'Leo Richards', 'jonupyzolo@mailinator.com', NULL, '$2y$10$meZVErjI2x3VLNf27OKsueGjLbdeHHN8Q0iAqiTjgz45FrHV4onmm', NULL, NULL, '1', '0', NULL, '2023-06-13 13:03:39', '2023-06-13 13:03:39');

-- --------------------------------------------------------

--
-- Table structure for table `user_enquiry`
--

DROP TABLE IF EXISTS `user_enquiry`;
CREATE TABLE IF NOT EXISTS `user_enquiry` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `college_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `college_id` (`college_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_enquiry`
--

INSERT INTO `user_enquiry` (`id`, `college_id`, `user_id`, `name`, `email`, `message`, `created_at`, `updated_at`) VALUES
(1, 244, 232, 'admin', 'admin@gmail.com', 'hello there', '2023-06-06 13:57:44', '2023-06-06 13:57:44'),
(2, 244, 232, 'admin', 'mohsinshaikh1104@gmail.com', 'new enquiry', '2023-06-06 13:58:06', '2023-06-06 13:58:06');

-- --------------------------------------------------------

--
-- Table structure for table `user_feedback`
--

DROP TABLE IF EXISTS `user_feedback`;
CREATE TABLE IF NOT EXISTS `user_feedback` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `college_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `rating` int(11) DEFAULT 0,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `college_id` (`college_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_feedback`
--

INSERT INTO `user_feedback` (`id`, `college_id`, `user_id`, `name`, `email`, `rating`, `comment`, `created_at`, `updated_at`) VALUES
(46, 251, 252, 'Jelani Norman', 'student@gmail.com', 5, NULL, '2023-06-10 08:08:57', '2023-06-10 08:08:57'),
(47, 251, 252, 'Julie Rhodes', 'saruzuno@mailinator.com', 2, 'sasdasd', '2023-06-10 08:39:28', '2023-06-10 08:39:28'),
(48, 251, 252, 'Jelani Norman', 'student@gmail.com', 5, 'asdasda', '2023-06-10 08:39:35', '2023-06-10 08:39:35'),
(44, 251, 252, 'Jelani Norman', 'student@gmail.com', 1, NULL, '2023-06-10 07:19:26', '2023-06-10 07:19:26'),
(45, 251, 252, 'Jelani Norman', 'student@gmail.com', 3, 'hello there it is 3rd review rating', '2023-06-10 07:46:46', '2023-06-10 07:46:46'),
(43, 251, 252, 'Jelani Norman', 'student@gmail.com', 1, NULL, '2023-06-10 07:18:24', '2023-06-10 07:18:24');

-- --------------------------------------------------------

--
-- Table structure for table `user_likes`
--

DROP TABLE IF EXISTS `user_likes`;
CREATE TABLE IF NOT EXISTS `user_likes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `college_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'school college id',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`,`college_id`),
  KEY `college_id` (`college_id`)
) ENGINE=MyISAM AUTO_INCREMENT=97 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_likes`
--

INSERT INTO `user_likes` (`id`, `user_id`, `college_id`, `created_at`, `updated_at`) VALUES
(64, 232, 242, '2023-06-06 14:15:39', '2023-06-06 14:15:39'),
(65, 232, 244, '2023-06-06 14:15:41', '2023-06-06 14:15:41'),
(69, 249, 244, '2023-06-06 23:25:19', '2023-06-06 23:25:19'),
(72, 252, 253, '2023-06-07 08:13:28', '2023-06-07 08:13:28');

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_school_institute`
--

INSERT INTO `user_school_institute` (`user_school_institute_id`, `r_entity`, `r_name`, `r_contact_person`, `r_mob`, `address`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'School', 'Ganeshdas rathi mahavidyalay', 'Voluptatem Cupidita', '8585858585', 'Pravin Nagar Amravati, Maharashtra', '251', '2023-06-07 10:15:01', '2023-06-07 10:15:01'),
(2, 'College', 'VMV college od science', 'Basia Mejia', '7385078839', 'Ravi Nagar Amravati, Maharashtra', '253', '2023-06-09 13:14:51', '2023-06-09 13:14:51'),
(3, 'Institute', 'Patil coaching classes of science', 'Earum sunt quas esse', '8574147857', 'Et aliqua Cum in vo', '254', '2023-06-10 13:10:18', '2023-06-11 02:23:31'),
(4, 'Institute', 'Leo Richards', 'Natus maiores unde i', '7485222222', 'Sequi nihil non exer', '255', '2023-06-13 13:03:39', '2023-06-13 13:03:39');

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
  `subscription_status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`school_institute_detail_id`),
  KEY `school_institute_detail_user_school_institute_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_school_institute_detail`
--

INSERT INTO `user_school_institute_detail` (`school_institute_detail_id`, `entity_name`, `address`, `about`, `pin_code`, `oprating_since`, `registration_no`, `entity_select`, `mob`, `email`, `website`, `fb`, `insta`, `google`, `yt`, `course`, `opening_time`, `closing_time`, `facilities`, `image`, `video`, `user_id`, `subscription_status`, `created_at`, `updated_at`) VALUES
(2, 'Ganeshdas rathi mahavidyalay', 'Ravi Nagar Amravati, Maharashtra', 'Welcome to XYZ School, a vibrant learning community dedicated to nurturing students\' academic and personal growth. With a supportive faculty and state-of-the-art facilities, we offer a comprehensive curriculum that encourages critical thinking, creativity, and collaboration. Our school fosters a positive and inclusive environment where students can thrive and explore their passions. Join us in shaping the leaders of tomorrow11111111', '454545', '1989', 'Rerum ut nihil praes', '2', '8585858585', 'school@gmail.com', 'asdasd.com', 'www.com', 'instagram.com1', 'google.com11', 'youtube.com3', NULL, '12:00 AM', '10:00 PM', NULL, '[\"database_files\\/school_institute\\/photo\\/i67331686490739.jpeg\",\"database_files\\/school_institute\\/photo\\/i74291686490739.png\",\"database_files\\/school_institute\\/photo\\/i77731686158918.png\",\"database_files\\/school_institute\\/photo\\/i58361686158918.png\",\"database_files\\/school_institute\\/photo\\/i54431686158918.png\"]', '[\"database_files\\/school_institute\\/video\\/v65541686490761.mp4\",\"database_files\\/school_institute\\/video\\/v19281686158918.mp4\",\"database_files\\/school_institute\\/video\\/v76771686158918.mp4\"]', 251, 1, '2023-06-07 11:58:38', '2023-06-11 08:09:21'),
(3, 'VMV college od science', 'Quae eveniet quis s', NULL, '444604', '2022', NULL, 'Commerce', '7385078839', 'college@gmail.com', NULL, NULL, NULL, NULL, NULL, '[\"11th\"]', NULL, NULL, '[\"Classrooms\"]', '[\"database_files\\/school_institute\\/photo\\/i11881686467842.png\",\"database_files\\/school_institute\\/photo\\/i21951686467842.png\",\"database_files\\/school_institute\\/photo\\/i50861686467842.png\",\"database_files\\/school_institute\\/photo\\/i99781686467842.png\"]', '[\"database_files\\/school_institute\\/video\\/v671686467842.mp4\"]', 253, 1, '2023-06-11 01:47:23', '2023-06-11 01:47:23'),
(5, 'Patil coaching classes of science', 'Et aliqua Cum in vo', NULL, '444585', '2023', NULL, 'Professional (please specify your professional field)', '8574147857', 'institute@gmail.com', NULL, 'https://www.justdial.com/', 'https://www.justdial.com/', 'https://www.justdial.com/', 'https://www.justdial.com/', '[\"Yoga\"]', NULL, NULL, '[\"Classrooms\"]', '[\"database_files\\/school_institute\\/photo\\/i60521686470011.png\",\"database_files\\/school_institute\\/photo\\/i37771686470011.png\"]', '[\"database_files\\/school_institute\\/video\\/v21181686470011.mp4\"]', 254, 1, '2023-06-11 02:23:31', '2023-06-11 02:23:31');

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_student`
--

INSERT INTO `user_student` (`id`, `r_name`, `r_current_school_institute`, `mob`, `user_id`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Jelani Normans', 'Aliquam esse est ma', '8585858587', 252, 'Ex eos veniam volu', '2023-06-08 13:34:35', '2023-06-11 05:17:39');

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
