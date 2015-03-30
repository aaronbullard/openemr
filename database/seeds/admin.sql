# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.41-0ubuntu0.14.04.1)
# Database: openemr
# Generation Time: 2015-03-30 17:22:14 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table users_secure
# ------------------------------------------------------------

LOCK TABLES `users_secure` WRITE;
/*!40000 ALTER TABLE `users_secure` DISABLE KEYS */;

INSERT INTO `users_secure` (`id`, `username`, `password`, `salt`, `last_update`, `password_history1`, `salt_history1`, `password_history2`, `salt_history2`)
VALUES
	(1,'admin','$2a$05$4GxmZNPU0lb9RdQ0JBObO.Rc26GhreHj/6nEVfgx.0SiXtzYmrVly','$2a$05$4GxmZNPU0lb9RdQ0JBObO$','2015-03-30 17:17:22',NULL,NULL,NULL,NULL);

/*!40000 ALTER TABLE `users_secure` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
