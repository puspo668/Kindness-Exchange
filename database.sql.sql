-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2026 at 12:07 PM
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
-- Database: `registration_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `blood_donors`
--

CREATE TABLE `blood_donors` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `division` varchar(50) DEFAULT NULL,
  `district` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `blood_group` varchar(10) DEFAULT NULL,
  `last_donate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blood_donors`
--

INSERT INTO `blood_donors` (`id`, `name`, `division`, `district`, `address`, `phone`, `email`, `age`, `gender`, `blood_group`, `last_donate`) VALUES
(1, 'Puspo', 'Rangpur', 'gaibandha', 'gobindhagonj ', '01760964871', 'puspod00@gmail.com', 24, 'Female', 'B+', '2026-06-02');

-- --------------------------------------------------------

--
-- Table structure for table `blood_reciever`
--

CREATE TABLE `blood_reciever` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `division` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phonenumber` varchar(20) NOT NULL,
  `donors_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blood_reciever`
--

INSERT INTO `blood_reciever` (`id`, `name`, `division`, `district`, `address`, `email`, `phonenumber`, `donors_id`) VALUES
(0, 'anika', 'mymensingh', 'jamalpur', 'Melandoh', 'puspod00@gmail.com', '01999867779', 0),
(0, 'Puspo', 'dhaka', 'jamalpur', 'Melandoh', 'puspod00@gmail.com', '01999867779', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cloth_donation`
--

CREATE TABLE `cloth_donation` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `division` varchar(50) DEFAULT NULL,
  `district` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `cloth_types` varchar(255) DEFAULT NULL,
  `cloth_gender` varchar(50) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cloth_donation`
--

INSERT INTO `cloth_donation` (`id`, `full_name`, `division`, `district`, `address`, `phone`, `email`, `cloth_types`, `cloth_gender`, `quantity`) VALUES
(1, 'Puspo', 'Rajshahi', 'jamalpur', 'Melandoh', '01613673924', 'puspod00@gmail.com', 'Dress', 'Women', 2);

-- --------------------------------------------------------

--
-- Table structure for table `cloth_receiver`
--

CREATE TABLE `cloth_receiver` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `division` varchar(50) DEFAULT NULL,
  `district` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `clothes` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cloth_receiver`
--

INSERT INTO `cloth_receiver` (`id`, `name`, `type`, `division`, `district`, `address`, `phone`, `email`, `clothes`) VALUES
(1, 'Puspo', 'organization', 'Chattogram', 'gaibandha', 'jamalpur', '01760964871', 'puspod00@gmail.com', 'women dresses');

-- --------------------------------------------------------

--
-- Table structure for table `donors`
--

CREATE TABLE `donors` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `division` varchar(50) DEFAULT NULL,
  `district` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `types` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donors`
--

INSERT INTO `donors` (`id`, `full_name`, `division`, `district`, `address`, `phone`, `email`, `types`, `quantity`) VALUES
(1, 'anika ', 'Rangpur', 'gaibandha', 'gobindhagonj', '01999867779', 'puspoha67@gmail.com', 'Academic', 4);

-- --------------------------------------------------------

--
-- Table structure for table `receivers`
--

CREATE TABLE `receivers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `district` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `donors_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `receivers`
--

INSERT INTO `receivers` (`id`, `name`, `district`, `address`, `phone`, `email`, `donors_id`) VALUES
(1, '', 'Mymensingh', 'Melandoh', '01613673924', 'puspod00@gmail.com', 2),
(2, 'Puspo', 'Mymensingh', 'Melandoh', '01613673924', 'puspod00@gmail.com', 2),
(3, 'Puspo', 'Mymensingh', 'Melandoh', '01613673924', 'puspod00@gmail.com', 2),
(4, 'Puspo', 'Mymensingh', 'Melandoh', '01613673924', 'puspod00@gmail.com', 2),
(5, 'Puspo', 'Mymensingh', 'Melandoh', '01613673924', 'puspod00@gmail.com', 2),
(6, 'Puspo', 'Barisal', 'Melandoh', '01760964871', 'puspod00@gmail.com', 1),
(7, 'Puspo', 'Barisal', 'Melandoh', '01760964871', 'puspod00@gmail.com', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blood_donors`
--
ALTER TABLE `blood_donors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cloth_donation`
--
ALTER TABLE `cloth_donation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cloth_receiver`
--
ALTER TABLE `cloth_receiver`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donors`
--
ALTER TABLE `donors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receivers`
--
ALTER TABLE `receivers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blood_donors`
--
ALTER TABLE `blood_donors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cloth_donation`
--
ALTER TABLE `cloth_donation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cloth_receiver`
--
ALTER TABLE `cloth_receiver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `donors`
--
ALTER TABLE `donors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `receivers`
--
ALTER TABLE `receivers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
