-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Vært: localhost
-- Genereringstid: 09. 02 2016 kl. 08:28:17
-- Serverversion: 5.6.12-log
-- PHP-version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `es_beskeder`
--

CREATE TABLE IF NOT EXISTS `es_beskeder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `navn` varchar(255) COLLATE utf8_danish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_danish_ci NOT NULL,
  `emne` varchar(255) COLLATE utf8_danish_ci NOT NULL,
  `besked` text COLLATE utf8_danish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci AUTO_INCREMENT=2 ;

--
-- Data dump for tabellen `es_beskeder`
--

INSERT INTO `es_beskeder` (`id`, `navn`, `email`, `emne`, `besked`) VALUES
(1, 'Peter lange mand petersen', 'peter.lange.mand.petersen@gmail.com', 'Hej er det muligt at komme i clanen ???', 'Hej jeg kunne godt tænke mig at komme med i jeres clan da jeg tror vi kan nå langt');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `es_downloads`
--

CREATE TABLE IF NOT EXISTS `es_downloads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_danish_ci NOT NULL,
  `text` varchar(255) COLLATE utf8_danish_ci NOT NULL,
  `filnavn` varchar(255) COLLATE utf8_danish_ci NOT NULL,
  `cfg` int(11) NOT NULL,
  `misc` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci AUTO_INCREMENT=5 ;

--
-- Data dump for tabellen `es_downloads`
--

INSERT INTO `es_downloads` (`id`, `title`, `text`, `filnavn`, `cfg`, `misc`) VALUES
(1, 'EazY''s Cfg', 'EazY''s Gaming Cfg Til CS:GO, Med alle hans In-Game settings, Crosshair Binds Osv.', 'EazYCfg.zip', 1, 0),
(2, 'Wallpaper', 'eShooting.dk Wallpaper', 'Wallpaper.zip', 0, 1),
(3, 'Logo', 'eShooting.dk Logo', 'Logo.zip', 0, 1),
(4, 'moeN''s Cfg', 'moeN''s Gaming Cfg Til CS:GO, Med alle hans In-Game settings, Crosshair Binds Osv.', 'moeNCfg.zip', 1, 0);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `es_kampe`
--

CREATE TABLE IF NOT EXISTS `es_kampe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dato` date NOT NULL,
  `hold` varchar(255) COLLATE utf8_danish_ci NOT NULL,
  `modstander` varchar(255) COLLATE utf8_danish_ci NOT NULL,
  `bo` varchar(255) COLLATE utf8_danish_ci NOT NULL,
  `resultat1` int(11) NOT NULL,
  `resultat2` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci AUTO_INCREMENT=7 ;

--
-- Data dump for tabellen `es_kampe`
--

INSERT INTO `es_kampe` (`id`, `dato`, `hold`, `modstander`, `bo`, `resultat1`, `resultat2`) VALUES
(2, '2014-09-10', 'eShooting.dk - CS:GO', 'Exazt.Gaming', '3', 3, 1),
(3, '2014-09-10', 'eShooting.dk - CS:GO', 'Exazt.Gaming', '3', 1, 1),
(4, '2014-09-10', 'eShooting.dk - CS:GO', 'Exazt.Gaming', '3', 1, 2),
(5, '2014-09-10', 'eShooting.dk - CS:GO', 'Exazt.Gaming', '1', 1, 0),
(6, '2015-08-13', 'eShooting.dk - CS:GO', 'ffff', '1', 3, 1);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `es_medlemmer`
--

