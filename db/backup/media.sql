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
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id_media` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `nama_media` varchar(30) NOT NULL,
  `lokasi_media` varchar(100) NOT NULL,
  `dateUpload` date NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id_media`, `file_name`, `nama_media`, `lokasi_media`, `dateUpload`, `username`) VALUES
(27, 'people&occupation.swf', 'people&occupation.swf', './media/', '2017-02-14', 'Demo'),
(28, 'thing.swf', 'thing.swf', './media/', '2017-02-14', 'Demo'),
(29, 'people&occupation.swf', 'people&occupation.swf', './media/', '2017-02-18', 'id843814_english'),
(30, 'people&occupation.swf', 'people&occupation.swf', './media/', '2017-02-18', 'id843814_english'),
(31, 'animal.swf', 'animal.swf', './media/', '2017-02-18', 'id843814_english'),
(32, 'animal.swf', 'animal.swf', './media/', '2017-02-18', 'id843814_english'),
(33, 'NO 1 ADJECTIVE.swf', 'NO 1 ADJECTIVE.swf', './media/', '2017-02-18', 'id843814_english'),
(34, 'NO 2 ADJECTIVE.swf', 'NO 2 ADJECTIVE.swf', './media/', '2017-02-18', 'id843814_english'),
(35, 'NO 3 ADJECTIVE.swf', 'NO 3 ADJECTIVE.swf', './media/', '2017-02-18', 'id843814_english'),
(36, 'NO 4 ADJECTIVE.swf', 'NO 4 ADJECTIVE.swf', './media/', '2017-02-18', 'id843814_english'),
(37, 'NO 5 ADJECTIVE.swf', 'NO 5 ADJECTIVE.swf', './media/', '2017-02-18', 'id843814_english'),
(38, 'animal.swf', 'animal.swf', './media/', '2017-02-18', 'Demo'),
(39, 'animal.swf', 'animal.swf', './media/', '2017-02-18', 'Demo'),
(40, 'place.swf', 'place.swf', './media/', '2017-02-18', 'Demo'),
(41, 'thing.swf', 'thing.swf', './media/', '2017-02-18', 'Demo'),
(42, 'people(800x600).swf', 'people(800x600).swf', './media/', '2017-02-18', 'Demo'),
(43, 'animal.swf', 'animal.swf', './media/', '2017-02-18', 'id843814_english'),
(44, 'place.swf', 'place.swf', './media/', '2017-02-18', 'Demo'),
(45, 'things.swf', 'things.swf', './media/', '2017-02-18', 'id843814_english'),
(46, 'occupation.swf', 'occupation.swf', './media/', '2017-02-18', 'Demo'),
(47, 'NO 1 ADVERB.swf', 'NO 1 ADVERB.swf', './media/', '2017-02-18', 'id843814_english'),
(48, 'NO 2 ADVERB.swf', 'NO 2 ADVERB.swf', './media/', '2017-02-18', 'id843814_english'),
(49, 'NO 3 ADVERB.swf', 'NO 3 ADVERB.swf', './media/', '2017-02-18', 'id843814_english'),
(50, 'NO 4 ADVERB.swf', 'NO 4 ADVERB.swf', './media/', '2017-02-18', 'id843814_english'),
(51, 'NO 5 ADVERB.swf', 'NO 5 ADVERB.swf', './media/', '2017-02-18', 'id843814_english'),
(52, 'NO 1 PROPOSITION.swf', 'NO 1 PROPOSITION.swf', './media/', '2017-02-18', 'id843814_english'),
(53, 'NO 2 PROPOSITION.swf', 'NO 2 PROPOSITION.swf', './media/', '2017-02-18', 'id843814_english'),
(54, 'NO 3 PROPOSITION.swf', 'NO 3 PROPOSITION.swf', './media/', '2017-02-18', 'id843814_english'),
(55, 'NO 4 PROPOSITION.swf', 'NO 4 PROPOSITION.swf', './media/', '2017-02-18', 'id843814_english'),
(56, 'NO 5 PROPOSITION.swf', 'NO 5 PROPOSITION.swf', './media/', '2017-02-18', 'id843814_english'),
(57, 'NO 1 SIMPLE PRES.swf', 'NO 1 SIMPLE PRES.swf', './media/', '2017-02-18', 'id843814_english'),
(58, 'NO 2 SIMPLE PRES.swf', 'NO 2 SIMPLE PRES.swf', './media/', '2017-02-18', 'id843814_english'),
(59, 'NO 3 SIMPLE PRES.swf', 'NO 3 SIMPLE PRES.swf', './media/', '2017-02-18', 'id843814_english'),
(60, 'NO 4 SIMPLE PRES.swf', 'NO 4 SIMPLE PRES.swf', './media/', '2017-02-18', 'id843814_english'),
(61, 'NO 5 SIMPLE PRES.swf', 'NO 5 SIMPLE PRES.swf', './media/', '2017-02-18', 'id843814_english');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id_media`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id_media` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
