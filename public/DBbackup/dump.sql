-- mysqldump-php https://github.com/ifsnop/mysqldump-php
--
-- Host: 127.0.0.1	Database: caritasbd
-- ------------------------------------------------------
-- Server version 	5.5.5-10.1.19-MariaDB
-- Date: Thu, 28 Mar 2019 10:56:37 +0000

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aggrement`
--

LOCK TABLES `aggrement` WRITE;
/*!40000 ALTER TABLE `aggrement` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `aggrement` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `aggrement` with 0 row(s)
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
  `status` int(11) DEFAULT '1',
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
INSERT INTO `agreementqus` VALUES (26,'Do you have any crime record?',1,1),(27,'It is a long established fact that a reader will be distracted ?',2,1),(28,'It is a long established fact that a reader will be distracted ?',3,1),(29,'It is a long established fact that a reader will be distracted ?',4,1);
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
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`boardId`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `board`
--

LOCK TABLES `board` WRITE;
/*!40000 ALTER TABLE `board` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `board` VALUES (1,'Dhaka Board',1),(2,'Rajshahi Board',1),(3,'Public University',0),(4,'Private University',0),(5,'Renex Maria Rozario Anita Margaret Rozario nayon S',0),(6,'Khulna Board',1),(7,'Comilla Board',1),(8,'Chattogram Board',1),(9,'Barishal Board',1),(10,'Sylhet Board',1),(11,'weaeaw',1),(12,'weaeaw',1),(13,'board',1),(14,'asd',1),(15,'dhk',1),(16,'erwer',1),(17,'asdasd',1);
/*!40000 ALTER TABLE `board` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `board` with 17 row(s)
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `computerskill`
--

LOCK TABLES `computerskill` WRITE;
/*!40000 ALTER TABLE `computerskill` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `computerskill` VALUES (1,'dsd',1),(2,'rfdrfd',1);
/*!40000 ALTER TABLE `computerskill` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `computerskill` with 2 row(s)
--

--
-- Table structure for table `country`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `country` (
  `countryId` int(11) NOT NULL AUTO_INCREMENT,
  `countryName` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`countryId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country`
--

LOCK TABLES `country` WRITE;
/*!40000 ALTER TABLE `country` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `country` VALUES (1,'Bangladesh'),(2,'UK');
/*!40000 ALTER TABLE `country` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `country` with 2 row(s)
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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `degree`
--

LOCK TABLES `degree` WRITE;
/*!40000 ALTER TABLE `degree` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `degree` VALUES (1,'Bachelor in Science',3,0),(2,'BSc in EEE',3,1),(3,'Science',1,1),(4,'Arts',8,1),(5,'Science',2,1),(6,'Bachelor in Arts',3,1),(7,'Bachelor in Commerce',3,1),(8,'Masters in Arts',4,1),(9,'MBA',4,1),(10,'BBA',3,1),(11,'Masters in Science',4,1),(12,'3434',2,1),(13,'3434',2,1),(14,'test',2,1),(15,'adsasd',2,1),(16,'test3',2,1),(17,'test4',1,1),(18,'sdfs',2,1),(19,'sad',1,1),(20,'sdf',5,1),(21,'Bsc In Cse',3,1);
/*!40000 ALTER TABLE `degree` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `degree` with 21 row(s)
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `designation`
--

LOCK TABLES `designation` WRITE;
/*!40000 ALTER TABLE `designation` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `designation` VALUES (1,'Designation-1',1),(2,'Designation 2',1),(3,'test',1),(4,'test123',0),(5,'test Designation',1);
/*!40000 ALTER TABLE `designation` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `designation` with 5 row(s)
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
  `result` varchar(20) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `education`
--

LOCK TABLES `education` WRITE;
/*!40000 ALTER TABLE `education` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `education` VALUES (2,3,'sadad',41,'2019','1',1,'4','4',NULL,1,1,8,NULL,NULL);
/*!40000 ALTER TABLE `education` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `education` with 1 row(s)
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `educationlevel`
--

LOCK TABLES `educationlevel` WRITE;
/*!40000 ALTER TABLE `educationlevel` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `educationlevel` VALUES (1,'SSC',1,1),(2,'HSC',1,1),(3,'Bachelor',2,1),(4,'Masters',2,1),(5,'PhD',NULL,1),(6,'Diploma',NULL,NULL),(7,'asd',NULL,NULL),(8,'new test',2,1);
/*!40000 ALTER TABLE `educationlevel` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `educationlevel` with 8 row(s)
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
) ENGINE=InnoDB AUTO_INCREMENT=186 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `educationmajor`
--

LOCK TABLES `educationmajor` WRITE;
/*!40000 ALTER TABLE `educationmajor` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `educationmajor` VALUES (1,'major',2,0,NULL),(2,'Electronics',2,NULL,NULL),(3,'Computer Science',1,NULL,NULL),(4,'English',4,NULL,NULL),(5,'English',6,NULL,NULL),(6,'EEE',1,NULL,NULL),(7,'Physics',1,NULL,NULL),(8,'Bangla',6,NULL,NULL),(9,'Accounting',7,NULL,NULL),(10,'Phychology',8,NULL,NULL),(11,'Finance',9,NULL,NULL),(12,'HR',9,NULL,NULL),(13,'Marketing',9,NULL,NULL),(14,'Accounting',10,NULL,NULL),(15,'Finance',10,NULL,NULL),(16,'Marketing',10,NULL,NULL),(17,'Others',1,NULL,NULL),(18,'HR',10,NULL,NULL),(19,'Population Sciences',8,1,NULL),(20,'Food and Nutrition',11,NULL,NULL),(21,'test Sub',2,1,NULL),(22,'t',5,0,NULL),(23,'ssd',5,0,NULL),(24,'asasda',5,1,NULL),(25,'asd',5,1,NULL),(26,'vv',5,1,NULL),(27,'t',3,1,NULL),(28,'t',3,0,NULL),(29,'adsda',12,1,NULL),(30,'adsda',13,1,NULL),(31,'sub',14,1,NULL),(32,'wewe',15,1,NULL),(33,'sdf',16,1,NULL),(34,'major sub',17,1,NULL),(35,'major sub',5,1,NULL),(36,'major sub',5,1,NULL),(37,'major sub',5,1,NULL),(38,'erewr',18,1,NULL),(39,'asd',19,1,NULL),(40,'dfg',20,1,NULL),(41,'test',3,1,NULL),(42,'Accountancy',NULL,1,'g'),(43,'Association of Chartered Certified Accountants(ACCA)',NULL,1,'g'),(44,'Accounting',NULL,1,'g'),(45,'Accounting Information Systems',NULL,1,'g'),(46,'Accounting & Information System',NULL,1,'g'),(47,'Agriculture',NULL,1,'g'),(48,'Agro-technology',NULL,1,'g'),(49,'Animal Husbandry',NULL,1,'g'),(50,'Anthropology',NULL,1,'g'),(51,'Applied Chemistry',NULL,1,'g'),(52,'Applied Math',NULL,1,'g'),(53,'Applied Physics',NULL,1,'g'),(54,'Arabic',NULL,1,'g'),(55,'Archaeology',NULL,1,'g'),(56,'Architecture',NULL,1,'g'),(57,'Artificial Intelligence',NULL,1,'g'),(58,'Artificial Intelligence and Robotics',NULL,1,'g'),(59,'Arts',NULL,1,'g'),(60,'Banking ',NULL,1,'g'),(61,'Banking and Insurance',NULL,1,'g'),(62,'Bangali',NULL,1,'g'),(63,'Biochemistry',NULL,1,'g'),(64,'Biochemistry and Biotechnology',NULL,1,'g'),(65,'Biology',NULL,1,'g'),(66,'Biotechnology',NULL,1,'g'),(67,'Botany',NULL,1,'g'),(68,'Brand Management',NULL,1,'g'),(69,'BS in Electronic Media and Flim',NULL,1,'g'),(70,'Chemical Technology/ Engineering',NULL,1,'g'),(71,'Chemistry',NULL,1,'g'),(72,'Civil Engineering',NULL,1,'g'),(73,'Civil and Environmental Engineering',NULL,1,'g'),(74,'Commerce',NULL,1,'g'),(75,'Communication Engineering',NULL,1,'g'),(76,'Computer Applications',NULL,1,'g'),(77,'Computer Science',NULL,1,'g'),(78,'Computer Science & Engineering',NULL,1,'g'),(79,'Computer & Information',NULL,1,'g'),(80,'Computer & Information System',NULL,1,'g'),(81,'Cost & Management Accounting',NULL,1,'g'),(82,'Cost Accounting',NULL,1,'g'),(83,'Criminology',NULL,1,'g'),(84,'Development Studies',NULL,1,'g'),(85,'Disaster Management ',NULL,1,'g'),(86,'Disaster & Emergency Management',NULL,1,'g'),(87,'Economics',NULL,1,'g'),(88,'Education',NULL,1,'g'),(89,'Electrical and Electronics Engineering',NULL,1,'g'),(90,'Electronics',NULL,1,'g'),(91,'Electronics and Telecommunication Engineering',NULL,1,'g'),(92,'Emergency & Disaster Management ',NULL,1,'g'),(93,'English',NULL,1,'g'),(94,'Entrepreneurship',NULL,1,'g'),(95,'Environmnetal Planning',NULL,1,'g'),(96,'Environmental Science',NULL,1,'g'),(97,'Environmental Management',NULL,1,'g'),(98,'Environmental Science and Management',NULL,1,'g'),(99,'Flim and Media',NULL,1,'g'),(100,'Finance',NULL,1,'g'),(101,'Financing & Banking',NULL,1,'g'),(102,'Fine Arts',NULL,1,'g'),(103,'Fishers',NULL,1,'g'),(104,'Forestry',NULL,1,'g'),(105,'Genetics',NULL,1,'g'),(106,'Geography',NULL,1,'g'),(107,'Geography and Environment',NULL,1,'g'),(108,'Geology',NULL,1,'g'),(109,'Government & Politics',NULL,1,'g'),(110,'History',NULL,1,'g'),(111,'Horticulture',NULL,1,'g'),(112,'Hospitality Management',NULL,1,'g'),(113,'Human Resource Management',NULL,1,'g'),(114,'Industrial Management',NULL,1,'g'),(115,'Industrial Relations',NULL,1,'g'),(116,'Information and Communication Technology',NULL,1,'g'),(117,'Information Engineering',NULL,1,'g'),(118,'Information Technology',NULL,1,'g'),(119,'Insurance',NULL,1,'g'),(120,'International Business',NULL,1,'g'),(121,'International Relations',NULL,1,'g'),(122,'Islamic History and Culture',NULL,1,'g'),(123,'Islamic Studies',NULL,1,'g'),(124,'Journalism',NULL,1,'g'),(125,'Journalism for Electronic & Print Media',NULL,1,'g'),(126,'Journalism & Media Studies',NULL,1,'g'),(127,'Law',NULL,1,'g'),(128,'Linguistics',NULL,1,'g'),(129,'Machanical Engineering',NULL,1,'g'),(130,'Management',NULL,1,'g'),(131,'Management Information System',NULL,1,'g'),(132,'Management Studies/ Science',NULL,1,'g'),(133,'Marine Engineering',NULL,1,'g'),(134,'Marketing',NULL,1,'g'),(135,'Mass Communication and Journalism',NULL,1,'g'),(136,'Materials & Metallurgical Engineering',NULL,1,'g'),(137,'Mathematics',NULL,1,'g'),(138,'Medicine',NULL,1,'g'),(139,'Medicine and Surgery',NULL,1,'g'),(140,'Microbiology',NULL,1,'g'),(141,'Nautical Science',NULL,1,'g'),(142,'Naval Architecture and Marine Engineering',NULL,1,'g'),(143,'Nursing',NULL,1,'g'),(144,'Nuclear Engineering',NULL,1,'g'),(145,'Others',NULL,1,'g'),(146,'Personal Management',NULL,1,'g'),(147,'Petroleum and Mimeral Resource Engineering',NULL,1,'g'),(148,'Pharmaceutical Technology',NULL,1,'g'),(149,'Pharmacology',NULL,1,'g'),(150,'Pharmacy',NULL,1,'g'),(151,'Philosophy',NULL,1,'g'),(152,'Physics',NULL,1,'g'),(153,'Political Science',NULL,1,'g'),(154,'Professional Accountancy',NULL,1,'g'),(155,'Psuchology',NULL,1,'g'),(156,'Public Administration',NULL,1,'g'),(157,'Public Health',NULL,1,'g'),(158,'Public Policy & Governance',NULL,1,'g'),(159,'Public Relations',NULL,1,'g'),(160,'Robotics',NULL,1,'g'),(161,'Robotics Engineering',NULL,1,'g'),(162,'Robotics and Mechanical Engineering',NULL,1,'g'),(163,'Rural & Urban Planning',NULL,1,'g'),(164,'Sanskriti & Pali',NULL,1,'g'),(165,'Science',NULL,1,'g'),(166,'Service Marketing',NULL,1,'g'),(167,'Social Science',NULL,1,'g'),(168,'Social Welfare',NULL,1,'g'),(169,'Social Work',NULL,1,'g'),(170,'Sociology',NULL,1,'g'),(171,'Software Engineering',NULL,1,'g'),(172,'Statistics',NULL,1,'g'),(173,'Strategic Management',NULL,1,'g'),(174,'Supply Chain Management',NULL,1,'g'),(175,'Telecommunication',NULL,1,'g'),(176,'Telecommunication Engineering',NULL,1,'g'),(177,'Textile Technology',NULL,1,'g'),(178,'Theatre & Music',NULL,1,'g'),(179,'Tourism & Hotel Management',NULL,1,'g'),(180,'Urban & Persian',NULL,1,'g'),(181,'Veterinary Science',NULL,1,'g'),(182,'Water Resource Engineering',NULL,1,'g'),(183,'Woman Studies',NULL,1,'g'),(184,'World Relations',NULL,1,'g'),(185,'Zoology',NULL,1,'g');
/*!40000 ALTER TABLE `educationmajor` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `educationmajor` with 185 row(s)
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emp_language`
--

