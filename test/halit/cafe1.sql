-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 22, 2018 at 09:42 PM
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
-- Database: `cafe1`
--

-- --------------------------------------------------------

--
-- Table structure for table `masalar`
--

CREATE TABLE `masalar` (
  `masa_id` int(20) NOT NULL,
  `masa_adi` varchar(20) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `masalar`
--

INSERT INTO `masalar` (`masa_id`, `masa_adi`) VALUES
(1, 'a1'),
(2, 'a2');

-- --------------------------------------------------------

--
-- Table structure for table `siparis`
--

CREATE TABLE `siparis` (
  `sip_no` int(20) NOT NULL,
  `sip_zamani` date NOT NULL,
  `urun_id` int(20) NOT NULL,
  `miktar` int(20) NOT NULL,
  `masa_id` int(20) NOT NULL,
  `aciklama` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `toplam_tutar` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `urunler`
--

CREATE TABLE `urunler` (
  `urun_id` int(20) NOT NULL,
  `urun_adi` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `tur_id` int(20) NOT NULL,
  `birim_fiyati` float NOT NULL,
  `detay` varchar(250) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `urunler`
--

INSERT INTO `urunler` (`urun_id`, `urun_adi`, `tur_id`, `birim_fiyati`, `detay`) VALUES
(1, 'Tavuk Çorbası', 3, 10, ''),
(2, 'Mercimek Çorbası', 3, 10, ''),
(3, 'Nohut', 4, 15, ''),
(4, 'Pilav', 4, 15, ''),
(5, 'Yoğurt', 5, 5, ''),
(6, 'Cacık', 5, 5, ''),
(7, 'Mevsim Salata', 6, 10, ''),
(8, 'Çoban Salata', 6, 10, ''),
(9, 'Kadayıf', 2, 10, ''),
(10, 'Kemal Paşa', 2, 10, ''),
(11, 'Ayran', 1, 5, ''),
(12, 'Fanta', 1, 5, '');

-- --------------------------------------------------------

--
-- Table structure for table `urun_turu`
--

CREATE TABLE `urun_turu` (
  `tur_id` int(20) NOT NULL,
  `tur` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `img` varchar(250) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `urun_turu`
--

INSERT INTO `urun_turu` (`tur_id`, `tur`, `img`) VALUES
(1, 'İçecekler', ''),
(2, 'Tatlılar', ''),
(3, 'Çorbalar', ''),
(4, 'Günlük Yemekler', ''),
(5, 'Yan Ürünler', ''),
(6, 'Salatalar', '');

-- --------------------------------------------------------

--
-- Table structure for table `uyeler`
--

CREATE TABLE `uyeler` (
  `uye_id` int(20) NOT NULL,
  `user_name` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `value` varchar(20) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `masalar`
--
ALTER TABLE `masalar`
  ADD PRIMARY KEY (`masa_id`);

--
-- Indexes for table `siparis`
--
ALTER TABLE `siparis`
  ADD PRIMARY KEY (`sip_no`),
  ADD KEY `urun_id` (`urun_id`),
  ADD KEY `masa_id` (`masa_id`);

--
-- Indexes for table `urunler`
--
ALTER TABLE `urunler`
  ADD PRIMARY KEY (`urun_id`),
  ADD KEY `tur_id` (`tur_id`),
  ADD KEY `tur_id_2` (`tur_id`);

--
-- Indexes for table `urun_turu`
--
ALTER TABLE `urun_turu`
  ADD PRIMARY KEY (`tur_id`);

--
-- Indexes for table `uyeler`
--
ALTER TABLE `uyeler`
  ADD PRIMARY KEY (`uye_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `masalar`
--
ALTER TABLE `masalar`
  MODIFY `masa_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `siparis`
--
ALTER TABLE `siparis`
  MODIFY `sip_no` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `urunler`
--
ALTER TABLE `urunler`
  MODIFY `urun_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `urun_turu`
--
ALTER TABLE `urun_turu`
  MODIFY `tur_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `uyeler`
--
ALTER TABLE `uyeler`
  MODIFY `uye_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `siparis`
--
ALTER TABLE `siparis`
  ADD CONSTRAINT `siparis_ibfk_1` FOREIGN KEY (`masa_id`) REFERENCES `masalar` (`masa_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siparis_ibfk_2` FOREIGN KEY (`urun_id`) REFERENCES `urunler` (`urun_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `urunler`
--
ALTER TABLE `urunler`
  ADD CONSTRAINT `urunler_ibfk_1` FOREIGN KEY (`tur_id`) REFERENCES `urun_turu` (`tur_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
