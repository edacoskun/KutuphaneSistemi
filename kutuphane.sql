-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 17 Haz 2021, 17:45:22
-- Sunucu sürümü: 10.4.18-MariaDB
-- PHP Sürümü: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `kutuphane`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `adres`
--

CREATE TABLE `adres` (
  `adres_id` int(11) NOT NULL,
  `il` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `adres`
--

INSERT INTO `adres` (`adres_id`, `il`) VALUES
(1, 'istanbul'),
(2, 'ankara'),
(3, 'izmir');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `calisan`
--

CREATE TABLE `calisan` (
  `calisan_id` int(11) NOT NULL,
  `calisan_ad` varchar(50) NOT NULL,
  `calisan_soyad` varchar(50) NOT NULL,
  `kutuphane_id` int(11) NOT NULL,
  `calisan_email` varchar(50) NOT NULL,
  `calisan_sifre` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `calisan`
--

INSERT INTO `calisan` (`calisan_id`, `calisan_ad`, `calisan_soyad`, `kutuphane_id`, `calisan_email`, `calisan_sifre`) VALUES
(1, 'Admin', 'Yönetici', 0, 'admin@hotmail.com', 'admin123456');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `emanet`
--

CREATE TABLE `emanet` (
  `emanet_id` int(5) NOT NULL,
  `uye_id` int(11) NOT NULL,
  `kitap_id` int(11) NOT NULL,
  `durum` tinyint(4) NOT NULL,
  `alis_tarih` timestamp NOT NULL DEFAULT current_timestamp(),
  `son_teslim_tarih` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `emanet`
--

INSERT INTO `emanet` (`emanet_id`, `uye_id`, `kitap_id`, `durum`, `alis_tarih`, `son_teslim_tarih`) VALUES
(20, 17, 69, 0, '2021-06-17 08:17:54', NULL),
(19, 14, 69, 0, '2021-06-17 08:17:51', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_adi` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_adi`) VALUES
(1, 'Roman'),
(2, 'Hikaye'),
(3, 'Kişisel Gelişim'),
(4, 'Biyografi'),
(5, 'Otobiyografi'),
(6, 'Gezi'),
(7, 'Anı'),
(8, 'Tatih'),
(9, 'Şiir'),
(10, 'Klasikler'),
(11, 'Söylev');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kitap`
--

CREATE TABLE `kitap` (
  `kitap_id` int(6) UNSIGNED NOT NULL,
  `ISBN` int(30) NOT NULL,
  `kitap_adi` varchar(30) NOT NULL,
  `kitap_yayinevi` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `kitap`
--

INSERT INTO `kitap` (`kitap_id`, `ISBN`, `kitap_adi`, `kitap_yayinevi`, `stok`) VALUES
(64, 12, 'mahur beste', 'can', 6),
(66, 42, 'sefiller', 'can', 8),
(68, 123, 'çile', 'can', 5),
(69, 123, '1984', 'can', 3);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kitap_kategori`
--

CREATE TABLE `kitap_kategori` (
  `iliski_id` int(11) NOT NULL,
  `kitap_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `kitap_kategori`
--

INSERT INTO `kitap_kategori` (`iliski_id`, `kitap_id`, `kategori_id`) VALUES
(4, 64, 1),
(5, 64, 2),
(9, 66, 1),
(10, 66, 2),
(12, 68, 1),
(13, 68, 2),
(14, 69, 1),
(15, 69, 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kitap_yazar`
--

CREATE TABLE `kitap_yazar` (
  `iliski_id` int(11) NOT NULL,
  `kitap_id` int(11) NOT NULL,
  `yazar_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `kitap_yazar`
--

INSERT INTO `kitap_yazar` (`iliski_id`, `kitap_id`, `yazar_id`) VALUES
(2, 64, 8),
(3, 65, 2),
(4, 65, 4),
(5, 66, 4),
(6, 67, 9),
(7, 68, 9),
(8, 68, 10),
(9, 69, 2),
(10, 69, 4);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kutuphane`
--

CREATE TABLE `kutuphane` (
  `kutuphane_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `kutuphane_adi` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `kutuphane`
--

INSERT INTO `kutuphane` (`kutuphane_id`, `address_id`, `kutuphane_adi`) VALUES
(1, 1, 'İstanbul Kütüphanesi'),
(5, 0, 'Ankara Kütüphanesi');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uye`
--

CREATE TABLE `uye` (
  `uye_id` int(11) NOT NULL,
  `uye_name` varchar(20) NOT NULL,
  `uye_surname` varchar(20) NOT NULL,
  `address_id` int(11) NOT NULL,
  `uye_email` varchar(50) NOT NULL,
  `uye_sifre` varchar(20) NOT NULL,
  `durum` tinyint(2) NOT NULL DEFAULT 1,
  `kutuphane_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `uye`
--

INSERT INTO `uye` (`uye_id`, `uye_name`, `uye_surname`, `address_id`, `uye_email`, `uye_sifre`, `durum`, `kutuphane_id`) VALUES
(14, 'eda', 'çoşkun', 3, 'eda@hotmail.com', '1234', 0, 2),
(17, 'nurcan', 'şensoy', 1, 'nurcan@gmail.com', '123', 0, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yazar`
--

CREATE TABLE `yazar` (
  `yazar_id` int(11) NOT NULL,
  `yazar_adi` varchar(50) NOT NULL,
  `yazar_soyadi` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `yazar`
--

INSERT INTO `yazar` (`yazar_id`, `yazar_adi`, `yazar_soyadi`) VALUES
(2, 'Sabahattin', 'Ali'),
(3, 'Mustafa Kemal', 'Atatürk'),
(4, 'Victor', 'Hugo'),
(8, 'ahmet hamdi', 'tanpınar'),
(9, 'orhan', 'pamuk'),
(10, 'necip fazıl', 'kısakürek'),
(11, 'Fyodor', 'Dostoyevski');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `adres`
--
ALTER TABLE `adres`
  ADD PRIMARY KEY (`adres_id`);

--
-- Tablo için indeksler `calisan`
--
ALTER TABLE `calisan`
  ADD PRIMARY KEY (`calisan_id`),
  ADD KEY `kutuphane_id` (`kutuphane_id`);

--
-- Tablo için indeksler `emanet`
--
ALTER TABLE `emanet`
  ADD PRIMARY KEY (`emanet_id`),
  ADD KEY `kitap_id` (`kitap_id`),
  ADD KEY `uye_id` (`uye_id`);

--
-- Tablo için indeksler `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Tablo için indeksler `kitap`
--
ALTER TABLE `kitap`
  ADD PRIMARY KEY (`kitap_id`),
  ADD KEY `ISBN` (`ISBN`),
  ADD KEY `kitap_id` (`kitap_id`);

--
-- Tablo için indeksler `kitap_kategori`
--
ALTER TABLE `kitap_kategori`
  ADD PRIMARY KEY (`iliski_id`);

--
-- Tablo için indeksler `kitap_yazar`
--
ALTER TABLE `kitap_yazar`
  ADD PRIMARY KEY (`iliski_id`),
  ADD KEY `kitap_id` (`kitap_id`,`yazar_id`);

--
-- Tablo için indeksler `kutuphane`
--
ALTER TABLE `kutuphane`
  ADD PRIMARY KEY (`kutuphane_id`),
  ADD KEY `address_id` (`address_id`);

--
-- Tablo için indeksler `uye`
--
ALTER TABLE `uye`
  ADD PRIMARY KEY (`uye_id`),
  ADD KEY `address_id` (`address_id`),
  ADD KEY `kutuphane_id` (`kutuphane_id`);

--
-- Tablo için indeksler `yazar`
--
ALTER TABLE `yazar`
  ADD PRIMARY KEY (`yazar_id`),
  ADD UNIQUE KEY `yazar_soyadi` (`yazar_soyadi`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `adres`
--
ALTER TABLE `adres`
  MODIFY `adres_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `calisan`
--
ALTER TABLE `calisan`
  MODIFY `calisan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `emanet`
--
ALTER TABLE `emanet`
  MODIFY `emanet_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Tablo için AUTO_INCREMENT değeri `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `kitap`
--
ALTER TABLE `kitap`
  MODIFY `kitap_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- Tablo için AUTO_INCREMENT değeri `kitap_kategori`
--
ALTER TABLE `kitap_kategori`
  MODIFY `iliski_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Tablo için AUTO_INCREMENT değeri `kitap_yazar`
--
ALTER TABLE `kitap_yazar`
  MODIFY `iliski_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `kutuphane`
--
ALTER TABLE `kutuphane`
  MODIFY `kutuphane_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `uye`
--
ALTER TABLE `uye`
  MODIFY `uye_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Tablo için AUTO_INCREMENT değeri `yazar`
--
ALTER TABLE `yazar`
  MODIFY `yazar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
