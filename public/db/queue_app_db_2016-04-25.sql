# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.5.38)
# Database: queue_app_db
# Generation Time: 2016-04-24 23:20:34 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table queue
# ------------------------------------------------------------

DROP TABLE IF EXISTS `queue`;

CREATE TABLE `queue` (
  `QueueItemId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Type` enum('Citizen','Organisation','Anonymous') DEFAULT NULL,
  `Name` varchar(55) DEFAULT NULL,
  `ServiceId` int(11) NOT NULL,
  `Timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`QueueItemId`),
  KEY `ServiceId` (`ServiceId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `queue` WRITE;
/*!40000 ALTER TABLE `queue` DISABLE KEYS */;

INSERT INTO `queue` (`QueueItemId`, `Type`, `Name`, `ServiceId`, `Timestamp`)
VALUES
	(1,'Citizen','Miss S Tsaneva',4,'2016-04-23 23:03:00'),
	(2,'Anonymous','Anonymous',5,'2016-04-23 23:04:34'),
	(3,'Citizen','Mr Was  Islam',3,'2016-04-24 15:17:05'),
	(4,'Citizen','Mr Aduni Islam',4,'2016-04-24 18:12:09'),
	(5,'Organisation','Wasamani',2,'2016-04-24 18:12:34');

/*!40000 ALTER TABLE `queue` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table services
# ------------------------------------------------------------

DROP TABLE IF EXISTS `services`;

CREATE TABLE `services` (
  `ServiceId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ServiceTitle` varchar(55) DEFAULT NULL,
  PRIMARY KEY (`ServiceId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;

INSERT INTO `services` (`ServiceId`, `ServiceTitle`)
VALUES
	(1,'Housing'),
	(2,'Benefits'),
	(3,'Council Tax'),
	(4,'Fly-tipping'),
	(5,'Missed Bin');

/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