LOCK TABLES `emp_language` WRITE;
/*!40000 ALTER TABLE `emp_language` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `emp_language` VALUES (1,1,5,1,'25'),(2,2,5,1,'41'),(3,3,5,1,'59'),(4,7,5,1,'28'),(5,1,1,2,'95'),(6,2,1,2,'100'),(7,3,1,2,'100'),(8,7,1,2,'100');
/*!40000 ALTER TABLE `emp_language` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `emp_language` with 8 row(s)
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emp_other_info`
--

LOCK TABLES `emp_other_info` WRITE;
/*!40000 ALTER TABLE `emp_other_info` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `emp_other_info` VALUES (1,NULL,NULL,NULL,NULL,5),(2,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type a','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the ','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type a','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type a',1);
/*!40000 ALTER TABLE `emp_other_info` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `emp_other_info` with 2 row(s)
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emp_otherskill_achievement`
--

LOCK TABLES `emp_otherskill_achievement` WRITE;
/*!40000 ALTER TABLE `emp_otherskill_achievement` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `emp_otherskill_achievement` VALUES (1,2,5,1),(2,5,5,32);
/*!40000 ALTER TABLE `emp_otherskill_achievement` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `emp_otherskill_achievement` with 2 row(s)
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emp_ques_obj`
--

LOCK TABLES `emp_ques_obj` WRITE;
/*!40000 ALTER TABLE `emp_ques_obj` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `emp_ques_obj` VALUES (1,'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,',1,NULL,'25000','2019-04-01');
/*!40000 ALTER TABLE `emp_ques_obj` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `emp_ques_obj` with 1 row(s)
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
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1=Active,0=inActive',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emp_ques_objective_and_info`
--

LOCK TABLES `emp_ques_objective_and_info` WRITE;
/*!40000 ALTER TABLE `emp_ques_objective_and_info` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `emp_ques_objective_and_info` VALUES (1,'test1',1,1),(2,'test',2,0);
/*!40000 ALTER TABLE `emp_ques_objective_and_info` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `emp_ques_objective_and_info` with 2 row(s)
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emp_ques_objective_and_info_ans`
--

LOCK TABLES `emp_ques_objective_and_info_ans` WRITE;
/*!40000 ALTER TABLE `emp_ques_objective_and_info_ans` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `emp_ques_objective_and_info_ans` VALUES (4,'1123sd',1,5);
/*!40000 ALTER TABLE `emp_ques_objective_and_info_ans` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `emp_ques_objective_and_info_ans` with 1 row(s)
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empcomputerskill`
--

LOCK TABLES `empcomputerskill` WRITE;
/*!40000 ALTER TABLE `empcomputerskill` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `empcomputerskill` VALUES (2,5,1,1),(3,1,2,1);
/*!40000 ALTER TABLE `empcomputerskill` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `empcomputerskill` with 2 row(s)
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
  `skype` varchar(255) DEFAULT NULL,
  `alternativeEmail` varchar(255) DEFAULT NULL,
  `presentAddress` mediumtext,
  `parmanentAddress` mediumtext,
  `image` varchar(255) DEFAULT NULL,
  `sign` varchar(255) DEFAULT NULL,
  `fkzoneId` int(11) DEFAULT NULL,
  `fkuserId` int(11) NOT NULL,
  `cvStatus` int(11) DEFAULT NULL,
  `cvCompletedDate` date DEFAULT NULL,
  `relativeInCB` int(3) DEFAULT '0',
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `employee` VALUES (1,'MD . MUJTABA','RUMI','Md. alauddin','shamim ara nasrin','1994-12-30','M',NULL,1,1,'N',1,'01680674598',NULL,NULL,'016806745981',NULL,'mujtaba.rumi1@gmail.com','Bq12356789',NULL,'mujtaba.rumi1@gmail.com','Shewrapara , Mirpur','Shewrapara , Mirpur','1cvImage.jpg','1cvSign.jpg',NULL,6,1,'2019-03-14',0,1,1,'o+','s',NULL,NULL,0,0,0);
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `employee` with 1 row(s)
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
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`hrId`),
  KEY `fk_HR_user1_idx` (`fkuserId`),
  KEY `fk_HR_zone1_idx` (`fkzoneId`),
  KEY `fk_hr_degisnation1` (`fkdesignationId`),
  CONSTRAINT `fk_hr_degisnation1` FOREIGN KEY (`fkdesignationId`) REFERENCES `designation` (`designationId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_hr_user1` FOREIGN KEY (`fkuserId`) REFERENCES `user` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_hr_zone1` FOREIGN KEY (`fkzoneId`) REFERENCES `zone` (`zoneId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hr`
--

LOCK TABLES `hr` WRITE;
/*!40000 ALTER TABLE `hr` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `hr` VALUES (1,'MD . MUJTABA','RUMI',1,'rumi@gmail.com','01680674598','Shewrapara , Mirpur',9,1,'M',1,'2019-03-12 11:38:05'),(2,'MD . MUJTABA','RUMI',1,'admin1234@gmail.com','01680674598','Shewrapara , Mirpur',10,1,'M',1,'2019-03-13 05:34:13'),(3,'MD . MUJTABA','RUMI',1,'mujtaba.rumi1234@gmail.com','01680674598','Shewrapara , Mirpur',11,1,'M',1,'2019-03-13 05:35:41');
/*!40000 ALTER TABLE `hr` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `hr` with 3 row(s)
--

--
-- Table structure for table `job`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job` (
  `jobId` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `position` varchar(45) DEFAULT NULL,
  `salary` varchar(45) DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `details` longtext,
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job`
--

LOCK TABLES `job` WRITE;
/*!40000 ALTER TABLE `job` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `job` VALUES (1,'test job-1','Hr','5000','2018-08-23',NULL,0,2,6,'2018-09-04 06:44:05',6,'2018-08-13 00:00:00',1,6,'2018-09-27 08:17:58','1jobPdf.pdf'),(2,'test job-2','Hr','100000','2018-08-14','asdasdasdasdasdwewads',1,2,6,'2018-08-13 00:00:00',6,'2018-08-13 00:00:00',1,6,'2018-08-13 00:00:00',NULL),(3,'test','test','456456','2018-09-27','test',1,1,6,'2018-09-04 11:40:58',6,'2018-09-04 09:08:30',1,6,'2018-09-04 11:40:58','3jobPdf.pdf'),(5,'test another job','asdasd','1500','2018-09-29',NULL,1,1,6,'2018-09-29 00:00:00',6,'2018-09-27 08:24:31',1,6,'2018-09-27 08:24:31',NULL),(6,'Accounts Officer','JPO','20000','2018-10-04',NULL,1,2,1,'2018-10-03 05:53:53',1,'2018-10-03 05:53:53',4,1,'2018-10-03 05:53:53',NULL),(7,'Protection for Rohingya Children through','Protection Officer','65000','2018-10-16','Caritas Bangladesh (CB) is looking for suitable candidates (men and women) for immediate\r\nappointment as well as to prepare panel list for Protection for Rohingya Children through\r\nChild Friendly Spaces Project (CFS) and Protection, Empowerment & Resilience for the\r\nRohingya Community Women project (WFS).',1,2,1,'2018-10-11 03:48:20',1,'2018-10-11 03:48:20',4,1,'2018-10-11 03:48:20','7jobPdf.pdf'),(8,'Project Coordinator','Managerial Position','60000','2018-10-19','Major responsibilities: Oversees the psycho-social and Case\r\nManagement services and support in the\r\nWomen Friendly Space (WFS). She/he\r\nwill oversee individual (through the case\r\nmanagement process) and group-based\r\npsycho-social activities for survivors of\r\nGBV. She/he will also oversee\r\ninformation collection and advocacy\r\nrelated to GBV and health gaps and\r\nservices. This position supervises overall\r\nactivities along with the Project Officers,\r\nGBV Case Workers and activities carried\r\nout in safe spaces.\r\n? Report to: To Protection\r\nManager\r\n? Manages: Overall activities of\r\nWomen Friendly Spaces (WFS)\r\n? Duty Station: Ukhiya, Cox`s\r\nBazar\r\nJob Description / Responsibility\r\n? Maintain and manage all\r\nactivities related to the project at\r\nfield level.\r\n? Supervise and monitor the\r\nactivities of all WFS.\r\n? Supervise and monitor the staff\r\n? Report to authority time to time\r\nand as per need.\r\n? Arrange Training and meeting as\r\nper plan and instruction.\r\n? Prepare plan and implement the\r\nactivities as per plan.\r\n? Build good and friendly\r\nrelationship among the staff and\r\ncommunity.\r\n? Maintaining liaison and\r\ncommunication with Local\r\nmanagement, Government and\r\nNGO related sectors.\r\n? Ensure delivery of reports to\r\ndonor in timely manner.\r\n? To analysis the contacts and\r\nchallenges and take prompt\r\ninitiatives to troubleshoot.\r\n? Regularly attend site\r\nmanagement meeting and GBV\r\nsector meeting\r\n? Frequently communicate with\r\nkey stakeholders',1,1,1,'2018-10-11 03:52:29',1,'2018-10-11 03:52:29',5,1,'2018-10-11 03:52:29','8jobPdf.pdf'),(9,'Accounts and Logistic','Mid level','50000','2019-03-31','Job Requirements:\r\n? M.Com/MBA from any\r\nrecognized university.\r\n? Minimum 3 years working\r\nexperience in the similar job\r\nin any reputed\r\norganizations.\r\n? Should be self driven and\r\npositive to work in a team.\r\n? Strong verbal and written\r\nEnglish communication\r\nskills.\r\n? Knowledge on local\r\nlanguage will be given\r\npreference.',1,2,1,'2018-10-11 03:55:36',1,'2018-10-11 03:55:36',1,1,'2019-03-14 07:54:11','9jobPdf.pdf'),(10,'asd','asdasd','1500','2019-03-14','asdasd',2,1,NULL,NULL,1,'2019-03-13 08:16:30',2,1,'2019-03-13 08:16:30',NULL);
/*!40000 ALTER TABLE `job` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `job` with 9 row(s)
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobapply`
--

LOCK TABLES `jobapply` WRITE;
/*!40000 ALTER TABLE `jobapply` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `jobapply` VALUES (1,'2019-03-14',9,1,NULL,NULL,5000,2000,NULL,NULL,NULL);
/*!40000 ALTER TABLE `jobapply` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `jobapply` with 1 row(s)
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
  `address` mediumtext,
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobexperience`
--

LOCK TABLES `jobexperience` WRITE;
/*!40000 ALTER TABLE `jobexperience` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `jobexperience` VALUES (11,'asd','asd','asd','2018-11-19','2018-11-29',5,1,'asd','asdasd','MD . MUJTABA RAFID RUMI','Y','Bodli',NULL),(12,'asd','Try Catch','asdasd','2018-11-25','2018-11-21',5,3,'asdasd','asdasd','MD . MUJTABA RAFID RUMI','Y','Provitionary',NULL);
/*!40000 ALTER TABLE `jobexperience` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `jobexperience` with 2 row(s)
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
INSERT INTO `languagehead` VALUES (1,'Bangla',1),(2,'English',1),(4,'French',1);
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
  `testDetails` text,
  `testDate` date DEFAULT NULL,
  `testAddress` text,
  `tamplateFooterAndSign` longtext,
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
INSERT INTO `mail_tamplate` VALUES (1,'Interview Card','a written test (9.00 a.m. – 11.00 p.m.) and personal\r\ninterview (11.30 a.m. – onward)','2018-11-18','Caritas\nCentral Office, 2, Outer Circular Road, Shantibagh, Dhaka-1217','Sebastian Rozario\nAssistant Executive Director (Finance and Admin.)\nCaritas Bangladesh\n\nCC: ED/ AED (P)\n: Convener, Selection Committee\n: Manager (HR) - Please follow up.',1,'(written test and personal interview) for the post of Manager (WASH)\nunder Caritas Central Office.'),(2,'Not Selected','<p>detais</p>',NULL,NULL,NULL,1,NULL),(3,'Panel Listed',NULL,NULL,NULL,NULL,1,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `membership_social_network`
--

LOCK TABLES `membership_social_network` WRITE;
/*!40000 ALTER TABLE `membership_social_network` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `membership_social_network` VALUES (1,'asd','asd','asd',5),(2,'asd','asd','asd',5);
/*!40000 ALTER TABLE `membership_social_network` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `membership_social_network` with 2 row(s)
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
  `status` tinyint(2) NOT NULL DEFAULT '1' COMMENT '0=Inactive ,1=Active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `otherskillsinformation`
--

LOCK TABLES `otherskillsinformation` WRITE;
/*!40000 ALTER TABLE `otherskillsinformation` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `otherskillsinformation` VALUES (1,'test-3',0),(2,'test-2',1),(4,'ldf',1),(5,'c',1),(6,'asd',1);
/*!40000 ALTER TABLE `otherskillsinformation` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `otherskillsinformation` with 5 row(s)
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
  `currentlyRunning` tinyint(2) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `previous_work_in_caritasbd`
--

LOCK TABLES `previous_work_in_caritasbd` WRITE;
/*!40000 ALTER TABLE `previous_work_in_caritasbd` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `previous_work_in_caritasbd` VALUES (2,'asd','2018-11-06',NULL,5,1);
/*!40000 ALTER TABLE `previous_work_in_caritasbd` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `previous_work_in_caritasbd` with 1 row(s)
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
  `grade` varchar(100) DEFAULT NULL,
  `hour` int(4) DEFAULT NULL,
  `day` int(4) DEFAULT NULL,
  `week` int(4) DEFAULT NULL,
  `month` int(4) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  PRIMARY KEY (`professionalQualificationId`),
  KEY `fk_professionalQualification_employee1_idx` (`fkemployeeId`),
  CONSTRAINT `fk_professionalQualification_employee1` FOREIGN KEY (`fkemployeeId`) REFERENCES `employee` (`employeeId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `professionalqualification`
--

LOCK TABLES `professionalqualification` WRITE;
/*!40000 ALTER TABLE `professionalqualification` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `professionalqualification` VALUES (5,'fsdf','sdf','2018-11-12','2018-11-28',1,'sdf',5,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,'as','asd','2018-11-20','2018-11-29',2,'asd',5,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(7,'test','asd','2018-11-19','2018-11-28',1,'asd',5,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(11,'asd','asd',NULL,NULL,NULL,NULL,1,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `professionalqualification` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `professionalqualification` with 4 row(s)
--

--
-- Table structure for table `referee`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `referee` (
  `refereeId` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(45) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `referee`
--

LOCK TABLES `referee` WRITE;
/*!40000 ALTER TABLE `referee` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `referee` VALUES (13,'MD . MUJTABA123','RUMI','hgj','Try Catch','mujtaba.rumi1@gmail.com','01680674598','erer',5),(14,'rtert123','rt','reter','ererwe','mujtaba.rumi1@gmail.com','54187','ewre',5),(15,'MD . MUJTABA','RUMI',NULL,'Try Catch','mujtaba.rumi1@gmail.com','01680674598','Brother',1),(16,'Sakib','Rahman','S. Software Engineer','TCL','sakib@tcl.com','01654654','Brother',1);
/*!40000 ALTER TABLE `referee` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `referee` with 4 row(s)
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `relativeincb`
--

LOCK TABLES `relativeincb` WRITE;
/*!40000 ALTER TABLE `relativeincb` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `relativeincb` VALUES (4,'MD . MUJTABA1','RUMI','ee',NULL,5),(5,'fgfdg123','dfgdfg','5',NULL,5);
/*!40000 ALTER TABLE `relativeincb` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `relativeincb` with 2 row(s)
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
INSERT INTO `religion` VALUES (1,'Islam',1),(2,'Christianity',1),(3,'Hinduism',1),(4,'Buddhism',1),(5,'Others',NULL);
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
  `page_content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `terms_and_condition`
--

LOCK TABLES `terms_and_condition` WRITE;
/*!40000 ALTER TABLE `terms_and_condition` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `terms_and_condition` VALUES (1,'ss','<p>ss1235465</p>');
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
  `countryId` int(11) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `traning`
--

LOCK TABLES `traning` WRITE;
/*!40000 ALTER TABLE `traning` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `traning` VALUES (8,'gfg','2018-11-21','2018-11-27','dfg',1,5,1,NULL,NULL,NULL,NULL,NULL),(9,'dfg','2018-11-19','2018-11-28','dfgcvb',1,5,1,NULL,NULL,NULL,NULL,NULL),(10,'CCNA','2019-03-01','2019-03-30','AIUB (CEC)',1,1,2,10,6,2,1,1);
/*!40000 ALTER TABLE `traning` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `traning` with 3 row(s)
--

--
-- Table structure for table `type_of_employment`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type_of_employment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employmentTypeName` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT '0=inactive;1=active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_of_employment`
--

LOCK TABLES `type_of_employment` WRITE;
/*!40000 ALTER TABLE `type_of_employment` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `type_of_employment` VALUES (1,'0',1),(2,'asd1235',1),(3,'test',0);
/*!40000 ALTER TABLE `type_of_employment` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `type_of_employment` with 3 row(s)
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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `remember_token` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`userId`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `fk_user_userType_idx` (`fkuserTypeId`),
  CONSTRAINT `fk_user_userType` FOREIGN KEY (`fkuserTypeId`) REFERENCES `usertype` (`userTypeId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `user` VALUES (1,'admin','admin@gmail.com','$2y$10$9bvWIarfmTXlMYnLUNyB/.QZfF19xXIYHEw9fEXA9HVHlNcKPlLn2',NULL,'admin','Y','2019-03-28 10:56:15','bwxpdrk3jZcB6kCmoGuaSBN2aYQ2crQ4lVNWDLwsK2DjTpAcRIE2ZNzpdiw3',NULL),(6,'Sakib Rahman','sakibtcl@gmail.com','$2y$10$z/KBBYCiOUUNgtHhrW.qj.G6oiu75VV5i1atAOwA6ttwOOctZZjd6',NULL,'user','Y','2019-03-28 09:53:52','4O4waAB2tdTAdcX5xYiAUGuWi8YKuzD6Wj7LdSvxiFwRlPgRZHClQhO5khXF',NULL),(9,'MD . MUJTABA','rumi@gmail.com','$2y$10$kJI1E.St7SPQP4Fc6zMg.OYmHUHB6tD1Me0uVTYkZAapMIb02wk0u',NULL,'admin','Y','2019-03-12 11:38:05',NULL,NULL),(10,'MD . MUJTABA','admin123@gmail.com','$2y$10$RvaVcBEEoQ/bXzQzL51cJO6q9OhVQONmjeibMqm6zH.OhXsXf45E2',NULL,'cbEmp','Y','2019-03-13 05:34:13',NULL,NULL),(11,'MD . MUJTABA','mujtaba.rumi1234@gmail.com','$2y$10$GIrKxAJFQ4tRM44.O3.j0.XTYVZoh8YiNGU6Q5wV2hmIsszcBPrqC',NULL,'admin','Y','2019-03-13 09:16:58',NULL,NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `user` with 5 row(s)
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zone`
--

LOCK TABLES `zone` WRITE;
/*!40000 ALTER TABLE `zone` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `zone` VALUES (1,'mirpur',1),(2,'baridhara',1),(3,'Dhanmondi',1),(4,'Dhaka Region',1),(5,'Khulna Region',1),(6,'Rajshahi Region',1),(7,'Barishal Region',1),(8,'Sylhet Region',1),(9,'Dinajpur Region',1);
/*!40000 ALTER TABLE `zone` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `zone` with 9 row(s)
--

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on: Thu, 28 Mar 2019 10:56:38 +0000
