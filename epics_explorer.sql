-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2014 at 02:20 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `epics_explorer`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_FIND_INSTRUCTOR_ID`(IN tid INT(11), OUT iid INT)
Select IID into iid from team where TID = tid$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_FIND_TA_ID`(IN tid INT(11), OUT taid INT)
Select TAID into taid from team where TID = tid$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `DID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Department Identification Number',
  `Name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`DID`),
  UNIQUE KEY `DID` (`DID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE IF NOT EXISTS `instructor` (
  `IID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Instructor Identification Number',
  `Name` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Phone` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`IID`),
  UNIQUE KEY `IID` (`IID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`IID`, `Name`, `Email`, `Phone`) VALUES
(1, 'Gary McFall', 'gmcfall@purdue.edu', '(765)494-7804');

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE IF NOT EXISTS `photo` (
  `PID` int(11) NOT NULL AUTO_INCREMENT,
  `Link` varchar(50) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Description` text,
  PRIMARY KEY (`PID`),
  UNIQUE KEY `PID` (`PID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `PJID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) DEFAULT NULL,
  `Start` varchar(50) DEFAULT NULL,
  `Description` text,
  `Progress` int(11) DEFAULT NULL,
  PRIMARY KEY (`PJID`),
  UNIQUE KEY `PJID` (`PJID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `skill`
--

CREATE TABLE IF NOT EXISTS `skill` (
  `SID` int(11) NOT NULL,
  `Name` varchar(20) DEFAULT NULL,
  UNIQUE KEY `SID` (`SID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_assistant`
--

CREATE TABLE IF NOT EXISTS `teacher_assistant` (
  `TAID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Teacher Assistant Identification Number',
  `Name` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Phone` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`TAID`),
  UNIQUE KEY `TAID` (`TAID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `teacher_assistant`
--

INSERT INTO `teacher_assistant` (`TAID`, `Name`, `Email`, `Phone`) VALUES
(1, 'Radhika Bhargava', 'rbhargava@purdue.edu', '(765)786-6765');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE IF NOT EXISTS `team` (
  `TID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Team Identification Number',
  `Name` varchar(50) DEFAULT NULL,
  `Acronym` varchar(5) DEFAULT NULL,
  `Website` varchar(2083) DEFAULT NULL,
  `Description` text,
  `IID` int(11) DEFAULT NULL COMMENT 'Instructor Identification Number',
  `TAID` int(11) DEFAULT NULL COMMENT 'TA Identification Number',
  PRIMARY KEY (`TID`),
  UNIQUE KEY `TID` (`TID`),
  KEY `IID` (`IID`,`TAID`),
  KEY `IID_2` (`IID`,`TAID`),
  KEY `TAID` (`TAID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`TID`, `Name`, `Acronym`, `Website`, `Description`, `IID`, `TAID`) VALUES
(1, 'Web-based', 'WISE', 'https://engineering.purdue.edu/EPICS/Projects/Teams/viewTeam?teamid=58', 'This team is creating web based applications meant to coordinate and inform project partners, members, and volunteers. The applications have to be easy to use while still implementing all of the requested functionality. This provides vaule to the users by simplifying and expanding current outdated processes without overwhelming them.', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `team_department`
--

CREATE TABLE IF NOT EXISTS `team_department` (
  `TID` int(11) DEFAULT NULL,
  `DID` int(11) DEFAULT NULL,
  KEY `TID` (`TID`,`DID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `team_photo`
--

CREATE TABLE IF NOT EXISTS `team_photo` (
  `TID` int(11) DEFAULT NULL,
  `PID` int(11) DEFAULT NULL,
  KEY `TID` (`TID`,`PID`),
  KEY `PID` (`PID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `team_project`
--

CREATE TABLE IF NOT EXISTS `team_project` (
  `TID` int(11) DEFAULT NULL,
  `PJID` int(11) DEFAULT NULL,
  KEY `TID` (`TID`),
  KEY `PJID` (`PJID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `team_skill`
--

CREATE TABLE IF NOT EXISTS `team_skill` (
  `TID` int(11) DEFAULT NULL,
  `SID` int(11) DEFAULT NULL,
  KEY `TID` (`TID`,`SID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `team_ibfk_1` FOREIGN KEY (`IID`) REFERENCES `instructor` (`IID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `team_ibfk_2` FOREIGN KEY (`TAID`) REFERENCES `teacher_assistant` (`TAID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `team_photo`
--
ALTER TABLE `team_photo`
  ADD CONSTRAINT `team_photo_ibfk_1` FOREIGN KEY (`TID`) REFERENCES `team` (`TID`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `team_photo_ibfk_2` FOREIGN KEY (`PID`) REFERENCES `photo` (`PID`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `team_project`
--
ALTER TABLE `team_project`
  ADD CONSTRAINT `team_project_ibfk_1` FOREIGN KEY (`TID`) REFERENCES `team` (`TID`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `team_project_ibfk_2` FOREIGN KEY (`PJID`) REFERENCES `project` (`PJID`) ON DELETE SET NULL ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
