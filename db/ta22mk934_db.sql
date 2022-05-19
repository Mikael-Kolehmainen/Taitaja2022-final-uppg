-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 19, 2022 at 08:55 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ta22mk934_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `liikuntamatkat`
--

CREATE TABLE `liikuntamatkat` (
  `id` int(4) NOT NULL,
  `longitudi` varchar(255) DEFAULT NULL,
  `latitudi` varchar(255) DEFAULT NULL,
  `otsikko` varchar(255) DEFAULT NULL,
  `kuvausteksti` varchar(10000) DEFAULT NULL,
  `alku` varchar(255) DEFAULT NULL,
  `loppu` varchar(255) DEFAULT NULL,
  `kuva` varchar(255) DEFAULT NULL,
  `pdf` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(4) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `pw` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `pw`) VALUES
(1, 'admin', 'PfI8M$2y$10$0Ku1RFTFENb9WMIh7KzAtOU56vo7m1xTE6zfBY8BSYSkHtVXoCpdm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `liikuntamatkat`
--
ALTER TABLE `liikuntamatkat`
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
-- AUTO_INCREMENT for table `liikuntamatkat`
--
ALTER TABLE `liikuntamatkat`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
