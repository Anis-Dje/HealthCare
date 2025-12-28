-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3311
-- Generation Time: Dec 27, 2025 at 11:44 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medical_clinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `birthdate` date NOT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `requested_service` varchar(150) NOT NULL,
  `preferred_date` date NOT NULL,
  `preferred_time` time NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `address` text DEFAULT NULL,
  `allergies_history` text DEFAULT NULL,
  `selected_doctor` varchar(100) DEFAULT NULL,
  `medical_file` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('Pending','Confirmed','Completed','Cancelled') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `first_name`, `last_name`, `birthdate`, `gender`, `requested_service`, `preferred_date`, `preferred_time`, `email`, `phone`, `address`, `allergies_history`, `selected_doctor`, `medical_file`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Anis', 'MOhamed', '2025-12-16', 'Male', 'general', '2025-12-27', '00:00:00', 'anisleprince2005@gmail.com', '(055) 499-7155', 'cite sakiet sidi youcef bt 1002 n1488', 'dgqereqrg', 'Dr. Moujib Ourzifi', 'uploads/1766863616_images.jpg', '2025-12-27 20:26:56', '2025-12-27 20:26:56', 'Pending'),
(2, 'Anis', 'MOhamed', '2025-12-15', 'Male', 'general', '2025-12-27', '00:00:00', 'anisleprince2005@gmail.com', '(055) 499-7155', 'cite sakiet sidi youcef bt 1002 n1488', 'sddfefqef', 'Dr. Moujib Ourzifi', 'uploads/1766874989_BBB6RBETJZE4RH5L4OO6ZYUT7Y.jpg', '2025-12-27 23:36:29', '2025-12-27 23:36:29', 'Pending'),
(3, 'Anis', 'MOhamed', '2025-12-15', 'Male', 'general', '2025-12-27', '00:00:00', 'anisleprince2005@gmail.com', '(055) 499-7155', 'cite sakiet sidi youcef bt 1002 n1488', 'sddfefqef', 'Dr. Moujib Ourzifi', 'uploads/1766875022_BBB6RBETJZE4RH5L4OO6ZYUT7Y.jpg', '2025-12-27 23:37:02', '2025-12-27 23:37:02', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `authentication`
--

CREATE TABLE `authentication` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authentication`
--

INSERT INTO `authentication` (`id`, `username`, `password_hash`, `created_at`, `updated_at`) VALUES
(1, 'anis@gmail.com', '$2y$10$XVCdrQnSssNf.L8HOStXYedxewGFv8xDxNFKOOIZVcr4iCUascdCW', '2025-12-26 22:33:14', '2025-12-26 22:33:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `authentication`
--
ALTER TABLE `authentication`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `authentication`
--
ALTER TABLE `authentication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
