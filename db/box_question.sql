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
  `jml_box` int(11) NOT NULL,
  `pesan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `box_question`
--

INSERT INTO `box_question` (`id_box`, `question_box`, `answer_box`, `type`, `code_question`, `media`, `box1`, `box2`, `box3`, `box4`, `box5`, `box6`, `jml_box`, `pesan`) VALUES
(16, 'How is the room? <br>\r\nIt is _____________.', 'Messy', 'Grammar', 'GrammarAdjective', './media/NO 1 ADJECTIVE.swf', 'Clean', 'Tidy', 'Messy', NULL, NULL, NULL, 3, 'Choose a word in the box! '),
(17, 'He is an __________ man.', 'Old', 'Grammar', 'GrammarAdjective', './media/NO 2 ADJECTIVE.swf', 'Young', 'Old', 'Cheap', NULL, NULL, NULL, 3, 'Choose a word in the box! '),
(18, 'She is a ___________ girl.', 'Clever', 'Grammar', 'GrammarAdjective', './media/NO 3 ADJECTIVE.swf', 'Clever', 'Stupid', 'Sad', NULL, NULL, NULL, 3, 'Choose a word in the box! '),
(19, 'The snail is so _______________.', 'Slow', 'Grammar', 'GrammarAdjective', './media/NO 4 ADJECTIVE.swf', 'Fast', 'Quick', 'Slow', NULL, NULL, NULL, 3, 'Choose a word in the box! '),
(20, 'She is a ___________ princess.', 'Beautiful', 'Grammar', 'GrammarAdjective', './media/NO 5 ADJECTIVE.swf', 'Handsome', 'Ugly', 'Beautiful', NULL, NULL, NULL, 3, 'Choose a word in the box! '),
(21, 'How does he climb the wall?', 'He climbs the wall bravely', 'Grammar', 'GrammarAdverb', './media/NO 1 ADVERB.swf', 'Wall', 'He', 'Bravely', 'Climbs', 'The', NULL, 5, 'Arrange into correct sentence by rewriting the words in the box! '),
(22, 'How does the snail walk?', 'The snail walks slowly', 'Grammar', 'GrammarAdverb', './media/NO 2 ADVERB.swf', 'Snail', 'Slowly', 'Walks', 'The', NULL, NULL, 4, 'Arrange into correct sentence by rewriting the words in the box! '),
(23, 'Where do they read the book?', 'They read the book in the library', 'Grammar', 'GrammarAdverb', './media/NO 3 ADVERB.swf', 'Library', 'Read', 'The', 'Book', 'In', 'They', 6, 'Arrange into correct sentence by rewriting the words in the box! '),
(24, 'How does he run?', 'He runs very quickly', 'Grammar', 'GrammarAdverb', './media/NO 4 ADVERB.swf', 'Runs', 'He', 'Quickly', 'Very', NULL, NULL, 4, 'Arrange into correct sentence by rewriting the words in the box! '),
(25, 'When do they go swimming?', 'They go swimming next week', 'Grammar', 'GrammarAdverb', './media/NO 5 ADVERB.swf', 'Go', 'Next', 'Swimming', 'Week', 'They', NULL, 5, 'Arrange into correct sentence by rewriting the words in the box! '),
(26, 'The dog is _________ sofa.', 'On', 'Grammar', 'GrammarPreposition', './media/NO 1 PROPOSITION.swf', 'Under', 'On', 'In', 'Over', NULL, NULL, 4, 'Choose one correct answer from the box below! '),
(27, 'The racket _____________ the bed.', 'In front of', 'Grammar', 'GrammarPreposition', './media/NO 2 PROPOSITION.swf', 'Among', 'In', 'Outside', 'In front of', NULL, NULL, 4, 'Choose one correct answer from the box below!'),
(28, 'The rabbit is ______________ the hat.', 'In', 'Grammar', 'GrammarPreposition', './media/NO 3 PROPOSITION.swf', 'In', 'Outside', 'Near', 'Opposite', NULL, NULL, 4, 'Choose one correct answer from the box below!'),
(29, 'The bird is _____________ the tree.', 'Over', 'Grammar', 'GrammarPreposition', './media/NO 4 PROPOSITION.swf', 'Over', 'In', 'On', 'Under', NULL, NULL, 4, 'Choose one correct answer from the box below!'),
(30, 'The teacher is ___________ the students.', 'near', 'Grammar', 'GrammarPreposition', './media/NO 5 PROPOSITION.swf', 'Near', 'In', 'Outside', 'Between', NULL, NULL, 4, 'Choose one correct answer from the box below!'),
(31, 'What does he eat?', 'He eats burger', 'Grammar', 'GrammarSimple', './media/NO 1 SIMPLE PRES.swf', 'Burger', 'He', 'Eats', NULL, NULL, NULL, 3, 'Arrange into correct sentence by rewriting the words in the box! '),
(32, 'Where does she sleep?', 'She sleeps on the bed', 'Grammar', 'GrammarSimple', './media/NO 2 SIMPLE PRES.swf', 'The', 'On', 'Sleeps', 'She', 'Bed', NULL, 5, 'Arrange into correct sentence by rewriting the words in the box! '),
(33, 'Where are they?', 'They are in the market', 'Grammar', 'GrammarSimple', './media/NO 3 SIMPLE PRES.swf', 'Are', 'In', 'They', 'The', 'Market', NULL, 5, 'Arrange into correct sentence by rewriting the words in the box! '),
(34, 'What do they do?', 'They study English together', 'Grammar', 'GrammarSimple', './media/NO 4 SIMPLE PRES.swf', 'Study', 'English', 'Together', 'They', NULL, NULL, 4, 'Arrange into correct sentence by rewriting the words in the box! '),
(35, 'Where is he?', 'He is in the kitchen', 'Grammar', 'GrammarSimple', './media/NO 5 SIMPLE PRES.swf', 'In', 'Is', 'He', 'The', 'Kitchen', NULL, 5, 'Arrange into correct sentence by rewriting the words in the box! ');

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
