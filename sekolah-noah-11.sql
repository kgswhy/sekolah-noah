-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 02, 2025 at 06:36 PM
-- Server version: 8.0.40
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sekolah-noah`
--

-- --------------------------------------------------------

--
-- Table structure for table `absences`
--

CREATE TABLE `absences` (
  `id` bigint UNSIGNED NOT NULL,
  `schedule_id` bigint UNSIGNED NOT NULL,
  `clock_in` time NOT NULL,
  `clock_out` time NOT NULL,
  `late` tinyint(1) NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `absences`
--

INSERT INTO `absences` (`id`, `schedule_id`, `clock_in`, `clock_out`, `late`, `status`, `created_at`, `updated_at`) VALUES
(62, 66, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(63, 67, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(64, 68, '21:00:00', '16:49:00', 0, 'present', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(65, 69, '21:05:00', '17:00:00', 1, 'late', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(66, 70, '00:00:00', '00:00:00', 0, 'absent', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(67, 71, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(68, 72, '00:00:00', '00:00:00', 0, 'absent', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(69, 73, '12:00:00', '19:07:00', 0, 'present', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(70, 74, '21:00:00', '16:53:00', 0, 'present', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(71, 75, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(72, 76, '21:00:00', '16:59:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(73, 77, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(74, 78, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(75, 79, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(76, 80, '21:00:00', '16:44:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(77, 81, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(78, 82, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(79, 83, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(80, 84, '00:00:00', '00:00:00', 0, 'absent', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(81, 85, '12:00:00', '19:08:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(82, 86, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(83, 87, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(84, 88, '12:15:00', '19:30:00', 1, 'late', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(85, 89, '12:02:00', '19:30:00', 1, 'late', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(86, 90, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(87, 91, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(88, 92, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(89, 93, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(90, 94, '12:00:00', '19:22:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(91, 95, '21:12:00', '17:00:00', 1, 'late', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(92, 96, '12:05:00', '19:30:00', 1, 'late', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(93, 97, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(94, 98, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(95, 99, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(96, 100, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(97, 101, '12:00:00', '19:18:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(98, 102, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(99, 103, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(100, 104, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(101, 105, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(102, 106, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(103, 107, '21:00:00', '16:53:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(104, 108, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(105, 109, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(106, 110, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(107, 111, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(108, 112, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(109, 113, '21:10:00', '17:00:00', 1, 'late', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(110, 114, '12:19:00', '19:30:00', 1, 'late', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(111, 115, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(112, 116, '12:21:00', '19:30:00', 1, 'late', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(113, 117, '00:00:00', '00:00:00', 0, 'absent', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(114, 118, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(115, 119, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(116, 120, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(117, 121, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(118, 122, '00:00:00', '00:00:00', 0, 'absent', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(119, 123, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(120, 124, '12:00:00', '19:26:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(121, 125, '21:23:00', '17:00:00', 1, 'late', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(122, 126, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(123, 127, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(124, 128, '12:28:00', '19:30:00', 1, 'late', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(125, 129, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(126, 130, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(127, 131, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(128, 132, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(129, 133, '00:00:00', '00:00:00', 0, 'absent', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(130, 134, '12:00:00', '19:04:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(131, 135, '12:00:00', '19:09:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(132, 136, '12:00:00', '19:06:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(133, 137, '12:18:00', '19:30:00', 1, 'late', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(134, 138, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(135, 139, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(136, 140, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(137, 141, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(138, 142, '12:30:00', '19:30:00', 1, 'late', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(139, 143, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(140, 144, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(141, 145, '21:00:00', '16:36:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(142, 146, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(143, 147, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(144, 148, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(145, 149, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(146, 150, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(147, 151, '12:19:00', '19:30:00', 1, 'late', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(148, 152, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(149, 153, '12:24:00', '19:30:00', 1, 'late', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(150, 154, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(151, 155, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(152, 156, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(153, 157, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(154, 158, '21:10:00', '17:00:00', 1, 'late', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(155, 159, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(156, 160, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(157, 161, '00:00:00', '00:00:00', 0, 'absent', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(158, 162, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(159, 163, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(160, 164, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(161, 165, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(162, 166, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(163, 167, '00:00:00', '00:00:00', 0, 'absent', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(164, 168, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(165, 169, '21:21:00', '17:00:00', 1, 'late', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(166, 170, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(167, 171, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(168, 172, '12:29:00', '19:19:00', 1, 'late', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(169, 173, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(170, 174, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(171, 175, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(172, 176, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(173, 177, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(174, 178, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(175, 179, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(176, 180, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(177, 181, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(178, 182, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(179, 183, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(180, 184, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(181, 185, '12:00:00', '19:07:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(182, 186, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(183, 187, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(184, 188, '21:11:00', '16:59:00', 1, 'late', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(185, 189, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(186, 190, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(187, 191, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(188, 192, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(189, 193, '12:00:00', '19:13:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(190, 194, '21:00:00', '16:41:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(191, 195, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(192, 196, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(193, 197, '21:05:00', '17:00:00', 1, 'late', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(194, 198, '00:00:00', '00:00:00', 0, 'absent', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(195, 199, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(196, 200, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(197, 201, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(198, 202, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(199, 203, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(200, 204, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(201, 205, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(202, 206, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(203, 207, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(204, 208, '00:00:00', '00:00:00', 0, 'absent', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(205, 209, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(206, 210, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(207, 211, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(208, 212, '21:00:00', '16:52:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(209, 213, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(210, 214, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(211, 215, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(212, 216, '12:13:00', '19:30:00', 1, 'late', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(213, 217, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(214, 218, '00:00:00', '00:00:00', 0, 'absent', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(215, 219, '12:00:00', '19:16:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(216, 220, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(217, 221, '21:00:00', '16:43:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(218, 222, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(219, 223, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(220, 224, '21:00:00', '16:46:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(221, 225, '21:00:00', '16:35:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(222, 226, '12:00:00', '19:09:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(223, 227, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(224, 228, '21:00:00', '16:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(225, 229, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(226, 230, '12:17:00', '19:30:00', 1, 'late', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(227, 231, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(228, 232, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(229, 233, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(230, 234, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(231, 235, '00:00:00', '00:00:00', 0, 'absent', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(232, 236, '12:00:00', '19:12:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(233, 237, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(234, 238, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(235, 239, '21:08:00', '17:00:00', 1, 'late', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(236, 240, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(237, 241, '12:14:00', '19:30:00', 1, 'late', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(238, 242, '12:15:00', '19:06:00', 1, 'late', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(239, 243, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(240, 244, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(241, 245, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(242, 246, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(243, 247, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(244, 248, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(245, 249, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(246, 250, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(247, 251, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(248, 252, '00:00:00', '00:00:00', 0, 'absent', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(249, 253, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(250, 254, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(251, 255, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(252, 256, '12:00:00', '19:01:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(253, 257, '00:00:00', '00:00:00', 0, 'absent', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(254, 258, '00:00:00', '00:00:00', 0, 'absent', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(255, 259, '12:00:00', '19:08:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(256, 260, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(257, 261, '21:00:00', '16:51:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(258, 262, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(259, 263, '21:00:00', '16:47:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(260, 264, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(261, 265, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(262, 266, '12:20:00', '19:01:00', 1, 'late', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(263, 267, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(264, 268, '21:00:00', '16:37:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(265, 269, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(266, 270, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(267, 271, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(268, 272, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(269, 273, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(270, 274, '00:00:00', '00:00:00', 0, 'absent', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(271, 275, '00:00:00', '00:00:00', 0, 'absent', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(272, 276, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(273, 277, '21:07:00', '16:37:00', 1, 'late', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(274, 278, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(275, 279, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(276, 280, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(277, 281, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(278, 282, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(279, 283, '00:00:00', '00:00:00', 0, 'absent', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(280, 284, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(281, 285, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(282, 286, '12:21:00', '19:30:00', 1, 'late', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(283, 287, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(284, 288, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(285, 289, '12:30:00', '19:30:00', 1, 'late', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(286, 290, '21:00:00', '16:32:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(287, 291, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(288, 292, '21:17:00', '17:00:00', 1, 'late', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(289, 293, '00:00:00', '00:00:00', 0, 'absent', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(290, 294, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(291, 295, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(292, 296, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(293, 297, '21:00:00', '16:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(294, 298, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(295, 299, '00:00:00', '00:00:00', 0, 'absent', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(296, 300, '00:00:00', '00:00:00', 0, 'absent', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(297, 301, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(298, 302, '21:00:00', '16:54:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(299, 303, '21:00:00', '17:00:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(300, 304, '12:00:00', '19:30:00', 0, 'present', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(301, 5, '00:00:00', '00:00:00', 0, 'absent', '2025-06-02 11:32:50', '2025-06-02 11:34:56');

-- --------------------------------------------------------

--
-- Table structure for table `admission_activities`
--

CREATE TABLE `admission_activities` (
  `id` bigint UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `kegiatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_kegiatan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dokumen_pendukung` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Dijadwalkan','Berlangsung','Selesai') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Dijadwalkan',
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admission_activities`
--

INSERT INTO `admission_activities` (`id`, `tanggal`, `kegiatan`, `deskripsi_kegiatan`, `dokumen_pendukung`, `status`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, '2025-04-24', 'Kegiatan Test Tahun Ajaran Baru', 'Kegiatan ini bertujuan untuk melakukan test kepada calon siswa tahun ajaran baru', 'dokumen_admission/QYwDbSVFnEZAQMIMxKyXHx2yMxWoNDCRR2NaUtfK.png', 'Berlangsung', 'Harap agara setiap team yang bertugas untuk hadir', '2025-04-23 20:27:01', '2025-04-23 20:30:40'),
(4, '2025-05-01', 'Contoh Kegiatan', 'Deskripsi Kegiatan', 'dokumen_admission/bNbRg07vN3X88OBL5x0xjl1NFQBgJUceeiPjyEDD.png', 'Dijadwalkan', 'Keterangan', '2025-04-23 22:39:19', '2025-04-23 22:39:19');

-- --------------------------------------------------------

--
-- Table structure for table `approvals`
--

