-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2023 at 05:29 PM
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
-- Database: `businessdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user` varchar(25) NOT NULL,
  `passwords` char(255) NOT NULL,
  `reg_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user`, `passwords`, `reg_date`) VALUES
(12, 'Myname', '$2y$10$w5h1WtdvdvfkKjQTi0MuTu3Cf3itWKeaM0NdrEvSFctKHWckdZM/S', '2023-11-22 14:23:05'),
(18, 'asd', '$2y$10$OzA0VSApFHtRwAFjrj8fouHx.x1/g0Z3LrE.zLZ.ygo5BlpkWDnPG', '2023-11-22 14:29:06'),
(19, 'qwe', '$2y$10$aiFNeKTKd2IFdHmGW8oGF.vrHKSVuhZkt9SuCvAXA3q6rSy5llppK', '2023-11-22 14:30:43'),
(22, 'Test', '$2y$10$hJhZzSUqHQoLZIgYYGqT7e9zNC8B0biG/KQplkdyVd/gidGVYC262', '2023-11-22 14:32:03'),
(27, 'Diana', '$2y$10$dMXVJoJ5fbiK63O38y6Em.1V.sM3v8Uq./cmUTfu25A/D8UTUa0IC', '2023-11-22 15:01:48'),
(33, 'qweqwe', '$2y$10$K3JMiE1Q490rUTWlIC5.UuGKh1Iz.sTEx1k3T8/pafyw8j8hRanAq', '2023-11-27 15:21:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user` (`user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
