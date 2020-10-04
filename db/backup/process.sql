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
-- Table structure for table `process`
--

CREATE TABLE `process` (
  `id_process` int(11) NOT NULL,
  `date_process` date NOT NULL,
  `type_question` varchar(50) NOT NULL,
  `code_question` varchar(30) NOT NULL,
  `userID` int(11) UNSIGNED NOT NULL,
  `score` int(11) NOT NULL,
  `out_of` int(11) NOT NULL,
  `jawaban1` varchar(255) DEFAULT NULL,
  `jawaban2` varchar(255) DEFAULT NULL,
  `jawaban3` varchar(255) DEFAULT NULL,
  `jawaban4` varchar(255) DEFAULT NULL,
  `jawaban5` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `process`
--

INSERT INTO `process` (`id_process`, `date_process`, `type_question`, `code_question`, `userID`, `score`, `out_of`, `jawaban1`, `jawaban2`, `jawaban3`, `jawaban4`, `jawaban5`) VALUES
(4, '2017-02-17', 'Reading', 'ReadingPeople', 2, 2, 0, 'Correct', 'Correct', 'Wrong', 'Wrong', 'Wrong'),
(7, '2017-02-18', 'Listening', 'ListeningAnimal', 4, 1, 0, 'Wrong', 'Correct', 'Wrong', 'Wrong', 'Wrong'),
(8, '2017-02-18', 'Listening', 'ListeningAnimal', 4, 0, 0, 'Wrong', 'Wrong', 'Wrong', 'Wrong', 'Wrong'),
(17, '2017-02-18', 'Listening', 'ListeningPlace', 4, 0, 0, 'Wrong', 'Wrong', 'Wrong', 'Wrong', 'Wrong'),
(19, '2017-02-18', 'Listening', 'ListeningPeople', 4, 0, 0, 'Wrong', 'Wrong', 'Wrong', 'Wrong', 'Wrong'),
(23, '2017-02-18', 'Reading', 'ReadingPeople', 4, 0, 0, 'Wrong', 'Wrong', 'Wrong', 'Wrong', 'Wrong'),
(24, '2017-02-18', 'Reading', 'ReadingPeople', 4, 0, 0, 'Wrong', 'Wrong', 'Wrong', 'Wrong', 'Wrong'),
(27, '2017-02-18', 'Listening', 'ListeningPeople', 5, 0, 5, 'Wrong', 'Wrong', 'Wrong', 'Wrong', 'Wrong'),
(28, '2017-02-18', 'Listening', 'ListeningAnimal', 4, 1, 5, 'Wrong', 'Correct', 'Wrong', 'Wrong', 'Wrong'),
(29, '2017-02-18', 'Listening', 'ListeningAnimal', 4, 0, 5, 'Wrong', 'Wrong', 'Wrong', 'Wrong', 'Wrong'),
(30, '2017-02-18', 'Listening', 'ListeningAnimal', 4, 0, 5, 'Wrong', 'Wrong', 'Wrong', 'Wrong', 'Wrong'),
(31, '2017-02-18', 'Listening', 'ListeningOccupation', 4, 0, 5, 'Wrong', 'Wrong', 'Wrong', 'Wrong', 'Wrong'),
(32, '2017-02-18', 'Reading', 'ReadingPeople', 4, 0, 0, 'Wrong', 'Wrong', 'Wrong', 'Wrong', 'Wrong'),
(33, '2017-02-18', 'Reading', 'ReadingPeople', 4, 0, 0, 'Wrong', 'Wrong', 'Wrong', 'Wrong', 'Wrong');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `process`
--
ALTER TABLE `process`
  ADD PRIMARY KEY (`id_process`),
  ADD KEY `userID` (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `process`
--
ALTER TABLE `process`
  MODIFY `id_process` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
