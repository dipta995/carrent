-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2022 at 05:16 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_rent`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Oid` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `pickup_location` text NOT NULL,
  `dropup_location` text NOT NULL,
  `date` varchar(191) NOT NULL,
  `time` varchar(191) NOT NULL,
  `trip_loop` tinyint(4) NOT NULL,
  `payment_type` varchar(191) DEFAULT NULL,
  `account_no` bigint(20) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `finished_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Oid`, `car_id`, `user_id`, `driver_id`, `pickup_location`, `dropup_location`, `date`, `time`, `trip_loop`, `payment_type`, `account_no`, `amount`, `status`, `created_at`, `finished_at`) VALUES
(33, 7, 3, 1, 'Rajarbag', 'Rajarbag', '2022-09-24', '12:22', 1, 'Cash', NULL, 15789532, 2, '2022-09-23 18:12:54', '2022-10-20 18:18:54'),
(34, 7, 3, 2, 'Rajarbag', 'Rajarbag', '2022-09-24', '12:22', 1, NULL, NULL, 0, 1, '2022-09-23 18:13:00', NULL),
(35, 7, 3, 1, 'Shantinagar', 'Shantinagar', '2022-09-24', '18:09', 1, NULL, NULL, 0, 1, '2022-10-20 17:44:46', NULL),
(36, 7, 3, NULL, 'Shantinagar', 'Shantinagar', '2022-09-24', '18:09', 1, NULL, NULL, 0, 0, '2022-09-23 18:14:13', NULL),
(37, 7, 3, NULL, 'Shantinagar', 'Shantinagar', '2022-09-24', '18:09', 1, NULL, NULL, 0, 0, '2022-09-23 18:14:47', NULL),
(38, 7, 3, NULL, 'Shantinagar', 'Rajarbag', '2022-10-01', '12:38', 0, NULL, NULL, 0, 0, '2022-09-23 18:15:30', NULL),
(39, 7, 3, NULL, 'Shantinagar', 'Shantinagar', '2022-10-05', '13:11', 1, NULL, NULL, 0, 0, '2022-09-23 18:15:55', '2022-10-21 09:37:30'),
(41, 6, 19, 1, 'Chittagong', 'Narayanganj', '2022-10-21', '13:16', 1, 'Cash', NULL, 15822417.6, 2, '2022-10-21 07:00:31', '2022-10-21 14:38:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Oid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
