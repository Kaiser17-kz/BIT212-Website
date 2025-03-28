-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2025 at 06:24 AM
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
-- Database: `cafe`
--

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_number` int(5) NOT NULL,
  `order_date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `amount` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_number`, `order_date_time`, `amount`) VALUES
(1, '2024-11-13 07:38:30', 150.00),
(2, '2024-11-13 07:38:57', 148.50),
(3, '2024-11-14 00:25:02', 87.50),
(4, '2024-11-14 00:26:50', 87.50),
(5, '2024-11-14 00:28:50', 105.00);

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `order_number` int(5) NOT NULL,
  `order_item_number` int(5) NOT NULL,
  `product_id` int(3) DEFAULT NULL,
  `quantity` int(2) DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`order_number`, `order_item_number`, `product_id`, `quantity`, `amount`) VALUES
(4, 1, 2, 6, 90.00);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(3) NOT NULL,
  `product_name` varchar(40) NOT NULL DEFAULT ' ',
  `description` varchar(200) NOT NULL DEFAULT ' ',
  `price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `product_group` int(2) NOT NULL DEFAULT 1,
  `image_url` varchar(256) DEFAULT 'images/default-image.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `description`, `price`, `product_group`, `image_url`) VALUES
(2, 'Choco Banana', 'We have more than half-a-dozen flavors!', 15.00, 1, 'images/choco_banana.png'),
(3, 'Durian', 'Made with Malaysia Musang King with a touch of Madagascar vanilla', 22.50, 1, 'images/durian.png'),
(4, 'Araibata Spagetti', 'Italy style pasta with  Tomato Sauce  ', 15.50, 3, 'images/araibata_spagetti.png'),
(5, 'Marcaroni', 'Bursting taste with a Homemade secret Marcaroni sauce', 12.50, 3, 'images/marcaroni.png'),
(6, 'Bolongnese', 'Made with france cheese and a delicious imported Pasta', 16.50, 3, 'images/bolognese.png'),
(7, 'Coffee', 'Freshly-ground black or blended Columbian coffee', 6.00, 2, 'images/coffee.png'),
(8, 'Tea', 'Rich flavour red tea from Cameron Highland', 5.00, 2, 'images/tea.png'),
(9, 'Strawberry Soda', 'Strawberry juice with the sparking feels', 8.50, 2, 'images/strawberry.png'),
(13, 'Nutella', 'Nutella Stick', 4.20, 1, 'images/nutellab-ready stick.png');

-- --------------------------------------------------------

--
-- Table structure for table `productgroup`
--

CREATE TABLE `productgroup` (
  `product_group` int(3) NOT NULL,
  `product_group_name` varchar(25) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productgroup`
--

INSERT INTO `productgroup` (`product_group`, `product_group_name`) VALUES
(1, 'Cake'),
(2, 'Drink'),
(3, 'Dishes'),
(4, 'Others');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_number`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`order_number`,`order_item_number`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_group` (`product_group`);

--
-- Indexes for table `productgroup`
--
ALTER TABLE `productgroup`
  ADD PRIMARY KEY (`product_group`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_number` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `order_item_ibfk_1` FOREIGN KEY (`order_number`) REFERENCES `order` (`order_number`),
  ADD CONSTRAINT `order_item_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`product_group`) REFERENCES `productgroup` (`product_group`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
