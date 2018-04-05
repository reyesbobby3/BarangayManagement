-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2018 at 07:17 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.0.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `superschool`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_year`
--

CREATE TABLE `academic_year` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `academic_year`
--

INSERT INTO `academic_year` (`id`, `name`) VALUES
(1, '2017/2018'),
(2, '2018/2019');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `student` varchar(40) DEFAULT NULL,
  `regno` varchar(40) DEFAULT NULL,
  `week` varchar(40) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `unit` int(10) UNSIGNED DEFAULT NULL,
  `attended` varchar(40) DEFAULT NULL,
  `id` int(10) UNSIGNED NOT NULL,
  `semester` int(10) UNSIGNED DEFAULT NULL,
  `academicyear` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`student`, `regno`, `week`, `date`, `unit`, `attended`, `id`, `semester`, `academicyear`) VALUES
('IT/08/17', 'IT/08/17', '2', '2018-02-08', 1, '1', 1, 1, 'IT/08/17'),
('BBA/09/16', 'BBA/09/16', '4', '2018-02-08', 2, '1', 2, 2, 'BBA/09/16'),
('IT/08/17', 'IT/08/17', '4', '2018-02-19', 2, '1', 3, 1, 'IT/08/17');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`) VALUES
(1, 'Computer Science'),
(2, 'Bussiness Administration'),
(3, 'information technology'),
(4, 'home science'),
(5, 'Technology Education');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `unit` int(10) UNSIGNED DEFAULT NULL,
  `student` varchar(40) DEFAULT NULL,
  `regno` varchar(40) DEFAULT NULL,
  `year` varchar(40) DEFAULT NULL,
  `marks` int(11) DEFAULT NULL,
  `grade` varchar(40) DEFAULT NULL,
  `academicyear` varchar(40) DEFAULT NULL,
  `semester` varchar(40) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`id`, `name`, `unit`, `student`, `regno`, `year`, `marks`, `grade`, `academicyear`, `semester`, `date`) VALUES
(1, 'CAT 1', 1, 'IT/08/17', 'IT/08/17', 'IT/08/17', 16, NULL, 'IT/08/17', '1', '2018-02-08'),
(2, 'CAT 1', 1, 'BBA/09/16', 'BBA/09/16', 'BBA/09/16', 12, NULL, 'BBA/09/16', '1', '2018-02-08');

-- --------------------------------------------------------

--
-- Table structure for table `membership_grouppermissions`
--

