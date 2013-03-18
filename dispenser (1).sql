-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2013 at 07:52 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dispenser`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbdispenser`
--

CREATE TABLE IF NOT EXISTS `tbdispenser` (
  `DISid` int(5) NOT NULL AUTO_INCREMENT,
  `DISip` varchar(15) NOT NULL,
  `DISname` varchar(50) CHARACTER SET utf8 NOT NULL,
  `DISusername` varchar(15) CHARACTER SET utf8 NOT NULL,
  `DISpassword` varchar(15) CHARACTER SET utf8 NOT NULL,
  `DISstatus` int(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`DISid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbdispenser`
--

INSERT INTO `tbdispenser` (`DISid`, `DISip`, `DISname`, `DISusername`, `DISpassword`, `DISstatus`) VALUES
(1, '192.168.1.109', 'Origin', 'root', 'root', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbdoctor`
--

CREATE TABLE IF NOT EXISTS `tbdoctor` (
  `DOCid` int(5) NOT NULL AUTO_INCREMENT,
  `DOCfname` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `DOCsname` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `DOCusername` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `DOCpassword` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `DOCemail` varchar(250) CHARACTER SET utf8 NOT NULL,
  `DOCaccess` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`DOCid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbdoctor`
--

INSERT INTO `tbdoctor` (`DOCid`, `DOCfname`, `DOCsname`, `DOCusername`, `DOCpassword`, `DOCemail`, `DOCaccess`) VALUES
(1, 'M', 'Snode', 'snode', 'password', 'ian@whatswatt.net', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tblogs`
--

CREATE TABLE IF NOT EXISTS `tblogs` (
  `LOGid` int(5) NOT NULL AUTO_INCREMENT,
  `LOGdispid` int(5) NOT NULL,
  `LOGline` varchar(25) NOT NULL,
  `LOGstatus` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`LOGid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `tblogs`
--

INSERT INTO `tblogs` (`LOGid`, `LOGdispid`, `LOGline`, `LOGstatus`) VALUES
(19, 1, '1001201303160000', 0),
(20, 1, '1102201303160001', 0),
(21, 1, '0001201303160000', 0),
(22, 1, '1102201303160001', 0),
(23, 1, '0001201303160000', 0),
(24, 1, '5505201303160256', 0),
(25, 1, '010101201303180647', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbpatient`
--

CREATE TABLE IF NOT EXISTS `tbpatient` (
  `PATid` int(5) NOT NULL AUTO_INCREMENT,
  `PATfname` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `PATsname` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `PATaddress` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `PATcountry` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `PATpostcode` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `PATtelephone` int(11) NOT NULL,
  `PATemail` varchar(100) CHARACTER SET utf8 NOT NULL,
  `PATkinfname` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `PATkinsname` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `PATkintelephone` int(11) DEFAULT NULL,
  `PATkinemail` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `PATstatus` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`PATid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbpatient`
--

INSERT INTO `tbpatient` (`PATid`, `PATfname`, `PATsname`, `PATaddress`, `PATcountry`, `PATpostcode`, `PATtelephone`, `PATemail`, `PATkinfname`, `PATkinsname`, `PATkintelephone`, `PATkinemail`, `PATstatus`) VALUES
(1, 'Ian', 'Watt', '280 Bush Manor', 'Antrim', 'BT41 2US', 0, 'test@test.com', 'kinfname', 'kinsname', 0, 'ian@whatswatt.net', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbpill`
--

CREATE TABLE IF NOT EXISTS `tbpill` (
  `PILid` int(5) NOT NULL AUTO_INCREMENT,
  `PILname` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `PILdescription` varchar(2083) CHARACTER SET utf8 DEFAULT NULL,
  `PILstatus` int(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`PILid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbpill`
--

INSERT INTO `tbpill` (`PILid`, `PILname`, `PILdescription`, `PILstatus`) VALUES
(1, 'Paracetamol', 'Paracetamol tablet is a white, round, flat tablet with “MP” logo on one surface and a   score on the other side It contains the active ingredient paracetamol, which is a medicine used   to relieve mild to moderate pain. It is also useful for reducing fever.   Paracetamol can be used to relieve mild to moderate aches and pains associated with conditions   such as headaches, migraine, toothache, teething, colds and flu. It is also useful for  reducing fever and discomfort associated with colds and flu and following vaccinations', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbprescription`
--

CREATE TABLE IF NOT EXISTS `tbprescription` (
  `PREid` int(5) NOT NULL AUTO_INCREMENT,
  `PREpatientid` int(5) NOT NULL,
  `PREpillid` int(5) NOT NULL,
  `PREdoctorid` int(5) NOT NULL,
  `PREdispenserid` int(5) NOT NULL,
  `PREdosage` int(5) NOT NULL,
  `PREdosage1` varchar(16) CHARACTER SET utf8 NOT NULL,
  `PREdosage2` varchar(16) CHARACTER SET utf8 NOT NULL,
  `PREdosage3` varchar(16) CHARACTER SET utf8 NOT NULL,
  `PREduration` int(5) NOT NULL,
  `PREstartdate` varchar(25) NOT NULL,
  `PREmotor` int(5) NOT NULL,
  `PREstatus` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`PREid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbprescription`
--

INSERT INTO `tbprescription` (`PREid`, `PREpatientid`, `PREpillid`, `PREdoctorid`, `PREdispenserid`, `PREdosage`, `PREdosage1`, `PREdosage2`, `PREdosage3`, `PREduration`, `PREstartdate`, `PREmotor`, `PREstatus`) VALUES
(1, 1, 1, 1, 1, 3, '13:00', 'None', 'None', 1, '2013-03-18 07:48', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbusers`
--

CREATE TABLE IF NOT EXISTS `tbusers` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `group` varchar(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbusers`
--

INSERT INTO `tbusers` (`id`, `username`, `password`, `group`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '0'),
(2, 'user', '5f4dcc3b5aa765d61d8327deb882cf99', '1'),
(3, 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', '1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
