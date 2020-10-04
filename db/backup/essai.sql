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
-- Table structure for table `essai`
--

CREATE TABLE `essai` (
  `id_essai` int(11) NOT NULL,
  `question_essai` varchar(100) NOT NULL,
  `answer_essai` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `code_question` varchar(30) NOT NULL,
  `media` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `essai`
--

INSERT INTO `essai` (`id_essai`, `question_essai`, `answer_essai`, `type`, `code_question`, `media`) VALUES
(77, 'Where was Joey Alexander born?', 'Denpasar', 'Reading', 'ReadingPeople', NULL),
(78, 'What musical instrument does Joeyâ€™s dad play?', 'Piano', 'Reading', 'ReadingPeople', NULL),
(79, 'Why do Joey and his family move to Jakarta?', 'there is no jazz formal class in Bali', 'Reading', 'ReadingPeople', NULL),
(80, 'Why do Joey go to US?', 'perform at jazz festival', 'Reading', 'ReadingPeople', NULL),
(81, 'How do Joey learn jazz?', 'listening the jazz songs', 'Reading', 'ReadingPeople', NULL),
(82, 'Where does Sumatran Orangutans live? ', 'forest', 'Reading', 'ReadingAnimal', NULL),
(83, 'How’s Sumatran Orangutans’ fur?', 'red', 'Reading', 'ReadingAnimal', NULL),
(84, 'What do Sumatran Orangutans eat? ', 'Fruits', 'Reading', 'ReadingAnimal', NULL),
(85, 'How do Sumatran Orangutans get the water? ', 'the fruit', 'Reading', 'ReadingAnimal', NULL),
(86, 'Why are Sumatran Orangutans almost extinct?', 'farmlands', 'Reading', 'ReadingAnimal', NULL),
(87, 'What is in Bromo Mountain crater? ', 'sulphurous smoke', 'Reading', 'ReadingPlace', NULL),
(88, 'What can the visitors do in Bromo Mountain? ', 'can see the sunrise', 'Reading', 'ReadingPlace', NULL),
(89, 'Where do Hindu Tenggerese pray? ', 'temple', 'Reading', 'ReadingPlace', NULL),
(90, 'Why do many visitors come to Bromo Mountain? ', 'it has beautiful scenery', 'Reading', 'ReadingPlace', NULL),
(91, 'Why do the visitors feel comfortable? ', 'because the air is cold', 'Reading', 'ReadingPlace', NULL),
(92, 'How many white bag does she have? ', 'Three', 'Reading', 'ReadingThing', NULL),
(93, 'What do we need to decorate the bag?', 'coloring pens', 'Reading', 'ReadingThing', NULL),
(94, 'What does Sue draw on the second white bag? ', 'frogs', 'Reading', 'ReadingThing', NULL),
(95, 'Why do Sue suggest her friends to draw by themselves? ', 'They will explore their creativity', 'Reading', 'ReadingThing', NULL),
(96, 'Why does Sue go to Gramedia bookstore?', 'searching good books', 'Reading', 'ReadingThing', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `essai`
--
ALTER TABLE `essai`
  ADD PRIMARY KEY (`id_essai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `essai`
--
ALTER TABLE `essai`
  MODIFY `id_essai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
