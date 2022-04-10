-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 09, 2022 at 11:55 PM
-- Server version: 10.5.12-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id18726303_myisclass`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `regNumber` varchar(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  `surname` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `phone` varchar(225) NOT NULL,
  `sex` varchar(225) NOT NULL,
  `dob` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `joined` varchar(225) NOT NULL,
  `lastUpdated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `regStatus` int(11) NOT NULL,
  `role` varchar(225) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `regNumber`, `name`, `surname`, `email`, `phone`, `sex`, `dob`, `password`, `joined`, `lastUpdated`, `regStatus`, `role`, `status`) VALUES
(1, 'M186483', 'TANAKA', 'KADZUNGE', 'tkadzzz@gmail.com', '0782956402', 'MALE', '1996-05-09', '$2y$10$vTYu1zJPgquzodzOAbHgCOu0lPjpcghI/k6WCawQeF.qatB1S2yui', '2022-04-04 00:03:37', '2022-04-09 22:40:37', 1, 'student', 1),
(2, 'M191291', 'KELLY', 'MWANZA', '', '', 'FEMALE', '', '', '2022-04-10 00:57:31', '2022-04-09 23:04:25', 0, 'student', 1),
(3, 'M191917', 'TSITSI', 'MADUYU', '', '', 'FEMALE', '', '', '2022-04-10 00:57:31', '2022-04-09 23:04:25', 0, 'student', 1),
(4, 'M191981', 'MERCY', 'MUNGOVO', '', '', 'FEMALE', '', '', '2022-04-10 00:57:31', '2022-04-09 23:04:25', 0, 'student', 1),
(5, 'M180222', 'KUDZAISHE', 'MACHIKICHE', '', '', '', '', '$2y$10$n8aViEs2HZy0TAbbcnx4kuiDyO3jPkjOHre5MpQD86Gal9wensV66', '2022-04-10 00:57:31', '2022-04-09 23:46:21', 1, 'student', 1),
(6, 'M192063', 'TECLA', 'MUTEMA', '', '', 'FEMALE', '', '', '2022-04-10 00:57:31', '2022-04-09 23:04:25', 0, 'student', 1),
(7, 'M186873', 'MIRRIAD', 'GWIZA', '', '', 'FEMALE', '', '', '2022-04-10 00:57:31', '2022-04-09 23:04:25', 0, 'student', 1),
(8, 'M191934', 'TAKUDZWA IRVIN', 'ZIVANAI', '', '', '', '', '', '2022-04-10 00:57:31', '2022-04-09 23:04:25', 0, 'student', 1),
(9, 'M191507', 'ABIGAIL', 'POSHAYI', '', '', 'FEMALE', '', '', '2022-04-10 00:57:31', '2022-04-09 23:04:25', 0, 'student', 1),
(10, 'M191829', 'CRAIG', 'RISIRO', '', '', '', '', '', '2022-04-10 00:57:31', '2022-04-09 23:04:25', 0, 'student', 1),
(11, 'M188220', 'CASSIUS T', 'MAGAYA', '', '', 'MALE', '', '', '2022-04-10 00:57:31', '2022-04-09 23:04:25', 0, 'student', 1),
(12, 'M181076', 'SIMBARASHE', 'MAKANYISA', '', '', 'MALE', '', '', '2022-04-10 00:57:31', '2022-04-09 23:04:25', 0, 'student', 1),
(13, 'M191861', 'ASHTON', 'SIBANDA', '', '', 'MALE', '', '', '2022-04-10 00:57:31', '2022-04-09 23:04:25', 0, 'student', 1),
(14, 'M192246', 'MUSES T', 'CHIPANDA', '', '', 'MALE', '', '', '2022-04-10 00:57:31', '2022-04-10 00:57:31', 0, 'student', 1),
(15, 'M192632', 'VANESSA T', 'MZONDO', '', '', 'FEMALE', '', '', '2022-04-10 00:57:31', '2022-04-10 00:57:31', 0, 'student', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `regNumber` (`regNumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
