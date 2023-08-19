-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2023 at 11:38 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `adminid` int(11) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `departmentid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`adminid`, `userid`, `departmentid`) VALUES
(1, '4', 4),
(3, '3', 3);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `courseid` int(11) NOT NULL,
  `course` varchar(255) NOT NULL,
  `departmentid` int(11) DEFAULT NULL,
  `totalmarks` float DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseid`, `course`, `departmentid`, `totalmarks`, `description`) VALUES
(1, 'Discrete mathematics', 3, 100, 'Discrete mathematics'),
(2, 'Economics', 4, 100, 'Economics'),
(3, 'Statistics', 4, 100, 'Statistics'),
(4, 'Physics', 3, 100, 'Physics'),
(5, 'Calculas', 3, 100, 'Calculas');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `departmentid` int(11) NOT NULL,
  `departmentname` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`departmentid`, `departmentname`, `remarks`) VALUES
(3, 'CSE', 'Computer Seience & Engineering'),
(4, 'BBA', 'Bachelor of Business Administration'),
(5, 'CS', 'Computer Science'),
(6, 'CST', 'Computer Science & Technology');

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE `enrollments` (
  `enrollmentid` int(11) NOT NULL,
  `sectionid` int(11) NOT NULL,
  `studentid` int(11) NOT NULL,
  `sessionid` int(11) DEFAULT NULL,
  `departmentid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrollments`
--

INSERT INTO `enrollments` (`enrollmentid`, `sectionid`, `studentid`, `sessionid`, `departmentid`) VALUES
(4, 3, 9, 10, 3),
(5, 3, 8, 10, 3),
(6, 3, 7, 10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `gradeid` int(11) NOT NULL,
  `sectionid` int(11) NOT NULL,
  `studentid` int(11) NOT NULL,
  `marks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE `offer` (
  `offerid` int(11) NOT NULL,
  `sessionid` varchar(255) NOT NULL,
  `courseid` int(11) NOT NULL,
  `teacherid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `offer`
--

INSERT INTO `offer` (`offerid`, `sessionid`, `courseid`, `teacherid`) VALUES
(1, '10', 1, 6),
(2, '13', 2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `projectidea`
--

CREATE TABLE `projectidea` (
  `projectideaid` int(11) NOT NULL,
  `project` varchar(200) NOT NULL,
  `studentid` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `sessionid` int(11) DEFAULT NULL,
  `sectionid` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projectidea`
--

INSERT INTO `projectidea` (`projectideaid`, `project`, `studentid`, `status`, `sessionid`, `sectionid`, `description`) VALUES
(3, 'University Management System', 7, 'Active', 10, 3, 'fkajhelfkjhclaekjfcilaksfcdilasfkcdjailes'),
(4, 'University Management System', 8, 'Active', 10, 3, 'aeruidfhoqiauedfhcoilauwekdhcoik'),
(5, 'University Website', 10, 'Inactive', 10, 4, 'wsrefhoiwejkrhadhdtrthedsrygsd'),
(6, 'University Website', 15, 'Active', 10, 4, 'qfraecdiujkqaelsdksetgf');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `sectionid` int(11) NOT NULL,
  `sessionid` varchar(30) NOT NULL,
  `sectionname` varchar(30) NOT NULL,
  `departmentid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`sectionid`, `sessionid`, `sectionname`, `departmentid`) VALUES
(3, '10', 'A', 3),
(4, '10', 'B', 3),
(5, '13', 'A', 6),
(6, '10', 'A', 5),
(7, '13', 'B', 3);

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `sessionid` int(11) NOT NULL,
  `session` varchar(50) NOT NULL,
  `courseid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`sessionid`, `session`, `courseid`) VALUES
(10, '2023', 4),
(12, '2021', 2),
(13, '2022', 1),
(14, '2022', 3),
(15, '2023', 1),
(16, '2023', 3),
(17, '2023', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `email` varchar(100) NOT NULL,
  `address` varchar(50) DEFAULT NULL,
  `sessionid` int(11) DEFAULT NULL,
  `sectionid` int(11) DEFAULT NULL,
  `courseid` int(11) DEFAULT NULL,
  `departmentid` int(11) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `mobile` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `role`, `created`, `email`, `address`, `sessionid`, `sectionid`, `courseid`, `departmentid`, `status`, `mobile`) VALUES
(2, 'Mahedi Anik', 'anik', 'f2bb10a6e6d5f76cb2d660333079e612', 'super_admin', '2023-08-18 04:27:00', 'superadmin@gmail.com', NULL, NULL, NULL, NULL, NULL, 'Active', '01700000000'),
(3, 'Department Admin 1', 'departmentadmin1', '2daa80404ce57d2827624f86b260f9d1', 'department_admin', '2023-08-15 04:18:22', '', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(4, 'Department Admin 2', 'departmentadmin2', '32fa9d425ee215188372fc5bd0d45611', 'department_admin', '2023-08-15 04:17:17', '', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(5, 'Teacher 1', 'teacher1', '41c8949aa55b8cb5dbec662f34b62df3', 'teacher', '2023-08-18 08:55:53', 'teacher1@gmail.com', 'Dhaka', NULL, NULL, 4, 5, 'Active', '054682742584'),
(6, 'Teacher 2', 'teacher2', 'ccffb0bb993eeb79059b31e1611ec353', 'teacher', '2023-08-15 08:18:50', '', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(7, 'Student 1', 'student1', '5e5545d38a68148a2d5bd5ec9a89e327', 'student', '2023-08-18 11:04:24', 'student1@gmai.com', 'Dhaka', 10, 3, NULL, 5, 'Active', '01700000006'),
(8, 'Student 2', 'student2', '213ee683360d88249109c2f92789dbc3', 'student', '2023-08-19 06:41:05', '', NULL, 10, 3, 4, 5, NULL, ''),
(9, 'Student 3', 'student3', '8e4947690532bc44a8e41e9fb365b76a', 'student', '2023-08-19 06:41:41', '', NULL, 10, 3, 4, 5, NULL, ''),
(10, 'Student 4', 'student4', '166a50c910e390d922db4696e4c7747b', 'student', '2023-08-19 06:43:20', 'student4@gmai.com', NULL, 10, 4, NULL, 3, 'Inactive', '01900000000'),
(11, 'Department Admin 3', 'departmentadmin3', 'eb124994225d6a0df94872cab7010c7b', 'department_admin', '2023-08-18 05:47:22', 'departmentadmin3@gmail.com', NULL, NULL, NULL, NULL, 4, 'Active', '01964222222'),
(12, 'Department Admin 4', 'departmentadmin4', '9dffeebda0291a5b18741076e7951ae2', 'department_admin', '2023-08-18 05:48:20', 'departmentadmin4@gmail.com', NULL, NULL, NULL, NULL, 3, 'Active', '01783000000'),
(13, 'Teacher 3', 'teacher3', '82470256ea4b80343b27afccbca1015b', 'teacher', '2023-08-18 08:30:45', 'teacher3@gmail.com', NULL, NULL, NULL, NULL, 4, 'Active', ''),
(14, 'Teacher 4', 'teacher4', '93dacda950b1dd917079440788af3321', 'teacher', '2023-08-18 08:39:10', 'teacher4@gmail.com', 'Chittagong, Bangladesh', NULL, NULL, 1, 3, 'Active', '01900000054'),
(15, 'Student 5', 'student5', '9fd9280a7aa3578c8e853745a5fcc18a', 'student', '2023-08-18 11:02:44', 'student5@gmai.com', 'Chittagong, Bangladesh', 10, 4, NULL, 3, 'Active', '05465896758');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courseid`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`departmentid`);

--
-- Indexes for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`enrollmentid`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`gradeid`);

--
-- Indexes for table `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`offerid`);

--
-- Indexes for table `projectidea`
--
ALTER TABLE `projectidea`
  ADD PRIMARY KEY (`projectideaid`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`sectionid`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`sessionid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `courseid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `departmentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `enrollmentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `gradeid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offer`
--
ALTER TABLE `offer`
  MODIFY `offerid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `projectidea`
--
ALTER TABLE `projectidea`
  MODIFY `projectideaid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `sectionid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `sessionid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
