-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2021 at 02:14 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

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
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `model` varchar(200) NOT NULL,
  `mileage` varchar(200) NOT NULL,
  `seats` int(11) NOT NULL,
  `fuel` varchar(200) NOT NULL,
  `service_charge` varchar(200) NOT NULL,
  `driver_food_charge` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(155) NOT NULL,
  `transmission` varchar(155) NOT NULL DEFAULT 'Manual',
  `airconditions` tinytext NOT NULL,
  `child_seat` tinytext NOT NULL,
  `gps` tinyint(4) NOT NULL,
  `luggage` tinytext NOT NULL,
  `music` tinytext NOT NULL,
  `seat_belt` tinyint(4) NOT NULL,
  `sleeping_bed` tinyint(4) NOT NULL,
  `water` tinyint(4) NOT NULL,
  `bluetooth` tinyint(4) NOT NULL,
  `onboard_computer` tinyint(4) NOT NULL,
  `audio_input` tinyint(4) NOT NULL,
  `long_term_trips` tinyint(4) NOT NULL,
  `car_kit` tinyint(4) NOT NULL,
  `remote_central_locking` tinyint(4) NOT NULL,
  `climate_control` tinyint(4) NOT NULL,
  `flag` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `name`, `model`, `mileage`, `seats`, `fuel`, `service_charge`, `driver_food_charge`, `description`, `image`, `transmission`, `airconditions`, `child_seat`, `gps`, `luggage`, `music`, `seat_belt`, `sleeping_bed`, `water`, `bluetooth`, `onboard_computer`, `audio_input`, `long_term_trips`, `car_kit`, `remote_central_locking`, `climate_control`, `flag`, `created_at`) VALUES
(4, 'RANGE ROVER', ' EVOQUE', '30', 3, 'Desel', '5000', '500', '                 Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.\r\n\r\nWhen she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.', 'image/0e1617e230.jpg', 'Manual', '1', '0', 1, '3', '1', 1, 0, 1, 1, 0, 1, 1, 1, 0, 0, 0, '2021-12-28 13:28:49'),
(5, 'RANGE ROVER s', ' EVOQUE', '22', 2, 'Octen', '2222', '22', '  22', 'image/dc6e22db79.jpg', 'Manual', '0', '1', 0, '2', '0', 0, 1, 1, 0, 0, 1, 0, 1, 0, 0, 0, '2021-12-28 15:57:58'),
(6, 'RANGE ROVER s', ' EVOQUE', '22', 3, 'Octen', '2222', '22', '   22', 'image/c957b46029.jpg', 'Manual', '0', '1', 0, '2', '0', 0, 1, 1, 0, 0, 1, 0, 1, 0, 0, 0, '2021-12-28 15:58:09'),
(7, 'RANGE ROVER s', ' EVOQUE', '22', 2, 'Octen', '2222', '22', ' 22', 'image/261548be03.jpg', 'Manual', '0', '1', 0, '2', '0', 0, 1, 1, 0, 0, 1, 0, 1, 0, 0, 0, '2021-12-28 15:58:29');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(200) NOT NULL,
  `flag` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(155) NOT NULL,
  `email` varchar(155) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `password` varchar(150) NOT NULL,
  `national_id` int(11) NOT NULL,
  `image` varchar(155) NOT NULL,
  `flag` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `password`, `national_id`, `image`, `flag`, `created_at`) VALUES
(2, 'Dipta Dey', 'dipta995@gmail.com', '01632315608', 'dhaka', '12345678', 2147483647, 'img/a82583bc9a.jpg', 1, '2021-12-18 15:18:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
