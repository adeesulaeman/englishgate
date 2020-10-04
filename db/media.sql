-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 24, 2017 at 03:13 PM
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
(61, 'NO 5 SIMPLE PRES.swf', 'NO 5 SIMPLE PRES.swf', './media/', '2017-02-18', 'id843814_english'),
(62, 'reading_animal.swf', 'reading_animal.swf', './media/', '2017-02-19', 'id843814_english'),
(63, 'reading_place.swf', 'reading_place.swf', './media/', '2017-02-19', 'id843814_english'),
(64, 'NO 1 PROPOSITION.swf', 'NO 1 PROPOSITION.swf', './media/', '2017-02-19', 'id843814_english'),
(65, 'NO 2 PROPOSITION.swf', 'NO 2 PROPOSITION.swf', './media/', '2017-02-19', 'id843814_english'),
(66, 'NO 1 ADJECTIVE.swf', 'NO 1 ADJECTIVE.swf', './media/', '2017-02-19', 'id843814_english'),
(67, 'NO 3 PROPOSITION.swf', 'NO 3 PROPOSITION.swf', './media/', '2017-02-19', 'id843814_english'),
(68, 'NO 4 PROPOSITION.swf', 'NO 4 PROPOSITION.swf', './media/', '2017-02-19', 'id843814_english'),
(69, 'NO 1 SIMPLE PRES.swf', 'NO 1 SIMPLE PRES.swf', './media/', '2017-02-19', 'id843814_english'),
(70, 'NO 2 SIMPLE PRES.swf', 'NO 2 SIMPLE PRES.swf', './media/', '2017-02-19', 'id843814_english'),
(71, 'NO 3 SIMPLE PRES.swf', 'NO 3 SIMPLE PRES.swf', './media/', '2017-02-19', 'id843814_english'),
(72, 'NO 4 SIMPLE PRES.swf', 'NO 4 SIMPLE PRES.swf', './media/', '2017-02-19', 'id843814_english'),
(73, 'NO 5 SIMPLE PRES.swf', 'NO 5 SIMPLE PRES.swf', './media/', '2017-02-19', 'id843814_english'),
(74, 'adjective.swf', 'adjective.swf', './media/', '2017-02-19', 'id843814_english'),
(75, 'NO 2 ADJECTIVE.swf', 'NO 2 ADJECTIVE.swf', './media/', '2017-02-19', 'id843814_english'),
(76, 'adverb.swf', 'adverb.swf', './media/', '2017-02-19', 'id843814_english'),
(77, 'prepo.swf', 'prepo.swf', './media/', '2017-02-19', 'id843814_english'),
(78, 'simplepresent.swf', 'simplepresent.swf', './media/', '2017-02-19', 'id843814_english'),
(79, 'NO 3 ADJECTIVE.swf', 'NO 3 ADJECTIVE.swf', './media/', '2017-02-19', 'id843814_english'),
(80, 'NO 5 ADJECTIVE.swf', 'NO 5 ADJECTIVE.swf', './media/', '2017-02-19', 'id843814_english'),
(81, 'NO 5 ADJECTIVE.swf', 'NO 5 ADJECTIVE.swf', './media/', '2017-02-19', 'id843814_english'),
(82, 'NO 1 ADJECTIVE.swf', 'NO 1 ADJECTIVE.swf', './media/', '2017-02-19', 'id843814_english'),
(83, 'NO 3 ADJECTIVE.swf', 'NO 3 ADJECTIVE.swf', './media/', '2017-02-19', 'id843814_english'),
(84, 'NO 4 ADJECTIVE.swf', 'NO 4 ADJECTIVE.swf', './media/', '2017-02-19', 'id843814_english'),
(85, 'NO 5 ADJECTIVE.swf', 'NO 5 ADJECTIVE.swf', './media/', '2017-02-19', 'id843814_english'),
(86, 'NO 1 ADVERB.swf', 'NO 1 ADVERB.swf', './media/', '2017-02-19', 'id843814_english'),
(87, 'NO 1 PROPOSITION.swf', 'NO 1 PROPOSITION.swf', './media/', '2017-02-19', 'id843814_english'),
(88, 'NO 2 PROPOSITION.swf', 'NO 2 PROPOSITION.swf', './media/', '2017-02-19', 'id843814_english'),
(89, 'NO 5 PROPOSITION.swf', 'NO 5 PROPOSITION.swf', './media/', '2017-02-19', 'id843814_english'),
(90, 'NO 3 SIMPLE PRES.swf', 'NO 3 SIMPLE PRES.swf', './media/', '2017-02-19', 'id843814_english'),
(91, 'NO 1 SIMPLE PRES.swf', 'NO 1 SIMPLE PRES.swf', './media/', '2017-02-19', 'id843814_english'),
(92, 'NO 5 PROPOSITION.swf', 'NO 5 PROPOSITION.swf', './media/', '2017-02-19', 'id843814_english'),
(93, 'Reading people_occupation.swf', 'Reading people_occupation.swf', './media/', '2017-02-21', 'id843814_english'),
(94, 'listening animal.swf', 'listening animal.swf', './media/', '2017-02-21', 'id843814_english'),
(95, 'adjective_grammar.swf', 'adjective_grammar.swf', './media/', '2017-02-21', 'id843814_english'),
(96, 'Reading animal.swf', 'Reading animal.swf', './media/', '2017-02-21', 'id843814_english'),
(97, 'Reading animal.swf', 'Reading animal.swf', './media/', '2017-02-21', 'id843814_english'),
(98, 'Reading place.swf', 'Reading place.swf', './media/', '2017-02-21', 'id843814_english'),
(99, 'Reading thing.swf', 'Reading thing.swf', './media/', '2017-02-21', 'id843814_english'),
(100, 'listening people(800x600).swf', 'listening people(800x600).swf', './media/', '2017-02-21', 'id843814_english'),
(101, 'listening place.swf', 'listening place.swf', './media/', '2017-02-21', 'id843814_english'),
(102, 'listening place.swf', 'listening place.swf', './media/', '2017-02-21', 'id843814_english'),
(103, 'listening things.swf', 'listening things.swf', './media/', '2017-02-21', 'id843814_english'),
(104, 'listening occupation.swf', 'listening occupation.swf', './media/', '2017-02-21', 'id843814_english'),
(105, 'listening occupation.swf', 'listening occupation.swf', './media/', '2017-02-21', 'id843814_english'),
(106, 'adverb_grammar.swf', 'adverb_grammar.swf', './media/', '2017-02-21', 'id843814_english'),
(107, 'prepo_grammar.swf', 'prepo_grammar.swf', './media/', '2017-02-21', 'id843814_english'),
(108, 'simplepresent_grammar.swf', 'simplepresent_grammar.swf', './media/', '2017-02-21', 'id843814_english'),
(109, 'NO 1 ADJECTIVE.swf', 'NO 1 ADJECTIVE.swf', './media/', '2017-02-23', 'id843814_english'),
(110, 'NO 2 ADJECTIVE.swf', 'NO 2 ADJECTIVE.swf', './media/', '2017-02-23', 'id843814_english'),
(111, 'NO 3 ADJECTIVE.swf', 'NO 3 ADJECTIVE.swf', './media/', '2017-02-23', 'id843814_english'),
(112, 'NO 3 ADJECTIVE.swf', 'NO 3 ADJECTIVE.swf', './media/', '2017-02-23', 'id843814_english'),
(113, 'NO 2 ADJECTIVE.swf', 'NO 2 ADJECTIVE.swf', './media/', '2017-02-23', 'id843814_english'),
(114, 'NO 4 ADJECTIVE.swf', 'NO 4 ADJECTIVE.swf', './media/', '2017-02-23', 'id843814_english'),
(115, 'NO 5 ADJECTIVE.swf', 'NO 5 ADJECTIVE.swf', './media/', '2017-02-23', 'id843814_english');

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
  MODIFY `id_media` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
