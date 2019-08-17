-- mysqldump-php https://github.com/ifsnop/mysqldump-php
--
-- Host: 127.0.0.1	Database: caritasbd
-- ------------------------------------------------------
-- Server version 	5.5.5-10.3.16-MariaDB
-- Date: Mon, 05 Aug 2019 07:48:36 +0000

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `aggrement`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aggrement` (
  `aggrementId` int(11) NOT NULL AUTO_INCREMENT,
  `fkaggrementQusId` int(11) NOT NULL,
  `fkuserId` int(11) NOT NULL,
  `ans` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`aggrementId`),
  KEY `fk_aggrement_aggrementQus1_idx` (`fkaggrementQusId`),
  KEY `fk_aggrement_user1_idx` (`fkuserId`),
  CONSTRAINT `fk_aggrement_aggrementQus1` FOREIGN KEY (`fkaggrementQusId`) REFERENCES `agreementqus` (`agreementQusId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_aggrement_user1` FOREIGN KEY (`fkuserId`) REFERENCES `user` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=169 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aggrement`
--

LOCK TABLES `aggrement` WRITE;
/*!40000 ALTER TABLE `aggrement` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `aggrement` VALUES (21,26,7,'Y'),(22,27,7,'NA'),(23,28,7,'N'),(24,29,7,'NA'),(29,26,10,'N'),(30,27,10,'Y'),(31,28,10,'N'),(32,29,10,'N'),(45,26,16,'N'),(46,27,16,'N'),(47,28,16,'N'),(48,29,16,'N'),(73,26,28,'N'),(74,27,28,'N'),(75,28,28,'N'),(76,29,28,'Y'),(77,26,29,'N'),(78,27,29,'Y'),(79,28,29,'N'),(80,29,29,'N'),(81,26,30,'N'),(82,27,30,'N'),(83,28,30,'N'),(84,29,30,'N'),(101,26,36,'Y'),(102,27,36,'N'),(103,28,36,'Y'),(104,29,36,'NA'),(109,26,38,'N'),(110,27,38,'Y'),(111,28,38,'NA'),(112,29,38,'N'),(117,26,41,'N'),(118,27,41,'NA'),(119,28,41,'NA'),(120,29,41,'NA'),(121,26,42,'N'),(122,27,42,'Y'),(123,28,42,'N'),(124,29,42,'N'),(125,26,43,'N'),(126,27,43,'N'),(127,28,43,'N'),(128,29,43,'N'),(133,26,45,'N'),(134,27,45,'NA'),(135,28,45,'N'),(136,29,45,'NA'),(137,26,46,'N'),(138,27,46,'Y'),(139,28,46,'Y'),(140,29,46,'N'),(141,26,47,'N'),(142,27,47,'Y'),(143,28,47,'N'),(144,29,47,'N'),(145,26,48,'N'),(146,27,48,'Y'),(147,28,48,'N'),(148,29,48,'N'),(149,26,49,'N'),(150,27,49,'Y'),(151,28,49,'N'),(152,29,49,'N'),(153,26,50,'N'),(154,27,50,'N'),(155,28,50,'N'),(156,29,50,'N'),(157,26,51,'N'),(158,27,51,'Y'),(159,28,51,'N'),(160,29,51,'N'),(161,26,52,'N'),(162,27,52,'Y'),(163,28,52,'N'),(164,29,52,'N'),(165,26,53,'N'),(166,27,53,'NA'),(167,28,53,'N'),(168,29,53,'N');
/*!40000 ALTER TABLE `aggrement` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `aggrement` with 80 row(s)
--

--
-- Table structure for table `agreementqus`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agreementqus` (
  `agreementQusId` int(11) NOT NULL AUTO_INCREMENT,
  `qus` varchar(1000) DEFAULT NULL,
  `serial` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  PRIMARY KEY (`agreementQusId`),
  UNIQUE KEY `serial_unique` (`agreementQusId`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agreementqus`
--

LOCK TABLES `agreementqus` WRITE;
/*!40000 ALTER TABLE `agreementqus` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `agreementqus` VALUES (26,'Do you have any crime record?',1,1),(27,'Do you manage conflict well?',2,1),(28,'Have you ever committed or conspired to commit a human trafficking offense in Bangladesh or outside of the country?',3,1),(29,'Are you or have you ever been a drug user or addict?',4,1);
/*!40000 ALTER TABLE `agreementqus` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `agreementqus` with 4 row(s)
--

--
-- Table structure for table `board`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `board` (
  `boardId` int(11) NOT NULL AUTO_INCREMENT,
  `boardName` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`boardId`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `board`
--

LOCK TABLES `board` WRITE;
/*!40000 ALTER TABLE `board` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `board` VALUES (1,'Dhaka Board',1),(2,'Rajshahi Board',1),(3,'Public University',1),(4,'Private University',1),(5,'Renex Maria Rozario Anita Margaret Rozario nayon S',0),(6,'Khulna Board',1),(7,'Comilla Board',1),(8,'Chattogram Board',1),(9,'Barishal Board',1),(10,'Sylhet Board',1),(11,'weaeaw',0),(12,'weaeaw',0),(13,'board',0),(14,'asd',0),(15,'dhk',0);
/*!40000 ALTER TABLE `board` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `board` with 15 row(s)
--

--
-- Table structure for table `computerskill`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `computerskill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `computerSkillName` varchar(255) DEFAULT NULL,
  `status` tinyint(2) DEFAULT NULL COMMENT '0=inactive,=Active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `computerskill`
--

LOCK TABLES `computerskill` WRITE;
/*!40000 ALTER TABLE `computerskill` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `computerskill` VALUES (1,'Outlook',1),(2,'MS Office',1),(3,'MS Office Excel',0),(4,'HTML',1),(5,'Basic Computer',1),(6,'Other',0),(7,'dfsd',0),(8,'dfsd',0),(9,'czxcc',0);
/*!40000 ALTER TABLE `computerskill` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `computerskill` with 9 row(s)
--

--
-- Table structure for table `country`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `country` (
  `countryId` int(11) NOT NULL AUTO_INCREMENT,
  `shortname` varchar(25) DEFAULT NULL,
  `countryName` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`countryId`)
) ENGINE=InnoDB AUTO_INCREMENT=249 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country`
--

LOCK TABLES `country` WRITE;
/*!40000 ALTER TABLE `country` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `country` VALUES (1,'','Bangladesh'),(2,'','UK'),(3,'AF','Afghanistan'),(4,'AL','Albania'),(5,'DZ','Algeria'),(6,'DS','American Samoa'),(7,'AD','Andorra'),(8,'AO','Angola'),(9,'AI','Anguilla'),(10,'AQ','Antarctica'),(11,'AG','Antigua and Barbuda'),(12,'AR','Argentina'),(13,'AM','Armenia'),(14,'AW','Aruba'),(15,'AU','Australia'),(16,'AT','Austria'),(17,'AZ','Azerbaijan'),(18,'BS','Bahamas'),(19,'BH','Bahrain'),(20,'BD','Bangladesh'),(21,'BB','Barbados'),(22,'BY','Belarus'),(23,'BE','Belgium'),(24,'BZ','Belize'),(25,'BJ','Benin'),(26,'BM','Bermuda'),(27,'BT','Bhutan'),(28,'BO','Bolivia'),(29,'BA','Bosnia and Herzegovina'),(30,'BW','Botswana'),(31,'BV','Bouvet Island'),(32,'BR','Brazil'),(33,'IO','British Indian Ocean Terr'),(34,'BN','Brunei Darussalam'),(35,'BG','Bulgaria'),(36,'BF','Burkina Faso'),(37,'BI','Burundi'),(38,'KH','Cambodia'),(39,'CM','Cameroon'),(40,'CA','Canada'),(41,'CV','Cape Verde'),(42,'KY','Cayman Islands'),(43,'CF','Central African Republic'),(44,'TD','Chad'),(45,'CL','Chile'),(46,'CN','China'),(47,'CX','Christmas Island'),(48,'CC','Cocos (Keeling) Islands'),(49,'CO','Colombia'),(50,'KM','Comoros'),(51,'CG','Congo'),(52,'CK','Cook Islands'),(53,'CR','Costa Rica'),(54,'HR','Croatia (Hrvatska)'),(55,'CU','Cuba'),(56,'CY','Cyprus'),(57,'CZ','Czech Republic'),(58,'DK','Denmark'),(59,'DJ','Djibouti'),(60,'DM','Dominica'),(61,'DO','Dominican Republic'),(62,'TP','East Timor'),(63,'EC','Ecuador'),(64,'EG','Egypt'),(65,'SV','El Salvador'),(66,'GQ','Equatorial Guinea'),(67,'ER','Eritrea'),(68,'EE','Estonia'),(69,'ET','Ethiopia'),(70,'FK','Falkland Islands (Malvina'),(71,'FO','Faroe Islands'),(72,'FJ','Fiji'),(73,'FI','Finland'),(74,'FR','France'),(75,'FX','France, Metropolitan'),(76,'GF','French Guiana'),(77,'PF','French Polynesia'),(78,'TF','French Southern Territori'),(79,'GA','Gabon'),(80,'GM','Gambia'),(81,'GE','Georgia'),(82,'DE','Germany'),(83,'GH','Ghana'),(84,'GI','Gibraltar'),(85,'GK','Guernsey'),(86,'GR','Greece'),(87,'GL','Greenland'),(88,'GD','Grenada'),(89,'GP','Guadeloupe'),(90,'GU','Guam'),(91,'GT','Guatemala'),(92,'GN','Guinea'),(93,'GW','Guinea-Bissau'),(94,'GY','Guyana'),(95,'HT','Haiti'),(96,'HM','Heard and Mc Donald Islan'),(97,'HN','Honduras'),(98,'HK','Hong Kong'),(99,'HU','Hungary'),(100,'IS','Iceland'),(101,'IN','India'),(102,'IM','Isle of Man'),(103,'ID','Indonesia'),(104,'IR','Iran (Islamic Republic of'),(105,'IQ','Iraq'),(106,'IE','Ireland'),(107,'IL','Israel'),(108,'IT','Italy'),(109,'CI','Ivory Coast'),(110,'JE','Jersey'),(111,'JM','Jamaica'),(112,'JP','Japan'),(113,'JO','Jordan'),(114,'KZ','Kazakhstan'),(115,'KE','Kenya'),(116,'KI','Kiribati'),(117,'KP','Korea, Democratic People\''),(118,'KR','Korea, Republic of'),(119,'XK','Kosovo'),(120,'KW','Kuwait'),(121,'KG','Kyrgyzstan'),(122,'LA','Lao People\'s Democratic R'),(123,'LV','Latvia'),(124,'LB','Lebanon'),(125,'LS','Lesotho'),(126,'LR','Liberia'),(127,'LY','Libyan Arab Jamahiriya'),(128,'LI','Liechtenstein'),(129,'LT','Lithuania'),(130,'LU','Luxembourg'),(131,'MO','Macau'),(132,'MK','Macedonia'),(133,'MG','Madagascar'),(134,'MW','Malawi'),(135,'MY','Malaysia'),(136,'MV','Maldives'),(137,'ML','Mali'),(138,'MT','Malta'),(139,'MH','Marshall Islands'),(140,'MQ','Martinique'),(141,'MR','Mauritania'),(142,'MU','Mauritius'),(143,'TY','Mayotte'),(144,'MX','Mexico'),(145,'FM','Micronesia, Federated Sta'),(146,'MD','Moldova, Republic of'),(147,'MC','Monaco'),(148,'MN','Mongolia'),(149,'ME','Montenegro'),(150,'MS','Montserrat'),(151,'MA','Morocco'),(152,'MZ','Mozambique'),(153,'MM','Myanmar'),(154,'NA','Namibia'),(155,'NR','Nauru'),(156,'NP','Nepal'),(157,'NL','Netherlands'),(158,'AN','Netherlands Antilles'),(159,'NC','New Caledonia'),(160,'NZ','New Zealand'),(161,'NI','Nicaragua'),(162,'NE','Niger'),(163,'NG','Nigeria'),(164,'NU','Niue'),(165,'NF','Norfolk Island'),(166,'MP','Northern Mariana Islands'),(167,'NO','Norway'),(168,'OM','Oman'),(169,'PK','Pakistan'),(170,'PW','Palau'),(171,'PS','Palestine'),(172,'PA','Panama'),(173,'PG','Papua New Guinea'),(174,'PY','Paraguay'),(175,'PE','Peru'),(176,'PH','Philippines'),(177,'PN','Pitcairn'),(178,'PL','Poland'),(179,'PT','Portugal'),(180,'PR','Puerto Rico'),(181,'QA','Qatar'),(182,'RE','Reunion'),(183,'RO','Romania'),(184,'RU','Russian Federation'),(185,'RW','Rwanda'),(186,'KN','Saint Kitts and Nevis'),(187,'LC','Saint Lucia'),(188,'VC','Saint Vincent and the Gre'),(189,'WS','Samoa'),(190,'SM','San Marino'),(191,'ST','Sao Tome and Principe'),(192,'SA','Saudi Arabia'),(193,'SN','Senegal'),(194,'RS','Serbia'),(195,'SC','Seychelles'),(196,'SL','Sierra Leone'),(197,'SG','Singapore'),(198,'SK','Slovakia'),(199,'SI','Slovenia'),(200,'SB','Solomon Islands'),(201,'SO','Somalia'),(202,'ZA','South Africa'),(203,'GS','South Georgia South Sandw'),(204,'SS','South Sudan'),(205,'ES','Spain'),(206,'LK','Sri Lanka'),(207,'SH','St. Helena'),(208,'PM','St. Pierre and Miquelon'),(209,'SD','Sudan'),(210,'SR','Suriname'),(211,'SJ','Svalbard and Jan Mayen Is'),(212,'SZ','Swaziland'),(213,'SE','Sweden'),(214,'CH','Switzerland'),(215,'SY','Syrian Arab Republic'),(216,'TW','Taiwan'),(217,'TJ','Tajikistan'),(218,'TZ','Tanzania, United Republic'),(219,'TH','Thailand'),(220,'TG','Togo'),(221,'TK','Tokelau'),(222,'TO','Tonga'),(223,'TT','Trinidad and Tobago'),(224,'TN','Tunisia'),(225,'TR','Turkey'),(226,'TM','Turkmenistan'),(227,'TC','Turks and Caicos Islands'),(228,'TV','Tuvalu'),(229,'UG','Uganda'),(230,'UA','Ukraine'),(231,'AE','United Arab Emirates'),(232,'GB','United Kingdom'),(233,'US','United States'),(234,'UM','United States minor outly'),(235,'UY','Uruguay'),(236,'UZ','Uzbekistan'),(237,'VU','Vanuatu'),(238,'VA','Vatican City State'),(239,'VE','Venezuela'),(240,'VN','Vietnam'),(241,'VG','Virgin Islands (British)'),(242,'VI','Virgin Islands (U.S.)'),(243,'WF','Wallis and Futuna Islands'),(244,'EH','Western Sahara'),(245,'YE','Yemen'),(246,'ZR','Zaire'),(247,'ZM','Zambia'),(248,'ZW','Zimbabwe');
/*!40000 ALTER TABLE `country` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `country` with 248 row(s)
--

--
-- Table structure for table `degree`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `degree` (
  `degreeId` int(11) NOT NULL AUTO_INCREMENT,
  `degreeName` varchar(255) DEFAULT NULL,
  `educationLevelId` int(11) NOT NULL,
  `status` tinyint(3) DEFAULT NULL COMMENT '0=Inactive ,1=Active',
  PRIMARY KEY (`degreeId`),
  KEY `fk_educationLevel` (`educationLevelId`),
  CONSTRAINT `fk_education_level_id` FOREIGN KEY (`educationLevelId`) REFERENCES `educationlevel` (`educationLevelId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `degree`
--

LOCK TABLES `degree` WRITE;
/*!40000 ALTER TABLE `degree` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `degree` VALUES (1,'Bachelor of Science (BSc)',3,1),(2,'Bachelor of Arts (BA)',3,1),(3,'SSC',1,1),(4,'Arts',8,0),(5,'HSC',2,1),(6,'Bachelor of Commerce (B Com)',3,1),(7,'Bachelor of Commerce (Pass)',3,1),(8,'Master of Arts (MA)',4,1),(9,'Master of Science (MSc)',4,1),(10,'Bachelor of Business Administration (BBA)',3,1),(11,'Master of  Commerce (M Com)',4,1),(12,'A Level',2,1),(13,'Alim (Madrasah)',2,1),(14,'HSC (Vocational)',2,1),(15,'Others',2,1),(16,'test3',2,0),(17,'Dakhil (Madrasah)',1,1),(18,'Master of Business Administration (MBA)',4,1),(19,'Dakhil',9,0),(20,'SSC (Vocational)',1,1),(21,'Bachelor of Medicine and Bachelor of Surgery (MBBS)',3,1),(22,'Bachelor of Dental Surgery (BDS)',3,1),(23,'commerce',2,0),(24,'Business Studies',1,0),(25,'Business Studies',2,0),(26,'Others',1,0),(27,'Arts',1,0),(28,'Bachelor of Architecture (B. Arch)',3,1),(29,'O Level',1,1),(30,'Bachelor of Pharmacy (B. Pharm)',3,1),(31,'Bachelor of Education (B. Ed)',3,1),(32,'Bachelor of Physical Education (BPEd)',3,1),(33,'Bachelor of Law (LLB)',3,1),(34,'Dector of Veterinary Medicine (DVM)',3,1),(35,'Bachelor of Social Science (BSS)',3,1),(36,'Bachelor of Fine Arts (B.F.A)',3,1),(37,'Bachelor of Business Studies (BBS)',3,1),(38,'Bachelor of Computer Application (BCA)',3,1),(39,'Fazil (Madrasah)',3,1),(40,'Bachelor in Engineering (BEngg)',3,1),(41,'Others',3,0),(42,'Primary School Certificate (PSC)',14,1),(43,'Ebtedayee',14,1),(44,'5 pass',14,1),(45,'Others',14,0),(46,'Junior School Certificate (JSC)',15,1),(47,'JDC (Madrasah)',15,1),(48,'8 Pass',15,1),(49,'Others',15,0),(50,'Diploma in Engineering',6,1),(51,'Diploma in Medical Technology',6,1),(52,'Diploma in Nursing',6,1),(53,'Diploma in Commerce',6,1),(54,'Diploma in Business Studies',6,1),(55,'Post Graduate Diploma (PGD)',6,1),(56,'Diploma in Pathology',6,1),(57,'Diploma (Vocational)',6,1),(58,'Diploma in Hotel Management',6,1),(59,'Others',6,0),(60,'Bechelor of Tourism and Hospitality Management',3,1),(61,'Bachelor of Science in Computer and Information technology',3,1),(62,'Bachelor of Science in Computer and Engineering',3,1),(63,'Master of Architecture (M. Arch)',4,1),(64,'Master of Pharmacy (M. Pharm)',4,1),(65,'Master of Education (M. Ed)',4,1),(66,'Master of Law (LLM)',4,1),(67,'Master of Social Science (MSS)',4,1),(68,'Master of Fine Arts (M.F.A)',4,1),(69,'Master of Philosophy (M. Phil)',4,1),(70,'Master of Business Management (MBM)',4,1),(71,'Master of Development Studies (MDS)',4,1),(72,'Master of Business Studies (MBS)',4,1),(73,'Masters in Computer Application (MCA)',4,1),(74,'Executive Master of Business Administration (EMBA)',4,1),(75,'Fellowship of the College of Physicians and Surgeons (FCPS)',4,1),(76,'Kamil (Madrasah)',4,1),(77,'Masters in Engineering (MEngg)',4,1),(78,'Masters in Bank Management (MBM)',4,1),(79,'Masters in Information System Security (MISS)',4,1),(80,'Master of information and Communication Technology (MICT)',4,1),(81,'Others',4,0);
/*!40000 ALTER TABLE `degree` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `degree` with 81 row(s)
--

--
-- Table structure for table `designation`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `designation` (
  `designationId` int(11) NOT NULL AUTO_INCREMENT,
  `designationName` varchar(50) NOT NULL,
  `status` tinyint(3) DEFAULT NULL COMMENT '0=Inactive ,1=Active',
  PRIMARY KEY (`designationId`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `designation`
--

LOCK TABLES `designation` WRITE;
/*!40000 ALTER TABLE `designation` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `designation` VALUES (1,'Designation-1',0),(2,'Designation 2',0),(3,'test',0),(4,'test123',0),(5,'test Designation',0),(6,'Senior HR Officer',1),(7,'Assistant HR Officer',1),(8,'Senior Secretary of RD CHT',1),(9,'ICT Manager',1),(10,'Manager-HR',1);
/*!40000 ALTER TABLE `designation` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `designation` with 10 row(s)
--

--
-- Table structure for table `education`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `education` (
  `educationId` int(11) NOT NULL AUTO_INCREMENT,
  `fkdegreeId` int(11) NOT NULL,
  `institutionName` varchar(255) DEFAULT NULL,
  `fkMajorId` int(11) DEFAULT NULL,
  `passingYear` year(4) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `resultSystem` tinyint(2) NOT NULL COMMENT '1=grade,2=division,3=class,4=others',
  `result` varchar(20) DEFAULT NULL,
  `resultOutOf` varchar(20) DEFAULT NULL,
  `educationcol` varchar(45) DEFAULT NULL,
  `fkcountryId` int(11) NOT NULL,
  `fkemployeeId` int(11) NOT NULL,
  `fkboardId` int(11) DEFAULT NULL,
  `universityType` tinyint(3) DEFAULT NULL COMMENT '1=Private,2=Public',
  `resultSystemName` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`educationId`),
  KEY `fk_education_degreeId1_idx` (`fkdegreeId`),
  KEY `fk_education_country1_idx` (`fkcountryId`),
  KEY `fk_education_employee1_idx` (`fkemployeeId`),
  KEY `fk_major` (`fkMajorId`),
  KEY `fk_board` (`fkboardId`),
  CONSTRAINT `fk_education_board` FOREIGN KEY (`fkboardId`) REFERENCES `board` (`boardId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_education_country1` FOREIGN KEY (`fkcountryId`) REFERENCES `country` (`countryId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_education_degreeId1` FOREIGN KEY (`fkdegreeId`) REFERENCES `degree` (`degreeId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_education_employee1` FOREIGN KEY (`fkemployeeId`) REFERENCES `employee` (`employeeId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_education_major` FOREIGN KEY (`fkMajorId`) REFERENCES `educationmajor` (`educationMajorId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `education`
--

LOCK TABLES `education` WRITE;
/*!40000 ALTER TABLE `education` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `education` VALUES (37,3,'Motijheel Govt Boys High School',NULL,'1997','2',2,'First',NULL,NULL,1,12,1,NULL,NULL),(38,5,'Govt Titumir College,Dhaka',41,'2000','2',2,'First',NULL,NULL,1,12,1,NULL,NULL),(61,3,'nm',40,'2013','2',1,'5','5',NULL,1,20,2,NULL,NULL),(68,3,'w',51,NULL,'1',1,NULL,NULL,NULL,1,19,9,NULL,NULL),(84,62,'nm',87,'2009','2',1,'4','4',NULL,1,26,NULL,1,NULL),(85,17,'sadad',51,'2019','1',2,'5','6',NULL,1,6,9,NULL,NULL),(90,3,'St. Ritas High School',174,'2009','2',1,'4.19','5',NULL,1,29,2,NULL,NULL),(91,5,'Notre Dame College',36,'2011','2',1,'4.70','5',NULL,1,29,1,NULL,NULL),(92,10,'Independent University, Bangladesh',14,'2017','2',1,'2.69','4',NULL,1,29,NULL,1,NULL),(93,18,'Independent University, Bangladesh',NULL,NULL,'1',1,'4.49','4',NULL,1,29,NULL,1,NULL),(94,3,'Azimpur Girls High Scool',83,'1995','2',2,'First',NULL,NULL,1,30,1,NULL,NULL),(95,5,'University Womens\' Fedaration College',NULL,'1997','2',2,'First',NULL,NULL,1,30,1,NULL,NULL),(96,10,'Dhaka University',38,'2003','2',1,'3.49','4',NULL,1,30,NULL,2,NULL),(97,18,'Dhaka University',122,'2005','2',1,'3.5','4',NULL,1,30,NULL,2,NULL),(102,9,'University of Chittagong',181,'1984','2',3,'II',NULL,NULL,1,33,NULL,2,NULL),(103,11,'National University',NULL,'2006','2',2,'2nd',NULL,NULL,1,34,NULL,2,NULL),(104,6,'National University',5,'2003','2',2,'2nd',NULL,NULL,1,34,NULL,2,NULL),(105,5,'Chittagong Commerce College',83,'1999','2',2,'2nd',NULL,NULL,1,34,8,NULL,NULL),(106,3,'Chittagong Collegiate High School',174,'1997','2',2,'1st',NULL,NULL,1,34,8,NULL,NULL),(107,18,'Rajshahi University',55,'2008','2',1,'3.38','4',NULL,1,36,NULL,2,NULL),(108,10,'Rajshahi University',55,'2007','2',1,'3.45','4',NULL,1,36,NULL,2,NULL),(109,1,'Dhaka City College under National University',86,'2004','2',3,'First Class',NULL,NULL,1,12,NULL,1,NULL),(110,9,'Stamford University',87,'2013','2',1,'3.85','4',NULL,1,12,NULL,1,NULL),(111,67,'Anando Mohan University College',179,'2013','2',2,'2nd',NULL,NULL,1,35,NULL,2,NULL),(112,3,'Panjora Girl’s High School',1,'2008','2',1,'4.13','5.00',NULL,1,37,1,NULL,NULL),(113,5,'Tejgaon Mohila College',36,'2010','2',1,'4.30','5.00',NULL,1,37,1,NULL,NULL),(114,10,'Victoria University of Bangladesh',11,'2014','2',1,'3.91','4.00',NULL,1,37,NULL,1,NULL),(115,18,'Victoria University of Bangladesh',NULL,'2018','2',1,'3.63','4.00',NULL,1,37,NULL,1,NULL),(118,77,'Victoria University of Bangladesh',98,NULL,'1',1,NULL,NULL,NULL,1,37,NULL,1,NULL),(119,9,'ffsd',53,NULL,'1',1,'1','2',NULL,1,12,NULL,1,NULL);
/*!40000 ALTER TABLE `education` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `education` with 30 row(s)
--

--
-- Table structure for table `educationlevel`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `educationlevel` (
  `educationLevelId` int(11) NOT NULL AUTO_INCREMENT,
  `educationLevelName` varchar(128) DEFAULT NULL,
  `eduLvlUnder` tinyint(2) DEFAULT NULL COMMENT '1=Board ,2=University',
  `status` tinyint(3) DEFAULT NULL COMMENT '0=Inactive ,1=Active',
  PRIMARY KEY (`educationLevelId`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `educationlevel`
--

LOCK TABLES `educationlevel` WRITE;
/*!40000 ALTER TABLE `educationlevel` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `educationlevel` VALUES (1,'Secondary',1,1),(2,'Higher Secondary',1,1),(3,'Bachelor/ Honors',2,1),(4,'Masters',2,1),(5,'PhD (Doctor of Philosophy)',2,1),(6,'Diploma',1,1),(7,'asd',NULL,NULL),(8,'new test',2,0),(9,'Arabic',1,0),(10,'O level',1,0),(11,'A level',1,NULL),(12,'Dhakhil',1,NULL),(13,'Bachelor Administration(BA)',2,NULL),(14,'PSC/5 Pass',1,1),(15,'JSC/JDC/8 Pass',1,1);
/*!40000 ALTER TABLE `educationlevel` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `educationlevel` with 15 row(s)
--

--
-- Table structure for table `educationmajor`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `educationmajor` (
  `educationMajorId` int(11) NOT NULL AUTO_INCREMENT,
  `educationMajorName` varchar(255) DEFAULT NULL,
  `fkDegreeId` int(11) DEFAULT NULL,
  `status` tinyint(3) DEFAULT NULL COMMENT '0=Inactive ,1=Active',
  `type` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`educationMajorId`),
  KEY `fk_degree` (`fkDegreeId`),
  CONSTRAINT `fk_degree_id` FOREIGN KEY (`fkDegreeId`) REFERENCES `degree` (`degreeId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=198 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `educationmajor`
--

LOCK TABLES `educationmajor` WRITE;
/*!40000 ALTER TABLE `educationmajor` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `educationmajor` VALUES (1,'Humanities',3,1,NULL),(2,'Electronics',2,0,NULL),(3,'Computer Science',11,1,NULL),(4,'English',2,1,NULL),(5,'Accounting',6,1,NULL),(6,'Bangla',2,1,NULL),(7,'Physics',9,1,NULL),(8,'Agriculture',2,1,NULL),(9,'Accounting',7,1,NULL),(10,'Phychology',8,1,NULL),(11,'Finance',10,1,NULL),(12,'HR',10,1,NULL),(13,'Social Science',9,1,NULL),(14,'Accounting',10,1,NULL),(15,'Finance',10,0,NULL),(16,'Marketing',10,1,NULL),(17,'Others',1,1,NULL),(18,'HR',18,1,NULL),(19,'Population Sciences',8,1,NULL),(20,'Food and Nutrition',11,NULL,NULL),(21,'test Sub',2,0,NULL),(22,'HR',9,1,NULL),(23,'ssd',5,0,NULL),(24,'asasda',5,0,NULL),(25,'asd',5,0,NULL),(26,'vv',5,0,NULL),(27,'t',3,0,NULL),(28,'t',3,0,NULL),(29,'adsda',12,0,NULL),(30,'adsda',13,0,NULL),(31,'sub',14,1,NULL),(32,'wewe',15,0,NULL),(33,'sdf',16,1,NULL),(34,'major sub',17,1,NULL),(35,'Humanities',5,1,NULL),(36,'Business Studies/ Commerce',5,1,NULL),(37,'Science',5,1,NULL),(38,'Management',10,1,NULL),(39,NULL,20,1,NULL),(40,'Science',3,1,NULL),(41,'Science',5,1,NULL),(42,'Computer Science',1,1,NULL),(43,'Science',3,0,NULL),(44,'Science',5,1,NULL),(45,'Computer Science',22,1,NULL),(46,'ni9',23,1,NULL),(47,'Business Studies',13,1,NULL),(48,'Commerce',25,1,NULL),(49,'Business Studies',3,1,NULL),(50,'test by rumi',3,0,NULL),(51,'Accountancy',NULL,1,'g'),(52,'Association of Chartered Certified Accountants(ACCA)',NULL,1,'g'),(53,'Accounting',NULL,1,'g'),(54,'Accounting Information Systems',NULL,1,'g'),(55,'Accounting & Information System',NULL,1,'g'),(56,'Agriculture',NULL,1,'g'),(57,'Agro-technology',NULL,1,'g'),(58,'Animal Husbandry',NULL,1,'g'),(59,'Anthropology',NULL,1,'g'),(60,'Applied Chemistry',NULL,1,'g'),(61,'Applied Math',NULL,1,'g'),(62,'Applied Physics',NULL,1,'g'),(63,'Arabic',NULL,1,'g'),(64,'Archaeology',NULL,1,'g'),(65,'Architecture',NULL,1,'g'),(66,'Artificial Intelligence',NULL,1,'g'),(67,'Artificial Intelligence and Robotics',NULL,1,'g'),(68,'Arts',NULL,1,'g'),(69,'Banking ',NULL,1,'g'),(70,'Banking and Insurance',NULL,1,'g'),(71,'Bangali',NULL,1,'g'),(72,'Biochemistry',NULL,1,'g'),(73,'Biochemistry and Biotechnology',NULL,1,'g'),(74,'Biology',NULL,1,'g'),(75,'Biotechnology',NULL,1,'g'),(76,'Botany',NULL,1,'g'),(77,'Brand Management',NULL,1,'g'),(78,'BS in Electronic Media and Flim',NULL,1,'g'),(79,'Chemical Technology/ Engineering',NULL,1,'g'),(80,'Chemistry',NULL,1,'g'),(81,'Civil Engineering',NULL,1,'g'),(82,'Civil and Environmental Engineering',NULL,1,'g'),(83,'Commerce',NULL,1,'g'),(84,'Communication Engineering',NULL,1,'g'),(85,'Computer Applications',NULL,1,'g'),(86,'Computer Science',NULL,1,'g'),(87,'Computer Science & Engineering',NULL,1,'g'),(88,'Computer & Information',NULL,1,'g'),(89,'Computer & Information System',NULL,1,'g'),(90,'Cost & Management Accounting',NULL,1,'g'),(91,'Cost Accounting',NULL,1,'g'),(92,'Criminology',NULL,1,'g'),(93,'Development Studies',NULL,1,'g'),(94,'Disaster Management ',NULL,1,'g'),(95,'Disaster & Emergency Management',NULL,1,'g'),(96,'Economics',NULL,1,'g'),(97,'Education',NULL,1,'g'),(98,'Electrical and Electronics Engineering',NULL,1,'g'),(99,'Electronics',NULL,1,'g'),(100,'Electronics and Telecommunication Engineering',NULL,1,'g'),(101,'Emergency & Disaster Management ',NULL,1,'g'),(102,'English',NULL,1,'g'),(103,'Entrepreneurship',NULL,1,'g'),(104,'Environmnetal Planning',NULL,1,'g'),(105,'Environmental Science',NULL,1,'g'),(106,'Environmental Management',NULL,1,'g'),(107,'Environmental Science and Management',NULL,1,'g'),(108,'Flim and Media',NULL,1,'g'),(109,'Finance',10,0,'g'),(110,'Financing & Banking',NULL,1,'g'),(111,'Fine Arts',NULL,1,'g'),(112,'Fishers',NULL,1,'g'),(113,'Forestry',NULL,1,'g'),(114,'Genetics',NULL,1,'g'),(115,'Geography',NULL,1,'g'),(116,'Geography and Environment',NULL,1,'g'),(117,'Geology',NULL,1,'g'),(118,'Government & Politics',NULL,1,'g'),(119,'History',NULL,1,'g'),(120,'Horticulture',NULL,1,'g'),(121,'Hospitality Management',NULL,1,'g'),(122,'Human Resource Management',NULL,1,'g'),(123,'Industrial Management',NULL,1,'g'),(124,'Industrial Relations',NULL,1,'g'),(125,'Information and Communication Technology',NULL,1,'g'),(126,'Information Engineering',NULL,1,'g'),(127,'Information Technology',NULL,1,'g'),(128,'Insurance',NULL,1,'g'),(129,'International Business',NULL,1,'g'),(130,'International Relations',NULL,1,'g'),(131,'Islamic History and Culture',NULL,1,'g'),(132,'Islamic Studies',NULL,1,'g'),(133,'Journalism',NULL,1,'g'),(134,'Journalism for Electronic & Print Media',NULL,1,'g'),(135,'Journalism & Media Studies',NULL,1,'g'),(136,'Law',NULL,1,'g'),(137,'Linguistics',NULL,1,'g'),(138,'Machanical Engineering',NULL,1,'g'),(139,'Management',NULL,1,'g'),(140,'Management Information System',NULL,1,'g'),(141,'Management Studies/ Science',NULL,1,'g'),(142,'Marine Engineering',NULL,1,'g'),(143,'Marketing',NULL,1,'g'),(144,'Mass Communication and Journalism',NULL,1,'g'),(145,'Materials & Metallurgical Engineering',NULL,1,'g'),(146,'Mathematics',NULL,1,'g'),(147,'Medicine',NULL,1,'g'),(148,'Medicine and Surgery',NULL,1,'g'),(149,'Microbiology',NULL,1,'g'),(150,'Nautical Science',NULL,1,'g'),(151,'Naval Architecture and Marine Engineering',NULL,1,'g'),(152,'Nursing',NULL,1,'g'),(153,'Nuclear Engineering',NULL,1,'g'),(154,'Others',NULL,1,'g'),(155,'Personal Management',NULL,1,'g'),(156,'Petroleum and Mimeral Resource Engineering',NULL,1,'g'),(157,'Pharmaceutical Technology',NULL,1,'g'),(158,'Pharmacology',NULL,1,'g'),(159,'Pharmacy',NULL,1,'g'),(160,'Philosophy',NULL,1,'g'),(161,'Physics',NULL,1,'g'),(162,'Political Science',NULL,1,'g'),(163,'Professional Accountancy',NULL,1,'g'),(164,'Psuchology',NULL,1,'g'),(165,'Public Administration',NULL,1,'g'),(166,'Public Health',NULL,1,'g'),(167,'Public Policy & Governance',NULL,1,'g'),(168,'Public Relations',NULL,1,'g'),(169,'Robotics',NULL,1,'g'),(170,'Robotics Engineering',NULL,1,'g'),(171,'Robotics and Mechanical Engineering',NULL,1,'g'),(172,'Rural & Urban Planning',NULL,1,'g'),(173,'Sanskriti & Pali',NULL,1,'g'),(174,'Science',NULL,1,'g'),(175,'Service Marketing',NULL,1,'g'),(176,'Social Science',NULL,1,'g'),(177,'Social Welfare',NULL,1,'g'),(178,'Social Work',NULL,1,'g'),(179,'Sociology',NULL,1,'g'),(180,'Software Engineering',NULL,1,'g'),(181,'Statistics',NULL,1,'g'),(182,'Strategic Management',NULL,1,'g'),(183,'Supply Chain Management',NULL,1,'g'),(184,'Telecommunication',NULL,1,'g'),(185,'Telecommunication Engineering',NULL,1,'g'),(186,'Textile Technology',NULL,1,'g'),(187,'Theatre & Music',NULL,1,'g'),(188,'Tourism & Hotel Management',NULL,1,'g'),(189,'Urban & Persian',NULL,1,'g'),(190,'Veterinary Science',NULL,1,'g'),(191,'Water Resource Engineering',NULL,1,'g'),(192,'Woman Studies',NULL,1,'g'),(193,'World Relations',NULL,1,'g'),(194,'Zoology',NULL,1,'g'),(195,'Faltu',11,1,NULL),(196,'Electrical and Electronic Engineering, B.Sc.',9,NULL,NULL),(197,'Microbiology',9,NULL,NULL);
/*!40000 ALTER TABLE `educationmajor` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `educationmajor` with 197 row(s)
--

--
-- Table structure for table `empcomputerskill`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empcomputerskill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_empId` int(11) NOT NULL,
  `computerSkillId` int(11) NOT NULL,
  `SkillAchievement` tinyint(2) NOT NULL COMMENT '1=General,2=Advance',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empcomputerskill`
--

LOCK TABLES `empcomputerskill` WRITE;
/*!40000 ALTER TABLE `empcomputerskill` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `empcomputerskill` VALUES (11,12,2,1),(12,12,3,2),(13,12,1,1),(14,12,4,2),(26,20,1,1),(30,19,1,1),(40,26,1,1),(42,29,1,1),(43,29,2,2),(44,29,3,1),(45,29,5,2),(46,29,6,1),(47,30,2,1),(50,6,9,1),(51,6,8,2),(52,6,3,1),(55,33,1,1),(56,33,2,1),(57,33,3,1),(58,34,2,1),(59,34,3,1),(60,34,1,1),(61,34,2,1),(62,34,3,1),(63,34,1,1),(64,36,3,2),(65,36,2,1),(66,35,2,2),(67,35,3,1),(68,35,5,2),(69,37,2,1),(70,37,1,1);
/*!40000 ALTER TABLE `empcomputerskill` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `empcomputerskill` with 32 row(s)
--

--
-- Table structure for table `employee`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employee` (
  `employeeId` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(50) DEFAULT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `fathersName` varchar(50) DEFAULT NULL,
  `mothersName` varchar(50) DEFAULT NULL,
  `dateOfBirth` date DEFAULT NULL,
  `gender` varchar(3) DEFAULT NULL,
  `employeecol1` varchar(45) DEFAULT NULL,
  `fkreligionId` int(11) NOT NULL,
  `ethnicityId` int(11) NOT NULL,
  `disability` varchar(2) DEFAULT NULL COMMENT 'Y=yes, N= no',
  `fknationalityId` int(11) NOT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `homeNumber` varchar(20) DEFAULT NULL,
  `officeNumber` varchar(20) DEFAULT NULL,
  `personalMobile` varchar(20) DEFAULT NULL,
  `alternativePhoneNo` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `nationalId` varchar(25) DEFAULT NULL,
  `birthID` varchar(25) DEFAULT NULL,
  `skype` varchar(255) DEFAULT NULL,
  `alternativeEmail` varchar(255) DEFAULT NULL,
  `presentAddress` mediumtext DEFAULT NULL,
  `parmanentAddress` mediumtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `sign` varchar(255) DEFAULT NULL,
  `fkzoneId` int(11) DEFAULT NULL,
  `fkuserId` int(11) NOT NULL,
  `cvStatus` int(11) DEFAULT NULL,
  `cvCompletedDate` date DEFAULT NULL,
  `relativeInCB` int(3) DEFAULT 0,
  `hasProfCertificate` tinyint(2) DEFAULT NULL COMMENT '0=no,1=yes',
  `hasTrainingInfo` tinyint(2) DEFAULT NULL COMMENT '0=no,1=yes',
  `bloodGroup` varchar(5) DEFAULT NULL,
  `maritalStatus` varchar(15) DEFAULT NULL,
  `spouse` varchar(100) DEFAULT NULL,
  `passport` varchar(15) DEFAULT NULL,
  `hasJobExp` tinyint(2) DEFAULT NULL COMMENT '0=no,1=yes',
  `hasOtherSkill` tinyint(2) DEFAULT NULL COMMENT '0=no,1=yes',
  `hasWorkedInCB` tinyint(2) DEFAULT NULL COMMENT '0=no,1=yes',
  PRIMARY KEY (`employeeId`),
  KEY `fk_employee_religion1_idx` (`fkreligionId`),
  KEY `fk_employee_nationality1_idx` (`fknationalityId`),
  KEY `fk_employee_zone1_idx` (`fkzoneId`),
  KEY `fk_employee_user1_idx` (`fkuserId`),
  KEY `fk_ethnicity` (`ethnicityId`) USING BTREE,
  CONSTRAINT `fk_employee_ethincity` FOREIGN KEY (`ethnicityId`) REFERENCES `ethnicity` (`ethnicityId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_employee_nationality1` FOREIGN KEY (`fknationalityId`) REFERENCES `nationality` (`nationalityId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_employee_religion1` FOREIGN KEY (`fkreligionId`) REFERENCES `religion` (`religionId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_employee_user1` FOREIGN KEY (`fkuserId`) REFERENCES `user` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_employee_zone1` FOREIGN KEY (`fkzoneId`) REFERENCES `zone` (`zoneId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `employee` VALUES (6,'MD . MUJTABA','RUMI','Alauddin','Nasrin','1994-12-30','M',NULL,1,1,'N',1,'01680674598',NULL,NULL,'01680674598456',NULL,'mujtaba.rumi1@gmail.com',NULL,'15','mujtaba_rumi','mujtaba.rumi1@gmail.com','Shewrapara , Mirpur','Shewrapara , Mirpur','6cvImage.jpg','6cvSign.jpg',NULL,6,1,'2019-07-06',0,1,1,'o+','s','MD . MUJTABA RAFID RUMI',NULL,1,1,1),(12,'ASM','Kamruzzaman','MD.YOUSUF ALI','ARZINA BEGUM','1982-12-15','M',NULL,1,1,'N',1,'48315406','88028190090','48315408','01730055264','01955590012','shaheen@caritasbd.org','3268198433',NULL,'A.S.M.Kamruzzaman','xpshaheen@hotmail.com','H#19/C, Block#C, R#3,Monsurabad R/A,Adabor, Dhaka. Bangladesh','Vill:Nekmord, Dist: Thakurgaon.','12cvImage.JPG','12cvSign.JPG',NULL,16,1,'2019-06-26',0,1,1,'o+','s','Rebaka Sharmin','12356789',1,1,1),(19,'Rafed','UZ Zaman','MM','FF','1983-01-01','M',NULL,1,1,'N',1,'017300055268','019555900123456','8315401','019555900123456','0012458715265','radu@caritasbd.org','BD555DF888812121323412313',NULL,'radu.it.bd',NULL,'Dhaka , Jurain , Dhaka Bangladesh','Dhaka , Jurain , Dhaka Bangladesh',NULL,NULL,NULL,28,1,'2019-04-10',0,NULL,1,'a+','m','WFFF','VF2312',1,NULL,0),(20,'shraboni','s','m','so','2000-03-11','F',NULL,1,1,'N',1,NULL,'04','01','00000000000','02','admin@gmail.com','55555555555555',NULL,'sssssssssss','shrabonishormin11@gmail.com','fvjhnm','hguyhjk',NULL,NULL,NULL,30,1,'2019-03-27',0,1,1,'o+','s',NULL,NULL,NULL,NULL,0),(26,'shraboni','Shaila','m','so','1995-08-26','F',NULL,1,1,'N',1,NULL,NULL,NULL,'00000000000',NULL,'client3@gmail.com','55555555555555',NULL,NULL,NULL,'agargaon','agargaon',NULL,NULL,NULL,38,1,'2019-05-07',0,1,1,'o+','s',NULL,NULL,1,1,1),(29,'Shaon','Rozario','Late- Swapon Rozario','Smrity Perera','1993-09-25','M',NULL,2,1,'N',1,'01716324813','01723774477',NULL,'01679092055','01679092055','louisrozario1993@gmail.com','1993805455256',NULL,'Shaon Rozario','Louisrozario1993@gmail.com','Address: 106/17, MONIPURIPARA, TEJGAON, DHAKA-1215','vill. Vadra, P.O. mothurapur, TH.chatmohar, Dis. pabna','29cvImage.jpg','29cvSign.jpg',NULL,41,1,'2019-05-15',0,NULL,1,'a+','s',NULL,NULL,1,1,0),(30,'Anita','rozario','Milom Remeigius Rozario','Chaya Rozario','1980-10-27','F',NULL,2,1,'Y',1,'01713384003',NULL,NULL,'01716436326',NULL,'anita@caritasbd.org','0191991777663636',NULL,'anita.margaret1','anita12_bd@yahoo.com','143 Tejkunipara, Tejgaon Dhaka','Village Charokhola, Post Office and Thana:Kaligonj, District: Gazipur','30cvImage.png','30cvSign.jpg',NULL,43,1,'2019-05-17',1,1,1,'o+','s',NULL,'Dfa44444',1,NULL,0),(32,'Sukumar','Corraya','Anil Corraya','Tereja Gomes','1987-02-16','M',NULL,2,1,'N',1,NULL,NULL,NULL,'01724802006',NULL,'sukumarcorraya@gmail.com','5543693658',NULL,NULL,'sukumar_corraya@caritasbd.org','2, Outer Circular Road, Shantibagh, Dhaka-1217','Shogrampur, Jonail, Baraigram, Natore','32cvImage.png',NULL,NULL,45,NULL,NULL,0,NULL,NULL,'b+','m','Lucky Baroi','BF0969906',NULL,NULL,NULL),(33,'Mohammed Mamunur','Rashid','Serajul Hoque','Afia Khatun','1962-06-25','M',NULL,1,1,'N',1,NULL,NULL,'48315405','01955590054',NULL,'mamun@caritasbd.org',NULL,'19621926707047843','mamunur_rashid1962','mamun_ridi@yahoo.com','Mohammed Mamunur Rashid\r\nSenior Manager\r\nPlanning, Monitoring & Quality (PMQ)\r\nCARITAS Bangladesh\r\n2, Outer Circular Road\r\nShantibagh\r\nDhaka-1217\r\nBangladesh','Village				: Shialora\r\nPost Office			: Dhanishwar \r\nUpazila				: Barura\r\nDistrict				: Comilla\r\nCountry				: Bangladesh',NULL,NULL,NULL,47,1,'2019-06-09',0,1,1,'o+','w','Nasima Akhter','BP0682551',1,NULL,0),(34,'MUHAMMAD','ISMAIL HOSSAIN','Late; Md. Abdul Jalil','Late; Mrs. Jannatul Fardous','1981-02-08','M',NULL,1,1,'N',1,NULL,NULL,NULL,'01716274719',NULL,'ismail223hossain@gmail.com','7513638895212',NULL,NULL,'ismail_hossain@caritasbd.org','123/1, Shahida Monzil, Ac Mosjid goli, \r\nShantibag,  Shahjahanpur, Dhaka-1217','1389, D.T. Road, weast Madarbari, Chattogram Bandar, Chattogram Sadar, Chattogram 4100','34cvImage.jpg','34cvSign.jpg',NULL,49,1,'2019-06-13',0,NULL,1,'o+','m','Afroza Sultana',NULL,1,NULL,1),(35,'Krishna','Drong','Narayan Sarker','Shashoty Drong','1990-03-01','F',NULL,2,2,'N',1,NULL,NULL,NULL,'01980008210','01717785868','krishna_drong@caritasbd.org','123456789',NULL,NULL,NULL,'Gulsan, Dhaka-1212','Songra, Haluaghat, Mymensingh',NULL,NULL,NULL,48,1,'2019-06-18',0,NULL,1,'o+','m',NULL,NULL,NULL,NULL,1),(36,'Joshim','Uddin','Md. Nurul Islam','Sufia khatun','1986-07-04','M',NULL,1,1,'N',1,NULL,NULL,NULL,'01929695145',NULL,'sagoraisru8@gmail.com','19861823101301503',NULL,NULL,NULL,'House No. 356/357 (1st Floor, Right side, Near to Iqbal Road)  West Shewrapara, Peerarbagh Road, Mirpur, Dhaka-1216.',':  Vill.-Dakhin chandpur, P.O. -Darsana-7221 P. S. -Damurhuda, Dist. -Chuadanga.','36cvImage.jpg','36cvSign.jpg',NULL,51,1,'2019-06-16',0,1,1,'b+','m','Ms. Hafiza khatun',NULL,1,NULL,0),(37,'Renex Maria','Rozario','Philip Rozario','Prova  Rozario','1993-04-28','F',NULL,2,1,'N',1,NULL,NULL,NULL,'01766388219',NULL,'renexmaria1993@gmail.com',NULL,NULL,NULL,'renex_Rozario@caritasbd.org','Natun Bazar, Vatara','Vill: Daripara, P.O & P.S:  Kaligonj','37cvImage.jpg','37cvSign.jpg',NULL,53,1,'2019-07-03',0,NULL,1,'a+','m',NULL,'AB199350',1,NULL,1);
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `employee` with 13 row(s)
--

--
-- Table structure for table `employmenttype`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employmenttype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `typeName` varchar(100) DEFAULT NULL,
  `status` tinyint(2) DEFAULT NULL COMMENT '0=inactive,1=active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employmenttype`
--

LOCK TABLES `employmenttype` WRITE;
/*!40000 ALTER TABLE `employmenttype` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `employmenttype` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `employmenttype` with 0 row(s)
--

--
-- Table structure for table `emp_language`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emp_language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fklanguageSkill` int(11) NOT NULL,
  `fkemployeeId` int(11) NOT NULL,
  `fklanguageHead` int(3) NOT NULL,
  `rate` varchar(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fkemployeeId_languageskill` (`fkemployeeId`),
  KEY `fklangguage_skill` (`fklanguageSkill`),
  CONSTRAINT `fkemployeeId_languageskill` FOREIGN KEY (`fkemployeeId`) REFERENCES `employee` (`employeeId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fklangguage_skill` FOREIGN KEY (`fklanguageSkill`) REFERENCES `languageskill` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=193 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emp_language`
--

LOCK TABLES `emp_language` WRITE;
/*!40000 ALTER TABLE `emp_language` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `emp_language` VALUES (5,1,6,1,'27'),(6,2,6,1,'49'),(7,3,6,1,'20'),(8,7,6,1,'55'),(37,1,12,2,'75'),(38,2,12,2,'70'),(39,3,12,2,'70'),(40,7,12,2,'70'),(41,1,12,1,'97'),(42,2,12,1,'78'),(43,3,12,1,'85'),(44,7,12,1,'100'),(77,1,20,1,'15'),(78,2,20,1,'22'),(79,3,20,1,'28'),(80,7,20,1,'25'),(89,1,19,2,'0'),(90,2,19,2,'0'),(91,3,19,2,'0'),(92,7,19,2,'0'),(121,1,26,1,'37'),(122,2,26,1,'100'),(123,3,26,1,'100'),(124,7,26,1,'91'),(125,1,26,2,'100'),(126,2,26,2,'100'),(127,3,26,2,'100'),(128,7,26,2,'84'),(137,1,29,1,'100'),(138,2,29,1,'100'),(139,3,29,1,'100'),(140,7,29,1,'100'),(141,1,29,2,'100'),(142,2,29,2,'100'),(143,3,29,2,'100'),(144,7,29,2,'100'),(145,1,29,4,'11'),(146,2,29,4,'12'),(147,3,29,4,'13'),(148,7,29,4,'13'),(149,1,30,2,'78'),(150,2,30,2,'73'),(151,3,30,2,'42'),(152,7,30,2,'52'),(161,1,33,1,'100'),(162,2,33,1,'100'),(163,3,33,1,'100'),(164,7,33,1,'100'),(165,1,33,2,'100'),(166,2,33,2,'100'),(167,3,33,2,'100'),(168,7,33,2,'100'),(169,1,34,2,'86'),(170,2,34,2,'58'),(171,3,34,2,'57'),(172,7,34,2,'53'),(173,1,36,1,'100'),(174,2,36,1,'100'),(175,3,36,1,'100'),(176,7,36,1,'100'),(177,1,36,2,'90'),(178,2,36,2,'90'),(179,3,36,2,'85'),(180,7,36,2,'90'),(181,1,35,1,'100'),(182,2,35,1,'100'),(183,3,35,1,'100'),(184,7,35,1,'100'),(185,1,35,2,'100'),(186,2,35,2,'100'),(187,3,35,2,'100'),(188,7,35,2,'100'),(189,1,37,2,'59'),(190,2,37,2,'45'),(191,3,37,2,'55'),(192,7,37,2,'43');
/*!40000 ALTER TABLE `emp_language` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `emp_language` with 76 row(s)
--

--
-- Table structure for table `emp_otherskill_achievement`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emp_otherskill_achievement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `otherSkillId` int(11) NOT NULL,
  `fkemployeeId` int(11) NOT NULL,
  `ratiing` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emp_otherskill_achievement`
--

LOCK TABLES `emp_otherskill_achievement` WRITE;
/*!40000 ALTER TABLE `emp_otherskill_achievement` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `emp_otherskill_achievement` VALUES (9,6,12,79),(10,5,12,57),(11,7,12,75),(21,1,6,26),(22,2,6,20),(30,4,26,42),(32,11,29,51);
/*!40000 ALTER TABLE `emp_otherskill_achievement` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `emp_otherskill_achievement` with 7 row(s)
--

--
-- Table structure for table `emp_other_info`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emp_other_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `extraCurricularActivities` varchar(2500) DEFAULT NULL,
  `interests` varchar(2500) DEFAULT NULL,
  `awardReceived` varchar(2500) DEFAULT NULL,
  `researchPublication` varchar(2500) DEFAULT NULL,
  `fk_empId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emp_other_info`
--

LOCK TABLES `emp_other_info` WRITE;
/*!40000 ALTER TABLE `emp_other_info` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `emp_other_info` VALUES (2,'yfy','hjfvh','jhcv','vh',6),(7,'Sporting Skills: Internal College Competition-2005 achieved “First Place” in Chess and Keram Board.\r\nDebate Competition ’96: Had a good place in Debate Competition ’96.','Internet surfing, Learn Tips and tricks.','Achieved Vice Chancellor’s Gold Medal in M.Sc. In Computer Science and Engineering','N/A',12),(14,'jiio','hnb','gbhj','hg',20),(16,'asd','dsada','asdasdas','asdasd',19),(21,NULL,NULL,NULL,NULL,26),(23,'Participate General knowledge competition','Playing cricket and hadudu','N/A','Research on working capital management for 5 banks growth, capital etc',29),(24,NULL,'Modeling','10 Years Long Service Award','Publication in Weekly Pratibeshi',30),(26,NULL,NULL,NULL,NULL,33),(27,NULL,'Traveling',NULL,NULL,34),(28,'1. Member of Bangladesh national cadet core (BNCC), Rajshahi University Branch. \r\n2.	Participate in various musical programs for singing song.','? 	 To work as a Chief Executive Officer (CEO) at any reputed organization. \r\n? 	 Participate in social works, reading newspaper and watching cricket. \r\n ? 	 Find out solution by using Internet is also my favorite hobby.','Full free studentship in BBA Program.',NULL,36),(29,NULL,NULL,NULL,NULL,35),(30,'Involved with Rural Youth Club','Traveling, Browsing Internet','N/A','N/A',37);
/*!40000 ALTER TABLE `emp_other_info` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `emp_other_info` with 12 row(s)
--

--
-- Table structure for table `emp_ques_obj`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emp_ques_obj` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `objective` varchar(2500) DEFAULT NULL,
  `empId` int(11) NOT NULL,
  `currentSalary` varchar(45) DEFAULT NULL,
  `expectedSalary` varchar(45) DEFAULT NULL,
  `readyToJoinAfter` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_emp_Id` (`empId`),
  CONSTRAINT `fkEmpId` FOREIGN KEY (`empId`) REFERENCES `employee` (`employeeId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emp_ques_obj`
--

LOCK TABLES `emp_ques_obj` WRITE;
/*!40000 ALTER TABLE `emp_ques_obj` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `emp_ques_obj` VALUES (10,'A team leader of ICT with more than ten years of experience in IT sector. Currently serves as  Manager - ICT for a reputed NGO in Bangladesh named \"Caritas Bangladesh\". I am an experienced and motivated, accomplished in delivering secure resilient systems on time and budget to meet organizational needs. I’m an adaptable and efficient team player of an organization with excellent communication skills at all levels. I’m looking for a role where I can develop my skills further, researching new technologies and reveling in new challenges as well as good opportunities to develop a strong IT team with excellent working environment. Previously worked as a Network and System Engineer with Doreen Attire Limited, sister concern of Siddique Group of Industries.',12,'83000','100000','2019-07-01'),(16,'dfgdfgfdgdfg',6,'12354','5000','2019-03-01'),(18,'DhakaDhakaDhakaDhakaDhakaDhakaDhakaDhakaDhakaDhakaDhakaDhakaDhakaDhakaDhakaDhakaDhakaDhakaDhakaDhakaDhakaDhakaDhakaDhakaDhakaDhakaDhakaDhakaDhakaDhakasssssssssssssssssssssssssssss',19,'0000','100000','2019-04-01'),(19,'gfgvjhklu8ioji',20,NULL,'20000','2019-03-03'),(25,'mjiygy',26,'20000','30000','2019-02-04'),(27,'To establish a progressive career in a reputed organization that provides an opportunity to capitalize my acquired knowledge, skills, and abilities in the working area.',29,'12000','30000','2019-05-31'),(28,'I want to provide my service for the people in need through a work environment where I will be able to use my knowledge, skill etc.',30,NULL,'200000','0000-00-00'),(30,'To pursue my career in a reputed organization where I would be able to explore my capabilities and gradually enhance my knowledge, skills and abilities to perform my duties and responsibilities effectively & efficiently and accordingly add value to the organization.',32,'29200','75000','2019-07-01'),(31,'Presently I am holding the position of Senior Manager (Planning, Monitoring and Quality) and Head of the Planning, Monitoring & Evaluation (PME) of Caritas Bangladesh, which is a senior management position. CARITAS Bangladesh is a Bangladeshi national, non-profitable development organization and member of Caritas Internationalies. As a Head of Planning, Monitoring & Evaluation, I am privileged with the access to all steps of development work, from policy building to full cycle of the project operation and management. Besides planning, monitoring & evaluation of the projects, I am also involved with social research and innovation, strategic planning, project need assessment, preparation of project implementation strategy, etc. of Caritas Bangladesh. This position helped me to involve in project formulation, monitoring and evaluation of the projects of Caritas Bangladesh.',33,NULL,'200000','2019-07-01'),(32,'To be an asset to the organization and excel in all pursuits, contribute to company’s growth by meeting goals, resulting in individual growth.',34,NULL,'50000','2019-08-01'),(33,'As a target oriented, creative, dynamic & professional person I want to establish my career in a challenging and dignified position at an organization where creativity, sincerity, skill and performance are the criteria for one’s appraisal. To seek a responsible position in the Accounts/Finance/Internal Audit/Cost & Budget division of an organization where I can apply my knowledge & training that I have acquired through my educational and professional experience with reputed organizations from time to time.',36,NULL,'70000','2019-06-01'),(34,'Building up a career in a challenging and rewarding as a social worker at a winning organization where creativity, sincerity, skill and performance are the criteria for one’s appraisal and recognition.',35,'70000','100000','2019-07-01'),(35,'I am looking for a career where I can make a real impression, where I will discover how valued I can be. I always want a career that could take me to the top, or simply take me in an exciting new direction & achieve success through honesty and hard work.',37,NULL,'40000','2019-07-31');
/*!40000 ALTER TABLE `emp_ques_obj` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `emp_ques_obj` with 13 row(s)
--

--
-- Table structure for table `emp_ques_objective_and_info`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emp_ques_objective_and_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ques` varchar(255) DEFAULT NULL,
  `serial` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1=Active,0=inActive',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emp_ques_objective_and_info`
--

LOCK TABLES `emp_ques_objective_and_info` WRITE;
/*!40000 ALTER TABLE `emp_ques_objective_and_info` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `emp_ques_objective_and_info` VALUES (1,'test1',3,0),(2,'Why are you leaving your present job?',1,1),(3,'Why are you interested to work in Caritas Bangladesh?',2,1);
/*!40000 ALTER TABLE `emp_ques_objective_and_info` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `emp_ques_objective_and_info` with 3 row(s)
--

--
-- Table structure for table `emp_ques_objective_and_info_ans`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emp_ques_objective_and_info_ans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ans` longtext NOT NULL,
  `fkqusId` int(11) NOT NULL,
  `fkemployeeId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fkqusId` (`fkqusId`,`fkemployeeId`),
  KEY `fk_qus_employee_id` (`fkemployeeId`),
  CONSTRAINT `fk_qus_ans` FOREIGN KEY (`fkqusId`) REFERENCES `emp_ques_objective_and_info` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_qus_employee_id` FOREIGN KEY (`fkemployeeId`) REFERENCES `employee` (`employeeId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emp_ques_objective_and_info_ans`
--

LOCK TABLES `emp_ques_objective_and_info_ans` WRITE;
/*!40000 ALTER TABLE `emp_ques_objective_and_info_ans` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `emp_ques_objective_and_info_ans` VALUES (3,'NA',3,12),(4,'Career Growth',2,12),(7,'no reason',2,19),(8,'better',3,19),(9,'dfd',2,6),(10,'gdf',3,6),(11,'for better opportunity',2,26),(12,'its good',3,26),(15,'Low salary and less opportunity for make better carrier',2,29),(16,'World wide reputed NGO',3,29),(19,'For better future',2,32),(20,'sdffsd',3,32),(21,'I am looking for better career prospects, professional growth and work opportunities. I want a change in career direction. I am looking for new challenges at work.',2,35),(22,'Your organization\'s reputation is stellar. Former colleagues of mine work here, and I\'ve seen how much they value the organization\'s willingness to let employees pitch big ideas and have an active leadership role in new initiatives.',3,35);
/*!40000 ALTER TABLE `emp_ques_objective_and_info_ans` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `emp_ques_objective_and_info_ans` with 14 row(s)
--

--
-- Table structure for table `ethnicity`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ethnicity` (
  `ethnicityId` int(11) NOT NULL AUTO_INCREMENT,
  `ethnicityName` varchar(50) DEFAULT NULL,
  `status` tinyint(3) DEFAULT NULL COMMENT '0=Inactive ,1=Active',
  PRIMARY KEY (`ethnicityId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ethnicity`
--

LOCK TABLES `ethnicity` WRITE;
/*!40000 ALTER TABLE `ethnicity` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `ethnicity` VALUES (1,'Bangali',1),(2,'Adibashi',1),(3,'Others',1);
/*!40000 ALTER TABLE `ethnicity` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `ethnicity` with 3 row(s)
--

--
-- Table structure for table `hr`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hr` (
  `hrId` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(45) DEFAULT NULL,
  `lastName` varchar(45) DEFAULT NULL,
  `fkdesignationId` int(11) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `fkuserId` int(11) DEFAULT NULL,
  `fkzoneId` int(11) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`hrId`),
  KEY `fk_HR_user1_idx` (`fkuserId`),
  KEY `fk_HR_zone1_idx` (`fkzoneId`),
  KEY `fk_hr_degisnation1` (`fkdesignationId`),
  CONSTRAINT `fk_hr_degisnation1` FOREIGN KEY (`fkdesignationId`) REFERENCES `designation` (`designationId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_hr_user1` FOREIGN KEY (`fkuserId`) REFERENCES `user` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_hr_zone1` FOREIGN KEY (`fkzoneId`) REFERENCES `zone` (`zoneId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hr`
--

LOCK TABLES `hr` WRITE;
/*!40000 ALTER TABLE `hr` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `hr` VALUES (1,'Askinayon','Sangma',6,'noyon@gmail.com','admin@gmail.com','iojuo[uo[uj[\'oo',9,4,'M',1,'2019-01-24 03:40:37'),(2,'MD . MUJTABA','RUMI',10,'rumi@gmail.com','01680674598','Shewrapara , Mirpur',24,4,'M',0,'2019-03-12 11:39:43'),(3,'MD . MUJTABA','RUMI',10,'rumi123@gmail.com','01680674598','Shewrapara , Mirpur',25,4,'M',1,'2019-03-12 11:40:19'),(4,'MD . MUJTABA','RUMI',9,'admin1234@gmail.com','01680674598','Shewrapara , Mirpur',26,4,'M',1,'2019-03-13 08:28:10'),(5,'Shaon','Rozario',7,'shaon_rozario@caritasbd.org','01766388219','Dhaka',32,10,'M',1,'2019-04-01 04:22:59');
/*!40000 ALTER TABLE `hr` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `hr` with 5 row(s)
--

--
-- Table structure for table `job`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job` (
  `jobId` int(11) NOT NULL AUTO_INCREMENT,
  `title` mediumtext DEFAULT NULL,
  `position` mediumtext DEFAULT NULL,
  `salary` varchar(45) DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `details` longtext DEFAULT NULL,
  `status` tinyint(3) DEFAULT NULL COMMENT '1=posted,2=deavtive,0=deleted',
  `jobstatus` tinyint(3) DEFAULT NULL COMMENT '1=Full time , 2=part time',
  `postBy` int(11) DEFAULT NULL,
  `postDate` datetime DEFAULT NULL,
  `createBy` int(11) NOT NULL,
  `createDate` datetime DEFAULT NULL,
  `fkzoneId` int(11) NOT NULL,
  `updateBy` int(11) NOT NULL,
  `updateTime` datetime DEFAULT NULL,
  `pdflink` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`jobId`),
  KEY `fk_job_user1_idx` (`postBy`),
  KEY `fk_job_user2_idx` (`createBy`),
  KEY `fk_job_zone1_idx` (`fkzoneId`),
  KEY `fk_job_user3_idx` (`updateBy`),
  CONSTRAINT `fk_job_user1` FOREIGN KEY (`postBy`) REFERENCES `user` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_job_user2` FOREIGN KEY (`createBy`) REFERENCES `user` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_job_user3` FOREIGN KEY (`updateBy`) REFERENCES `user` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_job_zone1` FOREIGN KEY (`fkzoneId`) REFERENCES `zone` (`zoneId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job`
--

LOCK TABLES `job` WRITE;
/*!40000 ALTER TABLE `job` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `job` VALUES (1,'test job-1','Hr','5000','2018-08-23',NULL,0,2,6,'2018-09-04 06:44:05',6,'2018-08-13 00:00:00',1,6,'2018-09-27 08:17:58','1jobPdf.pdf'),(2,'test job-2','Hr','100000','2018-08-14','asdasdasdasdasdwewads',0,2,6,'2018-08-13 00:00:00',6,'2018-08-13 00:00:00',1,6,'2018-08-13 00:00:00',NULL),(3,'test','test','456456','2018-09-27','test',0,1,6,'2018-09-04 11:40:58',6,'2018-09-04 09:08:30',1,6,'2018-09-04 11:40:58','3jobPdf.pdf'),(5,'test another job','asdasd','1500','2018-09-29',NULL,0,1,6,'2018-09-29 00:00:00',6,'2018-09-27 08:24:31',1,6,'2018-09-27 08:24:31',NULL),(6,'Accounts Officer','JPO','20000','2019-05-11',NULL,0,2,1,'2018-10-03 05:53:53',1,'2018-10-03 05:53:53',4,1,'2019-03-19 05:57:21','6jobPdf.pdf'),(7,'Protection for Rohingya Children through','Protection Officer','65000','2019-02-28','Caritas Bangladesh (CB) is looking for suitable candidates (men and women) for immediate\r\nappointment as well as to prepare panel list for Protection for Rohingya Children through\r\nChild Friendly Spaces Project (CFS) and Protection, Empowerment & Resilience for the\r\nRohingya Community Women project (WFS).',0,2,1,'2018-10-11 03:48:20',1,'2018-10-11 03:48:20',4,1,'2019-02-11 04:16:19','7jobPdf.pdf'),(8,'Project Coordinator','Managerial Position','60000','2019-02-28','Major responsibilities: Oversees the psycho-social and Case\r\nManagement services and support in the\r\nWomen Friendly Space (WFS). She/he\r\nwill oversee individual (through the case\r\nmanagement process) and group-based\r\npsycho-social activities for survivors of\r\nGBV. She/he will also oversee\r\ninformation collection and advocacy\r\nrelated to GBV and health gaps and\r\nservices. This position supervises overall\r\nactivities along with the Project Officers,\r\nGBV Case Workers and activities carried\r\nout in safe spaces.\r\n? Report to: To Protection\r\nManager\r\n? Manages: Overall activities of\r\nWomen Friendly Spaces (WFS)\r\n? Duty Station: Ukhiya, Cox`s\r\nBazar\r\nJob Description / Responsibility\r\n? Maintain and manage all\r\nactivities related to the project at\r\nfield level.\r\n? Supervise and monitor the\r\nactivities of all WFS.\r\n? Supervise and monitor the staff\r\n? Report to authority time to time\r\nand as per need.\r\n? Arrange Training and meeting as\r\nper plan and instruction.\r\n? Prepare plan and implement the\r\nactivities as per plan.\r\n? Build good and friendly\r\nrelationship among the staff and\r\ncommunity.\r\n? Maintaining liaison and\r\ncommunication with Local\r\nmanagement, Government and\r\nNGO related sectors.\r\n? Ensure delivery of reports to\r\ndonor in timely manner.\r\n? To analysis the contacts and\r\nchallenges and take prompt\r\ninitiatives to troubleshoot.\r\n? Regularly attend site\r\nmanagement meeting and GBV\r\nsector meeting\r\n? Frequently communicate with\r\nkey stakeholders',0,1,NULL,NULL,1,'2018-10-11 03:52:29',5,1,'2019-02-11 04:15:30','8jobPdf.pdf'),(9,'Accounts and Logistic','Mid level','50000','2019-02-28','Job Requirements:\r\n? M.Com/MBA from any\r\nrecognized university.\r\n? Minimum 3 years working\r\nexperience in the similar job\r\nin any reputed\r\norganizations.\r\n? Should be self driven and\r\npositive to work in a team.\r\n? Strong verbal and written\r\nEnglish communication\r\nskills.\r\n? Knowledge on local\r\nlanguage will be given\r\npreference.',0,2,1,'2018-10-11 03:55:36',1,'2018-10-11 03:55:36',8,1,'2019-02-11 04:14:48','9jobPdf.doc'),(10,'Project Coordinator','Protection Officer','20000','2019-06-08','azsxdvghjkl;',0,1,1,'2019-01-20 10:23:02',1,'2019-01-20 10:23:02',9,1,'2019-03-19 05:56:06','10jobPdf.pdf'),(11,'Lokking for Dynamic Manager-ICT','Manager-ICT','100000','2019-04-30','Read more',0,2,1,'2019-01-24 10:25:14',1,'2019-01-24 10:25:14',4,1,'2019-03-19 05:55:33','11jobPdf.pdf'),(12,'shaheen-test-12end','HHH','10000','2019-03-11','more',0,2,1,'2019-03-11 10:52:48',1,'2019-03-11 10:52:48',4,1,'2019-03-27 05:25:41','12jobPdf.pdf'),(13,'Senior Accounts Officer','Senior Accounts Officer','100000','2019-05-31','1) Position: Senior Accounts Officer\r\nAge: 25 - 45 years (as on 31/10/2018)\r\nSalary Range: Tk. 50,000 - 60,000 (consolidated) per month depending on the experience and qualifications during the probationary period. \r\nReporting to:\r\nManager (Accounts)\r\n\r\nJob location: The position is based in Dhaka but field visit at Regional, Project and Field Offices is required.',0,2,1,'2019-04-01 03:58:12',1,'2019-04-01 03:58:12',10,1,'2019-05-15 02:52:30','13jobPdf.pdf'),(14,'Facilitator- Market Access & Community Mobilization','Mid level','16000','2019-05-31','Age: Maximum 45 years\r\n\r\nJob Location:\r\nThanchi/Alikadam/ Naikhongchari, Chittagong Hill Tracts, Bangladesh\r\n\r\nThe successful candidate will work in any of  3selected Upazilas\r\n\r\nSalary: 16000.00 (Consolidated)\r\n\r\nNo. of Position: 3',0,2,1,'2019-04-01 04:19:12',1,'2019-04-01 04:19:12',11,1,'2019-05-15 02:52:18','14jobPdf.pdf'),(15,'Facilitator-Nutrition & WASH','Facilitator-Nutrition & WASH','16000','2019-05-31','Facilitator-Nutrition & WASH \r\n\r\nAge: Maximum 45 years\r\n\r\nJob Location:\r\nThanchi/Alikadam/ Naikhongchari, Chittagong Hill Tracts, Bangladesh\r\n\r\nThe successful candidate will work in any of  3selected Upazilas\r\n\r\nSalary: 16,000.00 (Consolidated)\r\n\r\nNo. of Position: 3',0,2,1,'2019-04-01 04:20:34',1,'2019-04-01 04:20:34',6,1,'2019-05-15 02:44:08','15jobPdf.pdf'),(16,'Project Manager','Project Manager','55000','2019-05-31','Project Manager \r\n\r\nAge: Maximum 45 years\r\n\r\nJob Location: Alikadam/Bandarban Chittagong Hill Tracts, Bangladesh\r\n\r\nSalary:55,000 (Consolidated)\r\n\r\nNo. of Position: 1\r\nEducational Requirements:\r\nMasters with Honors in Social Science from a reputed University\r\n\r\nExperience Requirements:\r\nAt least 5 years’ work experience in reputed development organizations. Minimum 5 years’ experience of development project coordination, management and implementation in leading/district level position particularly in CHT. At least 3 years nutrition/health and 2 years livelihood project related experience desirable.\r\n\r\nJob Requirements\r\n-	Good command both in English & Bangla\r\n-	Knowledge on program aspect, Finance & Administration, Monitoring & Evaluation\r\n-	Experience on project coordination, management and implementation\r\n-	Computer skill both English & Bangla on MS-Office\r\n-	Knowledge and experience of working with Local Government Institutions\r\n-	Experiences in working with partnership approach \r\n-	Good report-writing and presentation skills\r\n-	Good knowledge on diversity and sensitivity of CHT \r\n-	Able to drive Motor Cycle and have valid driving license\r\n-	Working knowledge on any of the major CHT tribal languages would be an added advantage\r\nThe Project Manager will lead the CB project team for the LEAN project. The position will have overall Coordination, operational and management responsibility in implementing project activities at sub-district level\r\n\r\n•	Lead CB project team to successfully implement the LEAN nutrition governance project\r\n•	Overall project management of CB to ensure smooth delivery of project activities in accordance with donor requirements and guidelines\r\n•	Maintain coordination and communication in terms of project operation. Support the CB  project team and key personnel to monitor project progress, quality and share learning\r\n•	Ensure that the project follows relevant compliance, statutory rules and regulations, standards and CB Policies\r\n•	Oversee financial management of the project of CB to ensure accountability, compliance, value for money and reporting is achieved.\r\n•	Define tasks and devise an effective action plan with sustainable initiatives involving communities and stakeholders to ensure that the project’s objectives and all results are accomplished within the prescribed time frame and funding guidelines\r\n\r\n•	Plan, direct, coordinate and lead activities of CB in line with project goals and objectives \r\n•	Assist partners to implement partner-wise implementation plans to ensure smooth delivery\r\n•	Monitoring and evaluation the project activities and smooth implementation as per Plan. \r\n•	Foster and encourage a culture of compliance and guidance to the staff members\r\n•	Support the Finance & Administration officer with fund requirements, financial reporting, and compliance \r\n•	Maintain a functional relationship with relevant nutrition sensitive institutions and stakeholders',0,2,1,'2019-04-01 04:36:19',1,'2019-04-01 04:36:19',12,1,'2019-05-15 02:43:50','16jobPdf.pdf'),(17,'PO-ICT-Central Project','PO-ICT','neogoiable','2019-05-31','IT related function',0,2,1,'2019-04-10 08:13:10',1,'2019-04-10 08:13:10',10,1,'2019-05-15 02:43:10','17jobPdf.pdf'),(18,'Credit Officer for CMFP','Credit Officer','10,500','2019-07-31','No of position : 5\r\nSalary: 10,500/-\r\nJob location: Dinajpur',1,2,1,'2019-05-21 07:42:56',1,'2019-05-21 07:42:56',9,1,'2019-05-21 07:42:56','18jobPdf.doc'),(19,'Urgent circular for the post of Senior Accounts Officer under Caritas Central Office','Senior Accounts Officer','60,000-75,000','2019-06-30','Educational Qualification: M. Com/ MBA preferably with Honors in Accounting from any reputed University.\r\nProfessional qualification, such as CACC, CMA/ ACCA Inter shall be given preference.\r\nNo. of Position: one\r\nJob Location: Caritas Central Office, Dhaka\r\nTk. 60,000/ - to Tk.75,000/- (consolidated) per month.\r\nExperience Requirements:\r\n•	Minimum 3 years working experience in the similar job in any reputed organizations.\r\n\r\nCaritas is an equal opportunity employer',0,2,1,'2019-05-21 07:47:17',1,'2019-05-21 07:47:17',10,1,'2019-05-21 07:47:17','19jobPdf.docx'),(20,'Mental Health Psycho Social Support (MHPSS) Officer/ Specialist (Female)','Mental Health Psycho Social Support','60000-70000','2019-07-31','Number of Position: One (1)\r\nEducational Qualification: Masters in a\r\nPsychology/Gender Studies/Social\r\nScience/Social Work or relevant field\r\nAge: Maximum 45 years\r\nConsolidated Salary: 60,000 - 70,000\r\nBDT per month.\r\nJob location: Field Office under Ukhiya\r\nUpazila, Cox\'s Bazar District.',1,2,1,'2019-05-23 02:51:26',1,'2019-05-23 02:51:26',12,1,'2019-05-23 02:51:26','20jobPdf.pdf'),(21,'Please open the attached file to get the files used during the Pastoral Orientation on Child Protection on 18 May, 2019 Organized by EC-JP, CBCB.','Please open the attached file to get the files used during the Pastoral Orientation on Child Protection on 18 May, 2019 Organized by EC-JP, CBCB.','30000','2019-05-31',NULL,0,1,1,'2019-05-26 08:37:52',1,'2019-05-26 08:37:52',10,1,'2019-05-26 08:37:52',NULL),(22,'URGENT INTERNAL EMPLOYEMENT CIRCULAR for Emergency Response Program under Caritas Central Office','Senior Accounts Officer for Emergency Response Program under Caritas Central Office','60,000-75,000','2019-07-31','Educational Qualification: M. Com/ MBA preferably with Honors in Accounting from any reputed University.\r\nProfessional qualification, such as CACC, CMA/ ACCA Inter shall be given preference.\r\nExperience Requirements:\r\n•	Minimum 3 years working experience in the similar job in any reputed organizations.\r\n•	Experience in UN Project/Program will be an added value.\r\n•	Experience in preparing/ monitoring budgets, revision of budgets, variance analysis\r\n•	.Knowledge on VAT/Tax, IAS, IFRS, and GAAP is essential.\r\n•	Knowledge on computerized accounting system, ICT particularly on MS Excel, MS Word (both Bangla & English), etc., is essential. Capable to operate Tally-Accounting Software will be an added value.\r\n•	Should be fluent in communication both in writing and speaking in English.\r\n•	Should be self-driven and positive to work in a team.\r\n•	Should have “can do’ attitude and able to handle multiple tasks managing priorities.\r\n•	Committed to work following organizational aims, values, principal and policies.\r\n•	Interpersonal, organizational and communication skills.',1,2,1,'2019-06-09 10:25:34',1,'2019-06-09 10:25:34',10,1,'2019-07-03 04:07:40','22jobPdf.docx');
/*!40000 ALTER TABLE `job` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `job` with 21 row(s)
--

--
-- Table structure for table `jobapply`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobapply` (
  `jobapply` int(11) NOT NULL AUTO_INCREMENT,
  `applydate` date DEFAULT NULL,
  `fkjobId` int(11) NOT NULL,
  `fkemployeeId` int(11) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `statuschangeBy` int(11) DEFAULT NULL,
  `currentSalary` int(11) DEFAULT NULL,
  `expectedSalary` int(11) DEFAULT NULL,
  `readyToJoinAfter` varchar(11) DEFAULT NULL,
  `mailTamplateId` int(11) DEFAULT NULL,
  `interviewCallDate` date DEFAULT NULL,
  PRIMARY KEY (`jobapply`),
  KEY `fk_jobApply_job1_idx` (`fkjobId`),
  KEY `fk_jobApply_employee1_idx` (`fkemployeeId`),
  KEY `fk_jobApply_user1_idx` (`statuschangeBy`),
  CONSTRAINT `fk_jobApply_employee1` FOREIGN KEY (`fkemployeeId`) REFERENCES `employee` (`employeeId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_jobApply_job1` FOREIGN KEY (`fkjobId`) REFERENCES `job` (`jobId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_jobApply_user1` FOREIGN KEY (`statuschangeBy`) REFERENCES `user` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobapply`
--

LOCK TABLES `jobapply` WRITE;
/*!40000 ALTER TABLE `jobapply` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `jobapply` VALUES (22,'2019-03-27',6,20,NULL,NULL,2000,20000,NULL,NULL,NULL),(28,'2019-04-10',13,12,NULL,NULL,80000,100000,NULL,NULL,NULL),(29,'2019-04-10',14,12,NULL,NULL,80000,100000,NULL,NULL,NULL),(30,'2019-04-10',15,12,NULL,NULL,81000,110000,NULL,NULL,NULL),(31,'2019-04-10',16,12,NULL,NULL,80000,110000,NULL,NULL,NULL),(32,'2019-04-10',17,12,NULL,NULL,80000,100000,NULL,NULL,'2019-04-25'),(33,'2019-04-10',13,19,NULL,NULL,NULL,20000,NULL,NULL,NULL),(34,'2019-04-10',14,19,NULL,NULL,NULL,200000,NULL,NULL,NULL),(35,'2019-04-10',15,19,NULL,NULL,NULL,200002,NULL,NULL,NULL),(36,'2019-04-10',16,19,NULL,NULL,NULL,20000,NULL,NULL,NULL),(37,'2019-04-10',17,19,NULL,NULL,NULL,20000,NULL,NULL,NULL),(50,'2019-05-23',13,29,NULL,NULL,12000,50000,NULL,NULL,NULL),(54,'2019-06-16',20,33,NULL,NULL,150000,200000,NULL,NULL,'2019-07-05'),(55,'2019-06-16',22,33,NULL,NULL,20000,200000,NULL,NULL,NULL),(56,'2019-06-16',20,34,NULL,NULL,60000,70000,NULL,NULL,NULL),(57,'2019-06-16',22,34,NULL,NULL,60000,70000,NULL,NULL,NULL),(60,'2019-06-16',20,30,NULL,NULL,100000,150000,NULL,NULL,NULL),(61,'2019-06-16',22,30,NULL,NULL,90000,100000,NULL,NULL,NULL),(62,'2019-06-16',20,29,NULL,NULL,50000,60000,NULL,NULL,NULL),(63,'2019-06-16',22,29,NULL,NULL,50000,60000,NULL,NULL,NULL),(64,'2019-06-16',22,36,NULL,NULL,46940,70000,NULL,NULL,NULL),(65,'2019-06-18',18,12,NULL,NULL,83000,100000,NULL,NULL,NULL),(66,'2019-06-18',22,12,NULL,NULL,83000,100000,NULL,NULL,NULL),(67,'2019-06-18',20,12,NULL,NULL,NULL,100000,NULL,NULL,NULL),(68,'2019-06-18',20,35,NULL,NULL,70000,100000,NULL,NULL,NULL),(69,'2019-07-03',20,37,NULL,NULL,20000,40000,NULL,NULL,'2019-07-19'),(70,'2019-07-07',22,37,NULL,NULL,60000,65000,NULL,NULL,NULL);
/*!40000 ALTER TABLE `jobapply` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `jobapply` with 27 row(s)
--

--
-- Table structure for table `jobexperience`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobexperience` (
  `jobExperienceId` int(11) NOT NULL AUTO_INCREMENT,
  `degisnation` varchar(100) DEFAULT NULL,
  `organization` varchar(100) DEFAULT NULL,
  `address` mediumtext DEFAULT NULL,
  `startDate` date DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  `fkemployeeId` int(11) NOT NULL,
  `fkOrganizationType` int(11) DEFAULT NULL,
  `majorResponsibilities` varchar(5000) DEFAULT NULL,
  `keyAchivement` varchar(5000) DEFAULT NULL,
  `supervisorName` varchar(200) DEFAULT NULL,
  `reservationContactingEmployer` varchar(2) DEFAULT NULL,
  `employmentType` varchar(45) DEFAULT NULL,
  `employmentTypeText` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`jobExperienceId`),
  KEY `fk_jobExperience_employee1_idx` (`fkemployeeId`),
  CONSTRAINT `fk_jobExperience_employee1` FOREIGN KEY (`fkemployeeId`) REFERENCES `employee` (`employeeId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobexperience`
--

LOCK TABLES `jobexperience` WRITE;
/*!40000 ALTER TABLE `jobexperience` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `jobexperience` VALUES (30,'ew','ee',NULL,'2019-04-01',NULL,19,1,NULL,NULL,NULL,NULL,'Full-Time',NULL),(37,'mn','techcloud',NULL,'2018-11-01','2019-05-01',26,1,NULL,NULL,NULL,NULL,'Full-Time',NULL),(40,'HR Assistant','Akij','2, Outer Circular Road, Shantibaugh Dhaka','2017-11-21',NULL,29,1,'?	Preserving all kinds of correspondences and documents in the respective file \r\n?	Operate finger print Attendance software.\r\n?	Extend support to update data in HRMS software for Caritas Central Office \r\n?	Prepare daily attendance report\r\n?	Process leave application\r\n?	preparing ID card and Update Staff Position Process\r\n?	Prepare monthly meeting notice, half yearly meeting notice, meeting minutes \r\n?	Drafting various letters/certificates, such as, staff salary certificate, experience certificate, leave certificate, flexi time related letters and other letters.\r\n?	Perform various assignments during recruitment specially preparation of recruitment spread sheet and interview letter, thanks letter for panel listed candidates and regret letter for not selected candidates  etc.\r\n?	Perform any other duties/responsibilities as and when assigned by the Manager (HR) and the Assistant Executive Director (Finance & admin) in the interest of Organization\r\n?	Prepared staff Information report and foreign visit report for NGOAB.','Up date Leave management software','Md Khalek','N','Full-Time',NULL),(41,'Manager (HR)','Caritas Bangladesh','2 Outer Circular Road, Shantibagh, Dhaka','2011-09-05','2019-05-17',30,1,'Works related to Human Resource Management and Development','N/A','Sebastian Rozario','N','Full-Time',NULL),(42,'asd','sdfsd','as','2019-05-14',NULL,6,1,NULL,NULL,'asdas',NULL,'Full-Time',NULL),(45,'Senior Manager (PMQ)','Caritas Bangladesh',NULL,'2001-01-01','2019-06-09',33,1,NULL,NULL,NULL,NULL,'Full-Time',NULL),(46,'Internal Auditor','Caritas Bangladesh','2 outer circular road, shantibagh, Dhaka-1217','2012-02-01',NULL,34,1,'. Conduct internal Audit as per Tour schedule. \r\n2. To carry out all jobs assigned in regard to Internal Audit of the organization.\r\n3. Responsible to prepare Caritas Micro Finance Program Central Part Accounts of Caritas Bangladesh. \r\n4. Support to prepare MRA Accounts of Caritas Bangladesh\r\n5. Prepare Caritas Micro Finance Program Unit & Regional Accounts. \r\n6. Responsible to Prepare Consolidation Of other General Project Accounts. \r\n7. To carry out random checks of accounting / bookkeeping documents (financial transactions) to determination and   authentication of accuracy of accounts. \r\n8.  To carry out random visits of Credit program at certain area level to detection of errors, fraud and misappropriation and     whether the policy and procedures are properly followed. To submits reports of visits to the Internal Audit Coordinator or Authorized person highlighting major strength, weakness/irregularities with recommendation remedial measures. \r\n9. Support to submit Tax Return of Caritas Micro Finance Program \r\n10. Assist Internal and External Audit. \r\n11. Manage store and fixed assets\r\n12. Prepare and monitor annual budget\r\n13. Any other job assigned by Manager (Audit & Compliance )',NULL,'Kumaresh C. Biswas','Y','Full-Time',NULL),(47,'Accounts officer','Buro Bangladesh','House No: 12/A, Block No. CEN(F), Road No. 104, Gulshan-2, Dhaka-1212','2008-01-01','2011-12-31',34,1,'• Independently maintaining the all books of accounts.\r\n• Responsible to ensure salary & OT of the employees, maintain petty cash & day to day accounts.\r\n• Managing Micro Finance Program.\r\n• Effective team building, problem solving & decision making, conflict resolution \r\n• Convince the local authority and respective people\r\n• Motivating employee, managing time & stress, performance management Preparation of monthly receipts & payment accounts of the Company.\r\n• Keeping inventory account and continuously physical checking.\r\n• Maintain the banking Transaction & prepare monthly reconciliation statement.\r\n• Maintenance of all party accounts (Sundry debtors and Creditors), payment schedule and checking of bill for payments.\r\n• Assist in Preparing Tax Assessment related documents',NULL,'Md. Munir Hossen','Y','Full-Time',NULL),(48,'First Executive Officer','Robintex Group','Head Office: T.K Bhaban, Kawran Bazar, Dhaka','2010-05-02','2011-12-30',36,3,NULL,NULL,NULL,NULL,'Full-Time',NULL),(49,'Sr. finance Officer','Rising Group','Head Off & factory: Ashuliya, Jirabo Bazar, Savar','2011-04-02','2011-12-31',36,3,NULL,NULL,NULL,NULL,'Full-Time',NULL),(50,'Manager -ICT','Caritas Bangladesh','2 Outer circular rd, Dhaka','2008-05-11',NULL,12,1,'•	Planning, designing, installing, configuring, testing and maintaining Client-Server network as well as ensuring LAN and WiFi system stability and connectivity.\r\n•	Maintenance of Microsoft Exchange Server 2016 such as move and create mailboxes, manage mail queue, log file and ensuring email spam protection using BARRACUDA firewall. Configuring mobile mail.\r\n•	Bandwidth management though Mikrotik router.\r\n•	Lead ICT4D Team: Creating and Design mobile apps for collecting data of various project such as base line survey, monthly monitoring of food security project, exit interview from distribution point of emergency support program.    \r\n•	Perform and manage IT disaster recovery policy and schedule backup by Tape drive.\r\n•	Ensuring for the optimal performance of network infrastructure and resources through analyzing, researching, evaluating as well as monitoring.\r\n•	Preparing and maintaining procedure with documentation for network inventory, diagnostic and resolution of network fault, enhancement and modification to networks.\r\n•	Perform troubleshooting of network problems, monitoring network traffic and activity, capacity and usage to ensure continued integrity of computer system.  \r\n•	Ensuring Virtual Private Network (VPN) connectivity for using system resources and email connectivity of Regional Offices. \r\n•	Maintenance of Human Resource Management System (HRMS) database software.   \r\n•	Maintenance of Domain Controller, Group Policy Objects, DHCP, DNS and File server under Windows 2008 Server platform and applying operating system updates and patches to workstations, perform network programming in support of specific needs and requirements.  \r\n•	Implementing and maintaining information security solutions including CISCO 5505 firewall, Kaspersky open space security solution, intrusion detection/prevention systems and analyzing security log, configuration and integration of computer system. \r\n•	Provide technical consultancy for online registration system of European Commission such as PADOR , SAM for USAID and update the website of Caritas Bangladesh.\r\n•	Maintained Caritas Bangladesh facebook page and provide training of editor team about the posting of news/photos on facebook page.\r\n•	Provides analytical and technical assistance to employee for IT security awareness as well as provide training class to enrich IT knowledge for the staff members of Caritas.  \r\n•	Lead the Regional and Central IT team for analysing, developing, updating and modification of system design and architecture specification, assessing and recommending improvements to network operation and integrated hardware, software, communications and operating system. \r\n•	Manage and design ICT project budget, reporting and action plan.','•	Lead ICT4D Team: Creating and Design mobile apps for collecting data of various project such as base line survey, monthly monitoring of food security project, exit interview from distribution point of emergency support program.','Mr.Sebastian Rozario','Y','Full-Time',NULL),(51,'Network and System Engineer','Doreen Attire','192/A Eastern Road, Lane - 1, Mohakhali DOHS, Dhaka, Bangladesh','2005-03-01','2008-05-10',12,3,'•	Configuring, designing, implementing and maintenance of network solutions as well as internet connection;\r\n•	Maintenance of Linux (Debian) email server;  \r\n•	Recommendation and planning future improvement of computer system of the company; \r\n•	LAN connectivity diagnosis, monitoring network traffic and troubleshooting;\r\n•	Installation of operating systems, antivirus and applications;\r\n•	Maintain security and integrity of computer system;\r\n•	Documentation of network inventory, fault , modification and upgradation;\r\n•	Provide technical support for using network and system resources; \r\n•	Ensure the integrity of high availability network infrastructure and optimal network performance.','Maintenance of Linux (Debian) email server;','Mr.Addul Kalam','Y','Full-Time',NULL),(52,'test','Try Catch','Shewrapara , Mirpur','2019-06-24','2019-07-06',6,1,NULL,NULL,'MD . MUJTABA RAFID RUMI',NULL,'Volunteer',NULL),(53,'IT','CBCB','sdsds sd sdad  asd  dsa d asd a sd','2010-06-26','2015-06-01',12,1,'sadsad','sadasd','XYZ','Y','Full-Time',NULL),(54,'Volunteer','Caritas Developmant Institute','02, Outer Circular Road, Shantibagh, Dhaka-1217','2015-02-01','2015-12-31',37,1,'1.	Cash handling  and manage petty cash book\r\n2.	Responsible for preparing bills, recording payments, issuing receipts and   maintaining ledger book\r\n3.	Maintained office inventory\r\n4.	Assist to VAT and Tax related task and bank reconciling \r\n5.	Responsible for banking\r\n6.	Maintained office stationeries and keep record\r\n7.	Keep record and Check log book\r\n8.	Provide overtime to supportive staff\r\n9.	Handle official bills including telephone, electricity, laundry etc\r\n10.	Assist to keep record for meeting minutes\r\n11.	Recorded staff  leave schedules',NULL,'Theophil Nokrek','N','Volunteer',NULL),(55,'Assistant HR Officer','Caritas BBngladesh','02 Outer Circular Road, Shantibagh, Dhaka','2016-01-01',NULL,37,1,'1.	Recruitment, Selection and Confirmation:\r\n?	Responsible for approval of job advertisement for Caritas Regional Offices under the guidance of Manager (HR)/Senior HR Officer as and when required.\r\n?	Prepare spread sheet (scrutiny of applications), letter of formation of Recruitment Committee and letter for interview\r\n?	Arrange induction program for newly appointed staff\r\n?	Provide Human Resources Policy to newly appointed staff to read for familiarization with Organizational rules and regulations\r\n?	Extend support to Manager (HR) to take necessary steps and actions with regard to confirmation of service of staff under Caritas Central following Caritas HR Policy.\r\n2.	Performance Appraisal, Training and Development:\r\n?	Prepare a tri-monthly plan for Knowledge Development Session (KDS) for Caritas Central Office and coordinate all activities to organize KDS as per plan.\r\n?	Prepare letters regarding nomination of staff members of Caritas for in country training/ workshop/seminar.\r\n?	Identify training and development needs of staff as per feedback of performance Appraisal. \r\n?	Assist to organize any kind of training/workshop/meeting at Caritas Central Office under the guidance of Manager (HR).\r\n?	Prepare Annual increment.','Assist to install new recruitment software successfully','Anita MArgaret Rozario','N','Full-Time',NULL);
/*!40000 ALTER TABLE `jobexperience` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `jobexperience` with 16 row(s)
--

--
-- Table structure for table `languagehead`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `languagehead` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `languagename` varchar(56) NOT NULL,
  `status` tinyint(3) DEFAULT NULL COMMENT '0=Inactive ,1=Active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `languagehead`
--

LOCK TABLES `languagehead` WRITE;
/*!40000 ALTER TABLE `languagehead` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `languagehead` VALUES (1,'Bangla',1),(2,'English',1),(4,'French',0);
/*!40000 ALTER TABLE `languagehead` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `languagehead` with 3 row(s)
--

--
-- Table structure for table `languageskill`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `languageskill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `languageSkillName` varchar(56) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `languageskill`
--

LOCK TABLES `languageskill` WRITE;
/*!40000 ALTER TABLE `languageskill` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `languageskill` VALUES (1,'Reading'),(2,'Writing'),(3,'Speaking'),(7,'Listening ');
/*!40000 ALTER TABLE `languageskill` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `languageskill` with 4 row(s)
--

--
-- Table structure for table `mail_tamplate`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mail_tamplate` (
  `tamplateId` int(11) NOT NULL AUTO_INCREMENT,
  `tamplateName` varchar(100) DEFAULT NULL,
  `testDetails` text DEFAULT NULL,
  `testDate` date DEFAULT NULL,
  `testAddress` text DEFAULT NULL,
  `tamplateFooterAndSign` longtext DEFAULT NULL,
  `status` tinyint(3) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`tamplateId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mail_tamplate`
--

LOCK TABLES `mail_tamplate` WRITE;
/*!40000 ALTER TABLE `mail_tamplate` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `mail_tamplate` VALUES (1,'Interview Card',NULL,NULL,NULL,'Sebastian Rozario\nAssistant Executive Director (Finance and Admin.)\nCaritas Bangladesh\n\nCC: ED/ AED (P)\n: Convener, Selection Committee\n: Manager (HR) - Please follow up.',1,NULL),(2,'Not Selected',NULL,NULL,NULL,NULL,1,NULL),(3,'Panel Listed',NULL,NULL,NULL,NULL,1,NULL);
/*!40000 ALTER TABLE `mail_tamplate` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `mail_tamplate` with 3 row(s)
--

--
-- Table structure for table `membership_social_network`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `membership_social_network` (
  `membershipId` int(11) NOT NULL AUTO_INCREMENT,
  `networkName` varchar(255) DEFAULT NULL,
  `duration` varchar(10) DEFAULT NULL,
  `membershipType` varchar(255) DEFAULT NULL,
  `fkemployeeId` int(11) DEFAULT NULL,
  PRIMARY KEY (`membershipId`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `membership_social_network`
--

LOCK TABLES `membership_social_network` WRITE;
/*!40000 ALTER TABLE `membership_social_network` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `membership_social_network` VALUES (3,'asd','asd','asd',6),(9,'Bangladesh Computer Society','Lifetime','MBCS (Member of Bangladesh Computer Society).',12),(13,'NGCAF','1 year','Member',37);
/*!40000 ALTER TABLE `membership_social_network` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `membership_social_network` with 3 row(s)
--

--
-- Table structure for table `nationality`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nationality` (
  `nationalityId` int(11) NOT NULL AUTO_INCREMENT,
  `nationalityName` varchar(50) DEFAULT NULL,
  `countryName` varchar(50) DEFAULT NULL,
  `status` tinyint(3) DEFAULT NULL COMMENT '0=Inactive ,1=Active',
  PRIMARY KEY (`nationalityId`),
  UNIQUE KEY `nationalityName_UNIQUE` (`nationalityName`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nationality`
--

LOCK TABLES `nationality` WRITE;
/*!40000 ALTER TABLE `nationality` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `nationality` VALUES (1,'Bangladeshi','Bangladesh',1),(2,'Others','Others',1);
/*!40000 ALTER TABLE `nationality` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `nationality` with 2 row(s)
--

--
-- Table structure for table `organizationtype`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `organizationtype` (
  `organizationTypeId` int(11) NOT NULL AUTO_INCREMENT,
  `organizationTypeName` varchar(50) NOT NULL,
  `status` tinyint(3) DEFAULT NULL COMMENT '0=Inactive ,1=Active',
  PRIMARY KEY (`organizationTypeId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organizationtype`
--

LOCK TABLES `organizationtype` WRITE;
/*!40000 ALTER TABLE `organizationtype` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `organizationtype` VALUES (1,'NGO/Development Organization',1),(2,'Government',1),(3,'Private Organization',1),(4,'Others',1);
/*!40000 ALTER TABLE `organizationtype` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `organizationtype` with 4 row(s)
--

--
-- Table structure for table `otherskillsinformation`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `otherskillsinformation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `skillName` varchar(255) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1 COMMENT '0=Inactive ,1=Active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `otherskillsinformation`
--

LOCK TABLES `otherskillsinformation` WRITE;
/*!40000 ALTER TABLE `otherskillsinformation` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `otherskillsinformation` VALUES (1,'Illusator',1),(2,'Web developer',1),(3,'Graphics',1),(4,'Photoshop',1),(5,'Playing Chess',1),(6,'Keramboard',1),(7,'Debate',1),(8,'play',1),(9,'aaA',1),(10,'SDSD',1),(11,'E-Views Software',1);
/*!40000 ALTER TABLE `otherskillsinformation` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `otherskillsinformation` with 11 row(s)
--

--
-- Table structure for table `previous_work_in_caritasbd`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `previous_work_in_caritasbd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `designation` varchar(255) DEFAULT NULL,
  `startDate` date DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  `fkemployeeId` int(11) DEFAULT NULL,
  `currentlyRunning` tinyint(2) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `previous_work_in_caritasbd`
--

LOCK TABLES `previous_work_in_caritasbd` WRITE;
/*!40000 ALTER TABLE `previous_work_in_caritasbd` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `previous_work_in_caritasbd` VALUES (18,'mn','2019-02-06','2019-03-09',26,0),(20,'asd','2019-05-22','2019-05-24',6,0),(22,'Internal Auditor','2011-02-01',NULL,34,1),(23,'Manager -ICT','2008-05-11',NULL,12,1),(24,'Volunteer','2017-01-01','2017-12-20',35,0),(25,'test','2019-06-11',NULL,6,1),(26,'Volunteer','2014-01-01','2014-11-30',37,0);
/*!40000 ALTER TABLE `previous_work_in_caritasbd` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `previous_work_in_caritasbd` with 7 row(s)
--

--
-- Table structure for table `professionalqualification`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `professionalqualification` (
  `professionalQualificationId` int(11) NOT NULL AUTO_INCREMENT,
  `certificateName` varchar(100) DEFAULT NULL,
  `institutionName` varchar(255) DEFAULT NULL,
  `startDate` date DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `result` varchar(10) DEFAULT NULL,
  `fkemployeeId` int(11) NOT NULL,
  `resultSystem` tinyint(2) DEFAULT NULL COMMENT '1=grade,2=division,3=class',
  `resultSystemName` varchar(255) DEFAULT NULL,
  `hour` int(4) DEFAULT NULL,
  `day` int(4) DEFAULT NULL,
  `week` int(4) DEFAULT NULL,
  `month` int(4) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `grade` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`professionalQualificationId`),
  KEY `fk_professionalQualification_employee1_idx` (`fkemployeeId`),
  CONSTRAINT `fk_professionalQualification_employee1` FOREIGN KEY (`fkemployeeId`) REFERENCES `employee` (`employeeId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `professionalqualification`
--

LOCK TABLES `professionalqualification` WRITE;
/*!40000 ALTER TABLE `professionalqualification` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `professionalqualification` VALUES (18,'ITIL (Information Technology Infrastructure Library)','AXELOS',NULL,NULL,2,'Pass',12,4,NULL,NULL,NULL,NULL,NULL,NULL,'Pass'),(25,'nombo','bangla','2019-02-06','2019-02-11',1,'5',20,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(26,'nombo','bangla','2019-02-25',NULL,2,'5',6,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(27,'nombo','bangla','2019-01-28','2019-03-07',2,'5',6,4,'nostalgic',NULL,NULL,NULL,NULL,NULL,NULL),(30,'nombo','bangla',NULL,NULL,2,NULL,26,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(31,'women Leadeship','Cody','2019-05-29','2019-05-21',2,'3',30,1,NULL,NULL,12,NULL,NULL,NULL,NULL),(33,'International Program for Development Evaluation Training (IPDET)','Carleton University, Canada','2013-06-10','2013-07-05',2,NULL,33,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(34,'Cost and Management Accountants','ICMAB','2015-01-01','2024-12-31',1,'400 pass',36,4,'Marks',NULL,NULL,NULL,NULL,NULL,NULL),(35,'MCP (Microsoft Certified Professional)','Microsoft',NULL,NULL,2,'Pass',12,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(36,'JNCIS-SEC (Juniper Networks Certified Internet Specialist –  JUNOS Security Track)','Juniper',NULL,NULL,2,NULL,12,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(37,'JNCIA-ER (Juniper Networks Certified Internet Associate - Enterprise Routing)','Juniper',NULL,NULL,2,'Pass',12,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `professionalqualification` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `professionalqualification` with 11 row(s)
--

--
-- Table structure for table `referee`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `referee` (
  `refereeId` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(90) DEFAULT NULL,
  `lastName` varchar(45) DEFAULT NULL,
  `presentposition` varchar(100) DEFAULT NULL,
  `organization` varchar(100) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `relation` varchar(45) DEFAULT NULL,
  `fkemployeeId` int(11) NOT NULL,
  PRIMARY KEY (`refereeId`),
  KEY `fk_referees_employee1_idx` (`fkemployeeId`),
  CONSTRAINT `fk_referees_employee1` FOREIGN KEY (`fkemployeeId`) REFERENCES `employee` (`employeeId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `referee`
--

LOCK TABLES `referee` WRITE;
/*!40000 ALTER TABLE `referee` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `referee` VALUES (11,'MD . MUJTABA','RUMI','sadasd','Try Catch','mujtaba.rumi1@gmail.com','01680674598','sdasd',6),(12,'ads','waew','sadxzc','asd','asdasd@r.com','23423','asdasd',6),(23,'Ms. Anita Margaret','Rozario','Manager – HR','Caritas Bangladesh','anita@caritasbd.org','01713384003','Colleague',12),(24,'Mr. Subrata','Chowdhury','Senior Training Manager','Heifer International Bangladesh','subrata.chowdhury@heifer.org','01817719875','Professional',12),(41,'mmmm','kk','director','techcloud','ddd@yahoo.com','000000','sir',20),(42,'mmmm','kk','director','techcloud','ddd@yahoo.com','000000','sir',20),(46,'e','3e','e','f',NULL,'2313','d',19),(47,'sad','sada','asd','das',NULL,'23','sad',19),(55,'mmmm','kk','director',NULL,NULL,'000000','sir',26),(56,'mmmm','kk',NULL,NULL,NULL,'000000','sir',26),(59,'MR. Nayem','Mahatab','Lecturer','IUB','Nayem@iub.bd','01553447895','Academic',29),(60,'Ms. Magdalin','Dessai','manager','NBL','Dessai@nbl.com','0172198866','Supervisor',29),(61,'Sebastia','Rozario','Dirctor','CB','dfa@caritasbd.org','01111','Line Director',30),(62,'Ranjon','Rozario','Director','Caritas Bangladesh','DP@caritasbd.org','019191911','Supervisor',30),(65,'Francis Atul','Sarker','Executive Director','Caritas Bangladesh','ed@caritasbd.org','01713010411','Professional',33),(66,'Sebastian','Rozario','Director (F&A)','Caritas Bangladesh','dfa@caritasbd.org','01970024065','Professional',33),(67,'Kumaresh','C. Biswas','Asst. Manager (Audit),  In Charge (Audit Section)','Caritas Bangladesh','kcbiswas7@gmail.com','01718102136','Professional',34),(68,'Md. Amir','Hossain','Divisional System Engineer','Grameen Phone','parvezbosc@yahoo.com','01711505231','Relative',34),(69,'Hasan Imam','Siddiki, ACA','Finance manager','Youth Group','hasan@youthbd.com','01711-701457','University Friend',36),(70,'Sarder Firoz','Ahmmed','Assistant Professor','Khulna University','sfahmmed@yahoo.com','01712-195877','Brother in law',36),(71,'Andrew','Gomes','Director','World Vision','andrew@worldvisionbd.org','01717700000','Colleuge',35),(72,'Christine','Rozario','Coordinator','World Vision Bangladesh',NULL,'01711000000','Colleuge',35),(73,'Mr. Radu',NULL,'IT officer','CB',NULL,'09','colg',12),(74,'Ms. Anita Margaret Rozario',NULL,'Manager (HR)','Caritas Central Office','anita@caritasbd.org','01713384003','Supervisor',37),(75,'Dr. Benedict Alo',NULL,'President','Caritas Asia',NULL,'01713010412','Ex- Executive (Supervisor)',37);
/*!40000 ALTER TABLE `referee` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `referee` with 25 row(s)
--

--
-- Table structure for table `relativeincb`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `relativeincb` (
  `relativeId` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(45) DEFAULT NULL,
  `lastName` varchar(128) NOT NULL,
  `degisnation` varchar(45) DEFAULT NULL,
  `relation` varchar(100) DEFAULT NULL,
  `fkemployeeId` int(11) DEFAULT NULL,
  PRIMARY KEY (`relativeId`),
  KEY `fk_relativeInCB_employee1_idx` (`fkemployeeId`),
  CONSTRAINT `fk_relativeInCB_employee1` FOREIGN KEY (`fkemployeeId`) REFERENCES `employee` (`employeeId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `relativeincb`
--

LOCK TABLES `relativeincb` WRITE;
/*!40000 ALTER TABLE `relativeincb` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `relativeincb` VALUES (16,'Lily','Gomes','SBBC Specialist',NULL,30);
/*!40000 ALTER TABLE `relativeincb` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `relativeincb` with 1 row(s)
--

--
-- Table structure for table `religion`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `religion` (
  `religionId` int(11) NOT NULL AUTO_INCREMENT,
  `religionName` varchar(25) DEFAULT NULL,
  `status` tinyint(3) DEFAULT NULL COMMENT '0=Inactive ,1=Active',
  PRIMARY KEY (`religionId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `religion`
--

LOCK TABLES `religion` WRITE;
/*!40000 ALTER TABLE `religion` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `religion` VALUES (1,'Islam',1),(2,'Christianity',1),(3,'Hinduism',1),(4,'Buddhism',1),(5,'Others',1);
/*!40000 ALTER TABLE `religion` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `religion` with 5 row(s)
--

--
-- Table structure for table `terms_and_condition`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `terms_and_condition` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_Header` varchar(500) DEFAULT NULL,
  `page_content` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `terms_and_condition`
--

LOCK TABLES `terms_and_condition` WRITE;
/*!40000 ALTER TABLE `terms_and_condition` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `terms_and_condition` VALUES (1,'Terms and Conditons','<p style=\"text-align:center\"><big><span style=\"color:#3498db\"><strong><u>&nbsp;Terms and Conditions</u></strong></span></big></p>\r\n\r\n<ol style=\"list-style-type:lower-roman\">\r\n	<li><span style=\"font-size:12pt\"><span style=\"color:#000000\"><span style=\"font-size:12.0pt\">I have carefully read and understood the Caritas Code of Ethics and Code of Conduct for Staff, code of conduct as specified in the Sagurding Policy, Data Protection Policy, Child Protection Policy, Information Disclosure Policy, Anti-corruption Policy, Policy on Prevention of Money Laundering and Combating Terrorist Financing, Equal Employment Opportunity Policy &nbsp;and other policies of Caritas and shall comply with the above and other policies as adopted/amended from time to time.&nbsp; </span></span></span><br />\r\n	&nbsp;</li>\r\n</ol>');
/*!40000 ALTER TABLE `terms_and_condition` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `terms_and_condition` with 1 row(s)
--

--
-- Table structure for table `traning`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `traning` (
  `traningId` int(11) NOT NULL AUTO_INCREMENT,
  `trainingName` varchar(100) DEFAULT NULL,
  `startDate` date DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  `vanue` varchar(255) DEFAULT NULL,
  `countryId` int(11) DEFAULT NULL,
  `fkemployeeId` int(11) NOT NULL,
  `status` tinyint(3) DEFAULT NULL COMMENT '0=Inactive ,1=Active',
  `hour` int(4) DEFAULT NULL,
  `day` int(4) DEFAULT NULL,
  `week` int(4) DEFAULT NULL,
  `month` int(4) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  PRIMARY KEY (`traningId`),
  KEY `fk_traning_country1_idx` (`countryId`),
  KEY `fk_traning_employee1_idx` (`fkemployeeId`),
  CONSTRAINT `fk_traning_country1` FOREIGN KEY (`countryId`) REFERENCES `country` (`countryId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_traning_employee1` FOREIGN KEY (`fkemployeeId`) REFERENCES `employee` (`employeeId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `traning`
--

LOCK TABLES `traning` WRITE;
/*!40000 ALTER TABLE `traning` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `traning` VALUES (18,'CCNA','2019-02-04','2019-02-15','Dhaka',1,12,1,NULL,NULL,NULL,NULL,NULL),(19,'Microsoft Exchange Server 2010 (Exam code: 70-662)','2013-12-01','2013-06-30','New Horizons Computer Learning Center, Dhaka',1,12,2,60,NULL,NULL,NULL,NULL),(30,'yguf','2019-03-03','2019-03-19','kj',1,20,1,NULL,NULL,NULL,NULL,NULL),(31,'hgfv','2019-02-26',NULL,'kj',1,6,2,12,7,13,NULL,1),(35,'ere',NULL,NULL,'wewe',1,19,1,NULL,NULL,NULL,NULL,NULL),(40,'yguf','2019-02-06','2019-05-24','kj',1,26,2,NULL,NULL,NULL,NULL,NULL),(42,'kpi','2018-11-01','2018-11-03','DCCI',1,29,2,NULL,NULL,NULL,NULL,NULL),(43,'Advanced Human Resource Management','2019-05-14','2019-05-30','Dhaka',1,30,2,NULL,3,NULL,NULL,NULL),(49,'Impact Evaluation Technical Course 2016: How to Design, Manage, and Conduct Impact Evaluations','2016-08-01','2016-08-12','Asia-Pacific Finance and Development Institute, Shanghai, China',46,33,2,NULL,NULL,NULL,NULL,NULL),(50,'Book keeping and  Accounting','2011-11-08','2011-11-21','Bangladesh Small &  Cottage Industries  Corporation( BSCIC)',1,34,2,NULL,NULL,2,NULL,NULL),(51,'Management  Development  course','2008-01-01','2008-01-16','Juki Corporation, Japan which financed by Japan Government',1,34,2,NULL,NULL,2,NULL,NULL),(52,'Computer Certificate Course.','2002-10-01','2002-12-31','National Youth Training  Academy.',1,34,2,NULL,NULL,NULL,3,NULL),(53,'Training on Gender Sensitivity','2015-11-15','2015-11-17','Caritas Development Institutes',1,36,2,24,1,1,1,1),(54,'Protection Mainstreaming training','2019-05-05','2019-06-09','Caritas Development Organization',1,35,2,NULL,NULL,NULL,NULL,NULL),(55,'Community Driven Development','2018-11-01','2018-11-30','Hyderabad',101,35,2,NULL,NULL,NULL,NULL,NULL),(56,'name','2018-10-15','2019-04-30','asdasd',1,6,1,NULL,NULL,NULL,NULL,NULL),(57,'Advanced Human Resource Management','2019-06-21','2019-07-23','Caritas Development Institute',1,37,2,NULL,3,NULL,NULL,NULL),(58,'Human Resource Development and Management',NULL,NULL,'CDI',1,37,2,NULL,3,NULL,NULL,NULL),(59,'test','2019-07-22',NULL,'test3',4,6,2,4,4,4,4,1);
/*!40000 ALTER TABLE `traning` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `traning` with 19 row(s)
--

--
-- Table structure for table `type_of_employment`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type_of_employment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employmentTypeName` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_of_employment`
--

LOCK TABLES `type_of_employment` WRITE;
/*!40000 ALTER TABLE `type_of_employment` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `type_of_employment` VALUES (1,'Full-Time',1),(2,'Volunteer',1),(3,'Contractual',1),(4,'Temporary',1),(5,'Part-time',1);
/*!40000 ALTER TABLE `type_of_employment` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `type_of_employment` with 5 row(s)
--

--
-- Table structure for table `user`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `fkuserTypeId` varchar(5) NOT NULL,
  `register` varchar(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `remember_token` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`userId`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `fk_user_userType_idx` (`fkuserTypeId`),
  CONSTRAINT `fk_user_userType` FOREIGN KEY (`fkuserTypeId`) REFERENCES `usertype` (`userTypeId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `user` VALUES (1,'admin','admin@gmail.com','$2y$10$9bvWIarfmTXlMYnLUNyB/.QZfF19xXIYHEw9fEXA9HVHlNcKPlLn2',NULL,'admin','Y','2019-07-07 09:46:30','8wBlBW1th66OhlRZAm3nreci9HTfKVojgfefUUoCCNwaCD1jOvhk3IPJ8D7C',NULL),(6,'Sakib Rahman','sakibtcl@gmail.com','$2y$10$z/KBBYCiOUUNgtHhrW.qj.G6oiu75VV5i1atAOwA6ttwOOctZZjd6',NULL,'user','Y','2019-07-10 06:34:41','WTfCvJOabOm4lrP8R2QEgHVKvyZyQjRtnRxVGtd5thdprG6cbTgJXw2KFHAp',NULL),(7,'MD . MUJTABA RUMI','mujtaba.rumi1234@gmail.com','$2y$10$pXjwT4Ps0sfqboZNXjoEKuHb.Gd.tK.2PglsoeCJBz3QDTwD569AS',NULL,'user','Y','2019-05-14 10:15:37',NULL,NULL),(9,'Askinayon','noyon@gmail.com','$2y$10$/sJ7d3EJ3xcuB3Mm.qvwIeCFFGR7pcH9VVdxtp8Fq5FWrqBojcPPu',NULL,'cbEmp','Y','2019-01-24 03:40:37',NULL,NULL),(10,'shaheen khan','shaheen@craitasbd.org','$2y$10$8HPWhRy8Dgq7Pv73tc6KaeE1g6oveUCjmbeBytRK9MnR8IuWom.Um',NULL,'user','N','2019-01-24 08:54:36',NULL,'37AbwQ5Cdp8WqtYtAPfzTU2gdsC1qqc7RXCS4A4pZ1oN1zNjswi5v5GKcJ5Kkp6J'),(16,'shaheen shaheen','shaheen@caritasbd.org','$2y$10$v5MhNDmGdR/gkHPdTujIwOihfYW1cRB3LRW0F./ZH/f9Pks/myNhS',NULL,'user','Y','2019-07-07 09:49:20','LUgPSIytpIOjPbjJMFtQViOr0cEjgIrmUacqubi5fUVqZc9dFLr1gCZfnvtV',NULL),(24,'MD . MUJTABA','rumi@gmail.com','$2y$10$3FHO653RZ6mqgcOFSMws/eWc7wJ8DUEiS0GkzoJqbSXHXgezldk/y',NULL,'cbEmp','N','2019-04-01 04:20:47',NULL,NULL),(25,'MD . MUJTABA','rumi123@gmail.com','$2y$10$klyvhouOsh03XB36uZQY4.aKRX9zfQoKuJA4UtOIDw6Ohvd4ycimy',NULL,'admin','Y','2019-08-05 06:52:28',NULL,NULL),(26,'MD . MUJTABA','admin1234@gmail.com','$2y$10$.ffBZSnz3nM3HmLReJsv9u/YQgvyJGdtHVerpUGCeYG5s9RpWVnJu',NULL,'cbEmp','Y','2019-08-05 06:52:31','JibNjYk6WmDQVm8vCArMHbPcyAcODgZcINVktwrWofUkC5CTvbtZLtcPbf7h',NULL),(28,'rafed UZ Zaman','radu@caritasbd.org','$2y$10$MnZCgzzQkaDejZVl7.kF/.yEmiW9oo6eH5pFlXzXHkO1KdjJnx2Mi',NULL,'user','Y','2019-04-10 08:50:08','WgAWWz4G0E6GkjtSbBAnLwYFymTZqOodWeRSEGymlEYbo9qqfTxdZtCVrC3j',NULL),(29,'shraboni shaila','emp1@gmail.com','$2y$10$O.l5MxHyCTqWfw/oR9U.lO7WPWkPW7uodyIRqpd8tdbQkpnd1H/1m',NULL,'user','N','2019-03-27 10:18:18',NULL,'B8yxsLyd5eV9Sp3qTko5Erjg3jInGjcABeL2gCXMdY9blKqnEINzj788vJqNgvbp'),(30,'shraboni shaila','shraboni_shormin@yahoo.com','$2y$10$D5bVVKYL4d8Y1pg3WhTFJOs9lX1Au8QkwxIb/hj8Dkdby38d136VK',NULL,'user','Y','2019-03-27 10:20:10',NULL,NULL),(32,'Shaon','shaon_rozario@caritasbd.org','$2y$10$VQePR4.QOAJl6j7eOHHfeOgXbDl0BE.vOMVVu1oGzc6SyGclbX2mW',NULL,'cbEmp','Y','2019-08-05 06:52:19','iVg3vTbx8KYdcdBECRpwhL0ZBfhRx4lmjD6FLazGBD2LyUGEbaxtceN1N2mb',NULL),(36,'farzad rahman','farzadrahman59@gmail.com','$2y$10$FC8CTzmuTlw3UiqXxubBn.hC3a2rxl5RoANn1DbYY3hht1.nljg1K',NULL,'user','Y','2019-05-27 06:23:34','Pf0exd08VY6DyoP0nH9qx9yZgBucmOhJ0XBstg2JrkZSUvNjJLqOV4IjyBKR',NULL),(38,'shraboni shaila','shrabonishaila77@gmail.com','$2y$10$.B6Rp93ooF2ov0OUObH2QOao/RcGQFJwzhGWy0Hne/L57bYsJhZma',NULL,'user','Y','2019-05-07 05:09:05',NULL,NULL),(41,'Shaon Rozario','louisrozario1993@gmail.com','$2y$10$UoP1mBApgyhRab5t0ji7GuuxnLy2lW9DfBEWWd36dnd35S2NeT0x2',NULL,'user','Y','2019-06-16 05:42:06','roKMtklJHYCN6Byw9TKT3MkplT8BEdG48p5wCmjqkkCOIxY6gWaFw3Or3Kqe',NULL),(42,'anita rozario','anita12_bd@yahoo.com','$2y$10$laGywR3DTeDuvHNvsC2ba.SEjfMdGz4JklUAxwMs345CruzfeGiHy',NULL,'user','N','2019-05-17 05:27:45',NULL,'N1qGT2f2ZtyWuKEIKgXM5BorXGrJhIBzEOaKFhjCApG06G0qYGmEPD52mqa1QUGX'),(43,'anita Rozario','anita@caritasbd.org','$2y$10$CPMHRkmv5EBTrRoMremEPeZ2oncyCIfmsAo.FnKpHJu5SyNxedZCq',NULL,'user','Y','2019-06-16 05:41:29','FtiqAgeqiZIr74l5eAAUfTWqT0GuNCU9e2gb8LOROz1uL0BYMG1Bnjft3KoC',NULL),(45,'Sukumar Corraya','sukumarcorraya@gmail.com','$2y$10$UfTDBzP6kpNfb8iv512NUOOb9Xb8jrxrmVD00CSBUpzHiRfG0g8h2',NULL,'user','Y','2019-06-03 13:36:20',NULL,NULL),(46,'A.K.M. Rafed Uz-Zaman','raduit@hotmail.com','$2y$10$qJGp4CibiYHCzIbuyyoIJem9o.7p4axE7o/VcEsjK7YA0Eap6XXdi',NULL,'user','N','2019-06-09 05:35:13',NULL,'GBM2foYtvrHIQtNrKbF2j2oh4VZeS0saBjYKPL2j5adEzecPhKJ0e1vyvaLcWMiX'),(47,'Mohammed Mamunur Rashid','mamun@caritasbd.org','$2y$10$urWujUyWbhg5dBS63MSxQ.OU9LzzTlGWS/QctldLWuJAatSLre3zq',NULL,'user','Y','2019-06-16 05:37:15','Ax66YyHCDPjIyxi2HptiDLFEs2PKGCtUUD361SVm34DgwMzDUOghLpajS0D6',NULL),(48,'krishna drong','krishna_drong@caritasbd.org','$2y$10$dM3ifpBlH/9iqOJ.n2yED.LQmYO86DcinMdnC4E3Ap6Zxrbq0ViQq',NULL,'user','Y','2019-06-09 10:36:09','AbyOw76XpVnufOqUKQjZvSJka56qGVczEDbe0k3Zzx1Nc6bw1IQ4H0PyTU5j',NULL),(49,'MUHAMMAD ISMAIL HOSSAIN','ismail223hossain@gmail.com','$2y$10$32AIsqM3oJQyx3bzeOXAdulGzqKquERRclIw3LGPYeWeadC9otwo2',NULL,'user','Y','2019-06-18 03:50:21','WnllKfNYxOtPQME19MKno9cJP770ptVFejuMN2C2oJgwh3pHp4QedsGFTnl4',NULL),(50,'Delwar Hossain','delwar_hossain@caritasbd.org','$2y$10$IUbUDAz6FxiyA1PqKke4CuUOwblTb6SlUOHqGVzwcVpmTs1Ny7Aj6',NULL,'user','Y','2019-06-16 04:07:51',NULL,NULL),(51,'Joshim Uddin','joshim_uddin@caritasbd.org','$2y$10$NQstX.Z0yMUFNaOp0IYNy.QQMvo18xxAdKcg1.eCm6itrk58oxnDO',NULL,'user','Y','2019-06-16 08:55:34','lqIuK7hfAzoeS9ysctwaebDq3gakbWaVO8Zz91nLAhybZqjJcwHvZrqNHItM',NULL),(52,'A.K.M. Rafed Uz-Zaman','raduzamanit@gmail.com','$2y$10$6IZ4jK5hJsVgSE0cchWy4.J8SpcHjgLt3kSTIW5aQJXsxd7lwIkq2',NULL,'user','Y','2019-06-16 09:30:52','SoKb3NfrBRkBlpHwgqcDjHv3xCzTpBlGJ4drJJrt0pbeKlHHXQFATUZO8mMl',NULL),(53,'Renex Maria Rozario','renexmaria1993@gmail.com','$2y$10$vjpmlhcJ0nb7s9kRbJK0WeajZ6R37ipHIusxRizzs0GfUIhqVOwne',NULL,'user','Y','2019-07-03 04:06:12','48mMiirsAqUO9m7nRCnbUndTXBCPAOZy134XzdfeqnFCFqGNil7CS9qhgnfi',NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `user` with 27 row(s)
--

--
-- Table structure for table `usertype`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usertype` (
  `userTypeId` varchar(5) NOT NULL,
  `userTypeName` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`userTypeId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usertype`
--

LOCK TABLES `usertype` WRITE;
/*!40000 ALTER TABLE `usertype` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `usertype` VALUES ('admin','Admin'),('cbEmp','Caritasbd Employee'),('user','User');
/*!40000 ALTER TABLE `usertype` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `usertype` with 3 row(s)
--

--
-- Table structure for table `zone`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zone` (
  `zoneId` int(11) NOT NULL AUTO_INCREMENT,
  `zoneName` varchar(15) DEFAULT NULL,
  `status` tinyint(3) DEFAULT NULL COMMENT '0=Inactive ,1=Active',
  PRIMARY KEY (`zoneId`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zone`
--

LOCK TABLES `zone` WRITE;
/*!40000 ALTER TABLE `zone` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `zone` VALUES (1,'mirpur',0),(2,'baridhara',0),(3,'Dhanmondi',0),(4,'Dhaka Region',1),(5,'Khulna Region',1),(6,'Rajshahi Region',1),(7,'Barishal Region',1),(8,'Sylhet Region',1),(9,'Dinajpur Region',1),(10,'Central Office',1),(11,'Mymensingh',1),(12,'Chattogram',1);
/*!40000 ALTER TABLE `zone` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `zone` with 12 row(s)
--

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on: Mon, 05 Aug 2019 07:48:36 +0000
