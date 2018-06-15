-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2018 at 02:48 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartcafe`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryId` int(11) NOT NULL,
  `categoryName` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `image` varchar(50) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryId`, `categoryName`, `image`) VALUES
(2, 'Çorbalar', 'img/soup.png'),
(3, 'Günlük Yemekler', 'img/foods.png'),
(4, 'Salata Çeşitleri', 'img/salad.png'),
(5, 'Yan Ürünler', 'img/supplements.png'),
(6, 'İçecekler', 'img/drinks.png'),
(7, 'Tatlılar', 'img/dessert.png');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `orderID` int(11) NOT NULL,
  `tableID` int(11) NOT NULL,
  `orderDate` datetime NOT NULL,
  `orderStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`orderID`, `tableID`, `orderDate`, `orderStatus`) VALUES
(57, 1, '2018-06-12 00:00:00', 1),
(58, 2, '2018-06-12 00:00:00', 1),
(59, 2, '2018-06-12 00:00:00', 1),
(60, 2, '2018-06-12 00:00:00', 1),
(61, 2, '2018-06-12 00:00:00', 1),
(62, 2, '2018-06-12 00:00:00', 1),
(63, 2, '2018-06-12 00:00:00', 1),
(64, 2, '2018-06-12 00:00:00', 1),
(65, 2, '2018-06-12 00:00:00', 1),
(66, 2, '2018-06-12 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `orderID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `unitPrice` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`orderID`, `productID`, `unitPrice`, `quantity`, `total`) VALUES
(1, 2, 10, 20, 200.00);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productID` int(11) NOT NULL,
  `productName` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `productPrice` double(10,2) NOT NULL,
  `categoryId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `productName`, `productPrice`, `categoryId`) VALUES
(7, 'Tavuk Çorbası', 10.00, 2),
(8, 'Mercimek Çorbası', 10.00, 2),
(9, 'Nohut', 10.00, 3),
(10, 'Pilav', 10.00, 3),
(11, 'Mevsim Salata', 10.00, 4),
(12, 'Çoban Salata', 10.00, 4),
(13, 'Yoğurt', 5.00, 5),
(14, 'Cacık', 5.00, 5),
(15, 'Ayran', 3.00, 6),
(16, 'Fanta', 4.00, 6),
(17, 'Kadayıf', 10.00, 7),
(18, 'Kemal Paşa', 10.00, 7);

-- --------------------------------------------------------

--
-- Table structure for table `table`
--

CREATE TABLE `table` (
  `tableID` int(11) NOT NULL,
  `tableName` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `tableStatus` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `table`
--

INSERT INTO `table` (`tableID`, `tableName`, `tableStatus`) VALUES
(14, 'a1', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `tableID_2` (`tableID`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`),
  ADD KEY `categoryId` (`categoryId`);

--
-- Indexes for table `table`
--
ALTER TABLE `table`
  ADD PRIMARY KEY (`tableID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `table`
--
ALTER TABLE `table`
  MODIFY `tableID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
