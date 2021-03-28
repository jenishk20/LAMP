-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 26, 2021 at 06:09 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

DROP TABLE IF EXISTS `trips`;
CREATE TABLE IF NOT EXISTS `trips` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `train_id` bigint(20) NOT NULL,
  `source_station_id` bigint(20) NOT NULL,
  `destination_station_id` bigint(20) NOT NULL,
  `source_departure_time` datetime DEFAULT current_timestamp(),
  `destination_arrival_time` datetime NOT NULL DEFAULT current_timestamp(),
  `trip_cost` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`id`, `train_id`, `source_station_id`, `destination_station_id`, `source_departure_time`, `destination_arrival_time`, `trip_cost`, `created_at`, `updated_at`) VALUES
(5, 1, 1, 2, '2021-03-25 14:48:13', '2021-03-25 14:48:13', 2000, '2021-03-25 03:48:13', '2021-03-25 03:48:13'),
(6, 1, 2, 3, '2021-03-25 14:48:56', '2021-03-25 14:48:56', 3000, '2021-03-25 03:48:56', '2021-03-25 03:48:56'),
(7, 2, 1, 3, '2021-03-25 14:49:17', '2021-03-25 14:49:17', 1000, '2021-03-25 03:49:17', '2021-03-25 03:49:17'),
(8, 1, 3, 4, '2021-03-25 14:49:58', '2021-03-25 14:49:58', 1000, '2021-03-25 03:49:58', '2021-03-25 03:49:58'),
(9, 2, 3, 4, '2021-03-25 14:50:01', '2021-03-25 14:50:01', 1000, '2021-03-25 03:50:01', '2021-03-25 03:50:01'),
(10, 1, 4, 3, '2021-03-25 14:57:05', '2021-03-25 14:57:05', 1000, '2021-03-25 09:27:05', '2021-03-25 09:27:05'),
(11, 1, 3, 2, '2021-03-25 14:57:34', '2021-03-25 14:57:34', 1000, '2021-03-25 09:27:34', '2021-03-25 09:27:34'),
(12, 1, 2, 1, '2021-03-25 14:57:34', '2021-03-25 14:57:34', 1222, '2021-03-25 09:27:34', '2021-03-25 09:27:34'),
(13, 2, 4, 3, '2021-03-25 14:59:25', '2021-03-25 14:59:25', 1111, '2021-03-25 09:29:25', '2021-03-25 09:29:25'),
(14, 2, 3, 1, '2021-03-25 14:59:25', '2021-03-25 14:59:25', 2222, '2021-03-25 09:29:25', '2021-03-25 09:29:25');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
