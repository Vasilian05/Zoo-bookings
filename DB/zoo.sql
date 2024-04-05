-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 05, 2024 at 01:29 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zoo`
--

-- --------------------------------------------------------

--
-- Table structure for table `Hotel`
--

CREATE TABLE `Hotel` (
  `hotel_id` int(11) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `HotelBookings`
--

CREATE TABLE `HotelBookings` (
  `booking_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Room`
--

CREATE TABLE `Room` (
  `room_id` int(11) NOT NULL,
  `room_type_id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `RoomTypess`
--

CREATE TABLE `RoomTypess` (
  `room_type_id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `safariBookings`
--

CREATE TABLE `safariBookings` (
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `booking_date` date NOT NULL,
  `adult_ticket` int(11) DEFAULT NULL,
  `child_ticket` int(11) DEFAULT NULL,
  `baby_ticket` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `bookings` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`user_id`, `first_name`, `last_name`, `email`, `pass`, `bookings`) VALUES
(1, 'alex', 'alex', 'alex@gmail.com', '$2y$10$FlEsihG/VF5d6.8YMbM3T.gqINW2uwosPfZuOxpIpBany5zQ9.kbu', NULL),
(2, 'alex', 'alex', 'alex@gmail.com', '$2y$10$92APbywZWxdBm1cMjpoYJeD0R2gN5N6LG6xAHx7eAeUMuXqxgl5Ga', NULL),
(3, 'alex', 'alex', 'alex@gmail.com', '$2y$10$KZNbgVTzJBtzjHKU6xWszO9eZK1adW6kTLHrFhE/wsIyfNmFdQNBe', NULL),
(4, 'alex', 'alex', 'alex@gmail.com', '$2y$10$8lKJL.DA4Z.IiIDGT2CA2uwpocByn6CquupBUfbJJshks.Znzxtd6', NULL),
(5, 'alex', 'alex', 'alex@gmail.com', '$2y$10$HIeULa9A5M4wb9G3le62ienhCucvVuRdRZ.DIwsXqNU4/RDkyoU3W', NULL),
(6, 'alex', 'alex', 'alex@gmail.com', '$2y$10$Ufi36wO5uN4KIlWeHr1kheEEC9hDL6h0oCG4n5Jzwg1VKASVDV7ru', NULL),
(7, 'alex', 'alex', 'alex@gmail.com', '$2y$10$Dc6GQk3vg0HahFvBhSTlFO8N6es/KixOTfLNrxbAL47p5wWT.KYa6', NULL),
(8, 'alex', 'atanasov', 'a@gmail.com', '$2y$10$mNuk9MNpLSMoCkSGEk/gSe..uoG1j6w4aarweYvjyzBbcEJpUYYHe', NULL),
(9, 'asiod', 'asdioj', 'asjd@fnas.co', '$2y$10$Ihl9VihW.j6Xa9WQMh5FZu6VrpnRSyNFarMMTWruUWER6DrbxDB1C', NULL),
(10, 'asiod', 'asdioj', 'asjd@fnas.co', '$2y$10$d4W4osFg.yt/Y25E17swme78T42GBARPkxEnXnta5DzlsneqTwH9C', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Hotel`
--
ALTER TABLE `Hotel`
  ADD PRIMARY KEY (`hotel_id`);

--
-- Indexes for table `HotelBookings`
--
ALTER TABLE `HotelBookings`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `Room`
--
ALTER TABLE `Room`
  ADD PRIMARY KEY (`room_id`),
  ADD KEY `room_ibfk_2` (`room_type_id`),
  ADD KEY `hotel_id` (`hotel_id`);

--
-- Indexes for table `RoomTypess`
--
ALTER TABLE `RoomTypess`
  ADD PRIMARY KEY (`room_type_id`),
  ADD KEY `hotel_id` (`hotel_id`);

--
-- Indexes for table `safariBookings`
--
ALTER TABLE `safariBookings`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Hotel`
--
ALTER TABLE `Hotel`
  MODIFY `hotel_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `HotelBookings`
--
ALTER TABLE `HotelBookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Room`
--
ALTER TABLE `Room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `RoomTypess`
--
ALTER TABLE `RoomTypess`
  MODIFY `room_type_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `safariBookings`
--
ALTER TABLE `safariBookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `HotelBookings`
--
ALTER TABLE `HotelBookings`
  ADD CONSTRAINT `hotelbookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `User` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hotelbookings_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `Room` (`room_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Room`
--
ALTER TABLE `Room`
  ADD CONSTRAINT `room_ibfk_2` FOREIGN KEY (`room_type_id`) REFERENCES `RoomTypess` (`room_type_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `room_ibfk_3` FOREIGN KEY (`hotel_id`) REFERENCES `Hotel` (`hotel_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `RoomTypess`
--
ALTER TABLE `RoomTypess`
  ADD CONSTRAINT `roomtypess_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `Hotel` (`hotel_id`);

--
-- Constraints for table `safariBookings`
--
ALTER TABLE `safariBookings`
  ADD CONSTRAINT `safaribookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `User` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
