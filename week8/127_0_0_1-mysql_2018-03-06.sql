-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 06, 2018 at 02:10 AM
-- Server version: 5.5.41
-- PHP Version: 5.4.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wdv441_2018`
--

-- --------------------------------------------------------

--
-- Table structure for table `newsarticles`
--

CREATE TABLE `newsarticles` (
  `articleID` int(11) NOT NULL,
  `articleTitle` varchar(250) NOT NULL,
  `articleContent` mediumtext NOT NULL,
  `articleAuthor` varchar(150) NOT NULL,
  `articleDate` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `newsarticles`
--

INSERT INTO `newsarticles` (`articleID`, `articleTitle`, `articleContent`, `articleAuthor`, `articleDate`) VALUES
(1, 'Test Article 1ab', 'this is a test of the content', 'GG2', '2018-03-05'),
(2, 'Test Article 2', 'Content', 'GG', '2018-03-05'),
(3, 'Test Article 3', 'Content 3', 'GG', '2018-03-05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `newsarticles`
--
ALTER TABLE `newsarticles`
  ADD PRIMARY KEY (`articleID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `newsarticles`
--
ALTER TABLE `newsarticles`
  MODIFY `articleID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
