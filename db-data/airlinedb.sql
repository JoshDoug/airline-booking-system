-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Mar 29, 2018 at 04:55 PM
-- Server version: 10.2.12-MariaDB-10.2.12+maria~jessie
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `airlinedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `adminId` int(10) NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstName` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `companyEmail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookingReference` varchar(10) NOT NULL,
  `customerId` int(7) NOT NULL,
  `flightId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerId` int(7) NOT NULL,
  `firstName` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Flight`
--

CREATE TABLE `flight` (
  `flightId` int(10) NOT NULL,
  `departurePoint` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destination` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `departureTime` time NOT NULL,
  `day` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` time NOT NULL,
  `type` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `flightType`
--

CREATE TABLE `flightType` (
  `flightTypeId` int(10) NOT NULL,
  `departurePoint` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destination` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departureTime` time NOT NULL,
  `duration` time NOT NULL,
  `day` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `flightType`
--

INSERT INTO `flightType` (`flightTypeId`, `departurePoint`, `destination`, `departureTime`, `duration`, `day`, `type`) VALUES
(1, 'Stansted', 'Manchester', '08:30:00', '01:00:00', 'Monday', 'Domestic'),
(2, 'Stansted', 'Manchester', '08:30:00', '01:00:00', 'Tuesday', 'Domestic'),
(3, 'Stansted', 'Manchester', '08:30:00', '01:00:00', 'Wednesday', 'Domestic'),
(4, 'Stansted', 'Manchester', '08:30:00', '01:00:00', 'Thursday', 'Domestic'),
(5, 'Stansted', 'Manchester', '08:30:00', '01:00:00', 'Friday', 'Domestic'),
(6, 'Stansted', 'Manchester', '08:30:00', '01:00:00', 'Saturday', 'Domestic'),
(7, 'Stansted', 'Manchester', '08:30:00', '01:00:00', 'Sunday', 'Domestic'),
(8, 'Stansted', 'Glasgow', '08:30:00', '01:00:00', 'Monday', 'Domestic'),
(9, 'Stansted', 'Glasgow', '08:30:00', '01:00:00', 'Tuesday', 'Domestic'),
(10, 'Stansted', 'Glasgow', '08:30:00', '01:00:00', 'Wednesday', 'Domestic'),
(11, 'Stansted', 'Glasgow', '08:30:00', '01:00:00', 'Thursday', 'Domestic'),
(12, 'Stansted', 'Glasgow', '08:30:00', '01:00:00', 'Friday', 'Domestic'),
(13, 'Stansted', 'Glasgow', '08:30:00', '01:00:00', 'Saturday', 'Domestic'),
(14, 'Stansted', 'Glasgow', '08:30:00', '01:00:00', 'Sunday', 'Domestic'),
(15, 'Stansted', 'Dublin', '08:30:00', '01:20:00', 'Monday', 'Domestic'),
(16, 'Stansted', 'Dublin', '08:30:00', '01:20:00', 'Tuesday', 'Domestic'),
(17, 'Stansted', 'Dublin', '08:30:00', '01:20:00', 'Wednesday', 'Domestic'),
(18, 'Stansted', 'Dublin', '08:30:00', '01:20:00', 'Thursday', 'Domestic'),
(19, 'Stansted', 'Dublin', '08:30:00', '01:20:00', 'Friday', 'Domestic'),
(20, 'Stansted', 'Dublin', '08:30:00', '01:20:00', 'Saturday', 'Domestic'),
(21, 'Stansted', 'Dublin', '08:30:00', '01:20:00', 'Sunday', 'Domestic'),
(22, 'Manchester', 'Stansted', '18:00:00', '01:00:00', 'Monday', 'Domestic'),
(23, 'Manchester', 'Stansted', '18:00:00', '01:00:00', 'Tuesday', 'Domestic'),
(24, 'Manchester', 'Stansted', '18:00:00', '01:00:00', 'Wednesday', 'Domestic'),
(25, 'Manchester', 'Stansted', '18:00:00', '01:00:00', 'Thursday', 'Domestic'),
(26, 'Manchester', 'Stansted', '18:00:00', '01:00:00', 'Friday', 'Domestic'),
(27, 'Manchester', 'Stansted', '18:00:00', '01:00:00', 'Saturday', 'Domestic'),
(28, 'Manchester', 'Stansted', '18:00:00', '01:00:00', 'Sunday', 'Domestic'),
(29, 'Glasgow', 'Stansted', '18:00:00', '01:00:00', 'Monday', 'Domestic'),
(30, 'Glasgow', 'Stansted', '18:00:00', '01:00:00', 'Tuesday', 'Domestic'),
(31, 'Glasgow', 'Stansted', '18:00:00', '01:00:00', 'Wednesday', 'Domestic'),
(32, 'Glasgow', 'Stansted', '18:00:00', '01:00:00', 'Thursday', 'Domestic'),
(33, 'Glasgow', 'Stansted', '18:00:00', '01:00:00', 'Friday', 'Domestic'),
(34, 'Glasgow', 'Stansted', '18:00:00', '01:00:00', 'Saturday', 'Domestic'),
(35, 'Glasgow', 'Stansted', '18:00:00', '01:00:00', 'Sunday', 'Domestic'),
(36, 'Dublin', 'Stansted', '18:00:00', '01:20:00', 'Monday', 'Domestic'),
(37, 'Dublin', 'Stansted', '18:00:00', '01:20:00', 'Tuesday', 'Domestic'),
(38, 'Dublin', 'Stansted', '18:00:00', '01:20:00', 'Wednesday', 'Domestic'),
(39, 'Dublin', 'Stansted', '18:00:00', '01:20:00', 'Thursday', 'Domestic'),
(40, 'Dublin', 'Stansted', '18:00:00', '01:20:00', 'Friday', 'Domestic'),
(41, 'Dublin', 'Stansted', '18:00:00', '01:20:00', 'Saturday', 'Domestic'),
(42, 'Dublin', 'Stansted', '18:00:00', '01:20:00', 'Sunday', 'Domestic'),
(43, 'Stansted', 'Paris', '08:00:00', '01:15:00', 'Monday', 'Europe'),
(44, 'Stansted', 'Paris', '08:00:00', '01:15:00', 'Wednesday', 'Europe'),
(45, 'Stansted', 'Paris', '08:00:00', '01:15:00', 'Friday', 'Europe'),
(46, 'Paris', 'Stansted', '18:00:00', '01:15:00', 'Tuesday', 'Europe'),
(47, 'Paris', 'Stansted', '18:00:00', '01:15:00', 'Thursday', 'Europe'),
(48, 'Paris', 'Stansted', '18:00:00', '01:15:00', 'Friday', 'Europe'),
(49, 'Stansted', 'Madrid', '08:00:00', '02:00:00', 'Monday', 'Europe'),
(50, 'Stansted', 'Madrid', '08:00:00', '02:00:00', 'Wednesday', 'Europe'),
(51, 'Stansted', 'Madrid', '08:00:00', '02:00:00', 'Friday', 'Europe'),
(52, 'Madrid', 'Stansted', '18:00:00', '02:00:00', 'Tuesday', 'Europe'),
(53, 'Madrid', 'Stansted', '18:00:00', '02:00:00', 'Thursday', 'Europe'),
(54, 'Madrid', 'Stansted', '18:00:00', '02:00:00', 'Friday', 'Europe'),
(55, 'Stansted', 'Brussels', '08:00:00', '01:20:00', 'Monday', 'Europe'),
(56, 'Stansted', 'Brussels', '08:00:00', '01:20:00', 'Wednesday', 'Europe'),
(57, 'Stansted', 'Brussels', '08:00:00', '01:20:00', 'Friday', 'Europe'),
(58, 'Brussels', 'Stansted', '18:00:00', '01:20:00', 'Tuesday', 'Europe'),
(59, 'Brussels', 'Stansted', '18:00:00', '01:20:00', 'Thursday', 'Europe'),
(60, 'Brussels', 'Stansted', '18:00:00', '01:20:00', 'Friday', 'Europe');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `locationName` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`locationName`) VALUES
('Brussels'),
('Dublin'),
('Glasgow'),
('Madrid'),
('Manchester'),
('Paris'),
('Stansted');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`adminId`),
  ADD UNIQUE KEY `companyEmail` (`companyEmail`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingReference`),
  ADD KEY `customerId` (`customerId`),
  ADD KEY `flightId` (`flightId`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerId`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `Flight`
--
ALTER TABLE `flight`
  ADD PRIMARY KEY (`departurePoint`,`destination`,`date`,`departureTime`),
  ADD UNIQUE KEY `flightId` (`flightId`);

--
-- Indexes for table `flightType`
--
ALTER TABLE `flightType`
  ADD PRIMARY KEY (`departurePoint`, `destination`, `departureTime`, `day`),
  ADD KEY `destination` (`destination`),
  ADD KEY `departurePoint` (`departurePoint`),
  ADD UNIQUE KEY `flightTypeId` (`flightTypeId`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`locationName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `adminId` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bookingReference` varchar(10) NOT NULL;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerId` int(7) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Flight`
--
ALTER TABLE `flight`
  MODIFY `flightId` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `FlightType`
--
ALTER TABLE `flightType`
  MODIFY `flightTypeId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`customerId`) REFERENCES `customer` (`customerId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`flightId`) REFERENCES `flight` (`flightId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `flightType`
--
ALTER TABLE `flightType`
  ADD CONSTRAINT `flightType_ibfk_1` FOREIGN KEY (`departurePoint`) REFERENCES `location` (`locationName`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `flightType_ibfk_2` FOREIGN KEY (`destination`) REFERENCES `location` (`locationName`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
