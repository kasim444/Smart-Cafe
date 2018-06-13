-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 13 Haz 2018, 18:09:43
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
  `categoryName` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `image` varchar(250) COLLATE utf8_turkish_ci NOT NULL
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
  `orderDate` date NOT NULL,
  `orderStatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `order`
--

INSERT INTO `order` (`orderID`, `tableID`, `orderDate`, `orderStatus`) VALUES
(57, 1, '2018-06-12', 1),
(58, 2, '2018-06-12', 1),
(59, 2, '2018-06-12', 1),
(60, 2, '2018-06-12', 1),
(61, 2, '2018-06-12', 1),
(62, 2, '2018-06-12', 1),
(63, 2, '2018-06-12', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `orderdetail`
--

CREATE TABLE `orderdetail` (
  `orderID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `unitPrice` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

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
  `tableName` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `tableStatus` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `table`
--

INSERT INTO `table` (`tableID`, `tableName`, `tableStatus`) VALUES
(14, 'a1', 0);

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
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `productID` (`productID`);

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
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- Tablo için AUTO_INCREMENT değeri `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderdetail_ibfk_1` FOREIGN KEY (`orderID`) REFERENCES `order` (`orderID`),
  ADD CONSTRAINT `orderdetail_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`);

--
-- Tablo kısıtlamaları `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`categoryId`) REFERENCES `category` (`categoryId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
