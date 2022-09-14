-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2022 at 05:02 PM
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
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
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

INSERT INTO `cars` (`id`, `cat_id`, `name`, `model`, `mileage`, `seats`, `fuel`, `service_charge`, `driver_food_charge`, `description`, `image`, `transmission`, `airconditions`, `child_seat`, `gps`, `luggage`, `music`, `seat_belt`, `sleeping_bed`, `water`, `bluetooth`, `onboard_computer`, `audio_input`, `long_term_trips`, `car_kit`, `remote_central_locking`, `climate_control`, `flag`, `created_at`) VALUES
(4, 1, 'RANGE ROVER', ' EVOQUE', '30', 3, 'Desel', '5000', '500', '                 Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.\r\n\r\nWhen she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.', 'image/0e1617e230.jpg', 'Manual', '1', '0', 1, '3', '1', 1, 0, 1, 1, 0, 1, 1, 1, 0, 0, 3, '2021-12-28 13:28:49'),
(5, 2, 'RANGE ROVER', ' EVOQUE', '22', 2, 'Octen', '2222', '22', 'A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine.', 'image/dc6e22db79.jpg', 'Manual', '0', '1', 0, '2', '0', 0, 1, 1, 0, 0, 1, 0, 1, 0, 0, 3, '2021-12-28 15:57:58'),
(6, 1, 'RANGE ROVER', ' EVOQUE', '22', 3, 'Octen', '2222', '22', 'One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armour-like back, and if he lifted his head a little he could see his brown belly, slightly domed and divided by arches into stiff sections.', 'image/c957b46029.jpg', 'Manual', '0', '1', 0, '2', '0', 0, 1, 1, 0, 0, 1, 0, 1, 0, 0, 0, '2021-12-28 15:58:09'),
(7, 2, 'RANGE ROVER', ' EVOQUE', '22', 2, 'Octen', '2222', '22', 'The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary.', 'image/261548be03.jpg', 'Manual', '0', '1', 0, '2', '0', 0, 1, 1, 0, 0, 1, 0, 1, 0, 0, 1, '2021-12-28 15:58:29'),
(8, 1, 'RANGE ROVER', ' EVOQUE', '12', 2, 'Petrol', '2345', '22', 'Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe solmen in li grammatica, li pronunciation e li plu commun vocabules.', 'image/cd19fc167b.jpg', 'Manual', '0', '0', 0, '3', '0', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 3, '2022-05-18 17:56:27'),
(9, 2, 'Haley', 'Perkins', '69', 2, 'Desel', '86', '75', 'Quis laborum enim ma', 'image/ab4bc45d62.jpg', 'Manual', '1', '1', 1, '42', '0', 1, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, '2022-08-26 07:15:45');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `cat_name`) VALUES
(1, '4 Seatd'),
(2, '6 Seatd');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `driver_id` int(11) NOT NULL,
  `driver_name` varchar(191) NOT NULL,
  `driver_phone` varchar(191) NOT NULL,
  `driver_license` varchar(255) NOT NULL,
  `driver_address` text NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 0,
  `join_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `flag` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`driver_id`, `driver_name`, `driver_phone`, `driver_license`, `driver_address`, `is_active`, `join_at`, `flag`) VALUES
(1, 'Mr Ajgor', '12345678987', '444455556661', 'Dhaka', 1, '2022-05-22 15:29:56', 0),
(2, 'Mr Ahsan Habib', '12345678905', '44445555666', 'Dhaka ', 0, '2022-06-15 13:55:09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `location_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `location_name`) VALUES
(1, 'Dhaka'),
(2, 'Chittagong'),
(3, 'Narayanganj'),
(4, 'Shantinagar'),
(5, 'Malibag'),
(6, 'Rajarbag'),
(7, 'Rampura');

-- --------------------------------------------------------

--
-- Table structure for table `office_info`
--

CREATE TABLE `office_info` (
  `address` text NOT NULL,
  `phone` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `office_info`
--

INSERT INTO `office_info` (`address`, `phone`, `email`) VALUES
('198 West 21th Street, Suite 721 New York NY 123', '+ 1235 2355 11', 'info@yoursites.com');

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
  `payment_status` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Oid`, `car_id`, `user_id`, `driver_id`, `pickup_location`, `dropup_location`, `date`, `time`, `trip_loop`, `payment_status`, `status`, `created_at`) VALUES
(19, 6, 3, 1, 'Chittagong', 'Dhaka', '2022-09-16', '10:00', 0, 1, 2, '2022-09-14 14:14:21'),
(20, 6, 3, 1, 'Narayanganj', 'Shantinagar', '2022-09-16', '10:00', 1, 1, 2, '2022-09-14 14:49:41'),
(21, 7, 3, 1, 'Shantinagar', 'Rampura', '2022-09-16', '12:50', 0, 1, 1, '2022-09-14 14:53:49');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `car_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `rat` int(11) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `replay` text DEFAULT NULL,
  `comment_at` varchar(191) DEFAULT NULL,
  `replay_at` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `car_id`, `user_id`, `rat`, `comment`, `replay`, `comment_at`, `replay_at`) VALUES
(2, 5, 2, 3, 'mmmm', NULL, NULL, NULL),
(3, 7, 3, 5, 'ff', NULL, NULL, NULL),
(4, 6, 3, 4, 'f', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `t_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`t_id`, `customer_id`, `comment`, `status`, `created_at`) VALUES
(3, 3, 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.', 1, '2022-03-26 13:03:58');

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
  `otp` int(11) DEFAULT NULL,
  `auth_check` int(11) NOT NULL DEFAULT 0,
  `flag` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `password`, `national_id`, `image`, `otp`, `auth_check`, `flag`, `created_at`) VALUES
(2, 'Dipta Dey', 'dipta95@gmail.com', '01632315608', 'dhaka', '12345678', 2147483647, 'image/c957b46029.jpg', NULL, 1, 1, '2021-12-18 15:18:23'),
(3, 'Dan', 'test@gmail.com', '01632315609', 'uyuu', '12345678', 2147483647, 'image/5951fdd4d9.jpg', 1234567, 1, 0, '2022-01-10 13:51:27'),
(5, 'JUSTIN', 'dipta995@gmail.com', '01632315608', 'fdsssdf', '12345678', 2147483647, 'image/45e46c917a.jpg', 1652590218, 1, 1, '2022-05-15 04:50:18'),
(6, 'Nora Miles', 'jegerab@mailinator.com', '11111122223', 'Dolorum assumenda vo', '12345678', 2147483647, 'image/b4d21e8ce3.png', 1661500401, 0, 0, '2022-08-26 07:53:21'),
(7, 'Nora Miles', 'jegerabyy@mailinator.com', '11111122223', 'Dolorum assumenda vo', '12345678', 2147483647, 'image/7fefe3c5a1.png', 1661500440, 0, 0, '2022-08-26 07:54:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`driver_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Oid`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`t_id`),
  ADD KEY `user table` (`customer_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `driver_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD CONSTRAINT `user table` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
