-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2023 at 03:16 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mtics_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(10) UNSIGNED NOT NULL,
  `date_placed` varchar(255) NOT NULL,
  `date_occured` varchar(255) NOT NULL,
  `event_image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `date_placed`, `date_occured`, `event_image`, `created_at`, `updated_at`, `title`) VALUES
(4, '2023-04-02 05:20:06', '2023-02-06', 'images/1.jpg', '2023-04-01 21:20:06', '2023-04-03 08:02:25', 'MTICS 1st General Pre Pandemic Assembly'),
(5, '2023-04-02 05:20:57', '2023-01-13', 'images/2.jpg', '2023-04-01 21:20:57', '2023-04-01 21:20:57', 'ACSO Week Day 4'),
(6, '2023-04-02 05:23:55', '2023-01-11', 'images/3.jpg', '2023-04-01 21:23:55', '2023-04-01 21:23:55', 'Acquintance Party'),
(7, '2023-04-02 05:24:39', '2023-01-30', 'images/4.jpg', '2023-04-01 21:24:39', '2023-04-01 21:24:39', 'HackVenture');

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
-- Table structure for table `loginfo`
--

CREATE TABLE `loginfo` (
  `log_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `position` varchar(255) NOT NULL,
  `log_date` date NOT NULL,
  `timeIn` varchar(255) NOT NULL,
  `timeOut` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loginfo`
--

INSERT INTO `loginfo` (`log_id`, `student_id`, `position`, `log_date`, `timeIn`, `timeOut`, `created_at`, `updated_at`) VALUES
(2, 5, 'president', '2023-03-25', '18:50', '18:52', '2023-03-25 02:50:39', '2023-03-25 02:52:28'),
(3, 3, 'officer', '2023-03-26', '12:32', '12:36', '2023-03-25 20:32:35', '2023-03-25 20:36:25'),
(4, 5, 'president', '2023-03-27', '13:21', '13:22', '2023-03-26 21:21:59', '2023-03-26 21:22:27'),
(5, 3, 'officer', '2023-03-27', '13:24', '13:24', '2023-03-26 21:24:13', '2023-03-26 21:24:38'),
(6, 3, 'officer', '2023-03-27', '13:41', '13:42', '2023-03-26 21:41:59', '2023-03-26 21:42:10'),
(7, 5, 'president', '2023-04-03', '14:21', '14:21', '2023-04-02 22:21:30', '2023-04-02 22:21:42'),
(8, 3, 'officer', '2023-04-10', '07:55', '07:55', '2023-04-10 15:55:05', '2023-04-10 15:55:13'),
(9, 5, 'president', '2023-04-11', '17:07', '17:07', '2023-04-11 01:07:46', '2023-04-11 01:07:52');

-- --------------------------------------------------------

--
-- Table structure for table `membershipinfo`
--

CREATE TABLE `membershipinfo` (
  `info_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `date_placed` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `membershipinfo`
--

