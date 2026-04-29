-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2026 at 05:16 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `games_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` char(36) NOT NULL DEFAULT uuid(),
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `role`, `created_at`) VALUES
('2b7320df-436a-11f1-9451-b00cd1a1dc66', 'hamza', 'gad', 'hamzaatef722@gmail.com', '$2y$10$ekHuntomswitz8e89dtfQ.xSlyG2m0c8XrOjUJSCVGB4IS8ROknJ6', 'user', '2026-04-29 01:24:29'),
('33cd8189-4372-11f1-9451-b00cd1a1dc66', 'omar', 'selim', 'omar.selim@gmail.com', '$2y$10$ke7wqMjwKO6ZEHr82Kl6MOawMMzSRFrB.6v/.NGBUteAGaxl4yhoW', 'user', '2026-04-29 02:21:59'),
('627abaa0-4376-11f1-9451-b00cd1a1dc66', 'Hamza', 'Gad', 'hamza.gad19@admin.com', '$2y$10$rmakg69BLBIcWYSubr.OCOeuGVeWqILe2BKCd0kjMi42dEGwLdj5G', 'admin', '2026-04-29 02:51:56'),
('7b9e6f9a-4377-11f1-9451-b00cd1a1dc66', 'khaled', 'mohamed', 'khaled.mohamed@gmail.com', '$2y$10$0/jsllgmRpmqHxJwINAE9uOoC5Myhg8lEEs2ufFBVkDHcpFMqg/fq', 'user', '2026-04-29 02:59:47'),
('de503667-433e-11f1-9f95-b00cd1a1dc66', 'Sofia', 'Martinez', 'sofia.martinez@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', '2026-04-28 20:14:32'),
('de5036f9-433e-11f1-9f95-b00cd1a1dc66', 'Liam', 'Johnson', 'liam.johnson@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', '2026-04-28 20:14:32'),
('de503735-433e-11f1-9f95-b00cd1a1dc66', 'Emma', 'Williams', 'emma.williams@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', '2026-04-28 20:14:32'),
('de503769-433e-11f1-9f95-b00cd1a1dc66', 'Noah', 'Brown', 'noah.brown@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', '2026-04-28 20:14:32'),
('de50379d-433e-11f1-9f95-b00cd1a1dc66', 'Olivia', 'Davis', 'olivia.davis@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', '2026-04-28 20:14:32'),
('de5037d0-433e-11f1-9f95-b00cd1a1dc66', 'Lucas', 'Wilson', 'lucas.wilson@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', '2026-04-28 20:14:32'),
('de503805-433e-11f1-9f95-b00cd1a1dc66', 'Mia', 'Taylor', 'mia.taylor@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', '2026-04-28 20:14:32'),
('de50383a-433e-11f1-9f95-b00cd1a1dc66', 'Ethan', 'Anderson', 'ethan.anderson@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', '2026-04-28 20:14:32'),
('de503869-433e-11f1-9f95-b00cd1a1dc66', 'Ava', 'Thomas', 'ava.thomas@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', '2026-04-28 20:14:32'),
('de5038bc-433e-11f1-9f95-b00cd1a1dc66', 'Alex', 'Hunter', 'alex.hunter@admin.com', '$2y$10$rmakg69BLBIcWYSubr.OCOeuGVeWqILe2BKCd0kjMi42dEGwLdj5G', 'admin', '2026-04-28 20:14:32'),
('de5038f1-433e-11f1-9f95-b00cd1a1dc66', 'Sarah', 'Connor', 'sarah.connor@admin.com', '$2y$10$rmakg69BLBIcWYSubr.OCOeuGVeWqILe2BKCd0kjMi42dEGwLdj5G', 'admin', '2026-04-28 20:14:32');

-- --------------------------------------------------------

--
-- Table structure for table `user_game_library`
--

CREATE TABLE `user_game_library` (
  `id` int(11) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `game_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_game_library`
--

INSERT INTO `user_game_library` (`id`, `user_id`, `game_id`, `created_at`) VALUES
(2, '33cd8189-4372-11f1-9451-b00cd1a1dc66', 511, '2026-04-29 02:22:29'),
(3, '33cd8189-4372-11f1-9451-b00cd1a1dc66', 14, '2026-04-29 02:22:47'),
(5, '2b7320df-436a-11f1-9451-b00cd1a1dc66', 511, '2026-04-29 02:38:51'),
(6, '2b7320df-436a-11f1-9451-b00cd1a1dc66', 516, '2026-04-29 02:39:12'),
(7, '2b7320df-436a-11f1-9451-b00cd1a1dc66', 498, '2026-04-29 02:57:09'),
(9, '7b9e6f9a-4377-11f1-9451-b00cd1a1dc66', 540, '2026-04-29 03:01:05');

-- --------------------------------------------------------

--
-- Table structure for table `user_library`
--

CREATE TABLE `user_library` (
  `id` int(11) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `game_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `thumbnail` varchar(500) DEFAULT NULL,
  `genre` varchar(100) DEFAULT NULL,
  `platform` varchar(150) DEFAULT NULL,
  `game_url` varchar(500) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_game_library`
--
ALTER TABLE `user_game_library`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_user_game` (`user_id`,`game_id`);

--
-- Indexes for table `user_library`
--
ALTER TABLE `user_library`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_user_game` (`user_id`,`game_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_game_library`
--
ALTER TABLE `user_game_library`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_library`
--
ALTER TABLE `user_library`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
