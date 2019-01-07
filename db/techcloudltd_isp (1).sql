-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 07, 2019 at 03:52 AM
-- Server version: 10.1.37-MariaDB-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `techcloudltd_isp`
--

-- --------------------------------------------------------

--
-- Table structure for table `cablepackage`
--

CREATE TABLE `cablepackage` (
  `cablepackageId` int(11) NOT NULL,
  `cablepackageName` varchar(128) DEFAULT NULL,
  `price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cablepackage`
--

INSERT INTO `cablepackage` (`cablepackageId`, `cablepackageName`, `price`) VALUES
(1, 'test', 500),
(2, 'test4', 500);

-- --------------------------------------------------------

--
-- Table structure for table `cable_bill`
--

CREATE TABLE `cable_bill` (
  `billId` int(11) NOT NULL,
  `billdate` date DEFAULT NULL,
  `price` float DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  `fkclientId` int(11) NOT NULL,
  `receivedBy` int(11) DEFAULT NULL,
  `receiveDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cable_client`
--

CREATE TABLE `cable_client` (
  `clientId` int(11) NOT NULL,
  `clientFirstName` varchar(45) DEFAULT NULL,
  `clientLastName` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `clientImage` varchar(255) DEFAULT NULL,
  `clientNID` varchar(20) DEFAULT NULL,
  `fkconnectionTypeId` int(11) DEFAULT NULL,
  `clientPassport` varchar(20) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `address` mediumtext,
  `fkpackageId` int(11) DEFAULT NULL,
  `clientSerial` varchar(100) DEFAULT NULL,
  `cableLength` int(11) DEFAULT NULL,
  `noOfTv` int(11) DEFAULT NULL,
  `conDate` date DEFAULT NULL,
  `clientStatus` int(11) DEFAULT NULL COMMENT '0=delete,1=inactive,2=active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cable_client`
--

INSERT INTO `cable_client` (`clientId`, `clientFirstName`, `clientLastName`, `email`, `phone`, `clientImage`, `clientNID`, `fkconnectionTypeId`, `clientPassport`, `price`, `address`, `fkpackageId`, `clientSerial`, `cableLength`, `noOfTv`, `conDate`, `clientStatus`, `created_at`) VALUES
(1, 'Mr Choton', 'Mr Choton', NULL, '', NULL, NULL, NULL, NULL, NULL, '17/F, 2nd Floor, Left', NULL, 'RU-15/01', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(2, 'Mr Choton', 'Mr Choton', NULL, '1675841958', NULL, NULL, NULL, NULL, NULL, '17/F, 1st Floor, Left', NULL, 'RU-24A/02', 0, 0, '2013-03-18', 2, '2019-01-07 08:25:23'),
(3, 'Mr Fazlur', ' Rahman', NULL, '1720509181', NULL, NULL, NULL, NULL, NULL, '17/F, 3rd Floor, Right', NULL, 'RU-25A/03', 0, 0, '2013-03-18', 2, '2019-01-07 08:25:23'),
(4, '', '', NULL, '', NULL, NULL, NULL, NULL, NULL, '17/F, 6th Floor, Left', NULL, 'RU-27/04', 0, 0, '2013-03-18', 2, '2019-01-07 08:25:23'),
(5, 'Rasna', 'Rasna', NULL, '', NULL, NULL, NULL, NULL, NULL, '17/E/3, 2nd Floor, North', NULL, 'RU-04/05', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(6, 'Nurzahan', ' Begum', NULL, '', NULL, NULL, NULL, NULL, NULL, '17/E/3, 1st Floor, Right', NULL, 'RU-02/06', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(7, 'Mr Omor', ' Faruk', NULL, '1717677164', NULL, NULL, NULL, NULL, NULL, '17/E/3, 2nd Floor, South', NULL, 'RU-05/07', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(8, 'Mr Monjur', ' Rahman', NULL, '1963890214', NULL, NULL, NULL, NULL, NULL, '17/E/3, 3rd Floor, St', NULL, 'RU-06/08', 0, 0, '2012-05-18', 2, '2019-01-07 08:25:23'),
(9, 'Mrs Nurjahan', ' Khalamma', NULL, '', NULL, NULL, NULL, NULL, NULL, '17/E/3, 4th Floor, St', NULL, 'RU-07/09', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(10, 'Mr Omor ', 'Chakrabarty', NULL, '', NULL, NULL, NULL, NULL, NULL, '17/E', NULL, 'RU-08/10', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(11, 'Mr Mithu/', 'Shahadat', NULL, '1811128008', NULL, NULL, NULL, NULL, NULL, '17/E/6, GFFloor, Right', NULL, 'RU-09/11', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(12, 'Mr Mohidul', ' Islam', NULL, '1623141782', NULL, NULL, NULL, NULL, NULL, '17/E/6, 1st Floor, Left', NULL, 'RU-10/12', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(13, 'Mr Ruhul', 'Amin', NULL, '1920702670', NULL, NULL, NULL, NULL, NULL, '17/E/6, 1st Floor, LF', NULL, 'RU-11/13', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(14, 'Mr Abdur ', 'Rahim', NULL, '1718779092', NULL, NULL, NULL, NULL, NULL, '17/E/6, 2nd Floor, Left', NULL, 'RU-12/14', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(15, 'Mr Sujon', 'Mr Sujon', NULL, '1727776712', NULL, NULL, NULL, NULL, NULL, '17/E/6, 3rd Floor, Right ', NULL, 'RU-13/15', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(16, 'Arian', 'Arian', NULL, '', NULL, NULL, NULL, NULL, NULL, '17/E/6, 4th Floor, Left', NULL, 'RU-14/16', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(17, 'Mr Tipu', 'Mr Tipu', NULL, '1919241112', NULL, NULL, NULL, NULL, NULL, '17/E/7, 1st Floor, Right', NULL, 'RU-16/17', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(18, 'Mis. Sirin ', 'Akter', NULL, '1624739641', NULL, NULL, NULL, NULL, NULL, '17/E/7, 2nd Floor, Right', NULL, 'RU-17/18', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(19, 'Mrs. Salma ', 'Akter', NULL, '1919152602', NULL, NULL, NULL, NULL, NULL, '17/E/7, 4th Floor,', NULL, 'RU-18/19', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(20, 'Mr Golam Mohammad', ' Jewel', NULL, '19150938704', NULL, NULL, NULL, NULL, NULL, '17/D/2, G Floor, RI', NULL, 'RU-20/20', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(21, 'Mr Shaifur ', 'Rahman', NULL, '1745693840', NULL, NULL, NULL, NULL, NULL, '17/D/2, 1st Floor, Right', NULL, 'RU-22/22', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(22, 'Mr Mamun', 'Mr Mamun', NULL, '1926717589', NULL, NULL, NULL, NULL, NULL, '17/D/2, 2nd Floor, RI', NULL, 'RU-23/23', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(23, 'Mr H.M ', 'Shoyeb', NULL, '1752777225', NULL, NULL, NULL, NULL, NULL, '17/D/2, 3rd Floor', NULL, 'RU-24/24', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(24, 'Mr Royal', 'Mr Royal', NULL, '1962328441', NULL, NULL, NULL, NULL, NULL, '17/F, 3rd, LF', NULL, 'RU-25/25', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(25, 'Mr Jalal ', 'Ahamed', NULL, '1911166532', NULL, NULL, NULL, NULL, NULL, '17/F, 5th Floor', NULL, 'RU-26/26', 0, 0, '0006-02-18', 2, '2019-01-07 08:25:23'),
(26, 'Mr Royal', 'Mr Royal', NULL, '1962328441', NULL, NULL, NULL, NULL, NULL, '17/F, 3rd, LF', NULL, 'RU-25/25', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(27, 'Mr Robiul', ' Islam', NULL, '', NULL, NULL, NULL, NULL, NULL, '15/9/F/1, A-1', NULL, 'S - 44B/01', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(28, 'Mr Jakir ', 'Hossain', NULL, '1819670784', NULL, NULL, NULL, NULL, NULL, '15/9/F/1, B-1', NULL, 'S - 3A/02', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(29, 'Mr Firoj', 'Mr Firoj', NULL, '1985723993', NULL, NULL, NULL, NULL, NULL, '15/9/F/1, C-1', NULL, 'S - 2A/03', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(30, 'Mr Morshed', ' Faruki', NULL, '1711281733', NULL, NULL, NULL, NULL, NULL, '15/9/F/1, A-2', NULL, 'S - 4A/04', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(31, 'Mr Afjal', 'Mr Afjal', NULL, '1727456456', NULL, NULL, NULL, NULL, NULL, '15/9/F/1, C-2', NULL, 'S - 5A/05', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(32, 'Mr Jamal ', 'Razzak', NULL, '1713092919', NULL, NULL, NULL, NULL, NULL, '15/9/F/1, C-3', NULL, 'S - 6A/06', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(33, 'Mr Shafiq', 'Mr Shafiq', NULL, '1819210496', NULL, NULL, NULL, NULL, NULL, '15/9/F/1, A-3', NULL, 'S - 7A/07  ', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(34, 'Mr Khaled ', 'Parvez', NULL, '1716361528', NULL, NULL, NULL, NULL, NULL, '15/9/F/1, A-4', NULL, ' S - 8A/08   ', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(35, 'Mr Samsus', ' Saberin', NULL, '1818386989', NULL, NULL, NULL, NULL, NULL, '15/9/F/1, B-4, Right', NULL, 'S - 9A/09 ', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(36, 'Mr Mosarof/', 'Tamanna', NULL, '', NULL, NULL, NULL, NULL, NULL, '15/9/F/1, C-4', NULL, 'S - 10A/10', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(37, 'Mr Sarafat ', 'Ali', NULL, '1818386989', NULL, NULL, NULL, NULL, NULL, '15/9/F/1, A-5', NULL, 'S - 12A/11', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(38, 'Mr Farid ', 'Uddin', NULL, '', NULL, NULL, NULL, NULL, NULL, '15/9/F/1, B-5', NULL, 'S - 13A/12', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(39, 'Mr Shofiqul ', 'Islam', NULL, '1915226945', NULL, NULL, NULL, NULL, NULL, '15/9/F/1, C-5', NULL, 'S - 1A/13', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(40, 'Mr Nurul ', 'Alom', NULL, '1711110824', NULL, NULL, NULL, NULL, NULL, '15/9/F/1, B-6', NULL, 'S - 9A/14', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(41, 'Mrs Anjumara', ' Begum', NULL, '', NULL, NULL, NULL, NULL, NULL, '15/9/F/1, C-6', NULL, 'S - 14A/15', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(42, 'Mr Sarwar ', 'Hossain', NULL, '', NULL, NULL, NULL, NULL, NULL, '15/9/F/1, A-7', NULL, 'S - 15A/16', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(43, '', '', NULL, '', NULL, NULL, NULL, NULL, NULL, '15/9/F/1, C-7', NULL, 'S - 01/17', 0, 1, '0000-00-00', 2, '2019-01-07 08:25:23'),
(44, 'Mr. Kamrul', ' Islam', NULL, '1734919217', NULL, NULL, NULL, NULL, NULL, '15/9/2/D, GF,', NULL, 'S - 02/18', 0, 0, '0002-04-17', 2, '2019-01-07 08:25:23'),
(45, 'Mr Mamun ', 'Kobir', NULL, '1711362234', NULL, NULL, NULL, NULL, NULL, '15/9/F/2, 1st Floor', NULL, 'S-03/19', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(46, 'Mr Zia-', 'ul', NULL, '1711083203', NULL, NULL, NULL, NULL, NULL, '15/9/F/2, 2nd Floor, LF', NULL, 'S-04/20', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(47, 'Mr Nisa ', 'Olid', NULL, '1819252841', NULL, NULL, NULL, NULL, NULL, '15/9/F/2, 4th Floor, RI', NULL, 'S-05/21', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(48, 'Mr. Meherab', 'Mr. Meherab', NULL, '1916896193', NULL, NULL, NULL, NULL, NULL, '15/9/F/2, 4th, Left', NULL, 'S - 06/22', 0, 0, '0004-02-17', 2, '2019-01-07 08:25:23'),
(49, 'Mr. Anamul', 'Mr. Anamul', NULL, '', NULL, NULL, NULL, NULL, NULL, '15/9/F/2, 5th, Left', NULL, 'S - 8A/23', 0, 0, '0004-02-17', 2, '2019-01-07 08:25:23'),
(50, 'Mrs Niher ', 'Parveen', NULL, '1747992603', NULL, NULL, NULL, NULL, NULL, '15/9/F/2, 5th Floor', NULL, 'S-08/24', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(51, 'Zinius ', 'School', NULL, '1819194239', NULL, NULL, NULL, NULL, NULL, '15/9/E, G Floor', NULL, 'S-09/25', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(52, 'Begum', ' Sultana', NULL, '1930378645', NULL, NULL, NULL, NULL, NULL, '15/9/E, 3rd Floor, C-1', NULL, 'S-10/26', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(53, 'Mr. Jalal ', 'Ahamed', NULL, '', NULL, NULL, NULL, NULL, NULL, '15/9/E, 3rd, C-3', NULL, 'S - 11/27', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(54, 'Mr Safa', 'Mr Safa', NULL, '1712292188', NULL, NULL, NULL, NULL, NULL, '15/9/E, 4th Floor, D-2', NULL, 'S-12/28', 0, 2, '0000-00-00', 2, '2019-01-07 08:25:23'),
(55, 'Mr Anower', 'Mr Anower', NULL, '1797262459', NULL, NULL, NULL, NULL, NULL, '15/9/E, 4th Floor, North, D-3', NULL, 'S-13/29', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(56, 'Mr Mostak', 'Mr Mostak', NULL, '1729848476', NULL, NULL, NULL, NULL, NULL, '15/9/E, 5th Floor, South', NULL, 'S-14/30', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(57, 'Mr. Sonil', 'Mr. Sonil', NULL, '', NULL, NULL, NULL, NULL, NULL, '15/9/E, 5th, RI', NULL, 'S - 15/31', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(58, 'House ', 'Owner', NULL, '', NULL, NULL, NULL, NULL, NULL, '15/9/D, A-1', NULL, 'S-1/32', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(59, 'Mr Shohag', ' Hossain', NULL, '', NULL, NULL, NULL, NULL, NULL, '15/9/D, A-2', NULL, 'S-16H/33', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(60, 'Mr Sojib', 'Mr Sojib', NULL, '', NULL, NULL, NULL, NULL, NULL, '15/9/D, B-2', NULL, 'S-16G/34', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(61, 'Mr Marof', 'Mr Marof', NULL, '', NULL, NULL, NULL, NULL, NULL, '15/9/D, B-3', NULL, 'S-16F/35', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(62, 'Mr Khorsadul', ' Alam', NULL, '', NULL, NULL, NULL, NULL, NULL, '15/9/D, A-5', NULL, 'S-16J/36', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(63, 'Mr Mahin', 'Mr Mahin', NULL, '1711239432', NULL, NULL, NULL, NULL, NULL, '15/9/D, B-6', NULL, 'S-16B/37', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(64, 'Mr Naseem', 'Mr Naseem', NULL, '1671074765', NULL, NULL, NULL, NULL, NULL, '15/9/D, A-3', NULL, 'S-16E/38', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(65, 'Mr Faruk ', 'Ahamed', NULL, '', NULL, NULL, NULL, NULL, NULL, '15/9/D, A-4', NULL, 'S-16D/39', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(66, 'Mr Romen', ' Islam', NULL, '1689444085', NULL, NULL, NULL, NULL, NULL, '15/9/D, A-6', NULL, 'S-16C/40', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(67, 'Mr Kamal', 'Mr Kamal', NULL, '1819290112', NULL, NULL, NULL, NULL, NULL, '15/9/C, G Floor', NULL, 'S-17/41', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(68, 'Mr Saiful ', 'Islam', NULL, '1797245245', NULL, NULL, NULL, NULL, NULL, '15/9/C, 1st Floor, South', NULL, 'S-18/42', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(69, 'Mr Rana', 'Mr Rana', NULL, '1713489631', NULL, NULL, NULL, NULL, NULL, '15/9/C, 1st Floor, North', NULL, 'S-19/43', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(70, 'Mr Tarikul ', 'Islam', NULL, '1554324401', NULL, NULL, NULL, NULL, NULL, '15/9/C, 1st Floor, Gha', NULL, 'S-19A/44', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(71, 'Mr Rezaul ', 'Karim', NULL, '1614324401', NULL, NULL, NULL, NULL, NULL, '15/9/C,1st Floor, F-Ka', NULL, 'S - 112/45', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(72, 'Mr Tipu', 'Mr Tipu', NULL, '1730429233', NULL, NULL, NULL, NULL, NULL, '15/9/C, 2nd Floor, LF, ka', NULL, 'S-20/46', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(73, 'Taj', 'Taj', NULL, '1617134574', NULL, NULL, NULL, NULL, NULL, '15/9/C, 2nd Floor, Gha', NULL, 'S-21/47', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(74, 'Mr Foyel', 'Mr Foyel', NULL, '', NULL, NULL, NULL, NULL, NULL, '15/9/C, 3-Kha', NULL, 'S-22/48', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(75, 'Mr Akbor', 'Mr Akbor', NULL, '1929988950', NULL, NULL, NULL, NULL, NULL, '15/9/C, 3rd Floor, Ka, North', NULL, 'S-23/49', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(76, 'Mr Dilip', 'Mr Dilip', NULL, '1713906741', NULL, NULL, NULL, NULL, NULL, '15/9/C, 3rd Floor 4-Kha', NULL, 'S-24/50', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(77, 'Mr Khairul', 'Mr Khairul', NULL, '1713269201', NULL, NULL, NULL, NULL, NULL, '15/9/C, F-4, Gha', NULL, 'S-24B/51', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(78, 'Mr Jahangir', ' Alom', NULL, '', NULL, NULL, NULL, NULL, NULL, '15/9/C, F-4, Ghaa', NULL, 'S-24A/52', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(79, 'Miss Makul', 'Miss Makul', NULL, '1845746018', NULL, NULL, NULL, NULL, NULL, '15/9/C, 4th Floor, Gha', NULL, 'S-25/53', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(80, 'Mr. Alomgir ', 'Hossain', NULL, '', NULL, NULL, NULL, NULL, NULL, '15/9/C, 5/ka', NULL, 'S - 26/54', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(81, 'Mr Sarwar', 'Mr Sarwar', NULL, '1715028362', NULL, NULL, NULL, NULL, NULL, '15/9/C, 4th Floor, 5-Kha', NULL, 'S-27/55', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(82, ' Laki', ' Laki', NULL, '1985134544', NULL, NULL, NULL, NULL, NULL, ' 15/9/C, 5-Ghaa', NULL, 'S-28/56', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(83, 'Mr M A ', 'Mannan', NULL, '174260044', NULL, NULL, NULL, NULL, NULL, '15/9/C, 6/Ka', NULL, 'S-29/57', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(84, 'Mr Jony', 'Mr Jony', NULL, '1678023708', NULL, NULL, NULL, NULL, NULL, '15/9/C, 6/Gha', NULL, 'S-30/58', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(85, 'Mr. Minto', 'Mr. Minto', NULL, '1713026985', NULL, NULL, NULL, NULL, NULL, '15/9/C, 5th Floor', NULL, 'S-31/59', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(86, 'Mr Rakib', 'Mr Rakib', NULL, '1629432407', NULL, NULL, NULL, NULL, NULL, '15/9/C, 6-Ghaa', NULL, 'S-32/60', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(87, 'Mr Alom', 'Mr Alom', NULL, '', NULL, NULL, NULL, NULL, NULL, '15/9/C, 6th Floor', NULL, 'S-16A/61', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(88, 'Mr Jakir', 'Mr Jakir', NULL, '1916062499', NULL, NULL, NULL, NULL, NULL, ' 15/9/C, 6th Floor', NULL, 'S-33/62', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(89, 'Mr Asad', 'Mr Asad', NULL, '1741724219', NULL, NULL, NULL, NULL, NULL, '15/9/B, G Floor', NULL, 'S-34B/63', 0, 0, '0002-06-18', 2, '2019-01-07 08:25:23'),
(90, 'Mr Jahid', 'Mr Jahid', NULL, '', NULL, NULL, NULL, NULL, NULL, ' 15/9/B, G Floor, Teenset', NULL, 'S-34A/64', 0, 0, '0002-06-18', 2, '2019-01-07 08:25:23'),
(91, 'Mr Tipu', 'Mr Tipu', NULL, '', NULL, NULL, NULL, NULL, NULL, '15/9/B, 1st Floor', NULL, 'S-35/65', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(92, 'Mr. Shanto', 'Mr. Shanto', NULL, '', NULL, NULL, NULL, NULL, NULL, '15/9/B, 2nd Floor', NULL, 'S - 34/66', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(93, 'Mr Alif', 'Mr Alif', NULL, '1717353486', NULL, NULL, NULL, NULL, NULL, '15/9, 1st Floor, LF', NULL, 'S-37/67', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(94, 'Mr Shohoral ', 'Hossain', NULL, '1552559245', NULL, NULL, NULL, NULL, NULL, '15/9, G Floor', NULL, 'S-36/68', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(95, 'Mr.Kaykobad', 'Mr.Kaykobad', NULL, '1712692271', NULL, NULL, NULL, NULL, NULL, '15/9, 2nd  Floor, LF', NULL, 'S-38/69', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(96, 'Mrs Sormee', 'Mrs Sormee', NULL, '1922524241', NULL, NULL, NULL, NULL, NULL, '15/9/A, 3rd Floor', NULL, 'S-145/70', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(97, 'Abdur Rashid ', 'Sarker', NULL, '1739492010', NULL, NULL, NULL, NULL, NULL, '15/9, 2nd Floor', NULL, 'S-39/71', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(98, 'Mr Masum', 'Mr Masum', NULL, '179305209', NULL, NULL, NULL, NULL, NULL, '15/9/A, 3rd Floor', NULL, 'S-86A/72', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(99, 'Mrs. Shema', 'Mrs. Shema', NULL, '', NULL, NULL, NULL, NULL, NULL, '15/9, 3rd, LF', NULL, 'S - 40/73', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(100, 'Mr. Belal ', 'Uddin', NULL, '', NULL, NULL, NULL, NULL, NULL, '15/9, 3rd Floor', NULL, 'S - 41/74', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(101, 'Mr Sabbir', 'Mr Sabbir', NULL, '', NULL, NULL, NULL, NULL, NULL, '15/9/1/A, ', NULL, 'S - 42/75', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(102, 'Mr. Rafiq ', 'Ahamed', NULL, '171529367', NULL, NULL, NULL, NULL, NULL, '15/9/1/A, 1st Floor, RI', NULL, 'S-43/76', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(103, 'Mr Srabony', 'Mr Srabony', NULL, '1819160010', NULL, NULL, NULL, NULL, NULL, '15/9/1/A, 2nd  Floor', NULL, 'S-44/77', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(104, 'Mrs. Nowroje ', 'Shahabuddin', NULL, '1711543239', NULL, NULL, NULL, NULL, NULL, '15/10/Ka, 1st  Floor', NULL, 'S-45/78', 0, 3, '0000-00-00', 2, '2019-01-07 08:25:23'),
(105, 'Mr Monir ', 'Hossain', NULL, '1911939252', NULL, NULL, NULL, NULL, NULL, ' 15/10/ka, 2nd  Floor, LF', NULL, 'S-46/79', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(106, 'Mr Sahed ', 'Hasan', NULL, '1610004060', NULL, NULL, NULL, NULL, NULL, '15/10/Ka, 2nd Floor, RI', NULL, 'S-47/80', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(107, 'Mr Mamunur ', 'Rashid ', NULL, '1787676045', NULL, NULL, NULL, NULL, NULL, '15/10/Ka, 3rd Floor, LF', NULL, 'S-48/81', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(108, 'Mr Maruf ul ', 'Kader', NULL, '', NULL, NULL, NULL, NULL, NULL, '15/10/Ka, 3rd Floor', NULL, 'S - 49/82', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(109, 'Mr Habib', 'Mr Habib', NULL, '', NULL, NULL, NULL, NULL, NULL, '15/10/Ka, 4th Floor, LF', NULL, 'S -50A/83', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(110, 'Mr Rasel', 'Mr Rasel', NULL, '1718020446', NULL, NULL, NULL, NULL, NULL, '15/10/Ka, 4th Floor, RI', NULL, 'S-50/84', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(111, 'Mr Likhon', 'Mr Likhon', NULL, '1711141471', NULL, NULL, NULL, NULL, NULL, '15/10/ka, 5th Floor, LF', NULL, 'S-51/85', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(112, 'Mr Alom', 'Mr Alom', NULL, '1994765055', NULL, NULL, NULL, NULL, NULL, '15/10/A, G Floor', NULL, 'S - 52/86', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(113, 'Mr Muklesur ', 'Rahman', NULL, '1632370028', NULL, NULL, NULL, NULL, NULL, '15/11/1, GF', NULL, 'S - 56/87', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(114, 'Mr Lutfor ', 'Rahman', NULL, '1720039331', NULL, NULL, NULL, NULL, NULL, '15/11/1, G Floor', NULL, 'S-57/88', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(115, 'S.I Mahfujur ', 'Rahman', NULL, '1717428580', NULL, NULL, NULL, NULL, NULL, '15/11/1, 1st Floor, RT', NULL, 'S-58/89', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(116, 'Mr Aminul ', 'Islam', NULL, '1930248224', NULL, NULL, NULL, NULL, NULL, '15/11/1, 1st Floor, LF', NULL, 'S-59/90', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(117, 'Mr Maksudur', ' Rahman', NULL, '1726269074', NULL, NULL, NULL, NULL, NULL, '15/11/1, 1st Floor, RI', NULL, 'S-60/91', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(118, 'Mr Linkon', 'Mr Linkon', NULL, '', NULL, NULL, NULL, NULL, NULL, '15/11/2, 1st fl Left, Street', NULL, 'S-62/92', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(119, 'Mr. Sonkor ', 'Shaha', NULL, '1711522844', NULL, NULL, NULL, NULL, NULL, '15/11/2, 1st fl Left', NULL, 'S-61/93', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(120, 'Akram\'s ', 'Sister', NULL, '1914008447', NULL, NULL, NULL, NULL, NULL, '15/11/2, 1st fl ', NULL, 'S-94', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(121, 'Mr Azad', 'Mr Azad', NULL, '1712929239', NULL, NULL, NULL, NULL, NULL, '15/11/2, 1st Floor, Right', NULL, 'S-71/95', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(122, 'Mr Abdur ', 'Razzak', NULL, '', NULL, NULL, NULL, NULL, NULL, '15/11/2, A-2, 2nd Floor, Ri', NULL, 'S - 63/96', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(123, 'Mr Anower ', 'Islam', NULL, '1927158513', NULL, NULL, NULL, NULL, NULL, '15/11/2, 3rd Floor, Street', NULL, 'S-70/97', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(124, 'Mr Julhash', 'Mr Julhash', NULL, '1912151016', NULL, NULL, NULL, NULL, NULL, '15/11/2, 3rd Floor', NULL, 'S-64/98', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(125, 'Mr Atik ', 'Hasan', NULL, '1966602216', NULL, NULL, NULL, NULL, NULL, '15/11/2, 4th Floor, A-5', NULL, 'S - 66/99', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(126, 'Mr. Mainul ', 'Islam', NULL, '184110258', NULL, NULL, NULL, NULL, NULL, '15/11/2, 4th Floor, C-5', NULL, 'S-69/100', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(127, 'Mrs Samima', 'Mrs Samima', NULL, '1826055805', NULL, NULL, NULL, NULL, NULL, '15/11/2, 4th Floor, D-5', NULL, 'S-65/101', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(128, '', '', NULL, '19149925', NULL, NULL, NULL, NULL, NULL, '15/11/2, 4th Floor, D-6', NULL, 'S-67/102', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(129, 'Jointo ', 'Ray', NULL, '1842010374', NULL, NULL, NULL, NULL, NULL, '15/11/2, 4th Floor, C-6', NULL, 'S - 68/103', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(130, 'Mr Sonjit', 'Mr Sonjit', NULL, '', NULL, NULL, NULL, NULL, NULL, '15/9/D, B-5', NULL, 'S - 16k/104', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(131, 'Mrs Sonia ', 'Akter', NULL, '175034167', NULL, NULL, NULL, NULL, NULL, '15/11/2, 6th Floor', NULL, 'S-72/105', 0, 0, '2019-05-18', 2, '2019-01-07 08:25:23'),
(132, '', '', NULL, '1624060607', NULL, NULL, NULL, NULL, NULL, '15/11/2, 7th Floor', NULL, 'S-72/106', 0, 0, '2019-05-18', 2, '2019-01-07 08:25:23'),
(133, 'Mr Khandokar', ' Mijo', NULL, '1730452404', NULL, NULL, NULL, NULL, NULL, '15/5, G Floor', NULL, 'S-70/107', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(134, 'Mrs Maksuda', ' Bethe', NULL, '1713479045', NULL, NULL, NULL, NULL, NULL, '15/5, G Floor', NULL, 'S-71/108', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(135, 'Mr G R ', 'Mostofa', NULL, '188469386', NULL, NULL, NULL, NULL, NULL, '15/5, 1st Floor', NULL, 'S-72/109', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(136, 'Mr G.M ', 'Faruk', NULL, '', NULL, NULL, NULL, NULL, NULL, '15/5, 2nd Floor', NULL, 'S-73/110', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(137, 'Mr Lito', 'Mr Lito', NULL, '1711261819', NULL, NULL, NULL, NULL, NULL, '15/9/3, GF', NULL, 'S-113/111', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(138, 'Mrs Rowson Ara ', 'Begum', NULL, '1815433616', NULL, NULL, NULL, NULL, NULL, '15/11/3, 1st Floor', NULL, 'S-90/112', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(139, 'Mr Saidur ', 'Rahman', NULL, '1715297393', NULL, NULL, NULL, NULL, NULL, '15/11/3, 2nd, west', NULL, 'S - 91/113', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(140, 'Mr Razzak', 'Mr Razzak', NULL, '1915908122', NULL, NULL, NULL, NULL, NULL, '15/11/3, 3rd Floor', NULL, 'S - 92/114', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(141, 'Mr. Abdur ', 'Rashid', NULL, '1717438050', NULL, NULL, NULL, NULL, NULL, '15/4/A, 2nd Floor', NULL, 'S-106/115', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(142, 'Mr Shahidul ', 'Kabir', NULL, '1949622783', NULL, NULL, NULL, NULL, NULL, ' 15/4/A, 3rd Floor, North', NULL, 'S-107/116', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(143, 'Mr Sajib', 'Mr Sajib', NULL, '1917755051', NULL, NULL, NULL, NULL, NULL, ' 15/4/A, 4th Floor', NULL, 'S-108/117', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(144, 'Mr Nasim ', 'Hossain', NULL, '', NULL, NULL, NULL, NULL, NULL, ' 15/9/A, 2nd Floor', NULL, 'S-109/118', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(145, 'Mr Kobir ', 'Miah', NULL, '1937273293', NULL, NULL, NULL, NULL, NULL, '15/9/A, 2nd Floor, RT', NULL, 'S-110/119', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(146, 'Mr. Nawab ', 'Ali', NULL, '1715895537', NULL, NULL, NULL, NULL, NULL, '15/7, 2nd, ST.', NULL, 'S - 111/120', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(147, 'House ', 'Owner', NULL, '1779296728', NULL, NULL, NULL, NULL, NULL, '15/8/B, 2nd Floor', NULL, 'S - 121', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(148, 'Mr Pritom', 'Mr Pritom', NULL, '1951787560', NULL, NULL, NULL, NULL, NULL, '15/9/F/2, 1st Floor, Left', NULL, 'S - 122', 0, 0, '2030-09-18', 2, '2019-01-07 08:25:23'),
(149, 'Mr Jahangir', 'Mr Jahangir', NULL, '1735313320', NULL, NULL, NULL, NULL, NULL, '15/9/F/2, G Floor', NULL, 'S - 123', 0, 0, '2027-09-18', 2, '2019-01-07 08:25:23'),
(150, 'Dr Soron', 'Dr Soron', NULL, '1718827138', NULL, NULL, NULL, NULL, NULL, '15/9/F/1, 7/C', NULL, 'S - 124', 0, 0, '0002-11-18', 2, '2019-01-07 08:25:23'),
(151, 'Mr Polash', 'Mr Polash', NULL, '1743147737', NULL, NULL, NULL, NULL, NULL, '15/8/B, G Floor St', NULL, 'S - 125', 0, 0, '2030-09-18', 2, '2019-01-07 08:25:23'),
(152, 'Mr Dulal', 'Mr Dulal', NULL, '1712704917', NULL, NULL, NULL, NULL, NULL, '15/4/A, 3rd Floor', NULL, 'S - 126', 0, 0, '0001-10-18', 2, '2019-01-07 08:25:23'),
(153, 'Munny', 'Munny', NULL, '1713113743', NULL, NULL, NULL, NULL, NULL, '17/J, 1st  Floor', NULL, 'S-01/01', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(154, ' Mr Sohag', ' Mr Sohag', NULL, '1938553321', NULL, NULL, NULL, NULL, NULL, '16/12, G Floor, ', NULL, 'S-02/02', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(155, 'Mr. Mostofa', 'Mr. Mostofa', NULL, '1811146982', NULL, NULL, NULL, NULL, NULL, '16/12, 1st', NULL, 'S - 04/03', 1000, 3, '0002-11-17', 2, '2019-01-07 08:25:23'),
(156, 'Mr. Momeen', 'Mr. Momeen', NULL, '1611991844', NULL, NULL, NULL, NULL, NULL, '16/12, GF, LF', NULL, 'S - 03/04', 500, 0, '0002-11-17', 2, '2019-01-07 08:25:23'),
(157, 'Mr Monir', '', NULL, '1683038557', NULL, NULL, NULL, NULL, NULL, '16/12, 2nd ST', NULL, 'S-05/05', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(158, 'Mr Sowrob', 'Mr Sowrob', NULL, '1730405959', NULL, NULL, NULL, NULL, NULL, '16/12, 2nd ', NULL, 'S-5A/06', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(159, 'Mr. Mohiuddin', 'Mr. Mohiuddin', NULL, '1713277386', NULL, NULL, NULL, NULL, NULL, '16/11, GF', NULL, 'S - 06/07', 1000, 0, '0004-06-17', 2, '2019-01-07 08:25:23'),
(160, 'Mr.Farukh ', 'Ahmed', NULL, '', NULL, NULL, NULL, NULL, NULL, '\'16/10, GF', NULL, 'S-07/08', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(161, 'Mr. Rafat', ' Hossain', NULL, '1624887596', NULL, NULL, NULL, NULL, NULL, '16/10, 1st Floor, Left', NULL, 'S-08A/09', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(162, 'Taher Ajad ', 'Sevi', NULL, '1749881444', NULL, NULL, NULL, NULL, NULL, '16/10, 1st  Floor', NULL, 'S-08/10', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(163, 'Mr Akash', 'Mr Akash', NULL, '1749164285', NULL, NULL, NULL, NULL, NULL, '16/10, 2nd Floor, Left', NULL, 'S-09/11', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(164, 'Mr Mofijul ', 'Islam', NULL, '1819118458', NULL, NULL, NULL, NULL, NULL, '16/10, 2nd Floor , RI', NULL, 'S-10/12', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(165, 'Mr Amjad ', 'Mr Amjad ', NULL, '1914419538', NULL, NULL, NULL, NULL, NULL, '16/10, 3rd Floor, Left, RI', NULL, 'S-11/13', 0, 2, '0000-00-00', 2, '2019-01-07 08:25:23'),
(166, 'Mr Giash', ' Uddin', NULL, '', NULL, NULL, NULL, NULL, NULL, '16/10, 3rd floor, LF', NULL, 'S-11A/14', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(167, 'Mr Rafuqul ', 'Islam', NULL, '1552341390', NULL, NULL, NULL, NULL, NULL, '16/10, 5th Floor', NULL, 'S-13/15', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(168, 'Mr Rajib', 'Mr Rajib', NULL, '', NULL, NULL, NULL, NULL, NULL, '16/9, G Floor', NULL, 'S-16', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(169, 'Mr Shahin', ' Sorker', NULL, '1913481444', NULL, NULL, NULL, NULL, NULL, '16/9, G Floor, LF', NULL, 'S-13A/17', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(170, 'Mr Zihad', 'Mr Zihad', NULL, '1824617171', NULL, NULL, NULL, NULL, NULL, '16/9, 1st Floor', NULL, 'S-122/18', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(171, 'Md. S. M. ', 'Razzak', NULL, '1819221640', NULL, NULL, NULL, NULL, NULL, '16/K    2nd,', NULL, 'S - 16/19', 0, 1, '0000-00-00', 2, '2019-01-07 08:25:23'),
(172, 'Mr. Jaher ', 'Uddin', NULL, '1711119840', NULL, NULL, NULL, NULL, NULL, '16/Kha, G Floor', NULL, 'S-17/20', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(173, 'Mr S. ', 'Alom', NULL, '1845745018', NULL, NULL, NULL, NULL, NULL, '16/Kha, 1st Floor', NULL, 'S-18/21', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(174, ' Khadija', ' Khadija', NULL, '1928557227', NULL, NULL, NULL, NULL, NULL, '16/5/A, 3rd Floor', NULL, 'S-19/22', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(175, 'Mrs, Khadija', '2', NULL, '', NULL, NULL, NULL, NULL, NULL, '16/5/A, 1st ', NULL, 'S -20/23', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(176, 'Mr. Shoboj ', 'Hossain', NULL, '1714072714', NULL, NULL, NULL, NULL, NULL, '16/5/A, 2nd Floor', NULL, 'S-21/24', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(177, 'Majeda', 'Majeda', NULL, '1911368550', NULL, NULL, NULL, NULL, NULL, '16/5/A, 2nd Floor, West', NULL, 'S-22/25', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(178, 'Mr Omit', ' Hasan', NULL, '1913475069', NULL, NULL, NULL, NULL, NULL, '16/5/A, 3rd  Floor', NULL, 'S-23/26', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(179, 'Mr Gias ', 'Uddin', NULL, '1914213256', NULL, NULL, NULL, NULL, NULL, '16/5/A, 5th Floor', NULL, 'S-24/27', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(180, 'Mr Shohel', 'Mr Shohel', NULL, '1685158434', NULL, NULL, NULL, NULL, NULL, '16/5/A, 4th Floor', NULL, 'S-24A/28', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(181, 'Md. Liton', 'Md. Liton', NULL, '', NULL, NULL, NULL, NULL, NULL, '16/5, GF, RI', NULL, 'S - 25/29', 0, 1, '0000-00-00', 2, '2019-01-07 08:25:23'),
(182, 'Shilpy ', 'Shilpy ', NULL, '1849806005', NULL, NULL, NULL, NULL, NULL, '16/5, 1st  Floor, LF', NULL, 'S-26/30', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(183, 'Mrs. Sumi', 'Mrs. Sumi', NULL, '', NULL, NULL, NULL, NULL, NULL, '16/5, 3rd, LF', NULL, 'S - 27/31', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(184, 'Mr Yeasine', 'Mr Yeasine', NULL, '1739425200', NULL, NULL, NULL, NULL, NULL, '16/5, 4th Floor, RT', NULL, 'S-29/32', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(185, ' Rasa  ', ' Rasa  ', NULL, '1712865897', NULL, NULL, NULL, NULL, NULL, '16/5, 4th Floor, LF', NULL, 'S-30/33', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(186, 'Zannatul', ' Mim', NULL, '1750624784', NULL, NULL, NULL, NULL, NULL, '16/5, 5th Floor', NULL, 'S-31/34', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(187, 'Md. Arif', 'Md. Arif', NULL, '', NULL, NULL, NULL, NULL, NULL, '16/C, Tinset', NULL, 'S - 32/35', 0, 1, '0000-00-00', 2, '2019-01-07 08:25:23'),
(188, 'Md. Milton', 'Md. Milton', NULL, '', NULL, NULL, NULL, NULL, NULL, '16/C, GF, Left', NULL, 'S - 33/36', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(189, 'Md. Shojol', 'Md. Shojol', NULL, '', NULL, NULL, NULL, NULL, NULL, '16/C, GF, RI', NULL, 'S - 34/37', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(190, 'Mr Monir ', 'Hossain', NULL, '1712308412', NULL, NULL, NULL, NULL, NULL, '16/C, 1st Floor, LF', NULL, 'S-35/38', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(191, 'Md. Mohoshine', 'Md. Mohoshine', NULL, '1712038545', NULL, NULL, NULL, NULL, NULL, '16/C, 2nd, LF', NULL, 'S - 36/39', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(192, 'Md. Prince', 'Md. Prince', NULL, '1856698860', NULL, NULL, NULL, NULL, NULL, '16/C, 3rd, RI', NULL, 'S - 37/40', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(193, 'Mr Shohan ', 'Ahamed', NULL, '1781795432', NULL, NULL, NULL, NULL, NULL, '16/C, 3rd Floor , LF', NULL, 'S-38/41', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(194, 'Md. Rakib', 'Md. Rakib', NULL, '1712038545', NULL, NULL, NULL, NULL, NULL, '16/C, 4th, LF,1st, Flat', NULL, 'S - 39/42', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(195, 'Mr Najrul ', 'Islam', NULL, '1816906999', NULL, NULL, NULL, NULL, NULL, '16/C, 4th Floor,  Corner', NULL, 'S-40/43', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(196, 'Akter ', 'Akter ', NULL, '1734573132', NULL, NULL, NULL, NULL, NULL, '16/C, 4th Floor ', NULL, 'S-41/44', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(197, 'Mr Harun ur', ' Rashid', NULL, '1712507396', NULL, NULL, NULL, NULL, NULL, '16/C, 4th Floor', NULL, 'S-42/45', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(198, 'Mr Monir uz ', 'zaman', NULL, '1791598061', NULL, NULL, NULL, NULL, NULL, '16/D, GF', NULL, 'S-42A/46', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(199, 'Mr. Mizan', 'Mr. Mizan', NULL, '\'01676442113', NULL, NULL, NULL, NULL, NULL, '16/D, GF, 1-A,', NULL, 'S - 43/47', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(200, 'Mr. Shishir', 'Mr. Shishir', NULL, '\'01680740444', NULL, NULL, NULL, NULL, NULL, '16/D, 1st, 2-A,', NULL, 'S - 44/48', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(201, 'Mr Rina', ' Akter ', NULL, '1727883112', NULL, NULL, NULL, NULL, NULL, '16/D, 1st Floor , 2-B', NULL, 'S-45/49', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(202, 'Bess ', 'Office', NULL, '1712038545', NULL, NULL, NULL, NULL, NULL, '16/D, 2nd', NULL, 'S - 46/50', 33, 2, '0000-00-00', 2, '2019-01-07 08:25:23'),
(203, 'Mr Mamun ', 'Ahamed', NULL, '1712538587', NULL, NULL, NULL, NULL, NULL, '16/D, 3rd Floor, South, 4-A', NULL, 'S-47/51', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(204, 'Mr. Mohammad', ' Ali', NULL, '\'01836490946', NULL, NULL, NULL, NULL, NULL, '16/D, 3rd, 4-C', NULL, 'S - 48/52', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(205, 'Mr. Mojibul ', 'Alom', NULL, '\'01713479050', NULL, NULL, NULL, NULL, NULL, '16/D, 4th, 5-A,', NULL, 'S - 49/53', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(206, 'Mr. Ariful', ' Islam', NULL, '1864607415', NULL, NULL, NULL, NULL, NULL, '16/D, 4th, 5-B,', NULL, 'S - 50/54', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(207, 'Mr. Mokit', ' Khan', NULL, '1738211787', NULL, NULL, NULL, NULL, NULL, '16/D, Flat-6/A', NULL, 'S - 50A/55', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(208, 'Mr. Shajahan', 'Mr. Shajahan', NULL, '1712122562', NULL, NULL, NULL, NULL, NULL, '16/D, 5th, 6-B,', NULL, 'S - 51/56', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(209, 'Mr. Tanvir/', ' Bithi', NULL, '1949256284', NULL, NULL, NULL, NULL, NULL, '16/D, 5th, 6-C,', NULL, 'S - 52/57', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(210, 'Mr. Emroj ', 'Hossain', NULL, '1917278129', NULL, NULL, NULL, NULL, NULL, '16/D, 5th, 6-D,', NULL, 'S - 53/58', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(211, 'Mr. Faruk', 'Mr. Faruk', NULL, '1725898625', NULL, NULL, NULL, NULL, NULL, '16/D, 1st Floor,', NULL, 'S - 54/59', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(212, 'Mr. Shoibal', 'Mr. Shoibal', NULL, '1618064149', NULL, NULL, NULL, NULL, NULL, '16/D, 3rd, ST.', NULL, 'S - 55/60', 1000, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(213, 'Md. Enayet ', 'Ferdaus', NULL, '1712038545', NULL, NULL, NULL, NULL, NULL, '16/D, 4th ST', NULL, 'S - 56/61', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(214, 'Md. Samsul ', 'Haque', NULL, '1712038545', NULL, NULL, NULL, NULL, NULL, '16/D, 5th', NULL, 'S - 57/62', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(215, 'Mrs. Jafrin', ' Reza', NULL, '\'01724182789', NULL, NULL, NULL, NULL, NULL, '16/D, 6th, ST.', NULL, 'S - 58/63', 1000, 1, '0000-00-00', 2, '2019-01-07 08:25:23'),
(216, 'Mr. Fojlur ', 'Rahman', NULL, '1921187876', NULL, NULL, NULL, NULL, NULL, '16/D,, 7th, Left', NULL, 'S - 59/64', 0, 2, '0000-00-00', 2, '2019-01-07 08:25:23'),
(217, 'Mr Abir', 'Mr Abir', NULL, '1915355714', NULL, NULL, NULL, NULL, NULL, '16/4, 1st Floor , LF', NULL, 'S-60/65', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(218, 'Mr Talukder', 'Talukder', NULL, '1911385402', NULL, NULL, NULL, NULL, NULL, ' 16/4, 2nd Floor ', NULL, 'S-61/66', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(219, 'Mr. Quazi Shamsul', ' Kabir', NULL, '1915603939', NULL, NULL, NULL, NULL, NULL, '16/D, 2nd', NULL, 'S-62/67', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(220, 'Mr. Kamal', 'Mr. Kamal', NULL, '1673098152', NULL, NULL, NULL, NULL, NULL, '16/4, 3rd Floor, South', NULL, 'S-63/68', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(221, 'Mr Helal', 'Mr Helal', NULL, '1819401831', NULL, NULL, NULL, NULL, NULL, '16/4, 4th Floor ', NULL, 'S-65/69', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(222, 'Mr Ripon', 'Mr Ripon', NULL, '1733635561', NULL, NULL, NULL, NULL, NULL, '16/2, Tinset', NULL, 'S-67/70', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(223, 'Mr Khalil ', 'Rahman', NULL, '1911975965', NULL, NULL, NULL, NULL, NULL, '16/2, Tin', NULL, 'S - 68/71', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(224, 'Mr Salman', 'Mr Salman', NULL, '1843734210', NULL, NULL, NULL, NULL, NULL, '16/2, Tinset', NULL, 'S-69/72', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(225, 'Mr Kamrul ', 'Islam', NULL, '1983873557', NULL, NULL, NULL, NULL, NULL, '16/3, GF, Tin', NULL, 'S - 70/73', 400, 1, '0000-00-00', 2, '2019-01-07 08:25:23'),
(226, 'Mr Jasim', 'Mr Jasim', NULL, '1987174042', NULL, NULL, NULL, NULL, NULL, '16/3, Tin', NULL, 'S - 71/74', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(227, 'Mrs Khaleda ', 'Begum', NULL, '1791765904', NULL, NULL, NULL, NULL, NULL, '16/3, ', NULL, 'S - 72/75', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(228, 'Mr Abul', ' Kalam', NULL, '1855866210', NULL, NULL, NULL, NULL, NULL, '16/3, Tinset ', NULL, 'S-73/76', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(229, 'Mr Jamal', 'Mr Jamal', NULL, '1966647874', NULL, NULL, NULL, NULL, NULL, '16/3, Tin', NULL, 'S - 74/77', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(230, 'Mr Shohidul Islam ', 'Paper', NULL, '', NULL, NULL, NULL, NULL, NULL, '16/3/A, G F, RI', NULL, 'S - 75A/78', 0, 0, '2018-07-18', 2, '2019-01-07 08:25:23'),
(231, 'Mr Mizan', 'Mr Mizan', NULL, '1711111373', NULL, NULL, NULL, NULL, NULL, '16/3/A, GF, ST', NULL, 'S - 75/79', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(232, '', '', NULL, '', NULL, NULL, NULL, NULL, NULL, '16/3/A, 1st Floor, RT', NULL, 'S-76/80', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(233, 'Mr Najmul ', 'Haque', NULL, '1917121527', NULL, NULL, NULL, NULL, NULL, '16/3/A, 1st Floor, LF', NULL, 'S-77/81', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(234, 'Mr Mohiuddin', 'Mr Mohiuddin', NULL, '1927953959', NULL, NULL, NULL, NULL, NULL, '16/3/A, 2nd Floor , RT', NULL, 'S-78/82', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(235, 'Mr Masud', ' Mama', NULL, '1916580407', NULL, NULL, NULL, NULL, NULL, '16/3/A, 2nd Floor, RI', NULL, 'S-79/83', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(236, 'Mr Saidul Haque ', 'Helal', NULL, '1552394090', NULL, NULL, NULL, NULL, NULL, '16/3/A, 3rd  Floor', NULL, 'S-80/84', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(237, 'Mr Sihab', 'Mr Sihab', NULL, '175557782', NULL, NULL, NULL, NULL, NULL, '16/3/A, 4th floor, RI', NULL, 'S-80A/85', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(238, 'Mr Kobir ', 'Hossain', NULL, '1712220208', NULL, NULL, NULL, NULL, NULL, ' 16/3/B, G Floor, Soja', NULL, 'S-81/86', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(239, 'Mr Kobir ', '(Sub let)', NULL, '', NULL, NULL, NULL, NULL, NULL, '16/3/B, G Floor, Soja', NULL, 'S-81A/87', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(240, 'Mr Abdus ', 'Salam', NULL, '1552403973', NULL, NULL, NULL, NULL, NULL, '16/3/B, 1st Floor. ST', NULL, 'S-82/88', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(241, 'Mr Nayeem', 'Mr Nayeem', NULL, '1911148545', NULL, NULL, NULL, NULL, NULL, '16/3/B, 2nd  Floor', NULL, 'S-83/89', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(242, 'Mr Asraf', ' Shiddique', NULL, '1911454543', NULL, NULL, NULL, NULL, NULL, '16/3/B, 3rd Floor, RI', NULL, 'S-84/90', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(243, 'Mr Nayeem\'s ', 'Mother', NULL, '1711083633', NULL, NULL, NULL, NULL, NULL, '16/3/B, 3rd Floor', NULL, 'S-84A/91', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(244, 'Mr Moniruzzaman', 'Mr Moniruzzaman', NULL, '1711151462', NULL, NULL, NULL, NULL, NULL, '16/3/B, 4th Floor ', NULL, 'S-85/92', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(245, 'Mr Tanvir', 'Mr Tanvir', NULL, '191943009', NULL, NULL, NULL, NULL, NULL, '16/4/A, 1st Floor', NULL, 'S-85B/93', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(246, 'Abdul ', 'Baker', NULL, '', NULL, NULL, NULL, NULL, NULL, '16/4/A, 2nd Floor', NULL, 'S-85C/94', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(247, 'Md Mojibor', ' Rahman', NULL, '1711358320', NULL, NULL, NULL, NULL, NULL, '16/4/A, 3rd Floor, 3/A', NULL, 'S-85D/95', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(248, 'Mr Azizul', ' Haque', NULL, '1717232576', NULL, NULL, NULL, NULL, NULL, '16/4/A, 4th Floor', NULL, 'S-85F/96', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(249, 'Rowson ', 'Ara', NULL, '', NULL, NULL, NULL, NULL, NULL, '6/4/A, 5/A', NULL, 'S-85E/97', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(250, 'Mr Zahangir', 'Mr Zahangir', NULL, '1817618160', NULL, NULL, NULL, NULL, NULL, '389, Tinset', NULL, 'S-86/98', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(251, 'Mr  Juwel', 'Mr  Juwel', NULL, '1711111373', NULL, NULL, NULL, NULL, NULL, '389, GF, ST', NULL, 'S - 87/99', 0, 2, '0000-00-00', 2, '2019-01-07 08:25:23'),
(252, 'Mr Jobayer ', 'Mr Jobayer ', NULL, '1916889778', NULL, NULL, NULL, NULL, NULL, '389, G Floor, South', NULL, 'S-88/100', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(253, 'Mr. Shanto', 'Mr. Shanto', NULL, '1923481867', NULL, NULL, NULL, NULL, NULL, '389, 1st Floor', NULL, 'S-89/101', 0, 2, '0000-00-00', 2, '2019-01-07 08:25:23'),
(254, 'Mrs Sabiha', 'Mrs Sabiha', NULL, '1611090304', NULL, NULL, NULL, NULL, NULL, '389, 2nd Floor ', NULL, 'S-90/102', 0, 2, '0000-00-00', 2, '2019-01-07 08:25:23'),
(255, 'Mr Sowkat ', 'Sikder', NULL, '1712642572', NULL, NULL, NULL, NULL, NULL, '389, 2nd Floor', NULL, 'S-91/103', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(256, 'Mr Sami', ' (off line)', NULL, '1611090304', NULL, NULL, NULL, NULL, NULL, '389, 2nd Floor, West', NULL, 'S-92/104', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(257, 'Mr Monir', 'Mr Monir', NULL, '1716578209', NULL, NULL, NULL, NULL, NULL, '16/18, Tea Shop', NULL, 'S-108/105', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(258, 'Mr Miraz', 'Mr Miraz', NULL, '', NULL, NULL, NULL, NULL, NULL, '372/1, GF', NULL, 'S-122A/106', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(259, 'Mrs Masuda', 'Mrs Masuda', NULL, '1715460068', NULL, NULL, NULL, NULL, NULL, '372/1, 2nd Floor, All', NULL, 'S-107', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(260, 'Mr Shovo', 'Mr Shovo', NULL, '', NULL, NULL, NULL, NULL, NULL, '372/1, 3rd Floor, LF', NULL, 'S-123A/108', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(261, '', '', NULL, '', NULL, NULL, NULL, NULL, NULL, '372/1, 4th Floor, LF', NULL, 'S-109', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(262, '', '', NULL, '', NULL, NULL, NULL, NULL, NULL, '372/1, 4th Floor, LF', NULL, 'S-110', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(263, 'Mrs Tahmina', 'Mrs Tahmina', NULL, '1727163707', NULL, NULL, NULL, NULL, NULL, '372/1, 4th Floor, RI', NULL, 'S-111', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(264, 'Shayla ', 'Apa', NULL, '1711587256', NULL, NULL, NULL, NULL, NULL, '372/1, 5th Floor', NULL, 'S-124/112', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(265, 'Mr Israfil', 'Mr Israfil', NULL, '1764363737', NULL, NULL, NULL, NULL, NULL, '372, G F, ST', NULL, 'S - 125/113', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(266, 'Mr Rakib', 'Mr Rakib', NULL, '1922371987', NULL, NULL, NULL, NULL, NULL, '372, 1st, Ri', NULL, 'S - 126/114', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(267, 'Reyal ', 'Reyal ', NULL, '1687075775', NULL, NULL, NULL, NULL, NULL, '372, 1st Floor, RI', NULL, 'S-127/115', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(268, 'Mr Zillur', ' Rahman', NULL, '1912129859', NULL, NULL, NULL, NULL, NULL, '372, 2nd Floor', NULL, 'S-128/116', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(269, 'Rujina ', 'Rujina ', NULL, '1915788450', NULL, NULL, NULL, NULL, NULL, '372, 2nd Floor', NULL, 'S-129/117', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(270, 'Mr Morshed ', 'Alom', NULL, '', NULL, NULL, NULL, NULL, NULL, '372, 3rd, LF', NULL, 'S - 130/118', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(271, 'Fatema ', 'Nasrin ', NULL, '1933261353', NULL, NULL, NULL, NULL, NULL, '372, 3rd Floor, RI', NULL, 'S-132/119', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(272, 'Mr Babu', 'Mr Babu', NULL, '1713384859', NULL, NULL, NULL, NULL, NULL, '372, 4th Floor, North', NULL, 'S-134/120', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(273, 'Mr Biplop', 'Mr Biplop', NULL, '1763768450', NULL, NULL, NULL, NULL, NULL, '372, 4th Floor, RI', NULL, 'S-133/121', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(274, 'Mr Nazrul', 'Mr Nazrul', NULL, '1710696313', NULL, NULL, NULL, NULL, NULL, '372, 5th Floor ', NULL, 'S-135/122', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(275, 'Mr Jalil ', 'Mr Jalil ', NULL, '1726200255', NULL, NULL, NULL, NULL, NULL, '372, G Floor', NULL, 'S-138/123', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(276, 'Mr Ridoy', 'Mr Ridoy', NULL, '', NULL, NULL, NULL, NULL, NULL, '372, 1st Floor', NULL, 'S-149A/124', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(277, 'Mr Abu', ' Taher', NULL, '1638608793', NULL, NULL, NULL, NULL, NULL, '372, 1st , RI', NULL, 'S - 139/125', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(278, 'Md Munir ', 'Hossain', NULL, '1712197640', NULL, NULL, NULL, NULL, NULL, '372, 2nd Floor', NULL, 'S-137/126', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(279, '  Mr Moshiur', '  Mr Moshiur', NULL, '1983913636', NULL, NULL, NULL, NULL, NULL, '372, 3rd Floor', NULL, '1983913636', 0, 2, '0000-00-00', 2, '2019-01-07 08:25:23'),
(280, '  Mr Monir\'s ', 'Brother', NULL, '', NULL, NULL, NULL, NULL, NULL, '372, 3rd Floor', NULL, 'S-137A/128', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(281, 'Mr Tanzim', 'Mr Tanzim', NULL, '1687008697', NULL, NULL, NULL, NULL, NULL, '372, 5th, LF', NULL, 'S - 140/129', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(282, 'Mr Anower', 'Mr Anower', NULL, '1782962720', NULL, NULL, NULL, NULL, NULL, '372, 5th, ST', NULL, 'S - 141/130', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(283, 'Mr Arif', 'Mr Arif', NULL, '1787898987', NULL, NULL, NULL, NULL, NULL, '373/A, G Floor', NULL, 'S-142/131', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(284, 'Mr Litu Ahammed', '/Shajib', NULL, '1712008168', NULL, NULL, NULL, NULL, NULL, '373/A, 1st, ', NULL, 'S -143/132', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(285, 'Mr Khairul', 'Mr Khairul', NULL, '', NULL, NULL, NULL, NULL, NULL, '373, G Floor', NULL, 'S -144A/133', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(286, 'Mr Yad', 'Mr Yad', NULL, '1914502045', NULL, NULL, NULL, NULL, NULL, '373, 1st LF', NULL, 'S - 144/134', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(287, 'Rubi', 'Rubi', NULL, '1955225770', NULL, NULL, NULL, NULL, NULL, '373, 3rd, LF', NULL, 'S - 146/135', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(288, 'Mithu\'s', ' Friend', NULL, '', NULL, NULL, NULL, NULL, NULL, '373/3, GF', NULL, 'S - 136', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(289, 'Mr Mosarof', ' Hossain', NULL, '1620306127', NULL, NULL, NULL, NULL, NULL, '373/B, 1st & 2nd floor', NULL, 'S - 137', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(290, 'Mr Saidul', ' Haque', NULL, '', NULL, NULL, NULL, NULL, NULL, '373/1, 1st Floor, Left', NULL, 'S - 138', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(291, 'Mrs Akhi', ' Mony', NULL, '1620306127', NULL, NULL, NULL, NULL, NULL, '373/1, 1st floor', NULL, 'S - 139', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(292, 'Mr Kajol', 'Mr Kajol', NULL, '1711571089', NULL, NULL, NULL, NULL, NULL, '373/1, 1st floor', NULL, 'S - 140', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(293, 'Mr Reza', 'Mr Reza', NULL, '1711249958', NULL, NULL, NULL, NULL, NULL, '373/1, 3rd Floor, LF', NULL, 'S - 141', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(294, 'Mr Anower ', 'Hossain', NULL, '', NULL, NULL, NULL, NULL, NULL, '373/1, 4th Floor, Right', NULL, 'S - 142', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(295, 'Mr Shagor', 'Mr Shagor', NULL, '', NULL, NULL, NULL, NULL, NULL, '373/1, 5th Floor', NULL, 'S - 143', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(296, 'Mr Jahangir', 'Mr Jahangir', NULL, '1811607088', NULL, NULL, NULL, NULL, NULL, '387/2, Tinset', NULL, 'S - 144', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(297, 'Mr Sharif', 'Mr Sharif', NULL, '', NULL, NULL, NULL, NULL, NULL, '387/2, Tinset', NULL, 'S - 145', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(298, 'Mr Parves', 'Mr Parves', NULL, '1951474156', NULL, NULL, NULL, NULL, NULL, '387/2, Tinset', NULL, 'S - 146', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(299, 'Mr Shawon', 'Mr Shawon', NULL, '1726676526', NULL, NULL, NULL, NULL, NULL, '387/2, Tinset', NULL, 'S - 147', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(300, 'Mr Mokhlesh', 'Mr Mokhlesh', NULL, '', NULL, NULL, NULL, NULL, NULL, '387/2, Tinset', NULL, 'S - 148', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(301, 'Mr Shamim', 'Mr Shamim', NULL, '1722163197', NULL, NULL, NULL, NULL, NULL, '387/2, Tinset', NULL, 'S - 149', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(302, 'Mr Billal', 'Mr Billal', NULL, '', NULL, NULL, NULL, NULL, NULL, '387, Tinset', NULL, 'S - 150', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(303, 'Mr Amir/', 'Khalamma', NULL, '1736100280', NULL, NULL, NULL, NULL, NULL, '387/2, Tinset', NULL, 'S - 151', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(304, 'Ikra ', 'Farmesy', NULL, '1685251289', NULL, NULL, NULL, NULL, NULL, '373/1, Shop', NULL, 'S - 152', 0, 30, '0000-00-00', 2, '2019-01-07 08:25:23'),
(305, 'Mr Nurul', ' Islam', NULL, '1685251289', NULL, NULL, NULL, NULL, NULL, '16/5, 2nd Floor', NULL, 'S - 153', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(306, 'Mr Kawser', 'Mr Kawser', NULL, '1913683367', NULL, NULL, NULL, NULL, NULL, '', NULL, 'S - 154', 0, 2, '0000-00-00', 2, '2019-01-07 08:25:23'),
(307, 'Fatema', 'Super Shop', NULL, '1620540484', NULL, NULL, NULL, NULL, NULL, '394, G F Floor', NULL, 'SA-01/01', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(308, 'Mr Mohi', ' Uddin', NULL, '1610922307', NULL, NULL, NULL, NULL, NULL, '394, 1st Floor', NULL, 'SA-02/02', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23');
INSERT INTO `cable_client` (`clientId`, `clientFirstName`, `clientLastName`, `email`, `phone`, `clientImage`, `clientNID`, `fkconnectionTypeId`, `clientPassport`, `price`, `address`, `fkpackageId`, `clientSerial`, `cableLength`, `noOfTv`, `conDate`, `clientStatus`, `created_at`) VALUES
(309, 'Halima ', 'Halima ', NULL, '197764593', NULL, NULL, NULL, NULL, NULL, '394/', NULL, 'SA-25/03', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(310, 'Mrs Yeasmin', ' Akter', NULL, '', NULL, NULL, NULL, NULL, NULL, '394, 2nd Floor, F-4', NULL, 'SA-03/04', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(311, 'MrS Asma ', 'Begum', NULL, '', NULL, NULL, NULL, NULL, NULL, '394, 2nd Floor, F-5', NULL, 'SA-04/05', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(312, 'Mr Raju ', 'Ahammed', NULL, '1843828573', NULL, NULL, NULL, NULL, NULL, '394, 3rd Floor, F-6', NULL, 'SA- 05/06', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(313, 'Mr Moniruz', 'zaman', NULL, '1766106434', NULL, NULL, NULL, NULL, NULL, '394, 3rd Floor, F-7', NULL, 'SA-06/07', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(314, 'Mr Pappu', 'Mr Pappu', NULL, '1674928898', NULL, NULL, NULL, NULL, NULL, '394, 4th Floor, F- 8', NULL, 'SA- 07/08', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(315, 'Mr Abul ', 'Hasnat', NULL, '', NULL, NULL, NULL, NULL, NULL, '394, 4th Floor, F- 9', NULL, 'SA-08/09', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(316, 'Rony', 'Rony', NULL, '', NULL, NULL, NULL, NULL, NULL, '385, 2nd Floor, F- 10', NULL, 'SA- 22/10', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(317, 'Mr Bony', 'Mr Bony', NULL, '1814859856', NULL, NULL, NULL, NULL, NULL, '394, F-11', NULL, 'SA- 11/11', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(318, 'Mr Musha', 'Mr Musha', NULL, '1748010466', NULL, NULL, NULL, NULL, NULL, '392/A, G Floor', NULL, 'RH- 42/12', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(319, 'Mr Nasir ', 'Uddin', NULL, '1828119368', NULL, NULL, NULL, NULL, NULL, '392/A, G Floor, RI', NULL, 'SA- 43/13', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(320, 'Mrs Sultana', 'Mrs Sultana', NULL, '', NULL, NULL, NULL, NULL, NULL, '392/A, 1st Floor, LF', NULL, 'SA-12/14', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(321, 'Kobir', 'Kobir', NULL, '18205555', NULL, NULL, NULL, NULL, NULL, '392/A, 1st Floor, LF', NULL, 'SA-20/15', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(322, 'Mr Faruk', 'Mr Faruk', NULL, '1712096123', NULL, NULL, NULL, NULL, NULL, ' 392/A, 2nd Floor, LF', NULL, 'SA-13/16', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(323, 'Mr Alomgir', 'Mr Alomgir', NULL, '1927138209', NULL, NULL, NULL, NULL, NULL, '392/A, 2nd Floor', NULL, 'SA-14/17', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(324, 'Mr Rony', 'Mr Rony', NULL, '181729975', NULL, NULL, NULL, NULL, NULL, '392/A, 3rd Floor, RI', NULL, 'SA-44/18', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(325, 'Mr Mihir', 'Mr Mihir', NULL, '', NULL, NULL, NULL, NULL, NULL, '392/A, 3rd Floor', NULL, 'SA-15/19', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(326, ' Mr Kamal', ' Mr Kamal', NULL, '1716024056', NULL, NULL, NULL, NULL, NULL, '386/ka, GF RI', NULL, 'SA-27/20', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(327, 'Mr Rajon ', 'DA', NULL, '1611962496', NULL, NULL, NULL, NULL, NULL, '586/ka, right', NULL, 'SA-27A/21', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(328, 'Mr Milon', ' Ahammed', NULL, '192010784', NULL, NULL, NULL, NULL, NULL, '386/ka, 2nd Floor', NULL, 'SA-28/22', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(329, 'Mr Abu Salim', ' Rafid', NULL, '', NULL, NULL, NULL, NULL, NULL, '386/ka, 3rd Floor', NULL, 'SA-45/23', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(330, 'Mr Arshad', 'Mr Arshad', NULL, '1731297344', NULL, NULL, NULL, NULL, NULL, '386/ka, 3rd Floor', NULL, 'SA-29/24', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(331, 'Mr Raz', 'Mr Raz', NULL, '1929357156', NULL, NULL, NULL, NULL, NULL, '386/ka, 4th Floor, RI', NULL, 'SA-32/25', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(332, 'Mrs Shahanaj', 'Mrs Shahanaj', NULL, '1811409281', NULL, NULL, NULL, NULL, NULL, '386/ka, 4th Floor,Left', NULL, 'SA-30/26', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(333, 'Mr Saiful', 'Mr Saiful', NULL, '1717994978', NULL, NULL, NULL, NULL, NULL, '386/ka, 5th Floor', NULL, 'SA-31/27', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(334, 'Mr ', 'Mr ', NULL, '', NULL, NULL, NULL, NULL, NULL, '387/1', NULL, 'SA-41/28', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(335, 'Mr Abdul ', 'Kuddus', NULL, '', NULL, NULL, NULL, NULL, NULL, '357/C, 2nd Floor', NULL, 'SA-39/29', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(336, 'Mr Mojibor ', 'Rah', NULL, '1727177888', NULL, NULL, NULL, NULL, NULL, '357/A, 3rd Floor', NULL, 'SA-39A/30', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(337, 'Mr Zaman', ' Amin', NULL, '1629468179', NULL, NULL, NULL, NULL, NULL, '357/C, 3rd Floor, LF', NULL, 'SA-40/31', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(338, 'Mr Chaklader', 'Mr Chaklader', NULL, '', NULL, NULL, NULL, NULL, NULL, '357/C, LF', NULL, 'SA-38/32', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(339, 'Priya', 'Priya', NULL, '1685414778', NULL, NULL, NULL, NULL, NULL, '387, 1st Floor, Right', NULL, 'SA-33/33', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(340, 'Mrs Rabeya', 'Mrs Rabeya', NULL, '171251911', NULL, NULL, NULL, NULL, NULL, '387/1, 1st Floor, LF', NULL, 'SA-36a/34', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(341, 'Mrs Tina', 'Mrs Tina', NULL, '1727994157', NULL, NULL, NULL, NULL, NULL, '387, 2nd Floor', NULL, 'SA-35/35', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(342, '', '', NULL, '', NULL, NULL, NULL, NULL, NULL, '', NULL, 'SA-36/36', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(343, 'Mr Monju ', 'Ali', NULL, '1761435981', NULL, NULL, NULL, NULL, NULL, '355, Tinset, room-3', NULL, 'M-59/01', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(344, 'Mr Dulu ', 'Miah', NULL, '', NULL, NULL, NULL, NULL, NULL, '355, Tinset, room-5', NULL, 'M-44/02', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(345, 'Mr Farid', 'Farid', NULL, '1928761109', NULL, NULL, NULL, NULL, NULL, '355, Tinset, room-6', NULL, 'M-45/03', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(346, 'Mr Shadin', 'Shadin', NULL, '1916037389', NULL, NULL, NULL, NULL, NULL, '355, Tinset, room-7', NULL, 'M-    /04', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(347, 'Mr Sadek', 'Sadek', NULL, '1946694010', NULL, NULL, NULL, NULL, NULL, '355, Tinset, room-8', NULL, 'M-71/05', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(348, 'Mr Akram', 'Akram', NULL, '1779299260', NULL, NULL, NULL, NULL, NULL, '355, Tinset, room-9', NULL, 'M-55/06', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(349, 'Mr Saiful', 'Saiful', NULL, '', NULL, NULL, NULL, NULL, NULL, '355, Tinset, room-10', NULL, 'M-61/07', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(350, 'Mr Nazim ', 'Uddin', NULL, '1938165894', NULL, NULL, NULL, NULL, NULL, '355, Tinset, room-12', NULL, 'M-50/08', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(351, 'Mr Monir', 'Monir', NULL, '', NULL, NULL, NULL, NULL, NULL, '355, Tinset, room-11', NULL, 'M-52/09', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(352, 'Mr Mostofa', 'Mostofa', NULL, '', NULL, NULL, NULL, NULL, NULL, '355, Tinset, room-13', NULL, 'M-54/10', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(353, 'Mr Moharum ', 'Ail', NULL, '1753988845', NULL, NULL, NULL, NULL, NULL, '355, Tinset, room-15', NULL, 'M-46/11', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(354, 'Mr Yeasine', 'Yeasine', NULL, '1938553324', NULL, NULL, NULL, NULL, NULL, '355, Tinset, room-16', NULL, 'M-60/12', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(355, 'Mr Sayem', 'Sayem', NULL, '1971093532', NULL, NULL, NULL, NULL, NULL, '355, Tinset, room-17', NULL, 'M-48/13', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(356, 'Mr Liton ', 'Bepari', NULL, '1927286314', NULL, NULL, NULL, NULL, NULL, '355, Tinset, room-19', NULL, 'M-51/14', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(357, 'Mr Joj ', 'Miah', NULL, '1733574761', NULL, NULL, NULL, NULL, NULL, '355, Tinset, room-20', NULL, 'M-53/15', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(358, 'Mr Khalil ', 'Mondol', NULL, '179002262', NULL, NULL, NULL, NULL, NULL, '355, Tinset, room-22', NULL, 'M-56/16', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(359, 'Mr Jafor', 'Jafor', NULL, '1919568333', NULL, NULL, NULL, NULL, NULL, '355, Tinset, room-24', NULL, 'M-58/17', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(360, 'Mr Billal', 'Billal', NULL, '', NULL, NULL, NULL, NULL, NULL, '355, Tinset', NULL, 'M-62/18', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(361, 'Mr Asimurur ', 'Rahman', NULL, '1720032042', NULL, NULL, NULL, NULL, NULL, '355, Tinset, H. Owner', NULL, 'M-49/19', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(362, 'Mrs Moyna', 'Moyna', NULL, '1944665925', NULL, NULL, NULL, NULL, NULL, '355, Tinset, room-25', NULL, 'M-47/20', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(363, 'Mr Jafor', 'Jafor', NULL, '1775457938', NULL, NULL, NULL, NULL, NULL, '355, Tinset, room-26', NULL, 'M-  /21', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(364, 'Mr Modhubagh ', 'Fari', NULL, '1712283833', NULL, NULL, NULL, NULL, NULL, 'Polish Fari', NULL, 'M-  /22', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(365, 'Modhubagh Bazar ', 'Somity', NULL, '1710466071', NULL, NULL, NULL, NULL, NULL, 'Modhubagh Bazar ', NULL, 'M-63/23', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(366, 'Mr Bashar', 'Bashar', NULL, '1712571284', NULL, NULL, NULL, NULL, NULL, 'Modhubagh Bazar paner', NULL, 'M-  /24', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(367, 'Mrs Sheuly', 'Sheuly', NULL, '', NULL, NULL, NULL, NULL, NULL, '357/A/2, ', NULL, 'M-  /25', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(368, 'Mr Malek', 'Malek', NULL, '1947705809', NULL, NULL, NULL, NULL, NULL, '357/A/2, ', NULL, 'M-65/26', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(369, 'Mr Khalek', 'Khalek', NULL, '1774745475', NULL, NULL, NULL, NULL, NULL, '357/A/2, ', NULL, 'M-  /27', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(370, 'Mr Fazlu ', 'Shekh', NULL, '1732051899', NULL, NULL, NULL, NULL, NULL, '357/A/2,', NULL, 'M-  /28', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(371, 'Mr Shadin', 'Shadin', NULL, '1703543024', NULL, NULL, NULL, NULL, NULL, '357/A/2, ', NULL, 'M-57/29', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(372, 'Mr Liton ', 'Driver', NULL, '', NULL, NULL, NULL, NULL, NULL, '357/A/2, ', NULL, 'M-     /30', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(373, 'Mr Rahman', 'Rahman', NULL, '', NULL, NULL, NULL, NULL, NULL, '357/A/2, Claub', NULL, 'M-     /31', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(374, 'Mr Juel', 'Juel', NULL, '1727476860', NULL, NULL, NULL, NULL, NULL, '357/A/2, ', NULL, 'M-34/32', 0, 2, '0000-00-00', 2, '2019-01-07 08:25:23'),
(375, 'Mr Jakir/nazma', 'Jakir/nazma', NULL, '1719676280', NULL, NULL, NULL, NULL, NULL, '357/A/8, G F, Right', NULL, 'M-79/33', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(376, 'Mr Mahmud ', 'Mahmud', NULL, '1916984357', NULL, NULL, NULL, NULL, NULL, '357/A/8, 1st Floor', NULL, 'M-80/34', 0, 2, '0000-00-00', 2, '2019-01-07 08:25:23'),
(377, 'Mr. Foyej ', 'Uddin', NULL, '', NULL, NULL, NULL, NULL, NULL, '357/A/8, 3rd Floor', NULL, 'M - 84/35', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(378, 'Mr. Rezaul ', 'Karim', NULL, '1711738291', NULL, NULL, NULL, NULL, NULL, '357/A/8, 4th Floor', NULL, 'M - 83/36', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(379, 'Mr Tomal', 'Tomal', NULL, '1847082984', NULL, NULL, NULL, NULL, NULL, '357/A/8, 1st Floor', NULL, 'M - 81/37', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(380, 'Mr Hasan ', 'Reza', NULL, '1716777987', NULL, NULL, NULL, NULL, NULL, '357/A/8, 2nd Floor', NULL, 'M-17/38', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(381, 'Mr. Jahan', 'Jahan', NULL, '1715557772', NULL, NULL, NULL, NULL, NULL, '357/A/8, 2nd Floor', NULL, 'M -    /39', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(382, 'Mr Bayezid', 'Bayezid', NULL, '1916297996', NULL, NULL, NULL, NULL, NULL, '357/A/8, 3rd Floor', NULL, 'M-82/40', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(383, 'Mr Latif', 'Latif', NULL, '', NULL, NULL, NULL, NULL, NULL, '357/A/8, 3rd Floor', NULL, 'M-18/41', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(384, 'Mr Juel', 'Juel', NULL, '1712408846', NULL, NULL, NULL, NULL, NULL, '357/A/8, 4th Floor', NULL, 'M-19/42', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(385, 'Mrs Sabina', 'Sabina', NULL, '', NULL, NULL, NULL, NULL, NULL, '357/A/8, 5th Floor,Right', NULL, 'M-06/43', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(386, 'Mr Ala Uddin', 'Ala Uddin', NULL, '1755555308', NULL, NULL, NULL, NULL, NULL, '357/A/8, 5th Floor,Right', NULL, 'M-20/44', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(387, 'Mr Farid ', 'Hossain', NULL, '1619800616', NULL, NULL, NULL, NULL, NULL, '357/A/8, 6th Floor,Left', NULL, 'M-22/45', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(388, 'Mrs Munny', 'Munny', NULL, '', NULL, NULL, NULL, NULL, NULL, '357/A/8, 6th Floor,Right', NULL, 'M-21/46', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(389, 'Mr Abdul ', 'Gafur', NULL, '1734588440', NULL, NULL, NULL, NULL, NULL, '357/A/8/1, G F', NULL, 'M-112/47', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(390, 'Mr Onik', 'Onik', NULL, '1735588440', NULL, NULL, NULL, NULL, NULL, '357/A/8/1, 2nd,Right', NULL, 'M-114/48', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(391, 'Mr Tomal ', 'Mother', NULL, '', NULL, NULL, NULL, NULL, NULL, '357/A/8/1, 1st Floor', NULL, 'M-113/49', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(392, 'Mr Epu', 'Epu', NULL, '', NULL, NULL, NULL, NULL, NULL, '357/A/8/1, 2nd Floor,Left', NULL, 'M-116/50', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(393, 'Mr Asad', 'Asad', NULL, '', NULL, NULL, NULL, NULL, NULL, '357/A/8/1, 3rd Floor,Right', NULL, 'M- 114A/51', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(394, 'Mr Akter', 'Akter', NULL, '1688737093', NULL, NULL, NULL, NULL, NULL, '357/A/8/1, 3rd Floor,Left', NULL, 'M - 111/52', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(395, '', '', NULL, '', NULL, NULL, NULL, NULL, NULL, '357/A/9/1, G F, Right', NULL, 'M - 01/53', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(396, 'Mrs Nayem', 'Nayem', NULL, '', NULL, NULL, NULL, NULL, NULL, '357/A/9/1, 1st Floor, Right', NULL, 'M-03/54', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(397, 'Mr Kamal ', 'Hayder', NULL, '1711031686', NULL, NULL, NULL, NULL, NULL, '357/A/9/1, 1st Floor, Left', NULL, 'M-02/55', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(398, 'Mr. Khokon', 'Khokon', NULL, '1711548677', NULL, NULL, NULL, NULL, NULL, '357/A/9/1, 2nd Floor', NULL, 'M -04/56', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(399, 'Mr Selim', 'Selim', NULL, '1711544396', NULL, NULL, NULL, NULL, NULL, '357/A/9/1, 3rd Floor', NULL, 'M-05/57', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(400, 'Mr Tarek', 'Tarek', NULL, '1716008021', NULL, NULL, NULL, NULL, NULL, '357/A/9/1, 4th Floor,Left', NULL, 'M-07/58', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(401, 'Mr Towhid', 'Towhid', NULL, '', NULL, NULL, NULL, NULL, NULL, '357/A/6, G F, Left', NULL, 'M-09/59', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(402, 'Mr Khayrul ', 'Islam', NULL, '', NULL, NULL, NULL, NULL, NULL, '357/A/6, G F, Right', NULL, 'M-10/60', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(403, 'Mr Abdul ', 'Mannan', NULL, '', NULL, NULL, NULL, NULL, NULL, '357/A/6, 1st Floor', NULL, 'M-11/61', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(404, 'Mr Toimur ', 'Hossain', NULL, '', NULL, NULL, NULL, NULL, NULL, '357/A/6, 2nd Floor, Left', NULL, 'M-12/62', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(405, 'Mr Fahim', 'Fahim', NULL, '1954301046', NULL, NULL, NULL, NULL, NULL, '357/A/6, 2nd Floor,Right', NULL, 'M-13/63', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(406, 'Mr Jahid', 'Jahid', NULL, '1710924468', NULL, NULL, NULL, NULL, NULL, '357/A/6, 3rd Floor, Left', NULL, 'M -  /64', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(407, 'Mr Delower ', 'Hossain', NULL, '1711113130', NULL, NULL, NULL, NULL, NULL, '357/A/6, 3rd Floor,Right', NULL, 'M - 14/65', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(408, 'Mr Shekh Mohammad Helal ', 'Uddin', NULL, '1717208011', NULL, NULL, NULL, NULL, NULL, '357/A/6, 4th Floor,Left', NULL, 'M-16/66', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(409, 'Mr Sadman ', 'Sakib', NULL, '1715018199', NULL, NULL, NULL, NULL, NULL, '357/A/6, 4th Floor,Right', NULL, 'M-15/67', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(410, 'Mrs Popy', 'Popy', NULL, '1811522107', NULL, NULL, NULL, NULL, NULL, '357/A/5, room-3', NULL, 'M - 95/68', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(411, 'Mr Poly', 'Poly', NULL, '1716001957', NULL, NULL, NULL, NULL, NULL, '357/A/5, Tinset room-4', NULL, 'M - 96/69', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(412, 'Mr. Rasel', 'Rasel', NULL, '', NULL, NULL, NULL, NULL, NULL, '357/A/5, Tinset room-7', NULL, 'M -   /70', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(413, 'Mrs Rajia ', 'Begum', NULL, '1984415390', NULL, NULL, NULL, NULL, NULL, '357/A/5, ', NULL, 'M - 97/71', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(414, 'Mr. Humaun ', 'Kabir', NULL, '1917040124', NULL, NULL, NULL, NULL, NULL, '357/A/5, G F', NULL, 'M - 90/72', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(415, 'Mr Mintu Pan ', 'Dhokan', NULL, '1916583397', NULL, NULL, NULL, NULL, NULL, '357/A/5, G F, out Site', NULL, 'M - 93/73', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(416, 'Mr Tuhin ', 'Tuhin', NULL, '1925083221', NULL, NULL, NULL, NULL, NULL, '357/A/5, G F, out Site', NULL, 'M - 100/74', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(417, 'Mr Sayed ', 'Hasan', NULL, '1716618497', NULL, NULL, NULL, NULL, NULL, '357/A/5, 1st Floor,Right', NULL, 'M - 73/75', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(418, 'Mr Onik', 'Onik', NULL, '1726945872', NULL, NULL, NULL, NULL, NULL, '357/A/5, 1st Floor,Left', NULL, 'M-94/76', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(419, 'Mrs Beuty', 'Beuty', NULL, '1714410716', NULL, NULL, NULL, NULL, NULL, '357/A/5, 2nd Floor.Left', NULL, 'M-   /77', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(420, 'Mr. Asif', 'Asif', NULL, '1715182947', NULL, NULL, NULL, NULL, NULL, '357/A/5, 2nd Floor,Left', NULL, 'M -    /78', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(421, 'Mrs Sadia', 'Sadia', NULL, '1727678580', NULL, NULL, NULL, NULL, NULL, '357/A/5, 4th Floor', NULL, 'M - 94A/79', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(422, 'Mr. Emran', 'Emran', NULL, '1629078576', NULL, NULL, NULL, NULL, NULL, '357/A/5, 4th Floor,Right', NULL, 'M - 94B/80', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(423, 'Mr Orup', 'Orup', NULL, '1756028618', NULL, NULL, NULL, NULL, NULL, '357/A/9, G F Soja', NULL, 'M -    /81', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(424, 'Mrs Laky', 'Laky', NULL, '1612548839', NULL, NULL, NULL, NULL, NULL, '357/A/10, G F,Right', NULL, 'M-    /82', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(425, 'Mr. Maruf', 'Maruf', NULL, '1919881472', NULL, NULL, NULL, NULL, NULL, '357/A/10, G F,right', NULL, 'M - 122/83', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(426, 'Mr Mokul', 'Mokul', NULL, '1719787489', NULL, NULL, NULL, NULL, NULL, '357/A/10, 1st Floor', NULL, 'M -      /84', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(427, 'Mrs. Maria ', 'Parul', NULL, '1722040442', NULL, NULL, NULL, NULL, NULL, '357/A/10, 1st Floor', NULL, 'M -    /85', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(428, 'Mr Mirza Abul ', 'Faruk', NULL, '1912846055', NULL, NULL, NULL, NULL, NULL, '357/A/10, 3rd Floor', NULL, 'M-    /86', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(429, 'Mirza Kanij', 'Fatema', NULL, '1912846055', NULL, NULL, NULL, NULL, NULL, '357/A/10, 2nd Floor', NULL, 'M -    /87', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(430, 'Mr Raju', 'Raju', NULL, '1711504510', NULL, NULL, NULL, NULL, NULL, '357/A/11, G F & 1st Floor', NULL, 'M - 130/88', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(431, 'Mr Nayeem/Srabon', 'Nayeem/Srabon', NULL, '1705791816', NULL, NULL, NULL, NULL, NULL, '357/A/12, G F ,Right', NULL, 'M-133/89', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(432, 'Mr Eliash', 'Eliash', NULL, '1910261079', NULL, NULL, NULL, NULL, NULL, '357/A/12, G F ,Right', NULL, 'M-132/90', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(433, 'Mrs Nazma', 'Nazma', NULL, '1682620995', NULL, NULL, NULL, NULL, NULL, '357/A/12, G F ,Left', NULL, 'M-132A/91', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(434, 'Mr. Tushar', 'Tushar', NULL, '1777786888', NULL, NULL, NULL, NULL, NULL, '357/A/12, 1st Floor', NULL, 'M - 134/92', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(435, 'Mr. Dada', 'Dada', NULL, '1929574752', NULL, NULL, NULL, NULL, NULL, '357/A/12, 2nd Floor,Right', NULL, 'M - 137/93', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(436, 'Mr. Selimullah', 'Selimullah', NULL, '1552313807', NULL, NULL, NULL, NULL, NULL, '357/A/12, 2nd Floor,Left', NULL, 'M - 135/94', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(437, 'Mr. Abu ', 'Taher', NULL, '1821725778', NULL, NULL, NULL, NULL, NULL, '357/A/12, 2nd Floor,Left', NULL, 'M - 136/95', 0, 0, '0007-02-18', 2, '2019-01-07 08:25:23'),
(438, 'Mr. Akter ', 'Hossain', NULL, '1709992575', NULL, NULL, NULL, NULL, NULL, '357/A/12, 3rd Floor,Right', NULL, 'M -      /96', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(439, 'Mr. Lakkan ', 'Sir', NULL, '1719403412', NULL, NULL, NULL, NULL, NULL, '357/A/12, 3rd Floor,Left', NULL, 'M -138/97', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(440, 'Mr. Joy', 'Joy', NULL, '1813038650', NULL, NULL, NULL, NULL, NULL, '357/A/12, 3rd Floor', NULL, 'M -139/98', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(441, 'Mr. Kanchon', 'Kanchon', NULL, '1815553539', NULL, NULL, NULL, NULL, NULL, '357/A/12, 3rd Floor,Left', NULL, 'M -    /99', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(442, 'Mrs Shikha/Jahangir ', 'Alom', NULL, '1912078577', NULL, NULL, NULL, NULL, NULL, '357/A/12, 4th Floor,Right', NULL, 'M -142/100', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(443, 'Mr. Selim', 'Selim', NULL, '1819127053', NULL, NULL, NULL, NULL, NULL, '357/A/12, 4th Floor,Left', NULL, 'M -140/101', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(444, 'Mr. Firoj/Saiful', 'Firoj/Saiful', NULL, '', NULL, NULL, NULL, NULL, NULL, '357/A/12, 4th Floor,Left', NULL, 'M -141/102', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(445, 'Mr. Mostofa ', 'Hawlader', NULL, '1673737719', NULL, NULL, NULL, NULL, NULL, '357/A/14, 3rd Floor,Left', NULL, 'M-162/103', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(446, 'Mrs Rubi', 'Rubi', NULL, '1916917476', NULL, NULL, NULL, NULL, NULL, '357/A/14, Sader Upor', NULL, 'M -164/104', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(447, 'Mrs Rita ', 'Khanom', NULL, '1754294505', NULL, NULL, NULL, NULL, NULL, '357/A/13, 1st Floor', NULL, 'M-147/105', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(448, 'Mr. Reduan', 'Reduan', NULL, '1770683002', NULL, NULL, NULL, NULL, NULL, '357/A/13, 2nd Floor,Left', NULL, 'M -145/106', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(449, 'Mr Jishan', 'Jishan', NULL, '1713521784', NULL, NULL, NULL, NULL, NULL, '357/A/13, 2nd Floor,Right', NULL, 'M - 107', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(450, 'Mr Sajid', 'Sajid', NULL, '1719026661', NULL, NULL, NULL, NULL, NULL, '357/A/13, 2nd Floor,Left', NULL, 'M -149/108', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(451, 'Mrs Mitu ', 'Haque', NULL, '1533603853', NULL, NULL, NULL, NULL, NULL, '357/A/13, 3rd Floor,Right', NULL, 'M -148/109', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(452, 'Mr Mizanur ', 'Rahman', NULL, '1712168646', NULL, NULL, NULL, NULL, NULL, '357/A/13, 4th Floor,Right', NULL, 'M-156/110', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(453, 'Mr Kamrul ', 'Hasan', NULL, '1940733567', NULL, NULL, NULL, NULL, NULL, '357/A/13, 4th Floor,Left', NULL, 'M-161/111', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(454, 'Mr Parvez', 'Parvez', NULL, '1712029102', NULL, NULL, NULL, NULL, NULL, '357/A/13, 4th Floor,Right', NULL, 'M - 146/112', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(455, 'Mrs Junu', 'Junu', NULL, '1941355396', NULL, NULL, NULL, NULL, NULL, '357/A/13, 5th Floor,Left', NULL, 'M-150/113', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(456, 'Mr Jasim', 'Jasim', NULL, '', NULL, NULL, NULL, NULL, NULL, '357/A/13, 5th Floor,Left', NULL, 'M-     /114', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(457, 'Mr Halim', 'Halim', NULL, '', NULL, NULL, NULL, NULL, NULL, '357/A/13/ka, Tinset', NULL, 'M-115', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(458, 'Mr Sagor', 'Sagor', NULL, '2835887', NULL, NULL, NULL, NULL, NULL, '357/A/13/ka, Tinset', NULL, 'M-116', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(459, 'Mrs Sathi', 'Sathi', NULL, '1705025513', NULL, NULL, NULL, NULL, NULL, '357/A/13/ka, Tinset', NULL, 'M-80/117', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(460, 'Mr Moshiur', 'Moshiur', NULL, '1973601750', NULL, NULL, NULL, NULL, NULL, '357/A/13/ka, Tinset', NULL, 'M-118', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(461, 'Mr. Kamruzzaman', 'Kamruzzaman', NULL, '1717494696', NULL, NULL, NULL, NULL, NULL, '357/A/13/ka, Tinset', NULL, 'M - 175/118', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(462, 'Mrs Nasrin', 'Nasrin', NULL, '1955066917', NULL, NULL, NULL, NULL, NULL, '357/A/13/ka, Tinset,R-02', NULL, 'M - 153a/119', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(463, 'Mr. Jalal', 'Jalal', NULL, '', NULL, NULL, NULL, NULL, NULL, '357/A/13/ka, Tinset', NULL, 'M - 120', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(464, 'Md. Alif', 'Alif', NULL, '1788152574', NULL, NULL, NULL, NULL, NULL, '357/A/13/kha, Tinset', NULL, 'M - 158/121', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(465, 'Mr Sathi', 'Sathi', NULL, '', NULL, NULL, NULL, NULL, NULL, '357/A/13/kha, Tinset', NULL, 'M - 155A/122', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(466, 'Mrs Kohinur', 'Kohinur', NULL, '182362446', NULL, NULL, NULL, NULL, NULL, '357/A/13/kha, Tinset', NULL, 'M-154/123', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(467, 'Mr Tofazzal ', 'Hossain', NULL, '', NULL, NULL, NULL, NULL, NULL, '357/A/16, Under Ground', NULL, 'M - 124', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(468, 'Mrs Shokhi', 'Shokhi', NULL, '1764319946', NULL, NULL, NULL, NULL, NULL, '357/A/16, Under Ground', NULL, 'M-125', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(469, 'Mr Mokul', 'Mokul', NULL, '1821362464', NULL, NULL, NULL, NULL, NULL, '357/A/16, Under Ground', NULL, 'M-126', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(470, 'Mr Sharif', 'Sharif', NULL, '', NULL, NULL, NULL, NULL, NULL, '357/A/17, Under Ground,room-4', NULL, 'M - 127', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(471, 'Mr Farhad', 'Farhad', NULL, '', NULL, NULL, NULL, NULL, NULL, '357/A/17, Under Ground,room-3', NULL, 'M-128', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(472, 'Mr Abir Al ', 'Hasan', NULL, '1791572019', NULL, NULL, NULL, NULL, NULL, '357/A/17,1st Floor,Room-4', NULL, 'M-129', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(473, 'Mr. Aziz', 'Aziz', NULL, '1977031713', NULL, NULL, NULL, NULL, NULL, '357/A/17,1st Floor,Room-1', NULL, 'M-1130', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(474, 'Mr. Nasim', 'Nasim', NULL, '', NULL, NULL, NULL, NULL, NULL, '357/A/9/2,G F,Right', NULL, 'M -131', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(475, 'Mr Daud', 'Daud', NULL, '1885075542', NULL, NULL, NULL, NULL, NULL, '357/A/9/2,3rd Floor,Left', NULL, 'M-132', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(476, 'Mr Masum', 'Masum', NULL, '1714832640', NULL, NULL, NULL, NULL, NULL, '357/A/9/2,3rd Floor', NULL, 'M - 133', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(477, 'Rojina ', 'Islam', NULL, '1942230858', NULL, NULL, NULL, NULL, NULL, '357/A/9/2,4th Floor', NULL, 'M-134', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(478, 'Mr Sajid/shahid', 'Sajid/shahid', NULL, '1712009162', NULL, NULL, NULL, NULL, NULL, '357/A/9/2,5th Floor', NULL, 'M-135', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(479, 'Mr Gazi Anamul ', 'Haque', NULL, '', NULL, NULL, NULL, NULL, NULL, '357/A/9/2,6th Floor', NULL, 'M-136', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(480, 'Mr Tuhin ', 'Ahammed', NULL, '1552300538', NULL, NULL, NULL, NULL, NULL, '357/2, tinset', NULL, 'M-137', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(481, 'Mr Muja ', 'Miah', NULL, '1734224005', NULL, NULL, NULL, NULL, NULL, '357/2, tinset', NULL, 'M-138', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(482, 'Rubina', 'Rubina', NULL, '1937056763', NULL, NULL, NULL, NULL, NULL, '357/A/15, G F,Right', NULL, 'M-165/139', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(483, 'Mr Rafiq ', 'Ahammed', NULL, '', NULL, NULL, NULL, NULL, NULL, '357/A/15, 1st Floor', NULL, 'M-166/140', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(484, 'Mr ', 'Mr ', NULL, '', NULL, NULL, NULL, NULL, NULL, '357/A/15, 2nd Floor', NULL, 'M-141', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(485, 'Mr. Shahid', 'Shahid', NULL, '1773942759', NULL, NULL, NULL, NULL, NULL, '357/A/15, Under Ground', NULL, 'M-167/142', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(486, 'Mr Khayrul ', 'Khayrul', NULL, '', NULL, NULL, NULL, NULL, NULL, '357/A/15, Under Ground', NULL, 'M-143/143', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(487, 'Mrs Rehena', 'Rehena', NULL, '', NULL, NULL, NULL, NULL, NULL, '357/A/15, Under Ground', NULL, 'M-144/144', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(488, 'Mr Joshim', 'Joshim', NULL, '', NULL, NULL, NULL, NULL, NULL, '357/A/15, Under Ground', NULL, 'M-145', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(489, 'Mr Saddam', 'Saddam', NULL, '1620620007', NULL, NULL, NULL, NULL, NULL, '357/A/19, Tinset', NULL, 'M-10/146', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(490, 'Mr Ripon', 'Ripon', NULL, '', NULL, NULL, NULL, NULL, NULL, '357/A/19, Tinset', NULL, 'M-16/147', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(491, 'Mr Arafat', 'Arafat', NULL, '1705793565', NULL, NULL, NULL, NULL, NULL, '357/A/19, Tinset', NULL, 'M-12/148', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(492, 'Mrs Rubina', 'Rubina', NULL, '', NULL, NULL, NULL, NULL, NULL, '357/A/19, Tinset', NULL, 'M-15/149', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(493, 'Mr Arshadul', 'Arshadul', NULL, '1936552577', NULL, NULL, NULL, NULL, NULL, '357/A/19, Tinset', NULL, 'M-17/150', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(494, 'Mr Bulbul', 'Bulbul', NULL, '1991806764', NULL, NULL, NULL, NULL, NULL, '357/A/13/1, Under Ground', NULL, 'M-11/151', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(495, 'Mr Kamrul', 'Kamrul', NULL, '', NULL, NULL, NULL, NULL, NULL, '357/A/13/1, Under Ground', NULL, 'M-18/152', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(496, 'Mr Bahar', 'Bahar', NULL, '1828618110', NULL, NULL, NULL, NULL, NULL, '357/A/13/1, Under Ground', NULL, 'M-19/153', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(497, 'Mr Abul ', 'Bashar', NULL, '1786272876', NULL, NULL, NULL, NULL, NULL, '357/A/13/1, Under Ground', NULL, 'M-20/154', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(498, 'Mr Juel', 'Juel', NULL, '1728978888', NULL, NULL, NULL, NULL, NULL, '357/A/13/1, Under Ground', NULL, 'M-21/155', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(499, 'Mr Masud ', 'Rana', NULL, '1728978888', NULL, NULL, NULL, NULL, NULL, '357/A/13/1, Under Ground', NULL, 'M-21/156', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(500, 'Mr Al-amin', 'Al-amin', NULL, '', NULL, NULL, NULL, NULL, NULL, '357/A/13/1, 1st Floor', NULL, 'M-22/157', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(501, 'Mr Riju ', 'Miah', NULL, '1777136366', NULL, NULL, NULL, NULL, NULL, '357/A/13/1, 1st Floor', NULL, 'M-23/158', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(502, '', '', NULL, '', NULL, NULL, NULL, NULL, NULL, '357/A/13/1, 1st Floor,R-18', NULL, 'M-24/159', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(503, 'Mr Mozammel ', 'Haque', NULL, '1720087576', NULL, NULL, NULL, NULL, NULL, '357/A/13/1, 1st Floor', NULL, 'M-25/160', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(504, 'Mr Mozam ', 'Manager', NULL, '', NULL, NULL, NULL, NULL, NULL, '357/A/13/1,G Floor', NULL, 'M-28/161', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(505, 'Mr Nannu', 'Nannu', NULL, '', NULL, NULL, NULL, NULL, NULL, '357/A/13/1, 1st Floor', NULL, 'M-30/162', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(506, 'Mr Ronjon', 'Ronjon', NULL, '', NULL, NULL, NULL, NULL, NULL, '357/A/13/1, 1st Floor', NULL, 'M-31/163', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(507, 'Bina', 'Bina', NULL, '1792188459', NULL, NULL, NULL, NULL, NULL, '357/A/17, 1st Floor', NULL, 'M-32/164', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(508, 'Mr Titu', ' Titu', NULL, '', NULL, NULL, NULL, NULL, NULL, '357/A/17, 1st Floor', NULL, 'M-33/165', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(509, 'Mr Mamun', 'Mamun', NULL, '1786232681', NULL, NULL, NULL, NULL, NULL, '357/A/17, 1st Floor', NULL, 'M-34/166', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(510, 'Mr Jamal', 'Jamal', NULL, '1742909991', NULL, NULL, NULL, NULL, NULL, '357/A/17, 1st Floor', NULL, 'M-36/167', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(511, 'Mr Kalam', 'Kalam', NULL, '', NULL, NULL, NULL, NULL, NULL, '357/A/17, Under Ground', NULL, 'M-35/168', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(512, 'Mr Tohin', 'Tohin', NULL, '', NULL, NULL, NULL, NULL, NULL, '357/A/14, 2nd Floor', NULL, 'M- 169', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(513, 'Mr Somrat ', 'Hossain', NULL, '1703791887', NULL, NULL, NULL, NULL, NULL, '357/A/5, 3rd Floor', NULL, 'M- 170', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(514, 'Mr Farok', 'Farok', NULL, '1934778662', NULL, NULL, NULL, NULL, NULL, '357/13/KA', NULL, 'M-171', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(515, 'Mr Siddiqur ', 'Rahman', NULL, '1925693120', NULL, NULL, NULL, NULL, NULL, '357/A/9/1, 4th Floor', NULL, 'M- 172', 0, 0, '2020-11-18', 2, '2019-01-07 08:25:23'),
(516, 'Mr Faruk ', 'Khan', NULL, '1956171279', NULL, NULL, NULL, NULL, NULL, '357/A/13, G  Floor', NULL, 'M- 173', 0, 0, '2022-11-18', 2, '2019-01-07 08:25:23'),
(517, 'Mr Juel', 'Juel', NULL, '1927828442', NULL, NULL, NULL, NULL, NULL, '357/A/2, Tinset', NULL, 'M- 174', 0, 0, '2027-11-18', 2, '2019-01-07 08:25:23'),
(518, 'Mr Sohel', 'Sohel', NULL, '19244756962', NULL, NULL, NULL, NULL, NULL, '357/A/15, Under Ground', NULL, 'M- 175', 0, 0, '2027-11-18', 2, '2019-01-07 08:25:23'),
(519, 'Mr Nabi', 'Nabi', NULL, '1714038936', NULL, NULL, NULL, NULL, NULL, '357/A/13, 2nd Floor', NULL, 'M- 176', 0, 0, '0002-12-18', 2, '2019-01-07 08:25:23'),
(520, 'Mr Poritosh', 'Poritosh', NULL, '1824929083', NULL, NULL, NULL, NULL, NULL, '357/A/13/kha, Tinset', NULL, 'M- 177', 0, 0, '2010-12-18', 2, '2019-01-07 08:25:23'),
(521, 'Md. Abdur', 'Rashid', NULL, '', NULL, NULL, NULL, NULL, NULL, '590, GF, Left', NULL, 'K - 01/01', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(522, 'Mr. Towfik', 'Towfik', NULL, '1923407457', NULL, NULL, NULL, NULL, NULL, '590, GF, Left', NULL, 'K - 02/02', 0, 1, '0000-00-00', 2, '2019-01-07 08:25:23'),
(523, 'Mr Abdur ', 'Rahim', NULL, '1926185221', NULL, NULL, NULL, NULL, NULL, '590, 1st Floor, LF', NULL, 'K- 03/03', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(524, 'Mr Samsul', ' Alom', NULL, '1716111047', NULL, NULL, NULL, NULL, NULL, '590, 1st Floor, Right', NULL, 'K- 04/04', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(525, 'Mr Sohag', 'Sohag', NULL, '1672684975', NULL, NULL, NULL, NULL, NULL, '590, 2nd Floor,A-3', NULL, 'K-05/05', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(526, 'The Moon ', 'Enterprise', NULL, '1714037895', NULL, NULL, NULL, NULL, NULL, '590, 2nd Floor,B-3', NULL, 'K-06/06', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(527, 'Mr Firoj', 'Firoj', NULL, '1556339197', NULL, NULL, NULL, NULL, NULL, '590, 3rd Floor ,LF-04', NULL, 'K-08/07', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(528, 'Mr Sobuj', 'Sobuj', NULL, '', NULL, NULL, NULL, NULL, NULL, '590, 5th Floor ', NULL, 'K-08', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(529, 'Mr Arefin', 'Arefin', NULL, '1716681518', NULL, NULL, NULL, NULL, NULL, '590/1, 3rd Floor ', NULL, 'K-11A/09', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(530, 'Mr. Jobair ', 'Ahammed', NULL, '', NULL, NULL, NULL, NULL, NULL, '590/A/5,1st Floor', NULL, 'K - 12/10', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(531, 'Mr. Yousuf', 'Yousuf', NULL, '1671089144', NULL, NULL, NULL, NULL, NULL, '590/A/5, 2nd Floor', NULL, 'K - 13/11', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(532, 'Mr Tofayel', 'Tofayel', NULL, '1914816624', NULL, NULL, NULL, NULL, NULL, '590/A/5, 3rd  Floor', NULL, 'K-14/12', 0, 2, '0000-00-00', 2, '2019-01-07 08:25:23'),
(533, 'Mr Hasina ', 'Momotaj', NULL, '1712047051', NULL, NULL, NULL, NULL, NULL, '590/A/5, 4th Floor', NULL, 'K-15/13', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(534, 'Mr Delower ', 'Hossain', NULL, '1823867903', NULL, NULL, NULL, NULL, NULL, '590/A/3, G Floor', NULL, 'K-16/14', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(535, 'Mr Yusuf Ali ', 'Patowary', NULL, '1817572921', NULL, NULL, NULL, NULL, NULL, '590/A/3, 3rd Floor, Left', NULL, 'K-17/15', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(536, 'Mr Rijon', 'Rijon', NULL, '1913086995', NULL, NULL, NULL, NULL, NULL, '590/A/3, 1st Floor,LF', NULL, 'K-18/16', 0, 2, '0000-00-00', 2, '2019-01-07 08:25:23'),
(537, 'Mr Lalin', 'Lalin', NULL, '1819223920', NULL, NULL, NULL, NULL, NULL, '590/A/3, 1st Floor,RI', NULL, 'K-19/17', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(538, 'Mr Liton', 'Liton', NULL, '1716018084', NULL, NULL, NULL, NULL, NULL, '590/A/3, 2nd Floor,LF, ST', NULL, 'K-20/18', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(539, 'Mr Sakib', 'Sakib', NULL, '1720509181', NULL, NULL, NULL, NULL, NULL, '590/A/3, 2nd Floor,LF', NULL, 'K-21/19', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(540, 'Mr Moradul ', 'Islam', NULL, '1714325532', NULL, NULL, NULL, NULL, NULL, '590/A/3, 3rd Floor,LF', NULL, 'K-23/20', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(541, 'Mr Shamim', 'Shamim', NULL, '1813815831', NULL, NULL, NULL, NULL, NULL, '590/A/3, 3rd Floor,RI', NULL, 'K-24/21', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(542, 'Mr. Ali ', 'Akbor', NULL, '', NULL, NULL, NULL, NULL, NULL, '590/3, 3rd Floor, LF', NULL, 'K - 25/22', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(543, 'Mr. Polash', 'Polash', NULL, '', NULL, NULL, NULL, NULL, NULL, '590/A/2, G F, ST', NULL, 'K - 27/23', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(544, 'Farhana ', 'Naj', NULL, '1712620707', NULL, NULL, NULL, NULL, NULL, '590/A/2, 1st Floor', NULL, 'K-28/24', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(545, 'Mr A. M Mojammel ', 'Haque ', NULL, '172620707', NULL, NULL, NULL, NULL, NULL, '590/A/2, 2nd  Floor', NULL, 'K-29/25', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(546, 'Mr Shajahan ', 'Shajahan', NULL, '1720938799', NULL, NULL, NULL, NULL, NULL, '590/A/1, 1st Floor', NULL, 'K-30/26', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(547, 'Mr Roky', 'Roky', NULL, '17111683359', NULL, NULL, NULL, NULL, NULL, '590/A/1, 2nd Floor', NULL, 'K-31/27', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(548, 'Mrs. Ummay ', 'Salma', NULL, '1876891989', NULL, NULL, NULL, NULL, NULL, '590/A, 1st Floor,  A-1,', NULL, 'K - 32/28', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(549, 'Mr. Ruhul ', 'Amin', NULL, '1777777911', NULL, NULL, NULL, NULL, NULL, '590/A, 3rd,  A-3,', NULL, 'K - 33/29', 0, 1, '0000-00-00', 2, '2019-01-07 08:25:23'),
(550, 'Mr. Jahid ', 'Hossain', NULL, '1770548806', NULL, NULL, NULL, NULL, NULL, '590/A, 4th,  A-4,', NULL, 'K - 34/30', 0, 2, '0000-00-00', 2, '2019-01-07 08:25:23'),
(551, 'Dr. Sharon', 'Sharon', NULL, '1718827138', NULL, NULL, NULL, NULL, NULL, '590/A, B-4', NULL, 'K-35/31', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(552, 'Mr. Moniruzzaman', 'Moniruzzaman', NULL, '1711830417', NULL, NULL, NULL, NULL, NULL, '590/A, 5th,  A-5,', NULL, 'K - 36/32', 0, 1, '0000-00-00', 2, '2019-01-07 08:25:23'),
(553, 'Mr. Raju', 'Raju', NULL, '1911611459', NULL, NULL, NULL, NULL, NULL, '590/A, 6th,  B-6,', NULL, 'K - 37/33', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(554, 'Mr. Salim', 'Salim', NULL, '1979727985', NULL, NULL, NULL, NULL, NULL, '590/A, 6th Floor, A-6', NULL, 'K - 38/34', 0, 2, '0005-08-17', 2, '2019-01-07 08:25:23'),
(555, 'Mr. Milon ', '(Nari Moitry)', NULL, '1737954211', NULL, NULL, NULL, NULL, NULL, '590/A, GF Floor', NULL, 'K - 39/35', 0, 0, '0005-08-17', 2, '2019-01-07 08:25:23'),
(556, 'Mr Ripon   ', 'Ripon', NULL, '1726055895', NULL, NULL, NULL, NULL, NULL, '594/A, 5th Floor', NULL, 'K-40/36', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(557, 'Mr. Totul', 'Totul', NULL, '1730053111', NULL, NULL, NULL, NULL, NULL, '594/A, 1no room-108', NULL, 'K -41/37', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(558, 'Mr. Shahabuddin', 'Shahabuddin', NULL, '1728037899', NULL, NULL, NULL, NULL, NULL, 'A, 2nd room-303', NULL, 'K - 42/38', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(559, 'Mr Nesar ', 'Uddin', NULL, '', NULL, NULL, NULL, NULL, NULL, '594/A, 1st Floor', NULL, 'K-43/39', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(560, 'Mr. Al-amin', 'Al-amin', NULL, '1721292003', NULL, NULL, NULL, NULL, NULL, '594/A,1st, RI', NULL, 'K - 44/40', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(561, 'Mr Ripon', 'Ripon', NULL, '1726055895', NULL, NULL, NULL, NULL, NULL, '594/A, 2nd Floor', NULL, 'K-45/41', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(562, 'Mr ', 'Mr ', NULL, '1726055895', NULL, NULL, NULL, NULL, NULL, '594/A, Room no-306', NULL, 'K-45A/42', 0, 0, '0002-06-18', 2, '2019-01-07 08:25:23'),
(563, 'Mr Anamul', 'Anamul', NULL, '', NULL, NULL, NULL, NULL, NULL, '594/A, 3rd Floor', NULL, 'K-46/43', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(564, 'Mr Tofazzal Hossain', ' Khan', NULL, '', NULL, NULL, NULL, NULL, NULL, '594/A, 4th Floor', NULL, 'K-47/44', 0, 2, '0000-00-00', 2, '2019-01-07 08:25:23'),
(565, 'Mr Razzak', 'Razzak', NULL, '', NULL, NULL, NULL, NULL, NULL, '594/A/KA, G Floor,LF', NULL, 'K-47A/45', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(566, 'Mr Shahinur ', 'Zaman', NULL, '1704117291', NULL, NULL, NULL, NULL, NULL, '590/A/Ka, 3rd Floor ,4-B', NULL, 'K-48/46', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(567, 'Mr Imran ', 'Hossain', NULL, '1723710819', NULL, NULL, NULL, NULL, NULL, '590/A/KA, 2nd Floor', NULL, 'K-49/47', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(568, 'Mr. Rubayet ', 'Hossain', NULL, '1721292003', NULL, NULL, NULL, NULL, NULL, '590/A/ka, 2nd Floor', NULL, 'K - 50/48', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(569, 'Mr Tarek', 'Tarek', NULL, '1670847182', NULL, NULL, NULL, NULL, NULL, '590/A/ka, 3rd, LF,4-A', NULL, 'K - 52/49', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(570, 'Mr Masum', 'Masum', NULL, '1631475573', NULL, NULL, NULL, NULL, NULL, '590/A/KA 4th Floor,A-5', NULL, 'K-54/50', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(571, 'Mr Jony', 'Jony', NULL, '1536207475', NULL, NULL, NULL, NULL, NULL, '590/B, G Floor', NULL, 'K-55/51', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(572, 'Mr Lablu ', 'Ahamed', NULL, '1713332619', NULL, NULL, NULL, NULL, NULL, '590/B/2/A', NULL, 'K-56/52', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(573, 'Mr Alomgir ', 'Alomgir', NULL, '1912476461', NULL, NULL, NULL, NULL, NULL, '590/B, 2nd Floor, 3-A', NULL, 'K-57/53', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(574, 'Mirja  ', 'Ahamed', NULL, '1912368520', NULL, NULL, NULL, NULL, NULL, '590/B ,2nd Floor,3-B', NULL, 'K-58/54', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(575, 'Mr Saiful ', 'Islam', NULL, '1713276217', NULL, NULL, NULL, NULL, NULL, '590/B, 3/C,', NULL, 'K-59/55', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(576, 'Mr Linkkon', 'Linkkon', NULL, '1913216890', NULL, NULL, NULL, NULL, NULL, '590/B (4-A)', NULL, 'K-60/56', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(577, 'Suboth Kumar ', 'Hawlader', NULL, '1725764651', NULL, NULL, NULL, NULL, NULL, '590/B, 3nd Floor, 4/B', NULL, 'K-61/57', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(578, 'Mr Wasim ', 'Ahamed', NULL, '1715540639', NULL, NULL, NULL, NULL, NULL, '590/B, 3rd Floor,(4-C)', NULL, 'K-62/58', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(579, 'Mr. Nasir ', 'Uddin', NULL, '', NULL, NULL, NULL, NULL, NULL, '590/B, A-5', NULL, 'K - 63/59', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(580, 'Mr Harun', 'Harun', NULL, '1923692799', NULL, NULL, NULL, NULL, NULL, '590/B, 4th Floor, 5-B', NULL, 'K-64/60', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(581, 'Mr Liton', 'Liton', NULL, '1557191470', NULL, NULL, NULL, NULL, NULL, '590/B, 4th Floor, 5-C', NULL, 'K-65/61', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(582, 'Mr. Towfik ', 'Ahammed', NULL, '1915777773', NULL, NULL, NULL, NULL, NULL, '593/1, G F', NULL, 'K - 66/62', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(583, 'Mr. Sabbir', 'Sabbir', NULL, '1680043374', NULL, NULL, NULL, NULL, NULL, '593/1, 1st Floor', NULL, 'K - 67/63', 0, 0, '2022-12-06', 2, '2019-01-07 08:25:23'),
(584, 'Mr Saiful ', 'Islam', NULL, '1716851552', NULL, NULL, NULL, NULL, NULL, '593/1, 2nd Floor', NULL, 'K-68/64', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(585, 'Mr. Jalal', 'Jalal', NULL, '1716681518', NULL, NULL, NULL, NULL, NULL, '593/1, 3rd ', NULL, 'K-69/65', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(586, 'Mr. Saiful', 'Saiful', NULL, '1757314369', NULL, NULL, NULL, NULL, NULL, '593, Tin', NULL, 'K - 70/66', 0, 0, '2022-04-17', 2, '2019-01-07 08:25:23'),
(587, 'Mr. Alamgir', 'Alamgir', NULL, '193707317', NULL, NULL, NULL, NULL, NULL, '593, Tin', NULL, 'K - 71/67', 0, 0, '2022-04-17', 2, '2019-01-07 08:25:23'),
(588, 'Mr. Bellal', 'Bellal', NULL, '1911198926', NULL, NULL, NULL, NULL, NULL, '593, Tin', NULL, 'K - 72/68', 0, 0, '2022-04-17', 2, '2019-01-07 08:25:23'),
(589, 'Mr. Masum', 'Masum', NULL, '1719153151', NULL, NULL, NULL, NULL, NULL, '593, Tin', NULL, 'K - 73/69', 0, 0, '2022-04-17', 2, '2019-01-07 08:25:23'),
(590, 'Mr Sahjalal', 'Sahjalal', NULL, '', NULL, NULL, NULL, NULL, NULL, '591/C, Tinset', NULL, 'K-74/70', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(591, 'Mrs. Jahanara', 'Jahanara', NULL, '1884612699', NULL, NULL, NULL, NULL, NULL, '590/C, Tin', NULL, 'K - 75/71', 0, 0, '2022-04-17', 2, '2019-01-07 08:25:23'),
(592, 'Mr. Rasel ', 'Dewan', NULL, '1703494326', NULL, NULL, NULL, NULL, NULL, '590/C, Tin', NULL, 'K - 76/72', 0, 0, '2022-04-17', 2, '2019-01-07 08:25:23'),
(593, 'Mr. Bablu', 'Bablu', NULL, '174421703', NULL, NULL, NULL, NULL, NULL, '590/C, Tinset', NULL, 'K - 77/73', 0, 0, '2022-12-06', 2, '2019-01-07 08:25:23'),
(594, 'Mr. Alamin', 'Alamin', NULL, '1859534010', NULL, NULL, NULL, NULL, NULL, '593/A, GF, RI', NULL, 'K - 78/74', 0, 0, '2022-12-06', 2, '2019-01-07 08:25:23'),
(595, 'Mr Ebrahim', 'Ebrahim', NULL, '1730333380', NULL, NULL, NULL, NULL, NULL, '593/A, G Floor,Midel', NULL, 'K-79/75', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(596, 'Mr Asraf', 'Asraf', NULL, '1675262424', NULL, NULL, NULL, NULL, NULL, '593/A, G Floor,LF', NULL, 'K-80/76', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(597, '', '', NULL, '', NULL, NULL, NULL, NULL, NULL, '593/A, 1st Floor,LF', NULL, 'K - 81/77', 0, 0, '2022-12-06', 2, '2019-01-07 08:25:23'),
(598, 'Mrs Empa', 'Empa', NULL, '17190587755', NULL, NULL, NULL, NULL, NULL, '593/A, 5th Floor', NULL, 'K - 81B/78', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(599, 'Mr Faruk Ahamed', 'Ahamed', NULL, '1715582908', NULL, NULL, NULL, NULL, NULL, '593/A, 1st Floor', NULL, 'K-82/79', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(600, 'Rokibull', 'Rokibull', NULL, '17791590166', NULL, NULL, NULL, NULL, NULL, '593/A, 2nd Floor,LF', NULL, 'K -82A/80', 0, 0, '2022-12-06', 2, '2019-01-07 08:25:23'),
(601, 'Mr Shuvo', 'Shuvo', NULL, '1610168656', NULL, NULL, NULL, NULL, NULL, '593/A, 3rd Floor,LF', NULL, 'K -81A/81', 0, 0, '2013-02-18', 2, '2019-01-07 08:25:23'),
(602, 'Mr Sumon', 'Sumon', NULL, '', NULL, NULL, NULL, NULL, NULL, '593/2, GF.RI', NULL, 'K - 83/82', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(603, 'Mr Belal ', 'Mia', NULL, '1789420347', NULL, NULL, NULL, NULL, NULL, '593/2, GF,LF', NULL, 'K - 83A/83', 0, 0, '0003-03-18', 2, '2019-01-07 08:25:23'),
(604, 'Mr Sakur', 'Sakur', NULL, '1920174789', NULL, NULL, NULL, NULL, NULL, '593/2, 1st Floor,RI', NULL, 'K-84/84', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(605, 'Mr Babul', 'Babul', NULL, '1720089963', NULL, NULL, NULL, NULL, NULL, '593/2, 1st, LF', NULL, 'K - 85/85', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(606, 'Mr Raihan', 'Raihan', NULL, '1712754285', NULL, NULL, NULL, NULL, NULL, '593/2, 2nd, LF', NULL, 'K - 86/86', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(607, 'Mr Abdus ', 'Samad', NULL, '', NULL, NULL, NULL, NULL, NULL, '593/2, 2nd Floor', NULL, 'K-87/87', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(608, 'Mr Mirja ', 'Iyub', NULL, '1716278711', NULL, NULL, NULL, NULL, NULL, '593/2, 3rd, LF', NULL, 'K - 88/88', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(609, 'Mr Mainuddin', 'Mainuddin', NULL, '1716278711', NULL, NULL, NULL, NULL, NULL, '593/2, 3rd, RI', NULL, 'K - 89/89', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(610, 'Mr Monir', 'Monir', NULL, '', NULL, NULL, NULL, NULL, NULL, '591/1, GF, LF', NULL, 'K - 90/90', 0, 0, '2017-12-16', 2, '2019-01-07 08:25:23'),
(611, 'Mr. Kabir ', 'Khan', NULL, '1671455555', NULL, NULL, NULL, NULL, NULL, '591/1, GF,RI', NULL, 'K - 91/91', 500, 1, '2021-05-17', 2, '2019-01-07 08:25:23'),
(612, 'Mr R. I ', 'Siddiqui', NULL, '1819238728', NULL, NULL, NULL, NULL, NULL, '591/1, 2nd Floor', NULL, 'K-92/92', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(613, 'Mr Tonmoy ', 'Tonmoy', NULL, '1552442997', NULL, NULL, NULL, NULL, NULL, '591/1, 3rd Floor', NULL, 'K-93/93', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(614, 'Mr. Ajad ', 'Minto', NULL, '1711530675', NULL, NULL, NULL, NULL, NULL, '591, 1st Floor', NULL, 'K-94/94', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23');
INSERT INTO `cable_client` (`clientId`, `clientFirstName`, `clientLastName`, `email`, `phone`, `clientImage`, `clientNID`, `fkconnectionTypeId`, `clientPassport`, `price`, `address`, `fkpackageId`, `clientSerial`, `cableLength`, `noOfTv`, `conDate`, `clientStatus`, `created_at`) VALUES
(615, 'Mr Julian', 'Julian', NULL, '1913514761', NULL, NULL, NULL, NULL, NULL, '591, 1st Floor', NULL, 'K - 95/95', 0, 0, '2017-12-16', 2, '2019-01-07 08:25:23'),
(616, 'Mr Iqbal ', 'Ahmed', NULL, '1915734796', NULL, NULL, NULL, NULL, NULL, '591, 2nd Floor, Right', NULL, 'K-96/96', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(617, 'Mr Rasel', 'Rasel', NULL, '1670819187', NULL, NULL, NULL, NULL, NULL, '591, 2nd A-3, LF', NULL, 'K - 97/97', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(618, 'Mr Raqibul ', 'Islam', NULL, '1716256641', NULL, NULL, NULL, NULL, NULL, '591, 3rd Floor, RI,B-4', NULL, 'K-98/98', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:23'),
(619, 'Mr Abdul ', 'Mohimen', NULL, '1675907028', NULL, NULL, NULL, NULL, NULL, '591, 3rd Floor, A-4', NULL, 'K-99/99', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(620, 'Mr Moijur ', 'Rahman', NULL, '1971568151', NULL, NULL, NULL, NULL, NULL, '591, 4th, B-5', NULL, 'K - 100/100', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(621, '', '', NULL, '', NULL, NULL, NULL, NULL, NULL, '591, 5th Floor, 5-A', NULL, 'K - 101/101', 0, 0, '2017-11-17', 2, '2019-01-07 08:25:24'),
(622, 'Mr Arfan ', 'Ahamed', NULL, '1822646763', NULL, NULL, NULL, NULL, NULL, '591, 4th Floor, A-5', NULL, 'K-102/102', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(623, 'Dola ', 'Mowsumi', NULL, '1986117885', NULL, NULL, NULL, NULL, NULL, '591/A , (Tin)', NULL, 'K-103/103', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(624, 'Mr Sumon', 'Sumon', NULL, '1948607896', NULL, NULL, NULL, NULL, NULL, '591/2, Tinset', NULL, 'K-104/104', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(625, 'Mr Torikul ', 'Islam', NULL, '1916076587', NULL, NULL, NULL, NULL, NULL, '591/2, G Tinset', NULL, 'K-104A/105', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(626, 'Mr Sumon', 'Sumon', NULL, '1635527304', NULL, NULL, NULL, NULL, NULL, '591/2, G Tinset', NULL, 'K-104B/106', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(627, 'Mr Kamal', 'Kamal', NULL, '1971568151', NULL, NULL, NULL, NULL, NULL, '591/2, GF, Tin', NULL, 'K - 105/107', 0, 0, '0004-08-17', 2, '2019-01-07 08:25:24'),
(628, 'Rumu', 'Rumu', NULL, '1795559868', NULL, NULL, NULL, NULL, NULL, '591/2, GF, ', NULL, 'K - 105A/108', 0, 0, '0004-08-17', 2, '2019-01-07 08:25:24'),
(629, 'Mr Saiful ', 'Islam', NULL, '1781443346', NULL, NULL, NULL, NULL, NULL, '591/3, Tinset', NULL, 'K - 106/109', 0, 0, '0004-08-17', 2, '2019-01-07 08:25:24'),
(630, 'Mr. Milton', 'Milton', NULL, '1922264782', NULL, NULL, NULL, NULL, NULL, '591/3, Tin', NULL, 'K - 107/110', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(631, 'Mr Sujon', 'Sujon', NULL, '1717960989', NULL, NULL, NULL, NULL, NULL, '591/3, Tinset', NULL, 'K - 108/111', 0, 0, '0004-08-17', 2, '2019-01-07 08:25:24'),
(632, 'Mr Rezaul', 'Rezaul', NULL, '1913375228', NULL, NULL, NULL, NULL, NULL, '591/1, G Floor,LF', NULL, 'K-109/112', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(633, 'Mr Mehedi', 'Mehedi', NULL, '', NULL, NULL, NULL, NULL, NULL, 'Tulib Building, 1st F', NULL, 'K-111/113', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(634, 'Mr Shohag ', 'Hossain', NULL, '1712797339', NULL, NULL, NULL, NULL, NULL, 'Tulib Building, 2nd Floor', NULL, 'K-11A/114', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(635, 'Chief ', 'Engineer', NULL, '', NULL, NULL, NULL, NULL, NULL, 'Tulib Building', NULL, 'K-110/115', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(636, 'Mr Zahid ', 'Hossain', NULL, '', NULL, NULL, NULL, NULL, NULL, 'Tulib Building, 6th Floor', NULL, 'K-112/116', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(637, 'Mr', 'Mr', NULL, '', NULL, NULL, NULL, NULL, NULL, 'Tulib Building, 1st Floor', NULL, 'K-117', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(638, 'Mr ', 'Mr ', NULL, '1754565657', NULL, NULL, NULL, NULL, NULL, 'Tulib Building, 5th Floor', NULL, 'K-118', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(639, 'Mr Lutfor ', 'Rahman', NULL, '1714250345', NULL, NULL, NULL, NULL, NULL, 'Tulib Building, 6th Floor,C-7', NULL, 'K-119', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(640, 'Mr Raihan', 'Mr Raihan', NULL, '', NULL, NULL, NULL, NULL, NULL, '589, Tinset', NULL, 'RA- 00/01', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(641, 'Mr Hanif', 'Mr Hanif', NULL, '1930693589', NULL, NULL, NULL, NULL, NULL, '589, Tinset', NULL, 'RA- 00/02', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(642, 'Mr Akkash', 'Mr Akkash', NULL, '172406707', NULL, NULL, NULL, NULL, NULL, '589, Tinset', NULL, 'RA- 03/03', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(643, 'Mr Monir', 'Mr Monir', NULL, '1705305450', NULL, NULL, NULL, NULL, NULL, '589, Tinset', NULL, 'RA- 04/04', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(644, 'Mr Jamal', 'Mr Jamal', NULL, '1900435674', NULL, NULL, NULL, NULL, NULL, '589, Tinset', NULL, 'RA- 05/05', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(645, 'Mrs Tania', 'Mrs Tania', NULL, '', NULL, NULL, NULL, NULL, NULL, '589, Tinset', NULL, 'RA- 07/06', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(646, 'Mr Jahangir', ' Ali', NULL, '1985018019', NULL, NULL, NULL, NULL, NULL, '589,  G Floor Tinset', NULL, 'RA- 07A/07', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(647, 'Mr Emdadul ', 'Mobassir', NULL, '1816335133', NULL, NULL, NULL, NULL, NULL, '588,  G Floor ', NULL, 'RA- 08/08', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(648, 'Mr Farid', ' Uddin', NULL, '', NULL, NULL, NULL, NULL, NULL, '588,  2nd Floor ', NULL, 'RA- 09/09', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(649, 'Mr Rowsonara ', 'Begum', NULL, '1713040370', NULL, NULL, NULL, NULL, NULL, '588, 3rd Floor ', NULL, 'RA-10 /10', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(650, 'Mr Rofiq', 'Mr Rofiq', NULL, '1970648371', NULL, NULL, NULL, NULL, NULL, '588, 4th Floor ', NULL, 'RA-10A /11', 0, 1, '0000-00-00', 2, '2019-01-07 08:25:24'),
(651, 'Mr Zia ', 'Ahammed', NULL, '17172799423', NULL, NULL, NULL, NULL, NULL, '588, 4th Floor ', NULL, 'RA-10B /12', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(652, 'Mr Opu', 'Mr Opu', NULL, '1731864196', NULL, NULL, NULL, NULL, NULL, '587, 1st Floor ', NULL, 'RA-11 /13', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(653, 'Mr Shohidul', ' Islam', NULL, '1826550754', NULL, NULL, NULL, NULL, NULL, '587, 2nd Floor ', NULL, 'RA-12 /14', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(654, 'Mr Rony', 'Mr Rony', NULL, '1612002714', NULL, NULL, NULL, NULL, NULL, '587, 3rd Floor ', NULL, 'RA-13 /15', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(655, 'Mr Hasibur', 'Mr Hasibur', NULL, '1715151192', NULL, NULL, NULL, NULL, NULL, '587, 3rd Floor ', NULL, 'RA-14 /16', 0, 1, '0000-00-00', 2, '2019-01-07 08:25:24'),
(656, 'Mr Kabirul', ' Hasan', NULL, '', NULL, NULL, NULL, NULL, NULL, '587, 4th Floor ', NULL, 'RA-15/17', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(657, 'Smily ', 'Dental', NULL, '1711319824', NULL, NULL, NULL, NULL, NULL, '587, 4th Floor ', NULL, 'RA-16/18', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(658, 'Mr Akib', 'Mr Akib', NULL, '', NULL, NULL, NULL, NULL, NULL, '587, 5th Floor, Right', NULL, 'RA-17/19', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(659, 'Mr Togor', 'Mr Togor', NULL, '1992616740', NULL, NULL, NULL, NULL, NULL, '587, 5th Floor , Left', NULL, 'RA-18/20', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(660, 'Mr Mamum', ' Chowdhury', NULL, '1716924802', NULL, NULL, NULL, NULL, NULL, '586, 1st Floor, F-A ', NULL, 'RA-20/21', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(661, 'Mr Anower', ' Hossain', NULL, '1729090951', NULL, NULL, NULL, NULL, NULL, '586, 3rd Floor', NULL, 'RA-21/22', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(662, 'Mr Borhan ', 'Uddin', NULL, '1720090945', NULL, NULL, NULL, NULL, NULL, '586, 2nd Floor', NULL, 'RA-22/23', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(663, 'Mr Akkasur', ' Rahman', NULL, '199068844', NULL, NULL, NULL, NULL, NULL, '586, 2nd Floor', NULL, 'RA-23/24', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(664, 'Mr Tarikul', ' Islam', NULL, '1715154135', NULL, NULL, NULL, NULL, NULL, '585/A, C-3', NULL, 'RA-24A/25', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(665, 'Mr Rajib ', 'Hossain', NULL, '', NULL, NULL, NULL, NULL, NULL, '586, 2nd Floor, C-3', NULL, 'RA-24A/26', 0, 0, '0006-07-18', 2, '2019-01-07 08:25:24'),
(666, 'Mr Kamruz', 'zaman', NULL, '1726300811', NULL, NULL, NULL, NULL, NULL, '586, 3rd Floor, H', NULL, 'RA-25/27', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(667, 'Mr Shohel ', 'Ahammed', NULL, '1819488318', NULL, NULL, NULL, NULL, NULL, '586, 3rd Floor, F-G', NULL, 'RA-27/28', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(668, 'Mr Redoy', 'Mr Redoy', NULL, '1760240024', NULL, NULL, NULL, NULL, NULL, '586, 4th Floor, J-5', NULL, 'RA-28/29', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(669, 'Mr Jamil', 'Mr Jamil', NULL, '1711329832', NULL, NULL, NULL, NULL, NULL, '586, 4th Floor', NULL, 'RA-29/30', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(670, 'Mr Monir ', 'Majumder', NULL, '1819434623', NULL, NULL, NULL, NULL, NULL, '586, 5th Floor, F-M', NULL, 'RA-31/31', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(671, 'Mr Sumon ', '(Deed Writer)', NULL, '168629297', NULL, NULL, NULL, NULL, NULL, '586/2, 1st Floor', NULL, 'RA-31C/32', 0, 0, '0005-06-18', 2, '2019-01-07 08:25:24'),
(672, 'Mr Monir', 'Mr Monir', NULL, '', NULL, NULL, NULL, NULL, NULL, '586/2,Baban two, 4th', NULL, 'RA-31B/33', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(673, 'Mr Advocate ', 'Mojibor', NULL, '', NULL, NULL, NULL, NULL, NULL, '586/2,Baban two, 2nd', NULL, 'RA-31A/34', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(674, 'Mr Alomgir', 'Mr Alomgir', NULL, '1812958417', NULL, NULL, NULL, NULL, NULL, '586/2,1st Floor', NULL, 'RA-26/35', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(675, 'Mr Torikul ', 'Mr Torikul ', NULL, '198040966', NULL, NULL, NULL, NULL, NULL, '586/2, 5th Floor', NULL, 'RA-19/36', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(676, 'Mrs Rasna', 'Mrs Rasna', NULL, '', NULL, NULL, NULL, NULL, NULL, '586/2, 3rd Floor', NULL, 'RA-31C/37', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(677, 'Mr Faruk ', 'Hossain', NULL, '1717322813', NULL, NULL, NULL, NULL, NULL, '586/2/2, 4th Floor', NULL, 'RA-31D/38', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(678, 'Mr Mehedi ', 'Hasan', NULL, '', NULL, NULL, NULL, NULL, NULL, '', NULL, 'RA-31E/39', 0, 0, '2023-06-18', 2, '2019-01-07 08:25:24'),
(679, 'Mr Tarun', 'Mr Tarun', NULL, '1716503561', NULL, NULL, NULL, NULL, NULL, '586/1, G F', NULL, 'RA-32/40', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(680, 'Mr Ekramullah ', 'Chowdhury', NULL, '1716907961', NULL, NULL, NULL, NULL, NULL, '586/1, 2nd Floor', NULL, 'RA-34/41', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(681, 'Mr Fahmi', 'Mr Fahmi', NULL, '1719670063', NULL, NULL, NULL, NULL, NULL, '585/A, 1st Floor', NULL, 'RA-35/42', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(682, 'Mr Harun', 'Mr Harun', NULL, '1846220754', NULL, NULL, NULL, NULL, NULL, '585/A, 2/B ', NULL, 'RA-36/43', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(683, 'Mr Jobayer', ' Hossain', NULL, '1552202898', NULL, NULL, NULL, NULL, NULL, '585/A, 3/A', NULL, 'RA-37/44', 0, 1, '0000-00-00', 2, '2019-01-07 08:25:24'),
(684, 'Mr Jahirul ', 'Islam', NULL, '1712078887', NULL, NULL, NULL, NULL, NULL, '585/A, 1st Floor', NULL, 'RA-38/45', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(685, 'Mr Tarikul ', 'Islam', NULL, '1717185936', NULL, NULL, NULL, NULL, NULL, '585/A, 2nd Floor', NULL, 'RA-39/46', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(686, 'Mr Anirvan ', 'Sorker', NULL, '1710857972', NULL, NULL, NULL, NULL, NULL, '585/A, ', NULL, 'RA-40/47', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(687, 'Mr Jasim ', 'Uddin', NULL, '1711626422', NULL, NULL, NULL, NULL, NULL, '585/A, ', NULL, 'RA-41/48', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(688, 'Mr Akash', 'Mr Akash', NULL, '1726744074', NULL, NULL, NULL, NULL, NULL, '585/A, 3rd Floor', NULL, 'RA-43/49', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(689, 'Mr Delower Jahan ', 'Hasme', NULL, '1631475573', NULL, NULL, NULL, NULL, NULL, '585/A, ', NULL, 'RA-44/50', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(690, 'Mr Giyash', ' Uddin', NULL, '1615540520', NULL, NULL, NULL, NULL, NULL, '585/A, ', NULL, 'RA-45/51', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(691, 'Mr Emran', 'Mr Emran', NULL, '172707367', NULL, NULL, NULL, NULL, NULL, '585/A, ', NULL, 'RA-46/52', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(692, 'Mr Alomgir', '', NULL, '1711117042', NULL, NULL, NULL, NULL, NULL, '585/A, 4th Floor', NULL, 'RA-47/53', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(693, 'Mr Atiqur', ' Rahman', NULL, '1711074899', NULL, NULL, NULL, NULL, NULL, '585/A, 5th Floor', NULL, 'RA-48/54', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(694, 'Mr Anjamul ', 'Haque', NULL, '', NULL, NULL, NULL, NULL, NULL, '585/A, ', NULL, 'RA-49/55', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(695, 'Mr Kamal', ' Hossain', NULL, '1912917996', NULL, NULL, NULL, NULL, NULL, '585/A, ', NULL, 'RA-50/56', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(696, 'Mr Rahid', '', NULL, '1917037772', NULL, NULL, NULL, NULL, NULL, '585/A, 5th Floor', NULL, 'RA-51/57', 0, 2, '0000-00-00', 2, '2019-01-07 08:25:24'),
(697, 'Mr Izajul ', 'Hasan', NULL, '', NULL, NULL, NULL, NULL, NULL, '585/A, 6th Floor', NULL, 'RA-52/58', 0, 1, '0000-00-00', 2, '2019-01-07 08:25:24'),
(698, 'Mrs Labony ', 'Akter', NULL, '', NULL, NULL, NULL, NULL, NULL, '585/A, 6th Floor', NULL, 'RA-53/59', 0, 1, '0000-00-00', 2, '2019-01-07 08:25:24'),
(699, 'Mr Siraj ', 'Security', NULL, '', NULL, NULL, NULL, NULL, NULL, '575/3, 2nd Floor', NULL, 'RA-56/60', 0, 0, '2020-08-17', 2, '2019-01-07 08:25:24'),
(700, 'Mr Sajid', '', NULL, '', NULL, NULL, NULL, NULL, NULL, '575/3, 2nd Floor', NULL, 'RA-54/61', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(701, 'Mr Tariqul ', 'Islam', NULL, '1715151874', NULL, NULL, NULL, NULL, NULL, '575/2/A, 1st Floor', NULL, 'RA-57/62', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(702, 'Mr Jahangir', '', NULL, '', NULL, NULL, NULL, NULL, NULL, '575/2/A, 1st Floor', NULL, 'RA-58/63', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(703, 'Mrs Shheran', '', NULL, '1755998358', NULL, NULL, NULL, NULL, NULL, '575/2/B, 1st Floor', NULL, 'RA-60/64', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(704, 'Mr Shafiq', '', NULL, '1718551872', NULL, NULL, NULL, NULL, NULL, '575/2/B, 1st Floor', NULL, 'RA-61/65', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(705, 'Mr Sakil ', 'Ahamed', NULL, '1711221753', NULL, NULL, NULL, NULL, NULL, '575/2/B, 2nd Floor', NULL, 'RA-62/66', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(706, 'Mr Atik', '', NULL, '1786222466', NULL, NULL, NULL, NULL, NULL, '575/2/B, 2nd Floor', NULL, 'RA-63/67', 0, 1, '0000-00-00', 2, '2019-01-07 08:25:24'),
(707, 'Mr Kazi ', 'Farid', NULL, '1711668548', NULL, NULL, NULL, NULL, NULL, '585/A, D-4', NULL, 'RA-42/', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(708, 'Mr Musha', '', NULL, '02-58313860', NULL, NULL, NULL, NULL, NULL, '575/2/B, 3rd Floor', NULL, 'RA-64/68', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(709, 'Mr Saikot ', 'Khan', NULL, '1924574330', NULL, NULL, NULL, NULL, NULL, '575/2/B, 4th Floor', NULL, 'RA-65/69', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(710, 'Mrs Parvin ', 'Akter', NULL, '1679422688', NULL, NULL, NULL, NULL, NULL, '575/2/B, 4th Floor', NULL, 'RA-66/70', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(711, 'Mr Shohel', ' Rana', NULL, '1818191514', NULL, NULL, NULL, NULL, NULL, '579/B, G Floor', NULL, 'RA-67/71', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(712, 'Mr Shajahan', '', NULL, '1755527636', NULL, NULL, NULL, NULL, NULL, '575/1, ', NULL, 'RA-68A/72', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(713, 'Mrs Jakia ', 'Khatun', NULL, '1710857972', NULL, NULL, NULL, NULL, NULL, '575/1/Ka, G Floor', NULL, 'RA-69/73', 0, 3, '0000-00-00', 2, '2019-01-07 08:25:24'),
(714, 'Mr Mojibul ', 'Haque', NULL, '1911591700', NULL, NULL, NULL, NULL, NULL, '575/2, G Floor', NULL, 'RA-70/74', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(715, 'Mr Mahabub ', 'Alom', NULL, '1552452136', NULL, NULL, NULL, NULL, NULL, '575/2, 1st Floor', NULL, 'RA-71/75', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(716, 'Mr Siddiqur ', 'Rahman', NULL, '', NULL, NULL, NULL, NULL, NULL, '575/2, 1st Floor', NULL, 'RA-72/76', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(717, 'Mr Ziaul ', 'Ahamed', NULL, '', NULL, NULL, NULL, NULL, NULL, '575/2, 2nd Floor, top', NULL, 'RA-73/77', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(718, 'Mr Rana', '', NULL, '', NULL, NULL, NULL, NULL, NULL, '575/2, 2nd Floor', NULL, 'RA-74/78', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(719, 'Mr Sowrob', '', NULL, '159980442', NULL, NULL, NULL, NULL, NULL, '585, Tinset', NULL, 'RA-75/79', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(720, 'Mr Nazrul', '', NULL, '1712971276', NULL, NULL, NULL, NULL, NULL, '585, Tinset', NULL, 'RA-76/80', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(721, 'Mr Jamil ', 'Hossain', NULL, '1711058170', NULL, NULL, NULL, NULL, NULL, '585/1, G Floor', NULL, 'RA-77/81', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(722, 'Mr Arif', '', NULL, '17116829967', NULL, NULL, NULL, NULL, NULL, '585/1, 1st Floor', NULL, 'RA-78/82', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(723, 'Mr Fowad', '', NULL, '', NULL, NULL, NULL, NULL, NULL, '585/1, 3rd Floor', NULL, 'RA-79/83', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(724, 'Mr Abdul ', 'Hai', NULL, '1914242063', NULL, NULL, NULL, NULL, NULL, '585/1, 4th Floor', NULL, 'RA-80/84', 0, 1, '0000-00-00', 2, '2019-01-07 08:25:24'),
(725, 'Mr Abdul Rob ', 'Khan', NULL, '', NULL, NULL, NULL, NULL, NULL, '585/1, 5th Floor', NULL, 'RA-81/85', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(726, 'Mr Mosharof ', 'Hossain', NULL, '1921111197', NULL, NULL, NULL, NULL, NULL, '585/1, 5th Floor', NULL, 'RA-82/86', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(727, 'Mr Masud', '', NULL, '1711972553', NULL, NULL, NULL, NULL, NULL, '585/2, G Floor', NULL, 'RA-83/87', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(728, 'Mr Abdur ', 'Razzak', NULL, '1922332669', NULL, NULL, NULL, NULL, NULL, '585/2, 1st Floor', NULL, 'RA-84/88', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(729, 'Mr Pallab', '', NULL, '1833329659', NULL, NULL, NULL, NULL, NULL, '585/2, 1st Floor', NULL, 'RA-84A/89', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(730, 'Mr Saidul', ' Islam', NULL, '1719452701', NULL, NULL, NULL, NULL, NULL, '585/2, 2nd Floor', NULL, 'RA-85/90', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(731, 'Mr Rezaul', '', NULL, '1716522093', NULL, NULL, NULL, NULL, NULL, '585/2, 3rd Floor', NULL, 'RA-86/91', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(732, 'Mr Shohag ', 'Gazi', NULL, '1916110505', NULL, NULL, NULL, NULL, NULL, '585/2, 3rd Floor St', NULL, 'RA-87/92', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(733, 'Mr Alin Noor', '', NULL, '1819142689', NULL, NULL, NULL, NULL, NULL, '585/2, 4th Floor ', NULL, 'RA-88/93', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(734, 'Mr Fahim', '', NULL, '1709652401', NULL, NULL, NULL, NULL, NULL, '585/2, 4th Floor ', NULL, 'RA-89/94', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(735, 'Mr Sonjoy ', 'Benarji', NULL, '', NULL, NULL, NULL, NULL, NULL, '585/2, 4th Floor ', NULL, 'RA-90/95', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(736, 'Mrs Rahima', '', NULL, '1632124532', NULL, NULL, NULL, NULL, NULL, '585/3, G Floor ', NULL, 'RA-91/96', 0, 0, '2020-07-17', 2, '2019-01-07 08:25:24'),
(737, 'Mr Jony', '', NULL, '', NULL, NULL, NULL, NULL, NULL, '585/3, G Floor ', NULL, 'RA-92/97', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(738, 'Mr Liton', '', NULL, '1552481004', NULL, NULL, NULL, NULL, NULL, '585/3, 2nd Floor ', NULL, 'RA-93/98', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(739, 'Mr Shomsher ', 'Ali', NULL, '1711063398', NULL, NULL, NULL, NULL, NULL, '585/3, 2nd Floor ', NULL, 'RA-93A/99', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(740, 'Mr Abdul ', 'Alim', NULL, '1919194376', NULL, NULL, NULL, NULL, NULL, '585/3, 2nd Floor ', NULL, 'RA-94/100', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(741, 'Mr Masudur ', 'Rahman', NULL, '1719429865', NULL, NULL, NULL, NULL, NULL, '585/3, 3rd Floor ', NULL, 'RA-95/101', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(742, 'Mr Mamunur ', 'Rashid', NULL, '1711473924', NULL, NULL, NULL, NULL, NULL, '585/3, 4th Floor ', NULL, 'RA-96/102', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(743, 'Mr Bimol ', 'Biswas', NULL, '174217737', NULL, NULL, NULL, NULL, NULL, '585/3, 4th Floor ', NULL, 'RA-96A/103', 0, 1, '0000-00-00', 2, '2019-01-07 08:25:24'),
(744, 'Mr Nazmul', '', NULL, '', NULL, NULL, NULL, NULL, NULL, '585/3, 5th Floor ', NULL, 'RA-97/104', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(745, 'Mr Siam', '', NULL, '171330004', NULL, NULL, NULL, NULL, NULL, '585/3, 1st Floor ', NULL, 'RA-98/105', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(746, 'Mr Zahangir', '', NULL, '1625003272', NULL, NULL, NULL, NULL, NULL, '579/B, G Floor ', NULL, 'RA-99/106', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(747, 'Mr Nazrul', '', NULL, '1923804171', NULL, NULL, NULL, NULL, NULL, '579/B, 1st Floor ', NULL, 'RA-100/107', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(748, 'Mr Rashed ', 'Khan', NULL, '', NULL, NULL, NULL, NULL, NULL, '579/B, ', NULL, 'RA-101/108', 0, 2, '0000-00-00', 2, '2019-01-07 08:25:24'),
(749, 'Mrs Gulshan Ara ', 'Begum', NULL, '', NULL, NULL, NULL, NULL, NULL, '579/C, G Floor', NULL, 'RA-102/109', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(750, 'Sowktara', '', NULL, '1915839590', NULL, NULL, NULL, NULL, NULL, '579/C, 1st Floor', NULL, 'RA-103/110', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(751, 'Mrs Sultana ', 'Akter', NULL, '1920702434', NULL, NULL, NULL, NULL, NULL, '579/C, 2nd Floor', NULL, 'RA-104/111', 0, 0, '0002-11-17', 2, '2019-01-07 08:25:24'),
(752, 'Mr Polash', '', NULL, '', NULL, NULL, NULL, NULL, NULL, '579, G Floor', NULL, 'RA-105/112', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(753, 'Mrs Lipi', '', NULL, '1779593148', NULL, NULL, NULL, NULL, NULL, '579, G Floor, Back Side', NULL, 'RA-106/113', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(754, 'Mr Afsar ', 'Hossain', NULL, '1819112238', NULL, NULL, NULL, NULL, NULL, '579, 1st Floor', NULL, 'RA-107/114', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(755, 'Mr Liton ', 'Ahammed', NULL, '', NULL, NULL, NULL, NULL, NULL, '579, 1st Floor', NULL, 'RA-108/115', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(756, 'Mr Ruma', '', NULL, '', NULL, NULL, NULL, NULL, NULL, '579, 2nd Floor', NULL, 'RA-109/116', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(757, 'Mr Habib', '', NULL, '', NULL, NULL, NULL, NULL, NULL, '579, 2nd Floor', NULL, 'RA-110/117', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(758, 'Mr Nadim', '', NULL, '1791652183', NULL, NULL, NULL, NULL, NULL, '579/A, G Floor', NULL, 'RA-111/118', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(759, 'Mr Hasibur', '', NULL, '', NULL, NULL, NULL, NULL, NULL, '579/A, G Floor', NULL, 'RA-112/119', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(760, 'Mr Rony', '', NULL, '1911213002', NULL, NULL, NULL, NULL, NULL, '579/A, G Floor', NULL, 'RA-113A/120', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(761, 'Mr Tareq ', 'Salman', NULL, '1756335549', NULL, NULL, NULL, NULL, NULL, '579/1, G Floor', NULL, 'RA-114/121', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(762, 'Mr Shahadat', '', NULL, '', NULL, NULL, NULL, NULL, NULL, '589/1, G Floor', NULL, 'RA-114A/122', 0, 0, '2023-05-18', 2, '2019-01-07 08:25:24'),
(763, 'Mr Rana ', 'Barua', NULL, '1716606925', NULL, NULL, NULL, NULL, NULL, '579/1, 1st Floor', NULL, 'RA-115/123', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(764, 'Mrs Suraiya', '', NULL, '1713488939', NULL, NULL, NULL, NULL, NULL, '579/1, 2nd Floor', NULL, 'RA-116/124', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(765, 'Mr Rajib', '', NULL, '1711282029', NULL, NULL, NULL, NULL, NULL, '579, 3rd Floor', NULL, 'RA-117/125', 0, 2, '0000-00-00', 2, '2019-01-07 08:25:24'),
(766, 'Mr Asraf', '', NULL, '1817536831', NULL, NULL, NULL, NULL, NULL, '580, GF Left', NULL, 'RA-118/126', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(767, 'Mr Mizanur ', 'Rahman', NULL, '1961321718', NULL, NULL, NULL, NULL, NULL, '580, 1st Floor', NULL, 'RA-119/127', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(768, 'Mr Alomgir', '', NULL, '1730921544', NULL, NULL, NULL, NULL, NULL, '580, 3rd Floor', NULL, 'RA-120/128', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(769, 'Mr Jisun', '', NULL, '1626343462', NULL, NULL, NULL, NULL, NULL, '580, 4th Floor', NULL, 'RA-121/129', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(770, 'Mr Ruhul ', 'Amin', NULL, '', NULL, NULL, NULL, NULL, NULL, '581,G Floor', NULL, 'RA-122/130', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(771, 'Mr Siraj ', 'Uddin', NULL, '1916668839', NULL, NULL, NULL, NULL, NULL, '581, 1st Floor', NULL, 'RA-123/131', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(772, 'Mrs Sahanaj', '', NULL, '1936553936', NULL, NULL, NULL, NULL, NULL, '581, Tinset', NULL, 'RA-124/132', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(773, 'Mr Faruk', '', NULL, '1822663311', NULL, NULL, NULL, NULL, NULL, '578/2, Tinset', NULL, 'RA-126/133', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(774, 'Mr Monir ', 'Uddin', NULL, '1711441447', NULL, NULL, NULL, NULL, NULL, '576, G Floor', NULL, 'RA-127/134', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(775, 'Mr Babu', '', NULL, '1715723756', NULL, NULL, NULL, NULL, NULL, '576, 1st Floor', NULL, 'RA-128/135', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(776, 'Mr Sowrob', '', NULL, '1683395140', NULL, NULL, NULL, NULL, NULL, '576, 1st Floor', NULL, 'RA-129/136', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(777, 'Mr Mehedi', '', NULL, '1611433853', NULL, NULL, NULL, NULL, NULL, '576, 2nd Floor', NULL, 'RA-130/137', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(778, 'Mrs Mahmuda', '', NULL, '1552386289', NULL, NULL, NULL, NULL, NULL, '576, 3rd Floor', NULL, 'RA-131/138', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(779, 'Mr Sarif', '', NULL, '1723710819', NULL, NULL, NULL, NULL, NULL, '576, 4th Floor', NULL, 'RA-132/139', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(780, 'Mr Tonmoy ', 'Hassan', NULL, '1715111031', NULL, NULL, NULL, NULL, NULL, '576, 4th Floor', NULL, 'RA-133/140', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(781, 'Mr Afser', '', NULL, '1724957004', NULL, NULL, NULL, NULL, NULL, '576, Tinset', NULL, 'RA-134/141', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(782, 'Mr Rajib', '', NULL, '', NULL, NULL, NULL, NULL, NULL, '576, Tinset', NULL, 'RA-135/142', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(783, 'Mr Nobin', '', NULL, '', NULL, NULL, NULL, NULL, NULL, '576, Tinset', NULL, 'RA-136/143', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(784, 'Mr Alif', '', NULL, '', NULL, NULL, NULL, NULL, NULL, '577, Tinset', NULL, 'RA-137/144', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(785, 'Mr Lovely', '', NULL, '', NULL, NULL, NULL, NULL, NULL, '577, Tinset', NULL, 'RA-138/145', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(786, 'Mr Kajol', '', NULL, '', NULL, NULL, NULL, NULL, NULL, '577, Tinset', NULL, 'RA-139/146', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(787, 'Mr Khairon', '', NULL, '', NULL, NULL, NULL, NULL, NULL, '577, Tinset', NULL, 'RA-140/147', 0, 0, '2012-02-18', 2, '2019-01-07 08:25:24'),
(788, 'Mr Mobarok ', 'Hossain', NULL, '1734022667', NULL, NULL, NULL, NULL, NULL, '578, 1st Floor D-2', NULL, 'RA-141/148', 0, 0, '0001-11-17', 2, '2019-01-07 08:25:24'),
(789, 'Mr Firoj', '', NULL, '1734022667', NULL, NULL, NULL, NULL, NULL, '578, 2nd Floor D-3', NULL, 'RA-142/149', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(790, 'Mr Jahangir ', 'Alom', NULL, '', NULL, NULL, NULL, NULL, NULL, '578, 3rd Floor C-4', NULL, 'RA-143/151', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(791, 'Mr Hasan', '', NULL, '1711520023', NULL, NULL, NULL, NULL, NULL, '578,  D-3', NULL, 'RA-144/152', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(792, 'Mr Shafiqul ', 'Islam', NULL, '1940511461', NULL, NULL, NULL, NULL, NULL, '578,  A-5', NULL, 'RA-145/153', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(793, 'Mrs Shahida', '', NULL, '1920492782', NULL, NULL, NULL, NULL, NULL, '578, 4th Floor B-5', NULL, 'RA-147/154', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(794, 'Mr Nazma', '', NULL, '1731864196', NULL, NULL, NULL, NULL, NULL, '578, D-5', NULL, 'RA-148/155', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(795, 'Eng. Shohidol', '', NULL, '1717138784', NULL, NULL, NULL, NULL, NULL, '578, A-6', NULL, 'RA-149B/156', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(796, 'Mr Somamto', '', NULL, '1716754525', NULL, NULL, NULL, NULL, NULL, '578, B-6', NULL, 'RA-149/157', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(797, 'Mr Abdul ', 'Hakim', NULL, '1751714829', NULL, NULL, NULL, NULL, NULL, '578, C-6', NULL, 'RA-150/158', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(798, 'Mr Sajjad ', 'Hossain', NULL, '1913513942', NULL, NULL, NULL, NULL, NULL, '578, D-6', NULL, 'RA-151/159', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(799, 'Mr Sharmin', '', NULL, '1671497035', NULL, NULL, NULL, NULL, NULL, '578/1, G Floor', NULL, 'RA-152/160', 0, 0, '0001-09-17', 2, '2019-01-07 08:25:24'),
(800, 'Mr Mithu', '', NULL, '1716235424', NULL, NULL, NULL, NULL, NULL, '578/1, G Floor, ST', NULL, 'RA-153/161', 0, 0, '2013-09-17', 2, '2019-01-07 08:25:24'),
(801, 'Mr Tanim', '', NULL, '1811381838', NULL, NULL, NULL, NULL, NULL, '578/1, 1st Floor East', NULL, 'RA-154/162', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(802, 'Mr Shahab', 'uddin', NULL, '', NULL, NULL, NULL, NULL, NULL, '578/1, 1st Floor ', NULL, 'RA-155/163', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(803, 'Mr Rahim', '', NULL, '', NULL, NULL, NULL, NULL, NULL, '578/1, 2nd Floor ', NULL, 'RA-156/164', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(804, 'Mr Golam ', 'Mostofa', NULL, '1712475493', NULL, NULL, NULL, NULL, NULL, '578/1, 3rd Floor ', NULL, 'RA-157/165', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(805, 'Mrs Lovely ', 'Akter', NULL, '', NULL, NULL, NULL, NULL, NULL, '578, 2nd Floor, B-3 ', NULL, 'RA-158/150', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(806, 'Mr Badol', ' Mia', NULL, '', NULL, NULL, NULL, NULL, NULL, '578/1, 3rd Floor ', NULL, 'RA-158/166', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(807, 'Mr Shohad', '', NULL, '', NULL, NULL, NULL, NULL, NULL, '578/1, 4th Floor ', NULL, 'RA-159/167', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(808, 'Mr Tajul', ' Islam', NULL, '1718472345', NULL, NULL, NULL, NULL, NULL, '578/2, G Floor ', NULL, 'RA-161/168', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(809, 'Mr Mithu', '', NULL, '', NULL, NULL, NULL, NULL, NULL, '587/2, G Floor ', NULL, 'RA-161A/169', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(810, 'Mr Nazmul ', 'Islam', NULL, '1718205099', NULL, NULL, NULL, NULL, NULL, '587/2, 3rd Floor ', NULL, 'RA-163/170', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(811, 'Mr Faruk', '', NULL, '', NULL, NULL, NULL, NULL, NULL, '587/2, 3rd Floor ', NULL, 'RA-164/171', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(812, 'Mr Shafiqul ', 'Islam', NULL, '1735548011', NULL, NULL, NULL, NULL, NULL, '578/3, 1st Floor ', NULL, 'RA-165/172', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(813, 'Mr Motin', '', NULL, '', NULL, NULL, NULL, NULL, NULL, '578/3, 3rd Floor ', NULL, 'RA-166/173', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(814, 'Mr Sajib', '', NULL, '1716038805', NULL, NULL, NULL, NULL, NULL, '578/3, 2nd Floor ', NULL, 'RA-167/174', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(815, 'Rupali ', 'Bank', NULL, '', NULL, NULL, NULL, NULL, NULL, '394/1', NULL, 'RH-01/01', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(816, 'Rafiq ', 'Uddin', NULL, '', NULL, NULL, NULL, NULL, NULL, '394/3, 1st Floor', NULL, 'RH-00/02', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(817, 'Mr Emran', '', NULL, '', NULL, NULL, NULL, NULL, NULL, '394/3, C-1', NULL, 'RH-04/03', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(818, 'Mr Shahidul', ' Islam', NULL, '', NULL, NULL, NULL, NULL, NULL, '394/3, 1st Floor,', NULL, 'RH-45/04', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(819, 'Mr Ziad', '', NULL, '1851376714', NULL, NULL, NULL, NULL, NULL, '394/3, 2nd Floor', NULL, 'RH-05/05', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(820, 'Mr Linkon', '', NULL, '1680877951', NULL, NULL, NULL, NULL, NULL, '394/3, C-2', NULL, 'RH- 06/06', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(821, '', '', NULL, '', NULL, NULL, NULL, NULL, NULL, '394/3, 2nd , F-2', NULL, 'RH-07/07', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(822, 'Mr Shajahan', '', NULL, '1929299120', NULL, NULL, NULL, NULL, NULL, '394/3, A/3', NULL, 'RH- 08/08', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(823, 'Mr Morizul ', 'Islam', NULL, '1552371823', NULL, NULL, NULL, NULL, NULL, '394/3, 3rd Floor', NULL, 'RH-09/09', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(824, 'Ontor ', '', NULL, '1840651468', NULL, NULL, NULL, NULL, NULL, '394/3, E-3', NULL, 'RH- 10/10', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(825, 'Mr Saiful', '', NULL, '1814859856', NULL, NULL, NULL, NULL, NULL, '394/3, F-3', NULL, 'RH- 11/11', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(826, 'Mr Jakir', '', NULL, '', NULL, NULL, NULL, NULL, NULL, '394/3, F-3', NULL, 'RH- 11A/12', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(827, 'Mr Habibur ', 'Rahman', NULL, '1714278727', NULL, NULL, NULL, NULL, NULL, '394/3, A-4', NULL, 'RH- 12/13', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(828, 'Mr Nijam ', 'Uddin', NULL, '1971985676', NULL, NULL, NULL, NULL, NULL, '394/3, 3rd Floor', NULL, 'RH-13/14', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(829, 'Asade', '', NULL, '17300134195', NULL, NULL, NULL, NULL, NULL, '394/3, D-4', NULL, 'RH-14/15', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(830, 'Mr Masud ', 'Alom', NULL, '', NULL, NULL, NULL, NULL, NULL, ' 394/3, E-4', NULL, 'RH-15/16', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(831, 'Mr Onik', '', NULL, '1715808224', NULL, NULL, NULL, NULL, NULL, '394/3, 5th Floor', NULL, 'RH-16/17', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(832, 'Mr Abdul ', 'Khalek', NULL, '1552433835', NULL, NULL, NULL, NULL, NULL, '394/3, B-5', NULL, 'RH-17/18', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(833, 'Mr Piyal', '', NULL, '127138209', NULL, NULL, NULL, NULL, NULL, '394/3, 5th Floor', NULL, 'RH-18/19', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(834, ' Mr Mahabub ', 'Alom', NULL, '1694679774', NULL, NULL, NULL, NULL, NULL, ' 394/2,1st Floor', NULL, 'RH-19/20', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(835, ' Mr Jony', '', NULL, '1920081622', NULL, NULL, NULL, NULL, NULL, ' 594/2, 3rd Floor', NULL, 'RH-20/21', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(836, 'Mrs Mimi', '', NULL, '1911420257', NULL, NULL, NULL, NULL, NULL, ' 594/2, 3rd Floor', NULL, 'RH-21/22', 0, 2, '0000-00-00', 2, '2019-01-07 08:25:24'),
(837, 'Mr Karim', '', NULL, '1688504011', NULL, NULL, NULL, NULL, NULL, '390/F, 2nd Floor', NULL, 'RH-23/23', 0, 2, '0000-00-00', 2, '2019-01-07 08:25:24'),
(838, 'Mr Shekh ', 'Mohammad', NULL, '1947381671', NULL, NULL, NULL, NULL, NULL, '390/F, 1st Floor', NULL, 'RH-24/24', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(839, 'Mr Anower', '', NULL, '1719460590', NULL, NULL, NULL, NULL, NULL, '390/F, 2nd Floor ', NULL, 'RH-25/25', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(840, 'Mr Milon', '', NULL, '1717374533', NULL, NULL, NULL, NULL, NULL, '390/F, 3rd Floor', NULL, 'RH-26/26', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(841, 'Mr Juel', '', NULL, '163876676', NULL, NULL, NULL, NULL, NULL, '390/F, 3rd Floor', NULL, 'RH-26A/27', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(842, 'Mr Arif', '', NULL, '1939821572', NULL, NULL, NULL, NULL, NULL, '390/F, 4h Floor', NULL, 'RH-28/28', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(843, 'Mr Sabrina', '', NULL, '1917901807', NULL, NULL, NULL, NULL, NULL, '390/G, G Floor', NULL, 'RH-28/29', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(844, 'A S M Nuruzzaman ', 'Shelly', NULL, '1711866997', NULL, NULL, NULL, NULL, NULL, '390/G, 1st Floor', NULL, 'RH-29/30', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(845, 'Mr Firoj ', 'Ahamed', NULL, '17183876447', NULL, NULL, NULL, NULL, NULL, '390/G, 3rd Floor', NULL, 'RH-31/31', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(846, 'Mr Foysal', '', NULL, '1682074263', NULL, NULL, NULL, NULL, NULL, '390/G, 3rd Floor', NULL, 'RH-32/32', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(847, 'Mrs Shamsun', 'nahar ', NULL, '9358070', NULL, NULL, NULL, NULL, NULL, '390/H, 2nd Floor', NULL, 'RH-34/34', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(848, 'Mr Shopon', '', NULL, '', NULL, NULL, NULL, NULL, NULL, '390/H, 2nd Floor', NULL, 'RH-35/35', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(849, 'Mr Imran', '', NULL, '1713367558', NULL, NULL, NULL, NULL, NULL, '390/H, 3rd Floor', NULL, 'RH-36/36', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(850, '', '', NULL, 'No Line', NULL, NULL, NULL, NULL, NULL, '390/H, 3rd Floor', NULL, 'RH-37/37', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(851, 'Mrs Ambika', '', NULL, '166663390', NULL, NULL, NULL, NULL, NULL, '390/H, 4th Floor', NULL, 'RH-38/38', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(852, 'Mr Odora', '', NULL, '', NULL, NULL, NULL, NULL, NULL, '390/H, 4th Floor', NULL, 'RH-39/39', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(853, 'Mr Rashed ', 'Kamal', NULL, '', NULL, NULL, NULL, NULL, NULL, '390/i, G Floor', NULL, 'RH-40/40', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(854, 'Mr Raju ', 'Ahamed', NULL, '', NULL, NULL, NULL, NULL, NULL, '390/i, 1st Floor', NULL, 'RH-41/41', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(855, 'Mr Partho', '', NULL, '1911420257', NULL, NULL, NULL, NULL, NULL, '390/K, G F ', NULL, 'RH-42/42', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(856, 'Mrs Sopna', '', NULL, '', NULL, NULL, NULL, NULL, NULL, '390/K, G F ', NULL, 'RH-42A/43', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(857, 'Mr Shahed Ali ', 'Khan', NULL, '', NULL, NULL, NULL, NULL, NULL, '390/K, G F ', NULL, 'RH-44/44', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(858, 'Mr Mahabob', '', NULL, '1914975047', NULL, NULL, NULL, NULL, NULL, '390/K, 1st Floor', NULL, 'RH-43/45', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(859, 'Mr Monir', '', NULL, '1711562210', NULL, NULL, NULL, NULL, NULL, '390/K, 1st Floor', NULL, 'RH-44/46', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(860, 'Mr Shafiqul', ' Islam', NULL, '', NULL, NULL, NULL, NULL, NULL, '390/K, 2nd Floor', NULL, 'RH-46/47', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(861, 'Mr Abul ', 'Kalam', NULL, '1727209416', NULL, NULL, NULL, NULL, NULL, '390/K, 2nd Floor', NULL, 'RH-46/48', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(862, 'Mrs Laboni', '', NULL, '1964427350', NULL, NULL, NULL, NULL, NULL, '390/K, 3rd Floor', NULL, 'RH-47/49', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(863, 'Mr Rabbi', '', NULL, '19189912344', NULL, NULL, NULL, NULL, NULL, '390/K, 4th Floor', NULL, 'RH-48/50', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(864, 'Mr Omit ', 'Hasan', NULL, '', NULL, NULL, NULL, NULL, NULL, '390/K, 4th Floor', NULL, 'RH-50A/51', 0, 0, '2012-07-18', 2, '2019-01-07 08:25:24'),
(865, 'Mr Kamal ', '', NULL, '', NULL, NULL, NULL, NULL, NULL, '390/K, 4th Floor', NULL, 'RH-49/52', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(866, 'Mr Abdus ', 'Sattar', NULL, '1718720572', NULL, NULL, NULL, NULL, NULL, '390/K, 4th Floor', NULL, 'RH-50/53', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(867, 'Mr Ruhul ', 'Amin', NULL, '1711568236', NULL, NULL, NULL, NULL, NULL, '390/J, 1st Floor', NULL, 'RH-50/54', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(868, 'Mr S K ', 'Hasan', NULL, '1929567600', NULL, NULL, NULL, NULL, NULL, '390/J, 2nd Floor', NULL, 'RH-52/55', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(869, 'Mr Zia-', 'ul', NULL, '1712128638', NULL, NULL, NULL, NULL, NULL, '390/J, 2nd Floor', NULL, 'RH-53/56', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(870, 'Mrs Rupa', '', NULL, '', NULL, NULL, NULL, NULL, NULL, '390/J, 4th Floor', NULL, 'RH-55/57', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(871, 'Mr Sadek', '', NULL, '1876903787', NULL, NULL, NULL, NULL, NULL, '390/J, 4th Floor', NULL, 'RH-56/58', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(872, 'Kazi ', 'Shahabuddin', NULL, '1552366528', NULL, NULL, NULL, NULL, NULL, '17/E, 2nd Floor', NULL, 'R-02/01', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(873, 'Mr Zahid', 'Zahid', NULL, '1674905531', NULL, NULL, NULL, NULL, NULL, '17/E, 2nd Floor ,ST', NULL, 'R-03/02', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(874, 'Mr Nowab', 'Nowab', NULL, '1912014566', NULL, NULL, NULL, NULL, NULL, '', NULL, '', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(875, 'Mr Belal ', 'Belal', NULL, '1715114416', NULL, NULL, NULL, NULL, NULL, '17/E, 3rd Floor', NULL, 'R-05/04', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(876, 'Mr Liton', 'Liton', NULL, '171567098', NULL, NULL, NULL, NULL, NULL, '17/E, 3rd Floor, ST', NULL, 'R-06/05', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(877, 'Abdul Khalek ', 'Sir', NULL, '9975008181', NULL, NULL, NULL, NULL, NULL, '17/E, 3rd Floor,LF', NULL, 'R-07/06', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(878, 'Mr Alamin', 'Alamin', NULL, '1911985937', NULL, NULL, NULL, NULL, NULL, '17/E, 4th Floor,LF', NULL, 'R-08/07', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(879, 'Mr Kamrul ', 'Hasan', NULL, '1687408901', NULL, NULL, NULL, NULL, NULL, '17/i, 1st Floor, Right', NULL, 'R-09/08', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(880, 'Mr Sofiqul', 'Sofiqul', NULL, '1715495135', NULL, NULL, NULL, NULL, NULL, '17/i, 1st Floor,Left', NULL, 'R-10/09', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(881, 'Mr Titu', 'Titu', NULL, '', NULL, NULL, NULL, NULL, NULL, '17/i, 2nd Floor,RIGHT', NULL, 'R-11/10', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(882, 'Mrs Shahanaz', 'Shahanaz', NULL, '1832361797', NULL, NULL, NULL, NULL, NULL, '17/i, 3rd Floor,LEFT', NULL, 'R-12/11', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(883, 'Mr Nazmul ', 'Hasan', NULL, '', NULL, NULL, NULL, NULL, NULL, '17/i, 3rd Floor,RIGHT', NULL, 'R-13/12', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(884, 'Mr Tipu', 'Tipu', NULL, '', NULL, NULL, NULL, NULL, NULL, '17/i, 4th Floor, SOUTH', NULL, 'R-14/13', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(885, 'Mr Hasem', 'Hasem', NULL, '1716412333', NULL, NULL, NULL, NULL, NULL, '17/i, 4th Floor,LEFT', NULL, 'R-15A/14', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(886, 'Mr Tamim', 'Tamim', NULL, '1923258170', NULL, NULL, NULL, NULL, NULL, '17/D/1, 2nd Floor', NULL, 'R-17/15', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(887, 'Mr Kumut Ronjon ', 'Mondol', NULL, '', NULL, NULL, NULL, NULL, NULL, '17/D/1, 3rd Floor', NULL, 'R-18/16', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(888, 'Mr Sobuj', 'Sobuj', NULL, '', NULL, NULL, NULL, NULL, NULL, '17/D, G Floor,LEFT', NULL, 'R-19/17', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(889, 'Mr Hasim', 'Hasim', NULL, '1950397898', NULL, NULL, NULL, NULL, NULL, '17/D, 1st Floor,RIGHT', NULL, 'R-20/18', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(890, 'Mr Ataur ', 'Rahman', NULL, '1713078430', NULL, NULL, NULL, NULL, NULL, '17/D, 2nd Floor,RIGHT', NULL, 'R-21/19', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(891, 'Mr Mostafizur ', 'Rahman', NULL, '1729092768', NULL, NULL, NULL, NULL, NULL, '17/D, 2nd Floor,LEFT', NULL, 'R-22/20', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(892, 'Mr Meshuk', 'Meshuk', NULL, '1675241144', NULL, NULL, NULL, NULL, NULL, '17/D, 3rd Floor,RIGHT', NULL, 'R-23/21', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(893, 'Mr Raj', 'Raj', NULL, '1675857799', NULL, NULL, NULL, NULL, NULL, '17/D, 3rd Floor,LEFT', NULL, 'R-24/22', 0, 2, '0000-00-00', 2, '2019-01-07 08:25:24'),
(894, 'Mr Murshidul', 'Murshidul', NULL, '1819454085', NULL, NULL, NULL, NULL, NULL, '17/D, 4th Floor,RIGHT', NULL, 'R-25/23', 0, 2, '0000-00-00', 2, '2019-01-07 08:25:24'),
(895, 'Mr Mosharaf ', 'Hossain', NULL, '1914796202', NULL, NULL, NULL, NULL, NULL, '17/D, 4th Floor,LEFT', NULL, 'R-26/24', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(896, 'Mrs Salma ', 'Dewan', NULL, '1552466328', NULL, NULL, NULL, NULL, NULL, '17/D, 5th Floor', NULL, 'R-27/25', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(897, 'Mr Masfiq', 'Masfiq', NULL, '1819454085', NULL, NULL, NULL, NULL, NULL, '17/B, G Floor', NULL, 'R-28/26', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(898, 'Mr Rinku', 'Rinku', NULL, '1672422766', NULL, NULL, NULL, NULL, NULL, '17/B, 1st Floor', NULL, 'R-29/27', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(899, 'Syed Aminul ', 'Huq', NULL, '9340169', NULL, NULL, NULL, NULL, NULL, '17/B, 2nd Floor', NULL, 'R-30/28', 0, 2, '0000-00-00', 2, '2019-01-07 08:25:24'),
(900, 'Mr Habib', 'Habib', NULL, '', NULL, NULL, NULL, NULL, NULL, '17/B, 3rd Floor', NULL, 'R-31/29', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(901, 'Mr Prodib', 'Prodib', NULL, '1713366760', NULL, NULL, NULL, NULL, NULL, '17/B, 4th Floor', NULL, 'R-32/30', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(902, 'Mr Rubel ', 'Ahamed', NULL, '1869222055', NULL, NULL, NULL, NULL, NULL, '17/A, G Floor', NULL, 'R-33/31', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(903, 'Mr Moslem', 'Moslem', NULL, '', NULL, NULL, NULL, NULL, NULL, '17/A, 1st Floor', NULL, 'R-34/32', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(904, 'Mr Jabed', 'Jabed', NULL, '', NULL, NULL, NULL, NULL, NULL, '17/A, 2nd Floor', NULL, 'R-35/33', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(905, 'Mr Jahangir', 'Jahangir', NULL, '1687609554', NULL, NULL, NULL, NULL, NULL, '17/A, 4th Floor', NULL, 'R-36/34', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(906, 'Mr. Rasel', 'Rasel', NULL, '1727576034', NULL, NULL, NULL, NULL, NULL, '17/1/B, Gf, ML', NULL, 'R - 37/35', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(907, 'Mr. Sowrob', 'Sowrob', NULL, '', NULL, NULL, NULL, NULL, NULL, '17/1/B, 1st Floor,RIGHT', NULL, 'R - 37A/36', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(908, 'Mr Tazul ', 'Islam', NULL, '1711148174', NULL, NULL, NULL, NULL, NULL, '17/1/B, 3rd floor ,RIGHT', NULL, 'R - 38/37', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(909, 'Mr Sowan', 'Sowan', NULL, '1715454114', NULL, NULL, NULL, NULL, NULL, '17/1/B, 1st Floor', NULL, 'R-39/38', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(910, 'Mr. Nasim', 'Nasim', NULL, '1711680505', NULL, NULL, NULL, NULL, NULL, '17/1/B, 3rd Floor RI', NULL, 'R - 40/39', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(911, 'Mr Nowshad', 'Nowshad', NULL, '1730352871', NULL, NULL, NULL, NULL, NULL, '17/1/B, 2nd Floor,LEFT', NULL, 'R-41/40', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(912, 'Mr Alim ', 'Khan', NULL, '1819226650', NULL, NULL, NULL, NULL, NULL, '17/1/B, 4th Floor,SAD', NULL, 'R-41A/41', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(913, 'Mr Zia', 'Zia', NULL, '1797245245', NULL, NULL, NULL, NULL, NULL, '17/C/6, G Floor', NULL, 'R-42/42', 0, 2, '0000-00-00', 2, '2019-01-07 08:25:24'),
(914, 'Mr Mohammad ', 'Hossain', NULL, '1863600366', NULL, NULL, NULL, NULL, NULL, '17/E/6, 2nd Floor', NULL, 'R-43A/43', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(915, 'Rumi ', 'Kaiser', NULL, '1863836130', NULL, NULL, NULL, NULL, NULL, '17/C/6, 3rd Floor', NULL, 'R-44/44', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(916, 'Mr Kawser', 'Kawser', NULL, '1614324401', NULL, NULL, NULL, NULL, NULL, '17/C/5, 1st Floor', NULL, 'R-45/45', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(917, 'Mr Sanny', 'Sanny', NULL, '1832073983', NULL, NULL, NULL, NULL, NULL, '17/C/5, 2nd Floor,ST', NULL, 'R-46/46', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(918, 'Mr Sajid', 'Sajid', NULL, '1676321043', NULL, NULL, NULL, NULL, NULL, '17/C/5, 3rd Floor,ST', NULL, 'R-47/47', 0, 0, '2017-05-18', 2, '2019-01-07 08:25:24'),
(919, 'Mr Taslim', 'Taslim', NULL, '1624960137', NULL, NULL, NULL, NULL, NULL, '17/C/5, 4th Floor', NULL, 'R-48/48', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(920, 'Mr Dipu ', 'Rahman', NULL, '1914477774', NULL, NULL, NULL, NULL, NULL, '17/C/4, 4th  Floor,LEFT', NULL, 'R-50/49', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(921, 'Mr Ripon', 'Ripon', NULL, '1914725357', NULL, NULL, NULL, NULL, NULL, '17/C/4, 4th Floor', NULL, 'R-51/50', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(922, 'Mr Milon', 'Milon', NULL, '1714787352', NULL, NULL, NULL, NULL, NULL, '17/C/3, G F', NULL, 'R - 52/51', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(923, 'Mrs Sofia', 'Sofia', NULL, '1714787352', NULL, NULL, NULL, NULL, NULL, '17/C/3, 1st Floor,A-2', NULL, 'R - 53/52', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(924, 'Mr. Saidul Islam ', 'Rony', NULL, '', NULL, NULL, NULL, NULL, NULL, '17/C/3, 1st, North, B-2', NULL, 'R - 54/53', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(925, 'Mr Ali ', 'Asraf', NULL, '1711458780', NULL, NULL, NULL, NULL, NULL, '17/C/3, A-3,RIGHT', NULL, 'R-55/54', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(926, 'Mr Wheduzzamman', ' (Babu)', NULL, '1710334999', NULL, NULL, NULL, NULL, NULL, '17/C/3 2nd Floor,B-3', NULL, 'R-56/55', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(927, 'Mr. Ikbal', 'Ikbal', NULL, '1675567005', NULL, NULL, NULL, NULL, NULL, '17/C/3, 3rd floor', NULL, 'R -57/56', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(928, 'Beauty ', 'Apa', NULL, '1929606178', NULL, NULL, NULL, NULL, NULL, '17/C/3, 3rd Floor, B-4', NULL, 'R-58/57', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(929, 'Mr Rubel', 'Rubel', NULL, '1911599006', NULL, NULL, NULL, NULL, NULL, '17/C/3, 4th Floor, Left', NULL, 'R-59/58', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24');
INSERT INTO `cable_client` (`clientId`, `clientFirstName`, `clientLastName`, `email`, `phone`, `clientImage`, `clientNID`, `fkconnectionTypeId`, `clientPassport`, `price`, `address`, `fkpackageId`, `clientSerial`, `cableLength`, `noOfTv`, `conDate`, `clientStatus`, `created_at`) VALUES
(930, 'Mr Saidur ', 'Rahman', NULL, '1919458984', NULL, NULL, NULL, NULL, NULL, '17/C/3, 4th Floor,A-5', NULL, 'R-60/59', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(931, 'Mr Raihan', 'Raihan', NULL, '1720233830', NULL, NULL, NULL, NULL, NULL, '17/C/2, 1st  Floor', NULL, 'R-61/60', 0, 3, '0000-00-00', 2, '2019-01-07 08:25:24'),
(932, 'Mr Akhter Hossain ', 'Ritu', NULL, '1711384020', NULL, NULL, NULL, NULL, NULL, '17/C/2, 2nd Floor', NULL, 'R-62/61', 0, 2, '0000-00-00', 2, '2019-01-07 08:25:24'),
(933, 'Mr Akhter  ', 'Hossain', NULL, '1916062499', NULL, NULL, NULL, NULL, NULL, '17/C/2, 2nd Floor', NULL, 'R-62A/62', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(934, 'Mr Asraful ', 'Islam', NULL, '', NULL, NULL, NULL, NULL, NULL, '17/C/2, 3rd Floor', NULL, 'R-63/63', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(935, 'Mr Delower', 'Delower', NULL, '1795453692', NULL, NULL, NULL, NULL, NULL, '17/C/2, 4th floor, left.', NULL, 'R - 64/64', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(936, 'Mr Biplob', 'Biplob', NULL, '1918210177', NULL, NULL, NULL, NULL, NULL, '17/C/2, 4th floor', NULL, 'R - 64A/65', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(937, 'Mrs Rojy', 'Rojy', NULL, '1715321956', NULL, NULL, NULL, NULL, NULL, '17/C/2, 5th, LF', NULL, 'R-65/66', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(938, 'Mr Lablu ', 'Ahamed', NULL, '1712217729', NULL, NULL, NULL, NULL, NULL, '17/1, 2nd Floor', NULL, 'R-66/67', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(939, 'Mr. Limon ', 'Hasan', NULL, '', NULL, NULL, NULL, NULL, NULL, '17/1, 2nd, Left', NULL, 'R - 67/68', 0, 0, '0007-03-17', 2, '2019-01-07 08:25:24'),
(940, 'Mr Polash ', 'Mahmud', NULL, '1711640724', NULL, NULL, NULL, NULL, NULL, '17/2, G F, LF', NULL, 'R - 68/69', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(941, 'Mr. Rakhu', 'Rakhu', NULL, '1910405207', NULL, NULL, NULL, NULL, NULL, '17/2, 1st Floor,', NULL, 'R - 69/70', 0, 2, '0000-00-00', 2, '2019-01-07 08:25:24'),
(942, 'Mr. Shohidul ', 'Islam', NULL, '1819128695', NULL, NULL, NULL, NULL, NULL, '17/3, GF', NULL, 'R - 70A/71', 500, 1, '0000-00-00', 2, '2019-01-07 08:25:24'),
(943, 'Mr. Rana', 'Rana', NULL, '', NULL, NULL, NULL, NULL, NULL, '17/2, 2nd Floor,', NULL, 'R - 70/72', 0, 1, '0000-00-00', 2, '2019-01-07 08:25:24'),
(944, 'Mr Mahmud ', 'Hasan', NULL, '1711384020', NULL, NULL, NULL, NULL, NULL, '17/3, 3rd Floor', NULL, 'R - 71/73', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(945, 'Mrs Khaleda ', 'Akter', NULL, '', NULL, NULL, NULL, NULL, NULL, '17/3, 1st Floor,right', NULL, 'R - 72/74', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(946, 'Mr Nazrul ', 'Islam', NULL, '', NULL, NULL, NULL, NULL, NULL, '17/3, 1st, Left', NULL, 'R - 73/75', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(947, 'Mr Asraful', 'Asraful', NULL, '1716791503', NULL, NULL, NULL, NULL, NULL, '17/3, 2nd , Left', NULL, 'R-74/76', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(948, 'Mr Mahamud ', 'Hasan', NULL, '1719505875', NULL, NULL, NULL, NULL, NULL, '17/D, G Floor', NULL, 'R-74A/78', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(949, 'Mr. Badon', 'Badon', NULL, '', NULL, NULL, NULL, NULL, NULL, '17/C, G Floor', NULL, 'R - 75/79', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(950, 'Mr Sohel', 'Sohel', NULL, '1854331916', NULL, NULL, NULL, NULL, NULL, '17/C, 1st Floor, Left', NULL, 'R - 76/80', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(951, 'Mr. Abul ', 'Bashar', NULL, '1732256367', NULL, NULL, NULL, NULL, NULL, '17/C, 3rd Floor', NULL, 'R - 78/81', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(952, 'Mr Anowara ', 'Begum', NULL, '1922665978', NULL, NULL, NULL, NULL, NULL, '17/C, 4th Floor, RI', NULL, 'R - 49/82', 0, 2, '0000-00-00', 2, '2019-01-07 08:25:24'),
(953, 'Mr Rajib', 'Rajib', NULL, '1819461975', NULL, NULL, NULL, NULL, NULL, '17/C, A-4, LF', NULL, 'R-81/83', 0, 2, '0000-00-00', 2, '2019-01-07 08:25:24'),
(954, 'Mr. Shojib', 'Shojib', NULL, '1992022732', NULL, NULL, NULL, NULL, NULL, '17/C. 5th, Right', NULL, 'R - 82/84', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(955, 'Mrs Anowara ', 'Begum', NULL, '1922665978', NULL, NULL, NULL, NULL, NULL, '17/C. B-5', NULL, 'R - 82A/85', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(956, 'Mrs. Sahara ', 'Begum', NULL, '1620105778', NULL, NULL, NULL, NULL, NULL, '17/C, 5th floor, left.', NULL, 'R - 83/86', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(957, 'Mr Ahsem Habib ', 'Sova', NULL, '1716824237', NULL, NULL, NULL, NULL, NULL, '17/C/A, G Floor', NULL, 'R-84/87', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(958, 'Mrs. Poly', 'Poly', NULL, '1926737599', NULL, NULL, NULL, NULL, NULL, '17/C/A, GF,', NULL, 'R - 85/88', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(959, 'Mr Juel ', 'Ahammed', NULL, '1715547191', NULL, NULL, NULL, NULL, NULL, '17/C/A, 1st Floor', NULL, 'R - 86/89', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(960, 'Mr Imran', 'Imran', NULL, '1676344087', NULL, NULL, NULL, NULL, NULL, '17/C/A, 2nd Floor', NULL, 'R-87/90', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(961, 'Songita ', 'Rahman', NULL, '', NULL, NULL, NULL, NULL, NULL, '17, G Floor', NULL, 'R-88/91', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(962, 'Mr Joynal', 'Joynal', NULL, '1965498611', NULL, NULL, NULL, NULL, NULL, '17 no Tinset', NULL, 'R-90/92', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(963, 'Mr. Saiful', 'Saiful', NULL, '1996204625', NULL, NULL, NULL, NULL, NULL, '17, Tin', NULL, 'R - 91/93', 500, 1, '0000-00-00', 2, '2019-01-07 08:25:24'),
(964, 'Mr. Kabir', 'Kabir', NULL, '1937450043', NULL, NULL, NULL, NULL, NULL, '17, Tin', NULL, 'R - 92/94', 0, 0, '2020-09-17', 2, '2019-01-07 08:25:24'),
(965, 'Mr. Sattar', 'Sattar', NULL, '1955273810', NULL, NULL, NULL, NULL, NULL, '17, Tin', NULL, 'R - 93/95', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(966, 'Mr. Monir ', 'Hossain', NULL, '1757303841', NULL, NULL, NULL, NULL, NULL, '17, Tin', NULL, 'R - 93A/96', 0, 0, '0007-02-18', 2, '2019-01-07 08:25:24'),
(967, 'Mr. Mintu', 'Mintu', NULL, '1936515943', NULL, NULL, NULL, NULL, NULL, '17, Tin', NULL, 'R - 93B/97', 0, 0, '0007-02-18', 2, '2019-01-07 08:25:24'),
(968, 'Mr. Khokon', 'Khokon', NULL, '1719403412', NULL, NULL, NULL, NULL, NULL, '16/D/1, G Floor', NULL, 'R -94/98', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(969, 'Mr. Morshed ', 'Alom', NULL, '1725287058', NULL, NULL, NULL, NULL, NULL, '16/D/1, G Floor, St', NULL, 'R -95/99', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(970, 'Mr. ', 'Mr. ', NULL, '', NULL, NULL, NULL, NULL, NULL, '16/D/1, G Floor', NULL, 'R -95A/100', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(971, 'Mr. Ala ', 'Uddin', NULL, '1715316355', NULL, NULL, NULL, NULL, NULL, '16/D/1, 2nd Floor,Left', NULL, 'R -97/101', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(972, 'Mr. Gopal ', 'Roy', NULL, '1715316355', NULL, NULL, NULL, NULL, NULL, '16/D/1, 2nd Floor, r-302', NULL, 'R -98/102', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(973, 'Mr. Saiful', 'Saiful', NULL, '1914067010', NULL, NULL, NULL, NULL, NULL, '16/D/1, 401', NULL, 'R -99/103', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(974, 'Mr. Saiful ', 'Islam 402', NULL, '1711932462', NULL, NULL, NULL, NULL, NULL, '16/D/1,3rd Floor,Middle', NULL, 'R -100/104', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(975, 'Mr. Habibur ', 'Rahman', NULL, '1714766955', NULL, NULL, NULL, NULL, NULL, 'Khan Monzish', NULL, 'R -100A/105', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(976, 'Mr. Tajul ', 'Islam', NULL, '', NULL, NULL, NULL, NULL, NULL, '16/B/1/1, 4th Floor,Lf', NULL, 'R -100A/106', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(977, 'Mr. Sajjad ', '403', NULL, '1979552017', NULL, NULL, NULL, NULL, NULL, '16/D/1/4/3, 3rd Floor,Right', NULL, 'R -101/107', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(978, 'S P Siddik', 'Siddik', NULL, '1716491379', NULL, NULL, NULL, NULL, NULL, '16/D/1, 4th Floor, 503', NULL, 'R -102/108', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(979, 'Begum Badruz ', 'Zahan', NULL, '1971531618', NULL, NULL, NULL, NULL, NULL, '16/D/1, 4th Floor, 502', NULL, 'R -103/109', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(980, 'Mr Shahanur ', 'Alom Sir', NULL, '1687609554', NULL, NULL, NULL, NULL, NULL, '16/D/1, 5th Floor, 603', NULL, 'R -143/110', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(981, 'Mr Asad', 'Asad', NULL, '1916797848', NULL, NULL, NULL, NULL, NULL, '16/D/1, 5th Floor,602', NULL, 'R-105/111', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(982, 'Mr Tofayel', 'Tofayel', NULL, '', NULL, NULL, NULL, NULL, NULL, '16/D/1, Flat. 601', NULL, 'R-106/112', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(983, 'Mr Aminul ', 'Islam', NULL, '', NULL, NULL, NULL, NULL, NULL, '17/D/1, Top Floor', NULL, 'R - 107/113', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(984, 'Mr Ohidur ', 'Rahman', NULL, '', NULL, NULL, NULL, NULL, NULL, '16/D/2, 1st Floor,RI', NULL, 'R-108/114', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(985, 'Mr Shajahan ', 'Ali', NULL, '1715581262', NULL, NULL, NULL, NULL, NULL, '16/D/2, 1st Floor, Left', NULL, 'R-109/115', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(986, 'Mr Abdullah', ' Al-Amin ', NULL, '1718255354', NULL, NULL, NULL, NULL, NULL, '16/D/2, 2nd, Right', NULL, 'R-101/116', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(987, 'Mr Kalyan ', 'Halder', NULL, '2835887', NULL, NULL, NULL, NULL, NULL, '16/D/2, 3rd Floor,Right', NULL, 'R-111/117', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(988, 'Mr Rafiqul ', 'Islam', NULL, '1712674650', NULL, NULL, NULL, NULL, NULL, '16/D/2, 3rd Floor, Left', NULL, 'R-112/118', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(989, 'Mr Serag', 'Serag', NULL, '', NULL, NULL, NULL, NULL, NULL, '17/1/1, Tinset', NULL, 'R-113/119', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(990, 'Mr. Kaniz', 'Kaniz', NULL, '1680614620', NULL, NULL, NULL, NULL, NULL, '17/1/2, GF, Tin', NULL, 'R - 114/120', 0, 0, '2013-11-17', 2, '2019-01-07 08:25:24'),
(991, 'Mr. Muazzin', 'Muazzin', NULL, '1611780522', NULL, NULL, NULL, NULL, NULL, '17/C/1/2, Tin', NULL, 'R - 115/121', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(992, 'Mr. Nizam', 'Nizam', NULL, '192238940', NULL, NULL, NULL, NULL, NULL, '17/C/1/2, Tin', NULL, 'R - 116/122', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(993, 'Md. Abul ', 'Basher', NULL, '1844114042', NULL, NULL, NULL, NULL, NULL, '17/C/1/2, Tin', NULL, 'R - 117/123', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(994, 'Mr Tania', 'Tania', NULL, '1819454085', NULL, NULL, NULL, NULL, NULL, '16/F, G F', NULL, 'R - 118/124', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(995, 'Mr Bachhu', 'Bachhu', NULL, '1719278412', NULL, NULL, NULL, NULL, NULL, '16/F, 1st Floor', NULL, 'R-119/125', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(996, 'Md. Aminul ', 'Haque', NULL, '1914446503', NULL, NULL, NULL, NULL, NULL, '16/F, 2nd, Right', NULL, 'R - 120/126', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(997, 'Mr Mamun', 'Mamun', NULL, '1717228669', NULL, NULL, NULL, NULL, NULL, '16/F, 2nd, South', NULL, 'R-121/127', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(998, 'Shyamol ', 'Biswas', NULL, '1843683503', NULL, NULL, NULL, NULL, NULL, '16/F/2, G Floor', NULL, 'R-122/128', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(999, 'Mr Tanu', 'Tanu', NULL, '', NULL, NULL, NULL, NULL, NULL, '16/F/2, 1st Floor', NULL, 'R - 123/129', 0, 2, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1000, 'Mr Golam ', 'Mawla', NULL, '', NULL, NULL, NULL, NULL, NULL, '16/F/2, 2nd ', NULL, 'R-124/130', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1001, 'Mr Jakir ', 'Hossain', NULL, '1716145627', NULL, NULL, NULL, NULL, NULL, '16/F/2, 3rd , South', NULL, 'R-125/131', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1002, 'Mr. Rafin', 'Rafin', NULL, '1934498148', NULL, NULL, NULL, NULL, NULL, '16/E, GF, Right', NULL, 'R -126/132', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1003, 'Mr. Munsi', 'Munsi', NULL, '1718218345', NULL, NULL, NULL, NULL, NULL, '16/E, GF,ST', NULL, 'R -126A/133', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1004, 'Mowsumi', 'Mowsumi', NULL, '718565364', NULL, NULL, NULL, NULL, NULL, '16/E, 1st Floor', NULL, 'R-127/134', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1005, 'Shokina', 'Shokina', NULL, '1680085739', NULL, NULL, NULL, NULL, NULL, '16/E, 1st Floor, Left', NULL, 'R - 128/135', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1006, 'Brishti ', 'Brishti ', NULL, '', NULL, NULL, NULL, NULL, NULL, '16/E, 2nd Floor', NULL, 'R-129/136', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1007, 'Tota ', 'Miah', NULL, '', NULL, NULL, NULL, NULL, NULL, 'Moider Mill', NULL, 'R-130/137', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1008, 'Mr Mahmud', 'Mahmud', NULL, '1717288669', NULL, NULL, NULL, NULL, NULL, '16/E, 2nd Floor ri', NULL, 'R-131/138', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1009, 'Mr Billal', 'Billal', NULL, '1625003309', NULL, NULL, NULL, NULL, NULL, '16/E, 3rd Floor', NULL, 'R-132/139', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1010, 'Mr Abinash ', 'Roy', NULL, '1712510847', NULL, NULL, NULL, NULL, NULL, '16/E, 3rd Ri', NULL, 'R-133/140', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1011, 'Mr Ibrahim', 'Ibrahim', NULL, '1911812321', NULL, NULL, NULL, NULL, NULL, '16/E, 3rd Floor', NULL, 'R-134/141', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1012, 'Mr Opu', 'Opu', NULL, '', NULL, NULL, NULL, NULL, NULL, '16/E, Top Sad', NULL, 'R-134A/142', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1013, 'Mr Tipu', 'Tipu', NULL, '', NULL, NULL, NULL, NULL, NULL, '16/A, G  Floor', NULL, 'R-136/143', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1014, 'Mr. Mohibullah', 'Mohibullah', NULL, '1552408087', NULL, NULL, NULL, NULL, NULL, '16/A, 1st loor, South', NULL, 'R-137/144', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1015, 'Mr Kazimoniruzzaman', 'Mr Kazimoniruzzaman', NULL, '', NULL, NULL, NULL, NULL, NULL, '356/1, 4th Floor, Right', NULL, 'HP-01/01', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1016, 'Mr Pitu Mama', 'Mr Pitu Mama', NULL, '1795847491', NULL, NULL, NULL, NULL, NULL, '356/A, 3rd Floor,Right', NULL, 'HP-1A/02', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1017, 'Mr.Akash', 'Chowdhury', NULL, '1954216704', NULL, NULL, NULL, NULL, NULL, '', NULL, '', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1018, 'Mr Elias', 'Mr Elias', NULL, '1795480009', NULL, NULL, NULL, NULL, NULL, '594/396, A/2', NULL, 'HP-02/04', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1019, 'Mr Mehdi ', 'Hasan', NULL, '18402183522', NULL, NULL, NULL, NULL, NULL, '594/396, 1st Floor, B-2', NULL, 'HP-28/03', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1020, 'Mr Minara ', 'Khatun', NULL, '16790990575', NULL, NULL, NULL, NULL, NULL, '594, A-3', NULL, 'HP-04/06', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1021, 'Mr Abdul ', 'Kader', NULL, '1712287147', NULL, NULL, NULL, NULL, NULL, '594, B-3', NULL, 'HP-05/07', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1022, 'Mr Ataur ', 'Rahman', NULL, '1716880740', NULL, NULL, NULL, NULL, NULL, '594, 3-C', NULL, 'HP-06/08', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1023, 'Mr Asis', 'Asis', NULL, '1711143920', NULL, NULL, NULL, NULL, NULL, '594, 2nd Floor, D-3', NULL, 'HP-07/09', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1024, 'Mr Abul ', 'Motin', NULL, '19340930', NULL, NULL, NULL, NULL, NULL, '594, A-4', NULL, 'HP-08/10', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1025, 'Mr Masud', 'Masud', NULL, '1956211210', NULL, NULL, NULL, NULL, NULL, '594/396, B-4', NULL, 'HP-09/11', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1026, 'Mr Karim', 'Mr Karim', NULL, '', NULL, NULL, NULL, NULL, NULL, '594, B-5', NULL, 'HP-39/12', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1027, 'Mr Yousof ', 'Khan', NULL, '1711574804', NULL, NULL, NULL, NULL, NULL, '594, C-5', NULL, 'HP-10/13', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1028, 'Hazi Ali Asgor M', 'Asgor M', NULL, '1924580717', NULL, NULL, NULL, NULL, NULL, '396/6/B', NULL, 'HP-11/14', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1029, 'Mr Rezaul  ', 'Quader', NULL, '1720999962', NULL, NULL, NULL, NULL, NULL, '594/396, 6/A', NULL, 'HP-12/15', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1030, 'Mr Sahin', 'Sahin', NULL, '1712122206', NULL, NULL, NULL, NULL, NULL, '396, 7-A', NULL, 'HP-13/16', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1031, 'Mr Biplob', 'Biplob', NULL, '1847088086', NULL, NULL, NULL, NULL, NULL, '594/396, B-7', NULL, 'HP-14/17', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1032, 'Mr Sojol', 'Sojol', NULL, '', NULL, NULL, NULL, NULL, NULL, '594/396, C-7', NULL, 'HP-15/18', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1033, 'Mr Parvez', 'Parvez', NULL, '1711905778', NULL, NULL, NULL, NULL, NULL, '594, 7/D', NULL, 'HP-16/19', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1034, 'Mr. Rafiqul ', 'Islam', NULL, '', NULL, NULL, NULL, NULL, NULL, '594,  8/B', NULL, 'HP-17/20', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1035, 'Mr Miraj', 'Miraj', NULL, '17432467', NULL, NULL, NULL, NULL, NULL, '594/396, C-8', NULL, 'HP-18/21', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1036, 'Mehnas', 'Mehnas', NULL, '1731805107', NULL, NULL, NULL, NULL, NULL, '594/396, B-9', NULL, 'HP-19/22', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1037, 'Mr Monowara ', 'Khatun', NULL, '1722922248', NULL, NULL, NULL, NULL, NULL, '594/396, C-9', NULL, 'HP-19/22', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1038, 'Mr Faruk ', 'Hossain M', NULL, '1712032075', NULL, NULL, NULL, NULL, NULL, '594, 10-A', NULL, 'HP-57/24', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1039, 'Mr Shajahan', 'Shajahan', NULL, '1720058268', NULL, NULL, NULL, NULL, NULL, '594, 10/B', NULL, 'HP-22/25', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1040, 'Mr Sohel', 'Sohel', NULL, '1756453364', NULL, NULL, NULL, NULL, NULL, '396, F-2', NULL, 'HP-23/26', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1041, 'Mr. Tarek', 'Tarek', NULL, '1912822208', NULL, NULL, NULL, NULL, NULL, '396, E-2', NULL, 'HP-24/27', 0, 1, '2002-10-17', 2, '2019-01-07 08:25:24'),
(1042, 'Mr Mobarok ', 'Hossain', NULL, '1816758832', NULL, NULL, NULL, NULL, NULL, '594/396, F-3', NULL, 'HP-25/28', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1043, 'Mr. Dipu', 'Dipu', NULL, '1914986864', NULL, NULL, NULL, NULL, NULL, '396, 2nd, G-3', NULL, 'HP-26/29', 0, 1, '2001-12-17', 2, '2019-01-07 08:25:24'),
(1044, 'Onadi', 'Onadi', NULL, '', NULL, NULL, NULL, NULL, NULL, '396/594, F-4', NULL, 'HP-27/30', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1045, 'Monowara ', 'Begum', NULL, '1715969829', NULL, NULL, NULL, NULL, NULL, '594/396, E-4', NULL, 'HP-28/31', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1046, 'Mr Safiq', 'Safiq', NULL, '1671015810', NULL, NULL, NULL, NULL, NULL, '396, F-5', NULL, 'HP-29/32', 0, 2, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1047, 'Mr Golam ', 'Nobi', NULL, '1819251314', NULL, NULL, NULL, NULL, NULL, '396, E-5', NULL, 'HP-30/33', 0, 2, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1048, 'Mr Nazlu', 'Nazlu', NULL, '', NULL, NULL, NULL, NULL, NULL, '396/594, 4th Floor', NULL, 'HP-30A/34', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1049, 'Mr Habib', 'Habib', NULL, '1913559742', NULL, NULL, NULL, NULL, NULL, '396/594, F-6', NULL, 'HP-31/35', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1050, 'Mrs. Morium ', 'Akter', NULL, '184229946', NULL, NULL, NULL, NULL, NULL, '396, 5th, G-6', NULL, 'HP-32/36', 0, 1, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1051, 'Mr. Ripon', 'Ripon', NULL, '1721353524', NULL, NULL, NULL, NULL, NULL, '396, F-7, Left', NULL, 'HP-33/37 ', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1052, 'Mr Jakir ', 'Hossain', NULL, '1819210826', NULL, NULL, NULL, NULL, NULL, '396, 8-F', NULL, 'HP-34/38', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1053, 'Mr Arefin', 'Arefin', NULL, '1610400004', NULL, NULL, NULL, NULL, NULL, '396, E-8', NULL, 'HP-3539', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1054, 'Mr Khusru ', 'Khusru', NULL, '1712019006', NULL, NULL, NULL, NULL, NULL, '396,  9/E', NULL, 'HP-36/40', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1055, 'Onu', 'Onu', NULL, '1670827362', NULL, NULL, NULL, NULL, NULL, '396/594, F-10', NULL, 'HP-37/41', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1056, 'MR. Alamgir', 'Alamgir', NULL, '1913361177', NULL, NULL, NULL, NULL, NULL, '396, 9th,  G-10', NULL, 'HP-38/42', 0, 1, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1057, 'Mr Awal', 'Awal', NULL, '', NULL, NULL, NULL, NULL, NULL, '395, A-2', NULL, 'HP-40/43', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1058, 'Mr. Jamal', 'Jamal', NULL, '1748777755', NULL, NULL, NULL, NULL, NULL, '395, B-2', NULL, 'HP-41/44 ', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1059, 'Mr Babul', 'Babul', NULL, '1711842617', NULL, NULL, NULL, NULL, NULL, '395/3/A', NULL, 'HP-42/45', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1060, 'Mr Arif', 'Arif', NULL, '', NULL, NULL, NULL, NULL, NULL, ' 395, 2nd Floor, B-3', NULL, 'HP-42A/46', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1061, 'Eng. Mahbub  ', 'Alom', NULL, '1711479743', NULL, NULL, NULL, NULL, NULL, ' 395/3/C', NULL, 'HP-43/47', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1062, 'Mr.Shaiful ', 'Islam', NULL, '1989852766', NULL, NULL, NULL, NULL, NULL, '395, 4-A', NULL, 'HP-44/48', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1063, 'Mr Geyash', 'Geyash', NULL, '1766018646', NULL, NULL, NULL, NULL, NULL, '395/4/B', NULL, 'HP-45/49', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1064, 'Abdul ', 'Salam', NULL, '9347911', NULL, NULL, NULL, NULL, NULL, '395/5/A', NULL, 'HP-46/50', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1065, 'Mr Nasir', 'Nasir', NULL, '1710935656', NULL, NULL, NULL, NULL, NULL, '395, 5/C, 6/B', NULL, 'HP-18/48', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1066, 'Mr Enayet', 'Enayet', NULL, '', NULL, NULL, NULL, NULL, NULL, '395/5/C', NULL, 'HP-47/51', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1067, 'Mr Nasir', 'Nasir', NULL, '1710935656', NULL, NULL, NULL, NULL, NULL, '395, 5/C, 6/B', NULL, 'HP-48/52', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1068, 'Mr. Amir Ali ', 'Khan', NULL, '1716262444', NULL, NULL, NULL, NULL, NULL, '395, F # 6/A, Left', NULL, 'HP-49/53', 0, 1, '2002-10-17', 2, '2019-01-07 08:25:24'),
(1069, 'Mr Mohammad ', 'Ali', NULL, '', NULL, NULL, NULL, NULL, NULL, '395, 5th C-6', NULL, 'HP-50/54', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1070, 'Mr Kamruzzaman  ', 'Ahamed', NULL, '1942525169', NULL, NULL, NULL, NULL, NULL, '395, A-7', NULL, 'HP-51-55', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1071, 'Mr Nasim', 'Nasim', NULL, '', NULL, NULL, NULL, NULL, NULL, '395, C-7', NULL, 'HP-52/56', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1072, 'Mr Sayedur  ', 'Rahman', NULL, '1767456898', NULL, NULL, NULL, NULL, NULL, '395, A-8', NULL, 'HP-53/57', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1073, 'Mr Srabon', 'Srabon', NULL, '', NULL, NULL, NULL, NULL, NULL, '395, C-8', NULL, 'HP-54/58  ', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1074, 'Mr Rabiul ', 'Islam', NULL, '1713005020', NULL, NULL, NULL, NULL, NULL, '395, A-9', NULL, 'HP-55/59', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1075, 'Mrs.BABUL', 'BABUL', NULL, '1817588562', NULL, NULL, NULL, NULL, NULL, '395 9/B', NULL, 'HP-25/56', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1076, 'Mr Babul', 'Babul', NULL, '1817588562', NULL, NULL, NULL, NULL, NULL, '395, B-9', NULL, 'HP-56/60', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1077, 'Mr Linkon', 'Linkon', NULL, '1815419457', NULL, NULL, NULL, NULL, NULL, '395, 10/C', NULL, 'HP-58/61', 0, 0, '2026-05-18', 2, '2019-01-07 08:25:24'),
(1078, 'Mr. Sifat', 'Sifat', NULL, '', NULL, NULL, NULL, NULL, NULL, '356/A, B-1', NULL, 'HP-59/62', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1079, 'Mr Sujon', 'Sujon', NULL, '1791007782', NULL, NULL, NULL, NULL, NULL, '356/A, 2nd Floor, A-2', NULL, 'HP-59/A/63', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1080, 'Mr Rasel', 'Rasel', NULL, '1715413976', NULL, NULL, NULL, NULL, NULL, '356/A, 3rd Floor, A-3', NULL, 'HP-60/64', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1081, 'Mr Abdullah', 'Abdullah', NULL, '1742539863', NULL, NULL, NULL, NULL, NULL, '356/A, B-3', NULL, 'HP-61/65', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1082, 'Mr Shawon', 'Shawon', NULL, '1717797357', NULL, NULL, NULL, NULL, NULL, '356/A, 4th Floor, A-4', NULL, 'HP-62/66', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1083, 'Mr. Mostak', 'Mostak', NULL, '1914198274', NULL, NULL, NULL, NULL, NULL, '356/A, 5A, ', NULL, 'HP-63/67', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1084, 'MR.ARIF', 'ARIF', NULL, '1712113206', NULL, NULL, NULL, NULL, NULL, '356/A, 5th Floor, B-5 ', NULL, 'HP-64/68', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1085, 'Mr.Iqbal', 'Iqbal', NULL, '1950000888', NULL, NULL, NULL, NULL, NULL, '356/A, B-6', NULL, 'HP-65/69 ', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1086, 'S.M Abul ', 'Bashar', NULL, '', NULL, NULL, NULL, NULL, NULL, '356/A, 6th Floor, A-6', NULL, 'HP-66/70', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1087, 'Mr. Shahin', 'Shahin', NULL, '', NULL, NULL, NULL, NULL, NULL, '356/C, G Right', NULL, 'HP-67/71', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1088, 'Mr Mohith', 'Mohith', NULL, '', NULL, NULL, NULL, NULL, NULL, '356/C, 1st Floor,Right', NULL, 'HP-67A/72', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1089, 'Mr. Towfiqul ', 'Islam', NULL, '', NULL, NULL, NULL, NULL, NULL, '392/A, 3rd Floor', NULL, 'HP-67B/73', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1090, 'Mr. Ziauddin', 'Ziauddin', NULL, '1715000167', NULL, NULL, NULL, NULL, NULL, '356/C, 2nd, A-3', NULL, 'HP-68/74', 1000, 1, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1091, 'Mr. Advocate', 'Advocate', NULL, '1720900587', NULL, NULL, NULL, NULL, NULL, '356/C, 2nd, B-3', NULL, 'HP-69/75', 500, 1, '2005-10-17', 2, '2019-01-07 08:25:24'),
(1092, 'Mr Rajib ', 'Hasan', NULL, '1716801949', NULL, NULL, NULL, NULL, NULL, '356/C, 4-A', NULL, 'HP-70/76', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24'),
(1093, 'Intex ', 'Tower', NULL, '1680098218', NULL, NULL, NULL, NULL, NULL, '397/1/A', NULL, 'HP-72/77', 0, 0, '0000-00-00', 2, '2019-01-07 08:25:24');

-- --------------------------------------------------------

--
-- Table structure for table `checkmonth`
--

CREATE TABLE `checkmonth` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkmonth`
--

INSERT INTO `checkmonth` (`id`, `date`) VALUES
(6, '2018-12-13'),
(7, '2019-01-02');

-- --------------------------------------------------------

--
-- Table structure for table `client_files`
--

CREATE TABLE `client_files` (
  `fileId` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `path` varchar(255) NOT NULL,
  `clienId` int(11) NOT NULL,
  `tableName` varchar(20) NOT NULL,
  `uploadedBy` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `complain`
--

CREATE TABLE `complain` (
  `complainId` int(11) NOT NULL,
  `complainType` varchar(100) DEFAULT NULL,
  `complainStatus` tinyint(3) NOT NULL COMMENT '0=deleted,1=pending,2=unsolve,3=solve',
  `complainDetails` mediumtext,
  `updated_at` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `clientId` int(11) NOT NULL,
  `clientTable` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `connectiontype`
--

CREATE TABLE `connectiontype` (
  `connectionTypeId` int(11) NOT NULL,
  `type` tinyint(3) DEFAULT NULL COMMENT '1=fiber, 2= utp, 3=Cable',
  `typeDetails` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `connectiontype`
--

INSERT INTO `connectiontype` (`connectionTypeId`, `type`, `typeDetails`) VALUES
(1, 1, '3'),
(2, 2, '1'),
(3, 2, '1'),
(4, 2, '1');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employeeId` int(11) NOT NULL,
  `employeeName` varchar(45) DEFAULT NULL,
  `employeeImage` varchar(255) DEFAULT NULL,
  `employeeAppLetter` varchar(255) DEFAULT NULL,
  `employeeCv` varchar(255) DEFAULT NULL,
  `degisnation` varchar(45) DEFAULT NULL,
  `salary` double DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `status` varchar(15) NOT NULL,
  `fkUserId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employeeId`, `employeeName`, `employeeImage`, `employeeAppLetter`, `employeeCv`, `degisnation`, `salary`, `phone`, `email`, `address`, `status`, `fkUserId`) VALUES
(3, 'Farzad Rahman', NULL, NULL, NULL, 'Network Engineer', 25000, '1731893442', 'farzad@gmail.com', '#R:05,#H:18', '1', 7),
(7, 'Sakib Rahman', NULL, NULL, NULL, 'Network Engineer', 25000, '1731893442', 'sakibtcl@gmail.com', '#R:05,#H:18', '1', 11);

-- --------------------------------------------------------

--
-- Table structure for table `emp_files`
--

CREATE TABLE `emp_files` (
  `fileId` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `path` varchar(255) NOT NULL,
  `clienId` int(11) NOT NULL,
  `uploadedBy` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `expenseId` int(11) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `cause` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `expenseType` varchar(50) DEFAULT NULL,
  `expenseFor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `internet_bill`
--

CREATE TABLE `internet_bill` (
  `billId` int(11) NOT NULL,
  `billdate` date DEFAULT NULL,
  `price` float DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  `fkclientId` int(11) NOT NULL,
  `receivedBy` int(11) DEFAULT NULL,
  `receiveDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `internet_bill`
--

INSERT INTO `internet_bill` (`billId`, `billdate`, `price`, `status`, `fkclientId`, `receivedBy`, `receiveDate`) VALUES
(1, '2018-12-12', 700, 'p', 1, 6, '2018-12-18'),
(2, '2018-10-02', 1300, 'ap', 2, NULL, NULL),
(3, '2019-01-02', 700, 'np', 1, NULL, NULL),
(4, '2019-01-02', 1300, 'np', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `internet_client`
--

CREATE TABLE `internet_client` (
  `clientId` int(11) NOT NULL,
  `clientFirstName` varchar(45) DEFAULT NULL,
  `clientLastName` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `ip` varchar(32) DEFAULT NULL,
  `bandWide` varchar(45) DEFAULT NULL,
  `bandwidthType` tinyint(3) DEFAULT NULL COMMENT '1=Real Ip,2=Share Ip,3=Dynamic Ip',
  `clientImage` varchar(255) DEFAULT NULL,
  `clientNID` varchar(20) DEFAULT NULL,
  `clientUserId` varchar(255) DEFAULT NULL,
  `clientUserPassword` varchar(255) DEFAULT NULL,
  `fkconnectionTypeId` int(11) DEFAULT NULL,
  `clientPassport` varchar(20) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `address` mediumtext,
  `fkpackageId` int(11) DEFAULT NULL,
  `cableLength` int(11) DEFAULT NULL,
  `conDate` date DEFAULT NULL,
  `clientStatus` int(11) DEFAULT NULL COMMENT '0=delete,1=inactive,2=active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `clientSerial` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `internet_client`
--

INSERT INTO `internet_client` (`clientId`, `clientFirstName`, `clientLastName`, `email`, `phone`, `ip`, `bandWide`, `bandwidthType`, `clientImage`, `clientNID`, `clientUserId`, `clientUserPassword`, `fkconnectionTypeId`, `clientPassport`, `price`, `address`, `fkpackageId`, `cableLength`, `conDate`, `clientStatus`, `created_at`, `clientSerial`) VALUES
(1, 'mortuza', 'arfan', 'mortuzaarfan@gmail.com', '01920216663', NULL, NULL, 2, NULL, NULL, NULL, NULL, 3, NULL, 700, '570*1hiufy', 1, 50, '2018-12-12', 2, '2018-12-15 05:14:45', 'arfan'),
(2, 'yousuf', 'khan', 'safgiahp@gmail.com', '01825178883', NULL, NULL, 1, NULL, NULL, NULL, NULL, 4, NULL, 1300, 'dfsagfadhdfsh', 1, 40, '2018-10-02', 2, '2018-12-15 05:18:13', '04yousuf');

-- --------------------------------------------------------

--
-- Table structure for table `isp_info`
--

CREATE TABLE `isp_info` (
  `id` int(11) NOT NULL,
  `companyTitle` varchar(300) DEFAULT NULL,
  `companyPhone1` varchar(20) DEFAULT NULL,
  `companyPhone2` varchar(20) DEFAULT NULL,
  `companyEmail` varchar(100) DEFAULT NULL,
  `companyAddress` mediumtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `isp_info`
--

INSERT INTO `isp_info` (`id`, `companyTitle`, `companyPhone1`, `companyPhone2`, `companyEmail`, `companyAddress`) VALUES
(1, 'ISP', '01900000', '01700000', 'isp@gmail.com', '#H : 10 , #R : 5 , Baridhara Dohs');

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `noticeId` int(11) NOT NULL,
  `clientId` int(11) NOT NULL,
  `clientTable` varchar(45) NOT NULL,
  `msg` mediumtext NOT NULL,
  `noticeType` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `noticeStatus` tinyint(3) NOT NULL COMMENT '0=deleted,1=pending,2=showing',
  `updated_at` date DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `packageId` int(11) NOT NULL,
  `packageName` varchar(128) NOT NULL,
  `bandwidth` varchar(128) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`packageId`, `packageName`, `bandwidth`, `price`) VALUES
(1, 'deluxx', '4mbps', 700),
(2, 'super delux', '6mbps', 800),
(14, 'test', '4mbps', 400);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `reportId` int(11) NOT NULL,
  `status` varchar(10) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `date` date DEFAULT NULL,
  `tabelId` int(11) DEFAULT NULL,
  `tableName` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`reportId`, `status`, `price`, `date`, `tabelId`, `tableName`) VALUES
(1, 'credit', 1300, '2018-10-02', 2, 'internet_bill');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` int(11) NOT NULL,
  `fkemployeeId` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`id`, `fkemployeeId`, `date`, `status`) VALUES
(1, 1, '2018-12-13', 'np'),
(2, 2, '2018-12-13', 'np'),
(3, 3, '2018-12-13', 'np'),
(4, 7, '2018-12-13', 'np'),
(5, 3, '2019-01-02', 'np'),
(6, 7, '2019-01-02', 'np');

-- --------------------------------------------------------

--
-- Table structure for table `sms_checkmonth`
--

CREATE TABLE `sms_checkmonth` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `type` tinyint(3) DEFAULT NULL COMMENT '1=invoiceSms;2=internetBillToPaySms;3=internetBillToPaySms',
  `deliveryStatus` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `fkusertype` varchar(11) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `name`, `email`, `password`, `phone`, `fkusertype`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 'Nasim', 'admin@gmail.com', '$2y$10$6ApbE2jvnHE.Bc2MZwZQ1.4dkVd9SA1SiSE6z3wJMTKhN1PqnH0vO', NULL, 'Admin', 'ots9208Mstcd9tyZK4eja0Bsd9T0gxAFmL9lLzaT8sPPEKKO8CRBgjvpjODy', '2018-12-04 08:28:25', '2018-11-07 02:51:51'),
(7, 'Farzad Rahman', 'farzad@gmail.com', '$2y$10$TL3MIpxbt2oRKaZwam1ZVutCkjdaJdb5wAcihRq5ph1nSOt0pypcG', '1731893442', 'InternetEmp', 'JQBjMHuaeUddLQmvQA5uwF8rbQwOxtBy9MtYhbxQlHt25CIlszdhbNa9I5bz', '2018-12-04 07:16:37', '2018-12-04 01:10:17'),
(11, 'Sakib Rahman', 'sakibtcl@gmail.com', '$2y$10$m6aaEGKCTos6R3JbQG9uVOH9cK9/XtrMHdQI0yFZ9t7XMesMjJm5e', '1731893442', 'Admin', NULL, '2018-12-11 01:11:13', '2018-12-11 01:11:13');

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `usertypeId` varchar(11) NOT NULL,
  `typename` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`usertypeId`, `typename`) VALUES
('Admin', 'admin'),
('CableEmp', 'Cable Employee'),
('InternetEmp', 'Internet Employee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cablepackage`
--
ALTER TABLE `cablepackage`
  ADD PRIMARY KEY (`cablepackageId`);

--
-- Indexes for table `cable_bill`
--
ALTER TABLE `cable_bill`
  ADD PRIMARY KEY (`billId`),
  ADD KEY `fkbill_clientId` (`fkclientId`);

--
-- Indexes for table `cable_client`
--
ALTER TABLE `cable_client`
  ADD PRIMARY KEY (`clientId`),
  ADD KEY `fkpageid_packageid` (`fkpackageId`);

--
-- Indexes for table `checkmonth`
--
ALTER TABLE `checkmonth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_files`
--
ALTER TABLE `client_files`
  ADD PRIMARY KEY (`fileId`);

--
-- Indexes for table `complain`
--
ALTER TABLE `complain`
  ADD PRIMARY KEY (`complainId`);

--
-- Indexes for table `connectiontype`
--
ALTER TABLE `connectiontype`
  ADD PRIMARY KEY (`connectionTypeId`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employeeId`);

--
-- Indexes for table `emp_files`
--
ALTER TABLE `emp_files`
  ADD PRIMARY KEY (`fileId`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`expenseId`);

--
-- Indexes for table `internet_bill`
--
ALTER TABLE `internet_bill`
  ADD PRIMARY KEY (`billId`),
  ADD KEY `fkbill_clientId` (`fkclientId`);

--
-- Indexes for table `internet_client`
--
ALTER TABLE `internet_client`
  ADD PRIMARY KEY (`clientId`),
  ADD KEY `fkpageid_packageid` (`fkpackageId`);

--
-- Indexes for table `isp_info`
--
ALTER TABLE `isp_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`noticeId`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`packageId`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`reportId`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_checkmonth`
--
ALTER TABLE `sms_checkmonth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`),
  ADD KEY `fkusertype_userId` (`fkusertype`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`usertypeId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cablepackage`
--
ALTER TABLE `cablepackage`
  MODIFY `cablepackageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cable_bill`
--
ALTER TABLE `cable_bill`
  MODIFY `billId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cable_client`
--
ALTER TABLE `cable_client`
  MODIFY `clientId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1094;

--
-- AUTO_INCREMENT for table `checkmonth`
--
ALTER TABLE `checkmonth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `client_files`
--
ALTER TABLE `client_files`
  MODIFY `fileId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `complain`
--
ALTER TABLE `complain`
  MODIFY `complainId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `connectiontype`
--
ALTER TABLE `connectiontype`
  MODIFY `connectionTypeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employeeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `emp_files`
--
ALTER TABLE `emp_files`
  MODIFY `fileId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `expenseId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `internet_bill`
--
ALTER TABLE `internet_bill`
  MODIFY `billId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `internet_client`
--
ALTER TABLE `internet_client`
  MODIFY `clientId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `isp_info`
--
ALTER TABLE `isp_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `noticeId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `packageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `reportId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sms_checkmonth`
--
ALTER TABLE `sms_checkmonth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cable_client`
--
ALTER TABLE `cable_client`
  ADD CONSTRAINT `fkcablePackage` FOREIGN KEY (`fkpackageId`) REFERENCES `cablepackage` (`cablepackageId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `internet_bill`
--
ALTER TABLE `internet_bill`
  ADD CONSTRAINT `fkbill_clientId` FOREIGN KEY (`fkclientId`) REFERENCES `internet_client` (`clientId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `internet_client`
--
ALTER TABLE `internet_client`
  ADD CONSTRAINT `fkpageid_packageid` FOREIGN KEY (`fkpackageId`) REFERENCES `package` (`packageId`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fkUserTypeId` FOREIGN KEY (`fkusertype`) REFERENCES `usertype` (`usertypeId`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
