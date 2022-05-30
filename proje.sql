-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 09 Şub 2021, 12:41:52
-- Sunucu sürümü: 8.0.17
-- PHP Sürümü: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `proje`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `arama`
--

CREATE TABLE `arama` (
  `arama_id` int(11) NOT NULL,
  `arama_zaman` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `arama_aranan` varchar(250) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `arama`
--

INSERT INTO `arama` (`arama_id`, `arama_zaman`, `arama_aranan`) VALUES
(8, '2021-02-09 11:44:35', 'düzeleştirici'),
(9, '2021-02-09 11:45:18', 'düz'),
(10, '2021-02-09 11:45:24', 'düzleş');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayar`
--

CREATE TABLE `ayar` (
  `ayar_id` int(11) NOT NULL,
  `ayar_logo` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_title` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_description` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_keywords` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_author` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_tel` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_mail` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_il` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_ilce` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_adres` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_maps` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_analystic` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_zopim` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_instagram` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_youtube` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_twitter` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_google` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_smtpuser` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_smtphost` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_smtppassword` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_smtpport` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_bakım` enum('0','1') COLLATE utf8_turkish_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ayar`
--

INSERT INTO `ayar` (`ayar_id`, `ayar_logo`, `ayar_title`, `ayar_description`, `ayar_keywords`, `ayar_author`, `ayar_tel`, `ayar_mail`, `ayar_il`, `ayar_ilce`, `ayar_adres`, `ayar_maps`, `ayar_analystic`, `ayar_zopim`, `ayar_instagram`, `ayar_youtube`, `ayar_twitter`, `ayar_google`, `ayar_smtpuser`, `ayar_smtphost`, `ayar_smtppassword`, `ayar_smtpport`, `ayar_bakım`) VALUES
(0, 'img/26755logo.png', 'PazaraKadar', 'E-ticaret sitesi.', 'alışveriş, pazar, ticaret', 'Alper Tarakçı, Taha Can Gezmiş', '05348796145', 'alpertarakci@outlook.com', 'İstanbul', 'Çekmeköy', 'Taşdelen', 'asdfg', 'asdf', 'asdf', 'www.instagram.com', 'www.youtube.com', 'www.twitter.com', 'www.google.com', 'asd', 'asd', 'asd', 'asd', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `banka`
--

CREATE TABLE `banka` (
  `banka_id` int(11) NOT NULL,
  `banka_ad` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `banka_iban` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `banka_hesapadsoyad` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `banka_durum` enum('0','1') COLLATE utf8_turkish_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `banka`
--

INSERT INTO `banka` (`banka_id`, `banka_ad`, `banka_iban`, `banka_hesapadsoyad`, `banka_durum`) VALUES
(2, 'Akbank', 'TR51618925892828', 'Alper Tarakçı', '1'),
(3, 'Vakıfbank', 'TR184165516812858952', 'Taha Can Gezmiş', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hakkimizda`
--

CREATE TABLE `hakkimizda` (
  `hakkimizda_id` int(11) NOT NULL,
  `hakkimizda_baslik` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `hakkimizda_icerik` text COLLATE utf8_turkish_ci NOT NULL,
  `hakkimizda_video` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `hakkimizda_vizyon` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `hakkimizda_misyon` varchar(500) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `hakkimizda`
--

INSERT INTO `hakkimizda` (`hakkimizda_id`, `hakkimizda_baslik`, `hakkimizda_icerik`, `hakkimizda_video`, `hakkimizda_vizyon`, `hakkimizda_misyon`) VALUES
(0, 'PazaraKadar', '<p>Hakkımızda</p>\r\n', 'video_kodu', 'vizyon', 'misyon');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_ad` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `kategori_ust` int(2) NOT NULL,
  `kategori_sira` int(2) NOT NULL,
  `kategori_durum` enum('0','1') COLLATE utf8_turkish_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_ad`, `kategori_ust`, `kategori_sira`, `kategori_durum`) VALUES
(1, 'Kadın', 0, 1, '1'),
(2, 'Erkek', 0, 2, '1'),
(3, 'Çocuk', 0, 3, '1'),
(5, 'Kozmetik', 0, 4, '1'),
(6, 'Aksesuar', 0, 5, '1'),
(7, 'Elektronik', 0, 6, '1'),
(8, 'Giyim', 0, 7, '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `kullanici_id` int(11) NOT NULL,
  `kullanici_zaman` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `kullanici_tc` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_mail` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_gsm` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_password` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_adsoyad` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_adres` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_il` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_ilce` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_unvan` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_yetki` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_durum` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`kullanici_id`, `kullanici_zaman`, `kullanici_tc`, `kullanici_mail`, `kullanici_gsm`, `kullanici_password`, `kullanici_adsoyad`, `kullanici_adres`, `kullanici_il`, `kullanici_ilce`, `kullanici_unvan`, `kullanici_yetki`, `kullanici_durum`) VALUES
(1, '2020-12-16 18:10:48', '5998956165162', 'alpertarakci@outlook.com', '05246575478', 'e10adc3949ba59abbe56e057f20f883e', 'Alper Tarakçı', '', '', '', '', '5', 1),
(43, '2021-01-11 11:19:16', '24569874513', 'alpertarakci@outlook.com.tr', '05348576956', '71b3b26aaa319e0cdf6fdb8429c112b0', 'Alper Tarakçı', 'Çiçek Sokak No:15', 'İstanbul', 'Çekmeköy', '', '', 1),
(44, '2021-01-16 15:25:13', '', 'alpertarakci@hotmail.com', '05648795398', 'e35cf7b66449df565f93c607d5a81d09', 'Alper Tarakçı', '', '', '', '', '', 1),
(45, '2021-01-17 12:00:25', '', 'tahacangezmis@outlook.com', '05653788975', 'e10adc3949ba59abbe56e057f20f883e', 'Taha Can Gezmiş', '', '', '', 'satici', '', 1),
(46, '2021-02-08 10:32:35', '', 'alpertarakci@windowslive.com', '05876776876', 'e35cf7b66449df565f93c607d5a81d09', 'Alper Tarakçı', '', '', '', 'satici', '', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `menu_ust` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `menu_ad` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `menu_detay` text COLLATE utf8_turkish_ci NOT NULL,
  `menu_url` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `menu_sira` int(2) NOT NULL,
  `menu_durum` enum('0','1') COLLATE utf8_turkish_ci NOT NULL,
  `menu_seourl` varchar(250) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_ust`, `menu_ad`, `menu_detay`, `menu_url`, `menu_sira`, `menu_durum`, `menu_seourl`) VALUES
(1, '0', 'Hakkımızda', '<p>blablabla</p>\r\n', 'hakkimizda.php', 1, '1', 'hakkimizda'),
(17, '', 'Kategoriler', '    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod     tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,     quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo     consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse     cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non     proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'kategori.php', 2, '1', 'kategoriler'),
(18, '', 'Bize Ulaşın', '<p><tt>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</tt></p>\r\n', '', 3, '1', 'bize-ulasin'),
(19, '', 'İkinci El Ürünler', '<p><tt>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</tt></p>\r\n', 'ikinciel.php', 4, '1', 'ikinci-el-urunler');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sepet`
--

CREATE TABLE `sepet` (
  `sepet_id` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `urun_id` int(11) NOT NULL,
  `sepet_adet` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `sepet`
--

INSERT INTO `sepet` (`sepet_id`, `kullanici_id`, `urun_id`, `sepet_adet`) VALUES
(5, 43, 21, 1),
(6, 1, 18, 1),
(8, 45, 21, 1),
(9, 45, 18, 1),
(10, 0, 18, 1),
(11, 45, 2, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siparis`
--

CREATE TABLE `siparis` (
  `siparis_id` int(11) NOT NULL,
  `siparis_zaman` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `siparis_no` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `siparis_toplam` float(9,2) NOT NULL,
  `siparis_tip` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `siparis_odeme` enum('0','1') COLLATE utf8_turkish_ci NOT NULL DEFAULT '0',
  `siparis_banka` varchar(50) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `siparis`
--

INSERT INTO `siparis` (`siparis_id`, `siparis_zaman`, `siparis_no`, `kullanici_id`, `siparis_toplam`, `siparis_tip`, `siparis_odeme`, `siparis_banka`) VALUES
(1, '2021-02-06 09:49:08', 0, 45, 850.00, 'Banka Havalesi', '0', 'Akbank'),
(2, '2021-02-06 09:49:41', 0, 45, 850.00, 'Banka Havalesi', '0', 'Akbank'),
(3, '2021-02-06 09:54:12', 0, 45, 850.00, 'Banka Havalesi', '0', 'Akbank'),
(4, '2021-02-06 09:55:11', 0, 45, 850.00, 'Banka Havalesi', '0', 'Akbank'),
(5, '2021-02-06 09:57:12', 0, 45, 850.00, 'Banka Havalesi', '0', 'Vakıfbank');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siparis_detay`
--

CREATE TABLE `siparis_detay` (
  `siparisdetay_id` int(11) NOT NULL,
  `siparis_id` int(11) NOT NULL,
  `urun_id` int(11) NOT NULL,
  `urun_fiyat` float(9,2) NOT NULL,
  `urun_adet` int(3) NOT NULL,
  `siparisdetay_durum` enum('0','1','2') COLLATE utf8_turkish_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `siparis_detay`
--

INSERT INTO `siparis_detay` (`siparisdetay_id`, `siparis_id`, `urun_id`, `urun_fiyat`, `urun_adet`, `siparisdetay_durum`) VALUES
(2, 5, 21, 50.00, 7, '0'),
(3, 5, 18, 50.00, 8, '0');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(11) NOT NULL,
  `slider_ad` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `slider_resimyol` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `slider_sira` int(2) NOT NULL,
  `slider_url` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `slider_durum` enum('0','1') COLLATE utf8_turkish_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `slider`
--

INSERT INTO `slider` (`slider_id`, `slider_ad`, `slider_resimyol`, `slider_sira`, `slider_url`, `slider_durum`) VALUES
(2, 'Slider1', 'img/urun/29408306322942325256logo_bitirme.png', 1, '', '1'),
(3, 'Slider2', 'img/urun/27067247813007825778logo_bitirme.png', 2, '', '1'),
(4, 'Slider3', 'img/urun/20343216792015526412logo_bitirme.png', 3, '', '1'),
(5, 'Slider4', 'img/urun/25338298122030625752logo_bitirme.png', 4, '', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tiklanma`
--

CREATE TABLE `tiklanma` (
  `tiklanma_kullaniciid` int(11) NOT NULL,
  `tiklanma_urunid` int(11) NOT NULL,
  `tiklanma_zaman` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tiklanma_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `tiklanma`
--

INSERT INTO `tiklanma` (`tiklanma_kullaniciid`, `tiklanma_urunid`, `tiklanma_zaman`, `tiklanma_id`) VALUES
(45, 18, '2021-02-03 12:21:07', 1),
(45, 18, '2021-02-03 12:23:56', 2),
(45, 18, '2021-02-03 12:49:50', 3),
(45, 18, '2021-02-03 12:51:08', 4),
(45, 18, '2021-02-03 12:52:03', 5),
(45, 18, '2021-02-03 12:53:16', 6),
(45, 18, '2021-02-03 12:53:48', 7),
(45, 18, '2021-02-03 12:57:04', 8),
(45, 18, '2021-02-03 12:58:05', 9),
(45, 22, '2021-02-03 13:00:14', 10),
(45, 22, '2021-02-03 13:00:23', 11),
(45, 18, '2021-02-03 13:06:11', 12),
(45, 18, '2021-02-03 13:06:36', 13),
(45, 2, '2021-02-03 13:13:20', 14),
(45, 22, '2021-02-03 13:14:00', 15),
(45, 22, '2021-02-03 13:14:24', 16),
(45, 21, '2021-02-03 13:16:42', 17),
(45, 22, '2021-02-03 13:20:35', 18),
(45, 23, '2021-02-03 13:48:29', 19),
(45, 21, '2021-02-03 13:55:23', 20),
(45, 21, '2021-02-03 13:55:55', 21),
(45, 18, '2021-02-04 11:01:27', 22),
(45, 18, '2021-02-04 11:02:05', 23),
(45, 18, '2021-02-04 11:03:11', 24),
(45, 18, '2021-02-04 11:03:12', 25),
(45, 18, '2021-02-04 11:03:20', 26),
(45, 18, '2021-02-04 11:03:59', 27),
(45, 0, '2021-02-04 11:04:01', 28),
(45, 18, '2021-02-04 11:04:47', 29),
(45, 18, '2021-02-04 11:04:49', 30),
(45, 0, '2021-02-04 11:04:51', 31),
(45, 18, '2021-02-04 11:05:28', 32),
(45, 18, '2021-02-04 11:05:30', 33),
(45, 18, '2021-02-04 11:14:19', 34),
(45, 21, '2021-02-04 11:21:40', 35),
(45, 21, '2021-02-04 11:21:46', 36),
(45, 21, '2021-02-04 11:22:09', 37),
(45, 21, '2021-02-04 11:36:22', 38),
(45, 21, '2021-02-04 11:38:28', 39),
(45, 21, '2021-02-04 11:38:39', 40),
(45, 0, '2021-02-04 11:41:27', 41),
(45, 18, '2021-02-04 11:42:18', 42),
(45, 2, '2021-02-04 11:42:21', 43),
(45, 2, '2021-02-04 11:42:23', 44),
(45, 18, '2021-02-04 11:42:25', 45),
(45, 18, '2021-02-04 12:23:42', 46),
(45, 18, '2021-02-04 12:23:48', 47),
(45, 18, '2021-02-04 13:16:17', 48),
(45, 18, '2021-02-04 13:17:18', 49),
(45, 18, '2021-02-04 13:18:43', 50),
(45, 18, '2021-02-04 13:19:24', 51),
(45, 18, '2021-02-04 13:29:42', 52),
(45, 18, '2021-02-04 13:29:53', 53),
(45, 18, '2021-02-04 13:36:23', 54),
(45, 18, '2021-02-04 13:38:17', 55),
(45, 18, '2021-02-04 13:38:55', 56),
(45, 18, '2021-02-04 13:39:30', 57),
(45, 18, '2021-02-04 13:39:50', 58),
(45, 18, '2021-02-04 13:40:01', 59),
(45, 18, '2021-02-04 13:40:17', 60),
(45, 18, '2021-02-04 13:40:26', 61),
(45, 18, '2021-02-04 13:41:03', 62),
(45, 18, '2021-02-04 13:41:20', 63),
(45, 18, '2021-02-04 13:41:27', 64),
(45, 18, '2021-02-04 13:42:09', 65),
(45, 18, '2021-02-04 13:42:44', 66),
(45, 18, '2021-02-04 13:43:02', 67),
(45, 18, '2021-02-04 13:43:36', 68),
(45, 18, '2021-02-04 13:45:16', 69),
(45, 18, '2021-02-04 13:45:41', 70),
(45, 18, '2021-02-04 13:46:57', 71),
(45, 18, '2021-02-04 13:48:02', 72),
(45, 18, '2021-02-04 13:48:59', 73),
(45, 18, '2021-02-04 13:51:20', 74),
(43, 18, '2021-02-04 13:51:49', 75),
(43, 18, '2021-02-04 13:52:01', 76),
(43, 21, '2021-02-04 13:52:45', 77),
(43, 21, '2021-02-04 13:52:47', 78),
(43, 18, '2021-02-04 13:54:34', 79),
(1, 18, '2021-02-05 11:03:47', 80),
(1, 18, '2021-02-05 11:03:49', 81),
(1, 22, '2021-02-05 11:14:11', 82),
(1, 18, '2021-02-05 11:17:21', 83),
(1, 18, '2021-02-05 11:33:12', 84),
(1, 21, '2021-02-05 11:34:37', 85),
(1, 21, '2021-02-05 11:37:34', 86),
(1, 21, '2021-02-05 11:38:18', 87),
(1, 21, '2021-02-05 11:38:37', 88),
(1, 21, '2021-02-05 11:38:49', 89),
(45, 22, '2021-02-05 12:00:23', 90),
(45, 22, '2021-02-05 12:00:32', 91),
(45, 2, '2021-02-05 12:00:52', 92),
(45, 21, '2021-02-06 10:18:17', 93),
(45, 21, '2021-02-06 10:19:29', 94),
(45, 21, '2021-02-06 10:19:31', 95),
(45, 21, '2021-02-06 10:25:16', 96),
(45, 21, '2021-02-06 10:25:21', 97),
(45, 21, '2021-02-06 10:25:47', 98),
(45, 21, '2021-02-06 10:26:14', 99),
(45, 21, '2021-02-06 10:26:20', 100),
(45, 21, '2021-02-06 10:26:44', 101),
(45, 21, '2021-02-06 10:26:52', 102),
(45, 21, '2021-02-06 10:27:11', 103),
(45, 21, '2021-02-06 10:27:15', 104),
(45, 21, '2021-02-06 10:29:11', 105),
(45, 21, '2021-02-06 10:29:14', 106),
(45, 21, '2021-02-06 10:29:37', 107),
(45, 21, '2021-02-06 10:30:00', 108),
(45, 21, '2021-02-06 10:30:03', 109),
(45, 21, '2021-02-06 10:30:20', 110),
(45, 21, '2021-02-06 10:30:25', 111),
(45, 21, '2021-02-06 10:30:34', 112),
(45, 21, '2021-02-06 10:30:36', 113),
(45, 21, '2021-02-06 10:30:44', 114),
(45, 21, '2021-02-06 10:30:47', 115),
(45, 21, '2021-02-06 10:31:02', 116),
(45, 21, '2021-02-06 10:31:04', 117),
(45, 21, '2021-02-06 10:31:34', 118),
(45, 21, '2021-02-06 10:31:36', 119),
(45, 21, '2021-02-06 10:32:41', 120),
(45, 21, '2021-02-06 10:32:43', 121),
(45, 21, '2021-02-06 10:33:01', 122),
(45, 21, '2021-02-06 10:33:13', 123),
(45, 21, '2021-02-06 10:33:24', 124),
(45, 21, '2021-02-06 10:33:25', 125),
(45, 18, '2021-02-06 10:35:43', 126),
(45, 18, '2021-02-06 10:36:09', 127),
(45, 18, '2021-02-06 10:36:43', 128),
(45, 18, '2021-02-06 10:36:47', 129),
(45, 18, '2021-02-06 10:44:38', 130),
(45, 18, '2021-02-06 10:44:52', 131),
(45, 18, '2021-02-06 10:44:57', 132),
(45, 18, '2021-02-06 10:46:30', 133),
(45, 18, '2021-02-06 10:46:36', 134),
(45, 18, '2021-02-06 10:47:13', 135),
(45, 18, '2021-02-06 10:47:44', 136),
(45, 18, '2021-02-06 10:47:51', 137),
(45, 18, '2021-02-06 10:48:02', 138),
(45, 18, '2021-02-06 10:48:05', 139),
(45, 18, '2021-02-06 10:48:07', 140),
(45, 18, '2021-02-06 10:48:21', 141),
(45, 18, '2021-02-06 10:48:25', 142),
(45, 18, '2021-02-06 10:50:02', 143),
(45, 18, '2021-02-06 10:50:08', 144),
(45, 18, '2021-02-06 10:52:33', 145),
(45, 18, '2021-02-06 10:52:37', 146),
(45, 18, '2021-02-06 11:04:40', 147),
(45, 18, '2021-02-06 11:04:43', 148),
(45, 18, '2021-02-06 11:05:41', 149),
(45, 18, '2021-02-06 11:05:42', 150),
(45, 18, '2021-02-06 11:05:48', 151),
(45, 18, '2021-02-06 11:06:40', 152),
(45, 18, '2021-02-06 11:06:45', 153),
(45, 18, '2021-02-06 11:07:33', 154),
(45, 18, '2021-02-06 11:07:38', 155),
(45, 18, '2021-02-06 11:08:13', 156),
(45, 18, '2021-02-06 11:08:16', 157),
(45, 18, '2021-02-06 11:10:18', 158),
(45, 18, '2021-02-06 11:10:21', 159),
(45, 18, '2021-02-06 11:10:23', 160),
(45, 18, '2021-02-06 11:10:56', 161),
(45, 18, '2021-02-06 11:10:59', 162),
(45, 18, '2021-02-06 11:11:01', 163),
(45, 18, '2021-02-06 11:11:03', 164),
(45, 18, '2021-02-06 11:11:10', 165),
(45, 18, '2021-02-06 11:11:12', 166),
(45, 18, '2021-02-06 11:22:27', 167),
(45, 18, '2021-02-06 11:24:59', 168),
(45, 18, '2021-02-06 11:25:21', 169),
(45, 18, '2021-02-06 11:26:26', 170),
(45, 18, '2021-02-06 11:29:24', 171),
(45, 18, '2021-02-06 11:30:07', 172),
(45, 18, '2021-02-06 11:31:34', 173),
(45, 21, '2021-02-06 11:32:59', 174),
(45, 2, '2021-02-06 11:33:03', 175),
(1, 0, '2021-02-06 12:04:18', 176),
(1, 18, '2021-02-06 12:08:13', 177),
(1, 18, '2021-02-06 12:08:21', 178),
(1, 0, '2021-02-06 12:23:30', 179),
(1, 0, '2021-02-06 12:24:11', 180),
(1, 18, '2021-02-06 12:24:21', 181),
(1, 21, '2021-02-06 12:24:28', 182),
(1, 0, '2021-02-06 12:24:37', 183),
(1, 22, '2021-02-06 12:24:55', 184),
(1, 22, '2021-02-06 12:30:47', 185),
(1, 22, '2021-02-06 12:34:09', 186),
(1, 22, '2021-02-06 12:34:44', 187),
(1, 22, '2021-02-06 12:35:55', 188),
(1, 22, '2021-02-06 12:40:18', 189),
(1, 22, '2021-02-06 12:40:35', 190),
(1, 22, '2021-02-06 12:42:15', 191),
(1, 22, '2021-02-06 12:42:33', 192),
(1, 22, '2021-02-06 12:42:53', 193),
(1, 22, '2021-02-06 12:43:15', 194),
(1, 22, '2021-02-06 12:43:38', 195),
(1, 22, '2021-02-06 12:44:52', 196),
(45, 21, '2021-02-07 10:42:55', 197),
(45, 21, '2021-02-07 10:43:01', 198),
(45, 18, '2021-02-07 10:43:04', 199),
(45, 21, '2021-02-07 10:47:28', 200),
(1, 18, '2021-02-07 10:57:04', 201),
(1, 18, '2021-02-07 10:57:11', 202),
(1, 18, '2021-02-07 11:02:08', 203),
(45, 22, '2021-02-08 09:11:13', 204),
(45, 21, '2021-02-08 09:13:19', 205),
(45, 22, '2021-02-08 09:13:30', 206),
(45, 2, '2021-02-08 09:15:08', 207),
(45, 2, '2021-02-08 09:30:51', 208),
(45, 2, '2021-02-08 09:51:04', 209),
(45, 2, '2021-02-08 09:52:36', 210),
(45, 2, '2021-02-08 09:52:49', 211),
(45, 2, '2021-02-08 09:52:57', 212),
(45, 2, '2021-02-08 09:52:59', 213),
(45, 21, '2021-02-08 09:58:55', 214),
(45, 21, '2021-02-08 09:58:58', 215),
(45, 2, '2021-02-08 10:22:43', 216),
(45, 2, '2021-02-08 10:22:52', 217),
(45, 18, '2021-02-08 18:19:48', 218),
(45, 2, '2021-02-09 11:15:41', 219),
(45, 22, '2021-02-09 12:08:14', 220),
(45, 18, '2021-02-09 12:11:45', 221),
(45, 18, '2021-02-09 12:11:47', 222),
(45, 24, '2021-02-09 12:12:38', 223),
(45, 25, '2021-02-09 12:12:38', 224),
(45, 24, '2021-02-09 12:13:06', 225),
(45, 25, '2021-02-09 12:13:15', 226),
(45, 22, '2021-02-09 12:16:25', 227);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tiklanmasayisi`
--

CREATE TABLE `tiklanmasayisi` (
  `urun_id` int(11) NOT NULL,
  `tiklanmasayisi_sayi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `tiklanmasayisi`
--

INSERT INTO `tiklanmasayisi` (`urun_id`, `tiklanmasayisi_sayi`) VALUES
(18, 118),
(2, 15),
(21, 57),
(22, 25),
(23, 1),
(24, 2),
(25, 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urun`
--

CREATE TABLE `urun` (
  `urun_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `satici_id` int(11) NOT NULL,
  `urun_zaman` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `urun_ad` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `urun_detay` text COLLATE utf8_turkish_ci NOT NULL,
  `urun_fiyat` float NOT NULL,
  `urun_video` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `urun_stok` varchar(11) COLLATE utf8_turkish_ci NOT NULL,
  `urun_onecikar` enum('0','1') COLLATE utf8_turkish_ci NOT NULL,
  `urun_seourl` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `urun_durum` enum('0','1') CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL DEFAULT '1',
  `urun_ikinciel` enum('0','1') COLLATE utf8_turkish_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `urun`
--

INSERT INTO `urun` (`urun_id`, `kategori_id`, `satici_id`, `urun_zaman`, `urun_ad`, `urun_detay`, `urun_fiyat`, `urun_video`, `urun_stok`, `urun_onecikar`, `urun_seourl`, `urun_durum`, `urun_ikinciel`) VALUES
(2, 1, 45, '2021-01-14 13:39:42', 'Saç Düzleştirici', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', 100, '', '50', '0', 'kazak', '1', '0'),
(4, 2, 45, '2021-01-15 06:44:33', 'Sakal Traş Makinesi', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', 120, '', '20', '0', 'elbise', '1', '0'),
(5, 3, 45, '2021-01-15 06:44:33', 'Bebek Bezi', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', 50, '', '21', '0', 'bebek-bezi', '1', '0'),
(6, 5, 45, '2021-01-15 06:44:33', 'Saç Şekillendirici Köpük', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', 23, '', '20', '0', 'elbise', '1', '0'),
(18, 6, 45, '2021-01-20 10:29:25', 'Bİleklik', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', 45, 'https://www.youtube.com/watch?v=lQveQYsVoxk', '32', '0', 'kazak', '1', '0'),
(21, 7, 45, '2021-01-20 10:29:25', 'i5-7400 işlemcili Laptop', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', 6000, 'https://www.youtube.com/watch?v=lQveQYsVoxk', '33', '0', 'i5-7400-islemcili-laptop', '1', '1'),
(22, 8, 45, '2021-01-20 10:29:25', 'T-shirt', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', 50, 'https://www.youtube.com/watch?v=lQveQYsVoxk', '32', '0', 'kazak', '1', '1'),
(23, 8, 45, '2021-01-15 06:44:33', 'Elbise', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', 50, '', '20', '0', 'elbise', '1', '0'),
(24, 2, 45, '2021-02-04 13:58:17', 'Kazak', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', 60, 'https://www.youtube.com/watch?v=lQveQYsVoxk', '20', '0', 'tisort', '1', '1'),
(25, 7, 45, '2021-02-08 18:17:29', 'Kablo', '<p>Bakır 200cm uzunluğunda kablo.</p>\r\n', 15, '', '31', '0', 'kablo', '1', '0');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunfoto`
--

CREATE TABLE `urunfoto` (
  `urunfoto_id` int(11) NOT NULL,
  `urun_id` int(11) NOT NULL,
  `urunfoto_resimyol` varchar(255) NOT NULL,
  `urunfoto_ilk` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `urunfoto`
--

INSERT INTO `urunfoto` (`urunfoto_id`, `urun_id`, `urunfoto_resimyol`, `urunfoto_ilk`) VALUES
(3, 7, 'img/urun/26980269032954830880logo_bitirme.png', 1),
(7, 21, 'img/urun/27067247813007825778logo_bitirme.png', 1),
(11, 22, 'img/urun/20343216792015526412logo_bitirme.png', 1),
(12, 24, 'img/urun/29946278142427525986logo_bitirme.png', 1),
(13, 5, 'img/urun/30363293512882526739logo_bitirme.png', 1),
(14, 18, 'img/urun/29408306322942325256logo_bitirme.png', 1),
(15, 23, 'img/urun/26782260623040831055logo_bitirme.png', 1),
(16, 4, 'img/urun/25706280552998027436logo_bitirme.png', 1),
(17, 2, 'img/urun/25338298122030625752logo_bitirme.png', 1),
(18, 6, 'img/urun/24895317112953828043logo_bitirme.png', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorum`
--

CREATE TABLE `yorum` (
  `yorum_id` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `yorum_detay` text COLLATE utf8_turkish_ci NOT NULL,
  `yorum_zaman` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `urun_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `yorum`
--

INSERT INTO `yorum` (`yorum_id`, `kullanici_id`, `yorum_detay`, `yorum_zaman`, `urun_id`) VALUES
(1, 0, 'çok beğendim', '2021-02-03 11:30:25', 0),
(2, 0, 'asfsdfgdsf', '2021-02-03 11:32:18', 0),
(4, 0, 'ıytluıou', '2021-02-03 11:44:33', 0),
(5, 15, 'gkujhöllj', '2021-02-03 11:46:00', 0),
(6, 15, 'hljkljklkjş', '2021-02-03 11:46:56', 0),
(7, 0, 'beğendim', '2021-02-03 11:49:10', 0),
(9, 45, 'dsfasdgsdg', '2021-02-03 11:51:42', 0),
(10, 45, 'uglughl', '2021-02-03 11:53:21', 0),
(11, 45, 'tlhulglk', '2021-02-03 11:54:06', 0),
(12, 45, 'selam canıım ben amcanım', '2021-02-04 13:29:53', 18),
(13, 45, 'merhaba', '2021-02-04 13:43:36', 18),
(14, 43, 'Selam canım', '2021-02-04 13:52:01', 18),
(15, 45, 'Çok beğendim', '2021-02-08 10:22:52', 2);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `arama`
--
ALTER TABLE `arama`
  ADD PRIMARY KEY (`arama_id`);

--
-- Tablo için indeksler `ayar`
--
ALTER TABLE `ayar`
  ADD PRIMARY KEY (`ayar_id`);

--
-- Tablo için indeksler `banka`
--
ALTER TABLE `banka`
  ADD PRIMARY KEY (`banka_id`);

--
-- Tablo için indeksler `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`kullanici_id`),
  ADD UNIQUE KEY `kullanici_mail` (`kullanici_mail`),
  ADD UNIQUE KEY `kullanici_gsm` (`kullanici_gsm`);

--
-- Tablo için indeksler `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Tablo için indeksler `sepet`
--
ALTER TABLE `sepet`
  ADD PRIMARY KEY (`sepet_id`);

--
-- Tablo için indeksler `siparis`
--
ALTER TABLE `siparis`
  ADD PRIMARY KEY (`siparis_id`);

--
-- Tablo için indeksler `siparis_detay`
--
ALTER TABLE `siparis_detay`
  ADD PRIMARY KEY (`siparisdetay_id`);

--
-- Tablo için indeksler `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Tablo için indeksler `tiklanma`
--
ALTER TABLE `tiklanma`
  ADD PRIMARY KEY (`tiklanma_id`);

--
-- Tablo için indeksler `urun`
--
ALTER TABLE `urun`
  ADD PRIMARY KEY (`urun_id`);

--
-- Tablo için indeksler `urunfoto`
--
ALTER TABLE `urunfoto`
  ADD PRIMARY KEY (`urunfoto_id`);

--
-- Tablo için indeksler `yorum`
--
ALTER TABLE `yorum`
  ADD PRIMARY KEY (`yorum_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `arama`
--
ALTER TABLE `arama`
  MODIFY `arama_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `banka`
--
ALTER TABLE `banka`
  MODIFY `banka_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `kullanici_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Tablo için AUTO_INCREMENT değeri `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Tablo için AUTO_INCREMENT değeri `sepet`
--
ALTER TABLE `sepet`
  MODIFY `sepet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `siparis`
--
ALTER TABLE `siparis`
  MODIFY `siparis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `siparis_detay`
--
ALTER TABLE `siparis_detay`
  MODIFY `siparisdetay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `tiklanma`
--
ALTER TABLE `tiklanma`
  MODIFY `tiklanma_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228;

--
-- Tablo için AUTO_INCREMENT değeri `urun`
--
ALTER TABLE `urun`
  MODIFY `urun_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Tablo için AUTO_INCREMENT değeri `urunfoto`
--
ALTER TABLE `urunfoto`
  MODIFY `urunfoto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Tablo için AUTO_INCREMENT değeri `yorum`
--
ALTER TABLE `yorum`
  MODIFY `yorum_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
