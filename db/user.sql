-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2024 at 10:41 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dcsa_form`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password_hash`) VALUES
(9, 'naveen', 'naveen@gmail.com', '$2y$10$hDri7jLkE6C1rO2HxvCF1uOnMAcNu9l5jRRrg0LcDpBL052R.EBwK'),
(12, 'nk', 'nk@gmail.com', '$2y$10$PzeFnHTiOlb7SowmFlZ8zOFDyP4ZviMZ6TKVnLS3CupB5wyar56WS'),
(13, 'test 1', 'test@gmail.com', '$2y$10$j1NIlJ7zhmeYFAdVKGRQfeRUkHJEvfH/XBn4zxYA/H1VyD3BDaV/a'),
(16, 'test 2', 'test2@gmail.com', '$2y$10$Fah5IKbugXMruOEJ3N//jO.xCg8WhIoBVYhnK6xuEtMxMvYNBWJ1C'),
(17, 'test 3', 'test3@gmail.com', '$2y$10$fmN/spmtiBD6wGbhtrIUIuQeLshqR07en/MNHrbkZxqvtnEyF1XNu'),
(19, 'test 4', 'test4@gmail.com', '$2y$10$cDcgBZpDvhwbCL6Ho7l72.X.GhJwQfq.v.EjClwSp09N.teiD77Ae');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
