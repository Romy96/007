-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server versie:                5.7.11 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Versie:              9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Databasestructuur van loginsystem wordt geschreven
CREATE DATABASE IF NOT EXISTS `loginsystem` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `loginsystem`;


-- Structuur van  tabel loginsystem.login wordt geschreven
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Dumpen data van tabel loginsystem.login: ~6 rows (ongeveer)
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` (`id`, `firstname`, `prefix`, `lastname`, `username`, `password`, `email`, `date`, `home_adress`, `zip_code`) VALUES
	(1, 'Peter', '', 'Snoek', 'Administrator', 'f19a86bcd60e668b1d8a2b8530f8b9f4', 'davinciAO007@gmail.com', '2017-05-04 10:28:27', NULL, NULL),
	(2, 'Deona', '', 'Secreve', 'tasninta', '0f62265227df1b6d6deec36ab4bc5e76', 'deona.secreve@outlook.com', '2017-05-04 10:28:27', NULL, NULL),
	(3, 'Deona', '', 'Secreve', 'tasninta', '1fb0531a6ece8b027421ff290f7e30b3', 'deona.secreve@outlook.com', '2017-05-04 10:28:27', NULL, NULL),
	(4, 'asdfasf', '', 'asdfasdf', 'test', '827ccb0eea8a706c4c34a16891f84e7b', 'test@test.com', '2017-05-04 11:35:40', 'asdfasdf', 'asdasdf'),
	(11, 'Romy', '', 'Bijkerk', 'romy96', 'f9a55ef26d167bc9033d6c26ab3a5be7', 'romy-bijkerk@hotmail.com', '2017-05-12 07:33:41', 'Tiende Penninglaan 292', '4205 SM'),
	(12, 'jurre', '', 'kon', 'test', '098f6bcd4621d373cade4e832627b4f6', 'test@test.com', '2017-05-18 09:41:17', 'Fantasielaan 3', '5342 FH');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;


-- Structuur van  tabel loginsystem.login_role wordt geschreven
CREATE TABLE IF NOT EXISTS `login_role` (
  `login_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`login_id`,`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumpen data van tabel loginsystem.login_role: ~5 rows (ongeveer)
/*!40000 ALTER TABLE `login_role` DISABLE KEYS */;
INSERT INTO `login_role` (`login_id`, `role_id`) VALUES
	(1, 1),
	(2, 2),
	(3, 2),
	(11, 2),
	(12, 2);
/*!40000 ALTER TABLE `login_role` ENABLE KEYS */;


-- Structuur van  tabel loginsystem.permissions wordt geschreven
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `permission` varchar(50) DEFAULT NULL,
  `displayname` varchar(50) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumpen data van tabel loginsystem.permissions: ~3 rows (ongeveer)
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` (`id`, `permission`, `displayname`, `description`) VALUES
	(1, 'Editing_user', 'Edit user', 'An admin can edit an user from user table'),
	(2, 'Deleting_user', 'Delete user', 'An admin can delete users from user table'),
	(3, 'Editing_own_profile', 'Edit their own profile', 'A user can edit their own profile ');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;


-- Structuur van  tabel loginsystem.permission_role wordt geschreven
CREATE TABLE IF NOT EXISTS `permission_role` (
  `permission_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumpen data van tabel loginsystem.permission_role: ~4 rows (ongeveer)
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
	(1, 1),
	(2, 1),
	(3, 1),
	(3, 2);
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;


-- Structuur van  tabel loginsystem.products wordt geschreven
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product` varchar(100) DEFAULT NULL,
  `price` varchar(10) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `description` text,
  `amount` varchar(10) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumpen data van tabel loginsystem.products: ~3 rows (ongeveer)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `product`, `price`, `category`, `description`, `amount`, `image`) VALUES
	(1, 'MicroMemory 8GB, DDR3 8GB DDR3 1333MHz ECC geheugenmodule', '58,69', 'ram-geheugen', 'Intern geheugen: 8 GB\r\nIntern geheugentype: DDR3\r\nGeheugenlayout (modules x formaat): 1 x 8 GB\r\nKloksnelheid geheugen: 1333 Megahertz\r\nECC: ECC ja', '150', '../public/img/ramTest.png'),
	(2, 'MSI 970 GAMING - Moederbord', '99,90', 'moederbord', 'Heeft 6 SATA 600-poorten met RAID-ondersteuning.\r\nMet één druk op de knop overklokken dankzij OC Genie 4.\r\nBeschikt over Killer E2200 netwerk-chip, spelen zonder lag.\r\nVeel USB-poorten voor het aansluiten van randapparatuur.\r\nOndersteunt AMD CrossfireX en NVIDIA SLI. Heeft ruimte voor 2 videokaarten.\r\nDit moederbord beschikt niet over wifi en bluetooth.\r\nOndersteunt alleen processors tot maximaal 200 TDP', '50', '../public/img/motherboardTest.png'),
	(3, 'Western Digital externe harde schijf: My Book Thunderbolt Duo 6TB - Zwart, Zilver', '295', 'hard drive', '6000 GB opslagcapaciteit harde schijf\r\n5200 RPM rotatiesnelheid harde schijf\r\n3.5 " harde schijf, omvang', '250', '../public/img/harddriveTest.png');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;


-- Structuur van  tabel loginsystem.roles wordt geschreven
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumpen data van tabel loginsystem.roles: ~2 rows (ongeveer)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`) VALUES
	(1, 'Admin'),
	(2, 'Customer');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
