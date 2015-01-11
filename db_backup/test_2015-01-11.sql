# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.6.21)
# Database: test
# Generation Time: 2015-01-11 10:49:22 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table driver_in_vehicles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `driver_in_vehicles`;

CREATE TABLE `driver_in_vehicles` (
  `user_id` int(11) unsigned NOT NULL,
  `vehicle_id` int(11) unsigned NOT NULL,
  `date_assigned` datetime NOT NULL,
  `date_checked_out` datetime DEFAULT NULL,
  `date_returned` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`,`vehicle_id`),
  KEY `vehicle_id` (`vehicle_id`),
  CONSTRAINT `driver_in_vehicles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`users_id`) ON UPDATE CASCADE,
  CONSTRAINT `driver_in_vehicles_ibfk_2` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`vehicle_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table errors
# ------------------------------------------------------------

DROP TABLE IF EXISTS `errors`;

CREATE TABLE `errors` (
  `error_code` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `error_name` varchar(64) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`error_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `errors` WRITE;
/*!40000 ALTER TABLE `errors` DISABLE KEYS */;

INSERT INTO `errors` (`error_code`, `error_name`)
VALUES
	(101,'ERROR_NAME_INTERNAL_PASSWORD_HASH_ERROR'),
	(201,'ERROR_NAME_LOGIN_EMAIL_NOT_FOUND'),
	(202,'ERROR_NAME_PASSWORD_INCORRECT'),
	(203,'ERROR_NAME_NOT_VALID_NAME'),
	(204,'ERROR_NAME_REGISTER_USER_EMAIL_ALREADY_EXISTS'),
	(205,'ERROR_NAME_ACCOUNT_SETTINGS_EMAIL_ALREADY_EXISTS'),
	(206,'ERROR_NAME_NOT_VALID_EMAIL_ADDRESS'),
	(207,'ERROR_NAME_NO_EMAIL_ADDRESS'),
	(208,'ERROR_NAME_NO_PASSWORD_PROVIDED'),
	(209,'ERROR_NAME_NO_PASSWORD_CONFIRMATION_PROVIDED'),
	(210,'ERROR_NAME_PASSWORDS_DO_NOT_MATCH'),
	(211,'ERROR_NAME_NO_OLD_PASSWORD_PROVIDED'),
	(212,'ERROR_NAME_NO_NEW_PASSWORD_PROVIDED'),
	(213,'ERROR_NAME_UPLOADED_IMAGE_TOO_LARGE'),
	(214,'ERROR_NAME_FILE_UPLOAD_ERROR'),
	(215,'ERROR_NAME_IMAGE_FORMAT_NOT_SUPPORTED'),
	(216,'ERROR_NAME_UNABLE_TO_DELETE_ACCOUNT'),
	(217,'ERROR_NAME_NO_REG'),
	(218,'ERROR_NAME_NO_MAKE'),
	(219,'ERROR_NAME_NO_MODEL'),
	(220,'ERROR_NAME_NO_VALID_YEAR'),
	(221,'ERROR_NAME_NO_VALID_MILEAGE'),
	(222,'ERROR_NAME_REGNR_ALREADY_EXISTS'),
	(223,'ERROR_NAME_VEHICLE_OBJ_DOES_NOT_MATCH_HEADER_INFO'),
	(224,'ERROR_NAME_CANNOT_LOWER_MILEAGE'),
	(225,'ERROR_NAME_VEHICLE_STATUS_WAS_NOT_CHANGED'),
	(301,'ERROR_NAME_CSRF_TOKEN_ERROR'),
	(302,'ERROR_NAME_PERMISSION_DENIED');

