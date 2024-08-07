-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 01, 2022 at 04:46 PM
-- Server version: 10.3.35-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hatauaxk_reklam`
--

-- --------------------------------------------------------

--
-- Table structure for table `ayar`
--

CREATE TABLE `ayar` (
  `ayar_id` int(11) NOT NULL,
  `ayar_site` text CHARACTER SET utf8 NOT NULL,
  `ayar_title` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `mail_host` text CHARACTER SET utf8 NOT NULL,
  `mail_port` text CHARACTER SET utf8 NOT NULL,
  `mail_secure` text CHARACTER SET utf8 NOT NULL,
  `mail_kullanici` text CHARACTER SET utf8 NOT NULL,
  `mail_sifre` text CHARACTER SET utf8 NOT NULL,
  `mail_konu` text CHARACTER SET utf8 NOT NULL,
  `mail_aciklama` text CHARACTER SET utf8 NOT NULL,
  `mail_gonderilen` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `ayar`
--

INSERT INTO `ayar` (`ayar_id`, `ayar_site`, `ayar_title`, `mail_host`, `mail_port`, `mail_secure`, `mail_kullanici`, `mail_sifre`, `mail_konu`, `mail_aciklama`, `mail_gonderilen`) VALUES
(0, 'https://leftsoft.tk/reklam/', 'Reklam Takip', '', '', 'ssl', '', '', 'Reklam süresi bitti', '<p><strong>Reklam s&uuml;resi bitmiştir.</strong></p>\r\n', '');

-- --------------------------------------------------------

--
-- Table structure for table `bakiye`
--

CREATE TABLE `bakiye` (
  `bakiye_id` int(11) NOT NULL,
  `bakiye_top` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bakiye`
--

INSERT INTO `bakiye` (`bakiye_id`, `bakiye_top`) VALUES
(1, '0');

-- --------------------------------------------------------

--
-- Table structure for table `reklam`
--

CREATE TABLE `reklam` (
  `reklam_id` int(11) NOT NULL,
  `reklam_adi` text CHARACTER SET utf8 NOT NULL,
  `reklam_fiyat` text CHARACTER SET utf8 NOT NULL,
  `reklam_tarih` text CHARACTER SET utf8 NOT NULL,
  `reklam_durum` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `yonetici`
--

CREATE TABLE `yonetici` (
  `kullanici_id` int(11) NOT NULL,
  `kullanici_mail` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_password` varchar(50) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `yonetici`
--

INSERT INTO `yonetici` (`kullanici_id`, `kullanici_mail`, `kullanici_password`) VALUES
(147, 'deneme@deneme.com', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ayar`
--
ALTER TABLE `ayar`
  ADD PRIMARY KEY (`ayar_id`);

--
-- Indexes for table `bakiye`
--
ALTER TABLE `bakiye`
  ADD PRIMARY KEY (`bakiye_id`);

--
-- Indexes for table `reklam`
--
ALTER TABLE `reklam`
  ADD PRIMARY KEY (`reklam_id`);

--
-- Indexes for table `yonetici`
--
ALTER TABLE `yonetici`
  ADD PRIMARY KEY (`kullanici_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bakiye`
--
ALTER TABLE `bakiye`
  MODIFY `bakiye_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reklam`
--
ALTER TABLE `reklam`
  MODIFY `reklam_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `yonetici`
--
ALTER TABLE `yonetici`
  MODIFY `kullanici_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
