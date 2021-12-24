-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2021 at 03:28 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carevoid`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `staffID` int(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(12) NOT NULL,
  `centreName` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`staffID`, `username`, `fullname`, `email`, `password`, `centreName`, `address`) VALUES
(4, 'yoga', 'Yoga Kun', 'yogakun@mail.com', '1', 'Sanglah', 'Denpasar'),
(5, 'cledwin', 'cledwin', 'cledwin@mail', '1', 'Surya', 'Gianyar'),
(6, 'Dion', 'Dion Apalem', 'dion@mail.com', '1', 'Prima', 'Jimbaran'),
(7, 'Angga', 'Angga', 'angga@mail', '1', 'Bross', 'Denpasar');

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `batchNo` int(50) NOT NULL,
  `expireDate` varchar(50) NOT NULL,
  `quantityAvailable` int(11) NOT NULL,
  `quantityAdministered` int(11) NOT NULL,
  `vaccineID` int(11) NOT NULL,
  `centreName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`batchNo`, `expireDate`, `quantityAvailable`, `quantityAdministered`, `vaccineID`, `centreName`) VALUES
(18, '2021-12-23', 400, 352, 2, 'Sanglah'),
(20, '2021-12-31', 225, 456, 3, 'Surya'),
(21, '2021-12-20', 400, 200, 2, 'Sanglah'),
(23, '21-01-2022', 500, 225, 2, 'Bross '),
(24, '23-02-2022', 225, 225, 3, 'Prima'),
(26, '2021-12-12', 225, 275, 3, 'Sanglah');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `icpassport` int(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`icpassport`, `username`, `fullname`, `email`, `password`) VALUES
(1, 'Win', 'Win-Kun', 'win@isekai', '1'),
(5, 'some', 'some', 'some@m', '2');

-- --------------------------------------------------------

--
-- Table structure for table `vaccination`
--

CREATE TABLE `vaccination` (
  `vaccinationID` int(11) NOT NULL,
  `appointmentDate` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  `batchNo` int(50) NOT NULL,
  `patientName` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vaccination`
--

INSERT INTO `vaccination` (`vaccinationID`, `appointmentDate`, `status`, `remarks`, `batchNo`, `patientName`) VALUES
(26, '2021-12-11', 'Rejected.', 'request', 18, 'some'),
(27, '2021-12-14', 'Confirmed.', 'ijininin dong', 21, 'some');

-- --------------------------------------------------------

--
-- Table structure for table `vaccines`
--

CREATE TABLE `vaccines` (
  `vaccineID` int(11) NOT NULL,
  `vaccineName` varchar(50) NOT NULL,
  `manufacturer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vaccines`
--

INSERT INTO `vaccines` (`vaccineID`, `vaccineName`, `manufacturer`) VALUES
(1, 'Pfizer', 'PT. BiOnTech, Tbk.'),
(2, 'Sinovac', 'PT. LePharmaChy, Tbk.'),
(3, 'Moderna', 'PT. Kimia Farma, Tbk.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`staffID`);

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`batchNo`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`icpassport`);

--
-- Indexes for table `vaccination`
--
ALTER TABLE `vaccination`
  ADD PRIMARY KEY (`vaccinationID`);

--
-- Indexes for table `vaccines`
--
ALTER TABLE `vaccines`
  ADD PRIMARY KEY (`vaccineID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `staffID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `batchNo` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `icpassport` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vaccination`
--
ALTER TABLE `vaccination`
  MODIFY `vaccinationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `vaccines`
--
ALTER TABLE `vaccines`
  MODIFY `vaccineID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
