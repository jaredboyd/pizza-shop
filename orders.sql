-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 29, 2017 at 09:12 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizza_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `oid` int(11) NOT NULL,
  `fName` varchar(30) NOT NULL,
  `lName` varchar(40) NOT NULL,
  `size` char(6) NOT NULL,
  `sauce` varchar(10) NOT NULL,
  `cheese` varchar(10) NOT NULL,
  `toppings` varchar(100) NOT NULL,
  `orderType` varchar(10) NOT NULL,
  `total` float DEFAULT NULL,
  `placementDatetime` datetime DEFAULT CURRENT_TIMESTAMP,
  `cookedDatetime` datetime DEFAULT NULL,
  `pickupDeliveryDatetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`oid`, `fName`, `lName`, `size`, `sauce`, `cheese`, `toppings`, `orderType`, `total`, `placementDatetime`, `cookedDatetime`, `pickupDeliveryDatetime`) VALUES
(1, 'Jared', 'Boyd', 'large', 'normal', 'extra', 'pepperoni, blackOlives, mushrooms', 'delivery', 16.5, '2017-04-27 22:24:06', '2017-04-27 22:33:39', '2017-04-27 22:40:56'),
(2, 'Veggie', 'Tarian', 'medium', 'normal', 'normal', 'greenPeppers, blackOlives, mushrooms, onions', 'delivery', 16, '2017-04-27 22:25:07', '2017-04-27 22:33:59', '2017-04-27 22:34:12'),
(3, 'Meat', 'Lover', 'medium', 'extra', 'normal', 'pepperoni, sausage, bacon', 'carryout', 14.5, '2017-04-27 22:25:34', '2017-04-27 22:35:50', '2017-04-27 22:44:42'),
(4, 'Just', 'Crust', 'small', 'none', 'none', 'No Toppings', 'carryout', 8, '2017-04-27 22:27:24', '2017-04-27 22:40:42', '2017-04-27 22:52:02'),
(5, 'Nathan', 'Fillion', 'large', 'normal', 'normal', 'pepperoni, bacon, blackOlives', 'delivery', 16.5, '2017-04-27 22:28:38', '2017-04-27 22:44:28', '2017-04-27 22:50:04'),
(6, 'Alan', 'Tudyk', 'medium', 'light', 'normal', 'pepperoni, sausage, greenPeppers, onions', 'carryout', 16, '2017-04-27 22:29:20', '2017-04-27 22:47:43', '2017-04-27 22:52:09'),
(7, 'Jewel', 'Staite', 'small', 'normal', 'light', 'blackOlives, mushrooms', 'carryout', 11, '2017-04-27 22:30:42', '2017-04-27 22:49:47', '2017-04-27 22:56:18'),
(8, 'Sean', 'Maher', 'large', 'normal', 'normal', 'pepperoni', 'carryout', 13.5, '2017-04-27 22:31:45', '2017-04-27 22:52:01', '2017-04-27 22:59:12'),
(9, 'Summer', 'Glau', 'large', 'normal', 'normal', 'sausage, greenPeppers, onions', 'carryout', 16.5, '2017-04-27 22:32:42', '2017-04-27 22:53:25', '2017-04-27 22:56:20'),
(10, 'Gina', 'Torres', 'small', 'light', 'none', 'greenPeppers, mushrooms', 'delivery', 11, '2017-04-27 22:35:16', '2017-04-27 22:53:34', '2017-04-27 22:59:17'),
(11, 'Ron', 'Glass', 'large', 'normal', 'normal', 'pepperoni, sausage, bacon, greenPeppers, blackOlives, mushrooms, onions', 'carryout', 22.5, '2017-04-27 22:37:16', '2017-04-27 22:56:22', '2017-04-27 23:00:15'),
(12, 'Joss', 'Whedon', 'medium', 'normal', 'normal', 'sausage, mushrooms', 'delivery', 13, '2017-04-27 22:40:21', '2017-04-27 22:59:14', '2017-04-27 23:05:55'),
(13, 'Malcolm', 'Reynolds', 'large', 'extra', 'normal', 'pepperoni, blackOlives, onions', 'delivery', 16.5, '2017-04-27 22:46:21', '2017-04-27 22:59:21', '2017-04-27 23:00:22'),
(14, 'Meghan', 'Cohen', 'medium', 'normal', 'extra', 'pepperoni', 'delivery', 11.5, '2017-04-27 22:47:31', '2017-04-27 23:00:26', '2017-04-27 23:00:39'),
(15, 'Morena', 'Baccarin', 'medium', 'normal', 'light', 'mushrooms', 'carryout', 11.5, '2017-04-27 22:49:24', '2017-04-27 23:00:17', '2017-04-27 23:01:53'),
(16, 'Jayne', 'Cobb', 'large', 'normal', 'normal', 'pepperoni, bacon, onions', 'carryout', 16.5, '2017-04-27 22:51:06', '2017-04-27 23:01:18', '2017-04-27 23:06:02'),
(17, 'Kaylee', 'Frye', 'small', 'normal', 'normal', 'greenPeppers, blackOlives, mushrooms', 'delivery', 12.5, '2017-04-27 22:53:11', '2017-04-27 23:01:45', '2017-04-27 23:01:59'),
(18, 'Simon', 'Tam', 'large', 'normal', 'normal', 'sausage, greenPeppers', 'carryout', 15, '2017-04-27 22:56:03', '2017-04-27 23:02:04', '2017-04-27 23:06:16'),
(19, 'Inara', 'Serra', 'medium', 'extra', 'normal', 'pepperoni, sausage', 'carryout', 13, '2017-04-27 22:57:23', '2017-04-27 23:05:52', '2017-04-27 23:06:06'),
(20, 'Shepherd', 'Book', 'large', 'extra', 'extra', 'pepperoni, bacon, mushrooms', 'delivery', 16.5, '2017-04-27 22:58:54', '2017-04-27 23:06:12', '2017-04-27 23:06:26'),
(21, 'New', 'Order', 'medium', 'normal', 'normal', 'No Toppings', 'carryout', 10, '2017-04-27 22:59:59', NULL, NULL),
(22, 'New', 'Account', 'medium', 'normal', 'normal', 'No Toppings', 'carryout', 10, '2017-04-29 02:08:26', NULL, NULL),
(23, 'Nathan', 'Fillion', 'large', 'normal', 'extra', 'pepperoni, bacon, blackOlives, mushrooms', 'delivery', 18, '2017-04-29 02:12:01', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`oid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
