-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2024 at 07:25 PM
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
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirmpassword` varchar(255) NOT NULL,
  `isadmin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `surname`, `username`, `email`, `password`, `confirmpassword`, `isadmin`) VALUES
(1, 'Redon', 'Bytyqi', 'redline', 'redon@gmail.com', '$2y$10$rWrL3/25Aq3r4gHmpWL0eOX844q0iyuSju7o65RT1D7f6XCozIPKC', '$2y$10$S3WNz/VkBTDnC1GXAcvj5eXzzc.SumhhKJkYoxqi9xW56JyuLhBkS', ''),
(2, 'redon', 'bytyqi', 'redline1', 'redon@gmail.com', '$2y$10$Voso.8LRGmEkhsNNkXRKc.a1sk5MxonXEy81Dbi2oJDUFcHNju5BS', '$2y$10$QLerN8n9dXKsC0MkDvtKN.KlDu1WfewbV9CCriia6MnyOJfwaTBMG', '');

-- --------------------------------------------------------

--
-- Table structure for table `shopproducts`
--

CREATE TABLE `shopproducts` (
  `id` int(50) NOT NULL,
  `nameProducts` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `addToCart` varchar(255) NOT NULL,
  `addFavorite` varchar(255) NOT NULL,
  `imageProducts` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shopproducts`
--
ALTER TABLE `shopproducts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shopproducts`
--
ALTER TABLE `shopproducts`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
