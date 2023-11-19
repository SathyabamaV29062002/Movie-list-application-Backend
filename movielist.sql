-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2023 at 08:54 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movielist`
--

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `ID` int(100) NOT NULL,
  `M_name` varchar(50) NOT NULL,
  `Director` varchar(50) NOT NULL,
  `Actor` varchar(100) NOT NULL,
  `M_img` varchar(100) NOT NULL,
  `Music` varchar(50) NOT NULL,
  `Rel_yr` varchar(20) NOT NULL,
  `Lang` varchar(20) NOT NULL,
  `gener` varchar(20) NOT NULL,
  `Rating` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`ID`, `M_name`, `Director`, `Actor`, `M_img`, `Music`, `Rel_yr`, `Lang`, `gener`, `Rating`) VALUES
(19, 'Vikramvxcvdfgdfgdfgdfgfgdfgdfgfgdfgdfgdfgdfgdfgdfg', 'Logesh', 'Kamal, VJS', '', 'Anirudh', '2022', 'Tamil', 'Action', 4.5),
(22, 'ss', 'dsfsd', 'dsfsdfsd dfvfvfdv dfvdfvf', '', 'dfvfdv', '2022', 'Malayalam', 'Fantasy', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
