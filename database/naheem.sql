-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2024 at 11:45 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `naheem`
--

-- --------------------------------------------------------

--
-- Table structure for table `car_info`
--

CREATE TABLE `car_info` (
  `car_ID` int(11) NOT NULL,
  `Owner_Surname` varchar(30) NOT NULL,
  `Owner_Firstname` varchar(30) NOT NULL,
  `Owner_Middlename` varchar(30) NOT NULL,
  `Driver_Surname` varchar(30) NOT NULL,
  `Driver_Firstname` varchar(30) NOT NULL,
  `Driver_Middlename` varchar(30) NOT NULL,
  `Plate_No` varchar(30) NOT NULL,
  `VIN` varchar(30) NOT NULL,
  `Company` varchar(30) NOT NULL,
  `Model` varchar(30) NOT NULL,
  `Year` year(4) NOT NULL,
  `Color` varchar(30) NOT NULL,
  `Color_Text` varchar(255) NOT NULL,
  `Licence_No` varchar(30) NOT NULL,
  `Owner_Passport` varchar(30) NOT NULL,
  `Driver_Passport` varchar(30) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `move_record`
--

CREATE TABLE `move_record` (
  `Time_ID` int(30) NOT NULL,
  `Plate_No` varchar(30) NOT NULL,
  `Movement` varchar(10) NOT NULL,
  `Driver_Passport` varchar(30) NOT NULL,
  `Move_Time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car_info`
--
ALTER TABLE `car_info`
  ADD PRIMARY KEY (`car_ID`);

--
-- Indexes for table `move_record`
--
ALTER TABLE `move_record`
  ADD PRIMARY KEY (`Time_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car_info`
--
ALTER TABLE `car_info`
  MODIFY `car_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `move_record`
--
ALTER TABLE `move_record`
  MODIFY `Time_ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
