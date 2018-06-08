-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 08 Haz 2018, 15:31:15
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
-- Veritabanı: `cafe1`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `masalar`
--

CREATE TABLE `masalar` (
  `masa_id` int(20) NOT NULL,
  `masa_adi` varchar(20) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `masalar`
--

INSERT INTO `masalar` (`masa_id`, `masa_adi`) VALUES
(1, 'a1'),
(2, 'a2');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siparis`
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
-- Tablo için tablo yapısı `urunler`
--

CREATE TABLE `urunler` (
  `urun_id` int(20) NOT NULL,
  `urun_adi` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `tur_id` int(20) NOT NULL,
  `birim_fiyati` float NOT NULL,
  `detay` varchar(250) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `urunler`
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
-- Tablo için tablo yapısı `urun_turu`
--

CREATE TABLE `urun_turu` (
  `tur_id` int(20) NOT NULL,
  `tur` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `img` varchar(250) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `urun_turu`
--

INSERT INTO `urun_turu` (`tur_id`, `tur`, `img`) VALUES
(1, 'İçecekler', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRx2mCxgGMhnWkRGjZbTt8d_essb_MWU4jvA3D8gwk350Ltowp6'),
(2, 'Tatlılar', 'https://www.pngarts.com/files/1/Sweet-Transparent-Image.png'),
(3, 'Çorbalar', 'https://www.freeiconspng.com/uploads/eat-soup-png-5.png'),
(4, 'Günlük Yemekler', 'https://peakfitnessmeals.com/wp-content/uploads/2017/04/fresh-options.png'),
(5, 'Yan Ürünler', 'http://www.mazalv.com/wp-content/uploads/2016/11/Caciik-1-1.png'),
(6, 'Salatalar', 'http://restaurant.atemya.net/resgenel/menu724466.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `usr62`
--

CREATE TABLE `usr62` (
  `urun_id` int(11) NOT NULL,
  `urun_adi` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `adet` int(11) NOT NULL,
  `birim_fiyat` int(11) DEFAULT NULL,
  `toplam` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `usr62`
--

INSERT INTO `usr62` (`urun_id`, `urun_adi`, `adet`, `birim_fiyat`, `toplam`) VALUES
(12, 'Fanta', 1, 5, 5);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `usr65`
--

CREATE TABLE `usr65` (
  `urun_id` int(11) NOT NULL,
  `urun_adi` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `adet` int(11) NOT NULL,
  `birim_fiyat` int(11) DEFAULT NULL,
  `toplam` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `usr65`
--

INSERT INTO `usr65` (`urun_id`, `urun_adi`, `adet`, `birim_fiyat`, `toplam`) VALUES
(3, 'Nohut', 1, 15, 15),
(4, 'Pilav', 1, 15, 15),
(12, 'Fanta', 2, 5, 10);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `usr68`
--

CREATE TABLE `usr68` (
  `urun_id` int(11) NOT NULL,
  `urun_adi` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `adet` int(11) NOT NULL,
  `birim_fiyat` int(11) DEFAULT NULL,
  `toplam` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `usr70`
--

CREATE TABLE `usr70` (
  `urun_id` int(11) NOT NULL,
  `urun_adi` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `adet` int(11) NOT NULL,
  `birim_fiyat` int(11) DEFAULT NULL,
  `toplam` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `usr70`
--

INSERT INTO `usr70` (`urun_id`, `urun_adi`, `adet`, `birim_fiyat`, `toplam`) VALUES
(11, 'Ayran', 2, 5, 10),
(12, 'Fanta', 1, 5, 5);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `usr72`
--

CREATE TABLE `usr72` (
  `urun_id` int(11) NOT NULL,
  `urun_adi` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `adet` int(11) NOT NULL,
  `birim_fiyat` int(11) DEFAULT NULL,
  `toplam` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `usr72`
--

INSERT INTO `usr72` (`urun_id`, `urun_adi`, `adet`, `birim_fiyat`, `toplam`) VALUES
(11, 'Ayran', 1, 5, 5),
(12, 'Fanta', 1, 5, 5);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `usr73`
--

CREATE TABLE `usr73` (
  `urun_id` int(11) NOT NULL,
  `urun_adi` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `adet` int(11) NOT NULL,
  `birim_fiyat` int(11) DEFAULT NULL,
  `toplam` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `usr90`
--

CREATE TABLE `usr90` (
  `urun_id` int(11) NOT NULL,
  `urun_adi` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `adet` int(11) NOT NULL,
  `birim_fiyat` int(11) DEFAULT NULL,
  `toplam` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `usr96`
--

CREATE TABLE `usr96` (
  `urun_id` int(11) NOT NULL,
  `urun_adi` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `adet` int(11) NOT NULL,
  `birim_fiyat` int(11) DEFAULT NULL,
  `toplam` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `usr97`
--

CREATE TABLE `usr97` (
  `urun_id` int(11) NOT NULL,
  `urun_adi` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `adet` int(11) NOT NULL,
  `birim_fiyat` int(11) DEFAULT NULL,
  `toplam` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

CREATE TABLE `uyeler` (
  `uye_id` int(20) NOT NULL,
  `user_name` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `value` varchar(20) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `masalar`
--
ALTER TABLE `masalar`
  ADD PRIMARY KEY (`masa_id`);

--
-- Tablo için indeksler `siparis`
--
ALTER TABLE `siparis`
  ADD PRIMARY KEY (`sip_no`),
  ADD KEY `urun_id` (`urun_id`),
  ADD KEY `masa_id` (`masa_id`);

--
-- Tablo için indeksler `urunler`
--
ALTER TABLE `urunler`
  ADD PRIMARY KEY (`urun_id`),
  ADD KEY `tur_id` (`tur_id`),
  ADD KEY `tur_id_2` (`tur_id`);

--
-- Tablo için indeksler `urun_turu`
--
ALTER TABLE `urun_turu`
  ADD PRIMARY KEY (`tur_id`);

--
-- Tablo için indeksler `usr62`
--
ALTER TABLE `usr62`
  ADD PRIMARY KEY (`urun_id`);

--
-- Tablo için indeksler `usr65`
--
ALTER TABLE `usr65`
  ADD PRIMARY KEY (`urun_id`);

--
-- Tablo için indeksler `usr68`
--
ALTER TABLE `usr68`
  ADD PRIMARY KEY (`urun_id`);

--
-- Tablo için indeksler `usr70`
--
ALTER TABLE `usr70`
  ADD PRIMARY KEY (`urun_id`);

--
-- Tablo için indeksler `usr72`
--
ALTER TABLE `usr72`
  ADD PRIMARY KEY (`urun_id`);

--
-- Tablo için indeksler `usr73`
--
ALTER TABLE `usr73`
  ADD PRIMARY KEY (`urun_id`);

--
-- Tablo için indeksler `usr90`
--
ALTER TABLE `usr90`
  ADD PRIMARY KEY (`urun_id`);

--
-- Tablo için indeksler `usr96`
--
ALTER TABLE `usr96`
  ADD PRIMARY KEY (`urun_id`);

--
-- Tablo için indeksler `usr97`
--
ALTER TABLE `usr97`
  ADD PRIMARY KEY (`urun_id`);

--
-- Tablo için indeksler `uyeler`
--
ALTER TABLE `uyeler`
  ADD PRIMARY KEY (`uye_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `masalar`
--
ALTER TABLE `masalar`
  MODIFY `masa_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `siparis`
--
ALTER TABLE `siparis`
  MODIFY `sip_no` int(20) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `urunler`
--
ALTER TABLE `urunler`
  MODIFY `urun_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `urun_turu`
--
ALTER TABLE `urun_turu`
  MODIFY `tur_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `usr62`
--
ALTER TABLE `usr62`
  MODIFY `urun_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `usr65`
--
ALTER TABLE `usr65`
  MODIFY `urun_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `usr68`
--
ALTER TABLE `usr68`
  MODIFY `urun_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `usr70`
--
ALTER TABLE `usr70`
  MODIFY `urun_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `usr72`
--
ALTER TABLE `usr72`
  MODIFY `urun_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `usr73`
--
ALTER TABLE `usr73`
  MODIFY `urun_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `usr90`
--
ALTER TABLE `usr90`
  MODIFY `urun_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `usr96`
--
ALTER TABLE `usr96`
  MODIFY `urun_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `usr97`
--
ALTER TABLE `usr97`
  MODIFY `urun_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `uyeler`
--
ALTER TABLE `uyeler`
  MODIFY `uye_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `siparis`
--
ALTER TABLE `siparis`
  ADD CONSTRAINT `siparis_ibfk_1` FOREIGN KEY (`masa_id`) REFERENCES `masalar` (`masa_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siparis_ibfk_2` FOREIGN KEY (`urun_id`) REFERENCES `urunler` (`urun_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `urunler`
--
ALTER TABLE `urunler`
  ADD CONSTRAINT `urunler_ibfk_1` FOREIGN KEY (`tur_id`) REFERENCES `urun_turu` (`tur_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
