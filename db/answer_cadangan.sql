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
-- Table structure for table `answer_cadangan`
--

CREATE TABLE `answer_cadangan` (
  `id_cadangan` int(11) NOT NULL,
  `code_question` varchar(50) NOT NULL,
  `id_question` varchar(50) NOT NULL,
  `cadangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer_cadangan`
--

INSERT INTO `answer_cadangan` (`id_cadangan`, `code_question`, `id_question`, `cadangan`) VALUES
(2, 'ReadingPeople', '77', 'Bali'),
(3, 'ReadingPeople', '78', 'Guitar'),
(4, 'ReadingPeople', '79', 'learn jazz in Jakarta'),
(5, 'ReadingPeople', '81', 'learn from his dad'),
(6, 'ReadingAnimal', '82', 'in tropical rainforest'),
(7, 'ReadingAnimal', '82', 'in Sumatra'),
(8, 'ReadingAnimal', '82', 'North Sumatra'),
(9, 'ReadingAnimal', '82', 'Aceh'),
(10, 'ReadingAnimal', '84', 'figs'),
(11, 'ReadingAnimal', '84', 'foliage'),
(12, 'ReadingAnimal', '84', 'insects'),
(13, 'ReadingAnimal', '84', 'Soil'),
(14, 'ReadingAnimal', '85', 'the tree holes'),
(15, 'ReadingAnimal', '86', 'Their habitat was cut down for illegal logging'),
(16, 'ReadingAnimal', '86', 'mining'),
(17, 'ReadingAnimal', '86', 'hunted for illegal pet trade'),
(18, 'ReadingPlace', '88', 'hike the mountain'),
(19, 'ReadingPlace', '88', 'can see unique Tenggerese house and temple'),
(20, 'ReadingPlace', '88', 'can stay in the lodge, guesthouse or hotel'),
(21, 'ReadingThing', '92', '3'),
(22, 'ReadingThing', '94', 'frogs on the pond'),
(23, 'ReadingThing', '95', 'her friends can make what they want'),
(24, 'ReadingThing', '95', 'her friends can explore creativity'),
(25, 'ReadingThing', '96', 'exploring creative idea'),
(26, 'ReadingThing', '96', 'buying coloring pens'),
(27, 'ReadingPeople', '79', 'learn'),
(28, 'ReadingPeople', '79', 'learn jazz'),
(29, 'ReadingPeople', '79', 'reach Joey’s dream'),
(30, 'ReadingPeople', '79', 'reach his dream'),
(31, 'ReadingPeople', '80', 'perform'),
(32, 'ReadingPeople', '80', 'go to perform'),
(33, 'ReadingPeople', '80', 'go to perform at jazz festival'),
(34, 'ReadingPeople', '81', 'listen jazz songs'),
(35, 'ReadingPeople', '81', 'listen jazz song'),
(36, 'ReadingPeople', '81', 'learn from dad'),
(37, 'ReadingAnimal', '82', 'tropical rainforest'),
(38, 'ReadingAnimal', '82', 'in the tropical rainforest'),
(39, 'ReadingAnimal', '82', 'in the forest'),
(40, 'ReadingAnimal', '82', 'sumatra'),
(41, 'ReadingAnimal', '82', 'in North Sumatra'),
(42, 'ReadingAnimal', '82', 'In Aceh'),
(43, 'ReadingAnimal', '83', 'red fur'),
(44, 'ReadingAnimal', '85', 'Fruit'),
(45, 'ReadingAnimal', '85', 'tree holes'),
(46, 'ReadingAnimal', '86', 'farmland'),
(47, 'ReadingAnimal', '86', 'illegal logging'),
(48, 'ReadingAnimal', '86', 'hunted'),
(49, 'ReadingAnimal', '86', 'illegal pet trade'),
(50, 'ReadingAnimal', '86', 'pet trade'),
(51, 'ReadingPlace', '88', 'see sunrise'),
(52, 'ReadingPlace', '88', 'can hike the mountain'),
(53, 'ReadingPlace', '88', 'hike mountain'),
(54, 'ReadingPlace', '88', 'see Tenggerese house and temple'),
(55, 'ReadingPlace', '88', 'see Tenggerese house'),
(56, 'ReadingPlace', '88', 'see temple'),
(57, 'ReadingPlace', '88', 'stay in lodge'),
(58, 'ReadingPlace', '88', 'stay in guesthouse'),
(59, 'ReadingPlace', '88', 'stay in hotel'),
(60, 'ReadingPlace', '89', 'in the temple'),
(61, 'ReadingPlace', '89', 'at temple'),
(62, 'ReadingPlace', '90', 'beautiful scenery'),
(63, 'ReadingPlace', '90', 'scenery'),
(64, 'ReadingPlace', '91', 'cold air'),
(65, 'ReadingPlace', '91', 'the air is cold'),
(66, 'ReadingPlace', '91', 'air is cold'),
(67, 'ReadingThing', '92', '3 bags'),
(68, 'ReadingThing', '92', 'three bags'),
(69, 'ReadingThing', '93', 'coloring pen'),
(70, 'ReadingThing', '93', 'colouring pens'),
(71, 'ReadingThing', '93', 'colouring pen'),
(72, 'ReadingThing', '93', 'colour pen'),
(73, 'ReadingThing', '93', 'colour pens'),
(74, 'ReadingThing', '94', 'frogs on pond'),
(75, 'ReadingThing', '94', 'frog'),
(76, 'ReadingThing', '95', 'her friends explore creativity'),
(77, 'ReadingThing', '95', 'explore their creativity'),
(78, 'ReadingThing', '95', 'explore creativity'),
(79, 'ReadingThing', '95', 'make they want'),
(80, 'ReadingThing', '96', 'search good books'),
(81, 'ReadingThing', '96', 'search good book'),
(82, 'ReadingThing', '96', 'search book'),
(83, 'ReadingThing', '96', 'explore idea'),
(84, 'ReadingThing', '96', 'explore creative idea'),
(85, 'ReadingThing', '96', 'buy colouring pens'),
(86, 'ReadingThing', '96', 'buy colouring pen'),
(87, 'ReadingThing', '96', 'buy colour pens'),
(88, 'ReadingThing', '96', 'buy colour pen');

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
  MODIFY `id_cadangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
