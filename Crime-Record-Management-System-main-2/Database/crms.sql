-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2023 at 02:30 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crms`
--

-- --------------------------------------------------------

--
-- Table structure for table `crime`
--

CREATE TABLE `crime` (
  `caseid` int(11) NOT NULL,
  `firid` int(11) NOT NULL,
  `crimetype` varchar(200) NOT NULL,
  `dateofcrime` date NOT NULL,
  `section` int(100) NOT NULL,
  `description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crime`
--

INSERT INTO `crime` (`caseid`, `firid`, `crimetype`, `dateofcrime`, `section`, `description`) VALUES
(101, 1, 'Cyber', '2023-01-23', 204, 'A cybercrime is a crime that involves a computer or a computer network'),
(102, 2, 'Social', '2023-01-20', 101, 'Societal crime is defined as the total number of crimes committed by members of the society, or as the rate of these crimes. This definition is not self-evident. Other senses of the concept could be envisioned, such as the harm that these crimes cause to society.'),
(103, 3, 'Domestic', '2023-01-13', 700, 'It includes rape, sexual assault, insult to modesty, kidnapping, abduction, cruelty by intimate partner or relatives, trafficking, persecution for dowry, dowry deaths, indecency, and all other crimes listed in Indian Penal Code.'),
(104, 4, 'Kidnapping', '2023-01-21', 310, 'kidnapping in the malad district of pune.'),
(105, 5, 'Domestic', '2023-02-18', 303, 'It includes rape, sexual assault, insult to modesty, kidnapping, abduction, cruelty by intimate partner or relatives, trafficking, persecution for dowry, dowry deaths, indecency, and all other crimes listed in Indian Penal Code.'),
(106, 6, 'Social', '2023-01-31', 181, 'Societal crime is defined as the total number of crimes committed by members of the society, or as the rate of these crimes. This definition is not self-evident. Other senses of the concept could be envisioned, such as the harm that these crimes cause to society.'),
(107, 7, 'Cyber', '2023-01-28', 402, 'cyber crime '),
(108, 8, 'Murder', '2023-01-30', 310, 'murder');

--
-- Triggers `crime`
--
DELIMITER $$
CREATE TRIGGER `deleteLog` AFTER DELETE ON `crime` FOR EACH ROW INSERT INTO logs VALUES(null,OLD.caseid,'Deleted',NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insertLog` AFTER INSERT ON `crime` FOR EACH ROW INSERT INTO logs VALUES(null,NEW.caseid,'Inserted',NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updateLog` AFTER UPDATE ON `crime` FOR EACH ROW INSERT INTO logs VALUES(null,NEW.caseid,'Updated',NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `criminal`
--

CREATE TABLE `criminal` (
  `criminalid` bigint(11) NOT NULL,
  `caseid` int(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `image` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `criminal`
--

INSERT INTO `criminal` (`criminalid`, `caseid`, `fname`, `lname`, `gender`, `age`, `image`) VALUES
(1000, 101, 'Prateek', 'kumar', 'Male', 55, 'upload/images (2).jpeg'),
(1001, 102, 'Rahul', 'kumar', 'Male', 29, 'upload/images.jpeg'),
(1002, 103, 'him', 'joy', 'Male', 19, 'upload/images (1).jpeg'),
(1003, 104, 'Prateek', 'Chaudhary', 'Male', 19, 'upload/criminal1.jpeg'),
(1004, 105, 'Hizbul', 'Nayak', 'Male', 29, 'upload/images.jpeg'),
(1005, 106, 'Rama', 'Kumar', 'Male', 19, 'upload/Screenshot (41).png'),
(1006, 107, 'S', 'Kumar', 'Male', 55, 'upload/istockphoto-1207499019-170667a.jpg'),
(1007, 108, 'Arjun', 'singh', 'Male', 19, 'upload/images (3).jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `fir`
--

CREATE TABLE `fir` (
  `firid` int(11) NOT NULL,
  `firtype` varchar(100) NOT NULL,
  `firdate` date NOT NULL,
  `location` varchar(100) NOT NULL,
  `firdesc` varchar(400) NOT NULL,
  `state` int(10) NOT NULL,
  `approve` int(11) NOT NULL DEFAULT 0,
  `firuserid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fir`
--

INSERT INTO `fir` (`firid`, `firtype`, `firdate`, `location`, `firdesc`, `state`, `approve`, `firuserid`) VALUES
(1, 'Cyber Crime', '2023-01-22', 'pune', 'Cyber crime in the pune districts', 1, 1, 2),
(2, 'Social Crime', '2023-01-22', 'mumbai', 'social crime in mumbai.', 1, 1, 2),
(3, 'Domestic Violence', '2023-01-10', 'patna', 'Domestic violence in patna.', 1, 1, 2),
(4, 'Kidnapping', '2023-01-23', 'Hydrabad', 'kiddnapping of a two year boy.', 1, 1, 7),
(5, 'Domestic Violence', '2023-01-19', 'pune', 'Domestic violence in pune', 1, 1, 19),
(6, 'Social Crime', '2023-01-31', 'Patna', 'Social crime take place near the boring road jamuna apartnment .', 1, 1, 19),
(7, 'Cyber Crime', '2023-02-01', 'goa', 'cyber crime happen in goa done by a small boy', 1, 1, 17),
(8, 'Murder', '2023-01-30', 'Hydrabad', 'murder', 1, 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `authorid` int(11) NOT NULL,
  `action` varchar(50) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `authorid`, `action`, `date`) VALUES
(1, 104, 'Inserted', '2023-01-23 02:43:26'),
(2, 104, 'Updated', '2023-01-23 02:44:21'),
(3, 104, 'Deleted', '2023-01-23 02:44:35'),
(4, 104, 'Inserted', '2023-01-28 19:44:13'),
(5, 105, 'Inserted', '2023-02-01 15:21:32'),
(6, 106, 'Inserted', '2023-02-01 16:46:50'),
(7, 107, 'Inserted', '2023-02-01 18:36:45'),
(8, 108, 'Inserted', '2023-02-01 18:52:10');

-- --------------------------------------------------------

--
-- Table structure for table `punishment`
--

CREATE TABLE `punishment` (
  `punishmentid` int(11) NOT NULL,
  `criminalid` bigint(100) NOT NULL,
  `firid` int(11) NOT NULL,
  `crimetype` varchar(100) NOT NULL,
  `section` int(11) NOT NULL,
  `punishment` varchar(200) NOT NULL,
  `status` int(10) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `punishment`
--

INSERT INTO `punishment` (`punishmentid`, `criminalid`, `firid`, `crimetype`, `section`, `punishment`, `status`) VALUES
(1, 1000, 1, 'Cyber', 303, 'Prision for 10 year in cental jail of Pune.', 1),
(2, 1001, 2, 'Social', 101, '10 year jail', 1),
(3, 1002, 3, 'Domestic', 700, 'hang to death', 1),
(4, 1003, 4, 'Kidnapping', 310, 'imprisionment ', 1),
(12, 1004, 5, 'Domestic', 303, 'jail for 10 years', 1),
(14, 1005, 6, 'Social', 181, 'jail', 1),
(17, 1006, 7, 'Cyber', 402, 'jail for 2 years', 1),
(18, 1007, 8, 'Murder', 310, 'hang to death', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `fname` varchar(10) NOT NULL,
  `lname` varchar(10) NOT NULL,
  `number` bigint(20) NOT NULL,
  `date` int(255) NOT NULL,
  `address` varchar(400) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cpassword` varchar(255) NOT NULL,
  `role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `fname`, `lname`, `number`, `date`, `address`, `email`, `password`, `cpassword`, `role`) VALUES
(1, 'prateek', 'Prateek', 'Chaudhary', 9546402716, 2000, 'Bangalore', 'prateek@gmail.com', '1234', '1234', 1),
(2, 'lata', 'Lata', 'Chawan', 1234567890, 2001, 'bangalore kalasipalayam', 'lata4@gmail.com', '1234', '1234', 0),
(7, 'vidya', 'Vidya', 'Chawan', 2147483647, 2001, 'Bangalore', 'vidya04@gmail.com', 'qwerty', 'qwerty', 0),
(17, 'nik', 'Nikita', 'Kumari', 9546402716, 2002, 'Patna', 'nikita@gmail.com', '1234', '1234', 0),
(19, 'Aman', '', '', 0, 0, '', 'aman@gmail.com', '1234', '1234', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crime`
--
ALTER TABLE `crime`
  ADD PRIMARY KEY (`caseid`),
  ADD KEY `test` (`firid`);

--
-- Indexes for table `criminal`
--
ALTER TABLE `criminal`
  ADD PRIMARY KEY (`criminalid`),
  ADD KEY `test1` (`caseid`);

--
-- Indexes for table `fir`
--
ALTER TABLE `fir`
  ADD PRIMARY KEY (`firid`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `punishment`
--
ALTER TABLE `punishment`
  ADD PRIMARY KEY (`punishmentid`),
  ADD KEY `test2` (`criminalid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fir`
--
ALTER TABLE `fir`
  MODIFY `firid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `punishment`
--
ALTER TABLE `punishment`
  MODIFY `punishmentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
