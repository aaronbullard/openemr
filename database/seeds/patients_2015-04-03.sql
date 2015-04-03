# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.6.19-0ubuntu0.14.04.1)
# Database: homestead
# Generation Time: 2015-04-03 21:14:08 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table patient_data
# ------------------------------------------------------------

# LOCK TABLES `patient_data` WRITE;
/*!40000 ALTER TABLE `patient_data` DISABLE KEYS */;

INSERT INTO `patient_data` (`id`, `title`, `language`, `financial`, `fname`, `lname`, `mname`, `DOB`, `street`, `postal_code`, `city`, `state`, `country_code`, `drivers_license`, `ss`, `occupation`, `phone_home`, `phone_biz`, `phone_contact`, `phone_cell`, `pharmacy_id`, `status`, `contact_relationship`, `date`, `sex`, `referrer`, `referrerID`, `providerID`, `ref_providerID`, `email`, `email_direct`, `ethnoracial`, `race`, `ethnicity`, `interpretter`, `migrantseasonal`, `family_size`, `monthly_income`, `homeless`, `financial_review`, `pubpid`, `pid`, `genericname1`, `genericval1`, `genericname2`, `genericval2`, `hipaa_mail`, `hipaa_voice`, `hipaa_notice`, `hipaa_message`, `hipaa_allowsms`, `hipaa_allowemail`, `squad`, `fitness`, `referral_source`, `usertext1`, `usertext2`, `usertext3`, `usertext4`, `usertext5`, `usertext6`, `usertext7`, `usertext8`, `userlist1`, `userlist2`, `userlist3`, `userlist4`, `userlist5`, `userlist6`, `userlist7`, `pricelevel`, `regdate`, `contrastart`, `completed_ad`, `ad_reviewed`, `vfc`, `mothersname`, `guardiansname`, `allow_imm_reg_use`, `allow_imm_info_share`, `allow_health_info_ex`, `allow_patient_portal`, `deceased_date`, `deceased_reason`, `soap_import_status`, `cmsportal_login`)
VALUES
	(1,'Mr.','','','Jonathan','Braun','Dale','1978-02-12','39308 Grady Views','06027','East Bernice','MS','US','110250684','269-97-7546','Pariatur maxime labore perspiciatis quo officia.','(137)-667-4340','','','(776)-588-7953',0,'single','',NULL,'Female','','',NULL,NULL,'carroll00@hotmail.com','','','','','','','4','39382','',NULL,'',4161,'','','','','','','','','NO','NO','',0,'','','','','','','','','','','','','','','','','standard',NULL,NULL,'NO',NULL,'','Flatley','','','','','',NULL,'',NULL,''),
	(2,'Ms.','','','Camilla','Schroeder','Madaline','1980-08-22','79977 Grady Brooks','52280','West Dedric','FL','US','406076526','076-21-8345','Repellendus aspernatur porro deleniti aut voluptatem dolores enim.','(779)-108-2040','','','(726)-011-7265',0,'domestic partner','',NULL,'Female','','',NULL,NULL,'glenda64@hotmail.com','','','','','','','1','105068','',NULL,'',4162,'','','','','','','','','NO','NO','',0,'','','','','','','','','','','','','','','','','standard',NULL,NULL,'NO',NULL,'','Brakus','','','','','',NULL,'',NULL,''),
	(3,'Mr.','','','Stewart','Hauck','Evan','1987-08-01','188 Lamar Square Apt. 086','96742','New Paulamouth','OH','US','132466091','805-73-5720','Quis praesentium illum delectus doloribus molestias quos soluta.','(761)-985-8978','','','(522)-279-5987',0,'domestic partner','',NULL,'Female','','',NULL,NULL,'hoeger.monserrate@gmail.com','','','','','','','1','75474','',NULL,'',4163,'','','','','','','','','NO','NO','',0,'','','','','','','','','','','','','','','','','standard',NULL,NULL,'NO',NULL,'','Okuneva','','','','','',NULL,'',NULL,''),
	(4,'Mr.','','','Cleo','Tromp','Eric','1996-09-07','6513 Gloria Prairie','30628','Eileenton','MT','US','219487365','526-87-4963','Ut est dolor ut eos et et.','(881)-939-0377','','','(924)-170-2012',0,'married','',NULL,'Female','','',NULL,NULL,'hparker@gmail.com','','','','','','','8','75560','',NULL,'',4164,'','','','','','','','','NO','NO','',0,'','','','','','','','','','','','','','','','','standard',NULL,NULL,'NO',NULL,'','Beier','','','','','',NULL,'',NULL,''),
	(5,'Ms.','','','Casimir','O\'Keefe','Petra','1976-09-13','235 Rodriguez Cape Apt. 310','47520','Rupertshire','KS','US','611110000','654-94-6912','Reiciendis voluptatem a et et.','(335)-113-1954','','','(246)-876-9745',0,'single','',NULL,'Male','','',NULL,NULL,'steuber.crawford@hotmail.com','','','','','','','6','38531','',NULL,'',4165,'','','','','','','','','NO','NO','',0,'','','','','','','','','','','','','','','','','standard',NULL,NULL,'NO',NULL,'','Wintheiser','','','','','',NULL,'',NULL,''),
	(6,'Mrs.','','','Bernice','Ledner','Martine','1984-02-03','8146 Cummings Run Suite 051','15428-3846','West Guillermo','SD','US','750574654','111-06-8388','Aliquam et ducimus architecto atque occaecati.','(600)-537-5677','','','(611)-534-9347',0,'married','',NULL,'Female','','',NULL,NULL,'cordell.reinger@yahoo.com','','','','','','','2','36643','',NULL,'',4166,'','','','','','','','','NO','NO','',0,'','','','','','','','','','','','','','','','','standard',NULL,NULL,'NO',NULL,'','Pfeffer','','','','','',NULL,'',NULL,''),
	(7,'Mr.','','','Immanuel','McWalters','Regan','1993-04-01','6465 Kautzer Junctions Apt. 025','89347-7373','South Micaelaville','TN','US','937723238','812-46-7733','Voluptatem quibusdam quo at consequatur.','(472)-940-9523','','','(066)-118-8044',0,'separated','',NULL,'Male','','',NULL,NULL,'ejohnson@gmail.com','','','','','','','6','72684','',NULL,'',4167,'','','','','','','','','NO','NO','',0,'','','','','','','','','','','','','','','','','standard',NULL,NULL,'NO',NULL,'','Rutherford','','','','','',NULL,'',NULL,''),
	(8,'Mr.','','','Willy','Sipes','Thomas','1970-08-13','386 Oscar Cape','76989','Prosaccomouth','IL','US','133638070','748-70-8593','Praesentium tempora sit consequuntur eum harum pariatur mollitia ex.','(672)-735-8580','','','(991)-257-0340',0,'divorced','',NULL,'Male','','',NULL,NULL,'brekke.alicia@hotmail.com','','','','','','','2','71422','',NULL,'',4168,'','','','','','','','','NO','NO','',0,'','','','','','','','','','','','','','','','','standard',NULL,NULL,'NO',NULL,'','Abbott','','','','','',NULL,'',NULL,'');

/*!40000 ALTER TABLE `patient_data` ENABLE KEYS */;
# UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