/*!40000 ALTER TABLE `errors` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `roles_name` varchar(32) NOT NULL DEFAULT '',
  PRIMARY KEY (`roles_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;

INSERT INTO `roles` (`roles_name`)
VALUES
	('ADM'),
	('ADMIN'),
	('DRIVER');

/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `users_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `users_name` varchar(64) CHARACTER SET latin1 DEFAULT NULL,
  `users_email_address` varchar(64) CHARACTER SET latin1 DEFAULT NULL,
  `users_password` varchar(255) CHARACTER SET latin1 DEFAULT '',
  `users_profile_image` varchar(32) CHARACTER SET latin1 DEFAULT NULL,
  `last_login` datetime DEFAULT '0000-00-00 00:00:00',
  `last_modified` datetime DEFAULT '0000-00-00 00:00:00',
  `date_created` datetime DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`users_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`users_id`, `users_name`, `users_email_address`, `users_password`, `users_profile_image`, `last_login`, `last_modified`, `date_created`)
VALUES
	(19,'Martin Wiorek','martinwiorek@hotmail.com','$2y$10$HRvmmq3yoOjhYE7yI/OqAuOyVuGhIBLSIsrMyx3qHPcF/OHpYFgsm','media/profile_images/19.jpg','2015-01-11 10:01:17','2015-01-11 10:01:28','2015-01-10 16:40:20'),
	(20,'Martin Wiorek01','martin@hotmail.com','$2y$10$V.PsovXWU8JOdiaGa3oesOdEDvEc99cgBCkubspoMsqaieAdBZVRa','media/profile_images/default.jpg','1970-01-01 01:00:00','2015-01-11 10:00:11','2015-01-11 10:00:11'),
	(21,'MÃ¥rten','martin@mwiorek.se','$2y$10$JCWVO90kr35O0Tby6TwP3eTOfXwQ1ZyLw584.cL5yfDRohm9MXTOW','media/profile_images/default.jpg','1970-01-01 01:00:00','2015-01-11 10:00:25','2015-01-11 10:00:25');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users_roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users_roles`;

CREATE TABLE `users_roles` (
  `users_id` int(11) unsigned NOT NULL,
  `role` varchar(32) NOT NULL DEFAULT '',
  PRIMARY KEY (`users_id`,`role`),
  KEY `role` (`role`),
  CONSTRAINT `users_roles_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`users_id`) ON UPDATE CASCADE,
  CONSTRAINT `users_roles_ibfk_2` FOREIGN KEY (`role`) REFERENCES `roles` (`roles_name`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users_roles` WRITE;
/*!40000 ALTER TABLE `users_roles` DISABLE KEYS */;

INSERT INTO `users_roles` (`users_id`, `role`)
VALUES
	(19,'ADMIN');

/*!40000 ALTER TABLE `users_roles` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table vehicles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `vehicles`;

CREATE TABLE `vehicles` (
  `vehicle_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `registration_number` varchar(10) NOT NULL DEFAULT '',
  `make` varchar(32) NOT NULL,
  `model` varchar(32) NOT NULL DEFAULT '',
  `year` int(4) NOT NULL,
  `registration_date` date NOT NULL DEFAULT '0000-00-00',
  `vehicle_mileage` int(11) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`vehicle_id`),
  UNIQUE KEY `registration_number` (`registration_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `vehicles` WRITE;
/*!40000 ALTER TABLE `vehicles` DISABLE KEYS */;

INSERT INTO `vehicles` (`vehicle_id`, `registration_number`, `make`, `model`, `year`, `registration_date`, `vehicle_mileage`, `active`)
VALUES
	(1,'WRQ234','JEEP','Wrangler',2005,'2015-01-09',234,0),
	(3,'XBS122','JEEP','Grand Cherokee',2014,'2015-01-09',200,1);

/*!40000 ALTER TABLE `vehicles` ENABLE KEYS */;
UNLOCK TABLES;



--
-- Dumping routines (PROCEDURE) for database 'test'
--
DELIMITER ;;

# Dump of PROCEDURE test_multi_sets
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `test_multi_sets` */;;
/*!50003 SET SESSION SQL_MODE=""*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`localhost`*/ /*!50003 PROCEDURE `test_multi_sets`()
    DETERMINISTIC
begin
        select user() as first_col;
        select user() as first_col, now() as second_col;
        select user() as first_col, now() as second_col, now() as third_col;
        end */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
DELIMITER ;

/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