CREATE TABLE `membership_grouppermissions` (
  `permissionID` int(10) UNSIGNED NOT NULL,
  `groupID` int(11) DEFAULT NULL,
  `tableName` varchar(100) DEFAULT NULL,
  `allowInsert` tinyint(4) DEFAULT NULL,
  `allowView` tinyint(4) NOT NULL DEFAULT '0',
  `allowEdit` tinyint(4) NOT NULL DEFAULT '0',
  `allowDelete` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `membership_grouppermissions`
--

INSERT INTO `membership_grouppermissions` (`permissionID`, `groupID`, `tableName`, `allowInsert`, `allowView`, `allowEdit`, `allowDelete`) VALUES
(1, 2, 'students', 1, 3, 3, 3),
(2, 2, 'units', 1, 3, 3, 3),
(3, 2, 'courses', 1, 3, 3, 3),
(4, 2, 'attendance', 1, 3, 3, 3),
(5, 2, 'Marks', 1, 3, 3, 3),
(6, 2, 'academic_year', 1, 3, 3, 3),
(31, 1, 'students', 0, 0, 0, 0),
(32, 1, 'units', 0, 0, 0, 0),
(33, 1, 'courses', 0, 0, 0, 0),
(34, 1, 'attendance', 0, 0, 0, 0),
(35, 1, 'Marks', 0, 0, 0, 0),
(36, 1, 'academic_year', 0, 0, 0, 0),
(55, 3, 'students', 0, 3, 0, 0),
(56, 3, 'units', 1, 1, 1, 1),
(57, 3, 'courses', 0, 3, 0, 0),
(58, 3, 'attendance', 1, 1, 1, 1),
(59, 3, 'Marks', 1, 1, 1, 1),
(60, 3, 'academic_year', 0, 3, 0, 0),
(61, 4, 'students', 0, 3, 0, 0),
(62, 4, 'units', 0, 3, 0, 0),
(63, 4, 'courses', 0, 3, 0, 0),
(64, 4, 'attendance', 0, 3, 0, 0),
(65, 4, 'Marks', 0, 3, 0, 0),
(66, 4, 'academic_year', 0, 3, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `membership_groups`
--

CREATE TABLE `membership_groups` (
  `groupID` int(10) UNSIGNED NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `description` text,
  `allowSignup` tinyint(4) DEFAULT NULL,
  `needsApproval` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `membership_groups`
--

INSERT INTO `membership_groups` (`groupID`, `name`, `description`, `allowSignup`, `needsApproval`) VALUES
(1, 'anonymous', 'Anonymous group created automatically on 2018-02-08', 0, 0),
(2, 'Admins', 'Admin group created automatically on 2018-02-08', 0, 1),
(3, 'Lecturer', '', 0, 1),
(4, 'demo', 'for demo purposes only', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `membership_userpermissions`
--

CREATE TABLE `membership_userpermissions` (
  `permissionID` int(10) UNSIGNED NOT NULL,
  `memberID` varchar(20) NOT NULL,
  `tableName` varchar(100) DEFAULT NULL,
  `allowInsert` tinyint(4) DEFAULT NULL,
  `allowView` tinyint(4) NOT NULL DEFAULT '0',
  `allowEdit` tinyint(4) NOT NULL DEFAULT '0',
  `allowDelete` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `membership_userrecords`
--

CREATE TABLE `membership_userrecords` (
  `recID` bigint(20) UNSIGNED NOT NULL,
  `tableName` varchar(100) DEFAULT NULL,
  `pkValue` varchar(255) DEFAULT NULL,
  `memberID` varchar(20) DEFAULT NULL,
  `dateAdded` bigint(20) UNSIGNED DEFAULT NULL,
  `dateUpdated` bigint(20) UNSIGNED DEFAULT NULL,
  `groupID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `membership_userrecords`
--

INSERT INTO `membership_userrecords` (`recID`, `tableName`, `pkValue`, `memberID`, `dateAdded`, `dateUpdated`, `groupID`) VALUES
(1, 'academic_year', '1', 'admin', 1518070937, 1518070937, 2),
(2, 'academic_year', '2', 'admin', 1518070962, 1518070962, 2),
(3, 'courses', '1', 'admin', 1518070983, 1518070983, 2),
(4, 'courses', '2', 'admin', 1518071009, 1518071009, 2),
(5, 'courses', '3', 'admin', 1518071026, 1518071026, 2),
(6, 'courses', '4', 'admin', 1518071042, 1518071042, 2),
(7, 'courses', '5', 'admin', 1518071058, 1518071058, 2),
(8, 'units', '1', 'admin', 1518071096, 1518071096, 2),
(9, 'units', '2', 'admin', 1518071121, 1518071121, 2),
(10, 'units', '3', 'admin', 1518071137, 1518071137, 2),
(11, 'students', 'IT/08/17', 'admin', 1518071198, 1518071198, 2),
(12, 'students', 'TED/118/16', 'admin', 1518071230, 1518071230, 2),
(13, 'students', 'BBA/09/16', 'admin', 1518071274, 1518071274, 2),
(14, 'attendance', '1', 'admin', 1518071331, 1518071331, 2),
(15, 'attendance', '2', 'admin', 1518071371, 1518071371, 2),
(16, 'Marks', '1', 'admin', 1518071482, 1518071482, 2),
(17, 'Marks', '2', 'admin', 1518071530, 1518071530, 2),
(18, 'students', 'COS/211/016', 'admin', 1518981761, 1518981761, 2),
(19, 'attendance', '3', 'lecturer', 1519027076, 1519027076, 3),
(20, 'students', 'KVDA/012/2562', 'admin', 1519033035, 1519033035, 2),
(21, 'units', '4', 'admin', 1519035762, 1519035762, 2);

-- --------------------------------------------------------

--
-- Table structure for table `membership_users`
--

CREATE TABLE `membership_users` (
  `memberID` varchar(20) NOT NULL,
  `passMD5` varchar(40) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `signupDate` date DEFAULT NULL,
  `groupID` int(10) UNSIGNED DEFAULT NULL,
  `isBanned` tinyint(4) DEFAULT NULL,
  `isApproved` tinyint(4) DEFAULT NULL,
  `custom1` text,
  `custom2` text,
  `custom3` text,
  `custom4` text,
  `comments` text,
  `pass_reset_key` varchar(100) DEFAULT NULL,
  `pass_reset_expiry` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `membership_users`
--

INSERT INTO `membership_users` (`memberID`, `passMD5`, `email`, `signupDate`, `groupID`, `isBanned`, `isApproved`, `custom1`, `custom2`, `custom3`, `custom4`, `comments`, `pass_reset_key`, `pass_reset_expiry`) VALUES
('demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 'demo@demo.com', '2018-02-19', 4, 0, 1, 'demonstration', 'ssa', 'aSSD', 'SDSSD', '', NULL, NULL),
('guest', NULL, NULL, '2018-02-08', 1, 0, 1, NULL, NULL, NULL, NULL, 'Anonymous member created automatically on 2018-02-08', NULL, NULL),
('lecturer', 'e10adc3949ba59abbe56e057f20f883e', 'lec@lec.com', '2018-02-08', 3, 0, 1, 'lec', '', '', '', '', NULL, NULL),
('ronald', '5af0a0feb2094f43bebb50c518c1ebfe', 'admin@admin.com', '2018-02-08', 2, 0, 1, NULL, NULL, NULL, NULL, 'Admin member created automatically on 2018-02-08\nRecord updated automatically on 2018-02-19', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `regno` varchar(40) NOT NULL,
  `name` varchar(100) NOT NULL,
  `course` int(10) UNSIGNED DEFAULT NULL,
  `year` varchar(40) DEFAULT NULL,
  `academicyear` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`regno`, `name`, `course`, `year`, `academicyear`) VALUES
('BBA/09/16', 'Mark Zuckerburg', 2, '3RD', 1),
('COS/211/016', 'KIJANA SANA', 1, '2ND', 1),
('IT/08/17', 'Anwar Moha', 3, '2ND', 1),
('KVDA/012/2562', 'Mwai Kibaki', 4, '3RD', 2),
('TED/118/16', 'Ngoda Ronald', 5, '2ND', 1);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`) VALUES
(1, 'IRD 200'),
(2, 'COM 211'),
(3, 'TED 200'),
(4, 'MAT 203');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_year`
--
ALTER TABLE `academic_year`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student` (`student`),
  ADD KEY `unit` (`unit`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unit` (`unit`),
  ADD KEY `student` (`student`);

--
-- Indexes for table `membership_grouppermissions`
--
ALTER TABLE `membership_grouppermissions`
  ADD PRIMARY KEY (`permissionID`);

--
-- Indexes for table `membership_groups`
--
ALTER TABLE `membership_groups`
  ADD PRIMARY KEY (`groupID`);

--
-- Indexes for table `membership_userpermissions`
--
ALTER TABLE `membership_userpermissions`
  ADD PRIMARY KEY (`permissionID`);

--
-- Indexes for table `membership_userrecords`
--
ALTER TABLE `membership_userrecords`
  ADD PRIMARY KEY (`recID`),
  ADD UNIQUE KEY `tableName_pkValue` (`tableName`,`pkValue`),
  ADD KEY `pkValue` (`pkValue`),
  ADD KEY `tableName` (`tableName`),
  ADD KEY `memberID` (`memberID`),
  ADD KEY `groupID` (`groupID`);

--
-- Indexes for table `membership_users`
--
ALTER TABLE `membership_users`
  ADD PRIMARY KEY (`memberID`),
  ADD KEY `groupID` (`groupID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`regno`),
  ADD KEY `course` (`course`),
  ADD KEY `academicyear` (`academicyear`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_year`
--
ALTER TABLE `academic_year`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `membership_grouppermissions`
--
ALTER TABLE `membership_grouppermissions`
  MODIFY `permissionID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `membership_groups`
--
ALTER TABLE `membership_groups`
  MODIFY `groupID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `membership_userpermissions`
--
ALTER TABLE `membership_userpermissions`
  MODIFY `permissionID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `membership_userrecords`
--
ALTER TABLE `membership_userrecords`
  MODIFY `recID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
