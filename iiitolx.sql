-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 25, 2015 at 05:34 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `iiitolx`
--

-- --------------------------------------------------------

--
-- Table structure for table `branchcat`
--

CREATE TABLE IF NOT EXISTS `branchcat` (
  `sno` int(50) NOT NULL AUTO_INCREMENT,
  `branch` varchar(100) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `branchcat`
--

INSERT INTO `branchcat` (`sno`, `branch`) VALUES
(1, 'PUC'),
(2, 'ALL'),
(3, 'CIVIL'),
(4, 'CHEMICAL'),
(5, 'CSE'),
(6, 'ECE'),
(7, 'MME'),
(8, 'MECHANICAL');

-- --------------------------------------------------------

--
-- Table structure for table `buyingnotices`
--

CREATE TABLE IF NOT EXISTS `buyingnotices` (
  `sno` int(50) NOT NULL AUTO_INCREMENT,
  `nfrom` varchar(50) NOT NULL,
  `nto` varchar(50) NOT NULL,
  `proid` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `sellerview` int(2) NOT NULL DEFAULT '0',
  `notice_at` varchar(50) NOT NULL,
  `visibility` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`sno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `buyingnotices`
--

INSERT INTO `buyingnotices` (`sno`, `nfrom`, `nto`, `proid`, `description`, `sellerview`, `notice_at`, `visibility`) VALUES
(1, 'N130950', 'N130950', '1', 'Hi N130950, N130950 Wants the thing You Posted on ..', 0, '2015-03-25 21:25:26', 1),
(2, 'N130950', 'N130950', '1', 'Hi N130950, N130950 Wants the thing You Posted on ..', 0, '2015-03-25 21:58:19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `sno` int(50) NOT NULL AUTO_INCREMENT,
  `buyerid` varchar(50) NOT NULL,
  `buyername` varchar(100) NOT NULL,
  `class` varchar(50) NOT NULL,
  `dorm` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `proid` varchar(50) NOT NULL,
  `proname` varchar(50) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `year` varchar(50) NOT NULL,
  `order_date` date NOT NULL,
  `fulldate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(50) NOT NULL,
  `sellerid` varchar(50) NOT NULL,
  `visibility` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`sno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`sno`, `buyerid`, `buyername`, `class`, `dorm`, `mobile`, `proid`, `proname`, `branch`, `year`, `order_date`, `fulldate`, `ip`, `sellerid`, `visibility`) VALUES
(1, 'N130950', 'PRATHAP', '-', '', '9010932254', '1', 'demo', 'PUC', 'P2', '2015-03-25', '2015-03-25 16:28:19', '127.0.0.1', 'N130950', 1);

-- --------------------------------------------------------

--
-- Table structure for table `passwords`
--

CREATE TABLE IF NOT EXISTS `passwords` (
  `sno` int(50) NOT NULL AUTO_INCREMENT,
  `ID` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `datagiven` int(12) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `passwords`
--

INSERT INTO `passwords` (`sno`, `ID`, `Password`, `datagiven`) VALUES
(1, 'N130950', 'N130950', 1);

-- --------------------------------------------------------

--
-- Table structure for table `procat`
--

CREATE TABLE IF NOT EXISTS `procat` (
  `sno` int(50) NOT NULL AUTO_INCREMENT,
  `procat` varchar(100) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `procat`
--

INSERT INTO `procat` (`sno`, `procat`) VALUES
(1, 'Books'),
(2, 'Arts'),
(3, 'Gadgets'),
(4, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `sno` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `attachment` varchar(100) NOT NULL,
  `branchcat` varchar(100) NOT NULL,
  `procat` varchar(100) NOT NULL,
  `cost` int(50) NOT NULL,
  `posted_by` varchar(100) NOT NULL,
  `posted_date` varchar(100) NOT NULL,
  `postedfull` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(100) NOT NULL,
  `visibility` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`sno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`sno`, `name`, `description`, `attachment`, `branchcat`, `procat`, `cost`, `posted_by`, `posted_date`, `postedfull`, `ip`, `visibility`) VALUES
(1, 'demo', 'demo', 'N130950_1.jpeg', 'PUC', 'Books', 10, 'N130950', '2015-03-25', '2015-03-25 09:08:24', '127.0.0.1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sellingnotices`
--

CREATE TABLE IF NOT EXISTS `sellingnotices` (
  `sno` int(50) NOT NULL AUTO_INCREMENT,
  `nfrom` varchar(50) NOT NULL,
  `proid` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `posted_date` varchar(50) NOT NULL,
  `notice_at` varchar(50) NOT NULL,
  `visibility` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`sno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sellingnotices`
--

INSERT INTO `sellingnotices` (`sno`, `nfrom`, `proid`, `description`, `posted_date`, `notice_at`, `visibility`) VALUES
(1, 'N130950', '8', 'Hi Users,<br> N130950 Posted new product in Books for PUC Students...Have a Look on it..', '2015-03-25', '2015-03-25 14:31:05', 1),
(2, 'N130950', '1', 'Hi Users,<br> N130950 Posted new product in Books for PUC Students...Have a Look on it..', '2015-03-25', '2015-03-25 14:38:24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE IF NOT EXISTS `userdata` (
  `sno` int(50) NOT NULL AUTO_INCREMENT,
  `stuid` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `class` varchar(50) NOT NULL,
  `dorm` varchar(50) NOT NULL,
  `year` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `lastupdate` varchar(50) NOT NULL,
  `lastupdateip` varchar(50) NOT NULL,
  `noofedits` int(10) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`sno`, `stuid`, `name`, `gender`, `branch`, `class`, `dorm`, `year`, `mobile`, `lastupdate`, `lastupdateip`, `noofedits`) VALUES
(1, 'N130950', 'PRATHAP', 'Male', 'PUC', '-', 'g-11', 'P2', '9010932254', '2015-03-25 21:58:07', '127.0.0.1', 33);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
