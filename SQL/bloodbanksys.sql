-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Feb 05, 2021 at 03:09 AM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bloodbanksys`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `AdminID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Phone_Number` varchar(15) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  PRIMARY KEY (`AdminID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminID`, `Name`, `Email`, `Phone_Number`, `Password`, `Gender`) VALUES
(1, 'Jaskeerat', 'jaskeerat@gmail.com', '01111390398', 'jaskeerat', 'Male'),
(2, 'Karanjit', 'kuran@gmail.com', '01111370789', 'jas', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
CREATE TABLE IF NOT EXISTS `appointment` (
  `AppointmentID` int(11) NOT NULL AUTO_INCREMENT,
  `DonorID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `Time` varchar(50) NOT NULL,
  `Status` varchar(50) NOT NULL,
  PRIMARY KEY (`AppointmentID`),
  KEY `DonorID` (`DonorID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bloodinventory`
--

DROP TABLE IF EXISTS `bloodinventory`;
CREATE TABLE IF NOT EXISTS `bloodinventory` (
  `BloodID` int(11) NOT NULL AUTO_INCREMENT,
  `DonorID` int(11) NOT NULL,
  `Blood_Group` varchar(50) NOT NULL,
  `Expiry_Date` varchar(50) NOT NULL,
  PRIMARY KEY (`BloodID`),
  KEY `DonorID` (`DonorID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bloodinventory`
--

INSERT INTO `bloodinventory` (`BloodID`, `DonorID`, `Blood_Group`, `Expiry_Date`) VALUES
(4, 1, 'A', '2/1/2021'),
(5, 1, 'A', '2/1/2021');

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

DROP TABLE IF EXISTS `donor`;
CREATE TABLE IF NOT EXISTS `donor` (
  `DonorID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Confirm_password` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Age` int(11) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `Blood_Group` varchar(50) NOT NULL,
  PRIMARY KEY (`DonorID`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`DonorID`, `Name`, `Email`, `Phone`, `Password`, `Confirm_password`, `Address`, `Age`, `Gender`, `Blood_Group`) VALUES
(1, 'test', 'test', '0123456789', 'test', 'test', 'test', 18, 'Male', 'B'),
(2, 'kiro', 'kiro', '012312313', 'kiro', 'kiro', 'kiro', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

DROP TABLE IF EXISTS `register`;
CREATE TABLE IF NOT EXISTS `register` (
  `StaffID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `mobile` int(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password_1` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  PRIMARY KEY (`StaffID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`StaffID`, `username`, `first_name`, `last_name`, `mobile`, `email`, `password_1`, `address`, `gender`) VALUES
(1, 'abc', 'a', 'b', 123, 'abc@gmail.com', '202cb962ac59075b964b07152d234b70', '', ''),
(2, 'frpartho', 'Partho', 'Bala', 1686998128, 'parthobala019@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'jalan 111', 'Male'),
(3, 'TEST', 'Test', 'Ting', 162285085, 'test@mail.com', '81dc9bdb52d04dc20036dbd8313ed055', '', ''),
(4, 'vincent135', 'Vincent', 'Tan', 183791699, 'vincent135@gmail.com', 'd1a8a23ea61bcf5a1527e2be74994b78', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE IF NOT EXISTS `test` (
  `TestID` int(11) NOT NULL AUTO_INCREMENT,
  `BloodID` int(11) NOT NULL,
  `Result` varchar(255) NOT NULL,
  PRIMARY KEY (`TestID`),
  KEY `BloodID` (`BloodID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`TestID`, `BloodID`, `Result`) VALUES
(1, 4, 'Pass');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`DonorID`) REFERENCES `donor` (`DonorID`);

--
-- Constraints for table `bloodinventory`
--
ALTER TABLE `bloodinventory`
  ADD CONSTRAINT `bloodinventory_ibfk_1` FOREIGN KEY (`DonorID`) REFERENCES `donor` (`DonorID`);

--
-- Constraints for table `test`
--
ALTER TABLE `test`
  ADD CONSTRAINT `test_ibfk_1` FOREIGN KEY (`BloodID`) REFERENCES `bloodinventory` (`BloodID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
