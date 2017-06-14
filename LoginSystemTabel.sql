-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 14 jun 2017 om 10:04
-- Serverversie: 5.6.17
-- PHP-versie: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `loginsystem`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) DEFAULT NULL,
  `prefix` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `home_adress` varchar(255) DEFAULT NULL,
  `zip_code` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Gegevens worden geëxporteerd voor tabel `login`
--

INSERT INTO `login` (`id`, `firstname`, `prefix`, `lastname`, `username`, `password`, `email`, `date`, `home_adress`, `zip_code`) VALUES
(1, 'Peter', '', 'Snoek', 'Administrator', 'f19a86bcd60e668b1d8a2b8530f8b9f4', 'davinciAO007@gmail.com', '2017-05-04 08:28:27', NULL, NULL),
(2, 'Deona', '', 'Secreve', 'tasninta', '0f62265227df1b6d6deec36ab4bc5e76', 'deona.secreve@outlook.com', '2017-05-04 08:28:27', NULL, NULL),
(3, 'Deona', '', 'Secreve', 'tasninta', '1fb0531a6ece8b027421ff290f7e30b3', 'deona.secreve@outlook.com', '2017-05-04 08:28:27', NULL, NULL),
(4, 'asdfasf', '', 'asdfasdf', 'test', '827ccb0eea8a706c4c34a16891f84e7b', 'test@test.com', '2017-05-04 09:35:40', 'asdfasdf', 'asdasdf'),
(11, 'Romy', '', 'Bijkerk', 'romy96', 'f9a55ef26d167bc9033d6c26ab3a5be7', 'romy-bijkerk@hotmail.com', '2017-05-12 05:33:41', 'Tiende Penninglaan 292', '4205 SM'),
(12, 'jurre', '', 'kon', 'test', '098f6bcd4621d373cade4e832627b4f6', 'test@test.com', '2017-05-18 07:41:17', 'Fantasielaan 3', '5342 FH');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `login_product`
--

CREATE TABLE IF NOT EXISTS `login_product` (
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `login_product`
--

INSERT INTO `login_product` (`user_id`, `product_id`) VALUES
(11, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `login_role`
--

CREATE TABLE IF NOT EXISTS `login_role` (
  `login_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`login_id`,`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `login_role`
--

INSERT INTO `login_role` (`login_id`, `role_id`) VALUES
(1, 1),
(2, 2),
(3, 2),
(11, 2),
(12, 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `permission` varchar(50) DEFAULT NULL,
  `displayname` varchar(50) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Gegevens worden geëxporteerd voor tabel `permissions`
--

INSERT INTO `permissions` (`id`, `permission`, `displayname`, `description`) VALUES
(1, 'Editing_user', 'Edit user', 'An admin can edit an user from user table'),
(2, 'Deleting_user', 'Delete user', 'An admin can delete users from user table'),
(3, 'Editing_own_profile', 'Edit their own profile', 'A user can edit their own profile ');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `permission_role`
--

CREATE TABLE IF NOT EXISTS `permission_role` (
  `permission_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(3, 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product` varchar(100) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `description` text,
  `amount` varchar(10) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Gegevens worden geëxporteerd voor tabel `products`
--

INSERT INTO `products` (`id`, `product`, `price`, `category`, `description`, `amount`, `image`) VALUES
(1, 'MicroMemory 8GB, DDR3 8GB DDR3 1333MHz ECC geheugenmodule', '58.00', 'ram-geheugen', 'Intern geheugen: 8 GB\r\nIntern geheugentype: DDR3\r\nGeheugenlayout (modules x formaat): 1 x 8 GB\r\nKloksnelheid geheugen: 1333 Megahertz\r\nECC: ECC ja', '150', 'ramTest.png'),
(2, 'MSI 970 GAMING - Moederbord', '99.90', 'moederbord', 'Heeft 6 SATA 600-poorten met RAID-ondersteuning.\r\nMet één druk op de knop overklokken dankzij OC Genie 4.\r\nBeschikt over Killer E2200 netwerk-chip, spelen zonder lag.\r\nVeel USB-poorten voor het aansluiten van randapparatuur.\r\nOndersteunt AMD CrossfireX en NVIDIA SLI. Heeft ruimte voor 2 videokaarten.\r\nDit moederbord beschikt niet over wifi en bluetooth.\r\nOndersteunt alleen processors tot maximaal 200 TDP', '50', 'motherboardTest.png'),
(3, 'Western Digital externe harde schijf: My Book Thunderbolt Duo 6TB - Zwart, Zilver', '127.00', 'harddrive', '6000 GB opslagcapaciteit harde schijf\r\n5200 RPM rotatiesnelheid harde schijf\r\n3.5 " harde schijf, omvang', '250', 'harddriveTest.png');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Gegevens worden geëxporteerd voor tabel `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'Customer');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
