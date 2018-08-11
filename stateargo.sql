-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2018 at 06:49 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stateargo`
--

-- --------------------------------------------------------

--
-- Table structure for table `conversation`
--

CREATE TABLE `conversation` (
  `cid` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `reciever_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conversation`
--

INSERT INTO `conversation` (`cid`, `sender_id`, `reciever_id`, `group_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, '2018-08-08 00:27:21', '2018-08-08 00:27:21');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `g_id` int(11) NOT NULL,
  `group_name` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`g_id`, `group_name`, `created_at`, `updated_at`) VALUES
(1, 'Group one', '2018-08-08 00:20:50', '2018-08-08 00:20:50'),
(2, 'Group two', '2018-08-08 00:23:55', '2018-08-08 00:23:55'),
(3, 'Group three', '2018-08-08 00:33:40', '2018-08-08 00:33:40'),
(4, 'group four', '2018-08-08 00:46:22', '2018-08-08 00:46:22');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `mid` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `reciever_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `group_id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `alert_status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`mid`, `sender_id`, `reciever_id`, `message`, `group_id`, `cid`, `alert_status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'this is the message.', 1, 1, 0, '2018-08-08 00:27:21', '2018-08-08 00:27:21'),
(2, 1, 2, 'this is the message being sent to the user \"user\".', 1, 1, 0, '2018-08-08 00:32:19', '2018-08-08 00:32:19'),
(3, 1, 2, 'this is the message being sent to the user  with name \"user\".', 1, 1, 0, '2018-08-08 00:45:15', '2018-08-08 00:45:15');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE `prices` (
  `pp_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `day` varchar(10) NOT NULL,
  `month` varchar(20) NOT NULL,
  `year` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`pp_id`, `price`, `product_id`, `day`, `month`, `year`, `created_at`, `updated_at`) VALUES
(1, 22, 2, '07', '08', '2018', '2018-08-08 00:25:28', '2018-08-08 00:25:28'),
(2, 23, 2, '07', '08', '2018', '2018-08-08 00:47:21', '2018-08-08 00:47:21'),
(3, 56, 3, '07', '08', '2018', '2018-08-08 00:48:33', '2018-08-08 00:48:33');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_note` text NOT NULL,
  `group_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_code`, `product_name`, `product_price`, `product_note`, `group_id`, `created_at`, `updated_at`) VALUES
(2, '2224', 'potatooo', 23, 'this is very good product', 1, '2018-08-07 17:47:21', '2018-08-08 00:47:21'),
(3, '232', 'tomatto', 56, 'this is very good product', 4, '2018-08-08 00:48:33', '2018-08-08 00:48:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `group_id` int(11) DEFAULT '0',
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `evaluation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `isPartner` int(11) NOT NULL DEFAULT '0',
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `group_id`, `phone`, `evaluation`, `note`, `isPartner`, `address`) VALUES
(1, 'Irfan Ullah', 'ii@ii.com', '$2y$10$TlIb7xSSAR0OVm1GHm.8uu74JZOhjT/6V50CM8P7eci92CHdgz.wK', 'SDJYqwekIDXA6EL2XMmHhI2sUszgrnMBVkxVhUQPpFwxXqFJNo1jgW5OqCEv', '2018-08-07 22:14:32', '2018-08-07 22:14:32', 0, NULL, NULL, NULL, 0, ''),
(2, 'user', 'iii@ii.com', '$2y$10$RfBC0TT4kUbjIICKxsaoXuJJo0oV2/UY94yGeQBWaS5DxJ1RNgU3.', NULL, '2018-08-08 00:26:47', '2018-08-08 00:26:47', 1, '3468723948', '100%', 'this is note.', 1, 'Mohallah Al-huda Landikass');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `conversation`
--
ALTER TABLE `conversation`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`g_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`pp_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `conversation`
--
ALTER TABLE `conversation`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
  MODIFY `pp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
