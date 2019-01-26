-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2018 at 09:28 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `caritasbd`
--

-- --------------------------------------------------------

--
-- Table structure for table `aggrement`
--

CREATE TABLE `aggrement` (
  `aggrementId` int(11) NOT NULL,
  `fkaggrementQusId` int(11) NOT NULL,
  `fkuserId` int(11) NOT NULL,
  `ans` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aggrement`
--

INSERT INTO `aggrement` (`aggrementId`, `fkaggrementQusId`, `fkuserId`, `ans`) VALUES
(2, 1, 6, 'Y'),
(3, 2, 6, 'N'),
(4, 3, 6, 'NA'),
(5, 4, 6, 'NA');

-- --------------------------------------------------------

--
-- Table structure for table `aggrementqus`
--

CREATE TABLE `aggrementqus` (
  `aggrementQusId` int(11) NOT NULL,
  `qus` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aggrementqus`
--

INSERT INTO `aggrementqus` (`aggrementQusId`, `qus`) VALUES
(1, 'It is a long established fact that a reader will be distracted ?'),
(2, 'It is a long established fact that a reader will be distracted ?'),
(3, 'It is a long established fact that a reader will be distracted ?'),
(4, 'It is a long established fact that a reader will be distracted ?');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `countryId` int(11) NOT NULL,
  `countryName` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`countryId`, `countryName`) VALUES
(1, 'Bangladesh'),
(2, 'UK');

-- --------------------------------------------------------

--
-- Table structure for table `degree`
--

CREATE TABLE `degree` (
  `degreeId` int(11) NOT NULL,
  `degreeName` varchar(25) DEFAULT NULL,
  `educationLevelId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `degree`
--

INSERT INTO `degree` (`degreeId`, `degreeName`, `educationLevelId`) VALUES
(1, 'bsc in cs', 3);

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `educationId` int(11) NOT NULL,
  `fkdegreeId` int(11) NOT NULL,
  `institutionName` varchar(255) NOT NULL,
  `fkMajorId` int(11) DEFAULT NULL,
  `passingYear` year(4) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `resultSystem` tinyint(2) NOT NULL COMMENT '1=grade,2=division,3=class',
  `result` varchar(8) NOT NULL,
  `resultOutOf` tinyint(3) DEFAULT NULL,
  `educationcol` varchar(45) DEFAULT NULL,
  `fkcountryId` int(11) NOT NULL,
  `fkemployeeId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`educationId`, `fkdegreeId`, `institutionName`, `fkMajorId`, `passingYear`, `status`, `resultSystem`, `result`, `resultOutOf`, `educationcol`, `fkcountryId`, `fkemployeeId`) VALUES
