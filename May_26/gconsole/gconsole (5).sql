-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2025 at 03:46 PM
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
-- Database: `gconsole`
--

-- --------------------------------------------------------

--
-- Table structure for table `audit`
--

CREATE TABLE `audit` (
  `auditid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `date` date NOT NULL,
  `code` text NOT NULL,
  `longdesc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `audit`
--

INSERT INTO `audit` (`auditid`, `userid`, `date`, `code`, `longdesc`) VALUES
(1, 8, '2025-10-09', 'log', 'User has logged in'),
(2, 10, '2025-10-09', 'reg', 'User has registered'),
(3, 8, '2025-10-09', 'log', 'User has logged in'),
(4, 8, '2025-10-09', 'log', 'User has logged in'),
(5, 8, '2025-10-09', 'log', 'User has logged out'),
(6, 8, '2025-10-09', 'log', 'User has logged in'),
(7, 8, '2025-10-09', 'log', 'Console registered');

-- --------------------------------------------------------

--
-- Table structure for table `console`
--

CREATE TABLE `console` (
  `console_id` int(11) NOT NULL,
  `manufacturer` text NOT NULL,
  `c_name` text NOT NULL,
  `release_date` text NOT NULL,
  `controller_no` int(11) NOT NULL,
  `bit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `console`
--

INSERT INTO `console` (`console_id`, `manufacturer`, `c_name`, `release_date`, `controller_no`, `bit`) VALUES
(1, 'Sony', 'PlayStation', '1988', 1, 32),
(2, 'Sony', 'PlayStation', '2000', 2, 32),
(3, 'Sony', 'PlayStation', '2006', 3, 64),
(4, 'Sony', 'PlayStation', '2013', 4, 64),
(5, 'Sony', 'PlayStation', '2020', 5, 64),
(6, 'Nintendo', 'Switch', '2025', 2, 64),
(12, 'Sony', 'PlayStation 5', '12/04/1991', 2, 64),
(13, 'Sony', 'PlayStation 5', '12/04/1991', 2, 64);

-- --------------------------------------------------------

--
-- Table structure for table `owns`
--

CREATE TABLE `owns` (
  `owns_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `console_id` int(11) NOT NULL,
  `buy_date` text NOT NULL,
  `link_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `owns`
--

INSERT INTO `owns` (`owns_id`, `user_id`, `console_id`, `buy_date`, `link_date`) VALUES
(1, 5, 1, '12/04/2012', '12/04/2012'),
(2, 5, 6, '12/04/2012', '12/04/2012'),
(3, 5, 2, '12/04/2012', '12/04/2012'),
(4, 5, 3, '12/04/2012', '12/04/2012'),
(5, 5, 4, '12/04/2012', '12/04/2012'),
(6, 5, 5, '12/04/2012', '12/04/2012'),
(7, 4, 1, '12/04/2012', '12/04/2012'),
(8, 4, 5, '12/04/2012', '12/04/2012'),
(9, 3, 2, '12/04/2012', '12/04/2012'),
(10, 3, 4, '12/04/2012', '12/04/2012'),
(11, 2, 3, '12/04/2012', '12/04/2012'),
(12, 2, 4, '12/04/2012', '12/04/2012'),
(13, 6, 2, '12/04/2012', '12/04/2012'),
(14, 6, 3, '12/04/2012', '12/04/2012'),
(15, 1, 2, '12/04/2012', '12/04/2012'),
(16, 1, 3, '12/04/2012', '12/04/2012');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `sign_up_date` text NOT NULL,
  `dob` text NOT NULL,
  `country` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `sign_up_date`, `dob`, `country`) VALUES
(1, 'vlojasn', 'wvlnkbbvjsdzbvj', '20/12/2010', '12/04/2000', 'Russia'),
(2, 'cody is a silly boy', 'kvghshvsdfigfqvbsia', '20/12/2010', '12/04/2000', 'Bermuda triangle'),
(3, 'jeff', 'tyuiaksmxcbvjndrhfdbchjxzn', '12/04/2012', '23/01/1999', 'Africa'),
(4, 'bruce wayne', 'bbgfihebvibvhobsbsfbdvhabvbdasbvsam', '12/04/2012', '12/03/1998', 'Afghanistan '),
(5, 'clickclickdood', 'jejjinsdfjbnuibgnd', '12/04/2012', '23/05/2003', 'Africa'),
(6, 'salmonella', 'gadfbgfbsdfhsdf', '12/04/2012', '11/02/2004', 'India'),
(7, 'jreta', '$2y$10$S3PsN/xd9B.2IcA/XpNBnuCX6x9Cs9EK3ngG7oMq1eef1jTcf3Oa2', '31/05/2025', '11/03/2004', 'Afghanistan'),
(8, 'rita', '$2y$10$0ZlM4TKE86.k2v34WXc8lebDbioTEv.62TPhmOjhTbDZUxt.KKxaW', '31/05/2025', '11/03/2004', 'Afghanistan'),
(9, 'jeffery', '$2y$10$L/cQsdSjGIxsBiGQZoxAp.Dl7Q7yjTwgluwysti0tkz0u0tZdonEK', '24/6/3000', '11/03/2004', 'Afghanistan'),
(10, 'jefferygcvbsdgsj', '$2y$10$FiEATHvz/8Fezs89.pCpbeQxg2jj3KJP.f5c9ge65pMnW3mO/fZMa', '24/6/3000', '11/03/2004', 'Afghanistan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audit`
--
ALTER TABLE `audit`
  ADD PRIMARY KEY (`auditid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `console`
--
ALTER TABLE `console`
  ADD PRIMARY KEY (`console_id`);

--
-- Indexes for table `owns`
--
ALTER TABLE `owns`
  ADD PRIMARY KEY (`owns_id`),
  ADD KEY `user_id` (`user_id`,`console_id`),
  ADD KEY `console_id` (`console_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audit`
--
ALTER TABLE `audit`
  MODIFY `auditid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `console`
--
ALTER TABLE `console`
  MODIFY `console_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `owns`
--
ALTER TABLE `owns`
  MODIFY `owns_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `audit`
--
ALTER TABLE `audit`
  ADD CONSTRAINT `audit_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `owns`
--
ALTER TABLE `owns`
  ADD CONSTRAINT `owns_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `owns_ibfk_2` FOREIGN KEY (`console_id`) REFERENCES `console` (`console_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
