-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 08 mei 2017 om 09:21
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Gegevens worden geëxporteerd voor tabel `login`
--

INSERT INTO `login` (`id`, `firstname`, `prefix`, `lastname`, `username`, `password`, `email`, `date`, `home_adress`, `zip_code`) VALUES
(7, 'Peter', '', 'Snoek', 'Administrator', 'f19a86bcd60e668b1d8a2b8530f8b9f4', 'davinciAO007@gmail.com', '2017-05-04 10:28:27', NULL, NULL),
(8, 'Deona', '', 'Secreve', 'tasninta', 'd41d8cd98f00b204e9800998ecf8427e', 'deona.secreve@outlook.com', '2017-05-04 10:28:27', NULL, NULL),
(9, 'Deona', '', 'Secreve', 'tasninta', 'bb8b12540e7aeb6b4322a8a0499ea4b7', 'deona.secreve@outlook.com', '2017-05-04 10:28:27', NULL, NULL),
(10, 'asdfasf', '', 'asdfasdf', 'test', '827ccb0eea8a706c4c34a16891f84e7b', 'test@test.com', '2017-05-04 11:35:40', 'asdfasdf', 'asdasdf');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `login_role`
--

CREATE TABLE IF NOT EXISTS `login_role` (
  `login_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `login_role`
--

INSERT INTO `login_role` (`login_id`, `role_id`) VALUES
(1, 1),
(2, 2);

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
