-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 19, 2017 at 05:21 AM
-- Server version: 10.1.20-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id843814_englishgate`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_question`
--

CREATE TABLE `tbl_question` (
  `id_question` int(11) NOT NULL,
  `type_question` varchar(20) NOT NULL,
  `code_question` varchar(30) NOT NULL,
  `option_question` varchar(6) NOT NULL,
  `media_question` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_question`
--

INSERT INTO `tbl_question` (`id_question`, `type_question`, `code_question`, `option_question`, `media_question`) VALUES
(31, 'Reading', 'ReadingPeople', 'Essai', './media/people&occupation.swf'),
(35, 'Listening', 'ListeningAnimal', 'PG', './media/animal.swf'),
(36, 'Grammar', 'GrammarAdjective', 'Box', NULL),
(37, 'Reading', 'ReadingAnimal', 'Essai', './media/animal.swf'),
(38, 'Reading', 'ReadingPlace', 'Essai', './media/place.swf'),
(39, 'Reading', 'ReadingThing', 'Essai', './media/thing.swf'),
(40, 'Listening', 'ListeningPeople', 'PG', './media/people(800x600).swf'),
(41, 'Listening', 'ListeningPlace', 'PG', './media/place.swf'),
(42, 'Listening', 'ListeningThing', 'PG', './media/things.swf'),
(43, 'Listening', 'ListeningOccupation', 'PG', './media/occupation.swf'),
(44, 'Grammar', 'GrammarAdverb', 'Box', NULL),
(45, 'Grammar', 'GrammarPreposition', 'Box', NULL),
(46, 'Grammar', 'GrammarSimple', 'Box', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_question`
--
ALTER TABLE `tbl_question`
  ADD PRIMARY KEY (`id_question`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_question`
--
ALTER TABLE `tbl_question`
  MODIFY `id_question` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
