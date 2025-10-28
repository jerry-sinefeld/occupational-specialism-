-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2025 at 01:56 PM
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
-- Database: `oaks_surgery`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `app_id` int(11) NOT NULL,
  `app_time` int(11) NOT NULL,
  `app_reason` text NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `app_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appointment_audit`
--

CREATE TABLE `appointment_audit` (
  `app_audit_id` int(11) NOT NULL,
  `app_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `code` text NOT NULL,
  `longdesc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `audit`
--

CREATE TABLE `audit` (
  `auditid` int(11) NOT NULL,
  `patientid` int(11) NOT NULL,
  `date` date NOT NULL,
  `code` text NOT NULL,
  `longdesc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `audit`
--

INSERT INTO `audit` (`auditid`, `patientid`, `date`, `code`, `longdesc`) VALUES
(2, 7, '2025-10-13', 'reg', 'User has registered'),
(3, 7, '2025-10-13', 'log', 'User has logged in'),
(4, 7, '2025-10-13', 'logout', 'User has logged out'),
(5, 7, '2025-10-13', 'log', 'User has logged in'),
(6, 7, '2025-10-13', 'logout', 'User has logged out'),
(11, 10, '2025-10-13', 'reg', 'User has registered'),
(12, 10, '2025-10-21', 'log', 'User has logged in'),
(13, 10, '2025-10-21', 'log', 'User has logged in'),
(14, 10, '2025-10-23', 'log', 'User has logged in'),
(15, 10, '2025-10-23', 'log', 'User has logged in'),
(16, 10, '2025-10-23', 'logout', 'User has logged out'),
(17, 11, '2025-10-23', 'reg', 'User has registered'),
(18, 11, '2025-10-23', 'log', 'User has logged in'),
(19, 11, '2025-10-23', 'log', 'User has logged in'),
(20, 11, '2025-10-23', 'log', 'User has logged in'),
(21, 11, '2025-10-23', 'log', 'User has logged in'),
(22, 11, '2025-10-23', 'log', 'User has logged in'),
(23, 11, '2025-10-23', 'log', 'User has logged in');

-- --------------------------------------------------------

--
-- Table structure for table `docaudit`
--

CREATE TABLE `docaudit` (
  `docauditid` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `code` text NOT NULL,
  `longdesc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `docaudit`
--

INSERT INTO `docaudit` (`docauditid`, `doc_id`, `date`, `code`, `longdesc`) VALUES
(6, 10, '2025-10-28', 'reg', 'doctor has registered');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doc_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `lname` text NOT NULL,
  `doc_password` text NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `role` text NOT NULL,
  `room_numb` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doc_id`, `name`, `lname`, `doc_password`, `active`, `role`, `room_numb`) VALUES
(10, 'jerry', 'o\'jerry', '$2y$10$dA97fMhlIH.IN1e5khi6seiulvi935PAfq7yuqAPtq0.8yQHIDAue', 1, 'doctor', 12);

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE `temp` (
  `temp_id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `code` bigint(20) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `patient_id` int(11) NOT NULL,
  `f_name` text NOT NULL,
  `last_name` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `dob` text NOT NULL,
  `postcode` text NOT NULL,
  `nhs_numb` text NOT NULL,
  `allergies` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`patient_id`, `f_name`, `last_name`, `username`, `password`, `dob`, `postcode`, `nhs_numb`, `allergies`) VALUES
(7, 'Ben', 'Smith', 'Smithy_B92', '$2y$10$XdKalSwn93g6KVBWjbTgD.lJ/tpkobV9bj9dCa5bh1qOT7jAD9aiS', '20/11/1992', 'M1 1AE', '2147483647', 'none'),
(10, 'Alice', 'Johnson', 'AJMed_2024', '$2y$10$jBzTnlDrKJTCYIXxL0mPUuPEGNTGm1GDHiHpgKr0h0AxpB4w/vaCK', '15/09/1990', 'SW1A 0AA', '1234567890', 'Penicillin '),
(11, 'Chloe ', 'Davis', 'ChloDavi$', '$2y$10$xw5GSxp7vTYpfm7aS9i.0.H4shb5RneZXzMCemJ0p3ik0KAkUNlYa', '01/08/2001', 'EH1 1AA', '456 789 0123', 'Peanuts');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`app_id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `doc_id` (`doc_id`);

--
-- Indexes for table `appointment_audit`
--
ALTER TABLE `appointment_audit`
  ADD PRIMARY KEY (`app_audit_id`),
  ADD KEY `app_id` (`app_id`);

--
-- Indexes for table `audit`
--
ALTER TABLE `audit`
  ADD PRIMARY KEY (`auditid`),
  ADD KEY `patient_id` (`patientid`);

--
-- Indexes for table `docaudit`
--
ALTER TABLE `docaudit`
  ADD PRIMARY KEY (`docauditid`),
  ADD KEY `doc_id` (`doc_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`temp_id`),
  ADD KEY `doc_id` (`doc_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`patient_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `app_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `appointment_audit`
--
ALTER TABLE `appointment_audit`
  MODIFY `app_audit_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `audit`
--
ALTER TABLE `audit`
  MODIFY `auditid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `docaudit`
--
ALTER TABLE `docaudit`
  MODIFY `docauditid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `temp`
--
ALTER TABLE `temp`
  MODIFY `temp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `user` (`patient_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`doc_id`) REFERENCES `doctor` (`doc_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `appointment_audit`
--
ALTER TABLE `appointment_audit`
  ADD CONSTRAINT `appointment_audit_ibfk_1` FOREIGN KEY (`app_id`) REFERENCES `appointment` (`app_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `audit`
--
ALTER TABLE `audit`
  ADD CONSTRAINT `audit_ibfk_1` FOREIGN KEY (`patientid`) REFERENCES `user` (`patient_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `docaudit`
--
ALTER TABLE `docaudit`
  ADD CONSTRAINT `docaudit_ibfk_1` FOREIGN KEY (`doc_id`) REFERENCES `doctor` (`doc_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
