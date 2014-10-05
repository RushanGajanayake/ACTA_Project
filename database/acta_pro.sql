-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2014 at 12:35 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `acta_pro`
--

-- --------------------------------------------------------

--
-- Table structure for table `aca_staff`
--

CREATE TABLE IF NOT EXISTS `aca_staff` (
  `Ac_ID` varchar(10) NOT NULL,
  `Designation` varchar(45) NOT NULL,
  `Enroll_Date` date NOT NULL,
  `Person_NIC` varchar(10) NOT NULL,
  PRIMARY KEY (`Ac_ID`),
  KEY `fk_Aca_Staff_Person1_idx` (`Person_NIC`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aca_staff`
--

INSERT INTO `aca_staff` (`Ac_ID`, `Designation`, `Enroll_Date`, `Person_NIC`) VALUES
('ac001', 'lecturer 2', '2014-09-01', '123456788v');

-- --------------------------------------------------------

--
-- Table structure for table `admin_staff`
--

CREATE TABLE IF NOT EXISTS `admin_staff` (
  `Ad_ID` varchar(10) NOT NULL,
  `Enroll_Date` date NOT NULL,
  `Person_NIC` varchar(10) NOT NULL,
  PRIMARY KEY (`Ad_ID`),
  KEY `fk_Admin_Staff_Person1_idx` (`Person_NIC`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_staff`
--

INSERT INTO `admin_staff` (`Ad_ID`, `Enroll_Date`, `Person_NIC`) VALUES
('admin', '2014-09-02', '123456789v');

-- --------------------------------------------------------

--
-- Table structure for table `authen`
--

CREATE TABLE IF NOT EXISTS `authen` (
  `u_id` int(11) NOT NULL,
  `user_name` varchar(45) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(45) NOT NULL,
  `password_hash` varchar(32) NOT NULL,
  `privilage_level` int(11) NOT NULL,
  `Person_NIC` varchar(10) NOT NULL,
  PRIMARY KEY (`u_id`),
  KEY `fk_Authen_Person1_idx` (`Person_NIC`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authen`
--

INSERT INTO `authen` (`u_id`, `user_name`, `user_email`, `user_password`, `password_hash`, `privilage_level`, `Person_NIC`) VALUES
(1, 'admin', 'rushan.gajanayake@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, '123456789v'),
(2, 'DQS1/L1/2014/B2/002', 'asd@gmail.com', 'asd123', 'bfd59291e825b5f2bbf1eb76569f8fe7', 2, '987654322v'),
(3, 'ac001', 'dilanak@gmail.com', 'asd', '7815696ecbf1c96e6894b779456d330e', 3, '123456788v'),
(4, 'DQS1/L1/2014/B2/P003', 'dayrathna@gmail.com', 'qwe', '76d80224611fc919a5d54f0ff9fba446', 4, '999999999v');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `Course_ID` varchar(10) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `Details` varchar(500) NOT NULL,
  `No_of_Levels` int(11) NOT NULL,
  `Duration` int(11) NOT NULL,
  `Admin_Staff_Ad_ID` varchar(10) NOT NULL,
  PRIMARY KEY (`Course_ID`),
  KEY `fk_Course_Admin_Staff1_idx` (`Admin_Staff_Ad_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`Course_ID`, `Name`, `Details`, `No_of_Levels`, `Duration`, `Admin_Staff_Ad_ID`) VALUES
('DQS1', 'computer science', '', 5, 3, 'admin'),
('DQS2', 'dajkdjakl', 'dsasjklajskljlajl', 5, 12, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `Event_ID` varchar(10) NOT NULL,
  `Event_Name` varchar(45) NOT NULL,
  `Date` date NOT NULL,
  `Admin_Staff_Ad_ID` varchar(10) NOT NULL,
  PRIMARY KEY (`Event_ID`),
  KEY `fk_Event_Admin_Staff1_idx` (`Admin_Staff_Ad_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE IF NOT EXISTS `marks` (
  `m_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Sub_ID` varchar(10) NOT NULL,
  `Student_ID` varchar(20) NOT NULL,
  `Results` varchar(2) NOT NULL,
  `marks` varchar(3) NOT NULL,
  `Course_Course_ID` varchar(10) NOT NULL,
  PRIMARY KEY (`m_ID`),
  KEY `fk_Marks_Course1_idx` (`Course_Course_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`m_ID`, `Sub_ID`, `Student_ID`, `Results`, `marks`, `Course_Course_ID`) VALUES
(25, 'sub001', 'DQS1/L1/2014/B2/001', 'A-', '78', 'DQS1'),
(26, 'sub001', 'DQS1/L1/2014/B2/002', 'C+', '56', 'DQS1'),
(27, 'sub001', 'DQS1/L1/2014/B2/003', 'B-', '62', 'DQS1'),
(28, 'sub002', 'DQS1/L1/2014/B2/001', 'A', '89', 'DQS1'),
(29, 'sub002', 'DQS1/L1/2014/B2/002', 'C-', '45', 'DQS1'),
(30, 'sub002', 'DQS1/L1/2014/B2/003', 'A-', '78', 'DQS1');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `N_ID` varchar(10) NOT NULL,
  `N_Date` date NOT NULL,
  `Lect_Cancellation` varchar(250) DEFAULT NULL,
  `Attendence` varchar(250) DEFAULT NULL,
  `Due_Payment` varchar(250) DEFAULT NULL,
  `Admin_Staff_Ad_ID` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`N_ID`),
  KEY `fk_Notification_Admin_Staff1_idx` (`Admin_Staff_Ad_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `notification_has_parent`
--

CREATE TABLE IF NOT EXISTS `notification_has_parent` (
  `Notification_N_ID` varchar(10) NOT NULL,
  `Parent_Student_ID` varchar(20) NOT NULL,
  PRIMARY KEY (`Notification_N_ID`,`Parent_Student_ID`),
  KEY `fk_Notification_has_Parent_Parent1_idx` (`Parent_Student_ID`),
  KEY `fk_Notification_has_Parent_Notification1_idx` (`Notification_N_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE IF NOT EXISTS `parent` (
  `Student_ID` varchar(20) NOT NULL,
  `Person_NIC` varchar(10) NOT NULL,
  PRIMARY KEY (`Student_ID`),
  KEY `fk_Parent_Person1_idx` (`Person_NIC`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`Student_ID`, `Person_NIC`) VALUES
('DQS1/L1/2014/B2/003', '987654323v');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `Pay_ID` int(11) NOT NULL,
  `Course_ID` varchar(10) NOT NULL,
  `Paid_Date` date NOT NULL,
  `Paid_Amount` decimal(7,2) NOT NULL,
  `Due_Amount` decimal(7,2) NOT NULL,
  `Course_fee` decimal(7,2) NOT NULL,
  `Student_Student_ID` varchar(20) NOT NULL,
  PRIMARY KEY (`Pay_ID`),
  KEY `fk_Payment_Student1_idx` (`Student_Student_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE IF NOT EXISTS `person` (
  `NIC` varchar(10) NOT NULL,
  `Title` varchar(5) NOT NULL,
  `FirstName` varchar(45) NOT NULL,
  `LastName` varchar(45) NOT NULL,
  `Street` varchar(50) NOT NULL,
  `City` varchar(20) NOT NULL,
  `PostalCode` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `PhoneNo` int(11) NOT NULL,
  `MobileNo` int(11) NOT NULL,
  PRIMARY KEY (`NIC`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`NIC`, `Title`, `FirstName`, `LastName`, `Street`, `City`, `PostalCode`, `Email`, `PhoneNo`, `MobileNo`) VALUES
('123456788v', 'Ms', 'Dilanka', 'Wagachchi', '12, beliaththa', 'thangalla', 7878, 'dilanak@gmail.com', 712366122, 122788743),
('123456789v', 'Mr', 'Raveen', 'Perera', '23,kaluthara', 'kaluthara', 2323, 'rushan.gajanayake@gmail.com', 712366122, 712366122),
('98756324v', '', 'madawa', 'sumane', '234, gampola', 'gampola', 7878, 'sarath@gmail.com', 712366122, 112788478),
('987654321v', 'Mr', 'Rushan', 'Gajanayake', '33, udumulla', 'new town', 7878, 'badre512@gmail.com', 712366122, 112788743),
('987654322v', 'Mr', 'Lahiru', 'Rnagana', '12, wellampitiya', 'wallampitiya', 7878, 'asd@gmail.com', 1234567890, 1234567890),
('987654323v', 'Mr', 'Saman', 'Perera', '23,ambewela', 'newzeland', 9898, 'qwe@gmail.com', 123456789, 123456789),
('987654324v', 'Mrs', 'tharindu', 'prabath', 'ajshjahfskjhak', 'pure', 7878, 'thaiya@gmail.com', 712366122, 112788478),
('999999999v', 'Mr', 'Dayarathna', 'Gajanayake', '344,udumulla', 'colombo', 6565, 'dayrathna@gmail.com', 122788743, 712366122);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `Student_ID` varchar(20) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `Company` varchar(45) DEFAULT NULL,
  `Office_address` varchar(45) DEFAULT NULL,
  `Office_TelNo` int(11) DEFAULT NULL,
  `Reg_Date` date NOT NULL,
  `Person_NIC` varchar(10) NOT NULL,
  `Course_Course_ID` varchar(10) NOT NULL,
  PRIMARY KEY (`Student_ID`),
  KEY `fk_Student_Person1_idx` (`Person_NIC`),
  KEY `fk_Student_Course1_idx` (`Course_Course_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Student_ID`, `DateOfBirth`, `Company`, `Office_address`, `Office_TelNo`, `Reg_Date`, `Person_NIC`, `Course_Course_ID`) VALUES
('DQS1/L1/2014/B1/001', '2014-09-02', 'abc', '23,sahdhj', 784545, '2014-09-03', '98756324v', 'DQS1'),
('DQS1/L1/2014/B2/001', '2014-09-02', NULL, NULL, NULL, '2014-09-03', '987654321v', 'DQS1'),
('DQS1/L1/2014/B2/002', '2014-09-01', NULL, NULL, NULL, '2014-09-03', '987654322v', 'DQS1'),
('DQS1/L1/2014/B2/003', '2014-09-04', NULL, NULL, NULL, '2014-09-03', '987654323v', 'DQS1'),
('DQS1/L2/2015/B2/001', '1991-05-12', '', '', 0, '2014-09-03', '987654324v', 'DQS1');

-- --------------------------------------------------------

--
-- Table structure for table `student_has_notification`
--

CREATE TABLE IF NOT EXISTS `student_has_notification` (
  `Student_Student_ID` varchar(20) NOT NULL,
  `Notification_N_ID` varchar(10) NOT NULL,
  PRIMARY KEY (`Student_Student_ID`,`Notification_N_ID`),
  KEY `fk_Student_has_Notification_Notification1_idx` (`Notification_N_ID`),
  KEY `fk_Student_has_Notification_Student1_idx` (`Student_Student_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `Sub_ID` varchar(10) NOT NULL,
  `Sub_Name` varchar(45) NOT NULL,
  `discription` varchar(250) NOT NULL,
  `Course_Course_ID` varchar(10) NOT NULL,
  `Aca_Staff_Ac_ID` varchar(10) NOT NULL,
  PRIMARY KEY (`Sub_ID`),
  KEY `fk_Subject_Course1_idx` (`Course_Course_ID`),
  KEY `fk_Subject_Aca_Staff1_idx` (`Aca_Staff_Ac_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`Sub_ID`, `Sub_Name`, `discription`, `Course_Course_ID`, `Aca_Staff_Ac_ID`) VALUES
('sub001', 'algo', 'asladkjkjajsjakl', 'DQS1', 'ac001'),
('sub002', 'network', 'jsdkjalkjkdjakl', 'DQS1', 'ac001'),
('sub003', 'php', 'asddsafa', 'DQS2', 'ac001'),
('sub004', 'phpds', 'wrrqrwrrq', 'DQS2', 'ac001');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aca_staff`
--
ALTER TABLE `aca_staff`
  ADD CONSTRAINT `fk_Aca_Staff_Person1` FOREIGN KEY (`Person_NIC`) REFERENCES `person` (`NIC`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `admin_staff`
--
ALTER TABLE `admin_staff`
  ADD CONSTRAINT `fk_Admin_Staff_Person1` FOREIGN KEY (`Person_NIC`) REFERENCES `person` (`NIC`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `authen`
--
ALTER TABLE `authen`
  ADD CONSTRAINT `fk_Authen_Person1` FOREIGN KEY (`Person_NIC`) REFERENCES `person` (`NIC`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `fk_Course_Admin_Staff1` FOREIGN KEY (`Admin_Staff_Ad_ID`) REFERENCES `admin_staff` (`Ad_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `fk_Event_Admin_Staff1` FOREIGN KEY (`Admin_Staff_Ad_ID`) REFERENCES `admin_staff` (`Ad_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `marks`
--
ALTER TABLE `marks`
  ADD CONSTRAINT `fk_Marks_Course1` FOREIGN KEY (`Course_Course_ID`) REFERENCES `course` (`Course_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `fk_Notification_Admin_Staff1` FOREIGN KEY (`Admin_Staff_Ad_ID`) REFERENCES `admin_staff` (`Ad_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notification_has_parent`
--
ALTER TABLE `notification_has_parent`
  ADD CONSTRAINT `fk_Notification_has_Parent_Notification1` FOREIGN KEY (`Notification_N_ID`) REFERENCES `notification` (`N_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Notification_has_Parent_Parent1` FOREIGN KEY (`Parent_Student_ID`) REFERENCES `parent` (`Student_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `parent`
--
ALTER TABLE `parent`
  ADD CONSTRAINT `fk_Parent_Person1` FOREIGN KEY (`Person_NIC`) REFERENCES `person` (`NIC`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `fk_Payment_Student1` FOREIGN KEY (`Student_Student_ID`) REFERENCES `student` (`Student_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `fk_Student_Course1` FOREIGN KEY (`Course_Course_ID`) REFERENCES `course` (`Course_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Student_Person1` FOREIGN KEY (`Person_NIC`) REFERENCES `person` (`NIC`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_has_notification`
--
ALTER TABLE `student_has_notification`
  ADD CONSTRAINT `fk_Student_has_Notification_Notification1` FOREIGN KEY (`Notification_N_ID`) REFERENCES `notification` (`N_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Student_has_Notification_Student1` FOREIGN KEY (`Student_Student_ID`) REFERENCES `student` (`Student_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `fk_Subject_Aca_Staff1` FOREIGN KEY (`Aca_Staff_Ac_ID`) REFERENCES `aca_staff` (`Ac_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Subject_Course1` FOREIGN KEY (`Course_Course_ID`) REFERENCES `course` (`Course_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
