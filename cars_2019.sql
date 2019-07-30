-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2019 at 05:54 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cars_2019`
--

-- --------------------------------------------------------

--
-- Table structure for table `in_cars`
--

CREATE TABLE `in_cars` (
  `cars_id` int(11) NOT NULL COMMENT 'ไอดีรถ',
  `brand` varchar(10) NOT NULL COMMENT 'ยี่ห้อรถ',
  `model` varchar(10) NOT NULL COMMENT 'รุ่นของรถ',
  `years` int(11) NOT NULL COMMENT 'ปีที่ผลิต',
  `colour` varchar(10) NOT NULL COMMENT 'สีตัวถัง',
  `colour_code` varchar(7) NOT NULL COMMENT 'รหัสสีตัวถัง',
  `type` int(11) NOT NULL COMMENT 'ประเภทรถ',
  `country` int(11) NOT NULL COMMENT 'ประเทศที่ผลิต',
  `engine` int(11) NOT NULL COMMENT 'ขนาดเครื่องยนต์',
  `price` bigint(20) NOT NULL COMMENT 'ราคา',
  `createdate` datetime NOT NULL COMMENT 'วันที่ผลิต',
  `updatedate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'วันที่เปลี่ยนแปลง',
  `car_img` varchar(255) NOT NULL COMMENT 'รูปภาพ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `in_cars`
--

