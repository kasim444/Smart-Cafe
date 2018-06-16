-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 16 Haz 2018, 20:33:55
-- Sunucu sürümü: 10.1.31-MariaDB
-- PHP Sürümü: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `smartcafe`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `category`
--

CREATE TABLE `category` (
  `categoryId` int(11) NOT NULL,
  `categoryName` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `image` varchar(50) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `category`
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
-- Tablo için tablo yapısı `order`
--

CREATE TABLE `order` (
  `orderID` int(11) NOT NULL,
  `tableID` int(11) NOT NULL,
  `orderDate` datetime NOT NULL,
  `orderStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `order`
--

INSERT INTO `order` (`orderID`, `tableID`, `orderDate`, `orderStatus`) VALUES
(135, 14, '2018-06-16 17:40:27', 1),
(136, 14, '2018-06-16 17:42:09', 1),
(137, 14, '2018-06-16 18:06:59', 1),
(138, 14, '2018-06-16 19:32:13', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `orderdetail`
--

CREATE TABLE `orderdetail` (
  `orderdId` int(11) NOT NULL,
  `orderID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `unitPrice` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `orderdetail`
--

INSERT INTO `orderdetail` (`orderdId`, `orderID`, `productID`, `unitPrice`, `quantity`, `total`) VALUES
(3, 135, 7, 10, 2, 20.00),
(4, 135, 10, 10, 2, 20.00),
(5, 136, 10, 10, 2, 20.00),
(6, 136, 8, 10, 2, 20.00),
(7, 136, 7, 10, 5, 50.00),
(8, 136, 18, 10, 5, 50.00),
(9, 136, 14, 5, 4, 20.00),
(10, 137, 7, 10, 1, 10.00),
(11, 137, 10, 10, 1, 10.00),
(12, 138, 7, 10, 2, 20.00),
(13, 138, 9, 10, 2, 20.00);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products`
--

CREATE TABLE `products` (
  `productID` int(11) NOT NULL,
  `productName` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `productPrice` double(10,2) NOT NULL,
  `categoryId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `products`
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
-- Tablo için tablo yapısı `table`
--

CREATE TABLE `table` (
  `tableID` int(11) NOT NULL,
  `tableName` varchar(50) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `table`
--

INSERT INTO `table` (`tableID`, `tableName`) VALUES
(14, 'a1');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryId`);

--
-- Tablo için indeksler `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `tableID_2` (`tableID`);

--
-- Tablo için indeksler `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`orderdId`),
  ADD KEY `productID` (`productID`),
  ADD KEY `orderID` (`orderID`);

--
-- Tablo için indeksler `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`),
  ADD KEY `categoryId` (`categoryId`);

--
-- Tablo için indeksler `table`
--
ALTER TABLE `table`
  ADD PRIMARY KEY (`tableID`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `category`
--
ALTER TABLE `category`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `order`
--
ALTER TABLE `order`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- Tablo için AUTO_INCREMENT değeri `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `orderdId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tablo için AUTO_INCREMENT değeri `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Tablo için AUTO_INCREMENT değeri `table`
--
ALTER TABLE `table`
  MODIFY `tableID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
