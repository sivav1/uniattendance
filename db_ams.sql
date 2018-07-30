-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jun 13, 2018 at 02:10 AM
-- Server version: 10.2.14-MariaDB
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ams`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` varchar(12) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `middlename` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `firstname`, `middlename`, `lastname`) VALUES
(1, 'admin', 'admin', 'Private', '', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `course_no` int(10) NOT NULL AUTO_INCREMENT,
  `course_id` varchar(10) NOT NULL,
  `programme_name` varchar(100) NOT NULL,
  `programme_code` varchar(20) NOT NULL,
  `course_year` year(4) NOT NULL,
  `course_month` varchar(10) NOT NULL,
  PRIMARY KEY (`course_no`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_no`, `course_id`, `programme_name`, `programme_code`, `course_year`, `course_month`) VALUES
(23, 'GDC2017F', 'Graduate Diploma in Computing', 'GDC', 2017, 'February'),
(24, 'GDC2017J', 'Graduate Diploma in Computing', 'GDC', 2017, 'July'),
(32, 'GDB2017J', 'Graduate Diploma in Business', 'GDB', 2017, 'July'),
(33, 'GDB2018F', 'Graduate Diploma in Business', 'GDB', 2018, 'February'),
(26, 'GDCPM2017J', 'Graduate Diploma in Construction Project Management', 'GDCPM', 2017, 'July'),
(27, 'GDC2018F', 'Graduate Diploma in Computing', 'GDC', 2018, 'February'),
(31, 'GDB2017F', 'Graduate Diploma in Business', 'GDB', 2017, 'February'),
(29, 'GDCPM2017J', 'Graduate Diploma in Construction Project Management', 'GDCPM', 2017, 'July'),
(30, 'GDCPM2018F', 'Graduate Diploma in Construction Project Management', 'GDCPM', 2018, 'February'),
(34, 'BAS2017F', 'Bachelor of Applied Science', 'BAS', 2017, 'February'),
(35, 'BAS2017J', 'Bachelor of Applied Science', 'BAS', 2017, 'July'),
(36, 'BAS2018F', 'Bachelor of Applied Science', 'BAS', 2018, 'February');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

DROP TABLE IF EXISTS `faculty`;
CREATE TABLE IF NOT EXISTS `faculty` (
  `faculty_id` int(11) NOT NULL AUTO_INCREMENT,
  `faculty_name` varchar(50) NOT NULL,
  `faculty_email` varchar(50) NOT NULL,
  `faculty_password` varchar(20) NOT NULL,
  PRIMARY KEY (`faculty_id`)
) ENGINE=MyISAM AUTO_INCREMENT=200011 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `faculty_name`, `faculty_email`, `faculty_password`) VALUES
(200010, 'mark foad', 'foad2gmail.com', 'mark123'),
(200009, 'Hyme latif', 'latif@gmail.com', 'Hyme123');

-- --------------------------------------------------------

--
-- Table structure for table `manage_faculty`
--

DROP TABLE IF EXISTS `manage_faculty`;
CREATE TABLE IF NOT EXISTS `manage_faculty` (
  `manage_faculty_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` varchar(10) NOT NULL,
  `subject_id` varchar(10) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  PRIMARY KEY (`manage_faculty_id`),
  KEY `course_id` (`course_id`),
  KEY `subject_id` (`subject_id`),
  KEY `faculty_id` (`faculty_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manage_faculty`
--

INSERT INTO `manage_faculty` (`manage_faculty_id`, `course_id`, `subject_id`, `faculty_id`) VALUES
(13, 'GDC2017F', 'CSC', 200010),
(14, 'GDC2017F', 'RM', 200009);

-- --------------------------------------------------------

--
-- Table structure for table `manage_subject`
--

DROP TABLE IF EXISTS `manage_subject`;
CREATE TABLE IF NOT EXISTS `manage_subject` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `course_id` varchar(20) NOT NULL,
  `subject_id` varchar(20) NOT NULL,
  `subject_name` varchar(100) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `course_id` (`course_id`)
) ENGINE=MyISAM AUTO_INCREMENT=115 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manage_subject`
--

INSERT INTO `manage_subject` (`id`, `course_id`, `subject_id`, `subject_name`, `status`) VALUES
(92, 'GDB2017F', 'AHRM', 'Applied Human Resource Management', 0),
(55, 'GDC2017J', 'CADD', 'Cloud Application Design and Development', 0),
(42, 'GDC2017F', 'ISA', 'Information Systems and Analysis', 0),
(43, 'GDC2017F', 'CSC', 'Computer Systems Security', 1),
(44, 'GDC2017F', 'ADC', 'Advanced Data Communications', 0),
(45, 'GDC2017F', 'NDI', 'Network Design and Implementation', 0),
(46, 'GDC2017F', 'RM', 'Risk Management', 1),
(47, 'GDC2017F', 'MSD', 'Mobile Software Development', 0),
(48, 'GDC2017F', 'CADD', 'Cloud Application Design and Development', 0),
(49, 'GDC2017J', 'ISA', 'Information Systems and Analysis', 1),
(50, 'GDC2017J', 'CSC', 'Computer Systems Security', 1),
(51, 'GDC2017J', 'ADC', 'Advanced Data Communications', 0),
(52, 'GDC2017J', 'NDI', 'Network Design and Implementation', 0),
(53, 'GDC2017J', 'RM', 'Risk Management', 0),
(54, 'GDC2017J', 'MSD', 'Mobile Software Development', 0),
(91, 'GDB2017F', 'OS', 'Organizational Strategies', 1),
(61, 'GDCPM2017J', 'DF', 'Development and Finance', 0),
(62, 'GDCPM2017J', 'PMP', 'Project Management Practice', 0),
(63, 'GDCPM2017J', 'CA', 'Contract Administration', 0),
(64, 'GDCPM2017J', 'PM', 'Property Management', 0),
(65, 'GDCPM2017J', 'UE', 'Urban Economics', 1),
(66, 'GDC2018F', 'ISA', 'Information Systems and Analysis', 0),
(67, 'GDC2018F', 'CSC', 'Computer Systems Security', 0),
(68, 'GDC2018F', 'ADC', 'Advanced Data Communications', 0),
(69, 'GDC2018F', 'NDI', 'Network Design and Implementation', 0),
(70, 'GDC2018F', 'RM', 'Risk Management', 0),
(71, 'GDC2018F', 'MSD', 'Mobile Software Development', 0),
(72, 'GDC2018F', 'CADD', 'Cloud Application Design and Development', 0),
(90, 'GDB2017F', 'TDM', 'Talent Development and Management', 0),
(89, 'GDB2017F', 'ERL', 'Employee Relations and Legislation', 1),
(88, 'GDB2017F', 'SIB', 'Sustainability in Business', 0),
(78, 'GDCPM2017J', 'DF', 'Development and Finance', 0),
(79, 'GDCPM2017J', 'PMP', 'Project Management Practice', 0),
(80, 'GDCPM2017J', 'CA', 'Contract Administration', 0),
(81, 'GDCPM2017J', 'PM', 'Property Management', 0),
(82, 'GDCPM2017J', 'UE', 'Urban Economics', 0),
(83, 'GDCPM2018F', 'DF', 'Development and Finance', 0),
(84, 'GDCPM2018F', 'PMP', 'Project Management Practice', 1),
(85, 'GDCPM2018F', 'CA', 'Contract Administration', 0),
(86, 'GDCPM2018F', 'PM', 'Property Management', 0),
(87, 'GDCPM2018F', 'UE', 'Urban Economics', 0),
(93, 'GDB2017J', 'SIB', 'Sustainability in Business', 0),
(94, 'GDB2017J', 'ERL', 'Employee Relations and Legislation', 0),
(95, 'GDB2017J', 'TDM', 'Talent Development and Management', 0),
(96, 'GDB2017J', 'OS', 'Organizational Strategies', 0),
(97, 'GDB2017J', 'AHRM', 'Applied Human Resource Management', 0),
(98, 'GDB2018F', 'SIB', 'Sustainability in Business', 0),
(99, 'GDB2018F', 'ERL', 'Employee Relations and Legislation', 0),
(100, 'GDB2018F', 'TDM', 'Talent Development and Management', 0),
(101, 'GDB2018F', 'OS', 'Organizational Strategies', 0),
(102, 'GDB2018F', 'AHRM', 'Applied Human Resource Management', 0),
(103, 'BAS2017F', 'CRT', 'Clinical Reasoning and Therapeutics', 0),
(104, 'BAS2017F', 'CTH', 'Current Trends in Healthcare', 0),
(105, 'BAS2017F', 'AR', 'Advanced Research', 0),
(106, 'BAS2017F', 'OP', 'Osteopathic Practice', 0),
(107, 'BAS2017J', 'CRT', 'Clinical Reasoning and Therapeutics', 0),
(108, 'BAS2017J', 'CTH', 'Current Trends in Healthcare', 0),
(109, 'BAS2017J', 'AR', 'Advanced Research', 0),
(110, 'BAS2017J', 'OP', 'Osteopathic Practice', 0),
(111, 'BAS2018F', 'CRT', 'Clinical Reasoning and Therapeutics', 0),
(112, 'BAS2018F', 'CTH', 'Current Trends in Healthcare', 0),
(113, 'BAS2018F', 'AR', 'Advanced Research', 0),
(114, 'BAS2018F', 'OP', 'Osteopathic Practice', 0);

-- --------------------------------------------------------

--
-- Table structure for table `programme`
--

DROP TABLE IF EXISTS `programme`;
CREATE TABLE IF NOT EXISTS `programme` (
  `programme_code` varchar(10) NOT NULL,
  `programme_name` varchar(100) NOT NULL,
  PRIMARY KEY (`programme_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `programme`
--

INSERT INTO `programme` (`programme_code`, `programme_name`) VALUES
('GDC', 'Graduate Diploma in Computing'),
('GDCPM', 'Graduate Diploma in Construction Project Management'),
('GDB', 'Graduate Diploma in Business '),
('BAS', 'Bachelor of Applied Science'),
('FDC', 'Food deploy and Compare');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) NOT NULL,
  `middlename` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `course` varchar(100) NOT NULL,
  `course_year` year(4) NOT NULL,
  `course_month` varchar(10) NOT NULL,
  `course_id` varchar(10) NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=100027 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `firstname`, `middlename`, `lastname`, `email`, `course`, `course_year`, `course_month`, `course_id`) VALUES
(100019, 'Albin', '', 'Lukose', 'albin@gmail.com', 'Graduate Diploma in Business', 2017, 'February', 'GDC2017F'),
(100020, 'jose', '', 'pullan', 'jose@gmail.com', 'Graduate Diploma in Construction Project Management', 2018, 'February', 'GDCPM2018F'),
(100024, 'Renjith', '', 'sp', 'r@gmail.com', 'Graduate Diploma in Computing', 2017, 'February', 'GDC2017F'),
(100025, 'varun', '', 'sankar', 'v@gmail.com', 'Graduate Diploma in Computing', 2017, 'February', 'GDC2017F'),
(100026, 'jishnu', '', 'rama', 'j@gmail.com', 'Graduate Diploma in Construction Project Management', 2018, 'February', 'GDCPM2018F');

-- --------------------------------------------------------

--
-- Table structure for table `student_login`
--

DROP TABLE IF EXISTS `student_login`;
CREATE TABLE IF NOT EXISTS `student_login` (
  `student_id` int(11) NOT NULL,
  `student_username` varchar(50) NOT NULL,
  `student_password` varchar(20) NOT NULL,
  `course_id` varchar(10) NOT NULL,
  PRIMARY KEY (`student_username`),
  KEY `student_id` (`student_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_login`
--

INSERT INTO `student_login` (`student_id`, `student_username`, `student_password`, `course_id`) VALUES
(100019, 'albin@gmail.com', 'Lukose2017', 'GDB2017F'),
(100020, 'jose@gmail.com', 'pullan2018', 'GDCPM2018F'),
(1000254, 'a@b.c', '123', 'GDC2017J'),
(100024, 'r@gmail.com', 'sp2017', 'GDC2017F'),
(100025, 'v@gmail.com', 'sankar2017', 'GDC2017F'),
(100026, 'j@gmail.com', 'rama2018', 'GDCPM2018F');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
CREATE TABLE IF NOT EXISTS `subjects` (
  `subject_id` varchar(10) NOT NULL,
  `subject_name` varchar(100) NOT NULL,
  `programme_code` varchar(20) NOT NULL,
  PRIMARY KEY (`subject_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `subject_name`, `programme_code`) VALUES
('ISA', 'Information Systems and Analysis', 'GDC'),
('CSC', 'Computer Systems Security', 'GDC'),
('ADC', 'Advanced Data Communications', 'GDC'),
('NDI', 'Network Design and Implementation', 'GDC'),
('RM', 'Risk Management', 'GDC'),
('MSD', 'Mobile Software Development', 'GDC'),
('CADD', 'Cloud Application Design and Development', 'GDC'),
('DF', 'Development and Finance', 'GDCPM'),
('PMP', 'Project Management Practice', 'GDCPM'),
('CA', 'Contract Administration', 'GDCPM'),
('PM', 'Property Management', 'GDCPM'),
('UE', 'Urban Economics', 'GDCPM'),
('SIB', 'Sustainability in Business', 'GDB'),
('ERL', 'Employee Relations and Legislation', 'GDB'),
('TDM', 'Talent Development and Management', 'GDB'),
('OS', 'Organizational Strategies', 'GDB'),
('AHRM', 'Applied Human Resource Management', 'GDB'),
('CRT', 'Clinical Reasoning and Therapeutics', 'BAS'),
('CTH', 'Current Trends in Healthcare', 'BAS'),
('AR', 'Advanced Research', 'BAS'),
('OP', 'Osteopathic Practice', 'BAS');

-- --------------------------------------------------------

--
-- Table structure for table `temp_attendance`
--

DROP TABLE IF EXISTS `temp_attendance`;
CREATE TABLE IF NOT EXISTS `temp_attendance` (
  `subject_id` varchar(10) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `attedance_date` date NOT NULL,
  `attendance` tinyint(1) NOT NULL,
  KEY `subject_id` (`subject_id`),
  KEY `faculty_id` (`faculty_id`),
  KEY `student_id` (`student_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `time`
--

DROP TABLE IF EXISTS `time`;
CREATE TABLE IF NOT EXISTS `time` (
  `time_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_no` int(6) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`time_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time`
--

INSERT INTO `time` (`time_id`, `student_no`, `student_name`, `time`, `date`) VALUES
(1, 121299, 'John Connor', '13:45:00', '2016-12-29'),
(2, 121299, 'John Connor', '13:46:00', '2016-12-29');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