CREATE TABLE IF NOT EXISTS `es_medlemmer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `navn` varchar(255) COLLATE utf8_danish_ci NOT NULL,
  `efternavn` varchar(255) COLLATE utf8_danish_ci NOT NULL,
  `alder` int(11) NOT NULL,
  `nick` varchar(255) COLLATE utf8_danish_ci NOT NULL,
  `stilling` varchar(255) COLLATE utf8_danish_ci NOT NULL,
  `siden` date NOT NULL,
  `om` text COLLATE utf8_danish_ci NOT NULL,
  `cpu` varchar(255) COLLATE utf8_danish_ci NOT NULL,
  `gpu` varchar(255) COLLATE utf8_danish_ci NOT NULL,
  `ram` varchar(255) COLLATE utf8_danish_ci NOT NULL,
  `bundkort` varchar(255) COLLATE utf8_danish_ci NOT NULL,
  `skærm` varchar(255) COLLATE utf8_danish_ci NOT NULL,
  `mus` varchar(255) COLLATE utf8_danish_ci NOT NULL,
  `mussemåtte` varchar(255) COLLATE utf8_danish_ci NOT NULL,
  `tastatur` varchar(255) COLLATE utf8_danish_ci NOT NULL,
  `headset` varchar(255) COLLATE utf8_danish_ci NOT NULL,
  `staff` int(11) NOT NULL,
  `csgo` int(11) NOT NULL,
  `billede` varchar(255) COLLATE utf8_danish_ci NOT NULL,
  `land` varchar(255) COLLATE utf8_danish_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8_danish_ci NOT NULL,
  `steam` varchar(255) COLLATE utf8_danish_ci NOT NULL,
  `twitch` varchar(255) COLLATE utf8_danish_ci NOT NULL,
  `youtube` varchar(255) COLLATE utf8_danish_ci NOT NULL,
  `brugernavn` varchar(255) COLLATE utf8_danish_ci NOT NULL,
  `kodeord` varchar(255) COLLATE utf8_danish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_danish_ci NOT NULL,
  `rettigheder` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci AUTO_INCREMENT=4 ;

--
-- Data dump for tabellen `es_medlemmer`
--

INSERT INTO `es_medlemmer` (`id`, `navn`, `efternavn`, `alder`, `nick`, `stilling`, `siden`, `om`, `cpu`, `gpu`, `ram`, `bundkort`, `skærm`, `mus`, `mussemåtte`, `tastatur`, `headset`, `staff`, `csgo`, `billede`, `land`, `facebook`, `steam`, `twitch`, `youtube`, `brugernavn`, `kodeord`, `email`, `rettigheder`) VALUES
(1, 'Kevin', 'Petersen', 20, 'EazY', 'Grundlægger / AWP - Rifle', '2015-01-01', 'Jeg Stiftede eShooting\r\n\r\nJeg er Web-Intagrator :)\r\n\r\n', 'Intel® Core i7-950 Processor', 'XFX Radeon HD 5770 1GB GDDR5', 'Kingston DDR3 HyperX T1 2000MHz 6GB', 'ASUS P6X58D-E, Socket-1366', 'HP W2216V', 'SteelSeries Sensei Wireless', 'SteelSeries QcK+ FNATIC Asphalt Edition', 'SteelSeries Apex', 'SteelSeries Siberia Elite Anniversary Edition 7.1', 1, 1, 'eazy.jpg', 'Denmark', 'https://www.facebook.com/EaazzYY', 'http://steamcommunity.com/id/EazYKevin/', 'http://www.twitch.tv/eazymoist', 'https://www.youtube.com/user/EazzYGFX', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin.dk', 1),
(2, 'Kevin', 'Petersen', 20, 'EazY', 'Grundlægger', '2015-01-01', 'Jeg Stiftede eShooting\r\n\r\nJeg er Web-Intagrator :)\r\n\r\n', 'Intel® Core i7-950 Processor', 'XFX Radeon HD 5770 1GB GDDR5', 'Kingston DDR3 HyperX T1 2000MHz 6GB', 'ASUS P6X58D-E, Socket-1366', 'HP W2216V', 'SteelSeries Sensei Wireless', 'SteelSeries QcK+ FNATIC Asphalt Edition', 'SteelSeries Apex', 'SteelSeries Siberia Elite Anniversary Edition 7.1', 1, 1, 'eazy.jpg', 'Denmark', 'https://www.facebook.com/EaazzYY', 'http://steamcommunity.com/id/EazYKevin/', 'http://www.twitch.tv/eazymoist', 'https://www.youtube.com/user/EazzYGFX', 'admin2', 'c84258e9c39059a89ab77d846ddab909', 'admin2@admin2.dk', 0);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `es_nyheder`
--

CREATE TABLE IF NOT EXISTS `es_nyheder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_danish_ci NOT NULL,
  `tekst` text COLLATE utf8_danish_ci NOT NULL,
  `dato` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci AUTO_INCREMENT=21 ;

--
-- Data dump for tabellen `es_nyheder`
--

