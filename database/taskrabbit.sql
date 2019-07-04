-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2018 at 01:37 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taskrabbit`
--
CREATE DATABASE IF NOT EXISTS `taskrabbit` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `taskrabbit`;

-- --------------------------------------------------------

--
-- Table structure for table `biodatas`
--

DROP TABLE IF EXISTS `biodatas`;
CREATE TABLE IF NOT EXISTS `biodatas` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id_fk` int(11) NOT NULL,
  `client_photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_day` int(11) NOT NULL,
  `client_month` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_year` int(11) NOT NULL,
  `client_ph` bigint(12) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `biodatas`
--

INSERT INTO `biodatas` (`id`, `user_id_fk`, `client_photo`, `client_address`, `client_day`, `client_month`, `client_year`, `client_ph`, `created_at`, `updated_at`) VALUES
(1, 1, 'DSC_0078_1540510204.jpg', '17-A New Shalimar Town Lahore', 12, '5', 1993, 923154378468, '2018-10-26 06:30:04', '2018-10-26 06:30:04');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `job_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_name` varchar(50) NOT NULL,
  PRIMARY KEY (`job_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `job_name`) VALUES
(1, 'Cleaning'),
(2, 'Plumber'),
(3, 'Electrition'),
(4, 'Errands'),
(5, 'Event Staffing'),
(6, 'Personal Assistant'),
(7, 'Furniture Assembly'),
(8, 'Help Moving'),
(9, 'Heavy Lifting'),
(10, 'Minor Home Repairs'),
(11, 'Shopping'),
(12, 'Yard Work & Removal'),
(13, 'Delivery'),
(14, 'Decoration');

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

