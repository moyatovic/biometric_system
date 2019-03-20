-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2019 at 11:49 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `biometric_system`
--

-- --------------------------------------------------------

--
-- Table structure for table ` admin`
--

CREATE TABLE IF NOT EXISTS ` admin` (
  `admin_id` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(10) NOT NULL,
  `lastname` varchar(10) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table ` admin`
--

INSERT INTO ` admin` (`admin_id`, `firstname`, `lastname`, `username`, `password`) VALUES
(1, 'adeleke', 'badekale', 'adelekeb', 'ade');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `department_id` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  PRIMARY KEY (`department_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `employee_id` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `middlename` varchar(25) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(225) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `joinedfirmdate` date NOT NULL,
  `department_fk` varchar(2) NOT NULL,
  `role` varchar(10) NOT NULL,
  `employment_type` int(11) NOT NULL,
  PRIMARY KEY (`employee_id`),
  KEY `department` (`department_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `leave`
--

CREATE TABLE IF NOT EXISTS `leave` (
  `leave_id` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` int(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `leavetype` date NOT NULL,
  `leavedate` date NOT NULL,
  `resumptiondate` date NOT NULL,
  `employee_id` int(2) NOT NULL,
  PRIMARY KEY (`leave_id`),
  KEY `employee_id` (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE IF NOT EXISTS `report` (
  `report_id` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` int(2) NOT NULL,
  `time_in` timestamp NOT NULL,
  `time_out` timestamp NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`report_id`),
  UNIQUE KEY `employee_id_2` (`employee_id`),
  KEY `employee_id` (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
