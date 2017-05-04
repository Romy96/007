-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server versie:                10.1.16-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Versie:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
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
  `is_admin` tinyint(1) DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `home_adress` varchar(255) DEFAULT NULL,
  `zip_code` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumpen data van tabel loginsystem.login: ~4 rows (ongeveer)
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` (`id`, `firstname`, `prefix`, `lastname`, `username`, `password`, `email`, `is_admin`, `date`, `home_adress`, `zip_code`) VALUES
	(7, 'Peter', '', 'Snoek', 'Administrator', 'f19a86bcd60e668b1d8a2b8530f8b9f4', 'davinciAO007@gmail.com', 1, '2017-05-04 12:28:27', NULL, NULL),
	(8, 'Deona', '', 'Secreve', 'tasninta', 'd41d8cd98f00b204e9800998ecf8427e', 'deona.secreve@outlook.com', NULL, '2017-05-04 12:28:27', NULL, NULL),
	(9, 'Deona', '', 'Secreve', 'tasninta', 'bb8b12540e7aeb6b4322a8a0499ea4b7', 'deona.secreve@outlook.com', NULL, '2017-05-04 12:28:27', NULL, NULL),
	(10, 'asdfasf', '', 'asdfasdf', 'test', '827ccb0eea8a706c4c34a16891f84e7b', 'test@test.com', NULL, '2017-05-04 13:35:40', 'asdfasdf', 'asdasdf');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