DROP TABLE IF EXISTS `lessons`;
CREATE TABLE IF NOT EXISTS `lessons` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tasker_id` int(11) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `job_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `tasker_id`, `client_id`, `job_id`, `created_at`, `updated_at`) VALUES
(7, 2, 1, 3, '2018-10-27 07:10:20', '2018-10-27 07:10:20'),
(8, 2, 1, 3, '2018-10-27 08:29:12', '2018-10-27 08:29:12');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=308 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(6, '2018_09_28_154432_create_user_profiles_table', 1),
(299, '2014_10_12_000000_create_users_table', 2),
(300, '2018_09_30_185105_create_user_profiles_table', 2),
(301, '2018_09_30_194138_create_user_skills_table', 2),
(302, '2018_10_01_001534_create_user_c_c_infos_table', 2),
(303, '2018_10_04_200249_create_biodatas_table', 2),
(304, '2018_10_05_004901_create_task_details_table', 2),
(305, '2018_10_23_233931_create_tasks_table', 2),
(306, '2018_10_26_211713_create_notifications_table', 3),
(307, '2018_10_26_212115_create_lessons_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('1d231788-9d19-449b-9bc5-c2881cd756b7', 'App\\Notifications\\NewLessonNotification', 'App\\User', 1, '{\"lesson\":{\"id\":8,\"tasker_id\":2,\"client_id\":1,\"job_id\":3,\"created_at\":\"2018-10-27 01:29:12\",\"updated_at\":\"2018-10-27 01:29:12\"}}', NULL, '2018-10-27 08:29:12', '2018-10-27 08:29:12');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tasker_id_fk` int(11) NOT NULL,
  `task_id_fk` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `tasker_id_fk`, `task_id_fk`, `created_at`, `updated_at`) VALUES
(12, 2, 1, '2018-10-26 08:18:26', '2018-10-26 08:18:26'),
(16, 2, 3, '2018-10-27 03:11:35', '2018-10-27 03:11:35'),
(17, 2, 3, '2018-10-27 03:53:28', '2018-10-27 03:53:28'),
(18, 2, 2, '2018-10-27 03:53:42', '2018-10-27 03:53:42'),
(19, 2, 3, '2018-10-27 04:14:02', '2018-10-27 04:14:02'),
(20, 2, 3, '2018-10-27 04:57:49', '2018-10-27 04:57:49'),
(21, 2, 3, '2018-10-27 05:40:51', '2018-10-27 05:40:51'),
(22, 2, 3, '2018-10-27 05:41:33', '2018-10-27 05:41:33'),
(23, 2, 3, '2018-10-27 05:41:40', '2018-10-27 05:41:40'),
(24, 2, 3, '2018-10-27 05:42:03', '2018-10-27 05:42:03'),
(25, 2, 3, '2018-10-27 05:42:28', '2018-10-27 05:42:28'),
(26, 2, 3, '2018-10-27 05:43:34', '2018-10-27 05:43:34'),
(27, 2, 3, '2018-10-27 05:43:39', '2018-10-27 05:43:39'),
(28, 2, 3, '2018-10-27 05:45:14', '2018-10-27 05:45:14'),
(29, 2, 3, '2018-10-27 05:45:22', '2018-10-27 05:45:22'),
(30, 2, 3, '2018-10-27 05:50:51', '2018-10-27 05:50:51'),
(31, 2, 3, '2018-10-27 05:51:01', '2018-10-27 05:51:01'),
(32, 2, 3, '2018-10-27 05:51:25', '2018-10-27 05:51:25'),
(33, 2, 3, '2018-10-27 05:52:14', '2018-10-27 05:52:14'),
(34, 2, 3, '2018-10-27 05:52:39', '2018-10-27 05:52:39'),
(35, 2, 3, '2018-10-27 05:52:58', '2018-10-27 05:52:58'),
(36, 2, 3, '2018-10-27 05:53:14', '2018-10-27 05:53:14'),
(37, 2, 3, '2018-10-27 06:25:58', '2018-10-27 06:25:58'),
(38, 2, 3, '2018-10-27 07:10:20', '2018-10-27 07:10:20'),
(39, 2, 3, '2018-10-27 08:29:12', '2018-10-27 08:29:12');

-- --------------------------------------------------------

--
-- Table structure for table `task_details`
--

DROP TABLE IF EXISTS `task_details`;
CREATE TABLE IF NOT EXISTS `task_details` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_id_fk` int(11) NOT NULL,
  `task_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `task_category` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `task_location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `task_completiondate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `task_duration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `task_details` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tasker_name` text COLLATE utf8mb4_unicode_ci,
  `task_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `task_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `task_details`
--

INSERT INTO `task_details` (`id`, `client_id_fk`, `task_name`, `task_category`, `task_location`, `task_completiondate`, `task_duration`, `task_details`, `tasker_name`, `task_date`, `task_status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Wall Hole Fix', 'Minor Home Repairs', '123 main st', 'Today', 'Small - Est. 1 hr', 'fodsifsdoigodgod', NULL, NULL, NULL, '2018-10-26 06:30:26', '2018-10-26 06:30:26'),
(2, 1, 'Shopping', 'Shopping', '17-A New Shalimar Town Multan Road Lahore', 'Today', 'Small - Est. 1 hr', 'duaiofuei', NULL, NULL, NULL, '2018-10-26 06:35:48', '2018-10-26 06:35:48'),
(3, 1, 'Bed Purchasing', 'Shopping', '17-A New Shalimar Town Multan Road Lahore', 'Today', 'Small - Est. 1 hr', 'fjeuwiofwilfihl', NULL, NULL, NULL, '2018-10-27 02:08:49', '2018-10-27 02:08:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `fname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verifyToken` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`, `user_type`, `verifyToken`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Usama', 'Saleem', 'usamasaleem00@gmail.com', '$2y$10$1455CKP6XfpkMdd.Bdm/PecCmYBlQvb7HSDvicnmZ0AmfgQ0BA0Ny', 'Client', 'zLEBtuDLgUa1GUYn802RBGcU8', 1, '7HJVV7x4PehkhVkhf9f997uJsLNwmo4BoBwHxReHRA6xnmyykOefLi83LcaX', '2018-10-26 06:29:15', '2018-10-26 06:29:15'),
(2, 'a', 'b', 'a@gmail.com', '$2y$10$hSK/0wlpOFZC71hSDb12peU4D3ffaSpXDBUXprJ2XoXCmh4aUSVm2', 'Tasker', 'DY44fKubfQA9WlivKp4T7Iga9', 1, 'ASSICrTLHZcAtbnFo24nvlXpB2an6quBiV6KbUhYjFvuKFcbzbIoDE2I5Y3X', '2018-10-26 06:31:21', '2018-10-26 06:31:21'),
(3, 'v', 'c', 'bn@gmail.com', '$2y$10$0UEBnYLl.34BGlzHkQUCmO1EzOp.C8Ou77bLk7y.03sVoPNEJPsRK', 'Client', 'ioQ5EGjJXwfhbq3QFePMcoGXI', 0, 'JC9ybNF4UQ2iCuqXuA6w2i61lbjVgXEKlmBBeQqeXz95W7rBvbEa8BxTMhHy', '2018-10-29 09:27:27', '2018-10-29 09:27:27');

-- --------------------------------------------------------

--
-- Table structure for table `user_c_c_infos`
--

DROP TABLE IF EXISTS `user_c_c_infos`;
CREATE TABLE IF NOT EXISTS `user_c_c_infos` (
  `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tasker_id_fk` int(11) NOT NULL,
  `user_cc` int(11) NOT NULL,
  `user_exp_month` int(11) NOT NULL,
  `user_exp_year` int(11) NOT NULL,
  `user_sc` int(11) NOT NULL,
  `user_zc` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

DROP TABLE IF EXISTS `user_profiles`;
CREATE TABLE IF NOT EXISTS `user_profiles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id_fk` int(11) NOT NULL,
  `user_photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_street` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_tehseel` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_city` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_district` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_zipcode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_month` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_phonetp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_vehicle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `user_id_fk`, `user_photo`, `user_street`, `user_tehseel`, `user_city`, `user_district`, `user_zipcode`, `user_date`, `user_month`, `user_year`, `user_phonetp`, `user_vehicle`, `created_at`, `updated_at`) VALUES
(1, 2, 'DSC_0078_1540510334.jpg', '17-A', 'Gulshan-e-Ravi', 'Lahore', 'Punjab', '45000', '12', '5', '1990', 'Android', 'Moving Truck,Pickup Truck', '2018-10-26 06:32:14', '2018-10-26 06:32:14');

-- --------------------------------------------------------

--
-- Table structure for table `user_skills`
--

DROP TABLE IF EXISTS `user_skills`;
CREATE TABLE IF NOT EXISTS `user_skills` (
  `skill_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `skill_id_fk` int(11) NOT NULL,
  `skill_rate` int(11) NOT NULL,
  `skill_supply` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skill_pitch` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `skill_exp` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`skill_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
