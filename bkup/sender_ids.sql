-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2015 at 06:14 PM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `laravel1`
--

-- --------------------------------------------------------

--
-- Table structure for table `sender_ids`
--

CREATE TABLE IF NOT EXISTS `sender_ids` (
  `id` int(10) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `senderid_name` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `senderid_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `senderid_note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sender_ids`
--
ALTER TABLE `sender_ids`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `sender_ids_senderid_name_unique` (`senderid_name`), ADD KEY `sender_ids_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sender_ids`
--
ALTER TABLE `sender_ids`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `sender_ids`
--
ALTER TABLE `sender_ids`
ADD CONSTRAINT `sender_ids_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `wp_users` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
