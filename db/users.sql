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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) UNSIGNED NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `class_murid` varchar(100) NOT NULL,
  `nomor_induk` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `type_user` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `nama_lengkap`, `class_murid`, `nomor_induk`, `username`, `password`, `email`, `type_user`) VALUES
(1, '', '', NULL, 'esaunggul', '$2y$10$wJxa1Wm0rtS2BzqKnoCPd.7QQzgu7D/aLlMR5Aw3O.m9jx3oRJ5R2', 'demo@demo.com', 'admin'),
(2, 'student one', '7C', 1, 'student', '$2y$10$QKtE9X2eZiusB/SZsfv59uMtA4Dsi1yILSaAhXm0zqJtXsYRpyweK', 'student@mail.com', 'Student'),
(3, 'Admin', 'Admin 01', 12, 'admin', '$2y$10$YlqnUIYZT7Rd5QDxPHASj.RBS/bu110juewCyAjmh8L7wzrWw8qEu', 'admin@gmail.com', 'instruktur'),
(4, 'USER DEMO', 'XII Internasional A1', 1, 'user', '$2y$10$LiOf9uUD5Gk4zfpCloaGkuaorbVnJtZDrt5wCaGzXfiGFH0LTyEH.', 'user@gmail.com', 'Student'),
(5, 'ADE SULAEMAN', 'Admin 01', 1212, 'ade', '$2y$10$BxcrUuMZgYDIi8Sb25oMfeyZ.ZR9m2R5vwOXQ9msE.buxXVQFmvf.', 'adeesulaeman@gmail.com', 'Student'),
(6, 'Eko Priyanto', '7E', 2015112121, 'eko', '$2y$10$vvMWYPdG9aNcznyDJbBYK.7K7Pt.pFbWoGhrTKSC9R1upW9a5A78K', 'eko@gmail.com', 'Student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
