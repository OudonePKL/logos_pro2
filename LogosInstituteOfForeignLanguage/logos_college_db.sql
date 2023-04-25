-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2023 at 10:15 AM
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
-- Database: `logos_college_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) NOT NULL,
  `admin_id` varchar(255) NOT NULL,
  `firstname_la` varchar(255) NOT NULL,
  `lastname_la` varchar(255) NOT NULL,
  `firstname_en` varchar(255) NOT NULL,
  `lastname_en` varchar(255) NOT NULL,
  `firstname_ch` varchar(255) NOT NULL,
  `lastname_ch` varchar(255) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `dateofbirth` varchar(100) NOT NULL,
  `phonenumber` varchar(100) NOT NULL,
  `whatsappnumber` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address_residence` varchar(255) NOT NULL,
  `address_current` varchar(255) NOT NULL,
  `address_current_type` varchar(100) NOT NULL,
  `nation` varchar(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `university` varchar(255) NOT NULL,
  `highschool` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `admin_id`, `firstname_la`, `lastname_la`, `firstname_en`, `lastname_en`, `firstname_ch`, `lastname_ch`, `gender`, `dateofbirth`, `phonenumber`, `whatsappnumber`, `email`, `address_residence`, `address_current`, `address_current_type`, `nation`, `religion`, `university`, `highschool`, `image`, `created_at`, `updated_at`) VALUES
(68, 'am001', 'ແອດມິນ', '001', 'Admin', '001', '行政', '001', 'Male', '25-04-2023', '02099999999', '02099999999', 'am001@gmail.com', 'Vientiane', 'Vientiane', 'Self', 'Laos', 'Buddhism', 'KKK', 'HHH', 'myImage.JPG', '2023-04-25 03:49:39', '2023-04-25 03:49:39');

-- --------------------------------------------------------

--
-- Table structure for table `season_year`
--

CREATE TABLE `season_year` (
  `id` int(10) NOT NULL,
  `year` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `season_year`
--

INSERT INTO `season_year` (`id`, `year`, `created_at`, `updated_at`) VALUES
(10, '2019-2020', '2023-04-20 12:24:31', '2023-04-20 12:24:31'),
(11, '2020-2021', '2023-04-20 12:24:35', '2023-04-20 12:24:35');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `firstname_la` varchar(255) NOT NULL,
  `lastname_la` varchar(255) NOT NULL,
  `firstname_en` varchar(255) NOT NULL,
  `lastname_en` varchar(255) NOT NULL,
  `firstname_ch` varchar(255) NOT NULL,
  `lastname_ch` varchar(255) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `dateofbirth` varchar(100) NOT NULL,
  `phonenumber` varchar(100) NOT NULL,
  `whatsappnumber` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address_residence` varchar(255) NOT NULL,
  `address_current` varchar(255) NOT NULL,
  `address_current_type` varchar(100) NOT NULL,
  `nation` varchar(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `highschool` varchar(255) NOT NULL,
  `middleschool` varchar(255) NOT NULL,
  `elementaryschool` varchar(255) NOT NULL,
  `familymatters` varchar(255) NOT NULL,
  `plansforthefuture` varchar(255) NOT NULL,
  `seasonyear` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_id`, `firstname_la`, `lastname_la`, `firstname_en`, `lastname_en`, `firstname_ch`, `lastname_ch`, `gender`, `dateofbirth`, `phonenumber`, `whatsappnumber`, `email`, `address_residence`, `address_current`, `address_current_type`, `nation`, `religion`, `highschool`, `middleschool`, `elementaryschool`, `familymatters`, `plansforthefuture`, `seasonyear`, `image`, `created_at`, `updated_at`) VALUES
(69, 'std001', 'Jojo', 'JJJ', 'Jojo', 'JJJ', 'Jojo', 'JJJ', 'Male', '25-04-2023', '02088888888', '02088888888', 'jojo@gmail.com', 'LungNumtha', 'Vientiane', 'Hengtaew', 'Laos', 'Christianity', 'KKK', 'AAA', 'HKG', 'kkkk', 'KKK', '2020-2021', 'Done22.jpg', '2023-04-25 04:11:54', '2023-04-25 04:11:54'),
(71, 'std002', 'Kim', 'KKK', 'Kim', 'KKK', 'Kim', 'KKK', 'Male', '25-04-2023', '02088888881', '02088888881', 'kim@gmail.com', 'Vientiane', 'Vientiane', 'Self', 'Laos', 'Buddhism', 'HHH', 'KKK', 'KKK', 'kkkk', 'KKK', '2020-2021', '1111.png', '2023-04-25 04:22:25', '2023-04-25 04:22:25');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(10) NOT NULL,
  `teacher_id` varchar(255) NOT NULL,
  `firstname_la` varchar(255) NOT NULL,
  `lastname_la` varchar(255) NOT NULL,
  `firstname_en` varchar(255) NOT NULL,
  `lastname_en` varchar(255) NOT NULL,
  `firstname_ch` varchar(255) NOT NULL,
  `lastname_ch` varchar(255) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `dateofbirth` varchar(100) NOT NULL,
  `phonenumber` varchar(100) NOT NULL,
  `whatsappnumber` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address_residence` varchar(255) NOT NULL,
  `address_current` varchar(255) NOT NULL,
  `address_current_type` varchar(100) NOT NULL,
  `nation` varchar(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `university` varchar(255) NOT NULL,
  `hightschool` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `urole` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `email`, `password`, `urole`, `created_at`, `updated_at`) VALUES
(68, 'am001', 'am001@gmail.com', '$2y$10$AOI7/2CTaOv3h1MTUDDG0.xgMmo5PabGuMh8aKlcd048z9gL9k9rS', 'Administrator', '2023-04-25 03:49:39', '2023-04-25 03:49:39'),
(69, 'std001', 'jojo@gmail.com', '$2y$10$wGRmlwGd20YYgczK2tI1Yer5tRzqyF1FGNrUplicP9owcnnhMMwsq', 'student', '2023-04-25 04:11:54', '2023-04-25 04:11:54'),
(71, 'std002', 'kim@gmail.com', '$2y$10$a6PC6GjaM38uM3knaXd.9exOHKgRSb/pStsavjNiSl4txvY4fD2VC', 'Student', '2023-04-25 04:22:25', '2023-04-25 04:22:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `season_year`
--
ALTER TABLE `season_year`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `season_year`
--
ALTER TABLE `season_year`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
