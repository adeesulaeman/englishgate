-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 19, 2017 at 05:20 AM
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
-- Table structure for table `answer_cadangan`
--

CREATE TABLE `answer_cadangan` (
  `id_cadangan` int(11) NOT NULL,
  `code_question` varchar(50) NOT NULL,
  `id_question` varchar(50) NOT NULL,
  `cadangan` varchar(255) NOT NULL,
  `cadangan2` varchar(255) DEFAULT NULL,
  `cadangan3` varchar(255) DEFAULT NULL,
  `cadangan4` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer_cadangan`
--

INSERT INTO `answer_cadangan` (`id_cadangan`, `code_question`, `id_question`, `cadangan`, `cadangan2`, `cadangan3`, `cadangan4`) VALUES
(2, 'ReadingPeople', '89', 'Bali', 'Jakarta', 'Indonesia', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer_cadangan`
--
ALTER TABLE `answer_cadangan`
  ADD PRIMARY KEY (`id_cadangan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer_cadangan`
--
ALTER TABLE `answer_cadangan`
  MODIFY `id_cadangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
