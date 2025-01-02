-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 02, 2025 at 03:58 PM
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
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `clientmessages`
--

CREATE TABLE `clientmessages` (
  `id` int(100) NOT NULL,
  `email` varchar(535) NOT NULL,
  `message` varchar(535) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clientmessages`
--

INSERT INTO `clientmessages` (`id`, `email`, `message`) VALUES
(1, 'redon@gmail.com', 'test\r\n'),
(5, 'redon@gmail.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageM'),
(6, 'lorem@ipsum.com', 'Lorem ipsum '),
(7, 'lorem@ipsum.com', 'iusbafbuifba'),
(8, 'lorem@ipsum.com', 'dwadawda'),
(9, 'redon@gmail.com', 'test test');

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
(2, 'redon', 'bytyqi', 'redline1', 'redon@gmail.com', '$2y$10$Voso.8LRGmEkhsNNkXRKc.a1sk5MxonXEy81Dbi2oJDUFcHNju5BS', '$2y$10$QLerN8n9dXKsC0MkDvtKN.KlDu1WfewbV9CCriia6MnyOJfwaTBMG', 'true'),
(3, 'Besart', 'Ibishi', 'besartibishi', 'besart@gmail.com', '$2y$10$WhNJ4pN4RMS4YvffmzRiW.12lN8lIJuURPSSHDqfb07O7.Qzvnj6O', '$2y$10$V0MKo.QIkcH4XsN3RsdB.OdCP3ru.dSb1o.tlin8r7CALZ.BHZB8q', ''),
(4, 'Redon', 'b', 'red1', 'redon@gmail.com', '$2y$10$BtKASIzzH7VC7Mqfg0Q/YuiFaDzadl6LA4OTT5Hwb1YCJZs3a/FV6', '$2y$10$8er2khykQmGjvuSM7MXInuS.RUNTiH8N.ML/60NcBux8DpkSshzne', '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `userid` int(10) NOT NULL,
  `order_id` int(10) NOT NULL,
  `client` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(555) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `approve` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userid`, `order_id`, `client`, `email`, `address`, `productname`, `price`, `approve`) VALUES
(1, 4, 1, 'Redon Bytyqi', 'redon@gmail.com', 'Test', '', 0, 'true');

-- --------------------------------------------------------

--
-- Table structure for table `shopproducts`
--

CREATE TABLE `shopproducts` (
  `id` int(50) NOT NULL,
  `nameProducts` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `imageProducts` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shopproducts`
--

INSERT INTO `shopproducts` (`id`, `nameProducts`, `price`, `imageProducts`) VALUES
(6, 'HyperX Cloud Red II Headset', 99.99, 'hyperxcloud2red.webp'),
(7, 'HyperX Xbox Controller', 69.99, 'hyperxcontroller.webp'),
(8, 'HyperX Cloud II Headset', 99.99, 'hyperxheadsetnew.webp'),
(9, 'HyperX Keyboard', 149.99, 'hyperxkeyboard.webp'),
(10, 'HyperX Gaming Mic', 129.99, 'hyperxmic.webp'),
(11, 'HyperX Gaming Monitor', 259.99, 'hyperxmonitor.webp'),
(12, 'HyperX Black Mouse', 69.99, 'hyperxmouse.webp'),
(13, 'HyperX Keyboard Yellow', 159.99, 'hyperxnewkeyboard.webp'),
(14, 'HyperX Red Mouse', 59.99, 'hyperxnewmouse.webp'),
(15, 'HyperX Cloud Silver II Headset', 99.99, 'hyperxcloud2.webp'),
(16, 'Cloud MIX Buds 2', 89.99, 'hyperxear.webp'),
(17, 'OMEN 35L Gaming PC', 1599.99, 'omenpc.webp');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientmessages`
--
ALTER TABLE `clientmessages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_id` (`order_id`);

--
-- Indexes for table `shopproducts`
--
ALTER TABLE `shopproducts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientmessages`
--
ALTER TABLE `clientmessages`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shopproducts`
--
ALTER TABLE `shopproducts`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
