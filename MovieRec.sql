-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.19 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for movierec
CREATE DATABASE IF NOT EXISTS `movierec` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `movierec`;

-- Dumping structure for table movierec.loggeduser
CREATE TABLE IF NOT EXISTS `loggeduser` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `loggedUID` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table movierec.loggeduser: 1 rows
/*!40000 ALTER TABLE `loggeduser` DISABLE KEYS */;
INSERT INTO `loggeduser` (`id`, `loggedUID`) VALUES
	(1, 0);
/*!40000 ALTER TABLE `loggeduser` ENABLE KEYS */;

-- Dumping structure for table movierec.recmovies
CREATE TABLE IF NOT EXISTS `recmovies` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` int(5) DEFAULT NULL,
  `movieName` varchar(100) NOT NULL,
  PRIMARY KEY (`id`,`movieName`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- Dumping data for table movierec.recmovies: 26 rows
/*!40000 ALTER TABLE `recmovies` DISABLE KEYS */;
INSERT INTO `recmovies` (`id`, `uid`, `movieName`) VALUES
	(1, 1, 'Red Corner (1997)'),
	(2, 1, 'Addicted to Love (1997)'),
	(3, 1, 'Michael (1996)'),
	(4, 1, 'Peacemaker, The (1997)'),
	(5, 1, 'Eves Bayou (1997)'),
	(6, 1, 'Anastasia (1997)'),
	(7, 1, 'Bob Roberts (1992)'),
	(8, 1, 'Addicted to Love (1997)'),
	(9, 1, 'Brady Bunch Movie, The (1995)'),
	(10, 1, 'Desperate Measures (1998)'),
	(11, 1, 'Bed of Roses (1996)'),
	(12, 1, 'Apostle, The (1997)'),
	(13, 1, 'Notorious (1946)'),
	(14, 1, 'Philadelphia Story, The (1940)'),
	(15, 1, 'Excess Baggage (1997)'),
	(16, 1, 'Mrs. Brown (Her Majesty, Mrs. Brown) (1997)'),
	(17, 1, 'Mary Shelleys Frankenstein (1994)'),
	(18, 1, 'Seven Years in Tibet (1997)'),
	(19, 1, 'Life Less Ordinary, A (1997)'),
	(20, 1, 'Nosferatu (Nosferatu, eine Symphonie des Grauens) (1922)'),
	(21, 1, 'Shes So Lovely (1997)'),
	(22, 1, 'Quiet Man, The (1952)'),
	(23, 1, 'G.I. Jane (1997)'),
	(24, 1, 'Jaws 2 (1978)'),
	(25, 1, 'Desperado (1995)'),
	(26, 1, 'U Turn (1997)');
/*!40000 ALTER TABLE `recmovies` ENABLE KEYS */;

-- Dumping structure for table movierec.selecthistory
CREATE TABLE IF NOT EXISTS `selecthistory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(5) DEFAULT NULL,
  `movie` varchar(100) DEFAULT NULL,
  KEY `Index 1` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table movierec.selecthistory: 3 rows
/*!40000 ALTER TABLE `selecthistory` DISABLE KEYS */;
INSERT INTO `selecthistory` (`id`, `uid`, `movie`) VALUES
	(1, 1, 'Apollo 13 (1995)'),
	(2, 1, 'Twelve Monkeys (1995)'),
	(3, 1, 'Four Rooms (1995)');
/*!40000 ALTER TABLE `selecthistory` ENABLE KEYS */;

-- Dumping structure for table movierec.selectone
CREATE TABLE IF NOT EXISTS `selectone` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `movie` varchar(100) DEFAULT NULL,
  KEY `Index 1` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table movierec.selectone: 1 rows
/*!40000 ALTER TABLE `selectone` DISABLE KEYS */;
INSERT INTO `selectone` (`id`, `movie`) VALUES
	(1, '');
/*!40000 ALTER TABLE `selectone` ENABLE KEYS */;

-- Dumping structure for table movierec.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `BirthYear` year(4) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `Location` varchar(50) DEFAULT NULL,
  `UserName` varchar(10) NOT NULL,
  `Password` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table movierec.users: 2 rows
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `Name`, `BirthYear`, `Gender`, `Location`, `UserName`, `Password`) VALUES
	(1, 'Krishan Chamara', '1995', 'male', 'Los Angeles  California', 'krishan', '1234'),
	(2, 'Kasun', '1992', 'male', 'Los Angeles  California', 'kasun', '123456');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
