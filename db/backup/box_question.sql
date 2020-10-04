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
-- Table structure for table `box_question`
--

CREATE TABLE `box_question` (
  `id_box` int(11) NOT NULL,
  `question_box` varchar(255) NOT NULL,
  `answer_box` varchar(255) NOT NULL,
  `type` varchar(30) NOT NULL,
  `code_question` varchar(50) NOT NULL,
  `media` varchar(255) DEFAULT NULL,
  `box1` varchar(50) NOT NULL,
  `box2` varchar(50) NOT NULL,
  `box3` varchar(50) DEFAULT NULL,
  `box4` varchar(50) DEFAULT NULL,
  `box5` varchar(50) DEFAULT NULL,
  `box6` varchar(50) DEFAULT NULL,
  `jml_box` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `box_question`
--

INSERT INTO `box_question` (`id_box`, `question_box`, `answer_box`, `type`, `code_question`, `media`, `box1`, `box2`, `box3`, `box4`, `box5`, `box6`, `jml_box`) VALUES
(16, 'How is the room? <br>\r\nIt is _____________', 'Tidy', 'Grammar', 'GrammarAdjective', './media/NO 1 ADJECTIVE.swf', 'Clean', 'Tidy', 'Messy', NULL, NULL, NULL, 3),
(17, 'He is a __________ man.', 'Old', 'Grammar', 'GrammarAdjective', './media/NO 2 ADJECTIVE.swf', 'Young', 'Old', 'Cheap', NULL, NULL, NULL, 3),
(18, 'She is a ___________ Girl', 'Clever', 'Grammar', 'GrammarAdjective', './media/NO 3 ADJECTIVE.swf', 'Clever', 'Stupid', 'Sad', NULL, NULL, NULL, 3),
(19, 'The snail is so _______________', 'Slow', 'Grammar', 'GrammarAdjective', './media/NO 4 ADJECTIVE.swf', 'Fast', 'Quick', 'Slow', NULL, NULL, NULL, 3),
(20, 'She is a ___________ Princes', 'Beautiful', 'Grammar', 'GrammarAdjective', './media/NO 5 ADJECTIVE.swf', 'Handsome', 'Ugly', 'Beautiful', NULL, NULL, NULL, 3),
(21, 'How does he climb the wall?', 'He climbs the wall bravely', 'Grammar', 'GrammarAdverb', './media/NO 1 ADVERB.swf', 'Wall', 'He', 'Bravely', 'Climbs', 'Wall', 'The', 6),
(22, 'How does the snail walk?', 'The snail walks slowly', 'Grammar', 'GrammarAdverb', './media/NO 2 ADVERB.swf', 'Snail', 'Slowly', 'Walks', 'The', NULL, NULL, 4),
(23, 'Where do they read the book?', 'They read the book in the library', 'Grammar', 'GrammarAdverb', './media/NO 3 ADVERB.swf', 'Library', 'Read', 'The', 'Book', 'In', 'They', 6),
(24, 'How does he run?', 'He runs very quickly', 'Grammar', 'GrammarAdverb', './media/NO 4 ADVERB.swf', 'Runs', 'He', 'Quickly', 'Very', NULL, NULL, 4),
(25, 'When do they go swimming?', 'They go swimming next week', 'Grammar', 'GrammarAdverb', './media/NO 5 ADVERB.swf', 'Go', 'Next', 'Swimming', 'Week', 'They', NULL, 5),
(26, '____', '1', 'Grammar', 'GrammarPreposition', './media/NO 1 PROPOSITION.swf', 'Under', 'On', 'In', 'Over', NULL, NULL, 4),
(27, 'The racket _____________ the bed.', '2', 'Grammar', 'GrammarPreposition', './media/NO 2 PROPOSITION.swf', 'Among', 'In', 'Outside', 'In front of', NULL, NULL, 4),
(28, '_____', '3', 'Grammar', 'GrammarPreposition', './media/NO 3 PROPOSITION.swf', 'In', 'Outside', 'Near', 'Opposite', NULL, NULL, 4),
(29, 'The bird is _____________ the tree.', '4', 'Grammar', 'GrammarPreposition', './media/NO 4 PROPOSITION.swf', 'Over', 'In', 'On', 'Under', NULL, NULL, 4),
(30, 'The Teacher is ___________ the students.', 'Among', 'Grammar', 'GrammarPreposition', './media/NO 5 PROPOSITION.swf', 'Among', 'In', 'Outside', 'Between', NULL, NULL, 4),
(31, 'What does he eat?', 'He eats Burger', 'Grammar', 'GrammarSimple', './media/NO 1 SIMPLE PRES.swf', 'Burger', 'He', 'Eats', NULL, NULL, NULL, 3),
(32, 'Where does she sleep?', 'She sleeps on the bed', 'Grammar', 'GrammarSimple', './media/NO 2 SIMPLE PRES.swf', 'The', 'On', 'Sleeps', 'She', 'Bed', NULL, 5),
(33, 'Where are ther?', 'They are in the market', 'Grammar', 'GrammarSimple', './media/NO 3 SIMPLE PRES.swf', 'Are', 'In', 'They', 'The', 'Market', NULL, 5),
(34, 'What do they do?', 'They study English together', 'Grammar', 'GrammarSimple', './media/NO 4 SIMPLE PRES.swf', 'Study', 'English', 'Together', 'They', NULL, NULL, 4),
(35, 'Where is he?', 'He is in the kitchen', 'Grammar', 'GrammarSimple', './media/NO 5 SIMPLE PRES.swf', 'In', 'Is', 'He', 'The', 'Kitchen', NULL, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `box_question`
--
ALTER TABLE `box_question`
  ADD PRIMARY KEY (`id_box`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `box_question`
--
ALTER TABLE `box_question`
  MODIFY `id_box` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
