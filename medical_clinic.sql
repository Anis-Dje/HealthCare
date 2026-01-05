-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3311
-- Generation Time: Jan 05, 2026 at 08:00 PM
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
(1, 'Anis', 'MOhamed', '2025-12-16', 'Male', 'general', '2025-12-27', '00:00:00', 'anisleprince2005@gmail.com', '(055) 499-7155', 'cite sakiet sidi youcef bt 1002 n1488', 'dgqereqrg', 'Dr. Moujib Ourzifi', 'uploads/1766863616_images.jpg', '2025-12-27 20:26:56', '2025-12-28 00:29:33', 'Confirmed');

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
(1, 'anis@gmail.com', '$2y$10$ZRmfDpOihZ.83RDt4CJFMu8znhNBhMzZ9kg2UHZONLgnln5HIBQva', '2025-12-26 22:33:14', '2025-12-28 01:01:33');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `specialty` varchar(255) NOT NULL,
  `bio` text DEFAULT NULL,
  `credentials` varchar(255) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT 'https://images.unsplash.com/photo-1559839734-2b71f1536780?w=400&h=400&q=80',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `specialty`, `bio`, `credentials`, `image_url`, `created_at`) VALUES
(1, 'Dr. Moujib Ourzifi', 'General Medicine Specialist', 'Dr. Ourzifi has over 15 years of experience in general medicine and is dedicated to providing comprehensive healthcare to his patients.', 'MD, Board Certified', 'https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?w=500&h=600&fit=crop', '2025-12-27 18:12:22'),
(2, 'Dr. Bouafia Yousra', 'Cardiology Specialist', 'A renowned cardiologist with expertise in cardiac care and preventative cardiology. Dr. Bouafia is committed to heart health.', 'MD, Board Certified', 'https://images.unsplash.com/photo-1559839734-2b71ea197ec2?w=500&h=600&fit=crop', '2025-12-27 18:12:22'),
(3, 'Dr. Youcef Ait Nouri', 'Pediatrics Specialist', 'Dr. Ait Nouri specializes in pediatric care with a gentle approach to children\'s healthcare. He believes in building long-term patient relationships.', 'MD, Board Certified', 'https://images.unsplash.com/photo-1622253692010-333f2da6031d?w=500&h=600&fit=crop', '2025-12-27 18:12:22'),
(4, 'Dr. Maria Benazzouz', 'Dermatology Specialist', 'An expert dermatologist focused on skin health and aesthetic treatments. Dr. Benazzouz combines clinical expertise with a personal touch.', 'MD, Board Certified', 'https://images.unsplash.com/photo-1594824476967-48c8b964273f?w=500&h=600&fit=crop', '2025-12-27 18:12:22'),
(5, 'Dr. Dahmen Djeghri', 'Laboratory Technician', 'Expert in diagnostic laboratory testing with precision and accuracy. Dr. Djeghri ensures reliable test results to support accurate clinical diagnoses.', 'MD, Board Certified', 'https://images.unsplash.com/photo-1637059824899-a441006a6875?q=80&w=752&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', '2025-12-27 18:12:22'),
(6, 'Dr. Mohamed Bicha', 'Dentist', 'With over 12 years of experience in restorative and cosmetic dentistry, Dr. Bicha provides comprehensive oral care with a focus on patient comfort and beautiful smiles.', 'DDS, Board Certified', 'https://images.unsplash.com/photo-1537368910025-700350fe46c7?auto=format&fit=crop&w=500&h=600&q=80&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', '2025-12-27 18:12:22'),
(7, 'Dr. Bennacer Skander', 'Physiotherapist', 'Specializing in physical rehabilitation and injury recovery, Dr. Bennacer uses evidence-based techniques to help patients regain mobility and improve their quality of life.', 'PT, Board Certified', 'https://hips.hearstapps.com/hmg-prod/images/portrait-of-a-happy-young-doctor-in-his-clinic-royalty-free-image-1661432441.jpg?crop=0.66698xw:1xh;center,top&resize=640:*', '2025-12-27 18:12:22'),
(8, 'Dr. Ibtissem Adem', 'Vaccination Specialist', 'Expert in immunization and preventive medicine, Dr. Adem ensures comprehensive vaccination programs for all age groups. Dedicated to community health protection.', 'MD, Board Certified', 'https://img.freepik.com/premium-photo/portrait-glad-smiling-doctor-white-uniform-standing-with-crossed-hands-white_168410-786.jpg', '2025-12-27 18:12:22'),
(9, 'Dr. Mejdoub Mustapha', 'Emergency Medicine Specialist', 'Dr. Mejdoub leads our emergency care team with expertise in acute and critical care. Available 24/7 for emergency services.', 'MD, Board Certified', 'https://cdn.prod.website-files.com/62d4f06f9c1357a606c3b7ef/65ddf3cdf19abaf5688af2f8_shutterstock_1933145801%20(1).jpg', '2025-12-27 18:12:22'),
(10, 'test', 'testsssttt', 'gwrgeh', 'rqwtet', 'https://store.bandccamera.com/cdn/shop/articles/how-to-take-a-picture-of-the-moon-9-steps-116718.jpg?v=1659674945&width=1024', '2026-01-05 17:45:10');

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
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

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

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