(7, 1, 'asdasdfrsdsdfsdfsdf', NULL, 2015, '1', 2, '6', 8, NULL, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `educationlevel`
--

CREATE TABLE `educationlevel` (
  `educationLevelId` int(11) NOT NULL,
  `educationLevelName` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `educationlevel`
--

INSERT INTO `educationlevel` (`educationLevelId`, `educationLevelName`) VALUES
(1, 'SSC'),
(2, 'HSC'),
(3, 'BSc'),
(4, 'MS'),
(5, 'PhD');

-- --------------------------------------------------------

--
-- Table structure for table `educationmajor`
--

CREATE TABLE `educationmajor` (
  `educationMajorId` int(11) NOT NULL,
  `educationMajorName` varchar(255) DEFAULT NULL,
  `fkDegreeId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `educationmajor`
--

INSERT INTO `educationmajor` (`educationMajorId`, `educationMajorName`, `fkDegreeId`) VALUES
(1, 'major', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employeeId` int(11) NOT NULL,
  `firstName` varchar(50) DEFAULT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `fathersName` varchar(50) DEFAULT NULL,
  `mothersName` varchar(50) DEFAULT NULL,
  `age` int(3) DEFAULT NULL,
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
  `email` varchar(255) DEFAULT NULL,
  `nationalId` varchar(25) DEFAULT NULL,
  `skype` varchar(255) DEFAULT NULL,
  `alternativeEmail` varchar(255) DEFAULT NULL,
  `presentAddress` mediumtext,
  `parmanentAddress` mediumtext,
  `image` varchar(255) DEFAULT NULL,
  `fkzoneId` int(11) DEFAULT NULL,
  `fkuserId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employeeId`, `firstName`, `lastName`, `fathersName`, `mothersName`, `age`, `dateOfBirth`, `gender`, `employeecol1`, `fkreligionId`, `ethnicityId`, `disability`, `fknationalityId`, `telephone`, `homeNumber`, `officeNumber`, `personalMobile`, `email`, `nationalId`, `skype`, `alternativeEmail`, `presentAddress`, `parmanentAddress`, `image`, `fkzoneId`, `fkuserId`) VALUES
(6, 'MD . MUJTABA Rafid', 'RUMI123', 'asd', 'asd1254', NULL, '2018-08-22', 'M', NULL, 1, 1, 'Y', 1, '01680674598', '1680674598', '1680674598', '01680674598', 'mujtaba.rumi1@gmail.com', 'asdasd', 'asd', 'mujtaba.rumi1@gmail.com', 'Shewrapara , Mirpur', 'Shewrapara , Mirpur', '6cvImage.jpg', NULL, 6);

-- --------------------------------------------------------

--
-- Table structure for table `ethnicity`
--

CREATE TABLE `ethnicity` (
  `ethnicityId` int(11) NOT NULL,
  `ethnicityName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ethnicity`
--

INSERT INTO `ethnicity` (`ethnicityId`, `ethnicityName`) VALUES
(1, 'Bangali'),
(2, 'Adibashi');

-- --------------------------------------------------------

--
-- Table structure for table `hr`
--

CREATE TABLE `hr` (
  `hrId` int(11) NOT NULL,
  `firstName` varchar(45) DEFAULT NULL,
  `lastName` varchar(45) DEFAULT NULL,
  `degisnation` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `HRcol` varchar(45) DEFAULT NULL,
  `fkuserId` int(11) NOT NULL,
  `fkzoneId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `jobId` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `position` varchar(45) DEFAULT NULL,
  `salary` varchar(45) DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `details` longtext,
  `status` varchar(10) DEFAULT NULL COMMENT 'post, deavtive',
  `jobstatus` varchar(10) DEFAULT NULL COMMENT 'Full time , part time',
  `postBy` int(11) NOT NULL,
  `postDate` datetime DEFAULT NULL,
  `createBy` int(11) NOT NULL,
  `createDate` datetime DEFAULT NULL,
  `fkzoneId` int(11) NOT NULL,
  `updateBy` int(11) NOT NULL,
  `updateTime` datetime DEFAULT NULL,
  `pdflink` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`jobId`, `title`, `position`, `salary`, `deadline`, `details`, `status`, `jobstatus`, `postBy`, `postDate`, `createBy`, `createDate`, `fkzoneId`, `updateBy`, `updateTime`, `pdflink`) VALUES
(1, 'boom boom', 'Hr', '100000', '2018-08-14', 'asdasdasdasdasdwewads', '1', '2', 6, '2018-08-13 00:00:00', 6, '2018-08-13 00:00:00', 1, 6, '2018-08-13 00:00:00', NULL),
(2, 'boom boom', 'Hr', '100000', '2018-08-14', 'asdasdasdasdasdwewads', '1', '2', 6, '2018-08-13 00:00:00', 6, '2018-08-13 00:00:00', 1, 6, '2018-08-13 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobapply`
--

CREATE TABLE `jobapply` (
  `jobapply` int(11) NOT NULL,
  `applydate` date DEFAULT NULL,
  `fkjobId` int(11) NOT NULL,
  `fkemployeeId` int(11) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `statuschangeBy` int(11) DEFAULT NULL,
  `currentSalary` int(11) DEFAULT NULL,
  `expectedSalary` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobapply`
--

INSERT INTO `jobapply` (`jobapply`, `applydate`, `fkjobId`, `fkemployeeId`, `status`, `statuschangeBy`, `currentSalary`, `expectedSalary`) VALUES
(1, '2018-08-13', 1, 6, '1', 6, 2000, 3600),
(2, '2018-08-13', 1, 6, '1', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobexperience`
--

CREATE TABLE `jobexperience` (
  `jobExperienceId` int(11) NOT NULL,
  `degisnation` varchar(100) DEFAULT NULL,
  `organization` varchar(100) DEFAULT NULL,
  `address` mediumtext,
  `startDate` date DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  `fkemployeeId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobexperience`
--

INSERT INTO `jobexperience` (`jobExperienceId`, `degisnation`, `organization`, `address`, `startDate`, `endDate`, `fkemployeeId`) VALUES
(1, 'asd', 'asd', NULL, '2018-08-22', '2018-08-08', 6),
(2, 'asd', 'asd', 'asd', '2018-08-23', '2018-08-29', 6);

-- --------------------------------------------------------

--
-- Table structure for table `nationality`
--

CREATE TABLE `nationality` (
  `nationalityId` int(11) NOT NULL,
  `nationalityName` varchar(25) DEFAULT NULL,
  `countryName` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nationality`
--

INSERT INTO `nationality` (`nationalityId`, `nationalityName`, `countryName`) VALUES
(1, 'Bangladeshi', 'Bangladesh'),
(2, 'Others', 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `professionalqualification`
--

CREATE TABLE `professionalqualification` (
  `professionalQualificationId` int(11) NOT NULL,
  `certificateName` varchar(100) DEFAULT NULL,
  `institutionName` varchar(255) DEFAULT NULL,
  `startDate` date DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `result` varchar(10) DEFAULT NULL,
  `fkemployeeId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `referee`
--

CREATE TABLE `referee` (
  `refereeId` int(11) NOT NULL,
  `firstName` varchar(45) DEFAULT NULL,
  `lastName` varchar(45) DEFAULT NULL,
  `presentposition` varchar(100) DEFAULT NULL,
  `organization` varchar(100) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `relation` varchar(45) DEFAULT NULL,
  `fkemployeeId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `referee`
--

INSERT INTO `referee` (`refereeId`, `firstName`, `lastName`, `presentposition`, `organization`, `email`, `phone`, `relation`, `fkemployeeId`) VALUES
(1, 'fhg', 'ads', 'asd', 'asd', 'asdas@f.com', '123123', 'saas', 6);

-- --------------------------------------------------------

--
-- Table structure for table `relativeincb`
--

CREATE TABLE `relativeincb` (
  `relativeId` int(11) NOT NULL,
  `Name` varchar(45) DEFAULT NULL,
  `degisnation` varchar(45) DEFAULT NULL,
  `fkemployeeId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `religion`
--

CREATE TABLE `religion` (
  `religionId` int(11) NOT NULL,
  `religionName` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `religion`
--

INSERT INTO `religion` (`religionId`, `religionName`) VALUES
(1, 'Muslim'),
(2, 'Hindu'),
(3, 'Christian'),
(4, 'Buddhist');

-- --------------------------------------------------------

--
-- Table structure for table `traning`
--

CREATE TABLE `traning` (
  `traningId` int(11) NOT NULL,
  `trainingName` varchar(100) DEFAULT NULL,
  `startDate` date DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  `vanue` varchar(255) DEFAULT NULL,
  `countryId` int(11) NOT NULL,
  `fkemployeeId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `traning`
--

INSERT INTO `traning` (`traningId`, `trainingName`, `startDate`, `endDate`, `vanue`, `countryId`, `fkemployeeId`) VALUES
(3, 'asdasd', '2018-08-23', '2018-08-31', 'asd', 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `fkuserTypeId` varchar(5) NOT NULL,
  `register` varchar(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `remember_token` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `name`, `email`, `password`, `status`, `fkuserTypeId`, `register`, `created_at`, `remember_token`, `token`) VALUES
(6, 'MD . MUJTABA RUMI', 'admin@gmail.com', '$2y$10$WlwEGcjEXL5VEFyY.X/9Pu4kPanBAPFCNQjzGH/whgxO5/iMBhnjO', NULL, 'user', 'Y', '2018-08-09 11:42:47', '48C5rPtY97zv9CwHW4PNN3nzYq5bPQiVWyHkuzJKAN5jUBCYvrAxu7c5V2dg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `userTypeId` varchar(5) NOT NULL,
  `userTypeName` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`userTypeId`, `userTypeName`) VALUES
('admin', 'Admin'),
('user', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `zone`
--

CREATE TABLE `zone` (
  `zoneId` int(11) NOT NULL,
  `zoneName` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zone`
--

INSERT INTO `zone` (`zoneId`, `zoneName`) VALUES
(1, 'mirpur'),
(2, 'baridhara');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aggrement`
--
ALTER TABLE `aggrement`
  ADD PRIMARY KEY (`aggrementId`),
  ADD KEY `fk_aggrement_aggrementQus1_idx` (`fkaggrementQusId`),
  ADD KEY `fk_aggrement_user1_idx` (`fkuserId`);

--
-- Indexes for table `aggrementqus`
--
ALTER TABLE `aggrementqus`
  ADD PRIMARY KEY (`aggrementQusId`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`countryId`);

--
-- Indexes for table `degree`
--
ALTER TABLE `degree`
  ADD PRIMARY KEY (`degreeId`),
  ADD UNIQUE KEY `degreeName_UNIQUE` (`degreeName`),
  ADD KEY `fk_educationLevel` (`educationLevelId`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`educationId`),
  ADD KEY `fk_education_degreeId1_idx` (`fkdegreeId`),
  ADD KEY `fk_education_country1_idx` (`fkcountryId`),
  ADD KEY `fk_education_employee1_idx` (`fkemployeeId`),
  ADD KEY `fk_major` (`fkMajorId`);

--
-- Indexes for table `educationlevel`
--
ALTER TABLE `educationlevel`
  ADD PRIMARY KEY (`educationLevelId`);

--
-- Indexes for table `educationmajor`
--
ALTER TABLE `educationmajor`
  ADD PRIMARY KEY (`educationMajorId`),
  ADD KEY `fk_degree` (`fkDegreeId`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employeeId`),
  ADD KEY `fk_employee_religion1_idx` (`fkreligionId`),
  ADD KEY `fk_employee_nationality1_idx` (`fknationalityId`),
  ADD KEY `fk_employee_zone1_idx` (`fkzoneId`),
  ADD KEY `fk_employee_user1_idx` (`fkuserId`),
  ADD KEY `fk_ethnicity` (`ethnicityId`) USING BTREE;

--
-- Indexes for table `ethnicity`
--
ALTER TABLE `ethnicity`
  ADD PRIMARY KEY (`ethnicityId`);

--
-- Indexes for table `hr`
--
ALTER TABLE `hr`
  ADD PRIMARY KEY (`hrId`),
  ADD KEY `fk_HR_user1_idx` (`fkuserId`),
  ADD KEY `fk_HR_zone1_idx` (`fkzoneId`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`jobId`),
  ADD KEY `fk_job_user1_idx` (`postBy`),
  ADD KEY `fk_job_user2_idx` (`createBy`),
  ADD KEY `fk_job_zone1_idx` (`fkzoneId`),
  ADD KEY `fk_job_user3_idx` (`updateBy`);

--
-- Indexes for table `jobapply`
--
ALTER TABLE `jobapply`
  ADD PRIMARY KEY (`jobapply`),
  ADD KEY `fk_jobApply_job1_idx` (`fkjobId`),
  ADD KEY `fk_jobApply_employee1_idx` (`fkemployeeId`),
  ADD KEY `fk_jobApply_user1_idx` (`statuschangeBy`);

--
-- Indexes for table `jobexperience`
--
ALTER TABLE `jobexperience`
  ADD PRIMARY KEY (`jobExperienceId`),
  ADD KEY `fk_jobExperience_employee1_idx` (`fkemployeeId`);

--
-- Indexes for table `nationality`
--
ALTER TABLE `nationality`
  ADD PRIMARY KEY (`nationalityId`),
  ADD UNIQUE KEY `nationalityName_UNIQUE` (`nationalityName`);

--
-- Indexes for table `professionalqualification`
--
ALTER TABLE `professionalqualification`
  ADD PRIMARY KEY (`professionalQualificationId`),
  ADD KEY `fk_professionalQualification_employee1_idx` (`fkemployeeId`);

--
-- Indexes for table `referee`
--
ALTER TABLE `referee`
  ADD PRIMARY KEY (`refereeId`),
  ADD KEY `fk_referees_employee1_idx` (`fkemployeeId`);

--
-- Indexes for table `relativeincb`
--
ALTER TABLE `relativeincb`
  ADD PRIMARY KEY (`relativeId`),
  ADD KEY `fk_relativeInCB_employee1_idx` (`fkemployeeId`);

--
-- Indexes for table `religion`
--
ALTER TABLE `religion`
  ADD PRIMARY KEY (`religionId`);

--
-- Indexes for table `traning`
--
ALTER TABLE `traning`
  ADD PRIMARY KEY (`traningId`),
  ADD KEY `fk_traning_country1_idx` (`countryId`),
  ADD KEY `fk_traning_employee1_idx` (`fkemployeeId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD KEY `fk_user_userType_idx` (`fkuserTypeId`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`userTypeId`);

--
-- Indexes for table `zone`
--
ALTER TABLE `zone`
  ADD PRIMARY KEY (`zoneId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aggrement`
--
ALTER TABLE `aggrement`
  MODIFY `aggrementId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `aggrementqus`
--
ALTER TABLE `aggrementqus`
  MODIFY `aggrementQusId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `countryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `degree`
--
ALTER TABLE `degree`
  MODIFY `degreeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `educationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `educationlevel`
--
ALTER TABLE `educationlevel`
  MODIFY `educationLevelId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `educationmajor`
--
ALTER TABLE `educationmajor`
  MODIFY `educationMajorId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employeeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ethnicity`
--
ALTER TABLE `ethnicity`
  MODIFY `ethnicityId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `hr`
--
ALTER TABLE `hr`
  MODIFY `hrId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `jobId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jobapply`
--
ALTER TABLE `jobapply`
  MODIFY `jobapply` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jobexperience`
--
ALTER TABLE `jobexperience`
  MODIFY `jobExperienceId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `nationality`
--
ALTER TABLE `nationality`
  MODIFY `nationalityId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `professionalqualification`
--
ALTER TABLE `professionalqualification`
  MODIFY `professionalQualificationId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `referee`
--
ALTER TABLE `referee`
  MODIFY `refereeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `relativeincb`
--
ALTER TABLE `relativeincb`
  MODIFY `relativeId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `religion`
--
ALTER TABLE `religion`
  MODIFY `religionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `traning`
--
ALTER TABLE `traning`
  MODIFY `traningId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `aggrement`
--
ALTER TABLE `aggrement`
  ADD CONSTRAINT `fk_aggrement_aggrementQus1` FOREIGN KEY (`fkaggrementQusId`) REFERENCES `aggrementqus` (`aggrementQusId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_aggrement_user1` FOREIGN KEY (`fkuserId`) REFERENCES `user` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `degree`
--
ALTER TABLE `degree`
  ADD CONSTRAINT `fk_education_level_id` FOREIGN KEY (`educationLevelId`) REFERENCES `educationlevel` (`educationLevelId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `fk_education_country1` FOREIGN KEY (`fkcountryId`) REFERENCES `country` (`countryId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_education_degreeId1` FOREIGN KEY (`fkdegreeId`) REFERENCES `degree` (`degreeId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_education_employee1` FOREIGN KEY (`fkemployeeId`) REFERENCES `employee` (`employeeId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_education_major` FOREIGN KEY (`fkMajorId`) REFERENCES `educationmajor` (`educationMajorId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `educationmajor`
--
ALTER TABLE `educationmajor`
  ADD CONSTRAINT `fk_degree_id` FOREIGN KEY (`fkDegreeId`) REFERENCES `degree` (`degreeId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `fk_employee_ethincity` FOREIGN KEY (`ethnicityId`) REFERENCES `ethnicity` (`ethnicityId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_employee_nationality1` FOREIGN KEY (`fknationalityId`) REFERENCES `nationality` (`nationalityId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_employee_religion1` FOREIGN KEY (`fkreligionId`) REFERENCES `religion` (`religionId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_employee_user1` FOREIGN KEY (`fkuserId`) REFERENCES `user` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_employee_zone1` FOREIGN KEY (`fkzoneId`) REFERENCES `zone` (`zoneId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hr`
--
ALTER TABLE `hr`
  ADD CONSTRAINT `fk_HR_user1` FOREIGN KEY (`fkuserId`) REFERENCES `user` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_HR_zone1` FOREIGN KEY (`fkzoneId`) REFERENCES `zone` (`zoneId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `fk_job_user1` FOREIGN KEY (`postBy`) REFERENCES `user` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_job_user2` FOREIGN KEY (`createBy`) REFERENCES `user` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_job_user3` FOREIGN KEY (`updateBy`) REFERENCES `user` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_job_zone1` FOREIGN KEY (`fkzoneId`) REFERENCES `zone` (`zoneId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `jobapply`
--
ALTER TABLE `jobapply`
  ADD CONSTRAINT `fk_jobApply_employee1` FOREIGN KEY (`fkemployeeId`) REFERENCES `employee` (`employeeId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_jobApply_job1` FOREIGN KEY (`fkjobId`) REFERENCES `job` (`jobId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_jobApply_user1` FOREIGN KEY (`statuschangeBy`) REFERENCES `user` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `jobexperience`
--
ALTER TABLE `jobexperience`
  ADD CONSTRAINT `fk_jobExperience_employee1` FOREIGN KEY (`fkemployeeId`) REFERENCES `employee` (`employeeId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `professionalqualification`
--
ALTER TABLE `professionalqualification`
  ADD CONSTRAINT `fk_professionalQualification_employee1` FOREIGN KEY (`fkemployeeId`) REFERENCES `employee` (`employeeId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `referee`
--
ALTER TABLE `referee`
  ADD CONSTRAINT `fk_referees_employee1` FOREIGN KEY (`fkemployeeId`) REFERENCES `employee` (`employeeId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `relativeincb`
--
ALTER TABLE `relativeincb`
  ADD CONSTRAINT `fk_relativeInCB_employee1` FOREIGN KEY (`fkemployeeId`) REFERENCES `employee` (`employeeId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `traning`
--
ALTER TABLE `traning`
  ADD CONSTRAINT `fk_traning_country1` FOREIGN KEY (`countryId`) REFERENCES `country` (`countryId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_traning_employee1` FOREIGN KEY (`fkemployeeId`) REFERENCES `employee` (`employeeId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_userType` FOREIGN KEY (`fkuserTypeId`) REFERENCES `usertype` (`userTypeId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
