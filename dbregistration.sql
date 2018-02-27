-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2018 at 12:06 PM
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
-- Database: `dbregistration`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblgender`
--

CREATE TABLE `tblgender` (
  `ID` int(11) NOT NULL,
  `gender` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblgender`
--

INSERT INTO `tblgender` (`ID`, `gender`) VALUES
(1, 'female'),
(2, 'male');

-- --------------------------------------------------------

--
-- Table structure for table `tblstatus`
--

CREATE TABLE `tblstatus` (
  `ID` int(11) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstatus`
--

INSERT INTO `tblstatus` (`ID`, `status`) VALUES
(1, 'registered'),
(2, 'archive');

-- --------------------------------------------------------

--
-- Table structure for table `tbltypes`
--

CREATE TABLE `tbltypes` (
  `ID` int(11) NOT NULL,
  `type` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbltypes`
--

INSERT INTO `tbltypes` (`ID`, `type`) VALUES
(1, 'car'),
(2, 'jeepney'),
(3, 'motorcycle'),
(4, 'SUV'),
(5, 'tricycle'),
(6, 'truck'),
(7, 'van'),
(8, 'owner');

-- --------------------------------------------------------

--
-- Table structure for table `tblvehicles`
--

CREATE TABLE `tblvehicles` (
  `ID` int(11) NOT NULL,
  `owner_fn` varchar(50) NOT NULL,
  `owner_mi` varchar(11) NOT NULL,
  `owner_ln` varchar(50) NOT NULL,
  `owner_age` int(11) NOT NULL,
  `gender_id` int(2) NOT NULL,
  `type_id` int(11) NOT NULL,
  `plate_number` varchar(6) NOT NULL,
  `registered_at` date NOT NULL,
  `status_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblvehicles`
--

INSERT INTO `tblvehicles` (`ID`, `owner_fn`, `owner_mi`, `owner_ln`, `owner_age`, `gender_id`, `type_id`, `plate_number`, `registered_at`, `status_id`) VALUES
(1, 'Leigh Angelique', 'S.', 'Navarro', 21, 1, 6, 'NEW124', '2018-02-24', 1),
(2, 'Kenneth', 'I.', 'Dimaculangan', 20, 2, 1, 'DOY123', '2018-02-15', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblgender`
--
ALTER TABLE `tblgender`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblstatus`
--
ALTER TABLE `tblstatus`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbltypes`
--
ALTER TABLE `tbltypes`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblvehicles`
--
ALTER TABLE `tblvehicles`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblgender`
--
ALTER TABLE `tblgender`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblstatus`
--
ALTER TABLE `tblstatus`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbltypes`
--
ALTER TABLE `tbltypes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblvehicles`
--
ALTER TABLE `tblvehicles`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
