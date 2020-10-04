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
-- Table structure for table `pilihanganda`
--

CREATE TABLE `pilihanganda` (
  `id_PG` int(11) NOT NULL,
  `question_PG` varchar(100) NOT NULL,
  `answer_PG` varchar(100) DEFAULT NULL,
  `type` varchar(50) NOT NULL,
  `code_question` varchar(30) NOT NULL,
  `pil1` varchar(100) NOT NULL,
  `pil2` varchar(100) NOT NULL,
  `pil3` varchar(100) NOT NULL,
  `pil4` varchar(100) DEFAULT NULL,
  `media` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pilihanganda`
--

INSERT INTO `pilihanganda` (`id_PG`, `question_PG`, `answer_PG`, `type`, `code_question`, `pil1`, `pil2`, `pil3`, `pil4`, `media`) VALUES
(23, 'Where are the rhinos conserved?', 'Ujung Kulon', 'Listening', 'ListeningAnimal', 'Ujung Aspal', 'Ujung Kulon', 'Ujung Batu', 'Ujung Genteng', NULL),
(24, 'Why do the rhinos protected?', 'Because they are endangered', 'Listening', 'ListeningAnimal', 'Because they are endangered', 'Because they are wild', 'Because they are tame', 'Because they are predator', NULL),
(25, 'How do the rhinos protect themselves from the predator?', 'They use their horn.', 'Listening', 'ListeningAnimal', 'They stay in the mud.', 'They eat the foliage.', 'They use their horn.', 'They sleep in the wallow.', NULL),
(26, 'How is their skin?', 'Grey', 'Listening', 'ListeningAnimal', 'Colorful', 'Brown', 'Grey', 'Red', NULL),
(27, 'What do the rhinos eat?', 'Fruit', 'Listening', 'ListeningAnimal', 'Meat', 'Fish', 'Fruit', 'Bone', NULL),
(28, 'What does Gery bring?', 'Digital camera', 'Listening', 'ListeningThing', 'Cellphone', 'Digital camera', 'Monopod', 'Mobile phone', NULL),
(29, 'How much is the digital camera?', '5.000.000', 'Listening', 'ListeningThing', '5.000', '50.000', '500.000', '5.000.000', NULL),
(30, 'What color of digital camera does Henry choose?', 'Black', 'Listening', 'ListeningThing', 'Silver', 'Black', 'Black and Silver', 'Silver and Brown', NULL),
(31, 'How is the digital camera?', 'Famous and Light', 'Listening', 'ListeningThing', 'Cheap and Famous', 'Famous and Light', 'Expensive and Heavy', 'Famous and Heavy', NULL),
(32, 'Why do they go to Taman Mini Indonesia Indah?', 'Because their teacher asks them to capture Indonesian traditional houses.', 'Reading', 'ListeningThing', 'Because their teacher asks them to spend their holiday.', 'Because their teacher asks them to capture Indonesian traditional houses.', 'Because they like Taman Mini Indonesia Indah.', 'Because they don\'t know Taman Mini Indonesia Indah before.', NULL),
(33, 'Where does Joe live?', '576 Wellington Street', 'Listening', 'ListeningPeople', '576 Wellington Street', '675 Wellington Street	', '567 Wellington Street', '765 Wellington Street', NULL),
(34, 'How’s Joe’s friend?   ', 'Smart', 'Listening', 'ListeningPeople', 'Smart', 'Helpless', 'Brave', 'Shy', NULL),
(35, 'What book does Peter read?   ', 'History book', 'Listening', 'ListeningPeople', 'Magazine	', 'Newspaper', 'Math book', 'History book', NULL),
(36, 'When do they usually play soccer?  ', 'On Saturday', 'Listening', 'ListeningPeople', 'On Monday', 'On Saturday', 'On Sunday', 'On Friday', NULL),
(37, 'Why does Peter always get good score for his examination?  ', 'Because he always studies every day', 'Listening', 'ListeningPeople', 'Because he’s kind', 'Because he’s helpful', 'Because he always studies every day', 'Because he likes playing soccer', NULL),
(38, 'What places will Sam visit for his holiday? ', 'Kuta Beach and Tanjung Benoa', 'Listening', 'ListeningPlace', 'Sanur and Kuta Beach', 'Sanur and Tanah Lot', 'Tanah Lot and Sanur Beach', 'Kuta Beach and Tanjung Benoa', NULL),
(39, 'How is Kuta Beach? ', 'Good sea wave for surfing', 'Listening', 'ListeningPlace', 'Good sea wave for surfing', 'Black sand', 'Good place for praying', 'Bad sea wave for swimming', NULL),
(40, 'Why does Anne stay at home to spend her holiday? ', 'She helps her mom', 'Listening', 'ListeningPlace', 'She likes to sleep at home', 'She helps her dad', 'She helps her mom', 'She likes playing with her sister', NULL),
(41, 'What do Anne and her mom make? ', 'Apple pie', 'Listening', 'ListeningPlace', 'Burger', 'Apple pie', 'Sandwich', 'Orange pie', NULL),
(42, 'Why does Sam visit Bali?', 'Because Bali is the best place in Indonesia', 'Listening', 'ListeningPlace', 'Because Bali is the best place in Indonesia', 'Because Bali has many temples', 'Because Bali has many foreigners', 'Because Bali has many tourists', NULL),
(43, 'What does Jack’s dad do? ', 'He is an army', 'Listening', 'ListeningOccupation', 'He is an entrepreneur', 'He is a dentist', 'He is an army', 'He is a doctor', NULL),
(44, 'Where does Jack’s mom work? ', 'Siloam hospital', 'Listening', 'ListeningOccupation', 'Africa', 'Siloam hospital', 'Her own company', 'At home', NULL),
(45, 'What does Vicky do when he will grow up later? ', 'An entrepreneur', 'Listening', 'ListeningOccupation', 'An army', 'An entrepreneur', 'A doctor', 'A dentist', NULL),
(46, 'Where do Vicky’s parents work? ', 'At home', 'Listening', 'ListeningOccupation', 'Clinic	', 'Siloam hospital', 'At home', 'Bank office', NULL),
(47, 'Why does Jack look sad? ', 'His dad goes abroad', 'Listening', 'ListeningOccupation', 'He gets bad score	', 'His dad goes abroad', 'His dad gets angry to him', 'His mom goes abroad', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pilihanganda`
--
ALTER TABLE `pilihanganda`
  ADD PRIMARY KEY (`id_PG`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pilihanganda`
--
ALTER TABLE `pilihanganda`
  MODIFY `id_PG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
