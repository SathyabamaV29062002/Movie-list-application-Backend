-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 24, 2023 at 08:40 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

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

DROP TABLE IF EXISTS `movie`;
CREATE TABLE IF NOT EXISTS `movie` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `M_name` varchar(100) NOT NULL,
  `Director` varchar(60) NOT NULL,
  `Actor` varchar(60) NOT NULL,
  `M_image` varchar(60) NOT NULL,
  `Music` varchar(70) NOT NULL,
  `Rel_yr` varchar(28) NOT NULL,
  `Lang` varchar(50) NOT NULL,
  `gener` varchar(20) NOT NULL,
  `Rating` float NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`ID`, `M_name`, `Director`, `Actor`, `M_image`, `Music`, `Rel_yr`, `Lang`, `gener`, `Rating`) VALUES
(2, 'Mouna ragam', 'Maniratnam', 'karthi revathi', '', 'illayaraja', '1986', 'Tamil', 'Romance', 10),
(3, 'Sathya', 'Maniratnam', 'sfdsf', '', 'sdfsdf', '1986', 'Tamil', 'Romance', 4),
(9, 'Mouna ragam', 'Maniratnam', 'trfeqa', '', 't', '123', 'Hindi', 'Fantasy', 4),
(6, 'dvdf', 'fdg', 'dfgdg', '', 'dfgdfg', 'dfgd', 'Hindi', 'Romance', 4),
(8, 'dfdsf', 'fdg', 'asdfg', '', 'ghhvg', '2002', 'Malayalam', 'Thriller', 5),
(10, 'Mouna ragam', 'Maniratnam', 'afds', '', 'dfgdf', '123', 'Malayalam', 'Horror', 4.5);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
