-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2023 at 07:14 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shirti`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `sno` int(255) NOT NULL,
  `name` text NOT NULL,
  `pno` bigint(11) NOT NULL,
  `address` longtext NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `products` varchar(255) NOT NULL,
  `total_pay` int(11) NOT NULL,
  `delivered` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products_all`
--

CREATE TABLE `products_all` (
  `sno` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `desc_` longtext NOT NULL,
  `price` int(11) NOT NULL,
  `sale_price` int(11) NOT NULL,
  `on_sale` text NOT NULL,
  `image_link` varchar(100) NOT NULL,
  `rating` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products_all`
--

INSERT INTO `products_all` (`sno`, `name`, `desc_`, `price`, `sale_price`, `on_sale`, `image_link`, `rating`, `date`) VALUES
(12, 'Cotton Shirt', 'Fabric : Cotton <br>  Sleeve Length : Long Sleeves<br>  Pattern : Printed  Multipack : 1 <br> Sizes :  XL (Chest Size : 42 in Length Size: 30 in)  L (Chest Size : 40 in Length Size: 29 in)  M (Chest Size : 38 in Length Size: 28 in)<br>Country of Origin : India', 499, 0, 'no', 'images/products/sh (5).jpg', 5, '0000-00-00'),
(13, 'Cotton Shirt', 'Fabric : Cotton <br>  Sleeve Length : Long Sleeves<br>  Pattern : Solid <br> Multipack : 1 <br> Sizes :  XL (Chest Size : 42 in Length Size: 30 in)  L (Chest Size : 40 in Length Size: 29 in)  M (Chest Size : 38 in Length Size: 28 in)<br>Country of Origin : India', 499, 0, 'no', 'images/products/sh (10).jpg', 5, '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `products_all`
--
ALTER TABLE `products_all`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `sno` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products_all`
--
ALTER TABLE `products_all`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
