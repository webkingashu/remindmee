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
-- Table structure for table `reminders`
--

CREATE TABLE IF NOT EXISTS `reminders` (
  `id` bigint(20) unsigned NOT NULL,
  `reminder_set` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reminder_from` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reminder_to` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reminder_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reminder_date` date NOT NULL,
  `reminder_time` datetime NOT NULL,
  `reminder_msg` longtext COLLATE utf8_unicode_ci NOT NULL,
  `reminder_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'pending',
  `reminder_contactid` bigint(20) unsigned NOT NULL COMMENT 'foreign key with contacts table',
  `reminder_owner` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reminder_note` longtext COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