CREATE TABLE `approvals` (
  `id` bigint UNSIGNED NOT NULL,
  `module_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `module_id` bigint UNSIGNED NOT NULL,
  `current_level` int NOT NULL DEFAULT '1',
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_by` bigint UNSIGNED NOT NULL,
  `approved_by` bigint UNSIGNED DEFAULT NULL,
  `rejected_by` bigint UNSIGNED DEFAULT NULL,
  `rejected_message` text COLLATE utf8mb4_unicode_ci,
  `rejected_at` timestamp NULL DEFAULT NULL,
  `approved_at` timestamp NULL DEFAULT NULL,
  `final_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approval_history` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `approvals`
--

INSERT INTO `approvals` (`id`, `module_type`, `module_id`, `current_level`, `status`, `created_by`, `approved_by`, `rejected_by`, `rejected_message`, `rejected_at`, `approved_at`, `final_status`, `approval_history`, `created_at`, `updated_at`) VALUES
(1, 'Request ATK', 2, 1, 'pending', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-27 23:53:53', '2025-05-27 23:53:53'),
(2, 'Request ATK', 3, 1, 'pending', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-27 23:54:04', '2025-05-27 23:54:04');

-- --------------------------------------------------------

--
-- Table structure for table `approval_settings`
--

CREATE TABLE `approval_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `approvers`
--

CREATE TABLE `approvers` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `module` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cuti',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `approval_level` tinyint NOT NULL DEFAULT '1',
  `department_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'non-akademik',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `approvers`
--

INSERT INTO `approvers` (`id`, `user_id`, `module`, `description`, `active`, `approval_level`, `department_type`, `created_at`, `updated_at`) VALUES
(18, 1, 'cuti', NULL, 1, 1, 'non-akademik', '2025-05-28 10:09:51', '2025-05-28 10:09:51'),
(19, 1, 'cuti', NULL, 1, 2, 'non-akademik', '2025-05-28 10:10:07', '2025-05-28 10:10:07'),
(20, 1, 'cuti', NULL, 1, 3, 'non-akademik', '2025-05-28 10:10:15', '2025-05-28 10:10:15'),
(21, 1, 'fotocopy', NULL, 1, 2, 'non-akademik', '2025-05-28 10:16:59', '2025-05-28 10:16:59'),
(22, 1, 'fotocopy', NULL, 1, 3, 'non-akademik', '2025-05-28 10:17:10', '2025-05-28 10:17:10'),
(23, 1, 'fotocopy', NULL, 1, 1, 'non-akademik', '2025-05-28 10:38:20', '2025-05-28 10:38:20');

-- --------------------------------------------------------

--
-- Table structure for table `barangs`
--

CREATE TABLE `barangs` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_barang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_barang` int NOT NULL,
  `nama_ruangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_ruangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barangs`
--

INSERT INTO `barangs` (`id`, `nama_barang`, `jumlah_barang`, `nama_ruangan`, `nomor_ruangan`, `created_at`, `updated_at`) VALUES
(1, 'Laptop Macbook Pro 2022', 1, 'Kelas VII', '7A', '2025-04-23 20:56:58', '2025-04-23 20:58:56'),
(3, 'Monitor', 1, 'Kelas VIII', '8A', '2025-04-23 22:45:23', '2025-04-23 22:45:23');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cutis`
--

CREATE TABLE `cutis` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` bigint UNSIGNED NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `alasan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `dokumen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telepon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','approved','rejected') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `approved_by` bigint UNSIGNED DEFAULT NULL,
  `approved_at` timestamp NULL DEFAULT NULL,
  `department_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'non-akademik',
  `current_approval_level` int NOT NULL DEFAULT '0',
  `final_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rejected_message` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rejected_by` bigint UNSIGNED DEFAULT NULL,
  `rejected_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `approval_history` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cutis`
--

INSERT INTO `cutis` (`id`, `employee_id`, `tanggal_mulai`, `tanggal_selesai`, `alasan`, `keterangan`, `dokumen`, `telepon`, `status`, `approved_by`, `approved_at`, `department_type`, `current_approval_level`, `final_status`, `rejected_message`, `rejected_by`, `rejected_at`, `created_at`, `updated_at`, `approval_history`) VALUES
(10, 10, '2025-05-02', '2025-05-23', 'Sakit', 'test', 'private/dokumen_cuti/c8mMBGLSE4Fehhu6tdSDcVqNMKiOEYGdMgYtDQ28.jpg', '2131', 'approved', NULL, NULL, 'non-akademik', 0, NULL, NULL, NULL, NULL, '2025-05-21 12:44:04', '2025-05-22 10:58:44', NULL),
(11, 2, '2025-05-16', '2025-05-20', 'Izin', 'Liburan', 'private/dokumen_cuti/9uCm6IfOL9CIMHinMfVKzKaRvYv5Gl245Bus1qRK.pdf', '081228480149', 'pending', NULL, NULL, 'non-akademik', 0, NULL, '-', NULL, NULL, '2025-05-21 18:47:52', '2025-05-21 18:54:15', NULL),
(12, 10, '2025-05-22', '2025-05-30', 'Cuti', 'test', NULL, '123123', 'rejected', NULL, NULL, 'non-akademik', 2, 'rejected', 'yahayu gagal', 1, '2025-05-22 11:21:56', '2025-05-22 11:19:14', '2025-05-22 11:21:56', NULL),
(13, 10, '2025-05-24', '2025-05-24', 'Cuti', 'test', NULL, '12312', 'approved', 1, '2025-05-22 11:43:53', 'non-akademik', 2, 'approved', NULL, NULL, NULL, '2025-05-22 11:32:11', '2025-05-22 11:43:53', NULL),
(14, 10, '2025-05-22', '2025-05-24', 'Sakit', 'test', NULL, '1213', 'approved', 1, '2025-05-22 11:43:54', 'non-akademik', 2, 'approved', NULL, NULL, NULL, '2025-05-22 11:42:57', '2025-05-22 11:43:54', NULL),
(15, 10, '2025-05-29', '2025-05-31', 'Izin', 'test', 'private/dokumen_cuti/cpWD7t9RQdG4uQUfRQKhMWxEwaDkLifhKo86DQaM.jpg', '123123', 'approved', 1, '2025-05-28 10:10:23', 'non-akademik', 3, 'approved', NULL, NULL, NULL, '2025-05-28 10:08:36', '2025-05-28 10:10:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `full_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `unit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employment_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_place` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `bpjs_ketenagakerjaan_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bpjs_kesehatan_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kk_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_education` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ktp_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `domicile_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `phone_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `npwp_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marital_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'aktif',
  `entry_date` date DEFAULT NULL,
  `exit_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `user_id`, `full_name`, `employee_number`, `created_at`, `updated_at`, `unit`, `division`, `employment_status`, `position`, `gender`, `blood_type`, `birth_place`, `birth_date`, `bpjs_ketenagakerjaan_number`, `bpjs_kesehatan_number`, `nik`, `kk_number`, `religion`, `last_education`, `ktp_address`, `domicile_address`, `phone_number`, `npwp_number`, `school_email`, `other_email`, `marital_status`, `employee_status`, `entry_date`, `exit_date`) VALUES
(2, 6, 'Asman Maryadi', 'EMP-0001', '2025-04-15 18:56:58', '2025-05-21 18:37:34', 'SD', 'Akademik', 'Pegawai Harian', 'Gardener', 'Laki-laki', 'AB', 'Sibolga', '1997-02-24', '627247035510304', '637172350594713', '1703556006230344', '386702811496675091', 'Hindu', 'D3', 'Dk. Ketandan No. 707, Pariaman 53292, Bengkulu', 'Jr. Gremet No. 636, Padang 39617, Lampung', '0493 7492 429', '26.598.758.2-971.568', 'marpaung.putu@example.com', 'irsad.purnawati@example.org', 'Cerai', 'tidak aktif', '2005-02-17', NULL),
(3, 7, 'Samiah Anggraini', 'EMP-0002', '2025-04-15 18:56:58', '2025-05-21 18:38:07', 'SMP', 'Akademik', 'Pegawai Tetap', 'Kurir', 'Laki-laki', 'O', 'Makassar', '1981-07-24', '627909176993517', '637855242200497', '5203092009199044', '358057155603706352', 'Konghucu', 'D3', 'Psr. Bagonwoto  No. 788, Sorong 18276, Pabar', 'Jr. Krakatau No. 502, Ambon 94832, Lampung', '025 3391 336', '15.498.838.7-235.023', 'kartika.nasyiah@example.org', 'tania.palastri@example.org', 'Menikah', 'tidak aktif', '1979-06-30', NULL),
(4, 8, 'Taswir Hakim', 'EMP-0003', '2025-04-15 18:56:58', '2025-05-21 18:40:26', 'SD', 'Non-Akademik', 'Pegawai Harian', 'Office Girl', 'Laki-laki', 'AB', 'Cilegon', '1985-03-17', '627756289892303', '637646978486802', '3314901007999600', '350877582890518288', 'Konghucu', 'SMA', 'Kpg. Bah Jaya No. 454, Tasikmalaya 98351, Sulbar', 'Ki. Sudirman No. 639, Makassar 33251, NTB', '(+62) 324 8571 849', '89.770.876.4-404.378', 'elvina.safitri@example.net', 'prabowo29@example.net', 'Cerai', 'tidak aktif', '2016-02-13', NULL),
(5, NULL, 'Puti Yuliarti', 'EMP-0004', '2025-04-15 18:56:58', '2025-04-15 18:56:58', 'SD', 'Non-Akademik', 'Pegawai Tetap', 'TIC', 'Laki-laki', 'AB', 'Banjar', '1991-10-11', '627380019597172', '637504160317668', '9106635708170464', '360962025825800674', 'Konghucu', 'S2', 'Jln. Flora No. 895, Mojokerto 75982, Babel', 'Ds. Ters. Pasir Koja No. 383, Tegal 40835, Pabar', '(+62) 321 2207 6763', '08.469.932.8-517.369', 'sabar08@example.net', 'kusmawati.okta@example.com', 'Belum Menikah', 'aktif', '2018-07-03', NULL),
(6, 9, 'Koko Thamrin', 'EMP-0005', '2025-04-15 18:56:58', '2025-05-21 18:41:05', 'PGTK', 'Akademik', 'Pegawai Tetap', 'Principal', 'Laki-laki', 'O', 'Kupang', '1976-09-19', '627777554999330', '637714028593710', '7312985008038391', '353047610749536863', 'Islam', 'D3', 'Dk. Bakin No. 913, Magelang 62673, NTB', 'Jln. Cihampelas No. 716, Cilegon 32082, NTB', '0808 0219 5534', '19.526.420.4-994.059', 'ynasyidah@example.org', 'bhasanah@example.com', 'Cerai', 'tidak aktif', '1971-07-11', NULL),
(7, 4, 'Lidya Keisha Halimah S.Sos', 'EMP-0006', '2025-04-15 18:56:58', '2025-04-15 18:58:30', 'SD', 'Akademik', 'Pegawai Kontrak', 'Staff Finance', 'Laki-laki', 'B', 'Kotamobagu', '2001-09-03', '627693555368207', '637846719829680', '3604377110222294', '367700144140508462', 'Katolik', 'D3', 'Dk. Abdul Muis No. 621, Blitar 76607, Jabar', 'Ki. Wahidin Sudirohusodo No. 888, Bandar Lampung 52194, Kalteng', '0470 2427 5490', '38.344.122.4-370.400', 'sinaga.kamila@example.com', 'kasiyah79@example.com', 'Menikah', 'aktif', '1974-07-02', NULL),
(8, NULL, 'Pandu Gaiman Ardianto', 'EMP-0007', '2025-04-15 18:56:58', '2025-04-15 18:56:58', 'SD', 'Akademik', 'Pegawai Harian', 'TIC', 'Laki-laki', 'O', 'Bukittinggi', '1996-06-27', '627587162873631', '637604665259900', '3319945102983762', '308278603602961776', 'Katolik', 'SMA', 'Ki. Nanas No. 928, Bitung 29807, Sulut', 'Jr. Laswi No. 955, Malang 20503, Gorontalo', '0801 7592 4648', '18.256.684.7-809.128', 'mala.putra@example.com', 'ganda21@example.com', 'Cerai', 'tidak aktif', '2022-06-10', NULL),
(9, NULL, 'Bakijan Lembah Lazuardi', 'EMP-0008', '2025-04-15 18:56:58', '2025-04-15 18:56:58', 'SD', 'Akademik', 'Pegawai Harian', 'Principal', 'Perempuan', 'B', 'Palu', '1981-05-08', '627033856604879', '637292094077651', '1601766210048674', '337687601014673485', 'Katolik', 'D3', 'Jln. Babadan No. 953, Ambon 40402, Jabar', 'Gg. Nanas No. 892, Palopo 37258, Sulbar', '0567 6531 484', '96.241.883.8-709.713', 'restu.firmansyah@example.com', 'simbolon.aurora@example.net', 'Cerai', 'tidak aktif', '1978-05-15', NULL),
(10, 1, 'Yudha', 'EMP-0009', '2025-04-15 18:56:58', '2025-04-25 03:43:26', 'SMP', 'Non-Akademik', 'Pegawai Harian', 'IT', 'Laki-laki', 'AB', 'Tual', '1994-07-02', '627971187921054', '637730836036726', '1507181901183935', '350460927071983480', 'Muslim', 'SMA', 'Jr. Ketandan No. 923, Sorong 46381, Jambi', 'Ki. Ekonomi No. 870, Bima 48236, Kalbar', '0769 8873 360', '85.925.030.2-660.504', 'harjasa.mustofa@example.com', 'prasetyo.sakti@example.com', 'Menikah', 'aktif', '1976-12-06', NULL),
(11, NULL, 'Hamzah Hidayat', 'EMP-0010', '2025-04-15 18:56:58', '2025-04-15 18:56:58', 'SD', 'Non-Akademik', 'Pegawai Kontrak', 'Staff Operasional', 'Perempuan', 'A', 'Gorontalo', '1997-06-22', '627295141596696', '637265760882383', '6108560203128096', '396601348666985112', 'Buddha', 'S1', 'Jln. Sugiyopranoto No. 701, Tegal 85472, Pabar', 'Gg. PHH. Mustofa No. 342, Parepare 61753, Kaltim', '(+62) 828 2864 349', '32.218.531.8-690.387', 'marpaung.gadang@example.org', 'sihombing.zaenab@example.net', 'Belum Menikah', 'tidak aktif', '2004-05-23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `equipment_loans`
--

CREATE TABLE `equipment_loans` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `equipment_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loan_date` date NOT NULL,
  `return_date` date NOT NULL,
  `purpose` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `rejected_message` text COLLATE utf8mb4_unicode_ci,
  `approved_by` bigint UNSIGNED DEFAULT NULL,
  `rejected_by` bigint UNSIGNED DEFAULT NULL,
  `rejected_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `equipment_loans`
--

INSERT INTO `equipment_loans` (`id`, `user_id`, `equipment_name`, `unit`, `division`, `loan_date`, `return_date`, `purpose`, `status`, `rejected_message`, `approved_by`, `rejected_by`, `rejected_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Laptop', 'SMP', 'Non-Akademik', '2025-05-28', '2025-05-31', 'test', 'pending', NULL, NULL, NULL, NULL, '2025-05-28 00:04:36', '2025-05-28 00:04:36');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fixing_requests`
--

CREATE TABLE `fixing_requests` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `device_category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `division` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `damage_details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `supporting_document` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('pending','approved','rejected') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `rejected_message` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fixing_requests`
--

INSERT INTO `fixing_requests` (`id`, `user_id`, `device_category`, `unit`, `division`, `damage_details`, `supporting_document`, `status`, `rejected_message`, `created_at`, `updated_at`) VALUES
(1, 4, 'Laptop', 'SD', 'Akademik', 'Butuh bantuan install windows', NULL, 'rejected', 'Contoh', '2025-04-16 07:52:38', '2025-04-16 07:53:06'),
(2, 1, 'PC', 'SMP', 'Non-Akademik', 'test', 'fixing_documents/QGt8BRowhQfu0Ql03CUbf3bkO93E0YgcDC3U7e5n.jpg', 'pending', NULL, '2025-05-27 21:31:56', '2025-05-27 21:31:56');

-- --------------------------------------------------------

--
-- Table structure for table `izin_briefs`
--

CREATE TABLE `izin_briefs` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` bigint UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keperluan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dokumen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('pending','approved','rejected') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `rejected_message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `current_approval_level` int NOT NULL DEFAULT '0',
  `final_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approval_history` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `izin_briefs`
--

INSERT INTO `izin_briefs` (`id`, `employee_id`, `tanggal`, `waktu`, `keperluan`, `dokumen`, `status`, `rejected_message`, `created_at`, `updated_at`, `current_approval_level`, `final_status`, `approval_history`) VALUES
(6, 2, '2025-05-17', '10.00 - 12.00', 'Contoh keterangan', 'private/dokumen_brief/IUgbT7zoZod8xMIUqdcYlgZFlxYSmQ3nBLex3Ebj.pdf', 'approved', NULL, '2025-05-21 19:04:34', '2025-05-21 19:05:09', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `klaim_berobats`
--

CREATE TABLE `klaim_berobats` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` bigint UNSIGNED NOT NULL,
  `tanggal_berobat` date NOT NULL,
  `nama_pasien` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hubungan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `diagnosa` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_dokter` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_rs` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `biaya` decimal(12,2) NOT NULL,
  `bukti_pembayaran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','approved','rejected') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `rejected_message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `current_approval_level` int NOT NULL DEFAULT '0',
  `final_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approval_history` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `klaim_berobats`
--

INSERT INTO `klaim_berobats` (`id`, `employee_id`, `tanggal_berobat`, `nama_pasien`, `hubungan`, `diagnosa`, `nama_dokter`, `nama_rs`, `biaya`, `bukti_pembayaran`, `status`, `rejected_message`, `created_at`, `updated_at`, `current_approval_level`, `final_status`, `approval_history`) VALUES
(4, 2, '2025-05-17', 'Asman', 'Diri Sendiri', 'Demam Tinggi', 'Dokter Joko', 'Rumah Sakit Restu Ibu', 1000000.00, 'private/klaim_berobat/n9zB6AGnrtDBVVxXsy38WFbQLreHO7wYyhljYaLj.pdf', 'pending', NULL, '2025-05-21 19:13:50', '2025-05-21 19:13:50', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lembur_honor`
--

CREATE TABLE `lembur_honor` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` bigint UNSIGNED NOT NULL,
  `jenis` enum('lembur','honor') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `waktu_mulai` time DEFAULT NULL,
  `waktu_selesai` time DEFAULT NULL,
  `durasi` int DEFAULT NULL,
  `kegiatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `dokumen_pendukung` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('pending','approved','rejected') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `approved_by` bigint UNSIGNED DEFAULT NULL,
  `rejected_message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `rejected_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `current_approval_level` int NOT NULL DEFAULT '0',
  `final_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approval_history` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lembur_honor`
--

INSERT INTO `lembur_honor` (`id`, `employee_id`, `jenis`, `tanggal_mulai`, `tanggal_selesai`, `waktu_mulai`, `waktu_selesai`, `durasi`, `kegiatan`, `lokasi`, `keterangan`, `dokumen_pendukung`, `status`, `approved_by`, `rejected_message`, `rejected_at`, `created_at`, `updated_at`, `current_approval_level`, `final_status`, `approval_history`) VALUES
(7, 2, 'lembur', '2025-05-17', '2025-05-17', NULL, NULL, 3, 'Mengerjakan Report', 'Gedung A', 'Melanjutkan pengerjaan report bulanan', '1747883785_996016739721000-0100042551239100-020672895072000-20250516214340.pdf', 'approved', 7, NULL, NULL, '2025-05-21 20:16:25', '2025-05-21 20:17:19', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_03_19_172646_create_students_table', 2),
(5, '2025_03_13_043954_create_employees_table', 3),
(6, '2025_03_13_054908_create_salary_components_table', 3),
(7, '2025_03_13_060413_create_shifts_table', 3),
(8, '2025_03_13_060415_create_schedules_table', 3),
(9, '2025_03_13_060525_create_absences_table', 3),
(10, '2025_03_13_062838_create_payrolls_table', 3),
(11, '2025_03_13_063022_create_payroll_components_table', 3),
(12, '2025_04_15_170239_create_roles_table', 4),
(13, '2025_04_15_170313_add_role_id_on_users_table', 4),
(14, '2025_04_15_173709_update_employees_table', 4),
(15, '2025_04_15_175559_create_cutis_table', 4),
(16, '2025_04_15_183058_create_fixing_requests_table', 4),
(17, '2025_04_24_041326_create_student_registrations_table', 5),
(18, '2025_04_24_042249_create_admission_activities_table', 6),
(19, '2025_04_24_043818_create_barangs_table', 7),
(20, '2025_04_24_043826_create_pengecekan_barangs_table', 7),
(21, '2025_04_24_053205_create_operational_requests_table', 8),
(22, '2025_04_30_023741_create_pengajuan_fotocopy_table', 9),
(23, '2025_04_30_025142_create_peminjaman_ruangans_table', 10),
(24, '2025_05_01_000001_create_user_permissions_table', 11),
(25, '2025_05_01_000002_create_approval_workflows_table', 12),
(26, '2025_05_01_000003_create_approval_requests_table', 12),
(28, '2025_05_02_000000_update_approval_settings_for_hierarchy', 14),
(29, '2025_05_02_000000_create_approval_workflows_table', 15),
(30, '2025_05_03_000000_add_approval_fields_to_cuti_table', 15),
(32, '2025_05_01_000000_create_approval_settings_table', 17),
(33, '2025_05_01_000001_add_approval_fields_to_cutis_table', 18),
(34, '2024_03_21_create_cuti_approvals_table', 19),
(35, '2024_03_21_update_approval_settings_table', 20),
(36, '2025_05_02_000000_add_department_type_to_cutis', 21),
(37, '2025_05_03_000000_create_approval_flows_table', 21),
(38, '2023_10_01_create_approval_settings_table', 22),
(39, '2023_10_02_add_role_id_to_approval_settings', 22),
(40, '2025_05_21_162602_create_approval_settings_table', 23),
(42, '2025_05_21_163938_create_izin_briefs_table', 24),
(43, '2025_06_05_113025_create_klaim_berobats_table', 25),
(44, '2025_07_01_000000_create_slip_gaji_skk_table', 26),
(45, '2023_08_01_000004_create_pinjaman_cicilan_table', 27),
(46, '2023_08_01_000005_create_lembur_honor_table', 28),
(47, '2025_05_21_191230_create_surat_tugas_table', 29),
(48, '2025_05_22_175751_add_approval_level_to_approvers_table', 30),
(49, '2025_05_22_182855_add_department_type_to_approvers_table', 31),
(55, '2024_03_23_000000_add_approval_fields_to_request_fotocopies', 32),
(56, '2025_05_21_163026_create_approvers_table', 32),
(57, '2025_05_23_000000_add_approval_tracking_fields', 33),
(58, '2025_05_28_000000_create_equipment_loans_table', 33),
(59, '2025_05_28_000000_create_request_atk_table', 33),
(60, '2025_05_28_035246_add_employee_id_to_pengajuan_fotocopy_table', 34),
(61, '2025_05_28_035307_modify_pengajuan_fotocopy_table', 34),
(62, '2025_05_28_051426_create_permintaan_designs_table', 34),
(63, '2025_05_28_000000_add_approval_fields_to_pengajuan_fotocopy', 35),
(64, '2024_03_28_create_approvals_table', 36),
(65, '2025_05_28_000000_add_approval_fields_to_request_atk', 37),
(66, '2024_03_21_create_absences_table', 38),
(67, '2024_03_21_create_schedules_table', 38),
(68, '2024_03_21_create_shifts_table', 38);

-- --------------------------------------------------------

--
-- Table structure for table `operational_requests`
--

CREATE TABLE `operational_requests` (
  `id` bigint UNSIGNED NOT NULL,
  `unit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `divisi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `request_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` enum('Kurir','Mobil') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `dari_jam` time NOT NULL,
  `sampai_jam` time NOT NULL,
  `tujuan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keperluan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `operational_requests`
--

INSERT INTO `operational_requests` (`id`, `unit`, `divisi`, `request_by`, `jenis`, `tanggal`, `dari_jam`, `sampai_jam`, `tujuan`, `keperluan`, `keterangan`, `created_at`, `updated_at`) VALUES
(2, 'SD', 'Akademik', 'Lidya Keisha Halimah S.Sos', 'Mobil', '2025-05-01', '12:00:00', '17:00:00', 'Jakarta Pusat, Grand Indonesia Mall', 'Meeting dengan Vendor Aplikasi', 'Butuh dengan driver juga', '2025-04-23 21:42:30', '2025-04-23 21:45:18'),
(3, 'SD', 'Akademik', 'Lidya Keisha Halimah S.Sos', 'Mobil', '2025-04-25', '12:00:00', '17:00:00', 'Jakarta Selatan', 'Meeting', '-', '2025-04-23 22:52:55', '2025-04-23 22:52:55'),
(5, 'SMP', 'Non-Akademik', 'Yudha', 'Kurir', '2025-05-28', '12:30:00', '13:00:00', 'test', 'test', 'test', '2025-05-27 22:29:36', '2025-05-27 22:29:36'),
(6, 'SMP', 'Non-Akademik', 'Yudha', 'Kurir', '2025-05-28', '10:30:00', '13:00:00', 'test', 'test', 'test', '2025-05-28 00:06:07', '2025-05-28 00:06:07');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payrolls`
--

CREATE TABLE `payrolls` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` bigint UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `amount` bigint NOT NULL,
  `status` enum('paid','unpaid') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unpaid',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payroll_components`
--

CREATE TABLE `payroll_components` (
  `id` bigint UNSIGNED NOT NULL,
  `payroll_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `amount` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman_ruangan`
--

CREATE TABLE `peminjaman_ruangan` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_karyawan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_pengajuan` date NOT NULL,
  `tanggal_diperlukan` date NOT NULL,
  `waktu_pelaksanaan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `departemen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kegiatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_kegiatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ruangan` json NOT NULL,
  `jumlah` json NOT NULL,
  `keterangan` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `peminjaman_ruangan`
--

INSERT INTO `peminjaman_ruangan` (`id`, `nama_karyawan`, `tanggal_pengajuan`, `tanggal_diperlukan`, `waktu_pelaksanaan`, `unit`, `departemen`, `nama_kegiatan`, `tempat_kegiatan`, `ruangan`, `jumlah`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Yudha', '2025-05-28', '2025-05-29', '09:00 - 12:00', 'SMP', 'test', 'test', 'test', '\"[\\\"Ruang C\\\"]\"', '\"[\\\"1\\\"]\"', '\"[\\\"test\\\"]\"', '2025-05-27 22:00:06', '2025-05-27 22:00:06'),
(3, 'Yudha', '2025-05-28', '2025-05-28', '09:00 - 12:00', 'SMP', 'Non-Akademik', 'test', 'test', '\"[\\\"Ruang B\\\"]\"', '\"[\\\"1\\\"]\"', '\"[\\\"test\\\"]\"', '2025-05-28 00:04:56', '2025-05-28 00:04:56');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_fotocopy`
--

CREATE TABLE `pengajuan_fotocopy` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` bigint UNSIGNED NOT NULL,
  `nama_lengkap` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_induk_karyawan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `divisi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_karyawan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kegiatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_penggunaan` date NOT NULL,
  `nama_barang` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `jumlah_halaman` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `jumlah_diperlukan` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `keterangan` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `status` enum('pending','approved','rejected') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `approved_by` bigint UNSIGNED DEFAULT NULL,
  `rejected_message` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rejected_at` timestamp NULL DEFAULT NULL,
  `rejected_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `current_approval_level` int NOT NULL DEFAULT '1',
  `final_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approval_history` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `approved_at` timestamp NULL DEFAULT NULL,
  `department_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'non-akademik'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengecekan_barang`
--

CREATE TABLE `pengecekan_barang` (
  `id` bigint UNSIGNED NOT NULL,
  `barang_id` bigint UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `kondisi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengecekan_barang`
--

INSERT INTO `pengecekan_barang` (`id`, `barang_id`, `tanggal`, `kondisi`, `created_at`, `updated_at`) VALUES
(1, 1, '2025-04-24', 'Sangat Baik', '2025-04-23 20:57:43', '2025-04-23 20:58:19'),
(3, 3, '2025-04-25', 'Baik', '2025-04-23 22:46:20', '2025-04-23 22:46:20'),
(4, 3, '2025-04-26', 'LCD Rusak', '2025-04-23 22:46:41', '2025-04-23 22:46:41');

-- --------------------------------------------------------

--
-- Table structure for table `permintaan_designs`
--

CREATE TABLE `permintaan_designs` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `divisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_lainnya` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `tanggal_deadline` date NOT NULL,
  `dokumen_pendukung` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Proses',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permintaan_designs`
--

INSERT INTO `permintaan_designs` (`id`, `user_id`, `nama`, `email`, `unit`, `divisi`, `kategori`, `kategori_lainnya`, `kegiatan`, `deskripsi`, `tanggal_deadline`, `dokumen_pendukung`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Yudha', 'yudha@sekolahnoah.sch.id', 'SMP', 'Non-Akademik', 'PDF', NULL, 'test', 'test', '2025-05-23', 'permintaan_design/BZbz8BhaJGnIZwXLUz5qKQYYhztfKKc8UzQ3SzTK.jpg', 'Proses', '2025-05-28 00:05:26', '2025-05-28 00:05:39');

-- --------------------------------------------------------

--
-- Table structure for table `pinjaman_cicilan`
--

CREATE TABLE `pinjaman_cicilan` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` bigint UNSIGNED NOT NULL,
  `jumlah_pinjaman` decimal(15,2) NOT NULL,
  `tujuan_pinjaman` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jangka_waktu` int NOT NULL,
  `cicilan_per_bulan` decimal(15,2) NOT NULL,
  `tanggal_pengajuan` date NOT NULL,
  `dokumen_pendukung` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('pending','approved','rejected') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `approved_by` bigint UNSIGNED DEFAULT NULL,
  `rejected_message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `rejected_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `current_approval_level` int NOT NULL DEFAULT '0',
  `final_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approval_history` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `request_atk`
--

CREATE TABLE `request_atk` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` bigint UNSIGNED DEFAULT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_induk_karyawan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `divisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_karyawan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang` json NOT NULL,
  `jumlah` json NOT NULL,
  `satuan` json NOT NULL,
  `keterangan` json NOT NULL,
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `rejected_message` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `approved_by` bigint UNSIGNED DEFAULT NULL,
  `approved_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request_atk`
--

INSERT INTO `request_atk` (`id`, `employee_id`, `nama_lengkap`, `nomor_induk_karyawan`, `unit`, `divisi`, `status_karyawan`, `jabatan`, `nama_barang`, `jumlah`, `satuan`, `keterangan`, `status`, `rejected_message`, `created_at`, `updated_at`, `approved_by`, `approved_at`) VALUES
(2, NULL, 'Yudha', 'EMP-0009', 'SMP', 'Non-Akademik', 'Pegawai Harian', 'IT', '\"[\\\"tes\\\"]\"', '\"[\\\"1\\\"]\"', '\"[\\\"pcs\\\"]\"', '\"[\\\"test\\\"]\"', 'pending', NULL, '2025-05-27 23:53:53', '2025-05-27 23:53:53', NULL, NULL),
(3, NULL, 'Yudha', 'EMP-0009', 'SMP', 'Non-Akademik', 'Pegawai Harian', 'IT', '\"[\\\"test\\\"]\"', '\"[\\\"1\\\"]\"', '\"[\\\"pcs\\\"]\"', '\"[\\\"test\\\"]\"', 'pending', NULL, '2025-05-27 23:54:04', '2025-05-27 23:54:04', NULL, NULL),
(4, NULL, 'Yudha', '1507181901183935', 'SMP', 'Non-Akademik', 'aktif', 'IT', '[\"test\"]', '[\"1\"]', '[\"pcs\"]', '[\"test\"]', 'pending', NULL, '2025-05-28 00:09:02', '2025-05-28 00:09:02', NULL, NULL),
(5, NULL, 'Yudha', '1507181901183935', 'SMP', 'Non-Akademik', 'aktif', 'IT', '[\"test\"]', '[\"1\"]', '[\"box\"]', '[\"test\"]', 'pending', NULL, '2025-05-28 00:09:16', '2025-05-28 00:09:16', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL),
(2, 'User', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `salary_components`
--

CREATE TABLE `salary_components` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `amount` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salary_components`
--

INSERT INTO `salary_components` (`id`, `employee_id`, `title`, `description`, `amount`, `created_at`, `updated_at`) VALUES
(1, 5, 'gaji pokok', 'ini gaji pokok', 3000000, '2025-06-02 05:25:46', '2025-06-02 05:25:46'),
(2, 5, 'tunjangan kesehatan', 'ini tunjangan', 2000000, '2025-06-02 05:26:11', '2025-06-02 05:26:11');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint UNSIGNED NOT NULL,
  `shift_id` bigint UNSIGNED NOT NULL,
  `employee_id` bigint UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `shift_id`, `employee_id`, `date`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2025-04-16', '2025-04-16 07:31:13', '2025-04-16 07:31:13'),
(2, 2, 3, '2025-04-17', '2025-04-16 07:31:28', '2025-04-16 07:31:28'),
(5, 1, 2, '2025-06-02', '2025-06-02 11:23:37', '2025-06-02 11:23:37'),
(6, 2, 3, '2025-06-02', '2025-06-02 11:24:22', '2025-06-02 11:24:22'),
(7, 1, 4, '2025-06-02', '2025-06-02 11:24:22', '2025-06-02 11:24:22'),
(8, 2, 5, '2025-06-02', '2025-06-02 11:24:28', '2025-06-02 11:24:28'),
(9, 2, 6, '2025-06-02', '2025-06-02 11:24:28', '2025-06-02 11:24:28'),
(10, 2, 7, '2025-06-02', '2025-06-02 11:24:28', '2025-06-02 11:24:28'),
(11, 1, 8, '2025-06-02', '2025-06-02 11:24:28', '2025-06-02 11:24:28'),
(12, 1, 9, '2025-06-02', '2025-06-02 11:24:28', '2025-06-02 11:24:28'),
(13, 2, 10, '2025-06-02', '2025-06-02 11:24:28', '2025-06-02 11:24:28'),
(14, 1, 11, '2025-06-02', '2025-06-02 11:24:28', '2025-06-02 11:24:28'),
(15, 2, 2, '2025-06-01', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(16, 1, 3, '2025-06-01', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(17, 1, 4, '2025-06-01', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(18, 2, 5, '2025-06-01', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(19, 2, 6, '2025-06-01', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(20, 1, 7, '2025-06-01', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(21, 2, 8, '2025-06-01', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(22, 1, 9, '2025-06-01', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(23, 1, 10, '2025-06-01', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(24, 2, 11, '2025-06-01', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(25, 1, 2, '2025-05-31', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(26, 1, 3, '2025-05-31', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(27, 2, 4, '2025-05-31', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(28, 2, 5, '2025-05-31', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(29, 2, 6, '2025-05-31', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(30, 2, 7, '2025-05-31', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(31, 1, 8, '2025-05-31', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(32, 1, 9, '2025-05-31', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(33, 2, 10, '2025-05-31', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(34, 1, 11, '2025-05-31', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(35, 2, 2, '2025-05-30', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(36, 2, 3, '2025-05-30', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(37, 2, 4, '2025-05-30', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(38, 2, 5, '2025-05-30', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(39, 1, 6, '2025-05-30', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(40, 1, 7, '2025-05-30', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(41, 1, 8, '2025-05-30', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(42, 2, 9, '2025-05-30', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(43, 1, 10, '2025-05-30', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(44, 1, 11, '2025-05-30', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(45, 2, 2, '2025-05-29', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(46, 2, 3, '2025-05-29', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(47, 1, 4, '2025-05-29', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(48, 1, 5, '2025-05-29', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(49, 2, 6, '2025-05-29', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(50, 2, 7, '2025-05-29', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(51, 2, 8, '2025-05-29', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(52, 2, 9, '2025-05-29', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(53, 1, 10, '2025-05-29', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(54, 2, 11, '2025-05-29', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(55, 2, 2, '2025-05-28', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(56, 1, 3, '2025-05-28', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(57, 2, 4, '2025-05-28', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(58, 1, 5, '2025-05-28', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(59, 2, 6, '2025-05-28', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(60, 1, 7, '2025-05-28', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(61, 2, 8, '2025-05-28', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(62, 2, 9, '2025-05-28', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(63, 1, 10, '2025-05-28', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(64, 2, 11, '2025-05-28', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(65, 1, 2, '2025-05-27', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(66, 2, 3, '2025-05-27', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(67, 2, 4, '2025-05-27', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(68, 1, 5, '2025-05-27', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(69, 1, 6, '2025-05-27', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(70, 1, 7, '2025-05-27', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(71, 1, 8, '2025-05-27', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(72, 1, 9, '2025-05-27', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(73, 2, 10, '2025-05-27', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(74, 1, 11, '2025-05-27', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(75, 2, 2, '2025-05-26', '2025-06-02 11:24:59', '2025-06-02 11:24:59'),
(76, 1, 3, '2025-05-26', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(77, 1, 4, '2025-05-26', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(78, 1, 5, '2025-05-26', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(79, 2, 6, '2025-05-26', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(80, 1, 7, '2025-05-26', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(81, 1, 8, '2025-05-26', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(82, 2, 9, '2025-05-26', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(83, 2, 10, '2025-05-26', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(84, 1, 11, '2025-05-26', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(85, 2, 2, '2025-05-25', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(86, 2, 3, '2025-05-25', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(87, 1, 4, '2025-05-25', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(88, 2, 5, '2025-05-25', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(89, 2, 6, '2025-05-25', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(90, 1, 7, '2025-05-25', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(91, 1, 8, '2025-05-25', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(92, 1, 9, '2025-05-25', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(93, 2, 10, '2025-05-25', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(94, 2, 11, '2025-05-25', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(95, 1, 2, '2025-05-24', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(96, 2, 3, '2025-05-24', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(97, 2, 4, '2025-05-24', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(98, 1, 5, '2025-05-24', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(99, 2, 6, '2025-05-24', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(100, 1, 7, '2025-05-24', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(101, 2, 8, '2025-05-24', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(102, 2, 9, '2025-05-24', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(103, 2, 10, '2025-05-24', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(104, 1, 11, '2025-05-24', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(105, 2, 2, '2025-05-23', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(106, 2, 3, '2025-05-23', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(107, 1, 4, '2025-05-23', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(108, 1, 5, '2025-05-23', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(109, 2, 6, '2025-05-23', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(110, 2, 7, '2025-05-23', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(111, 1, 8, '2025-05-23', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(112, 2, 9, '2025-05-23', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(113, 1, 10, '2025-05-23', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(114, 2, 11, '2025-05-23', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(115, 1, 2, '2025-05-22', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(116, 2, 3, '2025-05-22', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(117, 2, 4, '2025-05-22', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(118, 1, 5, '2025-05-22', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(119, 2, 6, '2025-05-22', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(120, 2, 7, '2025-05-22', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(121, 2, 8, '2025-05-22', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(122, 1, 9, '2025-05-22', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(123, 1, 10, '2025-05-22', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(124, 2, 11, '2025-05-22', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(125, 1, 2, '2025-05-21', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(126, 2, 3, '2025-05-21', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(127, 1, 4, '2025-05-21', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(128, 2, 5, '2025-05-21', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(129, 2, 6, '2025-05-21', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(130, 1, 7, '2025-05-21', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(131, 2, 8, '2025-05-21', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(132, 1, 9, '2025-05-21', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(133, 2, 10, '2025-05-21', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(134, 2, 11, '2025-05-21', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(135, 2, 2, '2025-05-20', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(136, 2, 3, '2025-05-20', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(137, 2, 4, '2025-05-20', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(138, 2, 5, '2025-05-20', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(139, 1, 6, '2025-05-20', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(140, 1, 7, '2025-05-20', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(141, 2, 8, '2025-05-20', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(142, 2, 9, '2025-05-20', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(143, 1, 10, '2025-05-20', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(144, 2, 11, '2025-05-20', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(145, 1, 2, '2025-05-19', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(146, 1, 3, '2025-05-19', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(147, 2, 4, '2025-05-19', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(148, 2, 5, '2025-05-19', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(149, 1, 6, '2025-05-19', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(150, 1, 7, '2025-05-19', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(151, 2, 8, '2025-05-19', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(152, 1, 9, '2025-05-19', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(153, 2, 10, '2025-05-19', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(154, 2, 11, '2025-05-19', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(155, 1, 2, '2025-05-18', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(156, 1, 3, '2025-05-18', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(157, 1, 4, '2025-05-18', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(158, 1, 5, '2025-05-18', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(159, 1, 6, '2025-05-18', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(160, 1, 7, '2025-05-18', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(161, 2, 8, '2025-05-18', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(162, 2, 9, '2025-05-18', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(163, 2, 10, '2025-05-18', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(164, 1, 11, '2025-05-18', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(165, 2, 2, '2025-05-17', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(166, 1, 3, '2025-05-17', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(167, 1, 4, '2025-05-17', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(168, 2, 5, '2025-05-17', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(169, 1, 6, '2025-05-17', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(170, 2, 7, '2025-05-17', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(171, 1, 8, '2025-05-17', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(172, 2, 9, '2025-05-17', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(173, 1, 10, '2025-05-17', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(174, 2, 11, '2025-05-17', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(175, 2, 2, '2025-05-16', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(176, 1, 3, '2025-05-16', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(177, 2, 4, '2025-05-16', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(178, 1, 5, '2025-05-16', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(179, 1, 6, '2025-05-16', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(180, 1, 7, '2025-05-16', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(181, 2, 8, '2025-05-16', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(182, 2, 9, '2025-05-16', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(183, 2, 10, '2025-05-16', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(184, 1, 11, '2025-05-16', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(185, 2, 2, '2025-05-15', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(186, 1, 3, '2025-05-15', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(187, 2, 4, '2025-05-15', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(188, 1, 5, '2025-05-15', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(189, 1, 6, '2025-05-15', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(190, 2, 7, '2025-05-15', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(191, 2, 8, '2025-05-15', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(192, 2, 9, '2025-05-15', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(193, 2, 10, '2025-05-15', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(194, 1, 11, '2025-05-15', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(195, 1, 2, '2025-05-14', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(196, 1, 3, '2025-05-14', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(197, 1, 4, '2025-05-14', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(198, 1, 5, '2025-05-14', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(199, 1, 6, '2025-05-14', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(200, 2, 7, '2025-05-14', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(201, 2, 8, '2025-05-14', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(202, 2, 9, '2025-05-14', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(203, 1, 10, '2025-05-14', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(204, 2, 11, '2025-05-14', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(205, 1, 2, '2025-05-13', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(206, 1, 3, '2025-05-13', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(207, 1, 4, '2025-05-13', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(208, 1, 5, '2025-05-13', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(209, 1, 6, '2025-05-13', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(210, 2, 7, '2025-05-13', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(211, 2, 8, '2025-05-13', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(212, 1, 9, '2025-05-13', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(213, 2, 10, '2025-05-13', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(214, 1, 11, '2025-05-13', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(215, 1, 2, '2025-05-12', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(216, 2, 3, '2025-05-12', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(217, 1, 4, '2025-05-12', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(218, 1, 5, '2025-05-12', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(219, 2, 6, '2025-05-12', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(220, 2, 7, '2025-05-12', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(221, 1, 8, '2025-05-12', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(222, 2, 9, '2025-05-12', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(223, 2, 10, '2025-05-12', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(224, 1, 11, '2025-05-12', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(225, 1, 2, '2025-05-11', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(226, 2, 3, '2025-05-11', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(227, 1, 4, '2025-05-11', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(228, 1, 5, '2025-05-11', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(229, 2, 6, '2025-05-11', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(230, 2, 7, '2025-05-11', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(231, 2, 8, '2025-05-11', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(232, 1, 9, '2025-05-11', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(233, 2, 10, '2025-05-11', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(234, 1, 11, '2025-05-11', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(235, 2, 2, '2025-05-10', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(236, 2, 3, '2025-05-10', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(237, 1, 4, '2025-05-10', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(238, 1, 5, '2025-05-10', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(239, 1, 6, '2025-05-10', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(240, 1, 7, '2025-05-10', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(241, 2, 8, '2025-05-10', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(242, 2, 9, '2025-05-10', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(243, 2, 10, '2025-05-10', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(244, 2, 11, '2025-05-10', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(245, 1, 2, '2025-05-09', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(246, 1, 3, '2025-05-09', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(247, 1, 4, '2025-05-09', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(248, 2, 5, '2025-05-09', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(249, 2, 6, '2025-05-09', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(250, 1, 7, '2025-05-09', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(251, 1, 8, '2025-05-09', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(252, 2, 9, '2025-05-09', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(253, 2, 10, '2025-05-09', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(254, 1, 11, '2025-05-09', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(255, 2, 2, '2025-05-08', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(256, 2, 3, '2025-05-08', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(257, 2, 4, '2025-05-08', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(258, 2, 5, '2025-05-08', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(259, 2, 6, '2025-05-08', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(260, 2, 7, '2025-05-08', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(261, 1, 8, '2025-05-08', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(262, 1, 9, '2025-05-08', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(263, 1, 10, '2025-05-08', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(264, 2, 11, '2025-05-08', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(265, 1, 2, '2025-05-07', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(266, 2, 3, '2025-05-07', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(267, 1, 4, '2025-05-07', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(268, 1, 5, '2025-05-07', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(269, 2, 6, '2025-05-07', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(270, 1, 7, '2025-05-07', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(271, 2, 8, '2025-05-07', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(272, 2, 9, '2025-05-07', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(273, 1, 10, '2025-05-07', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(274, 1, 11, '2025-05-07', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(275, 1, 2, '2025-05-06', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(276, 1, 3, '2025-05-06', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(277, 1, 4, '2025-05-06', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(278, 2, 5, '2025-05-06', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(279, 2, 6, '2025-05-06', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(280, 2, 7, '2025-05-06', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(281, 1, 8, '2025-05-06', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(282, 1, 9, '2025-05-06', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(283, 2, 10, '2025-05-06', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(284, 2, 11, '2025-05-06', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(285, 2, 2, '2025-05-05', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(286, 2, 3, '2025-05-05', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(287, 2, 4, '2025-05-05', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(288, 1, 5, '2025-05-05', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(289, 2, 6, '2025-05-05', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(290, 1, 7, '2025-05-05', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(291, 2, 8, '2025-05-05', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(292, 1, 9, '2025-05-05', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(293, 1, 10, '2025-05-05', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(294, 1, 11, '2025-05-05', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(295, 2, 2, '2025-05-04', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(296, 1, 3, '2025-05-04', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(297, 1, 4, '2025-05-04', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(298, 2, 5, '2025-05-04', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(299, 1, 6, '2025-05-04', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(300, 2, 7, '2025-05-04', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(301, 1, 8, '2025-05-04', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(302, 1, 9, '2025-05-04', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(303, 1, 10, '2025-05-04', '2025-06-02 11:25:00', '2025-06-02 11:25:00'),
(304, 2, 11, '2025-05-04', '2025-06-02 11:25:00', '2025-06-02 11:25:00');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('CMBJe5pNgMg8OTPDenVwCXddtmZLLPlATynjrR5i', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.0 Safari/605.1.15', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWEpJTWFTYnh0MTNNTlR3UUwzbzVrT2pxdU94RHhxVXdkeDZmMlYxMiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyOToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2Fic2VuY2UiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2xvZ2luIjt9fQ==', 1748880540),
('G5Yi4JHAr0hBWu3QaxXo6VqFlcRsl9ErcnGekEwl', 1, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.0 Safari/605.1.15', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoic0NzZ0FER3R5eUUzcjREM0thb001c1Y2M3dDUzBMR0tiUEVsVGh0YiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyMToiaHR0cDovLzEyNy4wLjAuMTo4MDAwIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hYnNlbmNlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1748868995),
('pujTgnSjCCiD1Epi5AmS4RRZE1b7R3twHRSTSDpW', 1, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.0 Safari/605.1.15', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZlF0NG1GanNKQzd1STl2MnR6VDRZYTFpRWRSQnVxNGR2WHc0MU4yQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hYnNlbmNlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1748889298);

-- --------------------------------------------------------

--
-- Table structure for table `shifts`
--

CREATE TABLE `shifts` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shifts`
--

INSERT INTO `shifts` (`id`, `title`, `description`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(1, 'Shift Pagi', 'Shift Pagi Pegawai', '21:00:00', '17:00:00', '2025-04-16 07:29:46', '2025-04-16 07:29:46'),
(2, 'Shift Siang', 'Shift Siang Pegawai', '12:00:00', '19:30:00', '2025-04-16 07:30:19', '2025-04-16 07:30:19');

-- --------------------------------------------------------

--
-- Table structure for table `slip_gaji_skk`
--

CREATE TABLE `slip_gaji_skk` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` bigint UNSIGNED NOT NULL,
  `jenis_permintaan` enum('Slip Gaji','Surat Keterangan Kerja') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `bulan_tahun` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dokumen_pendukung` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('pending','approved','rejected') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `rejected_message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `current_approval_level` int NOT NULL DEFAULT '0',
  `final_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approval_history` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slip_gaji_skk`
--

INSERT INTO `slip_gaji_skk` (`id`, `employee_id`, `jenis_permintaan`, `keterangan`, `bulan_tahun`, `dokumen_pendukung`, `status`, `rejected_message`, `created_at`, `updated_at`, `current_approval_level`, `final_status`, `approval_history`) VALUES
(4, 2, 'Slip Gaji', 'Kebutuhan Slip Gaji', '2025-05', 'private/slip_gaji_skk/HZDxwJjFrmuu7WQz2IHdnUmkMEKW7feAehfj11FH.pdf', 'approved', NULL, '2025-05-21 19:33:13', '2025-05-21 19:35:28', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint UNSIGNED NOT NULL,
  `full_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `national_school_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nickname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `place_of_birth` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` enum('male','female') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `religion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nationality` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `living_with` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `has_siblings_at_school` tinyint(1) NOT NULL,
  `previous_school_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `previous_school_class` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `previous_school_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `previous_school_phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_nationality` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_id_card_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_kitas_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_job` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_company` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_position` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_office_phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_office_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_monthly_income` decimal(10,2) NOT NULL,
  `mother_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_nationality` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_id_card_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_kitas_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_job` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_company` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_position` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_office_phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_office_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_monthly_income` decimal(10,2) NOT NULL,
  `guardian_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guardian_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guardian_phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guardian_nationality` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guardian_id_card_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guardian_kitas_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guardian_job` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guardian_company` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guardian_position` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guardian_office_phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guardian_office_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guardian_monthly_income` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `full_name`, `school_id`, `national_school_id`, `nickname`, `class`, `place_of_birth`, `date_of_birth`, `gender`, `religion`, `nationality`, `address`, `city`, `postal_code`, `living_with`, `has_siblings_at_school`, `previous_school_name`, `previous_school_class`, `previous_school_address`, `previous_school_phone`, `father_name`, `father_email`, `father_phone`, `father_nationality`, `father_id_card_number`, `father_kitas_number`, `father_job`, `father_company`, `father_position`, `father_office_phone`, `father_office_address`, `father_monthly_income`, `mother_name`, `mother_email`, `mother_phone`, `mother_nationality`, `mother_id_card_number`, `mother_kitas_number`, `mother_job`, `mother_company`, `mother_position`, `mother_office_phone`, `mother_office_address`, `mother_monthly_income`, `guardian_name`, `guardian_email`, `guardian_phone`, `guardian_nationality`, `guardian_id_card_number`, `guardian_kitas_number`, `guardian_job`, `guardian_company`, `guardian_position`, `guardian_office_phone`, `guardian_office_address`, `guardian_monthly_income`, `created_at`, `updated_at`) VALUES
(1, 'Andi Pratama', '123456789', '987654321', 'Andi', '5A', 'Jakarta', '2010-04-15', 'male', 'Islam', 'Indonesian', 'Jl. Merdeka No. 123, Jakarta', 'Jakarta', '10110', 'Father and Mother', 1, 'SD Harapan Bangsa', '4B', 'Jl. Pendidikan No. 45, Jakarta', '021-1234567', 'Budi Pratama', 'budi@example.com', '081234567890', 'Indonesian', '3501234567890001', NULL, 'Engineer', 'PT. ABC', 'Senior Engineer', '021-5678901', 'Jl. Industri No. 10, Jakarta', 15000000.00, 'Siti Aisyah', 'siti@example.com', '082345678901', 'Indonesian', '3509876543210002', NULL, 'Teacher', 'SMP Negeri 1', 'Mathematics Teacher', '021-2345678', 'Jl. Pendidikan No. 5, Jakarta', 8000000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-19 09:53:40', '2025-03-19 09:53:40'),
(2, 'Rina Sari', '987654321', '123456789', 'Rina', '4B', 'Surabaya', '2011-06-30', 'female', 'Christianity', 'Indonesian', 'Jl. Raya No. 456, Surabaya', 'Surabaya', '60123', 'Mother', 0, 'SD Pahlawan', '3A', 'Jl. Pahlawan No. 12, Surabaya', '031-2345678', 'Krisna Sari', 'krisna@example.com', '081234567891', 'Indonesian', '3509876543210003', NULL, 'Doctor', 'RSUD Surabaya', 'Surgeon', '031-9876543', 'Jl. Kesehatan No. 2, Surabaya', 20000000.00, 'Dewi Lestari', 'dewi@example.com', '082345678902', 'Indonesian', '3501234567890004', NULL, 'Nurse', 'RSUD Surabaya', 'Senior Nurse', '031-8765432', 'Jl. Kesehatan No. 2, Surabaya', 10000000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-19 09:53:40', '2025-03-19 09:53:40');

-- --------------------------------------------------------

--
-- Table structure for table `student_registrations`
--

CREATE TABLE `student_registrations` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_siswa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuan_kelas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `asal_sekolah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Proses','Diterima','Ditolak') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Proses',
  `pembayaran` tinyint(1) NOT NULL DEFAULT '0',
  `observasi` tinyint(1) NOT NULL DEFAULT '0',
  `pengumuman` tinyint(1) NOT NULL DEFAULT '0',
  `id_card` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_registrations`
--

INSERT INTO `student_registrations` (`id`, `nama_siswa`, `tujuan_kelas`, `asal_sekolah`, `status`, `pembayaran`, `observasi`, `pengumuman`, `id_card`, `created_at`, `updated_at`) VALUES
(1, 'Kevin Handoko', 'VII', 'SD Negeri 01 Jakarta Utara', 'Diterima', 1, 1, 1, 1, '2025-04-23 20:17:38', '2025-04-23 20:19:01'),
(2, 'David', 'XII', 'SD Negeri 01 Jakarta utara', 'Diterima', 1, 1, 1, 1, '2025-04-23 22:23:45', '2025-04-23 22:24:52');

-- --------------------------------------------------------

--
-- Table structure for table `surat_tugas`
--

CREATE TABLE `surat_tugas` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` bigint UNSIGNED NOT NULL,
  `nomor_surat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `judul_tugas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_tugas` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuan_tugas` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `lokasi_tugas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `dokumen_pendukung` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('pending','approved','rejected') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `approved_by` bigint UNSIGNED DEFAULT NULL,
  `rejected_message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `rejected_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `current_approval_level` int NOT NULL DEFAULT '0',
  `final_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approval_history` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `surat_tugas`
--

INSERT INTO `surat_tugas` (`id`, `employee_id`, `nomor_surat`, `judul_tugas`, `deskripsi_tugas`, `tujuan_tugas`, `tanggal_mulai`, `tanggal_selesai`, `lokasi_tugas`, `keterangan`, `dokumen_pendukung`, `status`, `approved_by`, `rejected_message`, `rejected_at`, `created_at`, `updated_at`, `current_approval_level`, `final_status`, `approval_history`) VALUES
(4, 2, NULL, 'Tugas A', 'Deskripsi Tugas', 'Melakukan Tugas', '2025-05-17', '2025-05-18', 'Jakarta Pusat', 'Keterangan Tambahan', '1747884753_996016739721000-0100042551239098-020672895072000-20250320193004.pdf', 'pending', NULL, NULL, NULL, '2025-05-21 20:32:33', '2025-05-21 20:32:33', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_id`) VALUES
(1, 'Yudha', 'yudha@sekolahnoah.sch.id', NULL, '$2y$12$cXDTERa2E2si6vT9doBfKOq94C/6Qts/kup7kGBtp9u8kMjTo8aUK', NULL, NULL, '2025-04-25 03:43:26', 1),
(2, 'Test User', 'test@example.com', '2025-04-15 18:55:41', '$2y$12$Lru2GQFuP9ht/luOU1l3jO6xF.1cM2Wrj/4IgWKLtEFTGph.KpGuK', 'JsIC44FMsx', '2025-04-15 18:55:41', '2025-04-15 18:55:41', NULL),
(4, 'Lidya Keisha Halimah S.Sos', 'lidya@gmail.com', NULL, '$2y$12$.fMu5sOY4Wr5HUR/xQVz3.ILvmux7ypUCmU2uM9BItPt5ve7TMy5e', NULL, '2025-04-15 18:58:30', '2025-04-15 18:58:30', 2),
(5, 'test1', 'test@gmail.com', NULL, '$2y$12$9Silpa.GlinhPQJeb6FmteeZn.1f77Hbq.Ardc9Wa1GN/.4i7s6Ti', NULL, NULL, '2025-05-21 01:39:21', NULL),
(6, 'Karyawan 1', 'karyawan1@gmail.com', NULL, '$2y$12$ad9jBbYY1uLV3AkNtACEheIZswkWtbInlKmUVqc9og0.DjWnNRkOq', NULL, '2025-05-21 18:37:34', '2025-05-21 18:37:34', 2),
(7, 'Approval 1', 'approval1@gmail.com', NULL, '$2y$12$9Silpa.GlinhPQJeb6FmteeZn.1f77Hbq.Ardc9Wa1GN/.4i7s6Ti', NULL, '2025-05-21 18:38:07', '2025-05-21 18:38:07', 2),
(8, 'Approval 2', 'approval2@gmail.com', NULL, '$2y$12$9Silpa.GlinhPQJeb6FmteeZn.1f77Hbq.Ardc9Wa1GN/.4i7s6Ti', NULL, '2025-05-21 18:40:26', '2025-05-21 18:40:26', 2),
(9, 'Approval 3', 'approval3@gmail.com', NULL, '$2y$12$9Silpa.GlinhPQJeb6FmteeZn.1f77Hbq.Ardc9Wa1GN/.4i7s6Ti', NULL, '2025-05-21 18:41:05', '2025-05-21 18:41:05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_permissions`
--

CREATE TABLE `user_permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `menu_key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `can_access` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_permissions`
--

INSERT INTO `user_permissions` (`id`, `user_id`, `menu_key`, `can_access`, `created_at`, `updated_at`) VALUES
(1, 5, 'dashboard', 1, '2025-05-21 03:04:18', '2025-05-21 03:04:18'),
(2, 5, 'students', 0, '2025-05-21 03:04:18', '2025-05-21 03:04:18'),
(3, 5, 'employee', 0, '2025-05-21 03:04:18', '2025-05-21 03:04:18'),
(4, 5, 'salary_components', 0, '2025-05-21 03:04:18', '2025-05-21 03:04:18'),
(5, 5, 'absence', 0, '2025-05-21 03:04:18', '2025-05-21 03:04:18'),
(6, 5, 'payroll', 0, '2025-05-21 03:04:18', '2025-05-21 03:04:18'),
(7, 5, 'shifts', 0, '2025-05-21 03:04:18', '2025-05-21 03:04:18'),
(8, 5, 'schedules', 0, '2025-05-21 03:04:18', '2025-05-21 03:04:18'),
(9, 5, 'kinerja', 0, '2025-05-21 03:04:18', '2025-05-21 03:04:18'),
(10, 5, 'cuti', 0, '2025-05-21 03:04:18', '2025-05-21 03:04:18'),
(11, 5, 'brief_absen', 0, '2025-05-21 03:04:18', '2025-05-21 03:04:18'),
(12, 5, 'klaim_berobat', 0, '2025-05-21 03:04:18', '2025-05-21 03:04:18'),
(13, 5, 'slip_gaji_skk', 0, '2025-05-21 03:04:18', '2025-05-21 03:04:18'),
(14, 5, 'pinjaman_cicilan', 0, '2025-05-21 03:04:18', '2025-05-21 03:04:18'),
(15, 5, 'lembur_honor', 0, '2025-05-21 03:04:18', '2025-05-21 03:04:18'),
(16, 5, 'surat_tugas', 0, '2025-05-21 03:04:18', '2025-05-21 03:04:18'),
(17, 5, 'fixing_request', 0, '2025-05-21 03:04:18', '2025-05-21 03:04:18'),
(18, 5, 'equipment_loan', 0, '2025-05-21 03:04:18', '2025-05-21 03:04:18'),
(19, 5, 'barang', 0, '2025-05-21 03:04:18', '2025-05-21 03:04:18'),
(20, 5, 'pengecekan_barang', 0, '2025-05-21 03:04:18', '2025-05-21 03:04:18'),
(21, 5, 'kurir_mobil', 0, '2025-05-21 03:04:18', '2025-05-21 03:04:18'),
(22, 5, 'peminjaman', 0, '2025-05-21 03:04:18', '2025-05-21 03:04:18'),
(23, 5, 'request_fotocopy', 0, '2025-05-21 03:04:18', '2025-05-21 03:04:18'),
(24, 5, 'surat_masuk', 0, '2025-05-21 03:04:18', '2025-05-21 03:04:18'),
(25, 5, 'surat_keluar', 0, '2025-05-21 03:04:18', '2025-05-21 03:04:18'),
(26, 5, 'pembayaran_siswa', 0, '2025-05-21 03:04:18', '2025-05-21 03:04:18'),
(27, 5, 'aktiva_tetap', 0, '2025-05-21 03:04:18', '2025-05-21 03:04:18'),
(28, 5, 'pengajuan_dana_bank', 0, '2025-05-21 03:04:18', '2025-05-21 03:04:18'),
(29, 5, 'admission_pendaftaran', 0, '2025-05-21 03:04:18', '2025-05-21 03:04:18'),
(30, 5, 'admission_kegiatan', 0, '2025-05-21 03:04:18', '2025-05-21 03:04:18'),
(31, 5, 'dms', 0, '2025-05-21 03:04:18', '2025-05-21 03:04:18'),
(32, 5, 'sop', 0, '2025-05-21 03:04:18', '2025-05-21 03:04:18'),
(33, 5, 'regulasi', 0, '2025-05-21 03:04:18', '2025-05-21 03:04:18'),
(34, 5, 'users', 0, '2025-05-21 03:04:18', '2025-05-21 03:04:18'),
(35, 5, 'calendar', 0, '2025-05-21 03:04:18', '2025-05-21 03:04:18'),
(36, 5, 'pengumuman', 0, '2025-05-21 03:04:18', '2025-05-21 03:04:18'),
(37, 5, 'kelas', 0, '2025-05-21 03:04:18', '2025-05-21 03:04:18'),
(38, 5, 'permintaan_design', 0, '2025-05-21 03:04:18', '2025-05-21 03:04:18'),
(39, 5, 'settings_approval', 0, '2025-05-21 03:04:18', '2025-05-21 03:04:18'),
(40, 5, 'settings_general', 0, '2025-05-21 03:04:18', '2025-05-21 03:04:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absences`
--
ALTER TABLE `absences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `absences_schedule_id_foreign` (`schedule_id`);

--
-- Indexes for table `admission_activities`
--
ALTER TABLE `admission_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `approvals`
--
ALTER TABLE `approvals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `approvals_created_by_foreign` (`created_by`),
  ADD KEY `approvals_approved_by_foreign` (`approved_by`),
  ADD KEY `approvals_rejected_by_foreign` (`rejected_by`);

--
-- Indexes for table `approval_settings`
--
ALTER TABLE `approval_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `approvers`
--
ALTER TABLE `approvers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `approvers_user_id_module_approval_level_unique` (`user_id`,`module`,`approval_level`);

--
-- Indexes for table `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cutis`
--
ALTER TABLE `cutis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cutis_employee_id_foreign` (`employee_id`),
  ADD KEY `cutis_approved_by_foreign` (`approved_by`),
  ADD KEY `cutis_rejected_by_foreign` (`rejected_by`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_employee_number_unique` (`employee_number`),
  ADD KEY `employees_user_id_foreign` (`user_id`);

--
-- Indexes for table `equipment_loans`
--
ALTER TABLE `equipment_loans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `equipment_loans_user_id_foreign` (`user_id`),
  ADD KEY `equipment_loans_approved_by_foreign` (`approved_by`),
  ADD KEY `equipment_loans_rejected_by_foreign` (`rejected_by`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fixing_requests`
--
ALTER TABLE `fixing_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fixing_requests_user_id_foreign` (`user_id`);

--
-- Indexes for table `izin_briefs`
--
ALTER TABLE `izin_briefs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `izin_briefs_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `klaim_berobats`
--
ALTER TABLE `klaim_berobats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `klaim_berobats_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `lembur_honor`
--
ALTER TABLE `lembur_honor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lembur_honor_employee_id_foreign` (`employee_id`),
  ADD KEY `lembur_honor_approved_by_foreign` (`approved_by`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operational_requests`
--
ALTER TABLE `operational_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payrolls`
--
ALTER TABLE `payrolls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payrolls_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `payroll_components`
--
ALTER TABLE `payroll_components`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payroll_components_payroll_id_foreign` (`payroll_id`);

--
-- Indexes for table `peminjaman_ruangan`
--
ALTER TABLE `peminjaman_ruangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengajuan_fotocopy`
--
ALTER TABLE `pengajuan_fotocopy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengajuan_fotocopy_approved_by_foreign` (`approved_by`),
  ADD KEY `pengajuan_fotocopy_rejected_by_foreign` (`rejected_by`);

--
-- Indexes for table `pengecekan_barang`
--
ALTER TABLE `pengecekan_barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengecekan_barang_barang_id_foreign` (`barang_id`);

--
-- Indexes for table `permintaan_designs`
--
ALTER TABLE `permintaan_designs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permintaan_designs_user_id_foreign` (`user_id`);

--
-- Indexes for table `pinjaman_cicilan`
--
ALTER TABLE `pinjaman_cicilan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pinjaman_cicilan_employee_id_foreign` (`employee_id`),
  ADD KEY `pinjaman_cicilan_approved_by_foreign` (`approved_by`);

--
-- Indexes for table `request_atk`
--
ALTER TABLE `request_atk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `request_atk_approved_by_foreign` (`approved_by`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary_components`
--
ALTER TABLE `salary_components`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salary_components_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schedules_shift_id_foreign` (`shift_id`),
  ADD KEY `schedules_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `shifts`
--
ALTER TABLE `shifts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slip_gaji_skk`
--
ALTER TABLE `slip_gaji_skk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slip_gaji_skk_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_registrations`
--
ALTER TABLE `student_registrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_tugas`
--
ALTER TABLE `surat_tugas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `surat_tugas_employee_id_foreign` (`employee_id`),
  ADD KEY `surat_tugas_approved_by_foreign` (`approved_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `user_permissions`
--
ALTER TABLE `user_permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_permissions_user_id_menu_key_unique` (`user_id`,`menu_key`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absences`
--
ALTER TABLE `absences`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=302;

--
-- AUTO_INCREMENT for table `admission_activities`
--
ALTER TABLE `admission_activities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `approvals`
--
ALTER TABLE `approvals`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `approval_settings`
--
ALTER TABLE `approval_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `approvers`
--
ALTER TABLE `approvers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cutis`
--
ALTER TABLE `cutis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `equipment_loans`
--
ALTER TABLE `equipment_loans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fixing_requests`
--
ALTER TABLE `fixing_requests`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `izin_briefs`
--
ALTER TABLE `izin_briefs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `klaim_berobats`
--
ALTER TABLE `klaim_berobats`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lembur_honor`
--
ALTER TABLE `lembur_honor`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `operational_requests`
--
ALTER TABLE `operational_requests`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payrolls`
--
ALTER TABLE `payrolls`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payroll_components`
--
ALTER TABLE `payroll_components`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `peminjaman_ruangan`
--
ALTER TABLE `peminjaman_ruangan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengajuan_fotocopy`
--
ALTER TABLE `pengajuan_fotocopy`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `pengecekan_barang`
--
ALTER TABLE `pengecekan_barang`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permintaan_designs`
--
ALTER TABLE `permintaan_designs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pinjaman_cicilan`
--
ALTER TABLE `pinjaman_cicilan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `request_atk`
--
ALTER TABLE `request_atk`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `salary_components`
--
ALTER TABLE `salary_components`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=305;

--
-- AUTO_INCREMENT for table `shifts`
--
ALTER TABLE `shifts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `slip_gaji_skk`
--
ALTER TABLE `slip_gaji_skk`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_registrations`
--
ALTER TABLE `student_registrations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `surat_tugas`
--
ALTER TABLE `surat_tugas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_permissions`
--
ALTER TABLE `user_permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absences`
--
ALTER TABLE `absences`
  ADD CONSTRAINT `absences_schedule_id_foreign` FOREIGN KEY (`schedule_id`) REFERENCES `schedules` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `approvals`
--
ALTER TABLE `approvals`
  ADD CONSTRAINT `approvals_approved_by_foreign` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `approvals_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `approvals_rejected_by_foreign` FOREIGN KEY (`rejected_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `approvers`
--
ALTER TABLE `approvers`
  ADD CONSTRAINT `approvers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cutis`
--
ALTER TABLE `cutis`
  ADD CONSTRAINT `cutis_approved_by_foreign` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `cutis_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cutis_rejected_by_foreign` FOREIGN KEY (`rejected_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `equipment_loans`
--
ALTER TABLE `equipment_loans`
  ADD CONSTRAINT `equipment_loans_approved_by_foreign` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `equipment_loans_rejected_by_foreign` FOREIGN KEY (`rejected_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `equipment_loans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fixing_requests`
--
ALTER TABLE `fixing_requests`
  ADD CONSTRAINT `fixing_requests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `izin_briefs`
--
ALTER TABLE `izin_briefs`
  ADD CONSTRAINT `izin_briefs_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `klaim_berobats`
--
ALTER TABLE `klaim_berobats`
  ADD CONSTRAINT `klaim_berobats_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lembur_honor`
--
ALTER TABLE `lembur_honor`
  ADD CONSTRAINT `lembur_honor_approved_by_foreign` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `lembur_honor_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payrolls`
--
ALTER TABLE `payrolls`
  ADD CONSTRAINT `payrolls_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payroll_components`
--
ALTER TABLE `payroll_components`
  ADD CONSTRAINT `payroll_components_payroll_id_foreign` FOREIGN KEY (`payroll_id`) REFERENCES `payrolls` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pengajuan_fotocopy`
--
ALTER TABLE `pengajuan_fotocopy`
  ADD CONSTRAINT `pengajuan_fotocopy_approved_by_foreign` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `pengajuan_fotocopy_rejected_by_foreign` FOREIGN KEY (`rejected_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `pengecekan_barang`
--
ALTER TABLE `pengecekan_barang`
  ADD CONSTRAINT `pengecekan_barang_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barangs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permintaan_designs`
--
ALTER TABLE `permintaan_designs`
  ADD CONSTRAINT `permintaan_designs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pinjaman_cicilan`
--
ALTER TABLE `pinjaman_cicilan`
  ADD CONSTRAINT `pinjaman_cicilan_approved_by_foreign` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `pinjaman_cicilan_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `request_atk`
--
ALTER TABLE `request_atk`
  ADD CONSTRAINT `request_atk_approved_by_foreign` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `salary_components`
--
ALTER TABLE `salary_components`
  ADD CONSTRAINT `salary_components_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `schedules_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `schedules_shift_id_foreign` FOREIGN KEY (`shift_id`) REFERENCES `shifts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `slip_gaji_skk`
--
ALTER TABLE `slip_gaji_skk`
  ADD CONSTRAINT `slip_gaji_skk_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `surat_tugas`
--
ALTER TABLE `surat_tugas`
  ADD CONSTRAINT `surat_tugas_approved_by_foreign` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `surat_tugas_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_permissions`
--
ALTER TABLE `user_permissions`
  ADD CONSTRAINT `user_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