INSERT INTO `in_cars` (`cars_id`, `brand`, `model`, `years`, `colour`, `colour_code`, `type`, `country`, `engine`, `price`, `createdate`, `updatedate`, `car_img`) VALUES
(1, '4', 'MU-X', 1996, 'Silver', '#C0C0C', 1, 2, 3000, 1900000, '2019-06-26 11:39:00', '2019-07-26 03:58:27', 'car.jpg'),
(2, '1', 'CR-V', 2003, 'Bronze', '#faf0be', 1, 4, 1800, 800000, '2019-06-26 11:39:00', '2019-07-05 03:41:13', ''),
(3, '4', 'YARIS', 2019, 'Red', '#db0824', 1, 1, 1500, 600000, '2019-06-26 11:39:00', '2019-07-24 09:34:30', 'download.png'),
(4, '1', 'JAZZ', 2017, 'Black', '#000000', 1, 1, 1500, 650000, '2019-06-26 11:39:00', '2019-07-04 10:25:37', ''),
(5, '3', 'REVO', 2018, 'Black', '#110000', 2, 1, 2000, 900000, '2019-06-26 11:39:00', '2019-07-05 03:42:35', ''),
(27, '3', 'Phantom', 1996, 'black', '#000000', 3, 1, 3000, 900000, '2019-07-26 11:11:59', '2019-07-26 04:11:59', 'car.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `in_cars_brand`
--

CREATE TABLE `in_cars_brand` (
  `cb_id` int(11) NOT NULL,
  `cb_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `in_cars_brand`
--

INSERT INTO `in_cars_brand` (`cb_id`, `cb_name`) VALUES
(1, 'HONDA'),
(2, 'ISUZU'),
(3, 'TOYOTA'),
(4, 'FORD');

-- --------------------------------------------------------

--
-- Table structure for table `in_cars_country`
--

CREATE TABLE `in_cars_country` (
  `cc_id` int(11) NOT NULL,
  `cc_name` varchar(50) NOT NULL,
  `createdate` datetime NOT NULL,
  `updatedate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `in_cars_country`
--

INSERT INTO `in_cars_country` (`cc_id`, `cc_name`, `createdate`, `updatedate`) VALUES
(1, 'Japanese', '0000-00-00 00:00:00', '2019-07-09 09:55:18'),
(2, 'EUROPE', '0000-00-00 00:00:00', '2019-07-03 03:41:16'),
(3, 'Thailand', '0000-00-00 00:00:00', '2019-07-03 03:42:02'),
(4, 'China', '0000-00-00 00:00:00', '2019-07-03 03:42:02'),
(5, 'U.S.A', '0000-00-00 00:00:00', '2019-07-03 03:42:02'),
(6, 'England', '0000-00-00 00:00:00', '2019-07-05 07:51:04');

-- --------------------------------------------------------

--
-- Table structure for table `in_cars_type`
--

CREATE TABLE `in_cars_type` (
  `ct_id` int(11) NOT NULL,
  `ct_name` varchar(250) NOT NULL,
  `createdate` datetime NOT NULL,
  `updatedate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `in_cars_type`
--

INSERT INTO `in_cars_type` (`ct_id`, `ct_name`, `createdate`, `updatedate`) VALUES
(1, 'รถยนต์นั่งขนาดเล็ก', '0000-00-00 00:00:00', '2019-07-09 09:24:36'),
(2, 'รถกระบะขนาดกลาง', '0000-00-00 00:00:00', '2019-07-09 09:25:14'),
(3, 'รถยนต์อเนกประสงค์สมรรถนะสูงขนาดกลาง', '0000-00-00 00:00:00', '2019-07-03 03:43:37'),
(4, 'รถจักรยานยนต์', '0000-00-00 00:00:00', '2019-07-03 03:43:37'),
(5, 'รถสปอร์ต', '0000-00-00 00:00:00', '2019-07-03 03:43:37'),
(7, 'รถยนต์กากๆ', '0000-00-00 00:00:00', '2019-07-05 07:23:25');

-- --------------------------------------------------------

--
-- Table structure for table `in_mydata`
--

CREATE TABLE `in_mydata` (
  `md_id` int(11) NOT NULL,
  `md_text` varchar(500) NOT NULL,
  `md_info` varchar(500) NOT NULL,
  `md_record` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `in_mydata`
--

INSERT INTO `in_mydata` (`md_id`, `md_text`, `md_info`, `md_record`) VALUES
(15, 'com', 'qwqw', '2019-06-28 06:35:41'),
(17, 'com', 'roj', '2019-06-28 08:54:51'),
(18, 'wannapon', 'roj', '2019-06-28 08:55:00'),
(19, 'roj', '', '2019-06-28 08:55:05'),
(20, 'edit', 'damn', '2019-07-04 08:42:12'),
(23, 're', 'erer', '2019-07-08 09:51:46'),
(24, 'wewewe', 'Com', '2019-07-09 03:58:17');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `UserID` int(3) UNSIGNED ZEROFILL NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Status` enum('ADMIN','USER') NOT NULL DEFAULT 'USER'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`UserID`, `Username`, `Password`, `Name`, `Status`) VALUES
(001, '111', 'bcbe3365e6ac95ea2c0343a2395834dd', 'Wannapon', 'ADMIN'),
(003, 'com', 'com', 'com', 'ADMIN'),
(007, 'qwer', 'd41d8cd98f00b204e9800998ecf8427e', 'comcam', 'ADMIN'),
(008, 'test', '81dc9bdb52d04dc20036dbd8313ed055', '', 'ADMIN'),
(009, 'pump', '81dc9bdb52d04dc20036dbd8313ed055', '', 'ADMIN'),
(010, 'pass', '692535680f5664b3b781e13cad68c514', 'pass', 'ADMIN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `in_cars`
--
ALTER TABLE `in_cars`
  ADD PRIMARY KEY (`cars_id`);

--
-- Indexes for table `in_cars_brand`
--
ALTER TABLE `in_cars_brand`
  ADD PRIMARY KEY (`cb_id`);

--
-- Indexes for table `in_cars_country`
--
ALTER TABLE `in_cars_country`
  ADD PRIMARY KEY (`cc_id`);

--
-- Indexes for table `in_cars_type`
--
ALTER TABLE `in_cars_type`
  ADD PRIMARY KEY (`ct_id`);

--
-- Indexes for table `in_mydata`
--
ALTER TABLE `in_mydata`
  ADD PRIMARY KEY (`md_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `in_cars`
--
ALTER TABLE `in_cars`
  MODIFY `cars_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ไอดีรถ', AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `in_cars_brand`
--
ALTER TABLE `in_cars_brand`
  MODIFY `cb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `in_cars_country`
--
ALTER TABLE `in_cars_country`
  MODIFY `cc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `in_cars_type`
--
ALTER TABLE `in_cars_type`
  MODIFY `ct_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `in_mydata`
--
ALTER TABLE `in_mydata`
  MODIFY `md_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `UserID` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
