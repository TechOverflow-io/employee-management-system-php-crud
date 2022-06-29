-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2021 at 11:52 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mid_employee`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee_details`
--

CREATE TABLE `employee_details` (
  `emp_id` int(25) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `height` varchar(255) NOT NULL,
  `bloodGroup` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobilePhone` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `idCard` varchar(255) NOT NULL,
  `education` varchar(255) NOT NULL,
  `major` varchar(255) NOT NULL,
  `radd` varchar(255) NOT NULL,
  `raddPostalCode` varchar(255) NOT NULL,
  `padd` varchar(255) NOT NULL,
  `paddPostalCode` varchar(255) NOT NULL,
  `profilepic` varchar(255) NOT NULL,
  `referenceName` varchar(255) NOT NULL,
  `referenceRelationship` varchar(255) NOT NULL,
  `companyOrPosition` varchar(255) NOT NULL,
  `refrencephone` varchar(255) NOT NULL,
  `emergencyName` varchar(255) NOT NULL,
  `emergencyrelationship` varchar(255) NOT NULL,
  `emergencyContact` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_details`
--

INSERT INTO `employee_details` (`emp_id`, `firstName`, `lastName`, `gender`, `dob`, `height`, `bloodGroup`, `email`, `mobilePhone`, `weight`, `idCard`, `education`, `major`, `radd`, `raddPostalCode`, `padd`, `paddPostalCode`, `profilepic`, `referenceName`, `referenceRelationship`, `companyOrPosition`, `refrencephone`, `emergencyName`, `emergencyrelationship`, `emergencyContact`, `created_at`) VALUES
(13, 'LastName', 'Sarwar', 'Female', '2021-12-07', '54346', 'B-', 'shasar34@gmail.com', '65767', '768768', '3510325123489', 'PHD', 'Electrical Engineering', 'trhfjfgj', '4564565', 'fhjfgj', '645645', 'Laravel-MVC-Architecture.jpg', 'LastName', 'Brother', 'UMT', '03110472274', 'created_at', 'Brother', '03110472274', '2021-12-23 01:21:11'),
(14, 'Muhammad', 'Faizan Ameen', 'Male', '2021-11-30', '234', 'O-', 'emai@gmail.com', '2342342', '4234', '3510325123489', 'Matric', 'Arts', 'profilepicprofilepicprofilepic', '234', 'profilepic profilepic profilepic', '3423', 'upload/Remini20210508045024397.jpg', 'Ahmad Raza', 'Brother', 'UMT', '03110472274', 'Shazaib', 'Father', '03110472274', '2021-12-23 12:06:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee_details`
--
ALTER TABLE `employee_details`
  ADD PRIMARY KEY (`emp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee_details`
--
ALTER TABLE `employee_details`
  MODIFY `emp_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