INSERT INTO `membershipinfo` (`info_id`, `student_id`, `date_placed`, `status`, `created_at`, `updated_at`) VALUES
(3, 5, '2023-03-14', 'paid', NULL, NULL),
(4, 6, '2023-03-14', 'paid', NULL, NULL),
(5, 7, '2023-03-14', 'paid', NULL, NULL),
(6, 8, '2023-03-14', 'paid', NULL, NULL),
(7, 10, '2023-03-14', 'paid', NULL, NULL),
(10, 13, '2023-03-20', 'paid', NULL, NULL),
(11, 6, '2023-03-20', 'paid', NULL, NULL),
(12, 14, '2023-03-21', 'paid', NULL, NULL),
(13, 17, '2023-03-27', 'paid', NULL, NULL),
(15, 19, '2023-04-03', 'paid', NULL, NULL),
(16, 20, '2023-04-11', 'paid', NULL, NULL),
(17, 21, '2023-04-11', 'paid', NULL, NULL);

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
(37, '2014_10_12_000000_create_users_table', 1),
(38, '2014_10_12_100000_create_password_resets_table', 1),
(39, '2019_08_19_000000_create_failed_jobs_table', 1),
(40, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(41, '2023_02_13_114537_create_students_table', 1),
(42, '2023_02_14_140449_add_roles_to_user', 1),
(43, '2023_02_17_134615_migrationinfo', 1),
(44, '2023_02_17_140825_statusline', 1),
(47, '2023_03_11_140516_services', 2),
(48, '2023_03_11_142902_add_service_files_to_serviceinfo', 3),
(49, '2023_03_12_053323_add_file_name_to_services', 4),
(51, '2023_03_20_141546_create_events_table', 5),
(52, '2023_03_21_022827_add_title_to_events', 6),
(53, '2023_03_21_124254_create_products_table', 7),
(54, '2023_03_21_141242_add_size_to_services', 8),
(56, '2023_03_22_135708_orderinfo', 9),
(58, '2023_02_25_113009_loginfo', 11),
(59, '2023_03_25_105956_add_date_placed_to_orderinfo', 12),
(60, '2023_03_26_030111_add_status_to_orderinfo', 13),
(61, '2023_03_30_065233_drop_foreign', 14),
(62, '2023_03_23_113218_orderinfo', 15),
(63, '2023_03_30_071129_add_status_to_orderino', 16);

-- --------------------------------------------------------

--
-- Table structure for table `orderinfo`
--

CREATE TABLE `orderinfo` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date_placed` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orderinfo`
--

INSERT INTO `orderinfo` (`id`, `student_id`, `created_at`, `updated_at`, `date_placed`, `status`) VALUES
(1, 7, '2023-03-29 23:13:04', '2023-04-05 04:29:58', '2023-03-30 07:13:04', 'Finished'),
(3, 6, '2023-04-06 22:34:02', '2023-04-06 22:34:02', '2023-04-07 06:34:02', 'processing'),
(4, 7, '2023-04-06 23:30:46', '2023-04-06 23:30:46', '2023-04-07 07:30:46', 'processing'),
(5, 20, '2023-04-11 01:15:05', '2023-04-16 07:22:02', '2023-04-11 09:15:05', 'Finished'),
(6, 21, '2023-04-11 02:02:58', '2023-04-11 02:08:07', '2023-04-11 10:02:58', 'Finished'),
(7, 6, '2023-04-15 19:23:14', '2023-04-15 19:26:32', '2023-04-16 03:23:14', 'Finished');

-- --------------------------------------------------------

--
-- Table structure for table `orderline`
--

CREATE TABLE `orderline` (
  `orderinfo_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orderline`
--

INSERT INTO `orderline` (`orderinfo_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL),
(1, 7, NULL, NULL),
(3, 2, NULL, NULL),
(3, 6, NULL, NULL),
(4, 1, NULL, NULL),
(4, 7, NULL, NULL),
(5, 1, NULL, NULL),
(5, 6, NULL, NULL),
(6, 2, NULL, NULL),
(6, 6, NULL, NULL),
(7, 1, NULL, NULL);

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
  `product_id` int(10) UNSIGNED NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `description`, `price`, `product_image`, `created_at`, `updated_at`) VALUES
(1, 'ID Lace', '120.00', 'img_path/Id Lace.png', '2023-03-21 05:19:08', '2023-03-21 05:19:08'),
(2, 'Tech Shirt - Small', '550.00', 'img_path/Polo-Small.png', '2023-03-21 05:20:00', '2023-03-21 05:20:00'),
(6, 'Tech Shirt Large', '550.00', 'img_path/Polo-Small.png', '2023-03-21 06:05:37', '2023-03-21 06:05:37'),
(7, 'Tech Shirt Medium', '550.00', 'img_path/Polo-Small.png', '2023-03-21 06:05:37', '2023-03-21 06:05:37');

-- --------------------------------------------------------

--
-- Table structure for table `serviceinfo`
--

CREATE TABLE `serviceinfo` (
  `service_id` int(10) UNSIGNED NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cost` decimal(8,2) NOT NULL,
  `options` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date_placed` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `service_file` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `serviceinfo`
--

INSERT INTO `serviceinfo` (`service_id`, `fname`, `lname`, `section`, `email`, `cost`, `options`, `quantity`, `date_placed`, `created_at`, `updated_at`, `service_file`, `filename`, `size`) VALUES
(2, 'Test', 'User', 'Test Section', 'test123@gmail.com', '6.00', 'blackWhite', 3, '2023-03-12 05:56:23', '2023-03-11 21:56:23', '2023-03-12 21:21:38', 'files/IAS-Final_Project.pdf', 'Test File', ''),
(3, 'Jhofel', 'Magro', 'BETAT-NS-T-3A-T', 'jhofel.magro@tup.edu.ph', '6.00', 'blackWhite', 2, '2023-03-12 05:59:20', '2023-03-11 21:59:20', '2023-03-12 06:35:01', 'files/SWOT-Opportunities.docx', 'Test Essay', ''),
(4, 'Renyel Jay', 'Sioc', 'BSIT-NS-3A', 'renyeljay.sioc@tup.edu.ph', '5.00', 'blackWhite', 1, '2023-03-13 13:51:47', '2023-03-13 05:51:47', '2023-03-13 05:57:53', 'files/SWOT-Opportunities.docx', 'System Integration 2 Enterprise Architecture Essay', ''),
(7, 'Joshua', 'Delos Santos', 'BETAT-NS-T-3A-T', 'joshua.delossantos@tup.edu.ph', '0.00', 'blackWhite', 1, '2023-03-13 14:22:53', '2023-03-13 06:22:53', '2023-03-13 06:22:53', 'files/sioc-assignment-no.4.pdf', 'Car Machinery Parts and Definition', ''),
(11, 'Arnel', 'Ramos', 'BETAT-NS-T-3A-T', 'arnel.ramos@tup.edu.ph', '3.00', 'blackWhite', 1, '2023-03-13 14:36:01', '2023-03-13 06:36:01', '2023-03-13 06:57:03', 'files/sioc_webpage_documentation.pdf', 'Suspension Systems Activity 1', ''),
(12, 'Edmon', 'Candido', 'BSIT-NS-3A', 'edmon.candido@tup.edu.ph', '6.00', 'blackWhite', 1, '2023-03-13 14:39:31', '2023-03-13 06:39:31', '2023-03-13 06:57:48', 'files/Activity 1 1.docx', 'System Integration 2 Enterprise Architecture Essay', ''),
(13, 'Iien', 'Abadilla', 'BETELXT-NS-T-3A-T', 'iien.abadilla@tup.edu.ph', '10.00', 'blackWhite', 1, '2023-03-14 15:55:42', '2023-03-14 07:55:42', '2023-03-14 07:58:44', 'files/BOOKKEEPING (2).docx', 'Arduino Traffic Lights Documentation File', ''),
(16, 'Renyel Jay', 'Sioc', 'BSIT-NS-3A', 'renyel123@gmail.com', '0.00', 'colored', 2, '2023-03-20 06:12:51', '2023-03-19 22:12:51', '2023-03-19 22:12:51', 'files/mtics_reciept (2).pdf', 'Test File', ''),
(17, 'Renyel Jay', 'Sioc', 'BSIT-NS-3A', 'renyel123@gmail.com', '0.00', 'blackWhite', 1, '2023-03-21 14:28:58', '2023-03-21 06:28:58', '2023-03-21 06:28:58', 'files/IAS-Final_Project.pdf', 'System Integration 2 Enterprise Architecture Essay', 'small'),
(18, 'Jhofel', 'Magro', 'BETAT-NS-T-3A-T', 'jhofel.magro@gmail.com', '19.00', 'blackWhite', 1, '2023-03-21 15:01:02', '2023-03-21 07:01:02', '2023-04-15 19:34:18', 'files/IAS-Final_Project.pdf', 'Suspension Systems Activity 1', 'small'),
(20, 'Jhofel', 'Magro', 'BETAT-NS-T-3A-T', 'jhofel.magro@gmail.com', '10.00', 'colored', 1, '2023-03-22 08:05:31', '2023-03-22 00:05:31', '2023-03-22 00:27:40', 'files/project-IAS2.docx', 'Proposal RDBMS', 'large'),
(21, 'Renyel Jay', 'Sioc', 'BSIT-NS-3A', 'renyel123@gmail.com', '15.00', 'colored', 10, '2023-03-27 05:36:12', '2023-03-26 21:36:12', '2023-04-03 00:11:50', 'files/mtics_reciept (6).pdf', 'Suspension Systems Activity 1', 'A4'),
(22, 'Iien', 'Abadilla', 'BETELXT-NS-T-3A-T', 'iien.abadilla@tup.edu.ph', '5.00', 'blackWhite', 1, '2023-04-03 05:51:51', '2023-04-02 21:51:52', '2023-04-02 21:53:25', 'files/ERD-system.pdf', 'Arduino Traffic Lights Documentation File', 'A4'),
(23, 'JayTest', 'Sioc', 'TEST SECTION', 'testjay123@gmail.com', '10.00', 'blackWhite', 1, '2023-04-11 09:01:22', '2023-04-11 01:01:22', '2023-04-11 01:02:40', 'files/shopreciept (6).pdf', 'TEST FILES', 'A4'),
(24, 'Robin', 'Famini', 'BSIT-NS-3A', 'student1@gmail.com', '5.00', 'blackWhite', 1, '2023-04-11 10:12:39', '2023-04-11 02:12:39', '2023-04-11 02:14:32', 'files/shopreciept (8).pdf', 'Suspension Systems Activity 1', 'small');

-- --------------------------------------------------------

--
-- Table structure for table `statusline`
--

CREATE TABLE `statusline` (
  `info_id` int(10) UNSIGNED NOT NULL,
  `date_paid` date NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statusline`
--

INSERT INTO `statusline` (`info_id`, `date_paid`, `amount`, `created_at`, `updated_at`) VALUES
(3, '2023-03-18', '120.00', NULL, NULL),
(4, '2023-03-14', '120.00', NULL, NULL),
(5, '2023-03-18', '120.00', NULL, NULL),
(6, '2023-03-18', '120.00', NULL, NULL),
(7, '2023-03-20', '120.00', NULL, NULL),
(10, '2023-03-20', '120.00', NULL, NULL),
(11, '2023-03-20', '120.00', NULL, NULL),
(12, '2023-03-22', '120.00', NULL, NULL),
(13, '2023-03-27', '120.00', NULL, NULL),
(15, '2023-04-03', '120.00', NULL, NULL),
(16, '2023-04-11', '120.00', NULL, NULL),
(17, '2023-04-11', '120.00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `town` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `student_image` varchar(255) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `title`, `fname`, `lname`, `section`, `phone`, `address`, `town`, `city`, `student_image`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Mr', 'Renyel Jay', 'Sioc', 'BSIT-NS-3A', '09505798533', 'Arago Streeet', 'Central Bicutan', 'Taguig City', 'images/user (1).png', 1, '2023-03-09 04:36:49', '2023-03-09 04:36:49'),
(3, 'Mr', 'John Neri', 'Escobella', 'BSIT-NS-3A', '09491355370', 'Shelly Street', 'Lower Bicutan', 'Taguig City', 'images/322954064_1061897285211731_8303991634160797552_n.png', 3, '2023-03-09 04:42:50', '2023-04-10 22:04:41'),
(5, 'Mr', 'Ian Mark', 'Morga', 'BSIT-NS-3A', '09355304160', 'Holganza Street', 'Central Bicutan', 'Taguig City', 'images/user (1).png', 5, '2023-03-14 07:16:54', '2023-04-02 22:20:55'),
(6, 'Mr', 'Arnel', 'Ramos', 'BSIT-NS-3A', '092131166519', '.45 Street', 'Upper Bicutan', 'Taguig City', 'images/user (1).png', 6, '2023-03-14 07:22:02', '2023-03-14 07:22:02'),
(7, 'Mr', 'Jhofel', 'Magro', 'BETAT-NS-T-3A-T', '092131166519', 'Mata Street', 'Upper Bicutan', 'Cavite', 'images/download.jpg', 7, '2023-03-14 07:24:07', '2023-03-21 04:29:53'),
(8, 'Mr', 'Joshua', 'Delos Santos', 'BSIT-NS-3A', '092131166519', 'Babaero Street', 'Upper Bicutan', 'Taguig City', 'images/317180135_1917959351899182_8498583834941612077_n.png', 8, '2023-03-14 07:27:06', '2023-03-14 07:27:06'),
(10, 'Miss', 'Chiney', 'Lagutom', 'BSIT-NS-1A', '09428763183', 'Maliit Street', 'Upper Bicutan', 'Taguig City', 'images/318852539_1821285538243822_3415718218701953540_n.png', 10, '2023-03-14 07:30:53', '2023-03-14 07:30:53'),
(11, 'Mr', 'Kevin', 'Custudio', 'BSIT-NS-3A', '09345434564', 'Garapata Street', 'Central Bicutan', 'Taguig City', 'images/user (1).png', 11, '2023-03-14 07:32:48', '2023-03-14 07:32:48'),
(13, 'Mr.', 'Kent', 'Barasi', 'BSIT-NS-3A', '123456789', 'Cavite', 'Etivac', 'testt', 'images/user (1).png', 13, '2023-03-19 21:40:59', '2023-03-19 21:45:21'),
(14, 'Ms', 'Jules', 'Horca', 'BSIT-NS-3A', '09454546', 'Molave', 'Bacoor', 'Cavite', 'images/images.png', 14, '2023-03-20 18:02:51', '2023-03-20 18:02:51'),
(15, 'Mr', 'Edmon', 'Candido', 'BSIT-NS-3A', '09504355160', 'Hehehe Street', 'Hehehe Town', 'Hehehe City', 'images/download (2).jpg', 15, '2023-03-23 03:50:05', '2023-03-23 03:50:05'),
(17, 'mr', 'aldwin', 'Delos Santos', 'BSIT-NS-3A', '09453122341', 'Holganza Street', 'Upper Bicutan', 'Taguig City', 'images/sniper.jpg', 20, '2023-03-26 17:08:34', '2023-03-26 17:08:34'),
(19, 'Miss', 'Iien', 'Abadilla', 'BSIT-NS-3A', '09355304160', 'Pandak Street', 'Upper Bicutan', 'Taguig City', 'images/323073398_551812649951182_4704914925046994679_n.png', 27, '2023-04-02 22:15:30', '2023-04-02 22:15:30'),
(20, 'Mr', 'JayRenyel', 'Sioc', 'BSIT-NS-3A', '091231231', 'Holganza Street', 'Central Bicutan', 'Taguig City', 'images/323111005_479711764314603_88591795110783432_n.jpg', 28, '2023-04-11 01:04:19', '2023-04-11 01:14:40'),
(21, 'Mr', 'Robin', 'Famini', 'BSIT-NS-3A', '09355304160', 'Arago Street', 'Upper Bicutan', 'Taguig City', 'images/340223273_761227688842215_5894114258130044695_n.jpg', 29, '2023-04-11 01:57:22', '2023-04-11 01:57:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Renyel JaySioc', 'renyel123@gmail.com', NULL, '$2y$10$bgzp/5WShHgJV0FX2HRtLuCulsjW7k8s7GRw7P70WSS43OjUMzgkC', NULL, '2023-03-09 04:36:49', '2023-03-09 04:36:49', 'admin'),
(3, 'NeriEsobella', 'neri123@gmail.com', NULL, '$2y$10$3ZROaSHNjz96xpKX0JJiw.NrWW09hMgJZlrJqlJ6KENf6YJHQN7oS', NULL, '2023-03-09 04:42:50', '2023-04-11 01:09:47', 'officer'),
(5, 'Ian MarkMorga', 'ian123@gmail.com', NULL, '$2y$10$qt63QkBGdhyvKPwIAL3ic.XZwm7OvRBpFxt89tXRx/HAF/fSxKumO', NULL, '2023-03-14 07:16:54', '2023-04-11 01:07:28', 'president'),
(6, 'ArnelRamos', 'arnel.ramos@gmail.com', NULL, '$2y$10$arJ00tQycqM1TtbMehoiXuWD9W5eItqlEkHJuzNt8hJ2jj2NBAmKq', NULL, '2023-03-14 07:22:01', '2023-03-20 05:53:16', 'student'),
(7, 'JhofelMagro', 'jhofel.magro@gmail.com', NULL, '$2y$10$2p3thqUrNeyHhO8WXmCG6Ol7qigwWlqm0CokS5FskAg2/3UkscTMW', NULL, '2023-03-14 07:24:06', '2023-03-14 07:41:27', 'student'),
(8, 'JoshuaDelos Santos', 'ashong123@gmail.com', NULL, '$2y$10$ezO1JhnTqcuKA2SsDgBgGuHh7b.3PAm/C7X2lhrinVazwZx2VLdkm', NULL, '2023-03-14 07:27:06', '2023-03-14 07:41:19', 'student'),
(10, 'ChineyLagutom', 'saisai@gmail.com', NULL, '$2y$10$tQiK7CThmHp.7fhZpRfqS.UOqlxoG3bjQ2UwG0tEcsw9kqwYO0Q4W', NULL, '2023-03-14 07:30:53', '2023-04-02 22:01:51', 'unregistered'),
(11, 'KevinCustudio', 'kevin.custudio@gmail.com', NULL, '$2y$10$ggN/wua56U9SZhFpTUR3P.lK8ps5aLIEOdYfRAWYzOoxQpoTKTjnm', NULL, '2023-03-14 07:32:47', '2023-03-14 07:40:59', 'student'),
(13, 'KentBarasi', 'kent1234@gmail.com', NULL, '$2y$10$dgL47li.Syfq2zFu9sEau.viZS/YgpFR7f32pFIM3El2G6cfqId7y', NULL, '2023-03-19 21:40:59', '2023-03-19 21:43:21', 'student'),
(14, 'JulesHorca', 'jolsrah@gmail.com', NULL, '$2y$10$1CCATid7dEUJkV2IJAZhOe78tzhWFn6UhLwwCxd8Hqcr8aZi8fEWC', NULL, '2023-03-20 18:02:51', '2023-03-26 21:48:27', 'student'),
(15, 'EdmonCandido', 'edmon123@gmail.com', NULL, '$2y$10$b63VcgT1/.6u26sb4ilwU.l1deOJm.X3.1uehPXJgBtmEI5hOEnUu', NULL, '2023-03-23 03:50:05', '2023-03-23 03:50:05', 'unregistered'),
(20, 'aldwinDelos Santos', 'zeddelasalas@gmail.com', NULL, '$2y$10$3OnQCTNyJ7tZYTLXLvyftOODqllp3JUZEW.GOUdpkaitw6LOpvQfG', NULL, '2023-03-26 17:08:34', '2023-03-26 17:09:44', 'student'),
(26, 'Admin', 'admin123@gmail.com', NULL, '$2y$10$7sAefrijwIm9G8.A2KvqYuhn0QQmRHPxowS/7sqtlFhee9BshZqIu', NULL, '2023-04-02 21:56:36', '2023-04-02 21:56:36', 'admin'),
(27, 'IienAbadilla', 'iien.abadilla@tup.edu.ph', NULL, '$2y$10$0AcBtFT4y5wF/rn..mIjRetPJT/WCpoWWSq83om2ybJPfUenzHL06', NULL, '2023-04-02 22:15:30', '2023-04-02 22:17:25', 'student'),
(28, 'TestJayRenyel', 'testjay123@gmail.com', NULL, '$2y$10$phpLT0C1xAifxB1ZCIo7getLDWleSD0ds3qQW13JccWgG.aDaWNu.', NULL, '2023-04-11 01:04:19', '2023-04-11 01:05:50', 'student'),
(29, 'RobinFamini', 'student1@gmail.com', NULL, '$2y$10$gQTOkG2NBdqDnPDyJE9qyeS0IqQKz9EugyiNE2706KTH9L5Qu4atm', NULL, '2023-04-11 01:57:22', '2023-04-11 02:00:57', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `loginfo`
--
ALTER TABLE `loginfo`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `loginfo_student_id_foreign` (`student_id`);

--
-- Indexes for table `membershipinfo`
--
ALTER TABLE `membershipinfo`
  ADD PRIMARY KEY (`info_id`),
  ADD KEY `membershipinfo_student_id_foreign` (`student_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderinfo`
--
ALTER TABLE `orderinfo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderinfo_student_id_foreign` (`student_id`);

--
-- Indexes for table `orderline`
--
ALTER TABLE `orderline`
  ADD KEY `orderline_orderinfo_id_foreign` (`orderinfo_id`),
  ADD KEY `orderline_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

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
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `serviceinfo`
--
ALTER TABLE `serviceinfo`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `statusline`
--
ALTER TABLE `statusline`
  ADD KEY `statusline_info_id_foreign` (`info_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `students_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loginfo`
--
ALTER TABLE `loginfo`
  MODIFY `log_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `membershipinfo`
--
ALTER TABLE `membershipinfo`
  MODIFY `info_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `orderinfo`
--
ALTER TABLE `orderinfo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `serviceinfo`
--
ALTER TABLE `serviceinfo`
  MODIFY `service_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `loginfo`
--
ALTER TABLE `loginfo`
  ADD CONSTRAINT `loginfo_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE;

--
-- Constraints for table `membershipinfo`
--
ALTER TABLE `membershipinfo`
  ADD CONSTRAINT `membershipinfo_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE;

--
-- Constraints for table `orderinfo`
--
ALTER TABLE `orderinfo`
  ADD CONSTRAINT `orderinfo_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);

--
-- Constraints for table `orderline`
--
ALTER TABLE `orderline`
  ADD CONSTRAINT `orderline_orderinfo_id_foreign` FOREIGN KEY (`orderinfo_id`) REFERENCES `orderinfo` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orderline_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `statusline`
--
ALTER TABLE `statusline`
  ADD CONSTRAINT `statusline_info_id_foreign` FOREIGN KEY (`info_id`) REFERENCES `membershipinfo` (`info_id`) ON DELETE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