INSERT INTO `es_nyheder` (`id`, `title`, `tekst`, `dato`) VALUES
(10, '1orem ipsum dolor sit amet2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer auctor feugiat consectetur. Aliquam vitae leo laoreet magna sollicitudin dictum. Nam placerat sit amet arcu et pulvinar. Vestibulum nunc sapien, semper ut felis in, ultricies ornare nisi. Morbi eget massa nec lorem lacinia fermentum sit amet in ante. Sed dignissim placerat iaculis. Curabitur vel quam et nibh viverra consectetur. Vestibulum vitae mollis sem. Integer vel odio sapien. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer auctor feugiat consectetur. Aliquam vitae leo laoreet magna sollicitudin dictum. Nam placerat sit amet arcu et pulvinar. Vestibulum nunc sapien, semper ut felis in, ultricies ornare nisi. Morbi eget massa nec lorem lacinia fermentum sit amet in ante. Sed dignissim placerat iaculis. Curabitur vel quam et nibh viverra consectetur. Vestibulum vitae mollis sem. Integer vel odio sapien.', '2014-08-07'),
(11, '1orem ipsum dolor sit amet3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer auctor feugiat \n\nconsectetur. Aliquam vitae leo laoreet mag\n\nna sollicitudin dictum. Nam placerat sit amet arcu et pulvinar. Vestibulum nunc sapien, semper ut felis in, ultricies ornare nisi. Morbi eget \nmassa nec lorem lacinia fermentum sit amet in ante. Sed dignissim placerat iaculis. Curabitur vel quam et nibh viverra consectetur. \n\nVestibulum vitae mollis sem. Integer vel odio sapien. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer auctor feugiat consectetur. Aliquam vitae leo laoreet magn\n\na sollicitudin dictum. Nam placerat sit amet arcu et pulvinar. Vestibulum nunc sapien, semper ut felis in, ultricies ornare nisi. Morbi eget massa nec lorem lacinia fermentum sit amet in ante. Sed dignissim placerat iaculis. Curabitur vel quam et nibh viverra consectetur. Vestibulum vitae mollis sem. \n\nInteger vel odio sapien.', '2014-08-07'),
(19, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer auctor feugiat ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer auctor feugiat \r\n\r\nconsectetur. Aliquam vitae leo laoreet mag\r\n\r\nna sollicitudin dictum. Nam placerat sit amet arcu et pulvinar. Vestibulum nunc sapien, semper ut felis in, ultricies ornare nisi. Morbi eget \r\nmassa nec lorem lacinia fermentum sit amet in ante. Sed dignissim placerat iaculis. Curabitur vel quam et nibh viverra consectetur. \r\n\r\nVestibulum vitae mollis sem. Integer vel odio sapien. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer auctor feugiat consectetur. Aliquam vitae leo laoreet magn\r\n\r\na sollicitudin dictum. Nam placerat sit amet arcu et pulvinar. Vestibulum nunc sapien, semper ut felis in, ultricies ornare nisi. Morbi eget massa nec lorem lacinia fermentum sit amet in ante. Sed dignissim placerat iaculis. Curabitur vel quam et nibh viverra consectetur. Vestibulum vitae mollis sem. \r\n\r\nInteger vel odio sapien.', '2015-06-23'),
(20, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer auctor feugiat ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer auctor feugiat \r\n\r\nconsectetur. Aliquam vitae leo laoreet mag\r\n\r\nna sollicitudin dictum. Nam placerat sit amet arcu et pulvinar. Vestibulum nunc sapien, semper ut felis in, ultricies ornare nisi. Morbi eget \r\nmassa nec lorem lacinia fermentum sit amet in ante. Sed dignissim placerat iaculis. Curabitur vel quam et nibh viverra consectetur. \r\n\r\nVestibulum vitae mollis sem. Integer vel odio sapien. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer auctor feugiat consectetur. Aliquam vitae leo laoreet magn\r\n\r\na sollicitudin dictum. Nam placerat sit amet arcu et pulvinar. Vestibulum nunc sapien, semper ut felis in, ultricies ornare nisi. Morbi eget massa nec lorem lacinia fermentum sit amet in ante. Sed dignissim placerat iaculis. Curabitur vel quam et nibh viverra consectetur. Vestibulum vitae mollis sem. \r\n\r\nInteger vel odio sapien.', '2015-06-23');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `es_scoial`
--

CREATE TABLE IF NOT EXISTS `es_scoial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `billede` varchar(255) CHARACTER SET latin1 NOT NULL,
  `navn` varchar(255) CHARACTER SET latin1 NOT NULL,
  `hjemmeside` varchar(255) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci AUTO_INCREMENT=5 ;

--
-- Data dump for tabellen `es_scoial`
--

INSERT INTO `es_scoial` (`id`, `billede`, `navn`, `hjemmeside`) VALUES
(1, 'facebook.png', 'Facebook', 'https://www.facebook.com/eShooting.dk'),
(2, 'twitter.png', 'Twitter', 'https://twitter.com/eshootingdk'),
(3, 'youtube.png', 'Youtube', 'https://www.youtube.com/user/eShootingdk'),
(4, 'steam.png', 'Steam', 'http://steamcommunity.com/groups/eShootingdk');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `es_sponsorer`
--

CREATE TABLE IF NOT EXISTS `es_sponsorer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `billede` varchar(255) COLLATE utf8_danish_ci NOT NULL,
  `navn` varchar(255) COLLATE utf8_danish_ci NOT NULL,
  `hjemmeside` varchar(255) COLLATE utf8_danish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci AUTO_INCREMENT=7 ;

--
-- Data dump for tabellen `es_sponsorer`
--

INSERT INTO `es_sponsorer` (`id`, `billede`, `navn`, `hjemmeside`) VALUES
(1, 'spire.png', 'spire', 'http://www.spire-corp.com/'),
(3, 'noidpad.png', 'noidpad', 'http://www.noidpad.com/'),
(5, 'x2.png', 'x2 gaming', 'http://www.x2products.com/'),
(6, 'sgpro.png', 'speedgaming', 'http://speedgaming.pro/');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
