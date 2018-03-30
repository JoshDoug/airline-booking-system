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
  `bookingReference` int(10) NOT NULL,
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

INSERT INTO `flightType` (`departurePoint`, `destination`, `departureTime`, `duration`, `day`, `type`) VALUES
('Stansted', 'Manchester', '08:30:00', '01:00:00', 'Monday', 'Domestic'),
('Stansted', 'Manchester', '08:30:00', '01:00:00', 'Tuesday', 'Domestic'),
('Stansted', 'Manchester', '08:30:00', '01:00:00', 'Wednesday', 'Domestic'),
('Stansted', 'Manchester', '08:30:00', '01:00:00', 'Thursday', 'Domestic'),
('Stansted', 'Manchester', '08:30:00', '01:00:00', 'Friday', 'Domestic'),
('Stansted', 'Manchester', '08:30:00', '01:00:00', 'Saturday', 'Domestic'),
('Stansted', 'Manchester', '08:30:00', '01:00:00', 'Sunday', 'Domestic'),
('Stansted', 'Glasgow', '08:30:00', '01:00:00', 'Monday', 'Domestic'),
('Stansted', 'Glasgow', '08:30:00', '01:00:00', 'Tuesday', 'Domestic'),
('Stansted', 'Glasgow', '08:30:00', '01:00:00', 'Wednesday', 'Domestic'),
('Stansted', 'Glasgow', '08:30:00', '01:00:00', 'Thursday', 'Domestic'),
('Stansted', 'Glasgow', '08:30:00', '01:00:00', 'Friday', 'Domestic'),
('Stansted', 'Glasgow', '08:30:00', '01:00:00', 'Saturday', 'Domestic'),
('Stansted', 'Glasgow', '08:30:00', '01:00:00', 'Sunday', 'Domestic'),
('Stansted', 'Dublin', '08:30:00', '01:20:00', 'Monday', 'Domestic'),
('Stansted', 'Dublin', '08:30:00', '01:20:00', 'Tuesday', 'Domestic'),
('Stansted', 'Dublin', '08:30:00', '01:20:00', 'Wednesday', 'Domestic'),
('Stansted', 'Dublin', '08:30:00', '01:20:00', 'Thursday', 'Domestic'),
('Stansted', 'Dublin', '08:30:00', '01:20:00', 'Friday', 'Domestic'),
('Stansted', 'Dublin', '08:30:00', '01:20:00', 'Saturday', 'Domestic'),
('Stansted', 'Dublin', '08:30:00', '01:20:00', 'Sunday', 'Domestic'),
('Manchester', 'Stansted', '18:00:00', '01:00:00', 'Monday', 'Domestic'),
('Manchester', 'Stansted', '18:00:00', '01:00:00', 'Tuesday', 'Domestic'),
('Manchester', 'Stansted', '18:00:00', '01:00:00', 'Wednesday', 'Domestic'),
('Manchester', 'Stansted', '18:00:00', '01:00:00', 'Thursday', 'Domestic'),
('Manchester', 'Stansted', '18:00:00', '01:00:00', 'Friday', 'Domestic'),
('Manchester', 'Stansted', '18:00:00', '01:00:00', 'Saturday', 'Domestic'),
('Manchester', 'Stansted', '18:00:00', '01:00:00', 'Sunday', 'Domestic'),
('Glasgow', 'Stansted', '18:00:00', '01:00:00', 'Monday', 'Domestic'),
('Glasgow', 'Stansted', '18:00:00', '01:00:00', 'Tuesday', 'Domestic'),
('Glasgow', 'Stansted', '18:00:00', '01:00:00', 'Wednesday', 'Domestic'),
('Glasgow', 'Stansted', '18:00:00', '01:00:00', 'Thursday', 'Domestic'),
('Glasgow', 'Stansted', '18:00:00', '01:00:00', 'Friday', 'Domestic'),
('Glasgow', 'Stansted', '18:00:00', '01:00:00', 'Saturday', 'Domestic'),
('Glasgow', 'Stansted', '18:00:00', '01:00:00', 'Sunday', 'Domestic'),
('Dublin', 'Stansted', '18:00:00', '01:20:00', 'Monday', 'Domestic'),
('Dublin', 'Stansted', '18:00:00', '01:20:00', 'Tuesday', 'Domestic'),
('Dublin', 'Stansted', '18:00:00', '01:20:00', 'Wednesday', 'Domestic'),
('Dublin', 'Stansted', '18:00:00', '01:20:00', 'Thursday', 'Domestic'),
('Dublin', 'Stansted', '18:00:00', '01:20:00', 'Friday', 'Domestic'),
('Dublin', 'Stansted', '18:00:00', '01:20:00', 'Saturday', 'Domestic'),
('Dublin', 'Stansted', '18:00:00', '01:20:00', 'Sunday', 'Domestic'),
('Stansted', 'Paris', '08:00:00', '01:15:00', 'Monday', 'Europe'),
('Stansted', 'Paris', '08:00:00', '01:15:00', 'Wednesday', 'Europe'),
('Stansted', 'Paris', '08:00:00', '01:15:00', 'Friday', 'Europe'),
('Paris', 'Stansted', '18:00:00', '01:15:00', 'Tuesday', 'Europe'),
('Paris', 'Stansted', '18:00:00', '01:15:00', 'Thursday', 'Europe'),
('Paris', 'Stansted', '18:00:00', '01:15:00', 'Friday', 'Europe'),
('Stansted', 'Madrid', '08:00:00', '02:00:00', 'Monday', 'Europe'),
('Stansted', 'Madrid', '08:00:00', '02:00:00', 'Wednesday', 'Europe'),
('Stansted', 'Madrid', '08:00:00', '02:00:00', 'Friday', 'Europe'),
('Madrid', 'Stansted', '18:00:00', '02:00:00', 'Tuesday', 'Europe'),
('Madrid', 'Stansted', '18:00:00', '02:00:00', 'Thursday', 'Europe'),
('Madrid', 'Stansted', '18:00:00', '02:00:00', 'Friday', 'Europe'),
('Stansted', 'Brussels', '08:00:00', '01:20:00', 'Monday', 'Europe'),
('Stansted', 'Brussels', '08:00:00', '01:20:00', 'Wednesday', 'Europe'),
('Stansted', 'Brussels', '08:00:00', '01:20:00', 'Friday', 'Europe'),
('Brussels', 'Stansted', '18:00:00', '01:20:00', 'Tuesday', 'Europe'),
('Brussels', 'Stansted', '18:00:00', '01:20:00', 'Thursday', 'Europe'),
('Brussels', 'Stansted', '18:00:00', '01:20:00', 'Friday', 'Europe');

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
  ADD KEY `departurePoint` (`departurePoint`);

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
  MODIFY `bookingReference` int(10) NOT NULL AUTO_INCREMENT;

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
