
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `airlinedb`
--
USE `airlinedb`;

CREATE TABLE IF NOT EXISTS `customers` (
  `customerId` INT(7) NOT NULL,
  `firstName` VARCHAR(30) NOT NULL,
  `lastName` VARCHAR(30) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS `flight` (
  `flightId` INT(7) NOT NULL,
  `origin` VARCHAR(30) NOT NULL,
  `destination` VARCHAR(30) NOT NULL,
  `departureDateTime` DATETIME,
  `arrivalDateTime` DATETIME,
  `distance` INT(7), -- In KM?
  `passengerCapacity` INT(3)
);

CREATE TABLE IF NOT EXISTS `bookingReference` (

)