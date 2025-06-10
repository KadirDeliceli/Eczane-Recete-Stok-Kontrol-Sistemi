-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3357
-- Üretim Zamanı: 10 Haz 2025, 17:41:28
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `sifa_eczanesi`
--

create database sifa_eczanesi;
use sifa_eczanesi;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `doktorlar`
--

CREATE TABLE `doktorlar` (
  `DoktorID` int(11) NOT NULL,
  `Adı` varchar(64) NOT NULL,
  `Soyadı` varchar(64) NOT NULL,
  `Branş` varchar(64) NOT NULL,
  `Telefon` varchar(25) NOT NULL,
  `Mail` varchar(250) NOT NULL,
  `HastaneID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `doktorlar`
--

INSERT INTO `doktorlar` (`DoktorID`, `Adı`, `Soyadı`, `Branş`, `Telefon`, `Mail`, `HastaneID`) VALUES
(1, 'Hakani', 'Erdem', 'Kardiyoloj', '05321231212', 'hakan.erdem@hastane1.com', 1),
(2, 'Selin', 'Güler', 'Dahiliye', '05327654320', 'selin.guler@hastane2.com', 2),
(3, 'Burak', 'Yılmaz', 'Göz Hastalıkları', '05324567891', 'burak.yilmaz@hastane3.com', 3),
(4, 'Elif', 'Demir', 'Çocuk Sağlığı', '05325678912', 'elif.demir@hastane1.com', 1),
(5, 'Cem', 'Kurt', 'Ortopedi', '05328901234', 'cem.kurt@hastane2.com', 2),
(6, 'Merve', 'Aksoy', 'Nöroloji', '05322345678', 'merve.aksoy@hastane3.com', 3);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hastalar`
--

CREATE TABLE `hastalar` (
  `TC_KimlikNo` decimal(11,0) NOT NULL,
  `Adı` varchar(64) NOT NULL,
  `Soyadı` varchar(64) NOT NULL,
  `DoğumTarihi` datetime NOT NULL,
  `Telefon` varchar(25) NOT NULL,
  `Mail` varchar(250) NOT NULL,
  `Adres` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `hastalar`
--

INSERT INTO `hastalar` (`TC_KimlikNo`, `Adı`, `Soyadı`, `DoğumTarihi`, `Telefon`, `Mail`, `Adres`) VALUES
(12345678902, 'Ahmet', 'Yılmaz', '2025-05-11 00:00:00', '05321234567', 'ahmet.yilmaz@example.com', 'Bartın Merkez, Cumhuriyet Mah. No:10'),
(23456789012, 'Ayşe', 'Demir', '1985-03-22 00:00:00', '05324567890', 'ayse.demir@example.com', 'Bartın Merkez, Gazi Mah. No:23'),
(34567890123, 'Mehmet', 'Kaya', '1978-11-30 00:00:00', '05327894561', 'mehmet.kaya@example.com', 'Bartın Merkez, Tuna Mah. No:8'),
(45678901234, 'Zeynep', 'Aydın', '2000-07-05 00:00:00', '05329876543', 'zeynep.aydin@example.com', 'Bartın Merkez, Orta Mah. No:15'),
(56789012345, 'Ali', 'Şahin', '1992-09-18 00:00:00', '05321239876', 'ali.sahin@example.com', 'Bartın Merkez, Kırtepe Mah. No:30'),
(67890123456, 'Fatma', 'Çelik', '1995-01-10 00:00:00', '05327893456', 'fatma.celik@example.com', 'Bartın Merkez, Esentepe Mah. No:5'),
(78901234567, 'Murat', 'Koç', '1988-12-01 00:00:00', '05324326789', 'murat.koc@example.com', 'Bartın Merkez, Yeni Mah. No:45'),
(87215627755, 'Kadir', 'Delieli', '2005-07-17 00:00:00', '05335200258', 'deliceli@gmail.com', 'Mehmet Rıfat KYK'),
(89012345678, 'Elif', 'Yıldız', '1999-08-25 00:00:00', '05326781234', 'elif.yildiz@example.com', 'Bartın Merkez, Çatmaca Mah. No:12'),
(90123456789, 'Hasan', 'Türkmen', '1975-04-19 00:00:00', '05322334455', 'hasan.turkmen@example.com', 'Bartın Merkez, Orduyeri Mah. No:9');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hastaneler`
--

CREATE TABLE `hastaneler` (
  `HastaneID` int(11) NOT NULL,
  `HastaneAdı` varchar(64) NOT NULL,
  `Adres` varchar(250) NOT NULL,
  `Telefon` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `hastaneler`
--

INSERT INTO `hastaneler` (`HastaneID`, `HastaneAdı`, `Adres`, `Telefon`) VALUES
(1, 'Merkez Devlet Hastanesi', 'Atatürk Bulvarı No:123', '0312 123 45 67'),
(2, 'Şehir Eğitim ve Araştırma Hastanesi', 'Sağlık Sok. No:78', '0216 456 78 90'),
(3, 'Ege Üniversitesi Hastanesi', 'Üniversite Cad. No:10', '0232 234 56 78'),
(4, 'Karadeniz Tıp Merkezi', 'Tıp Fakültesi Yolu', '0462 678 90 12'),
(5, 'Akdeniz Özel Hastanesi', 'Deniz Mah. Sağlık Cad. No:45', '0242 345 67 89');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ilaclar`
--

CREATE TABLE `ilaclar` (
  `BarkodNo` varchar(250) NOT NULL,
  `IlacAdı` varchar(64) NOT NULL,
  `Kategori` varchar(64) NOT NULL,
  `Firma` varchar(64) NOT NULL,
  `BirimFiyat` varchar(25) NOT NULL,
  `Açıklama` varchar(250) NOT NULL,
  `StokMiktarı` int(11) NOT NULL,
  `Birimi` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `ilaclar`
--

INSERT INTO `ilaclar` (`BarkodNo`, `IlacAdı`, `Kategori`, `Firma`, `BirimFiyat`, `Açıklama`, `StokMiktarı`, `Birimi`) VALUES
('3', 'Otrivine', 'Burun Sprey', 'GSK', '24.20', 'Burun tıkanıklığı giderici', 100, 'Adet'),
('30', 'Nebilet', 'Kalp İlacı', 'Berlin Chemie', '62.00', 'Yüksek tansiyon ilacı', 85, 'Adet'),
('31', 'Berko Sodyum', 'Elektrolit', 'Berko İlaç', '12.40', 'Vücut sıvı dengesi için', 130, 'Adet'),
('4', 'Rennie', 'Antiasit', 'Bayer', '21.75', 'Mide yanmasına karşı', 90, 'Adet'),
('5', 'Xanax', 'Psikiyatri', 'Pfizer', '84.70', 'Kaygı bozukluğu için', 50, 'Adet'),
('6', 'Cipro', 'Antibiyotik', 'Bayer', '53.20', 'Geniş spektrumlu antibiyotik', 100, 'Adet'),
('7', 'Dexpas', 'Psikiyatri', 'Deva', '45.80', 'Anksiyolitik ilaç', 73, 'Adet'),
('8', 'Lipitor', 'Kolesterol', 'Pfizer', '72.50', 'Kolesterol düşürücü', 115, 'Adet'),
('9', 'Biteral', 'Antibiyotik', 'Nobel', '37.20', 'Vajinal ve bağırsak enfeksiyonları için', 0, 'Adet');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `recete_ilaclari`
--

CREATE TABLE `recete_ilaclari` (
  `ID` int(11) NOT NULL,
  `ReceteID` int(11) NOT NULL,
  `BarkodNo` varchar(250) NOT NULL,
  `Doz` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `recete_ilaclari`
--

INSERT INTO `recete_ilaclari` (`ID`, `ReceteID`, `BarkodNo`, `Doz`) VALUES
(88, 573457, '7', 2),
(89, 573457, '4', 5);


-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `reçeteler`
--

CREATE TABLE `reçeteler` (
  `ReceteID` int(11) NOT NULL,
  `ReceteTarihi` datetime NOT NULL,
  `DoktorID` int(11) NOT NULL,
  `TC_KimlikNo` decimal(11,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `reçeteler`
--

INSERT INTO `reçeteler` (`ReceteID`, `ReceteTarihi`, `DoktorID`, `TC_KimlikNo`) VALUES
(987, '2025-06-07 00:00:00', 2, 67890123456),
(6789, '2025-05-31 00:00:00', 1, 89012345678),
(55432, '2025-06-07 00:00:00', 2, 89012345678),
(123465, '2025-05-31 00:00:00', 1, 34567890123),
(123654, '2025-05-31 00:00:00', 1, 34567890123),
(573457, '2025-06-10 00:00:00', 6, 87215627755),
(1236541, '2025-06-10 00:00:00', 1, 23456789012),
(57344767, '2025-05-31 00:00:00', 1, 12345678902);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ödemeler`
--

CREATE TABLE `ödemeler` (
  `OdemeID` int(11) NOT NULL,
  `ReceteID` int(11) NOT NULL,
  `OdemeTarihi` datetime NOT NULL,
  `OdemeTutari` float NOT NULL,
  `OdemeTuru` varchar(25) NOT NULL,
  `Aciklama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `ödemeler`
--

INSERT INTO `ödemeler` (`OdemeID`, `ReceteID`, `OdemeTarihi`, `OdemeTutari`, `OdemeTuru`, `Aciklama`) VALUES
(3, 57344767, '2025-05-31 00:00:00', 4995, 'nakit', 'odeme'),
(4, 123654, '2025-05-31 00:00:00', 333, 'nakit', 'yapıldı'),
(5, 123465, '2025-05-31 00:00:00', 471.5, 'nakit', 'yapıldı'),
(6, 6789, '2025-05-31 00:00:00', 324.5, 'Nakit', 'yapıldı'),
(7, 55432, '2025-06-07 00:00:00', 50, 'Nakit', 'yapıldı'),
(8, 573457, '2025-06-10 00:00:00', 200.35, 'Nakit', 'ödeme yapıldı');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `doktorlar`
--
ALTER TABLE `doktorlar`
  ADD PRIMARY KEY (`DoktorID`),
  ADD KEY `HastaneID` (`HastaneID`);

--
-- Tablo için indeksler `hastalar`
--
ALTER TABLE `hastalar`
  ADD PRIMARY KEY (`TC_KimlikNo`);

--
-- Tablo için indeksler `hastaneler`
--
ALTER TABLE `hastaneler`
  ADD PRIMARY KEY (`HastaneID`);

--
-- Tablo için indeksler `ilaclar`
--
ALTER TABLE `ilaclar`
  ADD PRIMARY KEY (`BarkodNo`);

--
-- Tablo için indeksler `recete_ilaclari`
--
ALTER TABLE `recete_ilaclari`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ReceteID` (`ReceteID`),
  ADD KEY `BarkodNo` (`BarkodNo`);

--
-- Tablo için indeksler `reçeteler`
--
ALTER TABLE `reçeteler`
  ADD PRIMARY KEY (`ReceteID`),
  ADD KEY `DoktorID` (`DoktorID`),
  ADD KEY `TC_KimlikNo` (`TC_KimlikNo`);

--
-- Tablo için indeksler `ödemeler`
--
ALTER TABLE `ödemeler`
  ADD PRIMARY KEY (`OdemeID`),
  ADD KEY `ReceteID` (`ReceteID`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `doktorlar`
--
ALTER TABLE `doktorlar`
  MODIFY `DoktorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Tablo için AUTO_INCREMENT değeri `hastaneler`
--
ALTER TABLE `hastaneler`
  MODIFY `HastaneID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tablo için AUTO_INCREMENT değeri `recete_ilaclari`
--
ALTER TABLE `recete_ilaclari`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- Tablo için AUTO_INCREMENT değeri `ödemeler`
--
ALTER TABLE `ödemeler`
  MODIFY `OdemeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `doktorlar`
--
ALTER TABLE `doktorlar`
  ADD CONSTRAINT `doktorlar_ibfk_1` FOREIGN KEY (`HastaneID`) REFERENCES `hastaneler` (`HastaneID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `recete_ilaclari`
--
ALTER TABLE `recete_ilaclari`
  ADD CONSTRAINT `recete_ilaclari_ibfk_1` FOREIGN KEY (`ReceteID`) REFERENCES `reçeteler` (`ReceteID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recete_ilaclari_ibfk_2` FOREIGN KEY (`BarkodNo`) REFERENCES `ilaclar` (`BarkodNo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `reçeteler`
--
ALTER TABLE `reçeteler`
  ADD CONSTRAINT `reçeteler_ibfk_1` FOREIGN KEY (`DoktorID`) REFERENCES `doktorlar` (`DoktorID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reçeteler_ibfk_2` FOREIGN KEY (`TC_KimlikNo`) REFERENCES `hastalar` (`TC_KimlikNo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `ödemeler`
--
ALTER TABLE `ödemeler`
  ADD CONSTRAINT `ödemeler_ibfk_1` FOREIGN KEY (`ReceteID`) REFERENCES `reçeteler` (`ReceteID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
