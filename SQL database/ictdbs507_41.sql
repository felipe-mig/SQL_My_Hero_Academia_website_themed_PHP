-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2024 at 04:36 AM
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
-- Database: `ictdbs507_41`
--

-- --------------------------------------------------------

--
-- Table structure for table `quirks`
--

CREATE TABLE `quirks` (
  `id` int(11) NOT NULL,
  `quirkName` varchar(1000) NOT NULL,
  `quirkDesc` text NOT NULL,
  `quirkUser` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quirks`
--

INSERT INTO `quirks` (`id`, `quirkName`, `quirkDesc`, `quirkUser`) VALUES
(1, 'One For All', 'A quirk that allows the user to accumulate and transfer huge reserves of raw power, granting them incredible physical strength and speed.', 'Izuku Midoriya, All Might, and previous successors.'),
(7, 'All For One', 'A quirk that allows the user to steal, combine, and transfer quirks from other people, leaving them quirkless.', ' All For One and Tomura Shigaraki.'),
(8, 'Half-Cold Half-Hot', 'A quirk that allows the user to generate and manipulate ice from the right side of their body and fire from the left side of their body.', 'Shoto Todoroki and his father Endeavor.'),
(9, 'Overhaul ', 'A quirk that allows the user to disassemble and reassemble anything they touch with their hands, including living beings.', 'Kai Chisaki (Overhaul).'),
(11, 'Decay ', ' A quirk that allows the user to disintegrate anything they touch with all five fingers, causing it to crumble into dust.', 'Tomura Shigaraki and his grandmother Nana Shimura. '),
(16, 'Erasure', 'A quirk that allows the user to temporarily erase the quirks of anyone they look at, as long as they dont blink ', 'Shota Aizawa (Eraser Head).'),
(17, 'Permeation ', 'A quirk that allows the user to phase through anything they touch, including solid objects, liquids, and air.', 'Mirio Togata (Lemillion).'),
(18, 'Creation', ' A quirk that allows the user to create any non-living object from their body fat, as long as they know its molecular structure. ', 'Momo Yaoyorozu (Creati).'),
(19, 'Foresight', 'A quirk that allows the user to see the future movements and actions of anyone they touch for an hour. ', 'Sir Nighteye.'),
(25, 'Explosion', 'A quirk that allows the user to create explosions from their sweat, which is similar to nitroglycerin. ', 'Katsuki Bakugo (Dynamight).');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `quirks`
--
ALTER TABLE `quirks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `quirks`
--
ALTER TABLE `quirks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
